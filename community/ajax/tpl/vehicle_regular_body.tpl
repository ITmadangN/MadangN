<!-- LOOP START 'T_LOOP' -->
<tr>
    <td>
        <div class="image panel w-48px lg:w-72px">
            <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25">
                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{T_LOOP.T_IMG}}" data-src="{{T_LOOP.T_IMG}}" alt="" data-uc-img="loading: lazy">
                <a href="{{T_LOOP.T_LINK}}" class="position-cover" data-caption="{{T_LOOP.T_LINK}}"></a>
            </figure>
        </div>
    </td>
    <td>
        <a href="{{T_LOOP.T_LINK}}" class="text-none">{{T_LOOP.T_CAR_MAKER_PURE}}</a>
    </td>
        <td>
        <span class="price">{{T_LOOP.T_CAR_MODEL}}</span>
    </td>
    <td>
        <span class="price">{{T_LOOP.T_CAR_COLOR}}</span>
    </td>

    <td>
        <span class="subtotal">{{T_LOOP.T_CAR_MILEAGE}} Mile</span>
    </td>
    <td>
        <span class="subtotal">${{T_LOOP.T_LISTING_PRICE}}</span>
    </td>
    <td>
        <span class="subtotal">{{T_LOOP.T_CAR_YEAR}}년식</span>
    </td>
    <td>
        <span class="subtotal"> {{T_LOOP.T_CREATED_USER}}</span>
    </td>
    <td>
        <span class="subtotal">{{T_LOOP.T_CREATED_AT}}</span>
    </td>
</tr>
<!-- LOOP END 'T_LOOP' -->