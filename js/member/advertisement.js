let g_page = 1;
let g_id = 0;

function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}
function GET_PAGE() {


    $.ajax({
        url : '/member/ajax/ajax_advertisement.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "advertisement_list",
            page : g_page,
            s_type : $("#s_type").val()
            
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

function GO_PREVIEW_RP(id) {

    window.open('/community/recruit_view_preview.php?id='+id, 'popupName', 'width=1400, height=700, left=100, top=100');    
        
}

function GO_PREVIEW_RG(id) {

    window.open('/community/recruit_view_preview.php?id='+id, 'popupName', 'width=1400, height=700, left=100, top=100');    
        
}

function GO_PREVIEW_BP(id) {
    
    window.open('/community/business_view_preview.php?id='+id, 'popupName', 'width=1400, height=700, left=100, top=100');

}

function GO_PREVIEW_VD(id) {
    
    window.open('/community/vehicle_dealer_preview.php?dealer_id='+id, 'dealer', 'width=1400, height=700, left=100, top=100');

}

function GO_UPDATE_RP(id) {
    location.href = "/ad/ad_request_update.php?id="+id+"&ad_method=recruit_platinum";
}

function GO_UPDATE_RG(id,sid) {
    location.href = "/ad/ad_request_update.php?id="+id+"&ad_method=recruit_gold";
}

function GO_UPDATE_BP(id) {
    location.href = "/ad/ad_request_update.php?id="+id+"&ad_method=business_platinum";
}

function GO_UPDATE_VD(id) {
    location.href = "/ad/ad_request_update.php?id="+id+"&ad_method=vehicle_dealer";
}

function GO_UPDATE_AGENT() {
    location.href = "/advertisement/ad_03_update.php";
}

$(document).ready(function() {

    GO_PAGE(1);
    
    
});