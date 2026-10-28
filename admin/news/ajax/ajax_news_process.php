<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
    
use BearTemplate\BearTemplate;
use service\news_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/news/service/service_news.php");

$ac = $_REQUEST['ac'];


if($ac == "news_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_section" => $_GET['s_section'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ? (int)$_GET['s_cnt']: 10,
        "block_set" => 10
    );

    $news_list = new news_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "news_list_body.tpl");

    $tpl->setLoop("T_LOOP", $news_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $news_list->paging,
        "navigation_text" => $news_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "write_news") {


    $title = $_POST['title'] ?? "";
    $content = $_POST['content'] ?? "";
    $section = $_POST['section'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;
    $report_date = $_POST['report_date'] ?? date("Y-m-d H:i:s");
    $sort = $_POST['sort'] ?? '';

   
    $u_image_01_url = GET_UPLOAD_IMAGE($_FILES['image_01_url']['name'], '', '');
    $u_image_02_url = GET_UPLOAD_IMAGE($_FILES['image_02_url']['name'], '', '');
    $u_image_03_url = GET_UPLOAD_IMAGE($_FILES['image_03_url']['name'], '', '');
    
    
    if($sort == "") {
        
        $row_sql = "SELECT max(sort) as  max_sort FROM news where section =:section and DATE_FORMAT(report_date, '%Y-%m-%d') =:report_date";
                                    
        $placeholders = ['section' => $section, 'report_date' => substr($report_date,0,10)];
        $result = $db->query($row_sql, $placeholders);
        $row = $db->fetch();
        
        $sort = intval($row->max_sort) + 10;
        
    }
    else {
        $row_sql = "SELECT count(*) as cnt FROM news where sort =:sort and section =:section and DATE_FORMAT(report_date, '%Y-%m-%d') =:report_date";
                                    
        $placeholders = ['sort' => $sort, 'section' => $section, 'report_date' => substr($report_date,0,10)];
        $result = $db->query($row_sql, $placeholders);
        $row = $db->fetch();
        
        $total = $row->cnt;
       
        
        //$total = $db->selectCount("news", ['*' => 'rowsCount'], ['sort' => $sort, 'section' => $section, "DATE_FORMAT(report_date, '%Y-%m-%d')" => substr($report_date,0,10)],[],true);    
        if($total > 0) {
            
            $result_data = [
            "status" => "fail",
            "msg" => "같은 Sort번호가 있습니다.",
            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
            
        }
    }
    
    $insert_values = array(

        'title' => $title,
        'content' => $content,
        'section' => $section, 
        'is_active' => $is_active,  
        'report_date' => $report_date,
        'reporter_name' => '마당엔',        
        'sort' => $sort,
        'is_manual_input' => 'Y'        
    );

    $db->insert('news', $insert_values);
    $lastInsertId = $db->getLastInsertId();
    
    FILE_UPLOAD("admin","news_files", "news", $lastInsertId, "image_01_url", "img1");
    FILE_UPLOAD("admin","news_files", "news", $lastInsertId, "image_02_url", "img2");
    FILE_UPLOAD("admin","news_files", "news", $lastInsertId, "image_03_url", "img3");
    
    $insert_image_values = array(

        'news_id' => $lastInsertId,
        'img_url' => $u_image_01_url,
        'img_index' => 1,
        'can_use' => 1
    );

    $db->insert('news_images', $insert_image_values);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}


if ($ac == "update_news") {

    $id = $_POST["id"];

    $title = $_POST['title'] ?? "";
    $content = $_POST['content'] ?? "";
    $section = $_POST['section'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;
    $report_date = $_POST['report_date'] ?? date("Y-m-d H:i:s");
    $sort = $_POST['sort'] ?? "";


    $h_image_01_url = $_POST['h_image_01_url'] ?? "";
    $h_image_02_url = $_POST['h_image_02_url'] ?? "";
    $h_image_03_url = $_POST['h_image_03_url'] ?? "";

    $del_image_01_url = $_POST['del_image_01_url'] ?? "";
    $del_image_02_url = $_POST['del_image_02_url'] ?? "";
    $del_image_03_url = $_POST['del_image_03_url'] ?? "";
    
    $u_image_01_url = GET_UPLOAD_IMAGE($_FILES['image_01_url']['name'], $h_image_01_url, $del_image_01_url);
    $u_image_02_url = GET_UPLOAD_IMAGE($_FILES['image_02_url']['name'], $h_image_02_url, $del_image_02_url);
    $u_image_03_url = GET_UPLOAD_IMAGE($_FILES['image_03_url']['name'], $h_image_03_url, $del_image_03_url);
    
     if($sort == "") {
        
        $row_sql = "SELECT max(sort) as max_sort FROM news where section =:section and DATE_FORMAT(report_date, '%Y-%m-%d') =:report_date";
                                    
        $placeholders = ['section' => $section, 'report_date' => substr($report_date,0,10)];
        $result = $db->query($row_sql, $placeholders);
        $row = $db->fetch();
        
        $sort = intval($row->max_sort) + 10;
        
    }
    else {
                                                                                                                                  
        $row_sql = "SELECT count(*) as cnt FROM news where news_id <>:news_id and sort =:sort and section =:section and DATE_FORMAT(report_date, '%Y-%m-%d') =:report_date";
                                    
        $placeholders = ['news_id' => $id, 'sort' => $sort, 'section' => $section, 'report_date' => substr($report_date,0,10)];
        $result = $db->query($row_sql, $placeholders);
        $row = $db->fetch();
        
        $total = $row->cnt;
        
        // $total = $db->selectCount("news", ['*' => 'rowsCount'], ['news_id <>' => $id, 'sort' => $sort, 'section' => $section, 'DATE(report_date]' => substr($report_date,0,10)]);
        if($total > 0) {
            
            $result_data = [
            "status" => "fail",
            "msg" => "같은 Sort번호가 있습니다.",
            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
            
        }
        
    }



    $update_values = array(

        'title' => $title,
        'content' => $content,
        'section' => $section,   
        'report_date' => $report_date,  
        'sort' => $sort,        
        'is_active' => $is_active        
    );

    $db->update('news', $update_values, 'news_id = ' . $id);

    FILE_UPLOAD("admin","news_files", "news", $id, "image_01_url", "img1");
    FILE_UPLOAD("admin","news_files", "news", $id, "image_02_url", "img2");
    FILE_UPLOAD("admin","news_files", "news", $id, "image_03_url", "img3");
    
    $update_image_values = array(

        'img_url' => $u_image_01_url

    );

    if($u_image_01_url != "") $result = $db->update('news_images', $update_image_values, 'news_id = ' . $id);    
   
   /*
    if($result == false) {
        
        $insert_image_values = array(

            'news_id' => $id,
            'img_url' => $u_image_01_url,
            'can_use' => 1
        );

        $db->insert('news_images', $insert_image_values);
    }
    */
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);


}


if($ac == "news_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('news', 'news_id = ' . $id);
    $db->delete('news_images', 'news_id = ' . $id);
    FILE_DELETE("admin","news_files", "news", $id, "img1");
    FILE_DELETE("admin","news_files", "news", $id, "img2");
    FILE_DELETE("admin","news_files", "news", $id, "img3");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
   