<!-- INCLUDE FILE '../include/header.php' -->

<div class="row mt-2">
    <div class="col">
        <section class="card card-modern card-big-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2-5 col-xl-1-5">
                        <i class="card-big-info-icon bx bxs-user-account"></i>
                        <h2 class="card-big-info-title">광고회사 상세</h2>
                    </div>
                    <div class="col-lg-3-5 col-xl-4-5">
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구인회사/비지니스회사</label><div class="col-lg-7 col-xl-6">{{T_USED_TYPE}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사명</label><div class="col-lg-7 col-xl-6">{{T_COMPANY_NAME}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사 웹사이트</label><div class="col-lg-7 col-xl-6">{{T_COMPANY_WEBSITE}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사 주소</label><div class="col-lg-7 col-xl-6">{{T_COMPANY_ADDRESS}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">주</label><div class="col-lg-7 col-xl-6">{{T_COMPANY_STATE_CODE}} (15인 이상 : {{T_HAS_15_PLUS_EMPLOYEES}})</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">담당자</label><div class="col-lg-7 col-xl-6">{{T_CONTACT_NAME}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">이메일</label><div class="col-lg-7 col-xl-6">{{T_CONTACT_EMAIL}}</div></div>
                        <div class="form-group row align-items-center mb-2"><label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">연락처</label><div class="col-lg-7 col-xl-6">{{T_CONTACT_PHONE}}</div></div>
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
    <div><a href="ad_company_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
    <div class="d-flex gap-2">
        <button type="button" class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_UPDATE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 수정
        </button>
        <button type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" onclick="GO_DELETE('{{T_ID}}');">
            <i class="bx bx-save text-4 me-2"></i> 삭제
        </button>
    </div>
</div>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/ad_company_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
