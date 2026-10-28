<!DOCTYPE html>
<html lang="ko" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>마당엔</title>
        <meta name="description" content="미주 한인들의 놀이터">
        <meta name="keywords" content="마당엔">
      
       <!-- Open Graph Tags -->
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:title" content="마당엔">
        <meta property="og:description" content="미주 한인들의 놀이터">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="마당엔">
        <meta property="og:image" content="http://madangn.storycom.co.kr/images/ogimg.png">
        <meta property="og:image:type" content="image/png">

        <!-- preload head styles -->
        <link rel="preload" href="/css/unicons.min.css" as="style">
        <link rel="preload" href="/css/swiper-bundle.min.css" as="style">

        <!-- preload footer scripts -->
        <link rel="preload" href="/js/libs/jquery.min.js" as="script">
        <link rel="preload" href="/js/libs/scrollmagic.min.js" as="script">
        <link rel="preload" href="/js/libs/swiper-bundle.min.js" as="script">
        <link rel="preload" href="/js/libs/anime.min.js" as="script">
        <link rel="preload" href="/js/helpers/data-attr-helper.js" as="script">
        <link rel="preload" href="/js/helpers/swiper-helper.js" as="script">
        <link rel="preload" href="/js/helpers/anime-helper.js" as="script">
        <link rel="preload" href="/js/helpers/anime-helper-defined-timelines.js" as="script">
        <link rel="preload" href="/js/uikit-components-bs.js" as="script">
        <link rel="preload" href="/js/app.js" as="script">
        <link rel="preload" href="/js/file.js" as="script">

        <!-- app head for bootstrap core -->
        <script src="/js/app-head-bs.js"></script>

        <!-- favicon -->
        <link rel="shortcut icon" href="/images/favicon.ico">

        <!-- include uni-core components -->
        <link rel="stylesheet" href="/js/uni-core/css/uni-core.min.css">

        <!-- include styles -->
        <link rel="stylesheet" href="/css/unicons.min.css">
        <link rel="stylesheet" href="/css/prettify.min.css">
        <link rel="stylesheet" href="/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="/css/pretendard.css">
        <link rel="stylesheet" href="/js/font-awesome/css/font-awesome.min.css">

        <!-- include main style -->
        <link rel="stylesheet" href="/css/theme/style0.css">
        <link rel="stylesheet" href="/css/nouislider.min.css">
        <link rel="stylesheet" href="/css/iibiz.css">


        <!-- include scripts -->
        <script src="/js/uni-core/js/uni-core-bundle.min.js"></script>
        <script src="/js/nouislider.min.js"></script>
        <style>
.news-pager-head {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.news-pager-btn {
    border: 0;
    background: transparent;
    padding: 0;
    margin: 0;
    font: inherit;
    line-height: 1;
    color: inherit;
    cursor: pointer;
}

.news-pager-btn[hidden] {
    display: none !important;
}

.news-pager-title {
    display: inline-block;
}

@media (max-width:768px) {
.post .row, 
    .post .col-auto {
        display: block !important;
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .post img {
        width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
        object-fit: cover;
        display: block !important;
    }

   div.col-auto:has(img),
    .col-auto {
        width: 100% !important;
        max-width: 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .col-auto a {
        display: block !important;
        width: 100% !important;
    }

    .col-auto img {
        width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
        display: block !important;
        object-fit: cover;
    }
}
</style>
 <script>
document.addEventListener('DOMContentLoaded', function() {
    
    // 이벤트 위임 함수: 타겟 클래스에 따라 로직 분기
    document.addEventListener('click', function(e) {
        
        // 1. 첫 번째 모달 처리
        const trigger1 = e.target.closest('.youtube-trigger');
        if (trigger1) {
            handleYoutubeModal(trigger1, 'youtube-player-container', 'uc-youtube-modal');
        }

        // 2. 두 번째 모달 처리
        const trigger2 = e.target.closest('.youtube-trigger2');
        if (trigger2) {
            handleYoutubeModal(trigger2, 'youtube-player-container2', 'uc-youtube-modal2');
        }
    });

    // 비디오 삽입 공통 함수
    function handleYoutubeModal(trigger, containerId, modalId) {
        const playerContainer = document.getElementById(containerId);
        const videoId = trigger.getAttribute('data-video-id');
        
        if (!playerContainer) return;

        playerContainer.innerHTML = '';
        setTimeout(() => {
            playerContainer.innerHTML = `
                <iframe 
                    width="100%" height="100%" 
                    src="https://www.youtube.com/embed/${videoId}?autoplay=1" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>`;
        }, 50);
    }

    // 모달 닫힘 시 초기화 (공통)
    const modals = ['uc-youtube-modal', 'uc-youtube-modal2'];
    modals.forEach(id => {
        const modalElement = document.getElementById(id);
        if (modalElement) {
            modalElement.addEventListener('hidden', function() {
                const container = document.getElementById(id === 'uc-youtube-modal' ? 'youtube-player-container' : 'youtube-player-container2');
                if (container) container.innerHTML = '';
            });
        }
    });
});
</script>
    </head>

    <body class="uni-body panel bg-white text-gray-900 overflow-x-hidden">


<!--  youtube -->
<div id="uc-youtube-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog lg:max-w-900px bg-white text-dark">
        <button class="uc-modal-close-default p-0 icon-3 btn border-0 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button" style="z-index: 10;">
            <i class="unicon-close"></i>
        </button>
        <div class="panel vstack justify-center items-center gap-0">
            <div class="ratio ratio-16x9 w-100">
                <div id="youtube-player-container">
                </div>
            </div>
        </div>
    </div>
</div>
<!--  youtube -->
<div id="uc-youtube-modal2" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog lg:max-w-900px bg-white text-dark">
        <button class="uc-modal-close-default p-0 icon-3 btn border-0 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button" style="z-index: 10;">
            <i class="unicon-close"></i>
        </button>
        <div class="panel vstack justify-center items-center gap-0">
            <div class="ratio ratio-16x9 w-100">
                <div id="youtube-player-container2">
                </div>
            </div>
        </div>
    </div>
</div>

      <!--  사이드메뉴 -->
        <div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
            <div class="uc-offcanvas-bar bg-white text-dark">
                <header class="uc-offcanvas-header hstack justify-between items-center pb-4 bg-white " style="position:relative !important;">
                    <div class="uc-logo">
                        <a href="/" class="h5 text-none text-gray-900">
                            <img class="w-80px" src="/images/logo.png" alt="마당엔">
                        </a>
                    </div>
                    <button class="uc-offcanvas-close p-0 icon-3 btn border-0 dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
                        <i class="unicon-close"></i>
                    </button>
                </header>

                <div class="panel">
                    <!--form id="search-panel" class="form-icon-group vstack gap-1 mb-3" data-uc-sticky="">
                        <input type="email" class="form-control form-control-md fs-6" placeholder="Search..">
                        <span class="form-icon text-gray">
                            <i class="unicon-search icon-1"></i>
                        </span>
                    </form-->
                    <ul class="nav-y gap-narrow fw-bold fs-5" data-uc-nav>
                        <li class="uc-parent">
                            <a href="javascript:goUrl('/news/');">뉴스</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                   <li><a href="javascript:return false;" onclick="goUrl('/news/');">뉴스홈</span></a></li>
                                    <li><a href="javascript:return false;" onclick="goUrl('/news/society.php');">사회</a></li>
                                    <li><a href="javascript:return false;" onclick="goUrl('/news/global.php');">세계</a></li>
                                    <li><a href="javascript:return false;" onclick="goUrl('/news/political_economy.php');">정치경제</a></li>
                                    <li><a href="javascript:return false;" onclick="goUrl('/news/entertainment.php');">연예</a></li>
                                    <li><a href="javascript:return false;" onclick="goUrl('/news/sports.php');">스포츠</a></li>
                            </ul>
                        </li>
                        <li class="uc-parent">
                             <a href="javascript:goUrl('/youtube/">유튜브</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                <li><a href="javascript:return false;" onclick="goUrl('/youtube/');" style="color:#000000"><b>Youtube홈</b></a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/madangn.php');">MadangN TV</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/financial.php');">재정/보험</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/realestate.php');">부동산</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/rogg.php');">ROGG</a></li>
                            </ul>
                        </li>
                         <li class="uc-parent">
                             <a href="/community/">커뮤니티</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                <li><a href="/community/" style="color:#6351ab"><b>커뮤니티홈</b></a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/community/recruit.php');">구인/구직</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/community/market.php');">사고팔고</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/community/business.php');">비지니스 홍보</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/community/vehicle.php');">자동차</a></li>
                            </ul>
                        </li>
                         <li class="uc-parent">
                             <a href="/towninfo/">타운정보</a>
                                <ul class="uc-nav-sub" data-uc-nav="">
                                    <li><a href="/towninfo/" style="color:#0b87ab"><b>타운정보홈</b></a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/marketsale.php');">마켓세일</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/find_people.php');">사람찾기</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/notification.php');">행사/알림</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/event.php');">마당엔 이벤트</a></li>
                            </ul>
                        </li>
                         <li class="uc-parent">
                            <a href="/realestate">부동산</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                               <li><a href="/realestate" style="color:#f39c04"><b>부동산홈</b></a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/house.php');">주택</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/rent.php');">렌트</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/commercial.php');">커머셜</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/business.php');">사업체</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/agent.php');">에이전트</a></li>
                            </ul>
                        </li>
                         <li>  <a href="{{ADVERTISE_LOGIN1}}">유료광고신청</a></li>
                        <li class="hr opacity-10 my-1"></li>
                     
                    </ul>
                    <ul class="social-icons nav-x mt-2">

                     <div class="gap-1 lg:gap-1">
                                <div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn2 text-dark" href="https://www.facebook.com/profile.php?id=61590134739989&mibextid=wwXIfr" target="_blank" >
                           <img src="/images/sns_03.png" alt="페이스북" />
                        </a>
                    </div>
                    <div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn2 text-dark" href="https://www.youtube.com/@madangn5253" target="_blank" >
                             <img src="/images/sns_01.png" alt="유튜브" />

                        </a>
                    </div>
                    <div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn2 text-dark" href="https://instagram.com/madangn_usa " target="_blank" >
                             <img src="/images/sns_04.png" alt="인스타그램" />

                        </a>
                    </div>
                         </div>
                      
                    </ul>
                   
                </div>
            </div>
        </div>

       

       <!--  Search -->
        <div id="uc-search-modal" data-uc-modal="overlay: true">
            <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 rounded">
                <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
                    <i class="unicon-close"></i>
                </button>
                <div class="panel vstack justify-center items-center gap-2 text-center px-3 py-8">
                    <h2 class="h4 md:h3 m-0">마당엔 검색하기</h2>
                     <form class="hstack gap-1 border-bottom2 sbtn" name="" action="#" style="margin-top:25px;height:45px;">
                                  <input type="search" name="q" class="form-control-plaintext fs-6 sm:fs-6 w-4\/5" placeholder="검색어를 입력하세요" aria-label="Search" autofocus>
                                  <button type="submit" style="text-align:right;margin-top:6px;"><i class="unicon-search icon-3"></i></button>
                               </form>
                </div>
            </div>
        </div>
    

        <!--  Login -->
        <div id="uc-account-modal" data-uc-modal="overlay: true">
            <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 rounded">
                <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button" id="login_close">
                    <i class="unicon-close"></i>
                </button>
                <div class="panel vstack gap-2 md:gap-4 text-center">
                    <ul class="account-tabs-nav nav-x justify-center h6 py-2 border-bottom d-none" data-uc-switcher="animation: uc-animation-slide-bottom-small, uc-animation-slide-top-small">
                        <li><a href="#">Sign in</a></li>
                        <li><a href="#">Reset password</a></li>
                     
                    </ul>
                    <div class="account-tabs-content uc-switcher px-3 lg:px-4 py-4 lg:py-8 m-0 lg:mx-auto vstack justify-center items-center">
                        <div class="w-100">
                            <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                                <h4 class="h5 lg:h4 m-0">마당엔 로그인</h4>
                                <div class="panel vstack gap-2 w-100 sm:w-350px mx-auto">
                                    <form class="vstack gap-2" name="form_login" id="form_login" method="get">
                                        <input class="form-control form-control-sm h-40px w-full fs-5 bg-white" type="text" name="login_id" id="login_id" placeholder="아이디" required>
                                        <input class="form-control form-control-sm h-40px w-full fs-5 bg-white" type="password" name="login_passwd" id="login_passwd"  placeholder="비밀번호" autocomplete="new-password" required>
                                        <div class="hstack justify-between items-start text-start">
                                            <div class="form-check text-start">
                                                <!--input class="form-check-input rounded-0" type="checkbox" id="inputCheckRemember">
                                                <label class="hstack justify-between form-check-label fs-6 sm:fs-6" for="inputCheckRemember">자동로그인</label-->
                                            </div>
                                            <a href="#" class="uc-link fs-6" data-uc-switcher-item="1">비밀번호 찾기</a>
                                        </div>
                                        <button class="btn btn-primary btn-sm lg:mt-1 fs-4" type="button" onclick="GO_LOGIN();">로그인</button>
                                    </form>
                                    <div class="panel h-24px">
                                        <hr class="position-absolute top-50 start-50 translate-middle hr m-0 w-100">
                                        <span class="position-absolute top-50 start-50 translate-middle px-1 fs-7 text-uppercase bg-white dark:bg-gray-800">Or</span>
                                    </div>
                                
                                </div>
                                <p class="fs-5 sm:fs-5">아직 회원이 아니신가요? <a href="/member/register.php">회원가입</a></p>
                            </div>
                        </div>
                       
                        <div class="w-100">
                            <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                                <h4 class="h5 lg:h4 m-0">비밀번호 재설정</h4>
                                <div class="panel w-100 sm:w-350px">
                                    <form class="vstack gap-2">
                                        <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" placeholder="Your email" name="login_email" id="login_email" required>
                                        <!--div class="form-check text-start">
                                            <input class="form-check-input rounded-0" type="checkbox" id="inputCheckVerify" required>
                                            <label class="form-check-label fs-7 sm:fs-6" for="inputCheckVerify"> <span>I'm not a robot</span>. </label>
                                        </div-->
                                        <button class="btn btn-primary btn-sm lg:mt-1" type="button" onclick="LOGIN_SEARCH();">비밀번호 재설정</button>
                                    </form>
                                </div>
                                <p class="fs-7 sm:fs-6 mt-2 sm:m-0">비밀번호를 기억하시나요? <a class="uc-link" href="#" data-uc-switcher-item="0">로그인</a></p>
                            </div>
                        </div>
                        


                        


                    </div>
                </div>
            </div>
        </div>


        <!-- Header start -->
        <header class="uc-header header-two uc-navbar-sticky-wrap z-999">
            <nav class="uc-navbar-container shadow-xs bg-white dark:bg-gray-900 fs-6 z-1">

            <div class="uc-top-navbar panel z-3 min-h-30px lg:min-h-40px border-bottom d-block md:d-none" style="margin-right:10px;">
                 <div class="container max-w-xl">
                        <div class="hstack">
                            <div class="uc-navbar-left gap-2 lg:gap-2">
                               
                            </div>
                            <div class="uc-navbar-right gap-1 lg:gap-1">
                                 <div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn2 text-dark" href="https://www.facebook.com/profile.php?id=61590134739989&mibextid=wwXIfr" target="_blank" >
                           <img src="/images/sns_03.png" alt="페이스북" />
                        </a>
                    </div>
                    <div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn2 text-dark" href="https://www.youtube.com/@madangn5253" target="_blank" >
                             <img src="/images/sns_01.png" alt="유튜브" />

                        </a>
                    </div>
                    <div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn2 text-dark" href="https://instagram.com/madangn_usa " target="_blank" >
                             <img src="/images/sns_04.png" alt="인스타그램" />

                        </a>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>  <!-- 모바일 SNS end -->

                <div class="uc-center-navbar panel z-2">
                    <div class="container max-w-xl">
                        <div class="uc-navbar min-h-72px lg:min-h-100px text-gray-900" data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                            <div class="uc-navbar-left">

                               <div class="d-block lg:d-none">
                                    <a class="uc-menu-trigger" href="#uc-menu-panel" data-uc-toggle></a>
                                </div>

                                <div class="hstack">
                            <div class="uc-navbar-left gap-3 lg:gap-2">
                                 <ul class="nav-x gap-1 d-none lg:d-flex">
                                    <li>
                                          <a class="border-0 p-0 duration-0 top_btn2" href="https://www.facebook.com/profile.php?id=61590134739989&mibextid=wwXIfr" target="_blank" >
                                          <img src="/images/sns_03.png" alt="페이스북" />
                                          </a>
                                    </li>
                                     <li>
                                        <a class="border-0 p-0 duration-0 top_btn2" href="https://www.youtube.com/@madangn5253" target="_blank" >
                                        <img src="/images/sns_01.png" alt="유튜브" />
                                       </a>
                                    </li>
                                    <li>
                                         <a class="border-0 p-0 duration-0 top_btn2" href="https://instagram.com/madangn_usa" target="_blank" >
                                         <img src="/images/sns_04.png" alt="인스타그램" />
                                         </a>
                                    </li>
                                   
                                
                                </ul>


                            </div>
                            </div>
                            </div>
                            <div class="uc-navbar-center">
                                <div class="uc-logo d-none md:d-block">
                                    <a href="/">
                                        <img class="w-110px d-block dark:d-none" src="/images/logo.png" alt="마당엔">
                                    </a>
                                </div>
                                <div class="uc-logo d-block md:d-none">
                                    <a href="/">
                                        <img class="w-80px d-block dark:d-none" src="/images/logo.png" alt="마당엔">
                                    </a>
                                </div>
                            </div>
                            <div class="uc-navbar-right">
                            
                    <!-- IF START 'NOTLOGIN' -->
                             <div class="uc-navbar-item d-none lg:d-flex">
                                    <div class="hstack gap-1 fs-7 lg:fs-6 fw-bold">
                                        <a href="#uc-account-modal" class="text-none" data-uc-toggle onclick="GO_LOGIN_VIEW();" id="login_button_display"><i class="fa fa-lock"></i><span> 로그인</span></a>
                                    </div>
                                </div>
                                <div class="uc-navbar-item d-none 1g:d-flex">
                                    <div class="nav-x gap-2 lg:gap-3 fs-7 lg:fs-6 fw-bold">
                                        <a href="/member/register.php" class="text-none">  <i class="fa fa-user"></i> 회원가입</a>
                                    </div>
                                </div>
                    <!-- IF END 'NOTLOGIN' -->
                    <!-- IF START 'LOGIN' -->
    
                                <div class="vr h-18px my-auto d-none sm:d-block"></div>
                        <div class="uc-navbar-item d-none sm:d-flex">
                            <div class="nav-x gap-2 lg:gap-3 fs-7 lg:fs-6 fw-bold">
                                {{T_NICKNAME}}님 환영합니다. <a href="/member/logout.php" class="text-none">  <i class="fa fa-unlock"></i> 로그아웃</a>
                            </div>
                        </div>

                        <div class="vr h-18px my-auto d-none sm:d-block"></div>
                        <div class="uc-navbar-item d-none sm:d-flex">
                            <div class="nav-x gap-2 lg:gap-3 fs-7 lg:fs-6 fw-bold">
                                <a href="/member/register_info.php" class="text-none">  <i class="fa fa-pencil-square-o"></i> 정보수정</a>
                            </div>
                        </div>
                        <div class="vr h-18px my-auto d-none sm:d-block"></div>
                        <div class="uc-navbar-item d-none sm:d-flex">
                            <div class="nav-x gap-2 lg:gap-3 fs-7 lg:fs-6 fw-bold">
                                <a href="/member/memo.php" class="text-none">  <i class="fa fa-envelope-open"></i> 쪽지함</a>
                            </div>
                        </div>
                     <!-- IF END 'LOGIN' -->                                                               
                            </div>
                    <!-- IF START 'NOTLOGIN' -->
                            <div class="uc-navbar-right  d-block lg:d-none">
                                  <div style="display: flex; gap: 8px;margin-top:20px;margin-right:10px;">
                                    <div class="icon-circle"><a href="#uc-account-modal" class="text-none" data-uc-toggle><i class="fa fa-lock" aria-hidden="true"></i></a></div>
                                    <div class="icon-circle"><a href="/member/register.php" class="text-none"><i class="fa fa-user" aria-hidden="true"></i></a></div>
                                    <div class="icon-circle"><a href="mailto:it@madangn.com" class="text-none"><i class="fa fa-envelope-open" aria-hidden="true" style="font-size:13px;margin-bottom:6px;"></i></a></div>
                                </div>
                            </div>
                    <!-- IF END 'NOTLOGIN' -->
                    <!-- IF START 'LOGIN' -->     
                            <div class="uc-navbar-right  d-block lg:d-none">
                                  <div style="display: flex; gap: 8px;margin-top:20px;margin-right:10px;">
                                    <div class="icon-circle"><a href="/member/logout.php" class="text-none"><i class="fa fa-unlock" aria-hidden="true"></i></a></div>
                                    <div class="icon-circle"><a href="/member/register_info.php" class="text-none"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                                    <div class="icon-circle"><a href="/member/memo.php" class="text-none"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size:13px;margin-bottom:6px;"></i></a></div>
                                </div>
                            </div>
                     <!-- IF END 'LOGIN' -->                       
                        </div>
                    </div>
                </div>
                <div class="uc-bottom-navbar panel hstack z-1 min-h-48px lg:min-h-56px bg-white border-top2 border-bottom" data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                    <div class="container max-w-xl">
                        <div class="hstack">
                            <div class="uc-navbar-left gap-2 lg:gap-3 d-none lg:d-flex">
                                <div class="uc-navbar-item">
                                    <div>
                                       <a class="uc-menu-trigger" href="#uc-menu-panel" data-uc-toggle></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uc-navbar-center z-2">
                                <div>
                                    <ul class="uc-navbar-nav gap-8 fs-4 fw-semibold text-dark " style="--uc-nav-height: 56px">

                                    <li>
                                        <a href="javascript:return false;" onclick="goUrl('/news/');">뉴스<span data-uc-navbar-parent-icon></span></a>
                                        <div class="uc-navbar-dropdown ft-primary text-unset fs-5 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                               <li><a href="javascript:return false;" onclick="goUrl('/news/');" style="color:#22548f"><b>뉴스홈</b></span></a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/society.php');">사회</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/global.php');">세계</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/political_economy.php');">정치경제</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/entertainment.php');">연예</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/sports.php');">스포츠</a></li>
                                               
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:return false;" onclick="goUrl('/youtube/');">유튜브<span data-uc-navbar-parent-icon></span></a>

                                         <div class="uc-navbar-dropdown ft-primary text-unset fs-5 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <li><a href="javascript:return false;" onclick="goUrl('/youtube/');" style="color:#000000"><b>Youtube홈</b></a></li>
                                                <li><a href="javascript:return false;" onclick="goUrl('/youtube/madangn.php');">MadangN TV</a></li>
                                                <li><a href="javascript:return false;" onclick="goUrl('/youtube/financial.php');">재정/보험</a></li>
                                                <li><a href="javascript:return false;" onclick="goUrl('/youtube/realestate.php');">부동산</a></li>
                                                <li><a href="javascript:return false;" onclick="goUrl('/youtube/rogg.php');">ROGG</a></li>
                                               
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                     <!--   <a href="javascript:return false;" onclick="goUrl('/community/');">커뮤니티<span data-uc-navbar-parent-icon></span></a> -->
                                        <a href="javascript:return false;" onclick="goUrl('/community/recruit.php');">커뮤니티<span data-uc-navbar-parent-icon></span></a>

                                          <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <!--         <li><a href="/community/" style="color:#6351ab"><b>커뮤니티홈1</b></a></li> -->
                                                <li><a href="javascript:return false;" style="color:#6351ab" onclick="goUrl('/community/recruit.php');">구인/구직</a></li>
                                                <li><a href="javascript:return false;" onclick="goUrl('/community/market.php');">사고팔고</a></li>
                                                <li><a href="javascript:return false;" onclick="goUrl('/community/business.php');">비지니스 홍보</a></li>
                                                <li><a href="javascript:return false;" onclick="goUrl('/community/vehicle.php');">자동차</a></li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                   <!--     <a href="javascript:return false;" onclick="goUrl('/towninfo/');">타운정보<span data-uc-navbar-parent-icon></span></a> -->
                                        <a href="javascript:return false;" onclick="goUrl('/towninfo/marketsale.php');">타운정보<span data-uc-navbar-parent-icon></span></a>

                                         <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <!--     <li><a href="javascript:return false;" onclick="goUrl('/towninfo/');" style="color:#0b87ab"><b>타운정보홈</b></a></li> -->
                                        <li><a href="javascript:return false;" style="color:#0b87ab" onclick="goUrl('/towninfo/marketsale.php');">마켓세일</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/find_people.php');">사람찾기</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/notification.php');">행사/알림</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/event.php');">마당엔 이벤트</a></li>
                                                
                                               
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:return false;" onclick="goUrl('/realestate/');">부동산 <span data-uc-navbar-parent-icon></span></a>
                                        <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                 <li><a href="/realestate" style="color:#f39c04"><b>부동산홈</b></a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/house.php');">주택</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/rent.php');">렌트</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/commercial.php');">커머셜</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/business.php');">사업체</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/agent.php');">에이전트</a></li>
                                         
                                            </ul>
                                        </div>
                                    </li>
                                    
                                </ul>
                                </div>
                            </div>
                            <div class="uc-navbar-right gap-2 lg:gap-3 d-none lg:d-flex">
                                  <div style="display:flex;gap:18px;align-items: center;justify-content: center;">
                                  
                                <a href="{{ADVERTISE_LOGIN1}}" class="text-none fs-5 fw-bold">
                                <i class="fa fa-check-square-o fw-normal fs-4 text-secondary"></i>  유료광고신청
                                    
                                </a>

                                 <!--div>
                                    <a href="#uc-search-modal" data-uc-toggle>
                                        <img  src="/images/search2.svg" alt="Search">
                                    </a>
                                  </div-->
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Header end -->



       

       <!-- Wrapper start -->
           <div id="wrapper" class="wrap overflow-hidden-x">
                                      
        
      <div class="side-banner-wrap">
          <div class="banner-pc-left">
          <a href="{{왼쪽_세로배너-1_link}}" target="_blank"><img src="{{왼쪽_세로배너-1_img}}" alt="Left"></a>
          <a href="{{왼쪽_세로배너-2_link}}" target="_blank"><img src="{{왼쪽_세로배너-2_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{왼쪽_세로배너-3_link}}" target="_blank"><img src="{{왼쪽_세로배너-3_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{왼쪽_세로배너-4_link}}" target="_blank"><img src="{{왼쪽_세로배너-4_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{왼쪽_세로배너-5_link}}" target="_blank"><img src="{{왼쪽_세로배너-5_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{왼쪽_세로배너-6_link}}" target="_blank"><img src="{{왼쪽_세로배너-6_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{왼쪽_세로배너-7_link}}" target="_blank"><img src="{{왼쪽_세로배너-7_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{왼쪽_세로배너-8_link}}" target="_blank"><img src="{{왼쪽_세로배너-8_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{왼쪽_세로배너-9_link}}" target="_blank"><img src="{{왼쪽_세로배너-9_img}}" alt="Left" style="margin-top:8px;"></a>                    
          </div>
          <div class="banner-pc-right">
          <a href="{{오른쪽_세로배너-1_link}}" target="_blank"><img src="{{오른쪽_세로배너-1_img}}" alt="Right"></a>
          <a href="{{오른쪽_세로배너-2_link}}" target="_blank"><img src="{{오른쪽_세로배너-2_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{오른쪽_세로배너-3_link}}" target="_blank"><img src="{{오른쪽_세로배너-3_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{오른쪽_세로배너-4_link}}" target="_blank"><img src="{{오른쪽_세로배너-4_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{오른쪽_세로배너-5_link}}" target="_blank"><img src="{{오른쪽_세로배너-5_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{오른쪽_세로배너-6_link}}" target="_blank"><img src="{{오른쪽_세로배너-6_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{오른쪽_세로배너-7_link}}" target="_blank"><img src="{{오른쪽_세로배너-7_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{오른쪽_세로배너-8_link}}" target="_blank"><img src="{{오른쪽_세로배너-8_img}}" alt="Left" style="margin-top:8px;"></a>
          <a href="{{오른쪽_세로배너-9_link}}" target="_blank"><img src="{{오른쪽_세로배너-9_img}}" alt="Left" style="margin-top:8px;"></a>
          </div>
      </div> <!-- 세로 배너 PC --> 
 

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel py-2">
                    <div class="container max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                               
                                <div class="block-content">
                                    <div class="panel row child-cols-12 md:child-cols">

                                <!-- Right Start -->
                                      <div class="lg:col-9">


                                         <div class="row child-cols-12">
                                           <div class="lg:col-7">
                                              <div>
                                                <article class="post type-post panel vstack gap-1 lg:gap-2">
                                                    <div class="post-media panel uc-transition-toggle overflow-hidden">
                                                        <div class="featured-image bg-gray-25 overflow-hidden ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-opaque" src="{{TOP_1_IMG}}" data-src="{{TOP_1_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{TOP_1_LINK}}" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-1">
                                                        
                                                        <h3 class="post-title h5 lg:h4 m-0 text-truncate-1 mt-narrow">
                                                            <a class="text-none hover:text-primary duration-150" href="{{TOP_1_LINK}}">{{TOP_1_TITLE}}</a>
                                                        </h3>
                                                        <p class="fs-6 opacity-90 text-truncate-3 mb-3"><a class="text-none" href="{{TOP_1_LINK}}">{{TOP_1_CONTENT}}</a></p>
                                                        
                                                    </div>
                                                </article>
                                            </div>

                                            <div class="banner-row mb-2 ">
                                                <div class="banner-item"><a href="{{중앙_작은_배너-1_link}}" target="_blank"><img src="{{중앙_작은_배너-1_img}}" alt="배너1"></a></div>
                                                <div class="banner-item"><a href="{{중앙_작은_배너-2_link}}" target="_blank"><img src="{{중앙_작은_배너-2_img}}" alt="배너2"></a></div>
                                            </div><!-- 배너 -->

                                          </div><!-- lg:col-7 End -->
                                        

                                        <div class="lg:col-5">
                                            <div class="row child-cols-12 g-3 sep-x">
                                               <div>
                                                    <article class="post type-post panel">
                                                        <div class="row child-cols g-2" data-uc-grid>
                                                            <div class="col-auto">
                                                                <div class="post-media panel uc-transition-toggle overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-opaque" src="{{TOP_3_IMG}}" data-src="{{TOP_3_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{TOP_3_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-medium">
                                                                                <a class="text-none text-secondary" href="/news/political_economy.php">정치경제</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">❘</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{TOP_3_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{TOP_3_LINK}}">{{TOP_3_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel">
                                                        <div class="row child-cols g-2" data-uc-grid>
                                                            <div class="col-auto">
                                                                <div class="post-media panel uc-transition-toggle overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-opaque" src="{{TOP_4_IMG}}" data-src="{{TOP_4_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{TOP_4_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-medium">
                                                                                <a class="text-none text-secondary" href="/news/sports.php">스포츠</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">❘</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{TOP_4_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{TOP_4_LINK}}">{{TOP_4_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel">
                                                        <div class="row child-cols g-2" data-uc-grid>
                                                            <div class="col-auto">
                                                                <div class="post-media panel uc-transition-toggle overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-opaque" src="{{TOP_5_IMG}}" data-src="{{TOP_5_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{TOP_5_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-medium">
                                                                                <a class="text-none text-secondary" href="/news/society.php">사회</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">❘</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{TOP_5_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{TOP_5_LINK}}">{{TOP_5_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel">
                                                        <div class="row child-cols g-2" data-uc-grid>
                                                            <div class="col-auto">
                                                                <div class="post-media panel uc-transition-toggle overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-opaque" src="{{TOP_6_IMG}}" data-src="{{TOP_6_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{TOP_6_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-medium">
                                                                                <a class="text-none text-secondary" href="/news/global.php">세계</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">❘</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{TOP_6_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{TOP_6_LINK}}">{{TOP_6_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <div>
                                                    <article class="post type-post panel">
                                                        <div class="row child-cols g-2" data-uc-grid>
                                                            <div class="col-auto">
                                                                <div class="post-media panel uc-transition-toggle overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-opaque" src="{{TOP_7_IMG}}" data-src="{{TOP_7_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{TOP_7_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-medium">
                                                                                <a class="text-none text-secondary" href="/news/entertainment.php">연예</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">❘</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                               <span>{{TOP_7_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{TOP_7_LINK}}">{{TOP_7_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                             </div>
                                          </div>


                                        </div>

                                        <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel pt-1">
                    <div class="max-w-xl">
                        <div class="section-inner">
                            <div class="row child-cols-12 lg:child-cols-6 g-2 gx-3 uc-grid" data-uc-grid="">
                                <div class="uc-first-column">
                                    <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">
                                        <div class="block-header panel border-top pt-2">
                                            <h2 class="h5  -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                                <a class="text-none fw-bold hover:text-primary duration-150" href="/news/political_economy.php">정치경제</a>
                                            </h2>
                                        </div>
                                        <div class="block-content mt-n3">
                                            <div class="row child-cols-12 g-3 sep-x">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{MIDDLE_2_1_IMG}}" data-src="{{MIDDLE_2_1_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{MIDDLE_2_1_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <a class="fw-medium text-none text-primary" href="{{MIDDLE_2_1_LINK}}">{{MIDDLE_2_1_REPORTER_NAME}} 기자</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">|</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{MIDDLE_2_1_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_2_1_LINK}}">{{MIDDLE_2_1_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{MIDDLE_2_2_IMG}}" data-src="{{MIDDLE_2_2_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{MIDDLE_2_2_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <a class="fw-medium text-none text-primary" href="{{MIDDLE_2_2_LINK}}">{{MIDDLE_2_2_REPORTER_NAME}} 기자</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">|</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{MIDDLE_2_2_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_2_2_LINK}}">{{MIDDLE_2_2_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                       <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_2_3_LINK}}">{{MIDDLE_2_3_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                    <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_2_4_LINK}}">{{MIDDLE_2_4_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_2_5_LINK}}">{{MIDDLE_2_5_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                  <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                       <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_2_6_LINK}}">{{MIDDLE_2_6_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                             </div>
                                        </div>
                                      
                                    </div>
                                 </div>
                                <div>
                                    <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">
                                        <div class="block-header panel border-top pt-2">
                                             <h2 class="h5  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                                <a class="text-none hover:text-primary duration-150" href="/news/global.php">세계뉴스</a>
                                            </h2>
                                        </div>
                                        <div class="block-content mt-n3">
                                            <div class="row child-cols-12 g-3 sep-x">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{MIDDLE_3_1_IMG}}" data-src="{{MIDDLE_3_1_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{MIDDLE_3_1_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <a class="fw-medium text-none text-primary" href="{{MIDDLE_3_1_LINK}}">{{MIDDLE_3_1_REPORTER_NAME}} 기자</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">|</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{MIDDLE_3_1_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_3_1_LINK}}">{{MIDDLE_3_1_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{MIDDLE_3_2_IMG}}" data-src="{{MIDDLE_3_2_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{MIDDLE_3_2_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 text-opacity-60 d-none md:d-flex z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <a class="fw-medium text-none text-primary" href="{{MIDDLE_3_2_LINK}}">{{MIDDLE_3_2_REPORTER_NAME}} 기자</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sep d-none md:d-block">|</div>
                                                                        <div class="d-none md:d-block">
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{MIDDLE_3_2_DATE}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_3_2_LINK}}">{{MIDDLE_3_2_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                       <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_3_3_LINK}}">{{MIDDLE_3_3_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                    <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_3_4_LINK}}">{{MIDDLE_3_4_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_3_5_LINK}}">{{MIDDLE_3_5_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                  <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                      
                                                            <div class="uc-first-column">
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                   <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150" href="{{MIDDLE_3_6_LINK}}">{{MIDDLE_3_6_TITLE}}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                             </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->



 <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel py-3">
                    <div class="max-w-xl" style="border-top:1px solid #e4e4e4;">
                        <div class="section-inner panel vstack gap-4">
                            <div class="section-header panel vstack items-center justify-center text-center gap-1 mt-2">
                                 <h2 class="h5  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                                <a class="text-none hover:text-primary duration-150" href="/news/entertainment.php">연예뉴스</a>
                                            </h2>
                            </div>
                            <div class="section-content mt-n3">
                                <div class="row child-cols-6 md:child-cols-4 lg:child-cols-3 g-2 gy-1">
                                    <!-- LOOP START 'T_EN' -->
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle vstack gap-2">
                                                        <div class="post-media panel overflow-hidden">
                                                            <div class="featured-image bg-gray-25 ratio ratio-3x2">
                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{T_EN.T_IMG}}" data-src="{{T_EN.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                            </div>
                                                            <a href="{{T_EN.T_LINK}}" class="position-cover"></a>
                                                        </div>
                                                        <div class="post-header panel vstack gap-1">
                                                            <h3 class="post-title h6 m-0 text-truncate-2">
                                                                <a class="text-none hover:text-primary duration-150" href="{{T_EN.T_LINK}}">{{T_EN.T_TITLE}}</a>
                                                            </h3>
                                                        
                                                        </div>
                                           </article>
                                    </div>
                                    <!-- LOOP END 'T_EN' -->    
                                   
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->

                                     </div>
                                <!-- Right End -->      
                                          

                                  <!-- Left Start -->  
                                         <div class="lg:col-3 pd20 mt-ns"> 


                                                 <div class="col-auto">
                                                   <a  id="rightBannerLink1" href="{{오른쪽-1_link}}" target="_blank"><img id="rightBannerImg1" src="{{오른쪽-1_img}}" data-src="{{오른쪽-1_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->  
                                                  <div class="col-auto mt-1">
                                                    <a id="rightBannerLink2" href="{{오른쪽-2_link}}" target="_blank"><img id="rightBannerImg2" src="{{오른쪽-2_img}}" data-src="{{오른쪽-2_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->  

                                                  <div class="widget popular-widget vstack gap-2 mt-1">
                                            <div class="widget-title mt-1">
                                                <h2 class="fs-4 fw-bold2 m-0" id="mostNewsTitle">가장 많이 본 뉴스  &gt;</h2>
                                            </div>
                                            <div class="widget-content">
                                                <div class="row child-cols-12 gx-4 gy-2 sep-x" id="mostNewsList">
                                                    <!-- LOOP START 'R1_1' -->
                                                    <div class="uc-first-column">
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                                <div class="uc-first-column">
                                                                    <div class="hstack items-start gap-1">
                                                                        <span class="h5 fw-bold text-center text-primary m-0 min-w-20px">{{R1_1.T_NUM}}</span>
                                                                        <div class="post-header panel vstack justify-between gap-1">
                                                                            <h3 class="post-title fs-62 m-0 text-truncate-1">
                                                                                <a class="text-none hover:text-primary duration-150" href="{{R1_1.T_LINK}}">{{R1_1.T_TITLE}}</a>
                                                                            </h3>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                      <!-- LOOP END 'R1_1' -->
                                                </div>
                                            </div>
                                        </div> <!-- 많이 본 뉴수-->  

                                                 <div class="col-auto mt-2">
                                                 <a href="{{오른쪽-3_link}}" target="_blank"><img src="{{오른쪽-3_img}}" data-src="{{오른쪽-3_img}}" alt="#" data-uc-img="loading: lazy"></a>         
                                                  </div>
                                                  <div class="widget popular-widget vstack gap-2 mt-1">
                                            <div class="widget-title mt-1">
                                                <h2 class="fs-4 fw-bold2 m-0" id="latestNewsTitle">최신뉴스 &gt;</h2>
                                            </div>
                                            <div class="widget-content">
                                                <div class="row child-cols-12 gx-4 gy-2 sep-x" id="latestNewsList">
                                                <!-- LOOP START 'R1_2' -->
                                                    <div class="uc-first-column">                                                    
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                                <div class="uc-first-column">
                                                                    <div class="hstack items-start gap-1">
                                                                        <span class="h5 fw-bold text-center text-primary m-0 min-w-20px">{{R1_2.T_NUM}}</span>
                                                                        <div class="post-header panel vstack justify-between gap-1">
                                                                            <h3 class="post-title fs-62 m-0 text-truncate-1">
                                                                                <a class="text-none hover:text-primary duration-150"  href="{{R1_2.T_LINK}}">{{R1_2.T_TITLE}}</a>
                                                                            </h3>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>                                                    
                                                </div>
                                                <!-- LOOP END 'R1_2' -->    
                                            </div>
                                        </div> <!-- 많이 본 뉴수-->    




                                          </div>
                                    <!-- Left End-->  
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->
                <!--
                     <div class="row">
                       <div class="container max-w-xl">
                          <div class="d-block md:d-none">
                              <div class="mobile-banner-grid">
                                  <a href="#"><img src="/images/news/mb1.jpg" alt="Banner 1"></a>
                                  <a href="#"><img src="/images/news/mb2.jpg" alt="Banner 2"></a>
                                  <a href="#"><img src="/images/news/mb4.jpg" alt="Banner 3"></a>
                                  <a href="#"><img src="/images/news/mb5.jpg" alt="Banner 4"></a>
                                  <a href="#"><img src="/images/news/mb6.jpg" alt="Banner 5"></a>
                                  <a href="#"><img src="/images/news/mb7.jpg" alt="Banner 6"></a>
                              </div>
                            </div>
                         </div>
                     </div>    -->  <!-- 세로 배너 모바일 -->





      
   <div class="row">
          <div class="container max-w-xl mt-ns2">
             <div class="dot_line"></div>
          </div>
       </div>


<!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel py-2">
                    <div class="container max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                               
                                <div class="block-content">
                                    <div class="panel row child-cols-12 md:child-cols">

                                <!-- Right Start -->
                                      <div class="lg:col-9">
                                          <div class="row child-cols-12">


                                          <!-- Section start -->
<div class="section panel overflow-hidden-x">
    <div class="section-outer panel">
        <div class="max-w-xl">
            <div class="head_title">
                <h3 class="h5 lg:h5 m-0 fw-bolder"><a href="/community/recruit.php" class="text-none">구인구직</a></h3>
                <!-- div><a href="recruit.php" class="text-none fs-6 fw-semibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i> &nbsp; 전체보기</a></div -->
            </div>
            <div class="job-grid">
                <div class="job-card">
                    <div class="pp-list">
                    
<!-- LOOP START 'RECRUIT_PLATINUM' -->
            <div class="pp-item">
                <a href="{{RECRUIT_PLATINUM.T_LINK}}">
                    <div class="logo"><img src="{{RECRUIT_PLATINUM.T_LOGO_IMG}}" loading="lazy"></div>
                    <div class="info is_reg">
                        <h1>{{RECRUIT_PLATINUM.T_COMPANY_NAME}}</h1>
                        <h2>{{RECRUIT_PLATINUM.T_TITLE}}</h2>
                        <div class="region"><i class="fa fa-globe fs-3" aria-hidden="true"></i>&nbsp;{{RECRUIT_PLATINUM.T_LOCATION}} </div>                        
                    </div>
                </a>
            </div>
<!-- LOOP END 'RECRUIT_PLATINUM' -->


                    </div>
                  </div>
               </div>
            </div>  
          </div>
       </div>
                    
                  <!-- Section start -->
<div class="section panel overflow-hidden-x mt-1">
    <div class="section-outer panel">
        <div class="head_title">
            <h3 class="h5 lg:h5 m-0 fw-bolder"><a href="/community/business.php" class="text-none">비즈니스 홍보</a></h3>

        </div>
        <div class="max-w-xl">
            <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                <div class="block-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1" id="result_platinum"><style>
.post-header .post-bottom .region {font-size:0.7rem;font-family: system-ui;height:12px;margin-top:2px;text-align:right;line-height: 13px;overflow: hidden;color: #888888;}
</style>
<!-- LOOP START 'BUSINESS_PLATINUM' -->
<div>
    <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
        <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
            <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                <img class="media-cover image uc-transition-opaque" src="{{BUSINESS_PLATINUM.T_IMG}}" data-src="{{BUSINESS_PLATINUM.T_IMG}}" alt="image" data-uc-img="loading: lazy">
                <a href="{{BUSINESS_PLATINUM.T_LINK}}" class="position-cover" data-caption="image"></a>
            </figure>
        </div>
        <div class="post-header panel vstack justify-between gap-1 sm:gap-2 p-0 sm:p-12 mt-narrow sm:mt-0 w-100">
            <div class="post-top panel vstack items-start gap-2">
                <div class="post-meta panel fs-7">
                    <div class="post-category hstack gap-narrow fw-semibold text-primary">
                      &nbsp;{{BUSINESS_PLATINUM.T_BUSINESS_TYPE}}
                    </div>
                </div>
                <h3 class="post-title fs-7 mt-n1 text-truncate-2 lh-2 hiet-3">
                    <a class="text-none" href="{{BUSINESS_PLATINUM.T_LINK}}"><b><{{BUSINESS_PLATINUM.T_COMPANY_NAME}}></b> {{BUSINESS_PLATINUM.T_TITLE}}</a>
                </h3>
            </div>
            <div class="btline"></div>
            <div class="post-bottom panel gap-1 fs-7 mt-n1 text-black text-opacity-75 justify-between">
                <!--div>Bell,CA</div-->
                <div class="region"><i class="fa fa-globe fs-3" aria-hidden="true"></i>&nbsp;{{BUSINESS_PLATINUM.T_LOCATION}} </div>
            </div>
        </div>
    </article>
</div>
<!-- LOOP END 'BUSINESS_PLATINUM' -->




</div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Section end --><!-- 비즈니스 end -->   


  <!-- Section start -->
            <div class="section panel overflow-hidden mt-2">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-2 panel overflow-hidden">
                                <div class="block-header panel">
                                   
                                           <h2 class="h5  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                                <a class="text-none hover:text-primary duration-150" href="/realestate/">부동산</a>
                                           </h2>
                           
                                </div>
                                <div class="block-content">
                                    <div class="panel row child-cols-12 md:child-cols gy-4">
                                        <div class="col-12 md:col-6 mt-0">
                                          <div class="row sep-x g-4 mt-0">
                                          <!-- LOOP START 'HOUSE' -->
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-4x3 sm:ratio-16x9">
                                                                       <img class="media-cover image uc-transition-opaque" src="{{HOUSE.T_IMG}}" data-src="{{HOUSE.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="/realestate/{{HOUSE.T_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 ft-tertiary fw-medium text-gray-900 text-opacity-50 z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <span class="fw-medium text-primary2">주택</span>
                                                                            </div>
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <h3 class="post-title fs-52 fw-bold m-0 text-truncate-1">
                                                                        <a class="text-none hover:text-primary duration-150" href="/realestate/{{HOUSE.T_LINK}}">${{HOUSE.T_LIST_PRICE}}</a>
                                                                    </h3>
                                                                    <div class="fs-7 text-gray-500 text-truncate-1" style="margin-top:-6px;">
                                                                    {{HOUSE.T_UNPARSED_ADDRESS}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                          <!-- LOOP END 'HOUSE' -->   
                                          <!-- LOOP START 'RENT' -->   
                                                 <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-4x3 sm:ratio-16x9">
                                                                       <img class="media-cover image uc-transition-opaque" src="{{RENT.T_IMG}}" data-src="{{RENT.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="/realestate/{{RENT.T_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 ft-tertiary fw-medium text-gray-900 text-opacity-50 z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <span class="fw-medium text-primary2">렌트</span>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <h3 class="post-title fs-52 fw-bold m-0 text-truncate-1">
                                                                        <a class="text-none hover:text-primary duration-150" href="/realestate/{{RENT.T_LINK}}">${{RENT.T_LIST_PRICE}}</a>
                                                                    </h3>
                                                                    <div class="fs-7 text-gray-500 text-truncate-1" style="margin-top:-6px;">
                                                                    {{RENT.T_UNPARSED_ADDRESS}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                 </div>
                                          <!-- LOOP END 'RENT' -->  
                                          </div>
                                                  
                                        </div>
                                        
                                        <div>
                                            <div class="row child-cols-12 g-4 sep-x">
                                            <!-- LOOP START 'COMMERCIAL' -->   
                                                <div>
                                                   <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-4x3 sm:ratio-16x9">
                                                                       <img class="media-cover image uc-transition-opaque" src="{{COMMERCIAL.T_IMG}}" data-src="{{COMMERCIAL.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="/realestate/{{COMMERCIAL.T_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 ft-tertiary fw-medium text-gray-900 text-opacity-50 z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <span class="fw-medium text-primary2">커머셜</span>
                                                                            </div>
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <h3 class="post-title fs-52 fw-bold m-0 text-truncate-1">
                                                                        <a class="text-none hover:text-primary duration-150"  href="/realestate/{{COMMERCIAL.T_LINK}}">${{COMMERCIAL.T_LIST_PRICE}}</a>
                                                                    </h3>
                                                                    <div class="fs-7 text-gray-500 text-truncate-1" style="margin-top:-6px;">
                                                                    {{COMMERCIAL.T_UNPARSED_ADDRESS}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            <!-- LOOP END 'COMMERCIAL' -->       
                                            <!-- LOOP START 'BUSINESS' -->       
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                            <div class="col-auto uc-first-column">
                                                                <div class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                    <div class="featured-image bg-gray-25 ratio ratio-4x3 sm:ratio-16x9">
                                                                       <img class="media-cover image uc-transition-opaque" src="{{BUSINESS.T_IMG}}" data-src="{{BUSINESS.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="/realestate/{{BUSINESS.T_LINK}}" class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 ft-tertiary fw-medium text-gray-900 text-opacity-50 z-1">
                                                                        <div>
                                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                                <span class="fw-medium text-primary2">사업체</span>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <h3 class="post-title fs-52 fw-bold m-0 text-truncate-1">
                                                                        <a class="text-none hover:text-primary duration-150"  href="/realestate/{{BUSINESS.T_LINK}}">${{BUSINESS.T_LIST_PRICE}}</a>
                                                                    </h3>
                                                                    <div class="fs-7 text-gray-500 text-truncate-1" style="margin-top:-6px;">
                                                                    {{BUSINESS.T_UNPARSED_ADDRESS}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            <!-- LOOP END 'BUSINESS' -->       
                                               
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->
                                            

                                        </div>
                                     </div>
                                <!-- Right End -->      
                                          

                                  <!-- Left Start -->  
                                         <div class="lg:col-3 pd20 mt-ns"> 
                                           


                                                  <!-- banner -->  
                                                  <div class="col-auto mt-2">
                                                  <a href="{{오른쪽-4_link}}" target="_blank"><img src="{{오른쪽-4_img}}" data-src="{{오른쪽-4_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->  

                                                    <!-- banner -->  
                                                  <div class="col-auto mt-1">
                                                    <a href="{{오른쪽-5_link}}" target="_blank"><img src="{{오른쪽-5_img}}" data-src="{{오른쪽-5_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->  
                                                   <!-- banner -->  
                                                  <div class="col-auto mt-1">
                                                    <a href="{{오른쪽-6_link}}" target="_blank"><img src="{{오른쪽-6_img}}" data-src="{{오른쪽-6_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->
                                                  
                                                    <!-- banner -->  
                                                  <div class="col-auto mt-1">
                                                    <a href="{{오른쪽-7_link}}" target="_blank"><img src="{{오른쪽-7_img}}" data-src="{{오른쪽-7_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->
                                                  
                                                   <!-- banner -->  
                                                  <div class="col-auto mt-1">
                                                    <a href="{{오른쪽-8_link}}" target="_blank"><img src="{{오른쪽-8_img}}" data-src="{{오른쪽-8_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->





                                          </div>
                                    <!-- Left End-->  
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->





      
      
 <div class="row">
          <div class="container max-w-xl">
             <div class="dot_line"></div>
          </div>
       </div>

<!-- Section start -->
            <div class="section panel overflow-hidden mt-1">
                <div class="section-outer panel py-1">
                    <div class="container max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                                <div class="block-header panel">
                                    <h2 class="h5  fw-bold -ls-1 xl:-ls-2 m-0 text-inherit hstack gap-1">
                                          <a class="text-none hover:text-primary duration-150" href="/realestate/agent.php">에이전트</a>
                                     </h2>
                                </div>
                                <div class="block-content mt-n3">
                                    <div class="panel row child-cols-12 md:child-cols">

                                       <div class="panel swiper-parent mt-2">
    <div class="swiper w-100 uc-visible-toggle" 
         data-uc-swiper="items: 2; active: 2; gap: 10; speed: 500; dots: .dot-nav; next: .nav-next; prev: .nav-prev; autoplay: 4000; disable-class: d-none;" 
         data-uc-swiper-s="items: 3; gap: 24;" 
         data-uc-swiper-l="items: 5; gap: 18;">
        
        <div class="swiper-wrapper">
            <!-- 에이전트 슬라이드 시작 -->
<!-- LOOP START 'AGENT' -->            
            <div class="swiper-slide">
                <div class="profile-card">
                    <div class="profile-img"><img src="{{AGENT.T_IMG}}" alt="에이전트"></div>
                    <a href="{{AGENT.T_LINK}}" class="position-cover"></a>
                    <h3 class="consult-title">{{AGENT.T_AGENT_FULL_NAME}}</h3>
                    <div class="consult-list">
                        <ul>
                            <li>{{AGENT.T_OFFICE_NAME}}</li>
                            <li>DRE Lic.#{{AGENT.T_AGENT_DRE_LICENSE}}</li>
                        </ul>
                    </div>
                    <div class="profile-name"><a href="{{AGENT.T_LINK}}" class="text-none">에이전트 매물보기</a></div>
                </div>
            </div>
<!-- LOOP END 'AGENT' -->

            
        </div>

        <!-- 네비게이션 및 도트 -->
        <div class="swiper-pagination dot-nav gap-2 mt-3 position-relative text-primary"></div>
    </div>
</div>





                                             
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->


            

            <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="container max-w-xl">

                    <div class="section-header panel vstack items-center justify-center text-center gap-1">
                                   
                                 </div>

                                <div class="panel swiper-parent mt-2">
                                            <div class="swiper w-100 uc-visible-toggle swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden" data-uc-swiper="items: 2; active: 2; gap: 10;  speed: 500; dots: .dot-nav; next: .nav-next; prev: .nav-prev; autoplay: 4000; disable-class: d-none;" data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 5; gap: 18;">
                                                <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-189.2px, 0px, 0px); transition-delay: 0ms;">
                                                    <div class="swiper-slide swiper-slide-prev" style="width: 171.2px; margin-right: 18px;" role="group" aria-label="1 / 7">
                                                         <div class="p-1 border rounded text-center reimg">
                                                           <a href="" target="_blank"><img src="/realestate/images/b1.png" data-src="/realestate/images/Logo_BNM_Management.png" alt="#" data-uc-img="loading: lazy" class="bg-white" ></a>
                                                        </div>
                                                    </div>
                                                   <div class="swiper-slide swiper-slide-visible swiper-slide-active" style="width: 171.2px; margin-right: 18px;" role="group" aria-label="2 / 7">
                                                         <div class="p-1 border rounded text-center reimg">
                                                           <a href="https://www.youtube.com/@madangn5253" target="_blank"><img src="/realestate/images/b2.png" data-src="/realestate/images/Logo_itube.png" alt="#" data-uc-img="loading: lazy" class="bg-white" style="height:55px !important;"></a>
                                                        </div>
                                                    </div>
                                                   <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-next" style="width: 171.2px; margin-right: 18px;" role="group" aria-label="3 / 7">
                                                         <div class="p-1 border rounded text-center reimg">
                                                           <a href="https://northwesternus.com/" target="_blank"><img src="/realestate/images/b3.png" data-src="/realestate/images/Logo_Northwestern_Capital.png" alt="#" data-uc-img="loading: lazy" class="bg-white" style="height:55px !important;"></a>
                                                        </div>
                                                    </div>

                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible" style="width: 171.2px; margin-right: 18px;" role="group" aria-label="4 / 7">
                                                         <div class="p-1 border rounded text-center reimg">
                                                           <a href="https://unitiins.com/" target="_blank"><img src="/realestate/images/b4.png" data-src="/realestate/images/Logo_Partners.png" alt="#" data-uc-img="loading: lazy" class="bg-white"  style="height:55px !important;"></a>
                                                        </div>
                                                    </div>

                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible" style="width: 171.2px; margin-right: 18px;" role="group" aria-label="5 / 7">
                                                         <div class="p-1 border rounded text-center reimg">
                                                           <a href="https://roggfoundation.org/" target="_blank"><img src="/realestate/images/b5.png" data-src="/realestate/images/Logo_Rogg.png" alt="#" data-uc-img="loading: lazy" class="bg-white"  style="height:55px !important;"></a>
                                                        </div>
                                                    </div>

                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible" style="width: 171.2px; margin-right: 18px;" role="group" aria-label="6 / 7">
                                                         <div class="p-1 border rounded text-center reimg">
                                                           <a href="https://www.youtube.com/@spoontv_Korean" target="_blank"><img src="/realestate/images/b6.png" data-src="/realestate/images/Logo_spoontv.png" alt="#" data-uc-img="loading: lazy" class="bg-white" style="height:55px !important;"></a>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide" style="width: 171.2px; margin-right: 18px;" role="group" aria-label="7 / 7">
                                                         <div class="p-1 border rounded text-center reimg">
                                                           <a href="https://silveradvantageins.com/" target="_blank"><img src="/realestate/images/b7.png" data-src="/realestate/images/Logo_Silver_Advantage.png" alt="#" data-uc-img="loading: lazy" class="bg-white" style="height:55px !important;"></a>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                               
                                                <div class="swiper-pagination dot-nav gap-2 mt-3 position-relative text-primary swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                                            </div>
                                        </div>


                                          </div>
                                      </div>
                                   </div>

                         <!-- Section start -->

 
   <div class="row mt-2">
          <div class="container max-w-xl">
             <div class="dot_line"></div>
          </div>
       </div>


<!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel py-2">
                    <div class="container max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                               
                                <div class="block-content">
                                    <div class="panel row child-cols-12 md:child-cols">

                                <!-- Right Start -->
                                      <div class="lg:col-9">
                                          <div class="row child-cols-12">

                                          
<!-- Section start -->
<div class="head_title">
        <h3 class="h5 lg:h5 m-0 fw-bolder"><a href="/community/vehicle.php" class="text-none">자동차</a></h3>
    </div>
   


    <div class="section panel overflow-hidden-x">
        <div class="section-outer panel">

            <div class="max-w-xl">
                <div class="section-inner panel vstack gap-4 md:gap-6 xl:gap-8">

                    <div class="block-content panel">
                        <div class="row child-cols-12 sm:child-cols-6 md:child-cols-3 xl:child-cols-2 g-1 xl:g-1">
<!-- LOOP START 'CAR' -->                                
                            <div>
                                <article class="post type-post panel hstack sm:vstack items-start gap-2 sm:gap-0 p-2 sm:p-0 overflow-hidden border border-gray-900 border-opacity-15 text-gray-900">
                                    <div class="post-media panel overflow-hidden w-200px sm:w-100 order-1 sm:order-0">
                                        <figure class="featured-image m-0 ratio ratio-1x1 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-opaque" src="{{CAR.T_IMG}}" data-src="{{CAR.T_IMG}}" alt="image" data-uc-img="loading: lazy">
                                            <a href="/community/{{CAR.T_LINK}}" class="position-cover" data-caption="image"></a>
                                        </figure>
                                    </div>
                                    <div class="post-header panel vstack justify-between gap-1 p-0 sm:p-1 mt-narrow sm:mt-0 w-100">
                                        <div class="post-top panel vstack items-start gap-1">
                                            <div class="post-meta panel fs-6">
                                                <div class="post-category hstack gap-narrow fw-medium lh-2">
                                                    <a class="text-none fw-bold hiet-22" href="/community/{{CAR.T_LINK}}">{{CAR.T_CAR_YEAR_PURE}} {{CAR.T_CAR_MAKER}}</a>
                                                 </div>
                                            </div>
                                            
                                        </div>
                                        <div class="post-bottom fs-8 fw-medium mt-n1 text-black text-opacity-75">
                                            <div>{{CAR.T_CAR_MAKER}} {{CAR.T_CAR_MODEL}}</div>
                                            <div class="text-truncate-1">{{CAR.T_CAR_YEAR}}년식 {{CAR.T_CAR_MILEAGE}} mile {{CAR.T_FUEL_TYPE}}</div>
                                            <div class="text-truncate-1">{{CAR.T_COMPANY_NAME}} | {{CAR.T_CREATE_AT}}</div>
                                            
                                        </div>

                                         <div class="mb-n22"><h3 class="post-title fs-7 fw-bolder">
                                                                   <span class="carblue"> ${{CAR.T_LISTING_PRICE}}</span>
                                                                </h3>
                                           </div>
                                    </div>
                                </article>
                            </div>
<!-- LOOP END 'CAR' -->                                                            
                            
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab end --><!-- 자동차 프리미엄 end -->

    
<!-- Section start -->
    <div class="section panel overflow-hidden mt-2 rsd2">
        <div class="section-outer panel">
            <div class="max-w-100">
                <div class="section-inner">
                    <a class="text-none" href="{{중앙_큰배너_link}}" target="_blank" rel="nofollow">
                        <img class="d-none md:d-block" src="{{중앙_큰배너_img}}" alt="#">
                        <img class="d-block md:d-none" src="{{중앙_큰배너_img}}" alt="#">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section start -->
                                       
                                            

                                        </div>
                                     </div>
                                <!-- Right End -->      
                                          

                                  <!-- Left Start -->  
                                         <div class="lg:col-3 pd20">
                                         

                                         <div class="widget popular-widget vstack gap-2">
                                            <div class="widget-title mb-1 mt-1">
                                                <h2 class="fs-4 fw-bold2 m-0"><a href="/towninfo/notification.php" class="text-none">행사알림</a> </h2>
                                            </div>
                                            <div class="widget-content mt-n1">
                                                <div class="row child-cols-12 gx-4 gy-2 sep-x">
                                                <!-- LOOP START 'NOTI' -->    
                                                    <div class="uc-first-column">
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 uc-grid uc-grid-stack" data-uc-grid="">
                                                                <div class="uc-first-column">
                                                                    <div class="hstack items-start gap-1">
                                                                        <div class="post-header panel vstack justify-between gap-1">
                                                                            <h3 class="post-title alarm h6 m-0">
                                                                                <a class="text-none hover:text-primary duration-150" href="/towninfo/{{NOTI.T_LINK}}">{{NOTI.T_TITLE}}</a>
                                                                            </h3>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                 <!-- LOOP END 'NOTI' -->      
                                                    
                                                </div>
                                            </div>
                                        </div> <!-- 행사알림-->  


                                                 

                                                   <div class="col-auto mt-2">
                                                   <a href="{{오른쪽-9_link}}" target="_blank"><img src="{{오른쪽-9_img}}" data-src="{{오른쪽-9_img}}" alt="#" data-uc-img="loading: lazy"></a>
                                                  </div>
                                                  <!-- banner -->  
                                                 
                                          </div>
                                    <!-- Left End-->  
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->



             
   <div class="row">
          <div class="container max-w-xl">
             <div class="dot_line"></div>
          </div>
       </div>





<!-- Section start -->
            <div class="section panel overflow-hidden" style="margin-top: 20px;">
                <div class="section-outer panel">
                    <div class="container max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                               
                                
<ul class="v-tab-container2" style="justify-content: start; gap: 20px;">
<!-- LOOP START 'DEALER' -->    
            <li>
                <a href="javascript:return false;" onclick="goUrl('{{DEALER.T_LINK}}');" class="text-none">
                    <div class="v-tab-item2 " style="padding-top:4px !important; padding-bottom:4px !important">
                        <img src="{{DEALER.T_IMG}}" alt="">
                        <div class="v-tab-text2   fs-7">
                          <div class="v-tab-title">{{DEALER.T_COMPANY_NAME}}</div>
                          <div class="v-tab-name text-truncate-1">{{DEALER.T_COMPANY_NAME}}</div>
                        </div>                        
                    </div>
                </a>
            </li>
<!-- LOOP END 'DEALER' -->            
          
            

</ul><!-- Top button-->
                            
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <!-- Section end -->



             <div class="row mt-2">
          <div class="container max-w-xl">
             <div class="dot_line"></div>
          </div>
       </div>


<!-- Section start -->
            <div class="section panel overflow-hidden mt-2 mb-3">
                <div class="section-outer panel">
                    <div class="container max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                               
                                <div class="block-content">
                                    <div class="panel row child-cols-12 md:child-cols">

<!-- Section start -->
            <div class="section panel overflow-hidden-x">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner panel vstack gap-2">
                            <div class="block-header panel text-center">
                                 <div class="head_title">
                                   <h3 class="h5 lg:h5 m-0 fw-bolder">최근 영상</h3>
                                 </div>
                            </div>
                            
                            <div class="block-content panel">
                                <div class="row child-cols-6 md:child-cols-3 xl:child-cols-2 g-1">
<!-- LOOP START 'M_LATEST' -->                                
                                    <div>
                                        <article class="post type-post panel uc-transition-toggle vstack gap-1">
                                                 <div class="post-media panel overflow-hidden">
                                                    <div class="featured-image bg-gray-25 ratio ratio-16x9">
                                                        <img class="media-cover image uc-transition-opaque" src="{{M_LATEST.T_IMG}}" data-src="{{M_LATEST.T_IMG}}" alt="#" data-uc-img="loading: lazy">
                                                     </div>
                                                      <a href="#uc-youtube-modal" class="position-cover youtube-trigger"  data-video-id="{{M_LATEST.T_VIDEO_ID}}" data-uc-toggle>
                                                 </div>
                                            <div class="post-header panel">
                                                <div class="post-top panel">
                                                    
                                                    <h3 class="post-title fs-6 m-0 text-truncate-1 fw-normal">
                                                        <a class="text-none" href="#uc-youtube-modal">{{M_LATEST.T_HISTORY_TITLE}}</a>
                                                    </h3>
                                                </div>
                                                
                                            </div>
                                        </article>
                                    </div>
<!-- LOOP END 'M_LATEST' -->                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->

                            
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section end -->


                               
  </div><!-- Wrapper end -->

        <!-- Footer start -->
        <footer id="uc-footer" class="uc-footer panel uc-dark">
            <div class="footer-outer py-2 bg-white dark:bg-gray-700 dark:text-white">
                <div class="container max-w-xl">
                    <div class="footer-inner vstack">

                        <div class="uc-footer-top" style="display:flex;justify-content: space-between;align-items: center;flex-wrap: wrap;">
                            <div class="fs-6 rd py-4">
                                
                                법인명: itube &nbsp; 주소: 2041 W Orangewood Ave,Orange, CA 92868 &nbsp; 대표전화: 1-213-582-8880 &nbsp; 팩스: 1-714-636-0023 <br>
제호: 마당엔 &nbsp; 편집인: 최동인<br /><br />
<div class="d-flex md:d-none mt-2"></div>

                            </div>

                            <div class="tdd">  <button type="button" class="animate-btn btn btn-sm text-none gap-0 fs-6 btn-primary" onclick="location.href='/ad/ad_intro.php';">
                                    <span>유료광고신청</span>
                                    <i class="icon icon-narrow unicon-email fw-bold"></i>
                                </button></div>
                        </div>
                        <hr class="m-0">
                        
                        <div class="uc-footer-bottom panel vstack lg:hstack gap-4 justify-between fs-6 text-center lg:text-start py-4">
                            <div class="vstack lg:hstack gap-2">
                                <div class="footer-logo text-center">
                                    <img class="uc-logo w-100px text-gray-900 dark:text-white" src="/images/news/logo2.png" alt="마당엔">
                                </div>
                                <div class="vr mx-2 d-none lg:d-inline-flex"></div>
                                <div></div>
                                <p class="footer-copyrights">마당엔 © 2026, All rights reserved.</p>
                                <ul class="footer-site-links nav-x gap-2 fw-medium justify-center lg:justify-start">
                                    <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150" href="/member/company.php">매체소개</a></li>
                                    <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150" href="/member/privacy.php">개인정보취급방침</a></li>
                                    <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150" href="/member/agreement.php">이용약관</a></li>
                                    <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150" href="/member/youthsafe.php">청소년보호정책</a></li>
                                    <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150" href="/member/copyright.php">저작권보호정책</a></li>
                                    <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150" href="/member/email.php">이메일무단수집거부</a></li>
                                </ul>
                            </div>
                          
                    </div>
                </div>
            </div>
        </footer>

        <!-- Footer end -->

        <!-- include jquery & bootstrap js -->
                <script defer src="/js/libs/jquery.min.js"></script>
                <script defer src="/js/libs/bootstrap.min.js"></script>

        <!-- include scripts -->
        <script defer src="/js/libs/anime.min.js"></script>
        <script defer src="/js/libs/swiper-bundle.min.js"></script>
        <script defer src="/js/libs/scrollmagic.min.js"></script>
        <script defer src="/js/helpers/data-attr-helper.js"></script>
        <script defer src="/js/helpers/swiper-helper.js"></script>
        <script defer src="/js/helpers/anime-helper.js"></script>
        <script defer src="/js/helpers/anime-helper-defined-timelines.js"></script>
        <script defer src="/js/uikit-components-bs.js"></script>

        <!-- include app script -->
        <script defer src="/js/app.js"></script>
        <script defer src="/js/file.js"></script>
       <script>
(function () {
    function makePager(titleId, listId, titleText, pageSize) {
        var titleEl = document.getElementById(titleId);
        var listEl = document.getElementById(listId);

        if (!titleEl || !listEl) return;

        var items = Array.prototype.filter.call(listEl.children, function (node) {
            return node.nodeType === 1;
        });

        if (!items.length) return;

        var currentPage = 0;
        var totalPages = Math.ceil(items.length / pageSize);

        titleEl.innerHTML =
            '<span class="news-pager-head">' +
                '<button type="button" class="news-pager-btn js-prev" aria-label="이전">&lt;</button>' +
                '<span class="news-pager-title js-title"></span>' +
                '<button type="button" class="news-pager-btn js-next" aria-label="다음">&gt;</button>' +
            '</span>';

        var prevBtn = titleEl.querySelector('.js-prev');
        var nextBtn = titleEl.querySelector('.js-next');
        var titleSpan = titleEl.querySelector('.js-title');

        function render() {
            var start = currentPage * pageSize;
            var end = start + pageSize;

            items.forEach(function (item, index) {
                item.style.display = (index >= start && index < end) ? '' : 'none';
            });

            titleSpan.textContent = titleText;

            if (totalPages <= 1) {
                prevBtn.hidden = true;
                nextBtn.hidden = true;
                return;
            }

            prevBtn.hidden = (currentPage === 0);
            nextBtn.hidden = (currentPage === totalPages - 1);
        }

        prevBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentPage > 0) {
                currentPage--;
                render();
            }
        });

        nextBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentPage < totalPages - 1) {
                currentPage++;
                render();
            }
        });

        render();
    }

    function bootNewsPager() {
        makePager('mostNewsTitle', 'mostNewsList', '가장 많이 본 뉴스', 5);
        makePager('latestNewsTitle', 'latestNewsList', '최신뉴스', 5);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootNewsPager);
    } else {
        bootNewsPager();
    }

    window.addEventListener('load', bootNewsPager);
})();
</script> 
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/common.js"></script>

        <!-- 오른쪽 1 ,2 배너 rotation-->

           <script>
               document.addEventListener('DOMContentLoaded', function () {

                   // 첫 번째 배너
                   const banners1 = [
                       {
                           img: '{{오른쪽-1_img}}',
                           link: '{{오른쪽-1_link}}'
                       },
                       {
                           img: '{{오른쪽-1-1_img}}',
                           link: '{{오른쪽-1-1_link}}'
                       },
                       {
                           img: '{{오른쪽-1-2_img}}',
                           link: '{{오른쪽-1-2_link}}'
                       }
                   ];

                   const bannerLink1 = document.getElementById('rightBannerLink1');
                   const bannerImg1 = document.getElementById('rightBannerImg1');

                   let index1 = 0;

                   setInterval(function () {
                       index1 = (index1 + 1) % banners1.length;

                       bannerImg1.src = banners1[index1].img;
                       bannerImg1.setAttribute('data-src', banners1[index1].img);
                       bannerLink1.href = banners1[index1].link || '#';

                   }, 4000);


                   // 두 번째 배너
                   const banners2 = [
                       {
                           img: '{{오른쪽-2_img}}',
                           link: '{{오른쪽-2_link}}'
                       },
                       {
                           img: '{{오른쪽-2-1_img}}',
                           link: '{{오른쪽-2-1_link}}'
                       },
                       {
                           img: '{{오른쪽-2-2_img}}',
                           link: '{{오른쪽-2-2_link}}'
                       }
                   ];

                   const bannerLink2 = document.getElementById('rightBannerLink2');
                   const bannerImg2 = document.getElementById('rightBannerImg2');

                   let index2 = 0;

                   setInterval(function () {
                       index2 = (index2 + 1) % banners2.length;

                       bannerImg2.src = banners2[index2].img;
                       bannerImg2.setAttribute('data-src', banners2[index2].img);
                       bannerLink2.href = banners2[index2].link || '#';

                   }, 4500);

               });
           </script>



    </body>
</html>