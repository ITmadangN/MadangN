<?php
    
    use BearTemplate\BearTemplate;
    
    function makeRight4Html($db,$define_val) {
                
         $sql = "SELECT A.* FROM towninfo_find_people A where A.is_active = 1
                order by A.towninfo_find_people_id desc
                limit 0,5";

        $db->query($sql);
                
        $temp_cnt = 0;
        $loop1 = array();
        
        while ($row = $db->fetch()) {
            
            $state_code = $row->state_code;
            
            $link = "/towninfo/find_people_view.php?id=".$row->towninfo_find_people_id;
            

            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop1[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => $row->title,  'T_LINK' => $link);
            
            $temp_cnt++;
        }
        
        $sql = "SELECT A.* FROM towninfo_event_notification A where A.is_active = 1
                order by A.towninfo_event_notification_id desc
                limit 0,5";

        $db->query($sql);
                
        $temp_cnt = 0;
        $loop2 = array();
        
        while ($row = $db->fetch()) {            
            
            $link = "/towninfo/notification_view.php?id=".$row->towninfo_event_notification_id;
            
            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop2[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => $row->title,  'T_LINK' => $link);
            
            $temp_cnt++;
        }        
        
        $banner_dic = makeBanner4($db,$define_val);  
        
        $tpl = new BearTemplate('../include/tpl', false);
        $tpl->setFile("main","right4.tpl");
        $tpl->setLoop("R4_1", $loop1);
        $tpl->setLoop("R4_2", $loop2);
        
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
        $return_value['BANNER'] = $banner_dic;
        
        return $return_value;   
        
    }
    
    function makeBanner4($db,$define_val) {
        
        $today = date("Ymd");
        
        $sql = "SELECT b.* 
                FROM ad_banners b
                INNER JOIN ad_payments p 
                   ON p.section_type = 6 
                  AND p.listing_id = b.ad_banner_id
                WHERE {$today} BETWEEN p.start_date AND p.end_date
                  AND b.is_active = 1
                  AND p.is_paid = 'Y'
                  AND b.banner_type = 'banner_town'";
                
        $db->query($sql);
                
        $banner_dic = array();
        
        $img = "/images/blank.png";       
        
        $banner_dic["중앙배너-1"]['img'] = $img;
        $banner_dic["중앙배너-2"]['img'] = $img;        
        $banner_dic["하단_중앙배너"]['img'] = $img;        
        $banner_dic["오른쪽-1"]['img'] = $img;
        $banner_dic["오른쪽-2"]['img'] = $img;        
        $banner_dic["오른쪽-3"]['img'] = $img;        
        $banner_dic["오른쪽-4"]['img'] = $img;        
        $banner_dic["오른쪽-5"]['img'] = $img;        
        $banner_dic["오른쪽-6"]['img'] = $img;        
        $banner_dic["오른쪽-7"]['img'] = $img;        
        $banner_dic["오른쪽-8"]['img'] = $img;        
        $banner_dic["오른쪽-9"]['img'] = $img;        
        $banner_dic["오른쪽-10"]['img'] = $img;  
        
        $banner_dic["중앙배너-1"]['link'] = "";
        $banner_dic["중앙배너-2"]['link'] = "";        
        $banner_dic["하단_중앙배너"]['link'] = "";
        $banner_dic["오른쪽-1"]['link'] = "";        
        $banner_dic["오른쪽-2"]['link'] = "";
        $banner_dic["오른쪽-3"]['link'] = "";
        $banner_dic["오른쪽-4"]['link'] = "";
        $banner_dic["오른쪽-5"]['link'] = "";
        $banner_dic["오른쪽-6"]['link'] = "";
        $banner_dic["오른쪽-7"]['link'] = "";
        $banner_dic["오른쪽-8"]['link'] = "";
        $banner_dic["오른쪽-9"]['link'] = "";
        $banner_dic["오른쪽-10"]['link'] = "";
    
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