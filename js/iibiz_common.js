let MAX_FILE_SIZE =  100 * 1024;

function FILE_SIZE_CHECK(file_this) {
    if ( file_this.files[0] != null ) {
        var fileSize = f.files[0].size;
        if ( fileSize > MAX_FILE_SIZE ) {
            alert("파일용량은 100KB 이하만 가능합니다.");
            $(file_this).val('');
        }
    }
}

function setCookie(name, value, options = {}) {

  options = {
    path: '/', // 경로 지정
    ...options // 아규먼트로 옵션을 넘겨줬을경우 전개연산자로 추가 갱신
  };

  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString(); // 생 Date 객체라면 형식에 맞게 인코딩
  }

  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) { // 밸류가 없다면
      updatedCookie += "=" + optionValue;
    }
  }

  document.cookie = updatedCookie; // 새로 갱신
}

function deleteCookie(name) { // 해당 쿠키 요소만 삭제

  if(name === "PHPSESSID") return;
  setCookie(name, "", {
    'max-age': -1
  })
}

function deleteAllCookies() {
   var cookies = document.cookie.split(";");
   for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      var eqPos = cookie.indexOf("=");
      var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
      deleteCookie(name.trim());
   }
}

function goUrl(url) {
 
 deleteAllCookies();
 
 location.href=url;     
 
}

function goUrlDealer(url) {
 
    const s_car_maker = Cookies.get('s_car_maker');
    const s_min_car_year = Cookies.get('s_min_car_year');
    const s_max_car_year = Cookies.get('s_max_car_year');
    const s_state_code = Cookies.get('s_state_code');
    const s_city_name = Cookies.get('s_city_name');
    const s_listing_price_start = Cookies.get('s_listing_price_start');
    const s_listing_price_end = Cookies.get('s_listing_price_end');
    const s_car_mileage_start = Cookies.get('s_car_mileage_start');
    const s_car_mileage_end = Cookies.get('s_car_mileage_end');
    const s_kind = Cookies.get('s_kind');
    const s_keyword = Cookies.get('s_keyword');
    const s_cnt = Cookies.get('s_cnt');

    deleteAllCookies();

    Cookies.set('s_car_maker',  s_car_maker, { expires: 1 });
    Cookies.set('s_min_car_year', s_min_car_year, { expires: 1 });    
    Cookies.set('s_max_car_year', s_max_car_year, { expires: 1 });      
    Cookies.set('s_state_code', s_state_code, { expires: 1 });
    Cookies.set('s_city_name', s_city_name, { expires: 1 });
    Cookies.set('s_listing_price_start', s_listing_price_start, { expires: 1 });
    Cookies.set('s_listing_price_end', s_listing_price_end, { expires: 1 });
    Cookies.set('s_car_mileage_start', s_car_mileage_start, { expires: 1 });
    Cookies.set('s_car_mileage_end', s_car_mileage_end, { expires: 1 });
    Cookies.set('s_kind', s_kind, { expires: 1 });
    Cookies.set('s_keyword', s_keyword, { expires: 1 });
    Cookies.set('s_cnt', s_cnt, { expires: 1 }); 

    location.href=url;     

}

function calculate_loan() {
    
    let loan_amount = $("#loan_amount").val();
    let loan_year = $("#loan_year").val();
    let loan_rate = $("#loan_rate").val();
    
    if(loan_amount == "" || parseInt(loan_amount) < 1) {
        alert("Loan amount를 입력하세요")
        $("#loan_amount").focus();
        return false;
    }
    
    if(loan_year == "" || parseInt(loan_year) < 1) {
        alert("loan_year를 입력하세요")
        $("#loan_year").focus();
        return false;
    }
    
    if(loan_rate == "") {
        alert("loan_rate를 입력하세요")
        $("#loan_rate").focus();
        return false;
    }
    
    
    let r = (loan_rate / 100) / 12;
    let n = loan_year * 12;

    let payment = loan_amount * (r *  Math.pow(1 + r, n)) / ( Math.pow(1 + r, n) - 1);
    
    $("#loan_payment").val(formatNumber(payment));
    
}

function calculate_mortgage() {
    
    
 
    let mor_price = $("#mor_price").val();
    let mor_down_payment = $("#mor_down_payment").val();
    let mor_term = $("#mor_term").val();
    let mor_rate = $("#mor_rate").val();
    
    let mor_tax = $("#mor_tax").val();
    let mor_insurance = $("#mor_insurance").val();
    let mor_pmi = $("#mor_pmi").val();
    
     if(mor_price == "" || parseInt(mor_price) < 1) {
        alert(" Purchase price를 입력하세요")
        $("#mor_price").focus();
        return false;
    }
    
    if(mor_down_payment == "" || parseInt(mor_down_payment) < 1) {
        alert("Down payment를 입력하세요")
        $("#mor_down_payment").focus();
        return false;
    }
    
    if(mor_term == "" || parseInt(mor_term) < 1) {
        alert("Mortgage term를 입력하세요")
        $("#mor_term").focus();
        return false;
    }
    
    if(mor_rate == "") {
        alert(" Interest rate를 입력하세요")
        $("#mor_rate").focus();
        return false;
    }
    
    if(mor_tax == "" || parseInt(mor_tax) < 1) {
        alert("roperty tax를 입력하세요")
        $("#mor_tax").focus();
        return false;
    }
    
    if(mor_insurance == "" || parseInt(mor_insurance) < 1) {
        alert("Property insurance를 입력하세요")
        $("#mor_insurance").focus();
        return false;
    }
        
    if(mor_pmi == "") mor_pmi = 0;    
 
    let r = (mor_rate / 100) / 12;
    let n = mor_term * 12;

    const down_p = mor_price - (mor_price * (mor_down_payment / 100));    // 다운페이 금액
    
    const temp_payment = down_p * (r *  Math.pow(1 + r, n)) / ( Math.pow(1 + r, n) - 1);
    
    const temp_tax = mor_tax / 12;
    const temp_insurance = mor_insurance / 12;
    const temp_pmi = (down_p * mor_pmi) / 12;
    
    let payment = temp_payment + temp_tax + temp_insurance;
    
    if(mor_pmi > 20) payment = payment + temp_pmi;
    
    $("#mor_payment").val(formatNumber(payment)); 
    
}

function formatNumber(num) {
    
  return num.toLocaleString('ko-KR', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  });
  
}