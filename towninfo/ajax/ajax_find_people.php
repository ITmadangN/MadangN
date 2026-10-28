<?php

use BearTemplate\BearTemplate;
use user_service\service_find_people_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/towninfo/service/service_find_people_list.php");

$ac = $_REQUEST['ac'];

if($ac == "find_people_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_category" => $_GET['s_category'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10
    );

    $find_people_list = new service_find_people_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "find_people_body.tpl");
    $tpl->setLoop("T_LOOP", $find_people_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);


    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $find_people_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "update_find_people") {

    $category = $_POST['category'] ?? "";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";

    $id = $_POST['id'] ?? 0;

    $row = GET_ONE_ROW($db, "SELECT A.* FROM towninfo_find_people A where  A.towninfo_find_people_id  = :id and A.is_active = 1", $id);

    $array_key = array("{$row->image_01_url}","{$row->image_02_url}","{$row->image_03_url}");

    if($_POST['del_image_01_url'] != 'N') {  FILE_DELETE("user","find_people_files","find_people",$id,"img1"); $array_key[0] = '';}
    if($_POST['del_image_02_url'] != 'N') {  FILE_DELETE("user","find_people_files","find_people",$id,"img2"); $array_key[1] = '';}
    if($_POST['del_image_03_url'] != 'N') {  FILE_DELETE("user","find_people_files","find_people",$id,"img3"); $array_key[2] = '';}

    if($_FILES["image_01_url"]["size"] > 0) { $array_key[0] = $_FILES["image_01_url"]["name"]; FILE_UPLOAD("user","find_people_files","find_people",$id,"image_01_url","img1"); }
    if($_FILES["image_02_url"]["size"] > 0) { $array_key[1] = $_FILES["image_02_url"]["name"]; FILE_UPLOAD("user","find_people_files","find_people",$id,"image_02_url","img2"); }
    if($_FILES["image_03_url"]["size"] > 0) { $array_key[2] = $_FILES["image_03_url"]["name"]; FILE_UPLOAD("user","find_people_files","find_people",$id,"image_03_url","img3"); }

    $update_values = array(
        'category' => $category,
        'title' => $title,
        'description' => $description,
        'image_01_url' => $array_key[0],
        'image_02_url' => $array_key[1],
        'image_03_url' => $array_key[2],
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
    );

    $db->update('towninfo_find_people', $update_values, 'towninfo_find_people_id = ' . $id);

}

if($ac == "find_people_delete") {

    $id = $_GET['id'] ?? 0;

    // 실제 삭제 하지 않음
    $update_values = array(
        'is_active' => 0,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('towninfo_find_people', $update_values, 'towninfo_find_people_id = ' . $id);
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