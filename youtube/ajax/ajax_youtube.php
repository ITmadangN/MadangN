<?php

use BearTemplate\BearTemplate;
use youtube\youtube;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/youtube/service/youtube.php");


$ac = $_REQUEST['ac'];


if($ac == "movie_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_sort" => $_GET['s_sort'] ?? "newest",
        "s_category_1" => $_GET['s_category_1'] ?? "",
        "s_category_2" => $_GET['s_category_2'] ?? "",
        "page_set" =>  10,
        "block_set" => 10
    );

    $youtube_list = new youtube($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "youtube_list_body.tpl");

    $tpl->setLoop("T_LOOP", $youtube_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $youtube_list->paging
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
