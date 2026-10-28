
function GO_UPDATE(id) {
    location.href = "/community/vehicle_regular_update.php?id=" + id;
}
function GO_DELETE(id) {

    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/community/ajax/ajax_vehicle_regular.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "vehicle_regular_delete",
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {

                location.href = "/community/vehicle_regular.php";
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
    
    Cookies.set('s_car_maker', s_car_maker, { expires: 1 });
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
        url : '/community/ajax/ajax_vehicle_regular.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "regular_car_list",
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

function GET_REPLY() {

    $.ajax({
        url : '/community/ajax/ajax_vehicle_regular.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "reply_list",
            parent_code : $("#parent_code").val(),
            parent_id : $("#parent_id").val()

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html = json_data.items.item;

                $("#result_reply").html(html);

                $("#r_comments").val('');


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

function SAVE_REPLY() {

    $.ajax({
        url : '/community/ajax/ajax_vehicle_regular.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "reply_save",
            parent_code : $("#parent_code").val(),
            parent_id : $("#parent_id").val(),
            comments : $("#r_comments").val()
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html = json_data.items.item;

                $("#result_reply").html(html);

                $("#r_comments").val('');


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

$(document).ready(function() {
    GET_REPLY();
    // GO_PAGE(1);    
    
});