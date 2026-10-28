function GET_CITY_NAME() {
    let s_state_code = $("#office_state").val();
    if (s_state_code === '-1') {
        return;
    }

    $.ajax({
        url: '/admin/community/ajax/ajax_common_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "select_city_name",
            s_state_code: s_state_code
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                $("#office_city").html(json_data.items.item);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}


$(document).ready(function() {

    var options = {

        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse  // post-submit callback

    };

    $('#formp').ajaxForm(options);
    
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
        location.href='agent_pay_list.php';
    }
    else {
        alert('업데이트에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}