function CheckSubmit() {


    if(document.fregister.yak1.checked == false){
        alert("회원가입약관에 동의하셔야 합니다.");
        return false;
    }

    if(document.fregister.yak2.checked == false){
        alert("개인정보 수집/이용 내역에  동의하셔야 합니다.");
        return false;
    }

    return true;

}

function ALL_CHECK() {


    var isChecked = $(event.target).prop('checked');

    $("#yak1, #yak2").prop("checked", isChecked);
}
