<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />


<div class="row mt-2">
    <div class="col">

        <!-- 차량 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_CAR_YEAR}} {{T_CAR_MAKER}} {{T_CAR_MODEL}}</div>
                    <div class="detail-company-meta">자동차 매물 상세 정보</div>
                </div>
            </div>
        </div>

        <!-- 기본 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기본 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">소속 딜러</div>
                    <div class="detail-field-value">{{T_COMPANY_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">회원 ID</div>
                    <div class="detail-field-value">{{T_USER_ID}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">가격</div>
                    <div class="detail-field-value">${{T_LISTING_PRICE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">등록일</div>
                    <div class="detail-field-value">{{T_CREATED_AT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">조회수</div>
                    <div class="detail-field-value">{{T_VIEW_COUNT}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{SELECT_IS_ACTIVE}}</span></div>
                </div>
            </div>
        </div>

        <!-- 차량 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">차량 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">제조사</div>
                    <div class="detail-field-value">{{T_CAR_MAKER}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">모델</div>
                    <div class="detail-field-value">{{T_CAR_MODEL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연식</div>
                    <div class="detail-field-value">{{T_CAR_YEAR}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">색상</div>
                    <div class="detail-field-value">{{T_CAR_COLOR}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주행거리</div>
                    <div class="detail-field-value">{{T_CAR_MILEAGE}} Mile</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">사고 이력</div>
                    <div class="detail-field-value">{{T_CAR_ACCIDENT_HISTORY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연료 종류</div>
                    <div class="detail-field-value">{{T_FUEL_TYPE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">차체 타입</div>
                    <div class="detail-field-value">{{T_BODY_TYPE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">변속기</div>
                    <div class="detail-field-value">{{T_TRANSMISSION}}</div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">옵션 목록</div>
                    <div class="detail-field-value">{{T_OPTIONS_DESCRIPTION}}</div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">차량 설명</div>
                    <div class="detail-field-value" style="font-size:12px;">{{T_DESCRIPTION}}</div>
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

        <!-- 판매자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">판매자 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">판매자</div>
                    <div class="detail-field-value">{{T_SELLER_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value">{{T_SELLER_PHONE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value">{{T_SELLER_EMAIL}}</div>
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
                    <div class="detail-field-label">IP</div>
                    <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                </div>
            </div>
        </div>

        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">이미지</div>
            <div class="detail-grid">
                <!-- LOOP START 'IMAGE_LIST' -->
                <div class="detail-field">
                    <div class="detail-field-label">이미지 (순서: {{IMAGE_LIST.T_IMAGE_ORDER}} / 20)</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '차량 이미지');" style="cursor: pointer;">
                        {{IMAGE_LIST.T_IMAGE_URL}}
                    </div>
                </div>
                <!-- LOOP END 'IMAGE_LIST' -->
                <!-- IF START 'NO_IMAGE' -->
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-value">등록된 이미지가 없습니다.</div>
                </div>
                <!-- IF END 'NO_IMAGE' -->
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="vehicle_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">                
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

<script>

</script>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/vehicle_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
