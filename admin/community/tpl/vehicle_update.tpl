<!-- INCLUDE FILE '../include/header.php' -->

<link rel="stylesheet" href="../css/iibiz_form.css"/>

<form name="formp" id="formp" action="ajax/ajax_vehicle_process.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="ac" value="update_vehicle">
    <input type="hidden" name="id" value="{{T_ID}}">

    <div class="row mt-2">
        <div class="col">

            <!-- 차량 배너 -->
            <div class="detail-card">
                <div class="detail-company-banner">
                    <div class="detail-company-avatar"></div>
                    <div>
                        <div class="detail-company-name">
                            {{T_CAR_YEAR}} {{T_CAR_MAKER}} {{T_CAR_MODEL}}
                        </div>
                        <div class="detail-company-meta">
                            자동차 매물 수정 정보
                        </div>
                    </div>
                </div>
            </div>


            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>

                <div class="detail-grid">

                    <div class="detail-field">
                        <div class="detail-field-label">소속 딜러</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="company_name"
                                   id="company_name"
                                   value="{{T_COMPANY_NAME}}"
                                   readonly>
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">회원 ID</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="user_id"
                                   id="user_id"
                                   value="{{T_USER_ID}}"
                                   readonly>
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">가격</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="listing_price"
                                   id="listing_price"
                                   value="{{T_LISTING_PRICE}}"
                                   required
                                   >
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">등록일</div>
                        <div class="detail-field-value">
                            {{T_CREATED_AT}}
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">조회수</div>
                        <div class="detail-field-value">
                            {{T_VIEW_COUNT}}
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">상태</div>
                        <div class="detail-field-value">
                            <select class="detail-form-control"
                                    name="is_active"
                                    id="is_active">
                                {{SELECT_IS_ACTIVE}}
                            </select>
                        </div>
                    </div>

                </div>
            </div>


            <!-- 차량 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">차량 정보</div>

                <div class="detail-grid">

                    <div class="detail-field">
                        <div class="detail-field-label">제조사</div>
                        <div class="detail-field-value">
                         <select class="detail-form-control"
                                    name="car_maker"
                                    id="car_maker" required>                            
                                    {{S_SELECT_CAR_MAKER}}
                          </select>           
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">모델</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="car_model"
                                   id="car_model" required
                                   value="{{T_CAR_MODEL}}">
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">연식</div>
                        <div class="detail-field-value">
                         <select class="detail-form-control"
                                    name="car_year"
                                    id="car_year">                            
                                    {{S_SELECT_CAR_YEAR}}
                          </select>   
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">색상</div>
                        <div class="detail-field-value">
                            <select class="detail-form-control"
                                    name="car_color"
                                    id="car_color">                            
                                    {{S_SELECT_CAR_COLOR}}
                          </select>                            
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">주행거리</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="car_mileage"
                                   id="car_mileage"
                                   value="{{T_CAR_MILEAGE}}">
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">사고 이력</div>
                        <div class="detail-field-value">
                          
                            <select class="detail-form-control"
                                    name="car_accident_history"
                                    id="car_accident_history">
                                {{S_SELECT_CAR_ACCIDENT_HISTORY}}
                            </select>
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">연료 종류</div>
                        <div class="detail-field-value">
                            <select class="detail-form-control"
                                    name="fuel_type"
                                    id="fuel_type">
                                {{S_SELECT_FUEL_TYPE}}
                            </select>
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">차체 타입</div>
                        <div class="detail-field-value">
                            <select class="detail-form-control"
                                    name="body_type"
                                    id="body_type">
                                {{S_SELECT_BODY_TYPE}}
                            </select>
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">변속기</div>
                        <div class="detail-field-value">
                            <select class="detail-form-control"
                                    name="transmission"
                                    id="transmission">
                                {{S_SELECT_TRANSMISSION}}
                            </select>
                        </div>
                    </div>

                    <div class="detail-field full">
                        <div class="detail-field-label">옵션 목록</div>
                        <div class="detail-field-value">
                            <textarea class="detail-form-control"
                                      rows="4"
                                      name="options_description"
                                      id="options_description">{{T_OPTIONS_DESCRIPTION}}</textarea>
                        </div>
                    </div>

                    <div class="detail-field full"
                         style="border-bottom:none;">
                        <div class="detail-field-label">차량 설명</div>
                        <div class="detail-field-value">
                            <textarea class="detail-form-control"
                                      rows="8"
                                      maxlength="5000"
                                      name="description"
                                      id="description">{{T_DESCRIPTION}}</textarea>
                        </div>
                    </div>

                </div>
            </div>


            <!-- 위치 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">위치 정보</div>

                <div class="detail-grid">

                    <div class="detail-field">
                        <div class="detail-field-label">주</div>
                        <div class="detail-field-value">
                            <select class="detail-form-control"
                                    name="state_code"
                                    id="state_code"
                                    onchange="GET_CITY_NAME();">
                                {{S_SELECT_STATE_CODE}}
                            </select>
                        </div>
                    </div>

                    <div class="detail-field"
                         style="border-bottom:none;">
                        <div class="detail-field-label">도시</div>
                        <div class="detail-field-value">
                            <select class="detail-form-control"
                                    name="city_name"
                                    id="city_name">
                                {{S_SELECT_CITY_NAME}}
                            </select>
                        </div>
                    </div>

                </div>
            </div>


            <!-- 판매자 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">판매자 정보</div>

                <div class="detail-grid">

                    <div class="detail-field">
                        <div class="detail-field-label">판매자</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="seller_name"
                                   id="seller_name"
                                   value="{{T_SELLER_NAME}}">
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">연락처</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="seller_phone"
                                   id="seller_phone"
                                   value="{{T_SELLER_PHONE}}">
                        </div>
                    </div>

                    <div class="detail-field"
                         style="border-bottom:none;">
                        <div class="detail-field-label">이메일</div>
                        <div class="detail-field-value">
                            <input type="text"
                                   class="detail-form-control"
                                   name="seller_email"
                                   id="seller_email"
                                   value="{{T_SELLER_EMAIL}}">
                        </div>
                    </div>

                </div>
            </div>


            <!-- 관리 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">관리 정보</div>

                <div class="detail-grid">

                    <div class="detail-field">
                        <div class="detail-field-label">등록자</div>
                        <div class="detail-field-value">
                            {{T_CREATED_USER}}
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">등록일</div>
                        <div class="detail-field-value">
                            {{T_CREATED_AT}}
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">수정자</div>
                        <div class="detail-field-value">
                            {{T_UPDATED_USER}}
                        </div>
                    </div>

                    <div class="detail-field">
                        <div class="detail-field-label">수정일</div>
                        <div class="detail-field-value">
                            {{T_UPDATED_AT}}
                        </div>
                    </div>

                    <div class="detail-field"
                         style="border-bottom:none;">
                        <div class="detail-field-label">IP</div>
                        <div class="detail-field-value">
                            {{T_IP_ADDRESS}}
                        </div>
                    </div>

                </div>
            </div>


            <!-- 이미지 -->
            <div class="detail-card">
                <div class="detail-section-label">이미지</div>

                <div class="detail-grid">

                    <!-- LOOP START 'IMAGE_LIST' -->
                                        <div class="detail-field">

                        <div class="detail-field-label">
                            이미지 (순서: {{IMAGE_LIST.T_IMAGE_ORDER}} / 20)
                        </div>

                        <div class="bimg">
                            {{IMAGE_LIST.T_IMAGE_URL}}
                            {{IMAGE_LIST.T_DEL_IMAGE_URL}}
                        </div>

                        <div class="fileupload fileupload-new mt-1"
                             data-provides="fileupload">

                            <div class="input-append">

                                <div class="uneditable-input">
                                    <i class="fas fa-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                </div>

                                <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Upload</span>

                                    <input type="file"
                                           name="image_url_{{IMAGE_LIST.T_IMAGE_ID}}"
                                           accept=".jpg, .jpeg, .png, .gif">
                                </span>

                               가로 928x696, 이미지는 jpg, png, gif 가능

                                <a href="#"
                                   class="btn btn-default fileupload-exists"
                                   data-dismiss="fileupload">
                                    Remove
                                </a>

                            </div>

                        </div>

                    </div>
                    <!-- LOOP END 'IMAGE_LIST' -->


                    <!-- IF START 'NO_IMAGE' -->
                    <div class="detail-field"
                         style="border-bottom:none;">

                        <div class="detail-field-value">
                            등록된 이미지가 없습니다.
                        </div>

                    </div>
                    <!-- IF END 'NO_IMAGE' -->

                </div>
            </div>

        </div>
    </div>


    <!-- 버튼 -->
    <div class="d-flex gap-2 justify-content-between mt-2">

        <div>
            <a href="vehicle_list.php"
               class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">
                목록
            </a>
        </div>

        <div class="d-flex gap-2">

            <button type="submit"
                    class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">

                <i class="bx bx-save text-4 me-2"></i>
                수정완료

            </button>

        </div>

    </div>

</form>


<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/community/vehicle_update.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
<script src="/js/js.cookie.min.js"></script>
<script src="/js/multi_select.js"></script>
<script src="/js/libs/jquery.mask.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
