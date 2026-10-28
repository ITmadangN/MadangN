<?php 
$main="4";
$sub="1";
$mtitle="커뮤니티";
$stitle="구인구직 광고 신청 & 결제";
$ytitle="신청정보 수정";
require_once 'header.php'; 
?>
				

                 
                 <form name="" action="" method="post">
                 	<div class="row mt-2">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bxs-user-account"></i>
												<h2 class="card-big-info-title">신청정보 수정</h2>
												<p class="card-big-info-desc">신청정보 수정화면입니다.</p>
											
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">회사명</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">광고레벨</label>
													<div class="col-lg-7 col-xl-6">
													  <select class="form-control mb-3" name="">
														<option>Platinum</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">직종</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>사무직</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">로고이미지</label>
													<div class="col-lg-7 col-xl-6 nimg">
													  <img src="/community/images/ban1.png" alt="" />
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">로고위치</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>상단</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">메인이미지</label>
													<div class="col-lg-7 col-xl-6 bimg">
														<img src="/community/images/banbg1.jpg" alt="" />
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">메인 배경 이미지</label>
													<div class="col-lg-7 col-xl-6 bimg">
														<img src="/community/images/banbg1.jpg" alt="" />
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가이미지</label>
													<div class="col-lg-7 col-xl-6">
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가이미지</label>
													<div class="col-lg-7 col-xl-6">
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가이미지</label>
													<div class="col-lg-7 col-xl-6">
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가이미지</label>
													<div class="col-lg-7 col-xl-6">
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">추가이미지</label>
													<div class="col-lg-7 col-xl-6">
														<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">제목</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">소제목</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">주</label>
													<div class="col-lg-7 col-xl-6">
													<select class="form-control mb-3" name="">
														<option>CA</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
                                                    </div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">도시</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>LA</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">담당자</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">이메일</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">

													</div>
												</div>
													<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">연락처</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">
													</div>
												</div>
													<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">구인내용</label>
													<div class="col-lg-7 col-xl-6">
														<textarea class="form-control" rows="8" data-plugin-maxlength="" maxlength="140"></textarea>

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">고용정보</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">조회수</label>
													<div class="col-lg-7 col-xl-6">
														11

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">광고주노트</label>
													<div class="col-lg-7 col-xl-6">
														<textarea class="form-control" rows="6" data-plugin-maxlength="" maxlength="140"></textarea>
                                                    </div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">관리자노트</label>
													<div class="col-lg-7 col-xl-6">
														<textarea class="form-control" rows="6" data-plugin-maxlength="" maxlength="140"></textarea>

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">현새상태</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>Peding</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">상태</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control mb-3" name="">
														<option>정상</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>

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



			



						<div class="row mt-2">
							<div class="col-12 col-md-auto">
								<a href="comm_01.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
							</div>
							
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-save text-4 me-2"></i> 수정완료
								</a>
							</div>
						</div>
			</form>





	
					
			

<?php require_once 'footer.php'; ?>