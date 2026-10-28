<!-- INCLUDE FILE '../include/header.php' -->

<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>비즈니스 수정하기</h3>
                        </div>
                    </div>

                    <div class="border p-2 sm:p-4 bg-gray-25 rounded">
                        * 우리 지역의 다양한 비즈니스와 소중한 서비스를 자유롭게 소개해 주세요.<br/>
                        * 업종에 맞는 상세한 위치, 연락처, 주요 특징을 작성하시면 신뢰도가 더욱 높아집니다.<br/>
                        * 정직한 정보 공유를 통해 회원들과 함께 성장하는 비즈니스 파트너가 되어주세요.
                    </div>

                    <form name="formp" id="formp" action="ajax/ajax_business.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="business_update">
                        <input type="hidden" name="id" value="{{T_ID}}">
                        <div class="comborder mt-n1">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-0 sm:pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">지역 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-globe fs-5"></i>
                                                <span>주선택<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="state_code" id="state_code" required onchange="GET_SELECT_CITY_NAME('all');"  style="padding-left: 100px !important;">
                                                {{S_SELECT_STATE_CODE}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-map-marker fs-5"></i>
                                                <span>도시전체</span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="city_name" id="city_name" style="padding-left: 100px !important;">
                                                {{S_SELECT_CITY_NAME}}
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">Contact 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-user-circle-o fs-5"></i>
                                                <span>담당자</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="contact_name" id="contact_name" placeholder="담당자"  value="{{T_CONTACT_NAME}}" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-phone fs-5"></i>
                                                <span>연락처<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="contact_phone" id="contact_phone" placeholder="연락처" required value="{{T_CONTACT_PHONE}}" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-envelope fs-5"></i>
                                                <span>이메일</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" name="contact_email" id="contact_email" placeholder="이메일" value="{{T_CONTACT_EMAIL}}" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">업무 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12">
                                        <div class="position-relative d-flex align-items-center mb-1">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-th-list fs-5"></i>
                                                <span>직종<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="business_type" required id="business_type" style="padding-left: 100px !important;">
                                                {{S_SELECT_BUSINESS_TYPE}}
                                            </select>
                                        </div>

                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-pencil fs-5"></i>
                                                <span>제목<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="title" id="title" placeholder="제목" required value="{{T_TITLE}}" style="padding-left: 100px !important;">
                                        </div>

                                        <textarea class="form-control h-250px w-full fs-6 bg-white mt-1" type="text" placeholder="내용 *" name="content" id="content" required>{{T_CONTENT}}</textarea>

                                        <!--div id="file-wrapper" class="mt-1">
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
                                            <button type="button" class="btn btn-outline-secondary btn-sm mt-0 w-full h-40px fs-6" onclick="addNewInput()">
                                                + 파일 추가하기
                                            </button>
                                        </div-->

                                        <button class="btn btn-primary btn-sm mt-1 fs-5" type="submit" style="width:100% !important;"><i class="fa fa-check"></i> 수정하기</button>
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
<script defer src="/js/community/business_update.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
