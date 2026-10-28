<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

exit;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


// 코드로된  city_name을 원래이름으로 치환
function tr_city($db,$table,$id_name) {

    $row_sql = "SELECT $id_name, state_code, city_name FROM $table ORDER BY created_at ASC";

    $db->query($row_sql);
    $items = $db->fetchAll();


    foreach ($items as $row) {

        $id = $row->$id_name; 
        $state_code = $row->state_code;
        $city_name = $row->city_name;

        if ($state_code == "" || $city_name == "") { continue; }
        
        
        $query = "SELECT code_sub_name FROM common_code WHERE code = :state_code AND code_sub = :city_name limit 0,1";
        $db->query($query, [
            'state_code' => $state_code,
            'city_name' => $city_name
        ]);
        
        
        $row2 = $db->fetch();        
        
        if ($row2) {
            $code_sub_name = $row2->code_sub_name;
                    
            $update_values = ['city_name' => $code_sub_name];
            $db->update($table, $update_values, [$id_name => $id]);
        }
    }
    
}

tr_city($db,'community_business','community_business_id');
tr_city($db,'community_car_dealers','community_car_dealers_id');
tr_city($db,'community_car_listings','community_car_listings_id');
tr_city($db,'community_recruit_listings','community_recruit_listings_id');

echo "TR OK";