<?php

namespace common_service;


use define_val;
use Migliori\PowerLitePdo\Db;
use BearTemplate\BearTemplate;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/class.BearTemplate.php";

class service_reply_list
{

    private Db $db;

    private string $parent_code = "";
    private string $parent_id = "";

    private define_val $define_val;

    public array $loop = array();

    private string $document_root = "";

    public string $content = "";

    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->parent_code = $fn_params['parent_code'];
        $this->parent_id = $fn_params['parent_id'];
        $this->document_root = $_SERVER['DOCUMENT_ROOT'];

        $this->init();
    }

    private function init() {

        $row_sql = "SELECT A.*, B.user_nickname FROM listing_replies A left join users B on A.user_id = B.user_id where A.is_active = 1 and parent_code = '{$this->parent_code}' and parent_id = '{$this->parent_id}' order by A.created_at desc";

        $this->db->query($row_sql);

        $this->make_data();

        $this->make_html();

    }

    private function make_data() {

        $i = 0;

        while ($row = $this->db->fetch()) {

            $this->loop[$i] = array('T_USER_NICKNAME' => $row->user_nickname, 'T_COMMENTS' => nl2br($row->comments) ,'T_CREATE_AT' => $row->created_at);


            $i++;
        }

    }

    PRIVATE function make_html() {

        $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

        $tpl = new BearTemplate($DOCUMENT_ROOT.'/common_service/tpl',false);
        $tpl->setFile("main", "reply_body.tpl");
        $tpl->setLoop("T_LOOP", $this->loop);
        $tpl->tprint("main");
        $this->content = $tpl->content;

    }
}

