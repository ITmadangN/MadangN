<?php


use BearTemplate\BearTemplate;
use service\marketsale_branch_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_branch_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/towninfo/service/service_marketsale_branch.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "marketsale_branch_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_market" => $_GET['s_market'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $marketsale_branch_list = new marketsale_branch_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "marketsale_branch_list_body.tpl");

    $tpl->setLoop("T_LOOP", $marketsale_branch_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $marketsale_branch_list->paging,
        "navigation_text" => $marketsale_branch_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "make_branch_html") {

    $cnt = $_GET['cnt'] ?? 1;

    $branch_name = $_GET['branch_name'] ?? '';
    $state_code = $_GET['state_code'] ?? '';
    $city_name = $_GET['city_name'] ?? '';

    $county_code = $_GET['county_code'] ?? '';
    $contact_name = $_GET['contact_name'] ?? '';
    $contact_email = $_GET['contact_email'] ?? '';
    $contact_phone = $_GET['contact_phone'] ?? '';

    $branch_display_method = $_GET['branch_display_method'] ?? '';
    $is_default = $_GET['is_default'] ?? '';

    $html = MAKE_MARKETSALE_BRANCH($branch_name, $state_code, $city_name, $county_code, $contact_name, $contact_email, $contact_phone, $branch_display_method, $is_default, $cnt, $db, $define_val);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if($ac == "select_city_name") {

    $state_code = $_GET['state_code'] ?? '';
    $city_name = $_GET['city_name'] ?? '';

    $html = GET_MARKETSALE_CITY_NAME( -1, $state_code,  $city_name, $db,'도시선택');

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

if($ac == "select_county") {

    $state_code = $_GET['state_code'] ?? '';
    $county = $_GET['county'] ?? '';

    $html = GET_MARKETSALE_COUNTY( -1, $state_code,  $county, $db,'카운티선택');

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

if ($ac == "write_marketsale_branch") {


    $id = $_POST["id"];

    $market_id          = $_POST['towninfo_marketsale_market_id'] ?? "";
    $flyer_id           = $_POST['towninfo_marketsale_flyer_id'] ?? 0;    
    $branch_name        = $_POST['branch_name'] ?? '';
    $state_code         = $_POST['state_code'] ?? "";
    $state_name         = $_POST['state_name'] ?? "";
    $region             = $_POST['region'] ?? "";
    $city_name          = $_POST['city_name'] ?? "";
    $county_name        = $_POST['county_name'] ?? "";
    $contact_name       = $_POST['contact_name'] ?? "";
    $contact_email      = $_POST['contact_email'] ?? "";
    $contact_phone      = $_POST['contact_phone'] ?? "";
    $sale_start_day      = $_POST['sale_start_day'] ?? "";
    $weekly_ads_flyer_site      = $_POST['weekly_ads_flyer_site'] ?? "";
    $branch_display_method = $_POST['branch_display_method'] ?? "2";
    
    $is_default = $_POST['is_default'] ?? "0";
    $is_active = $_POST['is_active'] ?? "0";
    
    $insert_values = array(
        
        'towninfo_marketsale_market_id'             => $market_id,
        'towninfo_marketsale_flyer_id'              => $flyer_id,
        'branch_name'                  => $branch_name,
        'state_code'            => $state_code,
        'state_name'            => $state_name,
        'region'                => $region,
        'city_name'             => $city_name,
        'county_name'           => $county_name,
        'contact_name'          => $contact_name,
        'contact_email'         => $contact_email,
        'contact_phone'         => $contact_phone,
        'sale_start_day'        => $sale_start_day,
        'weekly_ads_flyer_site'       => $weekly_ads_flyer_site,
        'branch_display_method'        => $branch_display_method,
        'is_default'            => $is_default,
        'is_active'             => $is_active,
        'created_user'          => $SS_NICKNAME,        
        'updated_user'          => '',
        'created_at'            =>  date('Y-m-d H:i:s'),
        'updated_at'            => ''
    );
    
    $db->insert('towninfo_marketsale_branch', $insert_values);

}


if ($ac == "update_marketsale_branch") {

    $id = $_POST["id"];

    $market_id          = $_POST['towninfo_marketsale_market_id'] ?? "";
    $flyer_id           = $_POST['towninfo_marketsale_flyer_id'] ?? 0;    
    $branch_name        = $_POST['branch_name'] ?? '';
    $state_code         = $_POST['state_code'] ?? "";
    $state_name         = $_POST['state_name'] ?? "";
    $region             = $_POST['region'] ?? "";
    $city_name          = $_POST['city_name'] ?? "";
    $county_name        = $_POST['county_name'] ?? "";
    $contact_name       = $_POST['contact_name'] ?? "";
    $contact_email      = $_POST['contact_email'] ?? "";
    $contact_phone      = $_POST['contact_phone'] ?? "";
    $sale_start_day      = $_POST['sale_start_day'] ?? "";
    $weekly_ads_flyer_site      = $_POST['weekly_ads_flyer_site'] ?? "";
    $branch_display_method = $_POST['branch_display_method'] ?? "2";
    
    $is_default = $_POST['is_default'] ?? "0";
    $is_active = $_POST['is_active'] ?? "0";

    $update_values = array(

        'towninfo_marketsale_market_id'             => $market_id,
        'towninfo_marketsale_flyer_id'              => $flyer_id,
        'branch_name'                  => $branch_name,
        'state_code'            => $state_code,
        'state_name'            => $state_name,
        'region'                => $region,
        'city_name'             => $city_name,
        'county_name'           => $county_name,
        'contact_name'          => $contact_name,
        'contact_email'         => $contact_email,
        'contact_phone'         => $contact_phone,
        'sale_start_day'        => $sale_start_day,
        'weekly_ads_flyer_site'       => $weekly_ads_flyer_site,
        'branch_display_method'        => $branch_display_method,
        'is_default'            => $is_default,
        'is_active'             => $is_active,        
        'updated_user'          => $SS_NICKNAME,
        'updated_at'            => date('Y-m-d H:i:s')
    );
        
    $db->update('towninfo_marketsale_branch', $update_values, 'towninfo_marketsale_branch_id = ' . $id);

    
}


if ($ac == "marketsale_branch_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('towninfo_marketsale_branch', 'towninfo_marketsale_branch_id = ' . $id);
   
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
