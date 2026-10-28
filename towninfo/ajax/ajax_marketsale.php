<?php

// error_reporting(E_ALL & ~E_WARNING);


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$ac = $_REQUEST['ac'] ?? "";


if ($ac == "write_marketsale") {

    $towninfo_marketsale_market_id = $_POST['towninfo_marketsale_market_id'] ?? "";
    $title = $_POST['title'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $description = $_POST['description'] ?? "";
    $sale_start_date = $_POST['sale_start_date'] ?? "";
    $sale_end_date = $_POST['sale_end_date'] ?? "";
    $weekly_ads_flyer_site = $_POST['weekly_ads_flyer_site'] ?? "";

    $image_01_url = "";
    $image_01_key = "";
   
    $cnt = 0;
    
    foreach ($_FILES["user_files"]["error"] as $key => $error) {
        $tmp_name = $_FILES["user_files"]["tmp_name"][$key];
        $file_name = $_FILES["user_files"]["name"][$key];
        if (!$tmp_name) continue;

        switch ($cnt) {
            case 0:
                $image_01_url = $tmp_name;
                $image_01_key = $key;  
                $image_01_file_name = $file_name;
                break;
        }

        $cnt++;
    }

    $insert_values = array(

        'towninfo_marketsale_market_id' => $towninfo_marketsale_market_id,
        'state_code' => $state_code,        
        'title' => $title,        
        'logo_url' => '',
        'main_image_url' => $image_01_file_name,
        'description' => $description,
        'user_id' => $SS_ID,
        'sale_start_date' => $sale_start_date,
        'sale_end_date' => $sale_end_date,
        'weekly_ads_flyer_site' => $weekly_ads_flyer_site,
        'is_active' => 1,
        'created_user' => $SS_NAME,
        'created_at' => date('Y-m-d H:i:s')
    );

    $db->insert('towninfo_marketsale_flyer', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    if($image_01_key != "") FILE_UPLOAD_ARRAY("user","marketsale_flyer_files", "marketsale_flyer", $lastInsertId, "user_files", "main", $image_01_key);    
    
    // 연결
    if($weekly_ads_flyer_site != "") {
        
           $db->update('towninfo_marketsale_branch', array('towninfo_marketsale_flyer_id' => $lastInsertId) , "weekly_ads_flyer_site = '" . $weekly_ads_flyer_site . "'");
           
    }
    
    
}

if ($ac == "update_marketsale") {

    $id = $_POST["id"];

    $towninfo_marketsale_market_id = $_POST['towninfo_marketsale_market_id'] ?? "";
    $title = $_POST['title'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $description = $_POST['description'] ?? "";
    $sale_start_date = $_POST['sale_start_date'] ?? "";
    $sale_end_date = $_POST['sale_end_date'] ?? "";
    $weekly_ads_flyer_site = $_POST['weekly_ads_flyer_site'] ?? "";    

    $image_01_url = "";
    $image_01_key = "";
   
    $cnt = 0;
    
    foreach ($_FILES["user_files"]["error"] as $key => $error) {
        $tmp_name = $_FILES["user_files"]["tmp_name"][$key];
        $file_name = $_FILES["user_files"]["name"][$key];
        if (!$tmp_name) continue;

        switch ($cnt) {
            case 0:
                $image_01_url = $tmp_name;
                $image_01_key = $key;
                $image_01_file_name = $file_name;
                break;
        }

        $cnt++;
    }
    
    $update_values = array(

        'title' => $title,
        'description' => $description,
        'logo_url' => '',
         'state_code' => $state_code,  
        'sale_start_date' => $sale_start_date,
        'sale_end_date' => $sale_end_date,
        'weekly_ads_flyer_site' => $weekly_ads_flyer_site,
        'is_active' => 1,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );
    
    if($image_01_key != "") $update_values['main_image_url'] = $image_01_file_name;

    $db->update('towninfo_marketsale_flyer', $update_values, 'towninfo_marketsale_flyer_id = ' . $id);

    if($image_01_key != "") FILE_UPLOAD_ARRAY("user","marketsale_flyer_files", "marketsale_flyer", $id, "user_files", "main", $image_01_key);    
        
    if($weekly_ads_flyer_site != "") {
        
           $db->update('towninfo_marketsale_branch', array('towninfo_marketsale_flyer_id' => $id) , "weekly_ads_flyer_site = '" . $weekly_ads_flyer_site . "'");
           
    }

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
