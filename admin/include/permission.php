<?php
    $permission = @$_SESSION['ss_permission'];
    
    if($permission == "") {
        
        echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
                "<script language=\"javascript\">\n" .
                "<!--\n" .
                "location.href='/admin/login.php';\n" .
                "//-->\n" .
                "</script>\n");
                
            exit;
        
    }
    
    if (!array_key_exists($permission_menu, $permission)) {    
        
        if($ajax_in == "Y") {
        
            $result_data = [
                "status" => "fail",
                "msg" => "권한이 없습니다.",
            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
            
        }
        else {                    
            echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
                "<script language=\"javascript\">\n" .
                "<!--\n" .
                "alert(\"권한이 없거나 경로가 잘못되었습니다.\");\n" .
                "location.href='/admin/login.php';\n" .
                "//-->\n" .
                "</script>\n");
                
            exit;
        }
        
    }   
     
    if($permission[$permission_menu] != 'Y') {
        
        if($ajax_in == "Y") {
            
             $result_data = [
                "status" => "fail",
                "msg" => "권한이 없습니다.",
            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
            
        }
        else { 
            echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
                "<script language=\"javascript\">\n" .
                "<!--\n" .
                "alert(\"권한이 없습니다.\");\n" .
                "history.back();\n" .
                "//-->\n" .
                "</script>\n");
        }
    }