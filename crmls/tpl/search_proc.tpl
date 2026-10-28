<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0d6efd;
            --primary-dark: #0b5ed7;
            --bg-1: #f4f7fb;
            --bg-2: #eaf1ff;
            --text-main: #1f2d3d;
            --text-sub: #6c757d;
            --line: #e9ecef;
        }

        body {
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            min-height: 100vh;
            font-size: 14px;
        }

        .page-title {
            font-weight: 700;
            color: var(--text-main);
            font-size: 1.6rem;
            margin-bottom: 0.35rem;
        }

        .page-desc {
            color: var(--text-sub);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .summary-card {
            border: 0;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary), #4b8dff);
            color: #fff;
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.18);
        }

        .summary-card .card-body {
            padding: 1rem 1.25rem;
        }

        .summary-title {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.15rem;
        }

        .summary-sub {
            font-size: 0.75rem;
            opacity: 0.8;
        }

        .summary-number {
            font-size: 1.5rem;
            font-weight: 800;
            line-height: 1;
        }

        .listing-card {
            border: 0;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.07);
            transition: transform .18s ease, box-shadow .18s ease;
            height: 100%;
            background: #fff;
        }

        .listing-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(15, 23, 42, 0.1);
        }

        .listing-card .card-header {
            background: #fff;
            border-bottom: 1px solid #eef2f7;
            padding: 0.8rem 1rem;
        }

        .listing-key {
            font-size: 0.82rem;
            color: var(--text-sub);
            margin-bottom: 0.2rem;
            word-break: break-all;
        }

        .listing-price {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
            margin: 0;
            line-height: 1.2;
        }

        .listing-card .card-body {
            padding: 0.9rem 1rem;
        }

        .meta-badge {
            background: #eef4ff;
            color: var(--primary);
            border-radius: 999px;
            padding: 0.3rem 0.65rem;
            font-weight: 600;
            font-size: 0.76rem;
            line-height: 1.2;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
            padding: 0.38rem 0;
            border-bottom: 1px dashed var(--line);
        }

        .info-row:last-child {
            border-bottom: 0;
        }

        .info-label {
            color: var(--text-sub);
            font-weight: 600;
            min-width: 105px;
            font-size: 0.8rem;
            line-height: 1.3;
        }

        .info-value {
            color: #212529;
            text-align: right;
            word-break: break-word;
            font-size: 0.82rem;
            line-height: 1.3;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 1.35rem;
            }

            .listing-price {
                font-size: 1.15rem;
            }

            .summary-number {
                font-size: 1.3rem;
            }

            .info-label {
                min-width: 92px;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="mb-3">
            <h1 class="page-title">Listing Results</h1>
            <p class="page-desc">조회된 매물 정보를 보기 쉽게 카드 형태로 정리했습니다.</p>
        </div>

        <div class="card summary-card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <div class="summary-title">Total Listings</div>
                    <div class="summary-sub">전체 검색 결과 수</div>
                </div>
                <div class="summary-number">{{totalListings}}</div>
            </div>
        </div>

        <div class="row g-3">
            <!-- LOOP START 'L' -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card listing-card">
                    <div class="card-header">
                        <div class="listing-key">
                            ListingKey: {{L.ListingKey}}
                        </div>
                        <h2 class="listing-price">${{L.Price}}</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex gap-2 mb-2 flex-wrap">
                            <span class="meta-badge">Beds: {{L.BedroomsTotal}}</span>
                            <span class="meta-badge">Baths: {{L.BathroomsFull}}</span>
                        </div>
                        <div class="info-row">
                            <div class="info-label">PropertyType</div>
                            <div class="info-value">{{L.PropertyType}}</div>
                        </div>                         
                        <div class="info-row">
                            <div class="info-label">StreetName</div>
                            <div class="info-value">{{L.StreetName}}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">ListOfficeName</div>
                            <div class="info-value">{{L.ListOfficeName}}</div>
                        </div>
                        <!--div class="info-row">
                            <div class="info-label">BuyerAgentMlsId (BuyerAgentKey)</div>
                            <div class="info-value">{{L.BuyerAgentMlsId}} ({{L.BuyerAgentKey}})</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">CoBuyerAgentMlsId (CoBuyerAgentKey)</div>
                            <div class="info-value">{{L.CoBuyerAgentMlsId}} ({{L.CoBuyerAgentKey}})</div>
                        </div-->
                        <div class="info-row">
                            <div class="info-label">CoListAgentMlsId (CoListAgentKey)</div>
                            <div class="info-value">{{L.CoListAgentMlsId}} ({{L.CoListAgentKey}})</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">ListAgentMlsId (ListAgentKey)</div>
                            <div class="info-value">{{L.ListAgentMlsId}} ({{L.ListAgentKey}})</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">CoListOfficeMlsId (CoListOfficeKey)</div>
                            <div class="info-value">{{L.CoListOfficeMlsId}} ({{L.CoListOfficeKey}})</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">ListOfficeMlsId (ListOfficeKey)</div>
                            <div class="info-value">{{ListOfficeMlsId}} ({{L.ListOfficeKey}})</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">City</div>
                            <div class="info-value">{{L.City}}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">StateOrProvince</div>
                            <div class="info-value">{{L.StateOrProvince}}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">PostalCode</div>
                            <div class="info-value">{{L.PostalCode}}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">YearBuilt</div>
                            <div class="info-value">{{L.YearBuilt}}</div>
                        </div>
                        <!--div class="info-row">
                            <div class="info-label">MemberStateLicense</div>
                            <div class="info-value">{{L.MemberStateLicense }}</div>
                        </div-->
                        <div class="info-row">
                            <div class="info-label">ListAgentStateLicense </div>
                            <div class="info-value">{{L.ListAgentStateLicense}}</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- LOOP END 'L' -->
        </div>
    </div>
</body>
</html>
