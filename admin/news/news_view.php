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
while ($row = $db->fetch()) {

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
    $p_sort = $row->sort;
    
    $yn = "";
    if($row->can_use != "1") $yn = "<span style='color:red'>* 이미지 사용 불가능</span>";
    
    if($p_is_manual_input == 'Y')  $image_url = $define_val->IMG_PROTECT . "?c=news&cc=news&d=img1&s=" . $p_news_id;
    else $image_url = $row->img_url;
    
    $loop[$g_num] = array('T_IMG_URL' => $image_url, 'T_CAPTION' => $row->caption, 'T_YN' => $yn);

    $g_num++;
}
 
$main=2;
$sub=3;
$mtitle="뉴스";
$stitle="뉴스 게시물 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "news_view.tpl");

$tpl->setVar("T_ID", $p_news_id);
$tpl->setVar("T_NEWS_ID",       $p_news_id);
$tpl->setVar("T_REPORT_DATE",   $p_report_date);
$tpl->setVar("T_SOURCE",        $p_source);
$tpl->setVar("T_SECTION",       ARRAY_RETURN($define_val->DEFINE_news_section,$p_section));
$tpl->setVar("T_LINK",          $p_link);
$tpl->setVar("T_TITLE",         $p_title);
$tpl->setVar("T_CONTENT",       @nl2br($p_content));
$tpl->setVar("T_REPORTER_NAME", $p_reporter_name);
$tpl->setVar("T_VIEW_COUNT",    $p_view_count);
$tpl->setVar("T_IMAGE_COUNT",   $p_image_count);
$tpl->setVar("T_IS_ACTIVE",     $p_is_active);
$tpl->setVar("T_CREATED_USER",  $p_created_user);
$tpl->setVar("T_UPDATED_USER",  $p_updated_user);
$tpl->setVar("T_CREATED_AT",    $p_created_at);
$tpl->setVar("T_UPDATED_AT",    $p_updated_at);
$tpl->setVar("T_KEYWORD_TAG",   $p_keyword_tag);
$tpl->setVar("T_IP_ADDRESS",    $p_ip_address);
$tpl->setVar("T_SORT",   $p_sort);

// 무조건 수정가능하게
//if($p_is_manual_input == 'Y') $tpl->setVar("MANUAL_INPUT", true);
$tpl->setVar("MANUAL_INPUT", true);

$tpl->setLoop("T_LOOP", $loop);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
