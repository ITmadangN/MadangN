<?php
    
use BearTemplate\BearTemplate;
use user_service\business_list;
use common_service\service_reply_list;
use common_service\service_reply_write;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/community/service/service_business.php");
include("$DOCUMENT_ROOT/common_service/service_reply_list.php");
include("$DOCUMENT_ROOT/common_service/service_reply_write.php");

$ac = $_REQUEST['ac'];

if($ac == "business_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_business_type" => $_GET['s_business_type'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10,
        "random" => 'N'
    );

    $_SESSION['business'] = $fn_params;
    
    $business_list = new business_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "business_platinum_body.tpl");
    $tpl->setLoop("T_LOOP", $business_list->loop_platinum);
    $tpl->tprint("main");
    $content_platinum = $tpl->content;
    unset($tpl);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "business_regular_body.tpl");
    $tpl->setLoop("T_LOOP", $business_list->loop_regular);
    $tpl->tprint("main");
    $content_regular = $tpl->content;
    unset($tpl);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("platinum" => $content_platinum,  "regular" => $content_regular),
        "pagging" => $business_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_MULTI_CITY_NAME_RETURN($db, $s_state_code);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "select_city_name_other") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_MULTI_CITY_NAME_RETURN_TEST($db, $s_state_code);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "select_one_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";
    $s_city_name = $_GET['s_city_name'] ?? "";
    $init_type = $_GET['init_type'] ?? "";

    if($init_type == "all")  $html = DB_ARRAY_CITY_NAME_RETURN($db, $s_state_code,$s_city_name, '도시전체');
    else if($init_type == "one") $html = DB_ARRAY_CITY_NAME_RETURN($db, $s_state_code,$s_city_name,'도시선택');
    else $html = DB_ARRAY_CITY_NAME_RETURN($db, $s_state_code,$s_city_name,'');

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if($ac == "reply_list") {

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? "community_business",
        "parent_id" => $_GET['parent_id'] ?? ""
    );

    $reply_list = new service_reply_list($db, $define_val, $fn_params);

    $html = $reply_list->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html)
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "reply_save") {

    $comments = $_GET['comments'] ?? "";
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? 1,
        "parent_id" => $_GET['parent_id'] ?? "",
        "user_id" =>  $SS_ID,
        "comments" => $comments = $_GET['comments'] ?? "",
        "ip_address" => $_SERVER['REMOTE_ADDR']
    );

    $reply_write = new service_reply_write($db, $define_val, $fn_params);

    $reply_list = new service_reply_list($db, $define_val, $fn_params);

    $html = $reply_list->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html)
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "business_write") {

    $id = $_POST["id"];

    $advertising_level = "regular";
    $business_type = $_POST['business_type'] ?? "";
    $title = $_POST['title'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $content = $_POST['content'] ?? "";
    $internal_notes = "";
    $is_active = 1;

    $cnt = 0;
    $image_01_url = "";
    $image_01_key = "";
    foreach ($_FILES["user_files"]["error"] as $key => $error) {
        $tmp_name = $_FILES["user_files"]["tmp_name"][$key];
        if (!$tmp_name) continue;

        switch ($cnt) {
            case 0:
                $image_01_url = $tmp_name;
                $image_01_key = $key;
                break;

        }

        $cnt++;
    }

    $insert_values = array(
        'user_id' => $SS_ID ?? "",
        'advertising_level' => $advertising_level,
        'business_type' => $business_type,
        'main_image_url' => $image_01_url,
        'title' => $title,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'content' => $content,
        'internal_notes' => $internal_notes,
        'is_active' => 1,
        'created_user' => $SS_NICKNAME,
        'updated_user' => '',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
    );

    $db->insert('community_business', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    if($image_01_key != "") FILE_UPLOAD_ARRAY("user","business_files", "business", $lastInsertId, "user_files", "main", $image_01_key);
}

if ($ac == "business_update") {

    $id = $_POST["id"];

    $business_type = $_POST['business_type'] ?? "";
    $title = $_POST['title'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $content = $_POST['content'] ?? "";
    $internal_notes = $_POST['internal_notes'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;

    $update_values = array(
        'business_type' => $business_type,
        'title' => $title,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'content' => $content,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('community_business', $update_values, 'community_business_id = ' . $id);

    FILE_UPLOAD("admin","business_files", "business", $id, "main_image_url", "main");

}


if($ac == "business_delete") {

    $id = $_GET['id'] ?? 0;

    // 실제 삭제 하지 않음
    $update_values = array(
        'is_active' => 0,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('community_business', $update_values, 'community_business_id = ' . $id);
    /*
    $db->delete('community_business', 'community_business_id = ' . $id);
    FILE_DELETE("admin","business_files", "business", $id, "main");
    */

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}