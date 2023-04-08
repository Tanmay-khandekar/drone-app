@extends('layouts.app')

@section('content')

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header header-fixed">
		<!--begin::Container-->
		<div class="container-fluid d-flex align-items-stretch justify-content-between">
			<!--begin::Header Menu Wrapper-->
			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
				<!--begin::Header Menu-->
				
				<!--end::Header Menu-->
			</div>
			<!--end::Header Menu Wrapper-->
			<!--begin::Topbar-->
			<div class="topbar">
				<!--begin::User-->
				<div class="topbar-item">
					<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
						<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
						<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ auth()->user()->first_name }}</span>
						<span class="symbol symbol-35 symbol-light-success">
							<span class="symbol-label font-size-h5 font-weight-bold">S</span>
						</span>
					</div>
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
		<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
			<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Info-->
				<div class="d-flex align-items-center flex-wrap mr-1">
					<!--begin::Page Heading-->
					<div class="d-flex align-items-baseline mr-5">
						<!--begin::Page Title-->
						<h5 class="text-dark font-weight-bold my-2 mr-5">Customer onboarding</h5>
						<!--end::Page Title-->
					</div>
					<!--end::Page Heading-->
				</div>
				<!--end::Info-->
				<!--begin::Toolbar-->
				<div class="d-flex align-items-center">
					<!--begin::Actions-->
					
				</div>
				<!--end::Toolbar-->
			</div>
		</div>
		<!--end::Subheader-->
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Content-->
					<div class="flex-row-fluid ml-lg-8">
						<!--begin::Card-->
						<div class="card card-custom card-stretch">
							<!--begin::Header-->
							<div class="card-header py-3">
								<div class="card-title align-items-start flex-column">
									<h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
									<span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
								</div>
								<div class="card-toolbar">
									<button type="reset" class="btn btn-success mr-2">Save Changes</button>
									<button type="reset" class="btn btn-secondary">Cancel</button>
								</div>
							</div>
							<!--end::Header-->
							<!--begin::Form-->
							<form class="form">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mb-6">Customer Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Avatar</label>
										<div class="col-lg-9 col-xl-6">
											<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
												<div class="image-input-wrapper" style="background-image: url(assets/media/users/300_21.jpg)"></div>
												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
													<i class="fa fa-pen icon-sm text-muted"></i>
													<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
													<input type="hidden" name="profile_avatar_remove" />
												</label>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
											</div>
											<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">First Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->first_name }}" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Last Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->last_name }}" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Company Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" value="" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Job Title</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-right-desktop col-lg-3 col-sm-12">Are you working with active projects?</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid">
											<option>Yes</option>
											<option>NO</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-right-desktop col-lg-3 col-sm-12">Industry</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid selectpicker" multiple data-actions-box="true">
											<option>EVENT PHOTOGRAPHY</option>
											<option>CONSTRUCTION</option>
											<option>COMMERCIAL REAL ESTATE</option>
											<option>INSURANCE</option>
											<option>PROPERTY MANAGEMENT</option>
											<option>RESIDENTIAL REAL ESTATE</option>
											<option>SOLAR</option>
											<option>WIND</option>
											<option>TELECOM</option>
											<option>UTILITIES</option>
											</select>
										</div>
									</div>
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Phone Number</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-phone"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid" value="" placeholder="Phone" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Email Address</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid" value="{{ auth()->user()->email }}" placeholder="Email" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">State/Region</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" />
										</div>
									</div>
								</div>
								<!--end::Body-->
							</form>
							<!--end::Form-->
						</div>
					</div>
					<!--end::Content-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
	
</div>
<!--end::Wrapper-->
@endsection