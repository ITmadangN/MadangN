<?php

namespace youtube_index;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

class youtube_index
{
    private Db $db;
    private define_val $define_val;

    private string $top_query;

    private string $top_other_query;
    private string $editors_query;
    private string $insure_query;

    private string $insure_other_query;
    private string $rogg_query;
    private string $latest_query;
    private string $popular_query;
    private string $mshorts_query;
    private string $madangtv_query;
    private string $ishorts_query;
    private string $realestate_query;
    public array $m_top = array();
    public array $m_top_other = array();
    public array $m_editors = array();
    public array $m_insure = array();

    public array $m_insure_other = array();
    public array $m_rogg = array();
    public array $m_latest = array();
    public array $m_popular = array();
    public array $m_mshorts = array();
    public array $m_ishorts = array();
    public array $m_madangtv = array();
    public array $m_realestate = array();



    public function __construct(Db $db, define_val $define_val, $index = 'N')
    {

        $this->db = $db;
        $this->define_val = $define_val;

        $query = "SELECT A.*, B.history_title, B.hight_image, B.standard_img FROM youtube_featured_videos A left join youtube_channel_featured_videos B on A.youtube_channel_featured_videos_id = B.youtube_channel_featured_videos_id where A.is_active = 1 ";

        $this->top_query = $query . " and A.home_pick = 'Y' order by B.puliishedat desc limit 0,4";

        $this->top_other_query = $query . " and A.home_pick = 'Y' order by B.puliishedat desc limit 4,2";

        $this->editors_query = $query . " and A.editors_pick = 'Y' order by B.puliishedat desc limit 0,8";

        $this->insure_query = $query . " and A.insurance_finance_pick = 'Y' order by B.puliishedat desc limit 0,8";

        $this->insure_other_query = $query . " and A.insurance_finance_pick = 'Y' order by B.puliishedat desc limit 8,8";

        $this->rogg_query = $query . " and A.category_1 = 'rogg'  order by B.puliishedat desc limit 0,4";

        if($index == 'Y') $this->latest_query = $query . " and A.category_2 != 'mshorts' and A.category_2 != 'ishorts' order by B.puliishedat desc limit 0,10";
        else $this->latest_query = $query . " and A.category_2 != 'mshorts' and A.category_2 != 'ishorts' order by B.puliishedat desc limit 0,8";

        $this->popular_query = $query . " and A.category_2 != 'mshorts' and A.category_2 != 'ishorts' order by B.view_count desc limit 0,12";

        $this->mshorts_query = $query . " and A.category_1 = 'madangntv' and A.category_2 = 'mshorts' order by B.puliishedat desc limit 0,8";

        $this->madangtv_query = $query . " and A.category_1 = 'madangntv' order by B.puliishedat desc limit 0,6";

        $this->ishorts_query = $query . "  and A.category_1 = 'insure' and A.category_2 = 'ishorts' order by B.puliishedat desc limit 0,8";

        $this->realestate_query = $query . " and A.category_1 = 'realstate' order by B.puliishedat desc limit 0,4";

        $this->init();
    }

    public function init() : void {

        $this->db->query($this->top_query); $this->m_top = $this->make_data();
        $this->db->query($this->top_other_query); $this->m_top_other = $this->make_data();
        $this->db->query($this->editors_query); $this->m_editors = $this->make_data();
        $this->db->query($this->insure_query); $this->m_insure = $this->make_data();
        $this->db->query($this->insure_other_query); $this->m_insure_other = $this->make_data();
        $this->db->query($this->rogg_query); $this->m_rogg = $this->make_data();
        $this->db->query($this->latest_query); $this->m_latest = $this->make_data();
        $this->db->query($this->popular_query); $this->m_popular = $this->make_data();
        $this->db->query($this->mshorts_query); $this->m_mshorts = $this->make_data();
        $this->db->query($this->madangtv_query); $this->m_madangtv = $this->make_data();
        $this->db->query($this->ishorts_query); $this->m_ishorts = $this->make_data();
        $this->db->query($this->realestate_query); $this->m_realestate = $this->make_data();
    }

    public function make_data() : array {

        $loop = array();

        $i = 0;

        while ($row = $this->db->fetch()) {

            $no = $i + 1;

            $loop[$i] = array(
                'T_NO' => $no, 'T_VIDEO_ID' => $row->video_id, 'T_IMG' => $row->hight_image, 'T_SIMG' => $row->standard_img, 'T_HISTORY_TITLE' => $row->history_title
            );

            $i++;

        }

        return $loop;
    }

}