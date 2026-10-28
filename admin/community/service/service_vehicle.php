<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class vehicle_list
{

    private Db $db;
    private Db $db2;
    private int $page;

    private string $s_state_code = "";
    private string $s_city_name = "";
    private string $s_kind = "";
    private string $s_keyword = "";
    private string $s_dealer_yn = "";
    private int $page_set;
    private int $block_set;
    private string $s_is_active = "";
    private string $q_is_active = "";
    private string $s_is_modify_yn = "";
    private string $q_is_modify_yn = "";

    private define_val $define_val;

    public array $loop = array();
    public string $paging;
    public string $navigation_text = "";

    private string $q_state_code = "";    
    private string $q_city_name = "";
    private string $q_keyword = "";
    private string $q_dealer_yn = "";
    private int $no;

    public function __construct(Db $db, Db $db2, define_val $define_val, array $fn_params)
    {
        $this->db = $db;
        $this->db2 = $db2;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_is_modify_yn = $fn_params['s_is_modify_yn'];
        $this->s_dealer_yn = $fn_params['s_dealer_yn'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        
        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }
        
        /*
        if($this->s_is_modify_yn != "-1" && $this->s_is_modify_yn != "") {

            $this->q_is_modify_yn = "AND A.is_modify_yn = '{$this->s_is_modify_yn}'";
        } 
        */
        
        
        if($this->s_dealer_yn != "" && $this->s_dealer_yn != "-1") {

            if($this->s_dealer_yn == 'Y') $this->q_dealer_yn = "AND A.community_car_dealers_id > 0";
            if($this->s_dealer_yn == 'N')  $this->q_dealer_yn = "AND A.community_car_dealers_id = 0";
            
        }

        if ($this->s_state_code != "-1" && $this->s_state_code != "") {
            $this->q_state_code = "AND A.state_code = '{$this->s_state_code}'";
        }

        if ($this->s_city_name != "-1" && $this->s_city_name != "") {
            $this->q_city_name = "AND A.city_name = '{$this->s_city_name}'";
        }

        if ($this->s_keyword != "") {

            $column = "A.seller_name";

            switch ($this->s_kind) {

                case "name":
                    $column = "A.seller_name";
                    break;
                case "description":
                    $column = "A.description";
                    break;
                case "year":
                    $column = "A.car_year";
                    break;
            }

            $temp = addslashes($this->s_keyword) . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (A.seller_name like '$temp' OR A.description like '$temp' OR A.car_year like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {
        $count_sql = "SELECT count(*) as cnt FROM community_car_listings A
                        left join community_car_dealers B
                        on A.community_car_dealers_id = B.community_car_dealers_id      
                        WHERE 1=1 {$this->q_is_active} {$this->q_is_modify_yn} {$this->q_dealer_yn} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";

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

        $row_sql = "SELECT A.*, B.company_name FROM community_car_listings A
                    left join community_car_dealers B
                    on A.community_car_dealers_id = B.community_car_dealers_id        
                    WHERE 1=1 {$this->q_is_active} {$this->q_is_modify_yn} {$this->q_dealer_yn} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";
        $row_sql .= " order by A.community_car_listings_id desc  Limit " . $pagination->limit_regno . ", " . $pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "Total(" . number_format($pagination->getTotal(), 0) . ") [Page : " . number_format($this->page, 0) . "/" . number_format($pagination->getTotalPage(), 0) . "]";
    }

    private function make_data()
    {
        $i = 0;
        $no = $this->no;

        while ($row = $this->db->fetch()) {
            
            $p_community_car_listings_id = $row->community_car_listings_id;
            
            $link = "vehicle_view.php?community_car_listings_id=" . $p_community_car_listings_id;
            $is_active_img = "no-active";
            if ($row->is_active == "1") {
                $is_active_img = "completed";
            }
            
            $row_img = "select * from community_car_listing_images where community_car_listings_id = {$p_community_car_listings_id} order by image_order asc limit 0,1";

            $this->db2->query($row_img);
            $row_img = $this->db2->fetch();
            
            $img_no = "img" . $row_img->community_car_listing_images_id;
            $img = $this->define_val->IMG_PROTECT . "?c=community&cc=vehicle&d=$img_no&s=". $p_community_car_listings_id;
            
            $this->loop[$i] = array(
                'T_NO' => $row->community_car_listings_id,
                'T_LINK' => $link,
                'T_IMG' => $img,
                'T_DEALER_YN' => $row->community_car_dealers_id > 0 ? "딜러" : "일반",
                'T_CAR_MAKER' => $row->car_maker,
                'T_CAR_MODEL' => $row->car_model,
                'T_CAR_MILEAGE' => $row->car_mileage,
                'T_LOCATION' => $row->city_name . "," . $row->state_code,
                'T_COMPANY_NAME' => $row->company_name,
                'T_SELLER_NAME' => $row->seller_name,
                'T_ACTIVE_IMG' => $is_active_img,
                'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),
                'T_IS_ACTIVE' => ARRAY_RETURN($this->define_val->DEFINE_is_active, $row->is_active)
            );

            $i++;
            $no--;
        }
    }
}
