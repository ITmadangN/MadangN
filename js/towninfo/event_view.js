
function GET_REPLY() {

    $.ajax({
        url : '/towninfo/ajax/ajax_event_view.php',
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
        url : '/towninfo/ajax/ajax_event_view.php',
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
});