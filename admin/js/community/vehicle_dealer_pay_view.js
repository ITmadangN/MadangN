function GO_UPDATE(id) {
    location.href = "/admin/community/vehicle_dealer_pay_update.php?ad_payments_id=" + id;
}

function GO_DELETE(id) {
    let yn = confirm("정말 삭제하시겠습니까?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/admin/community/ajax/ajax_vehicle_dealer_pay_process.php',
        type: 'GET',
        dataType: 'text',
        data: {
            ac: 'vehicle_dealer_pay_delete',
            id: id
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === 'success') {
                location.href = '/admin/community/vehicle_dealer_pay_list.php';
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}


function GO_CONFIRM(sid) {
    let yn = confirm("광고를 게시 하시겠습니까 ?");
    if (yn === false) {
        return;
    }

    $.ajax({
        url: '/admin/community/ajax/ajax_vehicle_dealer_pay_process.php',
        type: 'GET',
        dataType: 'text',
        data: {
            ac: 'confirm',
            sid: sid
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === 'success') {
                alert('승인되었습니다.');
                location.href = '/admin/community/vehicle_dealer_pay_list.php';
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}


$(document).ready(function() {
});
