<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class realstate_list
{

    private Db $db;
    private int $page;

    private string $s_property_type = "";
    private string $s_state_code = "";
    private string $s_city_name = "";
    private string $s_kind = "";
    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;
    private string $s_is_active = "";
    private string $q_is_active = "";

    private define_val $define_val;

    public array $loop = array();
    public string $paging;
    public string $navigation_text = "";

    private string $q_property_type = "";
    private string $q_state_code = "";
    private string $q_city_name = "";
    private string $q_keyword = "";
    private int $no;

    public function __construct(Db $db, define_val $define_val, array $fn_params)
    {
        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_property_type = $fn_params['s_property_type'];
        $this->s_state_code = $fn_params['s_state_code'];
        $this->s_city_name = $fn_params['s_city_name'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }
        
        if ($this->s_property_type != "-1" && $this->s_property_type != "") {
            $this->q_property_type = "AND A.property_type = '{$this->s_property_type}'";
        }

        if ($this->s_state_code != "-1" && $this->s_state_code != "") {
            $this->q_state_code = "AND A.state_or_province = '{$this->s_state_code}'";
        }

        if ($this->s_city_name != "-1" && $this->s_city_name != "") {
            $this->q_city_name = "AND A.city = '{$this->s_city_name}'";
        }

        if ($this->s_keyword != "") {

            $column = "A.street_name";

            switch ($this->s_kind) {
                case "street_name":
                    $column = "A.street_name";
                    break;
                case "bedrooms_total":
                    $column = "A.bedrooms_total";
                    break;
            }

            $temp = "%" . $this->s_keyword . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if ($this->s_kind == "") {
                $this->q_keyword = "AND (A.street_name like '$temp' OR A.bedrooms_total like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {
        // ① realestate_listing 테이블만으로 COUNT 조회 (JOIN 제거)
        $count_sql = "
            SELECT count(*) as cnt FROM madangn.realestate_listing A
            WHERE 1=1
            {$this->q_is_active} 
            {$this->q_property_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}
        ";

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

        // ② realestate_listing 테이블만 조회 (JOIN 제거)
        $row_sql = "
            SELECT A.* FROM madangn.realestate_listing A
            WHERE 1=1
            {$this->q_is_active} 
            {$this->q_property_type} {$this->q_state_code} {$this->q_city_name} {$this->q_keyword}
            ORDER BY A.realestate_listing_id DESC
            LIMIT " . $pagination->limit_regno . ", " . $pagination->page_set;

        $this->db->query($row_sql);

        // ③ 메인 결과를 배열에 담기
        $rows = [];
        while ($row = $this->db->fetch()) {
            $rows[] = $row;
        }

        // ④ realestate_listing_id 목록 추출
        $ids = [];
        foreach ($rows as $row) {
            $ids[] = $row->realestate_listing_id;
        }

        // ⑤ 미디어 정보를 IN 쿼리로 한 번에 조회
        $media_map = [];
        if (!empty($ids)) {
            $id_list = implode(",", $ids);
            $media_sql = "
                SELECT realestate_listing_id, media_url, created_at
                FROM realestate_listing_media
                WHERE is_primary = 1
                AND realestate_listing_id IN ($id_list)
            ";
            $this->db->query($media_sql);

            while ($media = $this->db->fetch()) {
                $media_map[$media->realestate_listing_id] = $media;
            }
        }

        // ⑥ 두 결과를 합쳐서 최종 데이터 생성
        $this->make_data($rows, $media_map);

        $this->navigation_text = "Total(" . number_format($pagination->getTotal(), 0) . ") [Page : " . number_format($this->page, 0) . "/" . number_format($pagination->getTotalPage(), 0) . "]";
    }

    private function make_data(array $rows, array $media_map)
    {
        $i = 0;
        $no = $this->no;

        foreach ($rows as $row) {

            $link = "realstate_view.php?realestate_listing_id=" . $row->realestate_listing_id;
            $is_active_img = "no-active";
            if ($row->is_active == "1") {
                $is_active_img = "completed";
            }

            // 미디어 맵에서 해당 listing의 이미지 가져오기
            $img = "/images/blank.png";
            $created_at = "";

            if (isset($media_map[$row->realestate_listing_id])) {
                $media = $media_map[$row->realestate_listing_id];
                if ($media->media_url != "") {
                    $img = $media->media_url;
                }
                $created_at = $media->created_at;
            }

            $property_type = ARRAY_RETURN($this->define_val->DEFINE_realstate_property_type, $row->property_type);

            $this->loop[$i] = array(
                'T_NO' => $no,
                'T_LINK' => $link,
                'T_IMG' => $img,
                'T_PROPERTY_TYPE' => $property_type,
                'T_LOCATION' => $row->city . "," . $row->state_or_province,
                'T_LIST_PRICE' => $row->list_price,
                'T_BEDROOMS_TOTAL' => $row->bedrooms_total,
                'T_BATHROOMS_TOTAL' => $row->bathrooms_total,
                'T_YEAR_BUILT' => $row->year_built,
                'T_CREATE_AT' => DATETOSTRING_USA2($created_at, "/"),
                'T_ACTIVE_IMG' => $is_active_img,
                'T_IS_ACTIVE' => $row->standard_status
            );

            $i++;
            $no--;
        }
    }
}
