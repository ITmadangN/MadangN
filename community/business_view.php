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

$sql = "SELECT A.* FROM community_business A where A.community_business_id = :id";
$placeholders = ['id' => $id];
$result = $db->query($sql, $placeholders);

$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_BUSINESS_HOME);

$p_ad_company_id = $row->ad_company_id;
$p_user_id = $row->user_id;
$p_company_name = $row->company_name;
$p_main_image_url = $row->main_image_url;
$p_sub_image_01_url = $row->sub_image_01_url;
$p_title = $row->title;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_content = $row->content;
$p_view_count = $row->view_count + 1;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$p_advertising_level = $row->advertising_level;
$p_business_type = $row->business_type;

$is_modify_yn = $row->is_modify_yn;

$db->update('community_business', ['view_count' => $p_view_count], 'community_business_id = ' . $id);

$img1 = "";
$sub_image_01_url = "";

if($p_sub_image_01_url != "") {
    $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=business&d=img1&s=".$row->community_business_id;
    $sub_image_01_url = '<img src="'.$sub_img.'" alt="" /><br><br>';
}

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
$tpl->setFile("main", "business_view.tpl");

$tpl->setVar("T_ID", $id);

$tpl->setVar("T_SS_NICKNAME", $SS_NICKNAME);

$tpl->setVar("T_PARENT_CODE", "community_business");
$tpl->setVar("T_PARENT_ID", $id);

$tpl->setVar("S_SELECT_BUSINESS_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_type,0,""));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_BUSINESS_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_s_kind,1,""));

$tpl->setVar("T_ADVERTISING_LEVEL", $t_advertising_level);
$tpl->setVar("T_MAIN_IMAGE_URL", $main_img);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_BUSINESS_TYPE", $t_business_type);
$tpl->setVar("T_LOCATION", $p_city_name . ", " . $p_state_code);
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);

$tpl->setVar("T_IMG1", $sub_image_01_url);
$tpl->setVar("T_CONTENT", @str_replace("\r\n", "<br>", $p_content));

if($p_advertising_level == "regular" && $p_user_id == $SS_ID) $tpl->setVar("UPDATE_DELETE", true);

if($SS_ID != "") $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick='SAVE_REPLY();'>댓글쓰기</button>");
else $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick=\"alert('로그인을 먼저 해주세요');GO_LOGIN_DISPLAY();\">댓글쓰기</button>");

if($p_user_id == $SS_ID && $is_modify_yn == "1" && $p_advertising_level != "regular")  { 
    $tpl->setVar("PREMIUM_UPDATE", true);
}

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
