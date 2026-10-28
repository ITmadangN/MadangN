<!-- INCLUDE FILE '../include/header.php' -->

       <!--  보내기 -->
        <div id="uc-memosend-modal" data-uc-modal="overlay: true">
             <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 dark:text-white rounded">
                <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
                    <i class="unicon-close"></i>
                </button>
                <div class="panel vstack gap-2 md:gap-4 text-center">
                    <ul class="account-tabs-nav nav-x justify-center h6 py-2 border-bottom d-none" data-uc-switcher="animation: uc-animation-slide-bottom-small, uc-animation-slide-top-small">
                        <li><a href="#">Memo</a></li>
                      
                    </ul>
                    <div class="account-tabs-content uc-switcher px-3 lg:px-4 py-4 lg:py-8 m-0 lg:mx-auto vstack justify-center items-center">
                        <div class="w-100">
                            <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                                <h4 class="h5 lg:h4 m-0">쪽지보내기</h4>
								  
                                <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
								 <p class="fs-6">궁금한 점이나 전하고 싶은 메시지를 <br />자유롭고 예의 있게 작성해 주세요</p>

                                 <div class="panel">
                                        <hr class="position-absolute top-50 start-50 translate-middle hr m-0 w-100">
                                 </div>

                                    <form class="vstack gap-2" name="form_memo" id="form_memo" action="ajax/ajax_memo.php" method="POST">
                                    <input type=hidden name="ac" id="ac" value="memo_write">
									<input class="form-control form-control-sm h-40px w-full fs-5 bg-white" type="text" name="user_nickname" id="user_nickname" placeholder="받는분 닉네임" required>
									<input class="form-control form-control-sm h-40px w-full fs-5 bg-white" type="text" name="title" id="title" placeholder="제목" required>
                                        <textarea class="form-control h-100px w-full fs-6 bg-white" type="text" placeholder="쪽지 내용을 입력해주세요!" name="content" id="content" required></textarea>
                                    
                                        <button class="btn btn-primary btn-sm lg:mt-1 fs-5" type="submit">쪽지 보내기</button>
                                    </form>
                                   
                                
                                </div>
                             
                            </div>
                        </div>
                      </div>
                 </div>
                </div>
			</div>

			 <!--  쪽지보기 -->
        <div id="uc-memoview-modal" data-uc-modal="overlay: true">
             <div class="uc-modal-dialog lg:max-w-500px bg-white rounded">
                <button class="uc-modal-close-default p-0 icon-3 btn border-0  hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
                    <i class="unicon-close"></i>
                </button>
                <div class="panel vstack gap-2 md:gap-4 text-center">
                    <ul class="account-tabs-nav nav-x justify-center h6 py-2 border-bottom d-none" data-uc-switcher="animation: uc-animation-slide-bottom-small, uc-animation-slide-top-small">
                        <li><a href="#">Memo</a></li>
                      
                    </ul>
                    <div class="account-tabs-content uc-switcher px-3 lg:px-4 py-4 lg:py-8 m-0 lg:mx-auto vstack justify-center items-center">
                        <div class="w-100">
                            <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                                <h4 class="h5 lg:h4 m-0">쪽지 보기</h4>
								<div class="panel vstack gap-2 w-100 sm:w-350px mx-auto border p-2">
                                    <p class="fs-6" id="memo_nickname"></p>
                                    <div class="panel">
                                        <hr class="position-absolute top-50 start-50 translate-middle hr m-0 w-100">
                                     </div>
								     <p class="fs-6" id="memo_title"></p>
                                     <div class="panel">
                                        <hr class="position-absolute top-50 start-50 translate-middle hr m-0 w-100">
                                     </div>
                                     <div class="vstack gap-2">
                                        <p id="memo_content">
                                        </p> 
                                     </div>
                                 </div>
								
								 <div class="modal-footer-btns d-flex align-items-center gap-1 mt-n2 mts10">
								  <a href="#" class="btn btn-primary btn-sm lg:mt-1 fs-5 uc-modal-close-default">닫기</a>  <a href="javascript:return false;" class="btn btn-gray btn-sm lg:mt-1 fs-5" onclick="MEMO_DELETE();">삭제</a>
								 </div>
                             
                            </div>
                        </div>
                      </div>
                 </div>
                </div>
			</div>

   
			<!-- Section start -->
			<div style="padding: clamp(10px, 5%, 50px) 0;">
               <div class="section panel overflow-hidden mt-3">
                   <div class="section-outer panel pb-4 brds2">
                      <div class="container  w-100 lg:max-w-900px">
                        <div class="section-inner">

					
					
					
					   <div class="mb-1 bg-gray-25 p-2 rounded">
		                        <form name="" action="" method="post">
									    <div class="d-flex justify-end gap-1" style="flex-wrap: wrap;"> 
                                        <select class="form-select rounded p-12 w-100px fs-6" id="s_type" name="s_type">
                                                {{S_SELECT_MEMO_TYPE}}
                                            </select>
										   <select class="form-select rounded p-12 w-100px fs-6" id="s_kind" name="s_kind">
                                                {{S_SELECT_MESSAGES_KIND}}
                                            </select>
                                            <input class="form-control form-control-sm h-42px fs-6 bg-white max-w-160px" type="text" name="s_keyword" id="s_keyword" placeholder="검색어를 입력하세요"  onkeydown="return event.keyCode !== 13;">
                                            <button class="btn btn-primary btn-sm" style="width:80px !important;" onclick="GO_PAGE(1);" type="button">검색</button>                                            
										</div>
                                </form>

                     </div> <!-- 검색 End -->

					 <div class="d-flex justify-end gap-1" style="flex-wrap: wrap;"> 
						<a href="#uc-memosend-modal" data-uc-toggle class="btn btn-dark btn-sm" style="width:150px !important;" onclick="RESET_MEMO();">쪽지 보내기</a>
					 </div>


     
			
 <!-- Section start -->
            <div class="section panel overflow-hidden mt-1" >
                <div class="section-outer panel">
                    <div class="max-w-xl">
					  <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                         <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top" style="min-width:600px;">

					          <colgroup>
						      <col width="13%" />
                              <col width="13%" />
							  <col width="/" />
							  <col width="13%" />
							  <col width="12%" />
							  
                              </colgroup>
                                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                                        <tr>
                                            <th class="text-center">번호</th>
                                            <th class="text-center">구분</th>
                                            <th class="text-center">제목</th>
                                            <th class="text-center">보낸이</th>
                                            <th class="text-center">보낸 날짜</th>									 		
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
<script defer src="/js/member/memo.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->