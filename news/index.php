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
    "section" => 'so',
    "s_kind" => '',
    "s_keyword" => '',        
    "page_set" => 30,
    "block_set" => 10,
    "random" => 'Y',
    "report_date" => '',
    "image" => 'Y'
    
);

$so_list = new service_news_list($db, $define_val, $fn_params);

$fn_params['section'] = 'pe';
$pe_list = new service_news_list($db, $define_val, $fn_params);    

$fn_params['section'] = 'en';
$fn_params['page_set'] = 13;
$en_list = new service_news_list($db, $define_val, $fn_params);    

$fn_params['section'] = 'st';
$fn_params['page_set'] = 9;
$st_list = new service_news_list($db, $define_val, $fn_params);    


$fn_params['section'] = 'lo';
$lo_list = new service_news_list($db, $define_val, $fn_params);    

$page="index";
$main="1";
$sub="1";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "index.tpl");

$tpl->setVar("T_DATE","05/14/2026");

// 상단
$tpl->setVar("TOP_1_IMG",$pe_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_1_TITLE",$pe_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_1_CONTENT",TRUNCATE_TITLE($pe_list->loop[0]['T_CONTENT'],250));
$tpl->setVar("TOP_1_LINK",$pe_list->loop[0]['T_LINK']);

$tpl->setVar("TOP_2_IMG",$pe_list->loop[1]['T_IMG']);
$tpl->setVar("TOP_2_TITLE",$pe_list->loop[1]['T_TITLE']);
$tpl->setVar("TOP_2_LINK",$pe_list->loop[1]['T_LINK']);

$tpl->setVar("TOP_3_IMG",$pe_list->loop[2]['T_IMG']);
$tpl->setVar("TOP_3_TITLE",$pe_list->loop[2]['T_TITLE']);
$tpl->setVar("TOP_3_LINK",$pe_list->loop[2]['T_LINK']);

$tpl->setVar("TOP_4_IMG",$st_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_4_TITLE",$st_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_4_LINK",$st_list->loop[0]['T_LINK']);

$tpl->setVar("TOP_5_IMG",$so_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_5_TITLE",$so_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_5_LINK",$so_list->loop[0]['T_LINK']);

$tpl->setVar("TOP_6_IMG",$lo_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_6_TITLE",$lo_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_6_LINK",$lo_list->loop[0]['T_LINK']);


// 중앙
$tpl->setVar("MIDDLE_1_IMG",$pe_list->loop[3]['T_IMG']);
$tpl->setVar("MIDDLE_1_TITLE",$pe_list->loop[3]['T_TITLE']);
$tpl->setVar("MIDDLE_1_CONTENT",TRUNCATE_TITLE($pe_list->loop[3]['T_CONTENT'],250));
$tpl->setVar("MIDDLE_1_LINK",$pe_list->loop[3]['T_LINK']);
$tpl->setVar("MIDDLE_1_DATE",$pe_list->loop[3]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_2_IMG",$pe_list->loop[4]['T_IMG']);
$tpl->setVar("MIDDLE_2_TITLE",$pe_list->loop[4]['T_TITLE']);
$tpl->setVar("MIDDLE_2_LINK",$pe_list->loop[4]['T_LINK']);
$tpl->setVar("MIDDLE_2_DATE",$pe_list->loop[4]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_3_IMG",$en_list->loop[0]['T_IMG']);
$tpl->setVar("MIDDLE_3_TITLE",$en_list->loop[0]['T_TITLE']);
$tpl->setVar("MIDDLE_3_LINK",$en_list->loop[0]['T_LINK']);
$tpl->setVar("MIDDLE_3_DATE",$en_list->loop[0]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_4_IMG",$pe_list->loop[5]['T_IMG']);
$tpl->setVar("MIDDLE_4_TITLE",$pe_list->loop[5]['T_TITLE']);
$tpl->setVar("MIDDLE_4_LINK",$pe_list->loop[5]['T_LINK']);
$tpl->setVar("MIDDLE_4_DATE",$pe_list->loop[5]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_5_IMG",$so_list->loop[1]['T_IMG']);
$tpl->setVar("MIDDLE_5_TITLE",$so_list->loop[1]['T_TITLE']);
$tpl->setVar("MIDDLE_5_LINK",$so_list->loop[1]['T_LINK']);
$tpl->setVar("MIDDLE_5_DATE",$so_list->loop[1]['T_REPORT_DATE']);

// 중앙 - 정치 경제
$tpl->setVar("MIDDLE_2_1_IMG",$pe_list->loop[6]['T_IMG']);
$tpl->setVar("MIDDLE_2_1_REPORTER_NAME",$pe_list->loop[6]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_2_1_TITLE",$pe_list->loop[6]['T_TITLE']);
$tpl->setVar("MIDDLE_2_1_LINK",$pe_list->loop[6]['T_LINK']);
$tpl->setVar("MIDDLE_2_1_LINK",$pe_list->loop[6]['T_LINK']);
$tpl->setVar("MIDDLE_2_1_DATE",$pe_list->loop[6]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_2_2_IMG",$pe_list->loop[7]['T_IMG']);
$tpl->setVar("MIDDLE_2_2_REPORTER_NAME",$pe_list->loop[7]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_2_2_TITLE",$pe_list->loop[7]['T_TITLE']);
$tpl->setVar("MIDDLE_2_2_LINK",$pe_list->loop[7]['T_LINK']);
$tpl->setVar("MIDDLE_2_2_DATE",$pe_list->loop[7]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_2_3_TITLE",$pe_list->loop[8]['T_TITLE']);
$tpl->setVar("MIDDLE_2_3_LINK",$pe_list->loop[8]['T_LINK']);

$tpl->setVar("MIDDLE_2_4_TITLE",$pe_list->loop[9]['T_TITLE']);
$tpl->setVar("MIDDLE_2_4_LINK",$pe_list->loop[9]['T_LINK']);

$tpl->setVar("MIDDLE_2_5_TITLE",$pe_list->loop[10]['T_TITLE']);
$tpl->setVar("MIDDLE_2_5_LINK",$pe_list->loop[10]['T_LINK']);

$tpl->setVar("MIDDLE_2_6_TITLE",$pe_list->loop[11]['T_TITLE']);
$tpl->setVar("MIDDLE_2_6_LINK",$pe_list->loop[11]['T_LINK']);


// 세계뉴스
$tpl->setVar("MIDDLE_3_1_IMG",$lo_list->loop[1]['T_IMG']);
$tpl->setVar("MIDDLE_3_1_REPORTER_NAME",$lo_list->loop[1]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_3_1_TITLE",$lo_list->loop[1]['T_TITLE']);
$tpl->setVar("MIDDLE_3_1_LINK",$lo_list->loop[1]['T_LINK']);
$tpl->setVar("MIDDLE_3_1_LINK",$lo_list->loop[1]['T_LINK']);
$tpl->setVar("MIDDLE_3_1_DATE",$lo_list->loop[1]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_3_2_IMG",$lo_list->loop[2]['T_IMG']);
$tpl->setVar("MIDDLE_3_2_REPORTER_NAME",$lo_list->loop[2]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_3_2_TITLE",$lo_list->loop[2]['T_TITLE']);
$tpl->setVar("MIDDLE_3_2_LINK",$lo_list->loop[2]['T_LINK']);
$tpl->setVar("MIDDLE_3_2_DATE",$lo_list->loop[2]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_3_3_TITLE",$lo_list->loop[3]['T_TITLE']);
$tpl->setVar("MIDDLE_3_3_LINK",$lo_list->loop[3]['T_LINK']);

$tpl->setVar("MIDDLE_3_4_TITLE",$lo_list->loop[4]['T_TITLE']);
$tpl->setVar("MIDDLE_3_4_LINK",$lo_list->loop[4]['T_LINK']);

$tpl->setVar("MIDDLE_3_5_TITLE",$lo_list->loop[5]['T_TITLE']);
$tpl->setVar("MIDDLE_3_5_LINK",$lo_list->loop[5]['T_LINK']);

$tpl->setVar("MIDDLE_3_6_TITLE",$lo_list->loop[6]['T_TITLE']);
$tpl->setVar("MIDDLE_3_6_LINK",$lo_list->loop[6]['T_LINK']);

// 연예

// 사용한것 배열 삭제
$temp_en = $en_list->loop;
unset($temp_en[0]);
$sort_en = array_values($temp_en);

$tpl->setLoop("T_EN", $sort_en);

// 스포츠
$temp_st = $st_list->loop;
unset($temp_st[0]);
$st_cnt = 7;
if(count($temp_st) < 7) $st_cnt = count($temp_st);

for($i=1;$i<$st_cnt;$i++) {
    $temp_content = $temp_st[$i]['T_CONTENT'];
    if($temp_content == "") $temp_st[$i]['T_CONTENT'] = "";
    else $temp_st[$i]['T_CONTENT'] = TRUNCATE_TITLE($temp_content,270);
}

for($i=6;$i<100;$i++) {
    unset($temp_st[$i]);    
}

$sort_st = array_values($temp_st);

$tpl->setLoop("T_ST", $sort_st);


include("$DOCUMENT_ROOT/include/common.php");

$banner_dic = $news_html['BANNER'];

foreach ($banner_dic as $location => $info) {
    
    $imgUrl = $info['img'];
    $linkUrl = $info['link'];

    $tpl->setVar($location."_img",$imgUrl);
    $tpl->setVar($location."_link",$linkUrl);
        
}

$tpl->tprint("main");
