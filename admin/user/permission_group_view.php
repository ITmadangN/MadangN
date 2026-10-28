<?php

use BearTemplate\BearTemplate;

// error_reporting(E_ALL);
// ini_set('display_errors', '1');


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "permission_setting";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/admin/user/include/permission_common.php");

$permission_group_id = $_GET["permission_group_id"] ?? "";

$sql = "SELECT A.*, B.permission_code, B.permission_yn FROM permission_group A left join permission_group_card B on A.permission_group_id = B.permission_group_id WHERE A.permission_group_id = :permission_group_id";
$placeholders = ['permission_group_id' => $permission_group_id];

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

$checked_list = [];

do {
    
    $p_permission_group_name = $row->permission_group_name;
    $p_permission_group_description = $row->permission_group_description;
    $p_permission_code = $row->permission_code;
    $p_permission_yn = $row->permission_yn;
    
    if($p_permission_yn == 'Y') $checked_list[] = $p_permission_code;
    
} while ($row = $db->fetch());

$main = 7;
$sub = 2;
$mtitle = "Setting";
$stitle = "권한그룹 상세보기";
$ytitle = "";
$page = "";

$permission_html =  render_permission_checkboxes($permission_list, $checked_list);

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "permission_group_view.tpl");

$tpl->setVar("T_ID", $permission_group_id);
$tpl->setVar("T_PERMISSION_GROUP_NAME", $p_permission_group_name);
$tpl->setVar("T_PERMISSION_GROUP_DESCRIPTION", $p_permission_group_description);
$tpl->setVar("T_PERMISSION_HTML", $permission_html);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
