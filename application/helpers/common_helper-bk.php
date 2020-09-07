<?php

function checkAdminLogin(){
    $CI = & get_instance();
    $admin = $CI->session->userdata('admins');
    if (!$admin['is_user_login']) {
        return false;
    }else{
        return true;
    }
}

function currency(){
    return '£';
}

function custom_substr($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

function getAll($table, $where_column = '', $where_val = '', $wherein ='', $order_by = '') {
    $CI = & get_instance();

    $CI->db->select('*');
    $CI->db->from($table);
    if ($where_column != '' && $where_val != '') {
        $CI->db->where($where_column, $where_val);
    }
    if ($wherein != '') {
        $CI->db->where_in($where_column, $wherein);
    }
    if ($order_by != '') {
        $CI->db->order_by($order_by);
    }
    $query = $CI->db->get();
    return $query->result_array();
}

function singleRow($table, $select_col, $where_arr = '') {
    $CI = & get_instance();

    $CI->db->select($select_col);
    $CI->db->from($table);
    if ($where_arr != '') {
        $CI->db->where($where_arr);
    }
    $query = $CI->db->get();
    return $query->row_array();
}

function rlq() {
    $CI = & get_instance();
    echo '<pre>';
    echo $CI->db->last_query();
    exit;
}

function show($data) {
    echo '<pre>';
    print_r($data);
    exit;
}

function admin_email(){
    return "info@emc2property.co.uk";
}

function send_mail_func($to = '', $subject, $message, $attach = '') {
    $CI = & get_instance();
    
//    $where_arr = array('user_id'=>NULL, 'meta_key'=>'misc_settings_delivery_admin_email');
//    $admin_email = singleRow('fields_meta', 'meta_value', $where_arr);
//    $admin_email = $admin_email['meta_value'];
    
    $CI->load->library('email');
    $config['mailtype'] = 'html';
    $CI->email->initialize($config);
    $cc = "";
    //$bcc = "muzammil.logics@gmail.com";
    $CI->email->from('no-reply@emc2property.co.uk', 'EMC2 Property');
    if (!empty($to)) {
        $CI->email->to($to);
    } else {
//        $CI->email->to('akhzarjaved1993@gmail.com, mmuzammil45@gmail.com');
    }
    $CI->email->reply_to('info@emc2property.co.uk', 'EMC2 Property');
    if (!empty($cc)) {
        $CI->email->cc($cc);
    }
    $CI->email->subject($subject);
    $CI->email->message($message);
    if ($attach != '') {
        $CI->email->attach($attach);
    }    
    @$CI->email->send();
}

function encryptIt($str) {
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(ENCODE_DECODE_KEY), $str, MCRYPT_MODE_CBC, md5(md5(ENCODE_DECODE_KEY))));
}

function decryptIt($encoded) {
    $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(ENCODE_DECODE_KEY), base64_decode($encoded), MCRYPT_MODE_CBC, md5(md5(ENCODE_DECODE_KEY))), "\0");
    return $decoded;
}

function fileUpload($file, $folder = '', $type = "*") {
    $CI = & get_instance();

    $path = ($folder != '' ? './assets/' . $folder . '/' : './assets/');

    $config['upload_path'] = $path;
    $config['allowed_types'] = $type;
    $config['max_size'] = 8000;
    $config['overwrite'] = false;
    $config['remove_spaces'] = true;
    $config['encrypt_name'] = true;

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
    $data2 = array();
    if (!$CI->upload->do_upload($file)) {
        $error = $CI->upload->display_errors();
        $data2["error"] = $error;
        //print_r( $data2["error"]); exit;
        return $data2;
    } else {
        $img_data = $CI->upload->data();
        return $img_data;
    }
}

function listingImages($id){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('listing_images');
    $CI->db->where('listing_id', $id);
    $query = $CI->db->get();
    return $query->result_array();
}

function getRecentListings(){
    $CI = & get_instance();
    $CI->db->select('u.*, l.*, pt.name as property_type, u.unique_id as agent_unique_id');
    $CI->db->from('listings l');
    $CI->db->join('property_types pt', 'pt.id = l.property_type', 'left');
    $CI->db->join('users u', 'u.id = l.users_id', 'left');
    $CI->db->where('l.is_active', 'Y');
    $CI->db->where('l.is_approved', 'Y');
    $CI->db->where('l.is_completed', 'Y');
    $CI->db->order_by('l.created_at DESC');
    $CI->db->limit('6');
    //$where = "l.created_at >= ( CURDATE() - INTERVAL 3 DAY )";
    //$CI->db->where($where);
    $query = $CI->db->get();
    $records = $query->result_array();
    foreach ($records as $key => $record) {
        $records[$key]['images'] = listingImages($record['id']);
    }
    return $records;
}

function is_user_loggedin(){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('users');
    $CI->db->where('id', get_session('user_id'));
    $query = $CI->db->get();
    
    $records = $query->row_array();
    if(empty($records)){
        $CI->session->set_flashdata('error_msg','Please login first to continue!');        
        redirect(base_url());
    }else if (!$records['profile_updated']){
        $CI->session->set_flashdata('error_msg','You must have to complete your profile first!');
        redirect(base_url().'user/edit_profile');
    }
}

function getUnit($unit  = ''){
    if ($unit == "square_feet") {
        return "Sq ft";
    }elseif ($unit == "square_meters") {
        return "Sq m";
    }elseif ($unit == "square_yards") {
        return "Sq yd";
    }elseif ($unit == "hectares") {
        return "Hectares";
    }elseif ($unit == "acres") {
        return "Acres";
    }else{
        return "";
    }
}

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function isListingFavourite($id){
    if (!get_session('user_logged_in')) {
        return false;
    }
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('favourite_listings');
    $CI->db->where('listing_id', $id);
    $CI->db->where('user_id', get_session('user_id'));
    $query = $CI->db->get();
    if ($query->num_rows() > 0) {
        return true;
    }else{
        return false;
    }
}
?>