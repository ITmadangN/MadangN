<?php 
$main="7";
$sub="3";
$mtitle="Setting";
$stitle="공통코드관리";
require_once 'header.php'; 
?>
				



                    <form class="ecommerce-form action-buttons-fixed" action="#" method="post">
						
						<div class="row mt-2">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-barcode"></i>
												<h2 class="card-big-info-title">공통코드관리</h2>
												<p class="card-big-info-desc">공통코드를 추가하세요</p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center mb-3">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">사용자</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="" value="Joy Kim">
													</div>
												</div>
												<div class="form-group row align-items-center mb-3">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">권한그룹</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-control" name="">
														<option>Master Group </option>
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
						<div class="row">
							<div class="col-12 col-md-auto">
								<button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-trash text-4 me-2"></i> 삭제하기
								</button>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="ecommerce-category-list.html" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">취소</a>
							</div>
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-save text-4 me-2"></i> 수정하기
								</a>
							</div>
						</div>
					</form>





	
					
			

<?php require_once 'footer.php'; ?>