<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_vehicle_dealer_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_vehicle_dealer">
    <input type="hidden" name="id" value="{{T_ID}}">
    <input type="hidden" name="h_logo_url" value="{{H_LOGO_URL}}">
    <input type="hidden" name="h_main_image_url" value="{{H_MAIN_IMAGE_URL}}">

    <div class="row mt-2">
        <div class="col">

            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">회사명</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{T_COMPANY_NAME}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">회사 웹사이트</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="company_website" id="company_website" value="{{T_COMPANY_WEBSITE}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">딜러 웹사이트</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="dealer_website" id="dealer_website" value="{{T_DEALER_WEBSITE}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">조회수</div>
                        <div class="detail-field-value">{{T_VIEW_COUNT}}</div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">상태</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="is_active" id="is_active">
                                {{SELECT_IS_ACTIVE}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">수정가능여부</div>
                        <select class="detail-form-control" name="is_modify_yn" id="is_modify_yn">
                                {{SELECT_IS_MODIFY_YN}}
                            </select>                    
                    </div>
                    <div class="detail-field full" style="border-bottom:none;">
                        <div class="detail-field-label">딜러 소개</div>
                        <div class="detail-field-value">
                            <textarea class="form-control" rows="8" data-plugin-maxlength="" maxlength="2000" name="dealer_introduction" id="dealer_introduction">{{T_DEALER_INTRODUCTION}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 위치 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">위치 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">주</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="state_code" id="state_code" onchange="GET_CITY_NAME();" required>
                                {{SELECT_STATE_CODE}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">도시</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="city_name" id="city_name">
                                {{SELECT_CITY_NAME}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">주소1</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="listing_address1" id="listing_address1" value="{{T_LISTING_ADDRESS1}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">주소2</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="listing_address2" id="listing_address2" value="{{T_LISTING_ADDRESS2}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">우편번호</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="listing_zip" id="listing_zip" value="{{T_LISTING_ZIP}}">
                        </div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">우편번호 확장</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="listing_zip_ext" id="listing_zip_ext" value="{{T_LISTING_ZIP_EXT}}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 담당자 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">딜러 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">딜러명</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="contact_name" id="contact_name" value="{{T_CONTACT_NAME}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이메일</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="contact_email" id="contact_email" value="{{T_CONTACT_EMAIL}}">
                        </div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">연락처</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{T_CONTACT_PHONE}}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 이미지 -->
            <div class="detail-card">
                <div class="detail-section-label">이미지</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">로고 이미지</div>
                        <div class="detail-field-value bimg">
                            {{T_LOGO_URL}}
                            {{T_DEL_LOGO_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="logo_url" accept=".jpg, .jpeg, .png, .gif" >
                                    </span>가로200*200, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">딜러사진 이미지</div>
                        <div class="detail-field-value bimg">
                            {{T_MAIN_IMAGE_URL}}
                            {{T_DEL_MAIN_IMAGE_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="main_image_url" accept=".jpg, .jpeg, .png, .gif" >
                                    </span>가로205 x 274, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
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
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">등록 IP</div>
                        <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex gap-2 justify-content-between mt-2">
        <div><a href="vehicle_dealer_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
        <div>
            <button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 수정완료
            </button>
        </div>
    </div>
</form>

<script>
    var g_num = {{G_NUM}};
</script>
<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/vehicle_dealer_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
