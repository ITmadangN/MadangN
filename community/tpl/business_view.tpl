<!-- INCLUDE FILE '../include/header.php' -->

<!-- Section start -->
<div class="breadcrumbs panel z-1 py-2 bg-gray-25 ">
    <div class="max-w-xl">
        <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;">
            <div class="fw-semibold fs-5">비즈니스</div>
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="/">Home</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="/community/">커뮤니티</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><span class="text-primary fw-semibold">비즈니스</span></li>
            </ul>
        </div>
    </div>
</div><!-- Top title-->

<div class="section panel overflow-hidden mb-2 mt-2">
    <input type="hidden" id="parent_code" value="{{T_PARENT_CODE}}">
    <input type="hidden" id="parent_id" value="{{T_PARENT_ID}}">
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
                                        <div class="post-media panel overflow-hidden hstack gap-2 align-items-start">
                                            <div class="image-container">
                                                <img src="{{T_MAIN_IMAGE_URL}}" alt="" style="max-width:200px; max-height:60px !important"/>
                                            </div>
                                            <div class="vstack gap-1">
                                                <div class="fw-bold">{{T_COMPANY_NAME}}</div>
                                                <h3 class="post-title h6 m-0">
                                                    <span class="text-dark fw-bold hover:text-primary">{{T_TITLE}}</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </article>                                    
                                    <!--article class="post type-post panel uc-transition-toggle vstack gap-0">
                                        <div class="post-header panel vstack gap-1 mt-1">
                                            <h3 class="post-title h6 m-0">
                                                <span class="text-dark fw-bold hover:text-primary">{{T_TITLE}}</span>
                                            </h3>
                                        </div>
                                    </article-->
                                </div>
                            </div>
                        </div><!-- Title -->


                        <div class="panel row child-cols-12 md:child-cols pt-3 border-bottom pb-3">

                            <div class="col-12 md:col-6">
                                <div>
                                    <article class="post type-post panel uc-transition-toggle">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div class="w-16px"><i class="fa fa-envelope"></i></div>
                                                    <div class="w-48px">직종</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                        <span>{{T_BUSINESS_TYPE}}</span></div>
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
                                                    <div class="w-48px">연럭처</div>
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

                        <div class="mt-2 pt-1 pb-1">
                            {{T_IMG1}}
                            {{T_CONTENT}}
                        </div>
                        <!-- IF START 'UPDATE_DELETE' -->
                        <div class="mt-1 d-flex gap-narrow justify-end"> <a href="javascript:return false;" onclick="GO_UPDATE('{{T_ID}}');" class="btn btn-primary2 btn-sm2">수정</a> <a href="javascript:return false;" class="btn btn-gray btn-sm2" onclick="GO_DELETE('{{T_ID}}')">삭제</a></div>
                        <!-- IF END 'UPDATE_DELETE' -->
                        <!-- IF START 'PREMIUM_UPDATE' -->   
                        <div class="mt-1 d-flex gap-narrow justify-end"> <a href="/ad/ad_request_update.php?id={{T_ID}}&ad_method=business_platinum" class="btn btn-primary2 btn-sm2">유료 광고 수정</a></div>
                         <!-- IF END 'PREMIUM_UPDATE' -->
                    </div>
                </div>
            </div> <!--Content end-->


            <!--Commnet start-->
            <div id="blog-comment" class="panel mt-4">
                <h4 class="h5 mb-4">댓글</h4>
                <ol id="result_reply">

                </ol>
                <div class="spacer-single"></div>
                <div class="mt-2">
                    <div class="panel vstack gap-1 lg:gap-2 uc-sticky" data-uc-sticky="bottom: true; offset: 40;">
                        <form class="panel vstack gap-2 lg:gap-3 mt-2" action="?">
                            <div class="row g-2 child-cols-12 lg:child-cols-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="r_user_nickname" id="r_user_nickname" placeholder="이름" value="{{T_SS_NICKNAME}}" readonly>
                                </div>

                            </div>
                            <div class="form-group">
                                <textarea class="form-control w-full bg-white" rows="5" name="r_comments" id="r_comments"
                                          placeholder="내용"></textarea>
                            </div>

                            {{T_REPLY_WRITE}}
                        </form>
                    </div>
                </div>
            </div><!--Commnet end-->

        </div>
    </div>
</div>


<!-- Section end -->


<!-- 검색 Start -->

<div class="mb-3 bg-gray-25 p-2 rounded">
    <form name="" action="" method="post">
        <div class="vstack sm:hstack items-start justify-between gap-4">
            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12 w-150px" name="s_business_type" id="s_business_type">
                    {{S_SELECT_BUSINESS_TYPE}}
                </select>
                <select class="form-select rounded p-12 w-150px" name="s_state_code" id="s_state_code"
                       onchange="GET_CITY_NAME();">
                    {{S_SELECT_STATE_CODE}}
                </select>

                <div class="custom-dropdown-container">
                    <div class="form-select rounded p-12 text-start cursor-pointer" id="cityBtn">
                        <span id="cityLabel">도시 전체</span>
                    </div>
                    <div class="dropdown-options shadow" id="cityMenu">
                    </div>
                </div>
            </div>
            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12" name="s_kind" id="s_kind">
                    {{S_SELECT_BUSINESS_KIND}}
                </select>
                <input class="form-control form-control-sm h-42px fs-6 bg-white" name="s_keyword" id="s_keyword"
                       type="text" placeholder="검색어를 입력하세요" onkeydown="return event.keyCode !== 13;">

               <button class="btn btn-primary btn-sm" style="width:120px !important;" onclick="GET_PAGE();" type="button">검색</button>
            </div>
        </div>
    </form>

</div> <!-- 검색 End -->


<!-- Section start -->
<div class="section panel overflow-hidden-x mt-n3">
    <div class="section-outer panel py-2">
        <div class="head_title">
            <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>PLATINUM
            </h3>

        </div>
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1"
                         id="result_platinum">


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Section end --><!-- PLATINUM end -->


<!-- Section start -->
<!--
<div class="section panel overflow-hidden mt-2">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title3">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>일반리스팅
                </h3>
            </div>
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top"
                       style="min-width:600px;">

                    <colgroup>
                        <col width="10%"/>
                        <col width="10%"/>
                        <col width="15%"/>
                        <col width="/"/>
                        <col width="15%"/>
                        <col width="10%"/>


                    </colgroup>
                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                    <tr>
                        <th>번호</th>
                        <th>직종</th>
                        <th>지역</th>
                        <th>제목</th>
                        <th>등록자</th>
                        <th>등록일</th>

                    </tr>
                    </thead>
                    <tbody id="result_regular">

                    </tbody>
                </table>
            </div>


            <div id="result_pagging">

            </div>


        </div>
    </div>
</div>
-->
<!-- Section end --><!-- 구합니다 end -->


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/business_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->

