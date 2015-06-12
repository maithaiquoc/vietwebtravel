<?php include("head.php"); ?>
<body onload="getTableAdsManager(1); getPage();" class="skin-blue">
<div id="wrapper" class="wrapper">

    <?php include("header.php"); ?>

    <?php include("sidebar.php"); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý slider
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Slider</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Bảng thông tin dữ liệu</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row divRight">
                        <button class="btn btn-primary pull-right" onclick="emptySessionAdminAdsCreate(); lightbox_open('lightCreateAdminAds', 'fadeCreateAdminAds');"><span class="glyphicon glyphicon-plus"></span> Thêm Mới</button>
                    </div>
                    <div class="table-responsive" id="divTableAdsManager"></div>
                </div><!-- /.box-body -->
                <div class="box-footer" id="pageAdminAds"></div><!-- /.box-footer-->
            </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<?php include("footer.php"); ?>
<?php include("foot.php"); ?>

<!-- input Create Control Panel -->
<div class="light row" id="lightCreateAdminAds" style="width: 80%; height: inherit; left: 19%; top: 11%;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm Mới Quảng Cáo</h3>
        </div>
        <div class="panel-body">
            <div class="row" id="divAdv">
                <div class="col-lg-12" style="margin: 3px;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row" style="margin: 10px;">
                                <span> Tên sự kiện quảng cáo <span style="color: red"> *</span></span>
                            </div>
                            <div class="row">
                                <input class="form-control" type="text" placeholder="Tên sự kiện quảng cáo" id="txtAdminAdsEvent" style="margin: 10px;">
                            </div>
                            <div class="row" style="margin: 10px;">
                                <span> Hình ảnh liên quan </span>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row" style="text-align: center; margin: 15px; padding: 20px;">
                                        <img style="width: 95%; height: 190px" id="imgPreviewAdminAds" src="<?php echo base_url() ?>assets/images/no_image.jpg"/>
                                    </div>
                                    <div class="row" id="divUploadAdminAds"></div>
                                    <div class="row" style="text-align: center; margin-right: 20%; margin-left: 20%;">
                                        <input type="hidden" id="divUploadAdminAdsID">
                                        <div class="col-lg-4" style="border: 1px solid grey; width: 70px; height: 60px; margin-right: 5px; background-image: url('<?php echo base_url() ?>assets/images/plus.jpg')" id="div10" onclick="$('#divUploadAdminAdsID').val('div10'); $('#upload10').click();"></div>
                                        <form id="frmUpload10" action="<?php echo base_url() ?>admin_advertisement/upload/1/upload10" method="POST" enctype="multipart/form-data">
                                            <input type="file" id="upload10" name="upload10" style="display: none" onchange="$('#sbAcc10').click()"/>
                                            <input type="submit" id="sbAcc10" name="sbAcc10" style="display: none" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_advertisement/upload/1/upload10', 'divUploadAdminAds', 'divUploadAdminAdsID', 'imgPreviewAdminAds'); return false;"/>
                                        </form>
                                        <div class="col-lg-4" style="border: 1px solid grey; width: 70px; height: 60px; margin-right: 5px; background-image: url('<?php echo base_url() ?>assets/images/plus.jpg')" id="div11" onclick="$('#divUploadAdminAdsID').val('div11'); $('#upload11').click();"></div>
                                        <form id="frmUpload11" action="<?php echo base_url() ?>admin_advertisement/upload/2/upload11" method="POST" enctype="multipart/form-data">
                                            <input type="file" id="upload11" name="upload11" style="display: none" onchange="$('#sbAcc11').click()"/>
                                            <input type="submit" id="sbAcc11" name="sbAcc11" style="display: none" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_advertisement/upload/2/upload11', 'divUploadAdminAds', 'divUploadAdminAdsID', 'imgPreviewAdminAds'); return false;"/>
                                        </form>
                                        <div class="col-lg-4" style="border: 1px solid grey; width: 70px; height: 60px; margin-right: 5px; background-image: url('<?php echo base_url() ?>assets/images/plus.jpg')" id="div12" onclick="$('#divUploadAdminAdsID').val('div12'); $('#upload12').click();"></div>
                                        <form id="frmUpload12" action="<?php echo base_url() ?>admin_advertisement/upload/3/upload12" method="POST" enctype="multipart/form-data">
                                            <input type="file" id="upload12" name="upload12" style="display: none" onchange="$('#sbAcc12').click()"/>
                                            <input type="submit" id="sbAcc12" name="sbAcc12" style="display: none" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_advertisement/upload/3/upload12', 'divUploadAdminAds', 'divUploadAdminAdsID', 'imgPreviewAdminAds'); return false;"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row" style="margin: 10px;">
                                <span> Thông tin liên quan đến sự kiện <span style="color: red"> *</span></span>
                            </div>
                            <div class="row" style="display: inline-block; margin: 10px;">
                                <textarea name="txtAdminAdsContent" id="txtAdminAdsContent" style="width: 100%; height: 40%"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 10px;">
                        <div class="col-md-12">
                            <div class="row" style="margin: 20px; text-align: left;">
                                <div class="col-md-5">
                                    <span> Liên kết giới thiệu sự kiện nếu có </span>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" placeholder="http://....." id="txtAdminAdsEventURL">
                                </div>
                            </div>
                            <div class="row">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckboxCreateAdminAds" checked> Hiển thị
                                </label>
                            </div>
                            <div class="row" style="margin: 20px; text-align: center;">
                                <span style="padding: 10px; width: 500px; background-color: darkorange; color: white; font-size: 18px; cursor: pointer; margin: 5px" id="spnCreateAdv" onclick="createNewAdminAds();">Đăng quảng cáo</span>
                                <span style="padding: 10px; width: 500px; background-color: darkorange; color: white; font-size: 18px; cursor: pointer; margin: 5px" id="spnCreateAdv" onclick="lightbox_close('lightCreateAdminAds', 'fadeCreateAdminAds');">Đóng cửa sổ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row fade" id="fadeCreateAdminAds" onClick="lightbox_close('lightCreateAdminAds', 'fadeCreateAdminAds');"></div>
<!-- end input Create Control Panel -->

<!---------------------------------------- XÁC NHẬN ---------------------------------------- !>
<!-- input Control Panel -->
<div class="row light" id="lightAdminAdsConfirm" style="width: 400px; height: 200px; top: 30%; left: 35%; border: 1px solid #000">
    <div class="col-lg-12">
        <div class="row" style="background-color: orange; font-weight: bolder; font-size: 20px; margin: 10px; padding: 10px; color: gray; text-align: center"><span style="padding: 20px">XÁC NHẬN</span></div>
        <p style="text-align: center; color: darkgreen; font-weight: bold">Sự kiện quảng cáo đã được tạo thành công!</p>
        <div class="row" style="text-align: center">
            <span style="padding: 10px; width: 500px; background-color: darkorange; color: white; font-size: 18px; cursor: pointer; margin: 30px" onclick="lightbox_close('lightAdminAdsConfirm', 'fadeAdminAdsConfirm');">Đóng cửa sổ</span>
        </div>
    </div>
</div>
<div class="fade" id="fadeAdminAdsConfirm" onClick="lightbox_close('lightAdminAdsConfirm', 'fadeAdminAdsConfirm');"></div>
<!-- end input Control Panel -->

<script>
    function getTableAdsManager(i){
        var url = "<?php echo base_url() ?>";
        $('#divTableAdsManager').load(url+"admin_advertisement/getTableAdsManager/"+i);
    }

    function createNewAdminAds(){
        var adName = $('#txtAdminAdsEvent').val();
//        var adDes = Base64.encode($('#txtAdminAdsContentwysiwyg').contents().find("body").html());
        var adDes = CKEDITOR.instances.txtAdminAdsContent.getData();
        if(adName == '' || adDes == ''){
            alert("Các thông đánh dấu * là các thông tin bắc buộc!");
        }
        else{
            var adURL = $('#txtAdminAdsEventURL').val();
            var active = 1;

            if(!$('#inlineCheckboxCreateAdminAds').is(':checked') ){ //kiem tra neu checkbox khong duoc check
                active = 0;
            }

            var dataString = "adName="+adName+"&adURL="+adURL+"&adDes="+adDes+"&active="+active;
//            alert(dataString);
            var url = "<?php echo base_url(); ?>";
            $.ajax({
                type: "POST",
                url: url+"admin_advertisement/createNewAds",
                data: dataString,
                success: function(x){
//                    alert(x);
                    if(x != '0'){
                        alert(x);
                    }
                    else{
                        //alert("đăng quảng cáo thành công!");
                        lightbox_close('lightCreateAdminAds', 'fadeCreateAdminAds');
                        getTableAdsManager();
                        getPage();
                        lightbox_open('lightAdminAdsConfirm', 'fadeAdminAdsConfirm');
                    }
                }
            });
        }
    }
</script>

<script>
    function getPage(){
        var url = "<?php echo base_url() ?>";
        $.ajax({
            url: url+"admin_advertisement/getPage",
            success: function(x){
                //alert(x);
                $('#pageAdminAds').html(x);
            }
        });
    }

    function emptySessionAdminAdsCreate(){
        var url = "<?php echo base_url() ?>";
        $.ajax({
            url: url+"admin_advertisement/emptySessionCreate",
            success: function(x){
//                alert(x);
            }
        });
    }
</script>

<script>
    //    $w.a('txtAdminAdsContent');
    CKEDITOR.replace( 'txtAdminAdsContent' );
</script>