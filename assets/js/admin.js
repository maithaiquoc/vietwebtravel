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
