<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<?php $this->load->view('common/header'); ?>
	<!-- Become Space Provider -->
	<section class="section-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-10 col-xs-12 col-md-offset-3 col-sm-offset-1">
					<div class="col-md-12">
						<h2>And finally, please add a few photos to your listing.</h2>
						<form id="step4_form">
							<input type="hidden" id="form_id" name="form_id" value="step4">
							<div style="background: #f7f8fa;">
								<!--<input type="file" multiple="multiple" name="files[]" id="input2">--> 
								<div class="dropzone" id="myDropzone">
									<div class="dz-message" data-dz-message>
										<span>
											<b>Drop files here to upload</b>
											<br> 
											<i>You can upload maximum 10 images, 5MB is the maximum size for an image.</i>
										</span>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-12">
						<br>
						<hr>
						<div class="form-group pull-left">
							<a href="<?php echo base_url() ?>listing/step3" class="btn back-btn">Go Back</a>
						</div>
						<div class="form-group pull-right" style="padding-left: 10px;">
							<a id="submit_list_details" href="javascript:void(0)" class="btn next-btn">Finish</a>
						</div>
						<div class="form-group pull-right">
							<a id="submit_list_details2" href="javascript:void(0)" class="btn next-btn">Finish & Preview</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <div id='preview-template' style='display: none;'>
        <div class='dz-preview dz-file-preview'>
            <div class='dz-image center-block'>
                <img data-dz-thumbnail=''>
            </div>
            <div class='dz-details'>
                <div class='dz-size margin-bottom-5' data-dz-size=''></div>
                <div class='dz-filename'>
                    <span data-dz-name=''></span>
                </div>
            </div>
            <div class='dz-progress'>
                <span class='dz-upload' data-dz-uploadprogress=''></span>
            </div>
            <div class='dz-custom'>
                <input type="number" min="1" max="10" name="img_order[]" class="requiredFields" style="margin-top: 5px; padding-left: 15px; padding-right: 15px;" placeholder="Image Order">
            </div>
            <div class='dz-error-message'>
                <span data-dz-errormessage=''></span>
            </div>
            <div class='dz-success-mark'>
                <span></span>
            </div>
            <div class='dz-error-mark' style='margin-top:-10px'>
                <span></span>
            </div>
            <a class='btn next-btn dz-remove' data-dz-remove='' style='margin-top:5px'>
                <i class='glyphicon glyphicon-trash'></i>
                Remove
            </a>
        </div>
    </div>
    <!-- Become Space Provider End-->
    <?php $this->load->view('common/scripts'); ?>
    <?php $this->load->view('common/footer'); ?>
    <script type="text/javascript">
      $(document).ready(function (){
        var globalBtn = $('#submit_list_details').attr('id');
        var globalBtn2 = $('#submit_list_details2').attr('id');
        Dropzone.options.myDropzone = {
            url: '<?php echo base_url() ?>listing/submit_data',
            previewTemplate: document.getElementById('preview-template').innerHTML,
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
                    maxFiles: 10,//5
                    maxFilesize: 5,//1
                    acceptedFiles: 'image/*',
                    addRemoveLinks: false,
                    success: function(file, response){
                    	response = jQuery.parseJSON(response);
                        // console.log(response);
                        //$(btn).button('reset');

                        /*
                        if(response.msg=='success'){
                            //....

                        } else if(response.msg == 'not_login'){
                            $.gritter.add({
                                title: 'Error!',
                                sticky: false,
                                time: '5000',
                                before_open: function(){
                                    if($('.gritter-item-wrapper').length >= 3)
                                    {
                                        return false;
                                    }
                                },
                                text: response.response,
                                class_name: 'gritter-error'
                            });
                        }else if(response.msg == 'error'){
                            $.gritter.add({
                                title: 'Error!',
                                sticky: false,
                                time: '5000',
                                before_open: function(){
                                    if($('.gritter-item-wrapper').length >= 3)
                                    {
                                        return false;
                                    }
                                },
                                text: response.response,
                                class_name: 'gritter-error'
                            });
                        }
                        */

                        if(response.code == 501){ // succeeded
                            return file.previewElement.classList.add("dz-success"); // from source
                        }else if (response.code == 403){  //  error
                            // below is from the source code too
                            var node, _i, _len, _ref, _results;
                            var message = response.msg // modify it to your error message
                            file.previewElement.classList.add("dz-error");
                            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                            _results = [];
                            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                            	node = _ref[_i];
                            	_results.push(node.textContent = message);
                            }
                            return _results;
                        }
                    },
                    init: function () {
                        dzClosure = this; // Makes sure that 'this' is understood inside the functions below. 
                        // for Dropzone to process the queue (instead of default form behavior):
                        document.getElementById("submit_list_details").addEventListener("click", function (e) {
                            // Make sure that the form isn't actually being sent.
                            $("#"+globalBtn).button('loading');
                            
                            e.preventDefault();
                            globalBtn = $('#submit_list_details').attr('id');
                            e.stopPropagation();
                            if (dzClosure.getQueuedFiles().length > 0) {
                            	dzClosure.processQueue();
                            } else {
                            	var blob = new Blob();
                            	blob.upload = { 'chunked': dzClosure.defaultOptions.chunking };
                            	dzClosure.uploadFile(blob);
                                //dzClosure.uploadFiles([]); //send empty
                            }
                            //dzClosure.processQueue();
                        });

                        document.getElementById("submit_list_details2").addEventListener("click", function (e) {
                            // Make sure that the form isn't actually being sent.
                            $("#"+globalBtn2).button('loading');
                            
                            globalBtn = $('#submit_list_details2').attr('id');
                            e.preventDefault();
                            e.stopPropagation();
                            if (dzClosure.getQueuedFiles().length > 0) {
                            	dzClosure.processQueue();
                            } else {
                            	var blob = new Blob();
                            	blob.upload = { 'chunked': dzClosure.defaultOptions.chunking };
                            	dzClosure.uploadFile(blob);
                                //dzClosure.uploadFiles([]); //send empty
                            }
                            //dzClosure.processQueue();
                        });
                        //send all the form data along with the files:
                        this.on("sendingmultiple", function (data, xhr, formData) {
                        	formData.append("form_id", $("#form_id").val());
                            var name = "image_order";
                            var values = $("input[name='img_order[]']").map(function(){return $(this).val();}).get();
                            formData.append(name, values);
                            if (globalBtn != 'submit_list_details') {
                              formData.append("previewBtn", 1);
                          }
//                            formData.append("job_title", $("#job_title").val());
//                            formData.append("job_title","#job_title").val());
//                            formData.append("job_description", $("#job_description").val());
});
                        this.on("successmultiple", function(files, response) {
                        	response = JSON.parse(response);
                        	if(response.msg == "success"){
                        		$.gritter.add({
                        			title: 'Success!',
                        			sticky: false,
                        			time: '15000',
                        			before_open: function(){
                        				if($('.gritter-item-wrapper').length >= 3)
                        				{
                        					return false;
                        				}
                        			},
                        			text: "Your listing has been saved successfully!",
                        			class_name: 'gritter-info'
                        		});
                        		setTimeout(function(){
                        			location.href = response.url;
                        		},3000);
                        	}else{
                        		$.gritter.add({
                        			title: 'Error!',
                        			sticky: false,
                        			time: '15000',
                        			before_open: function(){
                        				if($('.gritter-item-wrapper').length >= 3)
                        				{
                        					return false;
                        				}
                        			},
                        			text: response.response,
                        			class_name: 'gritter-error'
                        		});
                                $("#"+globalBtn).button('reset');
                            }
                            //console.log("success multiple");
                        });
                        this.on("errormultiple", function(files, response) {
                        	console.log("error multiple");
                        });            
                    }
                }
            });
        </script>
    </body>
    </html>