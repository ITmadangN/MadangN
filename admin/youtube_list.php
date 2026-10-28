<?php 
$main="3";
$sub="1";
$mtitle="유튜브";
$stitle="재생목록 관리";
require_once 'header.php'; 
?>
				

	
				     <div class="row">
						<div class="col">
							<div class="card card-modern">
								<div class="card-body">
									<div class="datatables-header-footer-wrapper">
										<div class="datatable-header">
										  <form name="" action="">
											<div class="row align-items-center mb-3">
										
												<div class="col-12 col-lg-auto mb-3 mb-lg-0">
												  <div class="d-flex align-items-lg-center flex-column flex-lg-row">
												     <div class="me-2">
														<select class="form-control select-style-1 filter-by " name="filter-by">
															<option value="all" selected>구분</option>
															<option value="1">마당엔</option>
															<option value="2">스푼티비</option>
														</select>
                                                       </div>
													  <div class="me-2">
                                                         <select class="form-control select-style-1" name="">
															<option value="all" selected>카테고리</option>
															<option value="1">madangntv</option>
															<option value="2">재정/보험</option>
															<option value="3">부동산</option>
															<option value="4">ROGG</option>
														  </select>
                                                        </div>
														<div class="me-2">
                                                         <select class="form-control select-style-1" name="">
															<option value="all" selected>항목</option>
															<option value="1">미부리</option>
															<option value="2">보통이 아닌 사람들</option>
															<option value="3">지금 미국!</option>
															<option value="4">시니어 만세</option>
														  </select>
                                                        </div>
														<div class="col-12 col-lg-auto ps-lg-1">
													       <div class="search search-style-1 search-style-1-lg mx-lg-auto">
														       <div class="input-group">
															    <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="검색 키워드를 입려하세요">
															    <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
														      </div>
													       </div>
												        </div>
													</div>
												</div>
												<div class="col-9 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
													<div class="d-flex align-items-lg-center flex-column flex-lg-row">
														<label class="ws-nowrap me-3 mb-0">총 (42)개 [전체 :1/5] 페이지 </label>
														<select class="form-control select-style-1 results-per-page" name="results-per-page">
															<option value="10" selected>10줄 보기</option>
															<option value="24">24줄 보기</option>
															<option value="36">36줄 보기</option>
															<option value="100">100줄 보기</option>
														</select>
													</div>
												</div>
												<div class="col-3 col-lg-auto ps-lg-0 mb-3 mb-lg-0">
													<div class="d-flex align-items-lg-center flex-column flex-lg-row">
														<a href="#" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">이동</a>
													</div>
												</div>
											</div>
										</div>  
									</form>
										<table class="table table-striped mb-0 text-center" style="min-width: 750px;margin-top:20px;">
											<thead>
												<tr>
													<th width="5%">번호</th>
													<th width="8%">썸네일</th>
													<th width="10%">구분</th>
													<th width="10%">중분류</th>
													<th width="10%">소분류</th>
													<th width="/">제목</th>
													<th width="10%">등록일</th>
													<th width="10%">현재상태</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>3</td>
													<td class="timg"><img src="/youtube/images/4.jpg" alt="" /></td>
													<td>마당엔</td>
													<td>madangntv</td>
                                                    <td>미부리</td>
													<td><a href="youtube_view.php"><strong>미국 집값, 이정도면 미국 상위 10%</strong></a></td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status completed">Active</span></td>
												</tr>
												<tr>
													<td>2</td>
													<td class="timg"><img src="/youtube/images/3.jpg" alt="" /></td>
													<td>마당엔</td>
													<td>재정/보험</td>
                                                    <td>미부리</td>
													<td><a href="youtube_view.php"><strong>Uniti & BridgeOne 2025 Florida MDRT 연차총회</strong></a></td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status on-hold">Inactive</span></td>
												</tr>
												<tr>
													<td>1</td>
													<td class="timg"><img src="/youtube/images/2.jpg" alt="" /></td>
													<td>마당엔</td>
													<td>부동산</td>
                                                    <td>미부리</td>
													<td><a href="youtube_view.php"><strong>남가주 플러튼이 뜨고 있다.</strong></a></td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status no-active">Inactive</span></td>
												</tr>
										
								
											</tbody>
										</table>
										<hr class="solid mt-5 opacity-4">
										<div class="datatable-footer">
											<div class="row align-items-center justify-content-between mt-3">
												<div class="col-md-auto order-1 mb-3 mb-lg-0">
													<div class="d-flex align-items-stretch">
														<div class="d-grid gap-3">
															<a href="youtube_write.php" class="btn btn-danger btn-md font-weight-semibold btn-py-2 px-4">+ 동영상 추가</a>
															
														</div>
													</div>
												</div>
												
												<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
													<div class="pagination-wrapper"><div class="dataTables_paginate paging_simple_numbers" id="datatable-ecommerce-list_paginate"><ul class="pagination pagination-modern pagination-modern-spacing justify-content-center"><li class="paginate_button page-item previous disabled" id="datatable-ecommerce-list_previous"><a aria-controls="datatable-ecommerce-list" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="fas fa-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-ecommerce-list" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="datatable-ecommerce-list_next"><a href="#" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="fas fa-chevron-right"></i></a></li></ul></div></div>
												</div>
											</div>
										</div>
								
								</div>
							</div>
						</div>
					</div>
				
				
					
			
			

<?php require_once 'footer.php'; ?>