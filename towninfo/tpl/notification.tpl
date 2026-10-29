<!-- INCLUDE FILE '../include/header.php' -->

                    <div class="mb-2 bg-gray-25 p-2 rounded">
		                        <form name="" action="" method="post" onsubmit="return false;">
									 <div class="vstack sm:hstack items-start justify-between gap-4">
		                                  <div class="d-flex items-start gap-1" style="flex-wrap: wrap;">
                                              <select class="form-select rounded p-12 w-128px fs-6" id="s_category" name="s_category">
                                                  {{S_SELECT_CATEGORY}}
                                              </select>

                                              <select class="form-select rounded p-12 w-100px fs-6" id="s_kind" name="s_kind">
                                                  {{S_SELECT_NOTIFICATION_KIND}}
                                              </select>
                                            <input class="form-control form-control-sm h-42px fs-7 bg-white w-200px " type="text" name="s_keyword" id="s_keyword"  placeholder="검색어를 입력하세요"  onkeydown="return event.keyCode !== 13;">

                                              <button class="btn btn-primary btn-sm" style="width:80px !important;" onclick="GET_PAGE();" type="button">검색</button>
											
										</div>
                                        <div class="hstack items-start gap-1">
											{{T_REGISTER}}
										</div>
								    </div>
                                </form>

                     </div> <!-- 검색 End -->


     
			
 <!-- Section start -->
            <div class="section panel overflow-hidden mt-2" >
                <div class="section-outer panel">
                    <div class="max-w-xl">
					  <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                         <table class="table align-middle overflow-auto m-0 fs-7 text-center border-top" style="min-width:600px;">

					          <colgroup>
                                  <col width="12%"/>
                                  <col width="12%"/>
                                  <col width="/"/>
                                  <col width="13%"/>
                                  <col width="8%"/>
                                  <col width="6%"/>
							
						
							  
                              </colgroup>
                                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                                        <tr>
                                            <th>사진</th>
                                            <th>카테고리</th>
                                            <th>제목</th>
                                            <th>등록자</th>
                                            <th>등록일</th>
											<th>조회</th>
                                            
											
                                        </tr>
                                    </thead>
                                    <tbody id="result_html">

                                        
                                    </tbody>
                                 
                                </table>
						</div>

                        <div id="result_pagging">

                        </div><!-- Paging -->
                    </div>
                </div>
            </div>

            <!-- Section end --><!-- 구합니다 end -->


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/towninfo/notification.js"></script>
<script defer src="/js/iibiz_common.js"></script>


<!-- INCLUDE FILE '../include/footer.php' -->

