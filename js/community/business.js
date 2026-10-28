
function GO_PAGE(page) {
    
    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {

    let city_name = GET_CITYNAME();
    
    let s_business_type = $("#s_business_type").val();
    let s_state_code = $("#s_state_code").val();
    let s_kind = $("#s_kind").val();
    let s_keyword = $("#s_keyword").val();
    let s_cnt = $("#s_cnt").val();
                                           
    Cookies.set('page', g_page, { expires: 1 });
    Cookies.set('s_business_type', s_business_type, { expires: 1 });
    Cookies.set('s_state_code', s_state_code, { expires: 1 });
    Cookies.set('s_city_name', city_name, { expires: 1 });    
    Cookies.set('s_kind', s_kind, { expires: 1 });
    Cookies.set('s_keyword', s_keyword, { expires: 1 });
    Cookies.set('s_cnt', s_cnt, { expires: 1 });
        
    $.ajax({
        url : '/community/ajax/ajax_business.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "business_list",
            page : g_page,
            s_business_type : s_business_type,
            s_state_code : s_state_code,
            s_city_name : city_name,
            s_kind : s_kind,
            s_keyword : s_keyword,
            s_cnt : s_cnt
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html_platinum = json_data.items.platinum;
                let html_regular = json_data.items.regular;
                let pagging = json_data.pagging;

                $("#result_platinum").html(html_platinum);
                $("#result_regular").html(html_regular);
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

function GET_CITYNAME() {

    let city_name = $("#s_city_name").val();
    
    let temp_city_name = '';
    // city_name = [...document.querySelectorAll('input[name="city_name[]"]:checked')].map(el => el.value).join(',');
    
    
    temp_city_name = city_name ? city_name.join(',') : '';

    return temp_city_name;

}

$(document).ready(function() {
    
    GO_PAGE(g_page);
    
    $('.js-example-basic-multiple').select2({
        placeholder: "도시",
        allowClear: true 
    });
    
});