function GO_UPDATE(id) {
    location.href = "/admin/community/business_update.php?community_business_id=" + id;
}
function GO_DELETE(id) {

    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/admin/community/ajax/ajax_business_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "business_delete",
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {

                location.href = "/admin/community/business_list.php";
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}


function GO_PREVIEW(id) {
    
      window.open('/community/business_view_preview.php?id='+id, 'popupName', 'width=1400, height=700, left=100, top=100');
}

function GO_CONFIRM(id) {
    let yn = confirm("승인 하시겠습니까 ?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/admin/community/ajax/ajax_business_process.php',
        type: 'GET',
        dataType: 'text',
        data: {
            ac: 'confirm',
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === 'success') {
                alert('승인되었습니다.');
                location.href = '/admin/community/business_list.php';
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function GO_MODIFY_YN(id) {
    let yn = confirm("광고주가 수정가능하게 하시겠습니까 ?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/admin/community/ajax/ajax_business_process.php',
        type: 'GET',
        dataType: 'text',
        data: {
            ac: 'modify_yn',
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === 'success') {
                alert('처리 되었습니다.');
                location.href = '/admin/community/business_list.php';
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

$(document).ready(function() {

});
