<?php

use BearTemplate\BearTemplate;
use user_service\market_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/community/service/service_market.php");

$id = $_GET["id"];
$lt = $_GET["lt"];


$sql = "SELECT A.* FROM community_marketplace_listings A where  A.community_marketplace_listings_id  = :id and A.is_active = 1";

$placeholders = ['id' => $id];
$result = $db->query($sql, $placeholders);

$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_MARKET_HOME);

$g_num = 0;
$blank_img = "/images/blank.png";
$loop = array();


$p_community_marketplace_listings_id  = $row->community_marketplace_listings_id ;
$p_user_id = $row->user_id;
$p_listing_type = $row->listing_type;
$p_marketplace_type = $row->marketplace_type;
$p_title = $row->title;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;
$p_marketplace_price = $row->marketplace_price;
$p_contact_phone = $row->contact_phone;
$p_description = $row->description;
$p_image_01_url = $row->image_01_url;
$p_image_02_url = $row->image_02_url;
$p_image_03_url = $row->image_03_url;
$p_image_04_url = $row->image_04_url;
$p_image_05_url = $row->image_05_url;
$p_image_06_url = $row->image_06_url;
$p_view_count = $row->view_count + 1;
$p_internal_notes = $row->internal_notes;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;




$db->update('community_marketplace_listings', ['view_count' => $p_view_count], 'community_marketplace_listings_id = ' . $id);

$img_array = array("$p_image_01_url","$p_image_02_url","$p_image_03_url","$p_image_04_url","$p_image_05_url","$p_image_06_url");

for($i=0;$i<count($img_array);$i++) {

    if ($img_array[$i] != "") {

        $img_no = "img".($i+1);
        $image_thum = $define_val->IMG_PROTECT . "?c=community&cc=market&d=$img_no&s=". $p_community_marketplace_listings_id;

        if($g_num == 0) {
            $class = "swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active";
        }
        else {
            if($g_num == 1) {
                $class = "swiper-slide swiper-slide-next";
            }
            else {
                $class = "swiper-slide";
            }
        }
        $loop[$g_num] = array('T_NO' => $g_num+1,'T_CLASS' => $class, 'T_IMG' => $image_thum);

        $g_num++;

    }
}




$fn_params = array(
    "page" => $_GET['page'] ?? 1,
    "s_listing_type" => $lt,
    "s_marketplace_type" => "",
    "s_state_code" => "",
    "s_city_name" => "",
    "s_kind" => "",
    "s_keyword" => "",
    "page_set" =>  10,
    "block_set" => 10
);

//$market_list = new market_list($db, $define_val, $fn_params);


$main=3;
$sub=3;
$page = "";

$tpl = new BearTemplate("./tpl");
if($fn_params['s_listing_type'] == "market" || $fn_params['s_listing_type'] == "msale" || $fn_params['s_listing_type'] == "donation" || $fn_params['s_listing_type'] == "wanted") $tpl->setFile("main", "market_view.tpl");
// if($fn_params['s_listing_type'] == "wanted") $tpl->setFile("main", "market_wc_view.tpl");
if($fn_params['s_listing_type'] == "coupon") $tpl->setFile("main", "market_wc_view.tpl");

$tpl->setVar("T_SS_NICKNAME", $SS_NICKNAME);

$tpl->setVar("T_ID", $id);
$tpl->setVar("T_LT", $lt);

$tpl->setVar("FALSE_USER_ID", $p_user_id);


$tpl->setVar("T_PARENT_CODE", "community_market");
$tpl->setVar("T_PARENT_ID", $id);

$tpl->setVar("T_LISTING_TYPE",$lt);

$tpl->setVar("T_MENU_NAME",ARRAY_RETURN($define_val->DEFINE_market_listing_type,$lt) . " > " . ARRAY_RETURN($define_val->DEFINE_market_marketplace_type[$lt],$p_marketplace_type));
$tpl->setVar("T_MENU_NAME2",ARRAY_RETURN($define_val->DEFINE_market_listing_type,$lt));

if ($p_listing_type == "market" || $p_listing_type == "msale" || $p_listing_type == "donation" || $p_listing_type == "wanted") $tpl->setVar("MARKET",true);
//if ($p_listing_type == "wanted")  $tpl->setVar("MARKET_WANTED",true);
if ($p_listing_type == "coupon")  $tpl->setVar("MARKET_COUPON",true);

$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("MEMO_TITLE", $p_title);

$tpl->setVar("T_MARKETPLACE_PRICE", number_format($p_marketplace_price,2));
$tpl->setVar("T_LOCATION", $p_city_name . ", " . $p_state_code);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
$tpl->setVar("T_DESCRIPTION",  @str_replace("\r\n", "<br>", $p_description));

$tpl->setLoop("T_LOOP", $loop);

$tpl->setVar("S_SELECT_MARKETPLACE_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_market_marketplace_type[$lt],0,""));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_MARKET_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_market_s_kind,1,""));

if($SS_ID != "") $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick='SAVE_REPLY();'>댓글쓰기</button>");
else $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick=\"alert('로그인을 먼저 해주세요');\">댓글쓰기</button>");

if($p_user_id == $SS_ID) $tpl->setVar("UPDATE_DELETE", true);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
