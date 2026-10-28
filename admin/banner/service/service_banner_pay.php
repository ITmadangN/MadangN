<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class banner_pay_list
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
    private string $s_s_banner_type = "";
    private string $q_s_banner_type = "";

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
        $this->s_banner_type = $fn_params['s_banner_type'];
        $this->s_is_active = $fn_params['s_is_active'];
        //$this->s_is_modify_yn = $fn_params['s_is_modify_yn'];
        $this->s_is_approved = $fn_params['s_is_approved'];
        //$this->is_paid = $fn_params['is_paid'];
        $this->s_has_active_advertisement = $fn_params['s_has_active_advertisement'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_banner_type != "-1" && $this->s_banner_type != "") {

            $this->q_s_banner_type = "AND B.banner_type = '{$this->s_banner_type}'";
        }
        
        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND B.is_active = '{$this->s_is_active}'";
        }
        
        if($this->s_is_modify_yn != "-1" && $this->s_is_modify_yn != "") {

            $this->q_is_modify_yn = "AND B.is_modify_yn = '{$this->s_is_modify_yn}'";
        }   
        
        if($this->s_is_approved != "-1" && $this->s_is_approved != "") {

            $this->q_is_approved = "AND B.is_approved = '{$this->s_is_approved}'";
        }        

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

            $temp = $this->s_keyword . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (B.company_name like '$temp' OR B.title like '$temp' OR B.contact_name like '$temp' or A.desired_start_date like '$temp' OR A.start_date like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {

        $count_sql = "SELECT count(*) as cnt FROM ad_payments A
                        left join ad_banners B ON A.listing_id = B.ad_banner_id                        
                        left join users D ON A.user_id = D.user_id
                        where A.section_type = 6 and A.is_paid = 'Y'
                        {$this->q_s_banner_type}
                        {$this->q_is_active}  {$this->q_is_modify_yn} {$this->q_is_approved}
                        {$this->q_has_active_advertisement} {$this->q_keyword}";

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

        $row_sql = "SELECT A.*, B.ad_banner_id, B.banner_type, B.banner_location, B.company_name, B.contact_name, B.is_approved FROM ad_payments A
                        left join ad_banners B ON A.listing_id = B.ad_banner_id                    
                        left join users D ON A.user_id = D.user_id
                        where A.section_type = 6 and A.is_paid = 'Y'
                        {$this->q_s_banner_type}
                        {$this->q_is_active}  {$this->q_is_modify_yn} {$this->q_is_approved}
                        {$this->q_has_active_advertisement} {$this->q_keyword}
                        order by  B.banner_type,  B.banner_location,A.created_at desc";

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
            $link = "banner_pay_view.php?ad_payments_id=" . $row->ad_payments_id;
            $is_active_img = "no-active";
            if ($row->is_approved == "1") {
                $is_active_img = "completed";
            }
            
            if($row->payment_amount == "") $amount = 0;
            else $amount - number_format((int)$row->payment_amount, 2);
            

            $this->loop[$i] = array(
                'T_NO' => $row->ad_banner_id,
                'T_LINK' => $link,
                'T_COMPANY_NAME' => $row->company_name,
                'T_BANNER_TYPE' => ARRAY_RETURN($this->define_val->DEFINE_banner_type, $row->banner_type),
                'T_BANNER_LOCATION' => $row->banner_location,
                'T_CONTACT_NAME' => $row->contact_name,
                'T_IS_PAID' => $row->is_paid,
                'T_PAYMENT_AMOUNT' => $amount,
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
