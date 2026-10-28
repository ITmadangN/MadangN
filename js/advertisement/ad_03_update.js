function GET_SELECT_CITY_NAME() {

    let s_state_code = $("#office_state").val();

    if (s_state_code == '-1') return;

    $.ajax({
        url: '/community/ajax/ajax_business.php',
        type: 'GET',
        dataType: "text",
        async: false, 
        data: {
            ac: "select_one_city_name",
            s_state_code: s_state_code,
            init_type: ''

        },
        timeout: 10000,
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if (status === "success") {

                let select_city_name = json_data.items.item;

                $("#office_city").html(select_city_name);

            }


        },
        error: function (request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            var err = JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete: function () {
        }
    });
}

function check_input(name,msg) {

    name_value = $("#"+name).val();

    if(name_value === '') {
        alert(msg);
        $("#"+name).focus();
        return false;
    }

    return true;


}

function YN_SEARCH() {
    
    let is_crmls_member = $('input:radio[name="is_crmls_member"]:checked').val();                           

    if (is_crmls_member === 'N') { $("#agent_search_button1").hide(); $("#agent_search_button2").hide(); }
    else { $("#agent_search_button1").show(); $("#agent_search_button2").show(); }
    
}

function GET_INFO() {
    

    $.ajax({
        url: '/advertisement/ajax/ajax_ad_03.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "get_info",
            id: agent_id

        },
        timeout: 10000,
        async: false, // 동기식 설정
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;
            let item = json_data.items.item;
                        
            SET_DATA(item);
            
            
        },
        error: function (request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            var err = JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete: function () {
        }
    });    
    
    return return_value;
    
}

function SET_DATA(item) {
    
    let realestate_agent_id = item.realestate_agent_id;
    let agent_key = item.agent_key;
    let specialized_field = item.specialized_field;
    let agent_full_name = item.agent_full_name;
    let agent_dre_license = item.agent_dre_license;
    let agent_phone = item.agent_phone;
    let agent_email = item.agent_email;                
    let main_image_url = item.main_image_url;
    let is_active = item.is_active;
    let is_show_website = item.is_show_website;
    let self_introduction = item.self_introduction;
    let realestate_office_id = item.realestate_office_id;

    let office_key = item.office_key;
    let office_name = item.office_name;
    let office_mls_id = item.office_mls_id;
    let office_phone = item.office_phone;
    let office_email = item.office_email;
    let office_address1 = item.office_address1;
    let office_address2 = item.office_address2;
    let office_city = item.office_city;
    let office_state = item.office_state;
    let office_zip = item.office_zip;
    let logo_image_url = item.logo_image_url;
    
    $("#realestate_agent_id").val(realestate_agent_id);
    $("#realestate_office_id").val(realestate_office_id);
    $("#office_key").val(office_key);
    $("#agent_dre_license").val(agent_dre_license);
    if(office_name != "" && office_name != null) $("#office_name").val(office_name);
    if(office_mls_id != "" && office_mls_id != null) $("#office_mls_id").val(office_mls_id);
    if(office_phone != "" && office_phone != null) $("#office_phone").val(office_phone);
    if(office_email != "" && office_email != null) $("#office_email").val(office_email);
    if(office_address1 != "" && office_address1 != null) $("#office_address1").val(office_address1);
    if(office_address2 != "" && office_address2 != null) $("#office_address2").val(office_address2);
    if(office_state != "" && office_state != null)  $("#office_state").val(office_state);
    GET_SELECT_CITY_NAME();
    if(office_city != "" && office_city != null)  $("#office_city").val(office_city);
    
    if(office_zip != "" && office_zip != null) $("#office_zip").val(office_zip);
                    
    $("#agent_key").val(agent_key);
    if(specialized_field != "" && specialized_field != null) $("#specialized_field").val(specialized_field);
    if(agent_full_name != "" && agent_full_name != null) $("#agent_full_name").val(agent_full_name);                
    if(agent_phone != "" && agent_phone != null) $("#agent_phone").val(agent_phone);
    if(agent_email != "" && agent_email != null) $("#agent_email").val(agent_email);     
    
    if(self_introduction != "" && self_introduction != null)  $("#self_introduction").val(self_introduction);
    else $("#self_introduction").val('');
    
    if(main_image_url != "") {
        let main_img_view = '<img class="file-preview-img me-2" style="width: 28px; height: 28px; object-fit: cover; border-radius: 0px; border: 1px solid rgb(221, 221, 221); display: inline-block;" src="'+main_image_url+'"><span class="file-name-text" style="color: rgb(51, 51, 51);">이미지</span>';
        
        $("#main_image_view").html(main_img_view);
        $("#main_image_x").css('display', 'flex');
                        
    }
    
    if(logo_image_url != "") {
        let logo_img_view = '<img class="file-preview-img me-2" style="width: 28px; height: 28px; object-fit: cover; border-radius: 0px; border: 1px solid rgb(221, 221, 221); display: inline-block;" src="'+logo_image_url+'"><span class="file-name-text" style="color: rgb(51, 51, 51);">이미지</span>';
        
        $("#logo_image_view").html(logo_img_view);
        $("#logo_image_x").css('display', 'flex');
                
    }    
    
}

function showRequest(formData, jqForm, options) {    
            
    if(!check_input('office_name','오피스명을 입력하세요')) return false;
        
    if(!check_input('office_phone','오피스 연락처를 입력하세요')) return false;
    // if(!check_input('office_email','오피스 이메일을 입력하세요')) return false;
    if(!check_input('office_address1','오피스 주소를 입력하세요')) return false;
    
    if(!check_input('office_state','주를 선택하세요')) return false;
    
    if(!check_input('office_city','도시를 선택하세요')) return false;
    
    //if(!check_input('에이전트 MLS ID','에이전트 MLS ID를 입력하세요')) return false;
    if(!check_input('agent_full_name','에이전트 Full name을 입력하세요')) return false;
    //if(!check_input('specialized_field','에이전트 준문분야를 입력하세요')) return false;
    
    if(!check_input('agent_phone','에이전트 연락처를 입력하세요')) return false;
    if(!check_input('agent_email','에이전트 이메일을 입력하세요')) return false;        

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {    
    
    if (statusText === "success") {
        
        let json_data = JSON.parse(responseText);

        let status = json_data.status;
        
        if(status == "fail") {
            alert(json_data.msg);
        }
        else {    
            alert('정상적으로 수정되었습니다.');
           location.href='/realestate/agent.php';
        }
        
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
        $("#pay_button").show();
    }
}


$(document).ready(function () {
    
   
    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#formp').ajaxForm(options);


    $('#office_phone').mask('000-000-0000');
    $('#agent_phone').mask('000-000-0000');
    
    GET_INFO();
});

