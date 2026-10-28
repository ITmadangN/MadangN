<?php

//error_reporting(E_ALL & ~E_WARNING);

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
use BearTemplate\BearTemplate;
use service\agent_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "agent_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/realstate/service/service_agent.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "agent_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_is_preminum_agent" => $_GET['s_is_preminum_agent'] ?? "",
        "s_has_active_listings" => $_GET['s_has_active_listings'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "name",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "s_is_approved" => $_GET['s_is_approved'] ?? "",        
        "s_has_active_advertisement" => $_GET['s_has_active_advertisement'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );
    

    $agent_list = new agent_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "agent_list_body.tpl");

    $tpl->setLoop("T_LOOP", $agent_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $agent_list->paging,
        "navigation_text" => $agent_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "update_agent") {

    $id = $_POST["id"];

    $user_id = $_POST['user_id'] ?? "";
    $agent_full_name = $_POST['agent_full_name'] ?? "";
    $specialized_field = $_POST['specialized_field'] ?? "";
    $agent_dre_license = $_POST['agent_dre_license'] ?? "";
    $agent_phone = $_POST['agent_phone'] ?? "";
    $agent_email = $_POST['agent_email'] ?? "";
    $self_introduction = $_POST['self_introduction'] ?? "";    
    
        // 오피스정보
    $office_key = $_POST['office_key'] ?? "";        
    $office_mls_id = $_POST['office_mls_id'] ?? "";
    $office_name = $_POST['office_name'] ?? "";
    $office_phone = $_POST['office_phone'] ?? "";
    $office_email = $_POST['office_email'] ?? "";
    $office_address1 = $_POST['office_address1'] ?? "";
    $office_address2 = $_POST['office_address2'] ?? "";
    $office_state = $_POST['office_state'] ?? "";
    $office_city = $_POST['office_city'] ?? "";
    $office_zip = $_POST['office_zip'] ?? "";
    
    $is_active = $_POST['is_active'] ?? 0;
    $is_approved = $_POST['is_approved'] ?? 0;
    $is_preminum_agent = $_POST['is_preminum_agent'] ?? 0;
    $has_active_listings = $_POST['has_active_listings'] ?? 0;

    $h_main_image_url = $_POST['h_main_image_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";
    
    $h_logo_image_url = $_POST['h_logo_image_url'] ?? "";
    $del_logo_image_url = $_POST['del_logo_image_url'] ?? "";
    
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);
    $u_logo_image_url = GET_UPLOAD_IMAGE($_FILES['logo_image_url']['name'], $h_logo_image_url, $del_logo_image_url);
    
    if($del_logo_image_url == 'Y') FILE_DELETE("admin", "office_files", "office", $office_key, "logo");
    if($del_main_image_url == 'Y') FILE_DELETE("admin", "agent_files", "agent", $id, "main");
    
    $update_values = array(
        'agent_full_name' => $agent_full_name,
        'specialized_field' => $specialized_field,        
        'agent_dre_license' => $agent_dre_license,
        'agent_phone' => $agent_phone,
        'agent_email' => $agent_email,
        'office_name' => $office_name,
        'main_image_url' => $u_main_image_url,
        'is_active' => $is_active,
        'is_approved' => $is_approved,
        'is_preminum_agent' => $is_preminum_agent,
        'has_active_listings' => $has_active_listings,
        'user_id' => $user_id,
        'self_introduction' => $self_introduction
        
    );

    $db->update('realestate_agents', $update_values, 'realestate_agent_id = ' . $id);
    unset($update_values);

    FILE_UPLOAD("admin","agent_files", "agent", $id, "main_image_url", "main");    
    
    $update_values = array(        
        'office_name' => $office_name,
        'office_mls_id' => $office_mls_id,
        'office_phone' => $office_phone,
        'office_email' => $office_email,
        'office_address1' => $office_address1,
        'office_address2' => $office_address2,
        'office_city' => $office_city,
        'office_state' => $office_state,
        'office_zip' => $office_zip
        
    );
    
    if($u_logo_image_url != "")  $update_values['logo_image_url'] = $u_logo_image_url;                        

    $db->update('realestate_office', $update_values, "office_key = '" . $office_key."'");    
    
    if($u_logo_image_url != "") FILE_UPLOAD("admin","office_files", "office", $office_key, "logo_image_url", "logo");          
    
    $update_pay_values = array(
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('ad_payments', $update_pay_values, 'section_type = 5 and listing_id = ' . $id);  


}


if($ac == "agent_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('ad_payments', 'section_type = 5 and listing_id = ' . $id);
    
    $db->delete('realestate_agents', 'realestate_agent_id = ' . $id);
    FILE_DELETE("admin","agent_files", "agent", $id, "main");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}