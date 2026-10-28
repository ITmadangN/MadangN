<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class marketsale_flyer_list
{

    private Db $db;
    private int $page;

    private string $s_kind = "";
    private string $s_keyword = "";
    private string $s_market = "";
    private string $s_state_code = "";
    private int $page_set;
    private int $block_set;
    private string $s_is_active = "";
    private string $q_is_active = "";

    private define_val $define_val;

    public array $loop = array();
    public string $paging;
    public string $navigation_text = "";

    private string $q_keyword = "";
    private string $q_market = "";
    private string $q_state_code = "";
    private int $no;

    public function __construct(Db $db, define_val $define_val, array $fn_params)
    {
        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->s_market = $fn_params['s_market'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }
        
        if ($this->s_market != "-1" && $this->s_market != "") {
            
            $this->q_market = "AND A.towninfo_marketsale_market_id = '{$this->s_market}'";
        }
        
        if ($this->s_state_code != "-1" && $this->s_state_code != "") {
            
            $this->q_state_code = "AND A.state_code = '{$this->s_state_code}'";
        }
        
        if ($this->s_keyword != "") {

            switch ($this->s_kind) {

                case "title":
                    $column = "A.title";
                    break;
                    
                case "description":
                    $column = "A.description";
                    break;
                
            }

            $temp = "%" . $this->s_keyword . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (A.title like '$temp' or A.description like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {
        $count_sql = "SELECT count(*) as cnt FROM towninfo_marketsale_flyer A left join towninfo_marketsale_market B on A.towninfo_marketsale_market_id = B.towninfo_marketsale_market_id WHERE 1=1 {$this->q_is_active}  {$this->q_keyword} {$this->q_market} {$this->q_state_code}";
                      
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

        $row_sql = "SELECT A.*, B.market_name FROM towninfo_marketsale_flyer A left join towninfo_marketsale_market B on A.towninfo_marketsale_market_id = B.towninfo_marketsale_market_id
                    WHERE 1=1 {$this->q_is_active}  {$this->q_keyword} {$this->q_market} {$this->q_state_code}";
        $row_sql .= " order by towninfo_marketsale_flyer_id desc Limit " . $pagination->limit_regno . ", " . $pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "Total(" . number_format($pagination->getTotal(), 0) . ") [Page : " . number_format($this->page, 0) . "/" . number_format($pagination->getTotalPage(), 0) . "]";
    }

    private function make_data()
    {
        $i = 0;
        $no = $this->no;

        while ($row = $this->db->fetch()) {
            $link = "marketsale_flyer_view.php?towninfo_marketsale_flyer_id=" . $row->towninfo_marketsale_flyer_id;
            $is_active_img = "no-active";
            if ($row->is_active == "1") {
                $is_active_img = "completed";
            }

            $img = "/images/blank.png";
            if ($row->main_image_url != "") {
                $img = $this->define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_flyer&d=main&s=" . $row->towninfo_marketsale_flyer_id;
            }

            $this->loop[$i] = array(
                'T_NO' => $row->towninfo_marketsale_flyer_id,
                'T_LINK' => $link,
                'T_IMG' =>  $img,
                'T_MARKET_NAME' => $row->market_name,
                'T_STATE_CODE' => $row->state_code,
                'T_SALE_START_DATE' => $row->sale_start_date,
                'T_SALE_END_DATE' => $row->sale_end_date,
                'T_WEEKLY_ADS_FLYER_SITE' => $row->weekly_ads_flyer_site,
                'T_CREATED_USER' => $row->created_user,
                'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),
                'T_ACTIVE_IMG' => $is_active_img,
                'T_IS_ACTIVE' => ARRAY_RETURN($this->define_val->DEFINE_is_active, $row->is_active)
            );

            $i++;
            $no--;
        }

    }
}
