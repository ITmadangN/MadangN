<!-- INCLUDE FILE '../include/header.php' -->
<script>
function toggleDealerList() {
    const list = document.getElementById('dealerList');
    const btn = document.getElementById('toggleDealerBtn');
    const icon = document.getElementById('dealerIcon');

   if (list.style.display === "none" || list.style.display === "") {
        list.style.display = "block"; 
        btn.childNodes[0].nodeValue = "마켓 숨기기 ";
    icon.className = "fa fa-chevron-up";
    } else {
        list.style.display = "none";
        btn.childNodes[0].nodeValue = "마켓보기 ";
    icon.className = "fa fa-chevron-down";
    }
}
</script>
<ul class="v-tab-container">
                               <li>
                                   <a href="/towninfo/marketsale.php?s=CA" class="text-none">
                                   <div class="v-tab-item {{T_ON_CA}}">
                                      <div class="v-tab-text">캘리포니아</div>
                                   </div>
                                   </a>
                                </li>
                                <li>
                                   <a href="/towninfo/marketsale.php?s=NYNJ" class="text-none">
                                   <div class="v-tab-item {{T_ON_NYNJ}}">
                                      <div class="v-tab-text">뉴욕/뉴저지</div>
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
                                   <a href="/towninfo/marketsale.php?s=MDVA" class="text-none">
                                   <div class="v-tab-item {{T_ON_MDVA}}">
                                      <div class="v-tab-text">메릴랜드/버지니아</div>
                                   </div>
                                   </a>
                                </li>
                                 <li>
                                   <a href="/towninfo/marketsale.php?s=DC" class="text-none">
                                   <div class="v-tab-item {{T_ON_DC}}">
                                      <div class="v-tab-text">워싱턴</div>
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
                                   <a href="/towninfo/marketsale.php?s=AZ" class="text-none">
                                   <div class="v-tab-item {{T_ON_AZ}}">
                                      <div class="v-tab-text">아리조나</div>
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

<!--
<div class="hannam-locations-wrapper">
    
    <div class="hannam-logo-section">
         <img src="{{T_LOGO_URL}}" alt=""/>
    </div>

    <div class="county-row">
        <div class="county-name">Los Angeles</div>
        <div class="branch-grid">
            <div class="branch-card">
                <div class="branch-text">Downtown</div>
                <div class="branch-phone"><a href="tel:213-555-0123">(213) 555-0123</a></div>
            </div>
            <div class="branch-card">
                <div class="branch-text">Hollywooddsfdsfdfsdf</div>
                <div class="branch-phone"><a href="tel:323-555-9876">(323) 555-9876</a></div>
            </div>
	    <div class="branch-card">
                <div class="branch-text">Hollywood</div>
                <div class="branch-phone"><a href="tel:323-555-9876">(323) 555-9876</a></div>
            </div>
        </div>
    </div>

    <div class="county-row">
        <div class="county-name">Orange County</div>
        <div class="branch-grid">
            <div class="branch-card">
                <div class="branch-text">Irvine</div>
                <div class="branch-phone"><a href="tel:949-555-1111">(949) 555-1111</a></div>
            </div>
        </div>
    </div>

</div>
-->
{{T_BRANCH}}

<!-- Section start -->
<div class="section panel overflow-hidden mb-2 mt-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">

                    <div class="block-content border p-2" style="border-top:2px solid #000 !important;">

                        <div class="row child-cols-12 tdns border-bottom mt-n1">

			 <div style="display:flex;justify-content: space-between;padding:12px 15px;flex-wrap: wrap;">
            <div class="fw-bold fs-4 text-success">{{T_TITLE}} ({{T_DATE}})</div>
            <ul class="breadcrumb nav-x justify-center gap-1 fs-72 m-0 text-gray-900 text-opacity-80">
                <li>등록일 : </li>
                <li>{{T_CREATE_AT}}</li>
                <li>|</li>
                <li>조회 : </li>
                <li>{{T_VIEW_COUNT}}</li>
            </ul>
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
            {{UPDATE_BUTTON}}
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

