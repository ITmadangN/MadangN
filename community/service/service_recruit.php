<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class recruit_list
{

    private Db $db;
    private int $page;

    private string $s_job_type = "";
    private string $s_state_code = "";
    private string $s_city_name = "";
    private string $s_kind = "";
    private string $s_nynj = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    private string $q_job_type = "";

    private int $no;
    private string $q_state_code = "";
    private string $q_city_name = "";
    private string $random = "N";

    public string $navigation_text = "";
    public array $loop_platinum = array();
    public array $loop_gold = array();
    public array $loop_regular = array();


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_job_type = $fn_params['s_job_type'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        $this->random = $fn_params['random'];
        $this->s_nynj = $fn_params['s_nynj'];


        if($this->s_job_type != "-1" && $this->s_job_type != "") {
            
            $array_check_job_type = explode(",",$this->s_job_type);    
            
            $multi_job_type = "";
            
            for($j=0; $j<count($array_check_job_type);$j++) {
            
                $check = $array_check_job_type[$j];
            
                if($multi_job_type == "") $multi_job_type .= "(S.job_type = '{$check}'";
                else $multi_job_type .= " or S.job_type = '{$check}'";            
            
            }

            $multi_job_type .= ")";
            
            $this->q_job_type = "AND {$multi_job_type} AND S.is_active = 1";
        }

        if($this->s_state_code != "-1" && $this->s_state_code != "") {

            // 강제로 NJ추가 , 프로그램 예외처리
            if($this->s_nynj == 'Y' && $this->s_state_code == 'NY') $this->q_state_code = "AND (L.state_code = '{$this->s_state_code}' or L.state_code = 'NJ')";
            else $this->q_state_code = "AND L.state_code = '{$this->s_state_code}'";
            
        }
        if($this->s_city_name != "") {


            $this->q_city_name = "AND (";

            $array_city_name = explode(",", $this->s_city_name);

            for($i=0;$i<count($array_city_name); $i++) {

                $tt = "";
                if($i > 0) $tt = " OR ";
                $this->q_city_name .= $tt . "L.city_name = '".$array_city_name[$i]."' ";
            }

            $this->q_city_name .= ")";

        }

        if($this->s_keyword != "") {

            switch($this->s_kind) {

                case "title": $column = "A.title"; break;
                case "content":  $column = "A.job_opening_information"; break;
                case "company_name":  $column = "A.company_name"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

        }

        $this->init();
    }

    private function init() {

        //$count_sql = "SELECT count(*) as cnt from community_recruit_listings A left join community_recruit_listings_sub B on A.community_recruit_listings_id = B.community_recruit_listings_id where A.is_active = 1 {$this->q_job_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";
        $count_sql = "SELECT 
                        count(*) as cnt                                        
                        FROM community_recruit_listings A
                        LEFT JOIN (
                            SELECT
                                community_recruit_listings_id,
                                GROUP_CONCAT(job_type) AS job_type
                            FROM community_recruit_listings_sub
                            GROUP BY community_recruit_listings_id
                        ) B ON A.community_recruit_listings_id = B.community_recruit_listings_id
                        
                        LEFT JOIN (
                            SELECT
                                community_recruit_listings_id,
                                GROUP_CONCAT(DISTINCT state_code) AS state_code,
                                GROUP_CONCAT(DISTINCT city_name) AS city_name,
                                GROUP_CONCAT(
                                    CONCAT(city_name, ' , ', state_code)
                                ) AS job_location
                            FROM community_recruit_listings_loc_sub
                            GROUP BY community_recruit_listings_id
                        ) C ON A.community_recruit_listings_id = C.community_recruit_listings_id
                                                
                        WHERE A.is_active = 1

                        AND EXISTS (
                            SELECT 1
                            FROM community_recruit_listings_loc_sub L
                            WHERE L.community_recruit_listings_id = A.community_recruit_listings_id
                               {$this->q_state_code}                              
                               {$this->q_city_name} 
                              
                        )
                        AND EXISTS (
                            SELECT 1
                            FROM community_recruit_listings_sub S
                            WHERE S.community_recruit_listings_id = A.community_recruit_listings_id
                            {$this->q_job_type}
                        )
                        
                         {$this->q_keyword}
                        ";

        $row_sql = "SELECT 
                        A.community_recruit_listings_id,         
                        A.advertising_level,
                        A.company_name,         
                        A.title, 
                        A.contact_name, 
                        A.created_at,
                        A.created_user,
                        A.is_active,
                        A.main_image_background_url,  
                        B.job_type,
                        C.job_location                        
                        FROM community_recruit_listings A
                        LEFT JOIN (
                            SELECT
                                community_recruit_listings_id,
                                GROUP_CONCAT(job_type) AS job_type 
                            FROM community_recruit_listings_sub
                            GROUP BY community_recruit_listings_id
                        ) B ON A.community_recruit_listings_id = B.community_recruit_listings_id
                        
                        LEFT JOIN (
                            SELECT
                                community_recruit_listings_id,
                                GROUP_CONCAT(DISTINCT state_code) AS state_code,
                                GROUP_CONCAT(DISTINCT city_name) AS city_name,
                                GROUP_CONCAT(
                                    CONCAT(city_name, ' , ', state_code)
                                    SEPARATOR ' / '
                                ) AS job_location
                            FROM community_recruit_listings_loc_sub
                            GROUP BY community_recruit_listings_id
                        ) C ON A.community_recruit_listings_id = C.community_recruit_listings_id
                                                
                        WHERE A.is_active = 1

                        AND EXISTS (
                            SELECT 1
                            FROM community_recruit_listings_loc_sub L
                            WHERE L.community_recruit_listings_id = A.community_recruit_listings_id
                               {$this->q_state_code}                              
                               {$this->q_city_name} 
                              
                        )
                        
                        AND EXISTS (
                            SELECT 1
                            FROM community_recruit_listings_sub S
                            WHERE S.community_recruit_listings_id = A.community_recruit_listings_id
                            {$this->q_job_type}
                        )
                        
                         {$this->q_keyword}";
                    
                    
        $this->get_platinum($count_sql, $row_sql);
        $this->get_gold($count_sql, $row_sql);
        $this->get_regular($count_sql, $row_sql);

    }

    function get_platinum($count_sql, $row_sql) {

        $t_count_sql = $count_sql." and A.advertising_level = 'platinum'";
        
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

        if($this->random == "Y") {
            $t_row_sql = $row_sql." and A.has_active_advertisement = 1 and A.is_approved = 1 and A.advertising_level = 'platinum' order by RAND() LIMIT ".$this->page_set;
        }
        else {
            $t_row_sql = $row_sql." and A.has_active_advertisement = 1 and A.is_approved = 1 and A.advertising_level = 'platinum' order by A.created_at desc";
            //$t_row_sql .= " Limit ".$pagination->limit_regno.", ".$pagination->page_set;
        }
          
        $this->db->query($t_row_sql);

        $this->loop_platinum = $this->make_data();

    }

    function get_gold($count_sql, $row_sql) {

        $t_count_sql = $count_sql." and A.has_active_advertisement = 1 and A.is_approved = 1 and A.advertising_level = 'gold' ";
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

        if($this->random == "Y") {
            $t_row_sql = $row_sql." and  A.has_active_advertisement = 1 and A.is_approved = 1 and A.advertising_level = 'gold' order by  RAND() LIMIT ".$this->page_set;
        }
        else {
            $t_row_sql = $row_sql." and A.has_active_advertisement = 1 and A.is_approved = 1 and A.advertising_level = 'gold' order by A.created_at desc";
            // $t_row_sql .= " Limit ".$pagination->limit_regno.", ".$pagination->page_set;
        }

        $this->db->query($t_row_sql);

        $this->loop_gold = $this->make_data();

    }

    function get_regular($count_sql, $row_sql) {

        $t_count_sql = $count_sql." and A.advertising_level = 'regular' ";
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
                       
            $link = "/community/recruit_view.php?id=".$row->community_recruit_listings_id."&sid=".$row->community_recruit_listings_sub_id;

            $blank_img = "/images/blank.png";
            if($row->advertising_level != "regular" ) {
                $logo_img = $this->define_val->IMG_PROTECT ."?c=community&cc=recruit&d=logo&s=".$row->community_recruit_listings_id;

                if($row->main_image_background_url == "")
                {
                    $back_img = RECRUIT_RANDOM_BACK_IMG();
                }
                else {
                    $back_img = $this->define_val->IMG_PROTECT . "?c=community&cc=recruit&d=background_image&s=" . $row->community_recruit_listings_id;
                }
            }
            else {
                $logo_img = $blank_img;
                $back_img = $blank_img;
            }

            $job_type = ARRAY_RETURN($this->define_val->DEFINE_recruit_job_type,$row->job_type);
            $location = $row->job_location;

            $title = $row->title;
            $subtitle = $row->subtitle;
//            if($row->advertising_level == "platinum") { $title = TRUNCATE_TITLE($row->title, 13, "."); $subtitle = TRUNCATE_TITLE($subtitle, 30, "."); }
//            if($row->advertising_level == "gold") { $title = TRUNCATE_TITLE($row->title, 13,"."); $subtitle = TRUNCATE_TITLE($subtitle, 13, "."); }

            if($subtitle == "") $subtitle = "&nbsp;";            
            
            $loop[$i] = array('T_NO' => $no,'T_LINK' => $link, 'T_COMPANY_NAME' => $row->company_name, 'T_LOGO_IMG' => $logo_img, 'T_TITLE' => $title , 'T_SUBTITLE' => $subtitle, 'T_BACK_IMG' => $back_img, 'T_JOB_TYPE' => $job_type, 'T_LOCATION' => $location, 'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),  'T_CREATED_USER' => $row->created_user);


            $i++;
            $no--;
        }

        return $loop;

    }
}

