<?php

namespace youtube;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class youtube
{
    private Db $db;
    private int $page;
    private string $s_category_1 = "";
    private string $s_category_2 = "";
    private string $s_sort = "newest";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    private string $q_sort = "B.puliishedat desc";

    private int $no;
    private string $q_category_1 = "";
    private string $q_category_2 = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_sort = $fn_params['s_sort'];
        $this->s_category_1 = $fn_params['s_category_1'];
        $this->s_category_2 = $fn_params['s_category_2'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_category_1 != "") {

            $this->q_category_1 = "AND A.category_1 = '{$this->s_category_1}'";
        }

        if($this->s_category_2 != "") {

            $this->q_category_2 = "AND A.category_2 = '{$this->s_category_2}'";
        }

        if($this->s_sort == "newest") {
            $this->q_sort = "B.puliishedat desc";
        }
        else {
            $this->q_sort = "B.view_count desc";
        }

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from youtube_featured_videos A left join youtube_channel_featured_videos B on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id where A.is_active = 1 {$this->q_category_1} {$this->q_category_2}";

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

        $row_sql = "SELECT B.*, A.youtube_featured_videos_id, A.category_1, A.category_2 FROM youtube_featured_videos A left join youtube_channel_featured_videos B on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id where A.is_active = 1 {$this->q_category_1} {$this->q_category_2}  order by {$this->q_sort}";
        // $row_sql .= " Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();


    }

    private function make_data() {

        $i = 0;

        $no = $this->no;

        $today = date("Ymd");

        while ($row = $this->db->fetch()) {

            if($row->puliishedat == "") continue;
            
            $margin = GET_DIFF((int)$row->puliishedat);
            

            if($margin == 0) $publish_date = "오늘";
            else $publish_date = FORMAT_DAYS($margin) . "전";

            $this->loop[$i] = array('T_NO' => $no, 'T_IMG' => $row->hight_image, 'T_VIDEO_ID' =>$row->video_id, 'T_HISTORY_TITLE' => $row->history_title, 'T_VIEW_COUNT' => number_format($row->view_count,0),'T_PUBLISH_DATE' => $publish_date);

            $i++;
            $no--;
        }

    }
}
