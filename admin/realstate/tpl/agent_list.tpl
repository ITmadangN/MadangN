<!-- INCLUDE FILE '../include/header.php' -->

<div class="row">
    <div class="col">
        <div class="card card-modern">
            <div class="card-body">
                <div class="datatables-header-footer-wrapper">
                    <div class="datatable-header">
                        <form name="" action="">
                            <div class="row align-items-center mb-3">

                                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <div class="me-2">
                                                        <select class="form-control select-style-1 filter-by " name="s_is_active" id="s_is_active">
                                                            {{S_SELECT_S_IS_ACTIVE}}
                                                        </select>
                                                       </div>
                                        <div class="me-2">
                                            <select class="form-control select-style-1" name="s_is_preminum_agent" id="s_is_preminum_agent">
                                                {{S_SELECT_IS_PREMINUM_AGENTD}}
                                            </select>
                                        </div>                                                       
                                        <div class="me-2">
                                            <select class="form-control select-style-1" name="s_has_active_listings" id="s_has_active_listings">
                                                {{S_SELECT_HAS_ACTIVE_LISTINGS}}
                                            </select>
                                        </div>                                          
                                        <div class="me-2">
                                            <select class="form-control select-style-1" name="s_is_approved" id="s_is_approved">
                                                {{S_SELECT_IS_APPROVED}}
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="form-control select-style-1" name="s_has_active_advertisement" id="s_has_active_advertisement">
                                                {{S_SELECT_HAS_ACTIVE_ADVERTISEMENT}}
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="form-control select-style-1" name="s_kind" id="s_kind">
                                                {{S_SELECT_AGENT_KIND}}
                                            </select>
                                        </div>               
                                        
                                        <div class="col-12 col-lg-auto ps-lg-1">
                                            <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                                                <div class="input-group">
                                                    <input type="text" class="search-term form-control" name="s_keyword"
                                                           id="s_keyword" placeholder="검색 키워드를 입려하세요" onkeydown="return event.keyCode !== 13;">
                                                    <button type="button" class="btn btn-default" onclick="GO_PAGE(1)"><i
                                                                class="bx bx-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-9 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label class="ws-nowrap me-3 mb-0" id="result_navigation_text">총 (0)개 [전체 :0/0]
                                            페이지 </label>
                                        <select class="form-control select-style-1 results-per-page" name="s_cnt"
                                                id="s_cnt">
                                            {{S_SELECT_CNT}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 col-lg-auto ps-lg-0 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                       <a href="javascript:GO_PAGE(1);"
                                           class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">이동</a>
                                    </div>
                                </div>
                                <!--div class="col-3 col-lg-auto ps-lg-0 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <a href="#" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">
                                            <i class="fa fa-file-excel" aria-hidden="true"></i> Exoprt</a>
                                    </div>
                                </div-->
                            </div>
                    </div>
                    </form>
                    <table class="table table-striped mb-0 text-center" style="min-width: 750px;margin-top:20px;">
                        <thead>
                        <tr>
                            <th width="8%">번호</th>
                            <th width="10%">프로필이미지</th>
                            <th width="10%">에이전트명</th>                            
                            <th width="/">분야</th>
                            <th width="10%">DRE 라이선스</th>
                            <th width="10%">연락처</th>
                            <th width="15%">회사명</th>
                            <th width="10%">Top Agent</th>
                            <th width="10%">매물 보유여부</th>
                            <th width="10%">승인상태</th>
                        </tr>
                        </thead>
                        <tbody id="result_html">

                        </tbody>
                    </table>
                    <hr class="solid mt-5 opacity-4">
                    <div class="datatable-footer">
                        <div class="row align-items-center justify-content-between mt-3">
                            <div class="col-md-auto order-1 mb-3 mb-lg-0">
                                <div class="d-flex align-items-stretch">
                                    <div class="d-grid gap-3">

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
                                <!--div class="pagination-wrapper"><div class="dataTables_paginate paging_simple_numbers" id="datatable-ecommerce-list_paginate"><ul class="pagination pagination-modern pagination-modern-spacing justify-content-center"><li class="paginate_button page-item previous disabled" id="datatable-ecommerce-list_previous"><a aria-controls="datatable-ecommerce-list" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="fas fa-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-ecommerce-list" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="datatable-ecommerce-list_next"><a href="#" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="fas fa-chevron-right"></i></a></li></ul></div></div-->
                                <div class="pagination-wrapper" id="result_pagging">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <script src="../vendor/jquery/jquery.js"></script>
        <script src="../js/realstate/agent_list.js"></script>
        <script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
        <!-- INCLUDE FILE '../include/footer.php' -->
