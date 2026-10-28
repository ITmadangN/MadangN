<!-- INCLUDE FILE '../include/header.php' -->
                 
                 <form name="" action="" method="post">
                 	<div class="row mt-2">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bxl-youtube"></i>
												<h2 class="card-big-info-title">유튜브</h2>
												<p class="card-big-info-desc">동영상 추가하기</p>
											
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
											    <div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">썸네일</label>
													<div class="col-lg-7 col-xl-6 bimg">
														 <div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Upload</span>
																<input type="file">
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													    </div>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구분</label>
													<div class="col-lg-7 col-xl-6">
														 <select class="form-control mb-3" name="">
													    <option>선택</option>
														<option>마당엔</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
													</div>
												</div>
												
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">중분류</label>
													<div class="col-lg-7 col-xl-6">
														 <select class="form-control mb-3" name="">
													    <option>선택</option>
														<option>madangntv</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">소분류</label>
													<div class="col-lg-7 col-xl-6">
														 <select class="form-control mb-3" name="">
													    <option>선택</option>
														<option>미부리</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">제목</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">
                                                   </div>
												</div>
												
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">현새상태</label>
													<div class="col-lg-7 col-xl-6">
														 <select class="form-control mb-3" name="">
													    <option>선택</option>
														<option>정상</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">상태</label>
													<div class="col-lg-7 col-xl-6">
														 <select class="form-control mb-3" name="">
													    <option>선택</option>
														<option>대기</option>
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
								<a href="youtube_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
							</div>
							
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-save text-4 me-2"></i> 추가하기
								</a>
							</div>
						</div>
			</form>





	
					
			

<?php require_once 'footer.php'; ?>