<!-- INCLUDE FILE '../include/header.php' -->
<ul class="v-tab-container">
    <li>
        <a href="/towninfo/marketsale.php?s=CA" class="text-none">
            <div class="v-tab-item {{T_ON_CA}}">
                <div class="v-tab-text">캘리포니아</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=NY" class="text-none">
            <div class="v-tab-item {{T_ON_NY}}">
                <div class="v-tab-text">뉴욕</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=TX" class="text-none">
            <div class="v-tab-item {{T_ON_TX}}">
                <div class="v-tab-text">텍사스</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=NJ" class="text-none">
            <div class="v-tab-item {{T_ON_NJ}}">
                <div class="v-tab-text">뉴저지</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=N1" class="text-none">
            <div class="v-tab-item {{T_ON_N1}}">
                <div class="v-tab-text">워싱턴</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=VA" class="text-none">
            <div class="v-tab-item {{T_ON_VA}}">
                <div class="v-tab-text">버지니아</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=GA" class="text-none">
            <div class="v-tab-item {{T_ON_GA}}">
                <div class="v-tab-text">조지아</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=IL" class="text-none">
            <div class="v-tab-item {{T_ON_IL}}">
                <div class="v-tab-text">일리노이</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=MD" class="text-none">
            <div class="v-tab-item {{T_ON_MD}}">
                <div class="v-tab-text">메일랜드</div>
            </div>
        </a>
    </li>
    <li>
        <a href="/towninfo/marketsale.php?s=HI" class="text-none">
            <div class="v-tab-item {{T_ON_HI}}">
                <div class="v-tab-text">하와이</div>
            </div>
        </a>
    </li>

</ul><!-- Top button-->


<!-- Section start -->
<div class="breadcrumbs panel z-1 py-2 mb-3 bg-gray-25 border-top border-bottom">
    <div class="max-w-xl">
        <div style="display:flex;justify-content: space-between;padding:0 15px;flex-wrap: wrap;">
            <div class="fw-bold fs-4 text-success">{{T_TITLE}} ({{T_DATE}})</div>
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="/">Home</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="/towninfo/">타운정보</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><span class="text-primary fw-semibold">마켓세일</span></li>
            </ul>
        </div>
    </div>
</div><!-- Top title-->


<!-- Section start -->
<div class="section panel overflow-hidden mb-2 mt-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                    <div class="block-content border p-2" style="border-top:2px solid #000 !important;">

                        <div class="row child-cols-12 tdns border-bottom mt-n1 p-0">
                            <div class="v-tab-item">
                                <img src="{{T_LOGO_URL}}" alt=""/>
                            </div>
                        </div>

                        <div class="panel row child-cols-12 md:child-cols pb-2 pt-2">

    <div class="d-flex fs-6 flex-wrap text-gray-900 text-opacity-80 justify-start px-3 md:px-0" style="align-items:flex-start; gap:1rem; width:100%;">


        {{T_BRANCH}}

    </div>

</div>

                        <div class="panel pt-1 p-0 sm:p-3">
                            <div class="col-12 mt-1">
                                <div class="mb-2 fs-5 fw-bold"> * <span class="text-red">전단지를 클릭하시면</span> 큰 화면으로 보실수
                                    있습니다.
                                </div>

                                <img src="{{T_MAIN_URL}}" data-src="{{T_MAIN_URL}}" alt=""
                                     onclick="GO_VIEW('{{T_MAIN_URL_BASE}}');"/>
                            </div>
                        </div>
                        <p style="margin-left:20px;">{{T_DESCRIPTION}}</p>
                        <p style="margin-left:20px;">• 일부 품목은 현장 상황에 따라 조기 품절될 수도 있습니다.</p>
<p style="margin-left:20px;">• 이외에도 많은 제품을 세일하고 있으니 가까운 매장을 방문하시기 바랍니다.</p>
<p style="margin-left:20px;">• 더 많은 정보를 원하시면 아래에 있는 세일정보 홈페이지를 방문하시기 바랍니니다.</p>
<p style="margin-left:40px;">홈페이지 : <a href="{{T_LINK}}" target="_blank">{{T_LINK}}</a></p>
                    </div>
                     
                </div>
               
            </div> <!--Content end-->

        </div>

        <div class="d-flex items-end justify-end gap-1 mt-2">
            <a href="/towninfo/marketsale.php?s={{T_S}}" class="btn btn-gray-800 btn-sm">목록</a>
        </div>
    </div>
</div>

<!-- Section end -->
<script>

    function GO_VIEW(url) {

        window.open("popup.php?img=" + url, "_blank");
    }
</script>

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/towninfo/marketsale_view.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->

