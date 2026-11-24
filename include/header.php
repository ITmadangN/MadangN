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
    <link rel="preload" href="/js/libs/jquery.form.min.js" as="script">
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
    <link rel="stylesheet" href="/css/theme/style{{MAIN}}.css">
    <link rel="stylesheet" href="/css/nouislider.min.css">
    <link rel="stylesheet" href="/css/iibiz.css">


    <!-- include scripts -->
    <script src="/js/uni-core/js/uni-core-bundle.min.js"></script>
    <script src="/js/nouislider.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/realestate/realestate.js"></script>
</head>
<style>
    .border-end2 {border-right: 1px solid #fff !important;}
    .pt2-5{margin-top:27px !important;}
    .pt2-52{margin-top:27px !important;}
    @media (max-width:768px) {
    div.pt2-5 {
    margin-top: 0px !important;
    padding-top: 15px !important;
    }

   div.pt2-52 {
    margin-top: 0px !important;

     }
    }

    .mn-news-region-select {
        width: 135px !important;      /* 원하는 가로 길이로 직접 숫자 조절 (예: 120px ~ 150px) */
        min-width: 150px !important;  /* width와 같은 값으로 고정 */
        max-width: 150px !important;  /* 긴 옵션 글자 때문에 늘어나는 것 차단 */
        height: 30px !important;      /* 원하는 세로 높이로 조절 (예: 34px ~ 42px) */
        line-height: 36px !important;
        padding: 0 26px 0 10px !important;
        font-size: 13px !important;
        font-weight: 600;
        color: #1e293b;
        background-color: #fff;
        border: 1.5px solid #cbd5e1;
        border-radius: 6px;
        cursor: pointer;
        outline: none;
        box-sizing: border-box !important;
    }
    .mn-news-region-select:hover,
    .mn-news-region-select:focus {
        border-color: #244b8a;
        }

</style>
<!-- <link rel="stylesheet" href="/css/realestate_view.css"> -->
<body class="uni-body panel bg-white text-gray-900 overflow-x-hidden">



<!--  사이드메뉴 -->
<div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
    <div class="uc-offcanvas-bar bg-white text-dark dark:bg-gray-900 dark:text-white">
        <header class="uc-offcanvas-header hstack justify-between items-center pb-4 bg-white dark:bg-gray-900" style="position:relative !important;">
            <div class="uc-logo">
                <a href="/" class="h5 text-none text-gray-900">
                    <img class="w-80px" src="/images/logo.png" alt="마당엔">
                </a>
            </div>
            <button class="uc-offcanvas-close p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
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
                    <a href="javascript:return false;" onclick="goUrl('/news/');">뉴스</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="javascript:return false;" onclick="goUrl('/news/');">뉴스홈</span></a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/news/society.php');">사회</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/news/global.php');">세계</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/news/political_economy.php');">정치경제</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/news/entertainment.php');">연예</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/news/sports.php');">스포츠</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/news/localnews.php');">로컬</a></li>

                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="javascript:return false;" onclick="goUrl('/youtube/');">유튜브</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/');">Youtube홈</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/madangn.php');">MadangN TV</a></li>
                        <li><a href="/javascript:return false;" onclick="goUrl('youtube/financial.php');">재정/보험</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/realestate.php');">부동산</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/youtube/rogg.php');">ROGG</a></li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="javascript:return false;" onclick="goUrl('/community/');">커뮤니티</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="javascript:return false;" onclick="goUrl('/communitys/');">커뮤니티홈</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/community/recruit.php');">구인/구직</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/community/market.php');">사고팔고</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/community/business.php');">비지니스 홍보</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/community/vehicle.php');">자동차</a></li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="javascript:return false;" onclick="goUrl('/towninfo/');">타운정보</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/');">타운정보홈</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/marketsale.php');">마켓세일</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/find_people.php');">사람찾기</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/notification.php');">행사/알림</a></li>
                        <li><a href="javascript:return false;" onclick="goUrl('/towninfo/event.php');">마당엔 이벤트</a></li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="javascript:return false;" onclick="goUrl('/realestate/');">부동산</a>
                 <!--   <a href="javascript:void(0);" onclick="goUrl('/realestate/?popup=y');">부동산<span data-uc-navbar-parent-icon></span></a> -->
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="javascript:return false;" onclick="goUrl('/realestate/');">부동산홈</a></li>
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

                    <!--div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn text-dark" href="https://facebook.com" target="_blank" >
                            <i class="fa fa-kakao" aria-hidden="true"></i>

                        </a>
                    </div>
                    <div class="uc-navbar-item">
                        <a class="border-0 p-0 duration-0 top_btn text-dark" href="https://facebook.com" target="_blank" >
                            <i class="fa fa-envelope" aria-hidden="true"></i>

                        </a>
                    </div-->
                </div>

            </ul>

        </div>
    </div>
</div>



<!--  Search -->
<div id="uc-search-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 dark:text-white rounded">
        <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
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
    <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 dark:text-white rounded">
        <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button"  id="login_close">
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
                                <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" placeholder="Your email" name="login_email" id="login_email"  required>
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
<header class="uc-header header-one uc-navbar-sticky-wrap z-999">
    <nav class="uc-navbar-container shadow-xs bg-white dark:bg-gray-900 fs-6 z-1">
        <div class="uc-top-navbar panel z-3 min-h-30px lg:min-h-40px border-bottom" data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
        
            <div class="bg-gray-25 border-bottom d-none md:d-flex">
                    <div class="container max-w-xl fs-7 hd_tops">
                        <div class="d-flex item-center gap-0">
                    
                          <div class="border-end2 py-narrow px-2"><a href="/" class="text-none">HOME </a></div>
                          <div class="border-end2 py-narrow px-2"><a href="javascript:return false;" onclick="goUrl('/community/recruit.php');" class="text-none">구인구직 </a></div>
                          <div class="border-end2 py-narrow px-2"><a href="javascript:return false;" onclick="goUrl('/community/business.php');" class="text-none">비지니스 홍보 </a></div>
                          <div class="border-end2 py-narrow px-2"><a href="javascript:return false;" onclick="goUrl('/community/vehicle.php');" class="text-none">자동차 </a></div>
                          <div class="border-end2 py-narrow px-2"><a href="javascript:return false;"  onclick="goUrl('/realestate/house.php');" class="text-none">주택</a></div>
                          <div class="py-narrow px-2"><a href="javascript:return false;" onclick="goUrl('/youtube/financial.php');" class="text-none">재정보험 </a></div>

                        </div>
                    </div>
            </div>
            <div class="container max-w-xl">
                <div class="hstack">
                    <div class="uc-navbar-left gap-1 lg:gap-1">

					 <div class="uc-navbar-item">
                            <a class="border-0 p-0 duration-0 top_btn2" href="https://www.facebook.com/profile.php?id=61590134739989&mibextid=wwXIfr" target="_blank" >
                                <img src="/images/sns_03.png" alt="페이스북" />

                            </a>
                        </div>
                        <div class="uc-navbar-item">
                            <a class="border-0 p-0 duration-0 top_btn2" href="https://www.youtube.com/@madangn5253" target="_blank" >
                               <img src="/images/sns_01.png" alt="유튜브" />

                            </a>
                        </div>
                        <div class="uc-navbar-item">
                            <a class="border-0 p-0 duration-0 top_btn2" href="https://instagram.com/madangn_usa" target="_blank" >
                                <img src="/images/sns_04.png" alt="인스타그램" />

                            </a>
                        </div>

                        <!--div class="uc-navbar-item">
                            <a class="border-0 p-0 duration-0 top_btn" href="https://facebook.com" target="_blank" >
                                <i class="fa fa-kakao" aria-hidden="true"></i>

                            </a>
                        </div>
                        <div class="uc-navbar-item">
                            <a class="border-0 p-0 duration-0 top_btn" href="https://facebook.com" target="_blank" >
                                <i class="fa fa-envelope" aria-hidden="true"></i>

                            </a>
                        </div-->
                     
                    </div>
                    <div class="uc-navbar-right gap-2 lg:gap-2">

                       <!-- IF START 'NOTLOGIN' -->
                        <div class="uc-navbar-item d-none sm:d-flex">
                            <div class="hstack gap-1 fs-7 lg:fs-6 fw-bold">
                                <a href="#uc-account-modal" class="text-none" data-uc-toggle onclick="GO_LOGIN_VIEW();" id="login_button_display"><i class="fa fa-lock"></i><span> 로그인</span></a>
                            </div>
                        </div>
                        <div class="vr h-18px my-auto d-none sm:d-block"></div>
                        <div class="uc-navbar-item d-none sm:d-flex">
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
                </div>
            </div>
        </div>
        <div class="uc-center-navbar panel z-2">
            <div class="container max-w-xl">
                <div class="uc-navbar min-h-72px lg:min-h-100px text-gray-900" data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                    <div class="uc-navbar-left">
                        <div class="d-block lg:d-none">
                            <a class="uc-menu-trigger" href="#uc-menu-panel" data-uc-toggle></a>
                        </div>
                        <div class="uc-logo d-none md:d-block">
                            <a href="/">
                                <img class="w-110px d-block dark:d-none" src="/images/logo.png" alt="마당엔">
                            </a>
                        </div>
                    </div>
                    <div class="uc-navbar-center">
                        <div class="uc-logo d-block md:d-none">
                            <a href="/">
                                <img class="w-80px d-block dark:d-none" src="/images/logo.png" alt="마당엔">
                            </a>
                        </div>
                        <ul class="uc-navbar-nav gap-4 fs-4 fw-semibold d-none lg:d-flex" style="--uc-nav-height: 80px">

                            <li>
                                <a href="javascript:return false;"  onclick="goUrl('/news/');" {{MAIN1}}>뉴스<span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset fs-5 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                    <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/');" style="color:#22548f"><b>뉴스홈</b></span></a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/society.php');">사회</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/global.php');">세계</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/political_economy.php');">정치경제</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/entertainment.php');">연예</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/sports.php');">스포츠</a></li>
                                        <li><a href="javascript:return false;" onclick="goUrl('/news/localnews.php');">로컬</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="/youtube/" {{MAIN2}}>유튜브<span data-uc-navbar-parent-icon></span></a>

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
                                <a href="/community/recruit.php" {{MAIN3}}>커뮤니티<span data-uc-navbar-parent-icon></span></a>

                                <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                    <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                        <!--    <li><a href="/community/" style="color:#6351ab"><b>커뮤니티홈1</b></a></li> -->
                                          <li><a href="javascript:return false;" onclick="goUrl('/community/recruit.php');">구인/구직</a></li>
                                          <li><a href="javascript:return false;" onclick="goUrl('/community/market.php');">사고팔고</a></li>
                                          <li><a href="javascript:return false;" onclick="goUrl('/community/business.php');">비지니스 홍보</a></li>
                                          <li><a href="javascript:return false;" onclick="goUrl('/community/vehicle.php');">자동차</a></li>


                                      </ul>
                                  </div>
                              </li>
                            <li>
                                  <a href="/towninfo/marketsale.php" {{MAIN4}}>타운정보<span data-uc-navbar-parent-icon></span></a>

                                  <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                      <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                          <!--       <li><a href="/towninfo/" style="color:#0b87ab"><b>타운정보홈1</b></a></li> -->
                                               <li><a href="javascript:return false;" onclick="goUrl('/towninfo/marketsale.php');">마켓세일</a></li>
                                               <li><a href="javascript:return false;" onclick="goUrl('/towninfo/find_people.php');">사람찾기</a></li>
                                               <li><a href="javascript:return false;" onclick="goUrl('/towninfo/notification.php');">행사/알림</a></li>
                                               <li><a href="javascript:return false;" onclick="goUrl('/towninfo/event.php');">마당엔 이벤트</a></li>


                                           </ul>
                                       </div>
                                   </li>
                            <li>
                                     <a href="/realestate" {{MAIN5}}>부동산 <span data-uc-navbar-parent-icon></span></a>
                                   <!--    <a href="/realestate/?popup=y"
                                          onclick="if (typeof openREModal === 'function' && document.getElementById('realEstateModal')) { openREModal(); return false; }"
                                          {{MAIN5}}>
                                           부동산 <span data-uc-navbar-parent-icon></span>
                                       </a> -->
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

                           <div class="uc-navbar-right d-none lg:d-block mt-4">

                               <div style="display:flex;gap:18px;align-items: center;justify-content: center;">
                                   <!--div>
                                       <a href="#uc-search-modal" data-uc-toggle>
                                           <img  src="/images/search2.svg" alt="Search">
                                       </a>
                                   </div-->
                                   <!-- 뉴스 메뉴(/news/...)일 때만 보이고 유튜브·커뮤니티·타운정보·부동산에서는 숨김 -->
                                   <div id="mnNewsRegionWrap" class="me-2" style="display: {{NEWS_REGION_DISPLAY}}; align-items: center;">
                                       <select id="mnNewsRegionSelect" class="mn-news-region-select" aria-label="뉴스 지역 선택" onchange="mnChangeNewsRegion(this.value)">
                                           {{NEWS_REGION_OPTIONS}}
                                       </select>
                                   </div>
                                    <button type="button" class="animate-btn btn btn-sm btn-primary text-none gap-0 d-none lg:d-inline-flex fs-6" onclick="{{ADVERTISE_LOGIN2}}">
                                        <span>유료광고신청</span>
                                        <i class="icon icon-narrow unicon-email fw-bold"></i>
                                    </button>
                               </div>
                           </div>

                    <!-- IF START 'NOTLOGIN' -->
                    <div class="uc-navbar-right  d-block lg:d-none">
                        <div style="display: flex; gap: 8px;margin-top:20px;">
                            <div class="icon-circle"><a href="#uc-account-modal" class="text-none" data-uc-toggle><i class="fa fa-lock" aria-hidden="true"></i></a></div>
                            <div class="icon-circle"><a href="/member/register.php" class="text-none"><i class="fa fa-user" aria-hidden="true"></i></a></div>
                            <div class="icon-circle"><a href="mailto:it@madangn.com" class="text-none"><i class="fa fa-envelope-open" aria-hidden="true" style="font-size:13px;margin-bottom:6px;"></i></a></div>
                        </div>
                    </div>
                    <!-- IF END 'NOTLOGIN' -->
                    <!-- IF START 'LOGIN' -->
                    <div class="uc-navbar-right  d-block lg:d-none">
                        <div style="display: flex; gap: 8px;margin-top:20px;">
                            <div class="icon-circle"><a href="/member/logout.php" class="text-none"><i class="fa fa-unlock" aria-hidden="true"></i></a></div>
                            <div class="icon-circle"><a href="/member/register_info.php" class="text-none"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                            <div class="icon-circle"><a href="/member/memo.php" class="text-none"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size:13px;margin-bottom:6px;"></i></a></div>
                        </div>
                    </div>
                    <!-- IF END 'LOGIN' -->
                </div>
            </div>
        </div>

        <!-- IF START 'MAIN0' -->

        <div class="breadcrumbs panel z-1 py-2 bg-gray-25 dark:bg-gray-100 dark:bg-opacity-5 dark:text-white">
            <div class="container max-w-xl">
                <ul class="breadcrumb nav-x justify-center gap-1 fs-6 m-0">
                    <li><span class="opacity-50"><a href="/">Home</a></span></li>
                    <li><i class="unicon-chevron-right opacity-50"></i></li>
                    <li><span class="opacity-50">{{MTITLE}}</span></li>
                    <li><i class="unicon-chevron-right opacity-50"></i></li>
                    <li><span class="fw-medium">{{STITLE}}</span></li>
                </ul>
            </div>
        </div>

        <!-- IF END 'MAIN0' -->
        <!-- IFNOT START 'MAIN0' -->

        <div class="uc-bottom-navbar panel z-1 min-h-32px lg:min-h-46px bg-primary uc-dark" data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
            <div class="container max-w-xl">
                <div class="hstack">
                    <div class="uc-navbar-left gap-2 lg:gap-3">
                        <div class="uc-navbar-item">
                            <ul class="nav-x fs-5 fw-bold flex-nowrap overflow-x-auto hide-scrollbar uc-horizontal-scroll w-screen md:w-auto md:mask-end-0 mx-n2 px-2 dark:text-primary-50 tnb">

                                <!-- INCLUDE FILE '../include/top_menu.php' -->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- IFNOT END 'MAIN0' -->
    </nav>
</header>

<!-- Header end -->
<script>
    // 지역 변경 시: 현재 탭의 sessionStorage에 표시 후 localnews.php 이동
    function mnChangeNewsRegion(regionCode) {
        if (!regionCode) return;
        sessionStorage.setItem('mn_tab_region_manual', regionCode);
        window.location.href = '/news/localnews.php?region=' + encodeURIComponent(regionCode);
    }

    document.addEventListener('DOMContentLoaded', function () {
        // 1. 새 탭 여부 판별: 이 탭에서 수동으로 지역을 바꾼 적이 없는데 서버가 ?region= 없이 이전 값을 물고 있다면 기본값으로 리셋
        var urlParams = new URLSearchParams(window.location.search);
        var hasRegionParam = urlParams.has('region');
        var tabManualRegion = sessionStorage.getItem('mn_tab_region_manual');

        if (hasRegionParam) {
            sessionStorage.setItem('mn_tab_region_manual', urlParams.get('region'));
        } else if (!tabManualRegion && !sessionStorage.getItem('mn_tab_initialized')) {
            // 새 탭 최초 진입 표시
            sessionStorage.setItem('mn_tab_initialized', '1');
            // 새 탭에서 뉴스/로컬 페이지로 바로 들어온 경우 기본 지역(state_code 또는 IP)으로 재설정
            if (window.location.pathname.toLowerCase().indexOf('/news') === 0) {
                window.location.replace(window.location.pathname + '?reset_region=1');
                return;
            }
        }

        // 2. 상단 드롭다운 표시/숨김 동기화
        var wrap = document.getElementById('mnNewsRegionWrap');
        if (!wrap) return;

        function syncRegionVisibility() {
            var path = window.location.pathname.toLowerCase();
            var isNews = (path === '/news' || path.indexOf('/news/') === 0);
            wrap.style.display = isNews ? 'inline-flex' : 'none';
        }
        syncRegionVisibility();
    });
    // function mnChangeNewsRegion(regionCode) {
    //     if (!regionCode) return;
    //
    //     var domainAttr = (location.hostname.indexOf('madangn.com') !== -1) ? '; domain=.madangn.com' : '';
    //     document.cookie = 'mn_sub_region=' + encodeURIComponent(regionCode) + '; path=/' + domainAttr + '; max-age=' + (86400 * 30) + '; SameSite=Lax';
    //
    //     window.location.href = '/news/localnews.php?region=' + encodeURIComponent(regionCode);
    // }
    //
    // document.addEventListener('DOMContentLoaded', function () {
    //     var wrap = document.getElementById('mnNewsRegionWrap');
    //     if (!wrap) return;
    //
    //     function syncRegionVisibility() {
    //         var path = window.location.pathname.toLowerCase();
    //         var isNews = (path === '/news' || path.indexOf('/news/') === 0);
    //         wrap.style.display = isNews ? 'inline-flex' : 'none';
    //     }
    //
    //     syncRegionVisibility();
    //
    //     // 상단 메뉴(뉴스 / 유튜브 / 커뮤니티 / 타운정보 / 부동산) 클릭 시 즉시 표시·숨김 동기화
    //     document.querySelectorAll('header a, nav a').forEach(function (link) {
    //         link.addEventListener('click', function () {
    //             var href = (this.getAttribute('href') || '').toLowerCase();
    //             if (!href || href === '#' || href.indexOf('javascript:') === 0) return;
    //
    //             if (href.indexOf('/news') === 0 || href.indexOf('news/') !== -1) {
    //                 wrap.style.display = 'inline-flex';
    //             } else {
    //                 wrap.style.display = 'none';
    //             }
    //         });
    //     });
    // });
</script>


<!-- Wrapper start -->
<div id="wrapper" class="wrap overflow-hidden-x mt-2">
    <!-- IF START 'NOTINDEX' -->

    <!-- Section start -->
    <div class="section panel overflow-hidden">
        <div class="section-outer panel pb-4 pt-5 brds2">
            <div class="container max-w-xl">
                <div class="section-inner">
                    <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">

                        <div class="block-content">
                            <div class="panel row child-cols-12 md:child-cols gy-4 md:gx-3 xl:gx-4">

                                <!-- Left Start -->
                                <div class="lg:col-9">
                                    <div>

    <!-- IF END 'NOTINDEX' -->

<!-- 부동산 통합 검색 팝업 레이어 -->

 <!--
<div id="realEstateModal" class="re-modal">
    <div class="re-modal-content">

        <span class="re-close" onclick="closeREModal()">&times;</span>

        <div class="re-radius-wrap">
            <select id="reRadiusSelect" class="re-radius-select">
                <option value="0">해당 지역만</option>
                <option value="5" selected>반경 5 miles</option>
                <option value="10">반경 10 miles</option>
                <option value="20">반경 20 miles</option>
                <option value="30">반경 30 miles</option>
            </select>
        </div>

        <h2 class="re-title">내 집 찾기의 시작<br><span>지역 또는 주소를 검색해보세요</span></h2>


        <div class="re-tabs">
            <button type="button" class="re-tab-btn active" onclick="switchTab(this, '주택')">주택</button>
            <button type="button" class="re-tab-btn" onclick="switchTab(this, '렌트')">렌트</button>
            <button type="button" class="re-tab-btn" onclick="switchTab(this, '커머셜')">커머셜</button>
            <button type="button" class="re-tab-btn" onclick="switchTab(this, '사업체')">사업체</button>
        </div>


        <div id="subCategoryArea" class="re-icon-menu" style="display: none;">
            <button type="button" onclick="searchAndScroll('커머셜')">🏢 오피스</button>
            <button type="button" onclick="searchAndScroll('커머셜')">🏪 리테일</button>
            <button type="button" onclick="searchAndScroll('커머셜')">🏭 공장/창고</button>
            <button type="button" onclick="searchAndScroll('사업체')">🤝 사업체 매매</button>
        </div>


        <div class="re-search-box">
            <button type="button" class="re-gps-btn" onclick="getCurrentLocation()" title="내 위치 가져오기">📍</button>
            <input type="text" id="reSearchInput" placeholder="위치 검색 중...">
            <button type="button" class="re-clear-btn" onclick="clearSearchInput()">&times;</button>
            <button type="button" class="re-search-btn" onclick="handleSearch()">Search 🔍</button>
        </div>
    </div>
</div>
                                        -->