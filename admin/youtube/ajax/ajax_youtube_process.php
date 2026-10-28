<?php

use BearTemplate\BearTemplate;
use service\youtube_list;
use service\madangn_youtube_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/youtube/service/youtube_list.php");
include("$DOCUMENT_ROOT/admin/youtube/service/madangn_youtube_list.php");

$ac = $_REQUEST['ac'];

// youtube_list update 처리
if($ac == "update_movie") {

    $id = $_POST['id'];
    $video_id = $_POST['video_id'];
    $channel_id = $_POST["channel_id"];
    $category_1 = $_POST["category_1"];
    $category_2 = $_POST["category_2"];
    $history_title = $_POST["history_title"];
    $description = $_POST["description"];
    $is_active = $_POST["is_active"];

    $update_values = array(
        'channel_id' => $channel_id,
        'history_title' => $history_title,
        'description' => $description,
        'is_active' => $is_active
    );
    $result = $db->update('youtube_channel_featured_videos', $update_values, 'youtube_channel_featured_videos_id = '.$id);

    // youtube_featured_videos에서 검색해서 있으면 업데이트 없으면 추가한다.

    $db->query("SELECT * FROM youtube_featured_videos where youtube_channel_featured_videos_id = $id");
    $cnt = $db->numRows();

    if($cnt > 0) {
        $result = $db->update('youtube_featured_videos', ['category_1' => $category_1, 'category_2' => $category_2, 'is_active' => $is_active], 'youtube_channel_featured_videos_id = '.$id);
    }
    else {

        $insert_values = [
            'youtube_featured_videos_id' => null,
            'youtube_channel_featured_videos_id' => $id,
            'video_id' => $video_id,
            'category_1' => $category_1,
            'category_2' => $category_2 ,
            'home_pick' => '',
            'editors_pick' => '',
            'insurance_finance_pick' => '',
            'rogg_pick' => '',
            'is_active'  => $is_active,
            'created_user' => $SS_NICKNAME ,
            'updated_user' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'ip_address' => $define_val->DEFINE_IP_ADDRESS
        ];


        $result = $db->insert("youtube_featured_videos", $insert_values);

    }

}

// madangn_youtube_list update 처리
if($ac == "madangn_update_movie") {

    $id = $_POST['id'];
    $aid = $_POST['aid'];
    $video_id = $_POST['video_id'];
    $channel_id = $_POST["channel_id"];
    $category_1 = $_POST["category_1"];
    $category_2 = $_POST["category_2"];
    $history_title = $_POST["history_title"];

    $home_pick = $_POST["home_pick"];
    $editors_pick = $_POST["editors_pick"];
    $insurance_finance_pick = $_POST["insurance_finance_pick"];
    $rogg_pick = $_POST["rogg_pick"];

    $is_active = $_POST["is_active"];

    $madangn_update_values = array(
        'category_1' => $category_1,
        'category_2' => $category_2,
        'home_pick' => $home_pick,
        'editors_pick' => $editors_pick,
        'insurance_finance_pick' => $insurance_finance_pick,
        'rogg_pick' => $rogg_pick,
        'is_active' => $is_active
    );

    $update_values = array(
        'channel_id' => $channel_id,
        'is_active' => $is_active
    );

    $result = $db->update('youtube_featured_videos', $madangn_update_values, 'youtube_featured_videos_id = '.$id);
    $result = $db->update('youtube_channel_featured_videos', $update_values, 'youtube_channel_featured_videos_id = '.$aid);


}

if($ac == "page_youtube_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_channel_id" => $_GET['s_channel_id'] ?? "",
        "s_category_1" => $_GET['s_category_1'] ?? "",
        "s_category_2" => $_GET['s_category_2'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ? (int)$_GET['s_cnt']: 10,
        "block_set" => 10
    );

    $youtube_list = new youtube_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "youtube_list_body.tpl");

    $tpl->setLoop("T_LOOP", $youtube_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $youtube_list->paging,
        "navigation_text" => $youtube_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "page_madangn_youtube_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_channel_id" => $_GET['s_channel_id'] ?? "",
        "s_category_1" => $_GET['s_category_1'] ?? "",
        "s_category_2" => $_GET['s_category_2'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ? (int)$_GET['s_cnt']: 10,
        "block_set" => 10
    );

    $youtube_list = new madangn_youtube_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "madangn_youtube_list_body.tpl");

    $tpl->setLoop("T_LOOP", $youtube_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $youtube_list->paging,
        "navigation_text" => $youtube_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "change_category_1") {

    $s_category_1 = $_GET['s_category_1'] ?? "";
    $start_position = $_GET['start_position'] ?? "0";

    if($s_category_1 == "-1" || $s_category_1 == "") $html = ARRAY_ARRAY_RETURN($define_val->DEFINE_blank,0,'');
    else $html = ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_category2[$s_category_1],$start_position,"");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html)
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

if($ac == "set_flag") {
    
    $type = $_GET['type'] ?? "";
    $id = $_GET['id'] ?? "";
    $yn= $_GET['yn'] ?? "";    
    
    if($yn == "") $yn = 'Y';
    else $yn = "";

    $update_values = array(        
    );
    
    if($type == "home_pick") $update_values['home_pick'] = $yn;
    if($type == "editors_pick") $update_values['editors_pick'] = $yn;
    if($type == "insurance_finance_pick") $update_values['insurance_finance_pick'] = $yn;
    if($type == "rogg_pick") $update_values['rogg_pick'] = $yn;

    $result = $db->update('youtube_featured_videos', $update_values, 'youtube_featured_videos_id = '.$id);   
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html)
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

    
}