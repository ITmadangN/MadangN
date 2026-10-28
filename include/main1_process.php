<?php
    
    use BearTemplate\BearTemplate;
    
    function makeRight1Html($db, $define_val, $cut_str=48) {
        
        global $page;
        
        if($page == "index") $cut_str = 40;
        
        $sql = "SELECT A.* FROM news A where A.is_active = 1 and A.can_use = 1
                order by view_count desc
                limit 0,15";

        $db->query($sql);
        
        $temp_cnt = 0;
        $loop1 = array();
        
        while ($row = $db->fetch()) {
            
            switch($row->section) {
               case "so" : $view = "society_view"; break;
               case "lo" : $view = "global_view"; break;
               case "pe" : $view = "political_economy_view"; break;
               case "en" : $view = "entertainment_view"; break;
               case "st" : $view = "sports_view"; break;
               
           }
        
            $link = "/news/".$view.".php?id=" . $row->news_id;
        
            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            
            $loop1[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => TRUNCATE_TITLE($row->title,$cut_str),  'T_LINK' =>$link);
            
            $temp_cnt++;
        }
              
        $sql = "SELECT A.* FROM news A where A.is_active = 1 and A.can_use = 1
                order by report_date desc
                limit 0,15";

        $db->query($sql);
        
        $temp_cnt = 0;
        $loop2 = array();
        
        while ($row = $db->fetch()) {
            
            switch($row->section) {
               case "so" : $view = "society_view"; break;
               case "lo" : $view = "global_view"; break;
               case "pe" : $view = "political_economy_view"; break;
               case "en" : $view = "entertainment_view"; break;
               case "st" : $view = "sports_view"; break;
               
           }
        
            $link = "/news/".$view.".php?id=" . $row->news_id;
        
            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop2[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => TRUNCATE_TITLE($row->title,$cut_str),  'T_LINK' =>$link);
            
            $temp_cnt++;
        }
                              
        $sql = "SELECT A.* FROM news A where A.is_active = 1 and A.can_use = 1 and section = 'lo'
                order by report_date desc
                limit 0,5";

        $db->query($sql);
        
        $temp_cnt = 0;
        $loop3 = array();
        $data = array();
         
        while ($row = $db->fetch()) {
            
            switch($row->section) {
               case "so" : $view = "society_view"; break;
               case "lo" : $view = "global_view"; break;
               case "pe" : $view = "political_economy_view"; break;
               case "en" : $view = "entertainment_view"; break;
               case "st" : $view = "sports_view"; break;
               
           }
        
            $link = "/news/".$view.".php?id=" . $row->news_id;
        
            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
                              
        
           $data[$temp_cnt] = array('id' => $row->news_id, 'css' => $css, 'link' => $link, 'title' => $row->title, 'is_manual_input' => $row->is_manual_input);

           $temp_cnt++;
           
        }
        
        $temp_cnt = 0;
        
        for ($i = 0; $i < count($data); $i++) {
            
            
            $id = $data[$i]['id'];
            $link = $data[$i]['link'];
            $title = $data[$i]['title'];            
            $css = $data[$i]['css'];  
            $is_manual_input = $data[$i]['is_manual_input'];
             
            $sql = "SELECT img_url FROM news_images WHERE can_use = 1 AND news_id = ".$id." AND img_url <> '' order by news_image_id asc limit 0,1";
            
            $row = $db->queryRow($sql, []);
            $image_url = $row->img_url;
            
            // 무조건 이미지 있는것만 사용
            if($image_url == '' || strpos($image_url, 'www.youtube.com') !== false) continue;
            
            $news_img = "/images/blank.png";
            if ($image_url != "") $news_img = $image_url;
            
            if($is_manual_input == 'Y') $news_img = $define_val->IMG_PROTECT . "?c=news&cc=news&d=img1&s=" . $id."&t=".time();
               
            $loop3[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_IMG' => $news_img, 'T_TITLE' => $title,  'T_LINK' =>$link);
            
            $temp_cnt++;
        }
        
        // 배너 삽입
        $banner_dic = makeBanner1($db,$define_val);    
                
        
        $tpl = new BearTemplate('../include/tpl', false);
        $tpl->setFile("main","right1.tpl");
        $tpl->setLoop("R1_1", $loop1);
        $tpl->setLoop("R1_2", $loop2);
        $tpl->setLoop("R1_3", $loop3);
        
        foreach ($banner_dic as $location => $info) {
    
            $imgUrl = $info['img'];
            $linkUrl = $info['link'];

            $tpl->setVar($location."_img",$imgUrl);
            $tpl->setVar($location."_link",$linkUrl);
        
        }
        
        $tpl->tprint("main");
        $right_html = $tpl->content;
        unset($tpl);                    
        
        $return_value['html'] = $right_html;
        $return_value['R1_1'] = $loop1;
        $return_value['R1_2'] = $loop2;
        $return_value['R1_3'] = $loop3;
        $return_value['BANNER'] = $banner_dic;
        
        return $return_value;   
        
    }
    
    function makeBanner1($db,$define_val) {
        
        $today = date("Ymd");
        
        $sql = "SELECT b.* 
                FROM ad_banners b
                INNER JOIN ad_payments p 
                   ON p.section_type = 6 
                  AND p.listing_id = b.ad_banner_id
                WHERE {$today} BETWEEN p.start_date AND p.end_date
                  AND b.is_active = 1
                  AND p.is_paid = 'Y'
                  AND b.is_approved = 1
                  AND b.has_active_advertisement = 1
                  AND (b.banner_type = 'banner_newshome' or b.banner_type = 'banner_news')"; 
          
                
        $db->query($sql);
                
        $banner_dic = array();
        
        $img = "/images/blank.png";       
        
        $banner_dic["왼쪽상단"]['img'] = $img;
        $banner_dic["오른쪽상단"]['img'] = $img;
        $banner_dic["중앙긴배너"]['img'] = $img;
        $banner_dic["중앙배너"]['img'] = $img;
        $banner_dic["하단_중앙배너"]['img'] = $img;
        $banner_dic["오른쪽-1"]['img'] = $img;
        $banner_dic["오른쪽-2"]['img'] = $img;
        $banner_dic["오른쪽-3"]['img'] = $img;
        $banner_dic["오른쪽-4"]['img'] = $img;
        $banner_dic["오른쪽-5"]['img'] = $img;
        $banner_dic["오른쪽-6"]['img'] = $img;
        $banner_dic["상단-1"]['img'] = $img;
        $banner_dic["상단-2"]['img'] = $img;
        $banner_dic["상단-3"]['img'] = $img;
        $banner_dic["하단중앙"]['img'] = $img;
        
        $banner_dic["왼쪽상단"]['link'] = '';
        $banner_dic["오른쪽상단"]['link'] = '';
        $banner_dic["중앙긴배너"]['link'] = '';
        $banner_dic["중앙배너"]['link'] = '';
        $banner_dic["하단_중앙배너"]['link'] = '';
        $banner_dic["오른쪽-1"]['link'] = '';
        $banner_dic["오른쪽-2"]['link'] = '';
        $banner_dic["오른쪽-3"]['link'] = '';
        $banner_dic["오른쪽-4"]['link'] = '';
        $banner_dic["오른쪽-5"]['link'] = '';
        $banner_dic["오른쪽-6"]['link'] = '';
        $banner_dic["상단-1"]['link'] = '';
        $banner_dic["상단-2"]['link'] = '';
        $banner_dic["상단-3"]['link'] = '';
        $banner_dic["하단중앙"]['link'] = '';        
    
        while ($row = $db->fetch()) {
        
            $banner_location = $row->banner_location;
            $main_image_url = $row->main_image_url;
            $link_url = $row->link_url;
                       
            if ($main_image_url != "") $main_img = $define_val->IMG_PROTECT ."?c=banner&cc=banner&d=main&s=".$row->ad_banner_id."&t=".time();
            else $main_img = $img;
                          
            $banner_dic[$banner_location]['img'] = $main_img;
            $banner_dic[$banner_location]['link'] = $link_url;
            
        }

        return $banner_dic;
        
    }