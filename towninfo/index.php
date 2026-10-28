<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
    
use BearTemplate\BearTemplate;
use user_service\service_event_list;
use user_service\service_find_people_list;
use user_service\service_notification_list;
use user_service\service_marketsale_list;


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/towninfo/service/service_event_list.php");
include("$DOCUMENT_ROOT/towninfo/service/service_find_people_list.php");
include("$DOCUMENT_ROOT/towninfo/service/service_marketsale_list.php");
include("$DOCUMENT_ROOT/towninfo/service/service_notification_list.php");


$fn_params = array(
        "page" => 1,
        "s_category" => "",
        "s_kind" => "",
        "s_keyword" => "",
        "page_set" =>  21,        
        "block_set" => 10
    );
    
$find_people_list = new service_find_people_list($db, $define_val, $fn_params);
$fp = $find_people_list->loop;

$notification_list = new service_notification_list($db, $define_val, $fn_params);
$nt = $notification_list->loop;

$event_list= new service_event_list($db, $define_val, $fn_params);
$et = $event_list->loop;

$fn_params = array(

    "state_code" => '',
    "county" => '',
    "indexYN" => 'Y',
    "limit" => 9         
);

$marketsale_list = new service_marketsale_list($db, $define_val, $fn_params);
$ms = $marketsale_list->loop;

$main=4;
$sub=1;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "index.tpl");

$tpl->setLoop("T_FP", $fp);

$tpl->setLoop("T_NT", $nt);

$tpl->setLoop("T_ET", $et);

$tpl->setLoop("T_MS", $ms);

include("$DOCUMENT_ROOT/include/common.php");

$banner_dic = $towninfo_html['BANNER'];

foreach ($banner_dic as $location => $info) {
    
    $imgUrl = $info['img'];
    $linkUrl = $info['link'];

    $tpl->setVar($location."_img",$imgUrl);
    $tpl->setVar($location."_link",$linkUrl);
        
}


$tpl->tprint("main");
