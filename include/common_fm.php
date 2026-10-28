<!--  허위신고 -->
<div id="uc-report-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 dark:text-white rounded">
        <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
            <i class="unicon-close"></i>
        </button>
        <div class="panel vstack gap-2 md:gap-4 text-center">
            <ul class="account-tabs-nav nav-x justify-center h6 py-2 border-bottom d-none" data-uc-switcher="animation: uc-animation-slide-bottom-small, uc-animation-slide-top-small">
                <li><a href="#">Report</a></li>

            </ul>
            <div class="account-tabs-content uc-switcher px-3 lg:px-4 py-4 lg:py-8 m-0 lg:mx-auto vstack justify-center items-center">
                <div class="w-100">
                    <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                        <h4 class="h5 lg:h4 m-0">판매자 허위신고</h4>

                        <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
                            <p class="fs-6">투명한 커뮤니티를 위해 허위 정보는 <br />
                                하단 신고 버튼을 통해 적극적으로 알려주세요.</p>

                            <div class="panel">
                                <hr class="position-absolute top-50 start-50 translate-middle hr m-0 w-100">
                            </div>

                            <form class="vstack gap-2" name="false_report" id="false_report" action="ajax/ajax_fm.php" method="post">
                                <input type="hidden" name="ac" value="write_false_report">
                                <input type="hidden" name="list_type" value="market">
                                <input type="hidden" name="list_id" value="{{T_ID}}">
                                <input type="hidden" name="false_user_id" value="{{FALSE_USER_ID}}">
                                <input type="hidden" name="memo_title" id="memo_title_false" value="{{MEMO_TITLE}}">
                                <textarea class="form-control h-100px w-full fs-6 bg-white" type="text" placeholder="허위신고 내용을 입력해주세요!" name="description" id="description" required>
                                {{T_TITLE}}
                                </textarea>

                                <button class="btn btn-primary btn-sm lg:mt-1 fs-4" type="submit">신고하기</button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  쪽지 -->
<div id="uc-memo-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 dark:text-white rounded">
        <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
            <i class="unicon-close"></i>
        </button>
        <div class="panel vstack gap-2 md:gap-4 text-center">
            <ul class="account-tabs-nav nav-x justify-center h6 py-2 border-bottom d-none" data-uc-switcher="animation: uc-animation-slide-bottom-small, uc-animation-slide-top-small">
                <li><a href="#">Memo</a></li>

            </ul>
            <div class="account-tabs-content uc-switcher px-3 lg:px-4 py-4 lg:py-8 m-0 lg:mx-auto vstack justify-center items-center">
                <div class="w-100">
                    <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                        <h4 class="h5 lg:h4 m-0">쪽지보내기</h4>

                        <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
                            <p class="fs-6">궁금한 점이나 전하고 싶은 메시지를<br /> 자유롭고 예의 있게 작성해 주세요
                            </p>

                            <div class="panel">
                                <hr class="position-absolute top-50 start-50 translate-middle hr m-0 w-100">
                            </div>

                            <form class="vstack gap-2" name="user_messages" id="user_messages" action="ajax/ajax_fm.php" method="post">
                                <input type="hidden" name="ac" value="write_user_messages">
                                <input type="hidden" name="list_type" value="market">
                                <input type="hidden" name="list_id" value="{{T_ID}}">                                                                                 
                                <input type="hidden" name="memo_user_id" value="{{FALSE_USER_ID}}">
                                <input type="hidden" name="memo_title" id="memo_title" value="{{MEMO_TITLE}}">
                                <input class="form-control form-control-sm h-40px w-full fs-5 bg-white" type="text" placeholder="제목" name="title" id="title"  value="{{MEMO_TITLE}}" required>
                                <textarea class="form-control h-100px w-full fs-6 bg-white" type="text" placeholder="쪽지 내용을 입력해주세요!" name="content" id="content" required></textarea>

                                <button class="btn btn-primary btn-sm lg:mt-1 fs-4" type="submit">쪽지 보내기</button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function RESET_MEMO() {
    
    let title = $("#memo_title").val();
    $("#title").val(title);
    $("#content").val('');
    
}

function RESET_SELLER() {
    
    $("#description").val('');    
    
}
</script>