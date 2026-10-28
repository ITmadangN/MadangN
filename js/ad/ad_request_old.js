var id_cnt = 1;

function SET_CA(prefix) {

    let s_state_code = $("#" + prefix + "_company_state_code").val();    
    
    if(s_state_code == 'CA') $("#" + prefix + "_ca_have_15").show();
    else $("#" + prefix + "_ca_have_15").hide();
    
}

function GET_SELECT_CITY_NAME(id, init_type, city_name) {

    let s_state_code = $("#" + id + '_state_code').val();

    if (s_state_code == '-1') return;

    $.ajax({
        url: '/community/ajax/ajax_business.php',
        type: 'GET',
        async: false,
        dataType: "text",
        data: {
            ac: "select_one_city_name",
            s_state_code: s_state_code,
            s_city_name: city_name,
            init_type: init_type

        },
        timeout: 10000,
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if (status === "success") {

                let select_city_name = json_data.items.item;

                $("#" + id + "_city_name").html(select_city_name);
                
                /*
                if(s_state_code === "CA" ) {
                    
                    let ad_method = $('input:radio[name="ad_method"]:checked').val();
                    
                    $("#"+id+"_ca_have_15").show();                    
                    
                    
                } 
                else {
                    $("#"+id+"_ca_have_15").hide();                                        
                }
                */

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

function SET_COMMON_VALUE(method) {

    if (ad_method === 'recruit_platinum') {

        let rp_company_name = $("#rp_company_name").val();
        let rp_company_website = $("#rp_company_website").val();
        let rp_company_address = $("#rp_company_address").val();
        let rp_company_state_code = $("#rp_company_state_code").val();    
        let rp_has_15_plus_employees = $('input[name="rp_has_15_plus_employees"]:checked').val();

        let rp_contact_name = $("#rp_contact_name").val();
        let rp_contact_phone = $("#rp_contact_phone").val();
        let rp_contact_email = $("#rp_contact_email").val();

        let rp_desired_start_date = $("#rp_desired_start_date").val();
        let rp_desired_end_date = $("#rp_desired_end_date").val();

        $("#contact_name").val(rp_contact_name);
        $("#contact_phone").val(rp_contact_phone);
        $("#contact_email").val(rp_contact_email);

        // 불러오기 안했을경우 업데이트
        if($("#listing_id").val() == "") $("#company_name").val(rp_company_name);
        
        $("#company_website").val(rp_company_website);
        $("#company_address").val(rp_company_address);
        $("#company_state_code").val(rp_company_state_code);
        
        if(rp_company_state_code != "CA") $("#has_15_plus_employees").val('');
        else $("#has_15_plus_employees").val(rp_has_15_plus_employees);

        $("#desired_start_date").val(rp_desired_start_date);
        $("#desired_end_date").val(rp_desired_end_date);

    }

    if (ad_method === 'recruit_gold') {

        let rg_company_name = $("#rg_company_name").val();
        let rg_company_website = $("#rg_company_website").val();
        let rg_company_address = $("#rg_company_address").val();
        let rg_company_state_code = $("#rg_company_state_code").val();        
        let rg_has_15_plus_employees = $('input[name="rg_has_15_plus_employees"]:checked').val();

        let rg_contact_name = $("#rg_contact_name").val();
        let rg_contact_phone = $("#rg_contact_phone").val();
        let rg_contact_email = $("#rg_contact_email").val();

        let rg_desired_start_date = $("#rg_desired_start_date").val();
        let rg_desired_end_date = $("#rg_desired_end_date").val();

        $("#contact_name").val(rg_contact_name);
        $("#contact_phone").val(rg_contact_phone);
        $("#contact_email").val(rg_contact_email);

        // 불러오기 안했을경우 업데이트
        if($("#listing_id").val() == "") $("#company_name").val(rg_company_name);
        
        $("#company_website").val(rg_company_website);
        $("#company_address").val(rg_company_address);
        $("#company_state_code").val(rg_company_state_code);
        if(rg_company_state_code != "CA") $("#has_15_plus_employees").val('');
        $("#has_15_plus_employees").val(rg_has_15_plus_employees);

        $("#desired_start_date").val(rg_desired_start_date);
        $("#desired_end_date").val(rg_desired_end_date);

    }

    if (ad_method === 'business_platinum') {

        let bp_company_name = $("#bp_company_name").val();

        let bp_contact_name = $("#bp_contact_name").val();
        let bp_contact_phone = $("#bp_contact_phone").val();
        let bp_contact_email = $("#bp_contact_email").val();

        let bp_desired_start_date = $("#bp_desired_start_date").val();
        let bp_desired_end_date = $("#bp_desired_end_date").val();

        $("#contact_name").val(bp_contact_name);
        $("#contact_phone").val(bp_contact_phone);
        $("#contact_email").val(bp_contact_email);

        // 불러오기 안했을경우 업데이트
        if($("#listing_id").val() == "") $("#company_name").val(bp_company_name);
        
        $("#company_website").val('');
        $("#company_address").val('');

        $("#desired_start_date").val(bp_desired_start_date);
        $("#desired_end_date").val(bp_desired_end_date);

    }

    if (ad_method === 'vehicle_dealer') {

        let vd_company_name = $("#vd_company_name").val();
        let vd_company_website = $("#vd_company_website").val();

        let vd_contact_name = $("#vd_contact_name").val();
        let vd_contact_phone = $("#vd_contact_phone").val();
        let vd_contact_email = $("#vd_contact_email").val();

        let vd_desired_start_date = $("#vd_desired_start_date").val();
        let vd_desired_end_date = $("#vd_desired_end_date").val();

        $("#contact_name").val(vd_contact_name);
        $("#contact_phone").val(vd_contact_phone);
        $("#contact_email").val(vd_contact_email);

        // 불러오기 안했을경우 업데이트
        if($("#listing_id").val() == "") $("#company_name").val(vd_company_name);
        
        $("#company_website").val(vd_company_website);

        $("#desired_start_date").val(vd_desired_start_date);
        $("#desired_end_date").val(vd_desired_end_date);

        }

}

function checke_job_type(job_type) {
    
    var $jobSelects = $('select[name="'+job_type+'[]"]');
    var hasDuplicate = false;
    var selectedValues = [];
    var pass = 'Y';
    
    $jobSelects.each(function () {
        var val = $(this).val();
        
        if(val == "") {
            alert('직종을 선택해주세요.');   
            $jobSelects.focus();         
            pass = 'N';
            return false;
        }
        selectedValues.push(val);
    })
    
    if(pass === 'N') return false;
        
    // 2. 중복 체크
    var uniqueValues = [];
    for (var i = 0; i < selectedValues.length; i++) {
        if (uniqueValues.indexOf(selectedValues[i]) !== -1) {
            hasDuplicate = true;
            break;
        }
        uniqueValues.push(selectedValues[i]);
    }

    if (hasDuplicate) {
        alert('중복된 직종이 있습니다. 확인해 주세요.');
        e.preventDefault();
        return false;
    }
    
    return true;
}

function check_state_city(prefix) {
    const groupSet = new Set();

    for(i=0;i<1000;i++) {    
        const stateEl = document.querySelector(
            `[name="${prefix}_state_code[${i}]"]`
        );

        const cityEl = document.querySelector(
            `[name="${prefix}_city_name[${i}]"]`
        );

        // 해당 인덱스의 state select 박스가 없다면 종료
        if (!stateEl) {
            continue;
        }

        const stateVal = stateEl.value.trim();
        const cityVal = cityEl ? cityEl.value.trim() : '';

        // 1. 시도 코드 선택 여부
        if (!stateVal) {
            alert('광고를 진행할 주를 선택해주세요.');
            stateEl.focus();
            return -1;
        }

        //2. 도시 이름이 없는 경우는 에러 표시
        if (!cityVal) {
            alert('광고를 진행할 도시를 선택해주세요.');
            cityEl.focus();
            return -1;
        //    continue;
        }


        // 4. 중복 체크는 state + city만 사용
        const groupKey = `${stateVal}|${cityVal}`;

        // 5. 중복 확인
        if (groupSet.has(groupKey)) {
            alert('중복된 지역이 존재합니다.');

            if (cityEl) {
                cityEl.focus();
            }

            return -3;
        }

        // 중복이 아니면 등록
        groupSet.add(groupKey);
    }

    return 1;
}

function showRequest(formData, jqForm, options) {

    ad_method = $('input:radio[name="ad_method"]:checked').val();

    // 구인구직 platinum
    if (ad_method === 'recruit_platinum') {
                                
        if(!check_input('rp_validity_period','광고 기간을 선택하세요')) return false;
        
        if(!check_input('rp_company_name','회사명을 입력하세요')) return false;
        
        if(!check_input('rp_company_state_code','회사가 위치한 주를 선택하세요')) return false;
        
        if($("#rp_company_state_code").val() === "CA") {
        
            let selectedValue = $('input[name="rp_has_15_plus_employees"]:checked').val();
        
            if (selectedValue === undefined) {         
                alert("직원수 15명 이상인지 선택하세요");
                return false;
            }
        }        
        
        let check_sc  = check_state_city("rp");
        
        if(check_sc < 1) return false;
        
        /*
        if(!check_input('rp_state_code','주를 선택하세요')) return false;
        
        if(!check_input('rp_city_name','도시를 선택하세요')) return false;
        
            

        */        
        
        if(!check_input('rp_desired_start_date','광고 게시 희망일을 입력하세요')) return false;        
      
        if(!check_input('rp_contact_email','담당자 이메일을 입력하세요')) return false;
        
        if(!checke_job_type('rp_job_type')) return false;
        
        if($("#rp_logo_image_url_exist").val() != "Y") {
            if(!check_input('rp_logo_image_url','로고 이미지를 선택하세요')) return false;
        }
        if(!check_input('rp_title','제목을 입력하세요')) return false;
        

    }

    // 구인구직 gold
    if (ad_method === 'recruit_gold') {        
            
        
        if(!check_input('rg_validity_period','광고 기간을 선택하세요')) return false;                                            

        if(!check_input('rg_company_name','회사명을 입력하세요')) return false;
        
        if(!check_input('rg_company_state_code','회사가 위치한 주를 선택하세요')) return false;
        
        if($("#rg_company_state_code").val() === "CA") {
        
            let selectedValue = $('input[name="rg_has_15_plus_employees"]:checked').val();
        
            if (selectedValue === undefined) {         
                alert("직원수 15명 이상인지 선택하세요");
                return false;
            }
        } 
        
        let check_sc  = check_state_city("rg");
        
        if(check_sc < 1) return false;
        
        /*
        if(!check_input('rg_state_code','주를 선택하세요')) return false;
        
        if(!check_input('rg_city_name','도시를 선택하세요')) return false;
        
        if($("#rg_state_code").val() === "CA") {
        
            let selectedValue = $('input[name="rg_has_15_plus_employees"]:checked').val();
        
            if (selectedValue === undefined) {                 
                alert("직원수 15명 이상인지 선택하세요");
                return false;
            }
        }
        */
        
        if(!check_input('rg_desired_start_date','광고 게시 희망일을 입력하세요')) return false;
        
        if(!check_input('rg_contact_email','담당자 이메일을 입력하세요')) return false;
        
        if(!checke_job_type('rg_job_type')) return false;
    
        if($("#rg_logo_image_url_exist").val() != "Y") {
            if(!check_input('rg_logo_image_url','로고 이미지를 선택하세요')) return false;
        }
        
        if(!check_input('rg_title','제목을 입력하세요')) return false;        

    }

    // 비지니스 platinum
    if (ad_method === 'business_platinum') {
        
        if(!check_input('bp_desired_start_date','광고 게시 희망일을 입력하세요')) return false;

        if(!check_input('bp_validity_period','광고 기간을 선택하세요')) return false;

        if(!check_input('bp_state_code','주를 선택하세요')) return false;
        
        if(!check_input('bp_desired_start_date','광고 희망 시작일을 입력하세요')) return false;
        
        if(!check_input('bp_company_name','회사명을 입력하세요')) return false;
        
        if(!check_input('bp_business_type','직종을 선택하세요')) return false;

        if(!check_input('bp_title','제목을 입력하세요')) return false;
        
        if($("#bp_main_image_url_exist").val() != "Y") {        
                if(!check_input('bp_main_image_url','목록에 표시될 대표 이미지를 선택하세요')) return false;
        }
        
    }

    // 딜러 광고
    if (ad_method === 'vehicle_dealer') {
        
        if(!check_input('vd_desired_start_date','광고 게시 희망일을 입력하세요')) return false;

        if(!check_input('vd_validity_period','광고 기간을 선택하세요')) return false;                                            

        if(!check_input('vd_desired_start_date','딜러 희망 시작일을 입력하세요')) return false;
        
        if(!check_input('vd_company_name','회사명을 입력하세요')) return false;

        if(!check_input('vd_contact_name','딜러명을 입력하세요')) return false;
        
        if(!check_input('vd_listing_address1','딜러 주소를 입력하세요')) return false;
        
        if(!check_input('vd_contact_email','딜러 이메일을 입력하세요')) return false;
        
        if(!check_input('vd_contact_phone','딜러 연락처를 입력하세요')) return false;        
        
        if(!check_input('vd_state_code','주를 선택하세요')) return false;
        
        if($("#vd_logo_url_exist").val() != "Y") {
            if(!check_input('vd_logo_url','회사로고나 딜러 로고 이미지를 선택하세요')) return false;
        }
        
        if($("#vd_main_image_url_exist").val() != "Y") {
        if(!check_input('vd_main_image_url','딜러 사진 이미지를 선택하세요')) return false;        
        }
    }

    if (!$('input[name="yak"]').is(':checked')) {
        alert("광고신청 동의서에 동의하셔야 합니다.");
        return false;
    }

    $("#pay_button").hide();

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    
    ad_method = $('input:radio[name="ad_method"]:checked').val();

    if (statusText === "success") {
        alert('등록이 정상적으로 등록되었습니다.');
        if (ad_method === 'vehicle_dealer') location.href = "/community/vehicle.php";
        if (ad_method === 'business_platinum') location.href = "/community/business.php";
        if (ad_method === 'recruit_gold') location.href = "/community/recruit.php";
        if (ad_method === 'recruit_platinum') location.href = "/community/recruit.php";
        
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
        $("#pay_button").show();
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function SET_RESET() {
    
    ad_method = $('input:radio[name="ad_method"]:checked').val();
    
    location.href='ad_request.php?save_method='+ad_method;
    
}

function GET_PREVIOUS_ADVERTISING_LIST() {
    
    ad_method = $('input:radio[name="ad_method"]:checked').val();
    let company_name = '';
    

    if (ad_method === 'recruit_platinum') {    
         
        if(!check_input('rp_company_name','검색할 회사명을 입력하세요')) return false;  
            
        document.getElementById("btnModal").click();             
        company_name = $("#rp_company_name").val();
        
    }
    
    if (ad_method === 'recruit_gold') {        
        
        if(!check_input('rg_company_name','검색할 회사명을 입력하세요')) return false;
        
        document.getElementById("btnModal").click();   
        company_name = $("#rg_company_name").val();
        
    }
    
    if (ad_method === 'business_platinum') {
        
        if(!check_input('bp_company_name','검색할 회사명을 입력하세요')) return false;
        document.getElementById("btnModal").click();   
        
        company_name = $("#bp_company_name").val();
         
    }
    
    
    if (ad_method === 'vehicle_dealer') {
        
    //    if(!check_input('vd_company_name','검색할 회사명을 입력하세요')) return false;
        document.getElementById("btnModal").click();   
        company_name = $("#vd_company_name").val();
    }
    
    
    
    $("#previous_advertising").html('');

    $.ajax({
        url: 'ajax/ajax_advertisement.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "previous_advertising_list",
            company_name: company_name,
            ad_method: ad_method

        },
        timeout: 10000,
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if (status === "success") {

                let html = json_data.items.item;

                $("#previous_advertising").html(html);
             
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

function GET_INFO(ad_method, num) {

    $.ajax({
        url: 'ajax/ajax_advertisement.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "previous_advertising_info",
            num: num,
            ad_method: ad_method

        },
        timeout: 10000,
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if (status === "success") {

                let item = json_data.items.item;
                
                $("#ad_company_id").val(item.ad_company_id);
                $("#listing_id").val(item.listing_id);
                $("#company_name").val(item.company_name);
                
                if (ad_method === 'recruit_platinum') {    

                    $("#rp_validity_period").val(item.validity_period);
                    if(item.payment_amount == "0") $("#rp_payment_amount").html("무료");
                    else $("#rp_payment_amount").html(item.payment_amount);
                    
                    $("#rp_state_code").val(item.state_code);
                    GET_SELECT_CITY_NAME('rp', 'all',item.city_name);
                    
                    $("#rp_city_extra_container").html(item.state_city_html);
                                        
                    $("#rp_company_name").val(item.company_name);
                    $("#rp_company_website").val(item.company_website);
                    $("#rp_company_address").val(item.company_address);
                    $("#rp_company_state_code").val(item.company_state_code);
                    if(item.company_state_code == "CA") $("#rp_ca_have_15").show();
                    else $("#rp_ca_have_15").hide();
                    $(`input[name="rp_has_15_plus_employees"][value="${item.has_15_plus_employees}"]`).prop('checked', true);                    
                    //$("#rp_desired_start_date").val(item.desired_start_date);
                    $("#rp_contact_name").val(item.contact_name);
                    $("#rp_contact_email").val(item.contact_email);
                    $("#rp_contact_phone").val(item.contact_phone);
                    $("#rp_job_type").val(item.first_job_type);
                    $("#rp_job_opening_information").val(item.job_opening_information);
                    $("#rp_title").val(item.title);
                    
                    $("#rp_job_type_extra_container").html(item.html_job_type);
                    
                    if(item.logo_image_url != "") $("#rp_logo_image_url_exist").val("Y");
                    if(item.sub_image_01_url != "") $("#rp_sub_image_01_url_exist").val("Y");
                    if(item.sub_image_02_url != "") $("#rp_sub_image_02_url_exist").val("Y");
                    if(item.sub_image_03_url != "") $("#rp_sub_image_03_url_exist").val("Y");
                    if(item.sub_image_04_url != "") $("#rp_sub_image_04_url_exist").val("Y");
                    if(item.sub_image_05_url != "") $("#rp_sub_image_05_url_exist").val("Y");
                    if(item.sub_image_06_url != "") $("#rp_sub_image_06_url_exist").val("Y");
                    
                    SET_IMG(item.logo_image_url,'rp_img_logo');
                    SET_IMG(item.sub_image_01_url,'rp_img_img1');
                    SET_IMG(item.sub_image_02_url,'rp_img_img2');
                    SET_IMG(item.sub_image_03_url,'rp_img_img3');
                    SET_IMG(item.sub_image_04_url,'rp_img_img4');
                    SET_IMG(item.sub_image_05_url,'rp_img_img5');
                    SET_IMG(item.sub_image_06_url,'rp_img_img6');                    
                    
                }
                
                if (ad_method === 'recruit_gold') {    

                    $("#rg_validity_period").val(item.validity_period);
                    if(item.payment_amount == "0") $("#rg_payment_amount").html("무료");
                    else $("#rg_payment_amount").html(item.payment_amount);
                    
                    $("#rg_state_code").val(item.state_code);
                    GET_SELECT_CITY_NAME('rg', 'all',item.city_name);
                    
                    $("#rg_city_extra_container").html(item.state_city_html);
                    
                    $("#rg_company_name").val(item.company_name);
                    $("#rg_company_website").val(item.company_website);
                    $("#rg_company_address").val(item.company_address);
                    $("#rg_company_state_code").val(item.company_state_code);
                    if(item.company_state_code == "CA") $("#rg_ca_have_15").show();
                    else $("#rg_ca_have_15").hide();
                    $(`input[name="rg_has_15_plus_employees"][value="${item.has_15_plus_employees}"]`).prop('checked', true);                    
                    //$("#rg_desired_start_date").val(item.desired_start_date);
                    $("#rg_contact_name").val(item.contact_name);
                    $("#rg_contact_email").val(item.contact_email);
                    $("#rg_contact_phone").val(item.contact_phone);
                    $("#rg_job_type").val(item.first_job_type);
                    $("#rg_job_opening_information").val(item.job_opening_information);
                    $("#rg_title").val(item.title);
                    
                    $("#rg_job_type_extra_container").html(item.html_job_type);
                    
                    if(item.logo_image_url != "") $("#rg_logo_image_url_exist").val("Y");
                    if(item.sub_image_01_url != "") $("#rg_sub_image_01_url_exist").val("Y");
                    if(item.sub_image_02_url != "") $("#rg_sub_image_02_url_exist").val("Y");
                    if(item.sub_image_03_url != "") $("#rg_sub_image_03_url_exist").val("Y");
                    if(item.sub_image_04_url != "") $("#rg_sub_image_04_url_exist").val("Y");
                    if(item.sub_image_05_url != "") $("#rg_sub_image_05_url_exist").val("Y");
                    
                    SET_IMG(item.logo_image_url,'rg_img_logo');
                    SET_IMG(item.sub_image_01_url,'rg_img_img1');
                    SET_IMG(item.sub_image_02_url,'rg_img_img2');
                    SET_IMG(item.sub_image_03_url,'rg_img_img3');
                    SET_IMG(item.sub_image_04_url,'rg_img_img4');
                    SET_IMG(item.sub_image_05_url,'rg_img_img5');
                    
                    
                }
                
                if (ad_method === 'business_platinum') {    

                    $("#bp_validity_period").val(item.validity_period);
                    if(item.payment_amount == "0") $("#bp_payment_amount").html("무료");
                    else $("#bp_payment_amount").html(item.payment_amount);
                    
                    $("#bp_state_code").val(item.state_code);
                    GET_SELECT_CITY_NAME('bp', 'all',item.city_name);
                    //$("#bp_desired_start_date").val(item.desired_start_date);
                    $("#bp_company_name").val(item.company_name);
                    $("#bp_contact_name").val(item.contact_name);
                    $("#bp_contact_email").val(item.contact_email);
                    $("#bp_contact_phone").val(item.contact_phone);
                    $("#bp_business_type").val(item.first_business_type);                    
                    $("#bp_title").val(item.title);
                    $("#bp_content").val(item.content);                    
                    
                    if(item.main_image_url != "") $("#bp_main_image_url_exist").val("Y");
                    if(item.sub_image_01_url != "") $("#bp_sub_image_01_url_exist").val("Y");
                    if(item.sub_image_02_url != "") $("#bp_sub_image_02_url_exist").val("Y");
                    if(item.sub_image_03_url != "") $("#bp_sub_image_03_url_exist").val("Y");
                    if(item.sub_image_04_url != "") $("#bp_sub_image_04_url_exist").val("Y");
                    if(item.sub_image_05_url != "") $("#bp_sub_image_05_url_exist").val("Y");
                    
                    SET_IMG(item.main_image_url,'bp_img_main');
                    SET_IMG(item.sub_image_01_url,'bp_img_img1');
                    SET_IMG(item.sub_image_02_url,'bp_img_img2');
                    SET_IMG(item.sub_image_03_url,'bp_img_img3');
                    SET_IMG(item.sub_image_04_url,'bp_img_img4');
                    SET_IMG(item.sub_image_05_url,'bp_img_img5');
                                        
                }
                
                if (ad_method === 'vehicle_dealer') {    

                    $("#vd_validity_period").val(item.validity_period);
                    if(item.payment_amount == "0") $("#vd_payment_amount").html("무료");
                    else $("#vd_payment_amount").html(item.payment_amount);
                    
                    //$("#vd_desired_start_date").val(item.desired_start_date);
                    $("#vd_company_name").val(item.company_name);
                    $("#vd_company_website").val(item.company_website);
                    $("#vd_contact_name").val(item.contact_name);
                    $("#vd_dealer_website").val(item.dealer_website);
                    $("#vd_listing_address1").val(item.listing_address1);
                    $("#vd_contact_email").val(item.contact_email);
                    $("#vd_contact_phone").val(item.contact_phone);
                    
                    $("#vd_state_code").val(item.state_code);
                    GET_SELECT_CITY_NAME('vd', 'all',item.city_name);

                    $("#vd_dealer_introduction").val(item.dealer_introduction);                    
                    
                    if(item.logo_url != "") $("#vd_logo_url_exist").val("Y");
                    if(item.main_image_url != "") $("#vd_main_image_url_exist").val("Y");
                    
                    SET_IMG(item.logo_url,'vd_logo');
                    SET_IMG(item.main_image_url,'vd_main_image');

                                        
                }
                
                 document.querySelector('#uc-adver-modal .uc-modal-close-default').click();

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

function SET_IMG(image_url, img_id) {
    
    if(image_url != "") {
        $('#'+img_id+' .preview-box').addClass('show');
        //$('#'+img_id+'  .preview-box .image-preview').attr('src', item.logo_image_url);
        $('#'+img_id+' .preview-box .image-preview').prop('src', image_url);        
        $('#'+img_id+' .placeholder-text').html('이미지');
        $('#'+img_id+' .btn-remove-x').css('display', 'flex');
    }else {
        $('#'+img_id+' .preview-box').removeClass('show');
        $('#'+img_id+' .preview-box .image-preview').prop('src', '');        
        $('#'+img_id+' .placeholder-text').html('이미지</span><div class="btn-remove-x" style="display: none;">');
        $('#'+img_id+' .btn-remove-x').css('display', 'none');
    }
    
}

$(document).ready(function () {

    $("#rp_ca_have_15").hide();
    $("#rg_ca_have_15").hide();
    
    var options = {
        beforeSerialize: function($form, options) {
            ad_method = $('input:radio[name="ad_method"]:checked').val();
            SET_COMMON_VALUE(ad_method);

        },
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#formp').ajaxForm(options);
    
    $('#rp_desired_start_date').datepicker({
        dateFormat: 'mm/dd/yy', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });
    
    $('#rg_desired_start_date').datepicker({
        dateFormat: 'mm/dd/yy', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });
    
    $('#bp_desired_start_date').datepicker({
        dateFormat: 'mm/dd/yy', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });
                
    $('#vd_desired_start_date').datepicker({
        dateFormat: 'mm/dd/yy', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
    });    

    $('input[name="ad_method"]').change(function () {
        var val = $(this).val();
        $('.desc-content').hide();
        $('#content-' + val).show();
    });

    document.querySelectorAll('.custom-file-container').forEach(container => {
        const fileInput = container.querySelector('.real-file-input');
        const previewBox = container.querySelector('.preview-box');
        const previewImg = container.querySelector('.image-preview');
        const placeholder = container.querySelector('.placeholder-text');
        const removeBtn = container.querySelector('.btn-remove-x');
        const originalText = placeholder.innerText; // 초기 텍스트 기억

        // 파일 선택 시
        fileInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewBox.classList.add('show');
                    placeholder.innerText = file.name;
                    removeBtn.style.display = 'flex';
                };
                reader.readAsDataURL(file);
            }
        });

        // X 버튼 클릭 시 초기화
        removeBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation(); // 라벨 클릭 이벤트 방지

            const dataValue = $(this).attr('data');
            
            if(dataValue != "") $("#"+dataValue).val('');
            
            fileInput.value = '';
            previewBox.classList.remove('show');
            placeholder.innerText = originalText;
            this.style.display = 'none';
        });
    });

    $('#rp_contact_phone').mask('000-000-0000');
    $('#rg_contact_phone').mask('000-000-0000');
    $('#bp_contact_phone').mask('000-000-0000');
    $('#vd_contact_phone').mask('000-000-0000');
    
    // 추가 버튼 클릭
    $(document).on('click', '.btn-add-job-type', function () {
        var prefix = $(this).data('prefix');
        var $container = $('#' + prefix + '_job_type_extra_container');
        var $originalSelect = $('#' + prefix + '_job_type');

        if (!$container.length || !$originalSelect.length) return;

        var row =
            '<div class="job-type-added-row">' +
                '<article class="post type-post panel uc-transition-toggle" style="margin-top:6px;">' +
                    '<div class="row child-cols g-2 uc-grid" data-uc-grid="">' +
                        '<div class="post-header panel vstack justify-between gap-1 w-full">' +
                            '<div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60 md:d-flex z-1">' +
                                '<div class="w-110px"></div>' +
                                '<div class="w-full" style="display:flex; align-items:center; gap:6px;">' +
                                    '<select class="form-select rounded text-gray-900 text-opacity-60" name="' + prefix + '_job_type[]"' +
                                        ' style="height:32px; padding:2px 8px; font-size:13px;">' +
                                        $originalSelect.html() +
                                    '</select>' +
                                    '<button type="button"' +
                                        ' class="btn-remove-job-type"' +
                                        ' style="height:32px; line-height:32px; background-color:#dc3545; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;"' +
                                    '>삭제</button>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</article>' +
            '</div>';

        $container.append(row);
    });
    
    // 추가 버튼 클릭
    $(document).on('click', '.btn-add-state', function () {
        
        id_cnt++;
        
        var prefix = $(this).data('prefix');        
                
        var $container = $('#' + prefix + '_city_extra_container');
        var $originalSelect = $('#' + prefix + '_state_code');

               
        if (!$container.length || !$originalSelect.length) return;
               
        let id_name = prefix + "_" + id_cnt;

        var row =
            '<div class="job-type-added-row">' +
                '<article class="post type-post panel uc-transition-toggle" style="margin-top:6px;">' +
                   ' <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">' +
                    '    <div class="post-header panel vstack justify-between gap-1 w-full uc-first-column">' +
                    '        <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60 md:d-flex z-1">' +
                    '            <div class="w-110px"></div><div class="w-full" style="display:flex; align-items:center; gap:6px;">' +
                    '                <div class="w-150px"><select class="form-select rounded w-full p-1 text-gray-900 text-opacity-60"' +                   
                    '                        id="' + id_name + '_state_code"' +
                    '                        name="' + prefix + '_state_code['+id_cnt+']"' +
                    '                        onchange="GET_SELECT_CITY_NAME(\'' + id_name + '\',\'one\');"   >' +
                                        $originalSelect.html() +
                    '                </select>' +
                    '                </div>' +
                    '                <div class="w-150px" style="width:165px !important;">' +
                    '                <select class="form-select rounded p-1 text-gray-900 text-opacity-60"' +
                    '                        id="' + id_name + '_city_name"' +
                    '                        name="' + prefix + '_city_name['+id_cnt+']">' +
                    '                    <option value="">도시선택</option>' +
                    '                </select>' +
                    '                </div>' +
                    '                <button type="button" class="btn-remove-job-type" style="height:32px; line-height:32px; background-color:#dc3545; color:#fff; border:none; border-radius:4px; padding:0 12px; font-size:13px; cursor:pointer; white-space:nowrap;">삭제</button>' +
                    '                </div>' +
                    '            </div>' +
                    '        </div>' +
                    '    </div>' +
                    '</article>' +                  
            '</div>';

                    

        $container.append(row);
    });

    // 삭제 버튼 클릭
    $(document).on('click', '.btn-remove-job-type', function () {
        $(this).closest('.job-type-added-row').remove();
    });  
    
    if (save_method) {
        $('input[name="ad_method"][value="' + save_method + '"]')
            .prop('checked', true)
            .trigger('change');
    }




});