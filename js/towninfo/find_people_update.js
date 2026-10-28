
function showRequest(formData, jqForm, options) {

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    if (statusText === "success") {
        alert('수정이 정상적으로 수행되었습니다.');
        location.href = "/towninfo/find_people.php";
    } else {
        alert('수정 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}


$(document).ready(function() {

    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#formp').ajaxForm(options);


});