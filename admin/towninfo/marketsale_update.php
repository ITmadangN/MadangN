<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$id = $_GET["id"] ?? "";

$sql = "SELECT * FROM towninfo_marketsale_users WHERE user_id = :user_id";
$placeholders = ['user_id' => $SS_ID];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();
if (!$row) {
    echo "데이터가 없습니다.";
    exit;
}

$row_sql = "SELECT A.* FROM towninfo_marketsale_flyer A                    
                    where A.towninfo_marketsale_flyer_id  = {$id} and user_id = '{$SS_ID}'
";

$db->query($row_sql);

$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_MARKETSALE_HOME);

$p_towninfo_marketsale_flyer_id = $row->towninfo_marketsale_flyer_id;
$p_towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
$p_title = $row->title;
$logo_url = $row->logo_url;
$p_main_image_url = $row->main_image_url;
$p_sale_start_date = $row->sale_start_date;
$p_sale_end_date = $row->sale_end_date;
$p_state_code = $row->state_code;
$p_description = $row->description;
$p_weekly_ads_flyer_site = $row->weekly_ads_flyer_site;

$market_name = GET_MARKET_NAME($db,$p_towninfo_marketsale_market_id);

$blank_img = "";

if ($p_towninfo_marketsale_market_id != "") {
    $v_logo_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_market&d=logo&s=" . $p_towninfo_marketsale_market_id;
    $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\" style=\"margin-left:50px;height:25px;\" />";
} else {
    $v_logo_url = $blank_img;
}


$array_img = array();
        
$image_thum = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_flyer&d=main&s=". $p_towninfo_marketsale_flyer_id;

$html = MAKE_UPLOAD_OTHER_HTML('Y', 'user_files[]', $p_main_image_url, $image_thum);

$array_img[0] = array('T_HTML' => $html);


$main = 4;
$sub = 2;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_update.tpl");

$tpl->setVar("T_MARKET_NAME",$market_name);
$tpl->setVar("T_ID",$p_towninfo_marketsale_flyer_id);
$tpl->setVar("T_TITLE",$p_title);
$tpl->setVar("T_SALE_START_DATE",$p_sale_start_date);
$tpl->setVar("T_SALE_END_DATE",$p_sale_end_date);
$tpl->setVar("T_DESCRIPTION",$p_description);

$tpl->setVar("T_TOWNINFO_MARKETSALE_MARKET_ID",$p_towninfo_marketsale_market_id);
$tpl->setVar("T_IMG",$v_logo_url);
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("SELECT_WEEKLY_ADS_FLYER_SITE", GET_MARKETSALE_REGION(1, $market_name, $p_state_code, $p_weekly_ads_flyer_site, $db,""));

$tpl->setLoop("T_LOOP", $array_img);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

