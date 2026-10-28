<?php

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
$pageSize = 10;
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
        'UnparsedAddress',
        'City',
        'StateOrProvince',
        'PostalCode',
        'CountyOrParish'
    ];

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

if($filterString == "") $filterString = "StandardStatus eq 'Active'";

$queryParams = [
    '$filter'  => $filterString,
    '$select'  => 'ListingKey,ListPrice,BedroomsTotal,BathroomsFull,PublicRemarks',
    '$expand'  => 'Media',
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
    echo "Total Listings: " . $totalCount . "<br>";

    if (!empty($result['value'])) {

        foreach ($result['value'] as $property) {
            echo "ListingKey: " . $property['ListingKey'] . " | Price: $" . number_format($property['ListPrice']) . "<br>";
            echo "BedroomsTotal: " . $property['BedroomsTotal'] . " | BathroomsFull: " . $property['BathroomsFull'] . "<br>";
            //echo "PublicRemarks: " . $property['PublicRemarks'] . "<br>";
            echo "StreetName: " . $property['StreetName'] . "<br>";
            echo "ListOfficeName: " . $property['ListOfficeName'] . "<br>";
            echo "BuyerAgentMlsId: " . $property['BuyerAgentMlsId'] . "<br>";
            echo "CoBuyerAgentMlsId: " . $property['CoBuyerAgentMlsId'] . "<br>";
            echo "CoListAgentMlsId: " . $property['CoListAgentMlsId'] . "<br>";
            echo "ListAgentMlsId: " . $property['ListAgentMlsId'] . "<br>";

            //echo count($property['Media']) . "개의 이미지<br>";
            // Media는 배열 형태로 오므로 첫 번째 이미지 추출
            if (!empty($property['Media']) && is_array($property['Media'])) {
                // $expand 시 Media 필드는 배열로 들어옵니다.
                //echo "첫번째 Image URL: " . ($property['Media'][0]['MediaURL'] ?? 'No URL') . "<br>";
                //echo "두번째 Image URL: " . ($property['Media'][1]['MediaURL'] ?? 'No URL') . "<br>";
            }
            echo "---------------------------------------------------------------------------<br>";
        }
    } else {
        echo "결과가 없습니다. (Filter 조건을 확인하세요)";
    }
} else {
    echo "API 호출 실패 (HTTP $httpCode): <br>";
    echo $response;
}