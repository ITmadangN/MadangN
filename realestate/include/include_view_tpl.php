<?php

function SET_VAR($value,$format,$set_blank = "-") {
    
    $return_value = "";
    
    if($value == "") {
        $return_value  = $set_blank;
    }
    else {
        
        if($format == "number") $return_value = fmt_price($value);
        else $return_value = $value;
    }
    
    return $return_value;
}

// 수정가능하게 만듬
if($update_enable == 'Y') $tpl->setVar("T_UPDATE",   true);


$tpl->setVar("T_ID",                                  $id);
$tpl->setVar("T_LISTING_KEY",                         $p_listing_key);
$tpl->setVar("T_LISTING_ID",                          $p_listing_id);
$tpl->setVar("T_STANDARD_STATUS",                     $p_standard_status);
$tpl->setVar("T_MLS_STATUS",                          $p_mls_status);
$tpl->setVar("T_PROPERTY_TYPE",                       $p_property_type);

if($p_property_sub_type == "") $tpl->setVar("T_PROPERTY_SUB_TYPE",  "-");
else $tpl->setVar("T_PROPERTY_SUB_TYPE",       ARRAY_RETURN($define_val->DEFINE_realestate_property_sub_type[$s_menu], $p_property_sub_type));



$tpl->setVar("T_LIST_PRICE",              fmt_price_zero($p_list_price));
$tpl->setVar("T_ORIGINAL_LIST_PRICE",     fmt_price($p_original_list_price));
$tpl->setVar("T_CLOSE_PRICE",             fmt_price($p_close_price));

if($p_living_area == "" || $p_living_area == "0") $tpl->setVar("T_LIVING_AREA2", "$--"); 
else $tpl->setVar("T_LIVING_AREA2",            fmt_price($p_list_price/$p_living_area));

$tpl->setVar("T_LISTING_CONTRACT_DATE",               $p_listing_contract_date);
$tpl->setVar("T_ON_MARK_DATE",                        $p_on_market_date);
$tpl->setVar("T_CLOSE_DATE",                          $p_close_date);
$tpl->setVar("T_DAYS_ON_MARKET",          $p_days_on_market !== null ? $p_days_on_market . '일' : '');
$tpl->setVar("T_STREET_NUMBER",                       $p_street_number);
$tpl->setVar("T_STREET_NAME",                         $p_street_name);
$tpl->setVar("T_STREET_SUFFIX",                       $p_street_suffix);
$tpl->setVar("T_UNPARSED_ADDRESS",        $p_unparsed_address . " ," . $p_city . " , ". $p_state_or_province . " " . $p_postal_code);
$tpl->setVar("T_CITY",                                $p_city);
$tpl->setVar("T_STATE_OR_PROVINCE",                   $p_state_or_province);
$tpl->setVar("T_POSTAL_CODE",                         $p_postal_code);
$tpl->setVar("T_COUNTY_OR_PARISH",                    $p_county_or_parish);

$temp_bedrooms_total = (float)$p_bedrooms_total;

if($temp_bedrooms_total == 0) $tpl->setVar("T_BEDROOMS_TOTAL",                      "--");
else $tpl->setVar("T_BEDROOMS_TOTAL",                      (float)$p_bedrooms_total);

// $tpl->setVar("T_BEDROOMS_TOTAL",                      (float)$p_bedrooms_total);

$temp_bathrooms_total = (float)$p_bathrooms_total;

if($temp_bathrooms_total == 0) $tpl->setVar("T_BATHROOMS_TOTAL",                      "--");
else $tpl->setVar("T_BATHROOMS_TOTAL",                     (float)$p_bathrooms_total);

$tpl->setVar("T_BATHROOMS_FULL",                      $p_bathrooms_full);
$tpl->setVar("T_BATHROOMS_HALF",                      $p_bathrooms_half);

$temp_builing_area_total = $p_building_area_total ? number_format((float)$p_building_area_total) : '--';

if($p_property_type == "CommercialLease" || $p_property_type == "CommercialSale" || $p_property_type == "ResidentialIncome")  {
    $tpl->setVar("T_LIVING_AREA",            $temp_builing_area_total . " sqft");    
    if($p_building_area_total == "" || (float)$p_building_area_total == 0) $tpl->setVar("T_LIVING_AREA2", "$--"); 
    else $tpl->setVar("T_LIVING_AREA2",            fmt_price($p_list_price/$p_building_area_total));
}
else $tpl->setVar("T_LIVING_AREA",             $p_living_area ? number_format((float)$p_living_area,0) . ' sqft' : '--'); 

$tpl->setVar("T_LOT_SIZE_SQFT",           $p_lot_size_sqft ? number_format((float)$p_lot_size_sqft,0) : '--');
$tpl->setVar("T_LOT_SIZE_ACRES",          $p_lot_size_acres ? $p_lot_size_acres : '');

$tpl->setVar("T_BUILDING_AREA_TOTAL",    $temp_builing_area_total);

if($p_year_built == "" || $p_year_built == null ) $tpl->setVar("T_YEAR_BUILT",         "----");
else $tpl->setVar("T_YEAR_BUILT",                          $p_year_built);

if($p_levels != "") $tpl->setVar("LEVELS",                true);
$tpl->setVar("T_LEVELS",                              $p_levels);

if($p_stories_total == "") { $tpl->setVar("T_STORIES_TOTAL",         "--");    $tpl->setVar("STORIES_TOTAL",         false);    }
else { $tpl->setVar("T_STORIES_TOTAL",                       $p_stories_total); $tpl->setVar("STORIES_TOTAL",         true);}

$tpl->setVar("T_LATITUDE",                            $p_latitude);
$tpl->setVar("T_LONGITUDE",                           $p_longitude);

if($p_covered_spaces == "" || $p_covered_spaces == "0") { $tpl->setVar("T_COVERED_SPACES",         "-");     }
else { $tpl->setVar("T_COVERED_SPACES",                      $p_covered_spaces);   $tpl->setVar("COVERED_SPACES",true); }

if($p_garage_spaces == "" || $p_garage_spaces == "0" ) { $tpl->setVar("T_GARAGE_SPACES",         "-");     }
else { $tpl->setVar("T_GARAGE_SPACES",                       $p_garage_spaces);    $tpl->setVar("GARAGE_SPACES",true); }

if($p_parking_total == "" || $p_parking_total == "0" ) { $tpl->setVar("T_PARKING_TOTAL",         "--");     }
else {  $tpl->setVar("T_PARKING_TOTAL",                       $p_parking_total); $tpl->setVar("PARKING_TOTAL",true); }

if(($p_parking_total != "" && $p_parking_total != "0") || $p_parking_features != "" || ($p_garage_spaces != "" && $p_garage_spaces == "0") || $p_carport_spaces != "" ||  $p_covered_spaces != "" || $p_uncovered_spaces != "")   $tpl->setVar("PARKING",true);

//if($p_parking_total != "" && $p_parking_total != "0" && $p_parking_features != "" && $p_garage_spaces != "" && $p_garage_spaces == "0" && $p_carport_spaces != "" &&  $p_covered_spaces != "" && $p_uncovered_spaces != "")   $tpl->setVar("PARKING",true);

if($p_parking_features == "") { $tpl->setVar("T_PARKING_FEATURES",         "-");     }
else { $tpl->setVar("T_PARKING_FEATURES",                    $p_parking_features);    $tpl->setVar("PARKING_FEATURES",true); }

$tpl->setVar("T_CARPORT_YN",                          $p_carport_yn);

if($p_carport_spaces != "") $tpl->setVar("CARPORT_SPACES",true);
$tpl->setVar("T_CARPORT_SPACES",                      $p_carport_spaces);

$tpl->setVar("T_OPEN_PARKING_SPACES",                 $p_open_parking_spaces);

if($p_uncovered_spaces != "") $tpl->setVar("UNCOVERED_SPACES",true);
$tpl->setVar("T_UNCOVERED_SPACES",                    $p_uncovered_spaces);

$tpl->setVar("T_SUBDIVISION_NAME",                    $p_subdivision_name);
$tpl->setVar("T_HIGH_SCHOOL_DISTRICT",                $p_high_school_district);
$tpl->setVar("T_HIGH_SCHOOL_DISTRICT",                $p_high_school_district);
$tpl->setVar("T_ELEMENTARY_SCHOOL",                   $p_elementary_school);
$tpl->setVar("T_MIDDLE_OR_JUNIOR_SCHOOL",             $p_middle_or_junior_school);
$tpl->setVar("T_HIGH_SCHOOL",                         $p_high_school);
$tpl->setVar("T_LIST_AGENT_KEY",                      $p_list_agent_key);
$tpl->setVar("T_BUYER_AGENT_KEY",                     $p_buyer_agent_key);
$tpl->setVar("T_LIST_OFFICE_KEY",                     $p_list_office_key);
$tpl->setVar("T_BUYER_OFFICE_KEY",                    $p_buyer_office_key);
if($p_association_fee == "" || $p_association_fee == "0.00" || $p_association_fee_frequency == "") { $tpl->setVar("T_TEMP_HOA",         "$-- HOA"); }
else { $tpl->setVar("T_TEMP_HOA",       "$".  $p_association_fee . "/" . $p_association_fee_frequency. " HOA");   $tpl->setVar("ASSOCIATION_FEE",true); }

if($p_association_fee_frequency == "") $tpl->setVar("T_ASSOCIATION_FEE_FREQUENCY",         "--");    
else $tpl->setVar("T_ASSOCIATION_FEE_FREQUENCY",           $p_association_fee_frequency);

if($p_association_fee_includes != "") $tpl->setVar("ASSOCIATION_FEE_INCLUDES",true);
$tpl->setVar("T_ASSOCIATION_FEE_INCLUDES",            $p_association_fee_includes);

$tpl->setVar("T_TAX_ANNUAL_AMOUNT",       fmt_price($p_tax_annual_amount));

if($p_association_fee != "" && $p_association_fee_includes != "" ) $tpl->setVar("HOA",         true);


if($p_special_listing_conditions == "" ) { $tpl->setVar("T_SPECIAL_LISTING_CONDITIONS",  "--");     }
else { $tpl->setVar("T_SPECIAL_LISTING_CONDITIONS",          $p_special_listing_conditions);   }

if($p_lease_term != "" ) { $tpl->setVar("LEASE",  true);     }

$tpl->setVar("T_LEASE_TERM",                          $p_lease_term);                                
$tpl->setVar("T_LEASE_AMOUNT",                        $p_lease_amount);
$tpl->setVar("T_LEASE_AMOUNT_FREQUENCY",              $p_lease_amount_frequency);
$tpl->setVar("T_INTERNET_ENTIRE_LISTING_DISPLAY_YN", fmt_yn($p_internet_entire_listing_display_yn));
$tpl->setVar("T_INTERNET_ADDRESS_DISPLAY_YN",         fmt_yn($p_internet_address_display_yn));

if($p_water_source != "") { $tpl->setVar("WATER_SOURCE",true); }
$tpl->setVar("T_WATER_SOURCE",                        $p_water_source);    

if($p_zoning != "" || $p_zoning_description != "") { $tpl->setVar("ZONING",true); }
$tpl->setVar("T_ZONING",                              $p_zoning);
$tpl->setVar("T_ZONING_DESCRIPTION",                  $p_zoning_description);

if($p_pool_features != "") $tpl->setVar("POOL_FEATURES",true);
$tpl->setVar("T_POOL_FEATURES",                       $p_pool_features);

if($p_appliances != "" || $p_laundry_features != "") { $tpl->setVar("APPLIANCES",true); }

if($p_appliances != "") $tpl->setVar("APPLIANCES2",true);
$tpl->setVar("T_APPLIANCES",                          $p_appliances); 

if($p_cooling != "") $tpl->setVar("COOLING",true);
$tpl->setVar("T_COOLING",                             $p_cooling);

if($p_heating != "") $tpl->setVar("HEATING",true);
$tpl->setVar("T_HEATING",                             $p_heating);

if($p_laundry_features != "") { $tpl->setVar("LAUNDRY_FEATURES",true); }
$tpl->setVar("T_LAUNDRY_FEATURES",                    $p_laundry_features);

$tpl->setVar("T_INTERIOR_FEATURES",                   $p_interior_features);

if($p_units_total != "" && $p_units_total != "0") { 
    $tpl->setVar("UNITS",true);
    
    
    $tpl->setVar("T_UNITS_TOTAL",              number_format((float)$p_units_total,0));
    
    if($p_units_total == "" || (int)$p_units_total == 0 ) $tpl->setVar("TEMP_UNIT_PRICE",            "$--"); 
    else $tpl->setVar("TEMP_UNIT_PRICE",            fmt_price_zero($p_list_price/$p_units_total));
}
else $tpl->setVar("T_UNITS_TOTAL",              "--");

if($p_business_type != "") $tpl->setVar("T_BUSINESS_TYPE",                       TRUNCATE_TITLE($p_business_type,30));
else  $tpl->setVar("T_BUSINESS_TYPE",    "--");

if($p_public_remarks != "") $tpl->setVar("PUBLIC_REMARKS",true);
$tpl->setVar("T_PUBLIC_REMARKS",                      $p_public_remarks);

if($p_private_remarks != "") $tpl->setVar("PRIVATE_REMARKS",true);
$tpl->setVar("T_PRIVATE_REMARKS",                     $p_private_remarks);

$tpl->setVar("T_GROSS_INCOME",                        $p_gross_income);

if($p_net_operating_income != "" && (float)$p_net_operating_income != 0 ) {$tpl->setVar("NET_OPERATING_INCOME",true); }

if($p_net_operating_income != "")  $tpl->setVar("T_NET_OPERATING_INCOME",                number_format((float)$p_net_operating_income,0));

$tpl->setVar("T_OPERATING_EXPENSE",                   $p_operating_expense);

if($p_development_status != "")  $tpl->setVar("DEVELOPMENTSTATUS",true);
$tpl->setVar("T_DEVELOPMENT_STATUS",                  $p_development_status);

if($p_number_of_buildings != "")  $tpl->setVar("NUMBER_OF_BUILDINGS",true);
$tpl->setVar("T_NUMBER_OF_BUILDINGS",                 $p_number_of_buildings);

if($p_road_frontage_type != "")  $tpl->setVar("ROAD_FRONTAGE_TYPE",true);
$tpl->setVar("T_ROAD_FRONTAGE_TYPE",                  $p_road_frontage_type);

if($p_road_surface_type != "")  $tpl->setVar("ROAD_SURFACE_TYPE",true);
$tpl->setVar("T_ROAD_SURFACE_TYPE",                   $p_road_surface_type);

if($p_property_condition != "") $tpl->setVar("PROPERTYCONDITION",true);
$tpl->setVar("T_PROPERTY_CONDITION",                  $p_property_condition);

if($p_utilities != "") $tpl->setVar("UTILITIES",true);
$tpl->setVar("T_UTILITIES",                           $p_utilities);

if($p_property_type == "ManufacturedInPark")  $tpl->setVar("MANUFACTUREDINPARK",true);
else $tpl->setVar("HOUSE",true);

if($p_property_type == "ResidentialLease") {
  $tpl->setVar("RESIDENTIALLEASE",true);
  
  if($p_lease_amount_frequency == "") $tpl->setVar("TEMP_LIST_PRICE_OPTION",       "/Monthly");
  
}
if($p_property_type == "CommercialLease")  $tpl->setVar("COMMERCIALLEASE",true);

if($p_property_type == "Land") {
    
    $tpl->setVar("T_BEDROOMS_TOTAL",       "--");
    $tpl->setVar("T_BATHROOMS_TOTAL",       "--");
    
    
    if($p_lot_size_acres == "") { $tpl->setVar("T_LIVING_AREA",       number_format((float)$p_lot_size_sqft,0) . " sqft"); }
    else $tpl->setVar("T_LIVING_AREA",       number_format((float)$p_lot_size_acres,2) . " Acres");
    
    $tpl->setVar("LAND",true);
    
     if($p_lot_size_sqft == "" || (float)$p_lot_size_sqft == 0) {
     
        if($p_lot_size_acres != "" && (float)$p_lot_size_acres != 0) {            
            $tpl->setVar("T_LIVING_AREA2",            fmt_price($p_list_price/($p_lot_size_acres * 43560)));            
        }
        else { 
            $tpl->setVar("T_LIVING_AREA2", "$--");            
        }
    }
    else $tpl->setVar("T_LIVING_AREA2",            fmt_price($p_list_price/$p_lot_size_sqft));
    
    if($p_lot_size_acres != "" && (float)$p_lot_size_acres != 0) {   
        $tpl->setVar("T_LOT_SIZE", number_format((float)$p_lot_size_acres,0) . " Acres");
        $tpl->setVar("LOT",                        true);
        $tpl->setVar("LOT_SIZE",                        true);    
    }
    else {
        if($p_lot_size_sqft != ""  && (float)$p_lot_size_sqft != 0) {
            
            $tpl->setVar("T_LOT_SIZE", number_format((float)$p_lot_size_sqft,0) . " sqft lot");
            $tpl->setVar("LOT",                        true);
            $tpl->setVar("LOT_SIZE",                        true);
        }
        else {
            $tpl->setVar("T_LOT_SIZE", "--");
            if($p_lot_features == "") $tpl->setVar("LOT",                        false);
        }
    }

    if($p_lot_features != "") $tpl->setVar("LOT_FEATURES",                        true);
    $tpl->setVar("T_LOT_FEATURES",                        $p_lot_features);
    
    
}

if($p_property_type == "CommercialSale")  { $tpl->setVar("COMMERCIALSALE",true); $tpl->setVar("COMMERCIALSALE_RESIDENTIALINCOME",true);}
if($p_property_type == "ResidentialIncome") { $tpl->setVar("RESIDENTIALINCOME",true); $tpl->setVar("COMMERCIALSALE_RESIDENTIALINCOME",true);}



// 루프
$tpl->setVar("T_IMG_HTML",       $html);
$tpl->setVar("T_IMG_HTML_S",     $html_s);

$tpl->setVar("T_AGENT_FULL_NAME",   $p_agent_full_name);
$tpl->setVar("T_AGENT_DRE_LICENSE", $p_agent_dre_license);
$tpl->setVar("T_AGENT_PHONE",     $p_agent_phone);
$tpl->setVar("T_AGENT_EMAIL",     $p_agent_email);
$tpl->setVar("T_OFFICE_NAME",     $p_office_name);

$tpl->setVar("T_RECOMMANDED",     $content);

if($p_cap_rate != "") $tpl->setVar("CAP_RATE",true);
$tpl->setVar("T_CAP_RATE",                           $p_cap_rate);

if($p_rent_includes != "") $tpl->setVar("LEASE_INCLUDES",true);
$tpl->setVar("T_RENT_INCLUDES",                           $p_rent_includes);


if($p_security_features != "") $tpl->setVar("SECURITY",true);
$tpl->setVar("T_SECURITY_FEATURES",                           $p_security_features);

if($p_sewer != "") $tpl->setVar("SEWER",true);
$tpl->setVar("T_SEWER",                           $p_sewer);

if($comment_enable == "Y") {
    
    //$tpl->setVar("COMMENT",false);
    $tpl->setVar("MYCOMMENT", true);
    $tpl->setVar("T_AGENT_COMMENT",                           $p_agent_comment);    
}
else {

    if($p_agent_comment != "") $tpl->setVar("COMMENT",true);
    //$tpl->setVar("MYCOMMENT", false);
    $tpl->setVar("T_AGENT_COMMENT",                           nl2br($p_agent_comment));    
}


$tpl->setVar("T_OFFICE_LOGO",$v_logo_image_url);

$tpl->setVar("T_CALL",$to_phone);

$tpl->setVar("T_USER_NAME",$SS_NICKNAME);
$tpl->setVar("T_USER_EMAIL",$SS_EMAIL);
$tpl->setVar("T_USER_PHONE",$SS_PHONE);

$tpl->setLoop("T_LOOP", $realestate_list->loop);