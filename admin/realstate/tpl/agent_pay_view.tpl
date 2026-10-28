<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css"/>
<div class="row mt-2">
    <div class="col">

        <!-- 회사 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_AGENT_FULL_NAME}}</div>
                    <div class="detail-company-meta">에이전트 결제 상세 정보</div>
                </div>
            </div>
            <div class="detail-loop-row">
                <span class="detail-loop-label">광고 신청종류</span>
                <span class="detail-level-badge">에이전트</span>
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
                <div class="detail-field full">
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
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</span></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">승인상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_APPROVED}}</span></div>
                </div>             
                <div class="detail-field">
                    <div class="detail-field-label">광고활성상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_HAS_ACTIVE_ADVERTISEMENT}}</span></div>
                </div>                  
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">IP</div>
                    <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                </div>

            </div>
        </div>

        
        <!-- 오피스정보 -->
        <div class="detail-card">
            <div class="detail-section-label">오피스정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">오피스 Key</div>
                    <div class="detail-field-value">{{T_OFFICE_KEY}}</div>
                </div>            
                <div class="detail-field">
                    <div class="detail-field-label">오피스 MLS ID</div>
                    <div class="detail-field-value">{{T_OFFICE_MLS_ID}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">오피스명</div>
                    <div class="detail-field-value">{{T_OFFICE_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value">{{T_OFFICE_PHONE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value">{{T_OFFICE_EMAIL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">(우편번호) 주소</div>
                    <div class="detail-field-value">({{T_OFFICE_ZIP}}) {{T_OFFICE_ADDRESS1}} {{T_OFFICE_ADDRESS2}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도시, 주</div>
                    <div class="detail-field-value">{{T_OFFICE_CITY}}, {{T_OFFICE_STATE}}</div>
                </div>
                 
            </div>
        </div>
        
        <!-- 담당자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">에이전트 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">유저 ID</div>
                    <div class="detail-field-value">{{T_USER_ID}}</div>
                </div>              
                <div class="detail-field">
                    <div class="detail-field-label">에이전트 KEY</div>
                    <div class="detail-field-value">{{T_AGENT_KEY}}</div>
                </div>            
                <div class="detail-field">
                    <div class="detail-field-label">에이전트명</div>
                    <div class="detail-field-value">{{T_AGENT_FULL_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">전문분야</div>
                    <div class="detail-field-value">{{T_SPECIALIZED_FIELD}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">DRE Lic#</div>
                    <div class="detail-field-value">{{T_AGENT_DRE_LICENSE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value">{{T_AGENT_EMAIL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value">{{T_AGENT_PHONE}}</div>
                </div>
                <!--div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">광고주 노트</div>
                    <div class="detail-field-value">{{T_ADVERTISER_NOTES}}</div>
                </div-->
            </div>
        </div>
        
        <div class="detail-card">
            <div class="detail-section-label">자기소개</div>
            <div class="detail-grid">
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">소개</div>
                    <div class="detail-field-value">{{T_SELF_INTRODUCTION}}</div>
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
                    <div class="detail-field-label">에이전트 이미지</div>
                    <div class="detail-field-value bimg">{{T_MAIN_IMAGE_URL}}</div>
                </div>           
                <div class="detail-field">
                    <div class="detail-field-label">오피스 로고</div>
                    <div class="detail-field-value bimg">{{T_LOGO_IMAGE_URL}}</div>
                </div>                
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="business_pay_list.php"
            class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
    </div>
    <div class="d-flex gap-2">
        <button type="button" 
                class="delete-button btn btn-info btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" 
                onclick="GO_CONFIRM('{{T_AID}}');"><i class="bx bx-save text-4 me-2"></i> 승인
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
<script src="../js/realstate/agent_pay_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
