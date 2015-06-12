<table class="table table-striped table-bordered table-hover">
    <?php if(empty($adsList)){echo "<i>Hiện không có quảng cáo nào</i>";} else{ ?>
    <thead>
    <tr>
        <th>#</th>
        <th>Tên quảng cáo</th>
        <th>Hình ảnh</th>
        <th>Trạng thái</th>
        <th>Ngày đăng</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; foreach($adsList as $objAdsList){ ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $objAdsList->ads_name ?></td>
        <?php if($objAdsList->image1 != '' && $objAdsList->image1 != 0){ ?>
            <td><img style="width: 150px; height: 100px" src="<?php echo base_url()."uploads/".$objAdsList->image1; ?>"></td>
        <?php }else if($objAdsList->image2 != ''){ ?>
            <td><img style="width: 150px; height: 100px" src="<?php echo base_url()."uploads/".$objAdsList->image2; ?>"></td>
        <?php }else if($objAdsList->image3 != ''){ ?>
            <td><img style="width: 150px; height: 100px" src="<?php echo base_url()."uploads/".$objAdsList->image3; ?>"></td>
        <?php }else{ ?>
            <td><img style="width: 150px; height: 100px" src="<?php echo base_url(); ?>assets/images/no-garage-image-available.png"></td>
        <?php } ?>
        <td><?php if($objAdsList->active == 1){echo "Hiển thị";} else{echo "Không hiển thị";} ?></td>
        <td><?php echo $objAdsList->ads_date ?></td>
        <td>
            <input type="hidden" id="hidAdminEditAdminAdsID<?php echo $i ?>" value="<?php echo $objAdsList->adID ?>">
            <input type="hidden" id="hidAdminEditAdminAdsIDImages<?php echo $i ?>" value="<?php echo $objAdsList->imID ?>">
            <input type="hidden" id="hidAdminEditAdminAdsName<?php echo $i ?>" value="<?php echo $objAdsList->ads_name ?>">
            <input type="hidden" id="hidAdminEditAdminAdsDes<?php echo $i ?>" value='<?php echo $objAdsList->ads_description ?>'> <!-- su dung '' de dong, mo thuoc tinh (gia tri co dau "") -->
            <input type="hidden" id="hidAdminEditAdminAdsLink<?php echo $i ?>" value="<?php echo $objAdsList->ads_link ?>">
            <input type="hidden" id="hidAdminEditAdminAdsActive<?php echo $i ?>" value="<?php echo $objAdsList->active ?>">
            <input type="hidden" id="hidAdminEditAdminAdsImage1<?php echo $i ?>" value="<?php echo $objAdsList->image1 ?>">
            <input type="hidden" id="hidAdminEditAdminAdsImage2<?php echo $i ?>" value="<?php echo $objAdsList->image2 ?>">
            <input type="hidden" id="hidAdminEditAdminAdsImage3<?php echo $i ?>" value="<?php echo $objAdsList->image3 ?>">

            <a style='cursor: pointer' class='btn btn-warning btn-xs pull-right' onclick='setValueUpdateEditAdminAds($("#hidAdminEditAdminAdsID<?php echo $i ?>").val()
            , $("#hidAdminEditAdminAdsIDImages<?php echo $i ?>").val(), $("#hidAdminEditAdminAdsName<?php echo $i ?>").val(), $("#hidAdminEditAdminAdsDes<?php echo $i ?>").val(), $("#hidAdminEditAdminAdsLink<?php echo $i ?>").val()
            , $("#hidAdminEditAdminAdsActive<?php echo $i ?>").val(), $("#hidAdminEditAdminAdsImage1<?php echo $i ?>").val(), $("#hidAdminEditAdminAdsImage2<?php echo $i ?>").val(), $("#hidAdminEditAdminAdsImage3<?php echo $i ?>").val());'>
                <span class='glyphicon glyphicon-pencil'></span>
            </a>
            <a class='btn btn-danger btn-xs pull-right' onclick="deleteAds('<?php echo $objAdsList->adID ?>')"><span class='glyphicon glyphicon-remove'></span></a>
        </td>
    </tr>
    <?php $i++; } ?>
    </tbody>
    <?php } ?>
</table>

<!-- input Edit Control Panel -->
<div class="light row" id="lightEditAdminAds" style="width: 80%; height: inherit; left: 19%; top: 11%;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Chỉnh Sửa Quảng Cáo</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12" style="margin: 3px;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row" style="margin: 10px;">
                                <span> Tên sự kiện quảng cáo <span style="color: red"> *</span></span>
                            </div>
                            <div class="row">
                                <input class="form-control" type="text" placeholder="Tên sự kiện quảng cáo" id="txtEditAdminAdsEvent" style="margin: 10px;">
                            </div>
                            <div class="row" style="margin: 10px;">
                                <span> Hình ảnh liên quan </span>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row" style="text-align: center; margin: 10px; padding: 20px;">
                                        <img style="width: 95%; height: 190px" id="imgPreviewEditAdminAds" src="<?php echo base_url() ?>assets/images/no_image.jpg"/>
                                    </div>
                                    <div class="row" style="text-align: center;" id="divUploadEditAdminAds"></div>
                                    <div class="row" style="text-align: center; margin-right: 20%; margin-left: 20%;">
                                        <input type="hidden" id="divUploadEditAdminAdsID">
                                        <div class="col-md-4" style="border: 1px solid grey; width: 70px; height: 60px; margin-right: 5px; background-image: url('<?php echo base_url() ?>assets/images/plus.jpg')" id="div13" onclick="$('#divUploadEditAdminAdsID').val('div13'); $('#upload13').click();"></div>
                                        <input type="hidden" id="hidEditAdminAdsImage1">
                                        <form id="frmUpload13" action="<?php echo base_url() ?>admin_advertisement/upload/4/upload13" method="POST" enctype="multipart/form-data">
                                            <input type="file" id="upload13" name="upload13" style="display: none" onchange="$('#sbAcc13').click()"/>
                                            <input type="submit" id="sbAcc13" name="sbAcc13" style="display: none" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_advertisement/upload/4/upload13','divUploadEditAdminAds', 'divUploadEditAdminAdsID', 'imgPreviewEditAdminAds'); return false;"/>
                                        </form>
                                        <div class="col-md-4" style="border: 1px solid grey; width: 70px; height: 60px; margin-right: 5px; background-image: url('<?php echo base_url() ?>assets/images/plus.jpg')" id="div14" onclick="$('#divUploadEditAdminAdsID').val('div14'); $('#upload14').click();"></div>
                                        <input type="hidden" id="hidEditAdminAdsImage2">
                                        <form id="frmUpload14" action="<?php echo base_url() ?>admin_advertisement/upload/5/upload14" method="POST" enctype="multipart/form-data">
                                            <input type="file" id="upload14" name="upload14" style="display: none" onchange="$('#sbAcc14').click()"/>
                                            <input type="submit" id="sbAcc14" name="sbAcc14" style="display: none" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_advertisement/upload/5/upload14','divUploadEditAdminAds', 'divUploadEditAdminAdsID', 'imgPreviewEditAdminAds'); return false;"/>
                                        </form>
                                        <div class="col-md-4" style="border: 1px solid grey; width: 70px; height: 60px; margin-right: 5px; background-image: url('<?php echo base_url() ?>assets/images/plus.jpg')" id="div15" onclick="$('#divUploadEditAdminAdsID').val('div15'); $('#upload15').click();"></div>
                                        <input type="hidden" id="hidEditAdminAdsImage3">
                                        <form id="frmUpload15" action="<?php echo base_url() ?>admin_advertisement/upload/6/upload15" method="POST" enctype="multipart/form-data">
                                            <input type="file" id="upload15" name="upload15" style="display: none" onchange="$('#sbAcc15').click()"/>
                                            <input type="submit" id="sbAcc15" name="sbAcc15" style="display: none" onclick="fileUpload(this.form, '<?php echo base_url() ?>admin_advertisement/upload/6/upload15','divUploadEditAdminAds', 'divUploadEditAdminAdsID', 'imgPreviewEditAdminAds'); return false;"/>
                                        </form>
                                    </div>
                                    <div class="row" style="text-align: center; margin-right: 20%; margin-left: 20%;">
                                        <div class="col-md-4" style="width: 70px; height: 60px; margin-right: 5px;">
                                            <button class="btn btn-default btn-xs" onclick="deleteImageAdminAds('1', '13')"><span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                        <div class="col-md-4" style="width: 70px; height: 60px; margin-right: 5px;">
                                            <button class="btn btn-default btn-xs" onclick="deleteImageAdminAds('2', '14')"><span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                        <div class="col-md-4" style="width: 70px; height: 60px; margin-right: 5px;">
                                            <button class="btn btn-default btn-xs" onclick="deleteImageAdminAds('3', '15')"><span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row" style="margin: 10px;">
                                <span> Thông tin liên quan đến sự kiện <span style="color: red"> *</span></span>
                            </div>
                            <div class="row" style="display: inline-block; margin: 10px;">
                                <textarea name="txtEditAdminAdsContent" id="txtEditAdminAdsContent" style="width: 100%; height: 40%"></textarea>
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
                                    <input class="form-control" type="text" placeholder="http://....." id="txtEditAdminAdsEventURL">
                                </div>
                            </div>
                            <div class="row">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckboxEditAdminAds" checked> Hiển thị
                                </label>
                            </div>
                            <div class="row" style="margin: 20px; text-align: center;">
                                <input type="hidden" id="hiddenEditAdminAdsID">
                                <input type="hidden" id="hiddenEditAdminAdsIDImages">
                                <span style="padding: 10px; width: 500px; background-color: darkorange; color: white; font-size: 18px; cursor: pointer; margin: 5px" id="spnCreateAdv" onclick="updateAds();">Cập nhật</span>
                                <span style="padding: 10px; width: 500px; background-color: darkorange; color: white; font-size: 18px; cursor: pointer; margin: 5px" id="spnCreateAdv" onclick="lightbox_close('lightEditAdminAds', 'fadeEditAdminAds');">Đóng cửa sổ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row fade" id="fadeEditAdminAds" onClick="lightbox_close('lightEditAdminAds', 'fadeEditAdminAds');"></div>
<!-- end Edit Control Panel -->

<!---------------------------------------- XÁC NHẬN ---------------------------------------- !>
<!-- input Control Panel -->
<div class="row light" id="lightEditConfirmAdminAds" style="width: 400px; height: 200px; top: 30%; left: 35%; border: 1px solid #000">
    <div class="row" style="background-color: orange; font-weight: bolder; font-size: 20px; padding: 10px; margin: 10px; color: gray; text-align: center"><span style="padding: 20px">XÁC NHẬN</span></div>
    <div class="row"><p style="text-align: center; color: darkgreen; font-weight: bold">Cập nhật quảng cáo thành công!</p></div>
    <div class="row" style="margin: 5px; text-align: center">
        <span style="padding: 10px; width: 500px; background-color: darkorange; color: white; font-size: 18px; cursor: pointer; margin: 20px" onclick="getTableAdsManager(); getPage()">Đóng cửa sổ</span>
    </div>
</div>
<div class="row fade" id="fadeEditConfirmAdminAds" onClick="lightbox_close('lightEditConfirmAdminAds', 'fadeEditConfirmAdminAds');"></div>
<!-- end input Control Panel -->

<script>
    function setValueUpdateEditAdminAds(adID, imID, ads_name, ads_des, ads_link, active, image1, image2, image3){
        emptySessionAdminAdsEdit();
        $('#hiddenEditAdminAdsID').val(adID);
        $('#hiddenEditAdminAdsIDImages').val(imID);
        $('#txtEditAdminAdsEvent').val(ads_name);
        $('#txtEditAdminAdsEventURL').val(ads_link);
//        var ads_des = Base64.decode(ads_des);
//        $('#txtEditAdminAdsContentwysiwyg').contents().find('body').html(ads_des);
        CKEDITOR.instances.txtEditAdminAdsContent.setData(ads_des);

        $('#hidEditAdminAdsImage1').val(image1);
        $('#hidEditAdminAdsImage2').val(image2);
        $('#hidEditAdminAdsImage3').val(image3);

        if(active == 0){
            $('#inlineCheckboxEditAdminAds').prop("checked", false);
        }
        else{
            $('#inlineCheckboxEditAdminAds').prop("checked", true);
        }

        var divID1 = document.getElementById('div13');
        divID1.style.backgroundSize = "70px 60px";
        if(image1 != '' && image1 != 0){
            divID1.style.backgroundImage = "url('<?php echo base_url() ?>uploads/"+image1+"')";
        }
        else{
            divID1.style.backgroundImage = "url('<?php echo base_url() ?>assets/images/no-garage-image-available.png')";
        }

        var divID2 = document.getElementById('div14');
        divID2.style.backgroundSize = "70px 60px";
        if(image2 != '' && image2 != 0){
            divID2.style.backgroundImage = "url('<?php echo base_url() ?>uploads/"+image2+"')";
        }
        else{
            divID2.style.backgroundImage = "url('<?php echo base_url() ?>assets/images/no-garage-image-available.png')";
        }

        var divID3 = document.getElementById('div15');
        divID3.style.backgroundSize = "70px 60px";
        if(image3 != '' && image3 != 0){
            divID3.style.backgroundImage = "url('<?php echo base_url() ?>uploads/"+image3+"')";
        }
        else{
            divID3.style.backgroundImage = "url('<?php echo base_url() ?>assets/images/no-garage-image-available.png')";
        }

        var flag;
        if(image1 != ''){
            flag = image1;
        }
        else{
            if(image2 != ''){
                flag = image2;
            }
            else{
                if(image3 != ''){
                    flag = image3;
                }
                else{
                    flag = "0";
                }
            }
        }

        if(flag != '0'){
            $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>uploads/'+flag+'');
        }
        else{
            $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>assets/images/no-garage-image-available.png');
        }

        lightbox_open('lightEditAdminAds', 'fadeEditAdminAds');
    }

    function updateAds(){
        var id = $('#hiddenEditAdminAdsID').val();
        var idImages = $('#hiddenEditAdminAdsIDImages').val();
        var ads_name = $('#txtEditAdminAdsEvent').val();
        var ads_link = $('#txtEditAdminAdsEventURL').val();
//        var ads_des = Base64.encode($('#txtEditAdminAdsContentwysiwyg').contents().find('body').html());
        var ads_des = CKEDITOR.instances.txtEditAdminAdsContent.getData();
        var image1 = $('#hidEditAdminAdsImage1').val();
        var image2 = $('#hidEditAdminAdsImage2').val();
        var image3 = $('#hidEditAdminAdsImage3').val();

        var active = 1;
        if(!$('#inlineCheckboxEditAdminAds').is(':checked') ){
            active = 0;
        }

        if(ads_name == '' || ads_des == ''){
            alert("Các thông đánh dấu * là các thông tin bắc buộc!");
        }
        else{
            var url = "<?php echo base_url() ?>";
            var dataString = "id="+id+"&idImages="+idImages+"&ads_name="+ads_name+"&ads_link="+ads_link+"&ads_des="+ads_des+"&image1="+image1+"&image2="+image2+"&image3="+image3+"&active="+active;
//            alert(dataString);
            $.ajax({
                type: "POST",
                url: url+"admin_advertisement/updateAds",
                data: dataString,
                success: function(x){
//                    alert(x);
                    if(x == '0'){
                        lightbox_close('lightEditAdminAds', 'fadeEditAdminAds');
                        lightbox_open('lightEditConfirmAdminAds', 'fadeEditConfirmAdminAds');
                    }
                    else{
                        alert(x);
                    }
                }
            });
        }
    }

    function deleteAds(id){
        //alert(id);
        var check = confirm("Bạn chắc chắn muốn xóa?");
        if(check == true){
            var id = id;
            var url = "<?php echo base_url() ?>";
            var dataString = "id="+id;

            $.ajax({
                type: "POST",
                url: url+"admin_advertisement/deleteAds",
                data: dataString,
                success: function(x){
                    //alert(x);
                    if(x == '0'){
                        getTableAdsManager();
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

    function deleteImageAdminAds(i, j){
        var image1 = $('#hidEditAdminAdsImage1').val();
        var image2 = $('#hidEditAdminAdsImage2').val();
        var image3 = $('#hidEditAdminAdsImage3').val();

        if(i == 1){
            if(image2 != ''){
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>uploads/'+image2+'');
            }
            else if(image3 != ''){
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>uploads/'+image3+'');
            }
            else{
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>assets/images/no-garage-image-available.png');
            }
        }

        if(i == 2){
            if(image1 != ''){
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>uploads/'+image1+'');
            }
            else if(image3 != ''){
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>uploads/'+image3+'');
            }
            else{
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>assets/images/no-garage-image-available.png');
            }
        }

        if(i == 3){
            if(image1 != ''){
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>uploads/'+image1+'');
            }
            else if(image2 != ''){
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>uploads/'+image2+'');
            }
            else{
                $('#imgPreviewEditAdminAds').attr('src', '<?php echo base_url() ?>assets/images/no-garage-image-available.png');
            }
        }

        $('#hidEditAdminAdsImage'+i).val('');
        $('#div'+j).css('background-image', 'url(' + '<?php echo base_url() ?>assets/images/no-garage-image-available.png' + ')');
    }

    function emptySessionAdminAdsEdit(){
        var url = "<?php echo base_url() ?>";
        $.ajax({
            url: url+"admin_advertisement/emptySessionEdit",
            success: function(x){
//                alert(x);
            }
        });
    }
</script>

<script language="JavaScript" type="text/javascript">
    function lightbox_open(idLight, idFade){
        window.scrollTo(0,0);
        document.getElementById(idLight).style.display='block';
        document.getElementById(idFade).style.display='block';
    }

    function lightbox_close(idLight, idFade){
        document.getElementById(idLight).style.display='none';
        document.getElementById(idFade).style.display='none';
    }
</script>
<script>
//    $w.a('txtEditAdminAdsContent');
    CKEDITOR.replace( 'txtEditAdminAdsContent' );

</script>
