function GET_SELECT_CITY_NAME(id) {

    let s_state_code = $("#" + id + '_state_code').val();

    if (s_state_code == '-1') return;

    $.ajax({
        url: '/community/ajax/ajax_business.php',
        type: 'GET',
        dataType: "text",
        data: {
            ac: "select_one_city_name",
            s_state_code: s_state_code

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

        let rp_contact_name = $("#rp_contact_name").val();
        let rp_contact_phone = $("#rp_contact_phone").val();
        let rp_contact_email = $("#rp_contact_email").val();

        let rp_desired_start_date = $("#rp_desired_start_date").val();
        let rp_desired_end_date = $("#rp_desired_end_date").val();

        $("#contact_name").val(rp_contact_name);
        $("#contact_phone").val(rp_contact_phone);
        $("#contact_email").val(rp_contact_email);

        $("#company_name").val(rp_company_name);
        $("#company_website").val(rp_company_website);
        $("#company_address").val(rp_company_address);

        $("#desired_start_date").val(rp_desired_start_date);
        $("#desired_end_date").val(rp_desired_end_date);

    }

    if (ad_method === 'recruit_gold') {

        let rg_company_name = $("#rg_company_name").val();
        let rg_company_website = $("#rg_company_website").val();
        let rg_company_address = $("#rg_company_address").val();

        let rg_contact_name = $("#rg_contact_name").val();
        let rg_contact_phone = $("#rg_contact_phone").val();
        let rg_contact_email = $("#rg_contact_email").val();

        let rg_desired_start_date = $("#rg_desired_start_date").val();
        let rg_desired_end_date = $("#rg_desired_end_date").val();

        $("#contact_name").val(rg_contact_name);
        $("#contact_phone").val(rg_contact_phone);
        $("#contact_email").val(rg_contact_email);

        $("#company_name").val(rg_company_name);
        $("#company_website").val(rg_company_website);
        $("#company_address").val(rg_company_address);

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

        $("#company_name").val(bp_company_name);
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

        $("#company_name").val(vd_company_name);
        $("#company_website").val(vd_company_website);

        $("#desired_start_date").val(vd_desired_start_date);
        $("#desired_end_date").val(vd_desired_end_date);

        }

}
function showRequest(formData, jqForm, options) {

    ad_method = $('input:radio[name="ad_method"]:checked').val();

    // 구인구직 platinum
    if (ad_method === 'recruit_platinum') {

        if(!check_input('rp_desired_start_date','광고 희망일을 선택하세요')) return false;
        
        if(!check_input('rp_company_name','회사명을 입력하세요')) return false;
        if(!check_input('rp_company_address','기업주소를 입력하세요')) return false;

        if(!check_input('rp_contact_name','담당자명을 입력하세요')) return false;
        if(!check_input('rp_contact_phone','담당자 연락처를 입력하세요')) return false;
        if(!check_input('rp_contact_email','담당자 이메일을 입력하세요')) return false;

        if(!check_input('rp_city_name','주를 선택하고 도시를 선택하세요')) return false;

        if(!check_input('rp_logo_image_url','로고 이미지를 선택하세요')) return false;
        if(!check_input('rp_title','제목을 입력하세요')) return false;
        if(!check_input('rp_subtitle','제목 밑에 나올 소제목을 입력하세요')) return false;
        //if(!check_input('rp_main_image_background_url','로고이미지 하단에 나올 배경 이미지를 선택하세요')) return false;

        //if(!check_input('rp_desired_start_date','희망 게시 시작일을 입력하세요')) return false;
        //if(!check_input('rp_desired_end_date','희망 게시 종료일을 입력하세요')) return false;

    }

    // 구인구직 gold
    if (ad_method === 'recruit_gold') {

        if(!check_input('rg_desired_start_date','광고 희망일을 선택하세요')) return false;

        if(!check_input('rg_company_name','회사명을 입력하세요')) return false;
        if(!check_input('rg_company_address','기업주소를 입력하세요')) return false;

        if(!check_input('rg_contact_name','담당자명을 입력하세요')) return false;
        if(!check_input('rg_contact_phone','담당자 연락처를 입력하세요')) return false;
        if(!check_input('rg_contact_email','담당자 이메일을 입력하세요')) return false;

        if(!check_input('rg_city_name','주를 선택하고 도시를 선택하세요')) return false;

        if(!check_input('rg_logo_image_url','로고 이미지를 선택하세요')) return false;
        if(!check_input('rg_title','제목을 입력하세요')) return false;


        //if(!check_input('rp_desired_start_date','희망 게시 시작일을 입력하세요')) return false;
        //if(!check_input('rp_desired_end_date','희망 게시 종료일을 입력하세요')) return false;



    }

    // 비지니스 platinum
    if (ad_method === 'business_platinum') {


        if(!check_input('bp_desired_start_date','광고 희망일을 선택하세요')) return false;
        
        if(!check_input('bp_company_name','회사명을 입력하세요')) return false;

        if(!check_input('bp_contact_name','담당자명을 입력하세요')) return false;
        if(!check_input('bp_contact_phone','담당자 연락처를 입력하세요')) return false;
        if(!check_input('bp_contact_email','담당자 이메일을 입력하세요')) return false;

        if(!check_input('bp_city_name','주를 선택하고 도시를 선택하세요')) return false;

        if(!check_input('bp_main_image_url','목록에 표시될 대표 이미지를 선택하세요')) return false;
        if(!check_input('bp_title','제목을 입력하세요')) return false;


        //if(!check_input('rp_desired_start_date','희망 게시 시작일을 입력하세요')) return false;
        //if(!check_input('rp_desired_end_date','희망 게시 종료일을 입력하세요')) return false;



    }

    // 딜러 광고
    if (ad_method === 'vehicle_dealer') {

        if(!check_input('vd_desired_start_date','광고 희망일을 선택하세요')) return false;

        if(!check_input('vd_company_name','회사명을 입력하세요')) return false;

        if(!check_input('vd_contact_name','딜러명을 입력하세요')) return false;
        if(!check_input('vd_contact_phone','딜러 연락처를 입력하세요')) return false;
        if(!check_input('vd_contact_email','딜러 이메일을 입력하세요')) return false;

        if(!check_input('vd_listing_address1','딜러 주소를 입력하세요')) return false;

        if(!check_input('vd_logo_url','회사로고나 딜러 로고 이미지를 선택하세요')) return false;
        if(!check_input('vd_main_image_url','딜러 사진 이미지를 선택하세요')) return false;



        //if(!check_input('rp_desired_start_date','희망 게시 시작일을 입력하세요')) return false;
        //if(!check_input('rp_desired_end_date','희망 게시 종료일을 입력하세요')) return false;



    }

    if (!$('input[name="yak"]').is(':checked')) {
        alert("광고신청 동의서에 동의하셔야 합니다.");
        return false;
    }

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    if (statusText === "success") {
        alert('등록이 정상적으로 수행되었습니다.');
        location.href = "/community/";
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
    }
}


$(document).ready(function () {

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

            fileInput.value = '';
            previewBox.classList.remove('show');
            placeholder.innerText = originalText;
            this.style.display = 'none';
        });
    });

});

