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
<div class="light row" id="lightCreateAdminAds" style="width: 70%; height: inherit; left: 25%; top: 11%;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm Mới Slider</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6" id="divNewSlider">
                    <div class="row">
                        <span> Tên slider <span class="required"> *</span></span>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="txtAdminSliderName">
                    </div>
                    <div class="row">
                        <span> Mô tả </span>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="txtAdminSliderDescription">
                    </div>
                    <div class="row">
                        <span> Đường dẫn liên kết </span>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="txtAdminSliderLink">
                    </div>
                    <div class="row">
                        <span> Thứ tự sắp xếp </span>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="txtAdminSliderOrder">
                    </div>
                    <div class="row">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckboxCreateAdminSlider" checked> Hiển thị
                        </label>
                    </div>
                </div>
                <div class="col-md-6" id="divNewSlider">
                    <div class="row">
                        <span> Tải hình ảnh <span style="color: red"> *</span> (Kích thước chuẩn: 2000x1125)</span>
                    </div>
                    <div class="row">
                        <img class="imgPreviewAdmin" id="imgPreviewAdminSlider" src="<?php echo base_url() ?>assets/images/no-image.png"/>
                    </div>
                    <div class="row" id="divUploadAdminSlider"></div>
                        <input type="hidden" id="divUploadAdminAdsID">
                        <div class="row btn-upload" id="div11" onclick="$('#divUploadAdminAdsID').val('div11'); $('#upload11').click();"></div>
                        <form id="frmUpload11" action="<?php echo base_url() ?>admin_advertisement/upload/2/upload11" method="POST" enctype="multipart/form-data">
                            <input type="file" id="upload11" name="upload11" style="display: none" onchange="$('#sbAcc11').click()"/>
                            <input type="submit" id="sbAcc11" name="sbAcc11" style="display: none" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_advertisement/upload/2/upload11', 'divUploadAdminAds', 'divUploadAdminAdsID', 'imgPreviewAdminAds'); return false;"/>
                        </form>
                    <div class="row">
                        <span> Tiêu đề hình ảnh <span style="color: red"> *</span></span>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="txtAdminSliderTitle">
                    </div>
                </div>
            </div>
            <div class="row divControlAdmin">
                <button class="btn btn-warning" id="spnCreateAdv" onclick="createNewAdminAds();">Hoàn tất</button>
                <button class="btn btn-warning" onclick="lightbox_close('lightCreateAdminAds', 'fadeCreateAdminAds');">Đóng cửa sổ</button>
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