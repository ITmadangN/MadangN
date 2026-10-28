<style>
.post-header .post-bottom .region {font-size:0.7rem;font-family: system-ui;height:12px;margin-top:2px;text-align:right;line-height: 13px;overflow: hidden;color: #888888;}
</style>
<!-- LOOP START 'T_LOOP' -->
<div>
    <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
        <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
            <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                <img class="media-cover image uc-transition-opaque" src="{{T_LOOP.T_IMG}}" data-src="{{T_LOOP.T_IMG}}" alt="image" data-uc-img="loading: lazy">
                <a href="{{T_LOOP.T_LINK}}" class="position-cover" data-caption="image"></a>
            </figure>
        </div>
        <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-12 mt-narrow sm:mt-0 w-100">
            <div class="post-top panel vstack items-start gap-2">
                <div class="post-meta panel fs-7">
                    <div class="post-category hstack gap-narrow fw-semibold text-primary">
                      &nbsp;{{T_LOOP.T_BUSINESS_TYPE}}
                    </div>
                </div>
                <h3 class="post-title fs-7 mt-n1 text-truncate-2 lh-2 hiet-3">
                    <a class="text-none" href="{{T_LOOP.T_LINK}}"><b><{{T_LOOP.T_COMPANY_NAME}}></b> {{T_LOOP.T_TITLE}}</a>
                </h3>
            </div>
            <div class="btline"></div>
            <div class="post-bottom panel gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                <!--div>{{T_LOOP.T_LOCATION}}</div-->
                <div class="region"><i class="fa fa-globe fs-3" aria-hidden="true"></i>&nbsp;{{T_LOOP.T_LOCATION}} </div>
            </div>
        </div>
    </article>
</div>
<!-- LOOP END 'T_LOOP' -->