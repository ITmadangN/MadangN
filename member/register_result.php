<?php

use BearTemplate\BearTemplate;


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$user_id = $_POST['user_id'] ?? "";
$user_nickname = $_POST['user_nickname'] ?? "";
$user_password = $_POST['user_password1'] ?? "";
$user_name = $_POST['user_name'] ?? "";
$user_email = $_POST['user_email'] ?? "";
$user_phone = $_POST['user_phone'] ?? "";
$is_letter_receive = $_POST['is_letter_receive'] ?? "0";
$state_code = $_POST['state_code'] ?? "";
$country_code = $_POST['country_code'] ?? "";
$is_active = 1;

$pass = "ok";

if($user_id == "") {
    $result_msg = "사용자 ID 필수값이 누락 되었습니다.";
    $pass = "no";
    
}

if($pass == "ok") {
    
    $from = "users";
    $fields = ['*' => 'rowsCount']; 
    $where = ['user_id' => $user_id]; 

    $total = $db->selectCount($from, $fields, $where);
                
    if($total->rowsCount > 0) {

        $result_msg = "이미 가입된 아이디 입니다.";
        $pass = "no";
       
    }

}
       
if($pass == "ok") {

    $user_password = ENCRYPT_DATA($user_password, $define_val->CRYPT_METHOD, $define_val->CRYPT_KEY);

    $insert_values = array(
        'user_id' => $user_id,
        'user_nickname' => $user_nickname,
        'user_password' => $user_password,
        'user_name' => $user_name,
        'user_email' => $user_email,
        'user_phone' => $user_phone,
        'is_letter_receive' => $is_letter_receive,
        'state_code' => $state_code,
        'country_code' => $country_code,
        'is_active' => $is_active,
        'created_user' => $user_name,
        'created_at' => date('Y-m-d H:i:s'),
        'last_login_ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $db->insert('users', $insert_values);
    
     $result_msg = "* 회원가입이 완료되었습니다.<br />

        * 미주 최대 커뮤니티 [마당엔]에 가입하신것을 환영합니다.<br />

        * 상단 로그인을 클릭하셔서 로그인을 해주시길 바랍니다.<br />
        ";

}

$page="index";
$main="0";
$sub="1";
$mtitle="멤버";
$stitle="회원가입 완료";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "register_result.tpl");

if($pass == "ok") {    
    $tpl->setVar("TITLE","회원가입 완료");    
    $tpl->setVar("MEMBER_OK",true);
}
else {
    $tpl->setVar("TITLE","회원가입 에러");
    $tpl->setVar("MEMBER_NOT_OK",true);
}

$tpl->setVar("T_MSG","$result_msg");

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
