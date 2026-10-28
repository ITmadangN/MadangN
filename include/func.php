<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    
/**
셀렉트 값이 들어 있는 배열을 받아 출력한다.
@Param Array select로 출력하고자하는 배열값
@Param String 첫배열출력할지여부 flag : 0 전체, 1: 첫배열제외
@Param String 배열요소하나
@Return 리턴값없음
 */
function ARRAY_PRINT($str,$flag,$cvalue) {

    if($flag == "0") $init = 0;
    else $init = 1;


    for($i=$init;$i<(count($str)/2);$i++) {

        if($cvalue == $str[$i*2]) echo "<option value='" . $str[$i*2] . "' selected>" . $str[$i*2+1] . "</option>\n";
        else     echo "<option value='" . $str[$i*2] . "'>" . $str[$i*2+1] . "</option>\n";

    }

}

function ARRAY_ARRAY_RETURN($str,$flag,$cvalue, $init_name = "") {

    $return_value = "";
    if($flag == "0" || $flag == "-1") $init = 0;
    else $init = 1;

    for($i=$init;$i<(count($str)/2);$i++) {

        $code = $str[$i*2];
        $name = $str[$i*2+1];

        if($flag == "-1" && $i == 0) $name = $init_name;

        if($cvalue == $code) $return_value .= "<option value='" . $code . "' selected>" . $name. "</option>\n";
        else     $return_value .= "<option value='" . $code . "'>" . $name . "</option>\n";

    }

    return $return_value;

}

function ARRAY_ARRAY_ONE_RETURN($str,$flag,$cvalue,$init_name = "") {

    $return_value = "";
    if($flag == "0" || $flag == "-1") $init = 0;
    else $init = 1;


    for($i=$init;$i<(count($str)/2);$i++) {

        $code = $str[$i*2];
        $name = $str[$i*2+1];

        if($flag == "-1" && $i == 0) $name = $init_name;

        if($cvalue == $code) $return_value = "<option value='" . $code . "' selected>" . $name. "</option>\n";


    }

    return $return_value;

}

function ARRAY_SKIND_RETURN($kind,$skind) {

    GLOBAL $Array_product_daily;

    $str = $Array_product_daily;

    $return_value = "";

    if($kind != "3") {
        $return_value .= "<option value='1'>없음</option>\n";
        return $return_value;
    }

    for($i=$init;$i<(count($str)/2);$i++) {

        if($skind == $str[$i*2]) $return_value .= "<option value='" . $str[$i*2] . "' selected>" . $str[$i*2+1] . "</option>\n";
        else     $return_value .= "<option value='" . $str[$i*2] . "'>" . $str[$i*2+1] . "</option>\n";

    }

    return $return_value;

}

// 셀렉트 값이 들어 있는 배열값을 받아서 해당되는 값을 리턴한다.
function ARRAY_RETURN($str,$cvalue) {

    $return_msg  = "";

    for($i=0;$i<(count($str)/2);$i++) {

        if($cvalue == $str[$i*2]) $return_msg = $str[$i*2+1];

    }

    return $return_msg;

}

function ARRAY_RADIO_RETURN($str,$cvalue,$vardefine) {

    $return_value = "";

    for($i=0;$i<(count($str)/2);$i++) {

        if($cvalue == $str[$i*2]) $return_value .= "<input type='radio' name='$vardefine' value='".$str[$i*2]."' checked>".$str[$i*2+1]."&nbsp;&nbsp;&nbsp;";
        else      $return_value .= "<input type='radio' name='$vardefine' value='".$str[$i*2]."'>".$str[$i*2+1]."&nbsp;&nbsp;&nbsp;";

    }

    return $return_value;

}

function ARRAY_CHECK_RETURN($str,$cvalue) {

    $return_value = "";

    for($i=0;$i<(count($str)/3);$i++) {

        if($cvalue[$i] == $str[$i*3]) $return_value .= "<input type='checkbox' name='".$str[$i*3+2]."' value='".$str[$i*3]."' checked>".$str[$i*3+1]."&nbsp;&nbsp;";
        else      $return_value .= "<input type='checkbox' name='".$str[$i*3+2]."' value='".$str[$i*3]."'>".$str[$i*3+1]."&nbsp;&nbsp;";

    }

    return $return_value;

}

function ARRAY_LIST_RETURN($cvalue) {



    for($i=1;$i<1001;$i++) {

        if($cvalue == $i) $return_value .= "<option value='" . $i . "' selected>" . $i . "</option>\n";
        else     $return_value .= "<option value='" . $i . "'>" . $i . "</option>\n";

    }

    return $return_value;

}



// 2006-09-12 날짜 형식을 2006.09.12로 만든다. 점은 옵션
function DATETOSTRING($dd,$se) {

    if($dd == 0)  return "&nbsp;";

    $return_str = substr($dd,0,4) . $se .  substr($dd,5,2) . $se . substr($dd,8,2);

    return $return_str;

}

// 20060912 날짜 형식을 2006.09.12로 만든다. 점은 옵션
function DATETOSTRING2($dd,$se) {

    if($dd == 0)  return "&nbsp;";

    $return_str = substr($dd,0,4) . $se .  substr($dd,4,2) . $se . substr($dd,6,2);

    return $return_str;

}

// 20060912 날짜 형식을 09/12/2006로 만든다. 점은 옵션
function DATETOSTRING_USA($dd,$se) {

    if($dd == 0)  return "&nbsp;";

    $return_str = substr($dd,4,2) . $se . substr($dd,6,2) . $se . substr($dd,0,4);

    return $return_str;

}

// 2006-09-12 날짜 형식을 09/12/2006로 만든다. 점은 옵션
function DATETOSTRING_USA2($dd,$se) {

    if($dd == 0)  return "&nbsp;";

    $return_str = substr($dd,5,2) . $se . substr($dd,8,2) . $se . substr($dd,0,4);

    return $return_str;

}

function DB_ARRAY_ARRAY_RETURN($flag,$cvalue, $db, $table_name, $db_col_name, $db_col_value, $where, $init_name = "") {

    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $query = "select $db_col_name, $db_col_value from $table_name where $where";

    $db->query($query);

    while ($row = $db->fetch()) {

        $name        = $row->$db_col_name;
        $value       = $row->$db_col_value;

        if($cvalue == $value)  $return_value .= "<option value='$value' selected>$name</option>\n";
        else $return_value .= "<option value='$value'>$name</option>\n";

    }

    return $return_value;

}

function DB_ARRAY_ARRAY_CITY_RETURN($flag,$cvalue_comma, $db, $table_name, $db_col_name, $db_col_value, $where, $init_name = "") {

    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $query = "select $db_col_name, $db_col_value from $table_name where $where";

    $db->query($query);

    
    
    $temp = explode(",",$cvalue_comma);
    
    while ($row = $db->fetch()) {

        $name        = $row->$db_col_name;
        $value       = $row->$db_col_value;
        
        $cvalue = "";
        for($i=0;$i<count($temp);$i++) {
            if($value == $temp[$i]) { $cvalue = $value; break; }
        }               
        
        if($cvalue == $value)  $return_value .= "<label><input type=\"checkbox\" name=\"city_name[]\" value=\"$value\" checked> $name</label>\n";
        else $return_value .= "<label><input type=\"checkbox\" name=\"city_name[]\" value=\"$value\"> $name</label>\n";

    }

    return $return_value;

}

function DB_ARRAY_RETURN( $db, $table_name, $db_col_name, $where) {

    $return_value = "";
    $query = "select $db_col_name from $table_name where $where";

    $result = $db->query($query);

    if (!$result) {
        return $return_value;
    }

    $row = $db->fetch();

    $return_value  = $row->$db_col_name;

    return $return_value;

}

function FILE_UPLOAD($loc,$dir,$header,$id,$filename,$name) {

    if (@$_FILES[$filename]['size'] > 0) {

        if($loc == "user") $uploaddir = '../../../UPLOADS/'.$dir.'/';
        else $uploaddir = '../../../../UPLOADS/'.$dir.'/';


        $original_file = $_FILES[$filename]["name"];

        $ext = RETURN_EXIT($_FILES[$filename]["name"]);

        $changeName = $header. "_". $id ."_". $name;
                
        //실제 파일 업로드부분
        move_uploaded_file($_FILES[$filename]['tmp_name'], $uploaddir . $changeName);
    }

}

function FILE_DELETE($loc,$dir,$header,$id,$name)
{

    if($loc == "user") $uploaddir = '../../../UPLOADS/'.$dir.'/';
    else $uploaddir = '../../../../UPLOADS/'.$dir.'/';


    $changeName = $header. "_". $id ."_". $name;

    $file_path = $uploaddir . $changeName;

    @unlink($file_path);
}

function FILE_DELETE_MULTI_REALESTATE($loc, $dir, $header, $id, $name)
{
    if ($loc == "user") $uploaddir = '../../../UPLOADS/' . $dir . '/';
    else $uploaddir = '../../../../UPLOADS/' . $dir . '/';    

    $pattern = $uploaddir . $header . "_" . $id . "_".$name.'*';

    $files = glob($pattern);

    if ($files !== false) {
        foreach ($files as $file) {
            if (is_file($file)) {
                @unlink($file);
            }
        }
    }
}

function FILE_UPLOAD_ARRAY($loc, $dir,$header,$id,$filename,$name, $key) {

    if ($_FILES[$filename]['size'][$key] > 0) {

        if($loc == "user") $uploaddir = '../../../UPLOADS/'.$dir.'/';
        else $uploaddir = '../../../../UPLOADS/'.$dir.'/';

        $original_file = $_FILES[$filename]["name"][$key];

        $ext = RETURN_EXIT($_FILES[$filename]["name"][$key]);

        $changeName = $header. "_". $id ."_". $name;

        //실제 파일 업로드부분
        move_uploaded_file($_FILES[$filename]['tmp_name'][$key], $uploaddir . $changeName);
    }

}

function RETURN_EXIT($filename) {

    $filename_div = explode(".",strtolower($filename));
    $ext = end($filename_div);

    return $ext;
}

function MAKE_UPLOAD_HTML($exist_file,$upload_name, $file_name, $img_src, $size ) {

    if($exist_file == "Y") {
        $html = '<div class="file-group mb-2">
                    <input type="hidden" name="del_'.$upload_name.'" id="del_'.$upload_name.'" value="N">
                    <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view">
                        <label class="flex-grow-1 pt-1 cursor-pointer text-nowrap overflow-hidden" onclick="triggerInput(this)">
                            <img class="file-preview-img me-2" style="width: 28px; height: 28px; object-fit: cover; border-radius: 0px; border: 1px solid rgb(221, 221, 221); display: inline-block;" src="'.$img_src.'"><span class="file-name-text" style="color: rgb(51, 51, 51);">'.$file_name.' </span>
                        </label>
                        <button type="button" class="btn-close-custom mt-1" style="display: flex;" onclick="removeInputGroup2(this,\'Y\',\'del_'.$upload_name.'\')"></button>
                        <input type="file" name="'.$upload_name.'" accept=".jpg, .jpeg, .png, .gif"  class="d-none22" onchange="updateIndividualFile(this)">                        
                    </div>
                </div>
        ';
    }
    else {
        $html = '
               <div class="file-group mb-2">
                    <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view pt-1">
                        <label class="flex-grow-1 m-0 d-flex align-items-center cursor-pointer text-nowrap overflow-hidden" onclick="triggerInput(this)">
                            <span class="file-name-text">이미지를 선택해주세요 <span class="hidden-768">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 가로 '.$size.'픽셀, 이미지는 jpg, png, gif만 가능하며 2MB이하 사이즈만 가능합니다.</span></span>
                        </label>
                        <button type="button" class="btn-close-custom" style="display: none;" onclick="removeInputGroup(this)"></button>
                        <input type="file" name="'.$upload_name.'" accept=".jpg, .jpeg, .png, .gif"  class="d-none" accept="image/*" onchange="updateIndividualFile(this)">            
                    </div>
                </div>';
    }

    return $html;

}

function MAKE_UPLOAD_HTML2($h_del_img,$upload_name, $file_name, $img_src ) {


        
        $html = '<div class="file-group mb-2">                    
                    <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view">
                        <label class="flex-grow-1 pt-1 cursor-pointer text-nowrap overflow-hidden" onclick="triggerInput(this)">
                            <img class="file-preview-img me-2" style="width: 28px; height: 28px; object-fit: cover; border-radius: 0px; border: 1px solid rgb(221, 221, 221); display: inline-block;" src="'.$img_src.'"><span class="file-name-text" style="color: rgb(51, 51, 51);">'.$file_name.' </span>
                        </label>
                        <button type="button" class="btn-close-custom mt-1" style="display: flex;" onclick="removeInputGroup2(this,\'Y\',\''.$h_del_img.'\',\'in\',\''.$upload_name.'\')"></button>
                        <input type="file" name="'.$upload_name.'" accept=".jpg, .jpeg, .png, .gif"  class="d-none22" onchange="updateIndividualFile(this)">                        
                    </div>
                </div>
        ';

    return $html;

}

function MAKE_UPLOAD_OTHER_HTML($exist_file,$upload_name, $file_name, $img_src , $width) {

    if($exist_file == "Y") {
        $html = '<div class="file-group mb-2">
                    <input type="hidden" name="del_'.$upload_name.'" id="del_'.$upload_name.'" value="N">
                    <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view">
                        <label class="flex-grow-1 pt-1 cursor-pointer text-nowrap overflow-hidden" onclick="triggerInput(this)">
                            <img class="file-preview-img me-2" style="width: 28px; height: 28px; object-fit: cover; border-radius: 0px; border: 1px solid rgb(221, 221, 221); display: inline-block;" src="'.$img_src.'"><span class="file-name-text" style="color: rgb(51, 51, 51);">'.$file_name.' </span>
                        </label>
                        <button type="button" class="btn-close-custom mt-1" style="display: flex;" onclick="removeInputGroup2(this,\'Y\',\'del_'.$upload_name.'\')"></button>
                        <input type="file" name="'.$upload_name.'" accept=".jpg, .jpeg, .png, .gif, .avif, .webp"  class="d-none22" onchange="updateIndividualFile(this)">                        
                    </div>
                </div>
        ';
    }
    else {
        $html = '
               <div class="file-group mb-2">
                    <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view pt-1">
                        <label class="flex-grow-1 m-0 d-flex align-items-center cursor-pointer text-nowrap overflow-hidden" onclick="triggerInput(this)">
                            <span class="file-name-text">이미지를 선택해주세요 <span class="hidden-768">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$width.', 이미지는 jpg, png, gif, avif, webp만 가능하며 2MB이하 사이즈만 가능합니다.</span></span>
                        </label>
                        <button type="button" class="btn-close-custom" style="display: none;" onclick="removeInputGroup(this)"></button>
                        <input type="file" name="'.$upload_name.'" accept=".jpg, .jpeg, .png, .gif, .avif, .webp"  class="d-none" accept="image/*" onchange="updateIndividualFile(this)">            
                    </div>
                </div>';
    }

    return $html;

}

function DB_ARRAY_CITY_NAME_RETURN($db,$state_code, $cvalue, $init_name = '') {

    $return_value = "";

    $query = "select * from common_code where code = '$state_code' order by code_sub_name asc";
    
    $db->query($query);
    
        
    if($init_name != "" ) $return_value .= "<option value=''>$init_name</option>\n";


    while ($row = $db->fetch()) {

        $name        = $row->code_sub_name;
        $value       = $row->code_sub_name;

        if($cvalue == $value)  $return_value .= "<option value='$value' selected>$name</option>\n";
        else $return_value .= "<option value='$value'>$name</option>\n";

    }

    return $return_value;

}

function DB_ARRAY_MULTI_CITY_NAME_RETURN($db,$state_code) {

    $return_value = "";

    $query = "select * from common_code where code = '$state_code' order by code_sub_name asc";
          
    $db->query($query);

    while ($row = $db->fetch()) {

        $name        = $row->code_sub_name;
        $value       = $row->code_sub_name;

        $return_value .= "<label><input type='checkbox' name='city_name[]' value='$value'> $name</label>\n";

    }

    return $return_value;

}


function DB_ARRAY_MULTI_CITY_NAME_RETURN_TEST($db,$state_code) {

    $return_value = "";

    $query = "select * from common_code where code = '$state_code' order by code_sub_name asc";
          
    $db->query($query);

    while ($row = $db->fetch()) {

        $name        = $row->code_sub_name;
        $value       = $row->code_sub_name;

        $return_value .= "<option value='$value'>$name</option>";

    }

    return $return_value;

}

function GET_UPLOAD_IMAGE($name,$ori_name, $del) {

    $return_value = "";

    if($name != "") {
        $return_value = $name;
    }
    else {
        if($del  == "Y")  $return_value = "";
        else $return_value = $ori_name;
    }

    return $return_value;
}

function GET_DEL_UPLOAD_IMAGE($name) {
    
    $html = "<input id='del_".$name."' name='del_".$name."' type='checkbox'  value='Y' />
														<label>삭제</label>";

    return $html;
}

function GET_VAR($name) {

    $return_value = $_REQUEST[$name] ?? "";

    return $return_value;
}

function SELECT_CITY_NAME($db, $s_state_code) {

    $html = DB_ARRAY_ARRAY_RETURN(-1, "", $db, "common_code", "code_sub_name", "code_sub", "code = '$s_state_code' order by code_sub_name asc", "도시선택");

    return $html;
}

function GET_ONE_ROW($db, $sql, $id) {

//     $sql = "SELECT A.* FROM community_marketplace_listings A where  A.community_marketplace_listings_id  = :id and A.is_active = 1";
    $placeholders = ['id' => $id];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();

    return $row;
}



// 암호화
function ENCRYPT_DATA($data, $method, $key) {


    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

    $encrypted = openssl_encrypt($data, $method, $key, 0, $iv);
    $encrypted = base64_encode($iv . $encrypted);   // IV 포함하여 저장
    
    return $encrypted;

}


// 복호화
function DECRYPT_DATA($encrypted, $method, $key) {
    
    $decoded = base64_decode($encrypted);
    $iv = substr($decoded, 0, openssl_cipher_iv_length($method));
    $encryptedData = substr($decoded, openssl_cipher_iv_length($method));
    $decrypted = openssl_decrypt($encryptedData, $method, $key, 0, $iv);
    
    return $decrypted;

}

function DB_ARRAY_MARKET_RETURN($flag,$cvalue, $db, $init_name = "") {

    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $query = "select * from towninfo_marketsale_market where is_active = 1 order by market_name asc";

    $db->query($query);

    while ($row = $db->fetch()) {

        $id        = $row->towninfo_marketsale_market_id;
        $name       = $row->market_name;

        if($cvalue == $id)  $return_value .= "<option value='$id' selected>$name</option>\n";
        else $return_value .= "<option value='$id'>$name</option>\n";

    }

    return $return_value;

}

function MAKE_MARKETSALE_BRANCH($branch_name, $state_code, $city_name, $county_code, $contact_name, $contact_email, $contact_phone, $branch_display_method, $is_default, $cnt, $db, $define_val) {


    $is_default_checked = ($is_default == "1") ? "checked" : "";

    if($state_code == "") $select_city_name = ARRAY_ARRAY_RETURN($define_val->DEFINE_common_blank,-1,"","도시선택");
    else $select_city_name = GET_MARKETSALE_CITY_NAME(-1, $state_code, $city_name ,$db, '도시선택');

    $select_state_code = GET_MARKETSALE_STATE_CODE(-1,$state_code,$db,"주선택");

    $select_branch_display_method = ARRAY_ARRAY_RETURN($define_val->DEFINE_branch_display_method, 0, $branch_display_method);

    $select_county = GET_MARKETSALE_COUNTY(-1, $state_code,  $county_code, $db, "카운티선택");

    $html = "<div class='form-group row gx-1 flex-nowrap align-items-center mb-2 px-1' id='branch_row_{$cnt}'>
                                    <div class='col-xl-2'>
                                        <input type='text' class='form-control form-control-sm' name='branch_name_{$cnt}' id='branch_name_{$cnt}' placeholder='지점명' value='{$branch_name}' required>
                                    </div>
                                    <div class='col-xl-1'>
                                        <select class='form-control form-control-sm border-light-gray' name='state_code_{$cnt}' id='state_code_{$cnt}' onchange='GET_CITY_COUNTY({$cnt})' required>{$select_state_code}</select>
                                    </div>
                                    <div class='col-xl-1'>
                                        <select class='form-control form-control-sm border-light-gray' name='city_name_{$cnt}' id='city_name_{$cnt}' required>{$select_city_name}</select>
                                    </div>
                                    <div class='col-xl-2'>
                                        <select class='form-control form-control-sm border-light-gray' name='county_code_{$cnt}' id='county_code_{$cnt}' required>{$select_county}</select>
                                    </div>
                                    <div class='col-xl-1'>
                                        <input type='text' class='form-control form-control-sm' name='contact_name_{$cnt}' id='contact_name_{$cnt}' placeholder='담당자' value='{$contact_name}' required>
                                    </div>
                                    <div class='col-xl-1'>
                                        <input type='email' class='form-control form-control-sm' name='contact_email_{$cnt}' id='contact_email_{$cnt}' placeholder='이메일' value='{$contact_email}'>
                                    </div>
                                    <div class='col-xl-1'>
                                        <input type='text' class='form-control form-control-sm' name='contact_phone_{$cnt}' id='contact_phone_{$cnt}' placeholder='연락처' value='{$contact_phone}'>
                                    </div>
                                    <div class='col-xl-1'>
                                        <select class='form-control form-control-sm' name='branch_display_method_{$cnt}' id='branch_display_method_{$cnt}' required>{$select_branch_display_method}</select>
                                    </div>
                                    <div class='col-xl-1 text-center'>
                                        <input class='form-check-input mt-0' type='checkbox' name='is_default_{$cnt}' id='is_default_{$cnt}' style='cursor:pointer;' value='1' {$is_default_checked}>
                                    </div>
                                    <div class='col-xl-1 text-center'>
                                        <button type='button' class='btn btn-outline-danger btn-sm w-100' style='padding: 2px 0; font-size: 11px; border-radius: 4px;' onclick='DELETE_BRANCH({$cnt})'>삭제</button>
                                    </div>
                                </div>";

    return $html;
}

function GET_MARKETSALE_STATE_CODE($flag,$cvalue, $db, $init_name = "") {



     $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $query = "SELECT state_abbr, state_full_name from towninfo_branch_info group by state_abbr, state_full_name order by state_full_name asc";

    $db->query($query);

    while ($row = $db->fetch()) {

        $state_abbr        = $row->state_abbr;
        $state_full_name   = $row->state_full_name;

        if($cvalue == $state_abbr)  $return_value .= "<option value='$state_abbr' selected>$state_full_name</option>\n";
        else $return_value .= "<option value='$state_abbr'>$state_full_name</option>\n";

    }

    return $return_value;

}

function GET_MARKETSALE_CITY_NAME($flag,$state_code, $cvalue, $db, $init_name = "") {



    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $query = "SELECT city from towninfo_branch_info where state_abbr = '{$state_code}' group by city order by city asc";

    $db->query($query);

    while ($row = $db->fetch()) {

        $city        = $row->city;

        if($cvalue == $city)  $return_value .= "<option value='$city' selected>$city</option>\n";
        else $return_value .= "<option value='$city'>$city</option>\n";

    }

    return $return_value;



}

function GET_MARKETSALE_COUNTY($flag, $state_code, $cvalue,  $db, $init_name = "") {



    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $q_state_code = "state_abbr = '{$state_code}'";
    
    if($state_code == "NYNJ") $q_state_code = "(state_abbr = 'NY' or state_abbr = 'NJ')";
    if($state_code == "MDVA") $q_state_code = "(state_abbr = 'MD' or state_abbr = 'VA')";
            
    $query = "SELECT county from towninfo_branch_info where $q_state_code group by county order by county asc";

    $db->query($query);

    while ($row = $db->fetch()) {

        $county        = $row->county;

        if($cvalue == $county)  $return_value .= "<option value='$county' selected>$county</option>\n";
        else $return_value .= "<option value='$county'>$county</option>\n";

    }

    return $return_value;



}

function GET_MARKETSALE($flag, $cvalue,  $db, $init_name = "") {



    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $query = "SELECT * from towninfo_marketsale_flyer order by market_name asc";

    $db->query($query);

    while ($row = $db->fetch()) {

        $towninfo_marketsale_flyer_id        = $row->towninfo_marketsale_flyer_id;
        $market_name        = $row->market_name;

        if($cvalue == $towninfo_marketsale_flyer_id)  $return_value .= "<option value='$towninfo_marketsale_flyer_id' selected>$market_name</option>\n";
        else $return_value .= "<option value='$towninfo_marketsale_flyer_id'>$market_name</option>\n";

    }

    return $return_value;



}

function GET_MARKETSALE_CITY_NAME_USER($flag,$state_code, $cvalue, $db, $init_name = "") {



    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    $query = "SELECT city from towninfo_branch_info where state_abbr = '{$state_code}' group by city order by city asc";

    $db->query($query);

    while ($row = $db->fetch()) {

        $city        = $row->city;

        if($cvalue == $city)  $return_value .= "<option value='$city' selected>$city</option>\n";
        else $return_value .= "<option value='$city'>$city</option>\n";

    }

    return $return_value;



}

function NO_DATA($row, $root, $url = "") {

    if(empty($row)) {

        if($root == "index") {
            echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
                "<script language=\"javascript\">\n" .
                "<!--\n" .
                "alert(\" 데이터가 없거나 잘못된 접근입니다.\");\n" .
                "location.href='/';\n" .
                "//-->\n" .
                "</script>\n");
            exit;
        }

        if($root == "home" ) {
            echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
                "<script language=\"javascript\">\n" .
                "<!--\n" .
                "alert(\" 데이터가 없거나 잘못된 접근입니다.\");\n" .
                "location.href='$url';\n" .
                "//-->\n" .
                "</script>\n");
            exit;
        }

        if($root == "per" ) {
            echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
                "<script language=\"javascript\">\n" .
                "<!--\n" .
                "alert(\"권한이 없거나 잘못된 접근입니다.\");\n" .
                "location.href='$url';\n" .
                "//-->\n" .
                "</script>\n");
            exit;
        }        
    }
}

function NO_PERMISSION($url = "") {

        echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
            "<script language=\"javascript\">\n" .
            "<!--\n" .
            "alert(\"권한이 없거나 잘못된 접근입니다.\");\n" .
            "location.href='$url';\n" .
            "//-->\n" .
            "</script>\n");
        exit;


}

/**
 * 공지사항 제목 길이 제한 함수 (UTF-8 기준)
 * - 한글: 30자 초과 시 자름
 * - 영문/숫자/특수문자: 50자 초과 시 자름
 *
 * 혼합 문자열의 경우 한글 1자 = 영문 2자로 가중치 계산
 */
function TRUNCATE_TITLE_OLD(string $title, int $korLimit = 30, int $engLimit = 50, string $suffix = '...'): string
{
    // 문자열을 UTF-8 기준으로 글자 단위 배열로 분리
    $chars = preg_split('//u', $title, -1, PREG_SPLIT_NO_EMPTY);

    $weight     = 0;          // 누적 가중치
    $result     = [];         // 잘라낼 글자 누적
    $maxWeight  = $engLimit;  // 영문 기준 최대치 (한글 1자 = 2점, 영문 1자 = 1점)

    foreach ($chars as $char) {
        // 한글 여부 판단 (유니코드 한글 범위: AC00–D7A3, 자모 등 포함)
        $isKorean = preg_match('/[\x{AC00}-\x{D7A3}\x{1100}-\x{11FF}\x{3130}-\x{318F}]/u', $char);

        $charWeight = $isKorean ? 2 : 1;  // 한글 = 2점, 영문 = 1점

        if ($weight + $charWeight > $maxWeight) {
            return implode('', $result) . $suffix;
        }

        $result[] = $char;
        $weight  += $charWeight;
    }

    return implode('', $result); // 제한 이하면 원본 그대로 반환
}

function TRUNCATE_TITLE(string $title, int $limit = 50, string $suffix = '...'): string
{
    
    if($title == "" || $title == null ) return "";
    
    $chars  = preg_split('//u', $title, -1, PREG_SPLIT_NO_EMPTY);
    $weight = 0;
    $result = [];

    foreach ($chars as $char) {
        $isKorean   = (bool) preg_match('/[\x{AC00}-\x{D7A3}\x{1100}-\x{11FF}\x{3130}-\x{318F}]/u', $char);
        $charWeight = $isKorean ? 2 : 1;

        if ($weight + $charWeight > $limit) {
            return implode('', $result) . $suffix;
        }

        $result[] = $char;
        $weight  += $charWeight;
    }

    return implode('', $result);
}

// recruit에서 고객이 배경이미지를 업로드 안했을때 사용할 이미지
function RECRUIT_RANDOM_BACK_IMG() {

    $rand  = mt_rand(1, 10);

    $return_value = "/images/background_image/back".$rand.".png";

    return $return_value;
}


// 유튜브 날짜를 보기 좋게 표시
function FORMAT_DAYS($days)
{
    // 1. 14일 이전이면 그대로 출력
    if ($days <= 14) {
        return $days . "일";
    }

    // 2. 15일 ~ 30일 미만이면 주 단위로 표시
    if ($days < 30) {
        $weeks = floor($days / 7);
        return $weeks . "주";
    }

    // 3. 30일 ~ 365일 미만이면 달 단위로 표시
    if ($days < 365) {
        $months = floor($days / 30);
        // 1달은 '한달'로 표시
        if ($months == 1) {
            return "한달";
        }
        return $months . "달";
    }

    // 4. 365일 이상이면 년 단위로 표시
    $years = floor($days / 365);
    return $years . "년";

}

function GET_DIFF($day) {

    $today = date("Ymd");

    $date1 = DateTime::createFromFormat('Ymd', $today);
    $date2 = DateTime::createFromFormat('Ymd', $day);

    $interval = $date1->diff($date2);


    $diffDays = $interval->format('%a');

    return $diffDays;
}

function REMOVE_SESSION_ID($id) {
    
    unset($_SESSION[$id]);
    
}
function INIT_SEARCH_SESSION($session_name) {
    
    $session_array = array("recruit",'market','business','vehicle_dealer','vehicle_regular','marketsale','find_people','notification','event');
    
    for($i=0;$i<count($session_array);$i++) {
        
        $t_session_name = $session_array[$i];
        
        if($session_name == $t_session_name) continue;
        
        REMOVE_SESSION_ID($t_session_name);
    }
    
    
}

function GET_FUTURE_DATE($dateStr, $months) {
    
    // 입력 가능한 날짜 형식 정의
    $formats = ['Y-m-d', 'm-d-Y'];
    $date = null;

    // 형식에 맞춰 DateTime 객체 생성
    foreach ($formats as $fmt) {
        $date = DateTime::createFromFormat($fmt, $dateStr);
        if ($date !== false) {
            $currentFmt = $fmt;
            break;
        }
    }

    if (!$date) {
        return -1;
    }

    // 1. 개월 수만큼 추가
    $date->modify("+$months months");

    // 2. 예시(2026-04-02 -> 2026-07-01)처럼 하루를 뺌
    $date->modify("-1 day");

    return $date->format($currentFmt);
}

function REMOVE_DUPLICATE_WORD($text, $delimiter = '/') {
    
    $words = explode($delimiter, $text);
    
    $uniqueWords = array_unique($words);
    
    return implode($delimiter, $uniqueWords);
}

function GET_MULTI_JOB_TYPE($define_val,$text, $delimiter = '/') {
    
    $words = explode($delimiter, $text);
    
    $uniqueWords = array_unique($words);
    
    for($i=0;$i<count($uniqueWords);$i++) {
    
        $return_value[$i] = ARRAY_RETURN($define_val->DEFINE_recruit_job_type,$uniqueWords[$i]);    
    }
    
    return implode($delimiter, $return_value);
}

function SAVE_IMG_URL($img_url, $save_file) {
    

    // 1. 외부 이미지 URL 및 저장할 경로 설정

    $savePath = "./uploads/downloaded_image.jpg";

    // 2. 파일 포인터 열기
    $fp = fopen($savePath, 'wb');

    // 3. cURL 초기화 및 옵션 설정
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $img_url);
    curl_setopt($ch, CURLOPT_FILE, $fp);          // 결과를 파일에 직접 쓰도록 설정
    curl_setopt($ch, CURLOPT_HEADER, 0);          // 헤더 정보는 제외
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);         // 제한 시간 설정 (초)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // HTTPS 인증서 검증 건너뛰기 (필요시 true)

    // 4. cURL 실행 및 종료
    curl_exec($ch);
    curl_close($ch);

    // 5. 파일 포인터 닫기
    fclose($fp);


}

// 최신 뉴스일자를 가져온다.
function GET_NEWS_DATE($db) {
    
   $return_value = ""; 
 
   $query = "SELECT report_date FROM madangn.news order by report_date desc limit 0,1";

   $db->query($query);

   while ($row = $db->fetch()) {

        $report_date        = $row->report_date;

        $return_value = substr($report_date,0,19);

   }
    
   return $return_value;   
    
}

// 마켓세일 전단지 등록유저인지 판단.

function CHECK_MARKETSALE_USER($db, $user_id) {
   
   $return_value = 0; 
 
   $query = "SELECT * FROM towninfo_marketsale_users where user_id = '{$user_id}' LIMIT 0,1";

   $db->query($query);

   $row = $db->fetch();

   $towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
   
   if($towninfo_marketsale_market_id > 0) $return_value = $towninfo_marketsale_market_id;
    
   return $return_value;    
    
}

function GET_MARKETSALE_REGION($flag,$market_name, $state_code, $cvalue, $db, $init_name = "") {



    $return_value = "";

    if($flag == 0) $return_value .= "<option value=''>전체</option>\n";
    if($flag == -1) $return_value .= "<option value=''>$init_name</option>\n";

    if($market_name == "") return $return_value;
    
    if($state_code != "") $q_state_code = " and state_code = '{$state_code}'";
    
    $query = "SELECT * from towninfo_marketsale_region where market_name = '{$market_name}' $q_state_code order by market_name asc";

    $db->query($query);

    while ($row = $db->fetch()) {

        $market_name        = $row->market_name;
        $state_code        = $row->state_code;
        $weekly_ads_flyer_site        = $row->weekly_ads_flyer_site;
        $region        = $row->region;

        if($cvalue == $weekly_ads_flyer_site)  $return_value .= "<option value='$weekly_ads_flyer_site' selected>$market_name - $state_code - $region</option>\n";
        else $return_value .= "<option value='$weekly_ads_flyer_site'>$market_name - $state_code - $region</option>\n";

    }

    if($return_value == "") $return_value .= "<option value=''>없음</option>\n";
    
    return $return_value;

}

function GET_MARKET_NAME($db,$id) {
    
    if ($id == "") $id = 0;
    
    $query = "SELECT market_name from towninfo_marketsale_market where towninfo_marketsale_market_id = $id limit 0,1";

    $result = $db->query($query);
    if (!$result) return "";

    $row = $db->fetch();
    if (!$row) return "";

    return $row->market_name;    
    
        
}

function GET_REALESTATE_KEY($db) {
    
    $query = "SELECT seq from office_seq";

    $result = $db->query($query);    
    $row = $db->fetch();
    if (empty($row)) $seq = 0;
    else $seq = $row->seq;
    
    $seq = $seq + 1;
    
    $db->update('office_seq', ['seq' => $seq], '');   

    return $seq;    
    
}

function GET_MIME_TYPE($mime_type) {
      
    $mime_map = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif',
        'image/webp' => 'webp',
        'application/pdf' => 'pdf',
        'application/zip' => 'zip',
        'text/plain' => 'txt'
    ];


    $extension = $mime_map[$mime_type] ?? 'bin'; 

    return $extension;
}

/**
 * 'MM/DD/YYYY' 형식의 날짜를 'YYYY-MM-DD' 형식으로 변환합니다.
 * @param string $dateStr
 * @return string
 */
function CONVERT_DATE_FORMAT($dateStr) {
    $date = DateTime::createFromFormat('m/d/Y', $dateStr);
    return $date ? $date->format('Ymd') : '';
}

function CONVERT_DATE_FORMAT2($dateStr) {
    $date = DateTime::createFromFormat('Y-m-d', $dateStr);
    return $date ? $date->format('m/d/Y') : '';
}

function CONVERT_DATE_FORMAT3($dateStr) {
    $date = DateTime::createFromFormat('Ymd', $dateStr);
    return $date ? $date->format('m/d/Y') : '';
}

/**
 * 기준 날짜('YYYY-MM-DD')에 특정 개월 수를 더한 날짜를 구합니다.
 * @param string $baseDate
 * @param int $months
 * @return string
 */
function ADD_MONTHS_TO_DATE($baseDate, $months) {
    $date = new DateTime($baseDate);
    $date->modify("+{$months} months");
    return $date->format('Ymd');
}



function GET_STATE_CITY($db,$num) {
 
    $return_value = array();
    
    $sql = "SELECT A.* from community_recruit_listings_loc_sub A
            where A.community_recruit_listings_id = :community_recruit_listings_id";

    $placeholders = ['community_recruit_listings_id' => $num];

    $result = $db->query($sql, $placeholders);
    
    $cnt = 0;
    
    while ($row = $db->fetch()) {        
        
        $return_value[$cnt] = array("T_CITY_NAME" => $row->city_name, "T_STATE_CODE" => $row->state_code);
        
        $cnt++;
    }
       
    return $return_value;   
}

function SET_STATE_CITY($db,$db2, $num) {
 
    $return_value = array();
    
    $sql = "SELECT A.* from community_recruit_listings_loc_sub A
            where A.community_recruit_listings_id = :community_recruit_listings_id";

    $placeholders = ['community_recruit_listings_id' => $num];

    $result = $db->query($sql, $placeholders);
    
    $cnt = 0;
    
    while ($row = $db->fetch()) {
        
        $select_state_code = DB_ARRAY_ARRAY_RETURN(1, $row->state_code, $db2, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc");
        $select_city_name  = DB_ARRAY_ARRAY_RETURN(1, $row->city_name, $db2, "common_code", "code_sub_name", "code_sub", "code = '{$row->state_code}' order by sort asc");
        
        $return_value[$cnt] = array("T_NUM" => $cnt, "T_LOC_SUB_ID" => $row->community_recruit_listings_loc_sub_id, "T_SELECT_STATE_CODE" => $select_state_code, "T_SELECT_CITY_NAME" => $select_city_name);
        
        $cnt++;
    }

    return $return_value;   
}

function make_recurit_job_html($db, $define_val, $num) {

    $html = '';
    $first_job_type = '';
    $first = 0;
    
    $sql = "select * from community_recruit_listings_sub where community_recruit_listings_id = $num order by community_recruit_listings_sub_id asc";
    
    $result = $db->query($sql);    
    
    while($row = $db->fetch()) {
        
        $job_type = $row->job_type;
        
        if($first == 0) { $first_job_type = $job_type; $first=1; continue; }
        
        $html .='<div class="job-type-added-row"><article class="post type-post panel uc-transition-toggle" style="margin-top:6px;"><div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid=""><div class="post-header panel vstack justify-between gap-1 w-full uc-first-column"><div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60 md:d-flex z-1"><div class="w-110px"></div><div class="w-full" style="display:flex; align-items:center; gap:6px;">
        <select class="form-select rounded text-gray-900 text-opacity-60" name="rp_job_type[]" style="height:32px; padding:2px 8px; font-size:13px;">';
        $html .= ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type,1,$job_type,"직종선택");
        $html .= '</select><button type="button" class="btn-remove-job-type" style="height:32px; line-height:32px; background-color:#dc3545; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;">삭제</button></div></div></div></div></article></div>
        ';
    }
    
    return [$first_job_type, $html];
}

function file_copy($dir, $o_file_name, $c_file_name) {
 
    $srcFile = "../../../UPLOADS/" . $dir . "/" . $o_file_name;
    $dstFile = "../../../UPLOADS/" . $dir . "/" . $c_file_name;
    
    if (is_file($srcFile)) copy($srcFile, $dstFile);
    

}

function file_process($file_name, $dir, $menu, $id, $img_var, $ext, $listing_id, $img_exist) {
    
    global $_POST, $_FILES;
        
    if ($_FILES[$img_var]['size'] > 0) {
        FILE_UPLOAD("user", $dir, $menu, $id, $img_var, $ext);
    }
    else {
        if($listing_id != "" && $_POST[$img_exist] != "") {                                     
            file_copy($dir, $menu."_".$listing_id."_".$ext, $menu."_".$id."_".$ext);                    
        }

    }
           
    
    /*                
    if ($recruit_logo_image_url != "") FILE_UPLOAD("user", "recruit_files", "recruit", $community_recruit_listings_id, "rp_logo_image_url", "logo");
                    else {
                        if($listing_id != "" && $_POST['rp_logo_image_url_exist'] != "") {                                     
                            file_copy("recruit_files", "/recruit_".$listing_id."_logo", "/recruit_".$community_recruit_listings_id."_logo",);                    
                        }
                    }
    }
    */
    
                    
}

function file_copy_process($dir, $menu, $id, $ext, $listing_id) {
    
    file_copy($dir, $menu."_".$listing_id."_".$ext, $menu."_".$id."_".$ext);   
}

function make_file_name($file_name, $listing_id, $img_exist) {
    
    global $_POST;
 
    $return_value = "";
    
    if ($_FILES[$file_name]['size'] > 0) $return_value = $_FILES[$file_name]['name'];
    else if($listing_id != "" &&  $_POST[$img_exist] != "") $return_value = "이미지복사";
    
    return $return_value;    
    
}

function make_state_city($db,$prefix, $num) {
    
    $cnt = 1;
    
    $html = "";
    
    $array_state_code = array();
    
    $sql = "select * from community_recruit_listings_loc_sub where community_recruit_listings_id = $num order by community_recruit_listings_loc_sub_id asc";
    
    $result = $db->query($sql);    
    
    while($row = $db->fetch()) {
        
        $state_code = $row->state_code;
        $city_name = $row->city_name;
        
        if($cnt == 1)     {
            
            $first_state_code = $state_code;
            $first_city_name= $city_name;
            
            $cnt++;
            
            continue;
        }
        
        $array_state_code[$cnt]['state_code'] =  $state_code;
        $array_state_code[$cnt]['city_name'] =  $city_name;
        
        $cnt++;
        
    }
    
    $idx = $cnt + 200;
    
    for($i=2;$i<$cnt;$i++) {
        
        $state_code = $array_state_code[$i]['state_code'];
        $city_name = $array_state_code[$i]['city_name'];
        
        $select_state_code = DB_ARRAY_ARRAY_RETURN(1, $state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc");
        $select_city_name = DB_ARRAY_ARRAY_RETURN(1, $city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$state_code}' order by code_sub_name asc");
                
        $html .= "
        <div class=\"job-type-added-row\">
            <article class=\"post type-post panel uc-transition-toggle\" style=\"margin-top:6px;\">
                <div class=\"row child-cols g-2 uc-grid uc-grid-stack\" data-uc-grid=\"\">
                    <div class=\"post-header panel vstack justify-between gap-1 w-full uc-first-column\">
                        <div class=\"post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60 md:d-flex z-1\">
                            <div class=\"w-110px\"></div>
                            <div class=\"w-full\" style=\"display:flex; align-items:center; gap:6px;\">
                                <div class=\"w-150px\"><select
                                        class=\"form-select rounded w-full p-1 text-gray-900 text-opacity-60\"
                                        id=\"{$prefix}_{$idx}_state_code\" name=\"{$prefix}_state_code[{$idx}]\"
                                        onchange=\"GET_SELECT_CITY_NAME('{$prefix}_{$idx}','one');\">
                                    
                                        $select_state_code
                                        
                                </select></div>
                                <div class=\"w-150px\" style=\"width:165px !important;\"><select
                                        class=\"form-select rounded p-1 text-gray-900 text-opacity-60\" id=\"{$prefix}_{$idx}_city_name\"
                                        name=\"{$prefix}_city_name[{$idx}]\">
                                        $select_city_name
                                </select></div>
                                <button type=\"button\" class=\"btn-remove-job-type\"
                                        style=\"height:32px; line-height:32px; background-color:#dc3545; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;\">
                                    삭제
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        ";
        
        $idx++;
        
    }
    
    return [$first_state_code, $first_city_name, $html];
    
}

function make_state_city_text($db, $num) {
    
    $txt = "";
    
    $array_state_code = array();
    
    $sql = "select * from community_recruit_listings_loc_sub where community_recruit_listings_id = $num order by community_recruit_listings_loc_sub_id asc";
    
    $result = $db->query($sql);    
    
    while($row = $db->fetch()) {
        
        $state_code = $row->state_code;
        $city_name = $row->city_name;
        
        if($txt == "") $txt = $city_name . ",".$state_code;   
        else $txt .= " / " . $city_name . ",".$state_code;
        
    }
    
    return $txt;
    
}

// 날짜형식 20260821가지고 몇번째 주인지 체크
function getWeekOfMonth($dateStr) {
    // 1. Ymd 형식의 문자열을 타임스탬프로 변환
    $timestamp = strtotime($dateStr);
    
    // 2. 해당 날짜의 '일(day)'을 가져옴 (예: 22)
    $day = date('j', $timestamp);
    
    // 3. 7일 단위로 나누어 올림 처리하여 주차 계산
    $week = ceil($day / 7);
    
    return $week;
}

// 날짜형식 20260821가지고 일요일부터 몇번째 주인지 체크
function getWeekOfMonthSunday($dateStr) {
    $timestamp = strtotime($dateStr);
    
    $day = date('j', $timestamp); // 해당 날짜의 일자 (예: 22)
    
    // 해당 월 1일의 요일 번호 (일요일: 0, 월요일: 1 ... 토요일: 6)
    $firstDayOfWeek = date('w', strtotime(date('Y-m-01', $timestamp)));
    
    // 요일 번호를 반영하여 달력상의 주차 계산
    $week = ceil(($day + $firstDayOfWeek) / 7);
    
    return $week;
}

// 회사 로고가 관리자에서 변경했을때 모든 구인구직 로고를 변경한다.
function SET_LOGO_IMAGE_URL($db, $upload_id, $ad_company_id, $dir, $ext) {
    
    $srcFile = "../../../../UPLOADS/" . $dir . "_files/" . $dir . "_" . $upload_id . "_" . $ext;   
    
    // 같은 회사의 ID를 찾는다.
    $sql = "SELECT A.* from community_recruit_listings A where A.ad_company_id = ". $ad_company_id;        

    $db->query($sql);
    
    while ($row = $db->fetch()) {
        
        $id = $row->community_recruit_listings_id;
                
        $dstFile = "../../../../UPLOADS/" . $dir . "_files/" . $dir . "_" . $id . "_" . $ext;
    
        if (is_file($srcFile)) { 
            copy($srcFile, $dstFile);                        
        }
        
    }
    
}

// 퍼미션 초기화
function make_permission_init() {
    
    $return_value = array();
    
    $return_value['user_manage'] = 'N';
    $return_value['user_access_log'] = 'N';
    
    $return_value['news_manage'] = 'N';
    $return_value['youtube_madangn_manage'] = 'N';
    $return_value['youtube_all_manage'] = 'N';
    
    $return_value['ad_company_manage'] = 'N';
    $return_value['job_manage'] = 'N';
    $return_value['job_ad_payment'] = 'N';
    $return_value['buysell_manage'] = 'N';
    $return_value['business_manage'] = 'N';    
    $return_value['business_ad_payment'] = 'N';
    $return_value['autodealer_manage'] = 'N';
    $return_value['autodealer_ad_payment'] = 'N';
    $return_value['autolisting_manage'] = 'N';
    
    
    $return_value['marketsale_market_manage'] = 'N';
    $return_value['marketsale_branch_manage'] = 'N';
    $return_value['marketsale_flyer_manage'] = 'N';
    $return_value['marketsale_user_manage'] = 'N';    
    $return_value['findperson_manage'] = 'N';
    $return_value['eventnoti_manage'] = 'N';
    $return_value['madangn_event_manage'] = 'N';
    
    $return_value['agent_manage'] = 'N';
    $return_value['agent_ad_payment'] = 'N';
    $return_value['realestate_listing_manage'] = 'N';
    
    $return_value['permission_setting'] = 'N';
    $return_value['banner_manage'] = 'N';
    
    return $return_value;
    
}

function make_multi_checkbox($define_value, $vari, $check_value)  {
    
    $html = '';
    
    
    $array_check = explode(",",$check_value);    
        
    for ($i = 0; $i < count($define_value); $i += 2) {
    
        if (!isset($define_value[$i]) || !isset($define_value[$i + 1])) {
            continue;
        }

        $value = $define_value[$i];
        $label = $define_value[$i + 1];

    
        if ($value === '' || $label === '전체') {
            continue;
        }
        
        $checked  = "";
        
        if(is_array($array_check) && $check_value != "") {
            
            for($j=0; $j<count($array_check);$j++) {
            
                $check = $array_check[$j];
            
                if($check == $value) $checked = "checked"   ;
                
            
            }
        }            
        
        $html .= "<label><input type=\"checkbox\" name=\"".$vari."[]\" value=\"{$value}\" {$checked}> {$label}</label>\n";
        
    }

    return $html;
}

function get_nickname($db,$id) {
    
    $sql = "select user_nickname from users where user_id = '{$id}' limit 0,1";
    
    $result = $db->query($sql);    
    
    $row = $db->fetch();
    $user_nickname = $row->user_nickname;
        
    return $user_nickname;
    
}

function send_mail($from,$to,$subject,$content) {    
    
    require '/mnt/www/vendor/autoload.php'; 

    $mail = new PHPMailer(true);
    
    $content = @str_replace("\n", "<br>", $content);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'it@madangn.com';                     //SMTP username
        $mail->Password   = 'lhcgerjljazlxzlg';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $from = "it@madangn.com";
        
        //Recipients
        $mail->setFrom($from);
        $mail->addAddress($to);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
        return "success";
        
    } catch (Exception $e) {
        return "fail";
    }

}


// 에이전키를 가지고 dre를 구한다음에 해당 에이전트의 key를 다 가져온다.
// 하나의 에이전트가 에이전트 key가 여러개일수 있으므로
function GET_AGENT_KEY($db,$agent_key) {

    $return_value = "";
    
    $agent_key_array = array();

    $query = "select * from realestate_agents where agent_key = '$agent_key' limit 0,1";
          
    $db->query($query);
    
    $row = $db->fetch();
    
    $dre = $row->agent_dre_license;
    
    if($dre == "") return "";
    
    $query = "select * from realestate_agents where agent_dre_license = '$dre'";
          
    $db->query($query);

    while ($row = $db->fetch()) {

        $agent_key_array[]   = $row->agent_key;        
        

    }
    
    $result = implode(',', array_map(function($val) { return "'$val'"; }, $agent_key_array));

    return $result;

}


// 로그파일 저장
function saveLog($php_name, $content, $mode = 'a') {
    
    $root_dir = $_SERVER['DOCUMENT_ROOT'];
    
    $log_file_name = "user_log_". date("Y-m-d") . ".txt";
    
    $today = date("Y-m-d H:i:s");
    
    $log_path = $root_dir . "/../user_logs/".$log_file_name;        
        
    $fp = fopen($log_path, $mode);
    
    if ($fp === false) {        
        return false; 
    }
    
    if(is_array($content)) $conv_content = var_export($content, true);     
    else $conv_content = $content;
     
    $request_url = $_SERVER['REQUEST_URI'] ?? 'CLI-Mode';
    $http_method = $_SERVER['REQUEST_METHOD'] ?? '-';
    $client_ip   = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    
    $result = fwrite($fp, "======================================= START LOG : {$php_name} / {$today} ============================================\n");
    
    $result = fwrite($fp, "\n");
    
    $result = fwrite($fp, "* REQUEST_URI : {$request_url} \n");
    $result = fwrite($fp, "* REQUEST_METHOD : {$http_method} \n");
    $result = fwrite($fp, "* REMOTE_ADDR : {$client_ip} \n");
    $result = fwrite($fp, "\n");
    $result = fwrite($fp, "\n");
    
    
    $result = fwrite($fp, $conv_content);
    
    $result = fwrite($fp, "\n");
    
    $result = fwrite($fp, "======================================= END LOG : {$php_name} / {$today} ============================================\n");
    $result = fwrite($fp, "\n");

    fclose($fp);

    return $result !== false;
}