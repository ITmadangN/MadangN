<?php

namespace user_service;


use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class realestate_list
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

    public array $loop = array();
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
    
        if($this->s_property_type != "-1" && $this->s_property_type != "") {

            $q = "AND A.property_type ='{$this->s_property_type}'";
            
            $this->q_property_type = $q;
        }
        else {
            
            // 에어전트 이면 전체를 가져와야 하므로 Pass
            if($this->agent_key == "" && $this->office_key == "") {
                
                switch($this->s_menu) {
                    case "House": $q = "AND (A.property_type ='ManufacturedInPark' or A.property_type = 'Residential')";    break;
                    case "Rental": $q = "AND (A.property_type ='CommercialLease' or A.property_type = 'ResidentialLease')";  break;
                    case "Commercial": $q = "AND (A.property_type = 'CommercialSale' or A.property_type ='Land' or A.property_type = 'ResidentialIncome')";  break;
                    case "Business": $q = "AND (A.property_type ='BusinessOpportunity')";  break;
                }
                
                $this->q_property_type = $q;
                
            }
        }
        
        if($this->s_property_sub_type != "-1" && $this->s_property_sub_type != "") {

            $this->q_property_sub_type = "AND A.property_sub_type = '{$this->s_property_sub_type}'";
        }

        if($this->s_state_code != "-1" && $this->s_state_code != "") {
            
            // 강제로 NJ추가 , 프로그램 예외처리
            if($this->s_nynj == 'Y' && $this->s_state_code == 'NY') $this->q_state_code = "AND (A.state_or_province = '{$this->s_state_code}' or A.state_or_province = 'NJ')";
            else $this->q_state_code = "AND A.state_or_province = '{$this->s_state_code}'";
        }
        if($this->s_city_name != "") {


            $this->q_city_name = "AND (";

            $array_city_name = explode(",", $this->s_city_name);

            for($i=0;$i<count($array_city_name); $i++) {

                $tt = "";
                if($i > 0) $tt = " OR ";
                $this->q_city_name .= $tt . "A.city = '".$array_city_name[$i]."' ";
            }

            $this->q_city_name .= ")";

        }
        
        if($this->s_listing_price_start != "") {

            $this->q_listing_price_start = "AND A.list_price >= {$this->s_listing_price_start} ";
        }
        
        if($this->s_listing_price_end != "") {

            $this->q_listing_price_end = "AND A.list_price <= {$this->s_listing_price_end} ";
        }

        if($this->s_bedrooms_total != "" && $this->s_bedrooms_total != "") {

            //$this->q_bedrooms_total = "AND A.bedrooms_total >= {$this->s_bedrooms_total} and A.bedrooms_total <= {$this->s_bedrooms_total} ";
            $this->q_bedrooms_total = "AND A.bedrooms_total = {$this->s_bedrooms_total}";
        }
        
         if($this->s_bathrooms_total != "" && $this->s_bathrooms_total != "") {

            //$this->q_bathrooms_total = "AND A.bathrooms_total >= {$this->s_bathrooms_total} and A.bathrooms_total <= {$this->s_bathrooms_total} ";
            $this->q_bathrooms_total = "AND A.bathrooms_total = {$this->s_bathrooms_total} ";
        }
        
        if($this->agent_key != "") {
            
            // agent의 DRE를 구해서 에이전트에 해당하는 agent_key를 구한다.
            
            $agent_key_merge = GET_AGENT_KEY($db,$this->agent_key);
            
            $this->q_agent = "AND A.list_agent_key in({$agent_key_merge})";
        }
                
        if($this->office_key != "") {
            
            $this->q_office_key = "AND A.list_office_key = '{$this->office_key}' ";
        }

        /*
        if($this->s_keyword != "") {

            switch($this->s_kind) {

                case "title": $column = "A.title"; break;
                case "content":  $column = "A.content"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

        }
        */

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from realestate_listing A where A.is_active = 1 
                        {$this->q_property_type} 
                        {$this->q_property_sub_type} 
                        {$this->q_state_code} 
                        {$this->q_city_name} 
                        {$this->q_listing_price_start} 
                        {$this->q_listing_price_end} 
                        {$this->q_bedrooms_total} 
                        {$this->q_bathrooms_total}      
                        {$this->q_agent}
                        {$this->q_office_key}
                        ";
        
        $row_sql = "SELECT A.* FROM realestate_listing A where A.is_active = 1
                        {$this->q_property_type} 
                        {$this->q_property_sub_type} 
                        {$this->q_state_code} 
                        {$this->q_city_name} 
                        {$this->q_listing_price_start} 
                        {$this->q_listing_price_end} 
                        {$this->q_bedrooms_total} 
                        {$this->q_bathrooms_total}             
                        {$this->q_agent}
                        {$this->q_office_key}
                        ";
                     
        $pagination = new Pagination(
            $this->db,
            $count_sql,
            '',
            $this->page,
            $this->page_set,
            $this->block_set
        );

        $this->paging = $pagination->Print_Paging();
        
        $this->no = $pagination->no;
        
        if($this->random == "Y") {
            $row_sql = $row_sql." and A.list_office_key in ('3288918','3285640','3286864','5602073')";                      
            $row_sql = $row_sql . "UNION
                                   select A.* from realestate_agents B
                                        left join realestate_listing A  on B.agent_key = A.list_agent_key
                                        where A.is_active = 1 and (B.is_approved =1 and B.has_active_advertisement = 1)
                                    AND (A.property_type ='ManufacturedInPark' or A.property_type = 'Residential') 
                                    order by RAND() LIMIT ".$this->page_set;                                    
        }
        else {            
            if($this->agent_key != "" || $this->office_key != "") {
                $row_sql .= " order by FIELD(A.property_type, 'ManufacturedInPark', 'Residential', 'CommercialLease', 'ResidentialLease', 'CommercialSale','Land','ResidentialIncome','BusinessOpportunity')";                
            }
            else {
                $row_sql .= " order by A.is_coldwell desc, A.standard_status asc , A.listing_contract_date desc";            
            }
            
            $row_sql .= " LIMIT " . $pagination->limit_regno . ", " . $pagination->page_set;   
        }
        
        $this->db->query($row_sql);
                
        // ③ 메인 결과를 배열에 담기
        $rows = [];
        while ($row = $this->db->fetch()) {
            $rows[] = $row;
        }

        // ④ realestate_listing_id 목록 추출
        $ids = [];
        foreach ($rows as $row) {
            $ids[] = $row->realestate_listing_id;
        }

        // ⑤ 미디어 정보를 IN 쿼리로 한 번에 조회
        $media_map = [];
        if (!empty($ids)) {
            $id_list = implode(",", $ids);
            $media_sql = "
                SELECT realestate_listing_id, realestate_listing_media_id,  media_url, created_at, is_show_website
                FROM realestate_listing_media
                WHERE is_primary = 1 and (media_type = 'Jpeg' or media_type = 'jpg' or media_type = 'png' or media_type = 'gif')
                AND realestate_listing_id IN ($id_list)
                group by realestate_listing_id
                -- limit 0,1
            ";
            
            $this->db->query($media_sql);
// saveLog("./realestate_log.txt" , $media_sql);

            while ($media = $this->db->fetch()) {
                $media_map[$media->realestate_listing_id] = $media;
            }
        }

        // ⑥ 두 결과를 합쳐서 최종 데이터 생성
        $this->make_data($rows, $media_map);

    }

    private function make_data(array $rows, array $media_map) {

       
        
        $i = 0;

        $no = $this->no;

        foreach ($rows as $row) {
            
            $img = "/images/blank.png";
            
            if (isset($media_map[$row->realestate_listing_id])) {
                $media = $media_map[$row->realestate_listing_id];                                
            
       
                if ($media->media_url != "") {
                    
                    $is_show_website = $media->is_show_website;
                    
                    if($is_show_website == 1) {
                        $img = $this->define_val->IMG_PROTECT ."?c=realestate&cc=realestate&d=img".$media->realestate_listing_media_id."&s=".$media->realestate_listing_id;
                    }
                    else {
                        $img = $media->media_url;
                    }
                    
                    
                }
                $created_at = $media->created_at;
            }
           
            
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
                        
            
            // 에이전트일경우 해당 메뉴로 이동한다.
            if($this->php_view == "") $this->php_view = $temp_php_view;
            
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
            
            $this->loop[$i] = array(
                'T_NUM' => $i+1,
                'T_LISTING_KEY' => $row->listing_key,
                'T_NO' => $no,
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
                        
            $i++;
            $no--;
        }
    }
}

