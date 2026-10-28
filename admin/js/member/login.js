function showRequest(formData, jqForm, options) {

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    
    let json_data = JSON.parse(responseText);

    let status = json_data.status;
    let msg = json_data.msg;
            
    if (status === "success") {
        location.href = "/admin/user/user_all_update.php";
    } else {
        alert('로그인 접속 정보가 올바르지 않습니다.');
    }
}


$(document).ready(function() {

    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#login').ajaxForm(options);


});