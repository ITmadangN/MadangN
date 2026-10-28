<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use user_service\memo_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/member/service/service_memo.php");

$ac = $_REQUEST['ac'];

if($ac == "memo_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_type" => $_GET['s_type'] ?? "",
        'recipient_user_id' => $SS_ID,
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10
    );

    $memo_list = new memo_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "memo_body.tpl");
    $tpl->setLoop("T_LOOP", $memo_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);


    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $memo_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if($ac == "memo_write") {
    
    $title = $_POST['title'] ?? "";
    $content = $_POST['content'] ?? "";
    $user_nickname = $_POST['user_nickname'] ?? "";


    $sql = "SELECT A.* FROM users A where A.user_nickname = :user_nickname";

    $placeholders = ['user_nickname' => $user_nickname];

    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    if (empty($row)) {
    
         $result_data = [
            "status" => "fail",
            "msg" => "닉네임에 해당하는 아이디가 없습니다.",
            ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            
        exit;
    }

    
        
    $insert_values = array(   
        'user_messages_id' => null, 
        'sender_user_id' => $SS_ID,
        'recipient_user_id' => $row->user_id,
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
            "msg" => "",
            ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        
    exit;

}


if($ac == "memo_delete") {

    $id = $_GET['id'] ?? 0;

    // 실제 삭제 하지 않음
    $update_values = array(
        'is_active' => 0
    );

    $db->update("user_messages", $update_values, "user_messages_id  = " . $id);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}


if($ac == "memo_view") {

    $id = $_GET['id'] ?? 0;

    // $sql = "SELECT A.* FROM user_messages A where A.user_messages_id = :user_messages_id and A.is_active = 1 and (recipient_user_id = :recipient_user_id or sender_user_id  =:sender_user_id) ";
    $sql = "SELECT A.*, B.user_nickname FROM user_messages A 
                left join users B
                on (A.recipient_user_id = B.user_id or  A.sender_user_id = B.user_id )
                where A.user_messages_id = :user_messages_id and A.is_active = 1 and (A.recipient_user_id = :recipient_user_id or A.sender_user_id  =:sender_user_id) ";


    $placeholders = ['user_messages_id' => $id, 'recipient_user_id' => $SS_ID, 'sender_user_id' => $SS_ID];

    $result = $db->query($sql, $placeholders);

    $row = $db->fetch();
    
    if(!$row) {
        $nickname = "";
        $title = "";
        $content = "";
    }
    else {
        if($row->recipient_user_id == $SS_ID)  $nickname = "보낸사람 : " . $row->user_nickname;
        else $nickname = "받는사람 : " . $row->user_nickname;
        $title = $row->title;
        $content = @str_replace("\n", "<br>", $row->content);
    }

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" =>
            array("nickname" => $nickname, "title" => $title, "content" => $content)
        )
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}