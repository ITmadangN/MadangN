<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");

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
$pageSize = 100;
$pageNumber = 0;
$skip = $pageNumber * $pageSize;

$filterString = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = [
        'ListingKey',
        'ListingId',
        'StandardStatus',
        'MlsStatus',
        'PropertyType',
        'StreetNumber',
        'StreetName',
        'StreetSuffix',
        'CoListOfficeMlsId',
        'City',
        'StateOrProvince',
        'PostalCode',
        'CountyOrParish',
        'ListAgentMlsId',
        'ListOfficeMlsId',
        'MemberStateLicense',
        'ListAgentStateLicense'];

    $conditions = [];

    foreach ($fields as $field) {
        if (isset($_POST[$field]) && trim($_POST[$field]) !== '') {
            $value = trim($_POST[$field]);
            $value = str_replace("'", "''", $value);
            $conditions[] = "{$field} eq '{$value}'";
        }
    }

    $filterString = implode(' and ', $conditions);
}

if ($filterString == "") $filterString = "StandardStatus eq 'Active'";

$queryParams = [
    '$filter' => $filterString,
    '$select' => '*',
    '$expand' => 'Media',
    '$orderby' => 'ListPrice desc',
    '$top' => $pageSize,
    '$skip' => $skip,
    '$count' => 'true'
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

$i = 0;

$loop = array();

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "search_proc.tpl");


// 3. 결과 처리
if ($httpCode === 200) {
    $result = json_decode($response, true);

    // 전체 매물 수 확인
    $totalCount = isset($result['@odata.count']) ? $result['@odata.count'] : 0;

    $tpl->setVar("totalListings", $totalCount);


    if (!empty($result['value'])) {

        foreach ($result['value'] as $property) {

            $loop[$i] = array('ListingKey' => $property['ListingKey'], 'Price' => number_format($property['ListPrice']), 'BedroomsTotal' => $property['BedroomsTotal'],
                'BathroomsFull' => $property['BathroomsFull'], 'StreetName' => $property['StreetName'], 'ListOfficeName' => $property['ListOfficeName'], 'PropertyType' => $property['PropertyType'],
                'CoBuyerAgentMlsId' => $property['CoBuyerAgentMlsId'], 'CoListAgentMlsId' => $property['CoListAgentMlsId'], 'ListAgentMlsId' => $property['ListAgentMlsId'],
                'City' => $property['City'],'StateOrProvince' => $property['StateOrProvince'],'PostalCode' => $property['PostalCode'],'YearBuilt' => $property['YearBuilt'],
                'BuyerAgentKey' => $property['BuyerAgentKey'], 'CoBuyerAgentKey' => $property['CoBuyerAgentKey'], 'CoListAgentKey' => $property['CoListAgentKey'], 'ListAgentKey' => $property['ListAgentKey'], 
                'ListOfficeKey' => $property['ListOfficeKey'], 'CoListOfficeKey' => $property['CoListOfficeKey'], 'ListOfficeMlsId' => $property['ListOfficeMlsId'], 'CoListOfficeMlsId' => $property['CoListOfficeMlsId', 'ListAgentStateLicense' => $property['ListAgentStateLicense']
                ], 
            );


            $i++;

            /*
            echo "ListingKey: " . $property['ListingKey'] . " | Price: $" . number_format($property['ListPrice']) . "<br>";
            echo "BedroomsTotal: " . $property['BedroomsTotal'] . " | BathroomsFull: " . $property['BathroomsFull'] . "<br>";
            //echo "PublicRemarks: " . $property['PublicRemarks'] . "<br>";
            echo "StreetName: " . $property['StreetName'] . "<br>";
            echo "ListOfficeName: " . $property['ListOfficeName'] . "<br>";
            echo "BuyerAgentMlsId: " . $property['BuyerAgentMlsId'] . "<br>";
            echo "CoBuyerAgentMlsId: " . $property['CoBuyerAgentMlsId'] . "<br>";
            echo "CoListAgentMlsId: " . $property['CoListAgentMlsId'] . "<br>";
            echo "ListAgentMlsId: " . $property['ListAgentMlsId'] . "<br>";
            */

        }
    } else {

    }
} else {

}

$tpl->setLoop("L", $loop);
$tpl->tprint("main");
unset($tpl);