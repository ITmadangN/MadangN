<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_event_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_event">
    <input type="hidden" name="id" value="{{T_ID}}">
    <input type="hidden" name="h_list_image" value="{{H_LIST_IMAGE}}">
    <input type="hidden" name="h_image_01_url" value="{{H_IMAGE_01_URL}}">
    <input type="hidden" name="h_image_02_url" value="{{H_IMAGE_02_URL}}">
    <input type="hidden" name="h_image_03_url" value="{{H_IMAGE_03_URL}}">

    <div class="row mt-2">
        <div class="col">

            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">제목</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="title" id="title" value="{{T_TITLE}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이벤트 시작일</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="event_start_date" id="event_start_date" value="{{T_EVENT_START_DATE}}" required>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이벤트 종료일</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="event_end_date" id="event_end_date" value="{{T_EVENT_END_DATE}}" required>
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
                    <div class="detail-field full" style="border-bottom:none;">
                        <div class="detail-field-label">내용</div>
                        <div class="detail-field-value">
                            <textarea class="form-control" rows="8" data-plugin-maxlength="" maxlength="140" name="description" id="description">{{T_DESCRIPTION}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 이미지 -->
            <div class="detail-card">
                <div class="detail-section-label">이미지</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">리스트 이미지</div>
                        <div class="detail-field-value bimg">
                            {{T_LIST_IMAGE}}
                            {{T_DEL_LIST_IMAGE}}
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="list_image">
                                    </span>가로 296x296, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이미지 1</div>
                        <div class="detail-field-value bimg">
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
                                        <input type="file" name="image_01_url">
                                    </span>가로 845x2000이하, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">이미지 2</div>
                        <div class="detail-field-value bimg">
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
                                        <input type="file" name="image_02_url">
                                    </span>가로 845x2000이하, 이미지는 jpg, png, gif만 가능
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">이미지 3</div>
                        <div class="detail-field-value bimg">
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
                                        <input type="file" name="image_03_url">
                                    </span>가로 845x2000이하, 이미지는 jpg, png, gif만 가능
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
        <div><a href="event_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
        <div>
            <button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 수정완료
            </button>
        </div>
    </div>
</form>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/towninfo/event_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
