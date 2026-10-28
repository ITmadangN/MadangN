<?php

use BearTemplate\BearTemplate;

session_start();

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "job_ad_payment";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$main="4";
$sub="1";
$mtitle="커뮤니티";
$stitle="구인구직 광고 신청 & 결제 조회";
$ytitle="결제조회";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "recruit_pay_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_S_IS_MODIFY_YN",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","수정가능 여부"));
$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(-1, "", $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc","주선택"));
$tpl->setVar("S_SELECT_CITY_NAME", ARRAY_ARRAY_RETURN($define_val->DEFINE_blank, -1, "","도시선택"));
//$tpl->setVar("S_SELECT_IS_PAID", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_paid, 0, ""));
$tpl->setVar("S_SELECT_PAY_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_pay_kind, 0, ""));
$tpl->setVar("S_SELECT_HAS_ACTIVE_ADVERTISEMENT", ARRAY_ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, -1, "","광고활성상태"));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));
$tpl->setVar("S_SELECT_IS_APPROVED", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, -1, "", "승인 여부"));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
