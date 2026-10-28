function GO_UPDATE(id) {
    location.href = "/admin/user/user_update.php?user_id=" + id;
}

function GO_DELETE(id) {

    let yn = confirm("삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/admin/user/ajax/ajax_user_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "user_delete",
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                location.href = "/admin/user/user_list.php";
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

$(document).ready(function() {

});
