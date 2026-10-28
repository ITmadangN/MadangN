<?php
$main = "3";
$sub = "5";
include('../include/header.php');
?>


    <ul class="v-tab-container">
        <li>
            <a href="/community/vehicle_view.php" class="text-none">
                <div class="v-tab-item on">
                    <img src="/community/images/car1.jpg" alt=""/>
                    <div class="v-tab-text">DSP모터스</div>
                </div>
            </a>
        </li>
        <li>
            <a href="/community/vehicle_view.php" class="text-none">
                <div class="v-tab-item">
                    <img src="/community/images/car2.jpg" alt=""/>
                    <div class="v-tab-text">에덴자동차</div>
                </div>
            </a>
        </li>
        <li>
            <a href="/community/vehicle_view.php" class="text-none">
                <div class="v-tab-item">
                    <img src="/community/images/car3.jpg" alt=""/>
                    <div class="v-tab-text">한국자동차</div>
                </div>
            </a>
        </li>
        <li>
            <a href="/community/vehicle_default.php" class="text-none">
                <div class="v-tab-item">
                    <div style="height:30px; display:flex; align-items:center; justify-content:center; color:#ccc;margin-bottom: 8px;">
                        <i class="fa fa-car" style="font-size:24px;"></i>
                    </div>
                    <div class="v-tab-text">일반</div>
                </div>
            </a>
        </li>
    </ul><!-- Top button-->


    <div class="section panel overflow-hidden mb-2 mt-2">
        <div class="section-outer panel">
            <div class="max-w-lg">
                <div class="section-inner">
                    <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                        <div class="block-content border p-2" style="border-top:2px solid #000 !important;">
                            <div class="panel row child-cols-12 md:child-cols border-bottom pb-2">

                                <div class="col-12 md:col-2 mt-narrow">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="v-tab-item">
                                                <img src="/community/images/car1.jpg" alt=""/>
                                                <div class="v-tab-text">DSP모터스</div>
                                            </div>
                                        </article>
                                    </div>

                                </div>
                                <div class="col-12 md:col-4 mt-1 rds">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                <div class="post-header panel vstack justify-between gap-1">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div><i class="fa fa-user"></i></div>
                                                        <div class="w-56px">판매자</div>
                                                        <div class="sep"></div>
                                                        <div class="text-gray-900 text-opacity-80 fs-6">David kim</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle mt-1">
                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                <div class="post-header panel vstack justify-between gap-1">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div><i class="fa fa-building"></i></div>
                                                        <div class="w-56px">회사명</div>
                                                        <div class="sep"></div>
                                                        <div class="text-gray-900  text-opacity-80 fs-6">DSP모터스</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle mt-1">
                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                <div class="post-header panel vstack justify-between gap-1">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div><i class="fa fa-phone-square"></i></div>
                                                        <div class="w-56px">연락처</div>
                                                        <div class="sep"></div>
                                                        <div class="text-primary text-opacity-80 fs-6"><a
                                                                    class="text-none" href="tel:">832-222-3212</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                                <div class="child-cols-12 mt-1">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                <div class="post-header">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  d-flex z-1">
                                                        <div class="fs-5"><i class="fa fa-globe"></i></div>
                                                        <div class="w-56px">주소</div>
                                                        <div class="sep"></div>
                                                        <div class="text-gray-900 text-opacity-80 fs-7">2203 Venice Blvd
                                                            #201 Los Angeles, CA 90006
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle mt-1">
                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                <div class="post-header panel vstack justify-between gap-1">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  d-flex z-1">
                                                        <div class="fs-7"><i class="fa fa-envelope"></i></div>
                                                        <div class="w-56px">이메일</div>
                                                        <div class="sep"></div>
                                                        <div class="text-gray-900 text-opacity-80 fs-6">
                                                            liam.lee@gmail.com
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle mt-1">
                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                <div class="post-header panel vstack justify-between gap-1">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                        <div><i class="fa fa-home"></i></div>
                                                        <div class="w-56px">웹사이트</div>
                                                        <div class="sep"></div>
                                                        <div class="text-primary text-opacity-80 fs-6"><a
                                                                    class="text-none" href="http://www.wooricar.com"
                                                                    target="_blank">http://www.wooricar.com</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div><!-- Top Contents-->

                            <div class="mt-2 pt-1 pb-1">
                                <div class="panel row child-cols-12 md:child-cols pb-2">
                                    <div class="col-12 md:col-3 mt-narrow">
                                        <div>
                                            <article class="post type-post panel uc-transition-toggle">
                                                <figure class="featured-image m-0 ratio ratio-3x4 uc-transition-toggle overflow-hidden bg-gray-25">
                                                    <img src="/community/images/man.jpg"
                                                         data-src="/community/images/man.jpg" alt="image"
                                                         data-uc-img="loading: lazy">
                                                </figure>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="child-cols-12 mt-narrow">
                                        <div>
                                            <article class="post type-post panel rds">
                                                <p>

                                                    안녕하세요! 항상 가족과 같은 마음으로 정성과 성의를 다해 고객님을 모시는<br/>

                                                    프리미엄 딜러 사무엘 지 (Mr.JI)입니다.*^^*<br/>
                                                    고객여러분의 성원에 힘입어 전차량! 미주 전지역 최저가 특가판매 약속합니다!!!<br/>
                                                    *특가 판매 행사는 [사무엘 지] 고객님께만 특별히 약속합니다.<br/><br/>

                                                    ▶고객님께서 타셨던 중고차도 전화만 주시면 무료 출장 견적 봐드립니다.<br/>
                                                    ▶최상의 품질을 보장하며 최고의 만족을 약속 드립니다.<br/>
                                                    ▶ 차량에 대한 상담을 원하시면 언제든 주저마시고 연락주십시오.<br/>


                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Contents-->
                        </div>
                    </div>
                </div> <!--Content end-->


            </div>
        </div>
    </div>


    <!-- Section end -->


    <div class="mb-3 bg-gray-25 p-2 rounded">
        <form name="" action="" method="post">
            <div class="vstack sm:hstack items-start justify-between gap-3">
                <div class="vstack items-start gap-1">
                    <select class="form-select rounded p-12" id="" name="">
                        <option value="" selected="">주</option>
                        <option value="1">주1</option>
                        <option value="2">주2</option>
                    </select>
                    <select class="form-select rounded p-12" id="" name="">
                        <option value="" selected="">도시</option>
                        <option value="1">도시11</option>
                        <option value="2">도시22</option>
                    </select>
                </div>
                <div class="vstack items-start gap-1">
                    <select class="form-select rounded p-12" id="" name="">
                        <option value="" selected="">제조사</option>
                        <option value="1">제조사1</option>
                        <option value="2">제조사2</option>
                    </select>
                    <select class="form-select rounded p-12" id="" name="">
                        <option value="" selected="">연식</option>
                        <option value="1">연식1</option>
                        <option value="2">연식2</option>
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
                    <select class="form-select rounded p-12" id="" name="">
                        <option value="" selected="">구분</option>
                        <option value="1">구분1</option>
                        <option value="2">구분2</option>
                    </select>
                    <input class="form-control form-control-sm h-42px fs-6 bg-white" type="text"
                           placeholder="검색어를 입력하세요">
                    <a href="" class="btn btn-primary btn-sm" style="width:120px !important;">검색</a>
                </div>
            </div>
        </form>

    </div> <!-- 검색 End -->


    <!-- Section start -->
    <div class="head_title">
        <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>PLATINUM</h3>
    </div>


    <!-- Section start -->
    <div class="section panel overflow-hidden-x">
        <div class="section-outer panel">

            <div class="max-w-xl">
                <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                    <div class="block-content panel">
                        <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1">
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn1.jpg" data-src="/community/images/cn1.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="/community/vehicle_view2.php" class="position-cover"
                                               data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="/community/vehicle_view2.php"> 혼다
                                                        Civic</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                $9,500
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn2.jpg" data-src="/community/images/cn2.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="/community/vehicle_view.php" class="position-cover"
                                               data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="/community/vehicle_view.php"> 2011 TOYOTA
                                                        Camry LE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                $9,500
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn3.jpg" data-src="/community/images/cn3.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="/community/vehicle_view.php" class="position-cover"
                                               data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="/community/vehicle_view.php"> 2018
                                                        Coachmen Leprechaun</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                $9,500
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn4.jpg" data-src="/community/images/cn4.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="/community/vehicle_view.php" class="position-cover"
                                               data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="/community/vehicle_view.php"> 2017 Toyta
                                                        Sienna XLE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                $9,500
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn5.jpg" data-src="/community/images/cn5.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="/community/vehicle_view.php" class="position-cover"
                                               data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="/community/vehicle_view.php"> 2011 TOYOTA
                                                        Camry LE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                $9,500
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn6.jpg" data-src="/community/images/cn6.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 혼다 Civic</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn7.jpg" data-src="/community/images/cn7.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2011 TOYOTA Camry LE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn8.jpg" data-src="/community/images/cn8.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2018 Coachmen Leprechaun</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn9.jpg" data-src="/community/images/cn9.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2017 Toyta Sienna XLE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn10.jpg" data-src="/community/images/cn10.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2011 TOYOTA Camry LE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn1.jpg" data-src="/community/images/cn1.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 혼다 Civic</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn2.jpg" data-src="/community/images/cn2.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2011 TOYOTA Camry LE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn3.jpg" data-src="/community/images/cn3.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2018 Coachmen Leprechaun</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn4.jpg" data-src="/community/images/cn4.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2017 Toyta Sienna XLE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque"
                                                 src="/community/images/cn5.jpg" data-src="/community/images/cn5.jpg"
                                                 alt="image" data-uc-img="loading: lazy">
                                            <a href="#" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-2">
                                            <div class="post-meta panel fs-5">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2 hiet-2">
                                                    <a class="text-none" href="#"> 2011 TOYOTA Camry LE</a>

                                                </div>
                                            </div>
                                            <h3 class="post-title h6 mt-n1 fw-bolder">
                                                <a class="text-none" href="#">$9,500</a>
                                            </h3>
                                        </div>
                                        <div class="btline"></div>
                                        <div class="post-bottom panel hstack gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                                            <div>2014년식</div>
                                            <div>108000 mile</div>
                                        </div>
                                    </div>
                                </article>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Section end -->


    <!-- 자동차 프리미엄 end -->

    <ul class="nav-x uc-pagination hstack gap-1 justify-center ft-secondary mt-3" data-uc-margin="">
        <li class="uc-first-column">
            <a href="#"><span class="icon icon-1 unicon-chevron-left"></span></a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#" class="uc-active">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#"><span class="icon icon-1 unicon-chevron-right"></span></a>
        </li>
    </ul>


<?php include('../include/footer.php'); ?>