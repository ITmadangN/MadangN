<!-- LOOP START 'T_LOOP' -->
<tr>
    <td>
        <div class="image panel w-48px lg:w-72px">
            <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25">
                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{T_LOOP.T_IMG}}" data-src="{{T_LOOP.T_IMG}}" alt="" data-uc-img="loading: lazy">
                <a href="{{T_LOOP.T_LINK}}" class="position-cover" data-caption="{{T_LOOP.T_LINK}}"></a>
            </figure>
        </div>
    <td>
        {{T_LOOP.T_CATEGORY}}
    </td>

    <td class="text-start">
        <a href="{{T_LOOP.T_LINK}}" class="text-none">{{T_LOOP.T_TITLE}}</a>
    </td>
    <td>
        {{T_LOOP.T_CREATED_USER}}
    </td>
    <td>
        {{T_LOOP.T_CREATE_AT}}
    </td>
    <td>
        {{T_LOOP.T_VIEW_COUNT}}
    </td>

</tr>
<!-- LOOP END 'T_LOOP' -->