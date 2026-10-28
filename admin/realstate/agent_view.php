<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');


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

$realestate_agent_id = $_GET["realestate_agent_id"] ?? "";

$sql = "SELECT A.*, B.office_key, B.office_name, B.office_mls_id, B.office_phone, B.office_email, B.office_address1, B.office_address2, B.office_city, B.office_state, B.office_zip, B.logo_image_url FROM realestate_agents A left join realestate_office B on A.office_key = B.office_key WHERE A.realestate_agent_id = :realestate_agent_id limit 0,1";
$placeholders = ['realestate_agent_id' => $realestate_agent_id];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();
if (!$row) {
    echo "데이터가 없습니다.";
    exit;
}

$p_realestate_agent_id = $row->realestate_agent_id;
$p_agent_key = $row->agent_key;
$p_specialized_field = $row->specialized_field;
$p_agent_full_name = $row->agent_full_name;
$p_agent_dre_license = $row->agent_dre_license;
$p_agent_phone = $row->agent_phone;
$p_agent_email = $row->agent_email;
$p_main_image_url = $row->main_image_url;
$p_is_active = $row->is_active;
$p_user_id = $row->user_id;
$p_is_approved = $row->is_approved;
$p_is_preminum_agent = $row->is_preminum_agent;
$p_has_active_listings = $row->has_active_listings;
$p_self_introduction = $row->self_introduction;


$p_logo_image_url = $row->logo_image_url;
$p_office_key = $row->office_key;
$p_office_name = $row->office_name;
$p_office_mls_id = $row->office_mls_id;
$p_office_phone = $row->office_phone;
$p_office_email = $row->office_email;
$p_office_address1 = $row->office_address1;
$p_office_address2 = $row->office_address2;
$p_office_city = $row->office_city;
$p_office_state = $row->office_state;
$p_office_zip = $row->office_zip;

$blank_img = "";
$p_del_main_image_url = "";
if ($p_main_image_url != "") {
    $v_main_image_url = $define_val->IMG_PROTECT . "?c=realestate&cc=agent&d=main&s=" . $p_realestate_agent_id;
    $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\" />";
    $p_del_main_image_url = GET_DEL_UPLOAD_IMAGE('main_image_url');
} else {
    $v_main_image_url = $blank_img;
}

$sql = "SELECT logo_image_url FROM realestate_office WHERE office_key = :office_key limit 0,1";
$placeholders = ['office_key' => $p_office_key];
$result = $db->query($sql, $placeholders);
if (!$result) $p_logo_image_url = "";
else { $row = $db->fetch();
        if (!$row) $p_logo_image_url = "";
        else $p_logo_image_url = $row->logo_image_url;
}

$p_del_logo_image_url = "";
if ($p_logo_image_url != "") {
    $v_logo_image_url = $define_val->IMG_PROTECT . "?c=realestate&cc=office&d=logo&s=" . $p_office_key;
    $v_logo_image_url = "<img src=\"$v_logo_image_url\" alt=\"\" />";
    $p_del_logo_image_url = GET_DEL_UPLOAD_IMAGE('logo_image_url');
} else {
    $v_logo_image_url = $blank_img;
}

$main = 6;
$sub = 2;
$mtitle = "부동산";
$stitle = "에이전트 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "agent_view.tpl");

$tpl->setVar("T_USER_ID", $p_user_id);
$tpl->setVar("T_REALESTATE_AGENT_ID", $p_realestate_agent_id);
$tpl->setVar("T_AGENT_KEY", $p_agent_key);
$tpl->setVar("T_AGENT_FULL_NAME", $p_agent_full_name);
$tpl->setVar("T_AGENT_DRE_LICENSE", $p_agent_dre_license);
$tpl->setVar("T_AGENT_PHONE", $p_agent_phone);
$tpl->setVar("T_AGENT_EMAIL", $p_agent_email);
$tpl->setVar("H_MAIN_IMAGE_URL", $p_main_image_url);
$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);
$tpl->setVar("T_DEL_MAIN_IMAGE_URL", $p_del_main_image_url);
$tpl->setVar("H_LOGO_IMAGE_URL", $p_logo_image_url);
$tpl->setVar("T_LOGO_IMAGE_URL", $v_logo_image_url);
$tpl->setVar("T_SELF_INTRODUCTION", @str_replace("\n", "<br>", $p_self_introduction));
$tpl->setVar("T_DEL_LOGO_IMAGE_URL", $p_del_logo_image_url);
$tpl->setVar("T_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));
$tpl->setVar("T_IS_APPROVED", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_approved));
$tpl->setVar("T_IS_PREMINUM_AGENT", ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, $p_is_preminum_agent));
$tpl->setVar("T_HAS_ACTIVE_LISTINGS", ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, $p_has_active_listings));
$tpl->setVar("T_SPECIALIZED_FIELD", ARRAY_RETURN($define_val->DEFINE_specialized_field, $p_specialized_field));


$tpl->setVar("T_OFFICE_KEY", $p_office_key);
$tpl->setVar("T_OFFICE_NAME", $p_office_name);
$tpl->setVar("T_OFFICE_MLS_ID", $p_office_mls_id);
$tpl->setVar("T_OFFICE_PHONE", $p_office_phone);
$tpl->setVar("T_OFFICE_EMAIL", $p_office_email);
$tpl->setVar("T_OFFICE_ADDRESS1", $p_office_address1);
$tpl->setVar("T_OFFICE_ADDRESS2", $p_office_address2);
$tpl->setVar("T_OFFICE_CITY", $p_office_city);
$tpl->setVar("T_OFFICE_STATE", $p_office_state);
$tpl->setVar("T_OFFICE_ZIP", $p_office_zip);


include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");
?>
