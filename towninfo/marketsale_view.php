<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$s = $_GET["s"] ?? "";
$c = $_GET["c"] ?? "";
$id = $_GET["id"] ?? "";

$on_ca = "";
$on_ny = "";
$on_tx = "";
$on_nj = "";
$on_va = "";
$on_ga = "";
$on_il = "";
$on_md = "";
$on_hi = "";

switch ($s) {

    case "CA":
        $on_ca = "on";
        break;
    case "NYNJ":
        $on_nynj = "on";
        break;
    case "TX":
        $on_tx = "on";
        break;
    case "MDVA":
        $on_mdva = "on";
        break;
    case "DC":
        $on_dc = "on";
        break;
    case "GA":
        $on_ga = "on";
        break;
    case "IL":
        $on_il = "on";
        break;
    case "AZ":
        $on_az = "on";
        break;
    case "HI":
        $on_hi = "on";
        break;
}


/*
$row_sql = "
SELECT
    A.*,
    C.market_name,
    C.market_logo_url,
    B.title,
    B.main_image_url,
    B.description,
    B.sale_start_date,
    B.sale_end_date
FROM towninfo_marketsale_branch A
JOIN towninfo_marketsale_branch base
    ON base.towninfo_marketsale_branch_id = {$id}
   AND A.towninfo_marketsale_market_id = base.towninfo_marketsale_market_id
   AND A.region <=> base.region          -- NULL-safe 비교 (둘 다 NULL이어도 매칭)
LEFT JOIN towninfo_marketsale_flyer B
    ON A.towninfo_marketsale_flyer_id = B.towninfo_marketsale_flyer_id
LEFT JOIN towninfo_marketsale_market C
    ON A.towninfo_marketsale_market_id = C.towninfo_marketsale_market_id
ORDER BY A.county_name asc

";
*/
// $row_sql = "SELECT * FROM towninfo_marketsale_flyer where towninfo_marketsale_flyer_id = (select towninfo_marketsale_flyer_id from towninfo_marketsale_branch where towninfo_marketsale_branch_id = '{$id}' and is_active = 1)";

$row_sql = "SELECT A.*, B.title, B.main_image_url, B.description, B.sale_start_date, B.sale_end_date, B.view_count, B.user_id, B.created_at as rdate, C.market_name, C.market_logo_url FROM towninfo_marketsale_branch A
                    LEFT JOIN towninfo_marketsale_flyer B on A.towninfo_marketsale_flyer_id = B.towninfo_marketsale_flyer_id
                    left join towninfo_marketsale_market C on A.towninfo_marketsale_market_id = C.towninfo_marketsale_market_id
                    where A.towninfo_marketsale_branch_id  = {$id}
";

$db->query($row_sql);

$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_MARKETSALE_HOME);

$p_towninfo_marketsale_flyer_id = $row->towninfo_marketsale_flyer_id;
$p_towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
$p_title = $row->title;
$p_market_logo_url = $row->market_logo_url;
$p_main_image_url = $row->main_image_url;
$p_sale_start_date = $row->sale_start_date;
$p_sale_end_date = $row->sale_end_date;
$p_state_code = $row->state_code;
$p_description = $row->description;
$p_user_id = $row->user_id;

$p_view_count = $row->view_count + 1;
$p_rdate = DATETOSTRING_USA2($row->rdate,"/");

$db->update('towninfo_marketsale_flyer', ['view_count' => $p_view_count], 'towninfo_marketsale_flyer_id = ' . $p_towninfo_marketsale_flyer_id);

if($p_user_id == $SS_ID) $update_button = "&nbsp;  <a href=\"/towninfo/marketsale_update.php?id={$p_towninfo_marketsale_flyer_id}\" class=\"btn btn-primary btn-sm\" type=\"button\">전단지 수정</a>";
else  $update_button = "";

$logo_img = $define_val->IMG_PROTECT ."?c=towninfo&cc=marketsale_market&d=logo&s=".$p_towninfo_marketsale_market_id;
$main_img = $define_val->IMG_PROTECT ."?c=towninfo&cc=marketsale_flyer&d=main&s=".$p_towninfo_marketsale_flyer_id;

$grouped = [];
$max_per_row = 2;

$q_state_code = " = '{$p_state_code}'";

if($s == "NYNJ") $q_state_code = " in ('NY','NJ')";
if($s == "MDVA") $q_state_code = " in ('MD','VA')";
            
$row_sql = "
  SELECT *
FROM towninfo_marketsale_branch
WHERE towninfo_marketsale_market_id = (
        SELECT towninfo_marketsale_market_id
        FROM towninfo_marketsale_branch
        WHERE towninfo_marketsale_branch_id = {$id}        
      )
  AND state_code {$q_state_code}
  AND NULLIF(region, '') <=> NULLIF(
        (SELECT region
         FROM towninfo_marketsale_branch
         WHERE towninfo_marketsale_branch_id =  {$id}
         
         ),
         
        ''
      )
  and is_active = 1
ORDER BY county_name ASC;

";


$db->query($row_sql);
while($row = $db->fetch()) {
    $county = $row->county_name;
    $label  = isset($county_labels[$county]) ? $county_labels[$county] : $county;
 
    $grouped[$label][] = [
        'name'  => $row->branch_name,
        'phone' => $row->contact_phone,
    ];
}

/*
$html = "<div class=\"panel row child-cols-12 md:child-cols pb-2 pt-2 border-bottom\">             
    <div class=\"d-flex gap-3 fs-6 flex-wrap text-gray-900 text-opacity-80 justify-between md:justify-start px-3 md:px-0\">
    ";
 
        foreach ($grouped as $label => $items) {
          
            $chunks = array_chunk($items, $max_per_row);
 
            foreach ($chunks as $chunkIndex => $chunk) {
            
                if($chunkIndex > 0) $visible = "visibility:hidden;";
                else  $visible = "";
                
                $html .= "<div class=\"hstack gap-2 flex-wrap align-items-center\">
 
                
                        <div class=\"fw-bold fs-5 text-dark\" style=\"min-width:30px; $visible \">
                ";
                
                $html .= "<div style='font-size:18px !important;width:200px !important;color: #e97d25'>".htmlspecialchars($label)."</div>";
                
                $html .= "</div>
 
                        <div style=\"display:flex; flex-wrap:wrap; gap:4px; align-items:center;\">
                ";
                
                foreach ($chunk as $i => $branch) {

                    $html .= "<span style=\"white-space:nowrap; width:280px;\">";
                    $html .= "<strong>".htmlspecialchars($branch['name'])."</strong>";
                    
                    $html .=  " : ".htmlspecialchars($branch['phone']) . "
                        </span>";
                        
                    if ($i < count($chunk) - 1) {
                        $html .= "<span class=\"text-gray-400\">&nbsp; | &nbsp;</span>";
                    }
                }
                $html .= "</div>
 
            </div>
            ";
            
            }
 
        }
 
    $html .= "</div>
</div>";

*/

    /*
$html = "";

    $idx = 0;
    
    foreach ($grouped as $label => $items) {

        if ($label === "") { continue; }

        $html .= "
        <div class=\"county-col\" style=\"flex:0 0 calc((100% - 2.1rem) / 3); width:calc((100% - 2.1rem) / 3); min-width:0; box-sizing:border-box; overflow:hidden;\">
            <div class=\"vstack gap-0\">
                <div class=\"fw-bold fs-6 mb-1\" style=\"color:#e97d25;\">" . htmlspecialchars($label) . "</div>";


        foreach ($items as $branch) {
            $name  = htmlspecialchars($branch['name']);
            $phone = htmlspecialchars($branch['phone'] ?? "");

            $html .= "
                <div class=\"hstack gap-1\" style=\"min-width:0;\">
                    <div style=\"white-space:nowrap;\">$name</div>
                    <div class=\"sep\"></div>
                    <div class=\"text-gray-900 text-opacity-80 fs-6 fw-bold\">
                        <a class=\"text-none\" href=\"tel:$phone\"><img src=\"/towninfo/images/phone2.svg\" alt=\"\" class=\"d-flex md:d-none\" /><span class=\"d-none md:d-flex\">$phone</span></a>
                    </div>
                </div>";
        }

        $html .= "
            </div>
        </div><!-- " . ($idx + 1) . "단 -->";

        $idx++;
    }
  */
  $html  = "<div class=\"hannam-locations-wrapper\">";
$html .= "
    <div class=\"hannam-logo-section\">
        <img src=\"{$logo_img}\" alt=\"\"/> <button id=\"toggleDealerBtn\" onclick=\"toggleDealerList()\">마켓보기 <i id=\"dealerIcon\" class=\"fa fa-chevron-down\"></i></button>
    </div>
    <div id=\"dealerList\" style=\"display: none;\">";

foreach ($grouped as $label => $items) {

    if ($label === "") { continue; }
    
    $result = str_replace(" County", "", $label);

    $html .= "
    <div class=\"county-row\">
        <div class=\"county-name\" style=\"padding-top:1px !important; font-size:0.75rem;\">" . htmlspecialchars($result) . "</div>
        <div class=\"branch-grid\">";

    foreach ($items as $branch) {
        $name  = htmlspecialchars($branch['name']);
        $phone = htmlspecialchars($branch['phone'] ?? "");

        $html .= "
            <div class=\"branch-card\">
                <div class=\"branch-text\" style=\"font-size:0.75rem;\">$name</div>
                <div class=\"branch-phone\" style=\"font-size:0.75rem;\"><a href=\"tel:$phone\">$phone</a></div>
            </div>";
    }

    $html .= "
        </div>
    </div>";
}

$html .= "</div></div>";

      

$main=4;
$sub=2;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_view.tpl");

$tpl->setVar("T_ON_CA", $on_ca);
$tpl->setVar("T_ON_NYNJ", $on_nynj);
$tpl->setVar("T_ON_TX", $on_tx);
$tpl->setVar("T_ON_MDVA", $on_mdva);
$tpl->setVar("T_ON_DC", $on_dc);
$tpl->setVar("T_ON_GA", $on_ga);
$tpl->setVar("T_ON_IL", $on_il);
$tpl->setVar("T_ON_AZ", $on_az);
$tpl->setVar("T_ON_HI", $on_hi);

$tpl->setVar("T_S", $s);

$tpl->setVar("UPDATE_BUTTON", $update_button);

$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_DATE",  DATETOSTRING_USA2($p_sale_start_date,"/")  . " ~" . DATETOSTRING_USA2($p_sale_end_date,"/"));
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("T_CREATE_AT", $p_rdate);
$tpl->setVar("T_LOGO_URL", $logo_img);
$tpl->setVar("T_MAIN_URL", $main_img);
$tpl->setVar("T_MAIN_URL_BASE", base64_encode($main_img));
$tpl->setVar("T_DESCRIPTION", str_replace("\n", "<br>", $p_description));
$tpl->setVar("T_LINK", $p_weekly_ads_flyer_site);


$tpl->setVar("T_BRANCH", $html);



include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

