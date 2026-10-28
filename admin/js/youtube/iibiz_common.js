function CHANGE_CATEGORY1(sp,id) {

    $.ajax({
        url : '/admin/youtube/ajax/ajax_youtube_process.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "change_category_1",
            start_position : sp,
            s_category_1 : $("#"+id+"category_1").val()

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html = json_data.items.item;

                $("#"+id+"category_2").html(html);

            }



        },
        error : function(request, status, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            var err=JSON.parse(request.responseText);

            alert(err.resData[0].errorMsg);

        },
        complete:function(){
        }
    });

}

 function openImageModal(element, title) {
        const img = element.querySelector('img');
        
        if (!img || !img.src || img.src.trim() === '') {
            alert('이미지가 없습니다.');
            return false;
        }
        
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('imageModalImage');
        const modalTitle = document.getElementById('imageModalTitle');
        
        modalImage.src = img.src;
        modalTitle.textContent = title;
        modal.classList.add('active');
    }

    function closeImageModal(event) {
        // 배경 클릭 시에만 닫기 (콘텐츠 클릭 시 닫지 않음)
        if (event && event.target.id !== 'imageModal') {
            return;
        }
        
        const modal = document.getElementById('imageModal');
        modal.classList.remove('active');
    }

    // ESC 키로 모달 닫기
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeImageModal();
        }
    });
    
    
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