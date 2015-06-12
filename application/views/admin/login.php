<?php include("head.php"); ?>
<body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>login"><b>Đăng Nhập</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập để bắt đầu việc quản lý của bạn</p>
        <form action="<?php echo base_url(); ?>admin" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" required id="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" required id="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <div class="alert alert-danger" role="alert" id="reqLogin" style="display: none"></div>
            <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" id="rememberMe"> Ghi Nhớ
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" id="subLogin">Bắt Đầu</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- Jquery 1.11.1 JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
    <!-- Admin JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js"></script>
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
