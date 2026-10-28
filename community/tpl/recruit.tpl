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

.col-1, .col-2 { flex: 0 0 48%; }
.col-3 { flex: 0 0 100%; margin-top: 4px; }

@media (min-width: 768px) {
  .col-1 { flex: 0 0 15%; }
  .col-2 { flex: 0 0 20%; }
  .col-3 { flex: 1; margin-top: 0; }
}

.search-box-1 { flex: 0 0 48.5%; }
.search-box-2 { flex: 0 0 48.5%; }
.search-box-3 { flex: 0 0 100%; margin-top: 4px; }

@media (min-width: 768px) {
  .search-box-1 { flex: 0 0 15%; }
  .search-box-2 { flex: 1; margin-top: 0; } 
  .search-box-3 { flex: 0 0 100px; margin-top: 0; }
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


                                  <div class="items-start justify-between gap-1 mb-1" style="display:flex; flex-wrap: wrap;">
  
<div class="custom-dropdown-container col-1">
    <div class="form-select rounded p-12 text-start cursor-pointer sme" id="multiBtn">
      <span id="multiLabel" class="gry">전체</span>
    </div>
    <div class="dropdown-options shadow" id="multiMenu">
    {{S_CHECKBOX_JOB_TYPE}}
    <!--
      <label><input type="checkbox" name="city[]" value="1"> 사무직</label>
      <label><input type="checkbox" name="city[]" value="2"> 교육직</label>
      <label><input type="checkbox" name="city[]" value="3"> 전문직</label>
      <label><input type="checkbox" name="city[]" value="4"> 기술직</label>
      -->
    </div>
  </div>

  <div class="col-2">
    <select class="form-select rounded p-12 fs-6 text-gray-400 w-100" name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
      {{S_SELECT_STATE_CODE}}
    </select>
  </div>

 <div class="col-3">
    <select class="js-example-basic-multiple fs-6 w-100" name="s_city_name[]" id="s_city_name" multiple="multiple">
      {{S_SELECT_CITY_NAME}}
    </select>
  </div>

</div>
					  
					 <div class="items-start justify-between gap-1 mb-1" style="display:flex; flex-wrap: wrap;">


  <div class="search-box-1">
    <select class="form-select rounded p-12 fs-6 text-gray-400 w-100" name="s_kind" id="s_kind">
      {{S_SELECT_RECURIT_KIND}}
    </select>
  </div>


  <div class="search-box-2">
    <input class="form-control form-control-sm h-40px fs-6 bg-white w-100" type="text" value="{{S_KEYWORD}}" placeholder="검색어를 입력하세요!" name="s_keyword" id="s_keyword" onkeydown="return event.keyCode !== 13;">
  </div>


  <div class="search-box-3">
    <button class="btn btn-primary btn-sm h-40px w-100 tds" onclick="GET_PAGE();" type="button">검색</button>
  </div>

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
<script defer src="/js/community/recruit.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>

<!-- INCLUDE FILE '../include/footer.php' -->


