<!-- LOOP START 'T_LOOP' -->
<tr onclick="location.href='{{T_LOOP.T_LINK}}';" style="cursor:pointer;">
    <td>{{T_LOOP.T_NO}}</td>
    <td>{{T_LOOP.T_COMPANY_NAME}}</td>
    <td>{{T_LOOP.T_USEWD_TYPE}}</td>
    <td>{{T_LOOP.T_CONTACT_NAME}}</td>
    <td>{{T_LOOP.T_CONTACT_EMAIL}}</td>
    <td>{{T_LOOP.T_CONTACT_PHONE}}</td>
    <td>{{T_LOOP.T_COMPANY_ADDRESS}}</td>
    <td>{{T_LOOP.T_CREATE_AT}}</td>
    <td><span class="ecommerce-status  {{T_LOOP.T_ACTIVE_IMG}}">{{T_LOOP.T_IS_ACTIVE}}</span></td>
</tr>
<!-- LOOP END 'T_LOOP' -->
<!--
<td><a href="{{T_LOOP.T_LINK}}"><strong>{{T_LOOP.T_COMPANY_NAME}}</strong></a></td>
-->