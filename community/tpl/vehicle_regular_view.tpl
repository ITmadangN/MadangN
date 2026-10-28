<!-- INCLUDE FILE '../include/header.php' -->

<!-- INCLUDE FILE '../include/common_fm.php' -->

<ul class="v-tab-container">
    {{T_DEALER_HTML}}
</ul><!-- Top button-->


<!-- Section start -->
<div class="breadcrumbs panel z-1 py-2 mb-3 bg-gray-25 border-top border-bottom">
    <div class="max-w-xl">
        <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;">
            <div class="fw-bold fs-4 text-success">{{T_TITLE}}</div>
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="/">Home</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="/community/">커뮤니티</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="/community/vehicle.php">자동차</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><span class="text-primary fw-semibold">일반</span></li>
            </ul>
        </div>
    </div>
</div><!-- Top title-->


<article class="product type-product single product-single pb-2">
    <input type="hidden" id="parent_code" value="{{T_PARENT_CODE}}">
    <input type="hidden" id="parent_id" value="{{T_PARENT_ID}}">
    <div class="max-w-xl">
        <div class="product-header panel">
            <div class="row child-cols-12 gy-4 gx-3">
                <div class="col-12 lg:col-7">

                    <div class="product-slider panel swiper-parent" style="position:relative;">
                        <div class="sale">판매중</div>
                        <div class="vstack gap-1">
                            <div class="panel">
                                <div class="swiper swiper-main h-100 swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden"
                                     data-uc-swiper="connect: .swiper-thumbs; items: 1; gap: 8; dots: .swiper-pagination; disable-class: d-none;">
                                    <div class="swiper-wrapper" data-uc-lightbox="" id="swiper-wrapper-bd2b80c94d1b6ce3"
                                         aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                        <!-- LOOP START 'T_LOOP' -->
                                        <div class="{{T_LOOP.T_CLASS}}"
                                             style="width: 592px; margin-right: 8px;" role="group" aria-label="{{T_LOOP.T_NO}}">
                                            <div class="product type-product">
                                                <figure class="featured-image m-0 ratio ratio-4x3 uc-transition-toggle overflow-hidden bg-gray-25">
                                                    <img class="media-cover image uc-transition-opaque"
                                                         src="{{T_LOOP.T_IMG}}"
                                                         data-src="{{T_LOOP.T_IMG}}" alt="#"
                                                         data-uc-img="loading: lazy">
                                                </figure>
                                            </div>
                                        </div>
                                        <!-- LOOP END 'T_LOOP' -->
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class="swiper-nav swiper-next btn btn-xs md:btn-md w-32px md:w-40px xl:w-56px h-32px md:h-40px xl:h-56px bg-white text-dark rounded-circle shadow-xs position-absolute top-50 end-0 translate-middle-y me-narrow md:me-2 z-1"
                                         tabindex="0" role="button" aria-label="Next slide"
                                         aria-controls="swiper-wrapper-bd2b80c94d1b6ce3" aria-disabled="false">
                                        <i class="unicon-chevron-right icon-1 md:icon-2"></i>
                                    </div>
                                    <div class="swiper-nav swiper-prev btn btn-xs md:btn-md w-32px md:w-40px xl:w-56px h-32px md:h-40px xl:h-56px bg-white text-dark rounded-circle shadow-xs position-absolute top-50 start-0 translate-middle-y ms-narrow md:ms-2 z-1 uk-opacity-40 d-none"
                                         tabindex="-1" role="button" aria-label="Previous slide"
                                         aria-controls="swiper-wrapper-bd2b80c94d1b6ce3" aria-disabled="true">
                                        <i class="unicon-chevron-left icon-1 md:icon-2"></i>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="swiper swiper-thumbs swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden"
                                     data-uc-swiper="items: 5; gap: 4;" data-uc-swiper-s="items: 10; gap: 8;">
                                    <div class="swiper-wrapper" id="swiper-wrapper-5bc8437a1a7c2dfd" aria-live="polite"
                                         style="transform: translate3d(0px, 0px, 0px);">
                                        <!-- LOOP START 'T_LOOP' -->
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible"
                                             style="width: 112px; margin-right: 8px;" role="group" aria-label="{{T_LOOP.T_NO}}">
                                            <div class="product type-product h-100">
                                                <figure class="featured-image m-0 ratio ratio-4x3 uc-transition-toggle overflow-hidden bg-gray-25">
                                                    <img class="media-cover image uc-transition-opaque"
                                                         src="{{T_LOOP.T_IMG}}"
                                                         data-src="{{T_LOOP.T_IMG}}" alt="#"
                                                         data-uc-img="loading: lazy">
                                                </figure>
                                            </div>
                                        </div>
                                        <!-- LOOP END 'T_LOOP' -->
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Left img-->

                <div class="col-12 lg:col-5">
                    <div class="product-details panel vstack border p-2">
                        <!--h1 class="product-title fs-6 fw-bold m-0 border-bottom pb-1"><img
                                    src="/community/images/car1.jpg" alt="" style="width:40px;"/> &nbsp; DSP모터스 </h1-->
                        <div class="hstack justify-between items-center gap-2">
                            <div class="product-price hstack gap-1 fs-4 mt-1">
                                <span class="price fw-bolder text-danger">${{T_LISTING_PRICE}}</span>
                            </div>

                        </div>

                        <ul class="nav-y mt-1 fs-6 fw-medium">
                            <li class="hstack gap-narrow border-top pt-1">
                                <span class="opacity-60 me-narrow"><i class="fa fa-user"></i></span>
                                <span>{{T_SELLER_NAME}}</span>
                            </li>
                            <li class="hstack gap-narrow">
                                <span class="opacity-60 me-narrow fs-7"><i class="fa fa-envelope"></i></span>
                                <a href="emailto:">{{T_SELLER_EMAIL}}</a>
                            </li>
                            <li class="hstack gap-narrow border-bottom pb-1">
                                <span class="opacity-60 me-narrow"><i class="fa fa-phone-square"></i></span>
                                <a class="text-primary" href="tel:">{{T_SELLER_PHONE}}</a>
                            </li>
                        </ul>

                        <p class="product-desc fs-6 my-2 bg-gray-25 p-2">
                            마당N은 사고팔고에서 중고거래에 대한 책임을 지지 않습니다.
                            판매자의 신용과 부정거래에 대해서 구매자는 조심하시기 바랍니다.

                        </p>
                        <form class="product-actions hstack gap-1 mt-0">
                            {{T_FM}}
                        </form>


                    </div>
                </div><!--Right info-->


            </div>
        </div>

    </div>
</article>


<!-- Market view end -->


<div class="section panel overflow-hidden mb-2 mt-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                    <div class="block-content border p-2" style="border-top:2px solid #000 !important;">
                        <div class="panel row child-cols-12 border-bottom pb-3 pt-2 md:pt-0">
                            <div class="col-12">
                                <div>
                                    <article class="post type-post panel uc-transition-toggle vstack gap-0">
                                        <div class="post-header panel vstack gap-1 mt-1">
                                            <h3 class="post-title h6 m-0">
                                                <span class="text-dark fw-bold hover:text-primary">차량정보</span>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div><!-- Title -->


                        <div class="panel row child-cols-12 md:child-cols border-bottom p-2">

                            <div class="col-12 md:col-6">
                                <div>
                                    <article class="post type-post panel uc-transition-toggle">
                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                    <div><i class="fa fa-building"></i></div>
                                                    <div class="w-100px">제조사</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">{{T_CAR_MAKER}}</div>
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
                                                    <div style="color:#666;"><i class="fa fa-calendar"></i></div>
                                                    <div class="w-100px">연식</div>
                                                    <div class="text-gray-900  text-opacity-80 fs-6">{{T_CAR_YEAR}}년식</div>
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
                                                    <div><i class="fa fa-paint-brush"></i></div>
                                                    <div class="w-100px">색상</div>
                                                    <div class="text-gray-900  text-opacity-80 fs-6">{{T_CAR_COLOR}}</div>
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
                                                    <div><i class="fa fa-tachometer"></i></div>
                                                    <div class="w-100px">사고유무</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">{{T_CAR_ACCIDENT_HISTORY}}</div>
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
                                                    <div><i class="fa fa-car"></i></div>
                                                    <div class="w-100px">모델</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">{{T_CAR_MODEL}}</div>
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
                                                    <div><i class="fa fa-tachometer"></i></div>
                                                    <div class="w-100px">주행거리</div>
                                                    <div class="text-gray-900 text-opacity-80 fs-6">{{T_CAR_MILEAGE}} miles</div>
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
                                                    <div><i class="fa fa-sitemap"></i></div>
                                                    <div class="w-100px">거래지역</div>
                                                    <div class="text-primary text-opacity-80 fs-6"> {{T_LOCATION}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>                                
                            </div>
                        </div><!-- Contents-->

                        <div class="panel p-2">
                            <div class="col-12 mt-1">
                                <div class="post-header panel hstack gap-1">
                                    <span class="text-gray-900 text-opacity-60" style="font-size: 18px"><i
                                                class="fa fa-check-circle"></i></span>
                                    <span class="text-gray-900 text-opacity-80 fs-4 fw-bold">옵션정보</span>
                                </div>
                                <div class="comul lh-3 fs-6 mt-2">
                                    <ul>
                                        <li>연료종류 : {{T_FUEL_TYPE}}</li>
                                        <li>차체 타입 : {{T_BODY_TYPE}}</li>
                                        <li>변속기 : {{T_TRANSMISSION}}</li>
                                        <li>기타 옵션 : {{T_OPTIONS_DESCRIPTION}}</li>
                                    </ul>

                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="post-header panel hstack gap-1">
                                    <span class="text-gray-900 text-opacity-60" style="font-size: 18px"><i
                                                class="fa fa-car"></i></span>
                                    <span class="text-gray-900 text-opacity-80 fs-4 fw-bold">추가설명</span>
                                </div>
                                <div class="comul lh-3 fs-6 mt-2"  style="overflow-wrap: break-word;">
                                    <ul>
                                        <li>{{T_DESCRIPTION}}</li>
                                    </ul>
                                </div>
                            </div><!-- 2 -->
                            <!-- IF START 'UPDATE_DELETE' -->
                            <div class="mt-1 d-flex gap-narrow justify-end"> <a href="javascript:return false;" onclick="GO_UPDATE('{{T_ID}}');" class="btn btn-primary2 btn-sm2">수정</a> <a href="javascript:return false;" class="btn btn-gray btn-sm2" onclick="GO_DELETE('{{T_ID}}')">삭제</a></div>
                            <!-- IF END 'UPDATE_DELETE' -->
                        </div>

                    </div>
                </div>
            </div> <!--Content end-->

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
                                <textarea class="form-control w-full bg-white" rows="5" name="r_comments" id="r_comments" placeholder="내용"></textarea>
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


<!--div class="mb-3 bg-gray-25 p-2 rounded mt-3">
    <form name="formp" id="formp" action="ajax/ajax_vehicle_regular.php" method="post">
        <div class="hstack items-center justify-between gap-1 mb-1" style="flex-wrap: wrap;">
                                         <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400" name="s_state_code" id="s_state_code"
                                                onchange="GET_CITY_NAME('all');" >
                                                {{S_SELECT_STATE_CODE}}
                                          </select>
                                        
                                          <select class="js-example-basic-multiple fs-6 w-60pro" name="s_city_name[]" id="s_city_name" multiple="multiple">
                                               {{S_SELECT_CITY_NAME}}                                          
                                          </select>
                                        <div class="w-276 d-flex items-start justify-between"> 
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="최소가격" id="s_min_price" value="{{S_MIN_PRICE}}"> ~
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="최대가격" id="s_max_price" value="{{S_MAX_PRICE}}">
                                        
                                       </div>

                                         <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400" id="s_car_maker" name="s_car_maker">
                                            {{S_SELECT_CAR_MAKER}}
                                            </select>
                                        
                                             마일
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128-2px" type="text" placeholder="최소마일" name="min_dist" id="min_dist" value="{{S_MIN_DIST}}"> ~
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128-2px" type="text" placeholder="최대마일" name="max_dist" id="max_dist" value="{{S_MAX_DIST}}">
                                        
                                       
                                            
                                            연식
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128-2px" type="text" placeholder="최소연식" name="min_car_year" id="min_car_year" value="{{S_MIN_CAR_YEAR}}"> ~
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128-2px" type="text" placeholder="최대연식" name="max_car_year" id="max_car_year" value="{{S_MAX_CAR_YEAR}}">

                                            
                                            <!--select class="form-select rounded p-12 w-10pro fs-6 text-gray-400" name="s_kind" id="s_kind">
                                            {{S_SELECT_VEHICLE_KIND}}
                                            </select>
                                             <input class="form-control form-control-sm h-40px fs-6 bg-white w-20pro" type="text" placeholder="검색어를 입력하세요!" name="s_keyword"
                                               id="s_keyword" value="{{S_KEYWORD}}"
                                               placeholder="검색어를 입력하세요" onkeydown="return event.keyCode !== 13;">
                                                <button class="btn btn-primary btn-sm w-15pro tds" onclick="GET_PAGE();" type="button">검색</button>
                                           </div>>
    </form>

</div--> <!-- 검색 End -->


<!-- Section start -->
<!--div class="section panel overflow-hidden mt-2">
    <div class="section-outer panel py-1">
        <div class="max-w-xl">
            <div class="head_title">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>일반</h3>
            </div>
            <div class="panel max-h-sm overflow-auto border border-gray-50 dark:border-gray-700">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium" style="min-width:800px;">

                    <colgroup>
                        <col width="8%"/>
                        <col width="10%"/>
                        <col width="10%"/>
                        <col width="8%"/>
                        <col width="/"/>
                        <col width="10%"/>
                        <col width="8%"/>
                        <col width="10%"/>
                        <col width="12%"/>


                    </colgroup>
                    <thead class="bg-primary text-white sticky-top z-1 text-center">
                    <tr>
                        <th>번호</th>
                        <th>사진</th>
                        <th>제조사</th>
                        <th>색상</th>
                        <th>주행거리</th>
                        <th>가격</th>
                        <th>연식</th>
                        <th>등록자</th>
                        <th>등록일</th>
                    </tr>
                    </thead>
                    <tbody id="result_html">
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


<div id="result_pagging">

</div-->


<script src="/js/libs/jquery.min.js"></script>
<script src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/vehicle_regular_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/community/fm.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>


<!-- INCLUDE FILE '../include/footer.php' -->