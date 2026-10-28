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

$sql = "SELECT A.* FROM towninfo_madangn_event A where A.towninfo_madangn_event_id = :id";

$placeholders = ['id' => $id];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();

$p_towninfo_madangn_event_id = $row->towninfo_madangn_event_id;
$p_user_id = $row->user_id;
$p_list_image = $row->list_image;
$p_title = $row->title;
$p_description = $row->description;
$p_image_01_url = $row->image_01_url;
$p_image_02_url = $row->image_02_url;
$p_image_03_url = $row->image_03_url;
$p_view_count = $row->view_count + 1;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$p_img1 = "";
$p_img2 = "";
$p_img3 = "";

if($p_image_01_url != "") {
    $img = $define_val->IMG_PROTECT ."?c=towninfo&cc=event&d=img1&s=".$p_towninfo_madangn_event_id;
    $p_img1 = '<img src = "'.$img.'" data-src = "'.$img.'" alt = "" /><br />';
}

if($p_image_02_url != "") {
    $img = $define_val->IMG_PROTECT ."?c=towninfo&cc=event&d=img2&s=".$p_towninfo_madangn_event_id;
    $p_img2 = '<img src = "'.$img.'" data-src = "'.$img.'" alt = "" /><br />';
}

if($p_image_03_url != "") {
    $img = $define_val->IMG_PROTECT ."?c=towninfo&cc=event&d=img3&s=".$p_towninfo_madangn_event_id;
    $p_img3 = '<img src = "'.$img.'" data-src = "'.$img.'" alt = "" /><br />';
}

$db->update('towninfo_madangn_event', ['view_count' => $p_view_count], 'towninfo_madangn_event_id = ' . $id);

$main=4;
$sub=5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "event_view.tpl");

$tpl->setVar("T_SS_NICKNAME", $SS_NICKNAME);

$tpl->setVar("T_TITLE", $p_title);

$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", DATETOSTRING_USA2(substr($p_created_at,0,10),"/"));
$tpl->setVar("T_VIEW_COUNT", $p_view_count);

$tpl->setVar("T_IMG1", $p_img1);
$tpl->setVar("T_IMG2", $p_img2);
$tpl->setVar("T_IMG3", $p_img3);

if($SS_ID != "") $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick='SAVE_REPLY();'>댓글쓰기</button>");
else $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick=\"alert('로그인을 먼저 해주세요');GO_LOGIN_DISPLAY();\">댓글쓰기</button>");

$tpl->setVar("T_DESCRIPTION", @nl2br($p_description));

$tpl->setVar("T_PARENT_CODE", "towninfo_event");
$tpl->setVar("T_PARENT_ID", $id);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
