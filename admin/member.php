<?php 
$main="1";
$sub="1";
$mtitle="사용자";
$stitle="사용자관리";
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
															<option value="all" selected>회원아이디</option>
															<option value="1">이름</option>
															<option value="2">업체명</option>
															<option value="3">연락처</option>
															
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
													<th width="10%">이름</th>
													<th width="/">업체명</th>
													<th width="10%">권한</th>
													<th width="15%">이메일</th>
													<th width="15%">연락처</th>
													<th width="15%">등록일</th>
													<th width="15%">현재상태</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>7</td>
													<td><a href="member_modify.php"><strong>이기동</strong></a></td>
													<td>mandangn</td>
													<td>운영자</td>
													<td>madangn@gmail.com</td>
													<td>010-2222-3333</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status completed">Active</span></td>
												</tr>
												<tr>
													<td>6</td>
													<td><a href="member_modify.php"><strong>이기동</strong></a></td>
													<td>mandangn</td>
													<td>운영자</td>
													<td>madangn@gmail.com</td>
													<td>010-2222-3333</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status on-hold">Inactive</span></td>
												</tr>
												<tr>
													<td>5</td>
													<td><a href="member_modify.php"><strong>이기동</strong></a></td>
													<td>mandangn</td>
													<td>운영자</td>
													<td>madangn@gmail.com</td>
													<td>010-2222-3333</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status pending">Inactive</span></td>
												</tr>
												<tr>
													<td>4</td>
													<td><a href="member_modify.php"><strong>이기동</strong></a></td>
													<td>mandangn</td>
													<td>운영자</td>
													<td>madangn@gmail.com</td>
													<td>010-2222-3333</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status active">Inactive</span></td>
												</tr>
												<tr>
													<td>3</td>
													<td><a href="member_modify.php"><strong>이기동</strong></a></td>
													<td>mandangn</td>
													<td>운영자</td>
													<td>madangn@gmail.com</td>
													<td>010-2222-3333</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status no-active">Inactive</span></td>
												</tr>
												<tr>
													<td>2</td>
													<td><a href="member_modify.php"><strong>이기동</strong></a></td>
													<td>mandangn</td>
													<td>운영자</td>
													<td>madangn@gmail.com</td>
													<td>010-2222-3333</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status refunded">Inactive</span></td>
												</tr>
												<tr>
													<td>1</td>
													<td><a href="member_modify.php"><strong>이기동</strong></a></td>
													<td>mandangn</td>
													<td>운영자</td>
													<td>madangn@gmail.com</td>
													<td>010-2222-3333</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status failed">Inactive</span></td>
												</tr>
										
								
											</tbody>
										</table>
										<hr class="solid mt-5 opacity-4">
										<div class="datatable-footer">
											<div class="row align-items-center justify-content-between mt-3">
												<div class="col-md-auto order-1 mb-3 mb-lg-0">
													<div class="d-flex align-items-stretch">
														<div class="d-grid gap-3 me-2">
															<a href="member_add.php" class="btn btn-danger btn-md font-weight-semibold btn-py-2 px-4">+ 회원추가</a>
														</div>
														<div class="d-grid gap-3 me-2">
															<a href="member_add.php" class="btn btn-warning btn-md font-weight-semibold btn-py-2 px-4">+ 회원추가</a>
														</div>
														<div class="d-grid gap-3 me-2">
															<a href="member_add.php" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ 회원추가</a>
														</div>
														<div class="d-grid gap-3 me-2">
															<a href="member_add.php" class="btn btn-success btn-md font-weight-semibold btn-py-2 px-4">+ 회원추가</a>
														</div>
														<div class="d-grid gap-3">
															<a href="member_add.php" class="btn btn-dark btn-md font-weight-semibold btn-py-2 px-4">+ 회원추가</a>
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