function GET_CITY_NAME(num) {
    let s_state_code = $("#state_code_"+num).val();
    if (s_state_code === '-1') {
        return;
    }

    $.ajax({
        url: '/admin/community/ajax/ajax_common_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "select_city_name",
            s_state_code: s_state_code
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                $("#city_name_"+num).html(json_data.items.item);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

// gold, platinum 광고만 직종과 주/도시를 여러 개 등록할 수 있다.
function IS_MULTI_LEVEL() {
    let level = $("#advertising_level").val();
    return level === "gold" || level === "platinum";
}

function REFRESH_ROW_BUTTONS() {
    let is_multi = IS_MULTI_LEVEL();

    $(".recruit-add-btn").toggle(is_multi);

    // 일반 광고에 2개 이상 등록된 기존 데이터는 1개로 줄일 수 있도록 삭제 버튼을 보여준다.
    $("#result_advertising_level, #result_state_city").each(function() {
        let $rows = $(this).find(".adlevel-row");
        $rows.find(".recruit-del-btn").toggle(is_multi || $rows.length > 1);
    });
}

function ADD_ROW(ac, num, target, on_added) {
    $.ajax({
        url : '/admin/community/ajax/ajax_recruit_process.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : ac,
            g_num : num
        },
        timeout: 10000,
        success : function(data){
            let json_data = JSON.parse(data);

            if(json_data.status === "success") {
                $(target).append(json_data.items.item);
                on_added();
                REFRESH_ROW_BUTTONS();
            }
        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        }
    });
}

function ADD_JOB_TYPE() {
    ADD_ROW("add_job_type", g_num, "#result_advertising_level", function() { g_num++; });
}

function ADD_STATE_CITY() {
    ADD_ROW("add_state_city", g_loc_num, "#result_state_city", function() { g_loc_num++; });
}

function DEL_ROW(target, row_id) {
    if($(target).find(".adlevel-row").length <= 1) {
        alert('최소 1개는 등록되어 있어야 합니다.');
        return;
    }

    $(row_id).remove();
    REFRESH_ROW_BUTTONS();
}

function DEL_ADVERTISING_LEVEL(num) {
    DEL_ROW("#result_advertising_level", "#div_advertising_level_"+num);
}

function DEL_STATE_CITY(num) {
    DEL_ROW("#result_state_city", "#div_state_city_"+num);
}

function CHECK_JOB_TYPE() {
    let seen = {};
    let pass = true;

    $('#result_advertising_level select[name="job_type[]"]').each(function() {
        let val = $(this).val();

        if(!val) {
            alert('직종을 선택해주세요.');
            $(this).focus();
            pass = false;
            return false;
        }

        if(seen[val]) {
            alert('중복된 직종이 있습니다. 확인해 주세요.');
            $(this).focus();
            pass = false;
            return false;
        }

        seen[val] = true;
    });

    return pass;
}

function CHECK_STATE_CITY() {
    let seen = {};
    let pass = true;

    $("#result_state_city .adlevel-row").each(function() {
        let $state = $(this).find('select[name^="state_code"]');
        let $city = $(this).find('select[name^="city_name"]');
        let state = $state.val();
        let city = $city.val();

        if(!state) {
            alert('주를 선택해주세요.');
            $state.focus();
            pass = false;
            return false;
        }

        if(!city) {
            alert('도시를 선택해주세요.');
            $city.focus();
            pass = false;
            return false;
        }

        let key = state + "|" + city;

        if(seen[key]) {
            alert('중복된 주/도시가 있습니다. 확인해 주세요.');
            $city.focus();
            pass = false;
            return false;
        }

        seen[key] = true;
    });

    return pass;
}

function CHECK_ROW_COUNT() {
    if(IS_MULTI_LEVEL()) return true;

    if($("#result_advertising_level .adlevel-row").length > 1 || $("#result_state_city .adlevel-row").length > 1) {
        alert('gold, platinum 광고만 직종과 주/도시를 여러 개 등록할 수 있습니다.');
        return false;
    }

    return true;
}

$(document).ready(function() {

    REFRESH_ROW_BUTTONS();

    var options = {

        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse  // post-submit callback

    };

    $('#formp').ajaxForm(options);

});

function showRequest(formData, jqForm, options) {

    return CHECK_ROW_COUNT() && CHECK_JOB_TYPE() && CHECK_STATE_CITY();
}


function showResponse(responseText, statusText, xhr, $form)  {

    let json_data = null;

    try {
        json_data = JSON.parse(responseText);
    } catch (e) {
        json_data = null;
    }

    if(json_data && json_data.status === "fail") {
        alert(json_data.msg);
        return;
    }

    if(statusText === "success") {
        alert('업데이트가 정상적으로 수행되었습니다.');
        location.href = "/admin/community/recruit_list.php";
    }
    else {
        alert('업데이트에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}