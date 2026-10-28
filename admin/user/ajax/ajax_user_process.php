<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\user_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "user_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/user/service/service_user.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "user_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_permission_group_id" => $_GET['s_permission_group_id'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $user_list = new user_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "user_list_body.tpl");

    $tpl->setLoop("T_LOOP", $user_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $user_list->paging,
        "navigation_text" => $user_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "update_user") {

    $user_id = $_POST["user_id"];

    $user_password       = $_POST['user_password'] ?? "";
    $user_nickname       = $_POST['user_nickname'] ?? "";
    $user_name           = $_POST['user_name'] ?? "";
    $user_email          = $_POST['user_email'] ?? "";
    $user_phone          = $_POST['user_phone'] ?? "";
    $is_letter_receive   = $_POST['is_letter_receive'] ?? 0;
    $user_type           = $_POST['user_type'] ?? "";
    $permission_group_id = $_POST['permission_group_id'] ?? 0;
    $state_code          = $_POST['state_code'] ?? "";
    $country_code        = $_POST['country_code'] ?? "USA";
    $is_active           = $_POST['is_active'] ?? 1;

    $update_values = array(
        'user_nickname'       => $user_nickname,
        'user_name'           => $user_name,
        'user_email'          => $user_email,
        'user_phone'          => $user_phone,
        'is_letter_receive'   => $is_letter_receive,
        'user_type'           => $user_type,
        'permission_group_id' => $permission_group_id,
        'state_code'          => $state_code,
        'country_code'        => $country_code,
        'is_active'           => $is_active,
        'updated_user'        => $SS_NICKNAME,
        'updated_at'          => date('Y-m-d H:i:s')
    );
    
    if($user_password != "") {
        
        $update_values['user_password'] = ENCRYPT_DATA($user_password, $define_val->CRYPT_METHOD, $define_val->CRYPT_KEY);
    }

    $db->update('users', $update_values, "user_id = '" . $user_id . "'");
}


if($ac == "user_delete") {

    $user_id = $_GET['id'] ?? 0;

    
    $db->delete("users", "user_id = '" . $user_id."'");
    
    $result_data = [
        "status" => "success",
        "msg" => "$user_id",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
