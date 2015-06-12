//check login
$('#subLogin').click(function(){
    $('#reqLogin').html('');
    var email = $('#email').val();
    var password = $('#password').val();
    var url = "<?php echo base_url() ?>";
    var remember = 0;
    if($('#rememberMe').is(':checked')){
        remember = 1;
    }
    var dataString = "email="+email+"&password="+password+"&remember="+remember;
    if(email != '' && password != ''){
        $.ajax({
            type: "POST",
            url: url+"users/checkLogin",
            data: dataString,
            success: function(x){
                alert(x);
//                    if(x == "000"){
//                        $('#reqLogin').css('display', 'block');
//                        $('#reqLogin').html('Tài khoản email chưa được đăng ký!');
//                    }
//                    else{
//                        if(x == "00"){
//                            $('#reqLogin').css('display', 'block');
//                            $('#reqLogin').html("Tài khoản hiện chưa được kích hoạt!");
//                        }
//                        else{
//                            if(x == "0"){
//                                $('#reqLogin').css('display', 'block');
//                                $('#reqLogin').html("Sai email hoặc mật khẩu!");
//                            }
//                            else{
//                                var linkAdmin = "<?php echo $this->session->userdata('linkAdmin'); ?>";
//                                alert(linkAdmin);
//                                window.location.href = linkAdmin;
//                            }
//                        }
//                    }
            }
        });
        return false;
    }
});

