<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class memo_list
{

    private Db $db;
    private int $page;

    private string $s_kind = "";
    private string $s_type = "";
    private string $q_type = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    
    private int $no;
    
    public string $navigation_text = "";
    
    public string $recipient_user_id = "";
    

    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
    
        $this->page = $fn_params['page'];
        $this->recipient_user_id = $fn_params['recipient_user_id'];
        $this->s_type = $fn_params['s_type'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];
        
        $this->q_type = "and (A.recipient_user_id = '{$this->recipient_user_id}' or A.sender_user_id = '{$this->recipient_user_id}')";
        
        if($this->s_type != "-1" && $this->s_type != "") {

            if($this->s_type == "recipient") $this->q_type = "AND A.recipient_user_id = '{$this->recipient_user_id}'";
            if($this->s_type == "sender") $this->q_type = "AND A.sender_user_id = '{$this->recipient_user_id}'";
        }
        
        if($this->s_keyword != "") {

            switch($this->s_kind) {

                case "title": $column = "A.title"; break;
                case "content":  $column = "A.content"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

        }

        $this->init();
    }

    private function init() {

        $count_sql = "SELECT count(*) as cnt from user_messages A where A.is_active = 1 {$this->q_type} {$this->q_keyword}";
        

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
        
        $row_sql = "SELECT A.* FROM user_messages A where A.is_active = 1  {$this->q_type} {$this->q_keyword} order by A.created_at desc Limit ".$pagination->limit_regno.", ".$pagination->page_set;
        
        $this->db->query($row_sql);

        $this->make_data();

    }


    private function make_data() {

        $i = 0;

        $no = $this->no;

        while ($row = $this->db->fetch()) {
            
            if($row->recipient_user_id == $this->recipient_user_id) $type = "<span style='color:blue'>받은 쪽지</span>";
            else $type = "보낸 쪽지";
            

            $this->loop[$i] = array('T_NO' => $no,'T_TYPE'=> $type, 'T_ID' => $row->user_messages_id, 'T_TITLE' => $row->title ,
                'T_IS_READ' => $row->is_read, 'T_CREATE_AT' => DATETOSTRING_USA2($row->created_at,"/"),  'T_CREATED_USER' => $row->created_user);


            $i++;
            $no--;
        }
        

    }
}

