

function GET_SELECT_CITY_NAME() {

    let s_state_code = $("#state_code").val();

    if(s_state_code == '-1') return;

    $.ajax({
        url : '/community/ajax/ajax_business.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "select_one_city_name",
            s_state_code : s_state_code,
            init_type: "one"

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let select_city_name = json_data.items.item;

                $("#city_name").html(select_city_name);

            }


        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            var err=JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete:function(){
        }
    });
}


function showRequest(formData, jqForm, options) {
    if ($("#title").val() === "") {
        alert_msg("제목은 필수 정보 입니다.");
        return false;
    }

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    if (statusText === "success") {
        alert('수정이 정상적으로 수행되었습니다.');
        location.href = "/community/market.php?lt="+$("#lt").val();
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

    $('#contact_phone').mask('000-000-0000');

});