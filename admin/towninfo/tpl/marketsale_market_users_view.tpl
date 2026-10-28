<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />


<div class="row mt-2">
    <div class="col">

        <!-- 마켓 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_MARKET_NAME}}</div>
                    <div class="detail-company-meta">마켓세일 사용자 정보</div>
                </div>
            </div>
        </div>

        <!-- 기본 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기본 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">마켓</div>
                    <div class="detail-field-value">{{T_LOGO_URL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">사용자 ID</div>
                    <div class="detail-field-value">{{T_USER_ID}}</div>
                </div>              
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</span></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="marketsale_market_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
        <button type="button" class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 수정
        </button>
        <button type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 삭제
        </button>
    </div>
</div>

<!-- 이미지 모달 -->


<script>
    
</script>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/towninfo/marketsale_market_users_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
