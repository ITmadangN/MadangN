<?php 
$main="4";
$sub="1";
$mtitle="커뮤니티";
$stitle="구인구직 광고 신청 & 결제";
$ytitle="결제정보 수정";
require_once 'header.php'; 
?>
				


                 <form name="" action="" method="post">
                 	<div class="row mt-2">
							<div class="col">
						
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-credit-card"></i>
												<h2 class="card-big-info-title">결제정보 수정</h2>
												<p class="card-big-info-desc">구인구직 결제정보입니다.</p>
											
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구분</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>구인구직</option>
														<option>Option 2</option>
														<option>Option 3</option>
													</select>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">결제여부</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>Y</option>
														<option>N</option>
														
													</select>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">결제일</label>
													<div class="col-lg-7 col-xl-6">
														<div class="input-group">
														<span class="input-group-text">
															<i class="fas fa-calendar-alt"></i>
														</span>
														<input type="text" data-plugin-datepicker="" class="form-control">
													</div>

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">희망게시일</label>
													<div class="col-lg-7 col-xl-6">
													  <div class="input-daterange input-group" data-plugin-datepicker="">
														<span class="input-group-text">
															<i class="fas fa-calendar-alt"></i>
														</span>
														<input type="text" class="form-control" name="start">
														<span class="input-group-text border-start-0 border-end-0 rounded-0">
															to
														</span>
														<input type="text" class="form-control" name="end">
													   </div>
                                                     </div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">실제 게시일</label>
													<div class="col-lg-7 col-xl-6">
														<div class="input-daterange input-group" data-plugin-datepicker="">
														<span class="input-group-text">
															<i class="fas fa-calendar-alt"></i>
														</span>
														<input type="text" class="form-control" name="start">
														<span class="input-group-text border-start-0 border-end-0 rounded-0">
															to
														</span>
														<input type="text" class="form-control" name="end">
													   </div>
													</div>
												</div>
												
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">결제금액</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">결제방법</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">상태</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>게시</option>
														<option>Option 2</option>
														<option>Option 3</option>
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
								<a  href="comm_01_pay_modify.php" type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-save text-4 me-2"></i> 수정하기
								</a>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="comm_01.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
							</div>
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 me-2"></i> 삭제하기
								</a>
							</div>
						</div>
			</form>





	
					
			

<?php require_once 'footer.php'; ?>