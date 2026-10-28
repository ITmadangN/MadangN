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
				    <div class="fw-bold fs-4 text-success">
                    {{T_OFFICE_LOGO}}
                    {{T_OFFICE_NAME}}</div>
                    <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                        <li><a href="/">Home</a></li>
                        <li><i class="unicon-chevron-right opacity-50"></i></li>
                        <li><a href="/realestate/">부동산</a></li>
						<li><i class="unicon-chevron-right opacity-50"></i></li>
                        <li><span class="text-primary fw-semibold">커머셜</span></li>
                    </ul>
				  </div>
                </div>
            </div><!-- Top title-->



           <article class="product type-product single product-single pb-0">
                <div class="max-w-xl">
                    <div class="product-header panel">
                        <div class="row child-cols-12 gy-4 gx-3">
                            <div class="col-12">

                                <div class="product-slider panel swiper-parent" style="position:relative;">
								    <div class="sale">{{T_STANDARD_STATUS}}</div>
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
                           
                                <div class="block-content border p-2" style="border-top:2px solid #000 !important; padding-top:5px !important;">
                                     <!--div class="panel row child-cols-12 border-bottom pb-1 pt-1 md:pt-0">
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
                                    </div>


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
                                            </div--><!-- Contents-->  



                                      <div class="panel row child-cols-12 md:child-cols pt-0 pb-1">
                                        
                                           <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;align-items: center;">
                                           <div class="fw-bolder h3 text-success">{{T_LIST_PRICE}}
                                                       <br /><span class="fs-5 sm:fs-4 fw-medium text-gray-900 text-opacity-70">{{T_UNPARSED_ADDRESS}}</span>
                                           </div>
                                           <div class="d-flex gap-2 trds">     
                                                                                      
                                               <div class="text-center fs-7 fw-bold"><div style="height:35px;"><img src="/realestate/images/bed4.svg" data-src="/realestate/images/bed4.svg" alt="" /></div>{{T_BEDROOMS_TOTAL}} beds</div>  
                                               <div class="text-center fs-7 fw-bold"><div style="height:35px;"><img src="/realestate/images/bath6.svg" data-src="/realestate/images/bath6.svg" alt="" /></div>{{T_BATHROOMS_TOTAL}} baths</div>   
                                               <div class="text-center fs-7 fw-bold"><div style="height:35px;"><img src="/realestate/images/ruler2.svg" data-src="/realestate/images/ruler2.svg" alt="" /></div>{{T_LIVING_AREA}}</div>                                                                                              
                                            
                                            
                                            </div>
                                          </div>
                                          

                                      </div><!-- Contents--> 

                                       
                                       <div style="display:flex;justify-content: space-start;flex-wrap: wrap;margin-top:1px;gap:7px;">
                                            <div class="bg-gray-25  mb-0 p-1 px-2 py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                  <div><img src="/realestate/images/Residential.svg" data-src="/realestate/images/Residential.svg" alt="" /></div>
                                                 <div>{{T_PROPERTY_TYPE}}</div>
                                             </div>
                                             <div class="bg-gray-25 mb-0 p-1 px-2 py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                  <div><img src="/realestate/images/home5.svg" data-src="/realestate/images/home5.svg" alt="" /></div>
                                                 <div>{{T_PROPERTY_SUB_TYPE}}</div>
                                             </div>
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-62"><img src="/realestate/images/status.svg" data-src="/realestate/images/status.svg" alt="" /></div>
                                                 <div>{{T_SPECIAL_LISTING_CONDITIONS}}</div>
                                             </div>
                                             <!-- IF START 'COMMERCIALSALE' -->
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-5"><img src="/realestate/images/square.svg" data-src="/realestate/images/square.svg" alt="" /></div>
                                                 <div>{{T_BUILDING_AREA_TOTAL}} sqft Building Area</div>
                                             </div>
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-5"><img src="/realestate/images/square.svg" data-src="/realestate/images/square.svg" alt="" /></div>
                                                 <div>{{T_LOT_SIZE_SQFT}} sqft Lot</div>
                                             </div>
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-62"><img src="/realestate/images/sqft.svg" data-src="/realestate/images/sqft.svg" alt="" /></div>
                                                 <div>{{T_LIVING_AREA2}}/sqft </div>
                                             </div>          
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div><img src="/realestate/images/build2.svg" data-src="/realestate/images/build2.svg" alt="" /></div>
                                                 <div>Built in {{T_YEAR_BUILT}}</div>
                                             </div>        
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div><img src="/realestate/images/floor.svg" data-src="/realestate/images/floor.svg" alt="" /></div>
                                                 <div>{{T_STORIES_TOTAL}} Stories</div>
                                             </div>                                
                                             <div class="bg-gray-25  mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                  <div><img src="/realestate/images/hoa.svg" data-src="/realestate/images/hoa.svg" alt="" /></div>
                                                 <div>{{T_TEMP_HOA}}</div>
                                             </div>                                                                                          
                                             <!-- IF END 'COMMERCIALSALE' -->
                                             <!-- IF START 'LAND' -->
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-5"><img src="/realestate/images/square.svg" data-src="/realestate/images/square.svg" alt="" /></div>
                                                 <div>{{T_LOT_SIZE_SQFT}} sqft Lot</div>
                                             </div>
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-62"><img src="/realestate/images/sqft.svg" data-src="/realestate/images/sqft.svg" alt="" /></div>
                                                 <div>{{T_LIVING_AREA2}}/sqft </div>
                                             </div>   
                                             <div class="bg-gray-25  mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                  <div><img src="/realestate/images/hoa.svg" data-src="/realestate/images/hoa.svg" alt="" /></div>
                                                 <div>{{T_TEMP_HOA}}</div>
                                             </div>   
                                             <!-- IF END 'LAND' -->
                                             <!-- IF START 'RESIDENTIALINCOME' -->
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-5"><img src="/realestate/images/square.svg" data-src="/realestate/images/square.svg" alt="" /></div>
                                                 <div>{{T_BUILDING_AREA_TOTAL}} sqft Building Area</div>
                                             </div>
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-5"><img src="/realestate/images/square.svg" data-src="/realestate/images/square.svg" alt="" /></div>
                                                 <div>{{T_LOT_SIZE_SQFT}} sqft Lot</div>
                                             </div>
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div class="fs-62"><img src="/realestate/images/sqft.svg" data-src="/realestate/images/sqft.svg" alt="" /></div>
                                                 <div>{{T_LIVING_AREA2}}/sqft </div>
                                             </div>  
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div><img src="/realestate/images/build2.svg" data-src="/realestate/images/build2.svg" alt="" /></div>
                                                 <div>Built in {{T_YEAR_BUILT}}</div>
                                             </div> 
                                             <div class="bg-gray-25 mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                 <div><img src="/realestate/images/floor.svg" data-src="/realestate/images/floor.svg" alt="" /></div>
                                                 <div>{{T_STORIES_TOTAL}} Stories</div>
                                             </div>                                
                                             <div class="bg-gray-25  mb-0 p-1 px-2  py-2 w-30pro d-flex gap-1 fs-62 fw-medium items-center">
                                                  <div><img src="/realestate/images/hoa.svg" data-src="/realestate/images/hoa.svg" alt="" /></div>
                                                 <div>{{T_TEMP_HOA}}</div>
                                             </div>
                                             <!-- IF END 'RESIDENTIALINCOME' -->
                                    
                                             

                                         </div>
                                       <!-- IF START 'COMMENT' -->
                                             <div class="panel child-cols-12 mt-1 bg-gray-25 p-2" style="word-break: keep-all;overflow-wrap: break-word;word-wrap: break-word;">
                                             {{T_AGENT_COMMENT}}
                                             </div>
                                <!-- IF END 'COMMENT' -->  
                                <!-- IF START 'MYCOMMENT' -->
                                <form name="formp" id="formp" action="ajax/ajax_realestate.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="ac" id="ac" value="write_comment">
                                        <input type="hidden" name="rid" id="rid" value="{{T_ID}}">
                                             <div class="fw-bold text-agent fs-62 mt-1 mb-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 매물소개정보</div>
                                                  <textarea class="form-control h-250px w-full fs-6 bg-white" type="text" name="agent_comment" id="agent_comment">{{T_AGENT_COMMENT}}</textarea>
                                             <div class="tds2" style="margin-top:-0.1rem; margin-bottom:0.5rem; text-align:right;"><button class="btn btn-primary2 btn-sm" type=submit>매물소개정보 수정</button>   </div>
                                             </form>
                                <!-- IF END 'MYCOMMENT' -->
                                       
                                

                                      <div class="panel row child-cols-12 md:child-cols mt-3">
                                        <div class="col-12 md:col-8" style="overflow-wrap: break-word;">
                                            
                                            <div class="comul lh-3 fs-5 mb-2 p-1">
                                            
                                            <div class="mb-2">
                                                   <span style="font-size: 18px;color:#f39c04;font-weight:bold;">Information</span>
                                            </div>

                                        <!-- IF START 'LAND' -->
                                            <!-- IF START 'LOT' -->
                                             <div class="post-header panel hstack gap-1">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">LOT</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <!-- IF START 'LOT_SIZE' -->    
                                                  <li>Size  : {{T_LOT_SIZE}}</li>
                                                  <!-- IF END 'LOT_SIZE' -->    
                                                  <!-- IF START 'LOT_FEATURES' -->    
                                                  <li>{{T_LOT_FEATURES}}</li>
                                                  <!-- IF END 'LOT_FEATURES' -->    
                                                </ul>                                                                                                               
                                            </div> 
                                            <!-- IF END 'LOT' -->   
                                        <!-- IF END 'LAND' -->   
                                            
                                            <!-- IF START 'ZONING' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Zoning</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_ZONING}}, {{T_ZONING_DESCRIPTION}}</li>
                                                </ul>
                                            </div>
                                            <!-- IF END 'ZONING' -->   
                                        <!-- IF START 'LAND' -->
                                            <!-- IF START 'DEVELOPMENTSTATUS' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">DevelopmentStatus</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_DEVELOPMENT_STATUS}}</li>
                                                </ul>
                                            </div>
                                            <!-- IF END 'DEVELOPMENTSTATUS' -->   
                                            <!-- IF START 'WATER_SOURCE' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">WaterSource</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_WATER_SOURCE}}</li>
                                                </ul>
                                            </div>
                                            <!-- IF END 'WATER_SOURCE' -->  
                                            <!-- IF START 'SEWER' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Sewer</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_SEWER}}</li>
                                                </ul>
                                            </div>
                                            <!-- IF END 'SEWER' -->
                                            <!-- IF START 'ROAD_FRONTAGE_TYPE' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">RoadFrontageType</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_ROAD_FRONTAGE_TYPE}}</li>
                                                </ul>
                                            </div>
                                            <!-- IF END 'ROAD_FRONTAGE_TYPE' -->
                                            <!-- IF START 'ROAD_SURFACE_TYPE' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">RoadSurfaceType</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_ROAD_SURFACE_TYPE}}</li>
                                                </ul>
                                            </div>
                                            <!-- IF END 'ROAD_SURFACE_TYPE' -->
                                        <!-- IF END 'LAND' -->
                                          
                                        <!-- IF START 'COMMERCIALSALE_RESIDENTIALINCOME' -->    
                                            <!-- IF START 'CAP_RATE' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Cap Rate: {{T_CAP_RATE}}%</span>
                                            </div>                    
                                            <!-- IF END 'CAP_RATE' -->   
                                            <!-- IF START 'NET_OPERATING_INCOME' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">NOI: ${{T_NET_OPERATING_INCOME}}</span>
                                            </div>                                            
                                            <!-- IF END 'NET_OPERATING_INCOME' -->   
                                            <!-- IF START 'UNITS' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Units </span>
                                            </div>     
                                            <div class="con_list">
                                               <ul>
                                                  <li>UnitsTotal  : {{T_UNITS_TOTAL}}</li>
                                                  <li>{{TEMP_UNIT_PRICE}}/Unit.</li>
                                                </ul>                                                                                                               
                                            </div>                                       
                                            <!-- IF END 'UNITS' -->                                                                                  
                                            <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Features (특징들) </span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                   <!-- IF START 'LEVELS' -->    
                                                   <li>Levels : {{T_LEVELS}}</li>
                                                   <!-- IF END 'LEVELS' -->    
                                                   <!-- IF START 'STORIES_TOTAL' -->    
                                                   <li>Stories : {{T_STORIES_TOTAL}}    </li>
                                                   <!-- IF END 'STORIES_TOTAL' -->    
                                                   <!-- IF START 'NUMBER_OF_BUILDINGS' -->    
                                                   <li>Buildings : {{T_NUMBER_OF_BUILDINGS}}</li>
                                                   <!-- IF END 'NUMBER_OF_BUILDINGS' -->    
                                                   <!-- IF START 'POOL_FEATURES' -->    
                                                   <li>Pool features: : {{T_POOL_FEATURES}}</li>
                                                   <!-- IF END 'POOL_FEATURES' -->    
                                                   
                                               </ul>
                                            </div>

                                             <!-- IF START 'HOA' -->
                                            <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">HOA </span>
                                            </div>

                                            <div class="con_list">
                                               <ul>
                                                  <!-- IF START 'ASSOCIATION_FEE' -->    
                                                  <li>HOA Fee: {{T_TEMP_HOA}}</li>
                                                  <!-- IF END 'ASSOCIATION_FEE' -->    
                                                  <!-- IF START 'ASSOCIATION_FEE_INCLUDES' -->    
                                                  <li>편의 시설 포함: {{T_ASSOCIATION_FEE_INCLUDES}}</li>
                                                  <!-- IF END 'ASSOCIATION_FEE_INCLUDES' -->    
                                               </ul>
                                            </div>
                                            <!-- IF END 'HOA' -->    
                                        <!-- IF END 'COMMERCIALSALE_RESIDENTIALINCOME' -->    
                                        <!-- IF END 'RESIDENTIALINCOME' -->
                                            <!-- IF START 'COOLING' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Cooling </span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_COOLING}}</li>
                                                </ul>
                                            </div>
                                            <!-- IF END 'COOLING' -->   
                                            <!-- IF START 'HEATING' -->                                         
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Heating </span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                 <li>{{T_HEATING}}</li>
                                               </ul>
                                            </div>                                                              
                                            <!-- IF END 'HEATING' -->
                                        <!-- IF END 'RESIDENTIALINCOME' -->  
                                        <!-- IF START 'COMMERCIALSALE_RESIDENTIALINCOME' -->      
                                            <!-- IF START 'PARKING' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">주차정보 </span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                               <!-- IF START 'PARKING_TOTAL' -->  
                                                   <li>Parking Spaces: {{T_PARKING_TOTAL}}</li>
                                               <!-- IF END 'PARKING_TOTAL' -->    
                                               <!-- IF START 'PARKING_FEATURES' -->    
                                                   <li>Parking features: {{T_PARKING_FEATURES}}</li>
                                               <!-- IF END 'PARKING_FEATURES' -->    
                                               <!-- IF START 'GARAGE_SPACES' -->    
                                                   <li>Attached garage spaces: {{T_GARAGE_SPACES}}</li>
                                               <!-- IF END 'GARAGE_SPACES' -->    
                                               <!-- IF START 'CARPORT_SPACES' -->        
                                                   <li>Carport spaces: {{T_CARPORT_SPACES}}</li>
                                               <!-- IF END 'CARPORT_SPACES' -->    
                                               <!-- IF START 'COVERED_SPACES' -->        
                                                   <li>Covered spaces: {{T_COVERED_SPACES}}</li>
                                               <!-- IF END 'COVERED_SPACES' -->    
                                               <!-- IF START 'UNCOVERED_SPACES' -->        
                                                   <li>Uncovered spaces: {{T_UNCOVERED_SPACES}}</li>
                                               <!-- IF END 'UNCOVERED_SPACES' -->                                                   

                                               </ul>
                                            </div>
                                            <!-- IF END 'PARKING' -->
                                        <!-- IF END 'COMMERCIALSALE_RESIDENTIALINCOME' -->       
                                        <!-- IF START 'RESIDENTIALINCOME' --> 
                                            <!-- IF START 'APPLIANCES' -->  
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">가전제품</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                               <!-- IF START 'APPLIANCES2' -->   
                                                 <li>Appliances : {{T_APPLIANCES}}</li>
                                               <!-- IF END 'APPLIANCES2' -->    
                                               <!-- IF START 'LAUNDRY_FEATURES' -->        
                                                 <li>LaundryFeatures : {{T_LAUNDRY_FEATURES}}</li>
                                                <!-- IF END 'LAUNDRY_FEATURES' -->   
                                               </ul>
                                            </div>
                                            <!-- IF END 'APPLIANCES' -->   
                                        <!-- IF END 'RESIDENTIALINCOME' --> 
                                        <!-- IF START 'COMMERCIALSALE' --> 
                                            <!-- IF START 'SECURITY' -->  
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Security</span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                 <li>{{T_SECURITY_FEATURES}}</li>

                                               </ul>
                                            </div>
                                            <!-- IF END 'SECURITY' -->   
                                        <!-- IF END 'COMMERCIALSALE' -->     
                                        <!-- IF START 'RESIDENTIALINCOME' -->     
                                            <!-- IF START 'PROPERTYCONDITION' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">PropertyCondition </span>
                                            </div>
                                            <div class="con_list">
                                               <ul>                                                  
                                                    <li>{{T_PROPERTY_CONDITION}}</li>

                                               </ul>
                                            </div>
                                            <!-- IF END 'PROPERTYCONDITION' -->
                                        <!-- IF END 'RESIDENTIALINCOME' -->         
                                            <!-- IF START 'UTILITIES' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Utilities </span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_UTILITIES}}</li>
                                               </ul>
                                            </div>
                                             <!-- IF END 'UTILITIES' -->
                                            <!-- IF START 'PUBLIC_REMARKS' -->
                                             <div class="post-header panel hstack gap-1 mt-4">
                                                   <span class="text-gray-900 text-opacity-60" style="font-size: 13px"><i class="fa fa-check-circle"></i></span>
                                                   <span class="text-gray-900 text-opacity-80 fs-62 fw-bold">Public Remarks </span>
                                            </div>
                                            <div class="con_list">
                                               <ul>
                                                  <li>{{T_PUBLIC_REMARKS}}</li>
                                               </ul>
                                            </div>
                                             <!-- IF END 'PUBLIC_REMARKS' --> 
                                            



   


                                            

                                            </div>
                                        </div><!-- 1 -->

                                        <div class="col-12 md:col-4 mt-1" style="position: relative">
                                          <div id="sticky-sidebar" style="width: 100%;">
                                            <div class="product-details panel vstack bpd">                                             
                                             <div><a href="javascript:return false;" class="btn btn-xs btn-red text-none fs-6 rounded-1 w-100"><span>Contact a buyer's agent</span>  </a></div>
                                   
                                          <p class="fs-6 p-2 mt-n2">
                                           
                                               <form name="formp" id="formu" action="ajax/ajax_realestate.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="ac" id="ac" value="send_call">
                                                <input type="hidden" name="rid" id="rid" value="{{T_ID}}">
                                                <div class="reg mt-n1">
                                                <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text" name="user_name" id="user_name" placeholder="이름" value="{{T_USER_NAME}}">
                                                 <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text" name="user_email" id="user_email"placeholder="이메일" value="{{T_USER_EMAIL}}">
                                                 <input class="form-control form-control-xs h-32px w-full fs-6 rounded-0" type="text" name="user_phone" id="user_phone"placeholder="연락처" value="{{T_USER_PHONE}}">
                                                 <textarea class="form-control w-full fs-6 rounded-0 mt-1 p-1" type="text" placeholder="내용" name="user_content" id="user_content" rows="2" style="height:70px;">I am interested in {{T_UNPARSED_ADDRESS}}
                                                 </textarea>
                                                  <!--script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                                  <div class="recaptcha-container">
                                                    <div class="g-recaptcha" data-sitekey="6LevC4wsAAAAAHdXpPXCRp744rTf-fDcwCjPFC7w"></div>
                                                  </div-->
                                                </div>
                                               <div class="mt-1">
                                               <button class="btn btn-xs btn-primary rounded-0 flex-1 text-none w-100" type=submit>문의하기</button> 
                                               </div>
                                            </form>
                                          </p>
                                        </div>
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


            <!-- IF START 'T_UPDATE' -->
            <div class="mt-1 d-flex gap-narrow justify-end"><a href="javascript:return false;" onclick="GO_UPDATE('{{T_ID}}');" class="btn btn-primary2 btn-sm2">수정</a> <a href="javascript:return false;" onclick="GO_DELETE('{{T_ID}}');" class="btn btn-primary btn-sm2">삭제</a></div>
            <!-- IF END 'T_UPDATE' -->

            <!-- Section start -->
            
            <div class="panel row child-cols-12 md:child-cols" style="padding-left:20px;">
                          
                <div style="font-size:12px;color:#555;line-height:1.6;">
                    <p style="margin:1px 0;">
                        Listed by: {{T_AGENT_FULL_NAME}} DRE #{{T_AGENT_DRE_LICENSE}}
                        <a href="{{T_AGENT_EMAIL}}">{{T_AGENT_EMAIL}}</a>,
                         {{T_OFFICE_NAME}}
                    </p>
                    <p style="margin:1px 0;">
                        Source: CRMLS, MLS#: {{T_LISTING_ID}} Originating MLS: California Regional MLS
                    </p>
                </div>
                
                 
                                        
             </div>

    <div class="block-header panel text-center mt-5 mb-5">
                                    <div class="hr w-100 position-absolute top-0 start-0 end-0"></div>
                                    <div class="vstack gap-0 py-1 px-1 lg:px-2 position-absolute top-50 start-50 translate-middle bg-white">
                                        <h2 class="h4 m-0 text-black dark:text-white">추천매물</h2>
                                    </div>
                                </div>
             <div class="section-content">
                                <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2 gy-2">

                                <!-- Swiper CSS CDN (만약 테마에 이미 포함되어 있다면 생략 가능) -->
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

                                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel mt-r1" style="position: relative;">                    
                                    <div class="block-content panel">                        
                                        <!-- .realestate-swiper 클래스를 통해 독립적으로 제어합니다 -->
                                        <div class="swiper realestate-swiper" style="overflow: hidden; padding: 5px 0;">                            
                                            <div class="swiper-wrapper">
                                <!-- LOOP START 'T_LOOP' -->                
                                               <!-- 슬라이드 부동산 매물 -->
                                                <div class="swiper-slide" style="width: 297.333px; margin-right: 18px;" role="group" aria-label="{{T_LOOP.T_NUM}}">
                                                    <article class="post type-post panel uc-transition-toggle vstack gap-2 border">
                                                        <div class="post-media panel overflow-hidden">
                                                            <div class="featured-image bg-gray-25 ratio ratio-3x2">
                                                                <img class="{{T_LOOP.T_IMG}}" data-src="{{T_LOOP.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                            </div>
                                                            <a href="/realestate/{{T_LOOP.T_LINK}}" class="position-cover"></a>
                                                        </div>
                                                        <div class="post-header panel vstack gap-0 p-2 mt-n1">
                                                            <div class="fs-7 m-0 text-gray-500" style="height:30px;">
                                                                <i class="unicon-location-filled"></i> {{T_LOOP.T_UNPARSED_ADDRESS}}
                                                            </div>
                                                            <div class="fs-4 m-0 fw-bolder mt-1">
                                                                ${{T_LOOP.T_LIST_PRICE}}
                                                            </div>
                                                            <div class="post-bottom panel hstack gap-1 fs-7 mt-1 text-black text-opacity-70">
                                                                <div>
                                                                   <img src="/realestate/images/bed.svg" data-src="/realestate/images/bed.svg" alt="" /> <span>{{T_LOOP.T_BEDROOMS_TOTAL}} </span>
                                                                </div>
                                                                <div>
                                                                    <img src="/realestate/images/bath.svg" data-src="/realestate/images/bath.svg" alt="" /> <span>{{T_LOOP.T_BATHROOMS_TOTAL}} </span>
                                                                </div>
                                                                <div>
                                                                   <span>{{T_LOOP.T_LOT_SIZE_SQFT}} SF<!-- , {{T_LOOP.T_PROPERTY_SUB_TYPE}} --> </span>
                                                                </div>
                                                           </div>
                                                        </div>
                                                   </article>
                                                </div>
                                <!-- LOOP END 'T_LOOP' -->

                                            </div>                        
                                        </div>                        

                                        <!-- 네비게이션 버튼 (클래스명을 명확하게 지정) -->
                                        <div class="swiper-nav realestate-prev position-absolute top-50 start-0 translate-middle-y btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1" role="button" aria-label="Previous slide" style="cursor: pointer; z-index: 20; background: #fff; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; left: -15px;">                            
                                            <i class="icon-1 unicon-chevron-left"></i>                        
                                        </div>                        
                                        <div class="swiper-nav realestate-next position-absolute top-50 end-0 translate-middle-y btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1" role="button" aria-label="Next slide" style="cursor: pointer; z-index: 20; background: #fff; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; right: -15px;">                            
                                            <i class="icon-1 unicon-chevron-right"></i>                        
                                        </div>                    
                                    </div>                
                                </div>


                                <!-- 강제 초기화 및 버튼 매칭 스크립트 -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const swiper = new Swiper('.realestate-swiper', {
                                            slidesPerView: 1,
                                            spaceBetween: 16,
                                            loop: false, // 슬라이드가 적을 경우 충돌을 막기 위해 false 설정 (많아지면 true로 변경 가능)
                                            navigation: {
                                                nextEl: '.realestate-next',
                                                prevEl: '.realestate-prev',
                                            },
                                            breakpoints: {
                                                768: {
                                                    slidesPerView: 2,
                                                    spaceBetween: 20,
                                                },
                                                1024: {
                                                    slidesPerView: 3,
                                                    spaceBetween: 18,
                                                }
                                            }
                                        });
                                    });
                                </script>

                    </div>
                </div>
          

            <!-- Section end -->

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/realestate/realestate_view.js"></script>
<script defer src="/js/realestate/img_large_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->