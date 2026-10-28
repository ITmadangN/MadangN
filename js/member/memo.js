let g_page = 1;
let g_id = 0;

function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {


    $.ajax({
        url : '/member/ajax/ajax_memo.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "memo_list",
            page : g_page,
            s_type : $("#s_type").val(),
            s_kind : $("#s_kind").val(),
            s_keyword : $("#s_keyword").val(),            
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

                $("#result_htm").html(html);                
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

function RESET_MEMO() {
    
    $("#user_nickname").val('');
    $("#title").val('');
    $("#content").val('');
    
}

function showRequest(formData, jqForm, options) {

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    if (statusText === "success") {
        
        let json_data = JSON.parse(responseText);
        
        let status = json_data.status;

        if(status === "success") {        
            alert('쪽지가 정상적으로 등록되었습니다.');        
            
            // 1. 모달 창 숨기기
            const modal = document.getElementById('uc-memosend-modal');
            if (modal) modal.style.display = 'none';

            // 2. 배경 어두운 막(Backdrop) 강제 제거
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) backdrop.remove();

            // 3. 본문 스크롤 잠금 해제
            document.body.classList.remove('modal-open');
            document.body.style.overflow = ''
            
        }
        else {
            alert(json_data.msg);
        }
        
    } else {
        alert('쪽지 등록중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}


function GO_MEMO_VIEW(id) {

    g_id = id;

    $.ajax({
        url : '/member/ajax/ajax_memo.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "memo_view",
            id : id
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let memo_nickname = json_data.items.item.nickname;
                let memo_title = json_data.items.item.title;
                let memo_content = json_data.items.item.content;

                $("#memo_nickname").html(memo_nickname);
                $("#memo_title").html(memo_title);
                $("#memo_content").html(memo_content);

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

function MEMO_DELETE() {

    let conf = confirm("정말 삭제하시겠습니까?");
    if(!conf) {
        return;
    }

    $.ajax({
        url : '/member/ajax/ajax_memo.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "memo_delete",
            id : g_id
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                alert("삭제되었습니다.");
                location.reload();

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
    
    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#form_memo').ajaxForm(options);
    
});