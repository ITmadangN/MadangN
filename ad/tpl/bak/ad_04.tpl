<!-- INCLUDE FILE '../include/header.php' -->

    <form name="formp" id="formp" action="ajax/ajax_advertisement.php" method="post" enctype="multipart/form-data">

           <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-2 panel overflow-hidden">

                                <div class="block-header panel">
                                    <div class="head_title">
                                        <h3 class="h5 m-0 fw-bold -ls-1">에이전트 부동산매물 등록</h3>
                                        <!-- h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>에이전트 부동산매물 등록</h3 -->

                                    </div>
                                </div>

                                               <div class="col-12 mt-1 mb-1">
						 <div class="fw-bold text-agent fs-62"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 기본정보</div>
					       </div>

						<div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						    <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-180px">Property Type </div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>House</option>
                                                                        </select>
                                                                   </div>
                                                     </div>
                                                         
                                                </div>
                                                <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-130px">Property Sub Type</div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>House</option>
                                                                        </select>
                                                                   </div>
                                                      </div>
                                                 </div>

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                 <div class="min-w-180px">Special Listing Conditions</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-63 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-180px">Listing Contract Date</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full p-1 fs-63 bg-white" type="text" name="rp_company_name" id="rp_company_name"></div>
                                                     </div>
                                                         
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bolder text-dark  md:d-flex z-1">
                                                                  <div class="min-w-130px">List Price</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-63 p-1 bg-white" type="text" name="" id="" placeholder="$"></div>
                                                     </div>
                                                </div>



                                                
                                                <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-130px">Standard Status</div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>Active</option>
                                                                        </select>
                                                                   </div>
                                                      </div>
                                                 </div>
                                             </div>
					</div><!-- 기본정보 -->

						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 주소</div>
						</div>

                                                <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">

						  <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Street #</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Street Name</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Street Suffix</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                           

						 <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">City </div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-62 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>city</option>
                                                                        </select>
                                                                   </div>
                                                     </div>
                                                         
                                                </div>


                                             

                                                <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">State</div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-62 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>state</option>
                                                                        </select>
                                                                   </div>
                                                      </div>
                                                 </div>

						      <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Postal Code</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                          <div class="min-w-100px">County </div>
                                                          <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>County</option>
                                                                        </select>
                                                                   </div>
                                                     </div>
                                                          
                                                </div>
                                                <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

                                               </div>
					     </div><!-- 주소 -->

                                                <div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 방/욕실</div>
						</div>

                                                <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Bedrooms Total</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Bathrooms Total</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Bathrooms Full</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Bathrooms Half</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>
                                               </div>
					     </div><!-- 방/욕실 -->

						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 면적정보</div>
						</div>

                                                <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Living Area</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Lot Size Sqft</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Lot Size Acres</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                 <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

					     </div>
					   </div><!-- 면적정보 -->

						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 건물정보</div>
						</div>
                                               <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Year Built</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Stories Total</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Levels</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                 <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

						</div>
					      </div><!-- 건물정보 -->

						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 건물규모</div>
						</div>

                                               <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-130px">Building Area Total</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Units Total #</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-130px">Number of Buildings</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                 <div class="col-12 md:col-6 hidden768">
                                                    <div></div>
                                                </div>

						</div>
					      </div><!-- 건물규모 -->


                                                <div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 주차정보</div>
						</div>

                                                <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Parking Total</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Garage Spaces</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						</div>
						</div>

						   <div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> HOA / 관리비</div>
						</div>

                                               <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Association Fee</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-180px">Association Fee Frequency</div>
                                                                  <div class="w-full"><select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>Weekly</option>
									    <option>Monthly</option>
									    <option>Annually</option>
									    <option>Bi-Monthly</option>
									    <option>One Time</option>
									    <option>SemiAnnually</option>
									    <option>Quarterly</option>
                                                                        </select></div>
                                                     </div>
                                                </div>


						</div>
					     </div><!-- 주차정보 -->


						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 임대정보</div>
						</div>

                                                 <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Lease Term</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-180px">Lease Amount Frequency</div>
                                                                  <div class="w-full"><select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="" name="">
                                                                            <option>Weekly</option>
									    <option>Monthly</option>
									    <option>Annual</option>
									  
                                                                        </select></div>
                                                     </div>
                                                </div>

						</div>
					      </div><!-- 임대정보 -->

						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 용도 / Zoning</div>
						</div>
                                               <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Zoning</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-130px">Zoning Description</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						</div>
					     </div><!-- 용도 -->

						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 수익성정보</div>
						</div>

                                                <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">CAP Rate</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-150px">Net Operating Income</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

						</div>
					     </div><!-- 수익성정보 -->

						<div class="col-12">
						<div class="fw-bold text-agent fs-62 mt-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 비즈니스 정보</div>
						</div>

                                                   <div class="border2 rounded pb-0 sm:pb-3 p-2 mt-n2"> 
                                                  <div class="row g-1 gx-3">
						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-110px">Business Type</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-120px">Business Name</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="" id=""></div>
                                                     </div>
                                                </div>

                                               </div>
					     </div><!-- 비즈니스정보 -->


                                            <div class="pb-0 sm:pb-3">
                                             <div class="col-12">
					    <div class="fw-bold text-agent fs-62 mt-1 mb-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 추가정보</div>
                                                  <textarea class="form-control h-250px w-full fs-6 bg-white" type="text" name="description" id="description"></textarea>
                                                  <div id="file-wrapper" class="mt-1">

                                                     <!-- 드래그 앤 드롭 영역 -->
                                                     <div id="drop-zone" class="border border-2 border-dashed rounded text-center" style="min-height:140px; cursor:pointer; background:#fafafa; transition:.2s;
                                                      display:flex; flex-direction:column; align-items:center; justify-content:center; gap:6px; padding:16px;">
                                                        <div><i class="fa fa-cloud-upload fs-1 text-gray-500"></i></div>
                                                        <div class="fs-6 fw-bold">이미지를 여기로 드래그하거나 클릭하여 선택하세요</div>
                                                        <div class="text-gray-500 fs-7"> jpg, png, gif만 가능 / 2MB 이하 / 최대 <span id="max-count">20</span>개 </div>
                                                        <div class="text-gray-700 fs-7"> 현재 <span id="current-count">0</span> / 20 개 </div>
                                                     </div>

                                                      <!-- 실제 파일 input (숨김) -->                                        
                                                      <input type="file" id="image-inputr" name="user_files[]" accept="image/jpeg,image/png,image/gif" multiple class="d-none">
                                                       <!-- 미리보기 영역 -->
                                                       <div id="preview-area" class="mt-1"></div>
                                                  </div>

                                                 <button class="btn btn-primary btn-sm mt-1 fs-5" type="submit" style="width:100% !important;"><i class="fa fa-check"></i> 등록하기</button>
                                            </div>
                                          </div>

                                            </div>
                                          </div>
                                      </div>
                                </div>
                             </div>
                      
            </form>

            <!-- Section end -->

  <script>
(function () {
    const MAX_FILES   = 20;
    const MAX_SIZE    = 2 * 1024 * 1024; // 2MB
    const ALLOW_TYPES = ['image/jpeg', 'image/png', 'image/gif'];

    const dropZone   = document.getElementById('drop-zone');
    const fileInput  = document.getElementById('image-inputr');
    const previewArea= document.getElementById('preview-area');
    const currentCnt = document.getElementById('current-count');

    // 선택된 파일들을 관리하는 배열
    let fileStore = [];

    // 클릭 시 파일 선택창 열기
    dropZone.addEventListener('click', () => fileInput.click());

    // input에서 파일 선택
    fileInput.addEventListener('change', (e) => {
        addFiles(e.target.files);
        fileInput.value = ''; // 같은 파일 재선택 가능하도록 초기화
    });

    // 드래그 이벤트
    ['dragenter', 'dragover'].forEach(evt => {
        dropZone.addEventListener(evt, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.add('dragover');
        });
    });
    ['dragleave', 'drop'].forEach(evt => {
        dropZone.addEventListener(evt, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove('dragover');
        });
    });
    dropZone.addEventListener('drop', (e) => {
        const files = e.dataTransfer.files;
        addFiles(files);
    });

    // 파일 추가 + 검증
    function addFiles(fileList) {
        const files = Array.from(fileList);

        for (const file of files) {
            if (fileStore.length >= MAX_FILES) {
                alert('이미지는 최대 ' + MAX_FILES + '개까지 업로드할 수 있습니다.');
                break;
            }
            if (!ALLOW_TYPES.includes(file.type)) {
                alert('"' + file.name + '" : jpg, png, gif 형식만 가능합니다.');
                continue;
            }
            if (file.size > MAX_SIZE) {
                alert('"' + file.name + '" : 2MB 이하만 가능합니다.');
                continue;
            }
            // 중복 방지(이름+크기 기준)
            const dup = fileStore.some(f => f.name === file.name && f.size === file.size);
            if (dup) continue;

            fileStore.push(file);
        }
        renderPreview();
        syncInput();
    }

    // 미리보기 렌더링
    function renderPreview() {
        previewArea.innerHTML = '';

        fileStore.forEach((file, index) => {
            const item = document.createElement('div');
            item.className = 'preview-item';

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.onload = () => URL.revokeObjectURL(img.src);

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn-remove';
            removeBtn.innerHTML = '&times;';
            removeBtn.addEventListener('click', () => removeFile(index));

            const sizeTag = document.createElement('div');
            sizeTag.className = 'file-size';
            sizeTag.textContent = (file.size / 1024).toFixed(0) + ' KB';

            item.appendChild(img);
            item.appendChild(removeBtn);
            item.appendChild(sizeTag);
            previewArea.appendChild(item);   // col 없이 바로 추가
        });

        currentCnt.textContent = fileStore.length;
    }


    // 개별 삭제
    function removeFile(index) {
        fileStore.splice(index, 1);
        renderPreview();
        syncInput();
    }

    window.syncUploadInput = function () {
        syncInput();
    };

    // fileStore -> 실제 input.files 로 동기화 (폼 전송용)
    function syncInput() {
        const dt = new DataTransfer();
        fileStore.forEach(f => dt.items.add(f));
        fileInput.files = dt.files;
        // name을 user_files[] 로 맞춰서 서버 전송
        fileInput.setAttribute('name', 'user_files[]');
    }
    
    // IIFE 내부 - 현재 선택된 파일 개수를 외부에서 확인할 수 있도록 함수 노출
    window.getUploadedFileCount = function () {
        return fileStore.length;
    };
    
})();



</script>         
            
<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->

