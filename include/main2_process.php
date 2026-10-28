<?php
    
    use BearTemplate\BearTemplate;
    
    function makeRight2Html($db,$define_val) {
        
        $sql = "SELECT B.*, A.youtube_featured_videos_id, A.category_1, A.category_2 FROM youtube_featured_videos A 
                left join youtube_channel_featured_videos B on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id 
                where A.is_active = 1 
                and A.category_2 = 'miburi'
                order by view_count desc
                limit 0,16";

        $db->query($sql);
        
        $row = $db->fetch();
        
        $miburi_img = "/images/blank.png";             
        if ($row->hight_image != "") $miburi_img = $row->hight_image;
        
        $miburi_video_id = $row->video_id;
                
        $temp_cnt = 0;
        $loop1 = array();
        
        while ($row = $db->fetch()) {
            
            $video_id = $row->video_id;
            

            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop1[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => TRUNCATE_TITLE($row->history_title,48),  'T_VIDEO_ID' =>$video_id);
            
            $temp_cnt++;
        }
                
        $sql = "SELECT B.*, A.youtube_featured_videos_id, A.category_1, A.category_2 FROM youtube_featured_videos A 
                left join youtube_channel_featured_videos B on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id 
                where A.is_active = 1 
                and A.category_2 = 'nowusa'
                order by view_count desc
                limit 0,16";

        $db->query($sql);
        
        $row = $db->fetch();
        
        $nowusa_img = "/images/blank.png";             
        if ($row->hight_image != "") $nowusa_img = $row->hight_image;
        
        $nowusa_video_id = $row->video_id;
                
        $temp_cnt = 0;
        $loop2 = array();
        
        while ($row = $db->fetch()) {
            
            $video_id = $row->video_id;

            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop2[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_TITLE' => TRUNCATE_TITLE($row->history_title,48),  'T_VIDEO_ID' => $video_id);
            
            $temp_cnt++;
        }
                
        // 배너 삽입
        $banner_dic = makeBanner2($db,$define_val);  
        
        $tpl = new BearTemplate('../include/tpl', false);
        $tpl->setFile("main","right2.tpl");
        $tpl->setVar("MIBURI_IMG", $miburi_img);
        $tpl->setVar("MIBURI_VIDEO_ID", $miburi_video_id);
        $tpl->setLoop("R2_1", $loop1);
        $tpl->setVar("NOWUSA_IMG", $nowusa_img);
        $tpl->setVar("NOWUSA_VIDEO_ID", $nowusa_video_id);
        $tpl->setLoop("R2_2", $loop2);
        
        foreach ($banner_dic as $location => $info) {
    
            $imgUrl = $info['img'];
            $linkUrl = $info['link'];

            $tpl->setVar($location."_img",$imgUrl);
            $tpl->setVar($location."_link",$linkUrl);
        
        }
        
        $tpl->tprint("main");
        $right_html = $tpl->content;
        unset($tpl);             
        
        return $right_html;   
        
    }
    
    function makeBanner2($db,$define_val) {
        
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
                  AND b.banner_type = 'banner_youtube'";
          
                
        $db->query($sql);
                
        $banner_dic = array();
        
        $img = "/images/blank.png";       
        
        $banner_dic["오른쪽-1"]['img'] = $img;        
        $banner_dic["오른쪽-2"]['img'] = $img;        
        $banner_dic["오른쪽-3"]['img'] = $img;        
        $banner_dic["오른쪽-4"]['img'] = $img;        
        $banner_dic["오른쪽-5"]['img'] = $img;        
        $banner_dic["오른쪽-6"]['img'] = $img;        
        
        $banner_dic["오른쪽-1"]['link'] = "";        
        $banner_dic["오른쪽-2"]['link'] = "";
        $banner_dic["오른쪽-3"]['link'] = "";
        $banner_dic["오른쪽-4"]['link'] = "";
        $banner_dic["오른쪽-5"]['link'] = "";
        $banner_dic["오른쪽-6"]['link'] = "";
    
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