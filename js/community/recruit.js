
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
    
    
    const checkboxes = document.querySelectorAll('input[name="s_job_type[]"]:checked');    
    const s_job_type = Array.from(checkboxes).map(cb => cb.value).join(',');
    
    // let s_job_type = $("#s_job_type").val();
    
    let s_kind = $("#s_kind").val();
    let s_keyword = $("#s_keyword").val();
    let s_cnt = $("#s_cnt").val();
                                           
    Cookies.set('page', g_page, { expires: 1 });
    Cookies.set('s_job_type', s_job_type, { expires: 1 });
    Cookies.set('s_state_code', s_state_code, { expires: 1 });
    Cookies.set('s_city_name', city_name, { expires: 1 });    
    Cookies.set('s_kind', s_kind, { expires: 1 });
    Cookies.set('s_keyword', s_keyword, { expires: 1 });
    Cookies.set('s_cnt', s_cnt, { expires: 1 });
    
    $.ajax({
        url : '/community/ajax/ajax_recruit.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "recruit_list",
            page : g_page,
            s_job_type : s_job_type,
            s_state_code : s_state_code,
            s_city_name : city_name,
            s_kind : s_kind,
            s_keyword : s_keyword,
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

                let html_platinum = json_data.items.platinum;
                let html_gold = json_data.items.gold;
                let html_regular = json_data.items.regular;
                let pagging = json_data.pagging;

                $("#result_platinum").html(html_platinum);
                $("#result_gold").html(html_gold);
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
        async: false,
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
    
    $('.js-example-basic-multiple').select2({
        placeholder: "도시",
        allowClear: true 
    });
    
    const multiMenu = document.querySelector('#multiMenu');
    const multiLabel = document.querySelector('#multiLabel');

    initMultiSelect(multiMenu,multiLabel);
    
    GO_PAGE(g_page);
});