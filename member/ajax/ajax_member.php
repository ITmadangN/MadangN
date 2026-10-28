<?php

use BearTemplate\BearTemplate;

        
session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");

$ac = $_REQUEST['ac'];

if($ac == "check_user_id") {

    $user_id = $_REQUEST['user_id'] ?? "";
    
    $from = "users";
    $fields = ['*' => 'rowsCount']; 
    $where = ['user_id' => $user_id]; 

    $total = $db->selectCount($from, $fields, $where);
                
    if($total->rowsCount < 1) {

        $result_data = [
            "status" => "success",
            "msg" => "sucess"

        ];


    }
    else {

        $result_data = [
            "status" => "success",
            "msg" => "duplicate"

        ];

    }

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}


if($ac == "check_user_nickname") {

    $user_nickname = $_REQUEST['user_nickname'] ?? "";
    
    $from = "users";
    $fields = ['*' => 'rowsCount']; 
    $where = ['user_nickname' => $user_nickname]; 

    $total = $db->selectCount($from, $fields, $where);
                
    if($total->rowsCount < 1) {

        $result_data = [
            "status" => "success",
            "msg" => "sucess"

        ];


    }
    else {

        $result_data = [
            "status" => "success",
            "msg" => "duplicate"

        ];

    }

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

if($ac == "select_state_code") {

    $s_country_code = $_GET['s_country_code'] ?? "";    
    
    if($s_country_code != "USA") {
        
        $html = "<option value=''>없음</option>";
    
    }
    else {
        $html = DB_ARRAY_ARRAY_RETURN(1, '', $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by code_sub_name asc");    
    }
    
    $result_data = [
            "status" => "success",
            "msg" => "sucess",
            "items" => array("item" => $html),

    ];
    
    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
    exit;
    
    
}

if($ac == "update_member_info") {
        
    $user_password = $_POST['user_password1'] ?? "";    
    $user_email = $_POST['user_email'] ?? "";
    $user_phone = $_POST['user_phone'] ?? "";
    $is_letter_receive = $_POST['is_letter_receive'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $country_code = $_POST['country_code'] ?? "";

    $user_password = ENCRYPT_DATA($user_password, $define_val->CRYPT_METHOD, $define_val->CRYPT_KEY);

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

    if (!$row) {
    
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
            
            
        }while($row = $db->fetch());
        
    }
    
    $_SESSION['ss_permission'] = $permssion;

    $result_data = [
        "status" => "success",
        "msg" => "로그인이 완료되었습니다.",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}

if($ac == "login_email") {


    $login_email = $_GET['login_email'];
    
    
    $sql = "SELECT A.* FROM users A where A.user_email = :user_email";

    $placeholders = ['user_email' => $login_email];

    $result = $db->query($sql, $placeholders);

    $row = $db->fetch();

    if (!$row) {
    
         $result_data = [
            "status" => "fail",
            "msg" => "메일이 틀립니다.",
            ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            
        exit;
    }
    
    $user_password = DECRYPT_DATA($row->user_password, $define_val->CRYPT_METHOD, $define_val->CRYPT_KEY);

    $to_email = $row->user_email;
    $user_id = $row->user_id;

    $body_email .= "User ID : $user_id<br>";
    $body_email .= "User Password : $user_password<br>";
    
    $body_email .= "GO MadangN : <a href='".$define_val->MADANGN_URL."'>".$define_val->MADANGN_URL."</a><br>";    

    
 //   $to_email = "hpysean@gmail.com";
    
    $result = send_mail("admin@cbbestrealty.com",$to_email,"Information on MadangN User Login Details",$body_email);
    
    $result_data = [
        "status" => "success",
        "msg" => "메일로 로그인정보를 전송했습니다.",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}