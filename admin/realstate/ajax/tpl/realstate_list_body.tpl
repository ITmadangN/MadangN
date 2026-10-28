<!-- LOOP START 'T_LOOP' -->
<tr onclick="location.href='{{T_LOOP.T_LINK}}';" style="cursor:pointer;">
    <td>{{T_LOOP.T_NO}}</td>
    <td><img src="{{T_LOOP.T_IMG}}" style="width:150px;"></td>
    <td>{{T_LOOP.T_PROPERTY_TYPE}}</td>    
    <td><strong>{{T_LOOP.T_LOCATION}}</strong></td>
    <td>{{T_LOOP.T_LIST_PRICE}}</td>
    <td>{{T_LOOP.T_BEDROOMS_TOTAL}}</td>
    <td>{{T_LOOP.T_BATHROOMS_TOTAL}}</td>
    <td>{{T_LOOP.T_YEAR_BUILT}}</td>
    
    <td>{{T_LOOP.T_CREATE_AT}}</td>
    <td><span class="ecommerce-status ">{{T_LOOP.T_IS_ACTIVE}}</span></td>
</tr>
<!-- LOOP END 'T_LOOP' -->