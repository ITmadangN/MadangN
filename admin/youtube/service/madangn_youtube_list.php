<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class madangn_youtube_list
{

    private Db $db;
    private int $page;
    private string $s_channel_id = "";
    private string $s_category_1 = "";
    private string $s_category_2 = "";
    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;
    private string $s_is_active = "";
    private string $q_is_active = "";

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    private string $q_channel_id = "";

    private int $no;
    private string $q_category_1 = "";
    private string $q_category_2 = "";

    public string $navigation_text = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_channel_id = $fn_params['s_channel_id'];
        $this->s_category_1 = $fn_params['s_category_1'];
        $this->s_category_2 = $fn_params['s_category_2'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }
        
        if($this->s_channel_id != "-1" && $this->s_channel_id != "") {

            $this->q_channel_id = "AND B.channel_id = '{$this->s_channel_id}'";
        }

        if($this->s_category_1 != "-1" && $this->s_category_1 != "") {

            $this->q_category_1 = "AND A.category_1 = '{$this->s_category_1}'";
        }

        if($this->s_category_2 != "-1" && $this->s_category_2 != "") {

            $this->q_category_2 = "AND A.category_2 = '{$this->s_category_2}'";
        }

        if($this->s_keyword != "") {

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND B.history_title like '$temp'";

        }

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from youtube_featured_videos A left join youtube_channel_featured_videos B on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id where A.youtube_featured_videos_id > 0 {$this->q_is_active}  {$this->q_channel_id} {$this->q_category_1} {$this->q_category_2} {$this->q_keyword}";

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

        $row_sql = "SELECT A.*, B.default_image, B.channel_id, B.history_title FROM youtube_featured_videos A
                        left join youtube_channel_featured_videos B
                        on A.youtube_channel_featured_videos_id =  B.youtube_channel_featured_videos_id
                        where A.youtube_featured_videos_id > 0 {$this->q_is_active}  {$this->q_channel_id} {$this->q_category_1} {$this->q_category_2} {$this->q_keyword}";


        $row_sql .= " Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "총 (".number_format($pagination->getTotal(),0).")개 [전체 :".number_format($this->page,0)."/".number_format($pagination->getTotalPage(),0)."] 페이지";


    }

    private function make_data() {

        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {

            $link = "madangn_youtube_update.php?youtube_featured_videos_id=".$row->youtube_featured_videos_id;
            
            if($row->home_pick == "") $home_pick_link = "<span style='cursor:pointer' id='home_pick_{$i}' onclick=\"SET_FLAG('home_pick','{$row->youtube_featured_videos_id}','{$i}');\">&nbsp;&nbsp;&nbsp;</span>";
            else $home_pick_link = "<span style='cursor:pointer' id='homek_pic_{$i}' onclick=\"SET_FLAG('home_pick','{$row->youtube_featured_videos_id}','{$i}');\">{$row->home_pick}</span>";
            
            if($row->editors_pick == "") $editors_pick_link = "<span style='cursor:pointer' id='editors_pick_{$i}' onclick=\"SET_FLAG('editors_pick','{$row->youtube_featured_videos_id}','{$i}');\">&nbsp;&nbsp;&nbsp;</span>";
            else $editors_pick_link = "<span style='cursor:pointer' id='editors_pick_{$i}' onclick=\"SET_FLAG('editors_pick','{$row->youtube_featured_videos_id}','{$i}');\">{$row->editors_pick}</span>";
            
            if($row->insurance_finance_pick == "") $insurance_finance_pick_link = "<span style='cursor:pointer' id='insurance_finance_pick_{$i}' onclick=\"SET_FLAG('insurance_finance_pick','{$row->youtube_featured_videos_id}','{$i}');\">&nbsp;&nbsp;&nbsp;</span>";
            else $insurance_finance_pick_link = "<span style='cursor:pointer' id='insurance_finance_pick_{$i}' onclick=\"SET_FLAG('insurance_finance_pick','{$row->youtube_featured_videos_id}','{$i}');\">{$row->insurance_finance_pick}</span>";
            
            if($row->rogg_pick == "") $rogg_pick_link = "<span style='cursor:pointer' id='rogg_pick_{$i}' onclick=\"SET_FLAG('rogg_pick','{$row->youtube_featured_videos_id}','{$i}');\">&nbsp;&nbsp;&nbsp;</span>";
            else $rogg_pick_link = "<span style='cursor:pointer' id='rogg_pick_{$i}' onclick=\"SET_FLAG('rogg_pick','{$row->youtube_featured_videos_id}',{$i}');\">{$row->rogg_pick}</span>";
            
            $is_active_img = "no-active";
            if($row->is_active == "1") $is_active_img = "completed";
            $this->loop[$i] = array(
                'T_NO' => $no, 'T_LINK' => $link, 'T_IMG' => $row->default_image,  'T_CHANNEL_NAME' => ARRAY_RETURN($this->define_val->DEFINE_youtube_channel,$row->channel_id) ,  'T_CATEGORY1_NAME' => ARRAY_RETURN($this->define_val->DEFINE_youtube_category1,$row->category_1),
                'T_CATEGORY2_NAME' => ARRAY_RETURN($this->define_val->DEFINE_youtube_category2[$row->category_1],$row->category_2),'T_HISTORY_TITLE' => $row->history_title, 'T_HOME_PICK' => $home_pick_link,'T_EDITORS_PICK'=>$editors_pick_link,'T_INSURE_PICK'=>$insurance_finance_pick_link,'T_ROGG_PICK'=>$rogg_pick_link,
                'T_ACTIVE_IMG' => $is_active_img, 'T_IS_ACTIVE' => ARRAY_RETURN($this->define_val->DEFINE_is_active,$row->is_active)
            );

            $i++;
            $no--;
        }
    }
}