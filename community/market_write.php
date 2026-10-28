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

$lt = $_GET["lt"] ?? "";


if($lt == "") $lt = "market";

$img_uplaod = true;
$state_code = true;

switch($lt) {
    case "wanted" : $img_uplaod = false; break;
    case "coupon" : $img_uplaod = false; $state_code = false; break;
}

$main=3;
$sub=3;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "market_write.tpl");

if($lt == "donation") $tpl->setVar("T_MARKETPLACE_PRICE","0"); 
if($img_uplaod != false) $tpl->setVar("NOT_COUPON_WANTED",true);
if($state_code != false) $tpl->setVar("NOT_COUPON",true);

$tpl->setVar("S_SELECT_LISTING_TYPE",ARRAY_ARRAY_ONE_RETURN($define_val->DEFINE_market_listing_type, 1, $lt));
$tpl->setVar("S_SELECT_MARKETPLACE_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_market_marketplace_type[$lt],-1,'',"선택"));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc", "주선택"));
$tpl->setVar("S_SELECT_CITY_NAME",ARRAY_ARRAY_RETURN($define_val->DEFINE_common_blank,-1,"", "도시선택"));

$tpl->setVar("T_LISTING_TYPE",ARRAY_RETURN($define_val->DEFINE_market_listing_type,$lt));
$tpl->setVar("T_LT",$lt);

$tpl->setVar("IMG_UPLOAD",$img_uplaod);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

