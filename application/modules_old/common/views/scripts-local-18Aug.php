<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.daterangepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fullcalendar.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.filer.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBHtMus_lrs1jrXwK9QkltUaAP5rr3UoX0&libraries=places"></script>

<script>
    $('#signup_mdl_btn').click(function () {
        $('#loginModal').modal('hide');
        $('#loginModal').one('hidden.bs.modal', function () {
            $('#signModal').modal('show');
        });
    });
    $('#login_mdl_btn').click(function () {
        $('#signModal').modal('hide');
        $('#signModal').one('hidden.bs.modal', function () {
            $('#loginModal').modal('show');
        });
    });
    $('#forgot_mdl_btn').click(function () {
        $('#loginModal').modal('hide');
        $('#loginModal').one('hidden.bs.modal', function () {
            $('#forgotModal').modal('show');
        });
    });
    $('#back_to_login_mdl').click(function () {
        $('#forgotModal').modal('hide');
        $('#forgotModal').one('hidden.bs.modal', function () {
            $('#loginModal').modal('show');
        });
    });
    var markers = [];
    var locations = [
        ['Title 1', 41.33847249573162, 19.78838835516433, '1'],
        ['Title 2', 41.32992324524446, 19.816238906745866, '2'],
    ];
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: {lat: 41.327546, lng: 19.818698},
            streetViewControl: false,
            mapTypeControl: false,
            fullscreenControl: false,
            scrollwheel: false,
            zoomControl: true,
            panControl: false
        });
        setMarkers(map);
    }
    function setMarkers(map) {
        for (var i = 0; i < locations.length; i++) {
            var location = locations[i];
            var locationInfowindow = new google.maps.InfoWindow({
                content: '<div class="property-item" style="width: 300px;"><div class="img-box"><div class="property-label"><a href="#" class="property-label__type">House For Rent</a></div><a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a><a href="single-property.php" class="img-box__image"><img src="assets/images/index_5_property_3.png" alt="Property" class="img-responsive"></a></div><div class="property-content"><a href="single-property.php" class="property-title">Quae ipsum porro</a><span class="item-price">$200</span><div class="property-address">2096 Monroe Street, Houston, 77030 USA</div><div class="rating"style="padding-bottom: 15px;"><div class="stars pull-right"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span>115</span></div></div></div></div>',
            });
            var marker = new google.maps.Marker({
                position: {lat: location[1], lng: location[2]},
                map: map,
                title: location[0],
                icon: normalIcon(),
                label: {
                    text: '$50',
                    color: "white",
                    fontSize: "14px",
                    fontWeight: "bold"
                },
                infowindow: locationInfowindow
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', function () {
                hideAllInfoWindows(map);
                this.infowindow.open(map, this);
            });
        }
    }
    function hideAllInfoWindows(map) {
        markers.forEach(function (marker) {
            marker.infowindow.close(map, marker);
        });
    }
// make a .hover event
    $('#markers_info .marker').hover(
// mouse in
            function () {
// first we need to know which <div class="marker"></div> we hovered
                var index = $('#markers_info .marker').index(this);
                markers[index].label.color = 'black';
                markers[index].setIcon(highlightedIcon());
            },
// mouse out
            function () {
// first we need to know which <div class="marker"></div> we hovered
                var index = $('#markers_info .marker').index(this);
                markers[index].label.color = 'white';
                markers[index].setIcon(normalIcon());
            }
    );
    function normalIcon() {
        return {
            url: 'assets/images/marker.png',
            scaledSize: new google.maps.Size(70, 80),
            labelOrigin: new google.maps.Point(35, 28),
        };
    }
    function highlightedIcon() {
        return {
            url: 'assets/images/marker_color.png',
            scaledSize: new google.maps.Size(70, 80),
            labelOrigin: new google.maps.Point(35, 28),
        };
    }
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0DaKGlV-AAL09UAREeyUD_DOgEEyLwnU&callback=initMap"></script>-->
<script type="text/javascript">
    $(document).ready(function (){
//        initMap();
    });
</script>

<script>
    $(document).on('click', '.number-spinner button', function () {
        var btn = $(this),
                oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                newVal = 0;
        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });
</script>
<script>
    $(document).on('click', '.add-bed-btn', function () {
        var text = $(this).text();
        if (text == "Done") {
            $(this).text('Add beds');
        } else {
            $(this).text('Done');
        }
        $(this).parent().parent().find('.show-detail').toggle();
    });
    $(document).on('click', '.businessCheckbox', function () {
        var check = $('.businessCheckbox').is(":checked");
        if (check) {
            $(".reg-add").css("display", "none");
        } else {
            $(".reg-add").css("display", "block");
        }
    });
    $(document).on('click', '.add-req', function () {
        $('.guest-show-check').slideDown();
        $('.add-req').addClass('add-req-change');
    });
    $(document).on('click', '.ins-yes', function () {
        $('.insurance-bullet').slideDown();
    });
    $(document).on('click', '.ins-no', function () {
        $('.insurance-bullet').slideUp();
    });
    $(document).on('click', '.mov-yes', function () {
        $('.moving-listing').slideDown();
    });
    $(document).on('click', '.mov-no', function () {
        $('.moving-listing').slideUp();
    });
    $(document).on('click', '.open-nav', function () {
        $('.opc').show();
    });
    $(document).on('click', '.closebtn', function () {
        $('.opc').hide();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
    });
</script>
<script>
// File Upload
// 
    function ekUpload() {
        function Init() {
            console.log("Upload Initialised");
            var fileSelect = document.getElementById('file-upload'),
                    fileDrag = document.getElementById('file-drag'),
                    submitButton = document.getElementById('submit-button');
            fileSelect.addEventListener('change', fileSelectHandler, false);
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }
        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');
            e.stopPropagation();
            e.preventDefault();
            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }
        function fileSelectHandler(e) {
            var files = e.target.files || e.dataTransfer.files;
            fileDragHover(e);
            for (var i = 0, f; f = files[i]; i++) {
                parseFile(f);
                uploadFile(f);
            }
        }
        function output(msg) {
            var m = document.getElementById('messages');
            m.innerHTML = msg;
        }
        function parseFile(file) {
            console.log(file.name);
            output(
                    '<strong>' + encodeURI(file.name) + '</strong>'
                    );
            var imageName = file.name;
            var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
            if (isGood) {
                document.getElementById('start').classList.add("hidden");
                document.getElementById('response').classList.remove("hidden");
                document.getElementById('notimage').classList.add("hidden");
                document.getElementById('file-image').classList.remove("hidden");
                document.getElementById('file-image').src = URL.createObjectURL(file);
            } else {
                document.getElementById('file-image').classList.add("hidden");
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("file-upload-form").reset();
            }
        }
        function setProgressMaxValue(e) {
            var pBar = document.getElementById('file-progress');
            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }
        function updateFileProgress(e) {
            var pBar = document.getElementById('file-progress');
            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }
        function uploadFile(file) {
            var xhr = new XMLHttpRequest(),
                    fileInput = document.getElementById('class-roster-file'),
                    pBar = document.getElementById('file-progress'),
                    fileSizeLimit = 1024;
            if (xhr.upload) {
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    pBar.style.display = 'inline';
                    xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                    xhr.upload.addEventListener('progress', updateFileProgress, false);
                    xhr.onreadystatechange = function (e) {
                        if (xhr.readyState == 4) {
                        }
                    };
                    xhr.open('POST', document.getElementById('file-upload-form').action, true);
                    xhr.setRequestHeader('X-File-Name', file.name);
                    xhr.setRequestHeader('X-File-Size', file.size);
                    xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                    xhr.send(file);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    }
    ekUpload();
</script>
<script>
    $('#calendarAdmin').fullCalendar({});
</script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "280px";
        document.getElementById("main").style.marginLeft = "0px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
<script>
    var checker = document.getElementById('checkme');
    var sendbtn = document.getElementById('submit');
    checker.onchange = function () {
        sendbtn.disabled = !!this.checked;
    };
</script>
<script>
    $(document).ready(function () {
        $(function () {
            $(document).on('scroll', function () {
                if ($(window).scrollTop() > 100) {
                    $('.scroll-top-wrapper').addClass('show');
                } else {
                    $('.scroll-top-wrapper').removeClass('show');
                }
            });
            $('.scroll-top-wrapper').on('click', scrollToTop);
        });
        function scrollToTop() {
            verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
            element = $('body');
            offset = element.offset();
            offsetTop = offset.top;
            $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#input2').filer({
            limit: null,
            maxSize: null,
            extensions: null,
            changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag & Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
            showThumbs: true,
            appendTo: null,
            theme: "dragdropbox",
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                                <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                <div class="jFiler-item-status"></div>\
                                <div class="jFiler-item-info">\
                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                </div>\
                                {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                <ul class="list-inline pull-left">\
                                <li>{{fi-progressBar}}</li>\
                                </ul>\
                                <ul class="list-inline pull-right">\
                                <li><a class="fa fa-trash-o jFiler-item-trash-action"></a></li>\
                                </ul>\
                                </div>\
                                </div>\
                                </div>\
                                </li>',
                itemAppend: '<li class="jFiler-item">\
                                <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                <div class="jFiler-item-status"></div>\
                                <div class="jFiler-item-info">\
                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                </div>\
                                {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                <ul class="list-inline pull-left">\
                                <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                </ul>\
                                <ul class="list-inline pull-right">\
                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                </ul>\
                                </div>\
                                </div>\
                                </div>\
                                </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: false,
                removeConfirmation: false,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            uploadFile: {
                url: "upload.php",
                data: {},
                type: 'POST',
                enctype: 'multipart/form-data',
                beforeSend: function () {},
                success: function (data, el) {
                    var parent = el.find(".jFiler-jProgressBar").parent();
                    el.find(".jFiler-jProgressBar").fadeOut("slow", function () {
                        $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                    });
                },
                error: function (el) {
                    var parent = el.find(".jFiler-jProgressBar").parent();
                    el.find(".jFiler-jProgressBar").fadeOut("slow", function () {
                        $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i>Success</div>").hide().appendTo(parent).fadeIn("slow");
                    });
                },
                statusCode: {},
                onProgress: function () {},
            },
            dragDrop: {
                dragEnter: function () {},
                dragLeave: function () {},
                drop: function () {},
            },
            addMore: true,
            clipBoardPaste: true,
            excludeName: null,
            beforeShow: function () {
                return true
            },
            onSelect: function () {},
            afterShow: function () {},
            onRemove: function () {},
            onEmpty: function () {},
            captions: {
                button: "Choose Files",
                feedback: "Choose files To Upload",
                feedback2: "files were chosen",
                drop: "Drop file here to Upload",
                removeConfirmation: "Are you sure you want to remove this file?",
                errors: {
                    filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                    filesType: "Only Images are allowed to be uploaded.",
                    filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                    filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $("#registration_form").validate({
        errorElement: 'span',
        errorClass: 'text-danger',
        focusInvalid: true,
        ignore: "",
        rules: {
            email: {
                required: true,
                email: true,
                remote: {
                    url: '<?php echo base_url(); ?>register/check_email',
                    type: "post"
                }
            },
            password: {
                required: true,
                minlength: 6
            },
            c_password: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {
            email: {
                required: "Please enter email.",
                email: "Please enter a valid email.",
                remote: jQuery.validator.format('This email already taken.')
            },
            password: {
                required: "Please enter password",
                minlength: jQuery.validator.format("Enter at least {0} characters")
            },
            c_password: {
                required: "Repeat your password",
                equalTo: "Enter the same password as above"
            },
        },
        highlight: function (e) {
            $(e).closest('.input-group').removeClass('has-info').addClass('has-error');
        },
        success: function (e) {
            $(e).closest('.input-group').removeClass('has-error');
            $(e).remove();
        },
        errorPlacement: function (error, element) {
            if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if (controls.find(':checkbox,:radio').length > 1)
                    controls.append(error);
                else
                    error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            } else if (element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            } else if (element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            } else
                error.insertBefore(element.parent());
        },
        submitHandler: function (form) {
        },
        invalidHandler: function (form, validator) {
            if (!validator.numberOfInvalids())
                return;
            $('html, body').animate({
                scrollTop: $(validator.errorList[0].element).offset().top - 300
            }, 1000);
        }
    });
    $('#registration_btn').click(function () {
        if ($("#registration_form").valid()) {
            var confirm_1 = $('#check_policy').prop("checked");
            if (confirm_1 == false) {
                $('.remb').css('color', 'red');
                return false;
            } else {
                $('.remb').css('color', '');
            }
            var btn = $(this);
            $(btn).button('loading');
            var value = $("#registration_form").serialize();
            $.ajax({
                url: '<?php echo base_url(); ?>register/submit_user',
                type: 'post',
                data: value,
                dataType: 'json',
                success: function (status) {
                    console.log(status);
                    if (status.msg == 'success') {
                        $.gritter.add({
                            title: 'Success!',
                            sticky: false,
                            time: '3000',
                            before_open: function () {
                                if ($('.gritter-item-wrapper').length >= 3)
                                {
                                    return false;
                                }
                            },
                            text: "Thanks for Registering. Please check your email for account activation.",
                            class_name: 'gritter-success'
                        });
                        $(btn).button('reset');
                        $("#registration_form")[0].reset();
                        $("#signModal").modal('hide');
                    } else if (status.msg == 'error') {
                        $.gritter.add({
                            title: 'Error!',
                            sticky: false,
                            time: '5000',
                            before_open: function () {
                                if ($('.gritter-item-wrapper').length >= 3)
                                {
                                    return false;
                                }
                            },
                            text: status.response,
                            class_name: 'gritter-error'
                        });
                        $(btn).button('reset');
                    }
                }
            });
        }
    });
    
    function initialize() {
        var input2 = /** @type {HTMLInputElement} */(
        document.getElementById("property_loc"));
        var cntry = 'NZ';
        var options = {
         // componentRestrictions: {country: cntry}
        };
        var autocomplete2 = new google.maps.places.Autocomplete(input2, options);

        google.maps.event.addListener(autocomplete2, "place_changed", function() {

            //infowindow.close();
            //marker.setVisible(false);
            var place = autocomplete2.getPlace();
            if (!place.geometry) {
              return;
            }
            // get lat
            var lat = place.geometry.location.lat();
            // get lng
            var lng = place.geometry.location.lng();
            //var point = marker.getPosition();
            //map.panTo(point);
            document.getElementById("property_lat_long").value=lat+", "+lng;
        });
    }
    initialize();
</script>