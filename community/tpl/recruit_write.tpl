<!-- INCLUDE FILE '../include/header.php' -->


<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>구인구직 등록하기</h3>
                        </div>
                    </div>

                    <div class="border p-2 sm:p-4 bg-gray-25 rounded">
                        * 함께 성장할 소중한 인연을 기다리는 공간입니다.<br/>
                        * 근무 조건과 상세 직무를 정성껏 작성하시면 더 좋은 인재를 만날 수 있습니다.<br/>
                        * 투명하고 상세한 정보는 신뢰의 시작입니다.
                    </div>

                    <form name="formp" id="formp" action="ajax/ajax_recruit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="recruit_write">
                        <div class="comborder mt-n1">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-0 sm:pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">회사 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-building fs-5"></i>
                                                <span>회사명<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="company_name" id="company_name" placeholder="회사명" value="{{T_COMPANY_NAME}}" required style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-user-circle-o fs-5"></i>
                                                <span>담당자</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="contact_name" id="contact_name" value="{{T_CONTACT_NAME}}" placeholder="담당자" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-phone fs-5"></i>
                                                <span>연락처</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="contact_phone" id="contact_phone" placeholder="연락처" value="{{T_CONTACT_PHONE}}" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-envelope fs-5"></i>
                                                <span>이메일<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" name="contact_email" id="contact_email" placeholder="이메일" required value="{{T_CONTACT_EMAIL}}" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-globe fs-5"></i>
                                                <span>주선택<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="state_code" id="state_code" onchange="GET_SELECT_CITY_NAME();" required style="padding-left: 100px !important;">
                                                {{S_SELECT_STATE_CODE}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-map-marker fs-5"></i>
                                                <span>도시선택<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="city_name" id="city_name" required style="padding-left: 100px !important;">
                                                {{S_SELECT_CITY_NAME}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6" id="has_15" style="display: none;">
                                        <div class="position-relative d-flex align-items-center">
                                            &nbsp; &nbsp; <input type="checkbox" name="has_15_plus_employees" id="has_15_plus_employees" value="Y"> &nbsp; 회사 직원수 15명 이상이면 체크해 주세요
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
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="job_type" name="job_type" required style="padding-left: 100px !important;">
                                                {{S_SELECT_JOB_TYPE}}
                                            </select>
                                        </div>

                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-pencil fs-5"></i>
                                                <span>제목<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="title" id="title" value="{{T_TITLE}}" placeholder="제목" required style="padding-left: 100px !important;">
                                        </div>

                                        <!--div class="position-relative d-flex align-items-center">
                                            <div class="absoinput"><i class="fa fa-pencil fs-5"></i></div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="subtitle" id="subtitle"  value="{{T_SUBTITLE}}" placeholder="소제목" required="" style="padding-left: 50px !important;">
                                        </div-->

                                        <textarea class="form-control h-250px w-full fs-6 bg-white mt-1" type="text" placeholder="내용 *" id="job_opening_information" name="job_opening_information" required>{{T_JOB_OPENING_INFORMATION}}</textarea>

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
<script defer src="/js/community/recruit_write.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
