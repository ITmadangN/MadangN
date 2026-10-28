<?php
    
    use BearTemplate\BearTemplate;
    
    function makeRight5Html($db,$define_val) {
        
        $sql = "SELECT A.*, B.media_url FROM realestate_listing A 
                LEFT JOIN realestate_listing_media B
                on A.realestate_listing_id = B.realestate_listing_id            
                -- where A.is_active = 1 and A.property_type = 'Residential'
                where A.is_active = 1
                and A.list_office_key in('3288918','3285640','3286864','5602073')
                and is_primary = 1 and media_type = 'Jpeg' order by Rand() limit 0,25";

        $db->query($sql);
                
        $temp_cnt = 0;
        $loop1 = array();
        
        $row = $db->fetch();
        
        $house_img = "/images/blank.png";             
        if ($row->media_url != "") { 
            
            $house_img = $row->media_url;
            
            switch($row->property_type) {                
                
                case "ManufacturedInPark": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "house_view"; $temp_site_property = "주택"; break;
                case "Residential": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "house_view";  $temp_site_property = "주택"; break;
                case "CommercialLease": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "rent_view";  $temp_site_property = "렌트"; break;
                case "ResidentialLease": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "rent_view"; $temp_list_price_option = " /Monthly";  $temp_site_property = "렌트"; break;
                case "CommercialSale": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "commercial_view";  $temp_site_property = "커머셜"; break;
                case "Land": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "commercial_view";  $temp_site_property = "커머셜"; break;
                case "ResidentialIncome": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "commercial_view";  $temp_site_property = "커머셜"; break;
                case "BusinessOpportunity": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "business_view"; $temp_site_property = "사업체"; break;
                
            }
                                    
            $house_img_link = $temp_php_view . ".php?id=".$row->realestate_listing_id;
        }
                           
        
        while ($row = $db->fetch()) {
        
            switch($row->property_type) {                
                
                case "ManufacturedInPark": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "house_view"; $temp_site_property = "주택"; break;
                case "Residential": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "house_view";  $temp_site_property = "주택"; break;
                case "CommercialLease": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "rent_view";  $temp_site_property = "렌트"; break;
                case "ResidentialLease": $t_3rd = $row->living_area ? number_format($row->living_area,0) . ' SF' : ''; $temp_php_view = "rent_view"; $temp_list_price_option = " /Monthly";  $temp_site_property = "렌트"; break;
                case "CommercialSale": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "commercial_view";  $temp_site_property = "커머셜"; break;
                case "Land": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "commercial_view";  $temp_site_property = "커머셜"; break;
                case "ResidentialIncome": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "commercial_view";  $temp_site_property = "커머셜"; break;
                case "BusinessOpportunity": $t_3rd = $row->building_area_total ? number_format($row->building_area_total,0) . ' SF' : ''; $temp_php_view = "business_view"; $temp_site_property = "사업체"; break;
                
            }
                        
            
            //$link = $this->php_view . ".php?id=".$row->realestate_listing_id;
            $link = $temp_php_view . ".php?id=".$row->realestate_listing_id;
            
            $img = "/images/blank.png";                    
            if ($row->media_url != "") $img = $row->media_url;
               
            $css = "";    
            if($temp_cnt > 0) $css ="uc-grid-margin ";
               
            $loop1[$temp_cnt] = array('T_NUM' => $temp_cnt + 1, 'T_CSS' => $css, 'T_IMG' => $img,  'T_LINK' => $link,  'T_ADDRESS' => $row->unparsed_address . ", " . $row->city . ", " . $row->state_or_province . " " . $row->postal_code);
            
            $temp_cnt++;
        }

        // 배너 삽입
        $banner_dic = makeBanner5($db,$define_val);    
        
        $tpl = new BearTemplate('../include/tpl', false);
        $tpl->setFile("main","right5.tpl");
        $tpl->setVar("R_HOUSE_IMG",$house_img);        
        $tpl->setVar("R_HOUSE_IMG_LINK",$house_img_link);                
        $tpl->setLoop("R5", $loop1);
        
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
    
    function makeBanner5($db,$define_val) {
        
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
                  AND b.banner_type = 'banner_realestate'";
          
                
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