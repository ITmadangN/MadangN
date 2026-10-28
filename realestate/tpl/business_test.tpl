<!-- INCLUDE FILE '../include/header.php' -->

<div class="section panel overflow-hidden mt-n2">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-2">
                <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-2">
                    <h2 class="h5 fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                        <a class="text-none hover:text-primary duration-150" href="#">사업체</a>
                    </h2>
                </div>

                <!-- 검색 Start -->

                              <div class="mb-3 bg-gray-25 p-2 rounded">
                                   <form name="" action="" method="post">
                                   <input type="hidden" name="s_property_type" id="s_property_type" value="Business">
                                   <input type="hidden" name="php_view" id="php_view" value="business_view">
                                     <div class="hstack items-start justify-between gap-1 mb-1" style="flex-wrap: wrap;">
                                         <select class="form-select rounded p-12 w-50pro2 fs-6 text-gray-400" name="s_state_code" id="s_state_code" onchange="GET_CITY_NAME();">
                                                {{S_SELECT_STATE_CODE}}
                                          </select>
                                        
                                          <select class="js-example-basic-multiple fs-6 w-60pro" name="s_city_name[]" id="s_city_name" multiple="multiple">
                                               {{S_SELECT_CITY_NAME}}
                                          </select>  
                                        <div class="w-276 d-flex items-start justify-between"> 
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="최대가격" id="s_min_price"> ~
                                            <input class="form-control form-control-sm h-40px fs-6 bg-white w-128px" type="text" placeholder="최소가격" id="s_max_price">
                                        
                                       </div>


                                            
                                            <select class="form-select rounded p-12 w-33pro fs-6 text-gray-400" id="s_property_type" name="s_property_type" onchange="GET_PROPERTY_TYPE_SUB();">
                                                {{S_SELECT_PROPERTY_TYPE}}
                                            </select>
                                            <select class="form-select rounded p-12 w-33pro fs-6 text-gray-400" id="s_property_sub_type" name="s_property_sub_type">
                                                {{S_SELECT_PROPERTY_SUB_TYPE}}
                                             </select>
                                                <button class="btn btn-primary btn-sm w-15pro tds" onclick="GET_PAGE();" type="button">검색</button>
                                           </div>
                                      
                                     </form>

                              </div> <!-- 검색 End -->
                              
                

                <div class="section-content">
                    <div class="row child-cols-12 md:child-cols-6 lg:child-cols-4 g-2 gy-2" id="result_html"></div>
                </div>
                <div id="result_pagging"></div>
            </div>
        </div>
    </div>
</div>

<script>
var g_page = {{G_PAGE}};
</script>

<!-- ★ defer 제거 → jQuery 먼저 동기 로드 -->
<script src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/realestate/realestate_test.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>

<style>
.dropdown-item {
    padding: 8px 12px;
    font-size: 14px;
    cursor: pointer;
    color: #333;
}
.dropdown-item:hover,
.dropdown-item.active {
    background: #f5f5f5;
}
.dropdown-item.selected {
    color: #0d6efd;
    font-weight: 500;
}
.dropdown-empty {
    padding: 10px 12px;
    font-size: 14px;
    color: #999;
    text-align: center;
}
</style>

<script>

var CITIES = ["서울", "부산", "대구", "경기", "수원", "마산", "성남"];

let selectedCity = null;

// 검색어 하이라이트
function highlight(text, q) {
    if (!q) return text;
    var idx = text.toLowerCase().indexOf(q.toLowerCase());
    if (idx < 0) return text;
    return text.slice(0, idx)
        + '<mark style="background:rgba(13,110,253,0.15);color:inherit;border-radius:2px">'
        + text.slice(idx, idx + q.length)
        + '</mark>'
        + text.slice(idx + q.length);
}

// 드롭다운 렌더링
function renderDropdown(query) {
    var $drop = $('#city-drop');
    var filtered = CITIES.filter(function(c) {
        return c.toLowerCase().indexOf(query.toLowerCase()) >= 0;
    });

    if (!filtered.length) {
        $drop.html('<div class="dropdown-empty">검색 결과 없음</div>');
        return;
    }

    var html = filtered.slice(0, 80).map(function(c) {
        var hl  = highlight(c, query);
        var sel = (c === selectedCity) ? ' selected' : '';
        return '<div class="dropdown-item' + sel + '" data-city="' + c + '">' + hl + '</div>';
    }).join('');

    $drop.html(html);
}

$(document).ready(function() {

    // 입력 이벤트
    $('#city-input')
        .on('input', function() {
            renderDropdown($(this).val());
            $('#city-drop').show();
        })
        .on('focus', function() {
            renderDropdown($(this).val());
            $('#city-drop').show();
        });

    // 도시 선택
    $('#city-drop').on('mousedown', '.dropdown-item', function() {
        selectedCity = $(this).data('city');
        $('#city-input').val(selectedCity);
        $('#s_city_name').val(selectedCity); // hidden input에도 저장
        $('#city-drop').hide();
    });

    // 외부 클릭 시 닫기
    $(document).on('click', function(e) {
        if ($('#city-box').has(e.target).length === 0) {
            $('#city-drop').hide();
        }
    });

});
</script>

<!-- INCLUDE FILE '../include/footer.php' -->