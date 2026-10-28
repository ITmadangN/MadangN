<?php

use youtube_index2\youtube_index2;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/youtube/service/index2.php");

$youtube_home = new youtube_index2($db, $define_val);


$main=2;
$sub=1;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "index2.tpl");

$tpl->setLoop("M_TOP", $youtube_home->m_top);

$tpl->setLoop("M_TOP_OTHER", $youtube_home->m_top_other);

$tpl->setLoop("M_LATEST", $youtube_home->m_latest);

$tpl->setLoop("M_POPULAR", $youtube_home->m_popular);

$tpl->setLoop("M_MSHORTS", $youtube_home->m_mshorts);

$tpl->setLoop("M_EDITORS", $youtube_home->m_editors);

$tpl->setLoop("M_MADANGNTV", $youtube_home->m_madangtv);

$tpl->setLoop("M_INSURE", $youtube_home->m_insure);

$tpl->setLoop("M_INSURE_OTHER", $youtube_home->m_insure_other);

$tpl->setLoop("M_ISHORTS", $youtube_home->m_ishorts);

$tpl->setLoop("M_REALESTATE", $youtube_home->m_realestate);

$tpl->setLoop("M_ROGG", $youtube_home->m_rogg);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");
