<!-- INCLUDE FILE '../include/header.php' -->

<style>
.side-pager-head {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.side-pager-btn {
    border: 0;
    background: transparent;
    padding: 0;
    margin: 0;
    font: inherit;
    line-height: 1;
    color: inherit;
    cursor: pointer;
}

.side-pager-btn[hidden] {
    display: none !important;
}

.side-pager-title-link {
    text-decoration: none;
    color: inherit;
    display: inline-flex;
    align-items: center;
}

.side-pager-title-link:hover {
    color: var(--bs-primary, #0d6efd);
}
</style>

 
<!-- Section start -->
<div class="section panel overflow-hidden">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">
                <div class="section-header panel vstack items-center justify-center text-center gap-1">
                    <h2 class="h5 fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="/towninfo/marketsale.php">마켓세일</a>
                    </h2>
                </div>
                <div class="section-content">
                    <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2 gy-2">
                        <!-- LOOP START 'T_MS' -->
                        <div>
                            <article class="post type-post panel vstack gap-3 overflow-hidden uc-dark">
                                <div class="post-media panel overflow-hidden">
                                    <div class="featured-image bg-gray-25 ratio ratio-3x4">
                                        <img class="media-cover image" src="{{T_MS.T_MAIN}}" data-src="{{T_MS.T_MAIN}}" alt="Sale" data-uc-img="loading: lazy">
                                    </div>
                                </div>
                                <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-90"></div>
                                <div class="post-header panel vstack justify-start items-start flex-column-reverse gap-1 p-2 position-cover text-white">
                                    <div class="post-meta panel hstack justify-between fs-7 text-yellow text-opacity-30 mt-1">
                                        <div class="meta">
                                            <div class="hstack gap-0">
                                                <div>
                                                    <div class="post-author hstack gap-0">
                                                        <img src="{{T_MS.T_LOGO}}" alt="{{T_MS.T_BRANCH_NAME}}" class="h-48px rounded">
                                                    </div>
                                                </div>
                                                <div>
                                                    <span>{{T_MS.T_SALE_DATE}}</span><br />
                                                    <span class="text-white fs-6">{{T_MS.T_BRANCH_NAME}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="hstack gap-1"></div>
                                        </div>
                                    </div>
                                    <h3 class="post-title h6 m-0 m-0 max-w-600px text-white text-truncate-1">
                                        <a class="text-none text-white" href="{{T_MS.T_LINK}}">{{T_MS.T_TITLE}}</a>
                                    </h3>
                                </div>
                                <a href="{{T_MS.T_LINK}}" class="position-cover"></a>
                            </article>
                        </div>
                        <!-- LOOP END 'T_MS' -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->



<!-- Section start -->
<div class="section panel overflow-hidden swiper-parent mt-2">
    <div class="section-outer panel py-0">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">
                <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                    <div class="block-content panel">
                        <div class="swiper" data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev; disable-class: d-none;autoplay: 6000;speed: 500;" data-uc-swiper-s="items: 2; gap: 18;autoplay: 4000;speed: 500;" data-uc-swiper-l="items: 2; gap: 18;">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{중앙배너-1_img}}" data-src="{{중앙배너-1_img}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="{{중앙배너-1_link}}" class="position-cover"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="col-auto">
                                                <div class="post-media panel overflow-hidden w-full">
                                                    <img src="{{중앙배너-2_img}}" data-src="{{중앙배너-2_img}}" alt="#" data-uc-img="loading: lazy">
                                                    <a href="{{중앙배너-2_link}}" class="position-cover"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination dot-nav gap-2 mt-3 position-relative text-primary"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Section end --><!-- slide banner end -->   


<!-- Section start -->
<div class="section panel overflow-hidden border-top mb-2">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner mt-1">
                <div class="row child-cols-12 lg:child-cols g-4 col-match uc-grid" data-uc-grid="">
                    
                    <!-- 사람찾기 -->
                    <div class="lg:col-8 uc-first-column">
                        <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden js-side-pager"
                             data-page-size="7"
                             data-title="사람찾기"
                             data-title-url="/towninfo/find_people.php">
                            <div class="block-header panel pt-1">
                                <h2 class="h5 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black js-side-pager-title"></h2>
                            </div>
                            <div class="block-content">
                                <div class="panel row child-cols-12 md:child-cols g-2 lg:g-4 sep-y uc-grid" data-uc-grid="">
                                    <div class="col-12 md:col-6 order-0 md:order-1">
                                        <div>
                                            <article class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 h-100 overflow-hidden uc-dark">
                                                <div class="post-media panel overflow-hidden h-100">
                                                    <div class="featured-image bg-gray-25 ratio ratio-4x3">
                                                        <img class="media-cover image uc-transition-opaque" src="/towninfo/images/notice.jpg" data-src="/towninfo/images/notice.jpg" alt="사람찾기" data-uc-img="loading: lazy" loading="lazy">
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>

                                    <div class="order-1 md:order-0 uc-first-column">
                                        <div class="row child-cols-12 g-2 uc-grid uc-grid-stack js-side-pager-list" data-uc-grid="">
                                            <!-- LOOP START 'T_FP' -->
                                            <div class="border-bottom py-1 mt-0">
                                                <article class="post type-post panel uc-transition-toggle">
                                                    <div class="row child-cols g-1 uc-grid" data-uc-grid="">
                                                        <div class="uc-first-column">
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <h3 class="post-title fs-7 m-0 text-truncate-1">
                                                                    <a class="text-none hover:text-primary duration-150" href="{{T_FP.T_LINK}}">
                                                                        <span class="text-primary">[{{T_FP.T_CATEGORY}}]</span> {{T_FP.T_TITLE}}
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <!-- LOOP END 'T_FP' -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 행사/알림 -->
                    <div class="lg:col-4">
                        <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden js-side-pager"
                             data-page-size="7"
                             data-title="행사/알림"
                             data-title-url="/towninfo/notification.php">
                            <div class="block-header panel pt-1">
                                <h2 class="h5 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black js-side-pager-title"></h2>
                            </div>
                            <div class="block-content">
                                <div class="row child-cols-12 g-2 uc-grid uc-grid-stack js-side-pager-list" data-uc-grid="">
                                    <!-- LOOP START 'T_NT' -->       
                                    <div class="border-bottom py-1 mt-0">
                                        <article class="post type-post panel uc-transition-toggle">
                                            <div class="row child-cols g-1 uc-grid" data-uc-grid="">
                                                <div class="uc-first-column">
                                                    <div class="post-header panel vstack justify-between gap-1">
                                                        <h3 class="post-title fs-7 m-0 text-truncate-1">
                                                            <a class="text-none hover:text-primary duration-150" href="{{T_NT.T_LINK}}">{{T_NT.T_TITLE}}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- LOOP END 'T_NT' -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->




<!-- Section start -->
<div class="section panel overflow-hidden mt-2 mb-1 border-top">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">
                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-2">
                    <h2 class="h5 fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="/towninfo/event.php">마당엔 이벤트</a>
                    </h2>
                </div>
                <div class="section-content">
                    <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2 gy-2">
                        <!-- LOOP START 'T_ET' -->
                        <div>
                            <article class="post type-post panel uc-transition-toggle vstack gap-2 border">
                                <div class="post-media panel overflow-hidden">
                                    <div class="featured-image bg-gray-25 ratio ratio-1x1">
                                        <img class="media-cover image uc-transition-opaque" src="{{T_ET.T_IMG}}" data-src="{{T_ET.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                    </div>
                                    <a href="{{T_ET.T_LINK}}" class="position-cover"></a>
                                </div>
                                <div class="post-header panel vstack gap-0 text-center" style="margin-top:-0.8rem !important;">

                                    <div class="post-title fs-52 m-0 text-truncate-2 fw-semibold">
                                        <a class="text-none text-gray-600" href="{{T_ET.T_LINK}}">{{T_ET.T_TITLE}}</a>
                                    </div>
                                    <div class="fs-7 m-0 text-gray-500">
                                        <i class="unicon-calendar"></i> {{T_ET.T_TITLE}}
                                    </div>
                                                       
                                </div>
                            </article>
                        </div>
                        <!-- LOOP END 'T_ET' -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->


<!-- Section start -->
<div class="section panel overflow-hidden mt-1 rsd2">
    <div class="section-outer panel">
        <div class="max-w-100">
            <div class="section-inner">
                <a class="text-none" href="{{하단_중앙배너_link}}" target="_blank" rel="nofollow">                    
                    <img class="d-none md:d-block" src="{{하단_중앙배너_img}}" alt="#">
                    <img class="d-block md:d-none" src="{{하단_중앙배너_img}}" alt="#">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section start -->

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/towninfo/index.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<script>
(function () {
    function normalizeTitle(text) {
        return (text || '')
            .replace(/[<>]/g, '')
            .replace(/\s+/g, ' ')
            .trim();
    }

    function initSidePagedWidget(widget) {
        if (!widget || widget.dataset.pagerReady === '1') return;

        var titleEl = widget.querySelector('.js-side-pager-title');
        var listEl = widget.querySelector('.js-side-pager-list');

        if (!titleEl || !listEl) return;

        var items = Array.prototype.filter.call(listEl.children, function (node) {
            return node.nodeType === 1;
        });

        if (!items.length) return;

        var pageSize = parseInt(widget.getAttribute('data-page-size'), 10) || 7;
        var titleText = normalizeTitle(widget.getAttribute('data-title') || titleEl.textContent);
        var titleUrl = widget.getAttribute('data-title-url') || '#';
        var totalPages = Math.ceil(items.length / pageSize);
        var currentPage = 0;

        titleEl.innerHTML =
            '<span class="side-pager-head">' +
                '<button type="button" class="side-pager-btn js-pager-prev" aria-label="이전">&lt;</button>' +
                '<a class="side-pager-title-link js-pager-title-link" href="' + titleUrl + '"></a>' +
                '<button type="button" class="side-pager-btn js-pager-next" aria-label="다음">&gt;</button>' +
            '</span>';

        var prevBtn = titleEl.querySelector('.js-pager-prev');
        var nextBtn = titleEl.querySelector('.js-pager-next');
        var titleLinkEl = titleEl.querySelector('.js-pager-title-link');

        function render() {
            var start = currentPage * pageSize;
            var end = start + pageSize;

            items.forEach(function (item, index) {
                item.style.display = (index >= start && index < end) ? '' : 'none';
            });

            titleLinkEl.textContent = titleText;

            if (totalPages <= 1) {
                prevBtn.hidden = true;
                nextBtn.hidden = true;
                return;
            }

            prevBtn.hidden = (currentPage === 0);
            nextBtn.hidden = (currentPage === totalPages - 1);
        }

        prevBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentPage > 0) {
                currentPage--;
                render();
            }
        });

        nextBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentPage < totalPages - 1) {
                currentPage++;
                render();
            }
        });

        widget.dataset.pagerReady = '1';
        render();
    }

    function initAllSidePagedWidgets() {
        var widgets = document.querySelectorAll('.js-side-pager');
        Array.prototype.forEach.call(widgets, function (widget) {
            initSidePagedWidget(widget);
        });
    }

    function bootPager() {
        initAllSidePagedWidgets();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootPager);
    } else {
        setTimeout(bootPager, 0);
    }

    window.addEventListener('load', bootPager);
})();
</script>

<!-- INCLUDE FILE '../include/footer.php' -->
