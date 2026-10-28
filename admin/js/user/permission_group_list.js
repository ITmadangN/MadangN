
function GO_PAGE(page) {
    g_page = page;
    GET_PAGE();
}

function GET_PAGE() {
    
    Cookies.set('page', g_page, { expires: 1 });
    
    Cookies.set('a_s_kind', $("#s_kind").val(), { expires: 1 });
    Cookies.set('a_s_keyword', $("#s_keyword").val(), { expires: 1 });    
    Cookies.set('a_s_cnt', $("#s_cnt").val(), { expires: 1 });    
    
    $.ajax({
        url: '/admin/user/ajax/ajax_permission_group_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "permission_group_list",
            page: g_page,
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


$(document).ready(function() {
    GO_PAGE(1);
});
