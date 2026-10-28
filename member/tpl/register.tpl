<!-- INCLUDE FILE '../include/header.php' -->

<!-- Section start -->
               <div class="section panel overflow-hidden mt-3">
                   <div class="section-outer panel pb-4 pt-5 brds2">
                      <div class="container max-w-xl">
                        <div class="section-inner">

						
                          <!-- 회원가입약관 동의 시작 { -->
                           <div class="register">

			       <div class="step-container">
                               <div class="step active">1. 약관 동의</div>
                               <div class="step">2. 회원정보 입력</div>
                               <div class="step">3. 회원가입 완료</div>
                             </div>

                               <form name="fregister" id="fregister" action="register_form.php" onsubmit="return CheckSubmit();" method="POST">

                                 <p>마당엔은 [마당엔 홈페이지] 회원가입 및 서비스 이용을 위하여 이용약관, 개인정보 수집.이용 내역에 대한 동의를 받고자 합니다. 내용을 자세히 읽으신 후 동의 여부를 결정하여 주십시오</p>

								 <section>
								  <div class="bdrs">
                                    <div class="border-bottom vstack sm:hstack justify-between items-center p-2">
                                       <div class="fw-bold fs-4">회원가입약관(필수)</div>
                                       <div class="fs-6">
                                           <input class="form-check-input rounded-0" type="checkbox" id="yak1" name="yak1"> &nbsp;<span class="fs-62">회원가입약관의 내용에 동의합니다.</span>
                                       </div>
                                    </div>
                                     <textarea readonly>
<!-- INCLUDE FILE '../include/agreement.txt' -->

                                     </textarea>
							      </div>
                                 </section>
                                <section>
								  <div class="bdrs">
                                    <div class="border-bottom vstack sm:hstack justify-between items-center p-2">
                                       <div class="fw-bold fs-4">개인정보 수집/이용 내역(필수) </div>
                                       <div class="fs-6">
                                           <input class="form-check-input rounded-0" type="checkbox" id="yak2" name="yak2">  &nbsp;<span class="fs-62">개인정보 수집/이용 내역에 동의합니다.</span>
                                       </div>
                                    </div>
                                     <textarea readonly>
<!-- INCLUDE FILE '../include/privacy.txt' -->
                                     </textarea>
								  </div>
                                 </section>

								 	    
    <div class="border p-2 bg-gray-25 mb-2 text-center">
    	 <input class="form-check-input rounded-0" type="checkbox" onclick="ALL_CHECK();"> &nbsp;<span class="fs-62">회원가입 약관에 모두 동의합니다</span>
    </div>

    <div class="d-flex justify-between">
    	<a href="/" class="btn btn-gray btn-sm w-49 fs-5 fw-medium"> <i class="fa fa-undo"></i> 취소</a>
        <button class="btn btn-primary btn-sm w-49 fs-5  fw-medium" type="submit"><i class="fa fa-user-plus"></i> 회원가입</button>
    </div>
	
	


    </form>
  </div> 
   </div> 
    </div> 
	 </div> 
	  </div>




<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/member/register.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->