
function GO_DELETE(id) {
    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/admin/realstate/ajax/ajax_realstate_process.php',
        type: 'GET',
        dataType: 'text',
        data: {
            ac: 'realstate_delete',
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === 'success') {
                location.href = '/admin/realstate/realstate_list.php';
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}


$(document).ready(function() {
});
