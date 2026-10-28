<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<div class="row mt-2">
    <div class="col">

        <!-- 에이전트 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_AGENT_FULL_NAME}}</div>
                    <div class="detail-company-meta">부동산 에이전트 상세 정보</div>
                </div>
            </div>
        </div>

        <!-- 기본 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기본 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">유저 ID</div>
                    <div class="detail-field-value">{{T_USER_ID}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">에이전트명</div>
                    <div class="detail-field-value">{{T_AGENT_FULL_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">전문 분야</div>
                    <div class="detail-field-value">{{T_SPECIALIZED_FIELD}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">DRE 라이선스</div>
                    <div class="detail-field-value">{{T_AGENT_DRE_LICENSE}}</div>
                </div>                
                <div class="detail-field">
                    <div class="detail-field-label">TOP Agent 여부</div>
                    <div class="detail-field-value">{{T_IS_PREMINUM_AGENT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">매물 보유 여부</div>
                    <div class="detail-field-value">{{T_HAS_ACTIVE_LISTINGS}}</div>
                </div>                  
                <div class="detail-field">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</span></div>
                </div>
                <div class="detail-field"  style="border-bottom:none;">
                    <div class="detail-field-label">승인상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_APPROVED}}</span></div>
                </div>                

            </div>
        </div>

        <!-- 에이전트 연락처 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">연락처 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value">{{T_AGENT_PHONE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value">{{T_AGENT_EMAIL}}</div>
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

        <!-- 에이전트 키 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">시스템 정보</div>
            <div class="detail-grid">
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">에이전트 KEY</div>
                    <div class="detail-field-value">{{T_AGENT_KEY}}</div>
                </div>
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
                
        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">프로필 이미지</div>
            <div class="detail-grid">
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">프로필 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '프로필 이미지');" style="cursor: pointer;">
                        {{T_MAIN_IMAGE_URL}}
                    </div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">오피스 로고 이미지</div>
                    <div class="detail-field-value bimg" onclick="openImageModal(this, '오피스 로고');" style="cursor: pointer;">
                        {{T_LOGO_IMAGE_URL}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="realestate_agent_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">        
        <button type="button" class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_REALESTATE_AGENT_ID}}');"><i class="bx bx-save text-4 me-2"></i> 수정</button>
        <button type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_REALESTATE_AGENT_ID}}');"><i class="bx bx-save text-4 me-2"></i> 삭제</button>
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
<script src="../js/realstate/agent_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
