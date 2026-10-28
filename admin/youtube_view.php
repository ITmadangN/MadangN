<?php 
$main="3";
$sub="1";
$mtitle="유튜브";
$stitle="재생목록 관리";
$ytitle="재생목록 정보";
require_once 'header.php'; 
?>
				

						<div class="row mt-2">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bxl-youtube"></i>
												<h2 class="card-big-info-title">유튜브</h2>
												<p class="card-big-info-desc">재생목록 정보</p>
											
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">썸네일</label>
													<div class="col-lg-7 col-xl-6 bimg">
														<img src="/youtube/images/4.jpg" alt="" />
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구분</label>
													<div class="col-lg-7 col-xl-6">
														마당엔
													</div>
												</div>
												
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">중분류</label>
													<div class="col-lg-7 col-xl-6">
														미부리

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">소분류</label>
													<div class="col-lg-7 col-xl-6">
														유니티
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">제목</label>
													<div class="col-lg-7 col-xl-6">
														미국 집값, 이정도면 미국 상위 10%
                                                   </div>
												</div>
												
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">현새상태</label>
													<div class="col-lg-7 col-xl-6">
														Pending

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">상태</label>
													<div class="col-lg-7 col-xl-6">
														정상

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">등록자</label>
													<div class="col-lg-7 col-xl-6">
														admin

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">등록일</label>
													<div class="col-lg-7 col-xl-6">
														2026-01-11 13:33:20


													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">수정자</label>
													<div class="col-lg-7 col-xl-6">
														admin
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">수정일</label>
													<div class="col-lg-7 col-xl-6">
														2026-01-11 13:33:20


													</div>
												</div>
												
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">둥록아이피</label>
													<div class="col-lg-7 col-xl-6">
														211.11.23.123

													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                         </div>



						<div class="row mt-n1">
						<div class="col-12 col-md-auto">
								<a href="youtube_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
							</div>
							
							
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<a  href="youtube_modify.php" type="submit" class="submit-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-save text-4 me-2"></i> 수정하기
								</a>
							</div>
						</div>
			





	
					
			

<?php require_once 'footer.php'; ?>