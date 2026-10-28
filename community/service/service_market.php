<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class market_list
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
    private int $no;
    private string $q_state_code = "";
    private string $q_city_name = "";

    public string $navigation_text = "";
    private string $s_listing_type = "";
    private string $s_marketplace_type = "";
    private string $q_marketplace_type = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_listing_type = $fn_params['s_listing_type'];
        $this->s_marketplace_type = $fn_params['s_marketplace_type'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_marketplace_type != "-1" && $this->s_marketplace_type != "") {

            $this->q_marketplace_type = "AND A.marketplace_type = '{$this->s_marketplace_type}'";
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
                case "content":  $column = "A.description"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

        }

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from community_marketplace_listings A where A.is_active = 1 and listing_type = '{$this->s_listing_type}' {$this->q_marketplace_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}";

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

        $row_sql = "SELECT A.* FROM community_marketplace_listings A where A.is_active = 1 and listing_type = '{$this->s_listing_type}' {$this->q_marketplace_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword} order by A.created_at desc";
        $row_sql .= " Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "총 (".number_format($pagination->getTotal(),0).")개 [전체 :".number_format($this->page,0)."/".number_format($pagination->getTotalPage(),0)."] 페이지";

    }

    private function make_data() {

        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {

            $link = "market_view.php?id=".$row->community_marketplace_listings_id."&lt=".$this->s_listing_type."&s=".$this->s_marketplace_type;

            $blank_img = "/images/blank.png";
            if($row->image_01_url != "" ) $img1 = $this->define_val->IMG_PROTECT ."?c=community&cc=market&d=img1&s=".$row->community_marketplace_listings_id; else $img1 = $blank_img;
            if($row->image_02_url != "" ) $img2 = $this->define_val->IMG_PROTECT ."?c=community&cc=market&d=img2&s=".$row->community_marketplace_listings_id; else $img2 = $blank_img;
            if($row->image_03_url != "" ) $img3 = $this->define_val->IMG_PROTECT ."?c=community&cc=market&d=img3&s=".$row->community_marketplace_listings_id; else $img3 = $blank_img;
            if($row->image_04_url != "" ) $img4 = $this->define_val->IMG_PROTECT ."?c=community&cc=market&d=img4&s=".$row->community_marketplace_listings_id; else $img4 = $blank_img;
            if($row->image_05_url != "" ) $img5 = $this->define_val->IMG_PROTECT ."?c=community&cc=market&d=img5&s=".$row->community_marketplace_listings_id; else $img5 = $blank_img;
            if($row->image_06_url != "" ) $img6 = $this->define_val->IMG_PROTECT ."?c=community&cc=market&d=img6&s=".$row->community_marketplace_listings_id; else $img6 = $blank_img;

            if($img1 == $blank_img) {
              
              if($img2 != $blank_img) $img1 = $img2;
              else if($img3 != $blank_img) $img1 = $img3;
              else if($img4 != $blank_img) $img1 = $img4;
              else if($img5 != $blank_img) $img1 = $img5;
                
            } 
            
            $title = $row->title;
            //$title = TRUNCATE_TITLE($row->title, 35, ".");
            
            if($this->s_listing_type == "market" || $this->s_listing_type == "msale" || $this->s_listing_type == "donation" || $this->s_listing_type == "wanted") {
                if($row->city_name != "") $t_temp = $row->city_name . ", " . $row->state_code;
                else $t_temp = $row->state_code;
            }
            else $t_temp =  DATETOSTRING_USA2($row->created_at,"/");
            
            $temp_price = "$".$row->marketplace_price;
            
            if($this->s_listing_type == "wanted" || $this->s_listing_type == "donation") {
                $temp_price = "&nbsp;";
            }            
            
            $this->loop[$i] = array('T_NO' => $no,'T_LINK' => $link, 'T_LOCATION' => $row->city_name . ", " . $row->state_code,  'T_IMG1' => $img1, 'T_IMG2' => $img2, 'T_IMG3' => $img3, 'T_IMG4' => $img4, 'T_IMG5' => $img5, 'T_IMG6' => $img6, 'T_TEMP' => $t_temp,
                'T_TITLE' => $title , 'T_MARKETPLACE_PRICE' => $temp_price, 'T_CREATED_USER' => $row->created_user,
                'T_CREATED_AT' => DATETOSTRING_USA2($row->created_at,"/"));


            $i++;
            $no--;
        }

    }
}

