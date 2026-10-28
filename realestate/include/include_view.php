<?php
    
$sql = "SELECT A.*, B.agent_full_name, B.agent_dre_license, B.agent_phone, B.agent_email, B.user_id, C.office_name, C.logo_image_url, C.office_key, C.office_phone
        FROM realestate_listing A
        left join realestate_agents B ON A.list_agent_key = B.agent_key
        left join realestate_office C ON A.list_office_key = C.office_key
        WHERE A.realestate_listing_id = :realestate_listing_id
        limit 0,1
        ";

$placeholders = ['realestate_listing_id' => $id];

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


$p_listing_key              = $row->listing_key;
$p_listing_id               = $row->listing_id;
$p_standard_status          = $row->standard_status;
$p_mls_status               = $row->mls_status;
$p_property_type            = $row->property_type;
$p_property_sub_type        = $row->property_sub_type;
$p_list_price               = $row->list_price;
$p_original_list_price      = $row->original_list_price;
$p_close_price              = $row->close_price;
$p_listing_contract_date    = $row->listing_contract_date;
$p_on_market_date           = $row->on_market_date;
$p_close_date               = $row->close_date;
$p_days_on_market = $row->days_on_market;
$p_street_number = $row->street_number;
$p_street_name = $row->street_name;
$p_street_suffix = $row->street_suffix;
$p_unparsed_address = $row->unparsed_address;
$p_city = $row->city;
$p_state_or_province = $row->state_or_province;
$p_postal_code = $row->postal_code;
$p_county_or_parish = $row->county_or_parish;
$p_bedrooms_total = $row->bedrooms_total;
$p_bathrooms_total = $row->bathrooms_total;
$p_bathrooms_full = $row->bathrooms_full;
$p_bathrooms_half = $row->bathrooms_half;
$p_living_area = $row->living_area;
$p_lot_size_sqft = $row->lot_size_sqft;
$p_lot_size_acres = $row->lot_size_acres;
$p_lot_features = $row->lot_features;
$p_building_area_total = $row->building_area_total;
$p_year_built = $row->year_built;
$p_levels = $row->levels;
$p_stories_total = $row->stories_total;
$p_latitude = $row->latitude;
$p_longitude = $row->longitude;
$p_covered_spaces = $row->covered_spaces;
$p_garage_spaces = $row->garage_spaces;
$p_parking_total = $row->parking_total;
$p_parking_features = $row->parking_features;
$p_carport_yn = $row->carport_yn;
$p_carport_spaces = $row->carport_spaces;
$p_open_parking_spaces = $row->open_parking_spaces;
$p_uncovered_spaces = $row->uncovered_spaces;
$p_subdivision_name = $row->subdivision_name;
$p_high_school_district = $row->high_school_district;
$p_elementary_school = $row->elementary_school;
$p_middle_or_junior_school = $row->middle_or_junior_school;
$p_high_school = $row->high_school;
$p_list_agent_key = $row->list_agent_key;
$p_buyer_agent_key = $row->buyer_agent_key;
$p_list_office_key = $row->list_office_key;
$p_buyer_office_key = $row->buyer_office_key;
$p_association_fee = $row->association_fee;
$p_association_fee_frequency = $row->association_fee_frequency;
$p_association_fee_includes = $row->association_fee_includes;
$p_tax_annual_amount = $row->tax_annual_amount;
$p_special_listing_conditions = $row->special_listing_conditions;
$p_lease_term = $row->lease_term;
$p_lease_amount = $row->lease_amount;
$p_lease_amount_frequency = $row->lease_amount_frequency;
$p_internet_entire_listing_display_yn = $row->internet_entire_listing_display_yn;
$p_internet_address_display_yn = $row->internet_address_display_yn;
$p_water_source = $row->water_source;
$p_zoning = $row->zoning;
$p_zoning_description = $row->zoning_description;
$p_pool_features = $row->pool_features;
$p_cooling = $row->cooling;
$p_heating = $row->heating;
$p_appliances = $row->appliances;
$p_laundry_features = $row->laundry_features;
$p_interior_features = $row->interior_features;
$p_units_total  = $row->units_total;
$p_business_type = $row->business_type;
$p_public_remarks = $row->public_remarks;
$p_private_remarks = $row->private_remarks;
$p_gross_income = $row->gross_income;
$p_net_operating_income = $row->net_operating_income;
$p_operating_expense = $row->operating_expense;
$p_development_status = $row->development_status;
$p_number_of_buildings = $row->number_of_buildings;
$p_road_frontage_type = $row->road_frontage_type;
$p_road_surface_type = $row->road_surface_type;
$p_property_condition = $row->property_condition;
$p_utilities = $row->utilities;
$p_cap_rate = $row->cap_rate;
$p_rent_includes = $row->rent_includes;
$p_security_features = $row->security_features;
$p_sewer = $row->sewer;
$p_agent_comment = $row->agent_comment;

$p_agent_full_name                  = $row->agent_full_name;
$p_agent_dre_license                = $row->agent_dre_license;
$p_agent_phone                      = $row->agent_phone;
$p_agent_email                      = $row->agent_email;
$p_office_name                      = $row->office_name;
$p_user_id                          = $row->user_id;
$p_is_show_website                  = $row->is_show_website;
$p_office_key                       = $row->office_key;
$p_office_phone                     = $row->office_phone;
$p_logo_image_url                   = $row->logo_image_url;
$p_has_active_advertisement         = $row->has_active_advertisement;
$p_is_approved                      = $row->is_approved;

$to_phone = $p_office_phone;

// 에이전트 광고낸사람
if($p_has_active_advertisement  == 1 && $p_is_approved == 1) {
    $to_phone = $p_agent_phone;
}

// colewell 인경우
if($p_list_office_key == "3288918" || $p_list_office_key == "3285640" || $p_list_office_key == "3286864" || $p_list_office_key == "5602073") {
    
    $to_phone = $p_agent_phone;
    
}

$v_logo_image_url = "";
if ($p_logo_image_url != "") {
    $v_logo_image_url = $define_val->IMG_PROTECT . "?c=realestate&cc=office&d=logo&s=" . $p_office_key;    
    $v_logo_image_url = "<img style=\"max-width:200px; max-height:50px;\" src=\"$v_logo_image_url\" data-src=\"$v_logo_image_url\" alt=\"$p_office_name\" data-uc-img=\"loading: lazy\">";
} 

$update_enable = "N";
$comment_enable = "N";

// 에이전트가 수동으로 입력한 경우 M_로 시작
//if (str_starts_with($p_listing_key, 'M_')) {   
if($p_is_show_website == 1) {
    if($p_user_id != "" && $p_user_id == $SS_ID) { 
        $update_enable = "Y";
        $comment_enable = "Y";
    }
}
else {
    if($p_user_id != "" && $p_user_id == $SS_ID) $comment_enable = "Y";
}

// ── 미디어(이미지) 목록 조회 ───────────────────────────────────────────
$sql_media = "SELECT realestate_listing_media_id,media_key, media_url, media_order, media_type, is_primary, is_show_website
              FROM realestate_listing_media
              WHERE realestate_listing_id = :realestate_listing_id and (media_type = 'Jpeg' or media_type = 'jpg' or media_type = 'png')
              ORDER BY media_order ASC";

$db->query($sql_media, ['realestate_listing_id' => $id]);

$loop = array();
$media_idx  = 0;
$html = "";
$html_s = "";
while ($mrow = $db->fetch()) {
    $realestate_listing_media_id = $mrow->realestate_listing_media_id;
    $is_show_website = $mrow->is_show_website;
    $v_media_url = "";
    if ($mrow->media_url != "" || $is_show_website == 1) {        
        
        if($is_show_website == 1) {
            $img_url = $define_val->IMG_PROTECT ."?c=realestate&cc=realestate&d=img".$realestate_listing_media_id."&s=".$id;
        }
        else {
            $img_url = $mrow->media_url."?preset=X-Large";
        }
        
        $css ="<div class=\"swiper-slide\" style=\"width: 592px; margin-right: 8px;\" role=\"group\" aria-label=\"$media_idx\">";
        $css_s = "<div class=\"swiper-slide\" style=\"width: 112px; margin-right: 8px;\" role=\"group\" aria-label=\"$media_idx\">";
        
        if($media_idx == 0) {
            $css = "<div class=\"swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active\" style=\"width: 592px; margin-right: 8px;\" role=\"group\" aria-label=\"$media_idx\">";
            $css_s = "<div class=\"swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active swiper-slide-thumb-active\" style=\"width: 112px; margin-right: 8px;\" role=\"group\" aria-label=\"$media_idx\">";
        }
        else if($media_idx == 1) {
            $css = "<div class=\"swiper-slide swiper-slide-next\" style=\"width: 592px; margin-right: 8px;\" role=\"group\" aria-label=\"$media_idx\">";
            $css_s = "<div class=\"swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-next\" style=\"width: 112px; margin-right: 8px;\" role=\"group\" aria-label=\"$media_idx\">";
        }
             
        $html .= $css . "
                <div class=\"product type-product\">
                        <figure class=\"featured-image m-0 ratio ratio-3x2 uc-transition-toggle overflow-hidden bg-gray-25\">
                            <img class=\"media-cover image uc-transition-opaque\" src=\"".$img_url."\" data-src=\"".$img_url."\" alt=\"#\" data-uc-img=\"loading: lazy\">
                        </figure>
                    </div>
                </div>
                ";
                
        $html_s .= $css_s . "
                    <div class=\"product type-product h-100\">
                        <figure class=\"featured-image m-0 ratio ratio-3x2 uc-transition-toggle overflow-hidden bg-gray-25\">
                           <img class=\"media-cover image uc-transition-opaque\" src=\"".$img_url."\" data-src=\"".$img_url."\" alt=\"#\" data-uc-img=\"loading: lazy\">
                        </figure>
                    </div>
                </div>
                ";    
                
        $media_idx++;    
    }
    
}

// ── 가격 포맷 ─────────────────────────────────────────────────────────
function fmt_price($val) {
    return ($val !== null && $val !== '') ? '$' . number_format($val, 2) : '';
}

function fmt_price_zero($val) {
    return ($val !== null && $val !== '') ? '$' . number_format($val, 0) : '';
}

function fmt_yn($val) {
    return ($val == 1) ? 'Y' : 'N';
}
