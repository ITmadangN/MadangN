<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$run_adv = 0;

$today = date("Ymd");

//$sql = "select A.* from ad_payments A where A.user_id = :user_id and section_type = 5 and (('{$today}' BETWEEN start_date AND end_date) or ({$today} < end_date)) limit 0,1";    
$sql = "select A.* from ad_payments A where A.is_active =1 and A.user_id = :user_id and section_type = 5 and {$today} <= end_date limit 0,1";    
$placeholders = ['user_id' => $SS_ID];
$result = $db->query($sql, $placeholders);
$row = $db->fetch();
if(!empty($row)) {
    
    $agent_dre_license = $row->agent_dre_license;
    
    $msg = "광고를 진행중이거나 신청중이므로 다시 광고 신청 하실 필요가 없습니다.";            

    $run_adv = 1;
    
     echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
    "<script language=\"javascript\">\n" .
         "<!--\n" .
         "alert('$msg');" .
         "location.href='/realestate/agent.php';".
         "//-->\n" .
         "</script>\n");

        exit;

}

/*
$row_sql = "SELECT A.* FROM ad_community_agent_amount A where A.ad_type = 'agent'";
                      
$placeholders = [];
$result = $db->query($row_sql, $placeholders);
$row = $db->fetch();

$amount_agent =  $row->ad_amount;
*/
/*
$sql = "SELECT A.*, 
        B.realestate_office_id, B.office_mls_id, B.office_phone, B.office_email, 
        B.office_address1, B.office_address2, B.office_city, B.office_state, B.office_zip, B.logo_image_url
        FROM realestate_agents A
        left  join realestate_office B
        on A.office_key = B.office_key
        where A.user_id = :user_id limit 0,1";
$placeholders = ['user_id' => $SS_ID];
$result = $db->query($sql, $placeholders);

$row = $db->fetch();
if(!empty($row)) {
 
    $p_realestate_agent_id = $row->realestate_agent_id;
    $p_agent_key = $row->agent_key;
    $p_specialized_field = $row->specialized_field;
    $p_agent_full_name = $row->agent_full_name;
    $p_agent_dre_license = $row->agent_dre_license;
    $p_agent_phone = $row->agent_phone;
    $p_agent_email = $row->agent_email;
    $p_office_key = $row->office_key;
    $p_office_name = $row->office_name;
    $p_main_image_url = $row->main_image_url;
    $p_is_active = $row->is_active;
    $p_self_introduction = $row->self_introduction;
    $p_main_image_url = $row->main_image_url;

    $blank_img = "/images/blank.png";
    $p_del_main_image_url = "";
    if($p_main_image_url != "") {
        $v_main_image_url = $define_val->IMG_PROTECT ."?c=realestate&cc=agent&d=main&s=".$p_realestate_agent_id;
        $p_del_main_image_url = GET_DEL_UPLOAD_IMAGE('main_image_url');
    }
    else {
        $v_main_image_url = $blank_img;
    }

    $p_office_phone = $row->office_phone;
    $p_logo_image_url = $row->logo_image_url;
    $p_office_address1 = $row->office_address1;
    $p_office_address2 = $row->office_address2;

    $p_del_logo_image_url = "";
    if ($p_logo_image_url != "") {
        $v_logo_image_url = $define_val->IMG_PROTECT . "?c=realestate&cc=office&d=logo&s=" . $p_office_key;    
        $p_del_logo_image_url = GET_DEL_UPLOAD_IMAGE('logo_image_url');
    } else {
        $v_logo_image_url = $blank_img;
    }
   
}
else {
    
    $p_realestate_agent_id = "";
    $p_agent_key = "";
    $p_specialized_field = "";
    $p_agent_full_name = "";
    $p_agent_dre_license = "";
    $p_agent_phone = "";
    $p_agent_email = "";
    $p_office_key = "";
    $p_office_name = "";
    $p_main_image_url = "";
    $p_is_active = "";
    $p_self_introduction = "";
    $p_main_image_url = "";

    $v_main_image_url = "";
    $p_del_main_image_url = "";

    $p_office_phone = "";
    $p_logo_image_url = "";
    $p_office_address1 = "";
    $p_office_address2 = "";
    $v_logo_image_url = "";
    $p_del_logo_image_url = "";

}

*/

$main="6";
$sub="3";
$mtitle="유료광고신청";
$stitle="에이전트&매물광고";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "ad_03.tpl");

$tpl->setVar("AGENT",$amount_agent);
$tpl->setVar("T_PAY_YN_AGENT",$define_val->PAY_YN_AGENT);

$tpl->setVar("T_RUN_ADV",$run_adv);
$tpl->setVar("SELECT_VALIDITY_PERIOD",ARRAY_ARRAY_RETURN($define_val->DEFINE_validity_period,-1,"","기간선택"));
$tpl->setVar("SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc","주선택"));
$tpl->setVar("SELECT_SPECIALIZED_FIELD",ARRAY_ARRAY_RETURN($define_val->DEFINE_specialized_field,-1,"","전문분야선택"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

