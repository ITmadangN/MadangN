<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
#drop-zone.dragover {
    background: #eef6ff !important;
    border-color: #0d6efd !important;
}
.preview-item {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}
.preview-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    display: block;
    border: 1px solid #e5e5e5;
    border-radius: 8px;
}
.preview-item .btn-remove {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 24px;
    height: 24px;
    line-height: 22px;
    text-align: center;
    border-radius: 50%;
    background: rgba(0,0,0,.6);
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 14px;
    padding: 0;
}
.preview-item .btn-remove:hover { background: rgba(220,53,69,.9); }
.preview-item .file-size {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    background: rgba(0,0,0,.5);
    color: #fff;
    font-size: 11px;
    padding: 2px 4px;
    text-align: center;
}

#preview-area {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* PC: 5개 */
    gap: 8px;
}
@media (max-width: 992px) {
    #preview-area { grid-template-columns: repeat(4, 1fr); } /* 태블릿: 4개 */
}
@media (max-width: 576px) {
    #preview-area { grid-template-columns: repeat(3, 1fr); } /* 모바일: 3개 */
}


</style>

    <form name="formp" id="formp" action="ajax/ajax_agent.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ac" value="agent_realestate_write">
            <input type="hidden" name="list_agent_key" id="list_agent_key" value="{{T_AGENT_KEY}}">
            <input type="hidden" name="dre_key" id="dre_key" value="{{T_DRE_KEY}}">
            <input type="hidden" name="list_office_key"  id="list_office_key" value="{{T_OFFICE_KEY}}">
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
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="property_type" name="property_type" onchange="GET_PROPERTY_TYPE_SUB();" required>
                                                                            {{S_SELECT_PROPERTY_TYPE}}
                                                                        </select>
                                                                   </div>
                                                     </div>
                                                         
                                                </div>
                                                <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-130px">Property Sub Type</div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="property_sub_type" name="property_sub_type" required>
                                                                            {{S_SELECT_PROPERTY_SUB_TYPE}}
                                                                        </select>
                                                                   </div>
                                                      </div>
                                                 </div>

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                 <div class="min-w-180px">Special Listing Conditions</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-63 bg-white p-1" type="text" name="special_listing_conditions" id="special_listing_conditions" value="{{T_SPECIAL_LISTING_CONDITIONS}}"></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-130px">Listing Contract Date</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full p-1 fs-63 bg-white" type="text" name="listing_contract_date" id="listing_contract_date" value="{{T_LISTING_CONTRACT_DATE}}" readonly></div>
                                                     </div>
                                                         
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bolder text-dark  md:d-flex z-1">
                                                                  <div class="min-w-180px">List Price</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-63 p-1 bg-white" type="text" name="list_price" id="list_price" placeholder="$" value="{{T_LIST_PRICE}}" required></div>
                                                     </div>
                                                </div>



                                                
                                                <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-130px">Standard Status</div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="standard_status" name="standard_status">
                                                                            {{SELECT_STANDARD_STATUS}}
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="street_number" id="street_number" value="{{T_STREET_NUMBER}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Street Name</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="street_name" id="street_name" value="{{T_STREET_NAME}}"></div>
                                                     </div>
                                                </div>

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Street Suffix</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="street_suffix" id="street_suffix" value="{{T_STREET_SUFFIX}}"></div>
                                                     </div>
                                                </div>


                                           

						 <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">City </div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-62 w-full h-32px p-narrow text-opacity-60" id="city" name="city">
                                                                             {{S_SELECT_CITY}}
                                                                        </select>
                                                                   </div>
                                                     </div>
                                                         
                                                </div>


                                             

                                                <div class="col-12 md:col-6">
                                                     <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">State</div>
                                                                  <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-62 w-full h-32px p-narrow text-opacity-60" id="state_or_province" name="state_or_province" onchange="GET_CITY_NAME();">
                                                                            {{S_SELECT_STATE_CODE}}
                                                                        </select>
                                                                   </div>
                                                      </div>
                                                 </div>

						      <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Postal Code</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="postal_code" id="postal_code" value="{{T_POSTAL_CODE}}"></div>
                                                     </div>
                                                </div>

						 <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                          <div class="min-w-100px">County </div>
                                                          <div class="w-full">
                                                                       <select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="county_or_parish" name="county_or_parish">
                                                                            {{S_SELECT_COUNTY_OR_PARISH}}
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="bedrooms_total" id="bedrooms_total" value="{{T_BEDROOMS_TOTAL}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Bathrooms Total</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="bathrooms_total" id="bathrooms_total" value="{{T_BATHROOMS_TOTAL}}"></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Bathrooms Full</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="bathrooms_full" id="bathrooms_full" value="{{T_BATHROOMS_FULL}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Bathrooms Half</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="bathrooms_half" id="bathrooms_half" value="{{T_BATHROOMS_HALF}}"></div>
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="living_area" id="living_area" value="{{T_LIVING_AREA}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Lot Size Sqft</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="lot_size_sqft" id="lot_size_sqft" value="{{T_LOT_SIZE_SQFT}}"></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Lot Size Acres</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="lot_size_acres" id="lot_size_acres" value="{{T_LOT_SIZE_ACRES}}"></div>
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="year_built" id="year_built" value="{{T_YEAR_BUILT}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Stories Total</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="stories_total" id="stories_total" value="{{T_STORIES_TOTAL}}"></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-100px">Levels</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="levels" id="levels" value="{{T_LEVELS}}"></div>
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="building_area_total" id="building_area_total" value="{{T_BUILDING_AREA_TOTAL}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Units Total #</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="units_total" id="units_total" value="{{T_UNITS_TOTAL}}"></div>
                                                     </div>
                                                </div>

						<div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
						                  <div class="min-w-130px">Number of Buildings</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="number_of_buildings" id="number_of_buildings" value="{{T_NUMBER_OF_BUILDINGS}}"></div>
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="parking_total" id="parking_total" value="{{T_PARKING_TOTAL}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-100px">Garage Spaces</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 p-1 bg-white" type="text" name="garage_spaces" id="garage_spaces" value="{{T_GARAGE_SPACES}}"></div>
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="association_fee" id="association_fee" value="{{T_ASSOCIATION_FEE}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-180px">Association Fee Frequency</div>
                                                                  <div class="w-full"><select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="association_fee_frequency" name="association_fee_frequency">
                                                                            {{SELECT_ASSOCIATION_FEE_FREQUENCY}}
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="lease_term" id="lease_term" value="{{T_LEASE_TERM}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-180px">Lease Amount Frequency</div>
                                                                  <div class="w-full"><select class="form-select rounded text-gray-900 fs-63 w-full h-32px p-narrow text-opacity-60" id="lease_amount_frequency" name="lease_amount_frequency">
                                                                            {{SELECT_LEASE_AMOUNT_FREQUENCY}}
									  
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="zoning" id="zoning" value="{{T_ZONING}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-130px">Zoning Description</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="zoning_description" id="zoning_description" value="{{T_ZONING_DESCRIPTION}}"></div>
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="cap_rate" id="cap_rate" value="{{T_CAP_RATE}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-150px">Net Operating Income</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="net_operating_income" id="net_operating_income" value="{{T_NET_OPERATING_INCOME}}"></div>
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
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="business_type" id="business_type" value="{{T_BUSINESS_TYPE}}"></div>
                                                     </div>
                                                </div>


                                                <div class="col-12 md:col-6">
                                                    <div class="post-meta panel hstack justify-start gap-1 fs-63 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                  <div class="min-w-120px">Business Name</div>
                                                                  <div class="w-full"><input class="form-control h-32px w-full fs-62 bg-white p-1" type="text" name="business_name" id="business_name" value="{{T_BUSINESS_NAME}}"></div>
                                                     </div>
                                                </div>

                                               </div>
					     </div><!-- 비즈니스정보 -->


                                            <div class="pb-0 sm:pb-3">
                                             <div class="col-12">
					                              <div class="fw-bold text-agent fs-62 mt-1 mb-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 추가정보</div>
                                                  <textarea class="form-control h-100px w-full fs-6 bg-white" type="text" name="public_remarks" id="public_remarks">{{T_PUBLIC_REMARKS}}</textarea>
                                                  <div class="fw-bold text-agent fs-62 mt-1 mb-1 mb-1"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 매물소개정보</div>
                                                  <textarea class="form-control h-150px w-full fs-6 bg-white" type="text" name="agent_comment" id="agent_comment">{{T_AGENT_COMMENT}}</textarea>
                                                  <div id="file-wrapper" class="mt-1">

                                                     <!-- 드래그 앤 드롭 영역 -->
                                                     <div id="drop-zone" class="border border-2 border-dashed rounded text-center" style="min-height:140px; cursor:pointer; background:#fafafa; transition:.2s;
                                                      display:flex; flex-direction:column; align-items:center; justify-content:center; gap:6px; padding:16px;">
                                                        <div><i class="fa fa-cloud-upload fs-1 text-gray-500"></i></div>
                                                        <div class="fs-6 fw-bold">이미지를 여기로 드래그하거나 클릭하여 선택하세요</div>
                                                        <div class="text-gray-500 fs-7">세로 928 x 618,이미지는 jpg, png, gif만 가능 / 2MB 이하 / 최대 <span id="max-count">20</span>개 </div>
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
            
<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/realestate/agent_realestate_write.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->

