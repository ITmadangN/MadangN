<?php

namespace user_service;

use define_val;
use Migliori\PowerLitePdo\Db;


class service_marketsale_list
{

    private Db $db;
    private define_val $define_val;

    public array $loop = array();
    private string $state_code = "";
    private string $county = "";
    private string $q_county = "";
    private string $q_state_code = "";
    private string $indexYN = "";

    private int $limit = 0;


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->state_code = $fn_params['state_code'];
        $this->county = $fn_params['county'];
        $this->limit = $fn_params['limit'] ?? 0;
        $this->indexYN = $fn_params['indexYN'];


        if($this->state_code != "") {
            
            $this->q_state_code = "AND branch.state_code = '{$this->state_code}'";
            
            if($this->state_code == "NYNJ") $this->q_state_code = "AND (branch.state_code = 'NY' or branch.state_code = 'NJ')";
            if($this->state_code == "MDVA") $this->q_state_code = "AND (branch.state_code = 'MD' or branch.state_code = 'VA')";
        
        }

        if($this->county != "") {
            $this->q_county = "AND branch.county_name = '{$this->county}'";
        }
        $this->init();
    }

    private function init() {

    
        // 커뮤니티 첫화면일 경우                
        if($this->indexYN == 'Y') {
            $row_sql = "SELECT  
                    flyer.towninfo_marketsale_flyer_id,
                    branch.towninfo_marketsale_branch_id,
                    market.towninfo_marketsale_market_id,
                    market.market_name,
                    market.market_logo_url,

                    branch.branch_name,
                    branch.state_code,
                    branch.county_name,
                    flyer.title,
                    flyer.main_image_url,
                    concat(date_format(flyer.sale_start_date,'%m/%d'),' ~ ',date_format(flyer.sale_end_date,'%m/%d') ) as sale_period
                       
                    FROM towninfo_marketsale_flyer flyer
                    join towninfo_marketsale_branch branch on flyer.towninfo_marketsale_flyer_id = branch.towninfo_marketsale_flyer_id
                    join towninfo_marketsale_market market on market.towninfo_marketsale_market_id = branch.towninfo_marketsale_market_id

                    where flyer.is_active = 1      
                    and ifnull(flyer.main_image_url,'') <> ''
                    and branch.is_active = 1      
                    and branch.is_default =1  
                    and market.is_active = 1      

                    group by flyer.towninfo_marketsale_flyer_id
                    order by flyer.towninfo_marketsale_flyer_id
            ";
            
            // 박경원 수정
            $row_sql = "SELECT  
                            flyer.towninfo_marketsale_flyer_id,

                            ANY_VALUE(branch.towninfo_marketsale_branch_id) AS towninfo_marketsale_branch_id,
                            ANY_VALUE(market.towninfo_marketsale_market_id) AS towninfo_marketsale_market_id,
                            ANY_VALUE(market.market_name) AS market_name,
                            ANY_VALUE(market.market_logo_url) AS market_logo_url,

                            ANY_VALUE(branch.branch_name) AS branch_name,
                            ANY_VALUE(branch.state_code) AS state_code,
                            ANY_VALUE(branch.county_name) AS county_name,

                            ANY_VALUE(flyer.title) AS title,
                            ANY_VALUE(flyer.main_image_url) AS main_image_url,

                            CONCAT(
                                DATE_FORMAT(ANY_VALUE(flyer.sale_start_date), '%m/%d'),
                                ' ~ ',
                                DATE_FORMAT(ANY_VALUE(flyer.sale_end_date), '%m/%d')
                            ) AS sale_period

                        FROM towninfo_marketsale_flyer flyer

                        JOIN towninfo_marketsale_branch branch
                            ON flyer.towninfo_marketsale_flyer_id =
                               branch.towninfo_marketsale_flyer_id

                        JOIN towninfo_marketsale_market market
                            ON market.towninfo_marketsale_market_id =
                               branch.towninfo_marketsale_market_id

                        WHERE flyer.is_active = 1
                          AND IFNULL(flyer.main_image_url, '') <> ''
                          AND branch.is_active = 1
                          AND branch.is_default = 1
                          AND market.is_active = 1

                        GROUP BY flyer.towninfo_marketsale_flyer_id

                        ORDER BY flyer.towninfo_marketsale_flyer_id";
        }
        else {  // 마켓세일 눌렀을때
            /*
           $row_sql = "
                        SELECT
                B.*,
                M.market_name,
                M.market_logo_url,
                F.title,
                F.main_image_url,
                F.sale_start_date,
                F.sale_end_date
            FROM towninfo_marketsale_branch B
            JOIN (
                SELECT
                    A.weekly_ads_flyer_site,                    
                    SUBSTRING_INDEX(
                        MIN(CONCAT(
                            IF(A.is_default = 1, '0', '1'),
                            '_',
                            LPAD(A.towninfo_marketsale_branch_id, 10, '0')
                        )),
                        '_', -1
                    ) + 0 AS pick_branch_id
                FROM towninfo_marketsale_branch A
                WHERE A.is_active = 1
                  AND A.towninfo_marketsale_flyer_id IS NOT NULL
                  AND A.towninfo_marketsale_flyer_id > 0
                   {$this->q_state_code}
                   {$this->q_county} 
                GROUP BY A.weekly_ads_flyer_site
            ) pick
                ON B.towninfo_marketsale_branch_id = pick.pick_branch_id
            LEFT JOIN towninfo_marketsale_market M
                ON B.towninfo_marketsale_market_id = M.towninfo_marketsale_market_id
            LEFT JOIN towninfo_marketsale_flyer F
                ON B.towninfo_marketsale_flyer_id = F.towninfo_marketsale_flyer_id
            ORDER BY B.weekly_ads_flyer_site;

           "; 
           */
           
           $row_sql = "SELECT  
                    flyer.towninfo_marketsale_flyer_id,
                    branch.towninfo_marketsale_branch_id,
                    market.towninfo_marketsale_market_id,
                    market.market_name,
                    market.market_logo_url,                  

                    branch.branch_name,
                    branch.state_code,
                    branch.county_name,
                    flyer.title,
                    flyer.main_image_url,
                    concat(date_format(flyer.sale_start_date,'%m/%d'),' ~ ',date_format(flyer.sale_end_date,'%m/%d') ) as sale_period
                       
                    FROM towninfo_marketsale_flyer flyer
                    join towninfo_marketsale_branch branch on flyer.towninfo_marketsale_flyer_id = branch.towninfo_marketsale_flyer_id
                    join towninfo_marketsale_market market on market.towninfo_marketsale_market_id = branch.towninfo_marketsale_market_id

                    where flyer.is_active = 1      
                    and ifnull(flyer.main_image_url,'') <> ''
                    and branch.is_active = 1      
                    and market.is_active = 1   
                    {$this->q_state_code}                       
                    {$this->q_county} 
                    group by flyer.towninfo_marketsale_flyer_id
                    order by flyer.towninfo_marketsale_flyer_id";

           // 박경원 수정         
           $row_sql = "SELECT  
                            flyer.towninfo_marketsale_flyer_id,

                            ANY_VALUE(branch.towninfo_marketsale_branch_id) AS towninfo_marketsale_branch_id,
                            ANY_VALUE(market.towninfo_marketsale_market_id) AS towninfo_marketsale_market_id,
                            ANY_VALUE(market.market_name) AS market_name,
                            ANY_VALUE(market.market_logo_url) AS market_logo_url,

                            ANY_VALUE(branch.branch_name) AS branch_name,
                            ANY_VALUE(branch.state_code) AS state_code,
                            ANY_VALUE(branch.county_name) AS county_name,

                            ANY_VALUE(flyer.title) AS title,
                            ANY_VALUE(flyer.main_image_url) AS main_image_url,

                            CONCAT(
                                DATE_FORMAT(ANY_VALUE(flyer.sale_start_date), '%m/%d'),
                                ' ~ ',
                                DATE_FORMAT(ANY_VALUE(flyer.sale_end_date), '%m/%d')
                            ) AS sale_period

                        FROM towninfo_marketsale_flyer flyer

                        JOIN towninfo_marketsale_branch branch
                            ON flyer.towninfo_marketsale_flyer_id =
                               branch.towninfo_marketsale_flyer_id

                        JOIN towninfo_marketsale_market market
                            ON market.towninfo_marketsale_market_id =
                               branch.towninfo_marketsale_market_id

                        WHERE flyer.is_active = 1
                          AND IFNULL(flyer.main_image_url, '') <> ''
                          AND branch.is_active = 1                          
                          AND market.is_active = 1
                          {$this->q_state_code}                       
                          {$this->q_county} 

                        GROUP BY flyer.towninfo_marketsale_flyer_id

                        ORDER BY flyer.towninfo_marketsale_flyer_id";             
            
        }
       
        if($this->limit > 0) {
            $row_sql .= " Limit ".$this->limit;
        }

        $this->db->query($row_sql);

        $this->make_data();

    }


    private function make_data() {

        $i = 0;

        while ($row = $this->db->fetch()) {

            $link = "marketsale_view.php?s=" .  $this->state_code . "&c=" . $this->county . "&id=" . $row->towninfo_marketsale_branch_id;

            $blank_img = "/images/blank.png";
            
            
            if($row->market_logo_url != "" ) {
                $logo_img = $this->define_val->IMG_PROTECT ."?c=towninfo&cc=marketsale_market&d=logo&s=".$row->towninfo_marketsale_market_id;
            }
            else {
                $logo_img = $blank_img;
            }

            if($row->main_image_url != "" ) {
                $main_img = $this->define_val->IMG_PROTECT ."?c=towninfo&cc=marketsale_flyer&d=main&s=".$row->towninfo_marketsale_flyer_id;
            }
            else {
                $main_img = $blank_img;
            }

            $this->loop[$i] = array('T_ID' => $row->towninfo_marketsale_branch_id,'T_LINK' => $link, 'T_LOGO' => $logo_img, 'T_MAIN' => $main_img, 'T_TITLE' => $row->title ,
                'T_SALE_DATE' => $row->sale_period, 'T_BRANCH_NAME' => $row->branch_name);


            $i++;
        }

    }
}



