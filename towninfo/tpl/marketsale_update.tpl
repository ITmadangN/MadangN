<!-- INCLUDE FILE '../include/header.php' -->
<style>
.position-relative {
    position: relative !important
}

.d-flex {
    display: flex !important
}


</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder">전단지 수정</h3>
                        </div>
                    </div>
            

                    <form name="formp" id="formp" action="ajax/ajax_marketsale.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="update_marketsale">             
                        <input type="hidden" name="id" id="id"  value="{{T_ID}}"> 
                        <input type="hidden" name="market_name" id="market_name" value="{{T_MARKET_NAME}}">
                        <div class="panel row child-cols-12 md:child-cols hstack mt-n2">

			  <div class="col-12 reg">
                               <div class="position-relative d-flex align-items-center" style="border:1px solid #e4e4e4;border-radius:3px;padding:6px 0;">
                                    <div class="absoinput2">
                                        <i class="fa fa-image fs-5"></i>
                                    </div>
                                    {{T_IMG}}
                                </div>
			
                            </div>
                             <div class="col-12 md:col-6 reg">


			                <div class="position-relative d-flex align-items-center">
                                           <div class="absoinput">
                                              <i class="fa fa-globe fs-5"></i>
                                           </div>
					   <select class="form-select rounded p-12" name="state_code" id="state_code" onchange="GET_WEEKLY_ADS_FLYER_SITE();"  required style="padding-left: 50px !important;">
                                                {{SELECT_STATE_CODE}}
                                            </select>
                                         </div>

                            
                
                             </div>
                             <div class="child-cols-12 reg">

			         <div class="position-relative d-flex align-items-center">
                                           <div class="absoinput">
                                             <i class="fa fa-list-alt fs-5"></i>
                                           </div>
					   <select class="form-select rounded p-12" name="weekly_ads_flyer_site" id="weekly_ads_flyer_site" required style="padding-left: 50px !important;">
                                                {{SELECT_WEEKLY_ADS_FLYER_SITE}}
                                            </select>
                                         </div>
                             </div>
			     <div class="col-12 reg">

                                <div class="position-relative d-flex align-items-center">
                                    <div class="absoinput">
                                        <i class="fa fa-pencil fs-5"></i>
                                    </div>
                                    <input class="form-control form-control-sm w-full fs-6 bg-white" type="text" name="title" id="title" placeholder="제목" required style="padding-left: 50px !important;" value="{{T_TITLE}}" required>
                                </div>
			
                            </div>


                            <div class="col-12 md:col-6 reg">

                                <div class="position-relative d-flex align-items-center">
                                    <div class="absoinput">
                                        <i class="fa fa-calendar fs-5"></i>
                                    </div>
                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="input" name="sale_start_date" id="sale_start_date" value="{{T_SALE_START_DATE}}" required placeholder="세일 시작일" readonly style="padding-left: 50px !important;" onchange="SET_END_DATE();">
                                </div>
				
                            </div>
                            <div class="child-cols-12 reg">

                               <div class="position-relative d-flex align-items-center">
                                           <div class="absoinput">
                                              <i class="fa fa-calendar fs-5"></i>
                                           </div>
                                           <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="input" name="sale_end_date" id="sale_end_date" value="{{T_SALE_END_DATE}}" placeholder="세일 종료일" required readonly style="padding-left: 50px !important;">
				               </div>
			


                            </div>
                            <div class="col-12 mt-1">
                                <textarea class="form-control h-250px w-full fs-6 bg-white" type="text"
                                placeholder="내용" name="description" id="description">{{T_DESCRIPTION}}</textarea>

                                <div id="file-wrapper" class="mt-1">
                                    <div id="file-inputs">
                                        <!-- LOOP START 'T_LOOP' -->
                                        {{T_LOOP.T_HTML}}
                                        <!-- LOOP END 'T_LOOP' -->
                                    </div>                                   
                                </div>
                                <button class="btn btn-primary btn-sm mt-1 fs-5" type="submit" style="width:100% !important;"> <i class="fa fa-check"></i> 수정하기</button>
                            </div>
                        </div>
                    </form>

                    
                    


                </div>
            </div>
        </div>
    </div>
</div>



<!-- Section end -->




<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/file_marketsale.js"></script>
<script defer src="/js/towninfo/marketsale_update.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
