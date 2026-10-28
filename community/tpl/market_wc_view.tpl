<!-- INCLUDE FILE '../include/header.php' -->

<!-- INCLUDE FILE '../include/common_fm.php' -->

<div class="breadcrumbs panel z-1 py-2 bg-gray-25 ">
    <div class="max-w-xl">
        <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;">
            <div class="fw-semibold fs-5">{{T_MENU_NAME}}</div>
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="/">Home</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="/community/">커뮤니티</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="/community/market.php">사고팔고</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><span class="text-primary fw-semibold">{{T_MENU_NAME}}</span></li>
            </ul>
        </div>
    </div>
</div><!-- Top title-->


<article class="product type-product single product-single py-4">
<input type="hidden" id="parent_code" value="{{T_PARENT_CODE}}">
    <input type="hidden" id="parent_id" value="{{T_PARENT_ID}}">
    <div class="max-w-xl">
        <div class="product-header panel">
            <div class="row child-cols-12 gy-4 gx-4 md:gx-5 xl:gx-5">

                <div>
                    <div class="product-details panel vstack gap-2o">
                        <h1 class="product-title h4 m-0  pb-2">{{T_TITLE}}</h1>


                        <ul class="nav-y mt-1 fs-6 fw-medium">
                            <li class="hstack gap-narrow border-top pt-1">
                                <span class="text-uppercase opacity-60 me-narrow">지역 :</span>
                                <span>{{T_LOCATION}}</span>
                            </li>
                            <li class="hstack gap-narrow border-bottom pb-1">
                                <span class="text-uppercase opacity-60 me-narrow">연락처 :</span>
                                <a class="text-primary" href="tel:">{{T_CONTACT_PHONE}}</a>
                            </li>
                        </ul>

                        <p class="product-desc fs-6 my-2 bg-gray-25 p-2">
                            마당N은 사고팔고에서 중고거래에 대한 책임을 지지 않습니다.<br />
                            판매자와 신용과 부정거래에 대해서 구매자는 조심하시기 바랍니다.

                        </p>
                        <form class="product-actions hstack gap-1 xl:mt-2">
                            {{T_FM}}
                        </form>

                    </div>
                </div><!--Right info-->
            </div>
        </div>
        <div class="product-tabs panel mt-4">
            <div class="border p-3 bg-gray-25">
                <div id="product-details" class="product-details panel">
                    {{T_DESCRIPTION}}
                </div>
                <!-- IF START 'UPDATE_DELETE' -->
                <div class="mt-1 d-flex gap-narrow justify-end"> <a href="javascript:return false;" onclick="GO_UPDATE('{{T_ID}}','{{T_LT}}');" class="btn btn-primary2 btn-sm2">수정</a> <a href="javascript:return false;" class="btn btn-gray btn-sm2" onclick="GO_DELETE('{{T_ID}}')">삭제</a></div>
                <!-- IF END 'UPDATE_DELETE' -->
            </div><!-- 내용-->

            <div id="blog-comment" class="panel mt-4">
                <h4 class="h5 mb-4">댓글</h4>
                <ol id="result_reply">

                </ol>
                <div class="spacer-single"></div>
                <div class="mt-2">
                    <div class="panel vstack gap-1 lg:gap-2 uc-sticky" data-uc-sticky="bottom: true; offset: 40;">
                        <form class="panel vstack gap-2 lg:gap-3 mt-2" action="?">
                            <div class="row g-2 child-cols-12 lg:child-cols-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="r_user_nickname" id="r_user_nickname" placeholder="이름" value="{{T_SS_NICKNAME}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control w-full bg-white" rows="5" name="r_comments" id="r_comments" placeholder="내용"></textarea>
                            </div>

                            {{T_REPLY_WRITE}}
                        </form>
                    </div>
                </div>
            </div><!--Commnet end-->
        </div>
    </div>
</article>


<!-- Market view end -->






<div class="mb-3 bg-gray-25 p-2 rounded">
    <form name="" action="" method="post">
        <input type="hidden" name="listing_type" id="listing_type" value="{{T_LISTING_TYPE}}">
        <!-- IF START 'MARKET_WANTED' -->
        <div class="vstack sm:hstack items-start justify-between gap-4">
            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12 w-150px" name="s_state_code" id="s_state_code"
                        onchange="GET_CITY_NAME();">
                    {{S_SELECT_STATE_CODE}}
                </select>

                <div class="custom-dropdown-container">
                    <div class="form-select rounded p-12 text-start cursor-pointer" id="cityBtn">
                        <span id="cityLabel">도시 전체</span>
                    </div>
                    <div class="dropdown-options shadow" id="cityMenu">
                    </div>
                </div>
            </div>
            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12" name="s_kind" id="s_kind">
                    {{S_SELECT_MARKET_KIND}}
                </select>
                <input class="form-control form-control-sm h-42px fs-6 bg-white" type="text" placeholder="검색어를 입력하세요" name="s_keyword"
                       id="s_keyword" onkeydown="return event.keyCode !== 13;">

                <button class="btn btn-primary btn-sm" style="width:120px !important;"  onclick="GET_PAGE();" type="button">검색</button>
            </div>
        </div>
        <!-- IF END 'MARKET_WANTED' -->
        <!-- IF START 'MARKET_COUPON' -->
        <div class="vstack sm:hstack items-start justify-between gap-4">
            <div class="hstack items-start gap-1">
            </div>
            <div class="hstack items-start gap-1">
                <select class="form-select rounded p-12" name="s_kind" id="s_kind">
                    {{S_SELECT_MARKET_KIND}}
                </select>
                <input class="form-control form-control-sm h-42px fs-6 bg-white" type="text" placeholder="검색어를 입력하세요" name="s_keyword"
                       id="s_keyword" onkeydown="return event.keyCode !== 13;">

                <button class="btn btn-primary btn-sm" style="width:120px !important;" onclick="GET_PAGE();" type="button">검색</button>
            </div>
        </div>
        <!-- IF END 'MARKET_COUPON' -->
    </form>

</div> <!-- 검색 End -->


<!-- Section start -->
<div class="section panel overflow-hidden mt-2" >
    <div class="section-outer panel">
        <!-- IF START 'MARKET_WANTED' -->
        <div class="max-w-xl">
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top" style="min-width:600px;">

                    <colgroup>                        
                        <col width="20%" />
                        <col width="/" />
                        <col width="12%" />
                        <col width="9%" />

                    </colgroup>
                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                    <tr>
                        <th>지역</th>
                        <th>제목</th>
                        <th>등록자</th>
                        <th>등록일</th>

                    </tr>
                    </thead>
                    <tbody id="result_html">
                    </tbody>

                </table>
            </div>

            <div id="result_pagging">

            </div>
        </div>
        <!-- IF END 'MARKET_WANTED' -->
        <!-- IF START 'MARKET_COUPON' -->
        <div class="max-w-xl">
            <div class="panel max-h-sm overflow-auto border border-gray-50 ">
                <table class="table align-middle overflow-auto m-0 fs-6 text-center fw-medium border-top" style="min-width:600px;">

                    <colgroup>                        
                        <col width="/" />
                        <col width="20%" />
                        <col width="15%" />

                    </colgroup>
                    <thead class="bg-gray-25 text-dark sticky-top z-1 text-center border-bottom">
                    <tr>                        
                        <th>제목</th>
                        <th>등록자</th>
                        <th>등록일</th>

                    </tr>
                    </thead>
                    <tbody id="result_html">
                    </tbody>

                </table>
            </div>

            <div id="result_pagging">

            </div>
        </div>
        <!-- IF END 'MARKET_COUPON' -->
    </div>
</div>

<!-- Section end -->



<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/market.js"></script>
<script defer src="/js/community/market_view.js"></script>
<script defer src="/js/community/fm.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->


