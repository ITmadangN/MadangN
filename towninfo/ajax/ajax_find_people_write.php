<?php

// error_reporting(E_ALL & ~E_WARNING);


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$ac = $_REQUEST['ac'] ?? "";


if ($ac == "write_find_people") {

    $category = $_POST['category'] ?? "";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";

    $image_01_url = "";
    $image_02_url = "";
    $image_03_url = "";

    $image_01_key = "";
    $image_02_key = "";
    $image_03_key = "";

    $cnt = 0;
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

        }

        $cnt++;
    }


    $insert_values = array(
        'towninfo_find_people_id' => null,
        'user_id' => $SS_ID,
        'category' => $category,
        'title' => $title,
        'description' => $description,
        'image_01_url' => $image_01_url,
        'image_02_url' => $image_02_url,
        'image_03_url' => $image_03_url,
        'view_count' => 0,
        'is_active' => 1,
        'created_user' => $SS_NICKNAME,
        'updated_user' => '',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
    );

    $result = $db->insert("towninfo_find_people", $insert_values);
    $lastInsertId = $db->getLastInsertId();

    if($image_01_key != "") FILE_UPLOAD_ARRAY("user","find_people_files", "find_people", $lastInsertId, "user_files", "img1", $image_01_key);
    if($image_02_key != "") FILE_UPLOAD_ARRAY("user","find_people_files", "find_people", $lastInsertId, "user_files", "img2", $image_02_key);
    if($image_03_key != "") FILE_UPLOAD_ARRAY("user","find_people_files", "find_people", $lastInsertId, "user_files", "img3", $image_03_key);

}