<?php include("head.php"); ?>
<body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Đăng Nhập</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập để bắt đầu việc quản lý của bạn</p>
        <form action="<?php echo base_url(); ?>admin" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Ghi Nhớ
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Bắt Đầu</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">Quên mật khẩu</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <?php include("foot.php"); ?>
    <!-- Jquery 1.11.1 JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>