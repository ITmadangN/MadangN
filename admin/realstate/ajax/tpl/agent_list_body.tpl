<!-- LOOP START 'T_LOOP' -->
<tr onclick="location.href='{{T_LOOP.T_LINK}}';" style="cursor:pointer;">
    <td>{{T_LOOP.T_NO}}</td>
    <td><img src="{{T_LOOP.T_IMG}}" style="width:100px;"></td>
    <td>{{T_LOOP.T_AGENT_FULL_NAME}}</td>    
    <td><strong>{{T_LOOP.T_SPECIALIZED_FIELD}}</strong></td>
    <td>{{T_LOOP.T_AGENT_DRE_LICENSE}}</td>
    <td>{{T_LOOP.T_AGENT_PHONE}}</td>
    <td>{{T_LOOP.T_OFFICE_NAME}}</td>
    <td>{{T_LOOP.T_IS_PREMINUM_AGENT}}</td>
    <td>{{T_LOOP.T_HAS_ACTIVE_LISTINGS}}</td>
    <td><span class="ecommerce-status  {{T_LOOP.T_ACTIVE_IMG}}">{{T_LOOP.T_IS_ACTIVE}}</span></td>
</tr>
<!-- LOOP END 'T_LOOP' -->