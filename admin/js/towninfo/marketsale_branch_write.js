let g_cnt = 0;
function MAKE_BRANCH_HTML() {

    g_cnt++;

    $.ajax({
        url: '/admin/towninfo/ajax/ajax_marketsale_branch_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "make_branch_html",
            cnt: g_cnt
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                $("#result_branch").append(json_data.items.item);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });

}

function GET_CITY_COUNTY(cnt) {

    GET_CITY_NAME(cnt);
    GET_COUNTY(cnt);

}

function GET_CITY_NAME(cnt) {

    let state_code = $("#state_code_" + cnt).val();

    if (state_code === '-1') {
        return;
    }

    $.ajax({
        url: '/admin/towninfo/ajax/ajax_marketsale_branch_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "select_city_name",
            state_code: state_code
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                $("#city_name_" + cnt).html(json_data.items.item);
            }
        },
        error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function DELETE_BRANCH(cnt) {

    let conf = confirm("정말로 삭제하시겠습니까?");
    if (!conf) {
        return;
    }

    $("#branch_row_" + cnt).remove();
}
function GET_COUNTY(cnt) {

    let state_code = $("#state_code_" + cnt).val();

    if (state_code === '-1') {
        return;
    }

    $.ajax({
        url: '/admin/towninfo/ajax/ajax_marketsale_branch_process.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "select_county",
            state_code: state_code
        },
        timeout: 10000,
        success: function(data) {
            let json_data = JSON.parse(data);
            if (json_data.status === "success") {
                $("#county_code_" + cnt).html(json_data.items.item);
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

    MAKE_BRANCH_HTML();

});

function showRequest(formData, jqForm, options) {

    var queryString = $.param(formData);

    return true;
}


function showResponse(responseText, statusText, xhr, $form)  {

    if(statusText === "success") {
        alert('업데이트가 정상적으로 수행되었습니다.');
        location.href = "/admin/towninfo/marketsale_branch_list.php";
    }
    else {
        alert('업데이트에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}