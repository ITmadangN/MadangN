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

function GET_DRE(ac) {
    
    let return_value = 0;
    let agent_dre_license = $("#agent_dre_license").val();

    if (agent_dre_license === '') {
    
        alert("DRE Lic# 정보를 입력하세요");
        return;
    }

    $.ajax({
        url: '/advertisement/ajax/ajax_ad_03.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "dre_search",
            agent_dre_license: agent_dre_license

        },
        timeout: 10000,
        async: false, // 동기식 설정
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;
            let items = json_data.items;
            
            if (status === "found") {
                
                let item = items.item;
                let dre = items.dre;
                
                alert(json_data.msg);     
                
                $("#agent_dre_license").val(dre);
                
                SET_DATA(item);
                
                $("#is_crmls_member").val('Y');                
                
                return_value = 1;
                
                $("#check_dre").val($("#agent_dre_license").val());
                
                return;

            } 
            else if (status === "other user") {
                
                alert(json_data.msg);     
                $("#agent_dre_license").val('');
                $("#is_crmls_member").val('N');
                RESET_FORM();
                
                return_value = 0;
                
                $("#check_dre").val($("#agent_dre_license").val());
                
                return;

            }       
            else if (status === "not found") {
                
                $("#is_crmls_member").val('N');
                
                if(ac != "save") {
                    alert(json_data.msg);     
                    //$("#agent_dre_license").val('');                    
                    RESET_FORM();
                }
                
                return_value = 1;
                
                $("#check_dre").val($("#agent_dre_license").val());
                
                return;

            }
            else if (status == "success") {
                
                let item = json_data.items.item;
                
              //  alert(json_data.msg);     
                
                SET_DATA(item);
                
                $("#is_crmls_member").val('Y');    
                
                $("#check_dre").val($("#agent_dre_license").val());    
                
                return_value = 1;
                return ;
                
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
    $("#office_key").val(office_key);
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
    else {    
        $('#logo_image_x').trigger('click');
    }

    if(logo_image_url != "") {
        let logo_img_view = '<img class="file-preview-img me-2" style="width: 28px; height: 28px; object-fit: cover; border-radius: 0px; border: 1px solid rgb(221, 221, 221); display: inline-block;" src="'+logo_image_url+'"><span class="file-name-text" style="color: rgb(51, 51, 51);">이미지</span>';
        
        $("#logo_image_view").html(logo_img_view);
        $("#logo_image_x").css('display', 'flex');
                
    }    
    else {
        $('#main_image_x').trigger('click');
    }
}

function showRequest(formData, jqForm, options) {
    
    let onoff = 1;
    
    if( $("#agent_dre_license").val() != "") {
        
        onoff = GET_DRE('save');
    }
    else {
        $("#is_crmls_member").val('N');
    }
    
    if(onoff == 0) return false;

    if(!check_input('validity_period','기간을 선택하세요')) return false;
    
    if(!check_input('desired_start_date','광고희망일을 선택하세요')) return false;
            
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

    if (!$('input[name="yak"]').is(':checked')) {
        alert("광고신청 동의서에 동의하셔야 합니다.");
        return false;
    }    

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
            
            if(pay_yn_agent === 'N') {            
                go_free_ad();
                return;
            }
            
            let num = json_data.num;
            
            // const stripe = Stripe('pk_test_51Tem4pJrnxNGZT5aMzgAM8fxIx0cITYLMVHsY3eTThFNF8j8J7J2D2gLllH6ZjBIvqXb2KC8wXTGNz4qXV2lK6Jt00EOAsEYEc');
            const stripe = Stripe('pk_live_51Tem4pJrnxNGZT5ayI6oHLcLpTQ1lTeidpDTRTpf7EN1krP5qA5M2UmYulrhg373dVM9ZLlOX4hxTJDuTbEHNWcB005YPxLD0s');

            $.ajax({
                url: '../ad/ajax/create_checkout_session.php',
                type: 'POST',
                dataType: 'json',

                data: {
                    order_id: num
                },

                success: async function (response) {

                    console.log(response);

                    if (!response.client_secret) {
                        alert('결제 세션 생성 실패');
                        return;
                    }

                    checkout = await stripe.initEmbeddedCheckout({
                        clientSecret: response.client_secret
                    });

                    checkout.mount('#checkout');
                    
                    scrollToId('#payment_start', 600); 

                    $('#pay_button').hide();
                },

                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert('결제 처리 중 오류가 발생했습니다.');
                }
            });
          
        }
        
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
        $("#pay_button").show();
    }
}

function go_free_ad() {
    
  alert('등록이 정상적으로 등록되었습니다. 관리자의 승인후 매물등록이 가능합니다.');
  location.href='/realestate/agent.php';
}           

function RESET_FORM() {
    
    let bl = '';
    
    $("realestate_agent_id").val(bl);
    $("#office_key").val(bl);
    $("#office_name").val(bl);
    $("#office_mls_id").val(bl);
    $("#office_phone").val(bl);
    $("#office_email").val(bl);
    $("#office_address1").val(bl);
    $("#office_address2").val(bl);
    $("#office_state").val(bl);
    $("#office_city").val(bl);
    
    $("#office_state").val('CA');
    GET_SELECT_CITY_NAME();
    
    $("#office_zip").val(bl);
                    
    $("#agent_key").val(bl);
    $("#specialized_field").val(bl);
    $("#agent_full_name").val(bl);                
    $("#agent_phone").val(bl);
    $("#agent_email").val(bl);        
    
    $("#is_crmls_member").val('N');        
    
}

$(document).ready(function () {
    
    if(run_adv == 1) {
        alert("광고를 진행중이거나 신청중이므로 다시 광고 신청 하실 필요가 없습니다.");
        location.href='/realestate/agent.php';
        return;
    }
    
    var options = {
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#formp').ajaxForm(options);


    $('#office_phone').mask('000-000-0000');
    $('#agent_phone').mask('000-000-0000');
    
    $('#desired_start_date').datepicker({
        minDate: 0,
        dateFormat: 'mm/dd/yy', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });


});

function CAL_AMOUNT() {
        
        let validity_period = $("#validity_period").val();
        
        $.ajax({
        url: '/advertisement/ajax/ajax_ad_03.php',
        type: 'GET',
        async: false,
        dataType: "text",
        data: {
            ac: "get_amount",
            validity_period: validity_period

        },
        timeout: 10000,
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if (status === "success") {

                let total_amount = json_data.items.item;
                
                total_amount = total_amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                
                $("#payment_amount").html("$"+total_amount);                
            }
            else {
                alert("금액을 가져오는데 실패했습니다. 잠시후에 진행하시기 바랍니다.");
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
