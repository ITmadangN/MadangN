<?php

//    error_reporting(E_ALL);
//    ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\marketsale_market_users_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_user_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/towninfo/service/service_marketsale_market_users.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "marketsale_market_users_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_market" => $_GET['s_market'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $marketsale_market_users_list = new marketsale_market_users_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "marketsale_market_users_list_body.tpl");

    $tpl->setLoop("T_LOOP", $marketsale_market_users_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $marketsale_market_users_list->paging,
        "navigation_text" => $marketsale_market_users_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "write_marketsale_market_users") {


    $towninfo_marketsale_market_id = $_POST['towninfo_marketsale_market_id'] ?? "";
    $user_id = $_POST['user_id'] ?? '';
    //$weekly_ads_flyer_site = $_POST['weekly_ads_flyer_site'] ?? '';    
    
    $is_active = $_POST['is_active'] ?? 0;

  
    $insert_values = array(

        'towninfo_marketsale_market_id' => $towninfo_marketsale_market_id,
        'user_id' => $user_id,
      //  'weekly_ads_flyer_site' => $weekly_ads_flyer_site,
        'is_active' => $is_active,        
        'created_user' => $SS_NICKNAME,
        'created_at' => date('Y-m-d H:i:s')
    );

    $db->insert('towninfo_marketsale_users', $insert_values);
    $lastInsertId = $db->getLastInsertId();


}


if ($ac == "update_marketsale_market_users") {

    $id = $_POST["id"];

    $towninfo_marketsale_market_id = $_POST['towninfo_marketsale_market_id'] ?? "";
    $user_id = $_POST['user_id'] ?? '';
    //$weekly_ads_flyer_site = $_POST['weekly_ads_flyer_site'] ?? '';    
    
    $is_active = $_POST['is_active'] ?? 0;

  
    $update_values = array(

        'towninfo_marketsale_market_id' => $towninfo_marketsale_market_id,
        'user_id' => $user_id,
     //   'weekly_ads_flyer_site' => $weekly_ads_flyer_site,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('towninfo_marketsale_users', $update_values, 'towninfo_marketsale_user_id = ' . $id);

}


if($ac == "marketsale_market_delete_users") {

    $id = $_GET['id'] ?? 0;

    $db->delete('towninfo_marketsale_users', 'towninfo_marketsale_user_id = ' . $id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
