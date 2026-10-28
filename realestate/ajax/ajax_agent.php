<?php
    
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use user_service\agent_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/realestate/service/service_agent.php");

$ac = $_REQUEST['ac'];

if($ac == "agent_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_office_name" => $_GET['s_office_name'] ?? "",
        "s_agent_full_name" => $_GET['s_agent_full_name'] ?? "",        
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10,
        "random" => 'N'
    );
    
    $agent_list = new agent_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "realestate_agent_body.tpl");
    $tpl->setLoop("T_LOOP", $agent_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $agent_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "agent_realestate_write" ) {
    
    $property_type = $_POST['property_type'] ?? "";     // use
    $property_sub_type = $_POST['property_sub_type'] ?? ""; // use
    $special_listing_conditions = $_POST['special_listing_conditions'] ?? "";  // use
    $listing_contract_date = CONVERT_DATE_FORMAT($_POST['listing_contract_date'] ?? "");  // use
    $list_price = $_POST['list_price'] ?? ""; // use
    $standard_status = $_POST['standard_status'] ?? ""; // use
    
    $street_number = $_POST['street_number'] ?? ""; // use
    $street_name = $_POST['street_name'] ?? "";  // use
    $street_suffix = $_POST['street_suffix'] ?? ""; // use
    $city = $_POST['city'] ?? ""; // use
    $state_or_province = $_POST['state_or_province'] ?? ""; // use
    $postal_code = $_POST['postal_code'] ?? ""; // use
    $county_or_parish = $_POST['county_or_parish'] ?? ""; // use
    
    $bedrooms_total = $_POST['bedrooms_total'] ?? ""; // use
    $bathrooms_total = $_POST['bathrooms_total'] ?? ""; // use
    $bathrooms_full = $_POST['bathrooms_full'] ?? ""; // use
    $bathrooms_half = $_POST['bathrooms_half'] ?? ""; // use
    
    $living_area = $_POST['living_area'] ?? ""; // use
    $lot_size_sqft = $_POST['lot_size_sqft'] ?? ""; // use
    $lot_size_acres = $_POST['lot_size_acres'] ?? ""; // use
    
    $year_built = $_POST['year_built'] ?? ""; // use
    $stories_total = $_POST['stories_total'] ?? ""; // use
    $levels = $_POST['levels'] ?? ""; // use
    
    $building_area_total = $_POST['building_area_total'] ?? ""; // use
    $units_total = $_POST['units_total'] ?? ""; // use
    $number_of_buildings = $_POST['number_of_buildings'] ?? ""; // use
    
    $parking_total = $_POST['parking_total'] ?? ""; // use
    $garage_spaces = $_POST['garage_spaces'] ?? ""; // use
    
    $association_fee = $_POST['association_fee'] ?? ""; // use
    $association_fee_frequency = $_POST['association_fee_frequency'] ?? ""; // use
    
    $lease_term = $_POST['lease_term'] ?? ""; // use
    $lease_amount_frequency = $_POST['lease_amount_frequency'] ?? ""; // use
    
    $zoning = $_POST['zoning'] ?? ""; // use
    $zoning_description = $_POST['zoning_description'] ?? ""; // use
    
    $cap_rate = $_POST['cap_rate'] ?? ""; // use
    $net_operating_income = $_POST['net_operating_income'] ?? ""; // use
    
    $business_type = $_POST['business_type'] ?? ""; // use
    $business_name = $_POST['business_name'] ?? ""; // use
    
    $public_remarks = $_POST['public_remarks'] ?? ""; // use
    $agent_comment = $_POST['agent_comment'] ?? ""; // use
    
    $list_agent_key = $_POST['list_agent_key'] ?? "";// use
    $list_office_key = $_POST['list_office_key'] ?? "";// use
    
    $listing_key = "M_" . uniqid(); 
    $listing_id = $_POST['listing_id'] ?? "";        
    $mls_status = $_POST['mls_status'] ?? "";        
    $original_list_price = $_POST['original_list_price'] ?? "";
    $close_price = $_POST['close_price'] ?? "";    
    $on_market_date = $_POST['on_market_date'] ?? "";
    $close_date = $_POST['close_date'] ?? "";
    $days_on_market = $_POST['days_on_market'] ?? "";    
    $unparsed_address = $_POST['unparsed_address'] ?? "";    
    $latitude = $_POST['latitude'] ?? "";
    $longitude = $_POST['longitude'] ?? "";
    $covered_spaces = $_POST['covered_spaces'] ?? "";    
    $subdivision_name = $_POST['subdivision_name'] ?? "";
    $high_school_district = $_POST['high_school_district'] ?? "";
    $elementary_school = $_POST['elementary_school'] ?? "";
    $middle_or_junior_school = $_POST['middle_or_junior_school'] ?? "";
    $high_school = $_POST['high_school'] ?? "";    
    $buyer_agent_key = $_POST['buyer_agent_key'] ?? "";    
    $buyer_office_key = $_POST['buyer_office_key'] ?? "";    
    $tax_annual_amount = $_POST['tax_annual_amount'] ?? "";        
    $internet_entire_listing_display_yn = $_POST['internet_entire_listing_display_yn'] ?? "";
    $internet_address_display_yn = $_POST['internet_address_display_yn'] ?? "";
    $lot_features = $_POST['lot_features'] ?? "";        
    $parking_features = $_POST['parking_features'] ?? "";
    $carport_yn = $_POST['carport_yn'] ?? "";
    $carport_spaces = $_POST['carport_spaces'] ?? "";
    $open_parking_spaces = $_POST['open_parking_spaces'] ?? "";
    $uncovered_spaces = $_POST['uncovered_spaces'] ?? "";    
    $association_fee_includes = $_POST['association_fee_includes'] ?? "";
    $lease_amount = $_POST['lease_amount'] ?? "";    
    $water_source = $_POST['water_source'] ?? "";    
    $cooling = $_POST['cooling'] ?? "";
    $heating = $_POST['heating'] ?? "";
    $appliances = $_POST['appliances'] ?? "";
    $laundry_features = $_POST['laundry_features'] ?? "";
    $interior_features = $_POST['interior_features'] ?? "";        
    $private_remarks = $_POST['private_remarks'] ?? "";
    $gross_income = $_POST['gross_income'] ?? "";    
    $operating_expense = $_POST['operating_expense'] ?? "";
    $development_status = $_POST['development_status'] ?? "";    
    $road_frontage_type = $_POST['road_frontage_type'] ?? "";
    $road_surface_type = $_POST['road_surface_type'] ?? "";
    $property_condition = $_POST['property_condition'] ?? "";
    $utilities = $_POST['utilities'] ?? "";    
    $rent_includes = $_POST['rent_includes'] ?? "";    
    $security_features = $_POST['security_features'] ?? "";
    $sewer = $_POST['sewer'] ?? "";
        
    // 임시로 느슨하게 DB 만듬    
    $db->query("SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'", []);    
    
    $insert_values = array(
        'realestate_listing_id' => NULL,
        'listing_key' => $listing_key,
        'listing_id' => $listing_id,        
        'standard_status' => $standard_status,
        'mls_status' => $mls_status,
        'property_type' => $property_type,
        'property_sub_type' => $property_sub_type,
        'list_price' => $list_price,
        'original_list_price' => $original_list_price,
        'close_price' => $close_price,
        'listing_contract_date' => $listing_contract_date,
        'on_market_date' => $on_market_date,
        'close_date' => $close_date,
        'days_on_market' => $days_on_market,
        'street_number' => $street_number,
        'street_name' => $street_name,
        'street_suffix' => $street_suffix,
        'unparsed_address' => $street_number . " " . $street_name . " " . $street_suffix,
        'city' => $city,
        'state_or_province' => $state_or_province,
        'postal_code' => $postal_code,
        'county_or_parish' => $county_or_parish,
        'bedrooms_total' => $bedrooms_total,
        'bathrooms_total' => $bathrooms_total,
        'bathrooms_full' => $bathrooms_full,
        'bathrooms_half' => $bathrooms_half,
        'living_area' => $living_area,
        'lot_size_sqft' => $lot_size_sqft,
        'lot_size_acres' => $lot_size_acres,
        'building_area_total' => $building_area_total,
        'year_built' => $year_built,
        'levels' => $levels,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'covered_spaces' => $covered_spaces,
        'garage_spaces' => $garage_spaces,
        'subdivision_name' => $subdivision_name,
        'high_school_district' => $high_school_district,
        'elementary_school' => $elementary_school,
        'middle_or_junior_school' => $middle_or_junior_school,
        'high_school' => $high_school,
        'list_agent_key' => $list_agent_key,
        'buyer_agent_key' => $buyer_agent_key,
        'list_office_key' => $list_office_key,
        'buyer_office_key' => $buyer_office_key,
        'association_fee' => $association_fee,
        'tax_annual_amount' => $tax_annual_amount,
        'special_listing_conditions' => $special_listing_conditions,
        'lease_term' => $lease_term,
        'internet_entire_listing_display_yn' => $internet_entire_listing_display_yn,
        'internet_address_display_yn' => $internet_address_display_yn,
        'lot_features' => $lot_features,
        'stories_total' => $stories_total,
        'parking_total' => $parking_total,
        'parking_features' => $parking_features,
        'carport_yn' => $carport_yn,
        'carport_spaces' => $carport_spaces,
        'open_parking_spaces' => $open_parking_spaces,
        'uncovered_spaces' => $uncovered_spaces,
        'association_fee_frequency' => $association_fee_frequency,
        'association_fee_includes' => $association_fee_includes,
        'lease_amount' => $lease_amount,
        'lease_amount_frequency' => $lease_amount_frequency,
        'water_source' => $water_source,
        'zoning' => $zoning,
        'zoning_description' => $zoning_description,
        'cooling' => $cooling,
        'heating' => $heating,
        'appliances' => $appliances,
        'laundry_features' => $laundry_features,
        'interior_features' => $interior_features,
        'units_total' => $units_total,
        'business_type' => $business_type,
        'public_remarks' => $public_remarks,
        'private_remarks' => $private_remarks,
        'gross_income' => $gross_income,
        'net_operating_income' => $net_operating_income,
        'operating_expense' => $operating_expense,
        'development_status' => $development_status,
        'number_of_buildings' => $number_of_buildings,
        'road_frontage_type' => $road_frontage_type,
        'road_surface_type' => $road_surface_type,
        'property_condition' => $property_condition,
        'utilities' => $utilities,
        'cap_rate' => $cap_rate,
        'rent_includes' => $rent_includes,
        'business_name' => $business_name,
        'security_features' => $security_features,
        'sewer' => $sewer,
        'is_show_website' => 1,
        'agent_comment' => $agent_comment,
        'is_active' => 1
    );

    $result = $db->insert("realestate_listing ", $insert_values);
    $lastInsertId = $db->getLastInsertId();
    
    echo $lastInsertId;
    
    
    $array_upload = array();
    $g_num = 0;
    
    if (!empty($_FILES["user_files"]["error"]) && is_array($_FILES["user_files"]["error"])) {    

        foreach ($_FILES["user_files"]["error"] as $key => $error) {

            $file_name = $_FILES["user_files"]["name"][$key];
            $tmp_name  = $_FILES["user_files"]["tmp_name"][$key];
            $file_size = $_FILES["user_files"]["size"][$key];
            $mime_type = $_FILES["user_files"]["type"][$key];
            
             // 업로드된 파일인지 확인 (보안)
            if (!is_uploaded_file($tmp_name)) continue;

            $array_upload[$g_num]['url'] = $file_name;
            $array_upload[$g_num]['key'] = $key;
            $array_upload[$g_num]['type'] = $mime_type;

            $g_num++;
        }    
        
    }
    
    for($i=0; $i<count($array_upload); $i++) {

        $url = $array_upload[$i]['url'];
        $key = $array_upload[$i]['key'];
        $type = $array_upload[$i]['type'];

        $media_key = uniqid(); 
        
        $media_type = GET_MIME_TYPE($type);
        
        if($i==0) $is_primary = 1;
        else $is_primary = 0;
        
        $insert_image_values = array(
            'realestate_listing_media_id' => null,
            'realestate_listing_id' => $lastInsertId,
            'media_key' => $media_key,
            'listing_key' => $listing_key,
            'media_url' => $url,
            'media_order' => $i+1,
            'media_type' => $media_type,
            'is_primary' => $is_primary,            
            'is_show_website' => 1
        );

        $db->insert('realestate_listing_media', $insert_image_values);
        $lastInsertIdImage = $db->getLastInsertId();
        unset($insert_image_values);
        

        if($key != "") FILE_UPLOAD_ARRAY("user","realestate_files", "realestate", $lastInsertId, "user_files", "img".$lastInsertIdImage, $key);
        
    }

    echo json_encode(array('result' => 'success', 'msg' => '등록되었습니다.'));
    
}

if($ac == "agent_realestate_update" ) {
    
    $id = $_POST['id'] ?? "";
    
    $property_type = $_POST['property_type'] ?? "";     // use
    $property_sub_type = $_POST['property_sub_type'] ?? ""; // use
    $special_listing_conditions = $_POST['special_listing_conditions'] ?? "";  // use
    $listing_contract_date = CONVERT_DATE_FORMAT($_POST['listing_contract_date'] ?? "");  // use
    $list_price = $_POST['list_price'] ?? ""; // use
    $standard_status = $_POST['standard_status'] ?? ""; // use
    
    $street_number = $_POST['street_number'] ?? ""; // use
    $street_name = $_POST['street_name'] ?? "";  // use
    $street_suffix = $_POST['street_suffix'] ?? ""; // use
    $city = $_POST['city'] ?? ""; // use
    $state_or_province = $_POST['state_or_province'] ?? ""; // use
    $postal_code = $_POST['postal_code'] ?? ""; // use
    $county_or_parish = $_POST['county_or_parish'] ?? ""; // use
    
    $bedrooms_total = $_POST['bedrooms_total'] ?? ""; // use
    $bathrooms_total = $_POST['bathrooms_total'] ?? ""; // use
    $bathrooms_full = $_POST['bathrooms_full'] ?? ""; // use
    $bathrooms_half = $_POST['bathrooms_half'] ?? ""; // use
    
    $living_area = $_POST['living_area'] ?? ""; // use
    $lot_size_sqft = $_POST['lot_size_sqft'] ?? ""; // use
    $lot_size_acres = $_POST['lot_size_acres'] ?? ""; // use
    
    $year_built = $_POST['year_built'] ?? ""; // use
    $stories_total = $_POST['stories_total'] ?? ""; // use
    $levels = $_POST['levels'] ?? ""; // use
    
    $building_area_total = $_POST['building_area_total'] ?? ""; // use
    $units_total = $_POST['units_total'] ?? ""; // use
    $number_of_buildings = $_POST['number_of_buildings'] ?? ""; // use
    
    $parking_total = $_POST['parking_total'] ?? ""; // use
    $garage_spaces = $_POST['garage_spaces'] ?? ""; // use
    
    $association_fee = $_POST['association_fee'] ?? ""; // use
    $association_fee_frequency = $_POST['association_fee_frequency'] ?? ""; // use
    
    $lease_term = $_POST['lease_term'] ?? ""; // use
    $lease_amount_frequency = $_POST['lease_amount_frequency'] ?? ""; // use
    
    $zoning = $_POST['zoning'] ?? ""; // use
    $zoning_description = $_POST['zoning_description'] ?? ""; // use
    
    $cap_rate = $_POST['cap_rate'] ?? ""; // use
    $net_operating_income = $_POST['net_operating_income'] ?? ""; // use
    
    $business_type = $_POST['business_type'] ?? ""; // use
    $business_name = $_POST['business_name'] ?? ""; // use
    
    $public_remarks = $_POST['public_remarks'] ?? ""; // use
    $agent_comment = $_POST['agent_comment'] ?? ""; // use
    
    $h_del_img = $_POST['h_del_img'] ?? "";     // use
    
    $listing_key = "M_" . uniqid(); 
    $listing_id = $_POST['listing_id'] ?? "";        
    $mls_status = $_POST['mls_status'] ?? "";        
    $original_list_price = $_POST['original_list_price'] ?? "";
    $close_price = $_POST['close_price'] ?? "";    
    $on_market_date = $_POST['on_market_date'] ?? "";
    $close_date = $_POST['close_date'] ?? "";
    $days_on_market = $_POST['days_on_market'] ?? "";    
    $unparsed_address = $_POST['unparsed_address'] ?? "";    
    $latitude = $_POST['latitude'] ?? "";
    $longitude = $_POST['longitude'] ?? "";
    $covered_spaces = $_POST['covered_spaces'] ?? "";    
    $subdivision_name = $_POST['subdivision_name'] ?? "";
    $high_school_district = $_POST['high_school_district'] ?? "";
    $elementary_school = $_POST['elementary_school'] ?? "";
    $middle_or_junior_school = $_POST['middle_or_junior_school'] ?? "";
    $high_school = $_POST['high_school'] ?? "";
    $list_agent_key = $_POST['list_agent_key'] ?? "";
    $buyer_agent_key = $_POST['buyer_agent_key'] ?? "";
    $list_office_key = $_POST['list_office_key'] ?? "";
    $buyer_office_key = $_POST['buyer_office_key'] ?? "";    
    $tax_annual_amount = $_POST['tax_annual_amount'] ?? "";        
    $internet_entire_listing_display_yn = $_POST['internet_entire_listing_display_yn'] ?? "";
    $internet_address_display_yn = $_POST['internet_address_display_yn'] ?? "";
    $lot_features = $_POST['lot_features'] ?? "";        
    $parking_features = $_POST['parking_features'] ?? "";
    $carport_yn = $_POST['carport_yn'] ?? "";
    $carport_spaces = $_POST['carport_spaces'] ?? "";
    $open_parking_spaces = $_POST['open_parking_spaces'] ?? "";
    $uncovered_spaces = $_POST['uncovered_spaces'] ?? "";    
    $association_fee_includes = $_POST['association_fee_includes'] ?? "";
    $lease_amount = $_POST['lease_amount'] ?? "";    
    $water_source = $_POST['water_source'] ?? "";    
    $cooling = $_POST['cooling'] ?? "";
    $heating = $_POST['heating'] ?? "";
    $appliances = $_POST['appliances'] ?? "";
    $laundry_features = $_POST['laundry_features'] ?? "";
    $interior_features = $_POST['interior_features'] ?? "";        
    $private_remarks = $_POST['private_remarks'] ?? "";
    $gross_income = $_POST['gross_income'] ?? "";    
    $operating_expense = $_POST['operating_expense'] ?? "";
    $development_status = $_POST['development_status'] ?? "";    
    $road_frontage_type = $_POST['road_frontage_type'] ?? "";
    $road_surface_type = $_POST['road_surface_type'] ?? "";
    $property_condition = $_POST['property_condition'] ?? "";
    $utilities = $_POST['utilities'] ?? "";    
    $rent_includes = $_POST['rent_includes'] ?? "";    
    $security_features = $_POST['security_features'] ?? "";
    $sewer = $_POST['sewer'] ?? "";
    
    // 임시로 느슨하게 DB 만듬    
    $db->query("SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'", []);    
    
    $update_values = array(
        'standard_status' => $standard_status,
        'mls_status' => $mls_status,
        'property_type' => $property_type,
        'property_sub_type' => $property_sub_type,
        'list_price' => $list_price,
        'original_list_price' => $original_list_price,
        'close_price' => $close_price,
        'listing_contract_date' => $listing_contract_date,
        'on_market_date' => $on_market_date,
        'close_date' => $close_date,
        'days_on_market' => $days_on_market,
        'street_number' => $street_number,
        'street_name' => $street_name,
        'street_suffix' => $street_suffix,
        'unparsed_address' => $street_number . " " . $street_name . " " . $street_suffix,
        'city' => $city,
        'state_or_province' => $state_or_province,
        'postal_code' => $postal_code,
        'county_or_parish' => $county_or_parish,
        'bedrooms_total' => $bedrooms_total,
        'bathrooms_total' => $bathrooms_total,
        'bathrooms_full' => $bathrooms_full,
        'bathrooms_half' => $bathrooms_half,
        'living_area' => $living_area,
        'lot_size_sqft' => $lot_size_sqft,
        'lot_size_acres' => $lot_size_acres,
        'building_area_total' => $building_area_total,
        'year_built' => $year_built,
        'levels' => $levels,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'covered_spaces' => $covered_spaces,
        'garage_spaces' => $garage_spaces,
        'subdivision_name' => $subdivision_name,
        'high_school_district' => $high_school_district,
        'elementary_school' => $elementary_school,
        'middle_or_junior_school' => $middle_or_junior_school,
        'high_school' => $high_school,
        'buyer_agent_key' => $buyer_agent_key,
        'buyer_office_key' => $buyer_office_key,
        'association_fee' => $association_fee,
        'tax_annual_amount' => $tax_annual_amount,
        'special_listing_conditions' => $special_listing_conditions,
        'lease_term' => $lease_term,
        'internet_entire_listing_display_yn' => $internet_entire_listing_display_yn,
        'internet_address_display_yn' => $internet_address_display_yn,
        'lot_features' => $lot_features,
        'stories_total' => $stories_total,
        'parking_total' => $parking_total,
        'parking_features' => $parking_features,
        'carport_yn' => $carport_yn,
        'carport_spaces' => $carport_spaces,
        'open_parking_spaces' => $open_parking_spaces,
        'uncovered_spaces' => $uncovered_spaces,
        'association_fee_frequency' => $association_fee_frequency,
        'association_fee_includes' => $association_fee_includes,
        'lease_amount' => $lease_amount,
        'lease_amount_frequency' => $lease_amount_frequency,
        'water_source' => $water_source,
        'zoning' => $zoning,
        'zoning_description' => $zoning_description,
        'cooling' => $cooling,
        'heating' => $heating,
        'appliances' => $appliances,
        'laundry_features' => $laundry_features,
        'interior_features' => $interior_features,
        'units_total' => $units_total,
        'business_type' => $business_type,
        'public_remarks' => $public_remarks,
        'private_remarks' => $private_remarks,
        'gross_income' => $gross_income,
        'net_operating_income' => $net_operating_income,
        'operating_expense' => $operating_expense,
        'development_status' => $development_status,
        'number_of_buildings' => $number_of_buildings,
        'road_frontage_type' => $road_frontage_type,
        'road_surface_type' => $road_surface_type,
        'property_condition' => $property_condition,
        'utilities' => $utilities,
        'cap_rate' => $cap_rate,
        'rent_includes' => $rent_includes,
        'business_name' => $business_name,
        'security_features' => $security_features,
        'sewer' => $sewer,
        'agent_comment' => $agent_comment
    );

    $db->update('realestate_listing', $update_values, 'realestate_listing_id = ' . $id);
    
    
    $array_key = array();

    $sql = "SELECT max(media_order) as image_order FROM realestate_listing_media A where  A.realestate_listing_id  = :id";
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
            
            $db->delete('realestate_listing_media', 'realestate_listing_media_id  = ' . $del_id);
            FILE_DELETE("user","realestate_files", "realestate", $id, "img".$del_id);
            
                       
        }
    
    }
    
    $array_upload = array();
    $g_num = 0;    
    
    if (!empty($_FILES["user_files"]["error"]) && is_array($_FILES["user_files"]["error"])) {    
        
        foreach ($_FILES["user_files"]["error"] as $key => $error) {

            $file_name = $_FILES["user_files"]["name"][$key];
            $tmp_name  = $_FILES["user_files"]["tmp_name"][$key];
            $file_size = $_FILES["user_files"]["size"][$key];
            $mime_type = $_FILES["user_files"]["type"][$key];
            
             // 업로드된 파일인지 확인 (보안)
            if (!is_uploaded_file($tmp_name)) continue;

            $array_upload[$g_num]['url'] = $file_name;
            $array_upload[$g_num]['key'] = $key;
            $array_upload[$g_num]['type'] = $mime_type;

            $g_num++;
        }    
        
    }    
    
    for($i=0; $i<count($array_upload); $i++) {

        $url = $array_upload[$i]['url'];
        $key = $array_upload[$i]['key'];
        $type = $array_upload[$i]['type'];

        $media_key = uniqid(); 
        
        $media_type = GET_MIME_TYPE($type);
        
        $is_primary = 0;
        
        $insert_image_values = array(
            'realestate_listing_media_id' => null,
            'realestate_listing_id' => $id,
            'media_key' => $media_key,
            'listing_key' => $listing_key,
            'media_url' => $url,
            'media_order' => $i+1,
            'media_type' => $media_type,
            'is_primary' => $is_primary,
            'modified_timestamp' => date('Y-m-d H:i:s'),
            'is_show_website' => 1
        );

        $db->insert('realestate_listing_media', $insert_image_values);
        $lastInsertIdImage = $db->getLastInsertId();
        unset($insert_image_values);
        

        if($key != "") FILE_UPLOAD_ARRAY("user","realestate_files", "realestate", $id, "user_files", "img".$lastInsertIdImage, $key);
        
    }

    $sql = "SELECT count(*) as primary_cnt FROM realestate_listing_media A where  A.realestate_listing_id  = :id and A.is_primary = 1";
    $placeholders = ['id' => $id];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    
    // is_primary가 없으면 
    if($row->primary_cnt < 1) {
                
        $db->update('realestate_listing_media', ['is_primary' => 1], "realestate_listing_media_id = (SELECT realestate_listing_media_id FROM (SELECT realestate_listing_media_id FROM realestate_listing_media WHERE realestate_listing_id = " . $id . " ORDER BY media_order ASC LIMIT 1) AS temp)");
    }
    
    echo json_encode(array('result' => 'success', 'msg' => '등록되었습니다.'));
    
}

if($ac == "agent_realestate_delete") {

    $id = $_GET['id'] ?? 0;

    // 실제 삭제 하지 않음
    $update_values = array(
        'is_show_website' => 0        
    );

    $db->update('realestate_listing', $update_values, 'realestate_listing_id = ' . $id);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}