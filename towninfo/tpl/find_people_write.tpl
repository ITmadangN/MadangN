<!-- INCLUDE FILE '../include/header.php' -->


<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder">사람찾기 등록하기</h3>
                        </div>
                    </div>
                    <div class="border p-2 sm:p-4 bg-gray-25 mb-1">
                        * 소중한 인연을 다시 만날 수 있도록 도움을 드립니다.<br />
                        * 찾으시는 분과의 추적이나 기억을 차근차근 적어주세요.<br />
                        * 따뜻한 재회의 소식이 들려오기를 진심으로 응원합니다.

                    </div>

                    <form name="formp" id="formp" action="ajax/ajax_find_people_write.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="write_find_people">
                        <div class="panel row child-cols-12 md:child-cols hstack mt-n2">
                            <div class="col-12 md:col-6 reg">

                                <div class="position-relative d-flex align-items-center">
                                    <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:10 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-pencil fs-5"></i>
                                                <span>제목</span>
                                            </div>                          
                                    <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="title" id="title" placeholder="제목" required style="padding-left: 100px !important;">
                                </div>
                            </div>
                            <div class="child-cols-12 reg">

                                <div class="position-relative d-flex align-items-center">
                                    <!--div class="absoinput">
                                        <i class="fa fa-list fs-5"></i>
                                    </div-->
                                    <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:10 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-list fs-5"></i>
                                                <span>카테고리</span>
                                            </div>                                            
                                    <select class="form-select rounded p-12" id="category" name="category" required style="padding-left: 100px !important">
                                        {{S_SELECT_CATEGORY}}
                                    </select>
                                </div>


                            </div>
                            <div class="col-12 mt-1">
                                <textarea class="form-control h-250px w-full fs-6 bg-white" type="text"
                                placeholder="내용" name="description" id="description" required></textarea>

                                <div id="file-wrapper" class="mt-1">
                                    <div id="file-inputs">
                                        <div class="file-group mb-1">
                                            <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view">
                                                <label class="flex-grow-1 pt-1 cursor-pointer text-nowrap overflow-hidden " onclick="triggerInput(this)">
                                                    <span class="file-name-text fs-6">파일을 선택해주세요. <span class="hidden-768">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 가로 845x800, 이미지는 jpg, png, gif만 가능하며 2MB이하 사이즈만 가능합니다.</span></span>
                                                </label>
                                                <button type="button" class="btn-close-custom mt-1" style="display: none;" onclick="removeInputGroup(this)"></button>
                                                <input type="file" name="user_files[]"  accept=".jpg, .jpeg, .png, .gif" class="d-none22" onchange="updateIndividualFile(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm mt-0 w-full h-40px fs-6" onclick="addNewInput(2)">
                                        + 파일 추가하기
                                    </button>
                                </div>
                                <button class="btn btn-primary btn-sm mt-1 fs-5" type="submit" style="width:100% !important;"> <i class="fa fa-check"></i> 등록하기</button>
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
<script defer src="/js/towninfo/find_people_write.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
