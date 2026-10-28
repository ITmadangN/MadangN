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
<ul class="v-tab-container2">
    {{T_DEALER_HTML}}

</ul><!-- Top button-->



<div class="mb-2 bg-gray-25 p-2 rounded">
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

                     </div> <!-- 검색 End -->

<div class="head_title">
    <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />PLATINUM</h3>
</div>
<!-- Section start -->
<div class="section panel overflow-hidden-x">
    <div class="section-outer panel">

        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1"  id="result_platinum">                        
                        <!--div>
                            <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque" src="{{T_LP.T_IMG}}"
                                                 data-src="{{T_LP.T_IMG}}" alt="image" data-uc-img="loading: lazy">
                                            <a href="{{T_LP.T_LINK}}" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 p-0 sm:p-1 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-1">
                                            <div class="post-meta panel fs-6">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2">
                                                    <a class="text-none fw-bold hiet-22"
                                                       href="{{T_LP.T_LINK}}">{{T_LP.T_CAR_YEAR_PURE}} {{T_LP.T_CAR_MAKER}} {{T_LP.T_CAR_MODEL}}</a>
                                                 </div>
                                            </div>
                                            
                                        </div>
                                        <div class="post-bottom fs-8 fw-medium mt-n1 text-black text-opacity-75">
                                            <div>{{T_LP.T_CAR_MAKER_PURE}} {{T_LP.T_CAR_MODEL}}</div>
                                            <div class="text-truncate-1">{{T_LP.T_CAR_YEAR}}년식 {{T_LP.T_CAR_MILEAGE}} mile {{T_LP.T_FUEL_TYPE}}</div>
                                            <div class="text-truncate-1">{{T_LP.T_COMPANY_NAME}} {{T_LP.T_CREATE_AT}}</div>
                                        </div>

                     <div class="mb-n22"><h3 class="post-title fs-7 fw-bolder">
                                               <span class="carblue"> ${{T_LP.T_LISTING_PRICE}}</span>
                                            </h3>
                       </div>
                                    </div>
                                </article>
                        </div-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end --><!-- 자동차 프리미엄 end -->


<!-- Section start -->
<div class="section panel overflow-hidden mt-n3" >
    <div class="section-outer panel py-4 lg:py-6 dark:text-white">
        <div class="max-w-xl">
            <div class="head_title">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" /><a href="javascript:return false;" onclick="goUrl('/community/vehicle_regular.php');" class="text-none">개인매물</a></h3>
                <div><a href="javascript:return false;" onclick="goUrl('/community/vehicle_regular.php');" class="text-none fs-6 fw-semibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i> &nbsp; 전체보기</a></div>
            </div>
            <div class="panel max-h-sm  border border-gray-50 dark:border-gray-700">
                <table class="table align-middle overflow-auto m-0 fs-7 text-center " style="min-width:800px;">

                    <colgroup>
                        
                        <col width="10%" />
                        <col width="10%" />
                        <col width="10%" />
                        <col width="10%" />
                        <col width="/" />
                        <col width="10%" />
                        <col width="10%" />
                        <col width="10%" />
                        <col width="15%" />


                    </colgroup>
                    <thead class="bg-primary text-white sticky-top z-1 text-center">
                    <tr>
                        <th>사진</th>
                        <th>제조사</th>
                        <th>모델</th>
                        <th>색상</th>
                        <th>주행거리</th>
                        <th>가격</th>
                        <th>연식</th>
                        <th>등록자</th>
                        <th>등록일</th>
                    </tr>
                    </thead>
                    <tbody id="result_regular">                        

                    <!--tr>
                        <td>
                            <div class="image panel w-48px lg:w-72px">
                                <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{T_LR.T_IMG}}" data-src="{{T_LR.T_IMG}}" alt="" data-uc-img="loading: lazy">
                                    <a href="{{T_LR.T_LINK}}" class="position-cover" data-caption="{{T_LR.T_LINK}}"></a>
                                </figure>
                            </div>
                        </td>
                        <td>
                            {{T_LR.T_CAR_MAKER_PURE}}
                        </td>
                        <td>
                            {{T_LR.T_CAR_MODEL}}
                        </td>
                        <td>
                            {{T_LR.T_CAR_COLOR}}
                        </td>

                        <td>
                            {{T_LR.T_CAR_MILEAGE}} Mile
                        </td>
                        <td>
                            ${{T_LR.T_LISTING_PRICE}}
                        </td>
                        <td>
                            {{T_LR.T_CAR_YEAR}}년식
                        </td>
                        <td>
                            {{T_LR.T_CREATED_USER}}
                        </td>
                        <td>
                            {{T_LR.T_CREATE_AT}}
                        </td>
                    </tr-->
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Section end --><!-- 자동차 일반 end -->

<script>
    var g_page = {{G_PAGE}};

</script>

<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/vehicle.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>                                                        
<script defer src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->

