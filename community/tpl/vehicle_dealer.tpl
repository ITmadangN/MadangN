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

<button id="toggleDealerBtn" onclick="toggleDealerList()">딜러보기 <i id="dealerIcon" class="fa fa-chevron-down"></i></button>

<ul class="v-tab-container2" id="dealerList" style="display: none;">
    {{T_DEALER_HTML}}
</ul><!-- Top button-->

<script>
function toggleDealerList() {
    const list = document.getElementById('dealerList');
    const btn = document.getElementById('toggleDealerBtn');
    const icon = document.getElementById('dealerIcon');

   if (list.style.display === "none" || list.style.display === "") {
        list.style.display = "flex"; 
        btn.childNodes[0].nodeValue = "딜러 숨기기 ";
	icon.className = "fa fa-chevron-up";
    } else {
        list.style.display = "none";
        btn.childNodes[0].nodeValue = "딜러보기 ";
	icon.className = "fa fa-chevron-down";
    }
}
</script>

<div class="section panel overflow-hidden mb-2 mt-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                    {{T_DEALER_INFO_HTML}}

                </div> <!--Content end-->


            </div>
            <!-- IF START 'UPDATE_DELETE' -->
            <div class="mt-1 d-flex gap-narrow justify-end"> <a href="vehicle_dealer_write.php?dealer_id={{T_DEALER_ID}}" class="btn btn-primary btn-sm2">딜러 자동차 등록</a>
                <!-- IF START 'PREMIUM_UPDATE' -->   
                 <a href="/ad/ad_request_update.php?id={{T_DEALER_ID}}&ad_method=vehicle_dealer" class="btn btn-primary2 btn-sm2">유료 딜러 광고 수정</a>
                <!-- IF END 'PREMIUM_UPDATE' -->
            </div>
            <!-- IF END 'UPDATE_DELETE' -->

        </div>
    </div>
</div>

<!-- Section end -->

<!-- 검색 Start -->

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
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1"
                         id="result_html">

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Section end -->


<!-- 자동차 프리미엄 end -->
<div id="result_pagging">

</div>
<script>
    var g_page = {{G_PAGE}};

</script>

<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/vehicle_dealer.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>
<script defer src="/js/libs/jquery.mask.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->

