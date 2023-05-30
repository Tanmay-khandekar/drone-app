@extends('layouts.app')
@section('title')
  Dashboard
@endsection
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
							<input type="hidden" name="type" value="{{ auth()->user()->type }}">
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
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['first_name'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="first_name" id="first_name" type="text" value="{{ auth()->user()->first_name }}" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['last_name'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="last_name" id="last_name" type="text" value="{{ auth()->user()->last_name }}" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['company_name'] }}</label>
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
									<?php } ?>
									<?php if(auth()->user()->type == 'pilot'){ ?>
									<div class="form-group row">
										<label class="col-form-label text-right-desktop col-lg-3 col-sm-12">Are you working with active projects?</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid" name="active_project">
											<option>Yes</option>
											<option>NO</option>
											</select>
										</div>
									</div>
									<?php $userIndustry = explode(',',auth()->user()->industry_id); ?>
									<div class="form-group row">
										<label class="col-form-label text-right-desktop col-lg-3 col-sm-12">{{ $blocks['industry'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid selectpicker" name="industry_id[]" multiple="multiple" data-actions-box="true">
												@foreach($industry as $ikey => $ioption)
													<option <?php echo in_array($ioption->id, $userIndustry) ? 'selected' : ''; ?> value="{{$ioption->id}}">{{$ioption->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<?php } ?>
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['phone'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-phone"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid phone" id="phone" name="phone" value="{{ auth()->user()->phone }}" placeholder="Phone" />
												<div class="invalid-feedback"></div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['email'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid email" name="email" id="email" value="{{ auth()->user()->email }}" placeholder="Email" />
												<div class="invalid-feedback"></div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['country'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid country" name="address[country]" id="country">
												<option valule="" disabled>Select Location</option>
												@if($countries)
													@foreach( $countries as $countrie)
														<option @if($countrie->id == $user->address->country) selected  @endif value="{{ $countrie->id }}">{{ $countrie->name }}</option>
													@endforeach
												@endif
											</select>
											<!-- <input class="form-control form-control-lg form-control-solid" name="state" value="{{ auth()->user()->state }}" type="text" /> -->
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['county'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid state" name="address[state]" id="state-dropdown">
												<option valule="" disabled>Select County</option>
											</select>
											<!-- <input class="form-control form-control-lg form-control-solid" name="state" value="{{ auth()->user()->state }}" type="text" /> -->
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['city'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid city" name="address[city]" id="city-dropdown">
												<option valule="" disabled>Select County</option>
											</select>
											<!-- <input class="form-control form-control-lg form-control-solid" name="state" value="{{ auth()->user()->state }}" type="text" /> -->
										</div>
									</div>
									<!-- pilot details -->
									<?php
										if(auth()->user()->type == 'pilot'){
									?>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">{{ $blocks['license_category'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="license_category" value="{{ $user->pilot_detail->license_category }}" type="text" />
										</div>
									</div>
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mt-10 mb-6">Social Links</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Facebook Link</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="social_links[facebook]" value="{{ $user->pilot_detail->social_links->facebook }}" type="text" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">Instagram Link</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="social_links[instagram]" value="{{ $user->pilot_detail->social_links->instagram }}" type="text" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right-desktop">YouTube Link</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" name="social_links[youtube]" value="{{ $user->pilot_detail->social_links->youtube }}" type="text" />
										</div>
									</div>
									<div>
									Optional - You may create your fixed price packages for your Drone service which you or your company provides, for example <br>
									1 hour drone photography service for Wedding or Sports event for X amount
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Packages:</label>
											<div class="col-lg-10 package-list">
												
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
		var packages = <?php echo isset($user->pilot_detail->packages) ? $user->pilot_detail->packages:0; ?>;
		if(packages){
			getpackages();
		}
		function getpackages(){
			if(packages){
				console.log(packages);
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
					i = i + 1;
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
            var phone = $('#phone').val();
            var formData = new FormData();
            formData.append('id', uid);
            formData.append('first_name', first_name);
            formData.append('last_name', last_name);
            formData.append('email', email);
            formData.append('phone', phone);
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

		//locations dropdowns
        $('#country').on('change',function(){
            var country_id = this.value;
			var stateid = {{ $user->address->state }};
            $.ajax({
                url: "{{ route('states_by_country') }}",
                type:"post",
                cache: false,
                data:{
                    country_id: country_id,
                    _token: '{{csrf_token()}}' 
                },
                dataType : 'json',
                success: function(result){
                    $("#state-dropdown").empty().append('');
                    $("#bs-select-1 ul").empty().append('');
                    var stateCount = result.states.length;
                    $('#state-dropdown').html('<option value="">Select State</option>'); 
                    $.each(result.states,function(key,value){
						if( stateid == value.id){
							$("#state-dropdown").append('<option selected value="'+value.id+'">'+value.name+'</option>');
						}else{
							$("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
						}
                    });
                }
            });
        });

        $('#state-dropdown').on('change',function(){
            var state_id = this.value;
			var city = {{ $user->address->city}};
            $.ajax({
                url: "{{ route('city_by_states') }}",
                type:"post",
                cache: false,
                data:{
                    state_id: state_id,
                    _token: '{{csrf_token()}}' 
                },
                dataType : 'json',
                success: function(result){
                    $("#city-dropdown").empty().append('');
                    $('#city-dropdown').html('<option value="">Select City</option>'); 
                    $.each(result.cities,function(key,value){
						if(city == value.id){
							$("#city-dropdown").append('<option selected value="'+value.id+'">'+value.name+'</option>');
						} else{
                        	$("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
						}
					});
                    
                }
            });
        });
        //locations dropdowns
    });
</script>
<!-- <script src="assets/js/custom/locations.js"></script> -->
<script src="assets/js/pages/crud/file-upload/image-input.js"></script>
<script src="assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
@endsection