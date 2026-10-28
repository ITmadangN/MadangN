<!-- LOOP START 'T_LOOP' -->
<div>
    <article class="post type-post panel uc-transition-toggle vstack gap-2 border">
                    <div class="post-media panel overflow-hidden">
                        <div class="featured-image bg-gray-25 ratio ratio-3x2">
                            <img class="media-cover image uc-transition-opaque" src="{{T_LOOP.T_IMG}}" data-src="{{T_LOOP.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                        </div>
                        <a href="/realestate/{{T_LOOP.T_LINK}}" class="position-cover"></a>
                    </div>
                    <div class="post-header panel vstack gap-0 p-2 mt-n1">

                        <!--div class="post-title fs-52 m-0 text-truncate-2 fw-semibold">
                            <a class="text-none text-gray-600" href="/realestate/house_view.php">환하고 채광좋은 타운 홈</a>
                        </div-->
                        <div class="fs-7 m-0  text-gray-500" style="height:30px;">
                            <i class="unicon-location-filled"></i> {{T_LOOP.T_UNPARSED_ADDRESS}}
                        </div>
                         <div class="fs-4 m-0 fw-bolder mt-1">
                            ${{T_LOOP.T_LIST_PRICE}}

                        </div>

                         <div class="post-bottom panel hstack gap-1 fs-7 mt-1 text-black text-opacity-70">
                                    {{T_LOOP.T_FEATURE}}
                         </div>
                    </div>
       </article>
</div>
<!-- LOOP END 'T_LOOP' -->