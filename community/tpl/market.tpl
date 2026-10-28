<!-- INCLUDE FILE '../include/header.php' -->

<div class="nav-container mb-2">
    <a href="javascript:return false;" onclick="goUrl('/community/market.php?lt=market');" class="nav-item {{T_MARKET_ON}}">
        <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/>
            <path d="M3 6h18"/>
            <path d="M16 10a4 4 0 0 1-8 0"/>
        </svg>
        <span class="fs-6 fw-bold">벼룩시장</span>
    </a>
    <a href="javascript:return false;" onclick="goUrl('/community/market.php?lt=msale');" class="nav-item {{T_MSALE_ON}}">
        <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/>
            <circle cx="7" cy="18" r="2"/>
            <path d="M9 18h5"/>
            <path d="M18 18h1a1 1 0 0 0 1-1v-6.34a2 2 0 0 0-.59-1.41l-2.5-2.5A2 2 0 0 0 15.5 6H14"/>
            <circle cx="17" cy="18" r="2"/>
        </svg>
        <span class="fs-6 fw-bold">무빙세일</span>
    </a>
    <a href="javascript:return false;" onclick="goUrl('/community/market.php?lt=donation');" class="nav-item {{T_DONATION_ON}}">
        <svg class="nav-svg nav-svg-transparent" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <polyline points="20 12 20 22 4 22 4 12"/>
            <rect width="20" height="5" x="2" y="7"/>
            <line x1="12" y1="22" x2="12" y2="7"/>
            <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/>
            <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/>
        </svg>
        <span class="fs-6 fw-bold">무료드림</span>
    </a>
    <a href="javascript:return false;" onclick="goUrl('/community/market.php?lt=wanted');" class="nav-item {{T_WANTED_ON}}">
        <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="8"/>
            <path d="m21 21-4.3-4.3"/>
            <circle cx="11" cy="11" r="3"/>
        </svg>
        <span class="fs-6 fw-bold">구합니다</span>
    </a>
    <a href="javascript:return false;" onclick="goUrl('/community/market.php?lt=coupon');" class="nav-item {{T_COUPON_ON}}">
        <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
            <line x1="13" y1="5" x2="13" y2="19" stroke-dasharray="2 2"/>
        </svg>
        <span class="fs-6 fw-bold">세일쿠폰</span>
    </a>
</div><!-- Toptitle End -->


<div class="head_title3 mt-n1">
    <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>{{T_MENU_NAME}}</h3>
    {{T_REGISTER}}
</div><!-- Title End -->

<!-- 검색 Start -->

                              <div class="mb-0 bg-gray-25 p-2 rounded mt-n1">
                                   <form name="formp" action="ajax/ajax_market.php" method="post" onsubmit="return false;">
                                    <input type="hidden" name="listing_type" id="listing_type" value="{{T_LISTING_TYPE}}">        
<!-- IF START 'MARKET' -->                                    
                                     <div class="hstack items-start justify-between gap-1 mb-1" style="flex-wrap: wrap;">

                                      <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400" id="s_marketplace_type" name="s_marketplace_type">
                                                 {{S_SELECT_MARKETPLACE_TYPE}}
                                          </select>

                                         <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400"  name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
                                                 {{S_SELECT_STATE_CODE}}
                                          </select>
                                        
                                          <select class="js-example-basic-multiple fs-6 w-70pro" name="s_city_name[]" id="s_city_name" multiple="multiple">
                                               {{S_SELECT_CITY_NAME}}
                                          </select>
                                        
                                  <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400"  name="s_kind" id="s_kind">
                                                {{S_SELECT_MARKET_KIND}}
                                            </select>
                                        
                                        
                                       
                                             <input class="form-control form-control-sm h-40px fs-6 bg-white w-80pro" type="text" placeholder="검색어를 입력하세요!"  value="{{S_KEYWORD}}" name="s_keyword" id="s_keyword" placeholder="검색어를 입력하세요" onkeydown="return event.keyCode !== 13;">
                                                <button class="btn btn-primary btn-sm w-15pro tds" onclick="GET_PAGE();" type="button">검색</button>
                                           </div>
                                      
                                     
<!-- IF END 'MARKET' -->
                        </form>
                     </div> <!-- 검색 End -->

<!-- IF START 'MARKET_WANTED' -->
        <div class="hstack items-start justify-between gap-1 mb-1" style="flex-wrap: wrap;">


             <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400"  name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
                        {{S_SELECT_STATE_CODE}}
              </select>
            
              <select class="js-example-basic-multiple fs-6 w-33pro" name="s_city_name[]" id="s_city_name" multiple="multiple">
                   {{S_SELECT_CITY_NAME}}
              </select>                  

               <select class="form-select rounded p-12 w-10pro fs-6 text-gray-400"  name="s_kind" id="s_kind">
                {{S_SELECT_MARKET_KIND}}
                </select>
            
            
           
                 <input class="form-control form-control-sm h-40px fs-6 bg-white w-20pro" type="text" placeholder="검색어를 입력하세요!" name="s_keyword"
                    id="s_keyword" onkeydown="return event.keyCode !== 13;">
                    <button class="btn btn-primary btn-sm w-15pro tds"  onclick="GET_PAGE();" type="button">검색</button>
       </div>         
<!-- IF END 'MARKET_WANTED' -->
<!-- IF START 'MARKET_COUPON' -->
        <div class="vstack sm:hstack items-start justify-between gap-4">
            <div class="hstack items-start gap-1">
            </div>
            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12" name="s_kind" id="s_kind">
                    {{S_SELECT_MARKET_KIND}}
                </select>
                <input class="form-control form-control-sm h-42px fs-6 bg-white" type="text" placeholder="검색어를 입력하세요" name="s_keyword"
                       id="s_keyword" onkeydown="return event.keyCode !== 13;">

                <button class="btn btn-primary btn-sm" style="width:120px !important;" onclick="GET_PAGE();" type="button">검색</button>
            </div>
        </div>
<!-- IF END 'MARKET_COUPON' -->
    </form>




<!-- Section start -->
<div class="section panel overflow-hidden-x mt-1">
    <div class="section-outer panel">
        <!-- IF START 'MARKET' -->
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1"
                         id="result_html">

                    </div>

                    <div id="result_pagging">

                    </div>

                </div>
            </div>
        </div>
        <!-- IF END 'MARKET' -->
        <!-- IF START 'MARKET_WANTED' -->
        <div class="max-w-xl">
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top" style="min-width:600px;">

                    <colgroup>                        
                        <col width="20%" />
                        <col width="/" />
                        <col width="12%" />
                        <col width="9%" />

                    </colgroup>
                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                    <tr>
                        <th>지역</th>
                        <th>제목</th>
                        <th>등록자</th>
                        <th>등록일</th>

                    </tr>
                    </thead>
                    <tbody id="result_html">
                    </tbody>

                </table>
            </div>

            <div id="result_pagging">

            </div>
        </div>
        <!-- IF END 'MARKET_WANTED' -->
        <!-- IF START 'MARKET_COUPON' -->
        <div class="max-w-xl">
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top" style="min-width:600px;">

                    <colgroup>                        
                        <col width="/" />
                        <col width="20%" />
                        <col width="15%" />

                    </colgroup>
                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                    <tr>                        
                        <th>제목</th>
                        <th>등록자</th>
                        <th>등록일</th>

                    </tr>
                    </thead>
                    <tbody id="result_html">
                    </tbody>

                </table>
            </div>

            <div id="result_pagging">

            </div>
        </div>
        <!-- IF END 'MARKET_COUPON' -->
    </div>
</div>

<!-- Section end --><!-- 벼룩시장 end -->

<script>

    var g_page = {{G_PAGE}};

</script>
<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/market.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>                                                        
                                                        
<!-- INCLUDE FILE '../include/footer.php' -->


