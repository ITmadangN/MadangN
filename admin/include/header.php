<!DOCTYPE html>
<html class="modern has-top-menu has-left-sidebar-half">
 <head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>마당엔 관리자</title>
		<meta name="keywords" content="미주 한인들의 놀이터" />
		<meta name="description" content="마당엔 관리자">
		<meta name="author" content="https://www.madangn.com/">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- favicon -->
        <link rel="shortcut icon" href="/images/favicon.ico">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="../vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="../vendor/boxicons/css/boxicons.min.css" />
		<link rel="stylesheet" href="../vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="../vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="../vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="../vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="../vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="../vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="../vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="../vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="../vendor/dropzone/basic.css" />
        <link rel="stylesheet" href="../vendor/dropzone/dropzone.css" />
        <link rel="stylesheet" href="../vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
        <link rel="stylesheet" href="../vendor/summernote/summernote-bs4.css" />
		<link rel="stylesheet" href="../vendor/morris/morris.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="../css/theme.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../css/modern.css" />
		<link rel="stylesheet" href="../css/custom.css" />


		<!-- Head Libs -->
		<script src="../vendor/modernizr/modernizr.js"></script>
	    <script src="../master/style-switcher/style.switcher.localstorage.js"></script>

	</head>
	<section class="body">
			<!-- start: header -->
			<header class="header header-nav-menu header-nav-links">
				<div class="logo-container">
					<a href="/admin/" class="logo">
						<img src="/images/logo.png" class="logo-image" height="35" alt="마당엔" />
					</a>
					<button class="btn header-btn-collapse-nav d-lg-none" data-bs-toggle="collapse" data-bs-target=".header-nav">
						<i class="fas fa-bars"></i>
					</button>
					<!-- start: header nav menu -->
					<div class="header-nav collapse">
						<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 header-nav-main-square">
							<nav>
								<ul class="nav nav-pills" id="mainNav">
									<li class="dropdown {{MAIN1}}">
									    <a class="nav-link dropdown-toggle" href="javascript:return false;" onclick="goUrl('/admin/user/user_list.php');">
									        사용자
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="javascript:return false;" onclick="goUrl('/admin/user/user_list.php');">
									               사용자 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="javascript:return false;" onclick="goUrl('/admin/user/user_log_list.php');">
									                사용자 접속내역
									            </a>
									        </li>
									        
									    </ul>
									</li>
                                    <li class="dropdown {{MAIN8}}">
                                        <a class="nav-link dropdown-toggle" href="javascript:return false;" onclick="goUrl('/admin/user/user_list.php');">
                                            배너광고
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="nav-link" href="javascript:return false;" onclick="goUrl('/admin/banner/banner_pay_list.php');">
                                                   배너 광고 관리
                                                </a>
                                            </li>                                            
                                            
                                        </ul>
                                    </li>
									<li class="dropdown {{MAIN2}}">
									    <a class="nav-link dropdown-toggle" href="/admin/news/news_list.php">
									        뉴스
									    </a>
									    <ul class="dropdown-menu">
									        <!--li>
									            <a class="nav-link" href="ecommerce-dashboard.html">
									                메인 페이지 뉴스 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="ecommerce-products-list.html">
									                뉴스홈 관리
									            </a>
									        </li-->
									        <li>
									            <a class="nav-link" href="/admin/news/news_list.php">
									                뉴스 게시물 관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown {{MAIN3}}">
									    <a class="nav-link dropdown-toggle" href="../youtube/youtube_list.php">
									       유튜브
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="../youtube/madangn_youtube_list.php">
									                MadangN 동영상 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="../youtube/youtube_list.php">
									                Youtube 전체 동영상 관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown {{MAIN4}}">
									    <a class="nav-link dropdown-toggle" href="../community/community_pay_list.php">
									        커뮤니티
									    </a>
									    <ul class="dropdown-menu">
                                            <li>
                                                <a class="nav-link" href="../community/ad_company_list.php">
                                                    광고회사 관리
                                                </a>
                                            </li>									        
									        <li>
									            <a class="nav-link" href="../community/recurit_list.php">
									                구인구직 관리
									            </a>
									        </li>
                                            <li>
                                                <a class="nav-link" href="../community/recruit_pay_list.php">
                                                    구인구직 광고 신청 & 결제 조회
                                                </a>
                                            </li>
									        <li>
									            <a class="nav-link" href="../community/market_list.php">
									                사고팔고 관리
									            </a>
									        </li>                                            
									        <li>
									            <a class="nav-link" href="../community/business_list.php">
									               비즈니스 관리
									            </a>
									        </li>
                                            <li>
                                                <a class="nav-link" href="../community/business_pay_list.php">
                                                    비지니스 광고 신청 & 결제 조회
                                                </a>
                                            </li>                                            

                                            <li>
									            <a class="nav-link" href="../community/vehicle_dealer_list.php">
									                자동차 딜러 관리
									            </a>
									        </li>
                                            <li>
                                                <a class="nav-link" href="../community/vehicle_dealer_pay_list.php">
                                                    자동차 딜러 광고 신청 & 결제 조회
                                                </a>
                                            </li>
									        <li>
									            <a class="nav-link" href="../community/vehicle_list.php">
									                자동차 매물 관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown {{MAIN5}}">
									    <a class="nav-link dropdown-toggle" href="#">
									        타운정보
									    </a>
									    <ul class="dropdown-menu">
                                            <li>
                                                <a class="nav-link" href="../towninfo/marketsale_market_list.php">
                                                    마켓세일 마켓 관리
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="../towninfo/marketsale_branch_list.php">
                                                    마켓세일 지점 관리
                                                </a>
                                            </li>
									        <li>
									            <a class="nav-link" href="../towninfo/marketsale_flyer_list.php">
									                마켓세일 전단지 관리
									            </a>
									        </li>
                                            <li>
                                                <a class="nav-link" href="../towninfo/marketsale_market_users_list.php">
                                                    마켓세일 사용자 관리
                                                </a>
                                            </li>
									        <li>
									            <a class="nav-link" href="../towninfo/find_people_list.php">
									                사람찾기 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="../towninfo/notification_list.php">
									                행사알림 관리
									            </a>
									        </li>
											<li>
									            <a class="nav-link" href="../towninfo/event_list.php">
									                마당엔 이벤트 관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown {{MAIN6}}">
									    <a class="nav-link dropdown-toggle" href="/admin/realstate/realstate_list.php">
									        부동산
									    </a>
									    <ul class="dropdown-menu">
									        
									        <li>
									            <a class="nav-link" href="/admin/realstate/agent_list.php">
									                에이전트 관리
									            </a>
									        </li>
                                            <li>
                                                <a class="nav-link" href="/admin/realstate/agent_pay_list.php">
                                                    에이전트 신청 & 결제 조회
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="/admin/realstate/realstate_list.php">
                                                    부동산 매물관리
                                                </a>
                                            </li>
									        <!--li>
									            <a class="nav-link" href="ecommerce-products-form.html">
									                문의관리
									            </a>
									        </li-->
									        
									    </ul>
									</li>
									<li class="dropdown {{MAIN7}}">
									    <a class="nav-link dropdown-toggle" href="user_all_update.php">
									        Setting
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="/admin/user/setting.php">
									                개인정보 변경
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="/admin/user/permission_group_list.php">
									                권한설정
									            </a>
									        </li>
									        <!--li>
									            <a class="nav-link" href="code.php">
									                공통코드관리
									            </a>
									        </li-->
									        
									    </ul>
									</li>
									    </ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- end: header nav menu -->
				</div>
				<!-- start: search & user box -->
				<div class="header-right">
				     <ul class="notifications">
						<li>
							<a href="/admin/member/logout.php"><i class="bx bx-log-out"></i> 로그아웃</a>
						</li>
					</ul>
					<span class="separator"></span>
					<div id="userbox" class="userbox">
						<a href="#" data-bs-toggle="dropdown">
							<figure class="profile-picture">
								<img src="/admin/img/person.png" alt="{{SS_NAME}}" class="rounded-circle" data-lock-picture="/admin/img/person.png" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">{{SS_NAME}}</span>
								<span class="role">administrator</span>
							</div>
							
						</a>
						
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            관리자 메뉴
				        </div>
				        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				                <ul class="nav nav-main">
				                           <li class="nav-parent {{MAIN1_NAV}}">
				                        <a  href="javascript:return false;">
				                            <i class="bx bx-user" aria-hidden="true"></i>
				                            <span>사용자</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li {{SUB11}}>
				                                <a href="javascript:return false;" onclick="goUrl('/admin/user/user_list.php');">
				                                    사용자 관리
				                                </a>
				                            </li>
                                            <li {{SUB12}}>
				                                <a href="javascript:return false;" onclick="goUrl('/admin/user/user_log_list.php');">
				                                    사용자 접속 내역
				                                </a>
				                            </li>
				                         
				                        </ul>
				                    </li>
                                    <li class="nav-parent {{MAIN8_NAV}}">
                                        <a href="javascript:return false;">
                                            <i class="bx bx-image" aria-hidden="true"></i>
                                            <span>배너광고</span>
                                        </a>
                                        <ul class="nav nav-children">                                            
                                            <li {{SUB81}}>
                                                <a href="/admin/banner/banner_pay_list.php">
                                                    배너 광고 관리
                                                </a>
                                            </li>
                                           
                                        </ul>
                                    </li>
				                    <li class="nav-parent {{MAIN2_NAV}}">
				                        <a href="javascript:return false;">
				                            <i class="bx bx-news" aria-hidden="true"></i>
				                            <span>뉴스</span>
				                        </a>
				                        <ul class="nav nav-children">
                                            <!--li {{SUB1}}>
				                                <a href="tables-basic.html">
				                                   메인 페이지 뉴스 관리
				                                </a>
				                            </li>
                                            <li {{SUB2}}>
				                                <a href="tables-advanced.html">
				                                    뉴스홈 관리
				                                </a>
				                            </li-->
                                            <li {{SUB23}}>
				                                <a href="/admin/news/news_list.php">
				                                    뉴스 게시물 관리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>
				                    <li class="nav-parent {{MAIN3_NAV}}">
				                        <a href="javascript:return false;">
				                            <i class="bx bxl-youtube" aria-hidden="true"></i>
				                            <span>유튜브</span>
				                        </a>
				                        <ul class="nav nav-children">
                                            <li {{SUB31}}>
				                                    <a href="../youtube/madangn_youtube_list.php">MadangN 동영상 관리
				                                </a>
				                            </li>
                                            <li {{SUB32}}>
				                                    <a href="../youtube/youtube_list.php">Youtube 전체 동영상 관리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>

									    <li class="nav-parent {{MAIN4_NAV}}">
				                        <a href="javascript:return false;">
				                            <i class="bx bx-comment" aria-hidden="true"></i>
				                            <span>커뮤니티</span>
				                        </a>
				                        <ul class="nav nav-children">
                                            <li {{SUB49}}>
                                                <a href="../community/ad_company_list.php">
                                                    광고회사 관리
                                                </a>
                                            </li>
                                            
                                            <li {{SUB42}}>
				                                <a href="../community/recruit_list.php">
				                                  구인구직 관리
				                                </a>
				                            </li>
                                            <li {{SUB41}}>
                                                <a href="../community/recruit_pay_list.php">
                                                    구인구직 광고 신청 & 결제 조회
                                                </a>
                                            </li>
                                            <li {{SUB43}}>
				                                <a href="../community/market_list.php">
				                                   사고팔고 관리
				                                </a>
				                            </li>
                                            
                                            <li {{SUB45}}>
				                                <a href="../community/business_list.php">
				                                  비지니스 관리
				                                </a>
				                            </li>
                                            <li {{SUB44}}>
                                                <a href="../community/business_pay_list.php">
                                                    비지니스 광고 신청 & 결제 조회
                                                </a>
                                            </li>
                                            
                                            <li {{SUB46}}>
				                                <a href="../community/vehicle_dealer_list.php">
				                                   자동차 딜러 관리
				                                </a>
				                            </li>
                                            <li {{SUB47}}>
                                                <a href="../community/vehicle_dealer_pay_list.php">
                                                    자동차 딜러 광고 신청 & 결제 조회
                                                </a>
                                            </li>
                                            <li {{SUB48}}>
				                                <a href="../community/vehicle_list.php">
				                                   자동차 매물 관리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>
				                  

								    <li class="nav-parent {{MAIN5_NAV}}">
				                        <a href="javascript:return false;">
				                            <i class="bx bx-info-circle" aria-hidden="true"></i>
				                            <span>타운정보</span>
				                        </a>
				                        <ul class="nav nav-children">
                                            <li  {{SUB51}}>
                                                <a class="nav-link" href="../towninfo/marketsale_market_list.php">
                                                    마켓세일 마켓 관리
                                                </a>
                                            </li>
                                             <li  {{SUB55}}>
                                                <a class="nav-link" href="../towninfo/marketsale_branch_list.php">
                                                    마켓세일 지점 관리
                                                </a>
                                            </li>
                                             <li  {{SUB56}}>
                                                <a class="nav-link" href="../towninfo/marketsale_flyer_list.php">
                                                    마켓세일 전단지 관리
                                                </a>
                                            </li>   
                                            <li  {{SUB57}}>
                                                <a class="nav-link" href="../towninfo/marketsale_market_users_list.php">
                                                    마켓세일 사용자 관리
                                                </a>
                                            </li>                                            
											<li  {{SUB52}}>
				                                <a href="../towninfo/find_people_list.php">
				                                   사람찾기 관리
				                                </a>
				                            </li>
											<li  {{SUB53}}>
				                                <a href="../towninfo/notification_list.php">
				                                   행사알림 관리
				                                </a>
				                            </li>
											<li  {{SUB54}}>
				                                <a href="../towninfo/event_list.php">
				                                  마당엔 이벤트 관리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>
				                  

								     <li class="nav-parent {{MAIN6_NAV}}">
				                        <a href="javascript:return false;">
				                            <i class="bx bx-home" aria-hidden="true"></i>
				                            <span>부동산</span>
				                        </a>
				                        <ul class="nav nav-children">				                            
											<li  {{SUB62}}>
				                                <a href="/admin/realstate/agent_list.php">
				                                   에이전트 관리
				                                </a>
				                            </li>
                                            <li  {{SUB63}}>
                                                <a href="/admin/realstate/agent_pay_list.php">
                                                   에이전트 신청 & 결제 조회
                                                </a>
                                            </li>
                                            <li  {{SUB61}}>
                                                <a href="/admin/realstate/realstate_list.php">
                                                   부동산 매물관리
                                                </a>
                                            </li>
											<!--li  {{SUB3}}>
				                                <a href="">
				                                   문의관리
				                                </a>
				                            </li-->
				                           
				                        </ul>
				                    </li>
				                  

								    <li class="nav-parent  {{MAIN7_NAV}}">
				                        <a href="javascript:return false;">
				                            <i class="bx bx-collection" aria-hidden="true"></i>
				                            <span>Setting</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li {{SUB71}}>
				                                <a href="/admin/user/user_all_update.php">
				                                   개인정보 변경
				                                </a>
				                            </li>
                                            <li {{SUB72}}>
				                                <a href="/admin/user/permission_group_list.php">
				                                  권한설정
				                                </a>
				                            </li>
                                            <!--li {{SUB3}}>
				                                <a href="code.php">
				                                   공통코드관리
				                                </a>
				                            </li-->
				                           
				                        </ul>
				                    </li>
				                  
				                  
				                </ul>
				            </nav>
				            
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				    </div>
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body content-body-modern mt-0">
                    <!-- IF START 'NOTINDEX' -->
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-4">{{MTITLE}}</h2>
						<div class="right-wrapper">
							<ul class="breadcrumbs">
								<li>
									<a href="/admin/">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>{{MTITLE}}</span></li>
								<li><span>{{STITLE}}</span></li>
								{{YTITLE}}
							</ul>
							<a class="sidebar-right-toggle"></a>
							
						</div>
					</header>
                    <!-- IF END 'NOTINDEX' -->
					<!-- start: page -->

