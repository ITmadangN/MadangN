<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />
<div class="row mt-2">
    <div class="col">

        <!-- 이벤트 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_TITLE}}</div>
                    <div class="detail-company-meta">마당엔 이벤트 상세 정보</div>
                </div>
            </div>
        </div>

        <!-- 기본 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기본 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">제목</div>
                    <div class="detail-field-value">{{T_TITLE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이벤트 기간</div>
                    <div class="detail-field-value">{{T_EVENT_START_DATE}} ~ {{T_EVENT_END_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">조회수</div>
                    <div class="detail-field-value">{{T_VIEW_COUNT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{SELECT_IS_ACTIVE}}</span></div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">내용</div>
                    <div class="detail-field-value">{{T_DESCRIPTION}}</div>
                </div>
            </div>
        </div>

        <!-- 관리 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">관리 정보</div>
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
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">등록 IP</div>
                    <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                </div>
            </div>
        </div>

        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">이미지</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">리스트 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '리스트 이미지');" style="cursor: pointer;">{{T_LIST_IMAGE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이미지 1</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '이미지 1');" style="cursor: pointer;">{{T_IMAGE_01_URL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이미지 2</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '이미지 2');" style="cursor: pointer;">{{T_IMAGE_02_URL}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">이미지 3</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '이미지 3');" style="cursor: pointer;">{{T_IMAGE_03_URL}}</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="event_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 수정
        </button>
        <button type="button" class="btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 삭제
        </button>
    </div>
</div>

<!-- 이미지 모달 -->
<div id="imageModal" class="image-modal" onclick="closeImageModal(event);">
    <div class="image-modal-content" onclick="event.stopPropagation();">
        <span class="image-modal-close" onclick="closeImageModal();">&times;</span>
        <div class="image-modal-title" id="imageModalTitle"></div>
        <img id="imageModalImage" class="image-modal-image" src="" alt="이미지">
    </div>
</div>

<script>
    var g_num = {{G_NUM}};
</script>
<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/towninfo/event_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
