<?php

use BearTemplate\BearTemplate;


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "banner_ad_payment";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$main="8";
$sub="1";
$mtitle="배너광고";
$stitle="배너 광고 신청 & 결제 조회";
$ytitle="결제조회";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "banner_pay_list.tpl");

$tpl->setVar("S_SELECT_BANNER_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_banner_type,-1,"","광고 섹션"));
$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_S_IS_MODIFY_YN",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","수정가능 여부"));
$tpl->setVar("S_SELECT_PAY_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_banner_pay_kind, 0, ""));
$tpl->setVar("S_SELECT_HAS_ACTIVE_ADVERTISEMENT", ARRAY_ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, -1, "","광고활성상태"));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));
$tpl->setVar("S_SELECT_IS_APPROVED", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, -1, "", "승인 여부"));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
