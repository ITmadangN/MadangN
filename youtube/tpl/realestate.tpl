<!-- INCLUDE FILE '../include/header.php' -->


     <!--  youtube -->
<div id="uc-youtube-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog lg:max-w-900px bg-white text-dark">
        <button class="uc-modal-close-default p-0 icon-3 btn border-0 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button" style="z-index: 10;">
            <i class="unicon-close"></i>
        </button>
        <div class="panel vstack justify-center items-center gap-0">
            <div class="ratio ratio-16x9 w-100">
                <div id="youtube-player-container">
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Section start -->
            <div class="section panel overflow-hidden-x">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner panel vstack gap-2">
                            <div class="block-header panel text-center">
                                 <div class="head_title">
					               <h3 class="h5 lg:h5 m-0 fw-bolder">부동산</span></h3>
                                     <div><a href="javascript:false;" onclick="GO_SORT(this,'newest');" class="text-none fs-6 fw-semibold nactive">최신순</a> &nbsp; <a href="javascript:false;" onclick="GO_SORT(this,'view');" class="text-none fs-6 fw-semibold">인기순</a></div>
					             </div>
                            </div>
                            <input type="hidden" name="h_category_1" id="h_category_1" value="realstate">
                            <input type="hidden" name="h_category_2" id="h_category_2" value="cbr">
                            <input type="hidden" name="h_sort" value="newest">
							<div class="youtube_cate text-gray-500 fw-medium gap-2 lg:gap-3">
                                <a href="javascript:false;" onclick="GO_SECTION('cbr');" ID="cbr" class="text-none nactive">Coldwell Banker Best Realty</a>
                           
							</div>
                            <div class="block-content panel">
                                <div class="row child-cols-6 md:child-cols-4 xl:child-cols-4 g-4" id="result_movie">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->
<script>
    var g_section = '{{T_SECTION}}';
</script>
<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/youtube/youtube_common.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->