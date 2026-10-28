<?php

namespace common_service;

use define_val;
use Migliori\PowerLitePdo\Db;

class service_reply_write
{

    private Db $db;
    private define_val $define_val;

    private string $parent_code = "";
    private string $parent_id = "";
    private string $user_id = "";
    private string $comments = "";

    private string $ip_address = "";

    private string $table = "listing_replies";

    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->parent_code = $fn_params['parent_code'];
        $this->parent_id = $fn_params['parent_id'];
        $this->user_id = $fn_params['user_id'];
        $this->comments = $fn_params['comments'];
        $this->ip_address = $fn_params['ip_address'];

        $this->save();
    }

    private function save() {

        $values = ['listing_reply_id' => null, 'parent_code' => $this->parent_code, 'parent_id' => $this->parent_id, 'user_id' => $this->user_id, 'comments' => $this->comments, 'created_user' => $SS_NICKNAME, 'ip_address' => $this->ip_address];

        $result = $this->db->insert($this->table, $values);

    }
}