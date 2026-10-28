<!-- INCLUDE FILE '../include/header.php' -->


   
			<!-- Section start -->
			<div style="padding: clamp(10px, 5%, 50px) 0;">
               <div class="section panel overflow-hidden mt-3">
                   <div class="section-outer panel pb-4 brds2">
                      <div class="container  w-100 lg:max-w-900px">
                        <div class="section-inner">

					
					
					
					   <div class="mb-1 bg-gray-25 p-2 rounded">
		                        <form name="" action="" method="post">
									    <div class="d-flex justify-end gap-1" style="flex-wrap: wrap;"> 
                                        <select class="form-select rounded p-12 w-200px fs-6" id="s_type" name="s_type">
                                                {{S_SELECT_ADVERTISEMENT_TYPE}}
                                            </select>
										   
                                            <button class="btn btn-primary btn-sm" style="width:80px !important;" onclick="GO_PAGE(1);" type="button">검색</button>                                            
										</div>
                                </form>

                     </div> <!-- 검색 End -->



     
			
 <!-- Section start -->
            <div class="section panel overflow-hidden mt-1" >
                <div class="section-outer panel">
                    <div class="max-w-xl">
					  <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                         <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top" style="min-width:600px;">

					          <colgroup>
						      <col width="7%" />
                              <col width="20%" />                              
                              <col width="/" />
                              <col width="10%" />							  
							  <col width="10%" />
                              <col width="12%" />
							  <col width="12%" />
							  
                              </colgroup>
                                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                                        <tr>
                                            <th class="text-center">번호</th>
                                            <th class="text-center">광고구분</th>
                                            <th class="text-center">기업명</th>
                                            <th class="text-center">광고신청일</th>
                                            <th class="text-center">상태</th>
                                            <th class="text-center">수정</th>
                                            <th class="text-center">미리보기</th>
                                        </tr>
                                    </thead>
                                    <tbody id="result_htm">

                                        
                                    </tbody>
                                 
                                </table>
						</div>

						 <div id="result_pagging">

                            </div><!-- Paging -->
                    </div>
                </div>
            </div>

          <!-- Section end -->



         </div>
       </div> 
    </div> 
  </div> 
</div>      
                                      
		
          
<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/member/advertisement.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->