<?php include("head.php"); ?>
<body onload="getTableManager('divTableSliderManager', 'admin_slider', 'getTableSliderManager', 1); getPage('pageAdminSlider', 'admin_slider', 'getPage');" class="skin-blue">
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
                        <button class="btn btn-primary pull-right" onclick="lightbox_open('lightCreateAdminSlider', 'fadeCreateAdminSlider');"><span class="glyphicon glyphicon-plus"></span> Thêm Mới</button>
                    </div>
                    <div class="table-responsive" id="divTableSliderManager"></div>
                </div><!-- /.box-body -->
                <div class="box-footer" id="pageAdminSlider"></div><!-- /.box-footer-->
            </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<?php include("footer.php"); ?>
<?php include("foot.php"); ?>

<!-- input Create Control Panel -->
<div class="light row" id="lightCreateAdminSlider" style="width: 70%; height: inherit; left: 25%; top: 11%;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm Mới Slider</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 divPanelBody">
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
                        <input class="form-control" type="number" id="txtAdminSliderOrder" min="1" value="1" onchange="if($(this).val() < 1){this.value = 1;}">
                    </div>
                    <div class="row">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckboxCreateAdminSlider" checked> Hiển thị
                        </label>
                    </div>
                </div>
                <div class="col-md-6 divPanelBody">
                    <div class="row">
                        <span> Tải hình ảnh <span style="color: red"> *</span> (Kích thước chuẩn: 2000x1125)</span>
                    </div>
                    <div class="row">
                        <img class="imgPreviewAdmin" id="imgPreviewAdminSlider" src="<?php echo base_url() ?>assets/images/no-image.png"/>
                    </div>
                    <div class="row" id="imgPreviewSlider"></div>
                    <div class="row">
                        <form id="frmUploadSlider" action="<?php echo base_url() ?>admin_slider/upload" method="POST" enctype="multipart/form-data">
                            <input class="form-control" type="file" id="sliderFile" name="sliderFile" onclick="$('#uploadSlider').hide(); $('#uploadSlider').html('');">
                            <input type="submit" name="submit" value="Upload" class="form-control btn btn-success" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_slider/upload', 'uploadSlider', 'imgPreviewAdminSlider', 'hiddenUploadSlider'); return false;"/>
                        </form>
                    </div>
                    <input type="hidden" id="hiddenUploadSlider" value="0">
                    <div class="row divUpload" id="uploadSlider"></div>
                    <div class="row">
                        <span> Tiêu đề hình ảnh <span style="color: red"> *</span></span>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="txtAdminSliderTitle">
                    </div>
                </div>
            </div>
            <div class="row divControlAdmin">
                <input type="hidden" id="hiddenURL" value="<?php echo base_url(); ?>">
                <button class="btn btn-warning" onclick="emptySessionAdmin('admin_slider', 'emptyImageAdd'); emptySliderData();">Xóa thông tin đã điền</button>
                <button class="btn btn-primary" id="spnCreateAdv" onclick="createNewAdminSlider();">Hoàn tất</button>
                <button class="btn btn-danger" onclick="lightbox_close('lightCreateAdminSlider', 'fadeCreateAdminSlider');">Đóng cửa sổ</button>
            </div>
        </div>
    </div>
</div>
<div class="row fade" id="fadeCreateAdminSlider" onClick="lightbox_close('lightCreateAdminSlider', 'fadeCreateAdminSlider');"></div>
<!-- end input Create Control Panel -->
