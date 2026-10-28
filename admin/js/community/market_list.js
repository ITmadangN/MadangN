let g_page = 1;

function GO_PAGE(page) {
    // console.log ("a");

    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {
    // console.log ("a");
    // console.log ("s_listing_type "+ $("#s_listing_type").val());
    // console.log ("s_state_code "+ $("#s_state_code").val());
    $.ajax({
        url : '/admin/community/ajax/ajax_market_process.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "market_list",
            page : g_page,
            s_is_active : $("#s_is_active").val(),
            s_listing_type : $("#s_listing_type").val(),
            s_state_code : $("#s_state_code").val(),
            s_city_name : $("#s_city_name").val(),
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
                let navigation_text = json_data.navigation_text;

                $("#result_html").html(html);
                $("#result_pagging").html(pagging);
                $("#result_navigation_text").html(navigation_text);

            }

            // console.log ("a2");
            // console.log ("s_listing_type "+$("#s_listing_type").val());
            // console.log ("s_state_code "+$("#s_state_code").val());

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
        url : '/admin/community/ajax/ajax_common_process.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "select_city_name",
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

                // console.log(select_city_name);
                $("#s_city_name").html(select_city_name);

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
    GO_PAGE(1);
});