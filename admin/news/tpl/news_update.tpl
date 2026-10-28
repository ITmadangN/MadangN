<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />
<link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.min.css"/ >

<form name="formp" id="formp" action="ajax/ajax_news_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_news">
    <input type="hidden" name="id" value="{{T_ID}}">    
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
                            <input type="text" class="form-control" name="title" id="title" value="{{T_TITLE}}" required>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">Section</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="section" id="section">
                                {{SELECT_SECTION}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">순서</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="sort" id="sort" value="{{T_SORT}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">보도일자 (입력예 : 2026-05-22 13:11:31)</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="report_date" id="report_date" value="{{T_REPORT_DATE}}" required>
                        </div>
                    </div> 
                    <div class="detail-field full">
                        <div class="detail-field-label">상태</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="is_active" id="is_active">
                                {{SELECT_IS_ACTIVE}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field full" style="border-bottom:none;">
                        <div class="detail-field-label">기사내용</div>
                        <div class="detail-field-value">
                            <textarea class="form-control" rows="8" data-plugin-maxlength="" maxlength="2000" name="content" id="content">{{T_CONTENT}}</textarea>
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
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
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
<script src="../js/news/news_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
<script src="/js/js.cookie.min.js"></script>
<script src="/js/libs/jquery.mask.js"></script>
<script src="/js/jquery.datetimepicker.full.min.js"></script>

<script>
 
    $("#report_date").datetimepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    format:'Y-m-d H:i:s',
    step: 10,//몇분단위로 시간을 설정할것인가 설정
    defaultSelect: false,
    defaultDate: false

});
jQuery.datetimepicker.setLocale('kr');
</script>

<!-- INCLUDE FILE '../include/footer.php' -->
