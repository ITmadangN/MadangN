let g_page = 1;

function GO_PAGE(page) {
    g_page = page;
    GET_PAGE();
}

function GET_PAGE() {
    $.ajax({
        url: '/admin/realstate/ajax/ajax_realstate_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "realstate_list",
            page: g_page,
            s_is_active : $("#s_is_active").val(),
            s_property_type: $("#s_property_type").val(),            
            s_state_code: $("#s_state_code").val(),
            s_city_name: $("#s_city_name").val(),
            s_kind: $("#s_kind").val(),
            s_keyword: $("#s_keyword").val(),
            s_cnt: $("#s_cnt").val()
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                $("#result_html").html(json_data.items.item);
                $("#result_pagging").html(json_data.pagging);
                $("#result_navigation_text").html(json_data.navigation_text);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function GET_CITY_NAME() {
    let s_state_code = $("#s_state_code").val();
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
                $("#s_city_name").html(json_data.items.item);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

$(document).ready(function() {
    GO_PAGE(1);
});
