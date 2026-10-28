<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\permission_group_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "permission_setting";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/user/service/service_permission_group.php");
include("$DOCUMENT_ROOT/admin/user/include/permission_common.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "permission_group_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $user_log_list = new permission_group_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "permission_group_list_body.tpl");

    $tpl->setLoop("T_LOOP", $user_log_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $user_log_list->paging,
        "navigation_text" => $user_log_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "permission_group_write") {
    
    $permission_group_name = $_POST['permission_group_name'] ?? "";
    $permission_group_description = $_POST['permission_group_description'] ?? "";
    $permission_arr  = $_POST['permission'] ?? [];   // 체크된 권한 코드 배열
    
    $db->transactionBegin();

    try {
        
            $insert_values = array(

                'permission_group_name' => $permission_group_name,
                'permission_group_description' => $permission_group_description       
            );

            $db->insert('permission_group', $insert_values);
            $lastInsertId = $db->getLastInsertId();
            
             foreach ($permission_list as $group_label => $items) {
                foreach ($items as $code => $label) {
                    $yn = in_array($code, $permission_arr, true) ? 'Y' : 'N';        
                        
                    $insert_values = array(
                        'permission_group_id' => $lastInsertId,
                        'permission_code' => $code,
                        'permission_yn' => $yn
                    );

                    $db->insert('permission_group_card', $insert_values);
                                
                }
            }
    }
    catch (Exception $e) {

        $db->transactionRollback();

        $result_data = [
            "status" => "fail",
            "msg" => $e->getMessage()

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
    }   
    
     //   $db->transactionRollback();
    $db->transactionCommit();

    $result_data = [
        "status" => "success",
        "msg" => "sucess",

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;     
    
}


if($ac == "permission_group_update") {
    
    $permission_group_id = $_POST['permission_group_id'] ?? "";
    $permission_group_name = $_POST['permission_group_name'] ?? "";
    $permission_group_description = $_POST['permission_group_description'] ?? "";
    $permission_arr  = $_POST['permission'] ?? [];   // 체크된 권한 코드 배열
    
    $db->transactionBegin();

    // 전체를 삭제
    $db->delete('permission_group_card', 'permission_group_id = ' . $permission_group_id);
    
    try {
        
            $update_values = array(

                'permission_group_name' => $permission_group_name,
                'permission_group_description' => $permission_group_description       
            );

            $db->update('permission_group', $update_values, 'permission_group_id = ' . $permission_group_id);
            unset($update_values);
            
             foreach ($permission_list as $group_label => $items) {
                foreach ($items as $code => $label) {
                    $yn = in_array($code, $permission_arr, true) ? 'Y' : 'N';        
                        
                    $insert_values = array(
                        'permission_group_id' => $permission_group_id,
                        'permission_code' => $code,
                        'permission_yn' => $yn
                    );

                    $db->insert('permission_group_card', $insert_values);
                                
                }
            }
    }
    catch (Exception $e) {

        $db->transactionRollback();

        $result_data = [
            "status" => "fail",
            "msg" => $e->getMessage()

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
    }   
    
     //   $db->transactionRollback();
    $db->transactionCommit();

    $result_data = [
        "status" => "success",
        "msg" => "sucess",

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;     
    
}

if($ac == "group_delete") {

    $permission_group_id = $_GET['id'] ?? "";

    $db->delete('permission_group', 'permission_group_id = ' . $permission_group_id);
    $db->delete('permission_group_card', 'permission_group_id = ' . $permission_group_id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
