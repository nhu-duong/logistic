/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

var app = {
    // Application Constructor
    baseDomain: "http://smartrisk.website5s.com",
//    baseDomain: "http://192.168.1.103/cordova_server/public",
    initialize: function() {
        this.bindEvents();
        this.pageName = $('#page_name').val();
        if (this.pageName == 'register') {
            this.initRegister();
        }
        if (this.pageName == 'login') {
            this.initLogin();
        }
        if (this.pageName == 'activate') {
            this.initActivate();
        }
        if (this.pageName == 'home') {
            this.initHome();
        }
        if (this.pageName == 'start') {
            this.initStart();
        }
        if (this.pageName == 'inputImage') {
            this.initInputImage();
        }
        if (this.pageName == 'inputManually') {
            this.initInputManually();
        }
    },
    updateInputTextView: function() {
        $('#value_box').show();
        if ($('#record_type').val() == 1) {
            $('#value_2').attr('required', 'required');
            $('#value_2_box').show();
        } else if ($('#record_type').val() > 1 && $('#record_type').val() <= 4) {
            $('#value_2').removeAttr('required');
            $('#value_2_box').hide();
        } else {
            $('#value_box').hide();
            $('#value_2_box').hide();
        }
        
        $texts = [
            '',
            'Saisisser votre index electricité heures creuses (kWh)',
            'Saisisser votre index eau (m3)',
            'Saisisser votre index gaz (m3)',
            'Saisisser votre index electricité heures creuses (kWh)'
        ];
        $('.value_1_title').html($texts[$('#record_type').val()]);
        app.inputManuallyValidate();
    },
    inputManuallyValidate: function() {
        if ($('.form-horizontal')[0].checkValidity()) {
            $('#btn-submit').show();
        } else {
            $('#btn-submit').hide();
        }
    },
    initInputManually: function() {
        this.updateInputTextView();
        $('#record_type_selector a').on('click', function() {
            $('#record_type').val($(this).data('value'));
            app.updateInputTextView();
        });
        $.ajax({
            url: app.baseDomain + '/home/add-record',
            dataType: 'json',
            method: 'GET',
            success: function(data) {
                if (data.result == 1) {
                    if (data.status == 0) {
                        // User is not login. Redirect to login page
                        window.location = 'index.html';
                        return;
                    } else if (data.status == 2) {
                        // User is already login but not activated yet. Redirect to activate page.
                        window.location = 'index.html';
                        return;
                    }
                    $('#token').val(data.token);
                }
            }
        });
        $('#btn-submit').on('click',function(){
                var type = ["1","2","3"];
            if(type.indexOf($('#record_type').val()) < 0){
                alert('Please select record type');
                return false;
            }
        });
        $('#btn-submit').hide();
        $('input').change(app.inputManuallyValidate);
        $('input').keyup(app.inputManuallyValidate);
        $('.form-horizontal').on('submit', function() {
            $.ajax({
                url: app.baseDomain + '/home/add-record',
                dataType: "json",
                method: "POST",
                data: $('.form-horizontal').serialize(),
                success: function(data) {
                    if (data.result == 1) {
                        // valid code
                        alert(data.message);
                        window.location = 'home.html';
                        return;
                    } else if (data.result == -1) { // user are not login
                        window.location = 'index.html';
                        return;
                    }
                    alert(data.message);
                },
                error: function(data) {
                    alert('submit return error' + data);
                }
            });
            return false;
        });
    },
    initStart: function() {

    },
    callCamera: function() {
            //appCamera.takePhoto(1);
//            $('.startInput').on('click', function() {
//                if ($('#record_type').val() > 0) {
//                    window.location = $(this).attr('data-link');
//                }
//            });

    },
    initInputImage: function(){
        $('#btn-upload').hide();
        $.ajax({
            url: app.baseDomain + '/home/add-record',
            dataType: 'json',
            method: 'GET',
            success: function(data) {
                if (data.result == 1) {
                    if (data.status == 0) {
                        // User is not login. Redirect to login page
                        window.location = 'index.html';
                        return;
                    } else if (data.status == 2) {
                        // User is already login but not activated yet. Redirect to activate page.
                        window.location = 'index.html';
                        return;
                    }
                    $('#token').val(data.token);
                }
            }
        });
    },
    saveImage: function(){
        $.ajax({
            url: app.baseDomain + '/image/add-record',
            dataType: "json",
            method: "POST",
            data: $('.form-horizontal').serialize(),
            success: function(data) {
                if (data.result == 1) {
                    // valid code
                    alert(data.message);
                    window.location = 'home.html';
                    return;
                } else if (data.result == -1) { // user are not login
                    window.location = 'index.html';
                    return;
                }
                alert(data.message);
            },
            error: function(data) {
                alert('submit return error' + data);
            }
        });
    },
    checkLogin: function(callback) {
        $.ajax({
            url: app.baseDomain + "/auth/status",
            dataType: 'json',
            method: 'GET',
            success: function(data) {
                if (data.result == 1) {
                    if (data.status == 1) {
                        callback();
                        return;
                    }
                }
                window.location = 'index.html';
            },
            error: function(data) {
                
            }
        });
    },
    initHome: function() {
        $.ajax({
            url: app.baseDomain + "/auth/user-info",
            dataType: "json",
            success: function(data) {
                if (data.result == 1) {
                    if (data.status == 0) {
                        // User is not login. Redirect to login page
                        window.location = 'index.html';
                        return;
                    } 
                    $('#token').val(data.token);
                    app.populateUserInfo(data.data);
                } else {
                    alert('Can not connect to server. Please try again!' + data.result + "data: " + data);
                }
            },
            error: function(data) {
                alert("There's an error. Please try again!" + data)
            }
        });
        $('.form-horizontal').on('submit', function() {
            $.ajax({
                url: app.baseDomain + '/auth/user-info',
                dataType: "json",
                method: "POST",
                data: $('.form-horizontal').serialize(),
                success: function(data) {
                    if (data.result == 1) {
                        // valid code
                        alert(data.message);
                        window.location = 'home.html';
                        return;
                    }
                    else if (data.result == -1) {
                    // user are not login
                        window.location = 'index.html';
                        return;
                    }
                    alert(data.message);
                },
                error: function(data) {
                    alert('submit return error' + JSON.stringify(data));
                }
            });
            return false;
        });
    },
    populateUserInfo: function(userInfo) {
        $('#name').val(userInfo.name);
        $('#prenom').val(userInfo.prenom);
        $('#adresse').val(userInfo.adresse);
        $('#ville').val(userInfo.ville);
        $('#email').val(userInfo.email);
        $('#phone').val(userInfo.phone);
    },
    initActivate: function() {
        $.ajax({
           url: app.baseDomain + '/auth/status',
           method: 'GET',
           dataType: 'json',
           success: function (data) {
               if (data.result == 1) {
                   if (data.status == 1) {
                       window.location = 'home.html';
                   }
               } else {
                   alert(data.message);
               }
           },
           error: function (data) {
               alert(data.statusText);
           }
        });
        $('.form-horizontal').on('submit', function() {
            $.ajax({
                url: app.baseDomain + '/activate/' + $('#validate_code').val(),
                dataType: "json",
                method: "GET",
                success: function(data) {
                    switch (data.result) {
                        case 1: // valid code
                            localStorage.validate_code = $('#validate_code').val();
                            window.location = 'register.html';
                            return;
                        case 2: // code is used
                        case 0:
                            // invalid code
                            alert(data.message);
                            return;
                        case 3: 
                            // already login
                            window.location = 'home.html';
                            return;
                    }
                    alert('call success but ' + data);
                },
                error: function(data) {
                    alert('submit return error' + data.statusText);
                }
            });
            return false;
        });
    },
    initLogin: function() {
        $.ajax({
            url: app.baseDomain + "/auth/login",
            dataType: "json",
            success: function(data) {
                if (data.result == 1) {
                    if (data.status == 1) {
                        // User is already login and activated. Redirect to home page
                        window.location = 'home.html';
                        return;
                    } 
                    $('#token').val(data.token);
                } else {
                    alert('Can not connect to server. Please try again!' + data.result + "data: " + data);
                }
            },
            error: function(data) {
                alert("There's an error. Please try again!" + app.baseDomain + "/auth/login" + data.statusText)
            }
        });
        $('.form-horizontal').on('submit', function() {
            $.ajax({
                url: app.baseDomain + $('.form-horizontal').attr('action'),
                data: $('.form-horizontal').serialize(),
                dataType: "json",
                method: "POST",
                success: function(data) {
                    if (data.result == 1) {
                        if (data.status == 1) {
                            // User is already login and activated. Redirect to home page
                            window.location = 'home.html';
                            return;
                        } 
                        window.location = 'index.html';
                    } else {
                        alert('Wrong email or password. Please try again!');
                    }
                },
                error: function(data) {
                    alert('submit return error' + data.statusText);
                }
            });
            return false;
        });
    },
    initRegister: function() {
        if (!localStorage.validate_code) {
            window.location = 'activate.html';
            return;
        } 
        $.ajax({
            url: this.baseDomain + "/auth/register",
            dataType: "json",
            success: function(data) {
                if (data.result == 1) {
                    if (data.status == 1) {
                        // User is already login and activated. Redirect to home page
                        window.location = 'home.html';
                        return;
                    } 
                    $('#token').val(data.token);
                    $('#validate_code').val(localStorage.validate_code);
                } else {
                    alert('Can not connect to server. Please try again!' + data.result + "data: " + data);
                }
            },
            error: function(data) {
                alert("There's an error. Please try again!" + data);
            }
        });
        $('.form-horizontal').on('submit', function() {
            $.ajax({
                url: app.baseDomain + $('.form-horizontal').attr('action'),
                data: $('.form-horizontal').serialize(),
                dataType: "json",
                method: "POST",
                success: function(data) {
                    if (data.result == 1) {
                        window.location = 'home.html';
                    } else {
                        alert(data.message);
                        /**
                         * @TODO: Validate validate_code again to make sure the validate_code still correct
                         */
                        //localStorage.validate_code = '';
                        //window.location = 'activate.html';
                    }
                },
                error: function(data) {
                    alert('submit return error' + data);
                }
            });
            return false;
        });
    },
    logout: function() {
        $.ajax({
            url: app.baseDomain + '/auth/logout',
            dataType: "json",
            method: "GET",
            success: function(data) {
                if (data.result == 1) {
                    window.location = 'index.html';
                } else {
                    alert('submit success but ' + data);
                }
            },
            error: function(data) {
                alert('submit logout return error: ' + data.statusText + ' link: ' + app.baseDomain + '/auth/logout');
            }
        });
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        $('#btnLogout').click(app.logout);

        console.log('Received Event: ' + id);
    },
    goToRegisterPage: function() {
        window.location = 'register.html';
    }
};


/**
 * Function called when page has finished loading.
 */
function init() {
    document.addEventListener("deviceready", onDeviceReady, false);
//    onDeviceReady();
}
function onDeviceReady(){
    app.initialize();
    $('#btn-capture').on('click',function(){
        takePicture();
    });
    $('#btn-upload').on('click',function(){
        uploadPicture();
    });

}
/**
 * Take picture with camera
 */
function takePicture() {
    navigator.camera.getPicture(
        function(uri) {
            var img = document.getElementById('myImage');
            img.style.visibility = "visible";
            img.style.display = "block";
            img.src = uri;
            $('#myImage').addClass('rotate90');
            $('#btn-upload').show();
            //document.getElementById('camera_status').innerHTML = "Success";
        },
        function(e) {
            console.log("Error getting picture: " + e);
            //document.getElementById('camera_status').innerHTML = "Error getting picture.";
        },
        { quality: 30, destinationType:Camera.DestinationType.FILE_URI });
};

/**
 * Upload current picture
 */
function uploadPicture() {

    // Get URI of picture to upload
    var img = document.getElementById('myImage');
    var imageURI = img.src;
    if (!imageURI || (img.style.display == "none")) {
        document.getElementById('camera_status').innerHTML = "Take picture or select picture from library first.";
        return;
    }
    else{
        var type = ["1","2","3"];
        if(type.indexOf($('#record_type').val()) < 0)
        {
            alert('Please select record type');
            return false;
        }
        $('#myImage').toggleClass('transparent50');
        $('#facebookG').toggleClass('hidden');
    }

    // Verify server has been entered
//    var server = document.getElementById('serverUrl').value;
    var server = app.baseDomain + '/file-upload.php';
    if (server) {
        try {
            // Specify transfer options
            var options = new FileUploadOptions();
            options.fileKey = "file";
            options.fileName = imageURI.substr(imageURI.lastIndexOf('/') + 1);
            options.mimeType = "image/jpeg";
            options.chunkedMode = false;
            var params = {};
            params.value1 = "test";
            params.value2 = "param";

            options.params = params;

            // Transfer picture to server

            var ft = new FileTransfer();
            ft.upload(imageURI, encodeURI(server), win, fail, options, true);
        } catch (e) {
            alert('error + ' + e.message);
        }
    }

    function win(r) {
        console.log("Code = " + r.responseCode);
        console.log("Response = " + r.response);
        console.log("Sent = " + r.bytesSent);
        $('#myImage').toggleClass('transparent50');
        $('#facebookG').toggleClass('hidden');
        alert('Upload image to server successful');
        $("#image_name").val(options.fileName);
        app.saveImage();
    }

    function fail(error) {
        alert("An error has occurred: Code = " + error.code);
        console.log("upload error source " + error.source);
        console.log("upload error target " + error.target);
        $('#myImage').toggleClass('transparent50');
        $('#facebookG').toggleClass('hidden');
    }
}

$(document).ready(function(){

    $(document).ajaxStart(function(){
        $('.loading').show();
    });
    $(document).ajaxStop(function(){
        $('.loading').hide();
    });
})
