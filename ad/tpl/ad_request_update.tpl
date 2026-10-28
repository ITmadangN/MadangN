<!-- INCLUDE FILE '../include/header.php' -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>

    /* post-header 내부의 모든 요소를 세로 중앙 정렬 */
    .post-header {
        display: flex;
        flex-direction: column;
        justify-content: center; /* 세로 중앙 정렬 */
        min-height: 100%; /* 부모 높이가 있다면 꽉 채움 */
    }

    /* 아이콘과 텍스트가 들어있는 라인(post-meta) 정렬 */
    .post-meta {
        align-items: center; /* 아이콘과 글자 높이 맞춤 */
    }
    
/* 미리보기 버튼 */
.btn-preview-ad {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    margin-top: 10px;
    width: 80%;
    height: 36px;
    background-color: #fff;
    color: #4a6cf7;
    border: 1px solid #4a6cf7;
    border-radius: 4px;
    padding: 0 16px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-preview-ad:hover {
    background-color: #4a6cf7;
    color: #fff;
    border-color: #4a6cf7;
}

.btn-preview-ad:hover svg {
    stroke: #fff;
}

.btn-preview-ad:active {
    background-color: #3b5de7;
    border-color: #3b5de7;
    transform: scale(0.97);
}

/* 회사명 입력란 + 이전광고 버튼 */
.company-name-with-button {
    display: flex;
    align-items: center;
    gap: 8px;
    width: 100%;
    min-width: 0;
}

.company-name-with-button .form-control {
    flex: 1 1 auto;
    min-width: 0;
}

.btn-load-previous-ad {
    flex: 0 0 auto;
    height: 32px;
    padding: 0 12px;
    border: 0;
    border-radius: 4px;
    background-color: #4a6cf7;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    line-height: 32px;
    white-space: nowrap;
    cursor: pointer;
}

.btn-reset-ad {
    flex: 0 0 auto;
    height: 32px;
    padding: 0 12px;
    border: 0;
    border-radius: 4px;
    background-color: #9d401f;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    line-height: 32px;
    white-space: nowrap;
    cursor: pointer;
}

.btn-load-previous-ad:hover {
    background-color: #3b5de7;
    color: #fff;
}

@media (max-width: 480px) {
    .btn-load-previous-ad {
        padding: 0 8px;
        font-size: 12px;
    }
}

</style>


<!--  ccv2 -->


<!--  이전광고 -->

<form name="formp" id="formp" action="ajax/ajax_advertisement.php" method="post" enctype="multipart/form-data">
    <!--input type="hidden" name="ad_method" id="ad_method" value="recruit_platinum"-->
    <input type="hidden" name="ac" id="ac" value="update_advertisement">
    <input type="hidden" name="contact_name" id="contact_name" value="">
    <input type="hidden" name="contact_email" id="contact_email" value="">
    <input type="hidden" name="contact_phone" id="contact_phone" value="">
    <input type="hidden" name="company_name" id="company_name" value="">
    <input type="hidden" name="company_website" id="company_website" value="">
    <input type="hidden" name="company_address" id="company_address" value="">
    <input type="hidden" name="company_state_code" id="company_state_code" value="">
    <input type="hidden" name="has_15_plus_employees" id="has_15_plus_employees" value="N">
    <input type="hidden" name="desired_start_date" id="desired_start_date" value="">
    <input type="hidden" name="desired_end_date" id="desired_end_date" value="">
    <input type="hidden" name="ad_company_id" id="ad_company_id" value="">    
    <input type="hidden" name="listing_id" id="listing_id" value="">        
    <input type="hidden" name="validity_period" id="validity_period" value="{{T_VALIDITY_PERIOD}}">   
    
    <div class="radio-container">
        <div class="radio-item">
            <input type="radio" name="ad_method" id="radio1" value="recruit_platinum" {{T_CHECKED_PLATINUM}}  {{T_CHECKED_PLATINUM_DISABLED}}>
            <label for="radio1">구인 광고 (Platinum)</label>
        </div>
        <div class="radio-item">
            <input type="radio" name="ad_method" id="radio2" value="recruit_gold" {{T_CHECKED_GOLD}}  {{T_CHECKED_GOLD_DISABLED}}>
            <label for="radio2">구인 광고 (Gold)</label>
        </div>
        <div class="radio-item">
            <input type="radio" name="ad_method" id="radio3" value="business_platinum"  {{T_CHECKED_BUSINESS}}  {{T_CHECKED_BUSINESS_DISABLED}}>
            <label for="radio3">비즈니스 광고 (Platinum)</label>
        </div>
        <div class="radio-item">
            <input type="radio" name="ad_method" id="radio4" value="vehicle_dealer"  {{T_CHECKED_DEALER}}  {{T_CHECKED_DEALER_DISABLED}}>
            <label for="radio4">자동차 딜러광고</label>
        </div>
    </div> <!-- 광고 레디오 버튼 -->


    <div class="content-wrapper">
        <div id="content-recruit_platinum" class="desc-content">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot"
                                                                          class="pr-10"/>구인 광고 (Platinum)</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-1 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">구인광고</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        Platinum
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="rp_validity_period"> 
                                                                        개월                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">가격</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="rp_payment_amount">$0
                                                                        (신규런칭이벤트)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/2.jpg" data-src="/ad/2.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                                    <div class="dotline2"></div>


                                    <div class="comborder">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="pt-0">
                                                <div class="fw-bold fs-4">회사기본정보</div>
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">
                                                <div class="col-12 mt-2 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">회사명 <span style="color:red">*</span>
                                                                        </div>
                                                                        <div class="w-full company-name-with-button">
                                                                            <input class="form-control h-32px w-full fs-6 bg-white"
                                                                                   type="text"
                                                                                   name="rp_company_name"
                                                                                   id="rp_company_name"
                                                                                   placeholder="회사명" readonly>

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6 ">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">웹사이트</div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    name="rp_company_website"
                                                                                    id="rp_company_website" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">주소 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    name="rp_company_address"
                                                                                    id="rp_company_address" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">주<span style="color:red">*</span>
                                                                        </div>
                                                                        <div class="w-full">
                                                                        <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60"
                                                                                    id="rp_company_state_code"
                                                                                    name="rp_company_state_code" onchange="SET_CA('rp');"
                                                                                      disabled>
                                                                                        {{SELECT_STATE_CODE}}
                                                                        </select>
                                                                        </div>                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="mt-2" id="rp_ca_have_15" style="display:none;">
                                                                              <div class="border rounded bg-gray-25 p-3">

                                                                              캘리포니아 급여 투명성 법안(SB1162) 안내<br /><br />

                                                                                2023년 1월 1일부터 직원 15명 이상 고용주는 채용 공고에 급여 범위를 반드시 명시해야 합니다.<br />
                                                                                미준수 시 벌금이 부과될 수 있습니다.<br />

                                                                                <a href="https://leginfo.legislature.ca.gov/faces/billNavClient.xhtml?bill_id=202120220SB1162" target="_blank" class="text-none btn btn-dark mt-1 btn-xs fs-62"><i class="fa fa-search-plus"></i> 자세히 보기</a><br /><br />



                                                                                <input type="radio" name="rp_has_15_plus_employees"  value="Y" disabled> 직원 수 15명 이상 &nbsp;&nbsp;&nbsp;
                                                                                <input type="radio" name="rp_has_15_plus_employees"  value="N" disabled> 직원 수 15명 미만

                                                                              </div>
                                                                        </div>
                                            </div>
                                        </div>
                                    </div><!-- 회사정보 -->


                                    <div class="comborder mt-3">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="pt-2 sm:pt-3 mb-1 d-flex justify-between">
                                                <div class="fw-bold fs-4">광고게시정보</div>
                                                <!--div class="btn btn-primary2 btn-sm fs-6"><a href="#"
                                                                                             class="text-none"
                                                                                             onclick="GET_PREVIOUS_ADVERTISING_LIST(); return false;">이전광고 불러오기</a>                                                                                                        
                                                </div-->
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">광고지역</div>
                                                </div>

                                                <div class="col-12">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">광고 지역 선택 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-150px">
                                                                            <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60"
                                                                                    id="rp_state_code"
                                                                                    name="rp_state_code[0]"
                                                                                    onchange="GET_SELECT_CITY_NAME('rp','one');">
                                                                                {{SELECT_STATE_CODE}}
                                                                            </select>
                                                                        </div>
                                                                        <div class="w-150px">
                                                                            <select class="form-select rounded p-1 text-gray-900 text-opacity-60"
                                                                                    id="rp_city_name"
                                                                                    name="rp_city_name[0]">
                                                                                <option value="">도시선택</option>
                                                                            </select>
                                                                            <div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button"
                                                                                    class="btn-add-state"
                                                                                    data-prefix="rp"
                                                                                    style="height:32px; line-height:32px; background-color:#4a6cf7; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;">+ 추가</button>
                                                                    </div>
                                                      
                                                                </div>
                                                        </article>
                                                    </div>
                                                    <div id="rp_city_extra_container">
                                                    </div>
                                                </div>

                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">광고 게시희망일</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">게시희망일 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    id="rp_desired_start_date"
                                                                                    name="rp_desired_start_date" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>



                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">Contact 정보</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">담당자 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="rp_contact_name"
                                                                                    id="rp_contact_name"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">이메일 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="rp_contact_email"
                                                                                    id="rp_contact_email"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">연락처 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="rp_contact_phone"
                                                                                    id="rp_contact_phone"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>


                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">업무 정보</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60 md:d-flex z-1">
                                                                        <div class="w-110px">직종 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full" style="display:flex; align-items:center; gap:6px;">
                                                                            <select class="form-select rounded text-gray-900 text-opacity-60"
                                                                                    id="rp_job_type" name="rp_job_type[]"
                                                                                    style="height:32px; padding:2px 8px; font-size:13px;">
                                                                                {{SELECT_JOB_TYPE}}
                                                                            </select>
                                                                            <button type="button"
                                                                                    class="btn-add-job-type"
                                                                                    data-prefix="rp"
                                                                                    style="height:32px; line-height:32px; background-color:#4a6cf7; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;">+ 추가</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    <div id="rp_job_type_extra_container"></div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>




                                                <div class="col-12">
                                                    <div> <textarea
                                                                class="form-control h-250px w-full fs-6 bg-white mt-1"
                                                                type="text" placeholder="내용"
                                                                name="rp_job_opening_information"
                                                                id="rp_job_opening_information"></textarea></div>
                                                </div>


                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                                </div>

                                                <div class="col-12 md:col-8">
                                                    <input type="hidden" name="rp_logo_image_url_exist" id="rp_logo_image_url_exist" value="">
                                                    <div class="step-input-group" data-step="1">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="rp_img_logo">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">회사 로고<span
                                                                            style="color:red">*</span></span>
                                                               
                                                                <input type="file" name="rp_logo_image_url"
                                                                       id="rp_logo_image_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;" disabled>
                                                            </label>
                                                        </div>
                                                    </div><!-- 로고 이미지 업로드 -->

                                                    <div class="step-input-group fake-placeholder-calss" data-step="2">
                                                        <input class="form-control form-control-sm h-40px w-full fs-6 bg-white custom-step-input"
                                                               type="text" name="rp_title" id="rp_title"
                                                               placeholder="제목">
                                                        <label for="myInput" class="fake-placeholder">
                                                            <span style="color: red; padding-left:70px;">*</span>
                                                        </label>
                                                    </div><!-- 제목 -->
                                                    

                                                    <!--div class="step-input-group" data-step="3">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">배경 이미지 (클릭)</span>
                                                                <div class="btn-remove-x" style="display: none;"></div>
                                                                <input type="file" name="rp_main_image_background_url"
                                                                       id="rp_main_image_background_url"
                                                                       accept=".jpg, .jpeg, .png, .gif" class="real-file-input"
                                                                       style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div--><!-- 로고 이미지 업로드 -->
                                                    <input type="hidden" name="rp_sub_image_01_url_exist" id="rp_sub_image_01_url_exist" value="">
                                                    <div class="step-input-group" data-step="추">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="rp_img_img1">
                                                                <div class="preview-box"><img src="#" class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">본문 추가 이미지</span>
                                                                <div class="btn-remove-x" data="rp_sub_image_01_url_exist" style="display: none;"></div>
                                                                <input type="file" name="rp_sub_image_01_url"
                                                                       id="rp_sub_image_01_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="rp_sub_image_02_url_exist" id="rp_sub_image_02_url_exist" value="">
                                                    <div class="step-input-group" data-step="추">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="rp_img_img2">
                                                                <div class="preview-box"><img src="#" class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">본문 추가 이미지</span>
                                                                <div class="btn-remove-x" data="rp_sub_image_02_url_exist" style="display: none;"></div>
                                                                <input type="file" name="rp_sub_image_02_url"
                                                                       id="rp_sub_image_02_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div><!-- 왼쪽업로드 -->


                                                <div class="col-12 md:col-4 text-center">
                                                    <img src="/ad/ad_14.jpg" data-src="/ad/ad_14.jpg" alt="image"
                                                         data-uc-img="loading: lazy">
                                                    <!--button type="button" class="btn-preview-ad" data-prefix="rp" data-type="recruit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                        미리보기
                                                    </button-->
                                                </div>

                                                <input type="hidden" name="rp_sub_image_03_url_exist" id="rp_sub_image_03_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rp_img_img3">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rp_sub_image_03_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rp_sub_image_03_url"
                                                                   id="rp_sub_image_03_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rp_sub_image_04_url_exist" id="rp_sub_image_04_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rp_img_img4">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rp_sub_image_04_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rp_sub_image_04_url"
                                                                   id="rp_sub_image_04_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rp_sub_image_05_url_exist" id="rp_sub_image_05_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rp_img_img5">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rp_sub_image_05_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rp_sub_image_05_url"
                                                                   id="rp_sub_image_05_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--input type="hidden" name="rp_sub_image_06_url_exist" id="rp_sub_image_06_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rp_img_img6">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rp_sub_image_06_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rp_sub_image_06_url"
                                                                   id="rp_sub_image_06_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div-->
                                            </div>


                                        </div>
                                    </div>
                                </div><!-- 광고게시정보 -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section end -->

        </div><!-- 라디오버튼 1 내용 -->


        <div id="content-recruit_gold" class="desc-content" style="display:none;">


            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot"
                                                                          class="pr-10"/>구인 광고 (Gold)</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-1 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">구인광고</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        Gold
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="rg_validity_period"> 
                                                                        개월                                              
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">가격</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="rg_payment_amount">$0
                                                                        (신규런칭이벤트)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/3.jpg" data-src="/ad/3.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                                    <div class="dotline2"></div>


                                    <div class="comborder">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="pt-0">
                                                <div class="fw-bold fs-4">회사기본정보</div>
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">
                                                <div class="col-12 mt-2 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">회사명 <span style="color:red">*</span>
                                                                        </div>
                                                                        <div class="w-full company-name-with-button">
                                                                            <input class="form-control h-32px w-full fs-6 bg-white"
                                                                                   type="text"
                                                                                   name="rg_company_name"
                                                                                   id="rg_company_name" readonly>

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6 ">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">웹사이트</div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    name="rg_company_website"
                                                                                    id="rg_company_website" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">주소 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    name="rg_company_address"
                                                                                    id="rg_company_address" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 mt-2 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">주<span style="color:red">*</span>
                                                                        </div>
                                                                        <div class="w-full">
                                                                        <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60"
                                                                                    id="rg_company_state_code"
                                                                                    name="rg_company_state_code" onchange="SET_CA('rg');"
                                                                                      disabled>
                                                                                        {{SELECT_STATE_CODE}}
                                                                        </select>
                                                                        </div>                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="mt-2" id="rg_ca_have_15" style="display:none;">
                                                                              <div class="border rounded bg-gray-25 p-3">

                                                                              캘리포니아 급여 투명성 법안(SB1162) 안내<br /><br />

                                                                                2023년 1월 1일부터 직원 15명 이상 고용주는 채용 공고에 급여 범위를 반드시 명시해야 합니다.<br />
                                                                                미준수 시 벌금이 부과될 수 있습니다.<br />

                                                                                <a href="https://leginfo.legislature.ca.gov/faces/billNavClient.xhtml?bill_id=202120220SB1162" target="_blank" class="text-none btn btn-dark mt-1 btn-xs fs-62"><i class="fa fa-search-plus"></i> 자세히 보기</a><br /><br />



                                                                                <input type="radio" name="rg_has_15_plus_employees"  value="Y" disabled> 직원 수 15명 이상 &nbsp;&nbsp;&nbsp;
                                                                                <input type="radio" name="rg_has_15_plus_employees"  value="N" disabled> 직원 수 15명 미만

                                                                              </div>
                                                                        </div>
                                            </div>
                                        </div>
                                    </div><!-- 회사정보 -->


                                    <div class="comborder mt-3">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="pt-2 sm:pt-3 mb-1 d-flex justify-between">
                                                <div class="fw-bold fs-4">광고게시정보</div>
                                                <!--div class="btn btn-primary2 btn-sm fs-6"><a href="#"
                                                                                             class="text-none"
                                                                                             onclick="GET_PREVIOUS_ADVERTISING_LIST(); return false;">이전광고 불러오기</a>
                                                </div-->
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">광고지역</div>
                                                </div>

                                                <div class="col-12">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">광고 지역 선택 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-150px">
                                                                            <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60"
                                                                                    id="rg_state_code"
                                                                                    name="rg_state_code[0]"
                                                                                    onchange="GET_SELECT_CITY_NAME('rg','one');">
                                                                                        {{SELECT_STATE_CODE}}
                                                                                    </select>
                                                                        </div>
                                                                        <div class="w-150px">
                                                                            <select class="form-select rounded p-1 text-gray-900 text-opacity-60"
                                                                                    id="rg_city_name"
                                                                                    name="rg_city_name[0]">
                                                                                <option value="">도시선택</option>
                                                                            </select>
                                                                            <div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button"
                                                                                    class="btn-add-state"
                                                                                    data-prefix="rg"
                                                                                    style="height:32px; line-height:32px; background-color:#4a6cf7; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;">+ 추가</button>
                                                                        
                                                                    </div>
                                                                        
                                                                </div>
                                                        </article>
                                                    </div>
                                                    <div id="rg_city_extra_container">
                                                    </div>
                                                </div>

                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">광고 게시희망일</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">게시희망일<span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    name="rg_desired_start_date"
                                                                                    id="rg_desired_start_date" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>



                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">Contact 정보</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">담당자 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="rg_contact_name"
                                                                                    id="rg_contact_name"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">이메일 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="rg_contact_email"
                                                                                    id="rg_contact_email"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">연락처 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="rg_contact_phone"
                                                                                    id="rg_contact_phone"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>


                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">업무 정보</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60 md:d-flex z-1">
                                                                        <div class="w-110px">직종 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full" style="display:flex; align-items:center; gap:6px;">
                                                                            <select class="form-select rounded text-gray-900 text-opacity-60"
                                                                                    id="rg_job_type" name="rg_job_type[]"
                                                                                    style="height:32px; padding:2px 8px; font-size:13px;">
                                                                                {{SELECT_JOB_TYPE}}
                                                                            </select>
                                                                            <button type="button"
                                                                                    class="btn-add-job-type"
                                                                                    data-prefix="rg"
                                                                                    style="height:32px; line-height:32px; background-color:#4a6cf7; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;">+ 추가</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    <div id="rg_job_type_extra_container"></div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>



                                                <div class="col-12">
                                                    <div> <textarea
                                                                class="form-control h-250px w-full fs-6 bg-white mt-1"
                                                                type="text" placeholder="내용"
                                                                name="rg_job_opening_information"
                                                                id="rg_job_opening_information"></textarea></div>
                                                </div>


                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                                </div>

                                                <div class="col-12 md:col-8">
                                                     <input type="hidden" name="rg_logo_image_url_exist" id="rg_logo_image_url_exist" value="">   
                                                    <div class="step-input-group" data-step="1">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="rg_img_logo">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">회사 로고 업로드 (클릭) <span
                                                                            style="color:red">*</span></span>
                                                                <!--div class="btn-remove-x" data="rg_logo_image_url_exist" style="display: none;"></div-->
                                                                <input type="file" name="rg_logo_image_url"
                                                                       id="rg_logo_image_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;" disabled>
                                                            </label>
                                                        </div>
                                                    </div><!-- 로고 이미지 업로드 -->

                                                    <div class="step-input-group fake-placeholder-class" data-step="2">
                                                        <input class="form-control form-control-sm h-40px w-full fs-6 bg-white custom-step-input"
                                                               type="text" name="rg_title" id="rg_title"
                                                               placeholder="제목">
                                                        <label for="myInput" class="fake-placeholder">
                                                            <span style="color: red; padding-left:70px;">*</span>
                                                        </label>
                                                    </div><!-- 제목 -->
                                                    <!--div class="step-input-group " data-step="3">
                                                        <input class="form-control form-control-sm h-40px w-full fs-6 bg-white custom-step-input"
                                                               type="text" name="rg_subtitle" id="rg_subtitle"
                                                               placeholder="소제목">
                                                        
                                                    </div--><!-- 소제목 -->


                                                </div><!-- 왼쪽업로드 -->


                                                <div class="col-12 md:col-4 text-center">
                                                    <img src="/ad/ad_15.png" data-src="/ad/ad_15.png" alt="image"
                                                         data-uc-img="loading: lazy">
                                                    <!--button type="button" class="btn-preview-ad" data-prefix="rg" data-type="recruit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                        미리보기
                                                    </button-->
                                                </div>
                                                <input type="hidden" name="rg_sub_image_01_url_exist" id="rg_sub_image_01_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rg_img_img1">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rg_sub_image_01_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rg_sub_image_01_url"
                                                                   id="rg_sub_image_01_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rg_sub_image_02_url_exist" id="rg_sub_image_02_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rg_img_img2">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rg_sub_image_02_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rg_sub_image_02_url"
                                                                   id="rg_sub_image_02_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rg_sub_image_03_url_exist" id="rg_sub_image_03_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rg_img_img3">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rg_sub_image_03_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rg_sub_image_03_url"
                                                                   id="rg_sub_image_03_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rg_sub_image_04_url_exist" id="rg_sub_image_04_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rg_img_img4">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rg_sub_image_04_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rg_sub_image_04_url"
                                                                   id="rg_sub_image_04_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rg_sub_image_05_url_exist" id="rg_sub_image_05_url_exist" value="">
                                                <div class="step-input-group" data-step="추">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="rg_img_img5">
                                                            <div class="preview-box"><img src="#" class="image-preview">
                                                            </div>
                                                            <span class="placeholder-text">본문 추가 이미지</span>
                                                            <div class="btn-remove-x" data="rg_sub_image_05_url_exist" style="display: none;"></div>
                                                            <input type="file" name="rg_sub_image_05_url"
                                                                   id="rg_sub_image_05_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div><!-- 광고게시정보 -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section end -->

        </div>


        <!-- 라디오버튼 2 내용 -->


        <div id="content-business_platinum" class="desc-content" style="display:none;">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot"
                                                                          class="pr-10"/>비즈니스 광고(Platinum)</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-1 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-100px">비즈니스 광고</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        Platinum
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-100px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="bp_validity_period">                                                          
                                                                        개월                                                                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">가격</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="bp_payment_amount">$0
                                                                        (신규런칭이벤트)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/4.jpg" data-src="/ad/4.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                                    <div class="dotline2"></div>

                                    <div class="comborder">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="pt-0">
                                                <div class="fw-bold fs-4">회사기본정보</div>
                                            </div>
                                            <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">회사명 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full company-name-with-button">
                                                                            <input class="form-control h-32px w-full fs-6 bg-white"
                                                                                   type="text"
                                                                                   name="bp_company_name"
                                                                                   id="bp_company_name" readonly>                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                        </div>
                                    </div><!-- 회사정보 -->

                                    <div class="comborder mt-3">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="mb-1 d-flex justify-between">
                                                <div class="fw-bold fs-4">광고게시정보</div>                                                
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">광고지역</div>
                                                </div>

                                                <div class="col-12">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">광고 지역 선택 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-150px">
                                                                            <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60"
                                                                                    id="bp_state_code"
                                                                                    name="bp_state_code"
                                                                                    onchange="GET_SELECT_CITY_NAME('bp', 'all');">
                                                                            {{SELECT_STATE_CODE}}
                                                                            </select>
                                                                        </div>
                                                                        <div class="w-150px">
                                                                            <select class="form-select rounded p-1 text-gray-900 text-opacity-60"
                                                                                    id="bp_city_name"
                                                                                    name="bp_city_name">
                                                                                <option value="">도시전체</option>
                                                                            </select>
                                                                            <div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </article>
                                                    </div>
                                                </div>

                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">광고 게시희망일</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">게시희망일<span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    id="bp_desired_start_date"
                                                                                    name="bp_desired_start_date" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>



                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">Contact 정보</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">담당자 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="bp_contact_name"
                                                                                    id="bp_contact_name"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">이메일 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="bp_contact_email"
                                                                                    id="bp_contact_email"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">연락처 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="bp_contact_phone"
                                                                                    id="bp_contact_phone"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>


                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">직종 정보</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">직종 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full">
                                                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60"
                                                                                    id="bp_business_type"
                                                                                    name="bp_business_type">
                                                                                {{SELECT_BUSINESS_TYPE}}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                                <div class="col-12">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">제목 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" id="bp_title"
                                                                                    name="bp_title"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div><textarea
                                                                class="form-control h-250px w-full fs-6 bg-white mt-1"
                                                                type="text" placeholder="내용" id="bp_content"
                                                                name="bp_content"></textarea></div>
                                                </div>


                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                                </div>

                                                <div class="col-12 md:col-8">
                                                    <input type="hidden" name="bp_main_image_url_exist" id="bp_main_image_url_exist" value="">    
                                                    <div class="step-input-group" data-step="1">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="bp_img_main">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">대표 이미지 업로드 (클릭) <span
                                                                            style="color:red">*</span></span>
                                                                <div class="btn-remove-x" data="bp_main_image_url_exist" style="display: none;"></div>

                                                                    <input type="file" name="bp_main_image_url"
                                                                           id="bp_main_image_url" accept=".jpg, .jpeg, .png, .gif"
                                                                           class="real-file-input"
                                                                           style="display: none;">

                                                            </label>
                                                        </div>
                                                    </div><!-- 로고 이미지 업로드 -->
                                                    <input type="hidden" name="bp_sub_image_01_url_exist" id="bp_sub_image_01_url_exist" value="">
                                                    <div class="step-input-group" data-step="추">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="bp_img_img1">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">본문 추가 이미지</span>
                                                                <div class="btn-remove-x" data="bp_sub_image_01_url_exist" style="display: none;"></div>
                                                                <input type="file" name="bp_sub_image_01_url"
                                                                       id="bp_sub_image_01_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="bp_sub_image_02_url_exist" id="bp_sub_image_02_url_exist" value="">
                                                    <div class="step-input-group" data-step="추">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="bp_img_img2">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">본문 추가 이미지</span>
                                                                <div class="btn-remove-x" data="bp_sub_image_02_url_exist" style="display: none;"></div>
                                                                <input type="file" name="bp_sub_image_02_url"
                                                                       id="bp_sub_image_02_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="bp_sub_image_03_url_exist" id="bp_sub_image_03_url_exist" value="">
                                                    <div class="step-input-group" data-step="추">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="bp_img_img3">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">본문 추가 이미지</span>
                                                                <div class="btn-remove-x" data="bp_sub_image_03_url_exist" style="display: none;"></div>
                                                                <input type="file" name="bp_sub_image_03_url"
                                                                       id="bp_sub_image_03_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="bp_sub_image_04_url_exist" id="bp_sub_image_04_url_exist" value="">
                                                    <div class="step-input-group" data-step="추">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="bp_img_img4">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">본문 추가 이미지</span>
                                                                <div class="btn-remove-x" data="bp_sub_image_04_url_exist" style="display: none;"></div>
                                                                <input type="file" name="bp_sub_image_04_url"
                                                                       id="bp_sub_image_04_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="bp_sub_image_05_url_exist" id="bp_sub_image_05_url_exist" value="">
                                                    <div class="step-input-group" data-step="추">
                                                        <div class="custom-file-container">
                                                            <label class="custom-input-label" id="bp_img_img5">
                                                                <div class="preview-box"><img src="#"
                                                                                              class="image-preview">
                                                                </div>
                                                                <span class="placeholder-text">본문 추가 이미지</span>
                                                                <div class="btn-remove-x" data="bp_sub_image_05_url_exist" style="display: none;"></div>
                                                                <input type="file" name="bp_sub_image_05_url"
                                                                       id="bp_sub_image_05_url" accept=".jpg, .jpeg, .png, .gif"
                                                                       class="real-file-input" style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div><!-- 왼쪽업로드 -->


                                                <div class="col-12 md:col-4 text-center">
    <img src="/ad/ad_16.png" data-src="/ad/ad_16.png" alt="image"
         data-uc-img="loading: lazy">
    <!--button type="button" class="btn-preview-ad" data-prefix="bp" data-type="business">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        </svg>
        미리보기
    </button-->
</div>

                                            </div>


                                        </div>
                                    </div>
                                </div><!-- 광고게시정보 -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section end -->


        </div><!-- 라디오버튼 3 내용 -->


        <div id="content-vehicle_dealer" class="desc-content" style="display:none;">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot"
                                                                          class="pr-10"/>자동차 딜러 광고 (Platinum)</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-1 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-100px">자동차 광고</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        Platinum
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-100px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="vd_validity_period">                                                          
                                                                            개월
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">가격</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6"  id="vd_payment_amount">$0
                                                                        (신규런칭이벤트)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/5.jpg" data-src="/ad/5.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                                    <div class="dotline2"></div>


                                    <div class="comborder">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="mb-1 d-flex justify-between">
                                                <div class="fw-bold fs-4">광고게시정보</div>
                                                
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">


                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">광고 게시희망일</div>
                                                </div>

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">게시희망일<span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text"
                                                                                    id="vd_desired_start_date"
                                                                                    name="vd_desired_start_date" readonly></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>



                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                    <div class="dots"></div>
                                                    <div class="text-gray-900 text-opacity-80 fs-5">딜러 정보</div>
                                                </div>
                                                
                                            <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">회사명 <span
                                                                                style="color:red">*</span></div>
                                                                    <div class="w-full"><input
                                                                                class="form-control h-32px w-full fs-6 bg-white"
                                                                                type="text" name="vd_company_name"
                                                                                id="vd_company_name" readonly></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-6 hidden768">
                                                <div></div>
                                            </div>
                                            <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">회사 웹사이트</div>
                                                                    <div class="w-full"><input
                                                                                class="form-control h-32px w-full fs-6 bg-white"
                                                                                type="text"
                                                                                name="vd_company_website"
                                                                                id="vd_company_website"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-6 hidden768">
                                                <div></div>
                                            </div>
                                            <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">딜러명 <span
                                                                                style="color:red">*</span></div>
                                                                    <div class="w-full"><input
                                                                                class="form-control h-32px w-full fs-6 bg-white"
                                                                                type="text" name="vd_contact_name"
                                                                                id="vd_contact_name"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-6 hidden768">
                                                <div></div>
                                            </div>
                                            <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">딜러 웹사이트</div>
                                                                    <div class="w-full"><input
                                                                                class="form-control h-32px w-full fs-6 bg-white"
                                                                                type="text" name="vd_dealer_website"
                                                                                id="vd_dealer_website"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-6 hidden768">
                                                <div></div>
                                            </div>
                                            <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">주소 <span
                                                                                style="color:red">*</span></div>
                                                                    <div class="w-full"><input
                                                                                class="form-control h-32px w-full fs-6 bg-white"
                                                                                type="text"
                                                                                name="vd_listing_address1"
                                                                                id="vd_listing_address1"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>


                                            <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">이메일 <span
                                                                                style="color:red">*</span></div>
                                                                    <div class="w-full"><input
                                                                                class="form-control h-32px w-full fs-6 bg-white"
                                                                                type="email" name="vd_contact_email"
                                                                                id="vd_contact_email"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-6 hidden768">
                                                <div></div>
                                            </div>

                                            <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">연락처 <span
                                                                                style="color:red">*</span></div>
                                                                    <div class="w-full"><input
                                                                                class="form-control h-32px w-full fs-6 bg-white"
                                                                                type="text" name="vd_contact_phone"
                                                                                id="vd_contact_phone"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-6 hidden768">
                                                <div></div>
                                            </div>
                                            <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="w-110px">거래 지역 선택 <span
                                                                                style="color:red">*</span></div>
                                                                    <div class="w-150px">
                                                                        <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60"
                                                                                id="vd_state_code"
                                                                                name="vd_state_code"
                                                                                onchange="GET_SELECT_CITY_NAME('vd','all');">
                                                                        {{SELECT_STATE_CODE}}
                                                                        </select>
                                                                    </div>
                                                                    <div class="w-150px">
                                                                        <select class="form-select rounded p-1 text-gray-900 text-opacity-60"
                                                                                id="vd_city_name"
                                                                                name="vd_city_name">
                                                                            <option value="">도시전체</option>
                                                                        </select>
                                                                        <div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-6 hidden768">
                                                <div></div>
                                            </div>

                                            <div class="col-12">
                                                <div><textarea
                                                            class="form-control h-250px w-full fs-6 bg-white mt-1"
                                                            type="text" placeholder="딜러소개"
                                                            name="vd_dealer_introduction"
                                                            id="vd_dealer_introduction"></textarea></div>
                                            </div>


                                            <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
                                                <div class="dots"></div>
                                                <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                            </div>

                                            <div class="col-12 md:col-8">
                                                <input type="hidden" name="vd_logo_url_exist" id="vd_logo_url_exist" value="">
                                                <div class="step-input-group" data-step="1">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label" id="vd_logo">
                                                            <div class="preview-box"><img src="#"
                                                                                          class="image-preview">
                                                            </div>
                                                            
                                                            <span class="placeholder-text">로고 업로드 (클릭) <span
                                                                        style="color:red">*</span></span>
                                                            <div class="btn-remove-x" data="vd_logo_url_exist" style="display: none;"></div>
                                                            <input type="file" name="vd_logo_url" id="vd_logo_url"
                                                                   accept=".jpg, .jpeg, .png, .gif" class="real-file-input"
                                                                   style="display: none;">
                                                        </label>
                                                    </div>
                                                </div><!-- 로고 이미지 업로드 -->
                                                <input type="hidden" name="vd_main_image_url_exist" id="vd_main_image_url_exist" value="">
                                                <div class="step-input-group" data-step="4">
                                                    <div class="custom-file-container">
                                                        <label class="custom-input-label"  id="vd_main_image">
                                                            <div class="preview-box"><img src="#"
                                                                                          class="image-preview">
                                                            </div>
                                                            
                                                            <span class="placeholder-text">딜러 사진 업로드 (클릭) <span
                                                                        style="color:red">*</span></span>
                                                            <div class="btn-remove-x" data="vd_main_image_url_exist" style="display: none;"></div>
                                                            <input type="file" name="vd_main_image_url"
                                                                   id="vd_main_image_url" accept=".jpg, .jpeg, .png, .gif"
                                                                   class="real-file-input" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div><!-- 로고 이미지 업로드 -->
                                            </div><!-- 왼쪽업로드 -->


                                            <div class="col-12 md:col-4 text-center">
    <img src="/ad/ad_17.png" data-src="/ad/ad_17.png" alt="image"
         data-uc-img="loading: lazy">
    <!--button type="button" class="btn-preview-ad" data-prefix="vd" data-type="vehicle">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        </svg>
        미리보기
    </button-->
</div>

                                        </div>


                                    </div>
                                </div>
                            </div><!-- 광고게시정보 -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->


    </div><!-- 라디오버튼 4 내용 -->
    </div>

    


    <!-- Section end -->

    <div id="pay_button">
    <button class="btn btn-primary2 btn-md mt-1 fs-5" type="submit" style="width:100% !important;" ><i
                class="fa fa-check"></i> 수정    </button>
    </div>


</form>
<!-- Section end -->
<script>

var save_method = "{{T_SAVE_METHOD}}";
var listing_id = {{T_LISTING_ID}};

</script>
<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script defer src="/js/ad/ad_request_update.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
