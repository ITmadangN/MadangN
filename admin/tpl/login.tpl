<!DOCTYPE html>
<html class="fixed">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>마당엔 관리자 로그인</title>
    <meta name="keywords" content="미주 한인들의 놀이터" />
    <meta name="description" content="마당엔 관리자 로그인">
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
    <link rel="stylesheet" href="vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="vendor/morris/morris.css" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/modern.css" />
    <link rel="stylesheet" href="css/custom.css" />

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>

</head>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <div style="text-align:center;margin-bottom:15px;"><a href="/admin/"> <img src="/images/logo.png" class="logo-image" height="55" alt="마당엔" /> </a></div>

        <div class="panel card-sign">


            <div class="card-body">
                <form action="/admin/member/ajax_member.php" name="login" id="login" method="get">
                    <input type="hidden" name="ac" value="login_member" />
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="아이디" name="login_id" id="login_id" required />
                            <span class="input-group-text">
										<i class="bx bx-user text-4"></i>
									</span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <a href="find_password.php" class="float-end text-dark">비밀번호찾기</a>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg" name="login_passwd" id="login_passwd" placeholder="비밀번호" required />
                            <span class="input-group-text">
										<i class="bx bx-lock text-4"></i>
									</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <!--div class="checkbox-custom checkbox-default">
                                <input id="RememberMe" name="rememberme" type="checkbox"/>
                                <label for="RememberMe">자동로그인</label>
                            </div-->
                        </div>
                        <div class="col-sm-4 text-end">
                            <button type="submit" class="btn btn-primary mt-2">로그인</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="vendor/jquery/jquery.js"></script>
<script src="/js/libs/jquery.form.min.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/popper/umd/popper.min.html"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>
<!-- Theme Custom -->
<script src="js/custom.js"></script>
<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>
<script src="js/examples/examples.header.menu.js"></script>
<script src="js/examples/examples.ecommerce.datatables.list.js"></script>
<script src="js/member/login.js"></script>
</body>
</html>