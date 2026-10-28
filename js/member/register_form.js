function CHECK_USER_ID() {

    var user_id = $("#user_id").val();

    if(user_id === '') return;    

    $.ajax({
        url : '/member/ajax/ajax_member.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "check_user_id",
            user_id : user_id

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;
            let msg = json_data.msg;

            if(status === "success") {

                if(msg === 'duplicate') {
                    alert('이미 사용중인 아이디입니다.');
                    $("#idc").val('0');
                    $("#user_id").val('');
                    $("#user_id").focus();
                    return;
                }
                else {
                    alert('사용할수 있는 아이디입니다.');
                    $("#idc").val('1');
                    return;
                }

            }


        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            var err=JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete:function(){
        }
    })
}

function CHECK_USER_NICKNAME() {

    var user_nickname = $("#user_nickname").val();

    if(user_nickname === '') return;    

    $.ajax({
        url : '/member/ajax/ajax_member.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "check_user_nickname",
            user_nickname : user_nickname

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;
            let msg = json_data.msg;

            if(status === "success") {

                if(msg === 'duplicate') {
                    alert('이미 사용중인 닉네임입니다.');
                    $("#nic").val('0');
                    $("#user_nickname").val('');
                    $("#user_nickname").focus();
                    return;
                }
                else {
                    alert('사용할수 있는 닉네임입니다.');
                    $("#nic").val('1');
                    return;
                }

            }


        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            var err=JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete:function(){
        }
    })
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

function PASSWORD_CHECK() {

    var pw1 = $("#user_password1").val();
    var pw2 = $("#user_password2").val();

    // var pwReg = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,15}$/;
    var pwReg = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*_]{8,15}$/;
    //r pwReg = /^(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z!@#$%^&*]{8,15}$/;

    // 규칙 검사
    if (!pwReg.test(pw1)) {
        // alert("비밀번호는 영문 대/소문자, 숫자, 특수문자를 혼용하여 8~15자로 입력해주세요.");
        alert("비밀번호는 영문 대/소문자, 숫자를 혼용하여 8~15자로 입력해주세요.");
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


function CheckSubmit() {
        
    if($("#user_id").val() === "") {
        alert("사용할 아이디를 입력하세요.");
        return false;
    }
    else {
        if($("#idc").val() !== "1") CHECK_USER_ID();
        if($("#nic").val() !== "1") CHECK_USER_NICKNAME();
    }
    
    if($("#idc").val() == "0") {
        alert("사용할 아이디가 비어있거나 중복된 아이디 입니다.");
    }

    if($("#nic").val() == "0") {
        alert("사용할 닉네임이 비어있거나 중복된 닉네임 입니다.");
    }
        
    let check_passwd = PASSWORD_CHECK();
        
    if(check_passwd) return true;
    
    return false;
}

$(document).ready(function () {
    
    $('#user_phone').mask('000-000-0000');

});

    