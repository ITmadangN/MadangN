<?php

use BearTemplate\BearTemplate;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "realestate_listing_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$realestate_listing_id = $_GET["realestate_listing_id"] ?? "";

$sql = "SELECT A.*
        FROM realestate_listing A
        WHERE A.realestate_listing_id = :realestate_listing_id
        ";

$placeholders = ['realestate_listing_id' => $realestate_listing_id];

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

$p_realestate_listing_id                    = $row->realestate_listing_id;
$p_listing_key                              = $row->listing_key;
$p_listing_id                              = $row->listing_id;
$p_standard_status                         = $row->standard_status;
$p_mls_status                              = $row->mls_status;
$p_property_type                           = $row->property_type;
$p_property_sub_type                       = $row->property_sub_type;
$p_list_price                              = $row->list_price;
$p_original_list_price                     = $row->original_list_price;
$p_close_price                             = $row->close_price;
$p_listing_contract_date                   = $row->listing_contract_date;
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
$p_is_active                               = $row->is_active;
$p_is_show_website                         = $row->is_show_website;

// ── 미디어(이미지) 목록 조회 ───────────────────────────────────────────
$sql_media = "SELECT realestate_listing_id, realestate_listing_media_id, media_key, media_url, media_order, media_type, is_primary
              FROM realestate_listing_media
              WHERE realestate_listing_id = :realestate_listing_id
              ORDER BY media_order ASC";

$db->query($sql_media, ['realestate_listing_id' => $realestate_listing_id]);

$media_loop = array();
$media_idx  = 0;         
while ($mrow = $db->fetch()) {
    $v_media_url = "";
    if ($mrow->media_url != "") { 
        
        if($p_is_show_website == 1) {
            $v_media_url = "<img src=\"" . $define_val->IMG_PROTECT ."?c=realestate&cc=realestate&d=img".$mrow->realestate_listing_media_id."&s=".$mrow->realestate_listing_id . "\" alt=\"매물 이미지 " . (int)$mrow->media_order . "\" />";
        }
        else {
            $v_media_url = "<img src=\"" . htmlspecialchars($mrow->media_url) . "\" alt=\"매물 이미지 " . (int)$mrow->media_order . "\" />";
        }
    }   
    $media_loop[$media_idx] = array(
        "T_MEDIA_KEY"   => $mrow->media_key,
        "T_MEDIA_URL"   => $v_media_url,
        "T_MEDIA_ORDER" => $mrow->media_order,
        "T_MEDIA_TYPE"  => $mrow->media_type,
        "T_IS_PRIMARY"  => $mrow->is_primary,
    );
    $media_idx++;
}

// ── 배너 루프 (standard_status / property_type) ───────────────────────
$banner_loop = array();
$banner_loop[0] = array(
    "T_STANDARD_STATUS" => $p_standard_status,
    "T_PROPERTY_TYPE"   => $p_property_type,
);

// ── 가격 포맷 ─────────────────────────────────────────────────────────
function fmt_price($val) {
    return ($val !== null && $val !== '') ? '$' . number_format($val, 0) : '';
}
function fmt_yn($val) {
    return ($val == 1) ? 'Y' : 'N';
}

// ── 페이지 설정 ───────────────────────────────────────────────────────
$main   = 6;   // 부동산 메뉴 번호
$sub    = 1;
$mtitle = "부동산";
$stitle = "매물 상세 정보";
$ytitle = "";
$page   = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "realstate_view.tpl");

// 기본 정보
$tpl->setVar("T_REALESTATE_LISTING_ID",             $p_realestate_listing_id);
$tpl->setVar("T_LISTING_KEY",                       $p_listing_key);
$tpl->setVar("T_LISTING_ID",                        $p_listing_id);
$tpl->setVar("T_STANDARD_STATUS",                   $p_standard_status);
$tpl->setVar("T_MLS_STATUS",                        $p_mls_status);
$tpl->setVar("T_PROPERTY_TYPE",                     $p_property_type);
$tpl->setVar("T_PROPERTY_SUB_TYPE",                 $p_property_sub_type);
$tpl->setVar("T_SPECIAL_LISTING_CONDITIONS",        $p_special_listing_conditions);
$tpl->setVar("T_LEASE_TERM",                        $p_lease_term);

// 가격 정보
$tpl->setVar("T_LIST_PRICE",                        fmt_price($p_list_price));
$tpl->setVar("T_ORIGINAL_LIST_PRICE",               fmt_price($p_original_list_price));
$tpl->setVar("T_CLOSE_PRICE",                       fmt_price($p_close_price));
$tpl->setVar("T_PRICE_PER_SQFT",                    $p_price_per_sqft ? '$' . number_format($p_price_per_sqft, 2) . ' /sqft' : '');
$tpl->setVar("T_ASSOCIATION_FEE",                   fmt_price($p_association_fee));
$tpl->setVar("T_ASSOCIATION_FEE_FREQUENCY",         $p_association_fee_frequency);
$tpl->setVar("T_ASSOCIATION_FEE_INCLUDES",          $p_association_fee_includes);
$tpl->setVar("T_TAX_ANNUAL_AMOUNT",                 fmt_price($p_tax_annual_amount));

// 임대 정보
$tpl->setVar("T_LEASE_RATE",                        $p_lease_rate);
$tpl->setVar("T_LEASE_RATE_TYPE",                   $p_lease_rate_type);
$tpl->setVar("T_LEASE_RATE_FREQUENCY",              $p_lease_rate_frequency);
$tpl->setVar("T_LEASE_AMOUNT",                      $p_lease_amount);
$tpl->setVar("T_LEASE_AMOUNT_FREQUENCY",            $p_lease_amount_frequency);
$tpl->setVar("T_LEASE_SQUARE_FEET",                 $p_lease_square_feet ? number_format($p_lease_square_feet) . ' sqft' : '');

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
$tpl->setVar("T_LIVING_AREA",                       $p_living_area ? number_format($p_living_area) . ' sqft' : '');
$tpl->setVar("T_BUILDING_AREA_TOTAL",               $p_building_area_total ? number_format($p_building_area_total) . ' sqft' : '');
$tpl->setVar("T_LOT_SIZE_SQFT",                     $p_lot_size_sqft ? number_format($p_lot_size_sqft) . ' sqft' : '');
$tpl->setVar("T_LOT_SIZE_ACRES",                    $p_lot_size_acres ? $p_lot_size_acres . ' acres' : '');
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
$tpl->setVar("T_CARPORT_YN",                        $p_carport_yn ? 'Y' : 'N');
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
$tpl->setVar("T_GROSS_INCOME",                      fmt_price($p_gross_income));
$tpl->setVar("T_NET_OPERATING_INCOME",              fmt_price($p_net_operating_income));
$tpl->setVar("T_OPERATING_EXPENSE",                 fmt_price($p_operating_expense));

// 매물 설명
$tpl->setVar("T_PUBLIC_REMARKS",                    $p_public_remarks);
$tpl->setVar("T_PRIVATE_REMARKS",                   $p_private_remarks);

// 날짜 정보
$tpl->setVar("T_LISTING_CONTRACT_DATE",             $p_listing_contract_date);
$tpl->setVar("T_ON_MARKET_DATE",                    $p_on_market_date);
$tpl->setVar("T_CLOSE_DATE",                        $p_close_date);
$tpl->setVar("T_DAYS_ON_MARKET",                    $p_days_on_market !== null ? $p_days_on_market . '일' : '');

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


// 공개 설정
$tpl->setVar("T_INTERNET_ENTIRE_LISTING_DISPLAY_YN", fmt_yn($p_internet_entire_listing_display_yn));
$tpl->setVar("T_INTERNET_ADDRESS_DISPLAY_YN",         fmt_yn($p_internet_address_display_yn));

$tpl->setVar("T_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));

// 루프
$tpl->setLoop("T_LOOP",       $banner_loop);
$tpl->setLoop("T_MEDIA_LOOP", $media_loop);

if($p_is_show_website == 1) $tpl->setVar("T_UPDELETE", true);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
