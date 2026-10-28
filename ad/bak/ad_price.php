<?php
$main="6";
$sub="1";
$mtitle="유료광고신청";
$stitle="유료 컨텐츠 광고";
include ('../include/header.php'); 

?>


<style>

/* post-header 내부의 모든 요소를 세로 중앙 정렬 */
.post-header {
    display: flex;
    flex-direction: column;
    justify-content: center; /* 세로 중앙 정렬 */
    min-height: 100%;       /* 부모 높이가 있다면 꽉 채움 */
}

/* 아이콘과 텍스트가 들어있는 라인(post-meta) 정렬 */
.post-meta {
    align-items: center;    /* 아이콘과 글자 높이 맞춤 */
}
</style>



       <!--  ccv2 -->
        <div id="uc-cvv2-modal" data-uc-modal="overlay: true">
            <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark rounded">
                <button class="uc-modal-close-default p-0 icon-3 btn border-0 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
                    <i class="unicon-close"></i>
                </button>
                <div class="panel vstack gap-2 md:gap-4 text-center">
                    <ul class="account-tabs-nav nav-x justify-center h6 py-2 border-bottom d-none" data-uc-switcher="animation: uc-animation-slide-bottom-small, uc-animation-slide-top-small">
                        <li><a href="#">cvv2</a></li>
                    </ul>
                    <div class="account-tabs-content uc-switcher px-3 lg:px-4 py-4 lg:py-8 m-0 lg:mx-auto vstack justify-center items-center">
                        <div class="w-100">
                            <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                                <h4 class="h5 lg:h4 m-0">CVV2 코드란?</h4>
                                <div class="panel vstack gap-2 w-100 sm:w-450px mx-auto">
                                  
                                        <div class="mb-1">CVV2 코드는 카드 뒷면의 3자리(VISA, MASTER, DISCOVER) 또는 4자리(AMEX)로 기재되어 있습니다</div>
                                      
                                        <img  src="/advertisement/cvv2.png" data-src="/advertisement/cvv2.png" alt="image" data-uc-img="loading: lazy">
                                    
                                   
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		 <!--  이전광고 -->
        <div id="uc-adver-modal" data-uc-modal="overlay: true">
            <div class="uc-modal-dialog  w-100 lg:max-w-700px bg-white text-dark rounded">
                <button class="uc-modal-close-default p-0 icon-3 btn border-0 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
                    <i class="unicon-close"></i>
                </button>
                <div class="panel vstack gap-2 md:gap-4 text-center">
                    <ul class="account-tabs-nav nav-x justify-center h6 py-2 border-bottom d-none" data-uc-switcher="animation: uc-animation-slide-bottom-small, uc-animation-slide-top-small">
                        <li><a href="#">advertisement</a></li>
                    </ul>
                    <div class="account-tabs-content uc-switcher px-3 lg:px-4 py-4 lg:py-8 m-0 lg:mx-auto vstack justify-center items-center">
                        <div class="w-100">
                            <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                                <h4 class="h5 lg:h4 m-0">이전에 광고한 목록</h4>
                                <div class="panel vstack gap-2 w-100 sm:w-450px mx-auto">
                               <form name="" action="" method="post">
                                        <div class="mb-1">
											
                          <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                              <table class="table align-middle overflow-auto m-0 fs-62 text-center fw-medium border-top" style="min-width:630px;">

					          <colgroup>
						      <col width="10%" />
							  <col width="/" />
							  <col width="10%" />
							  <col width="25%" />
							  <col width="15%" />
							  <col width="8%" />
							  </colgroup>
                                    <thead class="bg-primary text-white text-center border-bottom">
                                        <tr>
                                           
                                            <th>번호</th>
                                            <th>광고종류</th>
											<th>기간</th>
											<th>광고신청일</th>
                                            <th>담당자</th>
											<th>선택</th>
                                           
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           <td>
                                              1
                                            </td>
                                            <td>
											구인광고(Platinum)            
                                            </td>
											<td>
											6개월          
                                            </td>
											<td>
											2024-12-04             
                                            </td>
                                            <td>
                                           JoyKIm 
										   </td>
										    <td>
                                           <input class="form-check-input rounded-0" type="checkbox" id="Remember">
										   </td>
										 </tr>
                                    </tbody>
                                  </table>
						        </div>
                             </form>



                                        </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <form name="" action="" method="post">

      <div class="radio-container">
          <div class="radio-item">
             <input type="radio" name="content_select" id="radio1" value="1" checked>
             <label for="radio1">구인 광고 (Platinum)</label>
           </div>
           <div class="radio-item">
              <input type="radio" name="content_select" id="radio2" value="2">
              <label for="radio2">구인 광고 (Gold)</label>
           </div>
           <div class="radio-item">
              <input type="radio" name="content_select" id="radio3" value="3">
              <label for="radio3">비즈니스 광고 (Platinum)</label>
          </div>
          <div class="radio-item">
             <input type="radio" name="content_select" id="radio4" value="4">
             <label for="radio4">자동차 딜러광고</label>
         </div>
       </div> <!-- 광고 레디오 버튼 -->


     <div class="content-wrapper">
      <div id="content-1" class="desc-content">

		 <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                     <div class="head_title">
					                 <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />구인 광고 (Platinum)</h3>
					                </div>
                                </div>


                                 <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
    	                                 <div class="row g-1 pb-0 sm:pb-3">
                                             <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div class="dots"></div>
                                                                        <div class="w-72px">구인광고</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">Platinum</div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-72px">기간</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">
																		<select class="form-select rounded text-gray-900 w-100px h-32px p-narrow text-opacity-60" id="" name="">
                                                                           <option value="" selected="">1개월</option>
                                                                           <option value="3">3개월</option>
                                                                           <option value="6">6개월</option>
                                                                         </select>
																		 </div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-72px">가격</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">$0 (신규런칭이벤트)</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>

									        

                                                 </div>
										
										         <div class="col-12 md:col-6 pt-2">
                                                    <img  src="/advertisement/2.jpg" data-src="/advertisement/2.jpg" alt="image" data-uc-img="loading: lazy">
									             </div>
                                             </div>
                                       </div><!-- 상단 이미지 -->

							
                                <div class="dotline2"></div>

								

							    <div class="comborder">
                                    <div class="w-100 sm:w-800px mx-auto">  
									    <div class="pt-0">
                                          <div class="fw-bold fs-4">기업기본정보</div>
                                       </div>
									  <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">
                                            <div class="col-12 mt-2 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-64px">기업명</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											    </div>
												<div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											    </div>

											    <div class="col-12 md:col-6 ">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-64px">웹사이트</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											    </div>


                                             <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-64px">주소</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                               </div>
								           </div>
									    </div>
									</div>
                                 </div><!-- 기업정보 -->


                                <div class="comborder mt-3">
                                    <div class="w-100 sm:w-800px mx-auto">  
									    <div class="pt-2 sm:pt-3 mb-1 d-flex justify-between">
                                          <div class="fw-bold fs-4">광고게시정보</div>
										  <div class="btn btn-primary2 btn-sm fs-6"> <a href="#uc-adver-modal" class="text-none" data-uc-toggle>이전광고 불러오기</a></div>
                                        </div>
									    <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

										<div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">광고지역</div>
                                         </div>

										 <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">광고 지역 선택</div>
                                                                       <div class="w-150px">
																		 <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60" id="" name="">
                                                                           <option value="" selected="">도시</option>
                                                                           <option value="1">지역1</option>
                                                                           <option value="2">지역2</option>
                                                                         </select>
                                                                     </div>
                                                                     <div class="w-150px">
													                      <select class="form-select rounded p-1 text-gray-900 text-opacity-60" id="" name="">
                                                                           <option value="" selected="">주</option>
                                                                           <option value="1">지역1</option>
                                                                           <option value="2">지역2</option>
                                                                         </select>
                                                                      <div>
                                                                    </div>
                                                                 </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											    </div>

									     <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">광고 희망일</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 시작일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 종료일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 
											  
									    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">Contact 정보</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">담당자</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">이메일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 

											  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">연락처</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 


											  <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">업무 정보</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">직종</div>
                                                                       <div class="w-full">
																		<select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="" name="">
                                                       <option value="" selected="">직종</option>
                                                       <option value="1">직종1</option>
                                                       <option value="2">직종2</option>
                                                    </select>
                                                                       </div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">제목</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12">
                                                 <div> <textarea class="form-control h-250px w-full fs-6 bg-white mt-1" type="text" placeholder="내용" name="" required=""></textarea></div>
											  </div> 



											  <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                         </div>

									          <div class="col-12 md:col-8">

									          <div class="step-input-group" data-step="1">
                                                 <div class="custom-file-container">
                                                      <label class="custom-input-label">
                                                        <div class="preview-box"><img src="#" class="image-preview"></div>
                                                          <span class="placeholder-text">회사 로고 업로드 (클릭)</span>
                                                          <div class="btn-remove-x" style="display: none;"></div>
                                                          <input type="file" name="company_logo" accept="image/*" class="real-file-input" style="display: none;">
                                                      </label>
                                                </div>
                                              </div><!-- 로고 이미지 업로드 -->

                                              <div class="step-input-group" data-step="2">
                                                <input class="form-control form-control-sm h-40px w-full fs-6 bg-white custom-step-input" type="text" name="" placeholder="제목" required="">
                                              </div><!-- 제목 -->
											  <div class="step-input-group" data-step="3">
                                                <input class="form-control form-control-sm h-40px w-full fs-6 bg-white custom-step-input" type="text" name="" placeholder="소제목" required="">
                                              </div><!-- 소제목 -->

											  <div class="step-input-group" data-step="4">
                                                 <div class="custom-file-container">
                                                      <label class="custom-input-label">
                                                        <div class="preview-box"><img src="#" class="image-preview"></div>
                                                          <span class="placeholder-text">배경 이미지 (클릭)</span>
                                                          <div class="btn-remove-x" style="display: none;"></div>
                                                          <input type="file" name="business_license" accept="image/*" class="real-file-input" style="display: none;">
                                                      </label>
                                                </div>
                                              </div><!-- 로고 이미지 업로드 -->
                                          </div><!-- 왼쪽업로드 -->
										
										
										 <div class="col-12 md:col-4 text-center">
                                              <img  src="/advertisement/ad_14.png" data-src="/advertisement/ad_14.png" alt="image" data-uc-img="loading: lazy">
									      
										  </div>
                                       </div>
											

									     </div>
									 </div>
                                 </div><!-- 광고게시정보 -->


							
                             </div>
                          </div>
                        </div>
                     </div> 
				 </div>
              <!-- Section end -->

    </div><!-- 라디오버튼 1 내용 -->



    <div id="content-2" class="desc-content" style="display:none;">
		

  <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                     <div class="head_title">
					                 <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />구인 광고 (Gold)</h3>
					                </div>
                                </div>


                                 <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
    	                                 <div class="row g-1 pb-0 sm:pb-3">
                                             <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div class="dots"></div>
                                                                        <div class="w-72px">구인광고</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">Gold</div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-72px">기간</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">
																		<select class="form-select rounded text-gray-900 w-100px h-32px p-narrow text-opacity-60" id="" name="">
                                                                           <option value="" selected="">1개월</option>
                                                                           <option value="3">3개월</option>
                                                                           <option value="6">6개월</option>
                                                                         </select>
																		 </div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-72px">가격</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">$0 (신규런칭이벤트)</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>

									        

                                                 </div>
										
										         <div class="col-12 md:col-6 pt-2">
                                                    <img  src="/advertisement/3.jpg" data-src="/advertisement/3.jpg" alt="image" data-uc-img="loading: lazy">
									             </div>
                                             </div>
                                       </div><!-- 상단 이미지 -->

							
                                <div class="dotline2"></div>

								

							    <div class="comborder">
                                    <div class="w-100 sm:w-800px mx-auto">  
									    <div class="pt-0">
                                          <div class="fw-bold fs-4">기업기본정보</div>
                                       </div>
									  <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">
                                            <div class="col-12 mt-2 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-64px">기업명</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											    </div>
												<div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											    </div>

											    <div class="col-12 md:col-6 ">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-64px">웹사이트</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											    </div>


                                             <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-64px">주소</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                               </div>
								           </div>
									    </div>
									</div>
                                 </div><!-- 기업정보 -->


                                <div class="comborder mt-3">
                                    <div class="w-100 sm:w-800px mx-auto">  
									    <div class="pt-2 sm:pt-3 mb-1 d-flex justify-between">
                                          <div class="fw-bold fs-4">광고게시정보</div>
										  <div class="btn btn-primary2 btn-sm fs-6"> <a href="#uc-adver-modal" class="text-none" data-uc-toggle>이전광고 불러오기</a></div>
                                        </div>
									    <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

										<div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">광고지역</div>
                                         </div>

										 <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">광고 지역 선택</div>
                                                                       <div class="w-150px">
																		 <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60" id="" name="">
                                                                           <option value="" selected="">도시</option>
                                                                           <option value="1">지역1</option>
                                                                           <option value="2">지역2</option>
                                                                         </select>
                                                                     </div>
                                                                     <div class="w-150px">
													                      <select class="form-select rounded p-1 text-gray-900 text-opacity-60" id="" name="">
                                                                           <option value="" selected="">주</option>
                                                                           <option value="1">지역1</option>
                                                                           <option value="2">지역2</option>
                                                                         </select>
                                                                      <div>
                                                                    </div>
                                                                 </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											    </div>

									     <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">광고 희망일</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 시작일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 종료일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 
											  
									    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">Contact 정보</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">담당자</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">이메일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 

											  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">연락처</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 


											  <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">업무 정보</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">직종</div>
                                                                       <div class="w-full">
																		<select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="" name="">
                                                       <option value="" selected="">직종</option>
                                                       <option value="1">직종1</option>
                                                       <option value="2">직종2</option>
                                                    </select>
                                                                       </div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">제목</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12">
                                                 <div> <textarea class="form-control h-250px w-full fs-6 bg-white mt-1" type="text" placeholder="내용" name="" required=""></textarea></div>
											  </div> 



											  <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                         </div>

									          <div class="col-12 md:col-8">

									          <div class="step-input-group" data-step="1">
                                                 <div class="custom-file-container">
                                                      <label class="custom-input-label">
                                                        <div class="preview-box"><img src="#" class="image-preview"></div>
                                                          <span class="placeholder-text">회사 로고 업로드 (클릭)</span>
                                                          <div class="btn-remove-x" style="display: none;"></div>
                                                          <input type="file" name="company_logo" accept="image/*" class="real-file-input" style="display: none;">
                                                      </label>
                                                </div>
                                              </div><!-- 로고 이미지 업로드 -->

                                              <div class="step-input-group" data-step="2">
                                                <input class="form-control form-control-sm h-40px w-full fs-6 bg-white custom-step-input" type="text" name="" placeholder="제목" required="">
                                              </div><!-- 제목 -->
											  <div class="step-input-group" data-step="3">
                                                <input class="form-control form-control-sm h-40px w-full fs-6 bg-white custom-step-input" type="text" name="" placeholder="소제목" required="">
                                              </div><!-- 소제목 -->

											
                                          </div><!-- 왼쪽업로드 -->
										
										
										 <div class="col-12 md:col-4 text-center">
                                              <img  src="/advertisement/ad_15.png" data-src="/advertisement/ad_15.png" alt="image" data-uc-img="loading: lazy">
									      
										  </div>
                                       </div>
											

									     </div>
									 </div>
                                 </div><!-- 광고게시정보 -->


							
                             </div>
                          </div>
                        </div>
                     </div> 
				 </div>
              <!-- Section end -->

    </div>
	
	
	<!-- 라디오버튼 2 내용 -->


    <div id="content-3" class="desc-content" style="display:none;">
		
   <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                     <div class="head_title">
					                 <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />비즈니스 광고(Platinum)</h3>
					                </div>
                                </div>


                                 <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
    	                                 <div class="row g-1 pb-0 sm:pb-3">
                                             <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div class="dots"></div>
                                                                        <div class="w-100px">비즈니스 광고</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">Platinum</div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-100px">기간</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">
																		<select class="form-select rounded text-gray-900 w-100px h-32px p-narrow text-opacity-60" id="" name="">
                                                                           <option value="" selected="">1개월</option>
                                                                           <option value="3">3개월</option>
                                                                           <option value="6">6개월</option>
                                                                         </select>
																		 </div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-72px">가격</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">$0 (신규런칭이벤트)</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>

									        

                                                 </div>
										
										         <div class="col-12 md:col-6 pt-2">
                                                    <img  src="/advertisement/4.jpg" data-src="/advertisement/4.jpg" alt="image" data-uc-img="loading: lazy">
									             </div>
                                             </div>
                                       </div><!-- 상단 이미지 -->

							
                                <div class="dotline2"></div>

								



                                <div class="comborder">
                                    <div class="w-100 sm:w-800px mx-auto">  
									    <div class="mb-1 d-flex justify-between">
                                          <div class="fw-bold fs-4">광고게시정보</div>
										  <div class="btn btn-primary2 btn-sm fs-6"> <a href="#uc-adver-modal" class="text-none" data-uc-toggle>이전광고 불러오기</a></div>
                                        </div>
									    <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

										<div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">광고지역</div>
                                         </div>

										 <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">광고 지역 선택</div>
                                                                       <div class="w-150px">
																		 <select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60" id="" name="">
                                                                           <option value="" selected="">도시</option>
                                                                           <option value="1">지역1</option>
                                                                           <option value="2">지역2</option>
                                                                         </select>
                                                                     </div>
                                                                     <div class="w-150px">
													                      <select class="form-select rounded p-1 text-gray-900 text-opacity-60" id="" name="">
                                                                           <option value="" selected="">주</option>
                                                                           <option value="1">지역1</option>
                                                                           <option value="2">지역2</option>
                                                                         </select>
                                                                      <div>
                                                                    </div>
                                                                 </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											    </div>

									     <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">광고 희망일</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 시작일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 종료일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 
											  
									    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">Contact 정보</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">담당자</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">이메일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 

											  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">연락처</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 


											  <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">직종 정보</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">직종</div>
                                                                       <div class="w-full">
																		<select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="" name="">
                                                       <option value="" selected="">직종</option>
                                                       <option value="1">직종1</option>
                                                       <option value="2">직종2</option>
                                                    </select>
                                                                       </div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">제목</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12">
                                                 <div> <textarea class="form-control h-250px w-full fs-6 bg-white mt-1" type="text" placeholder="내용" name="" required=""></textarea></div>
											  </div> 



											  <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                         </div>

									          <div class="col-12 md:col-8">

									          <div class="step-input-group" data-step="1">
                                                 <div class="custom-file-container">
                                                      <label class="custom-input-label">
                                                        <div class="preview-box"><img src="#" class="image-preview"></div>
                                                          <span class="placeholder-text">대표 이미지 업로드 (클릭)</span>
                                                          <div class="btn-remove-x" style="display: none;"></div>
                                                          <input type="file" name="company_logo" accept="image/*" class="real-file-input" style="display: none;">
                                                      </label>
                                                </div>
                                              </div><!-- 로고 이미지 업로드 -->

                                            

											
                                          </div><!-- 왼쪽업로드 -->
										
										
										 <div class="col-12 md:col-4 text-center">
                                              <img  src="/advertisement/ad_16.png" data-src="/advertisement/ad_16.png" alt="image" data-uc-img="loading: lazy">
									      
										  </div>
                                       </div>
											

									     </div>
									 </div>
                                 </div><!-- 광고게시정보 -->


							
                             </div>
                          </div>
                        </div>
                     </div> 
				 </div>
              <!-- Section end -->


    </div><!-- 라디오버튼 3 내용 -->


    <div id="content-4" class="desc-content" style="display:none;">

	 <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                                <div class="block-header panel mt-2">
                                     <div class="head_title">
					                 <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />자동차 딜러 광고 (Platinum)</h3>
					                </div>
                                </div>


                                 <div class="border2 rounded p-2 sm:p-3">
                                    <div class="p-1">
    	                                 <div class="row g-1 pb-0 sm:pb-3">
                                             <div class="col-12 md:col-6 p-0 sm:p-3">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	    <div class="dots"></div>
                                                                        <div class="w-100px">자동차 광고</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">Platinum</div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-100px">기간</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">
																		<select class="form-select rounded text-gray-900 w-100px h-32px p-narrow text-opacity-60" id="" name="">
                                                                           <option value="" selected="">1개월</option>
                                                                           <option value="3">3개월</option>
                                                                           <option value="6">6개월</option>
                                                                         </select>
																		 </div>
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
																	    <div class="dots"></div>
                                                                        <div class="w-72px">가격</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">$0 (신규런칭이벤트)</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>

									        

                                                 </div>
										
										         <div class="col-12 md:col-6 pt-2">
                                                    <img  src="/advertisement/5.jpg" data-src="/advertisement/5.jpg" alt="image" data-uc-img="loading: lazy">
									             </div>
                                             </div>
                                       </div><!-- 상단 이미지 -->

							
                                <div class="dotline2"></div>

								

							    

                                <div class="comborder">
                                    <div class="w-100 sm:w-800px mx-auto">  
									    <div class="mb-1 d-flex justify-between">
                                          <div class="fw-bold fs-4">광고게시정보</div>
										 </div>
									    <div class="row g-1 pb-0 sm:pb-3 p-0 sm:p-2">

									

									     <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">광고 희망일</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 시작일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">희망게시 종료일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 
											  
									    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">딜러 정보</div>
                                         </div>

									          <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">판매자</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div>

                                            <div class="col-12">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">주소</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											   	  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">웹사이트</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 

											 

										  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">이메일</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="email" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 

											  <div class="col-12 md:col-6">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1 w-full">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
																	   <div class="w-110px">연락처</div>
                                                                       <div class="w-full"><input class="form-control h-32px w-full fs-6 bg-white" type="text" name="" required=""></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                   </div>
											   </div>
											  <div class="col-12 md:col-6 hidden768">
                                                 <div></div>
											  </div> 

											   <div class="col-12">
                                                 <div> <textarea class="form-control h-250px w-full fs-6 bg-white mt-1" type="text" placeholder="딜러소개" name="" required=""></textarea></div>
											  </div> 




											

											  <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold border-bottom pb-1 mb-2 mt-3">
											<div class="dots"></div>
                                            <div class="text-gray-900 text-opacity-80 fs-5">이미지 정보</div>
                                         </div>

									          <div class="col-12 md:col-8">

									          <div class="step-input-group" data-step="1">
                                                 <div class="custom-file-container">
                                                      <label class="custom-input-label">
                                                        <div class="preview-box"><img src="#" class="image-preview"></div>
                                                          <span class="placeholder-text">로고 업로드 (클릭)</span>
                                                          <div class="btn-remove-x" style="display: none;"></div>
                                                          <input type="file" name="company_logo" accept="image/*" class="real-file-input" style="display: none;">
                                                      </label>
                                                </div>
                                              </div><!-- 로고 이미지 업로드 -->

                                              
											  <div class="step-input-group" data-step="4">
                                                 <div class="custom-file-container">
                                                      <label class="custom-input-label">
                                                        <div class="preview-box"><img src="#" class="image-preview"></div>
                                                          <span class="placeholder-text">딜러 사진 업로드 (클릭)</span>
                                                          <div class="btn-remove-x" style="display: none;"></div>
                                                          <input type="file" name="business_license" accept="image/*" class="real-file-input" style="display: none;">
                                                      </label>
                                                </div>
                                              </div><!-- 로고 이미지 업로드 -->
                                          </div><!-- 왼쪽업로드 -->
										
										
										 <div class="col-12 md:col-4 text-center">
                                              <img  src="/advertisement/ad_17.png" data-src="/advertisement/ad_17.png" alt="image" data-uc-img="loading: lazy">
									      
										  </div>
                                       </div>
											

									     </div>
									 </div>
                                 </div><!-- 광고게시정보 -->


							
                             </div>
                          </div>
                        </div>
                     </div> 
				 </div>
              <!-- Section end -->
	
	
	
	</div><!-- 라디오버튼 4 내용 -->
</div>


        

          <!-- Section start -->
            <div class="section panel overflow-hidden mb-2 mt-2">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                                <div class="block-content border p-2 mt-n1" style="border-top:2px solid #000 !important;">
                                    
									 
									 
									 <div class="panel row child-cols-12 border-bottom pb-2 pt-0">
                                             <article class="post type-post panel uc-transition-toggle vstack gap-0">
                                                  <div class="post-header panel vstack gap-1 mt-1">
                                                         <h3 class="post-title h62 m-0">
                                                            <span class="text-dark fw-bold hover:text-primary"> <img src="/community/images/dot.png" alt="dot"> &nbsp; 결제정보</span>
                                                         </h3>
                                                    </div>
                                                </article>
                                          
									</div><!-- Title -->


                                      <div class="panel row child-cols-12 md:child-cols pt-3 border-bottom pb-3">
                                        
										  <div class="col-12">
                                               <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                       <div class="text-gray-900 text-opacity-70 fs-6 fw-medium">안전한 결제를 위해 카드 정보를 입력해 주세요</div>
													    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
														   <div class="text-gray-900  text-opacity-80 fs-6">입력하신 정보는 [마당엔닷컴]에 저장되지 않으며, 미국 최대 결제대행사인 Authorize.net를 사용합니다.</div>
                                                        </div>
                                                    </article>
                                                </div>
                                                
										       </div>
                                        </div>
                                        <div class="mt-2 pt-1 pb-1">
                                            <div class="mb-2"><img  src="/advertisement/card.png" data-src="/advertisement/card.png" alt="image" data-uc-img="loading: lazy"></div>

                                            <div class="comborder border p-2 sm:p-3 bg-gray-10 rounded">
                                    <div class="w-100 sm:w-800px mx-auto">  
									 
									  <div class="row g-1 margin22 pb-0 sm:pb-3">

										<div class="col-12 md:col-6">
                                                  <div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-credit-card fs-5"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="" placeholder="카드번호" required="" style="padding-left: 50px !important;">
									              </div>
                                        
										</div>
										 <div class="col-12 md:col-6">
                                               <div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-user-circle-o fs-5"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="" placeholder="소유자이름" required="" style="padding-left: 50px !important;">
									            </div>
										  </div>
                                           <div class="col-12 md:col-4">

										        <div class="d-flex gap-2 items-center"> 
												<div class="position-relative d-flex items-center">
                                                    <select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="" name=""  style="width:100px;">
                                                       <option value="" selected="">월</option>
                                                       <option value="1">1</option>
                                                       <option value="2">2</option>
                                                    </select>
                                                  
									           </div> / 

											   <div class="position-relative d-flex align-items-center">
                                                    <select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="" name=""  style="width:100px;">
                                                       <option value="" selected="">년</option>
                                                       <option value="1">2026</option>
                                                       <option value="2">2027</option>
                                                    </select>
                                                  
									           </div>
                                          </div>
										</div>
										<div class="col-12 md:col-4">
                                           <div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-question-circle-o"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="" placeholder="CVV2 코드" required="" style="padding-left: 50px !important;">
									            </div>
										</div>
										<div class="col-12 md:col-4">
                                           <div class="d-flex items-center justify-start pt-1">
                                                    <a href="#uc-cvv2-modal" class="text-none" data-uc-toggle> CVV2 코드란 ?</a>
                                           </div>
										</div>
									

									  </div>
									</div>
                                 </div>

                                        </div><!--Content 1-->

										  <div class="panel row child-cols-12 border-bottom pb-2 pt-2">
                                             <article class="post type-post panel uc-transition-toggle vstack gap-0">
                                                  <div class="post-header panel vstack gap-1 mt-1">
                                                         <h3 class="post-title h62 m-0">
                                                            <span class="text-dark fw-bold hover:text-primary"> <img src="/community/images/dot.png" alt="dot"> &nbsp; 광고 신청 동의서</span>
                                                         </h3>
                                                    </div>
                                                </article>
                                          
									</div><!-- Title -->


                                          <div class="panel row child-cols-12 md:child-cols pt-3 border-bottom pb-3">
                                        
										  <div class="col-12">
                                               <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                       <div class="text-gray-900 text-opacity-70 fs-6 fw-medium">아래 동의서에 동의를 하셔야 광고신청을 하실수 있습니다.</div>
													    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
														   <div class="text-gray-900  text-opacity-80 fs-6">본 동의서는 귀하(이하 ‘광고주’)가 본 웹사이트(이하 ‘플랫폼’)에 광고를 게재함에 있어 상호 간의 권리와 의무를 규정함을 목적으로 합니다.</div>
                                                        </div>
                                                    </article>
                                                </div>
                                                
										       </div>
                                        </div>
                                        <div class="mt-2 pt-1 pb-1 fs-6 p-0 sm:p-3 lh-lg2">
                                           <span class="fw-bold fs-6">   1) 광고 기간 및 노출</span><br />
- 최소 광고 기간: 모든 광고의 기본 게재 기간은 승인일로부터 최소 30일입니다.<br /><br />
- 노출 환경 안내: 사용자의 브라우저 설정, 광고 차단 확장 프로그램(Ad-block 등) 설치 여부에 따라 일부 환경에서 광고가 노출되지 않을 수 있으며, 이는 플랫폼의 귀책 사유가 되지 않습니다.<br /><br />
<span class="fw-bold fs-6"> 2) 수정 및 환불 규정</span><br />
- 수정 권한: 광고 내용의 수정 요청은 게재 기간 내 총 1회로 제한됩니다. (오타 수정 및 이미지 교체 포함)<br />
- 환불 불가: 광고주의 단순 변심 또는 광고 효과 미비 등을 이유로 한 중도 해지 및 환불은 불가합니다.<br /><br />
<span class="fw-bold fs-6"> 3) 면책 및 관할 법원</span><br />
- 법적 책임: 광고 내용으로 인해 발생하는 모든 법적 분쟁(저작권, 허위사실 유포 등)의 책임은 광고주에게 있습니다.<br />
- 관할 법원: 본 서비스 이용과 관련하여 분쟁이 발생할 경우, 소송의 관할 지역은 미국 캘리포니아주 소재 법원으로 합니다.<br />


                             <div class="panel text-center mt-3">
                                   <div class="row child-cols-12 md:child-cols-4 g-1">
                                      <div>
                                        <article class="post type-post panel vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900 border-opacity-15 text-gray-900">
                                            <div class="post-media panel overflow-hidden w-100">
                                                <figure class="featured-image m-0 ratio ratio-3x2 sm:ratio-16x9 uc-transition-toggle overflow-hidden bg-gray-25">
                                                    <img class="media-cover image uc-transition-opaque" src="/advertisement/images/ad001.jpg" data-src="/advertisement/images/ad001.jpg" alt="image" data-uc-img="loading: lazy">
                                                </figure>
                                            </div>
                                            <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                                <div class="post-top panel vstack items-start gap-1">
                                                    <div class="post-meta panel fs-6">
                                                        <div class="post-category fs-5 fw-semibold text-secondary">
                                                            구인광고

                                                        </div>
                                                    </div>
                                                    <div class="post-title fs-6  text-start h-72px sm:h-130px pt-1">
                                                      본 광고주는 관련 노동법을 준수하며, 구인 정보에 허위 사실이 없음을 보증합니다

                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </article>
                                    </div>
                                    <div>
                                        <article class="post type-post panel vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900 border-opacity-15 text-gray-900">
                                            <div class="post-media panel overflow-hidden w-100">
                                                <figure class="featured-image m-0 ratio ratio-3x2 sm:ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-opaque" src="/advertisement/images/ad002.jpg" data-src="/advertisement/images/ad002.jpg" alt="image" data-uc-img="loading: lazy">
                                                </figure>
                                            </div>
                                            <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                                <div class="post-top panel vstack items-start gap-1">
                                                    <div class="post-meta panel fs-6">
                                                        <div class="post-category fs-5 fw-semibold text-secondary">
                                                           비지니스광고

                                                        </div>
                                                    </div>
                                                    <div class="post-title fs-6 text-start h-130px pt-1">
                                                       상호명, 주소, 서비스 내용 등 사업자 정보가 정확해야 하며, 부적절한 홍보 문구로 인해 플랫폼의 이미지가 훼손될 경우 사전 예고 없이 광고가 중단될 수 있습니다


                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </article>
                                    </div>
                                    <div>
                                        <article class="post type-post panel vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border rounded border-gray-900 border-opacity-15 text-gray-900">
                                            <div class="post-media panel overflow-hidden w-100">
                                                <figure class="featured-image m-0 ratio ratio-3x2 sm:ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-opaque" src="/advertisement/images/ad003.jpg" data-src="/advertisement/images/ad003.jpg" alt="image" data-uc-img="loading: lazy">
                                                </figure>
                                            </div>
                                            <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-2 mt-narrow sm:mt-0 w-100">
                                                <div class="post-top panel vstack items-start gap-1">
                                                    <div class="post-meta panel fs-6">
                                                        <div class="post-category fs-5 fw-semibold text-secondary">
                                                           자동차 딜러 광고

                                                        </div>
                                                    </div>
                                                    <div class="post-title fs-6  text-start h-72px sm:h-130px pt-1">
                                                     판매 차량의 사고 유무, 주행 거리 등 상세 정보는 실제 차량 상태와 일치해야 합니다. 


                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </article>
                                    </div>
                                  
								</div>
									 <div class="mt-2 text-start">
									   <input class="form-check-input rounded-0" type="checkbox" id="inputCheckRemember"> 본인은 광고신청 동의서에 내용을 읽고 이해하였으며 광고신청 동의서의 내용에 동의합니다.
									</div>
                                 </div>
                              </div><!--Content 2-->
                            </div> <!--Content end-->





                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
            

            <!-- Section end -->


			

               <a href="/advertisement/ad_02.php" class="btn btn-primary2 btn-md mt-1 fs-5" type="submit" style="width:100% !important;"><i class="fa fa-check"></i> 광고신청 완료하기</a>




       </form>
          <!-- Section end --> 
            



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('input[name="content_select"]').change(function() {
        var val = $(this).val();
        $('.desc-content').hide();
        $('#content-' + val).show();
    });
});
</script>
<script>
document.querySelectorAll('.custom-file-container').forEach(container => {
    const fileInput = container.querySelector('.real-file-input');
    const previewBox = container.querySelector('.preview-box');
    const previewImg = container.querySelector('.image-preview');
    const placeholder = container.querySelector('.placeholder-text');
    const removeBtn = container.querySelector('.btn-remove-x');
    const originalText = placeholder.innerText; // 초기 텍스트 기억

    // 파일 선택 시
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewBox.classList.add('show');
                placeholder.innerText = file.name;
                removeBtn.style.display = 'flex';
            };
            reader.readAsDataURL(file);
        }
    });

    // X 버튼 클릭 시 초기화
    removeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation(); // 라벨 클릭 이벤트 방지
        
        fileInput.value = '';
        previewBox.classList.remove('show');
        placeholder.innerText = originalText;
        this.style.display = 'none';
    });
});
</script>
          
<?php include ('../include/footer.php'); ?>