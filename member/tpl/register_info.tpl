<!-- INCLUDE FILE '../include/header.php' -->


<!-- Section start -->
               <div class="section panel overflow-hidden mt-3">
                   <div class="section-outer panel pb-4 pt-5 brds2">
                      <div class="container max-w-xl">
                        <div class="section-inner">

						
                          <!-- 회원가입약관 동의 시작 { -->
                           <div class="register">

						  
                             <form name="fregister" id="fregister" action="ajax/ajax_member.php" method="POST">
                                <input type="hidden" name="ac" id="ac" value="update_member_info">
                              
								 <section>

								   <div class="border-bottom p-0 sm:p-2 pt-2 pb-1 sm:pb-2">
                                       <div class="fw-bold fs-4">로그인 정보</div>
                                      
                                    </div>

                                   <div class="w-100 pd20">

                                     <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center margin30">
                                        <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
                                            <div class="vstack gap-2">
                                                
								                          <div class="hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60">
																   <div><i class="fa fa-user"></i></div>
                                                                   <div class="w-100px text-start">아이디</div>
                                                                   <div class="text-gray-900 text-opacity-80 fs-6">{{T_USER_ID}}</div>
                                                           </div>

														   
								                          <div class="hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60">
																   <div><i class="fa fa-lock"></i></div>
                                                                   <div class="w-100px text-start">비밀번호</div>
                                                                   <div><input class="form-control form-control-sm h-40px w-full fs-6 bg-white" name="user_password1"  id="user_password1" type="password" value="{{T_PASSWORD}}"></div>
                                                           </div>
												
												            <div class="hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60">
																   <div><i class="fa fa-user"></i></div>
                                                                   <div class="w-100px text-start">비밀번호 확인</div>
                                                                   <div><input class="form-control form-control-sm h-40px w-full fs-6 bg-white" name="user_password2"  id="user_password2" type="password" value="{{T_PASSWORD}}"></div>
                                                           </div>
                                                
                                          </div>
                                        </div>
                                   </div>
                                  </div>
                              </section>

							   <section>

								   <div class="border-bottom p-0 sm:p-2 pt-2 pb-1 sm:pb-2">
                                       <div class="fw-bold fs-4">기본정보</div>
                                      
                                    </div>

                                   <div class="w-100 pd20">
                                     <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center  margin30">
                                        <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
                                            <div class="vstack gap-2">
                                                 <div class="hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60">
																   <div><i class="fa fa-user-circle-o"></i></div>
                                                                   <div class="w-100px text-start">이름</div>
                                                                   <div class="text-gray-900 text-opacity-80 fs-6">{{T_USER_NAME}}</div>
                                                  </div>

												 <div class="hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60">
																   <div><i class="fa fa-user-circle"></i></div>
                                                                   <div class="w-100px text-start">닉네임</div>
                                                                   <div class="text-gray-900 text-opacity-80 fs-6">{{T_USER_NICKNAME}}</div>
                                                 </div>

												  <div class="hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60">
																   <div><i class="fa fa-lock"></i></div>
                                                                   <div class="w-100px text-start">이메일</div>
                                                                   <div><input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" name="user_email" id="user_email" required value="{{T_USER_EMAIL}}"></div>
                                                  </div>
												   <div class="hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60">
																   <div><i class="fa fa-lock"></i></div>
                                                                   <div class="w-100px text-start">연락처</div>
                                                                   <div><input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="user_phone" id="user_phone" required value="{{T_USER_PHONE}}"></div>
                                                  </div>

												
												

                                            <div class="hstack gap-2">
											<select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="country_code" name="country_code" required onchange="GET_SELECT_SATE_CODE();">
                                                {{S_SELECT_COUNTRY_CODE}}
                                            </select>

											<select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="state_code" name="state_code">
                                                {{S_SELECT_STATE_CODE}}
                                            </select>
                                            </div>

                                                
                                              <div class="hstack text-start mb-3 sm:mb-0">
                                                  <div class="form-check text-start">
                                                    <input id="input_checkbox_accept_terms" class="form-check-input rounded-0 dark:bg-gray-800 dark:border-white dark:border-opacity-15" name="is_letter_receive" value="1" type="checkbox" {{T_IS_LETTER_RECEIVE}}>
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
        <button type="submit" class="btn btn-primary btn-sm w-49 fs-5  fw-medium"><i class="fa fa-edit"></i> 수정완료</button>
    </div>

    </form>
  </div> 
   </div> 
    </div> 
	 </div> 
	  </div> 
            

          
<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/member/register_info.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->