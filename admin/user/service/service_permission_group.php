<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class permission_group_list
{

    private Db $db;
    private int $page;

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

    private string $q_keyword = "";
    private int $no;
    private mixed $s_permission_group_id = "";
    private string $q_permission_group_id = "";

    public function __construct(Db $db, define_val $define_val, array $fn_params)
    {
        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        
        if ($this->s_keyword != "") {

            $column = "A.permission_group_name";

            switch ($this->s_kind) {

                case "name":
                    $column = "A.permission_group_name";
                    break;
            }

            $temp = "%" . $this->s_keyword . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (A.permission_group_name like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {
        $count_sql = "SELECT count(*) as cnt FROM permission_group A WHERE 1=1  {$this->q_keyword}";

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

        $row_sql = "SELECT A.* FROM permission_group A WHERE 1=1 {$this->q_keyword}";
        $row_sql .= " order by permission_group_id desc Limit " . $pagination->limit_regno . ", " . $pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "Total(" . number_format($pagination->getTotal(), 0) . ") [Page : " . number_format($this->page, 0) . "/" . number_format($pagination->getTotalPage(), 0) . "]";
    }

    private function make_data()
    {
        $i = 0;
        $no = $this->no;

        while ($row = $this->db->fetch()) {
            $link = "permission_group_view.php?permission_group_id=" . $row->permission_group_id;

            $this->loop[$i] = array(
                'T_NO' => $no,
                'T_LINK' => $link,
                'T_PERMISSION_GROUP_NAME' => $row->permission_group_name ,
                'T_PERMISSION_GROUP_DESCRIPTION' => $row->permission_group_description,                
            );

            $i++;
            $no--;
        }

    }
}
