<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");

include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$agent_key = '';

if($SS_ID != "") {
    
    $sql = "SELECT A.* FROM realestate_agents A where A.user_id = :user_id";
    
    $placeholders = ['user_id' => $SS_ID];
    $result = $db->query($sql, $placeholders);

    $row = $db->fetch();
    
     if(!empty($row)) {
         
         $user_id = $row->user_id;
         $agent_key = $row->agent_key;
         $agent_dre_license = $row->agent_dre_license;
         
         $is_approved = $row->is_approved;
         $has_active_advertisement = $row->has_active_advertisement;
         $is_preminum_agent = $row->is_preminum_agent;
         $has_active_listings = $row->has_active_listings;
              
     }
     else {        
       NO_PERMISSION('/');
     }
}
else  {
    echo "올바른 접근이 아닙나다.";
    exit;
}

$realestate_listing_id = $_GET["realestate_listing_id"] ?? "";

$sql = "SELECT A.*
        FROM realestate_listing A
        WHERE A.realestate_listing_id = :realestate_listing_id and list_agent_key =:agent_key
        ";

        
$sql2 = "SELECT A.*
        FROM realestate_listing A
        WHERE A.realestate_listing_id = $realestate_listing_id and list_agent_key = '{$agent_key}'
        ";
        
$placeholders = ['realestate_listing_id' => $realestate_listing_id, 'agent_key' => $agent_key];
echo $sql2;
$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();
if (!$row) {
    echo "데이터가 없습니다.";
    exit;
}

$p_realestate_listing_id                   = $row->realestate_listing_id;
$p_listing_key                             = $row->listing_key;
$p_listing_id                              = $row->listing_id;
$p_standard_status                         = $row->standard_status;
$p_mls_status                              = $row->mls_status;
$p_property_type                           = $row->property_type;
$p_property_sub_type                       = $row->property_sub_type;
$p_list_price                              = $row->list_price;
$p_original_list_price                     = $row->original_list_price;
$p_close_price                             = $row->close_price;
$p_listing_contract_date                   = CONVERT_DATE_FORMAT2($row->listing_contract_date);
$p_on_market_date                          = $row->on_market_date;
$p_close_date                              = $row->close_date;
$p_days_on_market                          = $row->days_on_market;
$p_street_number                           = $row->street_number;
$p_street_name                             = $row->street_name;
$p_street_suffix                           = $row->street_suffix;
$p_unparsed_address                        = $row->unparsed_address;
$p_city                                    = $row->city;
$p_state_or_province                       = $row->state_or_province;
$p_postal_code                             = $row->postal_code;
$p_county_or_parish                        = $row->county_or_parish;
$p_bedrooms_total                          = $row->bedrooms_total;
$p_bathrooms_total                         = $row->bathrooms_total;
$p_bathrooms_full                          = $row->bathrooms_full;
$p_bathrooms_half                          = $row->bathrooms_half;
$p_living_area                             = $row->living_area;
$p_lot_size_sqft                           = $row->lot_size_sqft;
$p_lot_size_acres                          = $row->lot_size_acres;
$p_lot_features                            = $row->lot_features;
$p_building_area_total                     = $row->building_area_total;
$p_year_built                              = $row->year_built;
$p_levels                                  = $row->levels;
$p_stories_total                           = $row->stories_total;
$p_latitude                                = $row->latitude;
$p_longitude                               = $row->longitude;
$p_covered_spaces                          = $row->covered_spaces;
$p_garage_spaces                           = $row->garage_spaces;
$p_parking_total                           = $row->parking_total;
$p_parking_features                        = $row->parking_features;
$p_carport_yn                              = $row->carport_yn;
$p_open_parking_spaces                     = $row->open_parking_spaces;
$p_subdivision_name                        = $row->subdivision_name;
$p_high_school_district                    = $row->high_school_district;
$p_elementary_school                       = $row->elementary_school;
$p_middle_or_junior_school                 = $row->middle_or_junior_school;
$p_high_school                             = $row->high_school;
$p_list_agent_key                          = $row->list_agent_key;
$p_buyer_agent_key                         = $row->buyer_agent_key;
$p_list_office_key                         = $row->list_office_key;
$p_buyer_office_key                        = $row->buyer_office_key;
$p_association_fee                         = $row->association_fee;
$p_association_fee_frequency               = $row->association_fee_frequency;
$p_association_fee_includes                = $row->association_fee_includes;
$p_tax_annual_amount                       = $row->tax_annual_amount;
$p_special_listing_conditions              = $row->special_listing_conditions;
$p_lease_term                              = $row->lease_term;
$p_price_per_sqft                          = $row->price_per_sqft;
$p_lease_rate                              = $row->lease_rate;
$p_lease_rate_type                         = $row->lease_rate_type;
$p_lease_rate_frequency                    = $row->lease_rate_frequency;
$p_lease_amount                            = $row->lease_amount;
$p_lease_amount_frequency                  = $row->lease_amount_frequency;
$p_lease_square_feet                       = $row->lease_square_feet;
$p_internet_entire_listing_display_yn      = $row->internet_entire_listing_display_yn;
$p_internet_address_display_yn             = $row->internet_address_display_yn;
$p_water_source                            = $row->water_source;
$p_zoning                                  = $row->zoning;
$p_zoning_description                      = $row->zoning_description;
$p_appliances                              = $row->appliances;
$p_laundry_features                        = $row->laundry_features;
$p_interior_features                       = $row->interior_features;
$p_units_total                             = $row->units_total;
$p_business_type                           = $row->business_type;
$p_sale_type                               = $row->sale_type;
$p_public_remarks                          = $row->public_remarks;
$p_private_remarks                         = $row->private_remarks;
$p_gross_income                            = $row->gross_income;
$p_net_operating_income                    = $row->net_operating_income;
$p_operating_expense                       = $row->operating_expense;
$p_development_status                      = $row->development_status;
$p_number_of_buildings                     = $row->number_of_buildings;
$p_road_frontage_type                      = $row->road_frontage_type;
$p_road_surface_type                       = $row->road_surface_type;
$p_property_condition                      = $row->property_condition;
$p_utilities                               = $row->utilities;
$p_cap_rate                                = $row->cap_rate;
$p_is_active                               = $row->is_active;

$p_business_name                           = $row->business_name;
$p_agent_comment                           = $row->agent_comment;



$sql = "SELECT A.*
        FROM realestate_listing_media A
        WHERE A.realestate_listing_id = :realestate_listing_id
        ";

$placeholders = ['realestate_listing_id' => $realestate_listing_id];

$result = $db->query($sql, $placeholders);

$array_img = array();

$i = 0;

$plan_image_id = "";

while($row = $db->fetch()) {
    
    $realestate_listing_media_id = $row->realestate_listing_media_id;
    $media_url = $row->media_url;
    
    $image_thum = "";

    if ($media_url != "") {

  //      $image_thum = $define_val->IMG_PROTECT . "?c=realestate&cc=realestate&d=img".$realestate_listing_media_id."&s=". $realestate_listing_id;

  //      $html = MAKE_UPLOAD_HTML2('h_del_img', 'upload_image_'.$realestate_listing_media_id, $realestate_listing_media_id, $image_thum);
        
         if($plan_image_id == "") $plan_image_id = $realestate_listing_media_id;
         else $plan_image_id .= ','.$realestate_listing_media_id;
    }
    

    $array_img[$i] = array('T_HTML' => $html);
    
    $i++;
    
}

$main=5;
$sub=6;
$mtitle="유료광고신청";
$stitle="에이전트&매물광고";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "agent_realestate_update.tpl");

$tpl->setVar("T_AGENT_KEY",$agent_key);
$tpl->setVar("T_DRE_KEY",$agent_dre_license);
$tpl->setVar("T_ID",                                $p_realestate_listing_id);
$tpl->setVar("T_LISTING_KEY",                       $p_listing_key);
$tpl->setVar("T_LISTING_ID",                        $p_listing_id);
$tpl->setVar("T_MAX_NUM", $img_max_num);
$tpl->setVar("T_EXIST_IMAGE", $plan_image_id);

$tpl->setVar("T_MLS_STATUS",                        $p_mls_status);
$tpl->setVar("T_PROPERTY_TYPE",                     $p_property_type);
$tpl->setVar("T_SPECIAL_LISTING_CONDITIONS",        $p_special_listing_conditions);
$tpl->setVar("T_LEASE_TERM",                        $p_lease_term);

// 가격 정보
$tpl->setVar("T_LIST_PRICE",                        $p_list_price);
$tpl->setVar("T_ORIGINAL_LIST_PRICE",               $p_original_list_price);
$tpl->setVar("T_CLOSE_PRICE",                       $p_close_price);
$tpl->setVar("T_PRICE_PER_SQFT",                    $p_price_per_sqft);
$tpl->setVar("T_ASSOCIATION_FEE",                   $p_association_fee);

$tpl->setVar("T_ASSOCIATION_FEE_INCLUDES",          $p_association_fee_includes);
$tpl->setVar("T_TAX_ANNUAL_AMOUNT",                 $p_tax_annual_amount);

// 임대 정보
$tpl->setVar("T_LEASE_RATE",                        $p_lease_rate);
$tpl->setVar("T_LEASE_RATE_TYPE",                   $p_lease_rate_type);
$tpl->setVar("T_LEASE_RATE_FREQUENCY",              $p_lease_rate_frequency);
$tpl->setVar("T_LEASE_AMOUNT",                      $p_lease_amount);

$tpl->setVar("T_LEASE_SQUARE_FEET",                 $p_lease_square_feet);

// 주소 정보
$tpl->setVar("T_UNPARSED_ADDRESS",                  $p_unparsed_address);
$tpl->setVar("T_STREET_NUMBER",                     $p_street_number);
$tpl->setVar("T_STREET_NAME",                       $p_street_name);
$tpl->setVar("T_STREET_SUFFIX",                     $p_street_suffix);
$tpl->setVar("T_CITY",                              $p_city);
$tpl->setVar("T_STATE_OR_PROVINCE",                 $p_state_or_province);
$tpl->setVar("T_POSTAL_CODE",                       $p_postal_code);
$tpl->setVar("T_COUNTY_OR_PARISH",                  $p_county_or_parish);
$tpl->setVar("T_LATITUDE",                          $p_latitude);
$tpl->setVar("T_LONGITUDE",                         $p_longitude);

// 매물 상세
$tpl->setVar("T_BEDROOMS_TOTAL",                    $p_bedrooms_total);
$tpl->setVar("T_BATHROOMS_TOTAL",                   $p_bathrooms_total);
$tpl->setVar("T_BATHROOMS_FULL",                    $p_bathrooms_full);
$tpl->setVar("T_BATHROOMS_HALF",                    $p_bathrooms_half);
$tpl->setVar("T_LIVING_AREA",                       $p_living_area);
$tpl->setVar("T_BUILDING_AREA_TOTAL",               $p_building_area_total);
$tpl->setVar("T_LOT_SIZE_SQFT",                     $p_lot_size_sqft);
$tpl->setVar("T_LOT_SIZE_ACRES",                    $p_lot_size_acres);
$tpl->setVar("T_LOT_FEATURES",                      $p_lot_features);
$tpl->setVar("T_YEAR_BUILT",                        $p_year_built);
$tpl->setVar("T_LEVELS",                            $p_levels);
$tpl->setVar("T_STORIES_TOTAL",                     $p_stories_total);
$tpl->setVar("T_SUBDIVISION_NAME",                  $p_subdivision_name);
$tpl->setVar("T_PROPERTY_CONDITION",                $p_property_condition);
$tpl->setVar("T_ZONING",                            $p_zoning);
$tpl->setVar("T_ZONING_DESCRIPTION",                $p_zoning_description);

// 주차 정보
$tpl->setVar("T_COVERED_SPACES",                    $p_covered_spaces);
$tpl->setVar("T_GARAGE_SPACES",                     $p_garage_spaces);
$tpl->setVar("T_CARPORT_YN",                        $p_carport_yn);
$tpl->setVar("T_OPEN_PARKING_SPACES",               $p_open_parking_spaces);
$tpl->setVar("T_PARKING_TOTAL",                     $p_parking_total);
$tpl->setVar("T_PARKING_FEATURES",                  $p_parking_features);

// 내부 시설 정보
$tpl->setVar("T_APPLIANCES",                        $p_appliances);
$tpl->setVar("T_LAUNDRY_FEATURES",                  $p_laundry_features);
$tpl->setVar("T_INTERIOR_FEATURES",                 $p_interior_features);

// 유틸리티 / 도로 정보
$tpl->setVar("T_WATER_SOURCE",                      $p_water_source);
$tpl->setVar("T_UTILITIES",                         $p_utilities);
$tpl->setVar("T_ROAD_FRONTAGE_TYPE",                $p_road_frontage_type);
$tpl->setVar("T_ROAD_SURFACE_TYPE",                 $p_road_surface_type);

// 상업용 / 수익용 정보
$tpl->setVar("T_BUSINESS_TYPE",                     $p_business_type);
$tpl->setVar("T_SALE_TYPE",                         $p_sale_type);
$tpl->setVar("T_UNITS_TOTAL",                       $p_units_total);
$tpl->setVar("T_NUMBER_OF_BUILDINGS",               $p_number_of_buildings);
$tpl->setVar("T_DEVELOPMENT_STATUS",                $p_development_status);
$tpl->setVar("T_GROSS_INCOME",                      $p_gross_income);
$tpl->setVar("T_NET_OPERATING_INCOME",              $p_net_operating_income);
$tpl->setVar("T_OPERATING_EXPENSE",                 $p_operating_expense);

// 매물 설명
$tpl->setVar("T_PUBLIC_REMARKS",                    $p_public_remarks);
$tpl->setVar("T_PRIVATE_REMARKS",                   $p_private_remarks);

// 날짜 정보
$tpl->setVar("T_LISTING_CONTRACT_DATE",             $p_listing_contract_date);
$tpl->setVar("T_ON_MARKET_DATE",                    $p_on_market_date);
$tpl->setVar("T_CLOSE_DATE",                        $p_close_date);
$tpl->setVar("T_DAYS_ON_MARKET",                    $p_days_on_market);

// 학군 정보
$tpl->setVar("T_HIGH_SCHOOL_DISTRICT",              $p_high_school_district);
$tpl->setVar("T_ELEMENTARY_SCHOOL",                 $p_elementary_school);
$tpl->setVar("T_MIDDLE_OR_JUNIOR_SCHOOL",           $p_middle_or_junior_school);
$tpl->setVar("T_HIGH_SCHOOL",                       $p_high_school);

// 에이전트 / 오피스
$tpl->setVar("T_LIST_AGENT_KEY",                    $p_list_agent_key);
$tpl->setVar("T_BUYER_AGENT_KEY",                   $p_buyer_agent_key);
$tpl->setVar("T_LIST_OFFICE_KEY",                   $p_list_office_key);
$tpl->setVar("T_BUYER_OFFICE_KEY",                  $p_buyer_office_key);

$tpl->setVar("T_CAP_RATE",                          $p_cap_rate);
$tpl->setVar("T_BUSINESS_NAME",                          $p_business_name);
$tpl->setVar("T_AGENT_COMMENT",                          $p_agent_comment);


$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(1,$p_state_or_province,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY", DB_ARRAY_ARRAY_RETURN(1, $p_city, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_or_province}' order by code_sub_name asc","선택"));
$tpl->setVar("S_SELECT_PROPERTY_TYPE",DB_ARRAY_ARRAY_RETURN(1,$p_property_type,$db,"common_code","code_sub_name","code_sub_name","code = 'realestate' order by code_sub_name asc","선택"));
$tpl->setVar("S_SELECT_PROPERTY_SUB_TYPE",DB_ARRAY_ARRAY_RETURN(1,$p_property_sub_type,$db,"common_code","code_sub_name","code_sub_name","code = '{$p_property_type}' order by code_sub_name asc","선택"));

$tpl->setVar("SELECT_STANDARD_STATUS",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_standard_status,1,$p_standard_status));
$tpl->setVar("SELECT_ASSOCIATION_FEE_FREQUENCY",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_lassociation_fee_frequency,-1,$p_association_fee_frequency,"선택"));
$tpl->setVar("SELECT_LEASE_AMOUNT_FREQUENCY",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_lease_amount_frequency,-1,$p_lease_amount_frequency,"선택"));

$tpl->setVar("S_SELECT_COUNTY_OR_PARISH",DB_ARRAY_ARRAY_RETURN(1,$p_county_or_parish,$db,"common_code","code_sub_name","code_sub_name","code = 'CA_county' order by code_sub_name asc",""));

//$tpl->setLoop("T_LOOP", $array_img);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

