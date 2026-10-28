
function GO_UPDATE(id,sid) {
    location.href = "/community/recruit_update.php?id=" + id + "&sid=" + sid;
}
function GO_DELETE(id) {

    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/community/ajax/ajax_recruit.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "recruit_delete",
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {

                location.href = "/community/recruit.php";
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}



$(document).ready(function() {

});