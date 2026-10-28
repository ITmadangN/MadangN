<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class agent_list
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
    private string $s_is_preminum_agent = '';
    private string $q_is_preminum_agent = "";
    private string $s_has_active_listings = '';
    private string $q_has_active_listings = "";
    private string $s_has_active_advertisement = "";
    private string $q_has_active_advertisement = "";

    private define_val $define_val;

    public array $loop = array();
    public string $paging;
    public string $navigation_text = "";
    
    private string $q_keyword = "";
    private int $no;

    public function __construct(Db $db, define_val $define_val, array $fn_params)
    {
        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_is_approved = $fn_params['s_is_approved'];
        $this->s_is_preminum_agent = $fn_params['s_is_preminum_agent'];
        $this->s_has_active_listings = $fn_params['s_has_active_listings'];
        $this->s_has_active_advertisement = $fn_params['s_has_active_advertisement'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }

        if($this->s_is_preminum_agent != "-1" && $this->s_is_preminum_agent != "") {

            $this->q_is_preminum_agent = "AND A.is_preminum_agent = '{$this->s_is_preminum_agent}'";
        }
        
        if($this->s_has_active_listings != "-1" && $this->s_has_active_listings != "") {

            $this->q_has_active_listings = "AND A.has_active_listings = '{$this->s_has_active_listings}'";
        }
                        
        if($this->s_is_approved != "-1" && $this->s_is_approved != "") {

            $this->q_is_approved = "AND A.is_approved = '{$this->s_is_approved}'";
        }
        
        if ($this->s_has_active_advertisement != "-1" && $this->s_has_active_advertisement != "") {

            $this->q_has_active_advertisement = "AND A.has_active_advertisement = '{$this->s_has_active_advertisement}'";
        }  
                
        if ($this->s_keyword != "") {

            $column = "A.agent_full_name";

            switch ($this->s_kind) {
                case "id":
                    $column = "A.user_id";
                    break;
                case "name":
                    $column = "A.agent_full_name";
                    break;
                case "field":
                    $column = "A.specialized_field";
                    break;
                case "office_name":
                    $column = "A.office_name";
                    break;    
            }

            $temp = "%" . $this->s_keyword . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if ($this->s_kind == "") {
                $this->q_keyword = "AND (A.user_id like '$temp' OR A.agent_full_name like '$temp' OR A.specialized_field like '$temp' OR A.office_name like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {
        
        $count_sql = "
            SELECT count(*) as cnt FROM realestate_agents A
            WHERE 1=1
            --  and office_key in ('3288918','3285640','3286864')
            {$this->q_is_active} 
            {$this->q_is_approved}
            {$this->q_is_preminum_agent}
            {$this->q_has_active_listings}
            {$this->q_keyword}
            {$this->q_has_active_advertisement}
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
        
        $row_sql = "
            SELECT A.* FROM realestate_agents A
            WHERE 1=1
            -- and office_key in ('3288918','3285640','3286864')
            {$this->q_is_active} 
            {$this->q_is_approved}
            {$this->q_is_preminum_agent}
            {$this->q_has_active_listings}
            {$this->q_keyword}
            {$this->q_has_active_advertisement}
            ORDER BY A.realestate_agent_id desc
            LIMIT " . $pagination->limit_regno . ", " . $pagination->page_set;
                        
        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "총 (".number_format($pagination->getTotal(),0).")개 [전체 :".number_format($this->page,0)."/".number_format($pagination->getTotalPage(),0)."] 페이지";

    }

    private function make_data()
    {
        $i = 0;
        $no = $this->no;

        while ($row = $this->db->fetch()) {
            
            $link = "agent_view.php?realestate_agent_id=".$row->realestate_agent_id;
            $is_active_img = "no-active";
            if($row->is_approved == "1") $is_active_img = "completed";

            $main_img = "/images/blank.png";
            if($row->main_image_url != "" ) $main_img = $this->define_val->IMG_PROTECT ."?c=realestate&cc=agent&d=main&s=".$row->realestate_agent_id;

            $this->loop[$i] = array('T_NO' => $row->realestate_agent_id,'T_LINK' => $link, 'T_IMG' => $main_img, 
                'T_AGENT_KEY' => $row->agent_key , 'T_SPECIALIZED_FIELD' => ARRAY_RETURN($this->define_val->DEFINE_specialized_field, $row->specialized_field) , 
                'T_AGENT_FULL_NAME' => $row->agent_full_name, 'T_AGENT_DRE_LICENSE' => $row->agent_dre_license, 'T_AGENT_PHONE' => $row->agent_phone,  
                'T_AGENT_EMAIL' => $row->agent_email,'T_OFFICE_KEY' => $row->office_key, 
                'T_OFFICE_NAME' => $row->office_name,
                'T_IS_PREMINUM_AGENT' => ARRAY_RETURN($this->define_val->DEFINE_user_is_letter_receive, $row->is_preminum_agent),
                'T_HAS_ACTIVE_LISTINGS' => ARRAY_RETURN($this->define_val->DEFINE_user_is_letter_receive, $row->has_active_listings),
                'T_ACTIVE_IMG' => $is_active_img,
                'T_IS_ACTIVE' => ARRAY_RETURN($this->define_val->DEFINE_is_active, $row->is_approved)
                );

            $i++;
            $no--;
        }
    }
}
