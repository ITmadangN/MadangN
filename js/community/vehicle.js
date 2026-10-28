


function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {

    let city_name = GET_CITYNAME();
    
    let s_listing_price_start = $("#s_min_price").val();
    let s_listing_price_end = $("#s_max_price").val();
    let s_car_mileage_start = $("#min_dist").val();
    let s_car_mileage_end = $("#max_dist").val();
    let s_min_car_year = $("#min_car_year").val();
    let s_max_car_year = $("#max_car_year").val();
            
    s_listing_price_start = s_listing_price_start.replace(/,/g, '');
    s_listing_price_end = s_listing_price_end.replace(/,/g, '');
    
    s_car_mileage_start = s_car_mileage_start.replace(/,/g, '');
    s_car_mileage_end = s_car_mileage_end.replace(/,/g, '');
    
    const checkboxes = document.querySelectorAll('input[name="s_car_maker[]"]:checked');    
    const s_car_maker = Array.from(checkboxes).map(cb => cb.value).join(',');
    
    Cookies.set('page', g_page, { expires: 1 });
    
    Cookies.set('s_car_maker',  s_car_maker, { expires: 1 });
    Cookies.set('s_min_car_year', $("#min_car_year").val(), { expires: 1 });    
    Cookies.set('s_max_car_year', $("#max_car_year").val(), { expires: 1 });      
    Cookies.set('s_state_code', $("#s_state_code").val(), { expires: 1 });
    Cookies.set('s_city_name', city_name, { expires: 1 });
    Cookies.set('s_listing_price_start', s_listing_price_start, { expires: 1 });
    Cookies.set('s_listing_price_end', s_listing_price_end, { expires: 1 });
    Cookies.set('s_car_mileage_start', s_car_mileage_start, { expires: 1 });
    Cookies.set('s_car_mileage_end', s_car_mileage_end, { expires: 1 });
    Cookies.set('s_kind', $("#s_kind").val(), { expires: 1 });
    Cookies.set('s_keyword', $("#s_keyword").val(), { expires: 1 });
    Cookies.set('s_cnt', $("#s_cnt").val(), { expires: 1 }); 
    
     
    $.ajax({
        url : '/community/ajax/ajax_vehicle.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "car_list",
            page : g_page,
            s_state_code : $("#s_state_code").val(),
            s_city_name : city_name,
            s_car_maker : s_car_maker,
            s_min_car_year : $("#min_car_year").val(),
            s_max_car_year : $("#max_car_year").val(),
            s_community_car_dealers_id : $("#dealer_id").val(),
            s_listing_price_start : s_listing_price_start,
            s_listing_price_end : s_listing_price_end,
            s_car_mileage_start : s_car_mileage_start,
            s_car_mileage_end : s_car_mileage_end,
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

                let platinum = json_data.items.platinum;
                let regular = json_data.items.regular;

                $("#result_platinum").html(platinum);
                $("#result_regular").html(regular);

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

$(document).ready(function() {
    
    // GO_PAGE(1);
    
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