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
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />		
		<link rel="stylesheet" href="vendor/animate/animate.compat.css">		
		<link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />		
		<link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />		
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />		
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />		
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />	
		<link rel="stylesheet" href="vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="vendor/dropzone/basic.css" />		
        <link rel="stylesheet" href="vendor/dropzone/dropzone.css" />		
        <link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />		
        <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css" />
		<link rel="stylesheet" href="vendor/morris/morris.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/modern.css" />
		<link rel="stylesheet" href="css/custom.css" />

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>
	    <script src="master/style-switcher/style.switcher.localstorage.js"></script>

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
									<li class="dropdown<?php if($main=="1"){?> active<?php }?>">
									    <a class="nav-link dropdown-toggle" href="member.php">
									        사용자
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="member.php">
									               사용자 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="history.php">
									                사용자 접속내역
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown<?php if($main=="2"){?> active<?php }?>">
									    <a class="nav-link dropdown-toggle" href="#">
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
									        </li>
									        <li-->
									            <a class="nav-link" href="ecommerce-products-form.html">
									                뉴스 게시물 관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown<?php if($main=="3"){?> active<?php }?>">
									    <a class="nav-link dropdown-toggle" href="youtube_list.php">
									       유튜브
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="ecommerce-dashboard.html">
									                재생목록 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="ecommerce-products-list.html">
									                동영상 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="ecommerce-products-form.html">
									                동영상 히스토리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown<?php if($main=="4"){?> active<?php }?>">
									    <a class="nav-link dropdown-toggle" href="community/comm_01.php">
									        커뮤니티
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="community/comm_01.php">
									               광고 신청 & 결제 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="/admin/community/recruit_list.php">
									                구인구직 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="/admin/community/market_list.php">
									                사고팔고 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="/admin/community/business_list.php">
									               비즈니스 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="/admin/community/vehicle_dealer_list.php">
									                자동차 딜러 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="#">
									                자동차 관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown<?php if($main=="5"){?> active<?php }?>">
									    <a class="nav-link dropdown-toggle" href="#">
									        타운정보
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="ecommerce-dashboard.html">
									                마켓세일 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="ecommerce-products-list.html">
									                사람찾기 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="ecommerce-products-form.html">
									                행사알림 관리
									            </a>
									        </li>
											<li>
									            <a class="nav-link" href="ecommerce-products-form.html">
									                마당엔 이벤트 관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown<?php if($main=="6"){?> active<?php }?>">
									    <a class="nav-link dropdown-toggle" href="#">
									        부동산
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="ecommerce-dashboard.html">
									                부동산 매물관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="ecommerce-products-list.html">
									                에이전트 관리
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="ecommerce-products-form.html">
									                문의관리
									            </a>
									        </li>
									        
									    </ul>
									</li>
									<li class="dropdown<?php if($main=="7"){?> active<?php }?>">
									    <a class="nav-link dropdown-toggle" href="setting.php">
									        Setting
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="setting.php">
									                개인정보 변경
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="level.php">
									                권한설정
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="code.php">
									                공통코드관리
									            </a>
									        </li>
									        
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
							<a href="/admin/"><i class="bx bx-log-out"></i> 로그아웃</a>
						</li>
					</ul>
					<span class="separator"></span>
					<div id="userbox" class="userbox">
						<a href="#" data-bs-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/%21logged-user.jpg" alt="sernakim" class="rounded-circle" data-lock-picture="img/%21logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">Sena Kim</span>
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
				                           <li class="nav-parent <?php if($main=="1"){?>nav-expanded nav-active<?php }?>">
				                        <a href="member.php">
				                            <i class="bx bx-user" aria-hidden="true"></i>
				                            <span>사용자</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li<?= ($sub == 1) ? ' class="nav-active"' : '' ?>>
				                                <a href="member.php">
				                                    사용자 관리
				                                </a>
				                            </li>
				                            <li<?= ($sub == 2) ? ' class="nav-active"' : '' ?>>
				                                <a href="history.php">
				                                    사용자 접속 내역
				                                </a>
				                            </li>
				                         
				                        </ul>
				                    </li>
				                    <li class="nav-parent <?php if($main=="2"){?>nav-expanded nav-active<?php }?>">
				                        <a href="#">
				                            <i class="bx bx-news" aria-hidden="true"></i>
				                            <span>뉴스</span>
				                        </a>
				                        <ul class="nav nav-children">
				                          <!--li<?= ($sub == 1) ? ' class="nav-active"' : '' ?>>
				                                <a href="tables-basic.html">
				                                   메인 페이지 뉴스 관리
				                                </a>
				                            </li>
				                           <li<?= ($sub == 2) ? ' class="nav-active"' : '' ?>>
				                                <a href="tables-advanced.html">
				                                    뉴스홈 관리
				                                </a>
				                            </li>
				                          <li<?= ($sub == 3) ? ' class="nav-active"' : '' ?>>
				                                <a href="tables-responsive.html">
				                                    뉴스 게시물 관리
				                                </a>
				                            </li-->
				                           
				                        </ul>
				                    </li>
				                    <li class="nav-parent <?php if($main=="3"){?>nav-expanded nav-active<?php }?>">
				                        <a href="youtube_list.php">
				                            <i class="bx bxl-youtube" aria-hidden="true"></i>
				                            <span>유튜브</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <li<?= ($sub == 1) ? ' class="nav-active"' : '' ?>>
				                                    <a href="youtube_list.php">재생목록 관리
				                                </a>
				                            </li>
											<li>
				                               <li<?= ($sub == 2) ? ' class="nav-active"' : '' ?>>
				                                    <a href="youtube_list.php">동영상 관리
				                                </a>
				                            </li>
											<li>
				                                <li<?= ($sub == 3) ? ' class="nav-active"' : '' ?>>
				                                    <a href="youtube_list.php">동영상 히스토리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>

									    <li class="nav-parent <?php if($main=="4"){?>nav-expanded nav-active<?php }?>">
				                        <a href="/admin/community/community_pay_list.php">
				                            <i class="bx bx-comment" aria-hidden="true"></i>
				                            <span>커뮤니티</span>
				                        </a>
				                        <ul class="nav nav-children">
				                             <li<?= ($sub == 1) ? ' class="nav-active"' : '' ?>>
				                                <a href="/admin/community/community_pay_list.php">
				                                   광고 신청 & 결제
				                                </a>
				                            </li>
											 <li<?= ($sub == 2) ? ' class="nav-active"' : '' ?>>
				                                <a href="/admin/community/recruit_list.php">
				                                  구인구직 관리
				                                </a>
				                            </li>
											 <li<?= ($sub == 3) ? ' class="nav-active"' : '' ?>>
				                                <a href="/admin/community/market_list.php">
				                                   사고팔고 관리
				                                </a>
				                            </li>
											 <li<?= ($sub == 5) ? ' class="nav-active"' : '' ?>>
				                                <a href="/admin/community/business_list.php">
				                                  비지니스 관리
				                                </a>
				                            </li>
											 <li<?= ($sub == 6) ? ' class="nav-active"' : '' ?>>
				                                <a href="/admin/community/vehicle_dealer_list.php">
				                                   자동차 딜러 관리
				                                </a>
				                            </li>
											 <li<?= ($sub == 8) ? ' class="nav-active"' : '' ?>>
				                                <a href="">
				                                   자동차 관리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>
				                  

								    <li class="nav-parent <?php if($main=="5"){?>nav-expanded nav-active<?php }?>">
				                        <a href="#">
				                            <i class="bx bx-info-circle" aria-hidden="true"></i>
				                            <span>타운정보</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a href="">
				                                   마켓세일 관리
				                                </a>
				                            </li>
											<li>
				                                <a href="">
				                                   사람찾기 관리
				                                </a>
				                            </li>
											<li>
				                                <a href="">
				                                   행사알림 관리
				                                </a>
				                            </li>
												<li>
				                                <a href="">
				                                  마당엔 이벤트 관리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>
				                  

								     <li class="nav-parent <?php if($main=="6"){?>nav-expanded nav-active<?php }?>">
				                        <a href="#">
				                            <i class="bx bx-home" aria-hidden="true"></i>
				                            <span>부동산</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a href="">
				                                   부동산 매물관리
				                                </a>
				                            </li>
											<li>
				                                <a href="">
				                                   에이전트 관리
				                                </a>
				                            </li>
											<li>
				                                <a href="">
				                                   문의관리
				                                </a>
				                            </li>
				                           
				                        </ul>
				                    </li>
				                  

								    <li class="nav-parent <?php if($main=="7"){?>nav-expanded nav-active<?php }?>">
				                        <a href="#">
				                            <i class="bx bx-collection" aria-hidden="true"></i>
				                            <span>Setting</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li<?= ($sub == 1) ? ' class="nav-active"' : '' ?>>
				                                <a href="setting.php">
				                                   개인정보 변경
				                                </a>
				                            </li>
											 <li<?= ($sub == 2) ? ' class="nav-active"' : '' ?>>
				                                <a href="level.php">
				                                  권한설정
				                                </a>
				                            </li>
											 <li<?= ($sub == 3) ? ' class="nav-active"' : '' ?>>
				                                <a href="code.php">
				                                   공통코드관리
				                                </a>
				                            </li>
				                           
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
				<?php if($main=="index"){?>
				 <?php }else {?>
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-4"><?php echo $mtitle ?></h2>
						<div class="right-wrapper">
							<ul class="breadcrumbs">
								<li>
									<a href="/admin/">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span><?php echo $mtitle ?></span></li>
								<li><span><?php echo $stitle ?></span></li>
								<?= !empty($ytitle) ? "<li><span>{$ytitle}</span></li>" : "" ?>
							</ul>
							<a class="sidebar-right-toggle"></a>
							
						</div>
					</header>
					<?php }?>
					<!-- start: page -->

