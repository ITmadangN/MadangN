<!-- INCLUDE FILE '../include/header.php' -->

	<script>
document.addEventListener('DOMContentLoaded', function() {
    const youtubeTriggers = document.querySelectorAll('.youtube-trigger');
    const playerContainer = document.getElementById('youtube-player-container');
    const modal = document.getElementById('uc-youtube-modal');

    youtubeTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const videoId = this.getAttribute('data-video-id');
            // 모달 안에 iframe 생성 및 삽입
            playerContainer.innerHTML = `
                <iframe 
                    width="100%" 
                    height="100%" 
                    src="https://www.youtube.com/embed/${videoId}?autoplay=1" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>`;
        });
    });

     modal.addEventListener('hidden', function() {
        playerContainer.innerHTML = '';
    });
});
</script>	

     <!--  youtube -->
        <div id="uc-youtube-modal" data-uc-modal="overlay: true">
            <div class="uc-modal-dialog lg:max-w-900px bg-white text-dark rounded">
                <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
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
					               <h3 class="h5 lg:h5 m-0 fw-bolder">재정/보험</span></h3>
                                     <div><a href="/youtube/financial.php?s_category_1=insure&s_category_2={{T_CATEGORY_2}}&s_sort=newest" class="text-none fs-6 fw-semibold {{T_SORT_1}}">최신순</a> &nbsp; <a href="/youtube/financial.php?s_category_1=insure&s_category_2={{T_CATEGORY_2}}&s_sort=view" class="text-none fs-6 fw-semibold {{T_SORT_2}}">인기순</a></div>
					             </div>
                            </div>
							<div class="youtube_cate text-gray-500 fw-medium gap-2 lg:gap-3">
							   <a href="/youtube/financial.php?s_category_1=insure&s_category_2=unity&s_sort=newest" class="text-none  {{T_ACTIVE_1}}">유니티</a>
                               <a href="/youtube/financial.php?s_category_1=insure&s_category_2=bridgeone&s_sort=newest" class="text-none {{T_ACTIVE_2}}">브리지원</a>
							   <a href="/youtube/financial.php?s_category_1=insure&s_category_2=money&s_sort=newest" class="text-none {{T_ACTIVE_3}}">재정의 달인</a>
							   <a href="/youtube/financial.php?s_category_1=insure&s_category_2=medicare&s_sort=newest" class="text-none {{T_ACTIVE_4}}">메디케어</a>
							   <a href="/youtube/financial.php?s_category_1=insure&s_category_2=obama&s_sort=newest" class="text-none {{T_ACTIVE_5}}">오바마케어</a>
							   <a href="/youtube/financial.php?s_category_1=insure&s_category_2=moneywise&s_sort=newest" class="text-none {{T_ACTIVE_6}}">머니 와이즈</a>
							   <a href="/youtube/financial.php?s_category_1=insure&s_category_2=ishorts&s_sort=newest" class="text-none {{T_ACTIVE_7}}">재정/보험 쇼츠</a>
							</div>
                            <div class="block-content panel mt-1">
                                <div class="row child-cols-6 md:child-cols-4 xl:child-cols-4 g-4">
                                    <!-- LOOP START 'T_LOOP' -->
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle vstack gap-2">
                                            <div class="post-media panel overflow-hidden">
                                                <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                    <img class="media-cover image uc-transition-opaque" src="{{T_LOOP.T_IMG}}" data-src="{{T_LOOP.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                </div>
                                                <a href="#uc-youtube-modal" class="position-cover youtube-trigger"  data-video-id="{{T_LOOP.T_VIDEO_ID}}" data-uc-toggle>
                                            </div>
                                            <div class="post-header panel vstack justify-between gap-1">
                                                <div class="post-top panel vstack items-start gap-2">

                                                    <h3 class="post-title h6 m-0 text-truncate-2 fw-semibold">
                                                        <a class="text-none" href="#uc-youtube-modal">{{T_LOOP.T_HISTORY_TITLE}}</a>
                                                    </h3>
                                                </div>
                                                <div class="post-bottom panel hstack gap-2 fs-6 text-black text-opacity-60">
                                                    <div>
                                                        <span>조회수 : {{T_LOOP.T_VIEW_COUNT}}회</span>
                                                    </div>
                                                    <div>
                                                        <span>{{T_LOOP.T_PUBLISH_DATE}}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- LOOP END 'T_LOOP' -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->