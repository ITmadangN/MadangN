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

$listing_type = $_GET["lt"] ?? "";


if($listing_type == "") $listing_type = "market";

$market_on = "";
$msale_on = "";
$donation_on = "";
$wanted_on = "";
$coupon_on = "";

switch($listing_type) {
    case "market" : $market_on = "on"; break;
    case "msale" : $msale_on = "on"; break;
    case "donation" : $donation_on = "on"; break;
    case "wanted" : $wanted_on = "on"; break;
    case "coupon" : $coupon_on = "on"; break;
}

$main=3;
$sub=4;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "business_write.tpl");

$tpl->setVar("S_SELECT_BUSINESS_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_type,-1,"","직종선택"));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc","주선택"));
$tpl->setVar("S_SELECT_CITY_NAME",ARRAY_ARRAY_RETURN($define_val->DEFINE_common_blank,-1,"","도시전체"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

