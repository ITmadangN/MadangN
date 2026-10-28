<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_market_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_market">
    <input type="hidden" name="id" value="{{T_ID}}">
    <input type="hidden" name="h_image_01_url" value="{{H_IMAGE_01_URL}}">
    <input type="hidden" name="h_image_02_url" value="{{H_IMAGE_02_URL}}">
    <input type="hidden" name="h_image_03_url" value="{{H_IMAGE_03_URL}}">
    <input type="hidden" name="h_image_04_url" value="{{H_IMAGE_04_URL}}">
    <input type="hidden" name="h_image_05_url" value="{{H_IMAGE_05_URL}}">

    <div class="row mt-2">
        <div class="col">

            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">메뉴</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="listing_type" id="listing_type" onchange="GET_MARKETPLACE_TYPE();">
                                {{SELECT_LISTING_TYPE}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">직종</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="marketplace_type" id="marketplace_type">
                                {{SELECT_MARKETPLACE_TYPE}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">제목</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="title" id="title" value="{{T_TITLE}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">주</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="state_code" id="state_code" onchange="GET_CITY_NAME();">
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
                        <div class="detail-field-label">가격</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="marketplace_price" id="marketplace_price" value="{{T_MARKETPLACE_PRICE}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">연락처</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{T_CONTACT_PHONE}}">
                        </div>
                    </div>
                    <div class="detail-field full" style="border-bottom:none;">
                        <div class="detail-field-label">내용</div>
                        <div class="detail-field-value">
                            <textarea class="form-control" rows="6" data-plugin-maxlength="" maxlength="140" name="description" id="description">{{T_DESCRIPTION}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 이미지 -->
            <div class="detail-card">
                <div class="detail-section-label">이미지</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">이미지</div>
                        <div class="detail-field-value">
                            {{T_IMAGE_01_URL}}
                            {{T_DEL_IMAGE_01_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="image_01_url" accept=".jpg, .jpeg, .png, .gif" > 
                                    </span>가로 400X400픽셀, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이미지</div>
                        <div class="detail-field-value">
                            {{T_IMAGE_02_URL}}
                            {{T_DEL_IMAGE_02_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="image_02_url" accept=".jpg, .jpeg, .png, .gif" >
                                    </span>가로 400X400픽셀, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이미지</div>
                        <div class="detail-field-value">
                            {{T_IMAGE_03_URL}}
                            {{T_DEL_IMAGE_03_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="image_03_url" accept=".jpg, .jpeg, .png, .gif" >
                                    </span>가로 400X400픽셀, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이미지</div>
                        <div class="detail-field-value">
                            {{T_IMAGE_04_URL}}
                            {{T_DEL_IMAGE_04_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="image_04_url" accept=".jpg, .jpeg, .png, .gif" >
                                    </span>가로 400X400픽셀, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이미지</div>
                        <div class="detail-field-value">
                            {{T_IMAGE_05_URL}}
                            {{T_DEL_IMAGE_05_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="image_05_url" accept=".jpg, .jpeg, .png, .gif" >
                                    </span>가로 400X400픽셀, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">이미지</div>
                        <div class="detail-field-value">
                            {{T_IMAGE_06_URL}}
                            {{T_DEL_IMAGE_06_URL}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="image_06_url" accept=".jpg, .jpeg, .png, .gif" >
                                    </span>가로 400X400픽셀, 이미지는 jpg, png, gif만 가능
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
                        <div class="detail-field-label">조회수</div>
                        <div class="detail-field-value">{{T_VIEW_COUNT}}</div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">현재 상태</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="is_active" id="is_active">
                                {{SELECT_IS_ACTIVE}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">등록자</div>
                        <div class="detail-field-value">{{T_CREATED_USER}}</div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">등록일</div>
                        <div class="detail-field-value">{{T_CREATED_AT}}</div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">IP 주소</div>
                        <div class="detail-field-value">{{T_IP_ADDRESS}}</div>
                    </div>
                    <div class="detail-field full" style="border-bottom:none;">
                        <div class="detail-field-label">관리자 노트</div>
                        <div class="detail-field-value">
                            <textarea class="form-control" rows="6" data-plugin-maxlength="" maxlength="140" name="internal_notes" id="internal_notes">{{T_INTERNAL_NOTES}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex gap-2 justify-content-between mt-2">
        <div><a href="market_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
        <div>
            <button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 수정완료
            </button>
        </div>
    </div>
</form>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/market_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
