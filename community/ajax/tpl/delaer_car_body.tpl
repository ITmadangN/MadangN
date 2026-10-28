<!-- LOOP START 'T_LP' -->
<div>
    <article
                                        class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque" src="{{T_LP.T_IMG}}"
                                                 data-src="{{T_LP.T_IMG}}" alt="image" data-uc-img="loading: lazy">
                                            <a href="{{T_LP.T_LINK}}" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 p-0 sm:p-1 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-1">
                                            <div class="post-meta panel fs-6">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2">
                                                    <a class="text-none fw-bold hiet-22"
                                                       href="{{T_LP.T_LINK}}">{{T_LP.T_CAR_YEAR_PURE}} {{T_LP.T_CAR_MAKER}} {{T_LP.T_CAR_MODEL}}</a>
                                                 </div>
                                            </div>
                                            
                                        </div>
                                        <div class="post-bottom fs-8 fw-medium mt-n1 text-black text-opacity-75">
                                            <div>{{T_LP.T_CAR_MAKER_PURE}} {{T_LP.T_CAR_MODEL}}</div>
                                            <div class="text-truncate-1">{{T_LP.T_CAR_YEAR}}년식 {{T_LP.T_CAR_MILEAGE}} mile {{T_LP.T_FUEL_TYPE}}</div>
                                            <div class="text-truncate-1">{{T_LP.T_COMPANY_NAME}} {{T_LP.T_CREATE_AT}}</div>
                                        </div>

                     <div class="mb-n22"><h3 class="post-title fs-7 fw-bolder">
                                               <span class="carblue"> ${{T_LP.T_LISTING_PRICE}}</span>
                                            </h3>
                       </div>
                                    </div>
                                </article>
</div>
<!-- LOOP END 'T_LP' -->