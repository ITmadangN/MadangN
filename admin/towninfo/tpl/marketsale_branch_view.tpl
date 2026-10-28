<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />


<div class="row mt-2">
    <div class="col">

        <!-- 지점 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_BRANCH_NAME}}</div>
                    <div class="detail-company-meta">마켓세일 지점 상세 정보</div>
                </div>
            </div>
        </div>

        <!-- 기본 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기본 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">지점명</div>
                    <div class="detail-field-value">{{T_BRANCH_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">마켓</div>
                    <div class="detail-field-value">{{T_MARKET_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">전단지 ID</div>
                    <div class="detail-field-value">{{T_FLYER_ID}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">기본 지점</div>
                    <div class="detail-field-value">{{T_IS_DEFAULT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</span></div>
                </div>
            </div>
        </div>

        <!-- 지역 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">지역 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">주 코드</div>
                    <div class="detail-field-value">{{T_STATE_CODE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주 이름</div>
                    <div class="detail-field-value">{{T_STATE_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">지역 (동서남북)</div>
                    <div class="detail-field-value">{{T_REGION}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도시</div>
                    <div class="detail-field-value">{{T_CITY_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">카운티</div>
                    <div class="detail-field-value">{{T_COUNTY_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">지점 표시 방법</div>
                    <div class="detail-field-value">{{T_BRANCH_DISPLAY_METHOD}}</div>
                </div>
            </div>
        </div>

        <!-- 담당자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">담당자 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">담당자</div>
                    <div class="detail-field-value">{{T_CONTACT_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value">{{T_CONTACT_EMAIL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value">{{T_CONTACT_PHONE}}</div>
                </div>
            </div>
        </div>

        <!-- 세일 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">세일 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">세일 시작요일</div>
                    <div class="detail-field-value">{{T_SALE_START_DAY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주간 광고 전단지 사이트</div>
                    <div class="detail-field-value">
                        <a href="{{T_WEEKLY_ADS_FLYER_SITE}}" target="_blank">{{T_WEEKLY_ADS_FLYER_SITE}}</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 등록/수정 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">등록/수정 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">등록자</div>
                    <div class="detail-field-value">{{T_CREATED_USER}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">등록일</div>
                    <div class="detail-field-value">{{T_CREATED_AT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">수정자</div>
                    <div class="detail-field-value">{{T_UPDATED_USER}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">수정일</div>
                    <div class="detail-field-value">{{T_UPDATED_AT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">IP 주소</div>
                    <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="marketsale_branch_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
        <button type="button" class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 수정
        </button>
        <button type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 삭제
        </button>
    </div>
</div>

<script>
    
</script>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/towninfo/marketsale_branch_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
