<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* End of file connect_helper.php */
/* Location: ./system/helpers/array_helper.php */
if ( ! function_exists('admin_url'))
{
	function admin_url()
	{
		$CI = get_instance();
		return $CI->config->item('admin_url');
	}

}


if ( ! function_exists('admin_controller'))
{
	function admin_controller()
	{
		$CI = get_instance();
		return $CI->config->item('admin_controller');
	}

}

if ( ! function_exists('fb_login'))
{
	function fb_login()
	{
		$CI = get_instance();
		return $CI->facebook->login_url();
	}

}

if ( ! function_exists('get_session'))
{
	function get_session($session_name)
	{
		$CI = get_instance();
    	return $CI->session->userdata($session_name);
	}

}
if ( ! function_exists('set_session'))
{
	function set_session($session_name, $value)
	{
		$CI = get_instance();
    	return $CI->session->set_userdata($session_name, $value);
	}

}
if ( ! function_exists('unset_session'))
{
	 function unset_session($session_name)
	 {
		 $CI = get_instance();
		 return $CI->session->unset_userdata($session_name);
	 }
}
if ( ! function_exists('admin_email'))
{
	function admin_email()
	{
		$CI = get_instance();
		return $CI->config->item('admin_email');
	}
}


if ( ! function_exists('show'))
{
	function show($data){
		echo "<pre>";
		print_r($data);
	}
}


if ( ! function_exists('dorage_url_title'))
{
	function dorage_url_title($str, $separator = 'dash', $lowercase = FALSE)
	{

		if ($separator == 'dash')
		{
			$search		= '_';
			$replace	= '-';
		}
		else
		{
			$search		= '-';
			$replace	= '_';
		}

		$trans = array(
						'&\#\d+?;'				=> '',
						'&\S+?;'				=> '',
						'\s+'					=> $replace,
						$replace.'+'			=> $replace,
						$replace.'$'			=> $replace,
						'^'.$replace			=> $replace,
						'\.+$'					=> ''
					);

		$str = strip_tags($str);

		foreach ($trans as $key => $val)
		{
			$str = preg_replace("#".$key."#i", $val, $str);
		}

		if ($lowercase === TRUE)
		{
			$str = strtolower($str);
		}

        $str = str_replace('&','and',$str);
        $str = str_replace(' ','-',$str);
        $str = str_replace('/','-',$str);
        $str = str_replace('?','-',$str);
        $str = str_replace(',','',$str);
        $str = str_replace('(','',$str);
        $str = str_replace(')','',$str);
		$str = str_replace('+','',$str);
		$str = str_replace("'",'',$str);

		return trim(stripslashes($str));
	}
}

if ( ! function_exists('get_list_image'))
{
	function get_list_image($listings_id)
	{
		$CI = get_instance();
		$CI->load->model('home/home_model');
		$image = $CI->home_model->get_list_image($listings_id);

		if (empty($image)) {
			return "no-image.jpg";
		}
    	return $image;
	}
}
if ( ! function_exists('get_meta_value'))
{
	function get_meta_value($meta_key , $listings_id)
	{
		$CI =& get_instance();
		$CI->db->select('meta_value');
		$CI->db->where('meta_key', $meta_key);
		$CI->db->where('listings_id',$listings_id);
		$CI->db->from('listings_meta');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['meta_value'];
	}
}
if ( ! function_exists('get_size_type'))
{
	function get_size_type($id)
	{
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where('id',$id);
		$CI->db->from('storage_size_types');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['name'];
	}
}
if ( ! function_exists('get_storage_type'))
{
	function get_storage_type($id)
	{
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where('id',$id);
		$CI->db->from('space_storage_types');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['name'];
	}
}
if ( ! function_exists('get_room_space_character'))
{
	function get_room_space_character($id)
	{
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where('id',$id);
		$CI->db->from('room_space_character');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['name'];
	}
}
if ( ! function_exists('get_cancellation_policy'))
{
	function get_cancellation_policy($id)
	{
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where('id',$id);
		$CI->db->from('cancellation_policies');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['name'];
	}
}
if ( ! function_exists('get_section_content'))
{
	function get_section_content($page , $meta_key)
	{
		$CI =& get_instance();
		$CI->db->select('meta_value');
		$CI->db->where('page', $page);
		$CI->db->where('meta_key',$meta_key);
		$CI->db->from('settings');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['meta_value'];
	}
}