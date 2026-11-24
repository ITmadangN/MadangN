<?php
//
//session_start();
//session_destroy(); // 세션 종료
//
//header("Location: /");
//
//exit();
//

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

// 1. 세션 변수 정리 및 세션 종료
unset($_SESSION['user_sub_region'], $_SESSION['ss_state_code'], $_SESSION['mn_region_owner']);
$_SESSION = [];
session_destroy();

// 2. 헤더 리다이렉트(Location) 전에 쿠키 만료 헤더 먼저 전송
if (!headers_sent()) {
    setcookie('mn_sub_region', '', time() - 3600, '/');
    setcookie('mn_sub_region', '', time() - 3600, '/', '.madangn.com');
    setcookie('user_sub_region', '', time() - 3600, '/');
}

// 3. 모든 정리 완료 후 메인으로 이동
header("Location: /");
exit();