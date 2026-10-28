<!-- INCLUDE FILE '../include/header.php' -->

<style>
.price-filter-1 { flex: 0 0 100%; }
.price-filter-2 { flex: 0 0 100%; }
.price-filter-3 { flex: 0 0 100%; display: flex; justify-content: space-between; align-items: center; }

@media (min-width: 768px) {
  .price-filter-1 { flex: 0 0 15%; }  
  .price-filter-2 { flex: 0 0 54%; } 
  .price-filter-3 { flex: 0 0 28%; } 
}

.car-filter-1 { flex: 0 0 100%; margin-bottom: 4px; }
.car-filter-2, .car-filter-3, .car-filter-4 { 
  flex: 0 0 100%; 
  display: flex; 
  align-items: center; 
  gap: 4px; 
  margin-bottom: 4px; 
}

@media (min-width: 768px) {
  .car-filter-1 { flex: 0 0 17%; margin-bottom: 0; }
  .car-filter-2 { flex: 0 0 33%; margin-bottom: 0; } 
  .car-filter-3 { flex: 0 0 33%; margin-bottom: 0; } 
  .car-filter-4 { flex: 0 0 13%; margin-bottom: 0; } 
}

</style>

<link rel="stylesheet" href="/css/vehicle_dealer_view.css">

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

            <!-- ===== 1) 가격 + 판매자 정보: 이미지 위쪽 ===== -->
            <div class="seller-top-bar">
                <div class="seller-top-left">
                    <div class="seller-brand">
                        <img src="{{T_LOGO_IMG}}" alt="" class="seller-logo"/>
                        <span class="seller-company">{{T_COMPANY_NAME}}</span>
                    </div>
                    <div class="seller-price-tag">${{T_LISTING_PRICE}}</div>
                </div>
                <div class="seller-top-right">
                    <div class="seller-contact-item">
                        <i class="fa fa-user"></i>
                        <span>{{T_SELLER_NAME}}</span>
                    </div>
                    <div class="seller-contact-item">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:{{T_SELLER_EMAIL}}">{{T_SELLER_EMAIL}}</a>
                    </div>
                    <div class="seller-contact-item">
                        <i class="fa fa-phone-square"></i>
                        <a href="tel:{{T_SELLER_PHONE}}">{{T_SELLER_PHONE}}</a>
                    </div>
                </div>
            </div><!-- 판매자 정보 END -->


            <!-- ===== 2) 이미지 슬라이더: 전체 너비 ===== -->
            <div class="product-slider panel swiper-parent" style="position:relative; margin-top:12px;">
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
            </div><!-- 이미지 슬라이더 END -->

        </div>
    </div>
</article>


<!-- ===== 3) 기본정보 + 옵션/설명(왼쪽) + 문의폼(오른쪽) ===== -->
<div class="section panel overflow-hidden mb-2 mt-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout panel overflow-hidden">
                    <div class="block-content border" style="border-top:2px solid #000 !important;">

                        <!-- 기본정보 타이틀 -->
                        <div class="vd-section-title">
                            <i class="fa fa-info-circle"></i> 차량정보
                        </div>

                        <!-- 기본정보 그리드 -->
                        <div class="vd-info-grid">
                            <div class="vd-info-item">
                                <span class="vd-info-label"><i class="fa fa-building"></i> 제조사</span>
                                <span class="vd-info-value">{{T_CAR_MAKER}}</span>
                            </div>
                            <div class="vd-info-item">
                                <span class="vd-info-label"><i class="fa fa-car"></i> 모델</span>
                                <span class="vd-info-value">{{T_CAR_MODEL}}</span>
                            </div>
                            <div class="vd-info-item">
                                <span class="vd-info-label"><i class="fa fa-calendar"></i> 연식</span>
                                <span class="vd-info-value">{{T_CAR_YEAR}}년식</span>
                            </div>
                            <div class="vd-info-item">
                                <span class="vd-info-label"><i class="fa fa-tachometer"></i> 주행거리</span>
                                <span class="vd-info-value">{{T_CAR_MILEAGE}} miles</span>
                            </div>
                            <div class="vd-info-item">
                                <span class="vd-info-label"><i class="fa fa-paint-brush"></i> 색상</span>
                                <span class="vd-info-value">{{T_CAR_COLOR}}</span>
                            </div>
                            <div class="vd-info-item">
                                <span class="vd-info-label"><i class="fa fa-sitemap"></i> 거래지역</span>
                                <span class="vd-info-value text-primary">{{T_LOCATION}}</span>
                            </div>
                            <div class="vd-info-item">
                                <span class="vd-info-label"><i class="fa fa-sitemap"></i> 사고유무</span>
                                <span class="vd-info-value text-primary">{{T_CAR_ACCIDENT_HISTORY}}</span>
                            </div>
                        </div><!-- 기본정보 END -->


                        <!-- 옵션/설명(왼쪽) + 문의폼(오른쪽) 가로 배치 -->
                        <div class="vd-bottom-wrap">

                            <!-- 왼쪽: 옵션정보 + 차량설명 -->
                            <div class="vd-bottom-left">

                                <div class="vd-section-title">
                                    <i class="fa fa-check-circle"></i> 옵션정보
                                </div>
                                <div class="vd-option-grid">
                                    <div class="vd-option-item">
                                        <span class="vd-option-label">연료종류</span>
                                        <span class="vd-option-value">{{T_FUEL_TYPE}}</span>
                                    </div>
                                    <div class="vd-option-item">
                                        <span class="vd-option-label">차체 타입</span>
                                        <span class="vd-option-value">{{T_BODY_TYPE}}</span>
                                    </div>
                                    <div class="vd-option-item vd-option-full">
                                        <span class="vd-option-label">변속기</span>
                                        <span class="vd-option-value">{{T_TRANSMISSION}}</span>
                                    </div>
                                    <!-- 기타 옵션: 전체 너비 사용 -->
                                    <div class="vd-option-item vd-option-full">
                                        <span class="vd-option-label">기타 옵션</span>
                                        <span class="vd-option-value">{{T_OPTIONS_DESCRIPTION}}</span>
                                    </div>
                                </div>

                                <div class="vd-section-title">
                                    <i class="fa fa-car"></i> 추가설명
                                </div>
                                <div class="vd-description" style="overflow-wrap: break-word;">
                                    {{T_DESCRIPTION}}
                                </div>
                                
                            </div><!-- 왼쪽 END -->

                            <!-- 오른쪽: 문의 폼 -->
                            <div class="vd-bottom-right">
                                <div class="vd-inquiry-box">
                                    <div class="vd-inquiry-title">
                                        <i class="fa fa-comments"></i> 차량구입문의
                                    </div>
                                    <form action="ajax/ajax_vehicle_dealer.php" method="post" name="formc" id="formc">
                                        <input type="hidden" name="ac" id="ac" value="send_request">
                                        <input type="hidden" name="rid" id="rid" value="{{T_ID}}">
                                        <div class="vd-inquiry-fields">
                                            <input class="form-control form-control-xs h-36px fs-6 rounded-1" type="text"
                                                   name="r_name" id="r_name" placeholder="이름" value="{{T_USER_NAME}}">
                                            <input class="form-control form-control-xs h-36px fs-6 rounded-1" type="text"
                                                   name="r_email" id="r_email" placeholder="이메일" value="{{T_USER_EMAIL}}">
                                            <input class="form-control form-control-xs h-36px fs-6 rounded-1" type="text"
                                                   name="r_phone" id="r_phone" placeholder="연락처" value="{{T_USER_PHONE}}">
                                            <textarea class="form-control fs-6 rounded-1 p-1" name="r_content" id="r_content" rows="3"
                                                      placeholder="내용">{{T_TITLE}}                                                       
이 자동차에 관심이 있습니다.
연락 주시기 바랍니다.</textarea>
                                        </div>
                                        <!--div class="vd-inquiry-captcha">
                                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                            <div class="recaptcha-container">
                                                <div class="g-recaptcha"
                                                     data-sitekey="6LevC4wsAAAAAHdXpPXCRp744rTf-fDcwCjPFC7w"></div>
                                            </div>
                                        </div-->
                                        <button class="btn btn-primary btn-sm rounded-1 w-full mt-1" type="submit">문의하기</button>
                                    </form>
                                </div>
                            </div><!-- 오른쪽 END -->

                           
                        </div><!-- vd-bottom-wrap END -->
                        <!-- IF START 'UPDATE_DELETE' -->
                        <div class="mt-1 d-flex gap-narrow justify-end"> <a href="javascript:return false;" onclick="GO_UPDATE('{{T_ID}}','{{T_DEALER_ID}}');" class="btn btn-primary2 btn-sm2">수정</a> <a href="javascript:return false;" class="btn btn-gray btn-sm2" onclick="GO_DELETE('{{T_ID}}')">삭제</a></div>
                        <!-- IF END 'UPDATE_DELETE' -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 기본정보 + 옵션 + 문의 END -->


<div class="mb-3 bg-gray-25 p-2 rounded mt-3">
    <form name="formp" id="formp" action="ajax/ajax_vehicle_dealer.php" method="post">
    <input type="hidden" name="dealer_id" id="dealer_id" value="{{T_DEALER_ID}}">

                                                       <div class="hstack items-center justify-between" style="flex-wrap: wrap;">

                                          
  <div class="price-filter-1 mb-1">    
    <select class="form-select rounded p-12 fs-6 text-gray-400" name="s_state_code" id="s_state_code"
                                onchange="GET_CITY_NAME('all');" >
                                {{S_SELECT_STATE_CODE}}
    </select>
  </div>

  <div class="price-filter-2 mb-1">
    <select class="js-example-basic-multiple fs-6 w-100" name="s_city_name[]" id="s_city_name" multiple="multiple">
      {{S_SELECT_CITY_NAME}}
    </select>
  </div>

  <div class="price-filter-3 d-flex items-center justify-between gap-1 mb-1">
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-48" type="text" placeholder="최소가격" id="s_min_price" value="{{S_MIN_PRICE}}"> 
    <span>~</span>
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-48" type="text" placeholder="최대가격" id="s_max_price" value="{{S_MAX_PRICE}}">
  </div>

</div>
                      
                      <div class="hstack items-center justify-between gap-1 mb-1" style="flex-wrap: wrap;">

  <!-- 1번: 제조사 선택 (모바일에선 100%, PC에선 적당한 크기) -->
  <div class="car-filter-1">
    <div class="custom-dropdown-container2 w-100">
      <div class="form-select rounded p-12 text-start cursor-pointer sme" id="multiBtn">
        <span id="multiLabel" class="gry">전체</span>
      </div>
      <div class="dropdown-options shadow" id="multiMenu">
      {{S_CHECKBOX_CAR_MAKER}}      
      </div>
    </div>
  </div>

  <!-- 2번: 마일 그룹 (글자와 입력창들이 한 줄에 나란히 붙음) -->
  <div class="car-filter-2">
    <span class="fs-6 fw-bold text-nowrap">마일</span>
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-100" type="text" placeholder="최소마일" name="min_dist" id="min_dist" value="{{S_MIN_DIST}}"> 
    <span>~</span>
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-100" type="text" placeholder="최대마일" name="max_dist" id="max_dist" value="{{S_MAX_DIST}}">
  </div>

  <!-- 3번: 연식 그룹 (글자와 입력창들이 한 줄에 나란히 붙음) -->
  <div class="car-filter-3">
    <span class="fs-6 fw-bold text-nowrap">연식</span>
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-100" type="text" placeholder="최소연식" name="min_car_year" id="min_car_year" value="{{S_MIN_CAR_YEAR}}"> 
    <span>~</span>
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-100" type="text" placeholder="최대연식" name="max_car_year" id="max_car_year" value="{{S_MAX_CAR_YEAR}}">
  </div>

  <!-- 4번: 검색 버튼 -->
  <div class="car-filter-4">
    <button class="btn btn-primary btn-sm h-40px w-100 tds" onclick="GET_PAGE();" type="button">검색</button>
  </div>

</div>
                                      
                                     </form>
</div><!-- 검색 End -->


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
<!-- Section end -->

<div id="result_pagging">
</div>
<!-- Paging -->
<script>
    var g_page = {{G_PAGE}};

</script>

<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/vehicle_dealer_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>                                                        
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
 
<!-- INCLUDE FILE '../include/footer.php' -->
 