
function GO_UPDATE(id,lt) {
    location.href = "/community/market_update.php?id=" + id + "&lt=" + lt;
}
function GO_DELETE(id) {

    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/community/ajax/ajax_market.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "market_delete",
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {

                location.href = "/community/market.php";
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function GET_REPLY() {

    $.ajax({
        url : '/community/ajax/ajax_market.php',
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
        url : '/community/ajax/ajax_market.php',
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