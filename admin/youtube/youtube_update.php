<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "youtube_all_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$youtube_channel_featured_videos_id = $_GET["youtube_channel_featured_videos_id"];

$sql = "SELECT A.*, B.category_1, B.category_2 FROM youtube_channel_featured_videos A
        LEFT JOIN youtube_featured_videos B
        on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id
        where A.youtube_channel_featured_videos_id = :youtube_channel_featured_videos_id";

$placeholders = ['youtube_channel_featured_videos_id' => $youtube_channel_featured_videos_id];

$result = $db->queryRow($sql, $placeholders, PDO::FETCH_OBJ);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$p_youtube_channel_featured_videos_id = $result->youtube_channel_featured_videos_id;
$p_channel_id = $result->channel_id;
$p_category_1 = $result->category_1;
$p_category_2 = $result->category_2;
$p_youtube_id = $result->youtube_id;
$p_video_id = $result->video_id;
$p_puliishedat = $result->puliishedat;
$p_history_title = $result->history_title;
$p_description = $result->description;
$p_default_image = $result->default_image;
$p_medium_image = $result->medium_image;
$p_hight_image = $result->hight_image;
$p_standard_img = $result->standard_img;
$p_maxres_img = $result->maxres_img;
$p_view_count = $result->view_count;
$p_like_count = $result->like_count;
$p_is_active = $result->is_active;
$p_created_user = $result->created_user;
$p_created_at = $result->created_at;
$p_ip_address = $result->ip_address;

$main=3;
$sub=2;
$mtitle="유튜브";
$stitle="Youtube 전체 동영상 관리";
$ytitle="동영상 수정하기";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "youtube_update.tpl");

$tpl->setVar("T_ID",$youtube_channel_featured_videos_id);
$tpl->setVar("T_VIDEO_ID",$p_video_id);

$tpl->setVar("T_YOUTUBE_IMG",$p_default_image);
//$tpl->setVar("T_SELECT_CHANNEL_ID",ARRAY_RETURN($DEFINE_youtube_channel,$P_channel_id));
//$tpl->setVar("T_SELECT_CATEGORY_1",ARRAY_RETURN($DEFINE_youtube_category1,$p_category_1));
//$tpl->setVar("T_SELECT_CATEGORY_2",ARRAY_RETURN($DEFINE_youtube_category2[$p_category_1],$p_category_2));
$tpl->setVar("T_SELECT_CHANNEL_ID",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_channel,1,$p_channel_id));
$tpl->setVar("T_SELECT_CATEGORY_1",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_category1,1,$p_category_1));
$tpl->setVar("T_SELECT_CATEGORY_2",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_category2[$p_category_1],1,$p_category_2));
$tpl->setVar("T_HISTORY_TITLE",$p_history_title);
$tpl->setVar("T_DESCRIPTION",$p_description);
$tpl->setVar("T_VIEW_COUNT",number_format($p_view_count,0));
$tpl->setVar("T_LIKE_COUNT",number_format($p_like_count,0));
$tpl->setVar("T_SELECT_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,1,$p_is_active));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
