
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

// $(document).ready(function() {
//
// //    cityNameDisplay();
// //    cityNameDisplayCouunt();
//
//     $('.js-example-basic-multiple').select2({
//         placeholder: "도시",
//         allowClear: true
//     });
//
//
//      $('#s_min_price').mask('000,000,000', {reverse: true});
//      $('#s_max_price').mask('000,000,000', {reverse: true});
//
//      let temp_city_name = Cookies.get('s_city_name');
//
//      if(temp_city_name != "" && temp_city_name != undefined) {
//
//          let t_city_name = temp_city_name.split(',');
//
//          $('.js-example-basic-multiple').val(t_city_name).trigger('change');
//
//      }
//
//      GO_PAGE(g_page);
//
//     /*
//     $('#s_min_price').maskMoney({
//         prefix: '$ ',
//         thousands: ',',
//         precision: 0 // 원화는 소수점 제외
//     });
//     */
// // [이 위치에 추가]
    checkPopupParam();
// });
$(document).ready(function() {

    $('.js-example-basic-multiple').select2({
        placeholder: "도시",
        allowClear: true
    });

    $('#s_min_price').mask('000,000,000', {reverse: true});
    $('#s_max_price').mask('000,000,000', {reverse: true});

    // [추가] 팝업에서 URL 파라미터(?s_city_name=도시명)로 넘어온 경우 우선 처리
    const urlParams = new URLSearchParams(window.location.search);
    const paramCity = urlParams.get('s_city_name');

    if (paramCity) {
        // Select2 옵션에 해당 도시가 없으면 동적으로 옵션 추가 후 선택 처리
        if ($('.js-example-basic-multiple').find("option[value='" + paramCity + "']").length === 0) {
            var newOption = new Option(paramCity, paramCity, true, true);
            $('.js-example-basic-multiple').append(newOption).trigger('change');
        } else {
            $('.js-example-basic-multiple').val([paramCity]).trigger('change');
        }

        // 기존 검색 실행 함수 호출
        GO_PAGE(1);

    } else {
        // 기존 쿠키 기반 도시 세팅 로직 유지
        let temp_city_name = Cookies.get('s_city_name');
        if(temp_city_name != "" && temp_city_name != undefined) {
            let t_city_name = temp_city_name.split(',');
            $('.js-example-basic-multiple').val(t_city_name).trigger('change');
        }
        GO_PAGE(g_page);
    }

});


// =========================================================
// 부동산 통합 검색 팝업 제어 함수
// =========================================================
window.reCurrentCategory = '주택';

// URL의 ?popup=y 감지하여 팝업 실행
function checkPopupParam() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('popup') === 'y') {
        openREModal();

        // 주소창에서 ?popup=y 제거 (새로고침 시 재노출 방지)
        if (window.history && window.history.replaceState) {
            var cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
            window.history.replaceState({path: cleanUrl}, '', cleanUrl);
        }
    }
}

// 팝업 열기
function openREModal() {
    var modal = document.getElementById('realEstateModal');
    if (modal) {
        modal.style.display = 'block';
        getCurrentLocation();
    } else {
        // DOM 생성이 늦어지는 경우 예외 처리
        setTimeout(function() {
            var retryModal = document.getElementById('realEstateModal');
            if (retryModal) {
                retryModal.style.display = 'block';
                getCurrentLocation();
            }
        }, 150);
    }
}

// 팝업 닫기
function closeREModal() {
    var modal = document.getElementById('realEstateModal');
    if (modal) modal.style.display = 'none';
}

// 배경 클릭 시 닫기
window.addEventListener('click', function(event) {
    var modal = document.getElementById('realEstateModal');
    if (modal && event.target === modal) closeREModal();
});

// 탭 전환
function switchTab(btnElement, categoryName) {
    window.reCurrentCategory = categoryName;
    var btns = document.querySelectorAll('.re-tab-btn');
    btns.forEach(function(b) { b.classList.remove('active'); });
    if (btnElement) btnElement.classList.add('active');

    var subMenu = document.getElementById('subCategoryArea');
    if (subMenu) {
        subMenu.style.display = (categoryName === '커머셜' || categoryName === '사업체') ? 'flex' : 'none';
    }
}

// 내 위치 자동 가져오기
function getCurrentLocation() {
    var input = document.getElementById('reSearchInput');
    if (!input) return;
    input.placeholder = "현재 위치 찾는 중...";

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                fetch('https://nominatim.openstreetmap.org/reverse?lat=' + position.coords.latitude + '&lon=' + position.coords.longitude + '&format=json')
                    .then(function(res) { return res.json(); })
                    .then(function(data) {
                        var city = data.address.city || data.address.town || data.address.county || "";
                        var state = data.address.state || "";
                        var postcode = data.address.postcode || "";
                        input.value = (city || postcode) ? ((postcode ? postcode + ', ' : '') + city + (state ? ', ' + state : '')) : "90623, La Palma, CA";
                    })
                    .catch(function() { input.value = "90623, La Palma, CA"; });
            },
            function() { input.value = "90623, La Palma, CA"; }
        );
    } else {
        input.value = "90623, La Palma, CA";
    }
}

function clearSearchInput() {
    var input = document.getElementById('reSearchInput');
    if (input) input.value = '';
}
//
// // 검색 시 팝업 닫고 이동
// function handleSearch() {
//     searchAndScroll(window.reCurrentCategory);
// }
//
// function searchAndScroll(targetCategory) {
//     closeREModal();
//     var elements = document.querySelectorAll('h1, h2, h3, h4, div, span');
//     for (var i = 0; i < elements.length; i++) {
//         var el = elements[i];
//         if (el.children.length === 0 && el.textContent.trim() === targetCategory) {
//             el.scrollIntoView({ behavior: 'smooth', block: 'start' });
//             break;
//         }
//     }
// }
// 검색 버튼 클릭 시 실행
window.handleSearch = function() {
    var rawInput = document.getElementById('reSearchInput').value.trim();
    var cityName = "";

    // "90623, La Palma, CA" 같은 주소 형태에서 도시명("La Palma")만 추출
    if (rawInput.indexOf(',') !== -1) {
        var parts = rawInput.split(',');
        // 첫 번째 조각이 숫자(Zipcode)면 두 번째 조각을 도시명으로 사용
        if (/^\d+$/.test(parts[0].trim()) && parts.length > 1) {
            cityName = parts[1].trim();
        } else {
            cityName = parts[0].trim();
        }
    } else {
        cityName = rawInput;
    }

    // 선택된 탭에 따라 이동할 페이지 URL 설정
    var targetUrl = '/realestate/house.php'; // 기본값: 주택
    if (window.reCurrentCategory === '렌트') {
        targetUrl = '/realestate/rent.php';
    } else if (window.reCurrentCategory === '커머셜') {
        targetUrl = '/realestate/commercial.php';
    } else if (window.reCurrentCategory === '사업체') {
        targetUrl = '/realestate/business.php';
    }

    // 도시명이 입력되어 있다면 URL 파라미터로 전달하며 페이지 이동
    if (cityName !== "") {
        window.location.href = targetUrl + '?s_city_name=' + encodeURIComponent(cityName);
    } else {
        window.location.href = targetUrl;
    }
};

// (참고) 아이콘 버튼 클릭 시에도 동일하게 이동하도록 연결
window.searchAndScroll = function(targetCategory) {
    window.reCurrentCategory = targetCategory;
    window.handleSearch();
};
