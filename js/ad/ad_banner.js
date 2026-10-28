var id_cnt = 1;


function check_input(name,msg) {

    name_value = $("#"+name).val();

    if(name_value === '') {
        alert(msg);
        $("#"+name).focus();
        return false;
    }

    return true;


}

function VIEW_SIZE() {
    
    const banner_type = $('input:radio[name="banner_type"]:checked').val();
    const banner_location = $("#"+banner_type+"_location").val();
    
    const banner = banner_data[banner_type].banners.find(
    b => b.id === banner_location
    );

    let size_txt = "가로 "+banner.image_w+" 픽셀 * 세로 "+banner.image_h+" 픽셀";

    $("#"+banner_type+"_size").html(size_txt);    
    $("#banner_upload_size").html(size_txt);    
    
    CAL_AMOUNT('off');
    
}

function SET_COMMON_VALUE(method) {

        let banner_location = $("#"+method+"_location").val();
        let validity_period = $("#"+method+"_validity_period").val();        
        
        $("#banner_location").val(banner_location);
        $("#validity_period").val(validity_period);
    
}

function showRequest(formData, jqForm, options) {

    let banner_type = $('input:radio[name="banner_type"]:checked').val();
                            
    let ad_enabled = $("#ad_enabled").val();                            
    
    if(ad_enabled == "N") {
        alert('광고 게시 가능 확인 버튼을 클릭해 주시기 바랍니다.');
        return false;
    }
    
    if(!check_input(banner_type+'_location','배너를 선택하세요')) return false;
    if(!check_input(banner_type+'_validity_period','기간을 선택해 주세요')) return false;
    
    if(!check_input('company_name','기업명을 입력하세요')) return false;
    if(!check_input('contact_email','담당자 이메일을 입력하세요')) return false;

    if(!check_input('desired_start_date','광고 게시 희망일을 입력하세요')) return false;            
    
    if(!check_input('main_image_url','배너 이미지를 선택하세요')) return false;
    
    if (!$('input[name="yak"]').is(':checked')) {
        alert("광고신청 동의서에 동의하셔야 합니다.");
        return false;
    }

    $("#pay_button").hide();

    return true;
}

function showResponse(responseText, statusText, xhr, $form) {
    
    if (statusText === "success") {
        
        let json_data = JSON.parse(responseText);

        let num = json_data.num;
        
        if(pay_yn_banner === 'N') {            
            go_free_ad();
            return;
        }
                
        // const stripe = Stripe('pk_test_51Tem4pJrnxNGZT5aMzgAM8fxIx0cITYLMVHsY3eTThFNF8j8J7J2D2gLllH6ZjBIvqXb2KC8wXTGNz4qXV2lK6Jt00EOAsEYEc');
        const stripe = Stripe('pk_live_51Tem4pJrnxNGZT5ayI6oHLcLpTQ1lTeidpDTRTpf7EN1krP5qA5M2UmYulrhg373dVM9ZLlOX4hxTJDuTbEHNWcB005YPxLD0s');


        let banner_type = $('input:radio[name="banner_type"]:checked').val();
        let banner_location = $("#"+banner_type+"_location").val();
        
        $.ajax({
            url: 'ajax/create_checkout_session.php',
            type: 'POST',
            dataType: 'json',
            data: {
                order_id: num,
                banner_type: banner_type,
                banner_location: banner_location
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
        
    } else {
        alert('등록 중 오류가 발생했습니다.');
        alert('오류사항 : ' + responseText);
        $("#pay_button").show();
    }
}

function go_free_ad() {
    
    alert('배너 등록이 정상적으로 등록되었습니다.');
    location.href = "/";
        
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function CHECK_ENABLE_BANNER() {
    
     let banner_type = $('input:radio[name="banner_type"]:checked').val();
     let banner_location = $("#"+banner_type+"_location").val();
     let validity_period = $("#"+banner_type+"_validity_period").val();        
     let desired_start_date = $("#desired_start_date").val();
     
     if(banner_location == "") {
         alert('배너 위치를 먼저 선택하세요');
         return;
     }
     
     if(validity_period == "") {
         alert('광고 기간을 선택하세요');
         return;
     }
     
     if(desired_start_date == "") {
         alert('광고 희망일을 선택하세요');
         return;
     }
     
     
     if (isPastDate(desired_start_date)) {
        alert("오늘 이전의 날짜는 선택할 수 없습니다.");
        $("#desired_start_date").val('');
        return;
    }

     $.ajax({
        url: 'ajax/ajax_banner.php',
        type: 'POST',
        dataType: "text",
        data: {
            ac: "check_banner_empty",
            banner_type: banner_type,
            banner_location: banner_location,
            validity_period: validity_period,
            desired_start_date: desired_start_date

        },
        timeout: 10000,
        beforeSend: function () {
        },
        success: function (data) {

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if (status === "success") {

                let msg = json_data.msg;

                if(msg == "empty") {
                    
                    alert('배너 광고가 가능합니다.');
                    $("#ad_enabled").val('Y');
                }
                else {
                    
                    let end_date = json_data.items.item;
                    
                    alert('이미 예약된 배너광고가 있어 사용이 불가능합니다.\n'+end_date+' 날짜이후를 선택하세요');
                    $("#ad_enabled").val('N');
                }
             
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

function isPastDate(dateString) {
    
    const parts = dateString.split('/');
    if (parts.length !== 3) return false; 

    const month = parseInt(parts[0], 10) - 1; 
    const day = parseInt(parts[1], 10);
    const year = parseInt(parts[2], 10);
    
    const selectedDate = new Date(year, month, day);
    
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    
    return selectedDate < today;
}

$(document).ready(function () {
    
    var options = {
        beforeSerialize: function($form, options) {
            banner_type = $('input:radio[name="banner_type"]:checked').val();
            SET_COMMON_VALUE(banner_type);

        },
        beforeSubmit: showRequest,
        success: showResponse
    };

    $('#formp').ajaxForm(options);
    
    $('#desired_start_date').datepicker({
        minDate: 0,
        dateFormat: 'mm/dd/yy', //Input Display Format 변경
        language: 'ko'        // 한글 출력 필요 시 설정
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

    $('#contact_phone').mask('000-000-0000');

});


function CAL_AMOUNT(vali) {
 
 let banner_type = $('input:radio[name="banner_type"]:checked').val();
 let banner_location = $("#"+banner_type+"_location").val();
 let validity_period = $("#"+banner_type+"_validity_period").val();           
  
 if(banner_location == "") {
     if(vali != "off") alert('배너 위치를 먼저 선택하세요');
     return;
 }
 
 if(validity_period == "") {
     if(vali != "off") alert('광고 기간을 선택하세요');
     return;
 }
 
  $.ajax({
        url: 'ajax/ajax_banner.php',
        type: 'POST',
        dataType: "text",
        data: {
            ac: "get_banner_amount",
            banner_type: banner_type,
            banner_location: banner_location,
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
                $("#"+banner_type+"_payment_amount").html("$"+total_amount);
             
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
 