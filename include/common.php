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

    
        
    
