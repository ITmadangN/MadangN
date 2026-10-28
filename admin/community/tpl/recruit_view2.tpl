<!-- INCLUDE FILE '../include/header.php' -->

<div class="row mt-2">
    <div class="col">
        <section class="card card-modern card-big-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2-5 col-xl-1-5">
                        <i class="card-big-info-icon bx bxs-user-account"></i>
                        <h2 class="card-big-info-title">구인구직 상세</h2>
                    </div>
                    <div class="col-lg-3-5 col-xl-4-5">
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사명</label><div class="col-lg-7 col-xl-6">{{T_COMPANY_NAME}}</div></div>
                        <!-- LOOP START 'T_LOOP' -->
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">광고레벨</label><div class="col-lg-7 col-xl-6">{{T_LOOP.T_ADVERTISING_LEVEL}} / {{T_LOOP.T_JOB_TYPE}}</div></div>
                        <!-- LOOP END 'T_LOOP' -->
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">로고 이미지</label><div class="col-lg-7 col-xl-6 nimg">{{T_LOGO_IMAGE_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">로고 위치</label><div class="col-lg-7 col-xl-6">{{T_LOGO_POSITION}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">메인 이미지</label><div class="col-lg-7 col-xl-6 bimg">{{T_MAIN_IMAGE_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">배경 이미지</label><div class="col-lg-7 col-xl-6 bimg">{{T_MAIN_IMAGE_BACKGROUND_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가 이미지 1</label><div class="col-lg-7 col-xl-6">{{T_SUB_IMAGE_01_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가 이미지 2</label><div class="col-lg-7 col-xl-6">{{T_SUB_IMAGE_02_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가 이미지 3</label><div class="col-lg-7 col-xl-6">{{T_SUB_IMAGE_03_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가 이미지 4</label><div class="col-lg-7 col-xl-6">{{T_SUB_IMAGE_04_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가 이미지 5</label><div class="col-lg-7 col-xl-6">{{T_SUB_IMAGE_05_URL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">제목</label><div class="col-lg-7 col-xl-6">{{T_TITLE}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">소제목</label><div class="col-lg-7 col-xl-6">{{T_SUBTITLE}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">주</label><div class="col-lg-7 col-xl-6">{{SELECT_STATE_CODE}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">도시</label><div class="col-lg-7 col-xl-6">{{SELECT_CITY_NAME}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">담당자</label><div class="col-lg-7 col-xl-6">{{T_CONTACT_NAME}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">이메일</label><div class="col-lg-7 col-xl-6">{{T_CONTACT_EMAIL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">연락처</label><div class="col-lg-7 col-xl-6">{{T_CONTACT_PHONE}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구인내용</label><div class="col-lg-7 col-xl-6">{{T_JOB_OPENING_INFORMATION}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">15인 이상</label><div class="col-lg-7 col-xl-6">{{T_HAS_15_PLUS_EMPLOYEES}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">조회수</label><div class="col-lg-7 col-xl-6">{{T_VIEW_COUNT}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">광고주 노트</label><div class="col-lg-7 col-xl-6">{{T_ADVERTISER_NOTES}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">관리자 노트</label><div class="col-lg-7 col-xl-6">{{T_INTERNAL_NOTES}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">상태</label><div class="col-lg-7 col-xl-6">{{SELECT_IS_ACTIVE}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">등록자</label><div class="col-lg-7 col-xl-6">{{T_CREATED_USER}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">등록일</label><div class="col-lg-7 col-xl-6">{{T_CREATED_AT}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">수정자</label><div class="col-lg-7 col-xl-6">{{T_UPDATED_USER}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">수정일</label><div class="col-lg-7 col-xl-6">{{T_UPDATED_AT}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">IP</label><div class="col-lg-7 col-xl-6">{{T_IP_ADDRESS}}</div></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="recruit_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
        <button type="button" class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 수정</button>
        <button type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_ID}}');"><i class="bx bx-save text-4 me-2"></i> 삭제</button>
    </div>
</div>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/recruit_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
