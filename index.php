<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


use BearTemplate\BearTemplate;
use user_service\service_news_list;

use user_service\recruit_list;
use user_service\business_list;
use user_service\vehicle_list;
use user_service\vehicle_dealer_html;
use user_service\market_list;
use user_service\realestate_list_index;
use user_service\agent_list;
use user_service\service_notification_list;
use youtube_index\youtube_index;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/main1_process.php");
include("$DOCUMENT_ROOT/news/service/service_news_list.php");
include("$DOCUMENT_ROOT/community/service/service_recruit.php");
include("$DOCUMENT_ROOT/community/service/service_business.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle_dealer_html.php");
include("$DOCUMENT_ROOT/community/service/service_market.php");
include("$DOCUMENT_ROOT/realestate/service/service_realestate_index.php");
include("$DOCUMENT_ROOT/realestate/service/service_agent.php");
include("$DOCUMENT_ROOT/towninfo/service/service_notification_list.php");
include("$DOCUMENT_ROOT/youtube/service/index.php");

function makeBannerHome($db,$define_val) {
        
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
                  AND (b.banner_type = 'banner_home')";
//    saveLog(" sql : ",$sql);
        $db->query($sql);
                
        $banner_dic = array();
        
        $img = "/images/blank.png";       
        
        $banner_dic["왼쪽_세로배너-1"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-2"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-3"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-4"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-5"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-6"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-7"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-8"]['img'] = $img;
        $banner_dic["왼쪽_세로배너-9"]['img'] = $img;
        
        $banner_dic["중앙배너"]['img'] = $img;
        $banner_dic["중앙_작은_배너-1"]['img'] = $img;
        $banner_dic["중앙_작은_배너-2"]['img'] = $img;
        
        $banner_dic["오른쪽_세로배너-1"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-2"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-3"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-4"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-5"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-6"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-7"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-8"]['img'] = $img;
        $banner_dic["오른쪽_세로배너-9"]['img'] = $img;
        
        $banner_dic["오른쪽-1"]['img'] = $img;
        $banner_dic["오른쪽-1-1"]['img'] = $img;
        $banner_dic["오른쪽-1-2"]['img'] = $img;
        $banner_dic["오른쪽-2"]['img'] = $img;
        $banner_dic["오른쪽-2-1"]['img'] = $img;
        $banner_dic["오른쪽-2-2"]['img'] = $img;
        $banner_dic["오른쪽-3"]['img'] = $img;
        $banner_dic["오른쪽-4"]['img'] = $img;
        $banner_dic["오른쪽-5"]['img'] = $img;
        $banner_dic["오른쪽-6"]['img'] = $img;
        $banner_dic["오른쪽-7"]['img'] = $img;
        $banner_dic["오른쪽-8"]['img'] = $img;
        $banner_dic["오른쪽-9"]['img'] = $img;
        
        $banner_dic["왼쪽_세로배너-1"]['link'] = '';
        $banner_dic["왼쪽_세로배너-2"]['link'] = '';
        $banner_dic["왼쪽_세로배너-3"]['link'] = '';
        $banner_dic["왼쪽_세로배너-4"]['link'] = '';
        $banner_dic["왼쪽_세로배너-5"]['link'] = '';
        $banner_dic["왼쪽_세로배너-6"]['link'] = '';
        $banner_dic["왼쪽_세로배너-7"]['link'] = '';
        $banner_dic["왼쪽_세로배너-8"]['link'] = '';
        $banner_dic["왼쪽_세로배너-9"]['link'] = '';
        
        $banner_dic["중앙배너"]['link'] = '';
        $banner_dic["중앙_작은_배너-1"]['link'] = '';
        $banner_dic["중앙_작은_배너-2"]['link'] = '';
        
        $banner_dic["오른쪽_세로배너-1"]['link'] = '';
        $banner_dic["오른쪽_세로배너-2"]['link'] = '';
        $banner_dic["오른쪽_세로배너-3"]['link'] = '';
        $banner_dic["오른쪽_세로배너-4"]['link'] = '';
        $banner_dic["오른쪽_세로배너-5"]['link'] = '';
        $banner_dic["오른쪽_세로배너-6"]['link'] = '';
        $banner_dic["오른쪽_세로배너-7"]['link'] = '';
        $banner_dic["오른쪽_세로배너-8"]['link'] = '';
        $banner_dic["오른쪽_세로배너-9"]['link'] = '';
        
        $banner_dic["오른쪽-1"]['link'] = '';
        $banner_dic["오른쪽-1-1"]['link'] = '';
        $banner_dic["오른쪽-1-2"]['link'] = '';
        $banner_dic["오른쪽-2"]['link'] = '';
        $banner_dic["오른쪽-2-1"]['link'] = '';
        $banner_dic["오른쪽-2-2"]['link'] = '';
        $banner_dic["오른쪽-3"]['link'] = '';
        $banner_dic["오른쪽-4"]['link'] = '';
        $banner_dic["오른쪽-5"]['link'] = '';
        $banner_dic["오른쪽-6"]['link'] = '';
        $banner_dic["오른쪽-7"]['link'] = '';
        $banner_dic["오른쪽-8"]['link'] = '';
        $banner_dic["오른쪽-9"]['link'] = '';
    
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
    
function make_realestate_html($db,$define_val,$page_set)  {
    
    $fn_params = array(
        "page" => 1,
        's_menu' => "",
        "s_property_type" => "",
        "s_property_sub_type" => "",
        "s_state_code" => "",
        "s_city_name" => "",
        "s_listing_price_start" => "",
        "s_listing_price_end" => "",
        "s_bedrooms_total" => "",        
        "s_bathrooms_total" => "",        
        "agent_key"  => "",        
        "office_key"  => "",        
        "php_view" => "",
        "page_set" => $page_set,
        "block_set" => 10,
        "random" => 'N',
        "s_nynj" => ''
        
    );

    $realestate_list = new realestate_list_index($db, $define_val, $fn_params);

    return [$realestate_list->loop_house, $realestate_list->loop_rent, $realestate_list->loop_commercial, $realestate_list->loop_business];
}

// 뉴스

$fn_params = array(
    "page" => 1,
    "section" => 'so',
    "s_kind" => '',
    "s_keyword" => '',        
    "page_set" => 30,
    "block_set" => 10,
    "random" => 'Y',
    "report_date" => '',
    "image" => 'Y'
    
);

$so_list = new service_news_list($db, $define_val, $fn_params);

$fn_params['section'] = 'pe';
$pe_list = new service_news_list($db, $define_val, $fn_params);    

$fn_params['section'] = 'en';
$fn_params['page_set'] = 5;
$en_list = new service_news_list($db, $define_val, $fn_params);    

$fn_params['section'] = 'st';
$fn_params['page_set'] = 9;
$st_list = new service_news_list($db, $define_val, $fn_params);    

$fn_params['section'] = 'lo';
$lo_list = new service_news_list($db, $define_val, $fn_params); 

$news_html = makeRight1Html($db,$define_val);

// 커뮤니티
$fn_params = array(
	"page" => 1,
	's_job_type' => '',
	"s_state_code" => "",
	"s_city_name" => "",
	"s_kind" => "",
	"s_keyword" => "",
	"page_set" =>  4,
	"block_set" => 10,
	"random" => 'Y',
	"s_nynj" => ''
	);

$recruit_list = new recruit_list($db, $define_val, $fn_params);

$fn_params = array(
	"page" => 1,
	"s_business_type" => "",
	"s_state_code" => "",
	"s_city_name" => "",
	"s_kind" => "",
	"s_keyword" => "",
	"page_set" => 5,
	"block_set" => 10,
	"random" => 'Y'
);

$business_list = new business_list($db, $define_val, $fn_params);

$fn_params = array(
	'dealer_id' => "",
	'regular_html_yn' => "",
	'tab_type' => "2",
	'preview' => ''
);

[$house_loop, $rent_loop, $commercial_loop, $business_loop] = make_realestate_html($db,$define_val, 1);


$fn_params = array(
        "page" => 1,
        "s_office_name" => "",
        "s_agent_full_name" => "",
        "s_kind" => "",
        "s_keyword" => "",
        "page_set" =>  10,
        "block_set" => 10,
        "random" => 'Y'
    );
    
$agent_list = new agent_list($db, $define_val, $fn_params);

$fn_params = array(
	"page" => $_GET['page'] ?? 1,
	"s_state_code" => $_GET['s_state_code'] ?? "",
	"s_city_name" => $_GET['s_city_name'] ?? "",
	"s_car_maker" => $_GET['s_car_maker'] ?? "",
	"s_min_car_year" => $_GET['s_min_car_year'] ?? "",
    "s_max_car_year" => $_GET['s_max_car_year'] ?? "",
	"s_community_car_dealers_id" => $_GET['s_community_car_dealers_id'] ?? "",
	"s_listing_price_start" => $_GET['s_listing_price_start'] ?? "",
	"s_listing_price_end" => $_GET['s_listing_price_end'] ?? "",
	"s_car_mileage_start" => $_GET['s_car_mileage_start'] ?? "",
	"s_car_mileage_end" => $_GET['s_car_mileage_end'] ?? "",
	"s_kind" => $_GET['s_kind'] ?? "",
	"s_keyword" => $_GET['s_keyword'] ?? "",
	"page_set" =>  5,
	"block_set" => 10
);

	
$vehicle_list = new vehicle_list($db, $define_val, $fn_params);

$fn_params = array(
	"page" =>  1,
	"s_listing_type" => "market",
	"s_marketplace_type" => "",
	"s_state_code" => "",
	"s_city_name" => "",
	"s_kind" => "",
	"s_keyword" => "",
	"page_set" =>  10,
	"block_set" => 10
);


$fn_params = array(
        "page" => 1,
        "s_category" => "",
        "s_kind" => "",
        "s_keyword" => "",
        "page_set" =>  8,        
        "block_set" => 10
    );
    
$notification_list = new service_notification_list($db, $define_val, $fn_params);

$youtube_home = new youtube_index($db, $define_val,'Y');

$row_sql = "SELECT A.* FROM community_car_dealers A where A.is_active = 1 and A.has_active_advertisement = 1 and A.is_approved =1";
        
$row_sql .= " order by A.community_car_dealers_id asc limit 0,7";

$db->query($row_sql);

$dealer_loop = array();
$i = 0;

while ($row = $db->fetch()) {

    $blank_img = "/images/blank.png";
    if($row->logo_url != "" ) {
        $logo_img = $define_val->IMG_PROTECT ."?c=community&cc=vehicle_dealer&d=logo&s=".$row->community_car_dealers_id;
    }
    else {
        $logo_img = $blank_img;
    }            

    $link = "/community/vehicle_dealer.php?dealer_id=".$row->community_car_dealers_id;            
    
    $dealer_loop[$i] = array('T_LINK' => $link, 'T_IMG' => $logo_img, 'T_COMPANY_NAME' => $row->company_name, 'T_NAME' => $row->contact_name);
    
    $i++;


}
 

$main=3;
$sub=1;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "index.tpl");

// 뉴스 큰 사진
$tpl->setVar("TOP_1_IMG",$pe_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_1_TITLE",$pe_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_1_CONTENT",TRUNCATE_TITLE($pe_list->loop[0]['T_CONTENT'],250));
$tpl->setVar("TOP_1_LINK",$pe_list->loop[0]['T_LINK']);

$tpl->setVar("TOP_3_IMG",$pe_list->loop[2]['T_IMG']);
$tpl->setVar("TOP_3_TITLE",$pe_list->loop[2]['T_TITLE']);
$tpl->setVar("TOP_3_LINK",$pe_list->loop[2]['T_LINK']);
$tpl->setVar("TOP_3_DATE",$pe_list->loop[2]['T_REPORT_DATE']);

$tpl->setVar("TOP_4_IMG",$st_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_4_TITLE",$st_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_4_LINK",$st_list->loop[0]['T_LINK']);
$tpl->setVar("TOP_4_DATE",$st_list->loop[0]['T_REPORT_DATE']);

$tpl->setVar("TOP_5_IMG",$so_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_5_TITLE",$so_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_5_LINK",$so_list->loop[0]['T_LINK']);
$tpl->setVar("TOP_5_DATE",$so_list->loop[0]['T_REPORT_DATE']);

$tpl->setVar("TOP_6_IMG",$lo_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_6_TITLE",$lo_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_6_LINK",$lo_list->loop[0]['T_LINK']);
$tpl->setVar("TOP_6_DATE",$lo_list->loop[0]['T_REPORT_DATE']);

$tpl->setVar("TOP_7_IMG",$en_list->loop[0]['T_IMG']);
$tpl->setVar("TOP_7_TITLE",$en_list->loop[0]['T_TITLE']);
$tpl->setVar("TOP_7_LINK",$en_list->loop[0]['T_LINK']);
$tpl->setVar("TOP_7_DATE",$en_list->loop[0]['T_REPORT_DATE']);

// 중앙 - 정치 경제
$tpl->setVar("MIDDLE_2_1_IMG",$pe_list->loop[6]['T_IMG']);
$tpl->setVar("MIDDLE_2_1_REPORTER_NAME",$pe_list->loop[6]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_2_1_TITLE",$pe_list->loop[6]['T_TITLE']);
$tpl->setVar("MIDDLE_2_1_LINK",$pe_list->loop[6]['T_LINK']);
$tpl->setVar("MIDDLE_2_1_LINK",$pe_list->loop[6]['T_LINK']);
$tpl->setVar("MIDDLE_2_1_DATE",$pe_list->loop[6]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_2_2_IMG",$pe_list->loop[7]['T_IMG']);
$tpl->setVar("MIDDLE_2_2_REPORTER_NAME",$pe_list->loop[7]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_2_2_TITLE",$pe_list->loop[7]['T_TITLE']);
$tpl->setVar("MIDDLE_2_2_LINK",$pe_list->loop[7]['T_LINK']);
$tpl->setVar("MIDDLE_2_2_DATE",$pe_list->loop[7]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_2_3_TITLE",$pe_list->loop[8]['T_TITLE']);
$tpl->setVar("MIDDLE_2_3_LINK",$pe_list->loop[8]['T_LINK']);

$tpl->setVar("MIDDLE_2_4_TITLE",$pe_list->loop[9]['T_TITLE']);
$tpl->setVar("MIDDLE_2_4_LINK",$pe_list->loop[9]['T_LINK']);

$tpl->setVar("MIDDLE_2_5_TITLE",$pe_list->loop[10]['T_TITLE']);
$tpl->setVar("MIDDLE_2_5_LINK",$pe_list->loop[10]['T_LINK']);

$tpl->setVar("MIDDLE_2_6_TITLE",$pe_list->loop[11]['T_TITLE']);
$tpl->setVar("MIDDLE_2_6_LINK",$pe_list->loop[11]['T_LINK']);


// 세계뉴스
$tpl->setVar("MIDDLE_3_1_IMG",$lo_list->loop[1]['T_IMG']);
$tpl->setVar("MIDDLE_3_1_REPORTER_NAME",$lo_list->loop[1]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_3_1_TITLE",$lo_list->loop[1]['T_TITLE']);
$tpl->setVar("MIDDLE_3_1_LINK",$lo_list->loop[1]['T_LINK']);
$tpl->setVar("MIDDLE_3_1_LINK",$lo_list->loop[1]['T_LINK']);
$tpl->setVar("MIDDLE_3_1_DATE",$lo_list->loop[1]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_3_2_IMG",$lo_list->loop[2]['T_IMG']);
$tpl->setVar("MIDDLE_3_2_REPORTER_NAME",$lo_list->loop[2]['T_REPORTER_NAME']);
$tpl->setVar("MIDDLE_3_2_TITLE",$lo_list->loop[2]['T_TITLE']);
$tpl->setVar("MIDDLE_3_2_LINK",$lo_list->loop[2]['T_LINK']);
$tpl->setVar("MIDDLE_3_2_DATE",$lo_list->loop[2]['T_REPORT_DATE']);

$tpl->setVar("MIDDLE_3_3_TITLE",$lo_list->loop[3]['T_TITLE']);
$tpl->setVar("MIDDLE_3_3_LINK",$lo_list->loop[3]['T_LINK']);

$tpl->setVar("MIDDLE_3_4_TITLE",$lo_list->loop[4]['T_TITLE']);
$tpl->setVar("MIDDLE_3_4_LINK",$lo_list->loop[4]['T_LINK']);

$tpl->setVar("MIDDLE_3_5_TITLE",$lo_list->loop[5]['T_TITLE']);
$tpl->setVar("MIDDLE_3_5_LINK",$lo_list->loop[5]['T_LINK']);

$tpl->setVar("MIDDLE_3_6_TITLE",$lo_list->loop[6]['T_TITLE']);
$tpl->setVar("MIDDLE_3_6_LINK",$lo_list->loop[6]['T_LINK']);

// 사용한것 배열 삭제
$temp_en = $en_list->loop;
unset($temp_en[0]);
$sort_en = array_values($temp_en);

$tpl->setLoop("T_EN", $sort_en);

//가장 많이 본 뉴스
$tpl->setLoop("R1_1", $news_html['R1_1']); 
//최신뉴스
$tpl->setLoop("R1_2", $news_html['R1_2']); 

$tpl->setLoop("RECRUIT_PLATINUM", $recruit_list->loop_platinum); 

$tpl->setLoop("BUSINESS_PLATINUM", $business_list->loop_platinum); 


$tpl->setLoop("HOUSE", $house_loop); 
$tpl->setLoop("RENT", $rent_loop); 
$tpl->setLoop("COMMERCIAL", $commercial_loop); 
$tpl->setLoop("BUSINESS", $business_loop); 


$tpl->setLoop("AGENT", $agent_list->loop);

$tpl->setLoop("CAR",$vehicle_list->loop_platinum);

$tpl->setLoop("NOTI",$notification_list->loop);

$tpl->setLoop("M_LATEST", $youtube_home->m_latest);

$tpl->setLoop("DEALER", $dealer_loop);

// 배너 삽입
$banner_dic = makeBannerHome($db,$define_val);

foreach ($banner_dic as $location => $info) {

    $imgUrl = $info['img'];
    $linkUrl = $info['link'];

    $tpl->setVar($location."_img",$imgUrl);
    $tpl->setVar($location."_link",$linkUrl);

}
        
include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
