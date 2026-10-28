<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class vehicle_regular_car_list
{

    private Db $db;
    private int $page;

    private string $s_state_code = "";
    private string $s_city_name = "";
    private string $s_kind = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    private int $no;
    private string $q_state_code = "";
    private string $q_city_name = "";

    public string $navigation_text = "";
    private string $s_car_maker = "";
    
    private string $s_min_car_year = "";
    private string $s_max_car_year = "";
    private string $s_listing_price_start = "";
    private string $s_listing_price_end = "";
    private string $s_car_mileage_start = "";
    private string $s_car_mileage_end = "";
    
    private string $q_car_maker = "";
    private string $q_car_year = "";
    private string $q_listing_price = "";
    private string $q_car_mileage = "";
    private string $s_community_car_dealers_id = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_car_maker = $fn_params['s_car_maker'];
        $this->s_min_car_year = $fn_params['s_min_car_year'];
        $this->s_max_car_year = $fn_params['s_max_car_year'];
        $this->s_community_car_dealers_id = $fn_params['s_community_car_dealers_id'];
        $this->s_listing_price_start = $fn_params['s_listing_price_start'];
        $this->s_listing_price_end = $fn_params['s_listing_price_end'];
        $this->s_car_mileage_start = $fn_params['s_car_mileage_start'];
        $this->s_car_mileage_end = $fn_params['s_car_mileage_end'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_car_maker != "-1" && $this->s_car_maker != "") {
            
            $array_check_car_maker = explode(",",$this->s_car_maker);    
            
            $multi_car_maker = "";
            
            for($j=0; $j<count($array_check_car_maker);$j++) {
            
                $check = $array_check_car_maker[$j];
            
                if($multi_car_maker == "") $multi_car_maker .= "(A.car_maker = '{$check}'";
                else $multi_car_maker .= " or A.car_maker = '{$check}'";            
            
            }

            $multi_car_maker .= ")";
            
            $this->q_car_maker = "AND {$multi_car_maker}";
        }
        
        if($this->s_min_car_year != "-1" && $this->s_min_car_year != "") {

            $this->q_min_car_year = "AND A.car_year >= '{$this->s_min_car_year}'";
        }
        
        if($this->s_max_car_year != "-1" && $this->s_max_car_year != "") {

            $this->q_max_car_year = "AND A.car_year <= '{$this->s_max_car_year}'";
        }
        
        if($this->s_listing_price_start != "" && $this->s_listing_price_start != "") {

            $this->q_listing_price_start = "AND A.listing_price >= {$this->s_listing_price_start}";
        }
        
        if($this->s_listing_price_end != "" && $this->s_listing_price_end != "") {

            $this->q_listing_price_end = " and A.listing_price <= {$this->s_listing_price_end} ";
        }

        if($this->s_car_mileage_start != "" && $this->s_car_mileage_start != "") {

            $this->q_car_mileage_start = "AND A.car_mileage >= {$this->s_car_mileage_start} ";
        }
        
        if($this->s_car_mileage_end != "" && $this->s_car_mileage_end != "") {

            $this->q_car_mileage_end = " and A.car_mileage <= {$this->s_car_mileage_end} ";
        }

        if($this->s_state_code != "-1" && $this->s_state_code != "") {

            $this->q_state_code = "AND A.state_code = '{$this->s_state_code}'";
        }
        if($this->s_city_name != "") {


            $this->q_city_name = "AND (";

            $array_city_name = explode(",", $this->s_city_name);

            for($i=0;$i<count($array_city_name); $i++) {

                $tt = "";
                if($i > 0) $tt = " OR ";
                $this->q_city_name .= $tt . "A.city_name = '".$array_city_name[$i]."' ";
            }

            $this->q_city_name .= ")";

        }

        if($this->s_keyword != "") {

            switch($this->s_kind) {

                case "options_description": $column = "A.options_description"; break;
                case "description":  $column = "A.description"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

        }

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from community_car_listings A where A.is_active = 1 and A.community_car_dealers_id = 0 
        {$this->q_car_maker} 
        {$this->q_min_car_year} 
        {$this->q_max_car_year} 
        {$this->q_listing_price_start} 
        {$this->q_listing_price_end} 
        {$this->q_car_mileage_start} 
        {$this->q_car_mileage_end} 
        {$this->q_state_code} 
        {$this->q_city_name} 
        {$this->q_keyword}";

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

        $row_sql = "SELECT A.* FROM community_car_listings A where A.is_active = 1 and A.community_car_dealers_id = 0 
        {$this->q_car_maker} 
        {$this->q_min_car_year} 
        {$this->q_max_car_year} 
        {$this->q_listing_price_start} 
        {$this->q_listing_price_end} 
        {$this->q_car_mileage_start} 
        {$this->q_car_mileage_end} 
        {$this->q_state_code} 
        {$this->q_city_name} 
        {$this->q_keyword}";
        $row_sql .= " order by A.community_car_listings_id desc Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "총 (".number_format($pagination->getTotal(),0).")개 [전체 :".number_format($this->page,0)."/".number_format($pagination->getTotalPage(),0)."] 페이지";

    }

    private function make_data() {

        $i = 0;

        $no = $this->no;

        $data = array();

        while ($row = $this->db->fetch()) {

            $location = $row->city_name . "," . $row->state_code;

            $data[$i] = array('id' => $row->community_car_listings_id, 'dealer' => $row->community_car_dealers_id,  'car_year' => $row->car_year, 'car_maker' => $row->car_maker, 'car_model' => $row->car_model,
                'car_color' => $row->car_color, 'car_mileage' => number_format($row->car_mileage, 0), 'listing_price' => number_format($row->listing_price, 0),'body_type' => $row->body_type,                
                 'location' => $location,  'fuel_type' => $row->fuel_type, 'car_color' => $row->car_color, 'transmission' => $row->transmission,
                'created_at' => DATETOSTRING_USA2($row->created_at,"/"), 'created_user' => $row->created_user, 'view_count' => $row->view_count);

            $i++;
        }

        for ($i = 0; $i < count($data); $i++) {

            $id = $data[$i]['id'];
            $car_maker = $data[$i]['car_maker'];
            $car_year = $data[$i]['car_year'];
            $car_model = $data[$i]['car_model'];
            $car_mileage = $data[$i]['car_mileage'];
            $listing_price = $data[$i]['listing_price'];
            $body_type = $data[$i]['body_type'];
            $fuel_type = $data[$i]['fuel_type'];
            $car_color = $data[$i]['car_color'];
            $transmission = $data[$i]['transmission'];
            $created_at = $data[$i]['created_at'];
            $created_user = $data[$i]['created_user'];
            $view_count = $data[$i]['view_count'];
            $sql = "SELECT community_car_listing_images_id, image_url FROM community_car_listing_images WHERE is_active = 1 AND community_car_listings_id = " . $id . " order by image_order asc";
            $row = $this->db->queryRow($sql, []);
            $image_url = $row->image_url;
            $images_id = $row->community_car_listing_images_id;

            if ($data[$i]['dealer'] > 0) $link = "vehicle_dealer_view.php?id=" . $id;
            else $link = "vehicle_regular_view.php?id=" . $id;

            $blank_img = "/images/blank.png";
            if ($image_url != "") {
                $img_no = "img" .$images_id;
                $main_img = $this->define_val->IMG_PROTECT . "?c=community&cc=vehicle&d=".$img_no."&s=" . $id;
            } else {
                $main_img = $blank_img;
            }
            
            $car_maker = ARRAY_RETURN($this->define_val->DEFINE_vehicle_car_maker, $car_maker);
            $car_year = ARRAY_RETURN($this->define_val->DEFINE_vehicle_car_year, $car_year);
            $body_type = ARRAY_RETURN($this->define_val->DEFINE_vehicle_body_type, $body_type);
            
            $fuel_type = ARRAY_RETURN($this->define_val->DEFINE_vehicle_fuel_type, $fuel_type);
            $transmission = ARRAY_RETURN($this->define_val->DEFINE_vehicle_transmission, $transmission);
            $car_color = ARRAY_RETURN($this->define_val->DEFINE_vehicle_car_color, $car_color);
            
            $this->loop[$i] = array('T_NO' => $no, 'T_LINK' => $link, 'T_IMG' => $main_img, 'T_CAR_YEAR' => $car_year, 'T_CAR_MAKER' => $car_maker, 'T_CAR_YEAR_PURE' => $data[$i]['car_year'], 'T_CAR_MAKER_PURE' => $data[$i]['car_maker'], 
                'T_CAR_MODEL' => $car_model, 'T_CAR_COLOR' => $car_color, 'T_CAR_MILEAGE' => $car_mileage, 'T_LISTING_PRICE' => $listing_price, 'T_BODY_TYPE' => $body_type, 'T_LOCATION' => $location,
                'T_FUEL_TYPE' => $fuel_type, 'T_CAR_COLOR' => $car_color, 'T_TRANSMISSION' => $transmission, 'T_CREATED_AT' => $created_at, 'T_CREATED_USER' => $created_user,'T_VIEW_COUNT' => $view_count);

            $no--;
        }

    }
}

