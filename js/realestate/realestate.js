
function GO_PAGE(page) {

    g_page = page;
    GET_PAGE();

}


function processData(city) {
    
    let cleanCity = city.trim();
    
    if (cleanCity.includes(',')) {
    
        return cleanCity.split(',').map(item => item.trim());
    } 
    
    else {
        return cleanCity;
    }
}

function DT_PAGE(state,city) {
   
   let nynj = "N"; 
   if(state == "NYNJ") { state = "NY"; nynj = 'Y' }
   
   $("#s_state_code").val(state); 
   
   GET_CITY_NAME();
   
   if(city == '') $('#s_city_name').val(null).trigger('change');
   else { 
       let temp_city = processData(city);       
       $('#s_city_name').val(temp_city).trigger('change');

   }
   
//   $('#s_city_name').val(null).trigger('change');
    
   GET_PAGE(state,city, nynj);
              
}

function GET_PAGE(state,city,nynj) {

    let city_name = '';
    let s_state_code = '';
    
    if(state === undefined) {
        city_name = GET_CITYNAME();        
        s_state_code = $("#s_state_code").val();
        nynj = '';
    }
    else {        
        city_name = city;
        s_state_code = state;               
    }
    

    let s_menu = $("#s_menu").val();
    let s_property_type = $("#s_property_type").val();
    let s_property_sub_type = $("#s_property_sub_type").val();
    
    let s_listing_price_start = $("#s_min_price").val();
    let s_listing_price_end = $("#s_max_price").val();
    
    s_listing_price_start = s_listing_price_start.replace(/,/g, '');
    s_listing_price_end = s_listing_price_end.replace(/,/g, '');
        
    
    let s_bedrooms_total = $("#s_bedrooms_total").val();
    let s_bathrooms_total = $("#s_bathrooms_total").val();
    let php_view = $("#php_view").val();
    let s_cnt = $("#s_cnt").val();
    
    Cookies.set('page', g_page, { expires: 1 });
    
    Cookies.set('s_property_type', s_property_type, { expires: 1 });
    Cookies.set('s_menu', s_menu, { expires: 1 });
    Cookies.set('s_property_sub_type', s_property_sub_type, { expires: 1 });
    Cookies.set('s_state_code', s_state_code, { expires: 1 });
    Cookies.set('s_city_name', city_name, { expires: 1 });
    Cookies.set('s_listing_price_start', s_listing_price_start, { expires: 1 });
    Cookies.set('s_listing_price_end', s_listing_price_end, { expires: 1 });
    Cookies.set('s_bedrooms_total', s_bedrooms_total, { expires: 1 });
    Cookies.set('s_bathrooms_total', s_bathrooms_total, { expires: 1 });
    Cookies.set('php_view', php_view, { expires: 1 });
    Cookies.set('s_cnt', s_cnt, { expires: 1 });    


    $.ajax({
        url : '/realestate/ajax/ajax_realestate.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "realestate_list",
            page : g_page,
            s_menu : s_menu,
            s_property_type : s_property_type,
            s_property_sub_type : s_property_sub_type,
            s_state_code : s_state_code,
            s_city_name : city_name,
            s_listing_price_start : s_listing_price_start,
            s_listing_price_end : s_listing_price_end,
            s_bedrooms_total : s_bedrooms_total,
            s_bathrooms_total : s_bathrooms_total,
            php_view : php_view,
            s_cnt : s_cnt,
            s_nynj : nynj
        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html = json_data.items.item;                
                let pagging = json_data.pagging;

                $("#result_html").html(html);
                $("#result_pagging").html(pagging);
                


              //  $("#result_navigation_text").html(navigation_text);              

            }


        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            var err=JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete:function(){
        }
    });

}

function GET_CITY_NAME() {

    let s_state_code = $("#s_state_code").val();

    if(s_state_code == '-1') return;

    $.ajax({
        url : '/community/ajax/ajax_business.php',
        type : 'GET',
        dataType : "text",
        async: false,
        data : {
            ac : "select_one_city_name",
            s_state_code : s_state_code

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let select_city_name = json_data.items.item;

                $("#s_city_name").html(select_city_name);
                
                $('.js-example-basic-multiple').select2({
                    placeholder: "도시",
                    allowClear: true 
                });


            }


        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            var err=JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete:function(){
        }
    });
}

function GET_PROPERTY_TYPE_SUB() {

    let s_property_type = $("#s_property_type").val();

    if(s_property_type == '-1') return;

    $.ajax({
        url : '/realestate/ajax/ajax_realestate.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "select_one_property_type_sub",
            s_property_type : s_property_type

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let select_s_property_type_sub = json_data.items.item;

                $("#s_property_sub_type").html(select_s_property_type_sub);                              

            }


        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            var err=JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete:function(){
        }
    });
}

function GET_CITYNAME() {

    let city_name = $("#s_city_name").val();    
    
    let temp_city_name = '';
    // city_name = [...document.querySelectorAll('input[name="city_name[]"]:checked')].map(el => el.value).join(',');
        
    temp_city_name = city_name ? city_name.join(',') : '';
    
    
    return temp_city_name;

}

$(document).ready(function() {

//    cityNameDisplay();
//    cityNameDisplayCouunt();

    $('.js-example-basic-multiple').select2({
        placeholder: "도시",
        allowClear: true
    });


     $('#s_min_price').mask('000,000,000', {reverse: true});
     $('#s_max_price').mask('000,000,000', {reverse: true});

     let temp_city_name = Cookies.get('s_city_name');

     if(temp_city_name != "" && temp_city_name != undefined) {

         let t_city_name = temp_city_name.split(',');

         $('.js-example-basic-multiple').val(t_city_name).trigger('change');

     }

     GO_PAGE(g_page);

    /*
    $('#s_min_price').maskMoney({
        prefix: '$ ',
        thousands: ',',
        precision: 0 // 원화는 소수점 제외
    });
    */
// [이 위치에 추가]
//     checkPopupParam();
});

// $(document).ready(function() {
//
//     $('.js-example-basic-multiple').select2({
//         placeholder: "도시",
//         allowClear: true
//     });
//
//     $('#s_min_price').mask('000,000,000', {reverse: true});
//     $('#s_max_price').mask('000,000,000', {reverse: true});
//
//     const urlParams = new URLSearchParams(window.location.search);
//     const paramCity = urlParams.get('s_city_name');
//     const paramState = urlParams.get('s_state');
//
//     // [추가] 주(State) 파라미터가 넘어온 경우 드롭다운 자동 선택
//     if (paramState) {
//         // 기존 페이지의 주(State) select box ID에 맞춰 선택 (예: #s_state)
//         var $stateSelect = $('#s_state_code, select[name="s_state_code"]');
//         if ($stateSelect.length > 0) {
//             // 1) value 값으로 먼저 매칭 시도
//             $stateSelect.val(paramState);
//
//             // 2) value가 약어(CA)로 되어 있고 넘어온 값이 풀네임(California)인 경우 텍스트로 매칭
//             if (!$stateSelect.val()) {
//                 $stateSelect.find('option').each(function() {
//                     if ($(this).text().trim().toLowerCase() === paramState.toLowerCase() ||
//                         $(this).val().toLowerCase() === paramState.toLowerCase()) {
//                         $stateSelect.val($(this).val());
//                     }
//                 });
//             }
//             $stateSelect.trigger('change');
//         }
//     }
//
//     // [기존 보완] 도시 파라미터가 넘어온 경우 Select2 자동 선택
//     // if (paramCity) {
//     //     if ($('.js-example-basic-multiple').find("option[value='" + paramCity + "']").length === 0) {
//     //         var newOption = new Option(paramCity, paramCity, true, true);
//     //         $('.js-example-basic-multiple').append(newOption).trigger('change');
//     //     } else {
//     //         $('.js-example-basic-multiple').val([paramCity]).trigger('change');
//     //     }
//     //
//     //     GO_PAGE(1);
//     // } else {
//     //     // 파라미터가 없을 때는 기존 쿠키 방식 유지
//     //     let temp_city_name = Cookies.get('s_city_name');
//     //     if(temp_city_name != "" && temp_city_name != undefined) {
//     //         let t_city_name = temp_city_name.split(',');
//     //         $('.js-example-basic-multiple').val(t_city_name).trigger('change');
//     //     }
//     //     GO_PAGE(g_page);
//     // }
//     if (paramCity) {
//         // 쉼표로 구분된 도시 문자열을 배열로 분리 (예: ["Orange", "Anaheim", "Santa Ana"])
//         var cityList = paramCity.split(',').map(function(c) { return c.trim(); }).filter(Boolean);
//
//         cityList.forEach(function(cName) {
//             // 기존 select 옵션에 해당 도시가 없으면 새로 추가
//             if ($('.js-example-basic-multiple').find('option').filter(function() { return $(this).val() === cName; }).length === 0) {
//                 var newOption = new Option(cName, cName, true, true);
//                 $('.js-example-basic-multiple').append(newOption);
//             }
//         });
//
//         // 배열 형태로 한 번에 선택 적용 후 change 이벤트 발생
//         $('.js-example-basic-multiple').val(cityList).trigger('change');
//
//         GO_PAGE(1);
//     } else {
//         // 파라미터가 없을 때는 기존 쿠키 방식 유지
//         let temp_city_name = Cookies.get('s_city_name');
//         if(temp_city_name != "" && temp_city_name != undefined) {
//             let t_city_name = temp_city_name.split(',');
//             $('.js-example-basic-multiple').val(t_city_name).trigger('change');
//         }
//         GO_PAGE(g_page);
//     }
//
//
//     // checkPopupParam();
// });


//
// // =========================================================
// // 부동산 통합 검색 팝업 제어 함수
// // =========================================================
// window.reCurrentCategory = '주택';
// // 자동 위치 찾기 차단 플래그 (클리어 버튼을 누르면 true로 전환)
// var reBlockAutoLocation = false;
// var reIsLocationCancelled = false;
// // URL의 ?popup=y 감지하여 팝업 실행
// function checkPopupParam() {
//     var urlParams = new URLSearchParams(window.location.search);
//     if (urlParams.get('popup') === 'y') {
//         openREModal();
//
//         // 주소창에서 ?popup=y 제거 (새로고침 시 재노출 방지)
//         if (window.history && window.history.replaceState) {
//             var cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
//             window.history.replaceState({path: cleanUrl}, '', cleanUrl);
//         }
//     }
// }
//
//
// function openREModal() {
//     var modal = document.getElementById('realEstateModal');
//     if (modal) {
//         modal.style.display = 'block';
//     }
//
//     // 입력창이 비어 있고 && 사용자가 클리어(×) 버튼을 누른 적이 없을 때만 자동 위치 조회
//     var currentVal = $('#reSearchInput').val().trim();
//     if (currentVal === '' && !reBlockAutoLocation) {
//         if (typeof getCurrentLocation === 'function') {
//             getCurrentLocation();
//         }
//     }
// }
// // 팝업 닫기
// function closeREModal() {
//     var modal = document.getElementById('realEstateModal');
//     if (modal) modal.style.display = 'none';
// }
//
// // 배경 클릭 시 닫기
// window.addEventListener('click', function(event) {
//     var modal = document.getElementById('realEstateModal');
//     if (modal && event.target === modal) closeREModal();
// });
//
// // 탭 전환
// function switchTab(btnElement, categoryName) {
//     window.reCurrentCategory = categoryName;
//     var btns = document.querySelectorAll('.re-tab-btn');
//     btns.forEach(function(b) { b.classList.remove('active'); });
//     if (btnElement) btnElement.classList.add('active');
//
//     var subMenu = document.getElementById('subCategoryArea');
//     if (subMenu) {
//         subMenu.style.display = (categoryName === '커머셜' || categoryName === '사업체') ? 'flex' : 'none';
//     }
// }
//
// // 내 위치 자동 가져오기
// function getCurrentLocation() {
//     var input = document.getElementById('reSearchInput');
//     if (!input) return;
//     input.placeholder = "현재 위치 찾는 중...";
//
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(
//             function(position) {
//                 fetch('https://nominatim.openstreetmap.org/reverse?lat=' + position.coords.latitude + '&lon=' + position.coords.longitude + '&format=json')
//                     .then(function(res) { return res.json(); })
//                     .then(function(data) {
//                         var city = data.address.city || data.address.town || data.address.county || "";
//                         var state = data.address.state || "";
//                         var postcode = data.address.postcode || "";
//                         input.value = (city || postcode) ? ((postcode ? postcode + ', ' : '') + city + (state ? ', ' + state : '')) : "90623, La Palma, CA";
//                     })
//                     .catch(function() { input.value = "90623, La Palma, CA"; });
//             },
//             function() { input.value = "90623, La Palma, CA"; }
//         );
//     } else {
//         input.value = "90623, La Palma, CA";
//     }
// }
//
// // 1. 클리어(×) 버튼 클릭 시: 이벤트 전파 차단 + 자동 위치 찾기 영구 중지
// function clearSearchInput(e) {
//     // 부모 요소로 클릭 이벤트가 퍼져서 openREModal이 다시 실행되는 것을 차단
//     if (e) {
//         e.preventDefault();
//         e.stopPropagation();
//     }
//     if (window.event) {
//         window.event.cancelBubble = true;
//     }
//
//     reIsLocationCancelled = true;
//     reBlockAutoLocation = true; // 사용자가 직접 지웠으므로 자동 GPS 실행 금지
//
//     var $input = $('#reSearchInput');
//     $input.val('');
//     $input.attr('placeholder', '우편번호, 도시 또는 주 입력');
//     $input.focus();
// }
//
// async function getNearbyCities(lat, lon, radiusMiles, baseCity) {
//     var citySet = new Set();
//     if (baseCity) citySet.add(baseCity.trim());
//
//     if (!radiusMiles || radiusMiles <= 0 || !lat || !lon) {
//         return Array.from(citySet);
//     }
//
//     // miles를 meters로 변환 (1 mile = 1609.34 meters)
//     var radiusMeters = Math.round(radiusMiles * 1609.34);
//     var query = `[out:json][timeout:15];(node["place"~"city|town"](around:${radiusMeters},${lat},${lon}););out body;`;
//
//     // Overpass 메인 서버가 느리거나 막힐 경우 대비한 백업 서버 목록
//     var endpoints = [
//         'https://overpass-api.de/api/interpreter',
//         'https://overpass.kumi.systems/api/interpreter'
//     ];
//
//     for (var i = 0; i < endpoints.length; i++) {
//         try {
//             const res = await fetch(endpoints[i] + '?data=' + encodeURIComponent(query));
//             if (res.ok) {
//                 const data = await res.json();
//                 if (data.elements && data.elements.length > 0) {
//                     data.elements.forEach(function(el) {
//                         if (el.tags && el.tags.name) {
//                             citySet.add(el.tags.name.trim());
//                         }
//                     });
//                     break; // 성공하면 루프 종료
//                 }
//             }
//         } catch (e) {
//             console.warn("Overpass 서버 재시도 중:", endpoints[i], e);
//         }
//     }
//
//     return Array.from(citySet);
// }
//
// // 2. 미국 주 풀네임 -> 2자리 약어 변환 (Zippopotam 도시 검색용)
// function getStateAbbr(stateInput) {
//     if (!stateInput) return "";
//     var clean = stateInput.trim().toLowerCase();
//     if (clean.length === 2) return clean;
//
//     var map = {
//         'alabama':'al','alaska':'ak','arizona':'az','arkansas':'ar','california':'ca',
//         'colorado':'co','connecticut':'ct','delaware':'de','florida':'fl','georgia':'ga',
//         'hawaii':'hi','idaho':'id','illinois':'il','indiana':'in','iowa':'ia',
//         'kansas':'ks','kentucky':'ky','louisiana':'la','maine':'me','maryland':'md',
//         'massachusetts':'ma','michigan':'mi','minnesota':'mn','mississippi':'ms','missouri':'mo',
//         'montana':'mt','nebraska':'ne','nevada':'nv','new hampshire':'nh','new jersey':'nj',
//         'new mexico':'nm','new york':'ny','north carolina':'nc','north dakota':'nd','ohio':'oh',
//         'oklahoma':'ok','oregon':'or','pennsylvania':'pa','rhode island':'ri','south carolina':'sc',
//         'south dakota':'sd','tennessee':'tn','texas':'tx','utah':'ut','vermont':'vt',
//         'virginia':'va','washington':'wa','west virginia':'wv','wisconsin':'wi','wyoming':'wy'
//     };
//     return map[clean] || "";
// }
//
// // 3. 검색 버튼 클릭 시 실행
// async function handleSearch() {
//     var rawInput = $('#reSearchInput').val().trim();
//     var radiusMiles = parseInt($('#reRadiusSelect').val() || '0', 10);
//     var cityName = "";
//     var stateName = "";
//     var zipCode = "";
//     var lat = null;
//     var lon = null;
//
//     var $btn = $('.re-search-btn');
//     var origText = $btn.html();
//     $btn.html('주변 탐색 중...').prop('disabled', true);
//
//     try {
//         // 입력값 파싱 (우편번호 / 도시,주 / 도시 단독)
//         if (/^\d{5}$/.test(rawInput)) {
//             zipCode = rawInput;
//         } else if (rawInput.indexOf(',') !== -1) {
//             var parts = rawInput.split(',').map(function(item) { return item.trim(); });
//             if (/^\d{5}$/.test(parts[0])) {
//                 zipCode = parts[0];
//                 cityName = parts[1] || "";
//                 stateName = parts[2] || "";
//             } else {
//                 cityName = parts[0] || "";
//                 stateName = parts[1] || "";
//             }
//         } else {
//             // "92868 Orange" 처럼 공백으로 우편번호가 섞여 있을 경우 분리
//             var spaceMatch = rawInput.match(/^(\d{5})\s+(.+)$/);
//             if (spaceMatch) {
//                 zipCode = spaceMatch[1];
//                 cityName = spaceMatch[2].trim();
//             } else {
//                 cityName = rawInput;
//             }
//         }
//
//         // [단계 A] 우편번호가 있으면 Zippopotam ZIP API로 좌표 확보
//         if (zipCode) {
//             const zipRes = await fetch('https://api.zippopotam.us/us/' + zipCode);
//             if (zipRes.ok) {
//                 const zipData = await zipRes.json();
//                 if (zipData.places && zipData.places.length > 0) {
//                     if (!cityName) cityName = zipData.places[0]['place name'];
//                     if (!stateName) stateName = zipData.places[0]['state'];
//                     lat = parseFloat(zipData.places[0]['latitude']);
//                     lon = parseFloat(zipData.places[0]['longitude']);
//                 }
//             }
//         }
//
//         // [단계 B] 우편번호 없이 도시명만 직접 입력한 경우 좌표 확보
//         if ((!lat || !lon) && cityName) {
//             // 현재 페이지에 선택된 주(State)가 있다면 기본값으로 활용 (예: California)
//             var currentStateVal = $('select').filter(function() {
//                 return $(this).find('option[value="CA"], option:contains("California")').length > 0;
//             }).val();
//
//             var stateAbbr = getStateAbbr(stateName) || getStateAbbr(currentStateVal) || 'ca';
//
//             // 1순위: Zippopotam 도시 API (예: https://api.zippopotam.us/us/ca/irvine) - 매우 빠름
//             try {
//                 const cityRes = await fetch('https://api.zippopotam.us/us/' + stateAbbr + '/' + encodeURIComponent(cityName.toLowerCase()));
//                 if (cityRes.ok) {
//                     const cityData = await cityRes.json();
//                     if (cityData.places && cityData.places.length > 0) {
//                         lat = parseFloat(cityData.places[0]['latitude']);
//                         lon = parseFloat(cityData.places[0]['longitude']);
//                         if (!stateName && cityData['state']) stateName = cityData['state'];
//                     }
//                 }
//             } catch (e) {}
//
//             // 2순위: 1순위 실패 시 Nominatim 백업 조회
//             if (!lat || !lon) {
//                 try {
//                     var q = cityName + (stateName ? ', ' + stateName : '') + ', USA';
//                     const nomRes = await fetch('https://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + encodeURIComponent(q));
//                     if (nomRes.ok) {
//                         const nomData = await nomRes.json();
//                         if (nomData && nomData.length > 0) {
//                             lat = parseFloat(nomData[0].lat);
//                             lon = parseFloat(nomData[0].lon);
//                         }
//                     }
//                 } catch (e) {}
//             }
//         }
//
//         // [단계 C] 반경이 0보다 크고 좌표를 찾았다면 주변 도시 일괄 수집
//         var targetCities = [cityName];
//         if (radiusMiles > 0 && lat && lon) {
//             targetCities = await getNearbyCities(lat, lon, radiusMiles, cityName);
//         }
//         targetCities = targetCities.filter(Boolean);
//
//         // 디버깅용 콘솔 로그 (F12 개발자 도구에서 확인 가능)
//         console.log("검색 기준:", { cityName, stateName, lat, lon, radiusMiles, targetCities });
//
//         // 이동할 URL 조립
//         var targetUrl = '/realestate/house.php';
//         if (window.reCurrentCategory === '렌트') {
//             targetUrl = '/realestate/rent.php';
//         } else if (window.reCurrentCategory === '커머셜') {
//             targetUrl = '/realestate/commercial.php';
//         } else if (window.reCurrentCategory === '사업체') {
//             targetUrl = '/realestate/business.php';
//         }
//
//         var params = new URLSearchParams();
//         if (targetCities.length > 0) params.append('s_city_name', targetCities.join(','));
//         if (stateName !== "") params.append('s_state', stateName);
//         if (radiusMiles > 0) params.append('s_radius', radiusMiles);
//
//         var queryString = params.toString();
//         window.location.href = queryString ? (targetUrl + '?' + queryString) : targetUrl;
//
//     } finally {
//         $btn.html(origText).prop('disabled', false);
//     }
// }
//
// // (참고) 아이콘 버튼 클릭 시에도 동일하게 이동하도록 연결
// window.searchAndScroll = function(targetCategory) {
//     window.reCurrentCategory = targetCategory;
//     window.handleSearch();
// };
// // =========================================================
// // 페이지 진입 시 ?popup=y 감지하여 팝업 자동 실행
// // =========================================================
// (function() {
//     function runInitialPopup() {
//         var urlParams = new URLSearchParams(window.location.search);
//         if (urlParams.get('popup') === 'y') {
//             var modal = document.getElementById('realEstateModal');
//             if (modal) {
//                 if (typeof openREModal === 'function') {
//                     openREModal();
//                 } else {
//                     modal.style.display = 'block';
//                 }
//
//                 // 주소창에서 ?popup=y 제거 (새로고침 시 재오픈 방지)
//                 if (window.history && window.history.replaceState) {
//                     var cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
//                     window.history.replaceState({}, '', cleanUrl);
//                 }
//             } else {
//                 // 모달 HTML이 아직 로딩 전이면 0.1초 뒤 재시도
//                 setTimeout(runInitialPopup, 100);
//             }
//         }
//     }
//
//     if (document.readyState === 'loading') {
//         document.addEventListener('DOMContentLoaded', runInitialPopup);
//     } else {
//         runInitialPopup();
//     }
// })();