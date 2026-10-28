<!-- INCLUDE FILE '../include/header.php' -->

 
        <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner panel vstack gap-2">

						    <ul class="v-tab-container">
                               <li>
                                   <a href="/towninfo/marketsale.php?s=CA" class="text-none">
                                   <div class="v-tab-item {{T_ON_CA}}">
                                      <div class="v-tab-text">캘리포니아</div>
                                   </div>
                                   </a>
                                </li>
                                <li>
                                   <a href="/towninfo/marketsale.php?s=NYNJ" class="text-none">
                                   <div class="v-tab-item {{T_ON_NYNJ}}">
                                      <div class="v-tab-text">뉴욕/뉴저지</div>
                                   </div>
                                   </a>
                                </li>
                                <li>
                                   <a href="/towninfo/marketsale.php?s=TX" class="text-none">
                                   <div class="v-tab-item {{T_ON_TX}}">
                                      <div class="v-tab-text">텍사스</div>
                                   </div>
                                   </a>
                                </li>
								 <li>
                                   <a href="/towninfo/marketsale.php?s=MDVA" class="text-none">
                                   <div class="v-tab-item {{T_ON_MDVA}}">
                                      <div class="v-tab-text">메릴랜드/버지니아</div>
                                   </div>
                                   </a>
                                </li>
								 <li>
                                   <a href="/towninfo/marketsale.php?s=DC" class="text-none">
                                   <div class="v-tab-item {{T_ON_DC}}">
                                      <div class="v-tab-text">워싱턴</div>
                                   </div>
                                   </a>
                                </li>
								 <li>
                                   <a href="/towninfo/marketsale.php?s=GA" class="text-none">
                                   <div class="v-tab-item {{T_ON_GA}}">
                                      <div class="v-tab-text">조지아</div>
                                   </div>
                                   </a>
                                </li>
								 <li>
                                   <a href="/towninfo/marketsale.php?s=IL" class="text-none">
                                   <div class="v-tab-item {{T_ON_IL}}">
                                      <div class="v-tab-text">일리노이</div>
                                   </div>
                                   </a>
                                </li>
								 <li>
                                   <a href="/towninfo/marketsale.php?s=AZ" class="text-none">
                                   <div class="v-tab-item {{T_ON_AZ}}">
                                      <div class="v-tab-text">아리조나</div>
                                   </div>
                                   </a>
                                </li>
								 <li>
                                   <a href="/towninfo/marketsale.php?s=HI" class="text-none">
                                   <div class="v-tab-item {{T_ON_HI}}">
                                      <div class="v-tab-text">하와이</div>
                                   </div>
                                   </a>
                                </li>
 
                             </ul><!-- Top button-->
                            <input type="hidden" id="s" name="s" value="{{T_S}}">
                                                 <div class="head_title3 mt-n2">
					          <h3 class="h5 lg:h5 m-0 fw-bolder">마켓세일  {{REG_BUTTON}}</h3>
					          <div>
                                    <select style="width:200px !important;" class="form-select rounded p-1 w-128px fs-6" id="s_county" name="s_county" onchange="GO_MARKET();">
                                        {{S_SELECT_COUNTY_NAME}}
                                    </select>
					          </div>
					        </div> <!-- Title end -->
                            <div class="section-content mt-n1">
                                <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2">
                                    <!-- LOOP START 'T_LOOP' -->
                                                   <div>
                                                    <article class="post type-post panel vstack gap-3 overflow-hidden uc-dark">
                                                        <div class="post-media panel overflow-hidden">
                                                            <div class="featured-image bg-gray-25 ratio ratio-3x4">
                                                                <img class="media-cover image" src="{{T_LOOP.T_MAIN}}" data-src="{{T_LOOP.T_MAIN}}" alt="Sale" data-uc-img="loading: lazy">
                                                            </div>
                                                        </div>
                                                        <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-90"></div>
                                                        <div class="post-header panel vstack justify-start items-start flex-column-reverse gap-1 p-2 position-cover text-white">
                                                            <div class="post-meta panel hstack justify-between fs-7 text-yellow text-opacity-30 mt-1">
                                                                <div class="meta">
                                                                    <div class="hstack gap-0">
                                                                        <div>
                                                                            <div class="post-author hstack gap-0">
                                                                                <img src="{{T_LOOP.T_LOGO}}" alt="{{T_LOOP.T_BRANCH_NAME}}" class="h-48px rounded">
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                                <span>{{T_LOOP.T_SALE_DATE}}</span><br />
																				<span class="text-white fs-6"> {{T_LOOP.T_BRANCH_NAME}}</span>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="actions">
                                                                    <div class="hstack gap-1"></div>
                                                                </div>
                                                            </div>
                                                            <h3 class="post-title h6 m-0 m-0 max-w-600px text-white text-truncate-1">
                                                                <a class="text-none text-white" href="{{T_LOOP.T_LINK}}">{{T_LOOP.T_TITLE}}</a>
                                                            </h3>
                                                           
                                                        </div>
                                                        <a href="{{T_LOOP.T_LINK}}" class="position-cover"></a>
                                                    </article>
                                                </div>
                                    <!-- LOOP END 'T_LOOP' -->
                                    
                                    
                                   
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/towninfo/marketsale.js"></script>
<script defer src="/js/iibiz_common.js"></script>


<!-- INCLUDE FILE '../include/footer.php' -->

