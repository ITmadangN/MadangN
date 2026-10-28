
function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}


function processData(city) {
    
    let cleanCity = city.trim();
    
    if (cleanCity.includes(',')) {
    
        return cleanCity.split(',').map(item => item.trim());
    } 
    
    else {
        return cleanCity;
    }
}

function DT_PAGE(state,city) {
   
   let nynj = "N"; 
   if(state == "NYNJ") { state = "NY"; nynj = 'Y' }
   
   $("#s_state_code").val(state); 
   
   GET_CITY_NAME();
   
   if(city == '') $('#s_city_name').val(null).trigger('change');
   else { 
       let temp_city = processData(city);       
       $('#s_city_name').val(temp_city).trigger('change');

   }
   
//   $('#s_city_name').val(null).trigger('change');
    
   GET_PAGE(state,city, nynj);
              
}

function GET_PAGE(state,city,nynj) {

    let city_name = '';
    let s_state_code = '';
    
    if(state === undefined) {
        city_name = GET_CITYNAME();        
        s_state_code = $("#s_state_code").val();
        nynj = '';
    }
    else {        
        city_name = city;
        s_state_code = state;               
    }
    

    let s_menu = $("#s_menu").val();
    let s_property_type = $("#s_property_type").val();
    let s_property_sub_type = $("#s_property_sub_type").val();
    
    let s_listing_price_start = $("#s_min_price").val();
    let s_listing_price_end = $("#s_max_price").val();
    
    s_listing_price_start = s_listing_price_start.replace(/,/g, '');
    s_listing_price_end = s_listing_price_end.replace(/,/g, '');
        
    
    let s_bedrooms_total = $("#s_bedrooms_total").val();
    let s_bathrooms_total = $("#s_bathrooms_total").val();
    let php_view = $("#php_view").val();
    let s_cnt = $("#s_cnt").val();
    
    Cookies.set('page', g_page, { expires: 1 });
    
    Cookies.set('s_property_type', s_property_type, { expires: 1 });
    Cookies.set('s_menu', s_menu, { expires: 1 });
    Cookies.set('s_property_sub_type', s_property_sub_type, { expires: 1 });
    Cookies.set('s_state_code', s_state_code, { expires: 1 });
    Cookies.set('s_city_name', city_name, { expires: 1 });
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
            s_menu : s_menu,
            s_property_type : s_property_type,
            s_property_sub_type : s_property_sub_type,
            s_state_code : s_state_code,
            s_city_name : city_name,
            s_listing_price_start : s_listing_price_start,
            s_listing_price_end : s_listing_price_end,
            s_bedrooms_total : s_bedrooms_total,
            s_bathrooms_total : s_bathrooms_total,
            php_view : php_view,
            s_cnt : s_cnt,
            s_nynj : nynj
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

function GET_PROPERTY_TYPE_SUB() {

    let s_property_type = $("#s_property_type").val();

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

                $("#s_property_sub_type").html(select_s_property_type_sub);                              

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
    
//    cityNameDisplay();
//    cityNameDisplayCouunt();

    $('.js-example-basic-multiple').select2({
        placeholder: "도시",
        allowClear: true 
    });
    

     $('#s_min_price').mask('000,000,000', {reverse: true});
     $('#s_max_price').mask('000,000,000', {reverse: true});
     
     let temp_city_name = Cookies.get('s_city_name');          
          
     if(temp_city_name != "" && temp_city_name != undefined) { 
         
         let t_city_name = temp_city_name.split(',');         
         
         $('.js-example-basic-multiple').val(t_city_name).trigger('change');
     
     }
     
     GO_PAGE(g_page);
     
    /*
    $('#s_min_price').maskMoney({
        prefix: '$ ',
        thousands: ',',
        precision: 0 // 원화는 소수점 제외
    });
    */

});

