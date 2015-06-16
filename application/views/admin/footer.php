<!---------------------------------------- XÁC NHẬN ---------------------------------------- !>
<!-- input Control Panel -->
<div class="row light" id="lightAdminConfirm">
    <div class="panel panel-success panel-confirm">
        <div class="panel-heading">
            <h3 class="panel-title text-center">XÁC NHẬN</h3>
        </div>
        <div class="panel-body text-center">
            <div class="row"><p id="pConfirm"></p></div>
            <div class="row">
                <button class="btn btn-warning" onclick="lightbox_close('lightAdminConfirm', 'fadeAdminConfirm'); location.reload();">Đóng cửa sổ</button>
            </div>
        </div>
    </div>
</div>
<div class="fade" id="fadeAdminConfirm" onClick="lightbox_close('lightAdminConfirm', 'fadeAdminConfirm'); location.reload();"></div>
<!-- end input Control Panel -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2015 <a href="http://vietkingweb.com/">Viet King Web</a>.</strong> All rights reserved.
</footer>
