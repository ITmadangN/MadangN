
function showRequest(formData, jqForm, options) {
    
    return true;
}

function showResponse(responseText, statusText, xhr, $form) {

    if (statusText === "success") {
        alert('관리자에게 신고내용을 전달했습니다.');
        $("#description").val("");
        document.querySelector('#uc-report-modal .uc-modal-close-default').click();
    } else {
        alert('신고 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}


function showRequest_msg(formData, jqForm, options) {

    return true;
}

function showResponse_msg(responseText, statusText, xhr, $form) {

    if (statusText === "success") {
        alert('쪽지를 보냈습니다.');
        $("#title").val($("#memo_title").val());
        $("#content").val("");
        document.querySelector('#uc-memo-modal .uc-modal-close-default').click();
    } else {
        alert('쪽지 보내는 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}


$(document).ready(function() {

    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    var options_msg = {
        beforeSubmit: showRequest_msg,
        success: showResponse_msg
    };

    $('#false_report').ajaxForm(options);
    $('#user_messages').ajaxForm(options_msg);

})