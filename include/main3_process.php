<?php
    
    use BearTemplate\BearTemplate;
    
    function makeRight3Html($db, $define_val) {
        
        $sql = "SELECT A.* FROM community_recruit_listings A where A.is_active = 1
                and ad_company_id > 0
                order by community_recruit_listings_id desc
                limit 0,7";

        $db->query($sql);
                
        $temp_cnt = 0;
        $loop1 = array();
        
        while ($row = $db->fetch()) {
            
            $state_code = $row->state_code;
            
            $link = "/community/recruit_view.php?id={$row->community_recruit_listings_id}&sid=";
            

            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop1[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => $row->title,  'T_LINK' => $link);
            
            $temp_cnt++;
        }
                
        $sql = "SELECT A.* FROM community_marketplace_listings A where A.is_active = 1 and listing_type = 'market'
                and A.is_active = 1
                order by community_marketplace_listings_id desc
                limit 0,8";

        $db->query($sql);
                
        $temp_cnt = 0;
        $loop2 = array();
        
        while ($row = $db->fetch()) {
            
            $state_code = $row->state_code;
            
            $link = "/community/market_view.php?id={$row->community_marketplace_listings_id}&lt=market&s=";
            

            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop2[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => $row->title,  'T_LINK' => $link);
            
            $temp_cnt++;
        }
        
        $sql = "SELECT A.* FROM community_marketplace_listings A where A.is_active = 1 and listing_type = 'msale'
                and A.is_active = 1
                order by community_marketplace_listings_id desc
                limit 0,4";

        $db->query($sql);
                
        $temp_cnt = 0;
        $loop3 = array();
        
        while ($row = $db->fetch()) {            
            
            $link = "/community/market_view.php?id={$row->community_marketplace_listings_id}&lt=msale&s=";
            
            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
            
            $blank_img = "/images/blank.png";
            if($row->image_01_url != "" ) $img1 = $define_val->IMG_PROTECT ."?c=community&cc=market&d=img1&s=".$row->community_marketplace_listings_id."&t=".time();
            else $img1 = $blank_img;
               
            $loop3[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_IMG' => $img1, 'T_TITLE' => $row->title,  'T_LINK' => $link);
            
            $temp_cnt++;
        }        
        
        $banner_dic = makeBanner3($db,$define_val);  
        
        $tpl = new BearTemplate('../include/tpl', false);
        $tpl->setFile("main","right3.tpl");
        $tpl->setLoop("R3_1", $loop1);
        $tpl->setLoop("R3_2", $loop2);
        $tpl->setLoop("R3_3", $loop3);
        
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
    
    function makeBanner3($db,$define_val) {
        
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
                  AND b.banner_type = 'banner_community'";
                
        $db->query($sql);
                
        $banner_dic = array();
        
        $img = "/images/blank.png";       
        
        $banner_dic["중앙배너-1"]['img'] = $img;
        $banner_dic["중앙배너-2"]['img'] = $img;
        $banner_dic["중앙배너-3"]['img'] = $img;
        $banner_dic["큰_중앙배너"]['img'] = $img;
        $banner_dic["중앙배너-4"]['img'] = $img;
        $banner_dic["중앙배너-5"]['img'] = $img;
        $banner_dic["중앙배너-6"]['img'] = $img;
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
        $banner_dic["중앙배너-3"]['link'] = "";
        $banner_dic["큰_중앙배너"]['link'] = "";
        $banner_dic["중앙배너-4"]['link'] = "";
        $banner_dic["중앙배너-5"]['link'] = "";
        $banner_dic["중앙배너-6"]['link'] = "";
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