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

$id = $_GET["id"];

$sql = "SELECT A.* FROM towninfo_event_notification A where A.towninfo_event_notification_id = :id";

$placeholders = ['id' => $id];
$result = $db->query($sql, $placeholders);

$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_NOTIFICATION_HOME);

$p_towninfo_event_notification_id = $row->towninfo_event_notification_id;
$p_user_id = $row->user_id;
$p_category = $row->category;
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

$array_img = array();

$img_array = array("$p_image_01_url","$p_image_02_url","$p_image_03_url");


for($i=0;$i<count($img_array);$i++) {

    $image_thum = "";

    if ($img_array[$i] != "") {

        $img_no = "img".($i+1);

        $image_thum = $define_val->IMG_PROTECT . "?c=towninfo&cc=notification&d=$img_no&s=". $p_towninfo_event_notification_id;

        $html = MAKE_UPLOAD_HTML('Y', 'image_0'.($i+1).'_url', $img_array[$i], $image_thum, "가로 845x2000이하");
    }
    else {
        $html = MAKE_UPLOAD_HTML('N', 'image_0'.($i+1).'_url', $img_array[$i],'',"가로 845x2000이하");
    }

    $array_img[$i] = array('T_HTML' => $html);

}

$main=4;
$sub=3;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "notification_update.tpl");

$tpl->setVar("T_ID", $id);

$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("S_SELECT_CATEGORY", ARRAY_ARRAY_RETURN($define_val->DEFINE_notification_category,1,$p_category));

$tpl->setLoop("T_LOOP", $array_img);

$tpl->setVar("T_DESCRIPTION", $p_description);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
