<!-- LOOP START 'T_LOOP' -->
<div>
    <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900 dark:text-white">
        <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
            <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                <img class="media-cover image uc-transition-opaque" src="{{T_LOOP.T_IMG1}}" data-src="{{T_LOOP.T_IMG1}}" alt="image" data-uc-img="loading: lazy">
                <a href="{{T_LOOP.T_LINK}}" class="position-cover" data-caption="image"></a>
            </figure>
        </div>
        <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-1 mt-narrow sm:mt-0 w-100" >
            <div class="post-top panel vstack items-start gap-1">
                <div class="post-meta panel fs-7">
                    <div class="post-category hstack gap-narrow fw-medium">
                        <a class="text-none  text-truncate-1" href="{{T_LOOP.T_LINK}}"> {{T_LOOP.T_TITLE}} </a>

                    </div>
                </div>
                <h3 class="post-title fs-7 mt-n1 fw-bolder mb-n1 hstack justify-between">
                    <div>{{T_LOOP.T_MARKETPLACE_PRICE}}</div><div> {{T_LOOP.T_CREATED_USER}} </div>
                </h3>
            </div>
            <div class="btline"></div>
            <div class="post-bottom panel hstack gap-0 fs-8 mt-n1 text-black text-opacity-75 justify-end" style="margin-bottom:-2px;">                
                <div><i class="fa fa-globe fs-3" aria-hidden="true"></i> {{T_LOOP.T_TEMP}}</div>
            </div>
        </div>
    </article>
</div>
<!-- LOOP END 'T_LOOP' -->
