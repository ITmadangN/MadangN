
function GO_UPDATE(id) {
    location.href = "/realestate/agent_realestate_update.php?realestate_listing_id=" + id;
}


function GO_DELETE(id) {
    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/realestate/ajax/ajax_realestate.php',
        type: 'GET',
        dataType: 'text',
        data: {
            ac: 'realstate_delete',
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === 'success') {
                location.href = '/realestate/';
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function check_input(name,msg) {

    name_value = $("#"+name).val();

    if(name_value === '') {
        alert(msg);
        $("#"+name).focus();
        return false;
    }

    return true;


}


function showRequest(formData, jqForm, options) {
    
    if(!check_input('agent_comment','매물소개정보를 입력하세요')) return false;
     
    
    return true;
}

function showResponse(responseText, statusText, xhr, $form) {    
    
    if (statusText === "success") {
        
        let json_data = JSON.parse(responseText);

        let status = json_data.status;
        
        if(status == "fail") {
            alert('메일전송 중 오류가 발생했습니다.');
            // alert(json_data.msg);
        }
        else {    
            alert('정상적으로 수정되었습니다.');
            location.reload();
        }
        
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
        $("#pay_button").show();
    }
}

function showRequestU(formData, jqForm, options) {
    
    if(!check_input('user_name','이름을 입력하세요')) return false;
    if(!check_input('user_email','이메일을 입력하세요')) return false;
    if(!check_input('user_phone','연락처를 입력하세요')) return false;
     
    
    return true;
}

function showResponseU(responseText, statusText, xhr, $form) {    
    
    if (statusText === "success") {
        
        let json_data = JSON.parse(responseText);

        let status = json_data.status;
        
        if(status == "fail") {
            alert(json_data.msg);
        }
        else {    
            alert('문의 내용을 담당자에게 전달했습니다.');            
        }
        
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
        $("#pay_button").show();
    }
}

$(document).ready(function () {

    
    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };
        
    var optionsU = {
        beforeSubmit: showRequestU,
        success: showResponseU
    };

    $('#formp').ajaxForm(options);
    
    $('#formu').ajaxForm(optionsU);

    $('#user_phone').mask('000-000-0000');

});
