<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');
use BearTemplate\BearTemplate;
use user_service\realestate_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/realestate/service/service_realestate.php");

$ac = $_REQUEST['ac'];

if ($ac == "realestate_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_menu" => $_GET['s_menu'] ?? "",
        "s_property_type" => $_GET['s_property_type'] ?? "",
        "s_property_sub_type" => $_GET['s_property_sub_type'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_listing_price_start" => $_GET['s_listing_price_start'] ?? "",
        "s_listing_price_end" => $_GET['s_listing_price_end'] ?? "",
        "s_bedrooms_total" => $_GET['s_bedrooms_total'] ?? "",        
        "s_bathrooms_total" => $_GET['s_bathrooms_total'] ?? "",
        "agent_key"  => $_GET['agent_key'] ?? "", 
        "office_key" => "",
        "php_view" => $_GET['php_view'] ?? "",
        "page_set" => $_GET['s_cnt'] ?? 27,
        "block_set" => 10,
        "random" => 'N',
        "s_nynj" => $_GET['s_nynj'] ?? ''
        
    );

    $html_body__name = "";
    
    $realestate_list = new realestate_list($db, $define_val, $fn_params);

    if($fn_params['s_menu'] == "House") $html_body__name = "realestate_house_body.tpl";
    if($fn_params['s_menu'] == "Rental") $html_body__name = "realestate_rent_body.tpl";
    if($fn_params['s_menu'] == "Commercial") $html_body__name = "realestate_commercial_body.tpl";
    if($fn_params['s_menu'] == "Business") $html_body__name = "realestate_house_body.tpl";
    
    $html_body__name = "realestate_house_body.tpl";
    
    if($fn_params['agent_key'] != "") $html_body__name = "realestate_agent_dre_body.tpl";
    
    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", $html_body__name);
    $tpl->setLoop("T_LOOP", $realestate_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $realestate_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_MULTI_CITY_NAME_RETURN($db, $s_state_code);

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

    $html = DB_ARRAY_CITY_NAME_RETURN($db, $s_state_code,$s_city_name);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "select_one_property_type_sub") {

    $s_property_type = $_GET['s_property_type'] ?? "";

    $html = DB_ARRAY_CITY_NAME_RETURN($db, $s_property_type,'','전체');

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "write_comment") {

    $id = $_POST['rid'] ?? ""; 
    $agent_comment = $_POST['agent_comment'] ?? ""; 

    $update_values = array(        
        'agent_comment' => $agent_comment
    );

    $db->update('realestate_listing', $update_values, 'realestate_listing_id = ' . $id);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => ""),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "send_call") {
    
    $id = $_POST['rid'] ?? ""; 
    $user_name = $_POST['user_name'] ?? ""; 
    $user_email = $_POST['user_email'] ?? ""; 
    $user_phone = $_POST['user_phone'] ?? ""; 
    $user_content = $_POST['user_content'] ?? ""; 
    
    $sql = "SELECT A.*, B.agent_email, B.agent_phone, B.has_active_advertisement, B.is_approved
        FROM realestate_listing A
        left join realestate_agents B ON A.list_agent_key = B.agent_key
        left join realestate_office C ON A.list_office_key = C.office_key
        WHERE A.realestate_listing_id = :realestate_listing_id
        limit 0,1
        ";

    $placeholders = ['realestate_listing_id' => $id];

    $result = $db->query($sql, $placeholders);
    
    $row = $db->fetch();
    
    $p_agent_email              = $row->agent_email;
    $p_agent_phone              = $row->agent_phone;
    $p_has_active_advertisement = $row->has_active_advertisement;
    $p_is_approved              = $row->is_approved;
    $p_list_office_key          = $row->list_office_key;
    
    $body_email = "name : $user_name<br>";
    $body_email .= "email : $user_email<br>";
    $body_email .= "phone : $user_phone<br>";    
    $body_email .= "content : $user_content<br>";

    
    // 회사이메일
    $to_email = $define_val->REALESATE_EMAIL;
    
    // 에이전트 광고낸사람
    if($p_has_active_advertisement  == 1 && $p_is_approved == 1) {
        $to_email = $p_agent_email;
    }
    
    // colewell 인경우
    if($p_list_office_key == "3288918" || $p_list_office_key == "3285640" || $p_list_office_key == "3286864" || $p_list_office_key == "5602073") {
        
        $to_email = $p_agent_email;
        
    }
    
 //    $to_email = "rtrue@naver.com";
    
    $result = send_mail("admin@cbbestrealty.com",$to_email,"Contact a buyer's agent",$body_email);
    
    $result_data = [
        "status" => $result,
        "msg" => $result        
   

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);   
    
}

if($ac == "realstate_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('realestate_listing', 'realestate_listing_id = ' . $id);
    
    $db->delete('realestate_listing_media', 'realestate_listing_id = ' . $id);
    FILE_DELETE_MULTI_REALESTATE("user","realestate_files", "realestate", $id, "img");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}