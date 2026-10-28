
$(document).ready(function() {

    var options = {

        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse  // post-submit callback

    };

    $('#formp').ajaxForm(options);

    $('#desired_start_date').datepicker({
        dateFormat: 'yymmdd', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });
        
    $('#desired_end_date').datepicker({
        dateFormat: 'yymmdd', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });

    $('#start_date').datepicker({
        dateFormat: 'yymmdd', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });  
        
    $('#end_date').datepicker({
        dateFormat: 'yymmdd', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });    

});

function showRequest(formData, jqForm, options) {

    var queryString = $.param(formData);


    return true;
}


function showResponse(responseText, statusText, xhr, $form)  {

    if(statusText === "success") {
        alert('업데이트가 정상적으로 수행되었습니다.');
        location.href="banner_pay_list.php";
    }
    else {
        alert('업데이트에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}