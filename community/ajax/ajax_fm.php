<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");

$ac = $_REQUEST['ac'];

if($ac == "write_false_report") {

    $list_type = $_POST["list_type"];
    $list_id = $_POST['list_id'] ?? "";
    $false_user_id = $_POST['false_user_id'] ?? "";
    $description = $_POST['description'] ?? "";
    $memo_title = $_POST['memo_title'] ?? "";    

    $insert_values = array(
        'user_id' => $SS_ID ?? "",
        'false_user_id' => $false_user_id,
        'list_type' => $list_type,
        'list_id' => $list_id,
        'description' => $memo_title . "\n" . $description,
        'is_active' => 1,
        'created_user' => $SS_NICKNAME,
        'updated_user' => '',
        'created_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
    );

    $db->insert('false_report', $insert_values);
    
    // 메일발송
    $body_email = "신고자 : $SS_ID<br>";
    $body_email .= "판매자 : $false_user_id<br>";
    $body_email .= "판매자 title : $memo_title<br>";
    $body_email .= "판매자 URL : {$define_val->MADANGN_URL}/community/vehicle_regular_view.php?id={$list_id}<br>";
    
    $body_email .= "신고내용 : $description<br>";

    
    // 회사이메일
    $to_email = $define_val->CAR_FALSE_EMAIL;
    //$to_email = "rtrue@naver.com";
    
    $result = send_mail("admin@cbbestrealty.com",$to_email,"자동차 판매 허위신고 [{$memo_title}]",$body_email);

    $result_data = [
        "status" => "success",
        "msg" => "sucess"
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;
}


if($ac == "write_user_messages") {

    $list_type = $_POST["list_type"];
    $list_id = $_POST['list_id'] ?? "";
    $memo_user_id = $_POST['memo_user_id'] ?? "";
    $title = $_POST['title'] ?? "";
    $content = $_POST['content'] ?? "";

    $insert_values = array(
        'user_messages_id' => null,
        'sender_user_id' => $SS_ID,
        'recipient_user_id' => $memo_user_id,
        'title' => $title,
        'content' => $content,
        'is_read' => 'N',
        'is_active' => 1,
        'created_user' => $SS_NICKNAME,
        'created_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
    );

    $db->insert('user_messages', $insert_values);

    $result_data = [
        "status" => "success",
        "msg" => "sucess"
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;
}

