<!-- INCLUDE FILE '../include/header.php' -->


<!-- Section start -->
               <div class="section panel overflow-hidden mt-3">
                   <div class="section-outer panel pb-4 pt-5 brds2">
                      <div class="container max-w-xl">
                        <div class="section-inner">

						
                          <!-- 회원가입약관 동의 시작 { -->
                           <div class="register">

						      <div class="step-container">
                               <div class="step">1. 약관 동의</div>
                               <div class="step active">2. 회원정보 입력</div>
                               <div class="step">3. 회원가입 완료</div>
                             </div>

                             <form name="fregister" id="fregister" action="register_result.php" method="POST" onsubmit="return CheckSubmit();">
                                 <input type="hidden" name="idc" id="idc" value="0">
                                 <input type="hidden" name="nic" id="nic" value="0">
                                 
                                 <p>* 아래 정보를 입력하시면 회원가입이 완료되며 등록된 회원정보는 암호화되어 안전하게 보관됩니다.<br />
                                  * 허위로 회원정보를 기재시 회원정보가 정지되거나 탚퇴처리 될수 있습니다.
                                </p>

								 <section>

								   <div class="border-bottom p-0 sm:p-2 pt-2 pb-1 sm:pb-2">
                                       <div class="fw-bold fs-4">로그인 정보</div>
                                      
                                    </div>

                                   <div class="w-100 pt-2 sm:pt-0">
                                     <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center margin30">
                                        <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
                                            <form class="vstack gap-2">
                                                  <div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-user fs-5"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="user_id" id="user_id" placeholder="회원 아이디" required style="padding-left: 50px !important;" onblur="CHECK_USER_ID();">
									              </div>
												<div class="position-relative d-flex align-items-center mb-n1">
                                                   <div class="absoinput"><i class="fa fa-lock fs-5"></i></div>
                                                   <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="password" name="user_password1"  id="user_password1" placeholder="비밀번호" value="" required style="padding-left: 50px !important;">
												 </div><label class="hstack justify-between form-check-label fs-7 sm:fs-6">영문대소문자 , 숫자 혼용하여 8자 이상입력 </label>
												
												<div class="position-relative d-flex align-items-center">
                                                   <div class="absoinput"><i class="fa fa-lock fs-5"></i></div>
                                                   <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="password" name="user_password2" id="user_password2" placeholder="비밀번호 확인" required style="padding-left: 50px !important;">
									            </div>
                                                
                                          
                                        </div>
                                   </div>
                                  </div>
                              </section>

							   <section>

								   <div class="border-bottom p-0 sm:p-2 pt-2 pb-1 sm:pb-2">
                                       <div class="fw-bold fs-4">기본정보</div>
                                      
                                    </div>

                                   <div class="w-100 pt-2 sm:pt-0">
                                     <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center  margin30">
                                        <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
                                            <div class="vstack gap-2">
                                                 <div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-user-circle-o fs-5"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="user_name" id="user_name" placeholder="이름" required style="padding-left: 50px !important;">
									            </div>
												<div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-user-circle fs-5"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="user_nickname" id="user_nickname" placeholder="닉네임" required style="padding-left: 50px !important;"  onblur="CHECK_USER_NICKNAME();">
									            </div>
												<div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-envelope fs-5"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" name="user_email" id="user_email" placeholder="이메일" required style="padding-left: 50px !important;">
									            </div>
												<div class="position-relative d-flex align-items-center">
                                                    <div class="absoinput"><i class="fa fa-phone fs-5"></i></div>
                                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="user_phone" id="user_phone"  placeholder="연락처" required style="padding-left: 50px !important;">
									            </div>

                                            <div class="hstack gap-2">
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60"  name="country_code" id="country_code"  required onchange="GET_SELECT_SATE_CODE();">
                                                {{S_SELECT_COUNTRY_CODE}}
                                            </select>
											<select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="state_code" id="state_code">
                                                {{S_SELECT_STATE_CODE}}
                                            </select>

											
                                            </div>

                                                
                                              <div class="hstack text-start mb-3 sm:mb-0">
                                                  <div class="form-check text-start">
                                                    <input class="form-check-input rounded-0 dark:bg-gray-800 dark:border-white dark:border-opacity-15" type="checkbox" name="is_letter_receive" id="is_letter_receive" value="1">
                                                    <label for="input_checkbox_accept_terms" class="hstack justify-between form-check-label fs-6">뉴스레터 수신 </label>
                                                 </div>
                                               </div>
											</div>
                                        </div>
                                   </div>
                                  </div>
                              </section>
	
	
	    
    <div class="d-flex justify-between">
    	<a href="/" class="btn btn-gray btn-sm w-49 fs-5 fw-medium"> <i class="fa fa-undo"></i> 취소</a>
        <button type="submit" class="btn btn-primary btn-sm w-49 fs-5  fw-medium"><i class="fa fa-user-plus"></i> 가입완료</button>
    </div>

    </form>
  </div> 
   </div> 
    </div> 
	 </div> 
	  </div>




<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/member/register_form.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->