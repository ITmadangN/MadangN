
function PASSWORD_CHECK() {

    var pw1 = $("#user_password1").val();
    var pw2 = $("#user_password2").val();


    var pwReg = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,15}$/;

    // 규칙 검사
    if (!pwReg.test(pw1)) {
        alert("비밀번호는 영문 대/소문자, 특수문자를 혼용하여 8~15자로 입력해주세요.");
        $("#user_password1").focus();
        return false;
    }

    // 일치 여부 검사
    if (pw1 !== pw2) {
        alert("비밀번호가 서로 일치하지 않습니다.");
        $("#user_password2").focus();
        return false;
    }
    return true;

}

function GET_SELECT_SATE_CODE() {

    let s_country_code = $("#country_code").val();

    if (s_country_code == '-1') return;

    $.ajax({
        url: '/member/ajax/ajax_member.php',
        type: 'GET',
        async: false,
        dataType: "text",
        data: {
            ac: "select_state_code",
        s_country_code: s_country_code

        },
        timeout: 10000,
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if (status === "success") {

                let state_code = json_data.items.item;

                $("#state_code").html(state_code);
                        
            }


        },
        error: function (request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            var err = JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete: function () {
        }
    });
}

function showRequest(formData, jqForm, options) {
    
    
    let check_passwd = PASSWORD_CHECK();
    
    if(check_passwd) return true;

    return false;
}

function showResponse(responseText, statusText, xhr, $form) {
    
    if (statusText === "success") {
        alert('개인정보가 변경되었습니다.');     
        location.href = "/community/";
    } else {
        alert('수정 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}


$(document).ready(function() {


    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#fregister').ajaxForm(options);
    
    $('#user_phone').mask('000-000-0000');
});