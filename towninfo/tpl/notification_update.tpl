<!-- INCLUDE FILE '../include/header.php' -->


<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder">행사/알림 수정하기</h3>
                        </div>
                    </div>
                    <div class="border p-2 sm:p-4 bg-gray-25 mb-1">
                        * 우리의 특별한 순간, 함께 나누고 싶은 소식을 전해 주세요!<br />
                        * 누구나 자유롭게 행사 정보를 등록하고 참여를 제안할 수 있습니다.<br />
                        * 작은 소식 하나가 우리 커뮤니티를 더욱 즐겁게 만듭니다.

                    </div>

                    <form name="formp" id="formp" action="ajax/ajax_notification.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="update_notification">
                        <input type="hidden" name="id" value="{{T_ID}}">
                        <div class="panel row child-cols-12 md:child-cols hstack mt-n2">
                            <div class="col-12 md:col-6 reg">

                                <div class="position-relative d-flex align-items-center">
                                    <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:10 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-pencil fs-5"></i>
                                                <span>제목</span>
                                            </div>   
                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="title" id="title" placeholder="제목" value="{{T_TITLE}}" required style="padding-left: 100px !important;">
                                </div>
                            </div>
                            <div class="child-cols-12 reg">

                                <div class="position-relative d-flex align-items-center">
                                    <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:10 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-list fs-5"></i>
                                                <span>카테고리</span>
                                            </div>  
                                    <select class="form-select rounded p-12" id="category" name="category" required style="padding-left: 100px !important;">
                                        {{S_SELECT_CATEGORY}}
                                    </select>
                                </div>


                            </div>
                            <div class="col-12 mt-1">
                                <textarea class="form-control h-250px w-full fs-6 bg-white" type="text"
                                placeholder="내용" name="description" id="description" required>{{T_DESCRIPTION}}</textarea>

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
<script defer src="/js/file.js"></script>
<script defer src="/js/towninfo/notification_update.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
