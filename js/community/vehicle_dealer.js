

function GO_UPDATE(id) {
    location.href = "/community/vehicle_dealer_update.php?id=" + id;
}
function GO_DELETE(id) {

    let did = $("#dealer_id").val();
    
    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/community/ajax/ajax_vehicle_dealer.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "vehicle_dealer_delete",
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {

                location.href = "/community/vehicle_dealer.php?dealer_id="+did;
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {

    let city_name = GET_CITYNAME();
    
    let sd_listing_price_start = $("#s_min_price").val();
    let sd_listing_price_end = $("#s_max_price").val();
    let sd_car_mileage_start = $("#min_dist").val();
    let sd_car_mileage_end = $("#max_dist").val();
    let sd_min_car_year = $("#min_car_year").val();
    let sd_max_car_year = $("#max_car_year").val();
            
    sd_listing_price_start = sd_listing_price_start.replace(/,/g, '');
    sd_listing_price_end = sd_listing_price_end.replace(/,/g, '');
    
    sd_car_mileage_start = sd_car_mileage_start.replace(/,/g, '');
    sd_car_mileage_end = sd_car_mileage_end.replace(/,/g, '');
    
    const checkboxes = document.querySelectorAll('input[name="s_car_maker[]"]:checked');    
    const sd_car_maker = Array.from(checkboxes).map(cb => cb.value).join(',');
    
    Cookies.set('sd_page', g_page, { expires: 1 });
    
    Cookies.set('sd_car_maker', sd_car_maker, { expires: 1 });
    Cookies.set('sd_min_car_year', $("#min_car_year").val(), { expires: 1 });    
    Cookies.set('sd_max_car_year', $("#max_car_year").val(), { expires: 1 });      
    Cookies.set('sd_state_code', $("#s_state_code").val(), { expires: 1 });
    Cookies.set('sd_city_name', city_name, { expires: 1 });
    Cookies.set('sd_listing_price_start', sd_listing_price_start, { expires: 1 });
    Cookies.set('sd_listing_price_end', sd_listing_price_end, { expires: 1 });
    Cookies.set('sd_car_mileage_start', sd_car_mileage_start, { expires: 1 });
    Cookies.set('sd_car_mileage_end', sd_car_mileage_end, { expires: 1 });
    Cookies.set('sd_kind', $("#s_kind").val(), { expires: 1 });
    Cookies.set('sd_keyword', $("#s_keyword").val(), { expires: 1 });
    Cookies.set('sd_cnt', $("#s_cnt").val(), { expires: 1 }); 
    
    $.ajax({
        url : '/community/ajax/ajax_vehicle_dealer.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "dealer_car_list",
            d_page : g_page,
            s_state_code : $("#s_state_code").val(),
            s_city_name : city_name,
            s_car_maker : sd_car_maker,
            s_min_car_year : $("#min_car_year").val(),
            s_max_car_year : $("#max_car_year").val(),
            s_community_car_dealers_id : $("#dealer_id").val(),
            s_listing_price_start : sd_listing_price_start,
            s_listing_price_end : sd_listing_price_end,
            s_car_mileage_start : sd_car_mileage_start,
            s_car_mileage_end : sd_car_mileage_end,
            s_kind : $("#s_kind").val(),
            s_keyword : $("#s_keyword").val(),
            s_cnt : $("#s_cnt").val()
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html = json_data.items.item;
                let pagging = json_data.pagging;

                $("#result_html").html(html);
                $("#result_pagging").html(pagging);

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

function GET_CITY_NAME(init_type) {

    let s_state_code = $("#s_state_code").val();

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

                $("#s_city_name").html(select_city_name);
                
                $('.js-example-basic-multiple').select2({
                    placeholder: "도시",
                    allowClear: true 
                });

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

function check_input(name,msg) {

    name_value = $("#"+name).val();

    if(name_value === '') {
        alert(msg);
        $("#"+name).focus();
        return false;
    }

    return true;


}

function showRequestU(formData, jqForm, options) {
    
    if(!check_input('r_name','이름을 입력하세요')) return false;
    if(!check_input('r_email','이메일을 입력하세요')) return false;
    if(!check_input('r_phone','연락처를 입력하세요')) return false;
     
    
    return true;
}

function showResponseU(responseText, statusText, xhr, $form) {    
    
    if (statusText === "success") {
        
        let json_data = JSON.parse(responseText);

        let status = json_data.status;
        
        if(status == "fail") {
            alert(json_data.msg);
        }
        else {    
            alert('문의 내용을 자동차 딜러에게 전달했습니다.');            
        }
        
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
        $("#pay_button").show();
    }
}

$(document).ready(function() {
    
    // GO_PAGE(1);
    
    var optionsU = {
        beforeSubmit: showRequestU,
        success: showResponseU
    };
    
//    $('#formc').ajaxForm(optionsU);
    
    $('.js-example-basic-multiple').select2({
        placeholder: "도시",
        allowClear: true 
    });
    

    $('#s_min_price').mask('000,000,000', {reverse: true});
    $('#s_max_price').mask('000,000,000', {reverse: true});     
   
     
    $('#min_dist').mask('000,000,000', {reverse: true});
    $('#max_dist').mask('000,000,000', {reverse: true});
    
    $('#min_car_year').mask('0000', {reverse: false});
    $('#max_car_year').mask('0000', {reverse: false});
    
    $('#r_phone').mask('000-000-0000');
   
    let temp_city_name = Cookies.get('s_city_name');          
          
    if(temp_city_name != "" && temp_city_name != undefined) { 
         
         let t_city_name = temp_city_name.split(',');         
         
         $('.js-example-basic-multiple').val(t_city_name).trigger('change');
     
    }
    
    const multiMenu = document.querySelector('#multiMenu');
    const multiLabel = document.querySelector('#multiLabel');

    initMultiSelect(multiMenu,multiLabel);
     
    GO_PAGE(g_page);
     
});