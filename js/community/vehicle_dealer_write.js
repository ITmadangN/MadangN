

function GET_SELECT_CITY_NAME(init_type) {

    let s_state_code = $("#state_code").val();

    if(s_state_code == '-1') return;

    $.ajax({
        url : '/community/ajax/ajax_business.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "select_one_city_name",
            s_state_code : s_state_code,
            init_type: init_type

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
    
    if(window.syncUploadInput) window.syncUploadInput();
        
    if(window.getUploadedFileCount() === 0) {
            alert('이미지를 최소 1장 이상 등록해주세요.');
            return false;   // 전송 중단
    }

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    if (statusText === "success") {
        alert('등록이 정상적으로 수행되었습니다.');
//        location.href = "/community/vehicle_dealer.php?dealer_id=" + $("#dealer_id").val();
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}


$('#formp').on('submit', function (e) {
    
    e.preventDefault();
    
    window.syncUploadInput();

    // 이미지 최소 1장 검증
    if (window.getUploadedFileCount && window.getUploadedFileCount() === 0) {
        alert('이미지를 최소 1장 이상 등록해주세요.');
        return false;
    }

    var formData = new FormData(this);   // user_files[] 파일들 자동 포함

    $.ajax({
        url: $(this).attr('action'),     // ajax/ajax_vehicle_dealer.php
        type: 'POST',
        data: formData,
        processData: false,   // 필수
        contentType: false,   // 필수
        success: function (res) {
            
            alert('등록이 정상적으로 수행되었습니다.');
            location.href = "/community/vehicle_dealer.php?dealer_id=" + $("#dealer_id").val();
            
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert('전송 중 오류가 발생했습니다.');
        }
    });
});


$(document).ready(function() {

    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

//    $('#formp').ajaxForm(options);

    $('#seller_phone').mask('000-000-0000');

});