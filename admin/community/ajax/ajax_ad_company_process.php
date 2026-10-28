<?php

error_reporting(E_ALL & ~E_WARNING);

use BearTemplate\BearTemplate;
use service\ad_company_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "ad_company_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/community/service/service_ad_company.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "ad_company_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_used_type" => $_GET['s_used_type'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "title",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $ad_company_list = new ad_company_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "ad_company_list_body.tpl");

    $tpl->setLoop("T_LOOP", $ad_company_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $ad_company_list->paging,
        "navigation_text" => $ad_company_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "update_ad_company") {

    $id = $_POST["id"];

    $used_type = $_POST['used_type'] ?? "";
    $company_name = $_POST['company_name'] ?? "";
    $company_website = $_POST['company_website'] ?? "";
    $company_address = $_POST['company_address'] ?? "";
    $company_state_code = $_POST['company_state_code'] ?? "";
    $has_15_plus_employees = $_POST['has_15_plus_employees'] ?? "";
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;

    $update_values = array(

        'used_type' => $used_type,
        'company_name' => $company_name,
        'company_website' => $company_website,
        'company_address' => $company_address,
        'company_state_code' => $company_state_code,
        'has_15_plus_employees' => $has_15_plus_employees,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('ad_company', $update_values, 'ad_company_id = ' . $id);
    unset($update_values);
    
    $update_values = array(

        'company_name' => $company_name,     
        'updated_user' => $SS_NAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

  $db->update('community_recruit_listings', $update_values, 'ad_company_id = ' . $id);    
  $db->update('community_business', $update_values, 'ad_company_id = ' . $id);    
  unset($update_values);
    

}

if ($ac == "ad_company_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('ad_company', 'ad_company_id = ' . $id);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}
