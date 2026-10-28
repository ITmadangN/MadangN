<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$id = $_GET["id"];
$sid = $_GET["sid"];

$sql = "SELECT A.*, B.community_recruit_listings_sub_id, B.job_type, C.state_code, C.city_name FROM community_recruit_listings A
        LEFT JOIN community_recruit_listings_sub B on A.community_recruit_listings_id = B.community_recruit_listings_id
        LEFT JOIN community_recruit_listings_loc_sub C ON A.community_recruit_listings_id = C.community_recruit_listings_id
        where A.community_recruit_listings_id = :id";
//        where A.community_recruit_listings_id = :id and B.community_recruit_listings_sub_id = :sub_id";
$placeholders = ['id' => $id];
$result = $db->query($sql, $placeholders);


$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_RECRUIT_HOME);

$t_job_type = "";

do {
    $p_ad_company_id = $row->ad_company_id;
    $p_user_id = $row->user_id;
    $p_company_name = $row->company_name;
    $p_logo_image_url = $row->logo_image_url;
    $p_logo_position = $row->logo_position;
    $p_main_image_url = $row->main_image_url;
    $p_main_image_background_url = $row->main_image_background_url;
    $p_sub_image_01_url = $row->sub_image_01_url;
    $p_sub_image_02_url = $row->sub_image_02_url;
    $p_sub_image_03_url = $row->sub_image_03_url;
    $p_sub_image_04_url = $row->sub_image_04_url;
    $p_sub_image_05_url = $row->sub_image_05_url;
    $p_sub_image_06_url = $row->sub_image_06_url;
    $p_title = $row->title;
    $p_subtitle = $row->subtitle;
    $p_state_code = $row->state_code;
    $p_city_name = $row->city_name;
    $p_contact_name = $row->contact_name;
    $p_contact_email = $row->contact_email;
    $p_contact_phone = $row->contact_phone;
    $p_job_opening_information = $row->job_opening_information;
    $p_has_15_plus_employees = $row->has_15_plus_employees;
    $p_view_count = $row->view_count;
    $p_advertiser_notes = $row->advertiser_notes;
    $p_internal_notes = $row->internal_notes;
    $p_listing_status = $row->listing_status;
    $p_is_active = $row->is_active;
    $p_created_user = $row->created_user;
    $p_updated_user = $row->updated_user;
    $p_created_at = $row->created_at;
    $p_updated_at = $row->updated_at;
    $p_ip_address = $row->ip_address;
    $location = $p_city_name . "," . $p_state_code;

    $p_advertising_level = $row->advertising_level;
    $p_job_type = $row->job_type;
    
    $is_modify_yn = $row->is_modify_yn;
    
    if($p_has_15_plus_employees == "Y") $p_has_15_plus_employees = "Yes";
    else $p_has_15_plus_employees = "No";
    
    if($t_job_type == "")  $t_job_type = ARRAY_RETURN($define_val->DEFINE_recruit_job_type, $p_job_type);
    else $t_job_type .= " / ". ARRAY_RETURN($define_val->DEFINE_recruit_job_type, $p_job_type);

    $has_15 = "";
    
    if($p_advertising_level == "regular" )  {
        $logo_img =  "/images/blank.png";
        
        $sql_loc = "SELECT A.* FROM community_recruit_listings_loc_sub A        
        where A.community_recruit_listings_id = :id";
        $placeholders_loc = ['id' => $id];
        $result_loc = $db2->query($sql_loc, $placeholders_loc);
        $row_loc = $db2->fetch();
        $p_state_code = $row_loc->state_code;
        $p_city_name = $row_loc->city_name;
        
        if($p_state_code == "CA") {
            
            $has_15 = "직원수 15명 이상 : $p_has_15_plus_employees (캘리포니아 급여 투명성 법안))";
        }
        
    }
    else {
        $logo_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=logo&s=".$row->community_recruit_listings_id;   
        
        $sql_loc = "SELECT A.* FROM ad_company A where A.ad_company_id = :ad_company_id";
        $placeholders_loc = ['ad_company_id' => $p_ad_company_id];
        $result_loc = $db2->query($sql_loc, $placeholders_loc);
        $row_loc = $db2->fetch();
        $p_state_code = $row_loc->company_state_code;
        $p_has_15_plus_employees = $row_loc->has_15_plus_employees;
        
        if($p_has_15_plus_employees == "Y") $p_has_15_plus_employees = "Yes";
        else $p_has_15_plus_employees = "No";
    
        if($p_state_code == "CA") {
            
            $has_15 = "직원수 15명 이상 : $p_has_15_plus_employees (캘리포니아 급여 투명성 법안))";
        }
    }

    $main_image_url = "";
    $sub_image_01_url = "";
    $sub_image_02_url = "";
    $sub_image_03_url = "";
    $sub_image_04_url = "";
    $sub_image_05_url = "";

    if($p_main_image_url != "") {
        $main_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=main&s=".$row->community_recruit_listings_id;
        $main_image_url = '<img class="media-cover image uc-transition-opaque" src="'.$main_img.'" data-src="'.$main_img.'" alt="#" data-uc-img="loading: lazy" >';
    }

    if($p_sub_image_01_url != "") {
        $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img1&s=".$row->community_recruit_listings_id;
        $sub_image_01_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="'.$sub_img.'" alt="#" data-uc-img="loading: lazy" style="width:100%; height:auto; display:block; margin-bottom:8px; position:static;" >';
    }

    if($p_sub_image_02_url != "") {
        $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img2&s=".$row->community_recruit_listings_id;
        $sub_image_02_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="'.$sub_img.'" alt="#" data-uc-img="loading: lazy" style="width:100%; height:auto; display:block; margin-bottom:8px; position:static;">';
    }

    if($p_sub_image_03_url != "") {
        $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img3&s=".$row->community_recruit_listings_id;
        $sub_image_03_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="'.$sub_img.'" alt="#" data-uc-img="loading: lazy" style="width:100%; height:auto; display:block; margin-bottom:8px; position:static;">';
    }

    if($p_sub_image_04_url != "") {
        $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img4&s=".$row->community_recruit_listings_id;
        $sub_image_04_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="'.$sub_img.'" alt="#" data-uc-img="loading: lazy" style="width:100%; height:auto; display:block; margin-bottom:8px; position:static;">';
    }

    if($p_sub_image_05_url != "") {
        $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img5&s=".$row->community_recruit_listings_id;
        $sub_image_05_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="'.$sub_img.'" alt="#" data-uc-img="loading: lazy" style="width:100%; height:auto; display:block; margin-bottom:8px; position:static;">';
    }

}while ($row = $db->fetch());

if($p_main_image_background_url == "")
{
    $back_img = RECRUIT_RANDOM_BACK_IMG();
}
else {
    $back_img = $define_val->IMG_PROTECT . "?c=community&cc=recruit&d=background_image&s=" . $id;
}


$main=3;
$sub=2;


$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "recruit_view_preview.tpl");

$tpl->setVar("T_ID", $id);
$tpl->setVar("T_SID", $sid);
$tpl->setVar("T_ADVERTISING_LEVEL", ARRAY_RETURN($define_val->DEFINE_recruit_advertising_level_TEXT, $p_advertising_level));
$tpl->setVar("T_LOG_IMAGE_URL", $logo_img);
$tpl->setVar("T_BACK_IMAGE_URL", $back_img);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_TITLE_SUBTITLE", $p_title . " > " .$p_subtitle);
$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_SUBTITLE", $p_subtitle);
$tpl->setVar("T_JOB_TYPE", $t_job_type);
$tpl->setVar("T_LOCATION", $location);
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
if($sub_image_01_url != "" || $sub_image_02_url != "" || $sub_image_03_url != "" || $sub_image_04_url != "" || $sub_image_05_url != "") $tpl->setVar("EXIST_SUB_IMAGES", true);

$tpl->setVar("T_MAIN_IMAGE_URL", $main_image_url);

$tpl->setVar("T_SUB_IMAGE_01_URL", $sub_image_01_url);
$tpl->setVar("T_SUB_IMAGE_02_URL", $sub_image_02_url);
$tpl->setVar("T_SUB_IMAGE_03_URL", $sub_image_03_url);
$tpl->setVar("T_SUB_IMAGE_04_URL", $sub_image_04_url);
$tpl->setVar("T_SUB_IMAGE_05_URL", $sub_image_05_url);

if($p_state_code == 'CA') $tpl->setVar("E15", true);
$tpl->setVar("T_HAS_15_PLUS_EMPLOYEESN", $has_15); 

$tpl->setVar("T_JOB_OPENING_INFORMATION", str_replace("\n", "<br>", $p_job_opening_information));


$tpl->setVar("S_SELECT_JOB_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type,0,""));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_RECURIT_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_s_kind,1,""));

if($p_user_id == $SS_ID) $tpl->setVar("UPDATE_DELETE", true);

if($p_advertising_level == "platinum") $tpl->setVar("PLATINUM", true);
if($p_advertising_level == "gold") $tpl->setVar("GOLD", true);


include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
