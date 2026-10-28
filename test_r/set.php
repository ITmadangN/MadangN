<?php


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");



$db->transactionBegin();

try {

     $row_sql = "SELECT * FROM ad_banner_amount A                     
                       
               -- where A.banner_type <> 'banner_realestate' 
               where A.banner_type = 'banner_home' 
              order by A.ad_banner_amount_id asc
              ";

              $placeholders = [];
              $result = $db2->query($row_sql, $placeholders);
      
      while($row = $db2->fetch()) {
          
            $banner_type = $row->banner_type;        
            $banner_location = $row->banner_location;
            
            if($banner_type == "") {
                exit;
            }

            $validity_period = 1;
            
            // 공통 입력
            $company_name = "기업5";        
            $contact_name  = "홍길동";
            $contact_email = "test@test.om";
            $contact_phone = "222-222-2222";                         
            
            $desired_start_date = CONVERT_DATE_FORMAT("09/22/2026"); 
            $desired_end_date = ADD_MONTHS_TO_DATE($desired_start_date,$validity_period);
            
            $today = date("Ymd");
        
            if($desired_start_date <= $today && $today <= $desired_end_date) $has_active_advertisement = 1;
            else $has_active_advertisement = 0;

              
            $advertiser_notes = "";

            $main_image_url = "";


            
            $link_url = "https://www.google.co.kr";     
            
            
            $is_active= 1; 
            $is_paid = 'Y'; 
            
            //$main_image_url = make_file_name("main_image_url", $listing_id, "main_image_url_exist");
            
            $insert_values = array(                
                'user_id' => 'test',
                'banner_type' => $banner_type,
                'banner_location' => $banner_location,            
                'company_name' => $company_name,
                'contact_name' => $contact_name,
                'contact_email' => $contact_email,
                'contact_phone' => $contact_phone,
                'main_image_url' => "jpg",      
                'link_url' => $link_url,                          
                'view_count' => 0,
                'advertiser_notes' => $advertiser_notes,
                'has_active_advertisement' => $has_active_advertisement,
                'is_active' => $is_active,                
                'created_user' => "test22",
                'created_at' => date('Y-m-d H:i:s'),
                'ip_address' => $_SERVER['REMOTE_ADDR'],
            );
            
            $result = $db->insert('ad_banners', $insert_values);
            if ($result == false) throw new Exception("ad_banners insert fail");
            $ad_banner_id = $db->getLastInsertId();

        
            unset($insert_values);

            // 이벤트 기간
            $payment_amount = 0;
            $payment_method = "오픈기념 무료 서비스";    
            

            // 결제정보 등록
            $insert_values = array(
                'user_id' => 'test',
                'section_type' => 6,
                'listing_id' => $ad_banner_id,
                'desired_start_date' => $desired_start_date,
                'desired_end_date' => $desired_end_date,
                'start_date' =>  $desired_start_date,
                'end_date' =>  $desired_end_date,
                'validity_period' => $validity_period,
                'is_paid' => $is_paid,
                'payment_date' => date('Y-m-d H:i:s'),
                'payment_amount' => $payment_amount,
                'payment_method' => $payment_method,
                'is_active' => $is_active,
                'created_user' => 'test22',
                'created_at' => date('Y-m-d H:i:s'),
                'ip_address' => $_SERVER['REMOTE_ADDR'],
            );

            $result = $db->insert('ad_payments', $insert_values);
            if ($result == false) throw new Exception("ad_payments insert fail");
            $ad_payments_id = $db->getLastInsertId();
            unset($insert_values);
            
      }

}
catch (Exception $e) {

    $db->transactionRollback();

    echo "No";
    
    exit;
}

//    $db->transactionRollback();
$db->transactionCommit();

echo "OK";

