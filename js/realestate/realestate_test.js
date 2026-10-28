
function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {

    let city_name = GET_CITYNAME();
    
    let s_property_type = $("#s_property_type").val();
    let s_property_sub_type = $("#s_property_sub_type").val();
    let s_state_code = $("#s_state_code").val();
    let s_city_name = city_name;
    let s_listing_price_start = $("#min_price_large").val();
    let s_listing_price_end = $("#max_price_large").val();
    let s_bedrooms_total = $("#s_bedrooms_total").val();
    let s_bathrooms_total = $("#s_bathrooms_total").val();
    let php_view = $("#php_view").val();
    let s_cnt = $("#s_cnt").val();
    
    Cookies.set('page', g_page, { expires: 1 });
    Cookies.set('s_property_type', s_property_type, { expires: 1 });
    Cookies.set('s_property_sub_type', s_property_sub_type, { expires: 1 });
    Cookies.set('s_state_code', s_state_code, { expires: 1 });
    Cookies.set('s_city_name', s_city_name, { expires: 1 });
    Cookies.set('s_listing_price_start', s_listing_price_start, { expires: 1 });
    Cookies.set('s_listing_price_end', s_listing_price_end, { expires: 1 });
    Cookies.set('s_bedrooms_total', s_bedrooms_total, { expires: 1 });
    Cookies.set('s_bathrooms_total', s_bathrooms_total, { expires: 1 });
    Cookies.set('php_view', php_view, { expires: 1 });
    Cookies.set('s_cnt', s_cnt, { expires: 1 });    

    $.ajax({
        url : '/realestate/ajax/ajax_realestate.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "realestate_list",
            page : g_page,
            s_property_type : s_property_type,
            s_property_sub_type : s_property_sub_type,
            s_state_code : s_state_code,
            s_city_name : s_city_name,
            s_listing_price_start : s_listing_price_start,
            s_listing_price_end : s_listing_price_end,
            s_bedrooms_total : s_bedrooms_total,
            s_bathrooms_total : s_bathrooms_total,
            php_view : php_view,
            s_cnt : s_cnt,
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

              //  $("#result_navigation_text").html(navigation_text);              

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

function GET_CITY_NAME() {

    let s_state_code = $("#s_state_code").val();

    if(s_state_code == '-1') return;

    $.ajax({
        url : '/community/ajax/ajax_business.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "select_city_name_other",
            s_state_code : s_state_code

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;
            
            let html = json_data.items.item;

            if(status === "success") {

                CITIES = [];
                
                $(html).filter('option').each(function() {
                    var cityName = $(this).text().trim();
                    if (cityName && cityName !== '도시 전체') {  // 첫번째 "전체" 옵션 제외
                        CITIES.push(cityName);
                    }
                });

                // ② 입력창 및 선택값 초기화
                selectedCity = null;
                $('#city-input').val('');
                $('#s_city_name').val('');
                $('#city-drop').hide();

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

    let city_name = '';
    
    city_name = [...document.querySelectorAll('input[name="city_name[]"]:checked')].map(el => el.value).join(',');
    
    return city_name;

}

$(document).ready(function() {
    GO_PAGE(g_page);
    cityNameDisplay();
    cityNameDisplayCouunt();

});

