<?php

error_reporting(E_ALL & ~E_WARNING);

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\recruit_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "job_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/community/service/service_recruit.php");

$ac = $_REQUEST['ac'];


if($ac == "recruit_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_is_modify_yn" => $_GET['s_is_modify_yn'] ?? "",
        "s_advertising_level" => $_GET['s_advertising_level'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ? (int)$_GET['s_cnt']: 10,
        "block_set" => 10
    );

    $recruit_list = new recruit_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "recruit_list_body.tpl");

    $tpl->setLoop("T_LOOP", $recruit_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $recruit_list->paging,
        "navigation_text" => $recruit_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_ARRAY_RETURN(0,"",$db,"common_code","code_sub_name","code_sub","code = '$s_state_code' order by code_sub_name asc");


    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "add_advertising_level") {

    $g_num = $_GET['g_num'] ?? 2;

    $al = ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_advertising_level, 1, '');
    $jt = ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type, 1, '');

    $html = "
            <div class=\"adlevel-row\" id=\"div_advertising_level_{$g_num}\">
                <select class=\"detail-form-control\" name=\"advertising_level_{$g_num}\" id=\"advertising_level_{$g_num}\">
                    ".$al."
                </select>
                <select class=\"detail-form-control\" name=\"job_type_{$g_num}\" id=\"job_type_{$g_num}\">
                   	".$jt."
                </select>
                <button type=\"button\" class=\"adlevel-delete-btn\" onclick=\"DEL_ADVERTISING_LEVEL({$g_num})\">삭제</button>
            </div>";


    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "add_job_type") {

    $g_num = (int)($_GET['g_num'] ?? 0);

    $jt = ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type, -1, '', '직종선택');

    $html = "
            <div class=\"adlevel-row\" id=\"div_advertising_level_{$g_num}\">
                <select class=\"detail-form-control\" name=\"job_type[]\" id=\"job_type_{$g_num}\">
                    ".$jt."
                </select>
                <button type=\"button\" class=\"adlevel-delete-btn recruit-del-btn\" onclick=\"DEL_ADVERTISING_LEVEL({$g_num})\">삭제</button>
            </div>";

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "add_state_city") {

    $g_num = (int)($_GET['g_num'] ?? 0);

    $select_state_code = DB_ARRAY_ARRAY_RETURN(-1, "", $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc", "주선택");

    $html = "
            <div class=\"adlevel-row\" id=\"div_state_city_{$g_num}\">
                <input type=\"hidden\" name=\"loc_sub_id[{$g_num}]\" value=\"\">
                <select class=\"detail-form-control\" name=\"state_code[{$g_num}]\" id=\"state_code_{$g_num}\" onchange=\"GET_CITY_NAME({$g_num});\">
                    ".$select_state_code."
                </select>
                <select class=\"detail-form-control\" name=\"city_name[{$g_num}]\" id=\"city_name_{$g_num}\">
                    <option value=''>도시선택</option>
                </select>
                <button type=\"button\" class=\"adlevel-delete-btn recruit-del-btn\" onclick=\"DEL_STATE_CITY({$g_num})\">삭제</button>
            </div>";

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "update_recruit") {

    $id = (int)$_POST["id"];

    $company_name = $_POST['company_name'] ?? "";
    $ac_id = $_REQUEST['ac_id'] ?? "";
    $title = $_POST['title'] ?? "";
    $subtitle = $_POST['subtitle'] ?? "";
//    $state_code = $_POST['state_code'] ?? "";
//    $city_name = $_POST['city_name'] ?? "";
    $state_codes    = $_POST['state_code'] ?? [];
    $city_names     = $_POST['city_name'] ?? [];
    $has_employees  = $_POST['has_15_plus_employees'] ?? [];
    $loc_sub_id     = $_POST['loc_sub_id'] ?? [];
    
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $job_opening_information = $_POST['job_opening_information'] ?? "";
//    $has_15_plus_employees = $_POST['has_15_plus_employees'] ?? "";
    $internal_notes = $_POST['internal_notes'] ?? "";
    $listing_status = $_POST['listing_status'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;
    $is_approved = $_POST['is_approved'] ?? 0;
    $is_modify_yn = $_POST['is_modify_yn'] ?? 0;

    // 광고레벨은 수정할 수 없으므로 전송된 값이 아니라 DB에 저장된 값을 기준으로 처리한다.
    $listing_row = GET_ONE_ROW($db, "SELECT advertising_level FROM community_recruit_listings WHERE community_recruit_listings_id = :id", $id);

    if(!$listing_row) {
        echo json_encode(["status" => "fail", "msg" => "구인구직 데이터가 없습니다."], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $advertising_level = $listing_row->advertising_level;

    // 파일이나 DB를 변경하기 전에 직종, 주/도시를 먼저 검증한다.
    $job_types = array_map('trim', (array)($_POST['job_type'] ?? []));
    $validation_msg = "";

    if(in_array("", $job_types, true)) $validation_msg = "직종을 선택해주세요.";
    else if(count($job_types) !== count(array_unique($job_types))) $validation_msg = "중복된 직종이 있습니다. 확인해 주세요.";

    $location_keys = array();
    foreach ($state_codes as $index => $state_code) {

        $city_name = $city_names[$index] ?? '';

        if($validation_msg != "") break;

        if($state_code == "") $validation_msg = "주를 선택해주세요.";
        else if($city_name == "") $validation_msg = "도시를 선택해주세요.";
        else if(in_array($state_code."|".$city_name, $location_keys, true)) $validation_msg = "중복된 주/도시가 있습니다. 확인해 주세요.";

        $location_keys[] = $state_code."|".$city_name;
    }

    $is_multi_level = in_array($advertising_level, ['gold', 'platinum'], true);

    if($validation_msg == "" && !$is_multi_level && (count($job_types) > 1 || count($state_codes) > 1)) {
        $validation_msg = "gold, platinum 광고만 직종과 주/도시를 여러 개 등록할 수 있습니다.";
    }

    if($validation_msg != "") {
        echo json_encode(["status" => "fail", "msg" => $validation_msg], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $h_logo_images_url = $_POST['h_logo_image_url'] ?? "";
    $h_main_image_url = $_POST['h_main_image_url'] ?? "";
    $h_main_image_background_url = $_POST['h_main_image_background_url'] ?? "";
    $h_sub_image_01_url = $_POST['h_sub_image_01_url'] ?? "";
    $h_sub_image_02_url = $_POST['h_sub_image_02_url'] ?? "";
    $h_sub_image_03_url = $_POST['h_sub_image_03_url'] ?? "";
    $h_sub_image_04_url = $_POST['h_sub_image_04_url'] ?? "";
    $h_sub_image_05_url = $_POST['h_sub_image_05_url'] ?? "";

    $del_logo_images_url = $_POST['del_logo_image_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";
    $del_main_image_background_url = $_POST['del_main_image_background_url'] ?? "";
    $del_sub_image_01_url = $_POST['del_sub_image_01_url'] ?? "";
    $del_sub_image_02_url = $_POST['del_sub_image_02_url'] ?? "";
    $del_sub_image_03_url = $_POST['del_sub_image_03_url'] ?? "";
    $del_sub_image_04_url = $_POST['del_sub_image_04_url'] ?? "";
    $del_sub_image_05_url = $_POST['del_sub_image_05_url'] ?? "";
    
    if($del_logo_images_url == 'Y') FILE_DELETE("admin", "recruit_files", "recruit", $id, "logo");
    if($del_main_image_url == 'Y') FILE_DELETE("admin", "recruit_files", "recruit", $id, "main");
    if($del_sub_image_01_url == 'Y') FILE_DELETE("admin", "recruit_files", "recruit", $id, "img1");
    if($del_sub_image_02_url == 'Y') FILE_DELETE("admin", "recruit_files", "recruit", $id, "img2");
    if($del_sub_image_03_url == 'Y') FILE_DELETE("admin", "recruit_files", "recruit", $id, "img3");
    if($del_sub_image_04_url == 'Y') FILE_DELETE("admin", "recruit_files", "recruit", $id, "img4");
    if($del_sub_image_05_url == 'Y') FILE_DELETE("admin", "recruit_files", "recruit", $id, "img5");

    $u_logo_images_url = GET_UPLOAD_IMAGE($_FILES['logo_image_url']['name'], $h_logo_images_url, $del_logo_images_url);
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);
    $u_main_image_background_url = GET_UPLOAD_IMAGE($_FILES['main_image_background_url']['name'], $h_main_image_background_url, $del_main_image_background_url);

    $u_sub_image_01_url = GET_UPLOAD_IMAGE($_FILES['sub_image_01_url']['name'], $h_sub_image_01_url, $del_sub_image_01_url);
    $u_sub_image_02_url = GET_UPLOAD_IMAGE($_FILES['sub_image_02_url']['name'], $h_sub_image_02_url, $del_sub_image_02_url);
    $u_sub_image_03_url = GET_UPLOAD_IMAGE($_FILES['sub_image_03_url']['name'], $h_sub_image_03_url, $del_sub_image_03_url);
    $u_sub_image_04_url = GET_UPLOAD_IMAGE($_FILES['sub_image_04_url']['name'], $h_sub_image_04_url, $del_sub_image_04_url);
    $u_sub_image_05_url = GET_UPLOAD_IMAGE($_FILES['sub_image_05_url']['name'], $h_sub_image_05_url, $del_sub_image_05_url);

//    $logo_images_url_name = $_FILES['logo_images_url']['name'] ?? "";
//    $main_image_url_name = $_FILES['main_image_url']['name'] ?? "";
//    $main_image_background_url_name = $_FILES['main_image_background_url']['name'] ?? "";
//    $sub_image_01_url_name = $_FILES['sub_image_01_url']['name'] ?? "";
//    $sub_image_02_url_name = $_FILES['sub_image_02_url']['name'] ?? "";
//    $sub_image_03_url_name = $_FILES['sub_image_03_url']['name'] ?? "";
//    $sub_image_04_url_name = $_FILES['sub_image_04_url']['name'] ?? "";
//    $sub_image_05_url_name = $_FILES['sub_image_05_url']['name'] ?? "";


    $update_values = array(
//        'company_name' => $company_name,
        'logo_image_url' => $u_logo_images_url,
        'main_image_url' => $u_main_image_url,
        'main_image_background_url' => $u_main_image_background_url,
        'sub_image_01_url' => $u_sub_image_01_url,
        'sub_image_02_url' => $u_sub_image_02_url,
        'sub_image_03_url' => $u_sub_image_03_url,
        'sub_image_04_url' => $u_sub_image_04_url,
        'sub_image_05_url' => $u_sub_image_05_url,
        'title' => $title,
        'subtitle' => $subtitle,        
        'contact_name' => $contact_name,
        'contact_phone' => $contact_phone,
        'contact_email' => $contact_email,
        'job_opening_information' => $job_opening_information,
        'internal_notes' => $internal_notes,
        'listing_status' => $listing_status,
        'is_active' => $is_active,
        'is_approved' => $is_approved,
        'is_modify_yn' => $is_modify_yn
    );

    //'advertising_level' => $advertising_level,

    $result = $db->update('community_recruit_listings', $update_values, 'community_recruit_listings_id = '.$id);
    unset($update_values);

    FILE_UPLOAD("admin","recruit_files","recruit",$id,"logo_image_url","logo");
    FILE_UPLOAD("admin","recruit_files","recruit",$id,"main_image_url","main");
    FILE_UPLOAD("admin","recruit_files","recruit",$id,"main_image_background_url","background_image");

    FILE_UPLOAD("admin","recruit_files","recruit",$id,"sub_image_01_url","img1");
    FILE_UPLOAD("admin","recruit_files","recruit",$id,"sub_image_02_url","img2");
    FILE_UPLOAD("admin","recruit_files","recruit",$id,"sub_image_03_url","img3");
    FILE_UPLOAD("admin","recruit_files","recruit",$id,"sub_image_04_url","img4");
    FILE_UPLOAD("admin","recruit_files","recruit",$id,"sub_image_05_url","img5");
    
    if($_FILES['logo_image_url']['size'] > 0) {        
        SET_LOGO_IMAGE_URL($db2, $id, $ac_id, 'recruit', 'logo');
    }

    $db->delete('community_recruit_listings_sub', ['community_recruit_listings_id' => $id]);

    foreach ($job_types as $t_job_type) {

        $insert_values = array(
            'community_recruit_listings_id' => $id,            
            'job_type' => $t_job_type,
            'is_active' => $is_active,
            'updated_user' => $SS_NICKNAME,
            'updated_user' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'ip_address' => $define_val->DEFINE_IP_ADDRESS
        );

        $result = $db->insert("community_recruit_listings_sub", $insert_values);
        unset($insert_values);
    }

    // 화면에서 삭제된 주/도시는 제출된 loc_sub_id 목록에 없으므로 DB에서도 삭제한다.
    $keep_loc_sub_ids = array_filter(array_map('intval', (array)$loc_sub_id));
    $delete_where = 'community_recruit_listings_id = '.$id;
    if(count($keep_loc_sub_ids) > 0) {
        $delete_where .= ' and community_recruit_listings_loc_sub_id not in ('.implode(',', $keep_loc_sub_ids).')';
    }
    $db->delete('community_recruit_listings_loc_sub', $delete_where);

    foreach ($state_codes as $index => $state_code) {

        $city_name = $city_names[$index] ?? '';

        $ls_id = (int)($loc_sub_id[$index] ?? 0);

        if($ls_id > 0) {

            $update_values = array(
                    'state_code' => htmlspecialchars($state_code),
                    'city_name' => htmlspecialchars($city_name),
                    'updated_user' => $SS_NICKNAME,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'ip_address' => $_SERVER['REMOTE_ADDR']
            );

            $result = $db->update('community_recruit_listings_loc_sub', $update_values, 'community_recruit_listings_loc_sub_id = '.$ls_id.' and community_recruit_listings_id = '.$id);
            unset($update_values);
        }
        else {

            $insert_values = array(
                    'community_recruit_listings_loc_sub_id' => null,
                    'community_recruit_listings_id' => $id,
                    'state_code' => htmlspecialchars($state_code),
                    'city_name' => htmlspecialchars($city_name),
                    'is_active' => 1,
                    'created_user' => $SS_NICKNAME ?? "",
                    'created_at' => date('Y-m-d H:i:s'),
                    'ip_address' => $_SERVER['REMOTE_ADDR']
            );

            $result = $db->insert('community_recruit_listings_loc_sub', $insert_values);
            unset($insert_values);
        }
    }

    echo json_encode(["status" => "success", "msg" => "sucess"], JSON_UNESCAPED_UNICODE);
/*
    // 회사정보 업데이트
    $update_values = array(
        'company_name' => $company_name,    
        'contact_name' => $contact_name,
        'contact_phone' => $contact_phone,
        'contact_email' => $contact_email,
        'updated_user' => $SS_NAME,
        'updated_at' => date('Y-m-d H:i:s')        
    );

    $result = $db->update('ad_company', $update_values, 'ad_company_id = '.$ac_id);
    unset($update_values);
*/    
}

if($ac == "recruit_delete") {

    $id = $_GET['id'] ?? 0;
    
    $db->delete('ad_payments', '(section_type = 1 or section_type = 2) and listing_id = ' . $id);

    $db->delete('community_recruit_listings_sub', 'community_recruit_listings_id = ' . $id);
    $db->delete('community_recruit_listings', 'community_recruit_listings_id = ' . $id);

    FILE_DELETE("admin","recruit_files","recruit",$id,"logo");
    FILE_DELETE("admin","recruit_files","recruit",$id,"main");
    FILE_DELETE("admin","recruit_files","recruit",$id,"background_image");
    FILE_DELETE("admin","recruit_files","recruit",$id,"img1");
    FILE_DELETE("admin","recruit_files","recruit",$id,"img2");
    FILE_DELETE("admin","recruit_files","recruit",$id,"img3");
    FILE_DELETE("admin","recruit_files","recruit",$id,"img4");
    FILE_DELETE("admin","recruit_files","recruit",$id,"img5");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "confirm") {
    
    $id = $_GET["id"];
    
    $update_values = array(
        'is_approved' => 1
    );    

    $result = $db->update('community_recruit_listings', $update_values, 'community_recruit_listings_id = '.$id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}

if($ac == "modify_yn") {
    
    $id = $_GET["id"];
    
    $update_values = array(
        'is_modify_yn' => 1
    );    

    $result = $db->update('community_recruit_listings', $update_values, 'community_recruit_listings_id = '.$id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}