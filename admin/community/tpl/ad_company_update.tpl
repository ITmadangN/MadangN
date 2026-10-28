<!-- INCLUDE FILE '../include/header.php' -->


<form name="formp" id="formp" action="ajax/ajax_ad_company_process.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ac" value="update_ad_company">
	<input type="hidden" name="id" value="{{T_ID}}">
	<div class="row mt-2">
		<div class="col">
			<section class="card card-modern card-big-info">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-2-5 col-xl-1-5">
							<i class="card-big-info-icon bx bxs-user-account"></i>
							<h2 class="card-big-info-title">광고회사 수정</h2>
							<p class="card-big-info-desc">광고회사 수정화면입니다.</p>

						</div>
						<div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구인회사/비지니스회사</label>
                                <div class="col-lg-7 col-xl-6">
                                    <select class="form-control mb-1" name="used_type" id="used_type">
                                        {{SELECT_USED_TYPE}}
                                    </select>
                                </div>
                            </div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사명</label>
								<div class="col-lg-7 col-xl-6">
									<input type="text" class="form-control" name="company_name" id="company_name" value="{{T_COMPANY_NAME}}">
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사 웹사이트</label>
								<div class="col-lg-7 col-xl-6">
									<input type="text" class="form-control" name="company_website" id="company_website" value="{{T_COMPANY_WEBSITE}}">
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사 주소</label>
								<div class="col-lg-7 col-xl-6">
									<input type="text" class="form-control" name="company_address" id="company_address" value="{{T_COMPANY_ADDRESS}}">
								</div>
							</div>
                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">주</label>
                                <div class="col-lg-7 col-xl-6">                                    
                                    <select class="form-control mb-1" name="company_state_code" id="company_state_code">
                                        {{SELECT_COMPANY_STATE_CODE}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">15인 이상</label>
                                <div class="col-lg-7 col-xl-6">
                                    <select class="form-control mb-1" name="has_15_plus_employees" id="has_15_plus_employees">
                                        {{SELECT_HAS_15_PLUS_EMPLOYEES}}
                                    </select>
                                </div>
                            </div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">담당자</label>
								<div class="col-lg-7 col-xl-6">
									<input type="text" class="form-control" name="contact_name" id="contact_name" value="{{T_CONTACT_NAME}}">
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">이메일</label>
								<div class="col-lg-7 col-xl-6">
									<input type="text" class="form-control" name="contact_email" id="contact_email" value="{{T_CONTACT_EMAIL}}">

								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">연락처</label>
								<div class="col-lg-7 col-xl-6">
									<input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{T_CONTACT_PHONE}}">
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">현재상태</label>
								<div class="col-lg-7 col-xl-6">
									<select class="form-control mb-1" name="is_active" id="is_active">
										{{SELECT_IS_ACTIVE}}
									</select>
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">등록자</label>
								<div class="col-lg-7 col-xl-6">
									{{T_CREATED_USER}}

								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">등록일</label>
								<div class="col-lg-7 col-xl-6">
									{{T_CREATED_AT}}

								</div>
							</div>

							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">둥록아이피</label>
								<div class="col-lg-7 col-xl-6">
									{{T_IP_ADDRESS}}

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>







	<div class="row mt-2">
		<div class="col-12 col-md-auto">
			<a href="ad_company_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
		</div>

		<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
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
<script src="../js/community/ad_company_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
