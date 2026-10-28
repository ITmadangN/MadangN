<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];


include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");

$ac = $_REQUEST['ac'];


if($ac == "update_member_info") {

    $user_password = $_POST['user_password1'] ?? "";
    $user_email = $_POST['user_email'] ?? "";
    $user_phone = $_POST['user_phone'] ?? "";
    $is_letter_receive = $_POST['is_letter_receive'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $country_code = $_POST['country_code'] ?? "";

    $update_values = array(
        'user_password' => $user_password,
        'user_email' => $user_email,
        'user_phone' => $user_phone,
        'is_letter_receive' => $is_letter_receive,
        'state_code' => $state_code,
        'country_code' => $country_code,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s'),
        'last_login_ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $db->update('users', $update_values, "user_id = '" . $SS_ID. "'");

    $result_data = [
        "status" => "duplicate",
        "msg" => "duplicate"

    ];


    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "login_member") {


    $login_id = $_GET['login_id'];
    $login_passwd = $_GET['login_passwd'];


    $sql = "SELECT A.* FROM users A where A.user_id = :user_id";

    $placeholders = ['user_id' => $login_id];

    $result = $db->query($sql, $placeholders);

    $row = $db->fetch();

    if (empty($row)) {

        $result_data = [
            "status" => "fail",
            "msg" => "로그인 정보가 틀립니다.",
        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

        exit;
    }



    $user_password = DECRYPT_DATA($row->user_password, $define_val->CRYPT_METHOD, $define_val->CRYPT_KEY);

    if($user_password != $login_passwd) {

        $result_data = [
            "status" => "fail",
            "msg" => "로그인 정보가 틀립니다.",
        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

        exit;

    }

    $insert_log_values = array(
        'login_id' => $login_id,
        'login_date' => date('Y-m-d H:i:s'),
        'login_ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $db->insert('users_login_history', $insert_log_values);
    
    $_SESSION['ss_id'] = $login_id;
    $_SESSION['ss_name'] = $row->user_name;
    $_SESSION['ss_nickname'] = $row->user_nickname;
    $_SESSION['ss_email'] = $row->user_email;
    $_SESSION['ss_phone'] = $row->user_phone;
    $_SESSION['ss_state_code'] = $row->state_code;
    
    $gid = $row->permission_group_id;
    
    $_SESSION['ss_permission_group_id'] = $gid;
    
    $sql = "SELECT A.* FROM permission_group_card A where  A.permission_group_id = :gid order by permission_code asc";

    $placeholders = ['gid' => $gid];

    $result = $db->query($sql, $placeholders);

    $row = $db->fetch();

    $permssion = make_permission_init();
    
    if (!empty($row)) {
        
        do {
            
            $permission_code = $row->permission_code;
            $permission_yn = $row->permission_yn;
            
            $permssion[$permission_code] = $permission_yn;
            
            
        } while($row = $db->fetch());
        
    }
    
    $_SESSION['ss_permission'] = $permssion;
    
    $result_data = [
        "status" => "success",
        "msg" => "로그인이 완료되었습니다.",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

