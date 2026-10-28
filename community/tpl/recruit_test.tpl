<!-- INCLUDE FILE '../include/header.php' -->

<style>

    .img_log_iibiz {
        max-width: 150px !important;
        max-height: 37px !important;
    }

    .platinum_img_log_iibiz {
        max-width: 150px !important;
        max-height: 50px !important;
    }

</style>

<div class="bar_bg color_purple fs-72 fw-medium rounded">
  <a href="javascript:return false;" onclick="DT_PAGE('CA','');" class="text-none">LA</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('CA','San Diego');" class="text-none">San Diego</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('CA','San Francisco');" class="text-none">SF</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('CA','San Jose');" class="text-none">San Jose</a><span class="divider">|</span>  
  <a href="javascript:return false;" onclick="DT_PAGE('NYNJ','');" class="text-none">NY/NJ</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('IL','Chicago');" class="text-none">Chicago</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('DC','');" class="text-none">DC</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('TX','');" class="text-none">Texas</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('WA','Seattle');" class="text-none">Seattle</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('GA','Atlanta');" class="text-none">Atlanta</a><span class="divider">|</span>
  <a href="javascript:return false;" onclick="DT_PAGE('AL','');" class="text-none">Montgomery</a>
</div>


<!-- 검색 Start -->

                              <div class="bg-gray-25 p-2 rounded">
                                   <form name="" action="" method="post">
                                     <div class="items-start justify-between gap-1 mb-1" style="display:flex;flex-wrap: wrap;">
 
                                             <div class="custom-dropdown-container">
                    <div class="form-select rounded p-12 text-start cursor-pointer" id="cityBtn">
                        <span id="cityLabel">전체</span>
                    </div>
<script>

    function test() {

        $('input[name="city[]"]:checked').each(function() {
            console.log($(this).val());
        });

        const selectedCities = document.querySelectorAll('input[name="city[]"]:checked');

        selectedCities.forEach((city) => {
            console.log(city.value);
        });

    }

</script>
                    <div class="dropdown-options shadow" id="cityMenu">
                        <label><input type="checkbox" name="city[]" value="1"> 사무직</label>
                        <label><input type="checkbox" name="city[]" value="2"> 교육직</label>
                        <label><input type="checkbox" name="city[]" value="3"> 전문직</label>
                        <label><input type="checkbox" name="city[]" value="4"> 기술직</label>
                    </div>
                </div>
        

                                         <div class="w-50pro2"><select class="form-select rounded p-12 fs-6 text-gray-400"  name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
                                                 {{S_SELECT_STATE_CODE}}
                                          </select></div>
                                     
 
                                          <div class="w-50pro2"> <select class="js-example-basic-multiple fs-6 w-70pro" name="s_city_name[]" id="s_city_name" multiple="multiple">
                                               {{S_SELECT_CITY_NAME}}
                                          </select></div>   </div><div class="items-start justify-between gap-1 mb-1" style="display:flex;flex-wrap: wrap;">
                                        
                                           <div class="w-50pro2"> <select class="form-select rounded p-12 fs-6 text-gray-400"  name="s_kind" id="s_kind">
                                                {{S_SELECT_RECURIT_KIND}}
                                            </select></div>
                                        
                                        
                                       
                                          <div><input class="form-control form-control-sm h-40px fs-6 bg-white w-80pro" type="text" placeholder="검색어를 입력하세요!" name="s_keyword" id="s_keyword" placeholder="검색어를 입력하세요" onkeydown="return event.keyCode !== 13;"></div>
                                           <div><button class="btn btn-primary btn-sm w-15pro tds" onclick="GET_PAGE();" type="button">검색</button></div>


                                           </div>
                                      
                                     </form>

                     </div> <!-- 검색 End -->

<!-- Section start -->
<div class="section panel overflow-hidden-x mt-1">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />PLATINUM</h3>
            </div>
            <div class="job-grid">
                <div class="job-card">
                    <div class="pp-list" id="result_platinum">
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
                    <div class="row child-cols-6 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1" id="result_gold">





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
                {{T_REGISTER}}
            </div>
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center border-top" style="min-width:600px;">

                    <colgroup>

                        <col width="15%" />
                        <col width="15%" />
                        <col width="/" />
                        <col width="13%" />
                        <col width="8%" />



                    </colgroup>
                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                    <tr>

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

                <div id="result_pagging">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end --><!-- 구합니다 end -->

<script>

    var g_page = {{G_PAGE}};

</script>


<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/recruit.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>

<!-- INCLUDE FILE '../include/footer.php' -->


