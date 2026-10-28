<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />
<div class="row mt-2">
    <div class="col">

        <!-- 뉴스 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_SOURCE}}</div>
                    <div class="detail-company-meta">뉴스 상세 정보</div>
                </div>
            </div>
            <div class="detail-loop-row">
                <span class="detail-loop-label">섹션</span>
                <span class="detail-level-badge">{{T_SECTION}}</span>
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
                    <div class="detail-field-label">출처</div>
                    <div class="detail-field-value">{{T_SOURCE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">섹션</div>
                    <div class="detail-field-value">{{T_SECTION}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">보도일</div>
                    <div class="detail-field-value">{{T_REPORT_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">조회수</div>
                    <div class="detail-field-value">{{T_VIEW_COUNT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">순서</div>
                    <div class="detail-field-value">{{T_SORT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</span></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">IP</div>
                    <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">키워드 태그</div>
                    <div class="detail-field-value">{{T_KEYWORD_TAG}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">링크</div>
                    <div class="detail-field-value"><a href="{{T_LINK}}" target="_blank">{{T_LINK}}</a></div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">내용</div>
                    <div class="detail-field-value">{{T_CONTENT}}</div>
                </div>
            </div>
        </div>

        <!-- 기자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기자 정보</div>
            <div class="detail-grid">
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">기자명</div>
                    <div class="detail-field-value">{{T_REPORTER_NAME}}</div>
                </div>
            </div>
        </div>

        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">이미지</div>
            <div class="detail-grid">
                <!-- LOOP START 'T_LOOP' -->
                <div class="detail-field">
                    <div class="detail-field-label">이미지 &nbsp; {{T_LOOP.T_YN}}</div>
                    <div class="detail-field-value bimg"><img src="{{T_LOOP.T_IMG_URL}}"></div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">캡션</div>
                    <div class="detail-field-value">{{T_LOOP.T_CAPTION}}</div>
                </div>
                <!-- LOOP END 'T_LOOP' -->
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
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">수정자</div>
                    <div class="detail-field-value">{{T_UPDATED_USER}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">수정일</div>
                    <div class="detail-field-value">{{T_UPDATED_AT}}</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="news_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
    <!-- IF START 'MANUAL_INPUT' -->
        <button type="button" class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_NEWS_ID}}');"><i class="bx bx-save text-4 me-2"></i> 수정</button>
    <!-- IF END 'MANUAL_INPUT' -->    
        <button type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_NEWS_ID}}');"><i class="bx bx-save text-4 me-2"></i> 삭제</button>
    </div>
</div>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/news/news_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->