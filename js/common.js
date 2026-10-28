function GO_LOGIN() {

    let login_id = $("#login_id").val();
    let login_passwd = $("#login_passwd").val();

    if(login_id === '' || login_passwd === '') {
        alert("아이디 와 비밀번호는 반드시 입력하셔야 합니다.");
        return;
    }

    $.ajax({
        url : '/member/ajax/ajax_member.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "login_member",
            login_id : login_id,
            login_passwd : login_passwd

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;
            let msg = json_data.msg;

            if(status === "success") {

                //alert("로그인이 완료되었습니다.");
                location.reload();

            }
            else {
                alert(msg);
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

function GO_LOGIN_DISPLAY() {
    
    const login = document.getElementById('login_button_display');
    
    if (login) {
      login.click();
    }
    
}

function GO_LOGIN_VIEW() {
    const loginButton = document.querySelector('a[data-uc-switcher-item="0"]');
    if (loginButton) {
      loginButton.click();
    }
}

function LOGIN_SEARCH() {

    let login_email = $("#login_email").val();    

    if(login_email === '') {
        alert("이메일은 반드시 입력하셔야 합니다.");
        return;
    }

    $.ajax({
        url : '/member/ajax/ajax_member.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "login_email",
            login_email : login_email

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;
            let msg = json_data.msg;

            if(status === "success") {

                alert("이메일로 아이디와 비밀번호를 전송했습니다.");             
                
                const closeButton = $("#login_close");
                closeButton.click();   

            }
            else {
                alert(msg);
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