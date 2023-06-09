<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	<meta charset="utf-8" />
	<title>Login || DronConnect</title>
	<meta name="description" content="No aside layout examples" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/themes/layout/brand/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
	<!--begin::Page Custom Styles(used by this page)-->
	<link href="{{ asset('assets/css/pages/users/login-1.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.png') }}" />
	<style>
		@media (min-width: 768px) {
			#kt_header .container-fluid {
				width: 750px;
			}

			#kt_header_menu .menu-text {
				color: #ffffff;
				font-size: 14px;
			}
		}

		@media (min-width: 992px) {
			#kt_header .container-fluid {
				width: 970px;
			}

			#kt_header {
				height: 110px;
			}
		}

		@media (min-width: 1200px) {
			#kt_header .container-fluid {
				width: 1200px;
			}

			#kt_header {
				height: 130px;
			}

			.header-logo {
				margin-right: 120px !important;
			}

			#kt_header_menu .menu-text {
				color: #ffffff;
				font-size: 14px;
			}
		}
		.socialaccount_providers > li{
			display: inline-flex;
			list-style-type: none;
			padding-right: 2rem;
		}
	</style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
	<!--begin::Main-->
	<!--begin::Header Mobile-->
	<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed"
		style="background-color: #3d80b6;">
		<!--begin::Logo-->
		<a href="index.html">
			<img alt="Logo" src="assets/media/logos/logo.jpg" style="height: 55px;" />
		</a>
		<!--end::Logo-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Header Menu Mobile Toggle-->
			<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>
			<!--end::Header Menu Mobile Toggle-->
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" class="header header-fixed" style="background-color: #3d80b6;">
					<!--begin::Container-->
					<div class="container-fluid d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
							<!--begin::Header Logo-->
							<div class="header-logo">
								<a href="index.html">
									<img alt="Logo" src="assets/media/logos/logo.jpg" />
								</a>
							</div>
							<!--end::Header Logo-->
							<!--begin::Header Menu-->
							<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
								<!--begin::Header Nav-->
								<ul class="menu-nav">
									<li class="menu-item menu-item-submenu menu-item-rel">
										<a href="../index.html" class="menu-link">
											<span class="menu-text">HOME</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu">
										<a href="../how-it-works.html" class="menu-link">
											<span class="menu-text">HOW IT WORK</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu menu-item-rel">
										<a href="../index.html" class="menu-link">
											<span class="menu-text">BROWSE PILOTS</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu menu-item-rel">
										<a href="../index.html" class="menu-link">
											<span class="menu-text">SHOP</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu menu-item-rel">
										<a href="../blog.html" class="menu-link">
											<span class="menu-text">BLOG</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu menu-item-rel">
										<a href="../about.html" class="menu-link">
											<span class="menu-text">ABOUT US</span>
										</a>
									</li>
								</ul>
								<!--end::Header Nav-->
							</div>
							<!--end::Header Menu-->
						</div>
						<!--end::Header Menu Wrapper-->
						<!--begin::Topbar-->
						<div class="topbar">
							<div class="topbar-item">
								<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2 bg-white"
									id="kt_quick_user_toggle"
									style="height: 45px; border-radius: 10px;font-size: 14px;">
									<span class="font-weight-bold font-size-base d-none d-md-inline mr-1"
										style="color:#3d80b6; font-weight: 700 !important; padding: 0 13px;">LOGIN /
										JOIN US</span>
								</div>
							</div>
						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Content-->
				<div class="d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Entry-->
					<div class="d-flex flex-column-fluid">
						<!--begin::Login-->
						<div class="login login-1 d-flex flex-column flex-lg-row flex-row-fluid bg-white">
							<!--begin::Content-->
							<div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
								<!--begin::Content header-->
								<div
									class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">

								</div>
								<!--end::Content header-->
								<!--begin::Content body-->
								<div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
									
									<!--begin::Signup-->
									<div class="login-form">
										<div class="text-center" style="margin-top: 125px;">
											<h3 class="font-size-h1">Sign Up</h3>
											<p class="text-muted font-weight-bold">Enter your details to create your
												account</p>
										</div>
										<!--begin::Form-->
										<form method="POST" action="{{ route('register') }}" class="form" novalidate="novalidate">
                                            @csrf
											<input type="hidden" name="type" value="admin">
											<div class="form-group">
												<label class="col-form-label text-right">First name</label>
												<input class="form-control h-auto px-6 @error('first_name') is-invalid @enderror" type="text"
													placeholder="First name"  name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus />
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											<div class="form-group">
												<label class="col-form-label text-right">Last name</label>
												<input class="form-control h-auto px-6 @error('last_name') is-invalid @enderror" type="text"
													placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus />
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											<div class="form-group">
												<label class="col-form-label text-right">Email</label>
												<input class="form-control h-auto px-6 @error('email') is-invalid @enderror" type="email" placeholder="Email"
													name="email" value="{{ old('email') }}" required autocomplete="email" />
											</div>
											<div class="form-group">
												<label class="col-form-label text-right">Password</label>
												<input id="password" class="form-control h-auto px-6 @error('password') is-invalid @enderror" type="password"
													placeholder="Password" name="password" required autocomplete="new-password" />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
                                            <div class="form-group">
												<label for="password-confirm" class="col-form-label text-right">Password</label>
												<input id="password-confirm" class="form-control h-auto px-6" type="password"
													placeholder="Password" name="password_confirmation" required autocomplete="new-password" />
											</div>
											<div class="form-group d-flex flex-wrap flex-center">
												<button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
												<button id="kt_login_signup_cancel"
													class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
											</div>
										</form>
										<!--end::Form-->
									</div>
									<!--end::Signup-->
									<!--begin::Forgot-->
									<div class="login-form login-forgot">
										<div class="text-center mb-10 mb-lg-20">
											<h3 class="font-size-h1">Forgotten Password ?</h3>
											<p class="text-muted font-weight-bold">Enter your email to reset your
												password</p>
										</div>
										<!--begin::Form-->
										<form class="form" novalidate="novalidate">
											<div class="form-group">
												<input class="form-control form-control-solid h-auto py-5 px-6"
													type="email" placeholder="Email" name="email" autocomplete="off" />
											</div>
											<div class="form-group d-flex flex-wrap flex-center">
												<button id="kt_login_forgot_submit"
													class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
												<button id="kt_login_forgot_cancel"
													class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
											</div>
										</form>
										<!--end::Form-->
									</div>
									<!--end::Forgot-->
								</div>
								<!--end::Content body-->
								<!--begin::Content footer for mobile-->
								<div
									class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
									<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
										<p>Copyright <a href="#" target="_blank">DronConnect</a>
											All Rights Reserved 2017</p>
									</div>
									<div class="d-flex order-1 order-sm-2 my-2">
										<!-- <a href="#" class="text-dark-75 text-hover-primary">Privacy</a>
											<a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>
											<a href="#" class="text-dark-75 text-hover-primary ml-4">Contact</a> -->
									</div>
								</div>
								<!--end::Content footer for mobile-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Login-->
					</div>
					<!--end::Entry-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Main-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop">
		<span class="svg-icon">
			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
				height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
					<path
						d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
						fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
			<!--end::Svg Icon-->
		</span>
	</div>
	<!--end::Scrolltop-->
	<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
	<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Vendors(used by this page)-->
	<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
	<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
	<script src="{{ asset('assets/plugins/custom/gmaps/gmaps.js') }}"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(used by this page)-->
	<!-- <script src="assets/js/pages/widgets.js"></script> -->
	<!--begin::Page Scripts(used by this page)-->
	<script src="{{ asset('assets/js/pages/custom/login/login.js') }}"></script>
	<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
	<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>