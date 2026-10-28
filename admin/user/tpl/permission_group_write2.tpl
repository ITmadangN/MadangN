<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />
<link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.min.css"/ >


<form name="formp" id="formp" action="ajax/ajax_permission_group_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="permission_group_write">

    <div class="row mt-2">
        <div class="col">

            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">권한그룹명</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="permission_group_name" id="permission_group_name" value="{{T_PERMISSION_GROUP_NAME}}" required>
                        </div>
                    </div>                    
                    <div class="detail-field full" style="border-bottom:none;">
                        <div class="detail-field-label">권한 그룹 설명</div>
                        <div class="detail-field-value">
                            <textarea class="form-control" rows="8" data-plugin-maxlength="" maxlength="2000" name="permission_group_description" id="permission_group_description">{{T_PERMISSION_GROUP_DESCRIPTION}}</textarea>
                        </div>
                    </div>
                </div>
                
                </div>
                <div class="detail-card">
                
                <div class="detail-section-label">권한 정보</div>
                
              
                    <div class="row mt-3">

                    
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-header fw-bold">사용자</div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="user_manage" id="perm_user_manage">
                                        <label class="form-check-label" for="perm_user_manage">사용자 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="user_access_log" id="perm_user_access_log">
                                        <label class="form-check-label" for="perm_user_access_log">사용자 접속 내역</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-header fw-bold">뉴스</div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="news_manage" id="perm_news_manage">
                                        <label class="form-check-label" for="perm_news_manage">뉴스 게시물 관리</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-header fw-bold">유튜브</div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="youtube_madangn_manage" id="perm_youtube_madangn_manage">
                                        <label class="form-check-label" for="perm_youtube_madangn_manage">MadangN 동영상 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="youtube_all_manage" id="perm_youtube_all_manage">
                                        <label class="form-check-label" for="perm_youtube_all_manage">Youtube 전체 동영상 관리</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-header fw-bold">커뮤니티</div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="ad_company_manage" id="perm_ad_company_manage">
                                        <label class="form-check-label" for="perm_ad_company_manage">광고회사 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="job_manage" id="perm_job_manage">
                                        <label class="form-check-label" for="perm_job_manage">구인구직 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="job_ad_payment" id="perm_job_ad_payment">
                                        <label class="form-check-label" for="perm_job_ad_payment">구인구직 광고 신청 & 결제 조회</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="buysell_manage" id="perm_buysell_manage">
                                        <label class="form-check-label" for="perm_buysell_manage">사고팔고 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="business_manage" id="perm_business_manage">
                                        <label class="form-check-label" for="perm_business_manage">비지니스 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="business_ad_payment" id="perm_business_ad_payment">
                                        <label class="form-check-label" for="perm_business_ad_payment">비지니스 광고 신청 & 결제 조회</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="autodealer_manage" id="perm_autodealer_manage">
                                        <label class="form-check-label" for="perm_autodealer_manage">자동차 딜러 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="autodealer_ad_payment" id="perm_autodealer_ad_payment">
                                        <label class="form-check-label" for="perm_autodealer_ad_payment">자동차 딜러 광고 신청 & 결제 조회</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="autolisting_manage" id="perm_autolisting_manage">
                                        <label class="form-check-label" for="perm_autolisting_manage">자동차 매물 관리</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-header fw-bold">타운정보</div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="marketsale_market_manage" id="perm_marketsale_market_manage">
                                        <label class="form-check-label" for="perm_marketsale_market_manage">마켓세일 마켓 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="marketsale_branch_manage" id="perm_marketsale_branch_manage">
                                        <label class="form-check-label" for="perm_marketsale_branch_manage">마켓세일 지점 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="marketsale_flyer_manage" id="perm_marketsale_flyer_manage">
                                        <label class="form-check-label" for="perm_marketsale_flyer_manage">마켓세일 전단지 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="marketsale_user_manage" id="perm_marketsale_user_manage">
                                        <label class="form-check-label" for="perm_marketsale_user_manage">마켓세일 사용자 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="findperson_manage" id="perm_findperson_manage">
                                        <label class="form-check-label" for="perm_findperson_manage">사람찾기 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="eventnoti_manage" id="perm_eventnoti_manage">
                                        <label class="form-check-label" for="perm_eventnoti_manage">행사알림 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="madangn_event_manage" id="perm_madangn_event_manage">
                                        <label class="form-check-label" for="perm_madangn_event_manage">마당엔 이벤트 관리</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-header fw-bold">부동산</div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="agent_manage" id="perm_agent_manage">
                                        <label class="form-check-label" for="perm_agent_manage">에이전트 관리</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="agent_ad_payment" id="perm_agent_ad_payment">
                                        <label class="form-check-label" for="perm_agent_ad_payment">에이전트 신청 & 결제 조회</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="realestate_listing_manage" id="perm_realestate_listing_manage">
                                        <label class="form-check-label" for="perm_realestate_listing_manage">부동산 매물관리</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-header fw-bold">Setting</div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="permission_setting" id="perm_permission_setting">
                                        <label class="form-check-label" for="perm_permission_setting">권한설정</label>
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
                <i class="bx bx-save text-4 me-2"></i> 등록완료
            </button>
        </div>
    </div>
</form>



<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/news/news_write.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
<script src="/js/js.cookie.min.js"></script>
<script src="/js/libs/jquery.mask.js"></script>
<script src="/js/jquery.datetimepicker.full.min.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
