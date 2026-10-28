<?php

const DBHOST = "db01.phps.co.kr";      // 호스트 주소(localhost, 120.0.0.1)
const DBNAME = "madangn";      // 데이타 베이스(DataBase) 이름
const DBUSER = "madangn";          // DB 아이디
const DBPASS = "qkrruddnjs#201";        // DB 패스워드


$pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8mb4", DBUSER, DBPASS);

function getCoreLogicToken()
{
    $clientId = 'f215015b_4b9b_4f6e_a259_66e2beae4cfe';
    $clientSecret = 'd9fa2fb62a2b496dafc9533c9a6cd0ce';
    $tokenUrl = 'https://api.cotality.com/trestle/oidc/connect/token';

    // POST 데이터 구성
    $postFields = http_build_query([
        'grant_type' => 'client_credentials',
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'scope' => 'api'
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // ssl 인증서 무시
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        die('CURL Error: ' . curl_error($ch));
    }

    curl_close($ch);

    $data = json_decode($response, true);

    if ($httpCode !== 200) {
        die("Auth Error (HTTP $httpCode): " . ($data['error'] ?? 'Unknown Error'));
    }

    return $data['access_token'];
}

$accessToken = getCoreLogicToken();

$apiBaseUrl = 'https://api.cotality.com/trestle/odata/Property';

// 설정: 페이지당 100개씩, 첫 번째 페이지
$pageSize = 200;
$pageNumber = 0;
$skip = $pageNumber * $pageSize;

$queryParams = [
    //'$filter'  => "StandardStatus eq 'Active' and StateOrProvince  eq 'CA'",
    //'$filter'  => "(City eq 'Walnut' or City eq 'Buena Park')  and  (91789  eq 'Coldwell Banker Best Realty' or CoBuyerOfficeName eq 'Coldwell Banker Best Realty' or CoListOfficeName eq 'Coldwell Banker Best Realty' or ListOfficeName eq 'Coldwell Banker Best Realty')",
    //'$filter'  => "BuyerOfficeMlsId eq 'CLW-31002159' or  CoBuyerOfficeMlsId  eq 'CLW-31002159' or CoListOfficeMlsId eq 'CLW-31002159' or ListOfficeMlsId eq 'CLW-31002159'",
    //'$filter'  => "(City eq 'Walnut' or City eq 'Buena Park')  and  (PostalCode  eq '91789 ' )",
    // '$filter'  => "StreetNumber eq '20745' and StreetName eq 'CREST' and  City eq 'Walnut' and PostalCode eq '91789'",
    //'$filter'  => "StandardStatus eq 'Active' and (CoListAgentKey  eq '01930150' or ListAgentKey = '01930150')",
    '$filter'  => "CoListAgentKey  eq '01930150' or ListAgentKey eq '01930150'",
    '$select'  => '*',
    '$expand'  => 'Media,ListOffice',
    '$orderby' => 'ListPrice desc',
    '$top'     => $pageSize,
    '$skip'    => $skip,
    '$count'   => 'true'
];


// 배열을 URL 쿼리 스트링으로 변환
$url = $apiBaseUrl . '?' . http_build_query($queryParams);

// 2. cURL 실행
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $accessToken,
    'Accept: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    die('CURL Error: ' . curl_error($ch));
}

curl_close($ch);

// 3. 결과 처리
if ($httpCode === 200) {
    $result = json_decode($response, true);

    // 전체 매물 수 확인
    $totalCount = isset($result['@odata.count']) ? $result['@odata.count'] : 0;
    echo "Total Listings: " . $totalCount . "\n";

    if (!empty($result['value'])) {


     //   var_dump($result);
        foreach ($result['value'] as $property) {


            /*
            // DB 저장
            $stmt = $pdo -> prepare("SELECT * FROM realestate_listing where listing_key = :ListingKey");
            $stmt -> bindValue(":ListingKey", $property['ListingKey']);
            $stmt -> execute();
            $cnt = $stmt->rowCount();

            if ($property['ListingKey'] == "") continue;

            if($cnt > 0){
                $stmt_update = $pdo -> prepare("UPDATE youtube_channel_featured_videos SET view_count = :view_count, like_count = :like_count WHERE video_id = :video_id");
                $stmt_update -> bindValue(":view_count", $viewcnt);
                $stmt_update -> bindValue(":like_count", $likecnt);
                $stmt_update -> bindValue(":video_id", $videoid);
            }
            else {

                $stmt_insert = $pdo->prepare("
                    INSERT INTO realestate_listing (
                        realestate_listing_id,
                        listing_key,
                        listing_id,
                        standard_status,
                        mls_status,
                        property_type,
                        property_sub_type,
                        list_price,
                        original_list_price,
                        close_price,
                        listing_contract_date,
                        on_market_date,
                        close_date,
                        days_on_market,
                        street_number,
                        street_name,
                        street_suffix,
                        unparsed_address,
                        city,
                        state_or_province,
                        postal_code,
                        county_or_parish,
                        bedrooms_total,
                        bathrooms_total,
                        bathrooms_full,
                        bathrooms_half,
                        living_area,
                        lot_size_sqft,
                        lot_size_acres,
                        building_area_total,
                        year_built,
                        levels,
                        latitude,
                        longitude,
                        subdivision_name,
                        high_school_district,
                        elementary_school,
                        middle_or_junior_school,
                        high_school,
                        list_agent_key,
                        buyer_agent_key,
                        list_office_key,
                        buyer_office_key,
                        association_fee,
                        tax_annual_amount,
                        special_listing_conditions,
                        lease_term,
                        internet_entire_listing_display_yn,
                        internet_address_display_yn
                    ) VALUES (
                        NULL,
                        :listing_key,
                        :listing_id,
                        :standard_status,
                        :mls_status,
                        :property_type,
                        :property_sub_type,
                        :list_price,
                        :original_list_price,
                        :close_price,
                        :listing_contract_date,
                        :on_market_date,
                        :close_date,
                        :days_on_market,
                        :street_number,
                        :street_name,
                        :street_suffix,
                        :unparsed_address,
                        :city,
                        :state_or_province,
                        :postal_code,
                        :county_or_parish,
                        :bedrooms_total,
                        :bathrooms_total,
                        :bathrooms_full,
                        :bathrooms_half,
                        :living_area,
                        :lot_size_sqft,
                        :lot_size_acres,
                        :building_area_total,
                        :year_built,
                        :levels,
                        :latitude,
                        :longitude,
                        :subdivision_name,
                        :high_school_district,
                        :elementary_school,
                        :middle_or_junior_school,
                        :high_school,
                        :list_agent_key,
                        :buyer_agent_key,
                        :list_office_key,
                        :buyer_office_key,
                        :association_fee,
                        :tax_annual_amount,
                        :special_listing_conditions,
                        :lease_term,
                        :internet_entire_listing_display_yn,
                        :internet_address_display_yn
                    )
                ");

                $stmt_insert->execute([
                    'listing_key'                          => $property['ListingKey'],
                    'listing_id'                           => $property['ListingId'],
                    'standard_status'                      => $property['StandardStatus'],
                    'mls_status'                           => $property['MlsStatus'],
                    'property_type'                        => $property['PropertyType'],
                    'property_sub_type'                    => $property['PropertySubType'],
                    'list_price'                           => $property['ListPrice'],
                    'original_list_price'                  => $property['OriginalListPrice'],
                    'close_price'                          => $property['ClosePrice'],
                    'listing_contract_date'                => $property['ListingContractDate'],
                    'on_market_date'                       => $property['OnMarketDate'],
                    'close_date'                           => $property['CloseDate'],
                    'days_on_market'                       => $property['DaysOnMarket'],
                    'street_number'                        => $property['StreetNumber'],
                    'street_name'                          => $property['StreetName'],
                    'street_suffix'                        => $property['StreetSuffix'],
                    'unparsed_address'                     => $property['UnparsedAddress'],
                    'city'                                 => $property['City'],
                    'state_or_province'                    => $property['StateOrProvince'],
                    'postal_code'                          => $property['PostalCode'],
                    'county_or_parish'                     => $property['CountyOrParish'],
                    'bedrooms_total'                       => $property['BedroomsTotal'],
                    'bathrooms_total'                      => $property['BathroomsTotalInteger'],
                    'bathrooms_full'                       => $property['BathroomsFull'],
                    'bathrooms_half'                       => $property['BathroomsHalf'],
                    'living_area'                          => $property['LivingArea'],
                    'lot_size_sqft'                        => $property['LotSizeSquareFeet'],
                    'lot_size_acres'                       => $property['LotSizeAcres'],
                    'building_area_total'                  => $property['BuildingAreaTotal'],
                    'year_built'                           => $property['YearBuilt'],
                    'levels'                               => $property['Levels'],
                    'latitude'                             => $property['Latitude'],
                    'longitude'                            => $property['Longitude'],
                    'subdivision_name'                     => $property['SubdivisionName'],
                    'high_school_district'                 => $property['HighSchoolDistrict'],
                    'elementary_school'                    => $property['ElementarySchool'],
                    'middle_or_junior_school'              => $property['MiddleOrJuniorSchool'],
                    'high_school'                          => $property['HighSchool'],
                    'list_agent_key'                       => $property['ListAgentKey'],
                    'buyer_agent_key'                      => $property['BuyerAgentKey'],
                    'list_office_key'                      => $property['ListOfficeKey'],
                    'buyer_office_key'                     => $property['BuyerOfficeKey'],
                    'association_fee'                      => $property['AssociationFee'],
                    'tax_annual_amount'                    => $property['TaxAnnualAmount'],
                    'special_listing_conditions'           => $property['SpecialListingConditions'],
                    'lease_term'                           => $property['LeaseTerm'],
                    'internet_entire_listing_display_yn'   => $property['InternetEntireListingDisplayYN'],
                    'internet_address_display_yn'          => $property['InternetAddressDisplayYN']
                ]);

                $last_id = $pdo->lastInsertId();

                if (!empty($property['Media']) && is_array($property['Media'])) {

                    for($i=0;$i<count($property['Media']);$i++) {

                        $stmt_insert = $pdo->prepare("
                        INSERT INTO realestate_listing_media (
                            realestate_listing_media_id,
                            realestate_listing_id,
                            media_key,
                            listing_key,
                            media_url,
                            media_order,
                            media_type,
                            is_primary,
                            modified_timestamp,
                            created_at
                        ) VALUES (
                            NULL,
                            $last_id,     
                            :media_key,
                            :listing_key,
                            :media_url,
                            :media_order,
                            :media_type,
                            :is_primary,
                            :modified_timestamp,
                            NOW()
                        )
                    ");

                    if($property['Media'][$i]['Order'] == "1") $t_temp_order = 1;
                    else $t_temp_order = 0;

                    $dt = new DateTime($property['Media'][$i]['ModificationTimestamp']);
                    $mysqlDatetime = $dt->format('Y-m-d H:i:s');

                    $stmt_insert->execute([
                        'media_key'          => $property['Media'][$i]['MediaKey'],
                        'listing_key'        => $property['Media'][$i]['ResourceRecordKey'],
                        'media_url'          => $property['Media'][$i]['MediaURL'],
                        'media_order'        => $property['Media'][$i]['Order'],
                        'media_type'         => $property['Media'][$i]['MediaType'],
                        'is_primary'         => $t_temp_order,
                        'modified_timestamp' => $mysqlDatetime
                    ]);


                    }
                }
            }

            */

            
            echo "ID: " . $property['ListingKey'] . " | Price: $" . number_format($property['ListPrice']) . "\n";
            echo "StreetName: " . $property['StreetName'] . "\n";
            echo "ListOfficeName: " . $property['ListOfficeName'] . "\n";
            echo "BuyerAgentMlsId: " . $property['BuyerAgentMlsId'] . "\n";
            echo "CoBuyerAgentMlsId: " . $property['CoBuyerAgentMlsId'] . "\n";
            echo "CoListAgentMlsId: " . $property['CoListAgentMlsId'] . "\n";
            echo "ListAgentMlsId: " . $property['ListAgentMlsId'] . "\n";
            


            // Media는 배열 형태로 오므로 첫 번째 이미지 추출

            /*
                        // $expand 시 Media 필드는 배열로 들어옵니다.
                        echo "첫번째 Image URL: " . ($property['Media'][0]['MediaURL'] ?? 'No URL') . "\n";
                        echo "두번째 Image URL: " . ($property['Media'][1]['MediaURL'] ?? 'No URL') . "\n";
                        */

            echo "--------------------------\n";
        }
    } else {
        echo "결과가 없습니다. (Filter 조건을 확인하세요)";
    }
} else {
    echo "API 호출 실패 (HTTP $httpCode): \n";
    echo $response;
}