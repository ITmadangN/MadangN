

function GET_CITY_NAME() {

    let s_state_code = $("#state_or_province").val();

    if(s_state_code == '-1') return;

    $.ajax({
        url : '/community/ajax/ajax_business.php',
        type : 'GET',
        dataType : "text",
        async: false,
        data : {
            ac : "select_one_city_name",
            s_state_code : s_state_code

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let select_city_name = json_data.items.item;

                $("#city").html(select_city_name);


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

function GET_PROPERTY_TYPE_SUB() {

    let s_property_type = $("#property_type").val();

    if(s_property_type == '-1') return;

    $.ajax({
        url : '/realestate/ajax/ajax_realestate.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "select_one_property_type_sub",
            s_property_type : s_property_type

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let select_s_property_type_sub = json_data.items.item;

                $("#property_sub_type").html(select_s_property_type_sub);                              

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

function GET_CITYNAME() {

    let city_name = $("#s_city_name").val();    
    
    let temp_city_name = '';
    // city_name = [...document.querySelectorAll('input[name="city_name[]"]:checked')].map(el => el.value).join(',');
        
    temp_city_name = city_name ? city_name.join(',') : '';
    
    
    return temp_city_name;

}


$('#formp').on('submit', function (e) {
    
    e.preventDefault();
    
    window.syncUploadInput();

    var formData = new FormData(this);   // user_files[] 파일들 자동 포함
    
    let key = $("#dre_key").val();

    $.ajax({
        url: $(this).attr('action'),     // ajax/ajax_vehicle_dealer.php
        type: 'POST',
        data: formData,
        processData: false,   // 필수
        contentType: false,   // 필수
        success: function (res) {
            
            alert('수정이 정상적으로 수행되었습니다.');
            location.href = "/realestate/agent_dre_list.php?key="+key;
            
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert('전송 중 오류가 발생했습니다.');
        }
    });
});


$(document).ready(function() {

    
    $('#list_price').mask('0999999999999999');
    
        
    $('#listing_contract_date').datepicker({
        dateFormat: 'mm/dd/yy', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });

});

