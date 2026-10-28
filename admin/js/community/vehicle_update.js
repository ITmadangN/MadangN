function GET_CITY_NAME() {
    let s_state_code = $("#state_code").val();
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
                $("#city_name").html(json_data.items.item);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

$(document).ready(function() {
    if ($("#formp").length > 0) {
        $("#formp").attr("action", "/admin/community/ajax/ajax_vehicle_process.php");
    }

    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#formp').ajaxForm(options);
});

function showRequest(formData, jqForm, options) {


    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    if (statusText === "success") {
        alert('업데이트가 정상적으로 수행되었습니다.');
        location.href = "/admin/community/vehicle_list.php";
    } else {
        alert('업데이트 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}
