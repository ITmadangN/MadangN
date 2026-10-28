$(document).ready(function() {

    var options = {
        // target:        '#output1',   // target element(s) to be updated with server response
        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse  // post-submit callback

        // other available options:
        //url:       url         // override for form's 'action' attribute
        //type:      type        // 'get' or 'post', override for form's 'method' attribute
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type)
        //clearForm: true        // clear all form fields after successful submit
        //resetForm: true        // reset the form after successful submit

        // $.ajax options can be used here too, for example:
        //timeout:   3000
    };

    // bind form using 'ajaxForm'
    $('#formp').ajaxForm(options);

});

// pre-submit callback
function showRequest(formData, jqForm, options) {

    var queryString = $.param(formData);

    if($("#history_title").val() === "") {
        alert_msg("제목이 필수정보 입니다.")
        return false;
    }

    return true;
}


function showResponse(responseText, statusText, xhr, $form)  {

    if(statusText === "success") {
        alert('업데이트가 정상적으로 수행되었습니다.');
    }
    else {
        alert('업데이트에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}