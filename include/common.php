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


if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

/**
 * 주(State) 코드를 news.sub_region 코드로 변환
 */
if (!function_exists('mapStateToSubRegion')) {
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
}

/**
 * 접속자 실제 IP 추출 (Cloudflare / AWS ALB 프록시 대응)
 */
if (!function_exists('getClientIpAddress')) {
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
}

/**
 * 접속 IP 기반 주(State) 조회 (첫 진입 시 1회만 호출 후 세션·세션쿠키 캐싱)
 */
if (!function_exists('detectSubRegionByIp')) {
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
}

/**
 * 로그인 회원의 users 테이블에서 state_code 조회 (커스텀 $db 객체 및 PDO 모두 대응)
 */
if (!function_exists('getLoggedInUserStateCode')) {
    function getLoggedInUserStateCode($db = null): string
    {
        if (isset($_SESSION['ss_state_code']) && trim((string)$_SESSION['ss_state_code']) !== '') {
            return strtoupper(trim((string)$_SESSION['ss_state_code']));
        }

        $loginUserId = $_SESSION['user_id'] ?? ($_SESSION['id'] ?? ($_SESSION['member_id'] ?? null));
        if (empty($loginUserId) || $db === null) {
            return '';
        }

        try {
            // 사이트 공통 DB 래퍼 ($db->queryRow) 지원
            if (is_object($db) && method_exists($db, 'queryRow')) {
                $safeId = addslashes((string)$loginUserId);
                $row = $db->queryRow("SELECT state_code FROM users WHERE user_id = '{$safeId}' LIMIT 1", []);
                $st = trim((string)($row->state_code ?? ''));
                if ($st !== '') {
                    $_SESSION['ss_state_code'] = strtoupper($st);
                    return $_SESSION['ss_state_code'];
                }
            } elseif ($db instanceof PDO) {
                $stmt = $db->prepare("SELECT state_code FROM users WHERE user_id = :uid LIMIT 1");
                $stmt->execute([':uid' => $loginUserId]);
                $st = trim((string)($stmt->fetchColumn() ?: ''));
                if ($st !== '') {
                    $_SESSION['ss_state_code'] = strtoupper($st);
                    return $_SESSION['ss_state_code'];
                }
            }
        } catch (Throwable $e) {
            // 조회 실패 시 IP 감지로 폴백
        }

        return '';
    }
}

/**
 * 현재 사용자의 sub_region 확정
 * - 포털 이용 중(다른 섹션 이동 포함): 세션/브라우저 세션쿠키(만료=0) 유지
 * - 처음 웹 포털 열었을 때(새 브라우저 세션): 쿠키 없음 -> 로그인 시 users.state_code -> 없거나 비로그인이면 IP 감지
 */
if (!function_exists('setMnSubRegionCookie')) {
    function setMnSubRegionCookie(string $regionCode): void
    {
        if (headers_sent()) {
            return;
        }
        $host = $_SERVER['HTTP_HOST'] ?? '';
        // www.madangn.com 과 madangn.com 서브도메인 간 쿠키 공유 및 유지
        $domain = (stripos($host, 'madangn.com') !== false) ? '.madangn.com' : '';

        setcookie('mn_sub_region', $regionCode, [
            'expires'  => time() + (86400 * 30), // 30일 유지 (다른 섹션 갔다와도 유지)
            'path'     => '/',
            'domain'   => $domain,
            'samesite' => 'Lax',
        ]);
    }
}

if (!function_exists('initCurrentUserSubRegion')) {
    function initCurrentUserSubRegion($db = null): string
    {
        $allowed = ['SOCAL', 'NY', 'NJ', 'CHICAGO', 'DC', 'TEXAS', 'SEATTLE', 'ATLANTA', 'ALABAMA'];

        // 기존 브라우저에 남아 있던 영구 쿠키가 있으면 즉시 삭제
        if (isset($_COOKIE['mn_sub_region']) && !headers_sent()) {
            $host = $_SERVER['HTTP_HOST'] ?? '';
            $domain = (stripos($host, 'madangn.com') !== false) ? '.madangn.com' : '';
            setcookie('mn_sub_region', '', time() - 3600, '/');
            if ($domain !== '') {
                setcookie('mn_sub_region', '', time() - 3600, '/', $domain);
            }
            unset($_COOKIE['mn_sub_region']);
        }

        // 1. 로그인/로그아웃 상태 변화 감지 (비로그인 <-> 로그인, 또는 다른 아이디로 재로그인 시)
        $currentOwner = (string)($_SESSION['user_id'] ?? ($_SESSION['id'] ?? ($_SESSION['member_id'] ?? 'GUEST')));
        $prevOwner = $_SESSION['mn_region_owner'] ?? null;

        if ($prevOwner !== null && $prevOwner !== $currentOwner) {
            // 로그인하거나 로그아웃한 직후: 이전 지역 선택값·캐시 모두 초기화
            unset($_SESSION['user_sub_region'], $_SESSION['ss_state_code']);
        }
        $_SESSION['mn_region_owner'] = $currentOwner;

        // 2. 드롭다운(mnChangeNewsRegion)에서 ?region= 파라미터가 넘어온 경우 최우선 적용
        if (isset($_GET['region']) && trim((string)$_GET['region']) !== '') {
            $picked = strtoupper(trim((string)$_GET['region']));
            if ($picked === 'CA') {
                $picked = 'SOCAL';
            }
            if (in_array($picked, $allowed, true)) {
                $_SESSION['user_sub_region'] = $picked;
                return $picked;
            }
        }

        // 3. 현재 세션에 이미 확정된 지역이 있는 경우 (다른 섹션 갔다 와도 유지)
        if (!empty($_SESSION['user_sub_region']) && in_array($_SESSION['user_sub_region'], $allowed, true)) {
            return $_SESSION['user_sub_region'];
        }

        // 4. 새로 로그인했거나 첫 진입인 경우: 로그인 상태면 users.state_code 조회
        if ($currentOwner !== 'GUEST') {
            $userStateCode = getLoggedInUserStateCode($db);
            if ($userStateCode !== '') {
                $reg = mapStateToSubRegion($userStateCode);
                $_SESSION['user_sub_region'] = $reg;
                return $reg;
            }
        }

        // 5. 비로그인이거나 users.state_code가 비어 있는 경우: 접속 IP로 내 지역 감지
        $reg = detectSubRegionByIp();
        $_SESSION['user_sub_region'] = $reg;
        return $reg;
    }
}
//    function initCurrentUserSubRegion($db = null): string
//    {
//        $allowed = ['SOCAL', 'NY', 'NJ', 'CHICAGO', 'DC', 'TEXAS', 'SEATTLE', 'ATLANTA', 'ALABAMA'];
//
//        // 0. 드롭다운(mnChangeNewsRegion)에서 ?region= 파라미터가 넘어온 경우 최우선 적용 및 저장
//        if (isset($_GET['region']) && trim((string)$_GET['region']) !== '') {
//            $picked = strtoupper(trim((string)$_GET['region']));
//            if ($picked === 'CA') {
//                $picked = 'SOCAL';
//            }
//
//            if (in_array($picked, $allowed, true)) {
//                $_SESSION['user_sub_region'] = $picked;
//                setMnSubRegionCookie($picked);
//                return $picked;
//            }
//        }
//
//        // 1. 현재 세션에 확정된 지역이 있는 경우 그대로 유지
//        if (!empty($_SESSION['user_sub_region']) && in_array($_SESSION['user_sub_region'], $allowed, true)) {
//            return $_SESSION['user_sub_region'];
//        }
//
//        // 2. 쿠키에 저장된 지역이 있는 경우 세션으로 복원 (다른 섹션 갔다와도 유지)
//        if (!empty($_COOKIE['mn_sub_region']) && in_array($_COOKIE['mn_sub_region'], $allowed, true)) {
//            $_SESSION['user_sub_region'] = $_COOKIE['mn_sub_region'];
//            return $_COOKIE['mn_sub_region'];
//        }
//
//        // 3. 세션·쿠키 모두 없는 경우: 로그인 상태면 users 테이블의 state_code 확인
//        $userStateCode = getLoggedInUserStateCode($db);
//        if ($userStateCode !== '') {
//            $reg = mapStateToSubRegion($userStateCode);
//            $_SESSION['user_sub_region'] = $reg;
//            setMnSubRegionCookie($reg);
//            return $reg;
//        }
//
//        // 4. 비로그인이거나 users.state_code가 비어 있는 경우: IP로 내 지역 감지 후 저장
//        $reg = detectSubRegionByIp();
//        $_SESSION['user_sub_region'] = $reg;
//        setMnSubRegionCookie($reg);
//        return $reg;
//    }


// 전역 변수 및 헤더 드롭다운용 변수 세팅 ($db 또는 $pdo 전달)
$CURRENT_SUB_REGION = initCurrentUserSubRegion($db ?? ($pdo ?? null));
saveLog("CURRENT_SUB_REGION : ",$CURRENT_SUB_REGION);
$mnCurrentPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
$IS_NEWS_MENU = (preg_match('#^/news(/|$)#i', $mnCurrentPath) === 1);
$NEWS_REGION_DISPLAY = $IS_NEWS_MENU ? 'inline-flex' : 'none';

$mnRegionList = [
    'SOCAL' => 'CA',
    'NY' => 'NY',
    'NJ' => 'NJ',
    'CHICAGO' => 'Chicago',
    'DC' => 'Washington DC',
    'TEXAS' => 'Texas',
    'SEATTLE' => 'Seattle',
    'ATLANTA' => 'Atlanta',
    'ALABAMA' => 'Alabama',
];

$NEWS_REGION_OPTIONS = '';
foreach ($mnRegionList as $code => $label) {
    $selected = ($CURRENT_SUB_REGION === $code) ? ' selected' : '';
    $NEWS_REGION_OPTIONS .= '<option value="' . $code . '"' . $selected . '>' . htmlspecialchars($label) . '</option>';
}

$tpl->assign('NEWS_REGION_DISPLAY', $NEWS_REGION_DISPLAY ?? 'none');
$tpl->assign('NEWS_REGION_OPTIONS', $NEWS_REGION_OPTIONS ?? '');



