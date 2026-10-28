
$(document).ready(function() {

    var options = {

        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse  // post-submit callback

    };

    $('#formp').ajaxForm(options);

});

function showRequest(formData, jqForm, options) {

    var queryString = $.param(formData);

    return true;
}


function showResponse(responseText, statusText, xhr, $form)  {

    if(statusText === "success") {
        alert('등록이 정상적으로 수행되었습니다.');
        location.href = "/admin/towninfo/marketsale_market_list.php";
    }
    else {
        alert('등록중에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}