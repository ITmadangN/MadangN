let g_page = 1;

function GO_UPDATE(id) {
    location.href = "/community/business_update.php?id=" + id;
}
function GO_DELETE(id) {

    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/community/ajax/ajax_business.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "business_delete",
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {

                location.href = "/community/business.php";
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
    $.ajax({
        url : '/community/ajax/ajax_business.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "business_list",
            page : g_page,
            s_business_type : $("#s_business_type").val(),
            s_state_code : $("#s_state_code").val(),
            s_city_name : city_name,
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

                $("#cityMenu").html(select_city_name);

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
    $('input[name="city_name[]"]:checked').each(function() {
        city_name = cityname . $(this).val()+",";
    });

    return city_name;

}

function GET_REPLY() {

    $.ajax({
        url : '/community/ajax/ajax_business.php',
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
        url : '/community/ajax/ajax_business.php',
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
    GO_PAGE(1);

});