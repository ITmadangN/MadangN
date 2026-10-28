<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />


<div class="row mt-2">
    <div class="col">

        <!-- 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_USER_NAME}}</div>
                    <div class="detail-company-meta">사용자 상세 정보</div>
                </div>
            </div>
        </div>

        <!-- 기본 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">기본 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">아이디</div>
                    <div class="detail-field-value">{{T_USER_ID}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">닉네임</div>
                    <div class="detail-field-value">{{T_USER_NICKNAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이름</div>
                    <div class="detail-field-value">{{T_USER_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">비밀번호</div>
                    <div class="detail-field-value">{{T_USER_PASSWORD}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value">{{T_USER_EMAIL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value">{{T_USER_PHONE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">뉴스레터 수신</div>
                    <div class="detail-field-value">{{SELECT_IS_LETTER_RECEIVE}}</div>
                </div>
            </div>
        </div>

        <!-- 권한 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">권한 정보</div>
            <div class="detail-grid">
                <!--div class="detail-field">
                    <div class="detail-field-label">사용자 타입</div>
                    <div class="detail-field-value">{{T_USER_TYPE}}</div>
                </div-->
                <div class="detail-field">
                    <div class="detail-field-label">권한 그룹</div>
                    <div class="detail-field-value">{{T_PERMISSION_GROUP_ID}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">상태</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{SELECT_IS_ACTIVE}}</span></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">나라</div>
                    <div class="detail-field-value">{{T_COUNTRY_CODE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주</div>
                    <div class="detail-field-value">{{T_STATE_CODE}}</div>
                </div>
                
                
            </div>
        </div>

        <!-- 로그인 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">로그인 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">마지막 로그인일</div>
                    <div class="detail-field-value">{{T_LAST_LOGIN_DATE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">마지막 로그인 IP</div>
                    <div class="detail-field-value">{{T_LAST_LOGIN_IP_ADDRESS}}</div>
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
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">수정일</div>
                    <div class="detail-field-value">{{T_UPDATED_AT}}</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="user_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_USER_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 수정
        </button>
        <button type="button" class="btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_USER_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 삭제
        </button>
    </div>
</div>

<script>
    var g_num = {{G_NUM}};
    
</script>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/user/user_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
