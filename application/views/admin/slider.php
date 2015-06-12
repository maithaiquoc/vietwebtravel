<?php include "header.php" ?>
<body onload="getTableAdsManager(1); getPage();" class="skin-blue">
<div id="wrapper" style="background-color: white">

    <?php include "main.php" ?>

    <div id="page-wrapper" style="background-color: white">

        <div class="container-fluid" style="background-color: white">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Quản lý quảng cáo
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> <a href="<?php echo base_url() ?>admin/advertisement">Quản Lý Quảng Cáo</a>
                        </li>
                        <li class="pull-right">
                            <button class="btn btn-primary btn-xs" onclick="emptySessionAdminAdsCreate(); lightbox_open('lightCreateAdminAds', 'fadeCreateAdminAds')"><span class="glyphicon glyphicon-plus"></span> Thêm Mới</button>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="table-responsive" id="divTableAdsManager"></div>
            <div class="row" id="pageAdminAds"></div>
        </div>
    </div>
</div>

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
    function prev(){
        var page = ($('#list li.active').index()-1); <!-- lay index cua li dang gan lop active -->
        $('#'+page).click();
    }

    function next(){
        var page = ($('#list li.active').index()+1);
        $('#'+page).click();
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

<script language="Javascript">
    function fileUpload(form, action_url, div_id, div_upload, div_preview) {
        // Create the iframe...
        var iframe = document.createElement("iframe");
        iframe.setAttribute("id", "upload_iframe");
        iframe.setAttribute("name", "upload_iframe");
        iframe.setAttribute("width", "0");
        iframe.setAttribute("height", "0");
        iframe.setAttribute("border", "0");
        iframe.setAttribute("style", "width: 0; height: 0; border: none;");

        // Add to document...
        form.parentNode.appendChild(iframe);
        window.frames['upload_iframe'].name = "upload_iframe";

        iframeId = document.getElementById("upload_iframe");

        // Add event...
        var eventHandler = function () {

            if (iframeId.detachEvent) iframeId.detachEvent("onload", eventHandler);
            else iframeId.removeEventListener("load", eventHandler, false);

            // Message from server...
            if (iframeId.contentDocument) {
                content = iframeId.contentDocument.body.innerHTML;
            } else if (iframeId.contentWindow) {
                content = iframeId.contentWindow.document.body.innerHTML;
            } else if (iframeId.document) {
                content = iframeId.document.body.innerHTML;
            }

            if(content != "<p>You did not select a file to upload.</p>"){
                var num = content.split(/[^ \t\r\n]/)[0].length; //dem so khoang trang
//                alert(num);
                if(num == 0){
                    var idDiv2 = $('#'+div_upload+'').val();
//                    alert(idDiv2);
                    var divID2 = document.getElementById(idDiv2);
                    divID2.style.backgroundSize = "70px 60px";
                    divID2.style.backgroundImage = "url('<?php echo base_url() ?>uploads/"+content+"')";
                    $('#'+div_preview+'').attr('src', '<?php echo base_url() ?>uploads/'+content+'');
                }
            }

//            alert(content);
            document.getElementById(div_id).innerHTML = content;

            // Del the iframe...
            setTimeout('iframeId.parentNode.removeChild(iframeId)', 250);
        }

        if (iframeId.addEventListener) iframeId.addEventListener("load", eventHandler, true);
        if (iframeId.attachEvent) iframeId.attachEvent("onload", eventHandler);

        // Set properties of form...
        form.setAttribute("target", "upload_iframe");
        form.setAttribute("action", action_url);
        form.setAttribute("method", "post");
        form.setAttribute("enctype", "multipart/form-data");
        form.setAttribute("encoding", "multipart/form-data");

        // Submit the form...
        form.submit();

        document.getElementById(div_id).innerHTML = "Đang tải tập tin...";
    }
</script>

<script>
    //    $w.a('txtAdminAdsContent');
    CKEDITOR.replace( 'txtAdminAdsContent' );

</script>

<?php include "footer.php" ?>

</body>

</html>