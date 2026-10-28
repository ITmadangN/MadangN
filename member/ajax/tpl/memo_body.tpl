                                    <!-- LOOP START 'T_LOOP' -->
                                        <tr>
                                            <td class="text-center">
                                              {{T_LOOP.T_NO}}
                                            </td>  
                                            <td class="text-center">
                                              {{T_LOOP.T_TYPE}}
                                            </td>                                          
                                             <td class="text-start">
                                                <a href="#uc-memoview-modal" data-uc-toggle class="text-none" onclick="GO_MEMO_VIEW({{T_LOOP.T_ID}});">{{T_LOOP.T_TITLE}}</a>
                                            </td>
                                            <td class="text-center">
                                               {{T_LOOP.T_CREATED_USER}}  
                                            </td>
                                            <td class="text-center">
                                               {{T_LOOP.T_CREATE_AT}}
                                            </td>                                            
                                        </tr>
                                    <!-- LOOP END 'T_LOOP' -->