
function GET_WEEKLY_ADS_FLYER_SITE() {
    $.ajax({
        url: '/admin/towninfo/ajax/ajax_marketsale_flyer_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "marketsale_weekly_ads_flyer_site",
            towninfo_marketsale_market_id : $("#towninfo_marketsale_market_id").val(),   
            state_code : $("#state_code").val()            
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                $("#weekly_ads_flyer_site").html(json_data.items.item);                
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

$(document).ready(function() {

    var options = {

        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse  // post-submit callback

    };

    $('#formp').ajaxForm(options);

});

function showRequest(formData, jqForm, options) {

    var queryString = $.param(formData);

    return true;
}


function showResponse(responseText, statusText, xhr, $form)  {

    if(statusText === "success") {
        alert('등록이 정상적으로 수행되었습니다.');
        //location.href = "/admin/towninfo/marketsale_flyer_list.php";
    }
    else {
        alert('업데이트에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}

function SET_END_DATE() {
        
    const start_date = $("#sale_start_date").val();    
    const end_date = addSevenDays(start_date);
    
    let week = getWeekOfMonthKorean(start_date);    
    $("#sale_end_date").val(end_date);
    
    const parts = start_date.split('-');
    const month = parseInt(parts[1], 10);
    
    var market_name = $('#towninfo_marketsale_market_id option:selected').text();
    
    let title = market_name + ' ' + month + '월 '+week+' 세일 품목';
    
    $("#title").val(title);
    
    
}
function addSevenDays(dateStr) {
    // 1. "YYYY-MM-DD" 형식을 구분자(/)로 나눔
    const parts = dateStr.split('-');
    const month = parseInt(parts[1], 10) - 1; // 월은 0부터 시작하므로 1을 뺍니다.
    const day = parseInt(parts[2], 10);
    const year = parseInt(parts[0], 10);

    // 2. Date 객체 생성
    const date = new Date(year, month, day);

    // 3. 7일 더하기
    date.setDate(date.getDate() + 6);

    // 4. 다시 "MM/DD/YYYY" 형식으로 포맷팅 (한 자릿수일 경우 앞에 0 추가)
    const nextMonth = String(date.getMonth() + 1).padStart(2, '0');
    const nextDay = String(date.getDate()).padStart(2, '0');
    const nextYear = date.getFullYear();

    return `${nextYear}-${nextMonth}-${nextDay}`;
}

function getWeekOfMonthKorean(dateStr) {
    // 1. 문자열 분리 및 날짜 객체 생성
    const [yearStr, monthStr, dayStr ] = dateStr.split('-');
    const date = new Date(yearStr, parseInt(monthStr, 10) - 1, dayStr);
    
    const day = date.getDate();
    
    // 2. 해당 월 1일의 요일 번호 (일요일: 0, 월요일: 1, 토요일: 6)
    const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    const firstDayOfWeek = firstDay.getDay(); 
    
    // 3. 일요일(0)을 기준으로 주차가 바뀌도록 보정하여 계산
    // 1일이 토요일(6)이면, 일요일(0)이 되는 2일에 바로 다음 주로 넘어가도록 합니다.
    const weekNumber = Math.ceil((day + firstDayOfWeek) / 7);
    
    // 4. 숫자를 한글 주차 명칭으로 변환
    const koreanWeeks = ["", "첫째주", "둘째주", "셋째주", "넷째주", "다섯번째주", "여섯번째주"];
    
    return koreanWeeks[weekNumber] || `${weekNumber}번째주`;
}