<style>
.table>:not(caption)>*>* {
    padding: .05rem .05rem;
    background-color: var(--bs-table-bg);
    vertical-align:middle;
    /* border-bottom:1px solid #f5f5f5; */
}

.g-3,
.gy-3 {
    --bs-gutter-y: .5rem;
}
</style>

<style>
.mt-r4 {
    margin-top: -2.0rem !important
}
.mt-r5 {
    margin-top: -2.1rem !important
}
.mt-r6 {
    margin-top: -2.2rem !important
}
</style>

<style>
.youtube-pager-head {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.youtube-pager-btn {
    border: 0;
    background: transparent;
    padding: 0;
    margin: 0;
    font: inherit;
    line-height: 1;
    color: inherit;
    cursor: pointer;
}

.youtube-pager-btn[hidden] {
    display: none !important;
}

.youtube-pager-title {
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


    <div class="mt-1" id="miburiWidget">
        <div class="widget popular-widget vstack gap-2">
            <div class="widget-title mb-1 mt-1">
                <h2 class="fs-5 fw-bold2 m-0" id="miburiTitle">미부리 &gt;</h2>
            </div>

            <div class="mt-n3">
                <article class="post type-post panel">
                    <div class="row child-cols g-2" data-uc-grid>
                        <div class="col-auto mt-1 rsimg">
                            <img src="{{MIBURI_IMG}}" data-src="{{MIBURI_IMG}}" alt="#" data-uc-img="loading: lazy">
                            <a href="#uc-youtube-modal" class="position-cover youtube-trigger text-none hover:text-primary duration-150" data-video-id="{{MIBURI_VIDEO_ID}}" data-uc-toggle></a>
                        </div>
                    </div>
                </article>
            </div><!-- youtube-->  

            <div class="widget-content mt-n1">
                <div class="row child-cols-12 gx-4 gy-3 sep-x" id="miburiList">
                    <!-- LOOP START 'R2_1' -->
                    <div class="uc-first-column">
                        <article class="post type-post panel uc-transition-toggle">
                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                <div class="uc-first-column">
                                    <div class="hstack items-start gap-1">
                                        <span class="h6 fw-bold text-center text-primary m-0 min-w-18px">{{R2_1.T_NUM}}</span>
                                        <div class="post-header panel vstack justify-between gap-1">
                                            <h3 class="post-title fs-7 m-0">
                                                <a href="#uc-youtube-modal" class="youtube-trigger text-none hover:text-primary duration-150 text-truncate-1" data-video-id="{{R2_1.T_VIDEO_ID}}" data-uc-toggle>{{R2_1.T_TITLE}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- LOOP END 'R2_1' -->
                </div>
            </div>
        </div>
    </div><!-- 미부리 -->  


    <div class="mt-1">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-2_link}}" target="_blank"><img src="{{오른쪽-2_img}}" data-src="{{오른쪽-2_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner --> 


    <div class="mt-1" id="nowUsaWidget">
        <div class="widget popular-widget vstack gap-2">
            <div class="widget-title mb-1 mt-1">
                <h2 class="fs-5 fw-bold2 m-0" id="nowUsaTitle">지금 미국 &gt;</h2>
            </div>

            <div class="mt-n3">
                <article class="post type-post panel">
                    <div class="row child-cols g-2" data-uc-grid>
                        <div class="col-auto mt-1 rsimg">
                            <img src="{{NOWUSA_IMG}}" data-src="{{NOWUSA_IMG}}" alt="#" data-uc-img="loading: lazy">
                            <a href="#uc-youtube-modal" class="position-cover youtube-trigger text-none hover:text-primary duration-150" data-video-id="{{NOWUSA_VIDEO_ID}}" data-uc-toggle></a>
                        </div>
                    </div>
                </article>
            </div><!-- youtube-->  

            <div class="widget-content mt-n1">
                <div class="row child-cols-12 gx-4 gy-3 sep-x" id="nowUsaList">
                    <!-- LOOP START 'R2_2' -->
                    <div class="uc-first-column">
                        <article class="post type-post panel uc-transition-toggle">
                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                <div class="uc-first-column">
                                    <div class="hstack items-start gap-1">
                                        <span class="h6 fw-bold text-center text-primary m-0 min-w-18px">{{R2_2.T_NUM}}</span>
                                        <div class="post-header panel vstack justify-between gap-1">
                                            <h3 class="post-title fs-7 m-0 text-truncate-1">
                                                <a href="#uc-youtube-modal" class="youtube-trigger text-none hover:text-primary duration-150 text-truncate-1" data-video-id="{{R2_2.T_VIDEO_ID}}" data-uc-toggle>{{R2_2.T_TITLE}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- LOOP END 'R2_2' -->    
                </div>
            </div>
        </div>
    </div><!-- 지금미국 -->  


    <div class="mt-1">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-3_link}}" target="_blank"><img src="{{오른쪽-3_img}}" data-src="{{오른쪽-3_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner -->  


    <div class="mt-1">
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
    function makeYoutubePager(titleId, listId, titleText, pageSize) {
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
            '<span class="youtube-pager-head">' +
                '<button type="button" class="youtube-pager-btn js-prev" aria-label="이전">&lt;</button>' +
                '<span class="youtube-pager-title js-title"></span>' +
                '<button type="button" class="youtube-pager-btn js-next" aria-label="다음">&gt;</button>' +
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

    function bootYoutubePagers() {
        makeYoutubePager('miburiTitle', 'miburiList', '미부리', 5);
        makeYoutubePager('nowUsaTitle', 'nowUsaList', '지금 미국', 5);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootYoutubePagers);
    } else {
        bootYoutubePagers();
    }

    window.addEventListener('load', bootYoutubePagers);
    setTimeout(bootYoutubePagers, 300);
})();
</script>
