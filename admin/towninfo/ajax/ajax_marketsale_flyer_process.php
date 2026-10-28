<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

error_reporting(E_ALL & ~E_WARNING);

use BearTemplate\BearTemplate;
use service\marketsale_flyer_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_flyer_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/towninfo/service/service_marketsale_flyer.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "marketsale_flyer_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",        
        "s_market" => $_GET['s_market'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",        
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $marketsale_flyer_list = new marketsale_flyer_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "marketsale_flyer_list_body.tpl");

    $tpl->setLoop("T_LOOP", $marketsale_flyer_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $marketsale_flyer_list->paging,
        "navigation_text" => $marketsale_flyer_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "write_marketsale_flyer") {


    $title = $_POST['title'] ?? "";
    $towninfo_marketsale_market_id = $_POST['towninfo_marketsale_market_id'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $description = $_POST['description'] ?? "";
    $sale_start_date = $_POST['sale_start_date'] ?? "";
    $sale_end_date = $_POST['sale_end_date'] ?? "";
    $weekly_ads_flyer_site = $_POST['weekly_ads_flyer_site'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;


//    $u_logo_url = GET_UPLOAD_IMAGE($_FILES['logo_url']['name'], '', '');

    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], '', '');


    $insert_values = array(

        'towninfo_marketsale_market_id' => $towninfo_marketsale_market_id,        
        'state_code' => $state_code,        
        'title' => $title,        
        'logo_url' => '',
        'main_image_url' => $u_main_image_url,
        'description' => $description,
        'user_id' => $SS_ID,
        'sale_start_date' => $sale_start_date,
        'sale_end_date' => $sale_end_date,
        'weekly_ads_flyer_site' => $weekly_ads_flyer_site,
        'is_active' => $is_active,        
        'created_user' => $SS_NICKNAME,
        'created_at' => date('Y-m-d H:i:s')
    );

    $db->insert('towninfo_marketsale_flyer', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    // FILE_UPLOAD("admin","marketsale_flyer_files", "marketsale_flyer", $lastInsertId, "logo_url", "logo");
    FILE_UPLOAD("admin","marketsale_flyer_files", "marketsale_flyer", $lastInsertId, "main_image_url", "main");
    
    // 연결
    if($weekly_ads_flyer_site != "") {
        
           $db->update('towninfo_marketsale_branch', array('towninfo_marketsale_flyer_id' => $lastInsertId) , "weekly_ads_flyer_site = '" . $weekly_ads_flyer_site . "'");
           
    }


}


if ($ac == "update_marketsale_flyer") {

    $id = $_POST["id"];

    
    $title = $_POST['title'] ?? "";
    $towninfo_marketsale_market_id = $_POST['towninfo_marketsale_market_id'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $description = $_POST['description'] ?? "";
    $sale_start_date = $_POST['sale_start_date'] ?? "";
    $sale_end_date = $_POST['sale_end_date'] ?? "";
    $weekly_ads_flyer_site = $_POST['weekly_ads_flyer_site'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;

//    $h_logo_url = $_POST['h_logo_url'] ?? "";
    $h_main_image_url = $_POST['h_main_image_url'] ?? "";

//    $del_logo_url = $_POST['del_logo_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";

//    $u_logo_url = GET_UPLOAD_IMAGE($_FILES['logo_url']['name'], $h_logo_url, $del_logo_url);
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);

    $ext = strtolower(pathinfo($h_main_image_url, PATHINFO_EXTENSION));
    if (in_array($ext, ['gif', 'jpeg', 'png'])) {
        echo "에러: GIF, JPEG, PNG 파일은 사용할 수 없습니다.";
        exit;
    }
    
    $update_values = array(

        'towninfo_marketsale_market_id' => $towninfo_marketsale_market_id,        
        'state_code' => $state_code,        
        'title' => $title,
        'description' => $description,
        'logo_url' => '',
        'main_image_url' => $u_main_image_url,
        'sale_start_date' => $sale_start_date,
        'sale_end_date' => $sale_end_date,
        'weekly_ads_flyer_site' => $weekly_ads_flyer_site,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('towninfo_marketsale_flyer', $update_values, 'towninfo_marketsale_flyer_id = ' . $id);

    //FILE_UPLOAD("admin","marketsale_flyer_files", "marketsale_flyer", $id, "logo_url", "logo");
    FILE_UPLOAD("admin","marketsale_flyer_files", "marketsale_flyer", $id, "main_image_url", "main");
    
    if($weekly_ads_flyer_site != "") {
        
           $db->update('towninfo_marketsale_branch', array('towninfo_marketsale_flyer_id' => $id) , "weekly_ads_flyer_site = '" . $weekly_ads_flyer_site . "'");
           
    }

}


if($ac == "marketsale_flyer_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('towninfo_marketsale_flyer', 'towninfo_marketsale_flyer_id = ' . $id);
//    FILE_DELETE("admin","marketsale_flyer_files", "marketsale_flyer", $id, "logo");
    FILE_DELETE("admin","marketsale_flyer_files", "marketsale_flyer", $id, "main");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

if($ac == "marketsale_weekly_ads_flyer_site") {

    $towninfo_marketsale_market_id = $_GET['towninfo_marketsale_market_id'] ?? 0;
    $state_code = $_GET['state_code'] ?? '';

    $market_name = GET_MARKET_NAME($db,$towninfo_marketsale_market_id);
    
    $content = GET_MARKETSALE_REGION(1,$market_name, $state_code, '',$db,'');
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content)        
    ];


    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
