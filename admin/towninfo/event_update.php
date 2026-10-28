<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "madangn_event_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$towninfo_madangn_event_id = $_GET["towninfo_madangn_event_id"] ?? "";

$sql = "SELECT * FROM towninfo_madangn_event WHERE towninfo_madangn_event_id = :towninfo_madangn_event_id";
$placeholders = ['towninfo_madangn_event_id' => $towninfo_madangn_event_id];

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

$p_towninfo_madangn_event_id = $row->towninfo_madangn_event_id;
$p_title = $row->title;
$p_event_start_date = $row->event_start_date;
$p_event_end_date = $row->event_end_date;
$p_description = $row->description;
$p_list_image = $row->list_image;
$p_image_01_url = $row->image_01_url;
$p_image_02_url = $row->image_02_url;
$p_image_03_url = $row->image_03_url;
$p_view_count = $row->view_count;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_ip_address = $row->ip_address;

$blank_img = "";

$p_del_list_image = "";
if ($p_list_image != "") {
    $v_list_image = $define_val->IMG_PROTECT . "?c=towninfo&cc=event&d=list&s=" . $p_towninfo_madangn_event_id;
    $v_list_image = "<img src=\"$v_list_image\" alt=\"\"  />";
    $p_del_list_image = GET_DEL_UPLOAD_IMAGE('list_image');
} else {
    $v_list_image = $blank_img;
}

$p_del_image_01_url = "";
if ($p_image_01_url != "") {
    $v_image_01_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=event&d=img1&s=" . $p_towninfo_madangn_event_id;
    $v_image_01_url = "<img src=\"$v_image_01_url\" alt=\"\"  />";
    $p_del_image_01_url = GET_DEL_UPLOAD_IMAGE('image_01_url');
} else {
    $v_image_01_url = $blank_img;
}


$p_del_image_02_url = "";
if ($p_image_02_url != "") {
    $v_image_02_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=event&d=img2&s=" . $p_towninfo_madangn_event_id;
    $v_image_02_url = "<img src=\"$v_image_02_url\" alt=\"\"  />";
    $p_del_image_02_url = GET_DEL_UPLOAD_IMAGE('image_02_url');
} else {
    $v_image_02_url = $blank_img;
}


$p_del_image_03_url = "";
if ($p_image_03_url != "") {
    $v_image_03_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=event&d=img3&s=" . $p_towninfo_madangn_event_id;
    $v_image_03_url = "<img src=\"$v_image_03_url\" alt=\"\" />";
    $p_del_image_03_url = GET_DEL_UPLOAD_IMAGE('image_03_url');
} else {
    $v_image_03_url = $blank_img;
}



$main = 5;
$sub = 4;
$mtitle = "타운정보";
$stitle = "마당엔 이벤트 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "event_update.tpl");

$tpl->setVar("T_ID", $towninfo_madangn_event_id);
$tpl->setVar("H_LIST_IMAGE", $p_list_image);
$tpl->setVar("H_IMAGE_01_URL", $p_image_01_url);
$tpl->setVar("H_IMAGE_02_URL", $p_image_02_url);
$tpl->setVar("H_IMAGE_03_URL", $p_image_03_url);

$tpl->setVar("T_LIST_IMAGE", $v_list_image);
$tpl->setVar("T_IMAGE_01_URL", $v_image_01_url);
$tpl->setVar("T_IMAGE_02_URL", $v_image_02_url);
$tpl->setVar("T_IMAGE_03_URL", $v_image_03_url);

$tpl->setVar("T_DEL_LIST_IMAGE", $p_del_list_image);
$tpl->setVar("T_DEL_IMAGE_01_URL", $p_del_image_01_url);
$tpl->setVar("T_DEL_IMAGE_02_URL", $p_del_image_02_url);
$tpl->setVar("T_DEL_IMAGE_03_URL", $p_del_image_03_url);


$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_EVENT_START_DATE", $p_event_start_date);
$tpl->setVar("T_EVENT_END_DATE", $p_event_end_date);
$tpl->setVar("T_DESCRIPTION", $p_description);
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

