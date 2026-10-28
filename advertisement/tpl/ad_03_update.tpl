<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<form name="formp" id="formp" action="ajax/ajax_ad_03.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" id="ac" value="update_advertisement">
    <input type="hidden" name="realestate_office_id" id="realestate_office_id" value="">    
    <input type="hidden" name="office_key" id="office_key" value="">    
    <input type="hidden" name="realestate_agent_id" id="realestate_agent_id" value="{{T_ID}}">    
    <div class="content-wrapper">
        <div id="content-recruit_platinum" class="desc-content">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-2 panel overflow-hidden">

                                <div class="block-header panel">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot"
                                                                          class="pr-10"/>에이전트 정보 수정</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3 mt-n1">


                                    <div class="comborder">
                                        <div class="w-100 sm:w-800px mx-auto">
                                                                                
                                            
                                            <div class="pt-0">
                                                <div class="fw-bold fs-4">에이전트 기본정보</div>
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2 mts10">

                                                <!--div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                          <div class="w-128px">CRMLS member </div>
                                                          <div class="w-full"><input type="radio" name="is_crmls_member" id="is_crmls_member_y" value="Y" checked  onclick="YN_SEARCH();"> YES &nbsp; <input type="radio" name="is_crmls_member" id="is_crmls_member_n" value="N" onclick="YN_SEARCH();" > NO</div>
                                                     </div>

                                                </div>
                                                <div class="col-12 md:col-5 hidden768">
                                                    <div></div>
                                                </div-->


                                                <div class="col-12 md:col-5" id="agent_search_button1">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">DRE Lic#</div>
                                                        <div class="w-full"><input
                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                    type="text" name="agent_dre_license"
                                                                    id="agent_dre_license" readonly></div>
                                                    </div>

                                                </div>                                                

                                                <div class="bdbr"></div>


                                                <div class="col-12">
                                                    <div class="fw-bolder text-warning fs-62 mt-1"><i
                                                                class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                                        오피스
                                                    </div>
                                                </div>


                                                <!--div class="col-12 md:col-5">
                                                   <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                         <div class="w-128px">오피스 MLS ID </div>
                                                         <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="office_mls_id" id="office_mls_id"></div>
                                                    </div>

                                               </div>
                                               <div class="col-12 md:col-5 hidden768">
                                                   <div></div>
                                               </div-->

                                                <div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">오피스명 <span style="color:red">*</span></div>
                                                        <div class="w-full"><input
                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                    type="text" name="office_name" id="office_name">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 md:col-5 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">연락처 <span style="color:red">*</span></div>
                                                        <div class="w-full"><input
                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                    type="text" name="office_phone" id="office_phone">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 md:col-5 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">이메일</div>
                                                        <div class="w-full"><input
                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                    type="text" name="office_email" id="office_email">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 md:col-5 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">주소 <span style="color:red">*</span></div>
                                                        <div class="w-full"><input
                                                                    class="form-control h-35px w-full fs-62 bg-white p-narrow"
                                                                    type="text" name="office_address1"
                                                                    id="office_address1" placeholder="주소1"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-4">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px pchidden"></div>
                                                        <div class="w-full"><input
                                                                    class="form-control h-35px w-full fs-62 bg-white p-narrow"
                                                                    type="text" name="office_address2"
                                                                    id="office_address2" placeholder="주소2"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">주 <span style="color:red">*</span></div>
                                                        <div class="w-full">
                                                            <select class="form-select rounded text-gray-900 h-35px p-narrow fs-62 text-opacity-60"
                                                                    id="office_city" name="office_city">
                                                                <option value="">도시선택</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-4">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px pchidden"></div>
                                                        <div class="w-full">
                                                            <select class="form-select rounded text-gray-900 h-35px p-narrow text-opacity-60 fs-62"
                                                                    id="office_state" name="office_state"
                                                                    onchange="GET_SELECT_CITY_NAME();">
                                                                {{SELECT_STATE_CODE}}
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">우편번호</div>
                                                        <div class="w-full"><input
                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                    type="text" name="office_zip" id="office_zip"></div>
                                                    </div>

                                                </div>
						 <div class="col-12 md:col-5 hidden768">
                                                    <div></div>
                                                </div>
                                                <div class="col-12 md:col-8">
                                                <input type="hidden" name="del_logo_image_url" id="del_logo_image_url" value="">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">오피스 로고 이미지</div>
                                                        <div class="w-full">

                                                            <div id="file-wrapper">
                                                                <div id="file-inputs">
                                                                    <div class="file-group mb-1">
                                                                        <div class="form-control form-control-sm h-35px d-flex align-items-center justify-content-between px-3 custom-file-view">
                                                                            <label class="flex-grow-1 pt-1 cursor-pointer text-nowrap overflow-hidden" id="logo_image_view"
                                                                                   onclick="triggerInput(this)">                                                                                   
                                                                                <span class="file-name-text fs-62 text-gray-900 text-opacity-60">이미지 선택! &nbsp;&nbsp; <span
                                                                                            class="hidden-768">이미지는 jpg, png, gif만 가능하며 2MB이하 사이즈만 가능합니다.</span></span>
                                                                            </label>
                                                                            <button type="button"
                                                                                    class="btn-close-custom mt-1" id="logo_image_x"
                                                                                    style="display: none;"
                                                                                    onclick="removeInputGroup(this,'del_logo_image_url')"></button>
                                                                            <input type="file" name="logo_image_url"  accept=".jpg, .jpeg, .png, .gif" 
                                                                                   class="d-none22"
                                                                                   onchange="updateIndividualFile(this)">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                               

                                                <div class="bdbr"></div>
                                                <div class="col-12">
                                                    <div class="fw-bolder text-warning fs-62 mt-1"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                                        에이전트
                                                    </div>
                                                </div>


                                                <!--div class="col-12 md:col-5">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                          <div class="w-128px">에이전트 MLS ID </div>
                                                          <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="agent_key" id="agent_key"></div>
                                                     </div>

                                                </div>


                                                <div class="col-12 md:col-5 hidden768">
                                                    <div></div>
                                                </div-->

                                                <div class="col-12 md:col-8">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div class="w-128px">전문분야</div>
                                                        <div class="w-full">
                                                            <select class="form-select rounded text-gray-900 h-35px p-narrow text-opacity-60 fs-62"
                                                                    id="specialized_field" name="specialized_field">
                                                                {{SELECT_SPECIALIZED_FIELD}}
                                                            </select>
                                                        </div>

                                                    </div>
						 </div>
                                                    <div class="col-12 md:col-3 hidden768">
                                                        <div></div>
                                                    </div>
                                              

                                                    <div class="col-12 md:col-5">
                                                        <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                            <div class="w-128px">Full Name <span style="color:red">*</span></div>
                                                            <div class="w-full"><input
                                                                        class="form-control h-32px w-full fs-6 bg-white"
                                                                        type="text" name="agent_full_name"
                                                                        id="agent_full_name"></div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12 md:col-6 hidden768">
                                                        <div></div>
                                                    </div>

                                                    <div class="col-12 md:col-5">
                                                        <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                            <div class="w-128px">연락처 <span style="color:red">*</span></div>
                                                            <div class="w-full"><input
                                                                        class="form-control h-32px w-full fs-6 bg-white"
                                                                        type="text" name="agent_phone" id="agent_phone">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12 md:col-6 hidden768">
                                                        <div></div>
                                                    </div>


                                                    <div class="col-12 md:col-5">
                                                        <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                            <div class="w-128px">이메일 <span style="color:red">*</span></div>
                                                            <div class="w-full"><input
                                                                        class="form-control h-32px w-full fs-6 bg-white"
                                                                        type="text" name="agent_email" id="agent_email">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12 md:col-6 hidden768">
                                                        <div></div>
                                                    </div>
                                                    <div class="col-12 md:col-9">
                                                        <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                            <div class="w-128px">자기소개</div>
                                                            <div class="w-full">
                                                                <textarea
                                                                        class="form-control h-150px w-full fs-6 bg-white"
                                                                        type="text" name="self_introduction"
                                                                        id="self_introduction"></textarea>
                                                            </div>

                                                        </div>
						                            </div>
                                                        <input type="hidden" name="del_main_image_url" id="del_main_image_url" value="">                                                        
                                                        <div class="col-12 md:col-8">
                                                            <div class="post-meta panel hstack justify-start gap-1 fs-62 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                <div class="w-128px">에이전트 사진</div>
                                                                <div class="w-full">

                                                                    <div id="file-wrapper">
                                                                        <div id="file-inputs">
                                                                            <div class="file-group mb-1">
                                                                                <div class="form-control form-control-sm h-35px d-flex align-items-center justify-content-between px-3 custom-file-view">
                                                                                    <label class="flex-grow-1 pt-1 cursor-pointer text-nowrap overflow-hidden"  id="main_image_view"
                                                                                           onclick="triggerInput(this)">
                                                                                        <span class="file-name-text fs-62 text-gray-900 text-opacity-60">이미지 선택! &nbsp;&nbsp; <span
                                                                                                    class="hidden-768">이미지는 jpg, png, gif만 가능하며 2MB이하 사이즈만 가능합니다.</span></span>
                                                                                    </label>
                                                                                    <button type="button" id="main_image_x"
                                                                                            class="btn-close-custom mt-1"
                                                                                            style="display: none;"
                                                                                            onclick="removeInputGroup(this,'del_main_image_url')"></button>
                                                                                    <input type="file"
                                                                                           name="main_image_url" accept=".jpg, .jpeg, .png, .gif" 
                                                                                           class="d-none22"
                                                                                           onchange="updateIndividualFile(this)">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div><!-- 에이전트 기본정보 -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Section end -->

                    </div><!-- 라디오버튼 1 내용 -->


              


            <!-- Section start -->

            <!-- Section end -->

            <div id="pay_button">
                <button class="btn btn-primary2 btn-md mt-1 fs-5" type="submit" style="width:100% !important;"><i
                            class="fa fa-check"></i> 수정
                </button>
            </div>

        </div>
    </div>
</form>
<!-- Section end -->
<script>
    var agent_id = {{T_ID}};
</script>
<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/advertisement/ad_03_update.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->

