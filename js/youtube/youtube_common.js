let category_1 = $("#h_category_1").val();
let category_2 = $("#h_category_2").val();
let sort = $("#h_sort").val();

function GO_SECTION2(el,cate) {

    $(el).siblings().removeClass('nactive');
    $(el).addClass('nactive');

    if(cate !== "") category_2 = cate
    GET_HTML();
}

function GO_SECTION(cate) {

    const target = $('#' + cate);

    target.siblings().removeClass('nactive');

    target.addClass('nactive');

    if(cate !== "") category_2 = cate
    GET_HTML();

}
function GO_SORT(el,st) {

    $(el).siblings().removeClass('nactive');
    $(el).addClass('nactive');

    sort = st;
    GET_HTML();
}

function GET_HTML() {

    $.ajax({
        url : '/youtube/ajax/ajax_youtube.php',
        type : 'GET',
        dataType : "text",
        data : {
            ac : "movie_list",
            s_category_1 : category_1,
            s_category_2 : category_2,
            s_sort : sort

        },
        timeout: 10000,
        beforeSend:function(){
        },
        success : function(data){

            let json_data = JSON.parse(data);

            let status = json_data.status;

            if(status === "success") {

                let html = json_data.items.item;
                console.log(json_data);
                console.log("EEE");
                $("#result_movie").html(html);

                add_event();
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

function add_event() {


        const youtubeTriggers = document.querySelectorAll('.youtube-trigger');
        const playerContainer = document.getElementById('youtube-player-container');
        const modal = document.getElementById('uc-youtube-modal');

        youtubeTriggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                // 모달 안에 iframe 생성 및 삽입
                playerContainer.innerHTML = `
                    <iframe
                        width="100%"
                        height="100%"
                        src="https://www.youtube.com/embed/${videoId}?autoplay=1"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>`;
            });
        });
        
        //  autoplay;

        modal.addEventListener('hidden', function() {
            playerContainer.innerHTML = '';
        });

}

function add_event_old() {

    document.addEventListener('DOMContentLoaded', function() {
        const youtubeTriggers = document.querySelectorAll('.youtube-trigger');
        const playerContainer = document.getElementById('youtube-player-container');
        const modal = document.getElementById('uc-youtube-modal');



        youtubeTriggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                // 모달 안에 iframe 생성 및 삽입
                playerContainer.innerHTML = `
                    <iframe
                        width="100%"
                        height="100%"
                        src="https://www.youtube.com/embed/${videoId}?autoplay=1"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>`;
            });
        });

        modal.addEventListener('hidden', function() {
            playerContainer.innerHTML = '';
        });
    });

}

$(document).ready(function() {
    GO_SECTION(g_section);
});