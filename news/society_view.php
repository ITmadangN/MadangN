<?php

use BearTemplate\BearTemplate;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$id = $_GET["id"];

$sql = "SELECT A.* FROM news A where A.news_id = :id ";

$placeholders = ['id' => $id];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();

$p_news_id = $row->news_id;
$p_report_date  = $row->report_date ;
$p_title = $row->title;
$p_content = $row->content;
$p_reporter_name = $row->reporter_name;
$p_is_manual_input = $row->is_manual_input;
$p_view_count = $row->view_count + 1;

$db->update('news', ['view_count' => $p_view_count], 'news_id = ' . $id);

unset($row);

 $sql = "SELECT * FROM news_images WHERE news_id = ".$p_news_id." AND img_url <> '' order by news_image_id asc";

 $result = $db->query($sql);
 
 $array_img = array();
 
 $i = 0;
 
 $news_img = "/images/blank.png";
 
 $p_content = @str_replace("\n", "<br>", $p_content);
 
 while($row = $db->fetch()) {
     
      $array_img[$i]['img_url'] = $row->img_url;
      $array_img[$i]['can_use'] = $row->can_use;
      
      if($row->can_use == 1) {
       
          
          $temp_img = "<div class=\"mt-1 mb-1\" style=\"text-align:center;\">
                      <img src=\"".$row->img_url."\" data-src=\"".$row->img_url."\" alt=\"#\" data-uc-img=\"loading: lazy\">
                      </div>
          ";
          
           $p_content = str_replace('__IMG'.($i+1).'__' , $temp_img , $p_content);
                    
      }
      else {
           $p_content = str_replace('__IMG'.($i+1).'__' , '' , $p_content);
            
      }

      if($p_is_manual_input == 'Y') {
          
          $img = $define_val->IMG_PROTECT . "?c=news&cc=news&d=img1&s=" . $id;
          
          $temp_img = "<div class=\"mt-1 mb-1\" style=\"text-align:center;\">
                      <img src=\"".$img."\" data-src=\"".$img."\" alt=\"#\" data-uc-img=\"loading: lazy\">
                      </div>
                      ";
                      
          $p_content = $temp_img . $p_content;
          
      }  
                
      $i++;
           
      
 }
           
      
 
$main="1";
$sub="2";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "society_view.tpl");

$tpl->setVar("T_TITLE",$p_title);
$tpl->setVar("T_REPORT_DATE",DATETOSTRING_USA2($p_report_date,"/") . " " . substr($p_report_date,11));
$tpl->setVar("T_REPORTER_NAME",$p_reporter_name);
$tpl->setVar("T_CONTENT",$p_content);

include("$DOCUMENT_ROOT/include/common.php");

$banner_dic = $news_html['BANNER'];

foreach ($banner_dic as $location => $info) {
    
    $imgUrl = $info['img'];
    $linkUrl = $info['link'];

    $tpl->setVar($location."_img",$imgUrl);
    $tpl->setVar($location."_link",$linkUrl);
        
}

$tpl->tprint("main");
