<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
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
	<base href="">
	<meta charset="utf-8" />
	<title>BemPrever</title>
	<meta name="description" content="Updates and statistics" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="<?php echo site_url('assets/assetsAlison'); ?>/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="<?php echo site_url('assets/assetsAlison'); ?>/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url('assets/assetsAlison'); ?>/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url('assets/assetsAlison'); ?>/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="<?php echo site_url('assets/assetsAlison'); ?>/media/logos/fav-icon.png" />

	<style>
		#kt_body {
			background-size: auto 350px;
			background-position: right top;
		}

		@media (min-width: 992px) {

			.header-menu .menu-nav>.menu-item:hover:not(.menu-item-here):not(.menu-item-active)>.menu-link .menu-text,
			.header-menu .menu-nav>.menu-item.menu-item-hover:not(.menu-item-here):not(.menu-item-active)>.menu-link .menu-text,
			.header-menu .menu-nav>.menu-item.menu-item-here>.menu-link .menu-text,
			.header-menu .menu-nav>.menu-item.menu-item-active>.menu-link .menu-text {
				color: #08b6ce;
			}

			.header-menu .menu-nav>.menu-item>.menu-link .menu-text {
				color: #367294;
				font-weight: 500;
			}

			.text-dark {
				color: #367294 !important;
			}

			#kt_body {
				background-size: 100% 350px;
				background-position: right top;
			}
		}

		.topbar-item .btn.btn-hover-transparent-dark.align-items-center.btn-lg {
			background-color: rgba(255, 255, 255, 0.7);
			border-color: transparent;

		}

		.topbar-item .btn.btn-hover-transparent-dark:hover:not(.btn-text):not(:disabled):not(.disabled),
		.topbar-item .btn.btn-hover-transparent-dark:focus:not(.btn-text),
		.topbar-item .btn.btn-hover-transparent-dark.focus:not(.btn-text) {
			background-color: rgba(8, 182, 206, 0.2);
			border-color: transparent;
		}

		#kt_header_mobile .btn.btn-icon.btn-hover-transparent-dark {
			color: #367294;
			background-color: rgba(255, 255, 255, 0.7);
			border-color: transparent;
		}

		#kt_header_mobile .btn.btn-icon.btn-hover-transparent-dark .svg-icon svg g [fill] {
			-webkit-transition: fill 0.3s ease;
			transition: fill 0.3s ease;
			fill: #367294;
		}

		#kt_header_mobile .btn.btn-hover-transparent-dark:not(:disabled):not(.disabled):active:not(.btn-text),
		#kt_header_mobile .btn.btn-hover-transparent-dark:not(:disabled):not(.disabled).active,
		#kt_header_mobile .show>.btn.btn-hover-transparent-dark.dropdown-toggle,
		#kt_header_mobile .show .btn.btn-hover-transparent-dark.btn-dropdown {
			color: #367294;
			background-color: rgba(255, 255, 255, 0.7);
			border-color: transparent;
		}

		@media only screen and (max-width:768px) {
			.subheader .text-dark {
				color: black !important;
			}
		}
	</style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(<?php echo site_url('assets/imagens/bg-home.png'); ?>)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
	<!--begin::Main-->
	<!--begin::Header Mobile-->
	<div id="kt_header_mobile" class="header-mobile">
		<!--begin::Logo-->
		<a href="<?php echo site_url('rede/index'); ?>">
			<img alt="Logo" src="<?php echo site_url('assets/imagens/BPV-Logo-Color-Login.png'); ?>" class="logo-default max-h-30px" />
		</a>
		<!--end::Logo-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>
			<button class="btn btn-icon btn-hover-transparent-dark p-0 ml-3" id="kt_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl">
					<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24" />
							<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="1" />
							<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>
			</button>
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" class="header header-fixed">
					<!--begin::Container-->
					<div class="container d-flex align-items-stretch justify-content-between">
						<!--begin::Left-->
						<div class="d-flex align-items-stretch mr-3">
							<!--begin::Header Logo-->
							<div class="header-logo">
								<a href="<?php echo base_url('rede/index'); ?>">
									<img alt="Logo" src="<?php echo site_url('assets/imagens/BPV-Logo-Color-Login.png'); ?>" class="logo-default max-h-40px" />
									<img alt="Logo" src="<?php echo site_url('assets/imagens/BPV-Logo-Color-Login.png'); ?>" class="logo-sticky max-h-40px" />
								</a>
							</div>

							<!--end::Header Logo-->
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->
									<ul class="menu-nav">
										<li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="false">
											<a href="<?php echo site_url('rede/index'); ?>" class="menu-link">
												<span class="menu-text">Home</span>
												<i class="menu-arrow"></i>
											</a>
										</li>
										<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Assinatura</span>
												<span class="menu-desc"></span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-classic menu-submenu-left">
												<ul class="menu-subnav">


													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('rede/faturas/abertas') ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Files / File</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Files-/-File" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<rect id="Rectangle" fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
																		<rect id="Rectangle-Copy" fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Faturas em aberto</span>
														</a>
													</li>

													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('rede/faturas/pagas') ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Files / File-done</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Files-/-File-done" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z M10.875,15.75 C11.1145833,15.75 11.3541667,15.6541667 11.5458333,15.4625 L15.3791667,11.6291667 C15.7625,11.2458333 15.7625,10.6708333 15.3791667,10.2875 C14.9958333,9.90416667 14.4208333,9.90416667 14.0375,10.2875 L10.875,13.45 L9.62916667,12.2041667 C9.29375,11.8208333 8.67083333,11.8208333 8.2875,12.2041667 C7.90416667,12.5875 7.90416667,13.1625 8.2875,13.5458333 L10.2041667,15.4625 C10.3958333,15.6541667 10.6354167,15.75 10.875,15.75 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" id="check-path" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Faturas pagas</span>
														</a>
													</li>

													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('rede/assinatura/detalhes') ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Files / Selected-file</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Files-/-Selected-file" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" id="Combined-Shape-Copy" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Detalhes do plano</span>
														</a>
													</li>

												</ul>
											</div>
										</li>

										<?php if (isset($cat[0]['id'])) : ?>
											<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Credenciados</span>
													<span class="menu-desc"></span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">

														<?php foreach ($cat as $item) : ?>
															<li class="menu-item" aria-haspopup="true">
																<a target="_self" href="<?php echo site_url('rede/credenciados/categoria/' . $item['id']); ?>" class="menu-link">
																	<span class="svg-icon menu-icon">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																		<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																			<!--Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																			<title>Stockholm-icons / Home / Clock</title>
																			<desc>Created with Sketch.</desc>
																			<defs></defs>
																			<g id="Stockholm-icons-/-Home-/-Clock" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect id="bound" x="0" y="0" width="24" height="24"></rect>
																				<path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" id="Mask" fill="#000000" opacity="0.3"></path>
																				<path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" id="Path-107" fill="#000000"></path>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																	<span class="menu-text"><?php echo $item['titulo']; ?></span>
																</a>
															</li>
														<?php endforeach; ?>

													</ul>
												</div>
											</li>
										<?php endif; ?>

										<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Financeiro</span>
												<span class="menu-desc"></span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-classic menu-submenu-left">
												<ul class="menu-subnav">


													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('rede/financeiro/balanco'); ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Home / Clock</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Home-/-Clock" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect id="bound" x="0" y="0" width="24" height="24"></rect>
																		<path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" id="Mask" fill="#000000" opacity="0.3"></path>
																		<path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" id="Path-107" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Histórico Financeiro</span>
														</a>
													</li>

													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('rede/saques/pedir'); ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Shopping / Dollar</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Shopping-/-Dollar" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect id="bound" x="0" y="0" width="24" height="24"></rect>
																		<rect id="Rectangle" fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"></rect>
																		<rect id="Rectangle-Copy-3" fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"></rect>
																		<path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" id="Combined-Shape" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Solicitar Saque</span>
														</a>
													</li>

												</ul>
											</div>
										</li>

										<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Rede</span>
												<span class="menu-desc"></span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-classic menu-submenu-left">
												<ul class="menu-subnav">

													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('rede/unilevel'); ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Design / Layers</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Design-/-Layers" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Unilevel</span>
														</a>
													</li>

													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('rede/visualizar'); ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Design / Bezier-curve</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Design-/-Bezier-curve" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect id="bound" x="0" y="0" width="24" height="24"></rect>
																		<path d="M4.95312427,14.3025791 L3.04687573,13.6974209 C4.65100965,8.64439903 7.67317997,6 12,6 C16.32682,6 19.3489903,8.64439903 20.9531243,13.6974209 L19.0468757,14.3025791 C17.6880467,10.0222676 15.3768837,8 12,8 C8.62311633,8 6.31195331,10.0222676 4.95312427,14.3025791 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M5.73243561,6 L9.17070571,6 C9.58254212,4.83480763 10.6937812,4 12,4 C13.3062188,4 14.4174579,4.83480763 14.8292943,6 L18.2675644,6 C18.6133738,5.40219863 19.2597176,5 20,5 C21.1045695,5 22,5.8954305 22,7 C22,8.1045695 21.1045695,9 20,9 C19.2597176,9 18.6133738,8.59780137 18.2675644,8 L14.8292943,8 C14.4174579,9.16519237 13.3062188,10 12,10 C10.6937812,10 9.58254212,9.16519237 9.17070571,8 L5.73243561,8 C5.38662619,8.59780137 4.74028236,9 4,9 C2.8954305,9 2,8.1045695 2,7 C2,5.8954305 2.8954305,5 4,5 C4.74028236,5 5.38662619,5.40219863 5.73243561,6 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z M4,19 C2.34314575,19 1,17.6568542 1,16 C1,14.3431458 2.34314575,13 4,13 C5.65685425,13 7,14.3431458 7,16 C7,17.6568542 5.65685425,19 4,19 Z M4,17 C4.55228475,17 5,16.5522847 5,16 C5,15.4477153 4.55228475,15 4,15 C3.44771525,15 3,15.4477153 3,16 C3,16.5522847 3.44771525,17 4,17 Z M20,19 C18.3431458,19 17,17.6568542 17,16 C17,14.3431458 18.3431458,13 20,13 C21.6568542,13 23,14.3431458 23,16 C23,17.6568542 21.6568542,19 20,19 Z M20,17 C20.5522847,17 21,16.5522847 21,16 C21,15.4477153 20.5522847,15 20,15 C19.4477153,15 19,15.4477153 19,16 C19,16.5522847 19.4477153,17 20,17 Z" id="Combined-Shape" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Matriz</span>
														</a>
													</li>

												</ul>
											</div>
										</li>

										<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="false">
											<a href="<?php echo site_url('rede/perguntas_frequentes'); ?>" class="menu-link">
												<span class="menu-text">FAQ</span>
												<i class="menu-arrow"></i>
											</a>
										</li>

										<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Documentos</span>
												<span class="menu-desc"></span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-classic menu-submenu-left">
												<ul class="menu-subnav">


													<li class="menu-item" aria-haspopup="true">
														<a href="<?php echo site_url('apn'); ?>" target="_blank" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Files / File</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Files-/-File" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<rect id="Rectangle" fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
																		<rect id="Rectangle-Copy" fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">APN Bemprever</span>
														</a>
													</li>

													<li class="menu-item" aria-haspopup="true">
														<a target="_blank" href="<?php echo site_url('termos_e_condicoes_de_uso'); ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Files / File</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Files-/-File" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<rect id="Rectangle" fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
																		<rect id="Rectangle-Copy" fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Termo De Adesão</span>
														</a>
													</li>

													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('carta_de_orientacao_ao_associado'); ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Files / File</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Files-/-File" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<rect id="Rectangle" fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
																		<rect id="Rectangle-Copy" fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Carta De Orientação Ao Associado</span>
														</a>
													</li>

													<li class="menu-item" aria-haspopup="true">
														<a target="_self" href="<?php echo site_url('requerimento_de_abertura_de_evento'); ?>" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
																	<title>Stockholm-icons / Files / File</title>
																	<desc>Created with Sketch.</desc>
																	<defs></defs>
																	<g id="Stockholm-icons-/-Files-/-File" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<rect id="Rectangle" fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
																		<rect id="Rectangle-Copy" fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Requerimento De Abertura De Evento</span>
														</a>
													</li>

												</ul>
											</div>
										</li>
									</ul>
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
						</div>
						<!--end::Left-->
						<!--begin::Topbar-->
						<div class="topbar">
							<!--begin::Search-->

							<!--end::Quick panel-->
							<!--begin::Languages-->
							<div class="dropdown">
								<!--begin::Toggle-->
								<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
									<div class="btn btn-icon btn-hover-transparent-dark btn-dropdown btn-lg mr-1">
										<div class="h-20px w-20px rounded-sm" style="background-image:url('<?php echo getImgPerf($this->session->userdata('foto')); ?>');
												   background-position:center center;
												   background-size:cover;
												   background-repeat:no-repeat;" alt="">
										</div>
									</div>
								</div>
								<!--end::Toggle-->

							</div>
							<!--end::Languages-->
							<!--begin::User-->
							<div class="dropdown">
								<!--begin::Toggle-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-hover-transparent-dark d-flex align-items-center btn-lg px-md-2 w-md-auto" id="kt_quick_user_toggle">
										<span class="text-dark opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Olá,</span>

										<?php $nomeUUU = explode(' ', $this->session->userdata('nome')); ?>

										<span class="text-dark opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4"><?php echo $nomeUUU[0]; ?></span>
										<span class="symbol symbol-35">
											<span class="symbol-label text-dark font-size-h5 font-weight-bold bg-dark-o-30"><?php echo substr($this->session->userdata('nome'), 0, 1); ?></span>
										</span>
									</div>
								</div>
								<!--end::Toggle-->
							</div>
							<!--end::User-->
						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Subheader-->
					<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
						<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
							<!--begin::Info-->
							<div class="d-flex align-items-center flex-wrap mr-1">
								<!--begin::Heading-->
								<div class="d-flex flex-column">
									<!--begin::Title-->
									<h2 class="text-dark font-weight-bold my-2 mr-5"><?php echo $title; ?></h2>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<div class="d-flex align-items-center font-weight-bold my-2">
										<!--begin::Item-->
										<a href="#" class="opacity-75 hover-opacity-100">
											<i class="flaticon2-shelter text-dark icon-1x"></i>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<span class="label label-dot label-sm bg-dark opacity-75 mx-3">ghj</span>
										<a href="" class="text-dark text-hover-dark opacity-75 hover-opacity-100"><?php echo (isset($title) ? $title : '---'); ?></a>
										<!--end::Item-->
										<!--begin::Item-->
										<?php if (isset($subTitle)) : ?>
											<span class="label label-dot label-sm bg-dark opacity-75 mx-3">bbbbadfg</span>
											<a href="" class="text-dark text-hover-dark opacity-75 hover-opacity-100"><?php echo $subTitle; ?></a>
										<?php endif; ?>
										<!--end::Item-->
									</div>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Heading-->
							</div>
							<!--end::Info-->
						</div>
					</div>
					<!--end::Subheader-->