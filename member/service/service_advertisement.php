<?php

namespace user_service;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class advertisement_list
{

    private Db $db;
    private Db $db2;
    private int $page;

    private string $s_kind = "";
    private string $s_type = "";
    private string $q_type = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    
    private int $no;
    
    public string $navigation_text = "";
    
    public string $recipient_user_id = "";
    

    public function __construct(Db $db, Db $db2, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->db2 = $db2;
        $this->define_val = $define_val;
    
        $this->page = $fn_params['page'];        
        $this->s_type = $fn_params['s_type'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        
        
        if($this->s_type != "-1" && $this->s_type != "") {

            $this->q_type = "AND A.section_type = '{$this->s_type}'";            
        }
               

        $this->init();
    }

    private function get_query($type) {
        
        if($this->s_type == "") {
            
            return "                       

                LEFT JOIN community_recruit_listings r 
                    ON p.section_type IN (1, 2) 
                    AND p.listing_id  = r.community_recruit_listings_id
                    AND r.has_active_advertisement = 1 
                    AND r.is_approved = 0
                    AND r.is_active = 1 

                LEFT JOIN community_business b 
                    ON p.section_type = 3 
                    AND p.listing_id  = b.community_business_id 
                    AND b.has_active_advertisement = 1 
                    AND b.is_approved = 0
                    AND b.is_active = 1 

                LEFT JOIN community_car_dealers cd 
                    ON p.section_type = 4 
                    AND p.listing_id  = cd.community_car_dealers_id 
                    AND cd.has_active_advertisement = 1 
                    AND cd.is_approved = 0
                    AND cd.is_active = 1 

                LEFT JOIN realestate_agents ra 
                    ON p.section_type = 5 
                    AND p.listing_id  = ra.realestate_agent_id 
                    AND ra.has_active_advertisement = 1 
                    AND ra.is_approved = 0
                    AND ra.is_active = 1 

                LEFT JOIN ad_banners ab 
                    ON p.section_type = 6 
                    AND p.listing_id  = ab.ad_banner_id 
                    AND ab.has_active_advertisement = 1 
                    AND ab.is_active = 1
                    AND ab.is_approved = 0

                WHERE (
                    (p.section_type IN (1, 2) AND r.community_recruit_listings_id IS NOT NULL) OR
                    (p.section_type = 3 AND b.community_business_id IS NOT NULL) OR
                    (p.section_type = 4 AND cd.community_car_dealers_id IS NOT NULL) OR
                    (p.section_type = 5 AND ra.realestate_agent_id IS NOT NULL) OR
                    (p.section_type = 6 AND ab.ad_banner_id IS NOT NULL)
                )                
            ";
            
        }
        else {
            
            switch($type) {
                
                case "1" :
                    $sql = "
                        LEFT JOIN community_recruit_listings r  ON p.section_type IN (1)  AND p.listing_id  = r.community_recruit_listings_id AND r.has_active_advertisement = 1 AND r.is_approved = 0
                        AND r.is_active = 1 
                        where (p.section_type IN (1) AND r.community_recruit_listings_id IS NOT NULL)
                    ";
                    
                    break;
                
                case "2" :
                    $sql = "
                        LEFT JOIN community_recruit_listings r  ON p.section_type IN (2)  AND p.listing_id  = r.community_recruit_listings_id AND r.has_active_advertisement = 1 AND r.is_approved = 0
                        AND r.is_active = 1 
                        where (p.section_type IN (2) AND r.community_recruit_listings_id IS NOT NULL)
                    ";
                    break;
                
                case "3" :
                    $sql = "
                        LEFT JOIN community_business b 
                    ON p.section_type = 3 
                    AND p.listing_id  = b.community_business_id 
                    AND b.has_active_advertisement = 1 
                    AND b.is_approved = 0
                    AND b.is_active = 1 
                    where (p.section_type = 3 AND b.community_business_id IS NOT NULL)
                    ";
                    break;    
                case "4"    :
                    $sql = "
                    LEFT JOIN community_car_dealers cd 
                    ON p.section_type = 4 
                    AND p.listing_id  = cd.community_car_dealers_id 
                    AND cd.has_active_advertisement = 1 
                    AND cd.is_approved = 0
                    AND cd.is_active = 1 
                    where (p.section_type = 4 AND cd.community_car_dealers_id IS NOT NULL) 
                    ";
                case "5" : 
                    $sql = "
                    LEFT JOIN realestate_agents ra 
                    ON p.section_type = 5 
                    AND p.listing_id  = ra.realestate_agent_id 
                    AND ra.has_active_advertisement = 1 
                    AND ra.is_approved = 0
                    AND ra.is_active = 1 
                    where (p.section_type = 5 AND ra.realestate_agent_id IS NOT NULL)
                    ";
                    break;    
                case "6" :
                    $sql = "
                    LEFT JOIN ad_banners ab 
                    ON p.section_type = 6 
                    AND p.listing_id  = ab.ad_banner_id 
                    AND ab.has_active_advertisement = 1 
                    AND ab.is_active = 1 
                    AND ab.is_approved = 0
                    where (p.section_type = 6 AND ab.ad_banner_id IS NOT NULL)
                    ";
                
                break;    
            }
            
        }
        
        return $sql;
        
    }
    private function init() {

        $id = $_SESSION['ss_id'];
        
        //$count_sql = "SELECT count(*) as cnt from ad_payments A where  A.user_id = '{$id}' and A.is_active = 1 {$this->q_type}";
        
        $init_sql = $this->get_query($this->s_type);
        
        $count_sql = "select count(*) as cnt FROM ad_payments p ".$init_sql . " and p.user_id = '{$id}'";        
        
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
        
        $row_sql = "select p.*  FROM ad_payments p ".$init_sql . " and p.user_id = '{$id}' order by p.created_at desc Limit ".$pagination->limit_regno.", ".$pagination->page_set; 
        
        // $row_sql = "SELECT A.* FROM ad_payments A where A.user_id = '{$id}' and A.is_active = 1  {$this->q_type}  order by A.created_at desc Limit ".$pagination->limit_regno.", ".$pagination->page_set;
        
        $this->db->query($row_sql);

        $this->make_data();

    }


    private function make_data() {

        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {
        
            $section_type_text = ARRAY_RETURN($this->define_val->DEFINE_advertisement_type,$row->section_type);         
            
            $listing_id = $row->listing_id;
            
            $table_where = "";
            $preview = "&nbsp;";
            $modify = "&nbsp;";
            
            $section_type = $row->section_type;
            
            switch($section_type)  {
                
                case "1" : $table_where = "community_recruit_listings where community_recruit_listings_id = ".$listing_id; 
                            $preview = "<span style='cursor:pointer;' onclick='GO_PREVIEW_RP(".$listing_id.")'>미리보기</span>"; 
                            $modify= "<span style='cursor:pointer;' onclick='GO_UPDATE_RP(".$listing_id.")'>수정하기</span>"; 
                            break;
                case "2" : $table_where = "community_recruit_listings where community_recruit_listings_id = ".$listing_id; 
                            $preview = "<span style='cursor:pointer;' onclick='GO_PREVIEW_RG(".$listing_id.")'>미리보기</span>";
                            $modify= "<span style='cursor:pointer;' onclick='GO_UPDATE_RG(".$listing_id.")'>수정하기</span>"; 
                            break;
                case "3" : $table_where = "community_business where community_business_id = ".$listing_id; 
                            $preview = "<span style='cursor:pointer;' onclick='GO_PREVIEW_BP(".$listing_id.")'>미리보기</span>"; 
                            $modify= "<span style='cursor:pointer;' onclick='GO_UPDATE_BP(".$listing_id.")'>수정하기</span>"; 
                            break;
                case "4" : $table_where = "community_car_dealers where community_car_dealers_id = ".$listing_id; 
                            $preview = "<span style='cursor:pointer;' onclick='GO_PREVIEW_VD(".$listing_id.")'>미리보기</span>"; 
                            $modify= "<span style='cursor:pointer;' onclick='GO_UPDATE_VD(".$listing_id.")'>수정하기</span>"; 
                            break;
                case "5" : $table_where = "realestate_agents where realestate_agent_id = ".$listing_id; $preview = "&nbsp;"; 
                            $modify= "<span style='cursor:pointer;' onclick='GO_UPDATE_AGENT()'>수정하기</span>"; 
                            break;
                case "6" : $table_where = "ad_banners where ad_banner_id = ".$listing_id; $preview = "&nbsp;"; break;
                    
            }
            
            $row_lt = "SELECT * FROM $table_where limit 0,1";
        
            $this->db2->query($row_lt);
            
            $row_lt = $this->db2->fetch();
            
            $is_modify_yn = $row_lt->is_modify_yn;
            
            if($is_modify_yn != "1" && $section_type != "5") {                
                $modify = "&nbsp;";
            }
            
            if($section_type == "5") $company_name = $row_lt->office_name;
            else  $company_name = $row_lt->company_name;
        
            $is_approved = ARRAY_RETURN($this->define_val->DEFINE_confirm_yn,$row_lt->is_approved);        

            $this->loop[$i] = array('T_NO' => $no,'T_TYPE'=> $section_type_text, 'T_COMPANY_NAME' => $company_name,  'T_ID' => $row->user_id, 'T_STATUS' => $is_approved,
                'T_MODITY' => $modify, 'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),  'T_PREVIEW' => $preview);


            $i++;
            $no--;
        }
        

    }
}

