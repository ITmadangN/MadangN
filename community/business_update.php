<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$id = $_GET["id"];

$sql = "SELECT A.* FROM community_business A where A.community_business_id = :id";

$placeholders = ['id' => $id];

$result = $db->query($sql, $placeholders);
$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_BUSINESS_HOME);

$p_ad_company_id = $row->ad_company_id;
$p_user_id = $row->user_id;
$p_company_name = $row->company_name;
$p_main_image_url = $row->main_image_url;
$p_title = $row->title;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_content = $row->content;
$p_view_count = $row->view_count;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$p_advertising_level = $row->advertising_level;
$p_business_type = $row->business_type;


$img1 = "";
if($p_advertising_level == "regular" ) {
    $main_img = "/images/blank.png";
    $t_img = $define_val->IMG_PROTECT ."?c=community&cc=business&d=main&s=".$row->community_business_id;
    $img1 = '<img src="'.$t_img.'" alt="" /><br><br>';
}
else $main_img = $define_val->IMG_PROTECT ."?c=community&cc=business&d=main&s=".$row->community_business_id;

$t_advertising_level = ARRAY_RETURN($define_val->DEFINE_recruit_advertising_level_TEXT, $p_advertising_level);
$t_business_type = ARRAY_RETURN($define_val->DEFINE_business_type, $p_business_type);

$main=3;
$sub=4;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "business_update.tpl");

$tpl->setVar("T_ID", $id);

$tpl->setVar("T_SS_NICKNAME", $SS_NICKNAME);

$tpl->setVar("T_PARENT_CODE", "community_business");
$tpl->setVar("T_PARENT_ID", $id);

$tpl->setVar("S_SELECT_BUSINESS_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_type,0,$p_business_type));
$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(-1, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc","도시전체"));

$tpl->setVar("T_ADVERTISING_LEVEL", $t_advertising_level);
$tpl->setVar("T_MAIN_IMAGE_URL", $main_img);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_BUSINESS_TYPE", $t_business_type);
$tpl->setVar("T_LOCATION", $p_city_name . ", " . $p_state_code);
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);

$tpl->setVar("T_IMG1", $img1);
$tpl->setVar("T_CONTENT", $p_content);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
