@extends('layouts.app')

@section('content')

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	<!--begin::Header-->
	@include('layouts.components.top-header')
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
						<h5 class="text-dark font-weight-bold my-2 mr-5">{{auth()->user()->type}} onboarding</h5>
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
						<?php
							if(auth()->user()->status == 0 && auth()->user()->type == 'pilot' ){
						?> 
						<div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
							<div class="alert-icon"><i class="flaticon-warning"></i></div>
							<div class="alert-text">Activate account post verification <a href="pilot-verification">Pilot account Page</a></div>
							<div class="alert-close">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="ki ki-close"></i></span>
								</button>
							</div>
						</div>
						<?php } ?>
						<!--begin::Form-->
						<form class="form" id="profile-data">
							<input type="hidden" name="id" id="uid" value="{{ auth()->user()->id }}">
							<!--begin::Card-->
							<div class="card card-custom card-stretch">
							<!--begin::Header-->
								<div class="card-header py-3">
									<div class="card-title align-items-start flex-column">
										<h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
										<span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
									</div>
									<div class="card-toolbar">
										<button type="reset" class="btn btn-success mr-2" id="btn-profile-save">Save Changes</button>
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mb-6">{{auth()->user()->type}} Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Avatar</label>
										<div class="col-lg-9 col-xl-6">
											<div class="image-input image-input-outline" id="kt_image_4" style="background-image: url(assets/media/users/blank.png)">
												<div class="image-input-wrapper" style="background-image: url(<?php echo auth()->user()->user_profile; ?>)"></div>
												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
													<i class="fa fa-pen icon-sm text-muted"></i>
													<input type="file" name="user_profile" id="user_profile" accept=".png, .jpg, .jpeg" />
													<input type="hidden" name="profile_avatar_remove" />
												</label>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
											</div>
											<span class="form-text text-muted">After image removal hidden input's value is set to "1"</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">First Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="first_name" id="first_name" type="text" value="{{ auth()->user()->first_name }}" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Last Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="last_name" id="last_name" type="text" value="{{ auth()->user()->last_name }}" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Company Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="company" type="text" value="{{ auth()->user()->company }}" />
										</div>
									</div>
									<?php if(auth()->user()->type == 'customer'){ ?>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Job Title</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" value="{{ auth()->user()->jobtitle }}" name="jobtitle" type="text" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-right-desktop col-lg-3 col-sm-12">Are you working with active projects?</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid" name="active_project">
											<option>Yes</option>
											<option>NO</option>
											</select>
										</div>
									</div>
									<?php } ?>
									<?php $industry = explode(',',auth()->user()->industry);
										$industryOptions = ['event_photography' => 'EVENT PHOTOGRAPHY',
															'construction' =>'CONSTRUCTION',
															'commercial_real_estate' => 'COMMERCIAL REAL ESTATE',
															'insurance' => 'INSURANCE',
															'property_management' => 'PROPERTY MANAGEMENT',
															'residential_real_estate' => 'RESIDENTIAL REAL ESTATE',
															'solar' => 'SOLAR',
															'wind' => 'WIND',
															'telecom'=> 'TELECOM',
															'utilities'=> 'UTILITIES'];
									?>
									<div class="form-group row">
										<label class="col-form-label text-right-desktop col-lg-3 col-sm-12">Industry</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid selectpicker" name="industry[]" multiple="multiple" data-actions-box="true">
												@foreach($industryOptions as $ikey => $ioption)
													<option <?php echo in_array($ikey, $industry) ? 'selected' : ''; ?> value="{{$ikey}}">{{$ioption}}</option>
												@endforeach
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
												<input type="text" class="form-control form-control-lg form-control-solid" name="phone" value="{{ auth()->user()->phone }}" placeholder="Phone" />
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
												<input type="text" class="form-control form-control-lg form-control-solid" name="email" id="email" value="{{ auth()->user()->email }}" placeholder="Email" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">State/Region</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="state" value="{{ auth()->user()->state }}" type="text" />
										</div>
									</div>
									<!-- pilot details -->
									<?php
										if(auth()->user()->type == 'pilot'){
									?>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">License Category</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" />
										</div>
									</div>
									<div>
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Packages:</label>
											<div class="col-lg-10 package-list">
												<!-- <div class="form-group row align-items-center">
													<div class="col-md-6">
														<label>Name:</label>
														<input type="text" name="package[pname][]" class="form-control" placeholder="Enter Package Name"/>
														<div class="d-md-none mb-2"></div>
													</div>
													<div class="col-md-4">
														<label>Price:</label>
														<input type="number" name="package[price][]" class="form-control" placeholder="Enter Package Price"/>
														<div class="d-md-none mb-2"></div>
													</div>
													<div class="col-md-10 mt-5">
														<label>Sample Link:</label>
														<input type="text" name="package[link][]" class="form-control" placeholder="Enter Sample Link"/>
														<div class="d-md-none mb-2"></div>
													</div>
													<div class="col-md-6 mt-5">
														<label>Package Description:</label>
														<textarea name="package[packagedesc][]" name="description" class="form-control" id="" cols="30" rows="4"></textarea>
														<div class="d-md-none mb-2"></div>
													</div>
													<div class="col-md-6">
														<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
															<i class="la la-trash-o"></i>Delete
														</a>
													</div>
												</div> -->
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-2 col-form-label text-right"></label>
											<div class="col-lg-4">
												<a href="javascript:;" class="btn btn-sm font-weight-bolder btn-light-primary add-more">
													<i class="la la-plus"></i>Add
												</a>
											</div>
										</div>
									</div>
									<?php 
										}
									?>
									<!-- pilot details -->
								</div>
								<!--end::Body-->
							</div>
						</form>
						<!--end::Form-->
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
@section('js')
<script>
	$(document).ready(function() {
		var i = 0;
		var packages = <?php echo isset(auth()->user()->packages) ? auth()->user()->packages:0; ?>;
		if(packages){
			getpackages();
		}
		function getpackages(){
			if(packages){
				$.each(packages, function(key, val){
					var html = `<div class="form-group row align-items-center">
								<div class="col-md-6">
									<label>Name:</label>
									<input type="text" name="packages[`+i+`][pname]" class="form-control" value="`+val.pname+`" placeholder="Enter Package Name"/>
									<div class="d-md-none mb-2"></div>
								</div>
								<div class="col-md-4">
									<label>Price:</label>
									<input type="number" name="packages[`+i+`][price]" class="form-control" value="`+val.price+`" placeholder="Enter Package Price"/>
									<div class="d-md-none mb-2"></div>
								</div>
								<div class="col-md-10 mt-5">
									<label>Sample Link:</label>
									<input type="text" name="packages[`+i+`][link]" class="form-control" value="`+val.link+`" placeholder="Enter Sample Link"/>
									<div class="d-md-none mb-2"></div>
								</div>
								<div class="col-md-6 mt-5">
									<label>Package Description:</label>
									<textarea name="packages[`+i+`][packagedesc]" name="description" class="form-control" id="" cols="30" rows="4">`+val.packagedesc+`</textarea>
									<div class="d-md-none mb-2"></div>
								</div>
								<div class="col-md-6">
									<a href="javascript:;" class="btn btn-sm font-weight-bolder btn-light-danger btn-remove">
										<i class="la la-trash-o"></i>Delete
									</a>
								</div>
							</div>`;
					$('.package-list').append(html);
				});
			}
			
		}
        
		$(document).on('click', '.add-more',function(){
			var html = `<div class="form-group row align-items-center">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" name="packages[`+i+`][pname]" class="form-control" placeholder="Enter Package Name"/>
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-4">
								<label>Price:</label>
								<input type="number" name="packages[`+i+`][price]" class="form-control" placeholder="Enter Package Price"/>
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-10 mt-5">
								<label>Sample Link:</label>
								<input type="text" name="packages[`+i+`][link]" class="form-control" placeholder="Enter Sample Link"/>
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-6 mt-5">
								<label>Package Description:</label>
								<textarea name="packages[`+i+`][packagedesc]" name="description" class="form-control" id="" cols="30" rows="4"></textarea>
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-6">
								<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger btn-remove">
									<i class="la la-trash-o"></i>Delete
								</a>
							</div>
						</div>`;
			i = i + 1;
			$('.package-list').append(html);	
			
		});
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

		$(document).on('click', '.btn-remove', function(e){
			e.preventDefault();
			let row_item = $(this).parent().parent();
			$(row_item).remove();
		});
        
        $(document).on('click', '#btn-profile-save', function(e){
			e.preventDefault();
            $.ajax({
                url: "{{url('api/users/update')}}",
                type: "post",
                data: $('#profile-data').serialize(),
                dataType: 'json',
                success: function(response) {
                    $('.form-control').removeClass('is-invalid');
                    $('.invalid-feedback').empty();
                    if(response.status == true){
                        // window.location.href = '/leads';
                    }else{
                        $.each(response.errors, function(key, val){
                            $('.'+key).addClass('is-invalid');
                            $('.'+key).next('.invalid-feedback').html(val);
                        });
                    }
                    console.log(response);
                }, 
                error: function(response) {
                    console.log('Error:', response);
                    $('#btn-leads-save').html('Save Changes');
                }
            });
			var uid = $('#uid').val();
			var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();
            var formData = new FormData();
            formData.append('id', uid);
            formData.append('first_name', first_name);
            formData.append('last_name', last_name);
            formData.append('email', email);
			if ($('#user_profile')[0].files[0] != undefined ) {
				formData.append('user_profile', $('#user_profile')[0].files[0]); 
			}
			$.ajax({
                url: "{{url('api/users/update')}}",
                type: "post",
				contentType: false, //multipart/form-data
                processData: false,
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('.form-control').removeClass('is-invalid');
                    $('.invalid-feedback').empty();
					swal.fire(response.success);
                    if(response.status == true){
                        // window.location.href = '/leads';
                    }else{
                        $.each(response.errors, function(key, val){
                            $('.'+key).addClass('is-invalid');
                            $('.'+key).next('.invalid-feedback').html(val);
                        });
                    }
                    console.log(response);
                }, 
                error: function(response) {
                    console.log('Error:', response);
                    $('#btn-leads-save').html('Save Changes');
                }
            });
            return false;
        });
    });
</script>
<script src="assets/js/pages/crud/file-upload/image-input.js"></script>
<script src="assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
@endsection