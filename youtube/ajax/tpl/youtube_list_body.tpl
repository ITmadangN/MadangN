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

                <h3 class="post-title h6 m-0 text-truncate-2 fw-semibold" style="height:40px">
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