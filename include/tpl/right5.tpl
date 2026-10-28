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
</style>

<style>
.reco-pager-head {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.reco-pager-btn {
    border: 0;
    background: transparent;
    padding: 0;
    margin: 0;
    font-size: inherit;
    font-weight: inherit;
    line-height: 1;
    color: inherit;
    cursor: pointer;
}

.reco-pager-btn[hidden] {
    display: none !important;
}

.reco-pager-label {
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


    <div>
        <div class="widget popular-widget vstack gap-2 js-side-pager" data-page-size="6" data-title="추천매물">
            <div class="widget-title mb-1 mt-1">
                <h2 class="fs-5 fw-bold2 m-0 js-side-pager-title">추천매물 &gt;</h2>
            </div>

            <div>
                <article class="post type-post panel">
                    <div class="row child-cols g-2">
                        <div class="col-auto mt-0 rsimg">
                            <a class="text-none" href="{{R_HOUSE_IMG_LINK}}"><img src="{{R_HOUSE_IMG}}"></a>
                        </div>
                    </div>
                </article>
            </div><!-- img-->

            <div class="widget-content">
                <div class="row child-cols-12 gx-4 gy-3 sep-x js-side-pager-list">
                    <!-- LOOP START 'R5' -->
                    <div class="{{R5.T_CSS}}uc-first-column">
                        <article class="post type-post panel uc-transition-toggle">
                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                <div class="uc-first-column">
                                    <div class="hstack items-start gap-1">
                                        <span class="h6 fw-bold text-center text-primary m-0 min-w-18px">{{R5.T_NUM}}</span>
                                        <div class="post-header panel vstack justify-between gap-1">
                                            <h3 class="post-title fs-7 m-0 text-truncate-1">
                                                <a class="text-none hover:text-primary duration-150" href="{{R5.T_LINK}}">{{R5.T_ADDRESS}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- LOOP END 'R5' -->
                </div>
            </div>
        </div>
    </div><!-- 주택추천 -->


    <div class="mt-1">
        <article class="post type-post panel">
            <div class="row child-cols g-2" data-uc-grid>
                <div class="col-auto rsimg">
                    <a href="{{오른쪽-2_link}}" target="_blank"><img src="{{오른쪽-2_img}}" data-src="{{오른쪽-2_img}}" alt="#" data-uc-img="loading: lazy"></a>                    
                </div>
            </div>
        </article>
    </div><!-- banner -->


    <div class="mt-r6">
        <div class="widget popular-widget vstack gap-2">
            <div class="widget-title mb-1 mt-1">
                <h2 class="fs-5 fw-bold2 m-0">모기지 계산법 <i class="fa fa-chevron-right" aria-hidden="true"></i></h2>
            </div>

            <div class="widget-content">
                <!-- Tab start -->
                <div class="product-tabs panel mt-n2">
                    <ul data-uc-tab="connect: #my-car-switcher">
                        <li><a href="#" class="text-none fs-5 fw-semibold">Mortgage</a></li>
                        <li><a href="#" class="text-none fs-5 fw-semibold">Loan</a></li>
                    </ul>

                    <div id="my-car-switcher" class="tabs-content uc-switcher max-w-lg mx-auto mt-n1s">

                        <!-- Tabcontents1 start -->
                        <div>
                            <div id="car_list" class="car_list panel py-1">
                                <div class="section panel overflow-hidden-x">
                                    <div class="section-outer panel">
                                        <div class="max-w-xl">
                                            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">
                                                <div class="block-content panel">
                                                    <div class="row child-cols-12">
                                                        <div>
                                                            <article class="post type-post panel overflow-hidden border border-gray-900 border-opacity-15 text-gray-900 p-2">

                                                                <form class="vstack gap-2" action="">
                                                                    <table class="table align-start m-0 fs-7 fw-bold">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Purchase price:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="688000" id="mor_price"> $
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Down payment:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="20" id="mor_down_payment"> %
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Mortgage term:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="30" id="mor_term"> years
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Interest rate:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="6.65" id="mor_rate"> %
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Property tax:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="12000" id="mor_tax"> $ per year
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Property insurance:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="1200" id="mor_insurance"> $ per year
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">PMI:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="" id="mor_pmi"> %
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">월 페이먼트:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="" id="mor_payment" readonly> $
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot class="sticky-bottom ft-secondary text-dark z-1">
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <button type="button" class="btn btn-md btn-gray-900 text-nowrap w-100" onclick="calculate_mortgage();">Calculate</button>
                                                                                </td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </form>

                                                            </article>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tabcontents1 end -->


                        <!-- Tabcontents2 start -->
                        <div>
                            <div id="car_list2" class="car_list2 panel py-1">
                                <div class="section panel overflow-hidden-x">
                                    <div class="section-outer panel">
                                        <div class="max-w-xl">
                                            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">
                                                <div class="block-content panel">
                                                    <div class="row child-cols-12">
                                                        <div>
                                                            <article class="post type-post panel overflow-hidden border border-gray-900 border-opacity-15 text-gray-900 p-2">

                                                                <form class="vstack gap-2" action="">
                                                                    <table class="table align-start m-0 fs-7 fw-bold">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Loan amount:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="" id="loan_amount"> $
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Loan term:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="15" id="loan_year"> years
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">Interest rate:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="4.5" id="loan_rate"> %
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width:110px !important;">월 페이먼트:</td>
                                                                                <td>
                                                                                    <input class="form-control form-control-sm w-64px fs-7 bg-white" type="text" value="" id="loan_payment" readonly> $
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot class="sticky-bottom ft-secondary text-dark z-1">
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <button type="button" class="btn btn-md btn-gray-900 text-nowrap w-100" onclick="calculate_loan();">Calculate</button>
                                                                                </td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </form>

                                                            </article>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tabcontents2 end -->

                    </div>
                </div>
                <!-- Tab end -->
            </div>
        </div>
    </div><!-- 모기지 계산법 end -->


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
                    <a href="{{오른쪽-6_link}}" target="_blank"><img src="{{오른쪽_6_img}}" data-src="{{오른쪽-6_img}}" alt="#" data-uc-img="loading: lazy"></a>
                </div>
            </div>
        </article>
    </div><!-- banner -->

</div>

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

        var pageSize = parseInt(widget.getAttribute('data-page-size'), 10) || 6;
        var titleText = normalizeTitle(widget.getAttribute('data-title') || titleEl.textContent);
        var totalPages = Math.ceil(items.length / pageSize);
        var currentPage = 0;

        titleEl.innerHTML =
            '<span class="reco-pager-head">' +
                '<button type="button" class="reco-pager-btn js-pager-prev" aria-label="이전">&lt;</button>' +
                '<span class="reco-pager-label"></span>' +
                '<button type="button" class="reco-pager-btn js-pager-next" aria-label="다음">&gt;</button>' +
            '</span>';

        var prevBtn = titleEl.querySelector('.js-pager-prev');
        var nextBtn = titleEl.querySelector('.js-pager-next');
        var labelEl = titleEl.querySelector('.reco-pager-label');

        function render() {
            var start = currentPage * pageSize;
            var end = start + pageSize;

            items.forEach(function (item, index) {
                item.style.display = (index >= start && index < end) ? '' : 'none';
            });

            labelEl.textContent = titleText;

            if (totalPages <= 1) {
                prevBtn.hidden = true;
                nextBtn.hidden = true;
                return;
            }

            prevBtn.hidden = (currentPage === 0);
            nextBtn.hidden = (currentPage === totalPages - 1);
        }

        prevBtn.addEventListener('click', function () {
            if (currentPage > 0) {
                currentPage--;
                render();
            }
        });

        nextBtn.addEventListener('click', function () {
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
