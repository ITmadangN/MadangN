<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "news_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$news_id = $_GET["news_id"] ?? "";

$sql = "SELECT A.*, B.img_url, B.caption, B.can_use FROM news A
        LEFT JOIN news_images B
        on A.news_id = B.news_id
        where A.news_id = :news_id";
        
$placeholders = ['news_id' => $news_id];        

$result = $db->query($sql, $placeholders);

if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$loop = array();

$g_num = 0;

$row = $db->fetch();

$p_news_id = $row->news_id;
$p_report_date = $row->report_date;
$p_source = $row->source;
$p_section = $row->section;
$p_link = $row->link;
$p_title = $row->title;
$p_content = $row->content;
$p_reporter_name = $row->reporter_name;
$p_view_count = $row->view_count;
$p_image_count = $row->image_count;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_keyword_tag = $row->keyword_tag;
$p_ip_address = $row->ip_address;
$p_is_manual_input = $row->is_manual_input;
$p_image_01_url = $row->img_url;
$p_sort = $row->sort;

$p_del_image_01_url = "";
if ($p_image_01_url != "") {
    $v_image_01_url = $define_val->IMG_PROTECT . "?c=news&cc=news&d=img1&s=" . $p_news_id;
    $v_image_01_url = "<img src=\"$v_image_01_url\" alt=\"\"  />";
    $p_del_image_01_url = GET_DEL_UPLOAD_IMAGE('image_01_url');
} else {
    $v_image_01_url = $blank_img;
}



$main=2;
$sub=3;
$mtitle="뉴스";
$stitle="뉴스 게시물 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "news_update.tpl");

$tpl->setVar("T_ID", $p_news_id);

$tpl->setVar("H_IMAGE_01_URL", $p_image_01_url);
$tpl->setVar("H_IMAGE_02_URL", $p_image_02_url);
$tpl->setVar("H_IMAGE_03_URL", $p_image_03_url);


$tpl->setVar("T_IMAGE_01_URL", $v_image_01_url);
$tpl->setVar("T_IMAGE_02_URL", $v_image_02_url);
$tpl->setVar("T_IMAGE_03_URL", $v_image_03_url);

$tpl->setVar("T_DEL_IMAGE_01_URL", $p_del_image_01_url);
$tpl->setVar("T_DEL_IMAGE_02_URL", $p_del_image_02_url);
$tpl->setVar("T_DEL_IMAGE_03_URL", $p_del_image_03_url);

$tpl->setVar("T_ID", $p_news_id);
$tpl->setVar("T_NEWS_ID",       $p_news_id);
$tpl->setVar("T_REPORT_DATE",   $p_report_date);
$tpl->setVar("T_SOURCE",        $p_source);
$tpl->setVar("SELECT_SECTION", ARRAY_ARRAY_RETURN($define_val->DEFINE_news_section, 1, $p_section));
$tpl->setVar("T_LINK",          $p_link);
$tpl->setVar("T_TITLE",         $p_title);
$tpl->setVar("T_CONTENT",       $p_content);
$tpl->setVar("T_REPORTER_NAME", $p_reporter_name);
$tpl->setVar("T_VIEW_COUNT",    $p_view_count);
$tpl->setVar("T_IMAGE_COUNT",   $p_image_count);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("T_CREATED_USER",  $p_created_user);
$tpl->setVar("T_UPDATED_USER",  $p_updated_user);
$tpl->setVar("T_CREATED_AT",    $p_created_at);
$tpl->setVar("T_UPDATED_AT",    $p_updated_at);
$tpl->setVar("T_KEYWORD_TAG",   $p_keyword_tag);
$tpl->setVar("T_IP_ADDRESS",    $p_ip_address);
$tpl->setVar("T_SORT",   $p_sort);


include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

