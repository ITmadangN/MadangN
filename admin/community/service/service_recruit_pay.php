<?php

namespace service;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class recruit_pay_list
{

    private Db $db;
    private int $page;

    private string $s_kind = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;
    private string $s_is_active = "";
    private string $q_is_active = "";
    private string $s_is_approved = '';
    private string $q_is_approved = "";
    private string $s_has_active_advertisement = "";
    private string $q_has_active_advertisement = "";
    private string $s_is_modify_yn = "";
    private string $q_is_modify_yn = "";

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";

    private int $no;

    public string $navigation_text = "";
    private string $s_section_type = "";
    private string $s_is_paid = "";

    private string $q_section_type = "";
    private string $q_is_paid = "";



    public function __construct(Db $db, define_val $define_val, array $fn_params)
    {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_is_modify_yn = $fn_params['s_is_modify_yn'];
        $this->s_is_approved = $fn_params['s_is_approved'];
        //$this->is_paid = $fn_params['is_paid'];
        $this->s_has_active_advertisement = $fn_params['s_has_active_advertisement'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        
        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND B.is_active = {$this->s_is_active}";
        }
        
        if($this->s_is_modify_yn != "-1" && $this->s_is_modify_yn != "") {

            $this->q_is_modify_yn = "AND B.is_modify_yn = '{$this->s_is_modify_yn}'";
        }   
        
        if($this->s_is_approved != "-1" && $this->s_is_approved != "") {

            $this->q_is_approved = "AND B.is_approved = '{$this->s_is_approved}'";
        }        

        if ($this->s_state_code != "-1" && $this->s_state_code != "") {
            $this->q_state_code = "AND A.state_code = '{$this->s_state_code}'";
        }

        if ($this->s_city_name != "-1" && $this->s_city_name != "") {
            $this->q_city_name = "AND A.city_name = '{$this->s_city_name}'";
        }

/*        if ($this->s_is_paid != "-1" && $this->s_is_paid != "") {

            $this->q_is_paid = "AND A.is_paid = '{$this->s_is_paid}'";
        }*/
        if ($this->s_has_active_advertisement != "-1" && $this->s_has_active_advertisement != "") {

            $this->q_has_active_advertisement = "AND B.has_active_advertisement = '{$this->s_has_active_advertisement}'";
        }


        if ($this->s_keyword != "") {

            switch ($this->s_kind) {

                case "company_name":
                    $column = "B.company_name";
                    break;
                case "user_id":
                    $column = "B.user_id";
                    break;      
                case "title":
                    $column = "B.title";
                    break;
                case "contact_name":
                    $column = "B.contact_name";
                    break;
                case "desired_start_date":
                    $column = "A.desired_start_date";
                    break;
                case "start_date":
                    $column = "A.start_date";
                    break;
            }

            $temp =  $this->s_keyword . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (B.company_name like '$temp'  OR B.user_id like '$temp' OR B.title like '$temp' OR B.contact_name like '$temp' or A.desired_start_date like '$temp' OR A.start_date like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {

        $count_sql = "SELECT 
                count(*) as cnt
            FROM ad_payments A 
            left join community_recruit_listings B on A.listing_id = B.community_recruit_listings_id and (A.section_type = 1 or A.section_type = 2)
            WHERE A.is_paid = 'Y'
                {$this->q_is_active}  
                {$this->q_is_modify_yn} 
                {$this->q_is_approved}
                {$this->q_has_active_advertisement}
                {$this->q_keyword}                
                AND EXISTS (
                    SELECT 1 
                    FROM community_recruit_listings_loc_sub C 
                    WHERE C.community_recruit_listings_id = A.listing_id and (A.section_type = 1 or A.section_type = 2)                  
                      {$this->q_state_code} 
                      {$this->q_city_name}
                ) ";
            
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
                        
        $row_sql = "SELECT 
                A.*,
                B.advertising_level,
                B.title,         
                B.company_name,         
                B.contact_name,
                B.created_at,
                B.is_active,      
                B.is_approved,
                B.advertising_level,                          
                (SELECT GROUP_CONCAT(DISTINCT CONCAT(SUB_C.city_name, ' , ', SUB_C.state_code) SEPARATOR ' / ') 
                 FROM community_recruit_listings_loc_sub SUB_C 
                 WHERE SUB_C.community_recruit_listings_id = A.listing_id and (A.section_type = 1 or A.section_type = 2)) AS state_city_name
            FROM ad_payments A 
            left join community_recruit_listings B on A.listing_id = B.community_recruit_listings_id and (A.section_type = 1 or A.section_type = 2)
            WHERE  A.is_paid = 'Y'
                {$this->q_is_active}  
                {$this->q_is_modify_yn} 
                {$this->q_is_approved}
                {$this->q_has_active_advertisement}
                {$this->q_keyword}                
                AND EXISTS (
                    SELECT 1 
                    FROM community_recruit_listings_loc_sub C 
                    WHERE C.community_recruit_listings_id = A.listing_id and (A.section_type = 1 or A.section_type = 2)                  
                      {$this->q_state_code} 
                      {$this->q_city_name}
                )                               
            ORDER BY A.created_at DESC";

        $row_sql .= " Limit " . $pagination->limit_regno . ", " . $pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "Total(" . number_format($pagination->getTotal(), 0) . ") [Page : " . number_format($this->page, 0) . "/" . number_format($pagination->getTotalPage(), 0) . "]";
    }

    private function make_data()
    {

        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {
            $link = "recruit_pay_view.php?ad_payments_id=" . $row->ad_payments_id;
            $is_active_img = "no-active";
            if ($row->is_approved == "1") {
                $is_active_img = "completed";
            }

            $this->loop[$i] = array(
                'T_NO' => $row->ad_payments_id,
                'T_LINK' => $link,
                'T_COMPANY_NAME' => $row->company_name,
                'T_TITLE' => $row->title,
                'T_LOCATION' => $row->state_city_name,
                'T_CONTACT_NAME' => $row->contact_name,
                'T_ADVERTISING_LEVEL' => ARRAY_RETURN($this->define_val->DEFINE_recruit_advertising_level_TEXT, $row->advertising_level),
                'T_IS_PAID' => $row->is_paid,
                'T_PAYMENT_AMOUNT' => number_format($row->payment_amount, 2),
                'T_DESIRED_START_DATE' => DATETOSTRING_USA($row->desired_start_date, "/"),
                'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),
                'T_ACTIVE_IMG' => $is_active_img,
                'T_IS_ACTIVE' => ARRAY_RETURN($this->define_val->DEFINE_is_active, $row->is_approved)
            );

            $i++;
            $no--;
        }
    }
}
