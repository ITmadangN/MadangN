<!-- INCLUDE FILE '../include/header.php' -->


<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />자동차 등록하기</h3>
                        </div>
                    </div>

                    <div class="border p-2 sm:p-4 bg-gray-25 rounded">
                        * 소중히 아끼던 자동차가 새로운 주인을 기다리고 있습니다.<br />
                        * 주행 거리, 사고 유무, 정비 이력 등 차량의 상태를 솔직하게 작성해 주세요.<br />
                        * 투명한 정보 공유는 빠르고 기분 좋은 거래의 시작이 됩니다.




                    </div>

                    <form name="formp" id="formp" action="ajax/ajax_vehicle_regular.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="vehicle_regular_write">
                        <div class="comborder mt-n1">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-0 sm:pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">기본 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">

                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-globe fs-5"></i></div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="state_code" id="state_code" onchange="GET_SELECT_CITY_NAME();"  style="padding-left: 50px !important;">
                                                {{S_SELECT_STATE_CODE}}
                                            </select>

                                        </div>

                                    </div>
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-map-marker fs-5"></i></div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60"  name="city_name" id="city_name"  style="padding-left: 50px !important;">
                                                {{S_SELECT_CITY_NAME}}
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-user-circle-o fs-5"></i></div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text"  name="seller_name" id="seller_name" placeholder="담당자" value="{{T_CONTACT_NAME}}" style="padding-left: 50px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center fake-placeholder-class">
                                            <div class="absoinput"><i class="fa fa-phone fs-5"></i></div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="seller_phone" id="seller_phone" placeholder="연락처"  value="{{T_CONTACT_PHONE}}" required  style="padding-left: 50px !important;">
                                            <label for="myInput" class="fake-placeholder">
                                                <span style="color: red; padding-left:85px;">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center fake-placeholder-class">
                                            <div class="absoinput"><i class="fa fa-envelope fs-5"></i></div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" name="seller_email" id="seller_email" placeholder="이메일" value="{{T_CONTACT_EMAIL}}" required style="padding-left: 50px !important;">
                                            <label for="myInput" class="fake-placeholder">
                                                <span style="color: red; padding-left:85px;">*</span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">차량 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-wrench fs-5"></i></div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="car_maker" name="car_maker" required style="padding-left: 50px !important;">
                                                {{S_SELECT_CAR_MAKER}}
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center fake-placeholder-class">
                                            <div class="absoinput"><i class="fa fa-car fs-5"></i></div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="car_model" id="car_model" placeholder="자동차 모델" required style="padding-left: 50px !important;">
                                            <label for="myInput" class="fake-placeholder">
                                                <span style="color: red; padding-left:115px;">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-calendar fs-5"></i></div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="car_year" id="car_year"  required  style="padding-left: 50px !important;">
                                                {{S_SELECT_CAR_YEAR}}
                                            </select>

                                        </div>
                                    </div>

                                   <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center fake-placeholder-class">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:3px; font-size:12px; font-weight:bold; width:90px; justify-content:center; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-tachometer fs-5"></i>
                                                <span>주행거리</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="car_mileage" id="car_mileage" placeholder="mileage" required style="padding-left: 90px !important;">
                                            <label for="myInput" class="fake-placeholder">
                                                <span style="color: red; padding-left:90px;">*</span>
                                            </label>
                                        </div>
                                    </div>



                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center fake-placeholder-class">
                                            <div class="absoinput"><i class="fa fa-paint-brush fs-5"></i></div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="car_color" id="car_color" placeholder="색상" required style="padding-left: 50px !important;">
                                            <label for="myInput" class="fake-placeholder">
                                                <span style="color: red; padding-left:70px;">*</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center fake-placeholder-class">
                                            <div class="absoinput"><i class="fa fa-money fs-5"></i></div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="listing_price" id="listing_price" placeholder="$판매가격" required style="padding-left: 50px !important;">
                                            <label for="myInput" class="fake-placeholder">
                                                <span style="color: red; padding-left:110px;">*</span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">옵션 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-battery fs-5"></i></div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="fuel_type" id="fuel_type"  style="padding-left: 50px !important;">
                                                {{S_SELECT_FUEL_TYPE}}
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-bus fs-5"></i></div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="body_type" id="body_type"  style="padding-left: 50px !important;">
                                                {{S_SELECT_BODY_TYPE}}
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-cog fs-5"></i></div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="transmission" id="transmission"  style="padding-left: 50px !important;">
                                                {{S_SELECT_TRANSMISSION}}
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control h-100px w-full fs-6 bg-white" type="text" placeholder="기타옵션" name="options_description" id="options_description"></textarea>
                                    </div>



                                </div>
                            </div>
                        </div>



                        <div class="comborder">


                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">추가설명 및 사진</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12">


                                        <textarea class="form-control h-250px w-full fs-6 bg-white" type="text" placeholder="자동차 설명" name="description" id="description"></textarea>
                                        <div id="file-wrapper" class="mt-1">
                                            <div id="file-inputs">
                                                <div class="file-group mb-1">
                                                    <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view">
                                                        <label class="flex-grow-1 pt-1 cursor-pointer text-nowrap overflow-hidden" onclick="triggerInput(this)">
                                                            <span class="file-name-text">이미지를 선택해주세요 <span class="hidden-768">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 이미지는 jpg, png, gif만 가능하며 2MB이하 사이즈만 가능합니다.</span></span>
                                                        </label>
                                                        <button type="button" class="btn-close-custom mt-1" style="display: none;" onclick="removeInputGroup(this)"></button>
                                                        <input type="file" name="user_files[]" class="d-none22" onchange="updateIndividualFile(this)">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-secondary btn-sm mt-0 w-full h-40px fs-6" onclick="addNewInput(20)">
                                                + 파일 추가하기
                                            </button>
                                        </div>
                                        <button class="btn btn-primary btn-sm mt-1 fs-5" type="submit" style="width:100% !important;"><i class="fa fa-check"></i> 등록하기</button>
                                    </div>

                                </div>
                            </div>
                        </div>




                    </form>



                </div>
            </div>
        </div>
    </div>
</div>





<!-- Section end -->


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/vehicle_regular_write.js"></script>
<script defer src="/js/iibiz_common.js"></script>


<!-- INCLUDE FILE '../include/footer.php' -->