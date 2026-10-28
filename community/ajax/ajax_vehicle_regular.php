<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
    
use BearTemplate\BearTemplate;
use user_service\vehicle_regular_car_list;
use common_service\service_reply_list;
use common_service\service_reply_write;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle_regular.php");
include("$DOCUMENT_ROOT/common_service/service_reply_list.php");
include("$DOCUMENT_ROOT/common_service/service_reply_write.php");


$ac = $_REQUEST['ac'];

if($ac == "regular_car_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_car_maker" => $_GET['s_car_maker'] ?? "",
        "s_min_car_year" => $_GET['s_min_car_year'] ?? "",
        "s_max_car_year" => $_GET['s_max_car_year'] ?? "",
        "s_community_car_dealers_id" => $_GET['s_community_car_dealers_id'] ?? "",
        "s_listing_price_start" => $_GET['s_listing_price_start'] ?? "",
        "s_listing_price_end" => $_GET['s_listing_price_end'] ?? "",
        "s_car_mileage_start" => $_GET['s_car_mileage_start'] ?? "",
        "s_car_mileage_end" => $_GET['s_car_mileage_end'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10
    );

    $regular_car_list = new vehicle_regular_car_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "vehicle_regular_body.tpl");
    $tpl->setLoop("T_LOOP", $regular_car_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $regular_car_list->paging,
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

if($ac == "reply_list") {

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? 1,
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

    $user_id = $_SESSION['user_id'] ?? "";
    $comments = $_GET['comments'] ?? "";
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? "community_vehicle_regular",
        "parent_id" => $_GET['parent_id'] ?? "",
        "user_id" => $user_id = $_SESSION['user_id'] ?? "",
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

if($ac == "vehicle_regular_write") {

    $seller_name = $_POST['seller_name'] ?? "";
    $seller_email = $_POST['seller_email'] ?? "";
    $seller_phone = $_POST['seller_phone'] ?? "";

    $car_maker = $_POST['car_maker'] ?? "";
    $car_model = $_POST['car_model'] ?? "";
    $car_year = $_POST['car_year'] ?? "";
    $car_color = $_POST['car_color'] ?? "";

    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";

    $listing_price = $_POST['listing_price'] ?? "";
    $car_mileage = $_POST['car_mileage'] ?? "";
    $fuel_type = $_POST['fuel_type'] ?? "";
    $body_type = $_POST['body_type'] ?? "";
    $transmission = $_POST['transmission'] ?? "";
    $car_accident_history = $_POST['car_accident_history'] ?? "";

    $options_description = $_POST['options_description'] ?? "";
    $description = $_POST['description'] ?? "";
    $is_active = 1;

    /*
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

    $image_07_url = "";
    $image_07_key = "";
    $image_08_url = "";
    $image_08_key = "";
    $image_09_url = "";
    $image_09_key = "";
    $image_10_url = "";
    $image_10_key = "";
    $image_11_url = "";
    $image_11_key = "";
    $image_12_url = "";
    $image_12_key = "";
    $image_13_url = "";
    $image_13_key = "";
    */

    $array_upload = array();
    $g_num = 0;
    
    if (!empty($_FILES["user_files"]["error"]) && is_array($_FILES["user_files"]["error"])) {    

        foreach ($_FILES["user_files"]["error"] as $key => $error) {

            $file_name = $_FILES["user_files"]["name"][$key];
            $tmp_name  = $_FILES["user_files"]["tmp_name"][$key];
            $file_size = $_FILES["user_files"]["size"][$key];
            
             // 업로드된 파일인지 확인 (보안)
            if (!is_uploaded_file($tmp_name)) continue;

            $array_upload[$g_num]['url'] = $file_name;
            $array_upload[$g_num]['key'] = $key;

            $g_num++;
        }    
        
    }

    $insert_values = array(
        'community_car_listings_id' => null,
        'community_car_dealers_id' => 0,
        'user_id' => $SS_ID ?? "",
        'seller_name' => $seller_name,
        'seller_phone' => $seller_phone,
        'seller_email' => $seller_email,
        'listing_price' => $listing_price,
        'listing_date' => date('Y-m-d H:i:s'),
        'state_code' => $state_code,
        'city_name' => $city_name,
        'car_accident_history' => $car_accident_history,
        'car_maker' => $car_maker,
        'car_year' => $car_year,
        'car_color' => $car_color,
        'car_model' => $car_model,
        'car_mileage' => $car_mileage,
        'fuel_type' => $fuel_type,
        'body_type' => $body_type,
        'transmission' => $transmission,
        'options_description' => $options_description,
        'description' => $description,
        'view_count' => 0,
        'advertiser_notes' => '',
        'internal_notes' => '',
        'listing_status' => 'active',
        'is_active' => 1,
        'created_user' => $SS_NICKNAME ?? "",
        'updated_user' => $SS_NICKNAME ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']

    );

    $db->insert('community_car_listings', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    for($i=0; $i<count($array_upload); $i++) {

        $url = $array_upload[$i]['url'];
        $key = $array_upload[$i]['key'];

        $insert_image_values = array(
            'community_car_listing_images_id' => null,
            'community_car_listings_id' => $lastInsertId,
            'image_order' => $i+1,
            'image_url' => $url,
            'is_active' => 1,
            'created_user' => $SS_NICKNAME ?? "",
            'updated_user' => $SS_NICKNAME ?? "",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR']
        );

        $db->insert('community_car_listing_images', $insert_image_values);
        $lastInsertIdImage = $db->getLastInsertId();

        if($key != "") FILE_UPLOAD_ARRAY("user","vehicle_files", "vehicle", $lastInsertId, "user_files", "img".$lastInsertIdImage, $key);
    }
    
    echo json_encode(array('result' => 'success', 'msg' => '등록되었습니다.'));

}

if($ac == "vehicle_regular_update") {

    $id = $_POST['id'] ?? "";
    
    $seller_name = $_POST['seller_name'] ?? "";
    $seller_email = $_POST['seller_email'] ?? "";
    $seller_phone = $_POST['seller_phone'] ?? "";

    $car_maker = $_POST['car_maker'] ?? "";
    $car_model = $_POST['car_model'] ?? "";
    $car_year = $_POST['car_year'] ?? "";
    $car_color = $_POST['car_color'] ?? "";

    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";

    $listing_price = $_POST['listing_price'] ?? "";
    $car_mileage = $_POST['car_mileage'] ?? "";
    $fuel_type = $_POST['fuel_type'] ?? "";
    $body_type = $_POST['body_type'] ?? "";
    $transmission = $_POST['transmission'] ?? "";    
    $car_accident_history = $_POST['car_accident_history'] ?? "";

    $options_description = $_POST['options_description'] ?? "";
    $description = $_POST['description'] ?? "";
    
    $h_del_img = $_POST['h_del_img'] ?? "";
    $h_exist_image = $_POST['h_exist_image'] ?? "";
    
    
    $is_active = 1;

    $cnt = 0;

    $array_key = array();

    $sql = "SELECT max(image_order) as image_order FROM community_car_listing_images A where  A.community_car_listings_id  = :id";
    $placeholders = ['id' => $id];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();

    $image_order = $row->image_order + 1;
        
    if($h_del_img != "") {

        // 삭제된것 처리
        $del_img = explode(",",$h_del_img);
        
        for($i=0;$i<count($del_img);$i++) {
            //$t_del_id = explode("_",$del_img[$i]);
            $del_id = $del_img[$i]; // value=",in_upload_image_70"
            
            $db->delete('community_car_listing_images', 'community_car_listing_images_id = ' . $del_id);
            FILE_DELETE("user","vehicle_files", "vehicle", $id, "img".$del_id);
            
                       
        }
    
    }
    
    $array_upload = array();
    $g_num = 0;
    
    if (!empty($_FILES["user_files"]["error"]) && is_array($_FILES["user_files"]["error"])) {    
        
        foreach ($_FILES["user_files"]["error"] as $key => $error) {

            $file_name = $_FILES["user_files"]["name"][$key];
            $tmp_name  = $_FILES["user_files"]["tmp_name"][$key];
            $file_size = $_FILES["user_files"]["size"][$key];
            
             // 업로드된 파일인지 확인 (보안)
            if (!is_uploaded_file($tmp_name)) continue;

            $array_upload[$g_num]['url'] = $file_name;
            $array_upload[$g_num]['key'] = $key;

            $g_num++;
        }    
        
    }    


    $update_values = array(    
        'seller_name' => $seller_name,
        'seller_phone' => $seller_phone,
        'seller_email' => $seller_email,
        'listing_price' => $listing_price,        
        'state_code' => $state_code,
        'city_name' => $city_name,
        'car_accident_history' => $car_accident_history,
        'car_maker' => $car_maker,
        'car_year' => $car_year,
        'car_color' => $car_color,
        'car_model' => $car_model,
        'car_mileage' => $car_mileage,
        'fuel_type' => $fuel_type,
        'body_type' => $body_type,
        'transmission' => $transmission,
        'options_description' => $options_description,
        'description' => $description,        
        'updated_user' => $SS_NICKNAME ?? "",        
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']

    );

    $db->update('community_car_listings', $update_values, 'community_car_listings_id = ' . $id);

    for($i=0; $i<count($array_upload); $i++) {

        $url = $array_upload[$i]['url'];
        $key = $array_upload[$i]['key'];

        $insert_image_values = array(
            'community_car_listing_images_id' => null,
            'community_car_listings_id' => $id,
            'image_order' => $image_order + $i,
            'image_url' => $url,
            'is_active' => 1,
            'created_user' => $SS_NICKNAME ?? "",
            'created_at' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR']
        );
        
        $db->insert('community_car_listing_images', $insert_image_values);
        $lastInsertIdImage = $db->getLastInsertId();
        unset($insert_image_values);

        if ($key != "") FILE_UPLOAD_ARRAY("user","vehicle_files", "vehicle", $id, "user_files", "img".$lastInsertIdImage, $key);
    }
    
/*    $exist_image = explode(",",$h_exist_image);
    
    for($i=1;$i<count($exist_image)+1;$i++) {
        
        $upload_file = "upload_image_".$exist_image[$i];
        
        if (is_uploaded_file($_FILES[$upload_file]["tmp_name"])) {
            
            FILE_UPLOAD("user","vehicle_files", "vehicle",$id,$upload_file,"img".$exist_image[$i]);
        }
        
    }
    */

}


if($ac == "vehicle_regular_delete") {

    $id = $_GET['id'] ?? 0;

    // 실제 삭제 하지 않음
    $update_values = array(
        'is_active' => 0,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('community_car_listings', $update_values, 'community_car_listings_id = ' . $id);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}