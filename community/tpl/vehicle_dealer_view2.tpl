<!-- INCLUDE FILE '../include/header.php' -->

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
                <li><span class="text-primary fw-semibold">프리미엄</span></li>
            </ul>
        </div>
    </div>
</div><!-- Top title-->


<article class="product type-product single product-single pb-2">
    <div class="max-w-xl">
        <div class="product-header panel">
            <div class="row child-cols-12 gy-4 gx-3">
                <div class="col-12 lg:col-9">

                    <div class="product-slider panel swiper-parent" style="position:relative;">
                        <div class="sale">판매중</div>
                        <div class="vstack gap-1">
                            <div class="panel">
                                <div class="swiper swiper-main h-100 swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden"
                                     data-uc-swiper="connect: .swiper-thumbs; items: 1; gap: 8; dots: .swiper-pagination; disable-class: d-none;">
                                    <div class="swiper-wrapper" data-uc-lightbox="" id="swiper-wrapper-bd2b80c94d1b6ce3"
                                         aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                        <!-- LOOP START 'T_LOOP' -->
                                        <div class="{{T_LOOP.T_CLASS}}" style="width: 592px; margin-right: 8px;" role="group" aria-label="{{T_LOOP.T_NO}}">
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
                                     data-uc-swiper="items: 5; gap: 4;" data-uc-swiper-s="items: 14; gap: 8;">
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

                <div class="col-12 lg:col-3">
                    <div class="product-details panel vstack border p-2">
                        <h1 class="product-title fs-6 fw-bold m-0 border-bottom pb-1"><img
                                    src="{{T_LOGO_IMG}}" alt="" style="width:40px;"/> &nbsp; {{T_COMPANY_NAME}} </h1>
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

                        <p class="fs-6 p-2 mt-n2">
                        <h1 class="fs-5 fw-bold mb-2"><img src="/community/images/dot.png" alt="dot"/> 차량구입문의</h1>
                        <form action="ajax/ajax_vehicle_dealer_view.php" method="post" name="formp" id="formp">
                            <div class="reg mt-n1">
                                <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text"
                                       name="r_name" id="r_name" placeholder="이름">
                                <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text"
                                       name="r_email" id="r_email" placeholder="이메일">
                                <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text"
                                       name="r_phone" id="r_phone" placeholder="연락처">
                                <textarea class="form-control w-full fs-6 rounded-0 mt-1 p-1" type="text"
                                          placeholder="내용" name="r_content" id="r_content" rows="2">이 자동차에 관심이 있습니다.
연락 주시기 바랍니다.</textarea>
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <div class="recaptcha-container">
                                    <div class="g-recaptcha"
                                         data-sitekey="6LevC4wsAAAAAHdXpPXCRp744rTf-fDcwCjPFC7w"></div>
                                </div>

                            </div>
                            <div class="mt-1"><button
                                        class="btn btn-xs btn-primary rounded-0 flex-1 text-none w-100">문의하기</button>
                            </div>

                        </form>

                        </p>


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
                                                <span class="text-dark fw-bold hover:text-primary">기본정보</span>
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
                                                    <div class="w-56px">제조사</div>
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
                                                    <div class="w-56px">연식</div>
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
                                                    <div class="w-56px">색상</div>
                                                    <div class="text-gray-900  text-opacity-80 fs-6">{{T_CAR_COLOR}}</div>
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
                                                    <div class="w-56px">모델</div>
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
                                                    <div class="w-56px">주행거리</div>
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
                                                    <div class="w-56px">거래지역</div>
                                                    <div class="text-primary text-opacity-80 fs-6"> {{T_LOCATION}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div><!-- Contents-->

                        <div class="panel p-3">
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
                            </div><!-- 1 -->

                            <div class="col-12 mt-3">
                                <div class="post-header panel hstack gap-1">
                                    <span class="text-gray-900 text-opacity-60" style="font-size: 18px"><i
                                                class="fa fa-car"></i></span>
                                    <span class="text-gray-900 text-opacity-80 fs-4 fw-bold">차량설명</span>
                                </div>
                                <div class="comul lh-3 fs-6 mt-2">
                                    <ul>
                                        <li>{{T_DESCRIPTION}}</li>
                                    </ul>
                                </div>
                            </div><!-- 2 -->
                            <!--div class="mt-1 d-flex gap-narrow justify-end"> <a href="javascript:return false;" onclick="GO_UPDATE('{{T_ID}}');" class="btn btn-primary2 btn-sm2">수정</a> <a href="javascript:return false;" class="btn btn-gray btn-sm2" onclick="GO_DELETE('{{T_ID}}')">삭제</a></div-->

                        </div>


                    </div>
                </div>
            </div> <!--Content end-->


        </div>
    </div>
</div>


<!-- Section end -->


<div class="mb-3 bg-gray-25 p-2 rounded mt-3">
    <form name="formp" id="formp" action="ajax/ajax_vehicle_dealer.php" method="post">
        <input type="hidden" name="dealer_id" id="dealer_id" value="{{T_DEALER_ID}}">
        <div class="vstack sm:hstack items-start justify-between gap-3">
            <div class="vstack items-start gap-1">
                <select class="form-select rounded p-12" name="s_state_code" id="s_state_code"
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
            <div class="vstack items-start gap-1">
                <select class="form-select rounded p-12" id="s_car_maker" name="s_car_maker">
                    {{S_SELECT_CAR_MAKER}}
                </select>
                <select class="form-select rounded p-12" id="s_car_year" name="s_car_year">
                    {{S_SELECT_CAR_YEAR}}
                </select>
            </div>
            <div class="vstack items-start gap-1">
                <div class="slider-wrapper">
                    <div class="price-label">가격 : <span id="price-display"></span></div>
                    <div id="slider-price" class="custom-slider"></div>
                    <input type="hidden" name="min_price" id="min_price">
                    <input type="hidden" name="max_price" id="max_price">
                </div>

                <div class="slider-wrapper">
                    <div class="price-label">마일 : <span id="dist-display"></span></div>
                    <div id="slider-dist" class="custom-slider"></div>
                    <input type="hidden" name="min_dist" id="min_dist">
                    <input type="hidden" name="max_dist" id="max_dist">
                </div>
            </div>
            <div class="hstack items-center gap-1">
                <select class="form-select rounded p-12" name="s_kind" id="s_kind">
                    {{S_SELECT_VEHICLE_KIND}}
                </select>
                <input class="form-control form-control-sm h-42px fs-6 bg-white" type="text" name="s_keyword"
                       id="s_keyword" placeholder="검색어를 입력하세요" onkeydown="return event.keyCode !== 13;">
                <button class="btn btn-primary btn-sm" style="width:120px !important;"  onclick="GET_PAGE();" type="button">검색</button>
            </div>
        </div>
    </form>

</div> <!-- 검색 End -->


<!-- Section start -->
<div class="section panel overflow-hidden-x">
    <div class="section-outer panel">

        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1" id="result_html">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Section end --><!-- 자동차 프리미엄 end -->

<div id="result_pagging">

</div>
<!-- Paging -->


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/vehicle_dealer.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->