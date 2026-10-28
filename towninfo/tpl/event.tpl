<!-- INCLUDE FILE '../include/header.php' -->

<!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner panel vstack gap-2">
                            <div class="section-header panel vstack items-center justify-center text-center gap-1">
                                 <h2 class="h5  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                                <a class="text-none hover:text-primary duration-150" href="#">마당엔 이벤트</a>
                                 </h2>
                            </div>

							<!-- 검색 Start -->
                                <div class="mb-1">
		                          <form name="formp" id="formp" action="ajax/ajax_event.php" method="post">
									 <div class="hstack items-end justify-end gap-1">
		                                   <select class="form-select rounded p-12 w-128px" id="s_kind" name="s_kind">
                                               {{S_SELECT_EVENT_KIND}}
                                            </select>
                                            <input class="form-control form-control-sm h-42px w-150px fs-6 bg-white" type="text" name="s_keyword" id="s_keyword" placeholder="검색어를 입력하세요"  onkeydown="return event.keyCode !== 13;">
                                            <button class="btn btn-primary btn-sm" style="width:120px !important;" onclick="GO_PAGE(1);" type="button">검색</button>
									  </div>
                                  </form>
                                </div> <!-- 검색 End -->


                            <div class="section-content">
                                <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2 gy-2"  id="result_html">
                                 </div>
                            </div>

                            <div id="result_pagging">

                            </div><!-- Paging -->
                         
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/towninfo/event.js"></script>
<script defer src="/js/iibiz_common.js"></script>


<!-- INCLUDE FILE '../include/footer.php' -->

