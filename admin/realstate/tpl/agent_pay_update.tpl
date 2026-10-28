<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="../css/iibiz_form.css"/>
<form name="formp" id="formp" action="ajax/ajax_agent_pay_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_pay_agent">
    <input type="hidden" name="id" value="{{T_ID}}">
    <input type="hidden" name="realestate_agent_id" value="{{T_REALESTATE_AGENT_ID}}">
    <input type="hidden" name="office_id" value="{{T_OFFICE_ID}}">
    <input type="hidden" name="h_main_image_url" value="{{H_MAIN_IMAGE_URL}}">
    <input type="hidden" name="h_logo_image_url" value="{{H_LOGO_IMAGE_URL}}">
    <div class="row mt-2">
        <div class="col">
            <!-- 회사 배너 -->
            <div class="detail-card">
                <div class="detail-company-banner">
                    <div class="detail-company-avatar"></div>
                    <div>
                        <div class="detail-company-name">{{T_AGENT_FULL_NAME}}</div>
                        <div class="detail-company-meta">에이전트 결제 수정 정보</div>
                    </div>
                </div>
            </div>

            <!-- 기업정보 -->
            <!--div class="detail-card">
                <div class="detail-section-label">회사정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">회사명</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                               name="company_name" id="company_name"
                                                               value="{{T_COMPANY_NAME}}"></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">웹사이트</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                               name="company_website" id="company_website"
                                                               value="{{T_COMPANY_WEBSITE}}"></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">주소</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                               name="company_address" id="company_address"
                                                               value="{{T_COMPANY_ADDRESS}}"></div>
                    </div>
                </div>
            </div-->
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
                <div class="detail-field full">
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
                                                           value="{{T_DESIRED_END_DATE}}" ></div>
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
                    <div class="detail-field-label">승인상태</div>
                    <div class="detail-field-value">
                        <select class="form-control mb-1" name="is_approved" id="is_approved">
                            {{SELECT_IS_APPROVED}}
                        </select>
                    </div>
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
                    <div class="detail-field-label">오피스 KEY</div>
                    <div class="detail-field-value">{{T_OFFICE_KEY}}</div>
                </div>            
                <!--div class="detail-field">
                    <div class="detail-field-label">오피스 KEY</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_key"
                                                           id="office_key" value="{{T_OFFICE_KEY}}"></div>
                </div-->
                <div class="detail-field">
                    <div class="detail-field-label">오피스 MLS ID</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_mls_id"
                                                           id="office_mls_id" value="{{T_OFFICE_MLS_ID}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">오피스명</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_name"
                                                           id="office_name" value="{{T_OFFICE_NAME}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_phone"
                                                           id="office_phone" value="{{T_OFFICE_PHONE}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_email"
                                                           id="office_email" value="{{T_OFFICE_EMAIL}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주소1</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_address1"
                                                           id="office_address1" value="{{T_OFFICE_ADDRESS1}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주소2</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_address2"
                                                           id="office_address2" value="{{T_OFFICE_ADDRESS2}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주</div>
                    <div class="detail-field-value">
                    <select class="detail-form-control" name="office_state" id="office_state" onchange="GET_CITY_NAME();">
                            {{SELECT_STATE_CODE}}
                        </select>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도시</div>
                    <div class="detail-field-value">
                    <select class="detail-form-control" name="office_city" id="office_city">
                            {{SELECT_CITY_NAME}}
                        </select>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">우편번호</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="office_zip"
                                                           id="office_zip" value="{{T_OFFICE_ZIP}}"></div>
                </div>                 
            </div>
        </div>
        
        <!-- 담당자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">에이전트 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">유저 ID</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="user_id"
                                                           id="user_id" value="{{T_USER_ID}}"></div>
                </div>              
                <div class="detail-field">
                    <div class="detail-field-label">에이전트 KEY</div>
                    <div class="detail-field-value">{{T_AGENT_KEY}}</div>
                </div>                   
                <!--div class="detail-field">
                    <div class="detail-field-label">에이전트 KEY</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="agent_key"
                                                           id="agent_key" value="{{T_AGENT_KEY}}"></div>
                </div-->            
                <div class="detail-field">
                    <div class="detail-field-label">에이전트명</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="agent_full_name"
                                                           id="agent_full_name" value="{{T_AGENT_FULL_NAME}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">전문분야</div>
                    <div class="detail-field-value">
                    <select class="detail-form-control" name="specialized_field" id="specialized_field">
                            {{SELECT_SPECIALIZED_FIELD}}
                        </select>
                    
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">DRE Lic#</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="agent_dre_license"
                                                           id="agent_dre_license" value="{{T_AGENT_DRE_LICENSE}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">이메일</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="agent_email"
                                                           id="agent_email" value="{{T_AGENT_EMAIL}}"></div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">연락처</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="agent_phone"
                                                           id="agent_phone" value="{{T_AGENT_PHONE}}"></div>
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
                    <div class="detail-field-value">
                    <textarea class="form-control" rows="6" data-plugin-maxlength="" name="self_introduction" id="self_introduction">{{T_SELF_INTRODUCTION}}</textarea>
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
                <!--div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">관리자 노트</div>
                    <div class="detail-field-value">{{T_INTERNAL_NOTES}}</div>
                </div-->
            </div>
        </div>

        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">이미지</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">에이전트 이미지</div>
                    <div class="bimg">{{T_MAIN_IMAGE_URL}} {{T_DEL_MAIN_IMAGE_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="main_image_url">
                                </span>가로100x133, 이미지는 jpg, png, gif만 가능
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">오피스 로고</div>
                    <div class="bimg">{{T_LOGO_IMAGE_URL}} {{T_DEL_LOGO_IMAGE_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="logo_image_url">
                                </span>가로200x86, 이미지는 jpg, png, gif만 가능
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
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
            <button type="submit"
                    class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 수정완료
            </button>
        </div>
    </div>
</form>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/realstate/agent_pay_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>        
<!-- INCLUDE FILE '../include/footer.php' -->
