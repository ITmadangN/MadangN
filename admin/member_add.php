<?php 
$main="1";
$sub="1";
$mtitle="사용자";
$stitle="사용자관리";
$ytitle="회원추가";
require_once 'header.php'; 
?>
				

                 
                 <form name="" action="" method="post">
                 	<div class="row mt-2">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-user"></i>
												<h2 class="card-big-info-title">회원추가</h2>
												<p class="card-big-info-desc">회원 정보를 정확히 입력하세요!</p>
											
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">이름</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">업체명</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control" name="">

													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">권한</label>
													<div class="col-lg-7 col-xl-6">
													  <select class="form-control mb-3" name="">
													    <option>선택</option>
														<option>Platinum</option>
														<option>Option 2</option>
														<option>Option 3</option>
													  </select>
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">체크박스</label>
													<div class="col-lg-7 col-xl-6">
														<div class="checkbox-custom checkbox-default">
																<input type="checkbox" checked="" id="checkboxExample1">
																<label for="checkboxExample1">Checkbox Default</label>
															</div>
															<div class="checkbox-custom checkbox-primary">
																<input type="checkbox" checked="" id="checkboxExample2">
																<label for="checkboxExample2">Checkbox Primary</label>
															</div>
															<div class="checkbox-custom checkbox-success">
																<input type="checkbox" checked="" id="checkboxExample3">
																<label for="checkboxExample3">Checkbox Success</label>
															</div>
															<div class="checkbox-custom checkbox-warning">
																<input type="checkbox" checked="" id="checkboxExample4">
																<label for="checkboxExample4">Checkbox Warning</label>
															</div>
															<div class="checkbox-custom checkbox-danger">
																<input type="checkbox" checked="" id="checkboxExample5">
																<label for="checkboxExample5">Checkbox Danger</label>
															</div>
															<div class="checkbox-custom">
																<input type="checkbox" disabled="">
																<label>Checkbox Disabled</label>
															</div>
															<div class="checkbox-custom">
																<input type="checkbox" disabled="" checked="">
																<label>Checked &amp; Disabled</label>
															</div>
													</div>
												</div>

												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">radio</label>
													<div class="col-lg-7 col-xl-6">
														<div class="radio-custom">
																<input type="radio" id="radioExample1" name="radioExample">
																<label for="radioExample1">Radio Default</label>
															</div>
															<div class="radio-custom radio-primary">
																<input type="radio" id="radioExample2" name="radioExample">
																<label for="radioExample2">Radio Primary</label>
															</div>
															<div class="radio-custom radio-success">
																<input type="radio" id="radioExample3" name="radioExample">
																<label for="radioExample3">Radio Success</label>
															</div>
															<div class="radio-custom radio-warning">
																<input type="radio" id="radioExample4" name="radioExample">
																<label for="radioExample4">Radio Warning</label>
															</div>
															<div class="radio-custom radio-danger">
																<input type="radio" id="radioExample5" name="radioExample">
																<label for="radioExample5">Radio Danger</label>
															</div>
															<div class="radio-custom">
																<input type="radio" disabled="">
																<label>Radio Disabled</label>
															</div>
															<div class="radio-custom">
																<input type="radio" disabled="" checked="">
																<label>Checked &amp; Disabled</label>
															</div>
													</div>
                                                 </div>


												
											
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 text-gray">프로필이미지</label>
													<div class="col-lg-7 col-xl-6 nimg">
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
													
												
												
												
											</div>
										</div>
									</div>
								</section>
							</div>
                         </div>



			



						<div class="row mt-2">
							<div class="col-12 col-md-auto">
								<a href="community/comm_01.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
							</div>
							
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-save text-4 me-2"></i> 저장하기
								</a>
							</div>
						</div>
			</form>



		              <div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Select Replacement</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered" action="#">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Basic select</label>
												<div class="col-lg-6">
													<select data-plugin-selectTwo class="form-control populate">
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="OR">Oregon</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="ID">Idaho</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NM">New Mexico</option>
															<option value="ND">North Dakota</option>
															<option value="UT">Utah</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="IL">Illinois</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="OK">Oklahoma</option>
															<option value="SD">South Dakota</option>
															<option value="TX">Texas</option>
															<option value="TN">Tennessee</option>
															<option value="WI">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="IN">Indiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="OH">Ohio</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Multi-Value Select</label>
												<div class="col-lg-6">
													<select multiple data-plugin-selectTwo class="form-control populate">
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="OR">Oregon</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="ID">Idaho</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NM">New Mexico</option>
															<option value="ND">North Dakota</option>
															<option value="UT">Utah</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="IL">Illinois</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="OK">Oklahoma</option>
															<option value="SD">South Dakota</option>
															<option value="TX">Texas</option>
															<option value="TN">Tennessee</option>
															<option value="WI">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="IN">Indiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="OH">Ohio</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Placeholders </label>
												<div class="col-lg-6">
													<select data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Select a State", "allowClear": true }'>
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="OR">Oregon</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="ID">Idaho</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NM">New Mexico</option>
															<option value="ND">North Dakota</option>
															<option value="UT">Utah</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="IL">Illinois</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="OK">Oklahoma</option>
															<option value="SD">South Dakota</option>
															<option value="TX">Texas</option>
															<option value="TN">Tennessee</option>
															<option value="WI">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="IN">Indiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="OH">Ohio</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
												</div>
											</div>
											<div class="form-group row pb-2">
												<label class="col-lg-3 control-label text-lg-end pt-2">Minimum Input</label>
												<div class="col-lg-6">
													<select data-plugin-selectTwo class="form-control populate" data-plugin-options='{ "minimumInputLength": 2 }'>
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="OR">Oregon</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="ID">Idaho</option>
															<option value="MT">Montana</option><option value="NE">Nebraska</option>
															<option value="NM">New Mexico</option>
															<option value="ND">North Dakota</option>
															<option value="UT">Utah</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="IL">Illinois</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="OK">Oklahoma</option>
															<option value="SD">South Dakota</option>
															<option value="TX">Texas</option>
															<option value="TN">Tennessee</option>
															<option value="WI">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="IN">Indiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="OH">Ohio</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Multi-select</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered" action="#">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Basic Multi-select</label>
												<div class="col-lg-6">
													<select class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' id="ms_example0">
														<option value="cheese">Cheese</option>
														<option value="tomatoes" selected>Tomatoes</option>
														<option value="mozarella" selected>Mozzarella</option>
														<option value="mushrooms">Mushrooms</option>
														<option value="pepperoni">Pepperoni</option>
														<option value="onions">Onions</option>
													</select>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Basic Multi-select (Only One)</label>
												<div class="col-lg-6">
													<select class="form-control" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' id="ms_example1">
														<option value="cheese" selected>Cheese</option>
														<option value="tomatoes">Tomatoes</option>
														<option value="mozarella">Mozzarella</option>
														<option value="mushrooms">Mushrooms</option>
														<option value="pepperoni">Pepperoni</option>
														<option value="onions">Onions</option>
													</select>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">With Preselected Options</label>
												<div class="col-lg-6">
													<select class="form-control" multiple="multiple" data-plugin-options='{ "maxHeight": 200 }' data-plugin-multiselect id="ms_example2">
														<option value="cheese" selected>Cheese</option>
														<option value="tomatoes" selected>Tomatoes</option>
														<option value="mozarella" selected>Mozzarella</option>
														<option value="mushrooms">Mushrooms</option>
														<option value="pepperoni">Pepperoni</option>
														<option value="onions">Onions</option>
													</select>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Link button</label>
												<div class="col-lg-6">
													<select class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "buttonClass": "btn btn-link ps-0 pe-0" }' id="ms_example3">
														<option value="cheese">Cheese</option>
														<option value="tomatoes">Tomatoes</option>
														<option value="mozarella">Mozzarella</option>
														<option value="mushrooms">Mushrooms</option>
														<option value="pepperoni">Pepperoni</option>
														<option value="onions">Onions</option>
													</select>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">With icon</label>
												<div class="col-lg-6">
													<div class="input-group input-group-select-append">
														<span class="input-group-text">
															<i class="fas fa-th-list"></i>
														</span>
														<select class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' id="ms_example4">
															<option value="cheese">Cheese</option>
															<option value="tomatoes">Tomatoes</option>
															<option value="mozarella">Mozzarella</option>
															<option value="mushrooms">Mushrooms</option>
															<option value="pepperoni">Pepperoni</option>
															<option value="onions">Onions</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Select All Option</label>
												<div class="col-lg-6">
													<select class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "includeSelectAllOption": true }' id="ms_example5">
														<optgroup label="Mathematics">
															<option value="analysis">Analysis</option>
															<option value="algebra">Linear Algebra</option>
															<option value="discrete">Discrete Mathematics</option>
															<option value="numerical">Numerical Analysis</option>
															<option value="probability">Probability Theory</option>
														</optgroup>
														<optgroup label="Computer Science">
															<option value="programming">Introduction to Programming</option>
															<option value="automata">Automata Theory</option>
															<option value="complexity">Complexity Theory</option>
															<option value="software">Software Engineering</option>
														</optgroup>
													</select>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">With Search</label>
												<div class="col-lg-6">
													<select class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "enableCaseInsensitiveFiltering": true }' id="ms_example6">
														<optgroup label="Mathematics">
															<option value="analysis">Analysis</option>
															<option value="algebra">Linear Algebra</option>
															<option value="discrete">Discrete Mathematics</option>
															<option value="numerical">Numerical Analysis</option>
															<option value="probability">Probability Theory</option>
														</optgroup>
														<optgroup label="Computer Science">
															<option value="programming">Introduction to Programming</option>
															<option value="automata">Automata Theory</option>
															<option value="complexity">Complexity Theory</option>
															<option value="software">Software Engineering</option>
														</optgroup>
													</select>
												</div>
											</div>
											<div class="form-group row pb-2">
												<label class="col-lg-3 control-label text-lg-end pt-2">Toggle All Button</label>
												<div class="col-lg-6">
													<div class="btn-group">
														<select class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' data-multiselect-toggle-all="true" id="ms_example7">
															<option value="cheese">Cheese</option>
															<option value="tomatoes">Tomatoes</option>
															<option value="mozarella">Mozzarella</option>
															<option value="mushrooms">Mushrooms</option>
															<option value="pepperoni">Pepperoni</option>
															<option value="onions">Onions</option>
														</select>
													</div>
													<div class="btn-group me-2">
														<button id="ms_example7-toggle" class="btn btn-primary ms-2">Select All</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Tag Autocomplete</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered form-bordered">
											<div class="form-group row pb-3">
												<label for="tags-input" class="col-lg-3 control-label text-lg-end pt-2">Input Tags</label>
												<div class="col-lg-7">
													<input name="tags" id="tags-input" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" value="Amsterdam,Washington,Sydney,Beijing" />
													<p>
														Just add <code>data-role="tagsinput"</code> to your input field to automatically change it to a tags input field.
													</p>
												</div>
											</div>
											<div class="form-group row pb-2">
												<label for="tags-input-multiple" class="col-lg-3 control-label text-lg-end pt-2">True multi value</label>
												<div class="col-lg-7">
													<select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="badge badge-primary">
														<option value="Amsterdam">Amsterdam</option>
														<option value="Washington">Washington</option>
														<option value="Sydney">Sydney</option>
														<option value="Beijing">Beijing</option>
													</select>
													<p>
														Use a <code>&lt;select multiple /&gt;</code> as your input element for a tags input, to gain true multivalue support. Instead of a comma separated string, the values will be set in an array. Existing <code>&lt;option /&gt;</code> elements will automatically be set as tags. This makes it also possible to create tags containing a comma.
													</p>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Toggle Switches</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2 col-lg-3">Large</label>
												<div class="col-lg-9">
													<div class="switch switch-lg switch-primary">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-lg switch-success">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-lg switch-warning">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-lg switch-danger">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-lg switch-info">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-lg switch-dark">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2 col-lg-3">Default</label>
												<div class="col-lg-9">
													<div class="switch switch-primary">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-success">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-warning">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-danger">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-info">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-dark">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
												</div>
											</div>
											<div class="form-group row pb-2">
												<label class="col-lg-3 control-label text-lg-end pt-2 col-lg-3">Small</label>
												<div class="col-lg-9">
													<div class="switch switch-sm switch-primary">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-sm switch-success">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-sm switch-warning">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-sm switch-danger">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-sm switch-info">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
													<div class="switch switch-sm switch-dark">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Slider Range</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">One Value</label>
												<div class="col-lg-6">
													<div class="m-md slider-primary" data-plugin-slider data-plugin-options='{ "value": 50, "range": "min", "max": 100 }' data-plugin-slider-output="#listenSlider" data-plugin-slider-link-values-to="#priceRangeValues1">
														<input id="listenSlider" type="hidden" value="50" />
													</div>
													<p id="priceRangeValues1" class="price-range-values">The current <code>value</code> is: <b class="min">50</b></p>
												</div>
											</div>
											<div class="form-group row pb-2">
												<label class="col-lg-3 control-label text-lg-end pt-2">Range</label>
												<div class="col-lg-6">
													<div class="m-md slider-primary" data-plugin-slider data-plugin-options='{ "half_values": true, "values": [ 25, 75 ], "range": true, "max": 100 }' data-plugin-slider-output="#listenSlider2" data-plugin-slider-link-values-to="#priceRangeValues2">
														<input id="listenSlider2" type="hidden" value="25, 75" />
													</div>
													<p id="priceRangeValues2" class="price-range-values">The <code>min</code> is: <b class="min">25</b> and the <code>max</code> is: <b class="max">75</b></p>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Spinners</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered" action="#">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Default Spinner</label>
												<div class="col-lg-6">
													<div data-plugin-spinner>
														<div class="input-group form-control-small">
															<input type="text" class="spinner-input form-control" readonly="readonly">
															<div class="spinner-buttons input-group-btn btn-group-vertical">
																<button type="button" class="btn spinner-up btn-xs btn-default">
																	<i class="fas fa-angle-up"></i>
																</button>
																<button type="button" class="btn spinner-down btn-xs btn-default">
																	<i class="fas fa-angle-down"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Disabled</label>
												<div class="col-lg-6">
													<div data-plugin-spinner data-plugin-options='{ "disabled": true }'>
														<div class="input-group form-control-small">
															<input type="text" class="spinner-input form-control" maxlength="3" readonly>
															<div class="spinner-buttons input-group-btn btn-group-vertical">
																<button type="button" class="btn spinner-up btn-xs">
																	<i class="fas fa-angle-up"></i>
																</button>
																<button type="button" class="btn spinner-down btn-xs">
																	<i class="fas fa-angle-down"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Horizontal buttons</label>
												<div class="col-lg-6">
													<div data-plugin-spinner data-plugin-options='{ "value":0, "min": 0, "max": 10 }'>
														<div class="input-group" style="width:150px;">
															<input type="text" class="spinner-input form-control" maxlength="3" readonly>
															<div class="btn-group">
																<button type="button" class="btn btn-default spinner-up">
																	<i class="fas fa-angle-up"></i>
																</button>
															</div>
															<div class="btn-group">
																<button type="button" class="btn btn-default spinner-down">
																	<i class="fas fa-angle-down"></i>
																</button>
															</div>
														</div>
													</div>
													<p>
														with <code>max</code> value set to 10
													</p>
												</div>
											</div>
											<div class="form-group row pb-2">
												<label class="col-lg-3 control-label text-lg-end pt-2">Alternative</label>
												<div class="col-lg-6">
													<div data-plugin-spinner data-plugin-options='{ "value":0, "step": 5, "min": 0, "max": 200 }'>
														<div class="input-group">
															<button type="button" class="btn btn-default spinner-up">
																<i class="fas fa-plus"></i>
															</button>
															<input type="text" class="spinner-input form-control" maxlength="3" readonly>
															<button type="button" class="btn btn-default spinner-down">
																<i class="fas fa-minus"></i>
															</button>
														</div>
													</div>
													<p>
														with <code>step</code> set to 5
													</p>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Masked Inputs</h2>
										<p class="card-subtitle">
											Input masks allows a user to more easily enter fixed width input where you would like them to enter the data in a certain format (dates,phones, etc).
										</p>
									</header>
									<div class="card-body">
										<div class="form-body">
											<form class="form-horizontal form-bordered">
												<div class="form-group row pb-3">
													<label class="col-lg-3 control-label text-lg-end pt-2">Date</label>
													<div class="col-lg-6">
														<div class="input-group">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input id="date" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group row pb-3">
													<label class="col-lg-3 control-label text-lg-end pt-2">Phone</label>
													<div class="col-lg-6">
														<div class="input-group">
															<span class="input-group-text">
																<i class="fas fa-phone"></i>
															</span>
															<input id="phone" data-plugin-masked-input data-input-mask="(999) 999-9999" placeholder="(123) 123-1234" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group row pb-3">
													<label class="col-lg-3 control-label text-lg-end pt-2">Product Key</label>
													<div class="col-lg-6">
														<div class="input-group">
															<span class="input-group-text">
																<i class="fas fa-tag"></i>
															</span>
															<input id="product-key" data-plugin-masked-input data-input-mask="(aa) 99-999" placeholder="(ab) 12-123" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group row pb-3">
													<label class="col-lg-3 control-label text-lg-end pt-2" for="fc_inputmask_1">SSN</label>
													<div class="col-lg-6">
														<div class="input-group">
															<span class="input-group-text">
																<i class="fas fa-plus"></i>
															</span>
															<input id="fc_inputmask_1" data-plugin-masked-input data-input-mask="999-99-9999" placeholder="___-__-____" class="form-control">
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Date Picker</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Default Datepicker</label>
												<div class="col-lg-6">
													<div class="input-group">
														<span class="input-group-text">
															<i class="fas fa-calendar-alt"></i>
														</span>
														<input type="text" data-plugin-datepicker class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Date range</label>
												<div class="col-lg-6">
													<div class="input-daterange input-group" data-plugin-datepicker>
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
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Multiple dates</label>
												<div class="col-lg-6">
													<div class="input-group">
														<span class="input-group-text">
															<i class="fas fa-calendar-alt"></i>
														</span>
														<input type="text" data-plugin-datepicker data-plugin-options='{ "multidate": true }' class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Inline</label>
												<div class="col-lg-3">
													<div data-plugin-datepicker data-plugin-skin="primary">
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Time Pickers</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Default Time Picker</label>
												<div class="col-lg-6">
													<div class="input-group">
														<span class="input-group-text">
															<i class="far fa-clock"></i>
														</span>
														<input type="text" data-plugin-timepicker class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">24 Hour Mode Time Picker</label>
												<div class="col-lg-6">
													<div class="input-group">
														<span class="input-group-text">
															<i class="far fa-clock"></i>
														</span>
														<input type="text" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
													</div>
												</div>
											</div>
											<div class="form-group row pb-2">
												<label class="col-lg-3 control-label text-lg-end pt-2">Specify a step for the minute field</label>
												<div class="col-lg-6">
													<div class="input-group">
														<span class="input-group-text">
															<i class="far fa-clock"></i>
														</span>
														<input type="text" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 15 }'>
													</div>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">Color Pickers</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered" action="#">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Default</label>
												<div class="col-lg-6">
													<input class="border-0 mt-1" type="color" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#0088cc">
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">MaxLength Control</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered form-bordered" action="#">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="textareaDefault">Input</label>
												<div class="col-lg-6">
													<input class="form-control" data-plugin-maxlength maxlength="20" />
													<p>
														<code>max-length</code> set to 20.
													</p>
												</div>
											</div>
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="textareaDefault">Textarea</label>
												<div class="col-lg-6">
													<textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140"></textarea>
													<p>
														<code>max-length</code> set to 140.
													</p>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">File Upload Drag'n Drop</h2>
									</header>
									<div class="card-body">
										<form action="https://www.okler.net/upload" class="dropzone dz-square" id="dropzone-example"></form>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
										<h2 class="card-title">WYSIWYG Editors</h2>
									</header>
									<div class="card-body">
										<form class="form-horizontal form-bordered">
											<div class="form-group row pb-3">
												<label class="col-lg-3 control-label text-lg-end pt-2">Summernote</label>
												<div class="col-lg-9">
													<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180 }'><p>Start typing...</p></div>
												</div>
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
				
					<!-- end: page -->
				</section>
			</div>
			</div>
	
					
			

<?php require_once 'footer.php'; ?>