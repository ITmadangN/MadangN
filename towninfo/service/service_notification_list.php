<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class service_notification_list
{

    private Db $db;
    private int $page;

    private string $s_category = "";
    private string $s_kind = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    private string $q_category = "";

    private int $no;

    public string $navigation_text = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_category = $fn_params['s_category'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_category != "-1" && $this->s_category != "") {

            $this->q_category = "AND A.category = '{$this->s_category}'";
        }

        if($this->s_keyword != "") {

            switch($this->s_kind) {

                case "title": $column = "A.title"; break;
                case "description":  $column = "A.description"; break;
                default : $column = "A.title";
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (A.title like '$temp' OR A.description like '$temp')";
            }
        }

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from towninfo_event_notification A where A.is_active = 1 {$this->q_category} {$this->q_keyword}";

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

        $row_sql = "SELECT A.* FROM towninfo_event_notification A where A.is_active = 1 {$this->q_category} {$this->q_keyword}";
        $row_sql .= " order by A.towninfo_event_notification_id desc Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "총 (".number_format($pagination->getTotal(),0).")개 [전체 :".number_format($this->page,0)."/".number_format($pagination->getTotalPage(),0)."] 페이지";


    }


    private function make_data() {

        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {

            $link = "notification_view.php?id=" . $row->towninfo_event_notification_id;
            $p_towninfo_event_notification_id = $row->towninfo_event_notification_id;
            $p_image_01_url = $row->image_01_url;
            $p_image_02_url = $row->image_02_url;
            $p_image_03_url = $row->image_03_url;

            $blank_img = "";
//            $blank_img = "/images/blank.png";

            if ($p_image_01_url != "") {
                $main_img = ($this->define_val->IMG_PROTECT) . "?c=towninfo&cc=notification&d=img1&s=" . $p_towninfo_event_notification_id;}
            else if ($p_image_02_url != "") {
                    $main_img = ($this->define_val->IMG_PROTECT) . "?c=towninfo&cc=notification&d=img2&s=" . $p_towninfo_event_notification_id;}
            else if ($p_image_03_url != "") {
                    $main_img = ($this->define_val->IMG_PROTECT) . "?c=towninfo&cc=notification&d=img3&s=" . $p_towninfo_event_notification_id;}
            else {
                $main_img = $blank_img;
            }

//            saveLog("$p_image_01_url : ",$p_image_01_url);
//            saveLog("$main_img : ",$main_img);

            $category = ARRAY_RETURN($this->define_val->DEFINE_notification_category,$row->category);
            $home_css = "mt-3";
            
            if($i == 0) {
                $home_css = "uc-first-column";
            }


            $this->loop[$i] = array('T_HOME_CSS' => $home_css,'T_NO' => $no,'T_LINK' => $link, 'T_IMG' => $main_img,'T_CATEGORY' => $category, 'T_TITLE' => $row->title ,
                'T_VIEW_COUNT' => $row->view_count, 'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),  'T_CREATED_USER' => $row->created_user);


            $i++;
            $no--;
        }

    }
}


