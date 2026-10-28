<?php

use BearTemplate\BearTemplate;
use user_service\market_list;
use common_service\service_reply_list;
use common_service\service_reply_write;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/community/service/service_market.php");
include("$DOCUMENT_ROOT/common_service/service_reply_list.php");
include("$DOCUMENT_ROOT/common_service/service_reply_write.php");

$ac = $_REQUEST['ac'];

if($ac == "market_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_listing_type" => $_GET['s_listing_type'] ?? "market",
        "s_marketplace_type" => $_GET['s_marketplace_type'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10
    );

    $market_list = new market_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    if($fn_params['s_listing_type'] == "market" || $fn_params['s_listing_type'] == "msale" || $fn_params['s_listing_type'] == "donation" || $fn_params['s_listing_type'] == "wanted") $tpl->setFile("main", "market_body.tpl");
    //if($fn_params['s_listing_type'] == "wanted") $tpl->setFile("main", "wanted_body.tpl");
    if($fn_params['s_listing_type'] == "coupon") $tpl->setFile("main", "coupon_body.tpl");
    $tpl->setLoop("T_LOOP", $market_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);


    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $market_list->paging,
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


if($ac == "reply_list") {

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? "community_market",
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

    $user_id = $SS_ID;
    $comments = $_GET['comments'] ?? "";
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? 1,
        "parent_id" => $_GET['parent_id'] ?? "",
        "user_id" => $user_id,
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

if($ac == "market_write") {

    $id = $_POST["id"];

    $marketplace_price = $_POST['marketplace_price'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $listing_type = $_POST['listing_type'] ?? "";
    $marketplace_type = $_POST['marketplace_type'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $is_active = 1;

    $cnt = 0;
    $image_01_url = "";
    $image_01_key = "";
    $image_02_url = "";
    $image_02_key = "";
    $image_03_url = "";
    $image_03_key = "";
    $image_04_url = "";
    $image_04_key = "";
    $image_05_url = "";
    $image_05_key = "";
    $image_06_url = "";
    $image_06_key = "";

    foreach ($_FILES["user_files"]["error"] as $key => $error) {
        $tmp_name = $_FILES["user_files"]["tmp_name"][$key];
        if (!$tmp_name) continue;

        switch ($cnt) {
            case 0:
                $image_01_url = $tmp_name;
                $image_01_key = $key;
                break;
            case 1:
                $image_02_url = $tmp_name;
                $image_02_key = $key;
                break;
            case 2:
                $image_03_url = $tmp_name;
                $image_03_key = $key;
                break;
            case 3:
                $image_04_url = $tmp_name;
                $image_04_key = $key;
                break;
            case 4:
                $image_05_url = $tmp_name;
                $image_05_key = $key;
                break;
            case 5:
                $image_06_url = $tmp_name;
                $image_06_key = $key;
                break;
        }

        $cnt++;
    }

    $insert_values = array(
        'user_id' => $SS_ID ?? "",
        'listing_type' => $listing_type,
        'marketplace_type' => $marketplace_type,
        'title' => $title,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'marketplace_price' => $marketplace_price,
        'contact_phone' => $contact_phone,
        'description' => $description,
        'image_01_url' => $image_01_url,
        'image_02_url' => $image_02_url,
        'image_03_url' => $image_03_url,
        'image_04_url' => $image_04_url,
        'image_05_url' => $image_05_url,
        'image_06_url' => $image_06_url,
        'is_active' => 1,
        'created_user' => $SS_NICKNAME,
        'updated_user' => '',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
    );

    $db->insert('community_marketplace_listings', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    if($image_01_key != "") FILE_UPLOAD_ARRAY("user","market_files", "market", $lastInsertId, "user_files", "img1", $image_01_key);
    if($image_02_key != "") FILE_UPLOAD_ARRAY("user","market_files", "market", $lastInsertId, "user_files", "img2", $image_02_key);
    if($image_03_key != "") FILE_UPLOAD_ARRAY("user","market_files", "market", $lastInsertId, "user_files", "img3", $image_03_key);
    if($image_04_key != "") FILE_UPLOAD_ARRAY("user","market_files", "market", $lastInsertId, "user_files", "img4", $image_04_key);
    if($image_05_key != "") FILE_UPLOAD_ARRAY("user","market_files", "market", $lastInsertId, "user_files", "img5", $image_05_key);
    if($image_06_key != "") FILE_UPLOAD_ARRAY("user","market_files", "market", $lastInsertId, "user_files", "img6", $image_06_key);
}

if ($ac == "market_update") {

    $id = $_POST["id"];

    $marketplace_price = $_POST['marketplace_price'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $marketplace_type = $_POST['marketplace_type'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";

    $cnt = 0;

    $row = GET_ONE_ROW($db, "SELECT A.* FROM community_marketplace_listings A where  A.community_marketplace_listings_id  = :id and A.is_active = 1", $id);

    $array_key = array("{$row->image_01_url}","{$row->image_02_url}","{$row->image_03_url}","{$row->image_04_url}","{$row->image_05_url}","{$row->image_06_url}");

    if($_POST['del_image_01_url'] != 'N') {  FILE_DELETE("user","market_files","market",$id,"img1"); $array_key[0] = '';}
    if($_POST['del_image_02_url'] != 'N') {  FILE_DELETE("user","market_files","market",$id,"img2"); $array_key[1] = '';}
    if($_POST['del_image_03_url'] != 'N') {  FILE_DELETE("user","market_files","market",$id,"img3"); $array_key[2] = '';}
    if($_POST['del_image_04_url'] != 'N') {  FILE_DELETE("user","market_files","market",$id,"img4"); $array_key[3] = '';}
    if($_POST['del_image_05_url'] != 'N') {  FILE_DELETE("user","market_files","market",$id,"img5"); $array_key[4] = '';}
    if($_POST['del_image_06_url'] != 'N') {  FILE_DELETE("user","market_files","market",$id,"img6"); $array_key[5] = '';}

    if($_FILES["image_01_url"]["size"] > 0) { $array_key[0] = $_FILES["image_01_url"]["name"]; FILE_UPLOAD("user","market_files","market",$id,"image_01_url","img1"); }
    if($_FILES["image_02_url"]["size"] > 0) { $array_key[1] = $_FILES["image_02_url"]["name"]; FILE_UPLOAD("user","market_files","market",$id,"image_02_url","img2"); }
    if($_FILES["image_03_url"]["size"] > 0) { $array_key[2] = $_FILES["image_03_url"]["name"]; FILE_UPLOAD("user","market_files","market",$id,"image_03_url","img3"); }
    if($_FILES["image_04_url"]["size"] > 0) { $array_key[3] = $_FILES["image_04_url"]["name"]; FILE_UPLOAD("user","market_files","market",$id,"image_04_url","img4"); }
    if($_FILES["image_05_url"]["size"] > 0) { $array_key[4] = $_FILES["image_05_url"]["name"]; FILE_UPLOAD("user","market_files","market",$id,"image_05_url","img5"); }
    if($_FILES["image_06_url"]["size"] > 0) { $array_key[5] = $_FILES["image_06_url"]["name"]; FILE_UPLOAD("user","market_files","market",$id,"image_06_url","img6"); }

    $update_values = array(
        'marketplace_type' => $marketplace_type,
        'title' => $title,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'marketplace_price' => $marketplace_price,
        'contact_phone' => $contact_phone,
        'description' => $description,
        'image_01_url' => $array_key[0],
        'image_02_url' => $array_key[1],
        'image_03_url' => $array_key[2],
        'image_04_url' => $array_key[3],
        'image_05_url' => $array_key[4],
        'image_06_url' => $array_key[5],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
    );

    $db->update('community_marketplace_listings', $update_values, 'community_marketplace_listings_id = ' . $id);

}


if($ac == "market_delete") {

    $id = $_GET['id'] ?? 0;

    // 실제 삭제 하지 않음
    $update_values = array(
        'is_active' => 0,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('community_marketplace_listings', $update_values, 'community_marketplace_listings_id = ' . $id);
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