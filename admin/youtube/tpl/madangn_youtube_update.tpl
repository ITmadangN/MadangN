<!-- INCLUDE FILE '../include/header.php' -->

<form name="formp" id="formp" action="ajax/ajax_youtube_process.php" method="post">
	<input type="hidden" name="ac" value="madangn_update_movie">
	<input type="hidden" name="id" value="{{T_ID}}">
	<input type="hidden" name="aid" value="{{T_AID}}">
	<input type="hidden" name="video_id" value="{{T_VIDEO_ID}}">
	{{CSRF}}
	<div class="row mt-2">
		<div class="col">
			<section class="card card-modern card-big-info">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-2-5 col-xl-1-5">
							<i class="card-big-info-icon bx bxl-youtube"></i>
							<h2 class="card-big-info-title">유튜브</h2>
							<p class="card-big-info-desc">동영상 수정하기</p>

						</div>
						<div class="col-lg-3-5 col-xl-4-5">
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">썸네일</label>
								<div class="col-lg-7 col-xl-6 bimg">
									<img src="{{T_YOUTUBE_IMG}}" alt="" />
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구분</label>
								<div class="col-lg-7 col-xl-6">
									<select class="form-control mb-3" name="channel_id"  id="channel_id">
										{{T_SELECT_CHANNEL_ID}}
									</select>
								</div>
							</div>

							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">메뉴</label>
								<div class="col-lg-7 col-xl-6">
									<select class="form-control mb-3" name="category_1" id="category_1" onchange="CHANGE_CATEGORY1(1,'');">
										{{T_SELECT_CATEGORY_1}}
									</select>

								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">서브메뉴</label>
								<div class="col-lg-7 col-xl-6">
									<select class="form-control mb-3" name="category_2"  id="category_2">
										{{T_SELECT_CATEGORY_2}}
									</select>
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">제목</label>
								<div class="col-lg-7 col-xl-6">
									{{T_HISTORY_TITLE}}
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">상단</label>
								<div class="col-lg-7 col-xl-6">

										<input id="home_pick" name="home_pick" type="checkbox" value="Y" {{T_HOME_PICK_CHECKED}} /> Y

								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">Editor's Pick</label>
								<div class="col-lg-7 col-xl-6">

										<input id="editors_pick" name="editors_pick" type="checkbox" value="Y" {{T_EDITORS_PICK_CHECKED}} /> Y

								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">재정/보험 Pick</label>
								<div class="col-lg-7 col-xl-6">

										<input id="insurance_finance_pick" name="insurance_finance_pick" value="Y" type="checkbox" {{T_INSURANCE_FINANCE_PICK_CHECKED}} /> Y

								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">ROGG Pick</label>
								<div class="col-lg-7 col-xl-6">
									<input id="rogg_pick" name="rogg_pick" type="checkbox" value="Y" {{T_ROGG_PICK_CHECKED}} /> Y
								</div>
							</div>
							<div class="form-group row align-items-center mb-2">
								<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">현재상태</label>
								<div class="col-lg-7 col-xl-6">
									<select class="form-control mb-3" name="is_active">
										{{T_SELECT_IS_ACTIVE}}
									</select>

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
			<a href="youtube_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
		</div>


		<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
			<button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
				<i class="bx bx-save text-4 me-2"></i> 수정하기
			</button>
		</div>
	</div>
</form>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/youtube/youtube_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->