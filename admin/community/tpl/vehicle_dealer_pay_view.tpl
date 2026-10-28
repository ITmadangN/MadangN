    <!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css"/>
<div class="row mt-2">
    <div class="col">

        <!-- 회사 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_COMPANY_NAME}}</div>
                    <div class="detail-company-meta">자동차 딜러 결제 상세 정보</div>
                </div>
            </div>
        </div>

        <!-- 기업정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기업기본정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">회사명</div>
                    <div class="detail-field-value">{{T_COMPANY_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">웹사이트</div>
                    <div class="detail-field-value">{{T_COMPANY_WEBSITE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주소</div>
                    <div class="detail-field-value">{{T_COMPANY_ADDRESS}}</div>
                </div>
            </div>
        </div>

        <!-- 결제정보 -->
        <div class="detail-card">
            <div class="detail-section-label">결제정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">결제금액</div>
                    <div class="detail-field-value">{{T_PAYMENT_AMOUNT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">결제일</div>
                    <div class="detail-field-value">{{T_PAYMENT_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">결제여부</div>
                    <div class="detail-field-value">{{T_IS_PAID}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">결제종류</div>
                    <div class="detail-field-value">{{T_PAYMENT_METHOD}}</div>
                </div>
            </div>
        </div>


        <!-- 광고게시정보 -->
        <div class="detail-card">
            <div class="detail-section-label">광고게시 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">광고 개월</div>
                    <div class="detail-field-value">{{T_VALIDITY_PERIOD}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 게시희망일</div>
                    <div class="detail-field-value">{{T_DESIRED_START_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 게시종료일</div>
                    <div class="detail-field-value">{{T_DESIRED_END_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 시작일</div>
                    <div class="detail-field-value">{{T_START_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 종료일</div>
                    <div class="detail-field-value">{{T_END_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">거래지역</div>
                    <div class="detail-field-value">{{T_CITY_NAME}}, {{T_STATE_CODE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</span></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">승인상태 (is_approved)</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_APPROVED}}</span></div>
                </div>   
                <div class="detail-field">
                    <div class="detail-field-label">수정가능여부</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_MODIFY_YN}}</span></div>
                </div>   
                <div class="detail-field">
                    <div class="detail-field-label">광고활성상태 (has_active_advertisement)</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_HAS_ACTIVE_ADVERTISEMENT}}</span></div>
                </div>          
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">IP</div>
                    <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                </div>

            </div>
        </div>

        <!-- 담당자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">딜러 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">딜러명</div>
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
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">딜러 웹사이트</div>
                    <div class="detail-field-value">{{T_DEALER_WEBSITE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">딜러 주소</div>
                    <div class="detail-field-value">{{T_LISTING_ADDRESS1}}</div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">딜러 소개</div>
                    <div class="detail-field-value">{{T_DEALER_INTRODUCTION}}</div>
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
            </div>
        </div>

        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">이미지</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">로고 이미지</div>
                    <div class="detail-field-value nimg">{{T_LOGO_URL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">딜러사진 이미지</div>
                    <div class="detail-field-value bimg">{{T_MAIN_IMAGE_URL}}</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="recruit_pay_list.php"
            class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
    </div>
    <div class="d-flex gap-2">
        <button type="button" 
                class="delete-button btn btn-info btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" 
                onclick="GO_CONFIRM('{{T_SID}}');"><i class="bx bx-save text-4 me-2"></i> 승인
        </button>    
        <button type="button"
                class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                onclick="GO_UPDATE('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 수정
        </button>
        <button type="button"
                class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                onclick="GO_DELETE('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 삭제
        </button>
    </div>
</div>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/vehicle_dealer_pay_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
