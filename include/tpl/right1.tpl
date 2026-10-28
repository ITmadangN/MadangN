<style>
.table>:not(caption)>*>* {
    padding: .05rem .05rem;
    background-color: var(--bs-table-bg);
    vertical-align: middle;
    /* border-bottom:1px solid #f5f5f5; */
}

.g-3,
.gy-3 {
    --bs-gutter-y: .5rem;
}
</style>

<style>
.mt-r4 {
    margin-top: -2.0rem !important;
}
.mt-r5 {
    margin-top: -2.1rem !important;
}
.mt-r6 {
    margin-top: -2.2rem !important;
}

.uc-grid-stack2 > div {
    margin-top: 10px !important;
}

.post2.type-post {
    margin-bottom: 3px !important;
    padding-bottom: 0px !important;
}
</style>

<style>
.news-pager-head {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.news-pager-btn {
    border: 0;
    background: transparent;
    padding: 0;
    margin: 0;
    font: inherit;
    line-height: 1;
    color: inherit;
    cursor: pointer;
}

.news-pager-btn[hidden] {
    display: none !important;
}

.news-pager-title {
    display: inline-block;
}
</style>

<div class="lg:col-3">

    <div>
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-1_link}}" target="_blank"><img src="{{오른쪽-1_img}}" data-src="{{오른쪽-1_img}}" alt="#" data-uc-img="loading: lazy"></a>                                        
                </div>
            </div>
        </article>
    </div><!-- banner -->


    <div class="mt-1" id="mostNewsWidget">
        <div class="widget popular-widget vstack">
            <div class="widget-title mb-1 mt-1">
                <h2 class="fs-5 fw-bold2 m-0" id="mostNewsTitle">가장 많이 본 뉴스 &gt;</h2>
            </div>
            <div class="widget-content">
                <div class="row child-cols-12 gx-4 gy-3 sep-x" id="mostNewsList">
                    <!-- LOOP START 'R1_1' -->
                    <div class="uc-first-column">
                        <article class="post type-post panel uc-transition-toggle">
                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                <div class="uc-first-column">
                                    <div class="hstack items-start gap-1">
                                        <span class="h5 lg:h5 fw-bold fst-italic text-center text-primary m-0 min-w-24px">{{R1_1.T_NUM}}</span>
                                        <div class="post-header panel vstack justify-between gap-1">
                                            <h3 class="post-title fs-7 m-0 text-truncate-1">
                                                <a class="text-none hover:text-primary duration-150" href="{{R1_1.T_LINK}}">{{R1_1.T_TITLE}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- LOOP END 'R1_1' -->
                </div>
            </div>
        </div>
    </div><!-- popular -->


    <div class="mt-1">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-2_link}}" target="_blank"><img src="{{오른쪽-2_img}}" data-src="{{오른쪽-2_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner -->


    <div class="mt-1" id="latestNewsWidget">
        <div class="widget popular-widget vstack">
            <div class="widget-title mb-1 mt-1">
                <h2 class="fs-5 fw-bold2 m-0" id="latestNewsTitle">최신뉴스 &gt;</h2>
            </div>
            <div class="widget-content">
                <div class="row child-cols-12 gx-4 gy-3 sep-x" id="latestNewsList">
                    <!-- LOOP START 'R1_2' -->
                    <div class="uc-first-column">
                        <article class="post type-post panel uc-transition-toggle">
                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                <div class="uc-first-column">
                                    <div class="hstack items-start gap-3">
                                        <div class="post-header panel vstack justify-between gap-1">
                                            <h3 class="post-title fs-7 m-0 text-truncate-1">
                                                <a class="text-none hover:text-primary duration-150" href="{{R1_2.T_LINK}}">{{R1_2.T_TITLE}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- LOOP END 'R1_2' -->
                </div>
            </div>
        </div>
    </div><!-- latest -->


    <div class="mt-n1">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-3_link}}" target="_blank"><img src="{{오른쪽-3_img}}" data-src="{{오른쪽-3_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner -->


    <div class="block-layout panel mt-1">
        <div class="block-content">
            <div class="row child-cols-12 g-2 sep-x uc-grid uc-grid-stack2" data-uc-grid="">
                <!-- LOOP START 'R1_3' -->
                <div class="uc-first-column">
                    <article class="post2 type-post panel uc-transition-toggle">
                        <div class="row child-cols g-2 lg:g-2 uc-grid" data-uc-grid="">
                            <div class="uc-first-column">
                                <div class="post-header panel vstack justify-between gap-1">
                                    <h3 class="post-title fs-7 m-1 text-truncate-2">
                                        <a class="text-none hover:text-primary duration-150" href="{{R1_3.T_LINK}}">{{R1_3.T_TITLE}}</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-auto rsimg">
                                <div class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                    <div class="featured-image bg-gray-25 ratio ratio-4x3">
                                        <img class="media-cover image uc-transition-opaque" src="{{R1_3.T_IMG}}" data-src="{{R1_3.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                    </div>
                                    <a href="{{R1_3.T_LINK}}" class="position-cover"></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- LOOP END 'R1_3' -->
            </div>
        </div>
    </div>

    <div class="mt-2">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-4_link}}" target="_blank"><img src="{{오른쪽-4_img}}" data-src="{{오른쪽-4_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner -->


    <div class="mt-1">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-5_link}}" target="_blank"><img src="{{오른쪽-5_img}}" data-src="{{오른쪽-5_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner -->


    <div class="mt-1">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-6_link}}" target="_blank"><img src="{{오른쪽-6_img}}" data-src="{{오른쪽-6_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner -->

</div>

<script>
(function () {
    function makePager(titleId, listId, titleText, pageSize) {
        var titleEl = document.getElementById(titleId);
        var listEl = document.getElementById(listId);

        if (!titleEl || !listEl) return;

        var items = Array.prototype.filter.call(listEl.children, function (node) {
            return node.nodeType === 1;
        });

        if (!items.length) return;

        var currentPage = 0;
        var totalPages = Math.ceil(items.length / pageSize);

        titleEl.innerHTML =
            '<span class="news-pager-head">' +
                '<button type="button" class="news-pager-btn js-prev" aria-label="이전">&lt;</button>' +
                '<span class="news-pager-title js-title"></span>' +
                '<button type="button" class="news-pager-btn js-next" aria-label="다음">&gt;</button>' +
            '</span>';

        var prevBtn = titleEl.querySelector('.js-prev');
        var nextBtn = titleEl.querySelector('.js-next');
        var titleSpan = titleEl.querySelector('.js-title');

        function render() {
            var start = currentPage * pageSize;
            var end = start + pageSize;

            items.forEach(function (item, index) {
                item.style.display = (index >= start && index < end) ? '' : 'none';
            });

            titleSpan.textContent = titleText;

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

        render();
    }

    function bootNewsPager() {
        makePager('mostNewsTitle', 'mostNewsList', '가장 많이 본 뉴스', 5);
        makePager('latestNewsTitle', 'latestNewsList', '최신뉴스', 5);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootNewsPager);
    } else {
        bootNewsPager();
    }

    window.addEventListener('load', bootNewsPager);
})();
</script>
