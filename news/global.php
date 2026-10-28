<?php

use BearTemplate\BearTemplate;
use user_service\service_news_list;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/news/service/service_news_list.php");

$fn_params = array(
    "page" => 1,
    "section" => 'lo',
    "s_kind" => '',
    "s_keyword" => '',        
    "page_set" => 30,
    "block_set" => 10,
    "random" => 'Y',
    "report_date" => '',
    "image" => 'Y'
    
);

$st_list = new service_news_list($db, $define_val, $fn_params);

$main="1";
$sub="3";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "global.tpl");

$tpl->setLoop("T_SO", $st_list->loop);

include("$DOCUMENT_ROOT/include/common.php");

$banner_dic = $news_html['BANNER'];

foreach ($banner_dic as $location => $info) {
    
    $imgUrl = $info['img'];
    $linkUrl = $info['link'];

    $tpl->setVar($location."_img",$imgUrl);
    $tpl->setVar($location."_link",$linkUrl);
        
}

$tpl->tprint("main");
