<!-- INCLUDE FILE '../include/header.php' -->


<style>

    .img_log_iibiz {
        max-width: 110px !important;
        max-height: 30px !important;
    }

    .platinum_img_log_iibiz {
        max-width: 150px !important;
        max-height: 50px !important;
    }

    col-1, .col-2 { flex: 0 0 48%; }
.col-3 { flex: 0 0 100%; margin-top: 4px; }

@media (min-width: 768px) {
  .col-1 { flex: 0 0 15%; }
  .col-2 { flex: 0 0 20%; }
  .col-3 { flex: 1; margin-top: 0; }
}

.search-box-1 { flex: 0 0 48.5%; }
.search-box-2 { flex: 0 0 48.5%; }
.search-box-3 { flex: 0 0 100%; margin-top: 4px; }

@media (min-width: 768px) {
  .search-box-1 { flex: 0 0 15%; }
  .search-box-2 { flex: 1; margin-top: 0; } 
  .search-box-3 { flex: 0 0 100px; margin-top: 0; }
}
</style>

<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot"
                                                              class="pr-10"/>{{T_ADVERTISING_LEVEL}}</h3>
                        </div>
                    </div>
                    <div class="block-content border p-2 mt-n1" style="border-top:2px solid #000 !important;">


                        <div class="panel row child-cols-12 border-bottom pb-3 pt-2 md:pt-0">
                            <div class="col-12">
                                <div>
                                    <article class="post type-post panel uc-transition-toggle vstack gap-0">
                                        <!--div class="post-media panel overflow-hidden hstack gap-2">
                                            <div class="image-container"><img src="{{T_LOG_IMAGE_URL}}" alt="" style="max-width:150px; max-height:40px !important"/></div>
                                            <div class="fw-bold mt-n3 sm:mt-0">{{T_COMPANY_NAME}}</div>
                                        </div>
                                        <div class="post-header panel vstack gap-1 mt-n1">
                                            <h3 class="post-title h6 m-0">
                                                <span class="text-dark fw-bold hover:text-primary">{{T_TITLE}}</span>
                                            </h3>
                                        </div-->
                                        <div class="post-media panel overflow-hidden hstack gap-2 align-items-start">
                                            <div class="image-container">
                                                <img src="{{T_LOG_IMAGE_URL}}" alt="" style="max-width:200px; max-height:60px !important"/>
                                            </div>
                                            <div class="vstack gap-1">
                                                <div class="fw-bold">{{T_COMPANY_NAME}}</div>
                                                <h3 class="post-title h6 m-0">
                                                    <span class="text-dark fw-bold hover:text-primary">{{T_TITLE}}</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div><!-- Title -->


                        <div class="panel row child-cols-12 md:child-cols pt-3  pb-3 border-bottom ">

                            <div class="col-12 md:col-6">
                                <div>
                                    <article class="post type-post panel uc-transition-toggle">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div class="w-16px"><i class="fa fa-th-list"></i></div>
                                                    <div class="w-48px">직종</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                        <span>{{T_JOB_TYPE}}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div>
                                    <article class="post type-post panel uc-transition-toggle mt-narrow">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div class="fs-5 w-16px"><i class="fa fa-globe"></i></div>
                                                    <div class="w-48px">지역</div>
                                                    <div class="text-gray-900  text-opacity-80 fs-6">
                                                        <span>{{T_LOCATION}}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!-- IF START 'E15 -->
                                <div>
                                    <article class="post type-post panel uc-transition-toggle mt-narrow">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div class="fs-5 w-16px"><i class="fa fa-globe"></i></div>
                                                    <div class="w-48px">직원</div>
                                                    <div class="text-gray-900  text-opacity-80 fs-6">
                                                        <span>{{T_HAS_15_PLUS_EMPLOYEESN}}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>                                
                                <!-- IF END 'E15 -->
                            </div>

                            <div class="child-cols-12">
                                <div>
                                    <article class="post type-post panel uc-transition-toggle">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div class="w-16px"><i class="fa fa-user"></i></div>
                                                    <div class="w-48px">담당자</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">{{T_CONTACT_NAME}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div>
                                    <article class="post type-post panel uc-transition-toggle mt-narrow">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div class="fs-7 w-16px"><i class="fa fa-envelope"></i></div>
                                                    <div class="w-48px">이메일</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">{{T_CONTACT_EMAIL}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div>
                                    <article class="post type-post panel uc-transition-toggle mt-narrow">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div class="w-16px"><i class="fa fa-phone-square"></i></div>
                                                    <div class="w-48px">연락처</div>
                                                    <div class="text-primary text-opacity-80 fs-6"><a class="text-none"
                                                                                                      href="tel:">{{T_CONTACT_PHONE}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div><!-- Contents-->
                        
                        <figure class="featured-image mt-2" style="margin-bottom:0px;position:static; overflow:visible;">
                             {{T_SUB_IMAGE_01_URL}}
                    {{T_SUB_IMAGE_02_URL}}
                    {{T_SUB_IMAGE_03_URL}}
                    {{T_SUB_IMAGE_04_URL}}
                    {{T_SUB_IMAGE_05_URL}}
                    {{T_JOB_OPENING_INFORMATION}}
                     <!-- IF START 'UPDATE_DELETE' -->   
                        <div class="mt-1 d-flex gap-narrow justify-end"> <a href="javascript:return false;" onclick="GO_UPDATE('{{T_ID}}','{{T_SID}}');" class="btn btn-primary2 btn-sm2">수정</a> <a href="javascript:return false;" class="btn btn-gray btn-sm2" onclick="GO_DELETE('{{T_ID}}')">삭제</a></div>
                     <!-- IF END 'UPDATE_DELETE' -->
                     <!-- IF START 'PREMIUM_UPDATE' -->   
                        <div class="mt-1 d-flex gap-narrow justify-end"> <a href="/ad/ad_request_update.php?id={{T_ID}}&ad_method={{AD_METHOD}}" class="btn btn-primary2 btn-sm2">유료 광고 수정</a></div>
                     <!-- IF END 'PREMIUM_UPDATE' -->
                        </figure>

                        <!--figure class="featured-image mt-2" style="margin-bottom:0px;">
                            <figure class="featured-image m-0 ratio ratio-2x1  uc-transition-toggle overflow-hidden">
                         
                            </figure>
                        </figure-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Section end -->


<!-- Section start -->

<!--div class="section panel overflow-hidden-x mt-2 mb-2">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner border">

                <div class="panel border-bottom p-2 bg-gray-25">
                    <div class="col-12">
                        <div class="post-header panel">
                            <h3 class="post-title h6 m-0">
                                <span class="text-dark fw-bold hover:text-primary">{{T_TITLE}}</span>
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="p-3"  style="position:static; overflow:visible;">
                    {{T_SUB_IMAGE_01_URL}}
                    {{T_SUB_IMAGE_02_URL}}
                    {{T_SUB_IMAGE_03_URL}}
                    {{T_SUB_IMAGE_04_URL}}
                    {{T_SUB_IMAGE_05_URL}}
                    {{T_JOB_OPENING_INFORMATION}}
                </div>
                
                <br>
            </div>
        </div>
    </div>
</div-->


<!-- Section End -->


<!-- 검색 Start -->

<div class="mb-3 bg-gray-25 p-2 rounded">
    <form name="formp" action="ajax/ajax_recruit.php" method="post">
                                         <div class="items-start justify-between gap-1 mb-1" style="display:flex; flex-wrap: wrap;">
  
<div class="custom-dropdown-container col-1">
    <div class="form-select rounded p-12 text-start cursor-pointer sme" id="multiBtn">
      <span id="multiLabel" class="gry">전체</span>
    </div>
    <div class="dropdown-options shadow" id="multiMenu">
    {{S_CHECKBOX_JOB_TYPE}}
    <!--
      <label><input type="checkbox" name="city[]" value="1"> 사무직</label>
      <label><input type="checkbox" name="city[]" value="2"> 교육직</label>
      <label><input type="checkbox" name="city[]" value="3"> 전문직</label>
      <label><input type="checkbox" name="city[]" value="4"> 기술직</label>
      -->
    </div>
  </div>

  <div class="col-2">
    <select class="form-select rounded p-12 fs-6 text-gray-400 w-100" name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
      {{S_SELECT_STATE_CODE}}
    </select>
  </div>

 <div class="col-3">
    <select class="js-example-basic-multiple fs-6 w-100" name="s_city_name[]" id="s_city_name" multiple="multiple">
      {{S_SELECT_CITY_NAME}}
    </select>
  </div>

</div>
                      
                     <div class="items-start justify-between gap-1 mb-1" style="display:flex; flex-wrap: wrap;">


  <div class="search-box-1">
    <select class="form-select rounded p-12 fs-6 text-gray-400 w-100" name="s_kind" id="s_kind">
      {{S_SELECT_RECURIT_KIND}}
    </select>
  </div>


  <div class="search-box-2">
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-100" type="text" value="{{S_KEYWORD}}" placeholder="검색어를 입력하세요!" name="s_keyword" id="s_keyword" onkeydown="return event.keyCode !== 13;">
  </div>


  <div class="search-box-3">
    <button class="btn btn-primary btn-sm h-40px w-100 tds" onclick="GET_PAGE();" type="button">검색</button>
  </div>

</div>
    </form>

</div> <!-- 검색 End -->
<!-- Section start -->
<div class="section panel overflow-hidden-x" style="margin-top:-0.5rem !important;">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>PLATINUM
                </h3>
            </div>
            <div class="job-grid">
                <div class="job-card">
                    <div class="pp-list" id="result_platinum">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Section end --><!-- PLATINUM end -->

<script>
    var g_page = {{G_PAGE}};
</script>    
<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/recruit.js"></script>
<script defer src="/js/community/recruit_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>

<!-- INCLUDE FILE '../include/footer.php' -->