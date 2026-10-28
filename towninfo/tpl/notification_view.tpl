<!-- INCLUDE FILE '../include/header.php' -->

<!-- Section start -->
<div class="breadcrumbs panel z-1 py-2 mb-3 bg-gray-25 border-top border-bottom">
    <div class="max-w-xl">
        <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;">
            <div class="fw-bold fs-4 text-success">{{T_TITLE}}</div>
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="/">Home</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="/towninfo/">타운정보</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><span class="text-primary fw-semibold">행사/알림</span></li>
            </ul>
        </div>
    </div>
</div><!-- Top title-->


<!-- Section start -->
<div class="section panel overflow-hidden mb-2 mt-2">
    <input type="hidden" id="parent_code" value="{{T_PARENT_CODE}}">
    <input type="hidden" id="parent_id" value="{{T_PARENT_ID}}">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                    <div class="block-content border p-2" style="border-top:2px solid #000 !important;">
                        <div class="panel row child-cols-12 md:child-cols border-bottom pb-1">    
                            <div class="col-12 vstack sm:hstack gap-1 justify-between">
                                <div class="fs-5 fw-medium">행사/알림 : <span class="text-primary">{{T_CATEGORY}}</span>
                                </div>
                                <div class="d-flex gap-1 justify-end fs-7">
                                    <div>등록자: {{T_CREATED_USER}}</div>
                                    <div>등록일 : {{T_CREATED_AT}}</div>
                                    <div>조회 : {{T_VIEW_COUNT}}</div>
                                </div>
                            </div>                                                        
                        </div>
                        <div class="panel pt-1 p-0 sm:p-3">
                            <div class="col-12 mt-1">
                                {{T_IMG1}}
                                {{T_IMG2}}
                                {{T_IMG3}}<br>
                                <p>

                                    {{T_DESCRIPTION}}

                                </p>
                            </div>
                        </div>
                        <!-- IF START 'UPDATE_DELETE' -->
                        <div class="mt-1 d-flex gap-narrow justify-end"><a href="javascript:return false;"
                                                                           onclick="GO_UPDATE('{{T_ID}}');"
                                                                           class="btn btn-primary2 btn-sm2">수정</a> <a
                                    href="javascript:return false;" class="btn btn-gray btn-sm2"
                                    onclick="GO_DELETE('{{T_ID}}')">삭제</a></div>
                        <!-- IF END 'UPDATE_DELETE' -->            
                    </div>
                    

                    <div class="d-flex items-end justify-end gap-1">
                        <a href="/towninfo/notification.php" class="btn btn-gray-800 btn-sm">목록</a>
                    </div>
                </div>
            </div> <!--Content end-->


            <!--Commnet start-->
            <div id="blog-comment" class="panel mt-2 cpan">
                <h4 class="h5 mb-4">댓글</h4>
                <ol id="result_reply">

                </ol>
                <div class="spacer-single"></div>
                <div class="mt-1">
                    <div class="panel vstack gap-1 lg:gap-2 uc-sticky"">
                    <form class="panel vstack gap-2 mt-2" action="?">
                        <div class="row g-2 child-cols-12 lg:child-cols-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="r_user_nickname"
                                       id="r_user_nickname" placeholder="이름" value="{{T_SS_NICKNAME}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control w-full bg-white" rows="5" name="r_comments" id="r_comments"
                                      placeholder="내용"></textarea>
                        </div>

                        {{T_REPLY_WRITE}}
                    </form>
                </div>
            </div>
        </div><!--Commnet end-->



    </div>
</div>
</div>



<!-- Section end -->


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/towninfo/notification_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->

