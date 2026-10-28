<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class user_list
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
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_permission_group_id = $fn_params['s_permission_group_id'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }
        
        if ($this->s_permission_group_id != "-1" && $this->s_permission_group_id != "") {
            $this->q_permission_group_id = "AND A.permission_group_id = '{$this->s_permission_group_id}'";
        }


        if ($this->s_keyword != "") {

            $column = "A.user_name";

            switch ($this->s_kind) {

                case "name":
                    $column = "A.user_name";
                    break;
                case "email":
                    $column = "A.user_email";
                    break;
                case "phone":
                    $column = "A.user_phone";
                    break;    
            }

            $temp = "%" . $this->s_keyword . "%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (A.user_name like '$temp' OR A.user_email like '$temp' OR A.user_phone like '$temp')";
            }
        }

        $this->init();
    }

    private function init()
    {
        $count_sql = "SELECT count(*) as cnt FROM users A WHERE 1=1 {$this->q_is_active} {$this->q_permission_group_id} {$this->q_keyword}";

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

        $row_sql = "SELECT A.*, B.permission_group_name FROM users A left join permission_group B on A.permission_group_id = B.permission_group_id WHERE 1=1 {$this->q_is_active} {$this->q_permission_group_id} {$this->q_keyword}";
        $row_sql .= " order by user_id asc Limit " . $pagination->limit_regno . ", " . $pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "Total(" . number_format($pagination->getTotal(), 0) . ") [Page : " . number_format($this->page, 0) . "/" . number_format($pagination->getTotalPage(), 0) . "]";
    }

    private function make_data()
    {
        $i = 0;
        $no = $this->no;

        while ($row = $this->db->fetch()) {
            $link = "user_view.php?user_id=" . $row->user_id;
            $is_active_img = "no-active";
            if ($row->is_active == "1") {
                $is_active_img = "completed";
            }

            $permission_group_name = $row->permission_group_name;
            
            $this->loop[$i] = array(
                'T_NO' => $no,
                'T_LINK' => $link,
                'T_PERMISSION_GROUP_NAME' => $permission_group_name,
                'T_USER_ID' => $row->user_id ,
                'T_USER_NICKNAME' => $row->user_nickname,
                'T_USER_NAME' => $row->user_name,
                'T_USER_EMAIL' => $row->user_email,
                'T_USER_PHONE' => $row->user_phone,
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
