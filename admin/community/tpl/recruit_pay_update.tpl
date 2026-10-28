<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="../css/iibiz_form.css"/>
<form name="formp" id="formp" action="ajax/ajax_recruit_pay_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_pay_recruit">
    <input type="hidden" name="id" value="{{T_ID}}">
    <input type="hidden" name="ac_id" value="{{T_AC_ID}}">
    <input type="hidden" name="ap_id" value="{{T_AP_ID}}">
    <input type="hidden" name="h_logo_image_url" value="{{H_LOGO_IMAGE_URL}}">
    <input type="hidden" name="h_main_image_url" value="{{H_MAIN_IMAGE_URL}}">
    <input type="hidden" name="h_main_image_background_url" value="{{H_MAIN_IMAGE_BACKGROUND_URL}}">
    <input type="hidden" name="h_sub_image_01_url" value="{{H_SUB_IMAGE_01_URL}}">
    <input type="hidden" name="h_sub_image_02_url" value="{{H_SUB_IMAGE_02_URL}}">
    <input type="hidden" name="h_sub_image_03_url" value="{{H_SUB_IMAGE_03_URL}}">
    <input type="hidden" name="h_sub_image_04_url" value="{{H_SUB_IMAGE_04_URL}}">
    <input type="hidden" name="h_sub_image_05_url" value="{{H_SUB_IMAGE_05_URL}}">
    <input type="hidden" name="h_sub_image_06_url" value="{{H_SUB_IMAGE_06_URL}}">
    <div class="row mt-2">
        <div class="col">
            <!-- 회사 배너 -->
            <div class="detail-card">
                <div class="detail-company-banner">
                    <div class="detail-company-avatar"></div>
                    <div>
                        <div class="detail-company-name">{{T_COMPANY_NAME}}</div>
                        <div class="detail-company-meta">구인구직 결제 수정 정보</div>
                    </div>
                </div>
                <div style="padding: 14px 24px; border-bottom: 1px solid #f0f2f8;">
                    <div style="font-size:11px; font-weight:700; color:#0f766e; text-transform:uppercase; letter-spacing:1px; margin-bottom:10px;">
                        광고레벨
                    </div>
                    <div>                                                
                        <div class="adlevel-row">
                            <select class="detail-form-control" name="advertising_level"
                                    id="advertising_level">
                                {{SELECT_ADVERTISING_LEVEL}}
                            </select>                            
                        </div>
                        

                    </div>
                    <div id="result_advertising_level">
                        <!--div class="adlevel-row" id="adlevel_row_new">
                            <button type="button" class="adlevel-add-btn" onclick="ADD_ADVERTISING_LEVEL()">+ 추가
                            </button>
                        </div-->
                        <!-- LOOP START 'T_LOOP' -->
                        <div class="adlevel-row" id="div_advertising_level_{{T_LOOP.T_NO}}">                            
                            <select class="detail-form-control" name="job_type_{{T_LOOP.T_NO}}"
                                    id="job_type_{{T_LOOP.T_NO}}">
                                {{T_LOOP.T_JOB_TYPE}}
                            </select>
                            <!--button type="button" class="adlevel-delete-btn"
                                    onclick="DEL_ADVERTISING_LEVEL('{{T_LOOP.T_NO}}')">삭제
                            </button-->
                        </div>
                        <!-- LOOP END 'T_LOOP' -->

                    </div>
                </div>
            </div>

            <!-- 기업정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기업기본정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">회사명</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                               name="company_name" id="company_name"
                                                               value="{{T_COMPANY_NAME}}" readonly></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">웹사이트</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                               name="company_website" id="company_website"
                                                               value="{{T_COMPANY_WEBSITE}}" readonly></div>
                    </div>
                    <div class="detail-field full">
                        <div class="detail-field-label">주소</div>
                        <div class="detail-field-value"><input type="text" class="detail-form-control"
                                                               name="company_address" id="company_address"
                                                               value="{{T_COMPANY_ADDRESS}}" readonly></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">주</div>
                        <div class="detail-field-value"><select class="detail-form-control" name="company_state_code" id="company_state_code" disabled>
                            {{SELECT_COMPANY_STATE_CODE}}
                        </select></div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">15인 이상 여부</div>
                        <div class="detail-field-value"><select class="detail-form-control" name="has_15_plus_employees" id="has_15_plus_employees" disabled>
                            {{SELECT_HAS_15_PLUS_EMPLOYEES}}
                        </select></div>
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
                    <div class="detail-field-label">광고 State</div>
                    <div class="detail-field-value">
                        <select class="detail-form-control" name="state_code" id="state_code"
                                onchange="GET_CITY_NAME();">
                            {{SELECT_STATE_CODE}}
                        </select>
                    </div>
                </div>
                 <!-- LOOP START 'T_SC' -->                      
                    <div class="detail-field full" style="display: flex; flex-direction: column; gap: 5px;">                    
                        <div class="detail-field-label" style="font-weight: bold;">주 / 도시 / 15인이상 여부</div>                        
                        <div class="detail-input-group" style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">                            
                            <input type="hidden" name="loc_sub_id[{{T_SC.T_NUM}}]" value="{{T_SC.T_LOC_SUB_ID}}">
                            <select class="detail-form-control" name="state_code[{{T_SC.T_NUM}}]" id="state_code_{{T_SC.T_NUM}}" onchange="GET_CITY_NAME({{T_SC.T_NUM}});" style="width: auto;">
                                {{T_SC.T_SELECT_STATE_CODE}}
                            </select>
                            
                            <select class="detail-form-control" name="city_name[{{T_SC.T_NUM}}]" id="city_name_{{T_SC.T_NUM}}" style="width: auto;">
                                {{T_SC.T_SELECT_CITY_NAME}}
                            </select>
                                            
                            <label style="display: inline-flex; align-items: center; gap: 5px; cursor: pointer; white-space: nowrap;">
                                <input id="has_15_plus_employees_{{T_SC.T_NUM}}" name="has_15_plus_employees[{{T_SC.T_NUM}}]" value="Y" type="checkbox" {{T_SC.T_HAS_15_PLUS_EMPLOYEES}} />
                                <span>직원수가 15명 이상 (CA만 해당)</span>
                            </label>                            
                        </div>
                    </div>               
                 <!-- LOOP END 'T_SC' -->
                <div class="detail-field">
                    <div class="detail-field-label">제목</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="title"
                                                           id="title" value="{{T_TITLE}}"></div>
                </div>
                <!--div class="detail-field">
                    <div class="detail-field-label">부제목</div>
                    <div class="detail-field-value"><input type="text" class="detail-form-control" name="subtitle"
                                                           id="subtitle" value="{{T_SUBTITLE}}"></div>
                </div-->
                <div class="detail-field full">
                    <div class="detail-field-label">구인내용</div>
                    <div class="detail-field-value"><textarea class="detail-form-control" rows="12" maxlength="2000"
                                                              name="job_opening_information"
                                                              id="job_opening_information">{{T_JOB_OPENING_INFORMATION}}</textarea>
                    </div>
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

        <!-- 담당자 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">담당자 정보</div>
            <div class="detail-grid">
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
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">광고주 노트</div>
                    <div class="detail-field-value">{{T_ADVERTISER_NOTES}}</div>
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
                    <div class="detail-field-label">로고 이미지</div>
                    <div class="nimg">{{T_LOGO_IMAGE_URL}} {{T_DEL_LOGO_IMAGE_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="logo_image_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>Platinum:500 x 184, Gold:300 x 82, 이미지는 jpg, png, gif만 가능
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <!-- class="detail-field">
                    <div class="detail-field-label">메인 이미지</div>
                    <div class="bimg">{{T_MAIN_IMAGE_URL}} {{T_DEL_MAIN_IMAGE_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="main_image_url">
                                </span>
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div--
                <!--div class="detail-field">
                    <div class="detail-field-label">배경 이미지</div>
                    <div class="bimg">{{T_MAIN_IMAGE_BACKGROUND_URL}} {{T_DEL_MAIN_IMAGE_BACKGROUND_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="main_image_background_url">
                                </span>
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div-->
                <div class="detail-field">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div>{{T_SUB_IMAGE_01_URL}} {{T_DEL_SUB_IMAGE_01_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_01_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div>{{T_SUB_IMAGE_02_URL}} {{T_DEL_SUB_IMAGE_02_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_02_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div>{{T_SUB_IMAGE_03_URL}} {{T_DEL_SUB_IMAGE_03_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_03_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div>{{T_SUB_IMAGE_04_URL}} {{T_DEL_SUB_IMAGE_04_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_04_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">본문 추가 이미지</div>
                    <div>{{T_SUB_IMAGE_05_URL}} {{T_DEL_SUB_IMAGE_05_URL}}</div>
                    <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span
                                        class="fileupload-preview"></span></div>
                            <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_05_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
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
<script>
    var g_num = {{G_NUM}};
</script>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/recruit_pay_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>                
<!-- INCLUDE FILE '../include/footer.php' -->
