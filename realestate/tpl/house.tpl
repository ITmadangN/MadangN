<!-- INCLUDE FILE '../include/header.php' -->


   
    <!-- Section start -->
            <div class="section panel overflow-hidden mt-n2">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner panel vstack gap-2">
                            <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-2">
                                 <h2 class="h5  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                    <a class="text-none hover:text-primary duration-150" href="#">주택</a>
                                 </h2>
                            </div>

                            <!-- 검색 Start -->
                            
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
                              <a href="javascript:return false;" onclick="DT_PAGE('AL','');" class="text-none">Montgomery</a>`
                            </div>

                              <div class="bg-gray-25 p-2 rounded" style="margin-top:-1rem !important;">
                                   <form name="" action="" method="post">
                                   <input type="hidden" name="s_menu" id="s_menu" value="House">
                                   <input type="hidden" name="php_view" id="php_view" value="house_view">
                                     <div class="hstack items-start justify-between gap-1 mb-1" style="flex-wrap: wrap;">     
                                         <select class="form-select rounded p-12 w-50pro2 fs-6 " name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
                                                 {{S_SELECT_STATE_CODE}}
                                          </select>
                                        
                                          <select class="js-example-basic-multiple fs-6 w-60pro" name="s_city_name[]" id="s_city_name" multiple="multiple">
                                               {{S_SELECT_CITY_NAME}}
                                          </select>                                        
                                        <div class="w-276 d-flex items-start justify-between"> 
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="최소가격" id="s_min_price" value="{{S_MIN_PRICE}}"> ~
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="최대가격" id="s_max_price" value="{{S_MAX_PRICE}}">
                                        
                                       </div>

                                  <select class="form-select rounded p-12 w-22pro fs-6 "  id="s_bedrooms_total" name="s_bedrooms_total">
                                                 {{S_SELECT_BEDROOMS_TOTAL}}
                                            </select>
                                        
                                        
                                       
                                            <select class="form-select rounded p-12 w-22pro fs-6 " id="s_bathrooms_total" name="s_bathrooms_total">
                                                {{S_SELECT_BATHROOMS_TOTAL}}
                                            </select>

                                            
                                            <select class="form-select rounded p-12 w-22pro fs-6 " id="s_property_type" name="s_property_type" onchange="GET_PROPERTY_TYPE_SUB();">
                                                {{S_SELECT_PROPERTY_TYPE}}
                                            </select>
                                            <select class="form-select rounded p-12 w-22pro fs-6 " id="s_property_sub_type" name="s_property_sub_type">
                                                 {{S_SELECT_PROPERTY_SUB_TYPE}}
                                             </select>
                                                <button class="btn btn-primary btn-sm w-15pro tds" onclick="GET_PAGE();" type="button">검색</button>
                                           </div>
                                      
                                     </form>

                     </div> <!-- 검색 End -->
                     
							

                            <div class="section-content">
                                <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2 gy-2" id="result_html">
                                            
                                </div>
                            </div>

							<div id="result_pagging">

                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->

<script>

    var g_page = {{G_PAGE}};

</script>
<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/realestate/realestate.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/multi_select.js" ></script>
<script defer src="/js/libs/jquery.mask.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->

