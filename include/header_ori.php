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

        <!-- include scripts -->
        <script src="/js/uni-core/js/uni-core-bundle.min.js"></script>
        <script src="/js/nouislider.min.js"></script>
    </head>
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
                    <form id="search-panel" class="form-icon-group vstack gap-1 mb-3" data-uc-sticky="">
                        <input type="email" class="form-control form-control-md fs-6" placeholder="Search..">
                        <span class="form-icon text-gray">
                            <i class="unicon-search icon-1"></i>
                        </span>
                    </form>
                    <ul class="nav-y gap-narrow fw-bold fs-5" data-uc-nav>
                        <li class="uc-parent">
                            <a href="/news/">뉴스</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                  <li><a href="/news/">뉴스홈</span></a></li>
                                                <li><a href="/news/society.php">사회</a></li>
                                                <li><a href="#">로컬뉴스</a></li>
                                                <li><a href="#">정치경제</a></li>
                                                <li><a href="#">연예</a></li>
                                                <li><a href="#">스포츠</a></li>
                            </ul>
                        </li>
                        <li class="uc-parent">
                            <a href="/youtube/">유튜브</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                                <li><a href="/youtube/">Youtube홈</a></li>
                                                <li><a href="/youtube/madangn.php">MadangN TV</a></li>
                                                <li><a href="/youtube/financial.php">재정/보험</a></li>
                                                <li><a href="/youtube/realestate.php">부동산</a></li>
                                                <li><a href="/youtube/rogg.php">ROGG</a></li>
                            </ul>
                        </li>
                         <li class="uc-parent">
                            <a href="/community/">커뮤니티</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                                <li><a href="/communitys/">커뮤니티홈</a></li>
                                                <li><a href="/community/recruit.php">구인/구직</a></li>
                                                <li><a href="/community/market.php">사고팔고</a></li>
                                                <li><a href="/community/business.php">비즈니스</a></li>
                                                <li><a href="/community/vehicle.php">Cars</a></li>
                            </ul>
                        </li>
                         <li class="uc-parent">
                            <a href="/towninfo/">타운정보</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                  <li><a href="/towninfo/">타운정보홈</a></li>
                                                <li><a href="/towninfo/marketsale.php">마켓세일</a></li>
                                                <li><a href="/towninfo/find_people.php">사람찾기</a></li>
                                                <li><a href="/towninfo/notification.php">행사/알림</a></li>
                                                <li><a href="/towninfo/event.php">마당엔 이벤트</a></li>
                            </ul>
                        </li>
                         <li class="uc-parent">
                            <a href="/realestate/">부동산</a>
                            <ul class="uc-nav-sub" data-uc-nav="">
                                <li><a href="/realestate/">부동산홈</a></li>
                                                <li><a href="blog-2cols.html">주택</a></li>
                                                <li><a href="blog-classic.html">렌트</a></li>                                                
                                                <li><a href="blog-3cols.html">커머셜</a></li>
                                                <li><a href="blog-4cols.html">사업체</a></li>
                                                <li><a href="blog-category.html">에이전트</a></li>
                            </ul>
                        </li>
						<li>  <a href="#">유료광고신청</a></li>
                        <li class="hr opacity-10 my-1"></li>
                     
                    </ul>
                    <ul class="social-icons nav-x mt-2">

					 <div class="gap-1 lg:gap-1">
                                <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn text-dark" href="https://facebook.com" target="_blank" >
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>
                                <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn text-dark" href="https://facebook.com" target="_blank" >
                                       <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>
                                  <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn text-dark" href="https://facebook.com" target="_blank" >
                                       <i class="fa fa-instagram" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>

								  <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn text-dark" href="https://facebook.com" target="_blank" >
                                        <i class="fa fa-kakao" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>
								 <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn text-dark" href="https://facebook.com" target="_blank" >
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>
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
                <button class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all" type="button">
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
                                    <form class="vstack gap-2">
                                        <input class="form-control form-control-sm h-40px w-full fs-5 bg-white dark:bg-gray-800 dark:bg-gray-800 dark:border-white dark:border-opacity-15 dark:border-opacity-15" type="text" placeholder="아이디" required>
                                        <input class="form-control form-control-sm h-40px w-full fs-5 bg-white dark:bg-gray-800 dark:bg-gray-800 dark:border-white dark:border-opacity-15 dark:border-opacity-15" type="password" placeholder="비밀번호" autocomplete="new-password" required>
                                        <div class="hstack justify-between items-start text-start">
                                            <div class="form-check text-start">
                                                <input class="form-check-input rounded-0 dark:bg-gray-800 dark:bg-gray-800 dark:border-white dark:border-opacity-15 dark:border-opacity-15" type="checkbox" id="inputCheckRemember">
                                                <label class="hstack justify-between form-check-label fs-6 sm:fs-6" for="inputCheckRemember">자동로그인</label>
                                            </div>
                                            <a href="#" class="uc-link fs-6" data-uc-switcher-item="1">비밀번호 찾기</a>
                                        </div>
                                        <button class="btn btn-primary btn-sm lg:mt-1 fs-4" type="submit">로그인</button>
                                    </form>
                                    <div class="panel h-24px">
                                        <hr class="position-absolute top-50 start-50 translate-middle hr m-0 w-100">
                                        <span class="position-absolute top-50 start-50 translate-middle px-1 fs-7 text-uppercase bg-white dark:bg-gray-800">Or</span>
                                    </div>
                                
                                </div>
                                <p class="fs-5 sm:fs-5">아직 회원이 아니신가요? <a href="#">회원가입</a></p>
                            </div>
                        </div>
                       
                        <div class="w-100">
                            <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                                <h4 class="h5 lg:h4 m-0">비밀번호 재설정</h4>
                                <div class="panel w-100 sm:w-350px">
                                    <form class="vstack gap-2">
                                        <input class="form-control form-control-sm h-40px w-full fs-6 bg-white dark:bg-gray-800 dark:border-white dark:border-opacity-15" type="email" placeholder="Your email" required>
                                        <div class="form-check text-start">
                                            <input class="form-check-input rounded-0 dark:bg-gray-800 dark:border-white dark:border-opacity-15" type="checkbox" id="inputCheckVerify" required>
                                            <label class="form-check-label fs-7 sm:fs-6" for="inputCheckVerify"> <span>I'm not a robot</span>. </label>
                                        </div>
                                        <button class="btn btn-primary btn-sm lg:mt-1" type="submit">비밀번호 재설정</button>
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
                    <div class="container max-w-xl">
                        <div class="hstack">
                            <div class="uc-navbar-left gap-2 lg:gap-2">
                                <div class="uc-navbar-item dark:text-white dark:text-opacity-70 d-none sm:d-flex">
                                    <div class="hstack gap-1 fs-7 lg:fs-6 fw-bold">
                                        <a href="#uc-account-modal" class="text-none" data-uc-toggle><i class="fa fa-lock"></i><span> 로그인</span></a>
                                    </div>
                                </div>
                                <div class="vr h-18px my-auto d-none sm:d-block"></div>
                                <div class="uc-navbar-item dark:text-white dark:text-opacity-70 d-none sm:d-flex">
                                    <ul class="nav-x gap-2 lg:gap-3 fs-7 lg:fs-6 fw-bold">
                                        <li><a href="#" class="text-none">  <i class="fa fa-user"></i> 회원가입</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="uc-navbar-right gap-1 lg:gap-1">
                                <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn" href="https://facebook.com" target="_blank" >
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>
                                <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn" href="https://facebook.com" target="_blank" >
                                       <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>
                                  <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn" href="https://facebook.com" target="_blank" >
                                       <i class="fa fa-instagram" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>

								  <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn" href="https://facebook.com" target="_blank" >
                                        <i class="fa fa-kakao" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>
								 <div class="uc-navbar-item">
                                    <a class="border-0 p-0 duration-0 top_btn" href="https://facebook.com" target="_blank" >
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        
                                    </a>
                                </div>

								
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
                                        <a href="/news/" {{MAIN1}}>뉴스<span data-uc-navbar-parent-icon></span></a>
                                        <div class="uc-navbar-dropdown ft-primary text-unset fs-5 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <li><a href="/news/">뉴스홈</span></a></li>
                                                <li><a href="/news/society.php">사회</a></li>
                                                <li><a href="#">로컬뉴스</a></li>
                                                <li><a href="#">정치경제</a></li>
                                                <li><a href="#">연예</a></li>
                                                <li><a href="#">스포츠</a></li>
                                               
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/youtube/" {{MAIN2}}>유튜브<span data-uc-navbar-parent-icon></span></a>

										 <div class="uc-navbar-dropdown ft-primary text-unset fs-5 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <li><a href="/youtube/">Youtube홈</a></li>
                                                <li><a href="/youtube/madangn.php">MadangN TV</a></li>
                                                <li><a href="/youtube/financial.php">재정/보험</a></li>
                                                <li><a href="/youtube/realestate.php">부동산</a></li>
                                                <li><a href="/youtube/rogg.php">ROGG</a></li>
                                               
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/community/" {{MAIN3}}>커뮤니티<span data-uc-navbar-parent-icon></span></a>

                                          <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <li><a href="/community/">커뮤니티홈</a></li>
                                                <li><a href="/community/recruit.php">구인/구직</a></li>
                                                <li><a href="/community/market.php">사고팔고</a></li>
                                                <li><a href="/community/business.php">비즈니스</a></li>
                                                <li><a href="/community/vehicle.php">Cars</a></li>
                                              
                                               
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/towninfo/" {{MAIN4}}>타운정보<span data-uc-navbar-parent-icon></span></a>

										 <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <li><a href="/towninfo/">타운정보홈</a></li>
                                                <li><a href="/towninfo/marketsale.php">마켓세일</a></li>
                                                <li><a href="/towninfo/find_people.php">사람찾기</a></li>
                                                <li><a href="/towninfo/notification.php">행사/알림</a></li>
                                                <li><a href="/towninfo/event.php">마당엔 이벤트</a></li>
                                                
                                               
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/realestate/" {{MAIN5}}>부동산 <span data-uc-navbar-parent-icon></span></a>
                                        <div class="uc-navbar-dropdown ft-primary text-unset fs-6 fw-medium p-3 rounded-0 hide-scrollbar w-auto" data-uc-drop=" offset: 0; boundary: !.uc-navbar; animation: uc-animation-slide-top-small; duration: 150;">
                                            <ul class="uc-nav uc-navbar-dropdown-nav" style="margin-top:-15px;">
                                                <li><a href="/realestate/">부동산홈</a></li>
                                                <li><a href="blog-2cols.html">주택</a></li>
                                                <li><a href="blog-classic.html">렌트</a></li>                                                
                                                <li><a href="blog-3cols.html">커머셜</a></li>
                                                <li><a href="blog-4cols.html">사업체</a></li>
                                                <li><a href="blog-category.html">에이전트</a></li>
                                         
                                            </ul>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>

                            <div class="uc-navbar-right d-none lg:d-block mt-4">

							     <div style="display:flex;gap:18px;align-items: center;justify-content: center;">
								   <div>
                                    <a href="#uc-search-modal" data-uc-toggle>
                                        <img  src="/images/search2.svg" alt="Search">
                                    </a>
                                </div>
                                <button type="button" class="animate-btn btn btn-sm btn-primary text-none gap-0 d-none lg:d-inline-flex fs-6">
                                    <span>유료광고신청</span>
                                    <i class="icon icon-narrow unicon-email fw-bold"></i>
                                </button>
								</div>
                            </div>

							  <div class="uc-navbar-right  d-block lg:d-none">
							      <div style="display: flex; gap: 8px;margin-top:20px;">
							        <div class="icon-circle"><a href="#uc-account-modal" class="text-none" data-uc-toggle><i class="fa fa-lock" aria-hidden="true"></i></a></div>
							        <div class="icon-circle"><a href="#" class="text-none"><i class="fa fa-user" aria-hidden="true"></i></a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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
            </nav>
        </header>

        <!-- Header end -->

        <!-- Wrapper start -->
           <div id="wrapper" class="wrap overflow-hidden-x">
               <!-- IF START 'NOTINDEX' -->

			    <!-- Section start -->
               <div class="section panel overflow-hidden">
                   <div class="section-outer panel pb-4 pt-5">
                      <div class="container max-w-xl">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">
                               
                                <div class="block-content">
                                    <div class="panel row child-cols-12 md:child-cols gy-4 md:gx-3 xl:gx-4">

								<!-- Left Start -->
                                      <div class="lg:col-9">
									   <div>

               <!-- IF END 'NOTINDEX' -->
