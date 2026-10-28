<!-- INCLUDE FILE '../include/header.php' -->

<!-- 검색 Start -->

                              <div class="bg-gray-25 p-2 rounded">
                                   <form name="" action="" method="post">
                                     <div class="hstack items-start justify-between gap-1 mb-1" style="flex-wrap: wrap;">

                                      <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400" name="s_business_type" id="s_business_type">
                                                 {{S_SELECT_BUSINESS_TYPE}}
                                          </select>

                                         <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400"  name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
                                                 {{S_SELECT_STATE_CODE}}
                                          </select>
                                        
                                          <select class="js-example-basic-multiple fs-6 w-70pro" name="s_city_name[]" id="s_city_name" multiple="multiple">
                                               {{S_SELECT_CITY_NAME}}
                                          </select>
                                        
                                  <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400"  name="s_kind" id="s_kind">
                                                {{S_SELECT_BUSINESS_KIND}}
                                            </select>
                                        
                                        
                                       
                                             <input class="form-control form-control-sm h-40px fs-6 bg-white w-80pro" type="text" placeholder="검색어를 입력하세요!" value="{{S_KEYWORD}}" name="s_keyword" id="s_keyword" placeholder="검색어를 입력하세요" onkeydown="return event.keyCode !== 13;">
                                                <button class="btn btn-primary btn-sm w-15pro tds" onclick="GET_PAGE();" type="button">검색</button>
                                           </div>
                                      
                                     </form>

                     </div> <!-- 검색 End -->
                     


<!-- Section start -->
<div class="section panel overflow-hidden-x mt-n1">
    <div class="section-outer panel py-2">
        <div class="head_title">
            <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />PLATINUM</h3>

        </div>
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1" id="result_platinum">


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Section end --><!-- 비즈니스 end -->




<!-- Section start -->
<div class="section panel overflow-hidden mt-2" >
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title3">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />일반리스팅</h3>
                {{T_REGISTER}}
            </div>
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-7 text-center border-top" style="min-width:600px;">

                    <colgroup>                        
                        <col width="12%" />
                        <col width="15%" />
                        <col width="/" />
                        <col width="13%" />
                        <col width="10%" />



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
<script defer src="/js/community/business.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>

<!-- INCLUDE FILE '../include/footer.php' -->

