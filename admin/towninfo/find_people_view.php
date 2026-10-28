<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "findperson_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$towninfo_find_people_id = $_GET["towninfo_find_people_id"] ?? "";

$sql = "SELECT * FROM towninfo_find_people WHERE towninfo_find_people_id = :towninfo_find_people_id";
$placeholders = ['towninfo_find_people_id' => $towninfo_find_people_id];

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

$p_towninfo_find_people_id = $row->towninfo_find_people_id;
$p_category = $row->category;
$p_title = $row->title;
$p_description = $row->description;
$p_image_01_url = $row->image_01_url;
$p_image_02_url = $row->image_02_url;
$p_image_03_url = $row->image_03_url;
$p_view_count = $row->view_count;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_updated_user = $row->updated_user;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$blank_img = "";

if ($p_image_01_url != "") {
    $v_image_01_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=find_people&d=img1&s=" . $p_towninfo_find_people_id;
    $v_image_01_url = "<img src=\"$v_image_01_url\" alt=\"\"  />";
} else {
    $v_image_01_url = $blank_img;
}

if ($p_image_02_url != "") {
    $v_image_02_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=find_people&d=img2&s=" . $p_towninfo_find_people_id;
    $v_image_02_url = "<img src=\"$v_image_02_url\" alt=\"\"  />";
} else {
    $v_image_02_url = $blank_img;
}

if ($p_image_03_url != "") {
    $v_image_03_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=find_people&d=img3&s=" . $p_towninfo_find_people_id;
    $v_image_03_url = "<img src=\"$v_image_03_url\" alt=\"\" />";
} else {
    $v_image_03_url = $blank_img;
}

$main = 5;
$sub = 2;
$mtitle = "타운정보";
$stitle = "사람찾기 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "find_people_view.tpl");

$tpl->setVar("T_ID", $p_towninfo_find_people_id);
$tpl->setVar("T_IMAGE_01_URL", $v_image_01_url);
$tpl->setVar("T_IMAGE_02_URL", $v_image_02_url);
$tpl->setVar("T_IMAGE_03_URL", $v_image_03_url);
$tpl->setVar("T_CATEGORY", ARRAY_RETURN($define_val->DEFINE_find_people_category, $p_category));
$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_DESCRIPTION", @str_replace("\n", "<br>", $p_description));
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);
$tpl->setVar("G_NUM", 1);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
