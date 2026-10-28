<!-- LOOP START 'T_LOOP' -->
<tr onclick="location.href='{{T_LOOP.T_LINK}}';" style="cursor:pointer;">
    <td>{{T_LOOP.T_NO}}</td>
    <td><img src="{{T_LOOP.T_IMG}}" style="width:60px;"></td>
    <td>{{T_LOOP.T_DEALER_YN}}</td>
    <td>{{T_LOOP.T_CAR_MAKER}}</td>
    <td>{{T_LOOP.T_CAR_MODEL}}</td>
    <td>{{T_LOOP.T_CAR_MILEAGE}}</td>
    <td>{{T_LOOP.T_COMPANY_NAME}}</td>
    <td>{{T_LOOP.T_SELLER_NAME}}</td>
    <td>{{T_LOOP.T_LOCATION}}</td>
    <td>{{T_LOOP.T_CREATE_AT}}</td>
    <td><span class="ecommerce-status  {{T_LOOP.T_ACTIVE_IMG}}">{{T_LOOP.T_IS_ACTIVE}}</span></td>
</tr>
<!-- LOOP END 'T_LOOP' -->