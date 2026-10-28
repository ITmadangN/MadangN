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

$main=3;
$sub=1;
$mtitle="유튜브";
$stitle="MadangN 동영상 관리";
$ytitle = "";
$page = "";

/*
$sql = "SELECT A.*, B.default_image, B.channel_id, B.history_title FROM youtube_featured_videos A
        left join youtube_channel_featured_videos B
        on A.youtube_channel_featured_videos_id =  B.youtube_channel_featured_videos_id
        limit 0,10";

$db->query($sql);

$i = 0;

while ($row = $db->fetch()) {

    $link = "madangn_youtube_update.php?youtube_featured_videos_id=".$row->youtube_featured_videos_id;
    $is_active_img = "no-active";
    if($row->is_active == "1") $is_active_img = "completed";
    $loop[$i] = array(
        'T_LINK' => $link, 'T_IMG' => $row->default_image,  'T_CHANNEL_NAME' => ARRAY_RETURN($define_val->DEFINE_youtube_channel,$row->channel_id) ,  'T_CATEGORY1_NAME' => ARRAY_RETURN($define_val->DEFINE_youtube_category1,$row->category_1),
        'T_CATEGORY2_NAME' => ARRAY_RETURN($define_val->DEFINE_youtube_category2[$row->category_1],$row->category_2),'T_HISTORY_TITLE' => $row->history_title, 'T_HOME_PICK' => $row->home_pick,'T_EDITORS_PICK'=>$row->editors_pick,'T_INSURE_PICK'=>$row->insurance_finance_pick,'T_ROGG_PICK'=>$row->rogg_pick,
        'T_ACTIVE_IMG' => $is_active_img, 'T_IS_ACTIVE' => ARRAY_RETURN($define_val->DEFINE_is_active,$row->is_active)
    );

    $i++;
}
*/

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "madangn_youtube_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_CHANNEL_ID",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_channel,-1,"","채널"));
$tpl->setVar("S_SELECT_CATEGORY_1",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_category1,-1,"","대분류"));
$tpl->setVar("S_SELECT_CATEGORY_2",ARRAY_ARRAY_RETURN($define_val->DEFINE_blank,-1,'','중분류'));
$tpl->setVar("S_SELECT_CNT",ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count,0,""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
