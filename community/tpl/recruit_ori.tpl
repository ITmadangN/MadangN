<!-- INCLUDE FILE '../include/header.php' -->


<div class="mb-3 bg-gray-25 p-2 rounded">
    <form name="formp" action="" method="post">
        <div class="vstack sm:hstack items-start justify-between gap-4">
            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12 w-128px" id="" name="">
                    <option value="" selected="">직종선택</option>
                    <option value="1">직종1</option>
                    <option value="2">직종2</option>
                </select>
                <select class="form-select rounded p-12 w-128px" id="" name="" onchange="test()">
                    <option value="" selected="">주</option>
                    <option value="1">주1</option>
                    <option value="2">주2</option>
                </select>

                <div class="custom-dropdown-container">
                    <div class="form-select rounded p-12 text-start cursor-pointer" id="cityBtn">
                        <span id="cityLabel">도시</span>
                    </div>

                    <div class="dropdown-options shadow" id="cityMenu">
                        <label><input type="checkbox" name="city[]" value="1"> 서울</label>
                        <label><input type="checkbox" name="city[]" value="2"> 부산</label>
                        <label><input type="checkbox" name="city[]" value="3"> 대구</label>
                        <label><input type="checkbox" name="city[]" value="4"> 인천</label>
                    </div>
                </div>
            </div>

            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12" id="" name="">
                    <option value="" selected="">구분</option>
                    <option value="1">구분1</option>
                    <option value="2">구분2</option>
                </select>
                <input class="form-control form-control-sm h-42px fs-6 bg-white" type="text" placeholder="검색어를 입력하세요">

                <a href="" class="btn btn-primary btn-sm" style="width:120px !important;">검색</a>
            </div>
        </div>
    </form>

</div> <!-- 검색 End -->


<!-- Section start -->
<div class="section panel overflow-hidden-x">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />PLATINUM</h3>

            </div>
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-4 xl:child-cols-3 g-1 xl:g-1">
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">
                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban1.png" alt="" /></div>
                                        <h3 class="post-title h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg1.jpg" data-src="/community/images/banbg1.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban2.png" data-src="/community/images/ban2.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">현대자동차그룹 협력사<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">채용박람회</span></a>

                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg2.jpg" data-src="/community/images/banbg2.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban3.png" data-src="/community/images/ban3.png" alt="image" data-uc-img="loading: lazy" /></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">[삼성 SDS] 하반기<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">신입사원 공개채용</span></a>

                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg3.jpg" data-src="/community/images/banbg3.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban1.png" data-src="/community/images/ban1.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg4.jpg" data-src="/community/images/banbg4.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban1.png" alt="" /></div>
                                        <h3 class="post-title h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg1.jpg" data-src="/community/images/banbg1.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban2.png" data-src="/community/images/ban2.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">현대자동차그룹 협력사<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">채용박람회</span></a>

                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg2.jpg" data-src="/community/images/banbg2.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban3.png" data-src="/community/images/ban3.png" alt="image" data-uc-img="loading: lazy" /></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">[삼성 SDS] 하반기<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">신입사원 공개채용</span></a>

                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg3.jpg" data-src="/community/images/banbg3.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban1.png" data-src="/community/images/ban1.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg4.jpg" data-src="/community/images/banbg4.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban1.png" alt="" /></div>
                                        <h3 class="post-title h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg1.jpg" data-src="/community/images/banbg1.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban2.png" data-src="/community/images/ban2.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">현대자동차그룹 협력사<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">채용박람회</span></a>

                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg2.jpg" data-src="/community/images/banbg2.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban3.png" data-src="/community/images/ban3.png" alt="image" data-uc-img="loading: lazy" /></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">[삼성 SDS] 하반기<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">신입사원 공개채용</span></a>

                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg3.jpg" data-src="/community/images/banbg3.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container"><img src="/community/images/ban1.png" data-src="/community/images/ban1.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title h6 sm:h6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-bold2" href="/community/recruit_view.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                                <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0 mt-1">
                                    <figure class="featured-image m-0 ratio ratio-4x3 sm:ratio-32 rounded-top-0 uc-transition-toggle overflow-hidden bg-gray-25">
                                        <img class="media-cover image uc-transition-opaque" src="/community/images/banbg4.jpg" data-src="/community/images/banbg4.jpg" alt="image" data-uc-img="loading: lazy">
                                        <a href="/community/recruit_view.php" class="position-cover" data-caption="image"></a>
                                    </figure>
                                </div>
                            </article>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Section end --><!-- PLATINUM end -->

<!-- Section start -->
<div class="section panel overflow-hidden-x mt-4">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />GOLD</h3>

            </div>
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-6 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1">
                        <div>
                            <article class="post type-post panel hstack items-start gap-2 gap-0 p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 p-2 mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban1.png" alt="" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban2.png" data-src="/community/images/ban2.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">현대자동차그룹 협력사<br />
                                                <span class="text-gray fs-6 fw-medium">채용박람회</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban3.png" data-src="/community/images/ban3.png" alt="image" data-uc-img="loading: lazy" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">[삼성 SDS] 하반기<br />
                                                <span class="text-gray fs-6 fw-medium">신입사원 공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban1.png" data-src="/community/images/ban1.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">신입사원 공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack items-start gap-2 gap-0 p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 p-2 mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban1.png" alt="" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban2.png" data-src="/community/images/ban2.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">현대자동차그룹 협력사<br />
                                                <span class="text-gray fs-6 fw-medium">채용박람회</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban3.png" data-src="/community/images/ban3.png" alt="image" data-uc-img="loading: lazy" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">[삼성 SDS] 하반기<br />
                                                <span class="text-gray fs-6 fw-medium">신입사원 공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban1.png" data-src="/community/images/ban1.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">신입사원 공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack items-start gap-2 gap-0 p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 p-2 mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban1.png" alt="" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban2.png" data-src="/community/images/ban2.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">현대자동차그룹 협력사<br />
                                                <span class="text-gray fs-6 fw-medium">채용박람회</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban3.png" data-src="/community/images/ban3.png" alt="image" data-uc-img="loading: lazy" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">[삼성 SDS] 하반기<br />
                                                <span class="text-gray fs-6 fw-medium">신입사원 공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban1.png" data-src="/community/images/ban1.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 lg:fs-5 fw-medium">신입사원 공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>

                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack items-start gap-2 gap-0 p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 p-2 mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban1.png" alt="" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">12차 정규 운영관리자<br />
                                                <span class="text-gray fs-6 fw-medium">공개채용</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban2.png" data-src="/community/images/ban2.png" alt="image" data-uc-img="loading: lazy"></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">현대자동차그룹 협력사<br />
                                                <span class="text-gray fs-6 fw-medium">채용박람회</span></a>
                                        </h3>
                                    </div>
                                </div>


                            </article>
                        </div>
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900  border-opacity-15 text-gray-900">

                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                    <div class="post-top panel text-center2">
                                        <div class="image-container3"><img src="/community/images/ban3.png" data-src="/community/images/ban3.png" alt="image" data-uc-img="loading: lazy" /></div>
                                        <h3 class="post-title fs-6 m-0  text-center2 lh-2">
                                            <a class="text-none text-black fw-semibold" href="/community/recruit_view2.php">[삼성 SDS] 하반기<br />
                                                <span class="text-gray fs-6 fw-medium">신입사원 공개채용</span></a>
                                        </h3>
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

<!-- Section end --><!-- Gold end -->




<!-- Section start -->
<div class="section panel overflow-hidden mt-2" >
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title3">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />일반구인</h3>
                <div><a href="/community/recruit_write.php" class="btn btn-primary btn-xs mt-1">구인등록</a></div>
            </div>
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top" style="min-width:600px;">

                    <colgroup>
                        <col width="10%" />
                        <col width="15%" />
                        <col width="15%" />
                        <col width="/" />
                        <col width="15%" />
                        <col width="10%" />



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
                    <tbody>
                    <tr>
                        <td>
                            3
                        </td>

                        <td>
                            서비스직
                        </td>
                        <td>
                            San Diego
                        </td>

                        <td>
                            <a href="/community/recruit_view3.php" class="text-none">비지니스 의자 구합니다. </a>
                        </td>
                        <td>
                            David.kim
                        </td>
                        <td>
                            25.11.03

                        </td>

                    </tr>
                    <tr>
                        <td>
                            2
                        </td>

                        <td>
                            IT직
                        </td>
                        <td>
                            San Diego
                        </td>

                        <td>
                            <a href="/community/recruit_view3.php" class="text-none">비지니스 의자 구합니다. </a>
                        </td>
                        <td>
                            David.kim
                        </td>
                        <td>
                            25.11.03

                        </td>

                    </tr>
                    <tr>
                        <td>
                            1
                        </td>

                        <td>
                            서비스직
                        </td>
                        <td>
                            San Diego
                        </td>

                        <td>
                            <a href="/community/recruit_view3.php" class="text-none">비지니스 의자 구합니다. </a>
                        </td>
                        <td>
                            David.kim
                        </td>
                        <td>
                            25.11.03

                        </td>

                    </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Section end --><!-- 구합니다 end -->

<!-- INCLUDE FILE '../include/footer.php' -->


