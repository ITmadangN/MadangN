<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_marketsale_flyer_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="write_marketsale_flyer">

    <div class="row mt-2">
        <div class="col">

            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>
                <div class="detail-grid">
                    <div class="detail-field full">
                        <div class="detail-field-label">제목</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="title" id="title" value="{{T_TITLE}}" required>
                        </div>
                    </div>
                  <div class="detail-field">
                        <div class="detail-field-label">마켓</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="towninfo_marketsale_market_id" id="towninfo_marketsale_market_id" onchange="GET_WEEKLY_ADS_FLYER_SITE();" required>
                                {{SELECT_MARKET}}
                            </select>
                        </div>
                    </div>
                  <div class="detail-field">
                        <div class="detail-field-label">주</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="state_code" id="state_code" onchange="GET_WEEKLY_ADS_FLYER_SITE();" required>
                                {{SELECT_STATE_CODE}}
                            </select>
                        </div>
                    </div>                                        
                    <div class="detail-field">
                        <div class="detail-field-label">세일 시작일</div>
                        <div class="detail-field-value">
                            <input type="date" class="form-control" name="sale_start_date" id="sale_start_date" value="{{T_SALE_START_DATE}}" required onchange="SET_END_DATE();">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">세일 종료일</div>
                        <div class="detail-field-value">
                            <input type="date" class="form-control" name="sale_end_date" id="sale_end_date" value="{{T_SALE_END_DATE}}" required>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">사이트 주소</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="weekly_ads_flyer_site" id="weekly_ads_flyer_site" required>
                                {{SELECT_WEEKLY_ADS_FLYER_SITE}}
                            </select>                            
                        </div>
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
                    <div class="detail-field" style="border-bottom:none;">
                        <div class="detail-field-label">팜플렛 이미지</div>
                        <div class="detail-field-value bimg">
                            <div class="fileupload fileupload-new mt-1" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Upload</span>
                                        <input type="file" name="main_image_url" accept=".jpg, .jpeg, .png, .gif, .webp, avif">
                                    </span>가로최소 1800 이상, 이미지는 jpg, jpeg, png, gif, avif, webp만 가능
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
        <div><a href="ad_company_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
        <div>
            <button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 등록완료
            </button>
        </div>
    </div>
</form>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/towninfo/marketsale_flyer_write.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
