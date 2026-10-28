<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class market_list
{

    private Db $db;
    private int $page;

    private string $s_listing_type = "";
    private string $s_state_code = "";
    private string $s_city_name = "";
    private string $s_kind = "";
    private string $s_is_active = "";
    private string $q_is_active = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    private string $q_listing_type = "";

    private int $no;
    private string $q_state_code = "";
    private string $q_city_name = "";

    public string $navigation_text = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params)
    {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_listing_type = $fn_params['s_listing_type'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }
        
        if ($this->s_listing_type != "-1" && $this->s_listing_type != "") {

            $this->q_listing_type = "AND A.listing_type = '{$this->s_listing_type}'";
        }

        if ($this->s_state_code != "-1" && $this->s_state_code != "") {

            $this->q_state_code = "AND A.state_code = '{$this->s_state_code}'";
        }

        if ($this->s_city_name != "-1" && $this->s_city_name != "") {

            $this->q_city_name = "AND A.city_name = '{$this->s_city_name}'";
        }

        if ($this->s_keyword != "") {

            $column = "A.title";

            switch ($this->s_kind) {

                case "title":
                    $column = "A.title";
                    break;
                case "content":
                    $column = "A.description";
                    break;
            }
            
            $temp = addslashes($this->s_keyword) . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (A.title like '$temp' OR A.description like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {

        $count_sql = "SELECT count(*) as cnt from community_marketplace_listings A where 1=1 {$this->q_is_active} {$this->q_listing_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";

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

        $row_sql = "SELECT A.* FROM community_marketplace_listings A where 1=1 {$this->q_is_active} {$this->q_listing_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";
        $row_sql .= " order by A.created_at desc Limit " . $pagination->limit_regno . ", " . $pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "Total(" . number_format($pagination->getTotal(), 0) . ") [Page : " . number_format($this->page, 0) . "/" . number_format($pagination->getTotalPage(), 0) . "]";
    }

    private function make_data()
    {

        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {
            $link = "market_view.php?community_marketplace_listings_id=" . $row->community_marketplace_listings_id;
            $is_active_img = "no-active";
            if ($row->is_active == "1") {
                $is_active_img = "completed";
            }

            $img = "/images/blank.png";
            if ($row->image_01_url != "") {
                $img = $this->define_val->IMG_PROTECT . "?c=community&cc=market&d=img1&s=" . $row->community_marketplace_listings_id;
            }

            $listing_type = ARRAY_RETURN($this->define_val->DEFINE_market_listing_type, $row->listing_type);

            $marketplace_type_value = $row->marketplace_type;
            $marketplace_type = $marketplace_type_value;
            if (isset($this->define_val->DEFINE_market_marketplace_type[$row->listing_type])) {
                $marketplace_type = ARRAY_RETURN($this->define_val->DEFINE_market_marketplace_type[$row->listing_type], $marketplace_type_value);
            }

            $this->loop[$i] = array(
                'T_NO' => $row->community_marketplace_listings_id,
                'T_LINK' => $link,
                'T_IMG' => $img,
                'T_LISTING_TYPE' => $listing_type,
                'T_MARKETPLACE_TYPE' => $marketplace_type,
                'T_LOCATION' => $row->city_name . "," . $row->state_code,
                'T_TITLE' => $row->title,
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
