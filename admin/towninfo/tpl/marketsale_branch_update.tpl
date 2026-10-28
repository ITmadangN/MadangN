<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_marketsale_branch_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="update_marketsale_branch">
    <input type="hidden" name="state_name" id="state_name" value="">
    <input type="hidden" name="id" id="id" value="{{T_ID}}">

    <div class="row mt-2">
        <div class="col">

            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">지점명</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="branch_name" id="branch_name" value="{{T_BRANCH_NAME}}" required>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">마켓</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="towninfo_marketsale_market_id" id="towninfo_marketsale_market_id" required>
                                {{SELECT_MARKET}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">전단지 ID</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="towninfo_marketsale_flyer_id" id="towninfo_marketsale_flyer_id" value="{{T_FLYER_ID}}">                            
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">기본 지점</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="is_default" id="is_default">
                                {{SELECT_IS_DEFAULT}}
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
                </div>
            </div>

            <!-- 지역 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">지역 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">주 코드</div>
                        <div class="detail-field-value">
                        <select class="form-control mb-1" name="state_code" id="state_code" required>
                                {{SELECT_STATE_CODE}}
                            </select>                            
                        </div>                                                                                                                      
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">도시</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="city_name" id="city_name" value="{{T_CITY_NAME}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">지역 (동서남북)</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="region" id="region" value="{{T_REGION}}">
                        </div>
                    </div>                    
                    <div class="detail-field">
                        <div class="detail-field-label">카운티</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="county_name" id="county_name" value="{{T_COUNTY_NAME}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">지점 표시 방법</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="branch_display_method" id="branch_display_method">
                                <option value="2">도시</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 담당자 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">담당자 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">담당자</div>
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
                    <div class="detail-field">
                        <div class="detail-field-label">연락처</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{T_CONTACT_PHONE}}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 세일 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">세일 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">세일 시작요일</div>
                        <div class="detail-field-value">
                                <input type="text" class="form-control" name="sale_start_day" id="sale_start_day" value="{{T_SALE_START_DAY}}">
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">주간 광고 전단지 사이트</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="weekly_ads_flyer_site" id="weekly_ads_flyer_site" value="{{T_WEEKLY_ADS_FLYER_SITE}}" placeholder="https://">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex gap-2 justify-content-between mt-2">
        <div><a href="marketsale_branch_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
        <div>
            <button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 등록완료
            </button>
        </div>
    </div>
</form>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/towninfo/marketsale_branch_write.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
