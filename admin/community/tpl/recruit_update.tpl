<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_recruit_process.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ac" value="update_recruit">
	<input type="hidden" name="id" value="{{T_ID}}">
    <input type="hidden" name="ac_id" value="{{T_AD_COMPANY_ID}}">
	<input type="hidden" name="h_logo_image_url" value="{{H_LOGO_IMAGE_URL}}">
	<input type="hidden" name="h_main_image_url" value="{{H_MAIN_IMAGE_URL}}">
	<input type="hidden" name="h_main_image_background_url" value="{{H_MAIN_IMAGE_BACKGROUND_URL}}">
	<input type="hidden" name="h_sub_image_01_url" value="{{H_SUB_IMAGE_01_URL}}">
	<input type="hidden" name="h_sub_image_02_url" value="{{H_SUB_IMAGE_02_URL}}">
	<input type="hidden" name="h_sub_image_03_url" value="{{H_SUB_IMAGE_03_URL}}">
	<input type="hidden" name="h_sub_image_04_url" value="{{H_SUB_IMAGE_04_URL}}">
	<input type="hidden" name="h_sub_image_05_url" value="{{H_SUB_IMAGE_05_URL}}">

	<div class="row mt-2">
		<div class="col">

			<!-- 회사 배너 -->
			<div class="detail-card">
				<div class="detail-company-banner">
					<div class="detail-company-avatar">수</div>
					<div>
						<div class="detail-company-name">구인구직 수정</div>
						<div class="detail-company-meta">구인구직 수정화면입니다.</div>
					</div>
				</div>
				<!-- 광고레벨 -->
				<div style="padding: 14px 24px; border-bottom: 1px solid #f0f2f8;">
					<div style="font-size:11px; font-weight:700; color:#0f766e; text-transform:uppercase; letter-spacing:1px; margin-bottom:10px;">광고레벨</div>
                    <div>                                                
                        <div class="adlevel-row">
                            <select class="detail-form-control" name="advertising_level"
                                    id="advertising_level">
                                {{SELECT_ADVERTISING_LEVEL}}
                            </select>                            
                        </div>
                        

                    </div>
					<div id="result_advertising_level">
						<!--div class="adlevel-row" id="adlevel_row_new">
							<button type="button" class="adlevel-add-btn" onclick="ADD_ADVERTISING_LEVEL()">+ 추가</button>
						</div-->
						<!-- LOOP START 'T_LOOP' -->
						<div class="adlevel-row" id="div_advertising_level_{{T_LOOP.T_NO}}">							
							<select class="detail-form-control" name="job_type_{{T_LOOP.T_NO}}" id="job_type_{{T_LOOP.T_NO}}">
								{{T_LOOP.T_JOB_TYPE}}
							</select>
							<!--button type="button" class="adlevel-delete-btn" onclick="DEL_ADVERTISING_LEVEL('{{T_LOOP.T_NO}}')">삭제</button-->
						</div>
						<!-- LOOP END 'T_LOOP' -->

					</div>
				</div>
			</div>

			<!-- 기본 정보 -->
			<div class="detail-card">
				<div class="detail-section-label">기본 정보</div>
				<div class="detail-grid">
					<div class="detail-field">
						<div class="detail-field-label">현재상태</div>
						<select class="detail-form-control" name="is_active" id="is_active">
							{{SELECT_IS_ACTIVE}}
						</select>
					</div>
                    <div class="detail-field">
                        <div class="detail-field-label">승인상태</div>
                        <select class="detail-form-control" name="is_approved" id="is_approved">
                            {{SELECT_IS_APPROVED}}
                        </select>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">수정가능여부</div>
                        <select class="detail-form-control" name="is_modify_yn" id="is_modify_yn">
                                {{SELECT_IS_MODIFY_YN}}
                            </select>                    
                    </div>
					<div class="detail-field">
						<div class="detail-field-label">제목</div>
						<input type="text" class="detail-form-control" name="title" id="title" value="{{T_TITLE}}">
					</div>
					<!--div class="detail-field">
						<div class="detail-field-label">소제목</div>
						<input type="text" class="detail-form-control" name="subtitle" id="subtitle" value="{{T_SUBTITLE}}">
					</div-->
                    <!-- LOOP START 'T_SC' -->                      
                    <div class="detail-field full" style="display: flex; flex-direction: column; gap: 5px;">                    
                        <div class="detail-field-label" style="font-weight: bold;">주 / 도시</div>                        
                        <div class="detail-input-group" style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">    
                            <input type="hidden" name="loc_sub_id[{{T_SC.T_NUM}}]" value="{{T_SC.T_LOC_SUB_ID}}">                        
                            <select class="detail-form-control" name="state_code[{{T_SC.T_NUM}}]" id="state_code_{{T_SC.T_NUM}}" onchange="GET_CITY_NAME({{T_SC.T_NUM}});" style="width: auto;">
                                {{T_SC.T_SELECT_STATE_CODE}}
                            </select>
                            
                            <select class="detail-form-control" name="city_name[{{T_SC.T_NUM}}]" id="city_name_{{T_SC.T_NUM}}" style="width: auto;">
                                {{T_SC.T_SELECT_CITY_NAME}}
                            </select>
                        
                        </div>
                    </div>               
                    <!-- LOOP END 'T_SC' -->
					<div class="detail-field">
						<div class="detail-field-label">조회수</div>
						<div class="detail-readonly-value">{{T_VIEW_COUNT}}</div>
					</div>
					<div class="detail-field full">
						<div class="detail-field-label">구인내용</div>
						<textarea class="detail-form-control" rows="12" maxlength="2000" name="job_opening_information" id="job_opening_information">{{T_JOB_OPENING_INFORMATION}}</textarea>
					</div>
				</div>
			</div>

			<!-- 담당자 정보 -->
			<div class="detail-card">
				<div class="detail-section-label">담당자 정보</div>
				<div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">회사명</div>
                        <input type="text" class="detail-form-control" name="company_name" id="company_name" value="{{T_COMPANY_NAME}}" readonly>
                    </div>
					<div class="detail-field">
						<div class="detail-field-label">담당자</div>
						<input type="text" class="detail-form-control" name="contact_name" id="contact_name" value="{{T_CONTACT_NAME}}">
					</div>
					<div class="detail-field">
						<div class="detail-field-label">이메일</div>
						<input type="text" class="detail-form-control" name="contact_email" id="contact_email" value="{{T_CONTACT_EMAIL}}">
					</div>
					<div class="detail-field" style="border-bottom:none;">
						<div class="detail-field-label">연락처</div>
						<input type="text" class="detail-form-control" name="contact_phone" id="contact_phone" value="{{T_CONTACT_PHONE}}">
					</div>
					<div class="detail-field" style="border-bottom:none;">
						<div class="detail-field-label">광고주 노트</div>
						<textarea class="detail-form-control" rows="4" maxlength="140" readonly>{{T_ADVERTISER_NOTES}}</textarea>
					</div>
				</div>
			</div>

			<!-- 관리 정보 -->
			<div class="detail-card">
				<div class="detail-section-label">관리 정보</div>
				<div class="detail-grid">
					<div class="detail-field">
						<div class="detail-field-label">등록자</div>
						<div class="detail-readonly-value">{{T_CREATED_USER}}</div>
					</div>
					<div class="detail-field">
						<div class="detail-field-label">등록일</div>
						<div class="detail-readonly-value">{{T_CREATED_AT}}</div>
					</div>
					<div class="detail-field">
						<div class="detail-field-label">등록 IP</div>
						<div class="detail-readonly-value">{{T_IP_ADDRESS}}</div>
					</div>
					<div class="detail-field" style="border-bottom:none;">
						&nbsp;
					</div>
					<div class="detail-field full" style="border-bottom:none;">
						<div class="detail-field-label">관리자 노트</div>
						<textarea class="detail-form-control" rows="4" maxlength="140" name="internal_notes" id="internal_notes">{{T_INTERNAL_NOTES}}</textarea>
					</div>
				</div>
			</div>

			<!-- 이미지 -->
			<div class="detail-card">
				<div class="detail-section-label">이미지</div>
				<div class="detail-grid">
					<div class="detail-field">
						<div class="detail-field-label">로고 이미지</div>
						<div class="nimg">{{T_LOGO_IMAGE_URL}} {{T_DEL_LOGO_IMAGE_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="logo_image_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>Platinum:500 x 184, Gold:300 x 82, 이미지는 jpg, png, gif만 가능
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
					<!--div class="detail-field">
						<div class="detail-field-label">로고 위치</div>
						<select class="detail-form-control" name="logo_position" id="logo_position">
							<option>상단</option>
							<option>Option 2</option>
							<option>Option 3</option>
						</select>
					</div-->
					<!--div class="detail-field">
						<div class="detail-field-label">메인 이미지</div>
						<div class="bimg">{{T_MAIN_IMAGE_URL}} {{T_DEL_MAIN_IMAGE_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="main_image_url">
                                </span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div-->
					<!--div class="detail-field">
						<div class="detail-field-label">배경 이미지</div>
						<div class="bimg">{{T_MAIN_IMAGE_BACKGROUND_URL}} {{T_DEL_MAIN_IMAGE_BACKGROUND_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="main_image_background_url">
                                </span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div-->
					<div class="detail-field">
						<div class="detail-field-label">본문 추가 이미지</div>
						<div>{{T_SUB_IMAGE_01_URL}} {{T_DEL_SUB_IMAGE_01_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_01_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
					<div class="detail-field">
						<div class="detail-field-label">본문 추가 이미지</div>
						<div>{{T_SUB_IMAGE_02_URL}} {{T_DEL_SUB_IMAGE_02_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_02_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
					<div class="detail-field">
						<div class="detail-field-label">본문 추가 이미지</div>
						<div>{{T_SUB_IMAGE_03_URL}} {{T_DEL_SUB_IMAGE_03_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_03_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
					<div class="detail-field">
						<div class="detail-field-label">본문 추가 이미지</div>
						<div>{{T_SUB_IMAGE_04_URL}} {{T_DEL_SUB_IMAGE_04_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_04_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
					<div class="detail-field" style="border-bottom:none;">
						<div class="detail-field-label">본문 추가 이미지</div>
						<div>{{T_SUB_IMAGE_05_URL}} {{T_DEL_SUB_IMAGE_05_URL}}</div>
						<div class="fileupload fileupload-new mt-1" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input"><i class="fas fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
								<span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>
                                    <input type="file" name="sub_image_05_url" accept=".jpg, .jpeg, .png, .gif" >
                                </span>가로894x세로는 1000이내, 이미지는 jpg, png, gif만 가능
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>


			



						<div class="row mt-2">
							<div class="col-12 col-md-auto">
								<a href="recruit_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
							</div>
							
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-save text-4 me-2"></i> 수정완료
								</button>
							</div>
						</div>
			</form>

<script>

	var g_num = {{G_NUM}};
</script>
<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/recruit_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
