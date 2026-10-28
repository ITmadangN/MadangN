<!-- INCLUDE FILE '../include/header.php' -->

<link rel="stylesheet" href="/css/realestate_view.css">

<div id="lb-overlay">
  <button id="lb-close-top">&times;</button>
  <button id="lb-prev">&#8249;</button>
  <div id="lb-img-wrap">
    <div id="lb-loading">Loading...</div>
    <img id="lb-img" src="" alt="" style="display:none;">
  </div>
  <button id="lb-next">&#8250;</button>
  <div id="lb-counter"></div>
</div>

                      
<!-- Section start -->
		   <div class="breadcrumbs panel z-1 py-2 mb-3 bg-gray-25 border-top border-bottom">
               <div class="max-w-xl">
				 <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;">
				    <div class="fw-bold fs-4 text-success">{{T_OFFICE_NAME}}</div>
                    <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                        <li><a href="/">Home</a></li>
                        <li><i class="unicon-chevron-right opacity-50"></i></li>
                        <li><a href="/realestate/">부동산</a></li>
						<li><i class="unicon-chevron-right opacity-50"></i></li>
                        <li><span class="text-primary fw-semibold">에이전트</span></li>
                    </ul>
				  </div>
                </div>
            </div><!-- Top title-->



           <article class="product type-product single product-single pb-2">
                <div class="max-w-xl">
                    <div class="product-header panel">
                        <div class="row child-cols-12 gy-4 gx-3">
                            <div class="col-12">

                                <div class="product-slider panel swiper-parent" style="position:relative;">
								    <div class="sale">판매중</div>
                                    <div class="vstack gap-1">
                                        <div class="panel">
                                            <div class="swiper swiper-main h-100 swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden" data-uc-swiper="connect: .swiper-thumbs; items: 1; gap: 8; dots: .swiper-pagination; disable-class: d-none;">
                                                <div class="swiper-wrapper" data-uc-lightbox="" id="swiper-wrapper-bd2b80c94d1b6ce3" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">                                                
                                                    {{T_IMG_HTML}}
                                                </div>

                                                <!-- Add Arrows -->
                                                <div class="swiper-nav swiper-next btn btn-xs md:btn-md w-32px md:w-40px xl:w-56px h-32px md:h-40px xl:h-56px bg-white text-dark rounded-circle shadow-xs position-absolute top-50 end-0 translate-middle-y me-narrow md:me-2 z-1" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-bd2b80c94d1b6ce3" aria-disabled="false">
                                                    <i class="unicon-chevron-right icon-1 md:icon-2"></i>
                                                </div>
                                                <div class="swiper-nav swiper-prev btn btn-xs md:btn-md w-32px md:w-40px xl:w-56px h-32px md:h-40px xl:h-56px bg-white text-dark rounded-circle shadow-xs position-absolute top-50 start-0 translate-middle-y ms-narrow md:ms-2 z-1 uk-opacity-40 d-none" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-bd2b80c94d1b6ce3" aria-disabled="true">
                                                    <i class="unicon-chevron-left icon-1 md:icon-2"></i>
                                                </div>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                        </div>
                                        <div class="panel">
                                            <div class="swiper swiper-thumbs swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden" data-uc-swiper="items: 5; gap: 4;" data-uc-swiper-s="items: 14; gap: 8;">
                                                <div class="swiper-wrapper" id="swiper-wrapper-5bc8437a1a7c2dfd" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                                    
                                                    {{T_IMG_HTML_S}}
                                                </div>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                      </div>
                   </div>
            </article>
    

        <!-- Rent view end -->


<div class="section panel overflow-hidden mb-2 mt-2">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                           
                                <div class="block-content border p-2" style="border-top:2px solid #000 !important;">
                                     <div class="panel row child-cols-12 border-bottom pb-1 pt-1 md:pt-0">
                                        <div class="col-12">
                                            <div class="post-header panel hstack justify-between">
                                                         <h3 class="post-title h6">
                                                            <span class="text-dark fw-bold hover:text-primary">기본정보</span>
                                                         </h3>
														  <div class="mt-n2">
												             <a href="agent_dre_list.php?key={{T_LIST_AGENT_KEY}}" class="btn btn-sm btn-primary2 text-none fs-6 rounded-1">
                                                                      <i class="fa fa-user"></i><span>에이전트 매물보기</span>  </a>
                                                          </div>

												 </div>
										    
                                        </div>
									</div><!-- Title -->


                                    <div class="panel row child-cols-12 md:child-cols border-bottom pd21">
                                        
										  <div class="col-12 md:col-6">
                                              <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div><i class="fa fa-id-badge"></i></div>
                                                                        <div class="w-56px">에이전트</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">{{T_AGENT_FULL_NAME}}</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div class="fs-7"><i class="fa fa-envelope"></i></div>
                                                                        <div class="w-56px">이메일</div>
                                                                        <div class="text-gray-900  text-opacity-80 fs-6">{{T_AGENT_EMAIL}}</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
											 </div>
                                    
                                            <div class="child-cols-12">
                                                <div>
                                                     <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div><i class="fa fa-phone-square"></i></div>
                                                                        <div class="w-56px">연락처</div>
                                                                        <div class="text-primary fs-6"><a href="tel:010-2222-3333" class="text-none">{{T_AGENT_PHONE}}</a></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                                <div>
                                                     <article class="post type-post panel uc-transition-toggle mt-narrow">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div><i class="fa fa-briefcase"></i></div>
                                                                        <div class="w-56px">DRE #</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">{{T_AGENT_DRE_LICENSE}}</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
												 
                                              </div>
                                            </div><!-- Contents-->  



									  <div class="panel row child-cols-12 md:child-cols pt-2 pb-1">
                                        
										   <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;align-items: center;">
				                           <div class="fw-bolder h3 text-success">{{T_LIST_PRICE}}
										               <br /><span class="fs-5 fw-medium text-gray-900 text-opacity-70">{{T_UNPARSED_ADDRESS}}</span>
										   </div>
                                           <div class="d-flex gap-2 trds">     
										       <div class="text-center fs-7 fw-bold"><div style="height:35px;"><img src="/realestate/images/bed4.svg" data-src="/realestate/images/bed4.svg" alt="" /></div>{{T_BEDROOMS_TOTAL}} beds</div>  
											   <div class="text-center fs-7 fw-bold"><div style="height:35px;"><img src="/realestate/images/bath6.svg" data-src="/realestate/images/bath6.svg" alt="" /></div>{{T_BATHROOMS_TOTAL}} baths</div>   
											   <div class="text-center fs-7 fw-bold"><div style="height:35px;"><img src="/realestate/images/ruler2.svg" data-src="/realestate/images/ruler2.svg" alt="" /></div>{{T_LOT_SIZE_SQFT}}SF</div>    
											   <div class="text-center fs-7 fw-bold"><div style="height:35px;"><img src="/realestate/images/house.svg" data-src="/realestate/images/house.svg" alt="" /></div>{{T_PROPERTY_SUB_TYPE}}</div>   
											
											
											
											</div>
				                          </div>

                                          

                                      </div><!-- Contents--> 

                                       
									   <div style="display:flex;justify-content: space-start;flex-wrap: wrap;margin-top:15px;gap:7px;">
                                            <div class="bg-gray-25  mb-0 p-1 px-2 w-30pro d-flex gap-1 fs-7 fw-medium items-center">
												  <div class="fs-5"><i class="fa fa-gg"></i></div>
												 <div>{{T_LOT_SIZE_SQFT}} sqft Lot</div>
                                             </div>
										     <div class="bg-gray-25 mb-0 p-1 px-2 w-30pro d-flex gap-1 fs-7 fw-medium items-center">
												 <div class="fs-6"><i class="fa fa-money"></i></div>
												 <div>$2500/mo</div>
                                             </div>
											 <div class="bg-gray-25 mb-0 p-1 px-2 w-30pro d-flex gap-1 fs-7 fw-medium items-center">
												 <div class="fs-6"><i class="fa fa-user-plus"></i></div>
												 <div>{{T_ASSOCIATION_FEE}} HOA</div>
                                             </div>
											 <div class="bg-gray-25 mb-1 p-1 px-2 w-30pro d-flex gap-1 fs-7 fw-medium items-center">
												 <div><img src="/realestate/images/build2.svg" data-src="/realestate/images/build2.svg" alt="" /></div>
												 <div>Built in {{T_YEAR_BUILT}}</div>
                                             </div>
											 <div class="bg-gray-25 mb-1 p-1 px-2 w-30pro d-flex gap-1 fs-7 fw-medium items-center">
												 <div class="fs-6"><i class="fa fa-car"></i></div>
												 <div>{{T_COVERED_SPACES}} Garage spaces {{T_GARAGE_SPACES}} Carport space</div>
                                             </div>
											 

                                         </div>
								

                                      <div class="panel row child-cols-12 md:child-cols pd20 mt-2">
                                        <div class="col-12 md:col-8 mt-1">
                                            <div class="post-header panel hstack gap-1">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 18px"><i class="fa fa-check-circle"></i></span>
												   <span class="text-gray-900 text-opacity-80 fs-4 fw-bold">매물 상세정보 </span>
                                            </div>
											<div class="comul lh-3 fs-5 mt-2 mb-2">

										
리모델링 되었음. 컨디션 매우 좋음.<br />
$889,000<br />
타운하우스<br />
새 집처럼 깔끔하고 세련된 타운홈을 찾고 계신가요?<br />
싸이프러스 조용한 커뮤니티에 위치한 완전 리모델링된 엔드유닛 타운홈을 소개합니다.<br /><br />

✨ 4베드룸, 3욕실, 넓은 실내 1,748스퀘어피트<br />
✨ 새 주방 – 쿼츠 카운터탑과 스테인리스 가전<br />
✨ 스파 같은 욕실 – 레인 샤워헤드 & 모던 인테리어<br />
✨ 럭셔리 플로어 & 최신식 Lennox 에어컨/히팅<br /><br />

✨ 개인 파티오, 2대 주차 가능한 차고, 그리고 싸이프러스 명문학군과 공원, 레스토랑까지!

											

											</div>
                                        </div><!-- 1 -->

										<div class="col-12 md:col-4 mt-1">
                                            <div class="product-details panel vstack bpd">
                                             <h1 class="product-title fs-6 fw-bold m-0 pb-2 text-center trds2"> I am interested in this property </h1>
											 <div><a href="tel:" class="btn btn-xs btn-red text-none fs-6 rounded-1 w-100"><i class="fa fa-phone"></i><span>CALL</span>  </a></div>
                                   
                                          <p class="fs-6 p-2 mt-n2">
                                           
										      <form action="" method="" name="">
                                                <div class="reg mt-n1">
                                                 <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text" name="" placeholder="이름">
                                                 <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text" name="" placeholder="이메일">
                                                 <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text" name="" placeholder="연락처">
										         <textarea class="form-control w-full fs-6 rounded-0 mt-1 p-1" type="text" placeholder="내용" name="" rows="2"></textarea>
											      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
											      <div class="recaptcha-container">
                                                    <div class="g-recaptcha" data-sitekey="6LevC4wsAAAAAHdXpPXCRp744rTf-fDcwCjPFC7w"></div>
                                                  </div>
											    </div>
                                               <div class="mt-1"><a href="" class="btn btn-xs btn-primary rounded-0 flex-1 text-none w-100">문의하기</a></div>
                                            </form>
                                          </p>
                                        </div>
                                       </div><!-- 2 -->

									 </div>
                                  </div>
                                 </div>
                               </div> <!--Content end-->



                           </div>
                        </div>
                    </div>
            

            <!-- Section end -->




            <!-- Section start -->

    <div class="block-header panel text-center mt-5 mb-5">
                                    <div class="hr w-100 position-absolute top-0 start-0 end-0"></div>
                                    <div class="vstack gap-0 py-1 px-1 lg:px-2 position-absolute top-50 start-50 translate-middle bg-white">
                                        <h2 class="h4 m-0 text-black dark:text-white">추천매물</h2>
                                    </div>
                                </div>
             <div class="section-content">
                                <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2 gy-2">

								  {{T_RECOMMANDED}}

                    </div>
                </div>
          

            <!-- Section end -->

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/realestate/img_large_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
