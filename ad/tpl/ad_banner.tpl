<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
        .ad-content-panel { display: none; background: #fff; }
        .ad-content-panel.active { display: block; }

        /* 모달 전체 배경 (어두운 배경) - z-index를 최상단으로 설정 */
        .modal { 
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0, 0, 0, 0.85); z-index: 999999; 
            justify-content: center; align-items: center; padding: 10px; box-sizing: border-box;
        }
        
        /* 모달 팝업 박스 컨테이너 */
        .popup-content { 
            background: transparent; position: relative; 
            max-width: 95vw; max-height: 95vh; text-align: center;
        }

        /* 우측 상단 닫기 버튼 */
        .close-btn { 
            position: absolute; top: -50px; right: 0; 
            background: #ff4d4d; color: #fff; border: none; 
            padding: 10px 20px; font-weight: bold; cursor: pointer; 
            border-radius: 4px; font-size: 15px; z-index: 1000000; 
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }
        .close-btn:hover { background: #e03b3b; }
        
        /* 이미지 및 하이라이트 감싸는 영역 */
        .image-wrapper { 
            position: relative; display: inline-block; 
            max-height: 80vh; overflow: auto; border-radius: 4px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
            background: #fff;
        }
        .bg-image { display: block; max-width: 100%; height: auto; cursor: crosshair; }
        
        /* 핵심: 배너 영역 테두리 + 나머지 영역 오버레이(어둡게) 처리 */
        .highlight-box {
            position: absolute;
            border: 3px solid #f51616;
            box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.65);
            pointer-events: none;
            display: none;
            z-index: 10;
        }

	 @media(max-width: 768px) {
           
            .form-group label { display: block; margin-bottom: 5px; }
            .form-group select { width: 100%; margin-bottom: 8px; box-sizing: border-box; }
            .close-btn { top: -45px; right: 0; padding: 8px 14px; }
	    .mhd{margin-top:140px !important;}
        }
</style>

<!--  ccv2 -->

<form name="formp" id="formp" action="ajax/ajax_banner.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" id="ac" value="write_banner">        
    <input type="hidden" name="banner_location" id="banner_location" value="">        
    <input type="hidden" name="validity_period" id="validity_period" value="">        
    <input type="hidden" name="ad_enabled" id="ad_enabled" value="N">        
    <div class="radio-container mhd">
        <div class="radio-item">
            <input type="radio" name="banner_type" id="radio1" value="banner_home" onclick="$('#listing_id').val('');$('#ad_company_id').val('');" checked >
            <label for="radio1">HOME</label>
        </div>
        <div class="radio-item">
            <input type="radio" name="banner_type" id="radio2" value="banner_newshome" onclick="$('#listing_id').val('');$('#ad_company_id').val('');">
            <label for="radio2">뉴스홈</label>
        </div>
        <div class="radio-item">
            <input type="radio" name="banner_type" id="radio3" value="banner_news">
            <label for="radio3">뉴스</label>
        </div>
        <div class="radio-item">
            <input type="radio" name="banner_type" id="radio4" value="banner_youtube">
            <label for="radio4">유튜브</label>
        </div>
	 <div class="radio-item">
            <input type="radio" name="banner_type" id="radio5" value="banner_community">
            <label for="radio5">커뮤니티</label>
        </div>
        <div class="radio-item">
            <input type="radio" name="banner_type" id="radio6" value="banner_town">
            <label for="radio6">타운정보</label>
        </div>
	 <div class="radio-item">
            <input type="radio" name="banner_type" id="radio7" value="banner_realestate">
            <label for="radio7">부동산</label>
        </div>

    </div> <!-- 광고 레디오 버튼 -->


    <div class="content-wrapper">

 
     <!-- ================================================================= -->
    <!-- HOME 패널 -->
    <!-- ================================================================= -->
       <div id="panel_banner_home" class="ad-content-panel active">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>HOME</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-2 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">배너위치 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6 control-pane">
                                                                         <select class="bannerSelect rounded text-gray-900 h-32px p-narrow text-opacity-70" style="border:1px solid #ccc;"  name="banner_home_location" id="banner_home_location" onchange="VIEW_SIZE();">
                                                                            <option value="">배너를 선택하세요</option>
                                                                         </select>
                                                                         <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button">위치확인</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

						   <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        <select class="rounded text-gray-900 w-100px h-32px p-narrow text-opacity-70"  style="border:1px solid #ccc;"
                                                                                id="banner_home_validity_period"
                                                                                name="banner_home_validity_period" onchange="CAL_AMOUNT();">
                                                                            {{SELECT_VALIDITY_PERIOD}}
                                                                        </select>
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
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">사이즈</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_home_size">
                                                                        배너 위치 선택

      
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                             

                                                <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-narrow ">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">가격</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" name="banner_home_payment_amount" id="banner_home_payment_amount">* 기간선택후 표시
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/images/bann1.jpg" data-src="/ad/images/bann1.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                            


                                    


                            </div>
                        </div>
                    </div>
                </div>
            </div>
	 </div>
            <!-- Section end -->

        </div><!-- 라디오버튼 1 내용 -->


    <!-- ================================================================= -->
    <!-- NEWSHOME 패널 -->
    <!-- ================================================================= -->
       <div id="panel_banner_newshome" class="ad-content-panel">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>뉴스홈</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-2 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">배너위치 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6 control-pane">
                                                                         <select class="bannerSelect rounded text-gray-900 h-32px p-narrow text-opacity-70" style="border:1px solid #ccc;" name="banner_newshome_location" id="banner_newshome_location" onchange="VIEW_SIZE();">
                                                                            <option value="">배너를 선택하세요</option>
                                                                         </select>
                                                                         <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button">위치확인</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

						   <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        <select class="rounded text-gray-900 w-100px h-32px p-narrow text-opacity-70"  style="border:1px solid #ccc;"
                                                                                id="banner_newshome_validity_period"
                                                                                name="banner_newshome_validity_period" onchange="CAL_AMOUNT();">
                                                                            {{SELECT_VALIDITY_PERIOD}}
                                                                        </select>
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
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">사이즈</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_newshome_size">
                                                                         배너 위치 선택

      
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
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_newshome_payment_amount">* 기간선택후 표시
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/images/bann2.jpg" data-src="/ad/images/bann2.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                                   




                            </div>
                        </div>
                    </div>
                </div>
            </div>
	 </div>
            <!-- Section end -->

        </div> <!-- 라디오버튼 2 내용 -->

    <!-- ================================================================= -->
    <!-- NEWS 패널 -->
    <!-- ================================================================= -->
       <div id="panel_banner_news" class="ad-content-panel">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>뉴스</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-2 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">배너위치 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6 control-pane">
                                                                         <select class="bannerSelect rounded text-gray-900 h-32px p-narrow text-opacity-70" style="border:1px solid #ccc;" name="banner_news_location" id="banner_news_location" onchange="VIEW_SIZE();">
                                                                            <option value="">배너를 선택하세요</option>
                                                                         </select>
                                                                         <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button">위치확인</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

						   <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        <select class="rounded text-gray-900 w-100px h-32px p-narrow text-opacity-70"  style="border:1px solid #ccc;"
                                                                                id="banner_news_validity_period"
                                                                                name="banner_news_validity_period" onchange="CAL_AMOUNT();">
                                                                            {{SELECT_VALIDITY_PERIOD}}
                                                                        </select>
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
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">사이즈</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_news_size">
                                                                         배너 위치 선택

      
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
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_news_payment_amount">* 기간선택후 표시
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/images/bann3.jpg" data-src="/ad/images/bann3.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                            


                                   

                            </div>
                        </div>
                    </div>
                </div>
            </div>
	 </div>
            <!-- Section end -->

        </div> <!-- 라디오버튼 3 내용 -->


    <!-- ================================================================= -->
    <!-- YOUTUBE 패널 -->
    <!-- ================================================================= -->
       <div id="panel_banner_youtube" class="ad-content-panel">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>유튜브</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-2 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">배너위치 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6 control-pane">
                                                                         <select class="bannerSelect rounded text-gray-900 h-32px p-narrow text-opacity-70" style="border:1px solid #ccc;" name="banner_youtube_location" id="banner_youtube_location" onchange="VIEW_SIZE();">
                                                                            <option value="">배너를 선택하세요</option>
                                                                         </select>
                                                                         <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button">위치확인</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

						   <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        <select class="rounded text-gray-900 w-100px h-32px p-narrow text-opacity-70"  style="border:1px solid #ccc;"
                                                                                id="banner_youtube_validity_period"
                                                                                name="banner_youtube_validity_period" onchange="CAL_AMOUNT();">
                                                                            {{SELECT_VALIDITY_PERIOD}}
                                                                        </select>
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
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">사이즈</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_youtube_size">
                                                                        배너 위치 선택

      
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
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_youtube_payment_amount">* 기간선택후 표시
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/images/bann4.jpg" data-src="/ad/images/bann4.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                               


                                   


                            </div>
                        </div>
                    </div>
                </div>
            </div>
	 </div>
            <!-- Section end -->

        </div> <!-- 라디오버튼 4 내용 -->


    <!-- ================================================================= -->
    <!-- COMMUNITY 패널 -->
    <!-- ================================================================= -->
       <div id="panel_banner_community" class="ad-content-panel">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>커뮤니티</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-2 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">배너위치 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6 control-pane">
                                                                         <select class="bannerSelect rounded text-gray-900 h-32px p-narrow text-opacity-70" style="border:1px solid #ccc;" name="banner_community_location" id="banner_community_location" onchange="VIEW_SIZE();">
                                                                            <option value="">배너를 선택하세요</option>
                                                                         </select>
                                                                         <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button">위치확인</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

						   <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        <select class="rounded text-gray-900 w-100px h-32px p-narrow text-opacity-70"  style="border:1px solid #ccc;"
                                                                                id="banner_community_validity_period"
                                                                                name="banner_community_validity_period" onchange="CAL_AMOUNT();">
                                                                            {{SELECT_VALIDITY_PERIOD}}
                                                                        </select>
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
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">사이즈</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_community_size">
                                                                         배너 위치 선택

      
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
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_community_payment_amount">* 기간선택후 표시
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/images/bann5.jpg" data-src="/ad/images/bann5.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                            


                                    

                            </div>
                        </div>
                    </div>
                </div>
            </div>
	 </div>
            <!-- Section end -->

        </div> <!-- 라디오버튼 5 내용 -->


    <!-- ================================================================= -->
    <!-- TOWN 패널 -->
    <!-- ================================================================= -->
       <div id="panel_banner_town" class="ad-content-panel">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>타운정보</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-2 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">배너위치 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6 control-pane">
                                                                         <select class="bannerSelect rounded text-gray-900 h-32px p-narrow text-opacity-70" style="border:1px solid #ccc;" name="banner_town_location" id="banner_town_location" onchange="VIEW_SIZE();">
                                                                            <option value="">배너를 선택하세요</option>
                                                                         </select>
                                                                         <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button">위치확인</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

						   <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        <select class="rounded text-gray-900 w-100px h-32px p-narrow text-opacity-70"  style="border:1px solid #ccc;"
                                                                                id="banner_town_validity_period"
                                                                                name="banner_town_validity_period" onchange="CAL_AMOUNT();">
                                                                            {{SELECT_VALIDITY_PERIOD}}
                                                                        </select>
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
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">사이즈</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_town_size">
                                                                         배너 위치 선택

      
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
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_town_payment_amount">* 기간선택후 표시
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/images/bann6.jpg" data-src="/ad/images/bann6.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                               


                                    


                            </div>
                        </div>
                    </div>
                </div>
            </div>
	 </div>
            <!-- Section end -->

        </div> <!-- 라디오버튼 6 내용 -->

	<!-- ================================================================= -->
    <!-- REALESTATE 패널 -->
    <!-- ================================================================= -->
       <div id="panel_banner_realestate" class="ad-content-panel">

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>부동산</h3>
                                    </div>
                                </div>


                                <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
                                        <div class="row g-2 pb-0 sm:pb-3">
                                            <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">배너위치 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6 control-pane">
                                                                         <select class="bannerSelect rounded text-gray-900 h-32px p-narrow text-opacity-70" style="border:1px solid #ccc;" name="banner_realestate_location" id="banner_realestate_location" onchange="VIEW_SIZE();">
                                                                            <option value="">배너를 선택하세요</option>
                                                                         </select>
                                                                         <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button">위치확인</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

						   <div>
                                                    <article
                                                            class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">기간 <span style="color:red">*</span></div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6">
                                                                        <select class="rounded text-gray-900 w-100px h-32px p-narrow text-opacity-70"  style="border:1px solid #ccc;"
                                                                                id="banner_realestate_validity_period"
                                                                                name="banner_realestate_validity_period" onchange="CAL_AMOUNT();">
                                                                            {{SELECT_VALIDITY_PERIOD}}
                                                                        </select>
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
                                                                    <div class="dots"></div>
                                                                    <div class="w-72px">사이즈</div>
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_realestate_size">
                                                                         배너 위치 선택

      
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
                                                                    <div class="text-gray-900 text-opacity-80 fs-6" id="banner_realestate_payment_amount">* 기간선택후 표시
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>


                                            </div>

                                            <div class="col-12 md:col-6 pt-2">
                                                <img src="/ad/images/bann7.jpg" data-src="/ad/images/bann7.jpg" alt="image"
                                                     data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                    </div><!-- 상단 이미지 -->


                                  


                                   

                            </div>
                        </div>
                    </div>
                </div>
            </div>
	 </div>
            <!-- Section end -->

        </div> <!-- 라디오버튼 7 내용 -->



     <!-- ================================================================= -->
    <!-- 광고게시정보 -->
    <!-- ================================================================= -->

               <div class="border2 rounded p-2 sm:p-3 mt-1">
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
                                                                        <div class="w-64px">기업명 <span style="color:red">*</span>
                                                                        </div>
                                                                        <div class="w-full">
                                                                            <input class="form-control h-32px w-full fs-6 bg-white"
                                                                                   type="text"
                                                                                   name="company_name"
                                                                                   id="company_name">
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

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-64px">담당자 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="contact_name"
                                                                                    id="contact_name"></div>
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
                                                                        <div class="w-64px">이메일 <span
                                                                                    style="color:red">*</span></div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="contact_email"
                                                                                    id="contact_email"></div>
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
                                                                        <div class="w-64px">연락처 </div>
                                                                        <div class="w-full"><input
                                                                                    class="form-control h-32px w-full fs-6 bg-white"
                                                                                    type="text" name="contact_phone"
                                                                                    id="contact_phone"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- 회사정보 -->


                                    <div class="comborder mt-3">
                                        <div class="w-100 sm:w-800px mx-auto">
                                            <div class="pt-2 sm:pt-3 mb-1 d-flex justify-between">
                                                <div class="fw-bold fs-4">광고게시정보</div>
                                               
                                            </div>
                                            <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

                                                <div class="col-12 md:col-6">
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                                <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div class="w-110px">광고 게시희망일 </div>
                                                                        <div class="w-150px"><input
                                                                                    class="form-control h-32px fs-6 bg-white"
                                                                                    type="text"
                                                                                    id="desired_start_date"
                                                                                    name="desired_start_date"                                                                                     
                                                                                    onchange="$('#ad_enabled').val('N');"
                                                                                    readonly
                                                                                    >
                                                                                    
                                                                                    </div>
                                                                                    <div class="w-200px">
                                                                                    <button class="btn btn-primary2 btn-xs fs-62 fw-semibold viewBtn" type="button" onclick="CHECK_ENABLE_BANNER();">광고 게시 가능 확인</button>
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
                                                                        <div class="w-110px">배너이미지 </div>
                                                                        <div class="w-full">
									
						                                                    <input type="hidden" name="main_image_url_exist" id="main_image_url_exist" value="">
                                                                              <div style="display:flex;flex-wrap: wrap;align-items: center;gap:10px;">
                                                                                <div class="w-300 custom-file-container">
                                                                                       <label class="custom-input-label"  id="main_image">
                                                                                            <div class="preview-box"><img src="#" class="image-preview"></div>
                                                                                            <span class="placeholder-text">로고 업로드 (클릭) <span style="color:red">*</span></span>
                                                                                            <div class="btn-remove-x" data="vmain_image_url_exist" style="display: none;"></div>
                                                                                            <input type="file" name="main_image_url" id="main_image_url" accept=".jpg, .jpeg, .png, .gif" class="real-file-input" style="display: none;">
                                                                                    </label>
                                                                                </div>
								                                                <div>*<span id="banner_upload_size"> </span>,  jpg, png, gif만 가능</div>
								                                                </div>


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
                                                                        <div class="w-110px">URL </div>
                                                                        <div class="w-full">
									   <div style="display:flex;flex-wrap: wrap;align-items: center;gap:10px;">
									      <div class="w-300"><input class="form-control h-32px w-full fs-6 bg-white" type="text" id="link_url"  name="link_url" placeholder="https://"></div>
									      <div>*배너 클릭시 이동할 주소</div>
									   </div>
									</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>

                                       </div>
                                    </div>
                                </div><!-- 광고게시정보 -->
                             </div>
       
    </div>


<script src="/js/ad/ad_banner_loc.js"></script>

 

    <!-- Section start -->
    <div class="section panel overflow-hidden mb-2 mt-2">
        <div class="section-outer panel">
            <div class="max-w-lg">
                <div class="section-inner">
                    <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                        <div class="block-content border p-2 mt-n1" style="border-top:2px solid #000 !important;">


                            <div class="panel row child-cols-12 border-bottom pb-2 pt-0" id="payment_start">
                                <article class="post type-post panel uc-transition-toggle vstack gap-0">
                                    <div class="post-header panel vstack gap-1 mt-1">
                                        <h3 class="post-title h62 m-0">
                                            <span class="text-dark fw-bold hover:text-primary"> <img
                                                        src="/community/images/dot.png" alt="dot"> &nbsp; 결제정보</span>
                                        </h3>
                                    </div>
                                </article>

                            </div><!-- Title -->


                            <div class="panel row child-cols-12 md:child-cols pt-3 border-bottom pb-3">

                                <div class="col-12">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="text-gray-900 text-opacity-70 fs-6 fw-medium">안전한 결제를 위해 카드 정보를
                                                입력해 주세요
                                            </div>
                                            <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                <div class="text-gray-900  text-opacity-80 fs-6">입력하신 정보는 [마당엔닷컴]에 저장되지
                                                    않으며, 미국 최대 결제대행사인 Stripe를 사용합니다.
                                                </div>
                                            </div>
                                        </article>
                                    </div>

                                </div>
                            </div>    
                            <div id="checkout"></div>                        

                            <div class="panel row child-cols-12 border-bottom pb-2 pt-2">
                                <article class="post type-post panel uc-transition-toggle vstack gap-0">
                                    <div class="post-header panel vstack gap-1 mt-1">
                                        <h3 class="post-title h62 m-0">
                                            <span class="text-dark fw-bold hover:text-primary"> <img
                                                        src="/community/images/dot.png"
                                                        alt="dot"> &nbsp; 광고 신청 동의서</span>
                                        </h3>
                                    </div>
                                </article>

                            </div><!-- Title -->


                            <div class="panel row child-cols-12 md:child-cols pt-3 border-bottom pb-3">

                                <div class="col-12">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="text-gray-900 text-opacity-70 fs-6 fw-medium">아래 동의서에 동의를 하셔야
                                                광고신청을 하실수 있습니다.
                                            </div>
                                            <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                <div class="text-gray-900  text-opacity-80 fs-6">본 동의서는 귀하(이하 ‘광고주’)가 본
                                                    웹사이트(이하 ‘플랫폼’)에 광고를 게재함에 있어 상호 간의 권리와 의무를 규정함을 목적으로 합니다.
                                                </div>
                                            </div>
                                        </article>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-2 pt-1 pb-1 fs-6 p-0 sm:p-3 lh-lg2">
                                <span class="fw-bold fs-6">   1) 광고 기간 및 노출</span><br/>
                                - 최소 광고 기간: 모든 광고의 기본 게재 기간은 승인일로부터 최소 30일입니다.<br/><br/>
                                - 노출 환경 안내: 사용자의 브라우저 설정, 광고 차단 확장 프로그램(Ad-block 등) 설치 여부에 따라 일부 환경에서 광고가 노출되지 않을 수 있으며,
                                이는 플랫폼의 귀책 사유가 되지 않습니다.<br/><br/>
                                <span class="fw-bold fs-6"> 2) 수정 및 환불 규정</span><br/>
                                - 수정 권한: 광고 내용의 수정 요청은 게재 기간 내 총 1회로 제한됩니다. (오타 수정 및 이미지 교체 포함)<br/>
                                - 환불 불가: 광고주의 단순 변심 또는 광고 효과 미비 등을 이유로 한 중도 해지 및 환불은 불가합니다.<br/><br/>
                                <span class="fw-bold fs-6"> 3) 면책 및 관할 법원</span><br/>
                                - 법적 책임: 광고 내용으로 인해 발생하는 모든 법적 분쟁(저작권, 허위사실 유포 등)의 책임은 광고주에게 있습니다.<br/>
                                - 관할 법원: 본 서비스 이용과 관련하여 분쟁이 발생할 경우, 소송의 관할 지역은 미국 캘리포니아주 소재 법원으로 합니다.<br/>


                                <div class="panel text-center mt-3">
                                    <div class="row child-cols-12 md:child-cols-4 g-1">
                                    <!--
                                        <div>
                                            <article
                                                    class="post type-post panel vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900 border-opacity-15 text-gray-900">
                                                <div class="post-media panel overflow-hidden w-100">
                                                    <figure class="featured-image m-0 ratio ratio-3x2 sm:ratio-16x9 uc-transition-toggle overflow-hidden bg-gray-25">
                                                        <img class="media-cover image uc-transition-opaque"
                                                             src="/ad/images/ad001.jpg" data-src="/ad/images/ad001.jpg"
                                                             alt="image" data-uc-img="loading: lazy">
                                                    </figure>
                                                </div>
                                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                                    <div class="post-top panel vstack items-start gap-1">
                                                        <div class="post-meta panel fs-6">
                                                            <div class="post-category fs-5 fw-semibold text-secondary">
                                                                구인광고

                                                            </div>
                                                        </div>
                                                        <div class="post-title fs-6  text-start h-72px sm:h-130px pt-1">
                                                            본 광고주는 관련 노동법을 준수하며, 구인 정보에 허위 사실이 없음을 보증합니다

                                                        </div>
                                                    </div>

                                                </div>
                                            </article>
                                        </div>
                                        <div>
                                            <article
                                                    class="post type-post panel vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900 border-opacity-15 text-gray-900">
                                                <div class="post-media panel overflow-hidden w-100">
                                                    <figure class="featured-image m-0 ratio ratio-3x2 sm:ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                        <img class="media-cover image uc-transition-opaque"
                                                             src="/ad/images/ad002.jpg" data-src="/ad/images/ad002.jpg"
                                                             alt="image" data-uc-img="loading: lazy">
                                                    </figure>
                                                </div>
                                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                                    <div class="post-top panel vstack items-start gap-1">
                                                        <div class="post-meta panel fs-6">
                                                            <div class="post-category fs-5 fw-semibold text-secondary">
                                                                비지니스광고

                                                            </div>
                                                        </div>
                                                        <div class="post-title fs-6 text-start h-130px pt-1">
                                                            상호명, 주소, 서비스 내용 등 사업자 정보가 정확해야 하며, 부적절한 홍보 문구로 인해 플랫폼의 이미지가
                                                            훼손될 경우 사전 예고 없이 광고가 중단될 수 있습니다


                                                        </div>
                                                    </div>

                                                </div>
                                            </article>
                                        </div>
                                        <div>
                                            <article
                                                    class="post type-post panel vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900 border-opacity-15 text-gray-900">
                                                <div class="post-media panel overflow-hidden w-100">
                                                    <figure class="featured-image m-0 ratio ratio-3x2 sm:ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                        <img class="media-cover image uc-transition-opaque"
                                                             src="/ad/images/ad003.jpg" data-src="/ad/images/ad003.jpg"
                                                             alt="image" data-uc-img="loading: lazy">
                                                    </figure>
                                                </div>
                                                <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                                    <div class="post-top panel vstack items-start gap-1">
                                                        <div class="post-meta panel fs-6">
                                                            <div class="post-category fs-5 fw-semibold text-secondary">
                                                                자동차 딜러 광고

                                                            </div>
                                                        </div>
                                                        <div class="post-title fs-6  text-start h-72px sm:h-130px pt-1">
                                                            판매 차량의 사고 유무, 주행 거리 등 상세 정보는 실제 차량 상태와 일치해야 합니다.


                                                        </div>
                                                    </div>

                                                </div>
                                            </article>
                                        </div>
                                        -->

                                    </div>
                                    <div class="mt-2 text-start">
                                        <input class="form-check-input rounded-0" type="checkbox"
                                               id="inputCheckRemember" name="yak"> 본인은 광고신청 동의서에 내용을 읽고 이해하였으며 광고신청 동의서의
                                        내용에 동의합니다.
                                    </div>
                                </div>
                            </div><!--Content 2-->
                        </div> <!--Content end-->


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Section end -->

    <div id="pay_button">
    <button class="btn btn-primary2 btn-md mt-1 fs-5" type="submit" style="width:100% !important;" ><i
                class="fa fa-check"></i> 이미지 배너  결제 및 신청 완료하기
    </button>
    </div>


</form>
<!-- Section end -->
<script>

    var pay_yn_banner = '{{T_PAY_YN_BANNER}}';
    
</script>

<script src="https://js.stripe.com/v3/"></script>
<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script defer src="/js/ad/ad_banner.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
