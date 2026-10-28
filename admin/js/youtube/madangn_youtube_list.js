let g_page = 1;

function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {

    $.ajax({
        url : '/admin/youtube/ajax/ajax_youtube_process.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "page_madangn_youtube_list",
            page : g_page,
            s_is_active : $("#s_is_active").val(),
            s_channel_id : $("#s_channel_id").val(),
            s_category_1 : $("#s_category_1").val(),
            s_category_2 : $("#s_category_2").val(),
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

function SET_FLAG(type,id,loc) {
    
    let yn_val = $("#"+type+'_'+loc).html();
    
    if(yn_val == 'Y') yn = 'Y';
    else yn = '';

    $.ajax({
        url : '/admin/youtube/ajax/ajax_youtube_process.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "set_flag",
            type : type,
            id : id,
            yn : yn            
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                if(yn == 'Y') $("#"+type+'_'+loc).html("&nbsp;&nbsp;&nbsp;");
                else $("#"+type+'_'+loc).html('Y');
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