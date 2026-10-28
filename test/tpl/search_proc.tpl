<?php
// 예시 데이터
$totalListings = 98469;

$listings = [
    [
        'ListingKey' => '1033049636',
        'Price' => 999999999,
        'BedroomsTotal' => '',
        'BathroomsFull' => '',
        'StreetName' => '',
        'ListOfficeName' => '',
        'BuyerAgentMlsId' => '',
        'CoBuyerAgentMlsId' => '',
        'CoListAgentMlsId' => '',
        'ListAgentMlsId' => '',
    ],
    [
        'ListingKey' => '1155510417',
        'Price' => 395000000,
        'BedroomsTotal' => '',
        'BathroomsFull' => '',
        'StreetName' => '',
        'ListOfficeName' => '',
        'BuyerAgentMlsId' => '',
        'CoBuyerAgentMlsId' => '',
        'CoListAgentMlsId' => '',
        'ListAgentMlsId' => '',
    ],
    [
        'ListingKey' => '1158468149',
        'Price' => 170000000,
        'BedroomsTotal' => '7',
        'BathroomsFull' => '20',
        'StreetName' => '',
        'ListOfficeName' => '',
        'BuyerAgentMlsId' => '',
        'CoBuyerAgentMlsId' => '',
        'CoListAgentMlsId' => '',
        'ListAgentMlsId' => '',
    ],
    [
        'ListingKey' => '1089818373',
        'Price' => 135000000,
        'BedroomsTotal' => '16',
        'BathroomsFull' => '16',
        'StreetName' => '',
        'ListOfficeName' => '',
        'BuyerAgentMlsId' => '',
        'CoBuyerAgentMlsId' => '',
        'CoListAgentMlsId' => '',
        'ListAgentMlsId' => '',
    ],
];

function displayValue($value) {
    return ($value !== null && trim((string)$value) !== '') ? htmlspecialchars((string)$value) : '-';
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f4f7fb, #eaf1ff);
            min-height: 100vh;
        }

        .page-title {
            font-weight: 800;
            color: #1f2d3d;
        }

        .summary-card {
            border: 0;
            border-radius: 20px;
            background: linear-gradient(135deg, #0d6efd, #3f8cff);
            color: #fff;
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.22);
        }

        .summary-number {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
        }

        .listing-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            transition: transform .2s ease, box-shadow .2s ease;
            height: 100%;
            background: #fff;
        }

        .listing-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.12);
        }

        .listing-card .card-header {
            background: #ffffff;
            border-bottom: 1px solid #eef2f7;
            padding: 1rem 1.25rem;
        }

        .listing-key {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: .25rem;
        }

        .listing-price {
            font-size: 1.7rem;
            font-weight: 800;
            color: #0d6efd;
            margin: 0;
        }

        .meta-badge {
            background: #eef4ff;
            color: #0d6efd;
            border-radius: 999px;
            padding: .45rem .8rem;
            font-weight: 600;
            font-size: .85rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: .55rem 0;
            border-bottom: 1px dashed #e9ecef;
        }

        .info-row:last-child {
            border-bottom: 0;
        }

        .info-label {
            color: #6c757d;
            font-weight: 600;
            min-width: 140px;
        }

        .info-value {
            color: #212529;
            text-align: right;
            word-break: break-word;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="mb-4">
            <h1 class="page-title mb-2">Listing Results</h1>
            <p class="text-muted mb-0">조회된 매물 정보를 보기 쉽게 카드 형태로 정리했습니다.</p>
        </div>

        <div class="card summary-card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
                <div>
                    <div class="fs-5 fw-semibold">Total Listings</div>
                    <div class="small opacity-75">전체 검색 결과 수</div>
                </div>
                <div class="summary-number">{{totalListings}}</div>
            </div>
        </div>

        <div class="row g-4">
            <!-- LOOP START 'L' -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card listing-card">
                        <div class="card-header">
                            <div class="listing-key">
                                ListingKey: {{L.ListingKey}}
                            </div>
                            <h2 class="listing-price">
                                ${{L.Price}}
                            </h2>
                        </div>

                        <div class="card-body">
                            <div class="d-flex gap-2 mb-3 flex-wrap">
                                <span class="meta-badge">Beds: {{L.BedroomsTotal}}</span>
                                <span class="meta-badge">Baths: {{L.BathroomsFull}}</span>
                            </div>

                            <div class="info-row">
                                <div class="info-label">StreetName</div>
                                <div class="info-value">{{L.StreetName}}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">ListOfficeName</div>
                                <div class="info-value">{{L.ListOfficeName}}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">BuyerAgentMlsId</div>
                                <div class="info-value">{{L.BuyerAgentMlsId}}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">CoBuyerAgentMlsId</div>
                                <div class="info-value">{{L.CoBuyerAgentMlsId}}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">CoListAgentMlsId</div>
                                <div class="info-value">{{L.CoListAgentMlsId}}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">ListAgentMlsId</div>
                                <div class="info-value">{{L.ListAgentMlsId}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- LOOP END 'L' -->
        </div>
    </div>
</body>
</html>
