<!-- INCLUDE FILE '../include/header.php' -->     
        <!-- Section start -->
            <div class="section panel overflow-hidden mt-n2">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner panel vstack gap-2">
                            <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-2">
                                 <h2 class="h5  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                    <a class="text-none hover:text-primary duration-150" href="#">에이전트</a>
                                 </h2>
                            </div>

                            <!-- 검색 Start -->

                              <div class="mb-1 bg-gray-25 p-2 rounded">
                                   <form name="" action="" method="post">
				   <div class="hstack items-center justify-between" style="flex-wrap: wrap;">
                   <!-- IF START 'T_WRITE' -->
				       <div class="tds2"><a href="agent_realestate_write.php" class="btn btn-primary2 btn-sm">매물등록</a>   </div>
                   <!-- IF END 'T_WRITE' -->    
                   <!-- IFNOT START 'T_WRITE' -->
                       <div class="tds2">&nbsp;  </div>
                   <!-- IFNOT END 'T_WRITE' -->    
                   
                                       <div class="hstack items-center justify-between gap-1" style="flex-wrap: wrap;">
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="Office Name" id="s_office_name">
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="Agent Name" id="s_agent_full_name">
                                             <button class="btn btn-primary btn-sm w-15pro tds" onclick="GET_PAGE();" type="button">검색</button>        
                                       </div>
                                    </div> 
                                     </form>

                     </div> <!-- 검색 End -->
                                      <div class="block-content">
                                                <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-1" id="result_html">
   
                                               </div>
                                            </div>

                                            <div id="result_pagging">

                                            </div><!-- Paging -->
                         
                                         </div>
                                        </div>
                                      </div>
                                   </div>

                         <!-- Section start -->



<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/realestate/agent.js"></script>
<script defer src="/js/iibiz_common.js"></script>


<!-- INCLUDE FILE '../include/footer.php' -->

