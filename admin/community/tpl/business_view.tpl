<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />


<div class="row mt-2">
    <div class="col">

        <!-- 비즈니스 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_TITLE}}</div>
                    <div class="detail-company-meta">비즈니스 상세 정보</div>
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
                    <div class="detail-field-label">광고레벨</div>
                    <div class="detail-field-value">{{T_ADVERTISING_LEVEL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">직종</div>
                    <div class="detail-field-value">{{T_BUSINESS_TYPE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">조회수</div>
                    <div class="detail-field-value">{{T_VIEW_COUNT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</span></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">승인상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_APPROVED}}</span></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">수정가능여부</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_MODIFY_YN}}</span></div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">내용</div>
                    <div class="detail-field-value">{{T_CONTENT}}</div>
                </div>
            </div>
        </div>

        <!-- 위치 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">위치 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">주</div>
                    <div class="detail-field-value">{{SELECT_STATE_CODE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">도시</div>
                    <div class="detail-field-value">{{SELECT_CITY_NAME}}</div>
                </div>
            </div>
        </div>

        <!-- 담당자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">담당자 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">회사명</div>
                    <div class="detail-field-value">{{T_COMPANY_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">담당자</div>
                    <div class="detail-field-value">{{T_CONTACT_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value">{{T_CONTACT_EMAIL}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value">{{T_CONTACT_PHONE}}</div>
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
                <div class="detail-field">
                    <div class="detail-field-label">등록 IP</div>
                    <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고주 노트</div>
                    <div class="detail-field-value">{{T_ADVERTISER_NOTES}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">관리자 노트</div>
                    <div class="detail-field-value">{{T_INTERNAL_NOTES}}</div>
                </div>
            </div>
        </div>

        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">이미지</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">대표 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '리스트 이미지');" style="cursor: pointer;">
                        {{T_MAIN_IMAGE_URL}}
                    </div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '본문 이미지');" style="cursor: pointer;">
                        {{T_SUB_IMAGE_01_URL}}
                    </div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '본문 이미지');" style="cursor: pointer;">
                        {{T_SUB_IMAGE_02_URL}}
                    </div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '본문 이미지');" style="cursor: pointer;">
                        {{T_SUB_IMAGE_03_URL}}
                    </div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '본문 이미지');" style="cursor: pointer;">
                        {{T_SUB_IMAGE_04_URL}}
                    </div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '본문 이미지');" style="cursor: pointer;">
                        {{T_SUB_IMAGE_05_URL}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="business_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
        <button type="button" class="delete-button btn btn-default btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_PREVIEW('{{T_ID}}');"><i class="bx bx-eyedropper text-4 me-2"></i> 미리보기</button>
        <!-- IF START 'CONFIRM' -->
        <button type="button" class="delete-button btn btn-info btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_CONFIRM('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 승인</button>
        <!-- IF END 'CONFIRM' -->
        <!-- IF START 'MODIFY_YN' -->
        <button type="button" class="delete-button btn btn-success btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_MODIFY_YN('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 수정허용하기</button>
        <!-- IF END 'MODIFY_YN' -->
        <button type="button" class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 수정</button>
        <button type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 삭제</button>
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
    
<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/business_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
