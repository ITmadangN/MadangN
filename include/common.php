<?php
    
    require_once "$DOCUMENT_ROOT/include/right.php";
    if($main == 1)  require_once "$DOCUMENT_ROOT/include/main1_process.php";
    if($main == 2)  require_once "$DOCUMENT_ROOT/include/main2_process.php";
    if($main == 3)  require_once "$DOCUMENT_ROOT/include/main3_process.php";
    if($main == 4)  require_once "$DOCUMENT_ROOT/include/main4_process.php";
    if($main == 5)  require_once "$DOCUMENT_ROOT/include/main5_process.php";

    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    $csrf = "<input type=hidden name=csrf value=\"".$_SESSION['token']."\">";

    $tpl->setVar("MAIN",$main);

    if($main==0) { $tpl->setVar("MAIN0", true); }
    if($main==1) { $tpl->setVar("MAIN1"," class=\"nactive\""); $tpl->setVar("MAIN1_NAV",true); $news_html = makeRight1Html($db,$define_val); $tpl->setVar("RIGHT_HTML",$news_html['html']); $tpl->setVar("MAIN_BUTTON","btn-primary"); $tpl->setLoop("R1_1", $news_html['R1_1']); $tpl->setLoop("R1_2", $news_html['R1_2']);   $tpl->setLoop("R1_3", $news_html['R1_3']); }
    if($main==2) { $tpl->setVar("MAIN2"," class=\"nactive\""); $tpl->setVar("MAIN2_NAV",true); $tpl->setVar("RIGHT_HTML",makeRight2Html($db,$define_val)); $tpl->setVar("MAIN_BUTTON","btn-primary2"); }
    if($main==3) { $tpl->setVar("MAIN3"," class=\"nactive\""); $tpl->setVar("MAIN3_NAV",true); $community_html = makeRight3Html($db,$define_val); $tpl->setVar("RIGHT_HTML",$community_html['html']); $tpl->setVar("MAIN_BUTTON","btn-primary"); }
    if($main==4) { $tpl->setVar("MAIN4"," class=\"nactive\""); $tpl->setVar("MAIN4_NAV",true); $towninfo_html = makeRight4Html($db,$define_val); $tpl->setVar("RIGHT_HTML",$towninfo_html['html']); $tpl->setVar("MAIN_BUTTON","btn-primary"); }
    if($main==5) { $tpl->setVar("MAIN5"," class=\"nactive\""); $tpl->setVar("MAIN5_NAV",true); $tpl->setVar("RIGHT_HTML",makeRight5Html($db,$define_val)); $tpl->setVar("MAIN_BUTTON","btn-primary2"); }
    if($main==6) { $tpl->setVar("MAIN6_NAV",true); $tpl->setVar("RIGHT_HTML",right6_html()); }

    if($sub == 1) $tpl->setVar("SUB1"," class=\"on\"");
    if($sub == 2) $tpl->setVar("SUB2"," class=\"on\"");
    if($sub == 3) $tpl->setVar("SUB3"," class=\"on\"");
    if($sub == 4) $tpl->setVar("SUB4"," class=\"on\"");
    if($sub == 5) $tpl->setVar("SUB5"," class=\"on\"");
    if($sub == 6) $tpl->setVar("SUB6"," class=\"on\"");
    if($sub == 7) $tpl->setVar("SUB7"," class=\"on\"");

    $tpl->setVar("CSRF",$csrf);

    if( !isset($mtitle)) $mtitle = "";
    if( !isset($stitle)) $stitle = "";

    $tpl->setVar("MTITLE",$mtitle);
    $tpl->setVar("STITLE",$stitle);

    if($page != "index") $tpl->setVar("NOTINDEX",true);
    
    if($SS_ID != "") $tpl->setVar("LOGIN",true);
    else $tpl->setVar("NOTLOGIN",true);

    if($SS_ID == "") {

        $fmm = "<a href=\"javascript:return false;\" onclick=\"alert('로그인을 먼저 진행해 하세요');GO_LOGIN_DISPLAY();\" class=\"btn btn-sm lg:btn-md btn-primary md:max-w-200px flex-1 text-none\">판매자 허위 신고</a>
                <a href=\"javascript:return false;\" onclick=\"alert('로그인을 먼저 진행해 하세요');GO_LOGIN_DISPLAY();\" class=\"btn btn-sm lg:btn-md btn-outline-primary md:max-w-150px flex-1 text-none\">쪽지 보내기</a>";

        $tpl->setVar("T_FM",$fmm);
        
        $tpl->setVar("ADVERTISE_LOGIN1","javascript:alert('로그인을 먼저 해주세요');GO_LOGIN_DISPLAY();");    
        $tpl->setVar("ADVERTISE_LOGIN2","javascript:alert('로그인을 먼저 해주세요');GO_LOGIN_DISPLAY();");    

    }
    else {

        $fmm = '<a href="#uc-report-modal" data-uc-toggle class="btn btn-sm lg:btn-md btn-primary md:max-w-200px flex-1 text-none" onclick="RESET_SELLER();">판매자 허위 신고</a>
                <a href="#uc-memo-modal" data-uc-toggle class="btn btn-sm lg:btn-md btn-outline-primary md:max-w-150px flex-1 text-none" onclick="RESET_MEMO();">쪽지 보내기</a>';

        $tpl->setVar("T_FM",$fmm);
        
        $tpl->setVar("ADVERTISE_LOGIN1","/ad/ad_intro.php");    
        $tpl->setVar("ADVERTISE_LOGIN2","location.href='/ad/ad_intro.php'");    

    }    
    
    $tpl->setVar("T_NICKNAME",$SS_NICKNAME);
    
    /*
    if($main==5) {  
        
        $banner_dic = makeBanner5($db);
        
        foreach ($banner_dic as $location => $info) {
    
            $imgUrl = $info['img'];
            $linkUrl = $info['link'];

            $tpl->setVar("오른쪽-1_img",$imgUrl);
            $tpl->setVar($location."_link",$linkUrl);
        
        }
        
    }
*/


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * 주(State) 코드 또는 도시명을 DB의 news.sub_region 코드로 변환
 */

// ============================================================
// header.php 최상단 (HTML 출력보다 반드시 위에 배치)
// ============================================================
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

/**
 * 주(State) 코드를 news.sub_region 코드로 변환
 */
function mapStateToSubRegion(string $stateCode): string
{
    $st = strtoupper(trim($stateCode));

    $stateMap = [
        'CA' => 'SOCAL', 'CALIFORNIA' => 'SOCAL',
        'NY' => 'NY', 'NEW YORK' => 'NY',
        'NJ' => 'NJ', 'NEW JERSEY' => 'NJ',
        'IL' => 'CHICAGO', 'ILLINOIS' => 'CHICAGO',
        'DC' => 'DC', 'DISTRICT OF COLUMBIA' => 'DC',
        'VA' => 'DC', 'VIRGINIA' => 'DC',
        'MD' => 'DC', 'MARYLAND' => 'DC',
        'TX' => 'TEXAS', 'TEXAS' => 'TEXAS',
        'WA' => 'SEATTLE', 'WASHINGTON' => 'SEATTLE',
        'GA' => 'ATLANTA', 'GEORGIA' => 'ATLANTA',
        'AL' => 'ALABAMA', 'ALABAMA' => 'ALABAMA',
    ];

    return $stateMap[$st] ?? 'SOCAL';
}

/**
 * 접속자 실제 IP 추출 (Cloudflare / AWS ALB 프록시 대응)
 */
function getClientIpAddress(): string
{
    foreach (['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'] as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = trim(explode(',', $_SERVER[$key])[0]);
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                return $ip;
            }
        }
    }
    return '';
}

/**
 * 접속 IP 기반 주(State) 무료 조회 (세션·쿠키에 캐싱되므로 첫 방문 1회만 호출)
 */
function detectSubRegionByIp(): string
{
    if (!empty($_SERVER['HTTP_CF_REGION_CODE'])) {
        return mapStateToSubRegion($_SERVER['HTTP_CF_REGION_CODE']);
    }

    $ip = getClientIpAddress();
    if ($ip === '') {
        return 'SOCAL';
    }

    $ch = curl_init("http://ip-api.com/json/{$ip}?fields=status,countryCode,region");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_TIMEOUT => 2,
    ]);
    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code === 200 && $res) {
        $data = json_decode($res, true);
        if (($data['status'] ?? '') === 'success' && ($data['countryCode'] ?? '') === 'US') {
            return mapStateToSubRegion((string)($data['region'] ?? ''));
        }
    }

    return 'SOCAL';
}

/**
 * 현재 사용자의 sub_region 결정 및 저장
 */
function initCurrentUserSubRegion(): string
{
    $allowed = ['SOCAL', 'NY', 'NJ', 'CHICAGO', 'DC', 'TEXAS', 'SEATTLE', 'ATLANTA', 'ALABAMA'];

    // 1. 로그인 세션에 state_code가 입력되어 있는 경우 최우선 적용
    if (isset($_SESSION['ss_state_code']) && trim((string)$_SESSION['ss_state_code']) !== '') {
        $reg = mapStateToSubRegion((string)$_SESSION['ss_state_code']);
        $_SESSION['user_sub_region'] = $reg;
        return $reg;
    }

    // 2. 비로그인 방문자 또는 state_code 미입력 로그인 회원: 세션/쿠키에 이미 감지된 지역이 있으면 반환
    if (!empty($_SESSION['user_sub_region']) && in_array($_SESSION['user_sub_region'], $allowed, true)) {
        return $_SESSION['user_sub_region'];
    }
    if (!empty($_COOKIE['mn_sub_region']) && in_array($_COOKIE['mn_sub_region'], $allowed, true)) {
        $_SESSION['user_sub_region'] = $_COOKIE['mn_sub_region'];
        return $_COOKIE['mn_sub_region'];
    }

    // 3. 세션/쿠키도 없으면 접속 IP로 현재 주(State) 감지 후 저장
    $reg = detectSubRegionByIp();
    $_SESSION['user_sub_region'] = $reg;
    if (!headers_sent()) {
        setcookie('mn_sub_region', $reg, time() + (86400 * 30), '/');
    }
    return $reg;
}

$CURRENT_SUB_REGION = initCurrentUserSubRegion();
saveLog("CURRENT_SUB_REGION : ",$CURRENT_SUB_REGION);
