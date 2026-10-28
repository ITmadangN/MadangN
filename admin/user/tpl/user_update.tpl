<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_user_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_user">
    <input type="hidden" name="user_id" value="{{T_USER_ID}}">

    <div class="row mt-2">
        <div class="col">

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
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="user_nickname" id="user_nickname" value="{{T_USER_NICKNAME}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이름</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="user_name" id="user_name" value="{{T_USER_NAME}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">비밀번호</div>
                        <div class="detail-field-value">
                            <input type="password" class="form-control" name="user_password" id="user_password" value="" autocomplete="new-password" placeholder="변경 시에만 입력">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이메일</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="user_email" id="user_email" value="{{T_USER_EMAIL}}">
                        </div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">연락처</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="user_phone" id="user_phone" value="{{T_USER_PHONE}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">뉴스레터 수신</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="is_letter_receive" id="is_letter_receive">
                                {{SELECT_IS_LETTER_RECEIVE}}
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 권한 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">권한 정보</div>
                <div class="detail-grid">
                    <!--div class="detail-field">
                        <div class="detail-field-label">사용자 타입</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="user_type" id="user_type">
                                {{SELECT_USER_TYPE}}
                            </select>
                        </div>
                    </div-->
                    <div class="detail-field">
                        <div class="detail-field-label">권한 그룹</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="permission_group_id" id="permission_group_id">
                                {{SELECT_PERMISSION_GROUP_ID}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">상태</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="is_active" id="is_active">
                                {{SELECT_IS_ACTIVE}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">나라</div>
                        <div class="detail-field-value">
                        <select class="form-control mb-1" name="country_code" id="country_code">
                                {{SELECT_COUNTRY_CODE}}
                            </select>
                                                    
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">주</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="state_code" id="state_code">
                                {{SELECT_STATE_CODE}}
                            </select>
                        </div>
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
                        <div class="detail-field-label">마지막 로그인일</div>
                        <div class="detail-field-value">{{T_LAST_LOGIN_DATE}}</div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">마지막 로그인 IP</div>
                        <div class="detail-field-value">{{T_LAST_LOGIN_IP_ADDRESS}}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex gap-2 justify-content-between mt-2">
        <div><a href="user_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
        <div>
            <button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 수정완료
            </button>
        </div>
    </div>
</form>
<script>
    var fix = '{{T_FIX}}';
</script>
<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/user/user_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
