<table class="table table-striped table-bordered table-hover">
    <?php if(empty($sliderList)){echo "<i>Hiện không có slider trong dữ liệu</i>";} else{ ?>
    <thead>
    <tr>
        <th>#</th>
        <th>Tên slider</th>
        <th>Hình ảnh</th>
        <th>Trạng thái</th>
        <th>Thứ tự sắp xếp</th>
        <th>Ngày đăng</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; foreach($sliderList as $objSliderList){ ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $objSliderList->slider_name ?></td>
        <td><img style="width: 150px; height: 100px" src="<?php echo base_url()."uploads/".$objSliderList->image_link; ?>"></td>
        <td><?php if($objSliderList->slider_active == 1){echo "Hiển thị";} else{echo "Không hiển thị";} ?></td>
        <td><?php echo $objSliderList->slider_order ?></td>
        <td><?php echo $objSliderList->addition_datetime ?></td>
        <td>
            <input type="hidden" id="hidAdminEditAdminSliderID<?php echo $i ?>" value="<?php echo $objSliderList->id_slider ?>">
            <input type="hidden" id="hidAdminEditAdminSliderIDImages<?php echo $i ?>" value="<?php echo $objSliderList->id_image ?>">
            <input type="hidden" id="hidAdminEditAdminSliderName<?php echo $i ?>" value="<?php echo $objSliderList->slider_name ?>">
            <input type="hidden" id="hidAdminEditAdminSliderDes<?php echo $i ?>" value='<?php echo $objSliderList->slider_description ?>'>
            <input type="hidden" id="hidAdminEditAdminSliderLink<?php echo $i ?>" value="<?php echo $objSliderList->slider_link ?>">
            <input type="hidden" id="hidAdminEditAdminSliderOrder<?php echo $i ?>" value="<?php echo $objSliderList->slider_order ?>">
            <input type="hidden" id="hidAdminEditAdminSliderActive<?php echo $i ?>" value="<?php echo $objSliderList->slider_active ?>">
            <input type="hidden" id="hidAdminEditAdminSliderImageLink<?php echo $i ?>" value="<?php echo $objSliderList->image_link ?>">
            <input type="hidden" id="hidAdminEditAdminSliderImageTitle<?php echo $i ?>" value="<?php echo $objSliderList->image_title ?>">

            <a style='cursor: pointer' class='btn btn-warning btn-xs pull-right' onclick='setValueUpdateEditAdminSlider($("#hidAdminEditAdminSliderID<?php echo $i ?>").val()
            , $("#hidAdminEditAdminSliderIDImages<?php echo $i ?>").val(), $("#hidAdminEditAdminSliderName<?php echo $i ?>").val(), $("#hidAdminEditAdminSliderDes<?php echo $i ?>").val(), $("#hidAdminEditAdminSliderLink<?php echo $i ?>").val()
            , $("#hidAdminEditAdminSliderOrder<?php echo $i ?>").val(), $("#hidAdminEditAdminSliderActive<?php echo $i ?>").val(), $("#hidAdminEditAdminSliderImageLink<?php echo $i ?>").val(), $("#hidAdminEditAdminSliderImageTitle<?php echo $i ?>").val());'>
                <span class='glyphicon glyphicon-pencil'></span>
            </a>
            <a class='btn btn-danger btn-xs pull-right' onclick="deleteSlider('<?php echo $objSliderList->id_slider ?>')"><span class='glyphicon glyphicon-remove'></span></a>
        </td>
    </tr>
    <?php $i++; } ?>
    </tbody>
    <?php } ?>
</table>

<!-- input Edit Control Panel -->
<div class="light row" id="lightEditAdminSlider" style="width: 85%; height: inherit; left: 9%; top: -5%;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Chỉnh Sửa Slider</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6 divPanelBody">
                <div class="row">
                    <span> Tên slider <span class="required"> *</span></span>
                </div>
                <div class="row">
                    <input class="form-control" type="text" id="txtEditAdminSliderName">
                </div>
                <div class="row">
                    <span> Mô tả </span>
                </div>
                <div class="row">
                    <input class="form-control" type="text" id="txtEditAdminSliderDescription">
                </div>
                <div class="row">
                    <span> Đường dẫn liên kết </span>
                </div>
                <div class="row">
                    <input class="form-control" type="text" id="txtEditAdminSliderLink">
                </div>
                <div class="row">
                    <span> Thứ tự sắp xếp </span>
                </div>
                <div class="row">
                    <input class="form-control" type="number" id="txtEditAdminSliderOrder" min="1" value="1" onchange="if($(this).val() < 1){this.value = 1;}">
                </div>
                <div class="row">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckboxEditAdminSlider" checked> Hiển thị
                    </label>
                </div>
            </div>
            <div class="col-md-6 divPanelBody">
                <div class="row">
                    <span> Tải hình ảnh <span style="color: red"> *</span> (Kích thước chuẩn: 2000x1125)</span>
                </div>
                <div class="row">
                    <img class="imgPreviewAdmin" id="imgEditPreviewAdminSlider" src="<?php echo base_url() ?>assets/images/no-image.png"/>
                </div>
                <div class="row" id="imgEditPreviewSlider"></div>
                <div class="row">
                    <form id="frmEditUploadSlider" action="<?php echo base_url() ?>admin_slider/uploadEdit" method="POST" enctype="multipart/form-data">
                        <input class="form-control" type="file" id="sliderEditFile" name="sliderEditFile" onclick="$('#uploadEditSlider').hide(); $('#uploadEditSlider').html('');">
                        <input type="submit" name="submit" value="Upload" class="form-control btn btn-success" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_slider/uploadEdit', 'uploadEditSlider', 'imgEditPreviewAdminSlider', 'hiddenEditUploadSlider'); return false;"/>
                    </form>
                </div>
                <input type="hidden" id="hiddenEditUploadSlider" value="1">
                <div class="row" id="uploadEditSlider"></div>
                <div class="row">
                    <span> Tiêu đề hình ảnh <span style="color: red"> *</span></span>
                </div>
                <div class="row">
                    <input class="form-control" type="text" id="txtEditAdminSliderTitle">
                </div>
            </div>
            <div class="row" style="margin: 10px;">
                <div class="row" style="margin: 20px; text-align: center;">
                    <input type="hidden" id="hiddenEditAdminSliderID">
                    <input type="hidden" id="hiddenEditAdminSliderIDImages">
                    <input type="hidden" id="hiddenEditAdminSliderImagesLink">
                    <button class="btn btn-primary" onclick="updateSlider();">Cập nhật</button>
                    <button class="btn btn-danger" onclick="lightbox_close('lightEditAdminSlider', 'fadeEditAdminSlider');">Đóng cửa sổ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row fade" id="fadeEditAdminSlider" onClick="lightbox_close('lightEditAdminSlider', 'fadeEditAdminSlider');"></div>
<!-- end Edit Control Panel -->

<script>
    function deleteSlider(id){
        //alert(id);
        var check = confirm("Bạn chắc chắn muốn xóa?");
        if(check == true){
            var id = id;
            var url = "<?php echo base_url() ?>";
            var dataString = "id="+id;

            $.ajax({
                type: "POST",
                url: url+"admin_advertisement/deleteSlider",
                data: dataString,
                success: function(x){
                    //alert(x);
                    if(x == '0'){
                        getTableSliderManager();
                        getPage();
                    }
                    else{
                        alert(x);
                    }
                }
            });
        }
        else{
            return;
        }
    }
</script>

