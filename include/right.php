<?php

function right1_html()
{

    $html = file_get_contents("../include/right1.php");
    return $html;

}

function right2_html()
{

    $html = file_get_contents("../include/right2.php");
    return $html;

}

function right3_html()
{

    $html = file_get_contents("../include/right3.php");
    return $html;

}

function right4_html()
{

    $html = file_get_contents("../include/right4.php");
    return $html;

}

function right5_html()
{

    $html = file_get_contents("../include/right5.php");
    return $html;

}

function right6_html()
{
    GLOBAL $SS_NICKNAME;

    $html = file_get_contents("../include/right6.php");
    $html = str_replace('__NICK_NAME__', $SS_NICKNAME, $html);
    return $html;

}