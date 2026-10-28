<?php

namespace user_service;


use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class realestate_list_index
{

    private Db $db;
    private int $page;

    private string $s_menu = "";
    private string $s_state_code = "";
    private string $s_city_name = "";
    private string $s_listing_price_start = "";
    private string $s_listing_price_end = "";
    private string $s_bedrooms_total = "";    
    private string $s_bathrooms_total = "";    
    private string $s_property_type = "";
    private string $s_property_sub_type = "";   // 세부 타입
    
    
    private string $s_kind = "";
    private string $s_keyword = "";
    private string $s_nynj = "";
    
    private string $agent_key = "";   
    private string $office_key = "";
    
    private string $php_view = "";

    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop_house = array();
    public array $loop_rent = array();
    public array $loop_commercial = array();
    public array $loop_business = array();
    public string $paging;              

    private string $q_state_code = "";
    private string $q_city_name = "";       
    private string $q_listing_price_start = "";
    private string $q_listing_price_end = "";
    private string $q_bedrooms_total = "";
    private string $q_bathrooms_total = "";
    private string $q_property_type = "";
    private string $q_property_sub_type = "";
    private string $q_keyword = "";
    private string $q_agent = "";
    private string $q_office_key = "";    
    
    private int $no;
    
    private string $random = "N";

    public string $navigation_text = "";    


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_menu = $fn_params['s_menu'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_listing_price_start = $fn_params['s_listing_price_start'];
        $this->s_listing_price_end = $fn_params['s_listing_price_end'];        
        $this->s_bedrooms_total = $fn_params['s_bedrooms_total'];        
        $this->s_bathrooms_total = $fn_params['s_bathrooms_total'];
        $this->s_property_type = $fn_params['s_property_type'];
        $this->s_property_sub_type = $fn_params['s_property_sub_type'];
        
        
        // 에이전트 매물리스트
        $this->agent_key = $fn_params['agent_key'];
        $this->office_key = $fn_params['office_key'];
        
        $this->php_view = $fn_params['php_view'];
        
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        $this->random = $fn_params['random'];
        $this->s_nynj = $fn_params['s_nynj'];
    
        
        $this->init();
    }

    private function init() {

        /*
        $row_sql = "(
                        SELECT
                            A.*,
                            'House' as menu_type,
                            M.realestate_listing_media_id,
                            M.media_url,
                            M.created_at AS media_created_at,
                            M.is_show_website AS media_is_show_website
                        FROM realestate_listing AS A
                        INNER JOIN realestate_listing_media AS M
                            ON M.realestate_listing_id = A.realestate_listing_id
                            AND M.is_primary = 1
                            AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
                        WHERE
                            A.is_active = 1
                            AND A.property_type IN ('ManufacturedInPark', 'Residential')
                            AND A.realestate_listing_id >= (
                                SELECT FLOOR(RAND() * MAX(realestate_listing_id))
                                FROM realestate_listing
                            )
                        ORDER BY A.realestate_listing_id
                        LIMIT {$this->page_set}
                    )

                    UNION ALL

                    (
                        SELECT
                            A.*,
                            'rent' as menu_type,
                            M.realestate_listing_media_id,
                            M.media_url,
                            M.created_at AS media_created_at,
                            M.is_show_website AS media_is_show_website
                        FROM realestate_listing AS A
                        INNER JOIN realestate_listing_media AS M
                            ON M.realestate_listing_id = A.realestate_listing_id
                            AND M.is_primary = 1
                            AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
                        WHERE
                            A.is_active = 1
                            AND A.property_type IN ('CommercialLease', 'ResidentialLease')
                            AND A.realestate_listing_id >= (
                                SELECT FLOOR(RAND() * MAX(realestate_listing_id))
                                FROM realestate_listing
                            )
                        ORDER BY A.realestate_listing_id
                        LIMIT {$this->page_set}
                    )

                    UNION ALL

                    (
                        SELECT
                            A.*,
                            'Commercial' as menu_type,
                            M.realestate_listing_media_id,
                            M.media_url,
                            M.created_at AS media_created_at,
                            M.is_show_website AS media_is_show_website
                        FROM realestate_listing AS A
                        INNER JOIN realestate_listing_media AS M
                            ON M.realestate_listing_id = A.realestate_listing_id
                            AND M.is_primary = 1
                            AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
                        WHERE
                            A.is_active = 1
                            AND A.property_type IN ('CommercialSale', 'Land', 'ResidentialIncome')
                            AND A.realestate_listing_id >= (
                                SELECT FLOOR(RAND() * MAX(realestate_listing_id))
                                FROM realestate_listing
                            )
                        ORDER BY A.realestate_listing_id
                        LIMIT {$this->page_set}
                    )

                    UNION ALL

                    (
                        SELECT
                            A.*,
                            'Business' as menu_type,
                            M.realestate_listing_media_id,
                            M.media_url,
                            M.created_at AS media_created_at,
                            M.is_show_website AS media_is_show_website
                        FROM realestate_listing AS A
                        INNER JOIN realestate_listing_media AS M
                            ON M.realestate_listing_id = A.realestate_listing_id
                            AND M.is_primary = 1
                            AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
                        WHERE
                            A.is_active = 1
                            AND A.property_type = 'BusinessOpportunity'
                            AND A.realestate_listing_id >= (
                                SELECT FLOOR(RAND() * MAX(realestate_listing_id))
                                FROM realestate_listing
                            )
                        ORDER BY A.realestate_listing_id
                        LIMIT {$this->page_set}
                    )
";
        */
        $row_sql = "
        (
            SELECT
                A.*,
                'House' as menu_type,
                M.realestate_listing_media_id,
                M.media_url,
                M.created_at AS media_created_at,
                M.is_show_website AS media_is_show_website,
                '1' AS property_group
            FROM realestate_listing AS A
            INNER JOIN realestate_listing_media AS M
                ON M.realestate_listing_id = A.realestate_listing_id
                AND M.is_primary = 1
                AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
            WHERE
                A.is_active = 1
                AND A.property_type IN ('ManufacturedInPark', 'Residential')
                and (A.list_office_key = '3288918' or A.list_office_key = '3285640' or A.list_office_key = '3286864')
            ORDER BY A.listing_contract_date DESC
            LIMIT {$this->page_set}
        )

        UNION ALL

        (
            SELECT
                A.*,
                'Rent' as menu_type,
                M.realestate_listing_media_id,
                M.media_url,
                M.created_at AS media_created_at,
                M.is_show_website AS media_is_show_website,
                '2' AS property_group
            FROM realestate_listing AS A
            INNER JOIN realestate_listing_media AS M
                ON M.realestate_listing_id = A.realestate_listing_id
                AND M.is_primary = 1
                AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
            WHERE
                A.is_active = 1
                AND A.property_type IN ('CommercialLease', 'ResidentialLease')
                and (A.list_office_key = '3288918' or A.list_office_key = '3285640' or A.list_office_key = '3286864')
            ORDER BY A.listing_contract_date DESC
            LIMIT {$this->page_set}
        )

        UNION ALL

        (
            SELECT
                A.*,
                'Commercial' as menu_type,
                M.realestate_listing_media_id,
                M.media_url,
                M.created_at AS media_created_at,
                M.is_show_website AS media_is_show_website,
                '3' AS property_group
            FROM realestate_listing AS A
            INNER JOIN realestate_listing_media AS M
                ON M.realestate_listing_id = A.realestate_listing_id
                AND M.is_primary = 1
                AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
            WHERE
                A.is_active = 1
                AND A.property_type IN ('CommercialSale', 'Land', 'ResidentialIncome')
                and (A.list_office_key = '3288918' or A.list_office_key = '3285640' or A.list_office_key = '3286864')                
            ORDER BY A.listing_contract_date DESC
            LIMIT {$this->page_set}
        )

        UNION ALL

        (
            SELECT
                A.*,
                'Business' as menu_type,
                M.realestate_listing_media_id,
                M.media_url,
                M.created_at AS media_created_at,
                M.is_show_website AS media_is_show_website,
                '4' AS property_group
            FROM realestate_listing AS A
            INNER JOIN realestate_listing_media AS M
                ON M.realestate_listing_id = A.realestate_listing_id
                AND M.is_primary = 1
                AND M.media_type IN ('Jpeg', 'jpg', 'png', 'gif')
            WHERE
                A.is_active = 1
                AND A.property_type = 'BusinessOpportunity'
                and A.list_office_key = '3288918'                
            ORDER BY A.listing_contract_date DESC
            LIMIT {$this->page_set}
        );
        ";
                     
        
        
        $this->db->query($row_sql);
      
      
        $this->make_data();

    }

    private function make_data() {

       
        
        $house_i = -1;
        $rent_i = -1;
        $commercial_i = -1;
        $business_i = -1;

        while ($row = $this->db->fetch()) {
            
            $img = "/images/blank.png";
            
            
            if ($row->media_url != "") {
                
                $is_show_website = $row->media_is_show_website;
                
                if($is_show_website == 1) {
                    $img = $this->define_val->IMG_PROTECT ."?c=realestate&cc=realestate&d=img".$row->realestate_listing_media_id."&s=".$row->realestate_listing_id;
                }
                else {
                    $img = $row->media_url;
                }
                
                
            }
            $created_at = $row->created_at;
        
            
            $property_type = ARRAY_RETURN($this->define_val->DEFINE_realstate_property_type, $row->property_type);
                                
            $property_sub_type = ARRAY_RETURN($this->define_val->DEFINE_realestate_property_sub_type_all, $row->property_sub_type);            
            
            if($row->bedrooms_total == "" || $row->bedrooms_total == "0") $beds = "<span> - Beds </span>";
            else $beds = "<span>".(float)$row->bedrooms_total." Beds </span>";
            
            if($row->bathrooms_total == "" || $row->bathrooms_total == "0") $baths = "<span> - Baths </span>";
            else $baths = "<span>". (float)$row->bathrooms_total." Baths </span>";
            
            
            $t_3rd = "";
            $temp_php_view = "";
            $temp_list_price_option = "";
            $temp_site_property = "";
            
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

            
            $public = "
                                    <div>
                                       <img src=\"/realestate/images/bed.svg\" data-src=\"/realestate/images/bed.svg\" alt=\"\" /> $beds</span>
                                    </div>
                                    <div>
                                        <img src=\"/realestate/images/bath.svg\" data-src=\"/realestate/images/bath.svg\" alt=\"\" /> $baths </span>
                                    </div>
                                    <div>
                                       <span>&nbsp;".$t_3rd."<!-- , {{T_LOOP.T_PROPERTY_SUB_TYPE}} --> </span>
                                    </div>
            ";
            
            if($row->property_type == "Land") {
                
                $public = "                                    
                                    <div>
                                       <span>&nbsp;".$t_3rd."<!-- , {{T_LOOP.T_PROPERTY_SUB_TYPE}} --> </span>
                                    </div>
                ";
                
            }
            
            if($row->menu_type == "House") {$loop = &$this->loop_house; $i = $house_++; }
            if($row->menu_type == "Rent") {$loop = &$this->loop_rent; $i = $house_++; }
            if($row->menu_type == "Commercial") {$loop = &$this->loop_commercial; $i = $house_++; }
            if($row->menu_type == "Business") {$loop = &$this->loop_business; $i = $house_++; }
            
            $loop[$i] = array(
                'T_NUM' => $i+1,
                'T_LISTING_KEY' => $row->listing_key,
                'T_NO' => '',
                'T_LINK' => $link,
                'T_IMG' => $img,
                'T_PROPERTY_TYPE' => $property_type,
                'T_SITE_PROPERTY_NAME' =>  $temp_site_property,
                'T_PROPERTY_SUB_TYPE' => $property_sub_type,
                'T_LOCATION' => $row->city . "," . $row->state_or_province,
                'T_UNPARSED_ADDRESS' => $row->unparsed_address . ", " . $row->city . ", " . $row->state_or_province . " " . $row->postal_code,
                'T_3RD' => $t_3rd,
                'T_LIST_PRICE' => number_format($row->list_price,0) . $temp_list_price_option,
                'T_BEDROOMS_TOTAL' => $beds,
                'T_YEAR_BUILT' => $row->year_built,             // 건축년도
                'T_LIVING_AREA' => $row->living_area,           // sqft 실내면적
                'T_LOT_SIZE_SQFT' => number_format($row->lot_size_sqft,0),       //sqft 대지면적
                'T_LOT_SIZE_ACRES' => $row->lot_size_acres,     // acre 대지면적
                'T_BUILDING_AREA_TOTAL' => $row->building_area_total, // 건축전체면적
                'T_ASSOCIATION_FEE' => $row->association_fee,   //HOA 비용
                'T_TAX_ANNUAL_AMOUNT' => $row->tax_annual_amount, // 연간 제산세                
                'T_BATHROOMS_TOTAL' => $baths,
                'T_YEAR_BUILT' => $row->year_built,
                'T_CREATE_AT' => DATETOSTRING_USA2($created_at, "/"),
                'T_ACTIVE_IMG' => $is_active_img,
                'T_IS_ACTIVE' => $row->standard_status,
                'T_FEATURE' => $public
            );
                                 
            
        }
    }

}

