<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "youtube_madangn_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$youtube_featured_videos_id = $_GET["youtube_featured_videos_id"];

$sql = "SELECT A.*, B.channel_id, B.history_title, B.default_image FROM youtube_featured_videos  A
        LEFT JOIN youtube_channel_featured_videos B
        on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id
        where A.youtube_featured_videos_id = :youtube_featured_videos_id";

$placeholders = ['youtube_featured_videos_id' => $youtube_featured_videos_id];

$result = $db->queryRow($sql, $placeholders, PDO::FETCH_OBJ);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$p_youtube_channel_featured_videos_id = $result->youtube_channel_featured_videos_id;
$p_video_id = $result->video_id;
$p_category_1 = $result->category_1;
$p_category_2 = $result->category_2;
$p_home_pick = $result->home_pick;
$p_editors_pick = $result->editors_pick;
$p_insurance_finance_pick = $result->insurance_finance_pick;
$p_rogg_pick = $result->rogg_pick;
$p_is_active = $result->is_active;

$p_channel_id = $result->channel_id;
$p_history_title = $result->history_title;
$p_default_image = $result->default_image;

$p_created_user = $result->created_user;
$p_created_at = $result->created_at;
$p_ip_address = $result->ip_address;

$p_category_1 = $p_category_1 ?:"madangntv";
$p_category_2 = $p_category_2 ?:"miburi";

if($p_home_pick == "Y") $p_home_pick_checked = "checked"; else $p_home_pick_checked = "";
if($p_editors_pick == "Y") $p_editors_pick_checked = "checked"; else $p_editors_pick_checked = "";
if($p_insurance_finance_pick == "Y") $p_insurance_finance_pick_checked = "checked"; else $p_insurance_finance_pick_checked = "";
if($p_rogg_pick == "Y") $p_rogg_pick_checked = "checked"; else $p_rogg_pick_checked = "";

$main=3;
$sub=1;
$mtitle="유튜브";
$stitle="MadangN 동영상 관리";
$ytitle="동영상 수정하기";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "madangn_youtube_update.tpl");

$tpl->setVar("T_ID",$youtube_featured_videos_id);
$tpl->setVar("T_AID",$p_youtube_channel_featured_videos_id);
$tpl->setVar("T_VIDEO_ID",$p_video_id);

$tpl->setVar("T_YOUTUBE_IMG",$p_default_image);

$tpl->setVar("T_SELECT_CHANNEL_ID",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_channel,1,$p_channel_id));
$tpl->setVar("T_SELECT_CATEGORY_1",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_category1,1,$p_category_1));
$tpl->setVar("T_SELECT_CATEGORY_2",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_category2[$p_category_1],1,$p_category_2));
$tpl->setVar("T_HISTORY_TITLE",$p_history_title);

$tpl->setVar("T_HOME_PICK_CHECKED",$p_home_pick_checked);
$tpl->setVar("T_EDITORS_PICK_CHECKED",$p_editors_pick_checked);
$tpl->setVar("T_INSURANCE_FINANCE_PICK_CHECKED",$p_insurance_finance_pick_checked);
$tpl->setVar("T_ROGG_PICK_CHECKED",$p_rogg_pick_checked);

$tpl->setVar("T_SELECT_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,1,$p_is_active));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
