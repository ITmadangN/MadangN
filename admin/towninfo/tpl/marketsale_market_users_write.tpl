<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css" />

<form name="formp" id="formp" action="ajax/ajax_marketsale_market_users_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ac" value="write_marketsale_market_users">

    <div class="row mt-2">
        <div class="col">

            <!-- 기본 정보 -->
            <div class="detail-card">
                <div class="detail-section-label">기본 정보</div>
                <div class="detail-grid">
                    <div class="detail-field">
                        <div class="detail-field-label">마켓</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="towninfo_marketsale_market_id" id="towninfo_marketsale_market_id">
                                {{SELECT_MARKET}}
                            </select>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">사용자 ID</div>
                        <div class="detail-field-value">
                            <input type="text" class="form-control" name="user_id" id="user_id" value="{{T_USER_ID}}" required>
                        </div>
                    </div>
                    <div class="detail-field">
                        <div class="detail-field-label">상태</div>
                        <div class="detail-field-value">
                            <select class="form-control mb-1" name="is_active" id="is_active">
                                {{SELECT_IS_ACTIVE}}
                            </select>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="d-flex gap-2 justify-content-between mt-2">
        <div><a href="marketsale_market_users_list.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a></div>
        <div>
            <button type="submit" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-save text-4 me-2"></i> 등록완료
            </button>
        </div>
    </div>
</form>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/towninfo/marketsale_market_users_write.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
