<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="../css/iibiz_form.css"/>
<style>

/* =========================================================
   배너 위치 확인 모달
   ========================================================= */

.banner-location-modal {
    display: none;

    position: fixed;
    z-index: 99999;

    left: 0;
    top: 0;

    width: 100%;
    height: 100%;

    background: rgba(0, 0, 0, 0.75);

    align-items: center;
    justify-content: center;

    padding: 20px;

    box-sizing: border-box;
}


/* 모달 내용 */

.banner-location-modal .popup-content {

    position: relative;

    width: min(900px, 95vw);
    max-height: 95vh;

    background: #fff;

    border-radius: 8px;

    padding: 50px 20px 20px;

    box-sizing: border-box;

    overflow: auto;
}


/* 제목 */

.banner-location-modal .popup-title {

    text-align: center;

    font-size: 20px;
    font-weight: 700;

    margin-bottom: 5px;
}


/* 배너 정보 */

.banner-location-modal .popup-info {

    text-align: center;

    font-size: 14px;

    color: #666;

    margin-bottom: 15px;
}


/* 닫기 버튼 */

.banner-location-modal .close-btn {

    position: absolute;

    right: 15px;
    top: 12px;

    border: 0;

    background: transparent;

    font-size: 15px;

    cursor: pointer;

    padding: 5px 10px;
}


/* 이미지 영역 */

.banner-location-modal .image-wrapper {

    position: relative;

    width: 100%;

    text-align: center;

    overflow: auto;
}


/* 배경 이미지 */

.banner-location-modal .bg-image {

    display: block;

    width: 100%;

    height: auto;

    margin: 0 auto;
}


/* 하이라이트 */

.banner-location-modal .highlight-box {
    position: absolute;
    display: none;
    box-sizing: border-box;

    /* 선택 영역 */
    border: 4px solid #ff0000;

    /* 선택 영역은 약간만 밝게 */
    background: rgba(255, 255, 255, 0.05);

    /* 바깥 영역 어둡게 + 선택 영역 강조 */
    box-shadow:
        0 0 0 9999px rgba(0, 0, 0, 0.72),
        0 0 10px rgba(255, 0, 0, 1),
        inset 0 0 12px rgba(255, 255, 255, 0.2);

    pointer-events: none;
    z-index: 10;
}


@keyframes bannerHighlight {

    from {
        opacity: 0.65;
    }

    to {
        opacity: 1;
    }
}


/* 모바일 */

@media (max-width: 768px) {

    .banner-location-modal {
        padding: 10px;
    }

    .banner-location-modal .popup-content {
        width: 100%;
        max-height: 95vh;
        padding: 45px 10px 10px;
    }

    .banner-location-modal .popup-title {
        font-size: 17px;
    }

    .banner-location-modal .popup-info {
        font-size: 13px;
    }

}

/* ================================
   위치확인 버튼
   ================================ */
#bannerLocationViewBtn {
    display: inline-flex !important;
    align-items: center;
    justify-content: center;

    height: 34px !important;
    min-width: 72px !important;
    padding: 0 14px !important;

    margin: 0 !important;

    border: 1px solid #333 !important;
    border-radius: 5px !important;

    background: #333 !important;
    color: #fff !important;

    font-size: 13px !important;
    font-weight: 600 !important;
    line-height: 1 !important;
    text-align: center !important;
    text-decoration: none !important;

    cursor: pointer !important;

    box-sizing: border-box !important;

    transition: background-color 0.15s ease,
                border-color 0.15s ease !important;
}

/* 마우스 올렸을 때 */
#bannerLocationViewBtn:hover {
    background: #555 !important;
    border-color: #555 !important;
    color: #fff !important;
}

/* 클릭하는 순간 */
#bannerLocationViewBtn:active {
    background: #222 !important;
    border-color: #222 !important;
    color: #fff !important;
}

/* 포커스 */
#bannerLocationViewBtn:focus {
    outline: none !important;
    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.15) !important;
}

/* 비활성화 */
#bannerLocationViewBtn:disabled {
    opacity: 0.5 !important;
    cursor: not-allowed !important;
}

</style>
<form name="formp" id="formp" action="ajax/ajax_banner_pay_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_pay_banner">
    <input type="hidden" name="id" value="{{T_ID}}">
    <input type="hidden" name="ac_id" value="{{T_AC_ID}}">
    <input type="hidden" name="ap_id" value="{{T_AP_ID}}">
    <input type="hidden" name="h_main_image_url" value="{{H_MAIN_IMAGE_URL}}">
    <div class="row mt-2">
        <div class="col">
            <!-- 회사 배너 -->
            <div class="detail-card">
                <div class="detail-company-banner">
                    <div class="detail-company-avatar"></div>
                    <div>
                        <div class="detail-company-name">{{T_COMPANY_NAME}}</div>
                        <div class="detail-company-meta">배너 광고 결제 수정 정보</div>
                    </div>
                </div>
            </div>
            
            <div class="detail-card">
                <div class="detail-section-label">배너 광고</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">광고 섹션</div>
                        <div class="detail-field-value">                            
                                {{T_BANNER_TYPE}}                            
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">광고 위치</div>
                        <div class="detail-field-value">                            
                                {{T_BANNER_LOCATION}}                        
                        </div>
                    </div>
                </div>
            </div>

            <!-- 기업정보 -->
            <div class="detail-card">
                <div class="detail-section-label">회사 및 담당자정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">회사명</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                               name="company_name" id="company_name"
                                                               value="{{T_COMPANY_NAME}}"></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">담당자</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control" name="contact_name"
                                                           id="contact_name" value="{{T_CONTACT_NAME}}"></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이메일</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control" name="contact_email"
                                                               id="contact_email" value="{{T_CONTACT_EMAIL}}"></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">연락처</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control" name="contact_phone"
                                                               id="contact_phone" value="{{T_CONTACT_PHONE}}"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 결제정보 -->
        <div class="detail-card">
            <div class="detail-section-label">결제정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">결제금액</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="payment_amount"
                                                           id="payment_amount" value="{{T_PAYMENT_AMOUNT}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">결제일</div>
                    <div class="detail-field-value">{{T_PAYMENT_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">결제여부</div>
                    <div class="detail-field-value">
                        <select class="detail-form-control" name="is_paid" id="is_paid">
                            {{SELECT_IS_PAID}}
                        </select>
                    </div>
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
                    <div class="detail-field-value">
                        <select class="detail-form-control" name="validity_period" id="validity_period">
                            {{SELECT_VALIDITY_PERIOD}}
                        </select>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 게시희망일</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                           name="desired_start_date" id="desired_start_date"
                                                           value="{{T_DESIRED_START_DATE}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 게시종료일</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                           name="desired_end_date" id="desired_end_date"
                                                           value="{{T_DESIRED_END_DATE}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 시작일</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="start_date"
                                                           id="start_date" value="{{T_START_DATE}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">광고 종료일</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="end_date"
                                                           id="end_date" value="{{T_END_DATE}}"></div>
                </div>                
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value">
                        <select class="detail-form-control" name="is_active" id="is_active">
                            {{SELECT_IS_ACTIVE}}
                        </select>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">승인상태 (is_approved)</div>
                    <div class="detail-field-value">
                        <select class="detail-form-control" name="is_approved" id="is_approved">
                            {{SELECT_IS_APPROVED}}
                        </select>
                    </div>
                </div>
                <div class="detail-field">
                        <div class="detail-field-label">수정가능여부</div>
                        <select class="detail-form-control" name="is_modify_yn" id="is_modify_yn">
                                {{SELECT_IS_MODIFY_YN}}
                            </select>                    
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
                <div class="detail-field full" style="border-bottom:none;">
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
                    <div class="detail-field-label">배너 이미지</div>
                    <div class="bimg">{{T_MAIN_IMAGE_URL}} {{T_DEL_MAIN_IMAGE_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="main_image_url" id="main_image_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>
                                <button type="button"
                                        class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn"
                                        id="bannerLocationViewBtn">
                                    위치확인
                                </button>
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>                    
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">URL</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="link_url"
                                                           id="link_url" value="{{T_LINK_URL}}"></div>
                </div>
            </div>
        </div>

    </div>


    <div class="d-flex gap-2 justify-content-between mt-2">
        <div><a href="recruit_pay_list.php"
                class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
        </div>
        <div class="d-flex gap-2">
            <button type="submit"
                    class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 수정완료
            </button>
        </div>
    </div>
</form>
<!-- 배너 위치 확인 모달 -->
<div id="popupModal" class="banner-location-modal">

    <div class="popup-content">

        <button type="button"
                class="close-btn"
                id="closeBtn">
            닫기 ✕
        </button>

        <div class="popup-title">
            배너 위치 확인
        </div>

        <div class="popup-info">
            <span id="popupBannerType"></span>
            <span class="mx-1"> / </span>
            <span id="popupBannerLocation"></span>
        </div>

        <div class="image-wrapper">
            <img src=""
                 alt="배너 위치 확인"
                 class="bg-image"
                 id="targetImage">

            <div id="highlightBox"
                 class="highlight-box">
            </div>
        </div>

    </div>
</div>
<script>
    var bannerType = '{{T_BANNER_TYPE_ORIGIN}}';
    var bannerLocation = '{{T_BANNER_LOCATION}}';
</script>
<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/banner/banner_pay_update.js"></script>
<script src="../js/banner/banner_loc.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>                
<!-- INCLUDE FILE '../include/footer.php' -->
