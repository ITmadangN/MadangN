<?php

    function subTpl($main, $sub, &$tpl) {
        
        if($sub == 1) $tpl->setVar("SUB".$main."1"," class=\"nav-active\"");
        if($sub == 2) $tpl->setVar("SUB".$main."2"," class=\"nav-active\"");
        if($sub == 3) $tpl->setVar("SUB".$main."3"," class=\"nav-active\"");
        if($sub == 4) $tpl->setVar("SUB".$main."4"," class=\"nav-active\"");
        if($sub == 5) $tpl->setVar("SUB".$main."5"," class=\"nav-active\"");
        if($sub == 6) $tpl->setVar("SUB".$main."6"," class=\"nav-active\"");
        if($sub == 7) $tpl->setVar("SUB".$main."7"," class=\"nav-active\"");
        if($sub == 8) $tpl->setVar("SUB".$main."8"," class=\"nav-active\"");
        if($sub == 9) $tpl->setVar("SUB".$main."9"," class=\"nav-active\"");
        
    }
    
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    $csrf = "<input type=hidden name=csrf value=\"".$_SESSION['token']."\">";

    if($main==1) { $tpl->setVar("MAIN1","active"); $tpl->setVar("MAIN1_NAV","nav-expanded nav-active"); }
    if($main==2) { $tpl->setVar("MAIN2","active"); $tpl->setVar("MAIN2_NAV","nav-expanded nav-active"); }
    if($main==3) { $tpl->setVar("MAIN3","active"); $tpl->setVar("MAIN3_NAV","nav-expanded nav-active"); }
    if($main==4) { $tpl->setVar("MAIN4","active"); $tpl->setVar("MAIN4_NAV","nav-expanded nav-active"); }
    if($main==5) { $tpl->setVar("MAIN5","active"); $tpl->setVar("MAIN5_NAV","nav-expanded nav-active"); }
    if($main==6) { $tpl->setVar("MAIN6","active"); $tpl->setVar("MAIN6_NAV","nav-expanded nav-active"); }
    if($main==7) { $tpl->setVar("MAIN7","active"); $tpl->setVar("MAIN7_NAV","nav-expanded nav-active"); }
    if($main==8) { $tpl->setVar("MAIN8","active"); $tpl->setVar("MAIN8_NAV","nav-expanded nav-active"); }
    if($main==9) { $tpl->setVar("MAIN9","active"); $tpl->setVar("MAIN9_NAV","nav-expanded nav-active"); }

    subTpl($main, $sub,$tpl);
    
    $tpl->setVar("CSRF",$csrf);

    $tpl->setVar("MTITLE",$mtitle);
    $tpl->setVar("STITLE",$stitle);
    if(!empty($ytitle)) $tpl->setVar("YTITLE","<li><span>$ytitle</span></li>");
    if($page != "index") $tpl->setVar("NOTINDEX",true);


    $tpl->setVar("SS_NAME",$SS_NAME);

