<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class business_list
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
    private string $q_advertising_level = "";

    private int $no;
    private string $q_state_code = "";
    private string $q_city_name = "";
    private string $random = "N";

    public string $navigation_text = "";
    public array $loop_platinum = array();
    public array $loop_regular = array();
    private string $s_business_type = "";
    private string $q_business_type = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_business_type = $fn_params['s_business_type'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        $this->random = $fn_params['random'];

        if($this->s_business_type != "-1" && $this->s_business_type != "") {

            $this->q_business_type = "AND A.business_type = '{$this->s_business_type}'";
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

                case "title": $column = "A.title"; break;
                case "content":  $column = "A.content"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

        }

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from community_business A where A.is_active=1 {$this->q_business_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";
        
        $row_sql = "SELECT A.* FROM community_business A where A.is_active=1 {$this->q_business_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";
                     
        $this->get_platinum($count_sql, $row_sql);
        $this->get_regular($count_sql, $row_sql);

    }

    function get_platinum($count_sql, $row_sql) {

        $t_count_sql = $count_sql." and A.has_active_advertisement = 1 and A.is_approved = 1 and A.advertising_level = 'platinum'";

        $pagination = new Pagination(
            $this->db,
            $t_count_sql,
            '',
            $this->page,
            $this->page_set,
            $this->block_set
        );

        $this->no = $pagination->no;
        
        if($this->random == "Y") {
            $t_row_sql = $row_sql." and A.has_active_advertisement = 1 and A.is_approved = 1  and A.advertising_level = 'platinum' order by RAND() LIMIT ".$this->page_set;
        }
        else {
            $t_row_sql = $row_sql." and A.has_active_advertisement = 1 and A.is_approved = 1  and A.advertising_level = 'platinum'  order by A.created_at desc";
        }

        $this->db->query($t_row_sql);

        $this->loop_platinum = $this->make_data();

    }

    function get_regular($count_sql, $row_sql) {

        $t_count_sql = $count_sql." and A.advertising_level = 'regular'";

        $pagination = new Pagination(
            $this->db,
            $t_count_sql,
            '',
            $this->page,
            $this->page_set,
            $this->block_set
        );

        $this->paging = $pagination->Print_Paging();
        $this->no = $pagination->no;

        $t_row_sql = $row_sql." and A.advertising_level = 'regular' order by A.created_at desc";
        $t_row_sql .= " Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        $this->db->query($t_row_sql);

        $this->loop_regular = $this->make_data();

    }

    private function make_data() {

        $i = 0;

        $no = $this->no;

        $loop = array();

        while ($row = $this->db->fetch()) {

            $link = "/community/business_view.php?id=".$row->community_business_id;

            $blank_img = "/images/blank.png";
            if($row->advertising_level != "regular" ) {
                $main_img = $this->define_val->IMG_PROTECT ."?c=community&cc=business&d=main&s=".$row->community_business_id;
            }
            else {
                $main_img = $blank_img;
            }

            $business_type = ARRAY_RETURN($this->define_val->DEFINE_business_type,$row->business_type);
            if($row->city_name !== "") $location = $row->city_name.",".$row->state_code;
            else $location = $row->state_code;                      

            $loop[$i] = array('T_NO' => $no,'T_LINK' => $link, 'T_IMG' => $main_img, 'T_COMPANY_NAME' => $row->company_name, 'T_TITLE' => $row->title , 'T_STATE_CODE' => $row->state_code,
                'T_BUSINESS_TYPE' => $business_type, 'T_LOCATION' => $location, 'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),  'T_CREATED_USER' => $row->created_user);


            $i++;
            $no--;
        }

        return $loop;

    }
}

