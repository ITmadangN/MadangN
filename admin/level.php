<?php 
$main="7";
$sub="2";
$mtitle="Setting";
$stitle="권한설정";
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
															<option value="all" selected>권한그룹</option>
															<option value="1">level1</option>
															<option value="2">level2</option>
															<option value="3">level3</option>
															
														</select>
                                                       </div>
													  <div class="me-2">
                                                         <select class="form-control select-style-1" name="">
															<option value="all" selected>구분</option>
															<option value="1">level1</option>
															<option value="2">level2</option>
															<option value="3">level3</option>
															
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
													<th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th>
													<th width="8%">번호</th>
													<th width="/">권한그룹</th>
													<th width="15%">아이디</th>
													<th width="15%">이름</th>
													<th width="15%">등록일</th>
													<th width="15%">현재상태</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
													<td>3</td>
													<td><a href="level_modify.php"><strong>Master group</strong></a></td>
													<td>mandangn</td>
													<td>황진희</td>
													<td>2017.11.30</td>
													<td><span class="ecommerce-status completed">Active</span></td>
												</tr>
												<tr>
													<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
													<td>3</td>
													<td><a href="level_modify.php"><strong>Youtube group</strong></a></td>
													<td>youtube_admin</td>
													<td>박경원</td>
													<td>2022.05.22</td>
													<td><span class="ecommerce-status on-hold">Inactive</span></td>
												</tr>
												<tr>
													<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
													<td>3</td>
													<td><a href="level_modify.php"><strong>Youtube group</strong></a></td>
													<td>youtube_admin</td>
													<td>박경원</td>
													<td>2022.05.22</td>
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
															<a href="level_add.php" class="btn btn-danger btn-md font-weight-semibold btn-py-2 px-4">+ 권한추가</a>
															
														</div>
													</div>
												</div>
												
												<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
													<div class="pagination-wrapper"><div class="dataTables_paginate paging_simple_numbers" id="datatable-ecommerce-list_paginate"><ul class="pagination pagination-modern pagination-modern-spacing justify-content-center"><li class="paginate_button page-item previous disabled" id="datatable-ecommerce-list_previous"><a aria-controls="datatable-ecommerce-list" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="fas fa-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-ecommerce-list" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="datatable-ecommerce-list_next"><a href="#" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="fas fa-chevron-right"></i></a></li></ul></div></div>
												</div>
											</div>
										</div>
									</table>
								</div>
							</div>
						</div>
					</div>
				
				
					
			
			

<?php require_once 'footer.php'; ?>