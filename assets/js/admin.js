// ----- slider ----- //
function createNewAdminSlider(){
    var sliderName = $('#txtAdminSliderName').val();
    var sliderTitle = $('#txtAdminSliderTitle').val();

    if(sliderName == "" || sliderTitle == "" || $('#hiddenUploadSlider').val() == 0){
        alert("Các thông đánh dấu * là các thông tin bắc buộc!");
    }
    else{
        var sliderDescription = $('#txtAdminSliderDescription').val();
        var sliderLink = $('#txtAdminSliderLink').val();
        var sliderOrder = $('#txtAdminSliderOrder').val();
        var active = 1;
        if(!$('#inlineCheckboxCreateAdminSlider').is(':checked') ){ //kiem tra neu checkbox khong duoc check
            active = 0;
        }

        var dataString = "sliderName="+sliderName+"&sliderDescription="+sliderDescription+"&sliderLink="+sliderLink+"&sliderOrder="+sliderOrder+"&sliderTitle="+sliderTitle+"&active="+active;
        perform(dataString, "admin_slider", "insertNewSlider", "Tạo slider thành công!", "lightCreateAdminSlider", "fadeCreateAdminSlider");
    }
}

function setValueUpdateEditAdminSlider(sliderID, imageID, slider_name, slider_des, slider_link, slider_order, active, imageLink, imageTitle){
    emptySessionAdmin("admin_slider", "emptyImageEdit");
    $('#txtEditAdminSliderName').val(slider_name);
    $('#txtEditAdminSliderDescription').val(slider_des);
    $('#txtEditAdminSliderLink').val(slider_link);
    $('#txtEditAdminSliderOrder').val(slider_order);
    $('#txtEditAdminSliderTitle').val(imageTitle);
    $('#imgEditPreviewAdminSlider').attr("src", "../uploads/"+imageLink);
    $('#hiddenEditAdminSliderImagesLink').val(imageLink);
    $('#sliderEditFile').val('');
    $('#hiddenEditUploadSlider').val(1);
    $('#uploadEditSlider').hide();
    $('#hiddenEditAdminSliderID').val(sliderID);
    $('#hiddenEditAdminSliderIDImages').val(imageID);

    if(active == 0){
        $('#inlineCheckboxEditAdminSlider').prop("checked", false);
    }
    else{
        $('#inlineCheckboxEditAdminSlider').prop("checked", true);
    }

    lightbox_open('lightEditAdminSlider', 'fadeEditAdminSlider');
}

function updateSlider(){
    var sliderName = $('#txtEditAdminSliderName').val();
    var sliderTitle = $('#txtEditAdminSliderTitle').val();

    if(sliderName == "" || sliderTitle == "" || $('#hiddenEditUploadSlider').val() == 0){
        alert("Các thông đánh dấu * là các thông tin bắc buộc!");
    }
    else{
        var sliderDescription = $('#txtEditAdminSliderDescription').val();
        var sliderLink = $('#txtEditAdminSliderLink').val();
        var sliderOrder = $('#txtEditAdminSliderOrder').val();
        var sliderID = $('#hiddenEditAdminSliderID').val();
        var imageID = $('#hiddenEditAdminSliderIDImages').val();
        var imageLink = $('#hiddenEditAdminSliderImagesLink').val();

        var active = 1;
        if(!$('#inlineCheckboxEditAdminSlider').is(':checked') ){
            active = 0;
        }

        var dataString = "sliderName="+sliderName+"&sliderDescription="+sliderDescription+"&sliderLink="+sliderLink+"&sliderOrder="+sliderOrder
            +"&sliderTitle="+sliderTitle+"&active="+active+"&sliderID="+sliderID+"&imageID="+imageID+"&imageLink="+imageLink;
        perform(dataString, "admin_slider", "updateSlider", "Cập nhật slider thành công!", "lightEditAdminSlider", "fadeEditAdminSlider");
    }
}

function deleteSlider(id){
    var check = confirm("Bạn chắc chắn muốn xóa?");
    if(check == true){
        var id = id;
        var dataString = "id="+id;
        perform(dataString, "admin_slider", "deleteSlider", "Xóa slider thành công!", "lightEditAdminSlider", "fadeEditAdminSlider");
    }
    else{
        return;
    }
}

function emptySliderData(){
    $('#txtAdminSliderName').val('');
    $('#txtAdminSliderDescription').val('');
    $('#txtAdminSliderLink').val('');
    $('#txtAdminSliderOrder').val(0);
    $('#txtAdminSliderTitle').val('');
    $('#inlineCheckboxCreateAdminSlider').prop("checked", true);
    $('#imgPreviewAdminSlider').attr("src", $('#hiddenURL').val() + "assets/images/no-image.png");
    $('#sliderFile').val('');
    $('#hiddenUploadSlider').val(0);
    $('#uploadSlider').hide();
}

// ----- manager function ----- //
function perform(dataString, cont, func, strSuccess, light, fade){
    var url = $('#hiddenURL').val();
    var dataString = dataString;
    var cont = cont;
    var func = func;
    var strSuccess = strSuccess;
    var light = light;
    var fade = fade;
    $.ajax({
        type: "POST",
        url: url+cont+"/"+func,
        data: dataString,
        success: function(x){
            if(x != 0){
                alert(x);
            }
            else{
                $('#pConfirm').html(strSuccess);
                lightbox_close(light, fade);
                lightbox_open('lightAdminConfirm', 'fadeAdminConfirm');
            }
        }
    });
}

function emptySessionAdmin(cont, func){
    var cont = cont;
    var func = func;
    var url = $('#hiddenURL').val();
    $.ajax({
        url: url+cont+"/"+func
    });
}

function getTableManager(divTable, cont, func, i){
    var cont = cont;
    var func = func;
    var url = $('#hiddenURL').val();
    $('#'+divTable).load(url+cont+"/"+func+"/"+i);
}

function getPage(divPage, cont, func){
    var cont = cont;
    var func = func;
    var url = $('#hiddenURL').val();
    $.ajax({
        url: url+cont+"/"+func,
        success: function(x){
            //alert(x);
            $('#'+divPage).html(x);
        }
    });
}

function fileUpload(form, action_url, div_id, div_preview, divCheckUpload) {
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

        $('#'+div_id).show();
        if(content != "<p>You did not select a file to upload.</p>"){
            var num = content.split(/[^ \t\r\n]/)[0].length; //dem so khoang trang
//                alert(num);
            if(num == 0){
                $('#'+div_preview+'').attr('src', "../uploads/"+content);
            }
            $('#'+divCheckUpload).val('1');
            $('#'+div_id).css('border', '1px solid #00A65A');
            document.getElementById(div_id).innerHTML = "<p>Uploaded successfully!</p>";
        }
        else{
            $('#'+divCheckUpload).val('0');
            $('#'+div_id).css('border', '1px solid red');
            $('#'+div_preview+'').attr('src', src="../assets/images/no-image.png");
            document.getElementById(div_id).innerHTML = content;
        }
//            alert(content);

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

function prev(){
    var page = ($('#list li.active').index()-1); <!-- lay index cua li dang gan lop active -->
    $('#'+page).click();
}

function next(){
    var page = ($('#list li.active').index()+1);
    $('#'+page).click();
}

function lightbox_open(idLight, idFade){
    window.scrollTo(0,0);
    document.getElementById(idLight).style.display='block';
    document.getElementById(idFade).style.display='block';
}

function lightbox_close(idLight, idFade){
    document.getElementById(idLight).style.display='none';
    document.getElementById(idFade).style.display='none';
}