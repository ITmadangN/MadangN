function GET_CITY_NAME(num) {
    let s_state_code = $("#state_code_"+num).val();
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
                $("#city_name_"+num).html(json_data.items.item);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function ADD_ADVERTISING_LEVEL() {

    $.ajax({
        url : '/admin/community/ajax/ajax_recruit_process.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "add_advertising_level",
            g_num : g_num
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html = json_data.items.item;

                $("#result_advertising_level").append(html);

                g_num++;

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

function DEL_ADVERTISING_LEVEL(num) {

    $("#div_advertising_level_"+num).remove();

}

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

    if($("#title").val() === "") {
        alert_msg("제목이 필수정보 입니다.")
        return false;
    }

    return true;
}


function showResponse(responseText, statusText, xhr, $form)  {

    if(statusText === "success") {
        alert('업데이트가 정상적으로 수행되었습니다.');
        location.href = "/admin/community/recruit_pay_list.php";
    }
    else {
        alert('업데이트에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}