let g_page = 1;

function GO_PAGE(page) {
    
    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {

  //  let s_state_code = $("#s_state_code").val();
  //  let s_kind = $("#s_kind").val();
  //  let s_keyword = $("#s_keyword").val();
  //  let s_cnt = $("#s_cnt").val();
  
    let s_office_name = $("#s_office_name").val();
    let s_agent_full_name = $("#s_agent_full_name").val();    
    let s_kind = '';
    let s_keyword = '';
    let s_cnt = 60;
                                                                      
                                                                      
    
    $.ajax({
        url : '/realestate/ajax/ajax_agent.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "agent_list",
            page : g_page,
            s_office_name : s_office_name,
            s_agent_full_name : s_agent_full_name,
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

$(document).ready(function() {
    
    GO_PAGE(1);
});