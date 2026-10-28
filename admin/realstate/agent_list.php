<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "agent_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$main = 6;
$sub = 2;
$mtitle = "부동산";
$stitle = "에이전트 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "agent_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_AGENT_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_agent_s_kind, 0, ""));
$tpl->setVar("S_SELECT_IS_APPROVED", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, -1, "", "승인 여부"));
$tpl->setVar("S_SELECT_HAS_ACTIVE_ADVERTISEMENT", ARRAY_ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, -1, "","광고활성상태"));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));
$tpl->setVar("S_SELECT_IS_PREMINUM_AGENTD", ARRAY_ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, -1, "", "TOP Agent여부"));
$tpl->setVar("S_SELECT_HAS_ACTIVE_LISTINGS", ARRAY_ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, -1, "", "매물 보유 여부"));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
