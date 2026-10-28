<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\vehicle_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "autolisting_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/community/service/service_vehicle.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "vehicle_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_is_modify_yn" => $_GET['s_is_modify_yn'] ?? "",
        "s_dealer_yn" => $_GET['s_dealer_yn'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "title",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $vehicle_list = new vehicle_list($db, $db2, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "vehicle_list_body.tpl");

    $tpl->setLoop("T_LOOP", $vehicle_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $vehicle_list->paging,
        "navigation_text" => $vehicle_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_ARRAY_RETURN(0, "", $db, "common_code", "code_sub_name", "code_sub", "code = '$s_state_code' order by code_sub_name asc");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "update_vehicle__") {

    $id = $_POST["id"];


    $company_name = $_POST['company_name'] ?? "";
    $company_website = $_POST['company_website'] ?? "";
    $dealer_website = $_POST['dealer_website'] ?? "";
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $listing_address1 = $_POST['listing_address1'] ?? "";
    $listing_address2 = $_POST['listing_address2'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $listing_zip = $_POST['listing_zip'] ?? "";
    $listing_zip_ext = $_POST['listing_zip_ext'] ?? "";
    $listing_country = $_POST['listing_country'] ?? "";
    $dealer_introduction = $_POST['dealer_introduction'] ?? "";

    $is_active = $_POST['is_active'] ?? 0;

    $h_logo_url = $_POST['h_logo_url'] ?? "";
    $del_log_url = $_POST['del_log_url'] ?? "";
    $h_main_image_url = $_POST['h_main_image_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";

    $u_logo_url = GET_UPLOAD_IMAGE($_FILES['logo_url']['name'], $h_logo_url, $del_log_url);
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);

    $update_values = array(
        'company_name' => $company_name,
        'company_website' => $company_website,
        'dealer_website' => $dealer_website,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'listing_address1' => $listing_address1,
        'listing_address2' => $listing_address2,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'listing_zip' => $listing_zip,
        'listing_zip_ext' => $listing_zip_ext,
        'listing_country' => $listing_country,
        'logo_url' => $u_logo_url,
        'main_image_url' => $u_main_image_url,
        'dealer_introduction' => $dealer_introduction,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')

    );

    $db->update('community_car_dealers', $update_values, 'community_car_dealers_id = ' . $id);

    if($_FILES['logo_url']['size'] > 0) FILE_UPLOAD("admin","vehicle_dealer_files", "vehicle_dealer", $id, "logo_url", "logo");
    if($_FILES['main_image_url']['size'] > 0) FILE_UPLOAD("admin","vehicle_dealer_files", "vehicle_dealer", $id, "main_image_url", "main");

}

if ($ac == "vehicle_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('ad_payments', 'section_type = 4 and listing_id = ' . $id);
    
    $db->delete('community_car_listings', 'community_car_listings_id = ' . $id);
    $db->delete('community_car_listing_images', 'community_car_listings_id = ' . $id);
    
    FILE_DELETE_MULTI_REALESTATE("admin","vehicle_files", "vehicle", $id, "img");


    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "update_vehicle") {


    $id = $_POST['id'] ?? "";
    
    $listing_price = $_POST['listing_price'] ?? "";
    $is_active = $_POST['is_active'] ?? "0";

    $car_maker = $_POST['car_maker'] ?? "";
    $car_model = $_POST['car_model'] ?? "";
    $car_year = $_POST['car_year'] ?? "";
    $car_color = $_POST['car_color'] ?? "";    
    $car_mileage = $_POST['car_mileage'] ?? "";
    $car_accident_history = $_POST['car_accident_history'] ?? "";
    $fuel_type = $_POST['fuel_type'] ?? "";
    $body_type = $_POST['body_type'] ?? "";
    $transmission = $_POST['transmission'] ?? "";    
    
    $options_description = $_POST['options_description'] ?? "";
    $description = $_POST['description'] ?? "";
    
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
        
    $seller_name = $_POST['seller_name'] ?? "";
    $seller_email = $_POST['seller_email'] ?? "";
    $seller_phone = $_POST['seller_phone'] ?? "";
    
    $h_del_img = $_POST['h_del_img'] ?? "";
    $h_exist_image = $_POST['h_exist_image'] ?? "";

    $cnt = 0;

    $array_key = array();
    
    // 삭제 체크한 이미지만 삭제
    foreach ($_POST as $key => $value) {

        if (preg_match('/^del_image_url_(\d+)$/', $key, $matches)) {

            $del_id = (int)$matches[1];

            if ($value === 'Y') {

                $db->delete('community_car_listing_images', 'community_car_listing_images_id = ' . $del_id);
                FILE_DELETE("admin","vehicle_files", "vehicle", $id, "img".$del_id);

            }
        }
    }
    
    $array_upload = array();
    $g_num = 0;    
    
    
    foreach ($_FILES as $key => $file) {

        if (preg_match('/^image_url_(\d+)$/', $key, $matches)) {

            $upload_id = (int)$matches[1];

            // 업로드 했으면 이미지 업데이트 및 DB 업데이트
            if ($file['error'] === UPLOAD_ERR_OK) { 
                FILE_UPLOAD("admin","vehicle_files", "vehicle", $id, "image_url_".$upload_id, "img".$upload_id);
                $update_image_values = array(
                    'image_url' => $file['name'],
                    'updated_user' => $SS_NICKNAME,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'ip_address' => $_SERVER['REMOTE_ADDR']
                );
                
                $db->update('community_car_listing_images', $update_image_values, 'community_car_listing_images_id = ' . $upload_id);
                unset($update_image_values);
            }
                                
        }
        
        // 새롭게 업로드한것 처리
        if (preg_match('/^image_url_n_(\d+)$/', $key, $matches)) {

            $g_num++;
            
            $upload_id = (int)$matches[1];

                $sql = "SELECT max(image_order) as image_order FROM community_car_listing_images A where  A.community_car_listings_id  = :id";
                $placeholders = ['id' => $id];
                $result = $db->query($sql, $placeholders);
                $row = $db->fetch();

                $image_order = $row->image_order + 1;
                
            // 업로드 했으면 이미지 업데이트 및 DB 업데이트
            if ($file['error'] === UPLOAD_ERR_OK) { 
                
                $insert_image_values = array(
                    'community_car_listing_images_id' => null,
                    'community_car_listings_id' => $id,
                    'image_order' => $image_order + $g_num,
                    'image_url' => $file['name'],
                    'is_active' => 1,
                    'created_user' => $SS_NICKNAME ?? "",
                    'created_at' => date('Y-m-d H:i:s'),
                    'ip_address' => $_SERVER['REMOTE_ADDR']
                );
                
                $db->insert('community_car_listing_images', $insert_image_values);
                $lastInsertIdImage = $db->getLastInsertId();
                unset($insert_image_values);
                
                FILE_UPLOAD("admin","vehicle_files", "vehicle", $id, "image_url_n_".$upload_id, "img".$lastInsertIdImage);                
            }
                                
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
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']

    );

    $db->update('community_car_listings', $update_values, 'community_car_listings_id = ' . $id);
    unset($update_values);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    

}