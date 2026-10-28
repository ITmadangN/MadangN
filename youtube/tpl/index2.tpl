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

<div class="section panel overflow-hidden swiper-parent">
    <div class="max-w-xl">
        <div class="section-inner panel vstack gap-2">


            <div class="row child-cols-12 g-2">
                <div class="lg:col-9">
                    <div class="block-layout slider-layout swiper-parent uc-dark">
                        <div class="block-content panel uc-visible-toggle">

                            <div class="swiper swiper-fade swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden" data-uc-swiper="items: 1; active: 1; gap: 4; prev: .nav-prev; next: .nav-next; autoplay: 6000; parallax: true; fade: true; effect: fade; disable-class: d-none;">

                                <div class="swiper-wrapper" style="transition-duration: 300ms;" id="swiper-wrapper-f53659091a24177e" aria-live="off">

                                    <!-- LOOP START 'M_TOP' -->
                                    <div class="swiper-slide" style="width: 924px; transition-duration: 300ms; opacity: 0; transform: translate3d(0px, 0px, 0px);" role="group" aria-label="{{M_TOP.T_NO}}">
                                        <article class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 h-100 overflow-hidden uc-dark">
                                            <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_TOP.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                            <div class="post-media panel overflow-hidden h-100">
                                                <div class="featured-image bg-gray-25 ratio ratio-16x9 d-none md:d-block">
                                                    <canvas class="h-100 w-100"></canvas>
                                                    <img class="media-cover image uc-transition-opaque" src="{{M_TOP.T_SIMG}}" data-src="{{M_TOP.T_SIMG}}" alt="#" data-uc-img="loading: lazy">
                                                </div>
                                                <div class="featured-image bg-gray-25 ratio ratio-16x9 d-block md:d-none">
                                                    <img class="media-cover image uc-transition-opaque" src="{{M_TOP.T_SIMG}}" data-src="{{M_TOP.T_SIMG}}" alt="#" data-uc-img="loading: lazy" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-90"></div>
                                            <div class="post-header panel vstack justify-end items-start gap-1 p-2 sm:p-4 position-cover text-white" data-swiper-parallax-y="-24" style="transition-duration: 300ms; transform: translate3d(0px, -24px, 0px);">

                                                <h3 class="post-title h5 lg:h4 xl:h3 m-0 max-w-600px text-white text-truncate-2">
                                                    <a class="text-none text-white" href="#">{{M_TOP.T_HISTORY_TITLE}}</a>
                                                </h3>

                                            </div>
                                        </article>
                                    </div>
                                    <!-- LOOP END 'M_TOP' -->


                                </div> <!-- swiper-wrapper -->

                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            <div class="swiper-nav nav-prev position-absolute top-50 start-0 translate-middle-y btn btn-alt-primary text-black rounded-circle p-0 mx-2 border-0 shadow-xs w-32px h-32px z-1 uc-hidden-hover" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-f53659091a24177e" aria-disabled="false">
                                <i class="icon-1 unicon-chevron-left"></i>
                            </div>
                            <div class="swiper-nav nav-next position-absolute top-50 end-0 translate-middle-y btn btn-alt-primary text-black rounded-circle p-0 mx-2 border-0 shadow-xs w-32px h-32px z-1 uc-hidden-hover d-none" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-f53659091a24177e" aria-disabled="true">
                                <i class="icon-1 unicon-chevron-right"></i>
                            </div>
                        </div><!-- swiper -->

                    </div>
                </div>



                <div class="lg:col-3">
                    <div class="panel">
                        <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-12 g-2">
                            <!-- LOOP START 'M_TOP_OTHER' -->
                            <div>
                                <article class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 overflow-hidden">
                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_TOP_OTHER.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                    <div class="post-media panel overflow-hidden">
                                        <div class="featured-image bg-gray-25 ratio ratio-16x9 sm:ratio-custom2">
                                            <img class="media-cover image image uc-transition-opaque" src="{{M_TOP_OTHER.T_IMG}}" data-src="{{M_TOP_OTHER.T_IMG}}" alt="{{M_TOP_OTHER.T_HISTORY_TITLE}}" data-uc-img="loading: lazy">
                                        </div>
                                    </div>
                                    <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-90"></div>
                                    <div class="post-header panel vstack justify-start items-start flex-column-reverse gap-1 p-2 position-cover text-white">
                                        <h3 class="post-title h6 m-0 max-w-600px text-white text-truncate-2">
                                            <a class="text-none text-white" href="#">{{M_TOP_OTHER.T_HISTORY_TITLE}}</a>
                                        </h3>

                                    </div>
                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="5i0K_vDP11I" data-uc-toggle style="z-index: 20;"></a>
                                </article>
                            </div>
                            <!-- LOOP END 'M_TOP_OTHER' -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>






<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent mt-n2 sdtd">
    <div class="section-outer panel py-2">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">

                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">Latest Video</a>
                    </h2>
                </div>
                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                    <div class="block-content panel">
                        <div class="swiper" data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev; autoplay: 4000; " data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 3; gap: 18;">
                            <div class="swiper-wrapper">
                                <!-- LOOP START 'M_LATEST' -->
                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{M_LATEST.T_IMG}}" data-src="{{M_LATEST.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_LATEST.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <!-- LOOP END 'M_LATEST' -->

                            </div>
                        </div>
                        <div class="swiper-nav nav-prev position-absolute top-50 start-20 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-left"></i>
                        </div>
                        <div class="swiper-nav nav-next position-absolute top-50 end-10 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent mt-n2 sdtd">
    <div class="section-outer panel py-2">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">

                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">Popular Video</a>
                    </h2>
                </div>
                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                    <div class="block-content panel">
                        <div class="swiper" data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev;" data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 3; gap: 18;">
                            <div class="swiper-wrapper">
                                <!-- LOOP START 'M_POPULAR' -->
                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{M_POPULAR.T_IMG}}" data-src="{{M_POPULAR.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_POPULAR.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <!-- LOOP END 'M_POPULAR' -->

                            </div>
                        </div>
                        <div class="swiper-nav nav-prev position-absolute top-50 start-20 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-left"></i>
                        </div>
                        <div class="swiper-nav nav-next position-absolute top-50 end-10 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent border mt-2">
    <div class="section-outer panel py-3">
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-4">
                <div class="section-content">
                    <div class="row child-cols-12 pt-0 mt-n2 sm:pt-1 sm:mt-0">



                        <div id="shorts-A" class="ms-total-wrap">
                            <div class="ms-left">
                                <div class="ms-header">
                                    <div class="section-header panel vstack items-start justify-center text-center gap-1 mt-1 pls-20">
                                        <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                            <a href="https://www.youtube.com/@madangn5253" class="text-none hover:text-primary duration-150" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"  style="color:#ff0000;"></i> 마당엔 쇼츠</a>

                                        </h2>
                                        <a href="#" class="btn btn-sm btn-alt-primary bg-transparent text-gray-900 fs-5 border shadow-xs text-none d-none lg:d-inline-flex mt-2">
                                            <span>바로가기</span> <i class="icon icon-1 unicon-arrow-right"></i></a>
                                    </div>
                                    <div class="ms-arrows">
                                        <div class="ms-arrows">
                                            <button type="button" class="ms-btn-nav ms-prev">❮</button>
                                            <button type="button" class="ms-btn-nav ms-next">❯</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="ms-right">
                                <div class="ms-track-container">
                                    <!-- LOOP START 'M_MSHORTS' -->
                                    <div class="ms-item"><div class="ms-img-box"><img src="{{M_MSHORTS.T_IMG}}" data-src="{{M_MSHORTS.T_IMG}}"  style="width:213px;" alt="#" data-uc-img="loading: lazy"></div></div>
                                    <!-- LOOP END 'M_MSHORTS' -->
                                </div>
                            </div>
                        </div>


                        <!-- 쇼츠 end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->


<!-- Section start -->
<div class="section panel overflow-hidden mt-3">
    <div class="section-outer panel">
        <div class="max-w-100">
            <div class="section-inner">
                <a class="text-none" href="#" target="_blank" rel="nofollow">
                    <img class="d-none md:d-block" src="https://cdn.madangn.com/bannerpop/uploads/image/1762216684915479548.gif" alt="#">
                    <img class="d-block md:d-none" src="https://cdn.madangn.com/bannerpop/uploads/image/1762216684915479548.gif" alt="#">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section start -->






<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent mt-n2 sdtd">
    <div class="section-outer panel py-2">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">

                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">Editor's Pick</a>
                    </h2>
                </div>
                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                    <div class="block-content panel">
                        <div class="swiper" data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev; " data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 3; gap: 18;">
                            <div class="swiper-wrapper">
                                <!-- LOOP START 'M_EDITORS' -->
                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{M_EDITORS.T_IMG}}" data-src="{{M_EDITORS.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_EDITORS.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <!-- LOOP END 'M_EDITORS' -->
                            </div>
                        </div>
                        <div class="swiper-nav nav-prev position-absolute top-50 start-20 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-left"></i>
                        </div>
                        <div class="swiper-nav nav-next position-absolute top-50 end-10 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent mt-n2 sdtd">
    <div class="section-outer panel py-2">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">

                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">MadangN TV <a href="https://www.youtube.com/@madangn5253" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"  style="color:#ff0000;"></i></a>
                    </h2>
                </div>
                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                    <div class="block-content panel">
                        <div class="swiper" data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev;" data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 3; gap: 18;">
                            <div class="swiper-wrapper">
                                <!-- LOOP START 'M_MADANGNTV' -->
                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{M_MADANGNTV.T_IMG}}" data-src="{{M_MADANGNTV.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_MADANGNTV.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <!-- LOOP END 'M_MADANGNTV' -->
                            </div>
                        </div>
                        <div class="swiper-nav nav-prev position-absolute top-50 start-20 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-left"></i>
                        </div>
                        <div class="swiper-nav nav-next position-absolute top-50 end-10 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



<!-- Section start -->
<div class="section panel overflow-hidden mt-3">
    <div class="section-outer panel">
        <div class="max-w-100">
            <div class="section-inner">
                <a class="text-none" href="#" target="_blank" rel="nofollow">
                    <img class="d-none md:d-block" src="https://cdn.madangn.com/bannerpop/uploads/image/1762216776546447903.gif" alt="#">
                    <img class="d-block md:d-none" src="https://cdn.madangn.com/bannerpop/uploads/image/1762216776546447903.gif" alt="#">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section start -->


<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent mt-n2 sdtd">
    <div class="section-outer panel py-2">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">

                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">재정/보험 <a href="https://www.youtube.com/@spoontv_Korean" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"  style="color:#ff0000;"></i></a>
                    </h2>
                </div>
                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                    <div class="block-content panel">
                        <div class="swiper" data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev;" data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 3; gap: 18;">
                            <div class="swiper-wrapper">
                                <!-- LOOP START 'M_INSURE' -->
                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{M_INSURE.T_IMG}}" data-src="{{M_INSURE.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_INSURE.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <!-- LOOP END 'M_INSURE' -->
                            </div>
                        </div>
                        <div class="swiper-nav nav-prev position-absolute top-50 start-20 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-left"></i>
                        </div>
                        <div class="swiper-nav nav-next position-absolute top-50 end-10 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent mt-n2 sdtd" style="margin-top:5px !important;">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">


                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                    <div class="block-content panel">
                        <div class="swiper" data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev;" data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 3; gap: 18;">
                            <div class="swiper-wrapper">
                                <!-- LOOP START 'M_INSURE_OTHER' -->
                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{M_INSURE_OTHER.T_IMG}}" data-src="{{M_INSURE_OTHER.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_INSURE_OTHER.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <!-- LOOP END 'M_INSURE_OTHER' -->

                            </div>
                        </div>
                        <div class="swiper-nav nav-prev position-absolute top-50 start-20 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-left"></i>
                        </div>
                        <div class="swiper-nav nav-next position-absolute top-50 end-10 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                            <i class="icon-1 unicon-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->




<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent border mt-2">
    <div class="section-outer panel py-3">
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-4">
                <div class="section-content">
                    <div class="row child-cols-12 pt-0 mt-n2 sm:pt-1 sm:mt-0">



                        <div id="shorts-B" class="ms-total-wrap">
                            <div class="ms-left">
                                <div class="ms-header">
                                    <div class="section-header panel vstack items-start justify-center text-center gap-1 mt-1 pls-20">
                                        <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                            <a href="https://www.youtube.com/@madangn5253" class="text-none hover:text-primary duration-150" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"  style="color:#ff0000;"></i> 재정/보험 쇼츠</a>

                                        </h2>
                                        <a href="#" class="btn btn-sm btn-alt-primary bg-transparent text-gray-900 fs-5 border shadow-xs text-none d-none lg:d-inline-flex mt-2">
                                            <span>바로가기</span> <i class="icon icon-1 unicon-arrow-right"></i></a>
                                    </div>
                                    <div class="ms-arrows">
                                        <div class="ms-arrows">
                                            <button type="button" class="ms-btn-nav ms-prev">❮</button>
                                            <button type="button" class="ms-btn-nav ms-next">❯</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="ms-right">
                                <div class="ms-track-container">
                                    <!-- LOOP START 'M_ISHORTS' -->
                                    <div class="ms-item"><div class="ms-img-box"><img src="{{M_ISHORTS.T_IMG}}" data-src="{{M_ISHORTS.T_IMG}}"  style="width:213px;" alt="#" data-uc-img="loading: lazy"></div></div>
                                    <!-- LOOP END 'M_ISHORTS' -->

                                </div>
                            </div>
                        </div>






                        <!-- 쇼츠 end -->


                        <script>
                            (function() {
                                /**
                                 * @param {string} sliderId - 슬라이더 고유 ID
                                 */
                                function initMadangSlider(sliderId) {
                                    const root = document.getElementById(sliderId);
                                    if (!root) return;

                                    const track = root.querySelector('.ms-track-container');
                                    const btnPrev = root.querySelector('.ms-prev');
                                    const btnNext = root.querySelector('.ms-next');
                                    const items = track.querySelectorAll('.ms-item');

                                    // 해당 슬라이더 전용 인덱스
                                    let currentIndex = 0;

                                    function updateSliderPosition() {
                                        const visibleItems = window.innerWidth <= 991 ? 2 : 3;
                                        const maxIdx = Math.max(0, items.length - visibleItems);

                                        // 범위 보정
                                        if (currentIndex < 0) currentIndex = 0;
                                        if (currentIndex > maxIdx) currentIndex = maxIdx;

                                        // 정확한 실제 너비 측정 (클릭 시점에 실시간 계산)
                                        const itemWidth = items[0].getBoundingClientRect().width;
                                        const gap = 15;
                                        const moveX = currentIndex * (itemWidth + gap);

                                        track.style.transform = `translate3d(-${moveX}px, 0, 0)`;
                                    }

                                    // 클릭 이벤트 (캡처링 true 옵션으로 다른 스크립트보다 우선 실행)
                                    btnPrev.addEventListener('click', function(e) {
                                        e.preventDefault();
                                        e.stopImmediatePropagation(); // 다른 이벤트 리스너 실행 방지
                                        currentIndex--;
                                        updateSliderPosition();
                                    }, true);

                                    btnNext.addEventListener('click', function(e) {
                                        e.preventDefault();
                                        e.stopImmediatePropagation();
                                        currentIndex++;
                                        updateSliderPosition();
                                    }, true);

                                    // 리사이즈 시 초기화 및 위치 재조정
                                    window.addEventListener('resize', function() {
                                        currentIndex = 0;
                                        updateSliderPosition();
                                    });

                                    // 초기 로딩 지연 대응 (이미지 로딩 등으로 인한 너비 오차 방지)
                                    setTimeout(updateSliderPosition, 500);
                                }

                                // 문서가 준비되면 슬라이더들 가동
                                function launch() {
                                    initMadangSlider('shorts-A');
                                    initMadangSlider('shorts-B');
                                }

                                if (document.readyState === 'complete') {
                                    launch();
                                } else {
                                    window.addEventListener('load', launch);
                                }
                            })();
                        </script><!-- 쇼츠 end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->



<!-- Section start -->
<div class="section panel overflow-hidden mt-3">
    <div class="section-outer panel">
        <div class="max-w-100">
            <div class="section-inner">
                <a class="text-none" href="#" target="_blank" rel="nofollow">
                    <img class="d-none md:d-block" src="https://cdn.madangn.com/bannerpop/uploads/image/17622168111496080071.gif" alt="#">
                    <img class="d-block md:d-none" src="https://cdn.madangn.com/bannerpop/uploads/image/17622168111496080071.gif" alt="#">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section start -->




<!-- Section start -->
<div class="section panel overflow-hidden pb-2 mt-4">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4">
                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">부동산</a>
                    </h2>
                </div>
                <div class="section-content mt-n2">
                    <div class="row child-cols-6 md:child-cols-4 lg:child-cols-3 g-2">
                        <!-- LOOP START 'M_REALESTATE' -->
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-0 p-0 overflow-hidden">
                                <div class="post-media panel overflow-hidden w-100">
                                    <figure class="featured-image m-0 ratio ratio-16x9  overflow-hidden">
                                        <img class="media-cover image uc-transition-opaque" src="{{M_REALESTATE.T_IMG}}" data-src="{{M_REALESTATE.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                        <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_REALESTATE.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                    </figure>
                                </div>

                            </article>
                        </div>
                        <!-- LOOP END 'M_REALESTATE' -->



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Section end -->



<!-- Section start -->
<div class="section panel overflow-hidden pb-2 mt-4">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4">
                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h4  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">ROGG</a>
                    </h2>
                </div>
                <div class="section-content mt-n2">
                    <div class="row child-cols-6 md:child-cols-4 lg:child-cols-3 g-2">
                        <!-- LOOP START 'M_ROGG' -->
                        <div>
                            <article class="post type-post panel hstack sm:vstack items-start gap-0 p-0 overflow-hidden">
                                <div class="post-media panel overflow-hidden w-100">
                                    <figure class="featured-image m-0 ratio ratio-16x9  overflow-hidden">
                                        <img class="media-cover image uc-transition-opaque" src="{{M_ROGG.T_IMG}}" data-src="{{M_ROGG.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                        <a href="#uc-youtube-modal" class="position-cover youtube-trigger" data-video-id="{{M_ROGG.T_VIDEO_ID}}" data-uc-toggle style="z-index: 20;"></a>
                                    </figure>
                                </div>

                            </article>
                        </div>
                        <!-- LOOP END 'M_ROGG' -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Section end -->







<!-- Section start -->
<div class="section panel overflow-hidden pb-2" >
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4">
                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-1">
                    <h2 class="h5  fw-bolder -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#"></a>
                    </h2>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Section end -->


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->