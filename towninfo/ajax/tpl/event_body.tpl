<!-- LOOP START 'T_LOOP' -->
<div>
    <article class="post type-post panel uc-transition-toggle vstack gap-2 border">
        <div class="post-media panel overflow-hidden">
            <div class="featured-image bg-gray-25 ratio ratio-1x1">
                <img class="media-cover image uc-transition-opaque" src="{{T_LOOP.T_IMG}}" data-src="{{T_LOOP.T_IMG}}" alt="#" data-uc-img="loading: lazy">
            </div>
            <a href="{{T_LOOP.T_LINK}}" class="position-cover"></a>
        </div>
        <div class="post-header panel vstack gap-0 p-2 mt-n1 text-center">

            <div class="post-title fs-52 m-0 text-truncate-2 fw-semibold">
                <a class="text-none text-gray-600" href="/towninfo/event_view.php">{{T_LOOP.T_TITLE}}</a>
            </div>
            <div class="fs-7 m-0  text-gray-500">
                <i class="unicon-calendar"></i>  {{T_LOOP.T_EVENT_START_DATE}} ~ {{T_LOOP.T_EVENT_END_DATE}}
            </div>

        </div>
    </article>
</div>
<!-- LOOP END 'T_LOOP' -->