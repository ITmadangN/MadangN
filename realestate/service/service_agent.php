<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class agent_list
{

    private Db $db;
    private int $page;

    private string $s_office_name = "";
    private string $s_agent_full_name = "";
    
    private string $s_kind = "";
    private string $s_keyword = "";
    
    private string $php_view = "";

    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;              

    private string $q_agent_full_name = "";
    private string $q_office_name = "";       
    private string $q_keyword = "";
    
    private int $no;
    
    private string $random = "N";

    public string $navigation_text = "";    


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_office_name = $fn_params['s_office_name'];
        $this->s_agent_full_name = $fn_params['s_agent_full_name'];        
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        $this->random = $fn_params['random'];
        

        if($this->s_office_name != "") {

            $this->q_office_name = "AND A.office_name like '%{$this->s_office_name}'";
        }
        
        if($this->s_agent_full_name != "") {

            $this->q_agent_full_name = "AND A.agent_full_name like '%{$this->s_agent_full_name}%'";
        }
        
        
        if($this->s_keyword != "") {

            switch($this->s_kind) {

                case "name": $column = "A.agent_full_name"; break;
                case "dre":  $column = "A.agent_dre_license"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

        }
        

        $this->init();
    }

    private function init() {

        //$count_sql = "SELECT count(*) as cnt from realestate_agents A where A.is_active = 1 and A.office_key in ('3288918','3285640','3286864') and A.is_approved = '1'
        $count_sql = "SELECT count(*) as cnt from realestate_agents A where A.is_active = 1 and ( A.is_preminum_agent = 1  or A.has_active_listings = 1 or ( A.has_active_advertisement = 1 and A.is_approved = 1 ) )
                        {$this->q_office_name} 
                        {$this->q_agent_full_name} 
                        
                        ";
        
        
        //$row_sql = "SELECT A.* FROM realestate_agents A where A.is_active = 1 and A.office_key in ('3288918','3285640','3286864') and A.is_approved = '1'
        $row_sql = "SELECT A.* FROM realestate_agents A where A.is_active = 1 and ( A.is_preminum_agent = 1  or A.has_active_listings = 1 or ( A.has_active_advertisement = 1 and A.is_approved = 1 ) )
                        {$this->q_office_name} 
                        {$this->q_agent_full_name}                         
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
            $row_sql = $row_sql." order by RAND() LIMIT ".$this->page_set;
        }
        else {
            $row_sql .= " order by A.agent_full_name asc";
            $row_sql .= " LIMIT " . $pagination->limit_regno . ", " . $pagination->page_set;
        }
                
        
        $this->db->query($row_sql);
        
        $this->make_data();

    }

    private function make_data() {

       
        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {

            //$link = "/realestate/agent_dre_list.php?key=".$row->agent_key;
            $link = "/realestate/agent_dre_list.php?key=".$row->agent_dre_license;            

            $blank_img = "/images/blank.png";
            if($row->main_image_url != "" ) {
                $main_img = $this->define_val->IMG_PROTECT ."?c=realestate&cc=agent&d=main&s=".$row->realestate_agent_id;
            }
            else {
                $main_img = $blank_img;
            }
            
            $logo_img = $this->define_val->IMG_PROTECT ."?c=realestate&cc=office&d=logo&s=".$row->office_key;
            
            
            $this->loop[$i] = array('T_NO' => $no,'T_LINK' => $link, 'T_IMG' => $main_img, 'T_LOGO_IMG' => $logo_img, 'T_SPECIALIZED_FIELD' => $row->specialized_field , 'T_AGENT_FULL_NAME' => $row->agent_full_name,
                'T_AGENT_DRE_LICENSE' => $row->agent_dre_license, 'T_AGENT_PHONE' => $row->agent_phone, 'T_AGENT_EMAIL' => $row->agent_email,  'T_OFFICE_NAME' => $row->office_name);


            $i++;
            $no--;
        }
      
    }
}

