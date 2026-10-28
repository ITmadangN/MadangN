<?php

if ($SS_ID == "") {

    echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
        "<script language=\"javascript\">\n" .
        "<!--\n" .
        "alert(\"로그인 하셔야 사용할수 있습니다.\");\n" .
        "location.href='/admin/login.php';\n" .
        "//-->\n" .
        "</script>\n");
    exit;
}
