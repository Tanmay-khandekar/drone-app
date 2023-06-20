@section('css')
@endsection
@section('title')
    Pilot List
@endsection
@extends('layouts.app')
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <!--begin::Header-->
    @include('layouts.components.top-header')
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
						<h5 class="text-dark font-weight-bold my-2 mr-5">Pilot Details</h5>
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
						<!--begin::Form-->
						<form class="form" id="profile-data">
							<!--begin::Card-->
							<div class="card card-custom card-stretch">
							<!--begin::Header-->
								<div class="card-header py-3">
									<div class="card-title align-items-start flex-column">
										<h3 class="card-label font-weight-bolder text-dark">Pilot Name</h3>
									</div>
									<div class="card-toolbar">
										<button type="reset" class="btn btn-success mr-2" id="btn-pilot-save">Save Changes</button>
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mb-6">Pilot Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
										<div class="col-lg-9 col-xl-6">
											<div class="image-input image-input-outline" id="kt_image_4" style="background-image: url(assets/media/users/blank.png)">
												<div class="image-input-wrapper" style="background-image: url()"></div>
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
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['first_name'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid first_name" name="first_name" id="first_name" type="text" value="" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['last_name'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid last_name" name="last_name" id="last_name" type="text" value="" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['company_name'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid company" name="company" type="text" value="" />
										</div>
									</div>
									<?php if(auth()->user()->type == 'customer'){ ?>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Job Title</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid jobtitle" value="" name="jobtitle" type="text" />
										</div>
									</div>
									<?php } ?>
									<?php if(auth()->user()->type == 'pilot'){ ?>
									<div class="form-group row">
										<label class="col-form-label col-lg-3 col-sm-12">Are you working with active projects?</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid active_project" name="active_project">
											<option>Yes</option>
											<option>NO</option>
											</select>
										</div>
									</div>
									<?php $userIndustry = explode(',',auth()->user()->industry_id); ?>
									<div class="form-group row">
										<label class="col-form-label col-lg-3 col-sm-12">{{ $blocks['industry'] }}</label>
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
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['phone'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-phone"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid phone" name="phone" value="" placeholder="Phone" />
												<div class="invalid-feedback"></div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['email'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid email" name="email" id="email" value="" placeholder="Email" />
												<div class="invalid-feedback"></div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['country'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid country" name="address[country]" id="country">
												<option valule="" disabled>Select Location</option>
											</select>
											<!-- <input class="form-control form-control-lg form-control-solid" name="state" value="{{ auth()->user()->state }}" type="text" /> -->
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['county'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid state" name="address[state]" id="state-dropdown">
												<option valule="" disabled>Select County</option>
											</select>
											<!-- <input class="form-control form-control-lg form-control-solid" name="state" value="{{ auth()->user()->state }}" type="text" /> -->
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['city'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid city" name="address[city]" id="city-dropdown">
												<option valule="" disabled>Select County</option>
											</select>
											<!-- <input class="form-control form-control-lg form-control-solid" name="state" value="{{ auth()->user()->state }}" type="text" /> -->
										</div>
									</div>
									<!-- pilot details -->
									
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['license_category'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid license_category" name="license_category" type="text" />
										</div>
									</div>
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mt-10 mb-6">Social Links</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['facebook'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid facebook" name="social_links[facebook]" value="" type="text" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['instagram'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid instagram" name="social_links[instagram]" value="" type="text" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">{{ $blocks['youtube'] }}</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid youtube" name="social_links[youtube]" value="" type="text" />
										</div>
									</div>
                                    <div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mt-10 mb-6">Document Info</h5>
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Goverment License</label>
										<div class="col-lg-9 col-xl-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gov_license" id="gov_license" />
                                                <label class="custom-file-label" for="gov_license">Choose file</label>
                                            </div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Pilot License</label>
										<div class="col-lg-9 col-xl-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="pilot_license" id="pilot_license" />
                                                <label class="custom-file-label" for="pilot_license">Choose file</label>
                                            </div>
										</div>
									</div>
									<div class="other_licenses">

									</div>
									<div>
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
@section('content')
@endsection
@section('js')
<script>
	var countryId = '';
	var stateId = '';
	var cityId = '';
	$(document).ready(function() {
		// getState();
        var i = 0;
        getPilot();
        function getPilot(){
            $.ajax({
                type: "GET",
                url: "{{ url('api/pilot/edit')}}"+ "/" +{{ request()->route('id') }},
                success: function(data) {
					countryId = data.data.address.country;
					stateId = data.data.address.state;
					cityId = data.data.address.city;
                    setPilotValues(data.data);
                    getpackages(JSON.parse(data.data.pilot_detail.packages));
                    setSocialLinks(JSON.parse(data.data.pilot_detail.social_links));
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
		function setSocialLinks(slinks){
			console.log(slinks);
			$.each(slinks, function(skey, slink){
				$('.'+skey).val(slink);
			});
		}
		function setPilotValues(pilot){
            pilotImage = "../"+ pilot.user_profile;
            $(".image-input-wrapper").css("background-image", "url(" + pilotImage + ")");
			if(pilot.pilot_detail){
				$("#gov_license").parent().parent().append("<a href=../"+pilot.pilot_detail.gov_license+" target='_blank' class='btn btn-primary btn-sm position-relative float-right mt-2'> View Gov License</a> ");
				$("#pilot_license").parent().parent().append("<a href=../"+pilot.pilot_detail.pilot_license+" target='_blank' class='btn btn-primary btn-sm position-relative float-right mt-2'> View Pilot License</a> ");
			}
			if(pilot.pilot_detail.license_category){
				$('.license_category').val(pilot.pilot_detail.license_category);
			}
			if(pilot.pilot_detail.other_licenses){
				var otherLicenses = JSON.parse(pilot.pilot_detail.other_licenses);
				$.each(otherLicenses, function(pkey, pval){
					console.log(pkey, pval);
					var html = `<div class="form-group row pb-12">
									<label class="col-xl-3 col-lg-3 col-form-label">Additional Documents</label>
									<div class="col-lg-9 col-xl-6">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="add-doc`+i+`" id="add-doc`+i+`" />
											<label class="custom-file-label" for="add-doc`+i+`">Choose file</label>
											<a href="../`+pval+`" target='_blank' class='btn btn-primary btn-sm position-relative float-right mt-2'> View Additional Doc</a> 
										</div>
									</div>
								</div>`;
					$('.other_licenses').append(html);
				});
			}
            $.each(pilot, function(key, val){
                $('.'+key).val(val);
            });
        }
		function getpackages(packages){
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
        
        $(document).on('click', '#btn-pilot-save', function(e){

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
	
	var statesByCountryUrl = "{{ route('states_by_country') }}";
	var cityByStatesUrl = "{{ route('city_by_states') }}";
	var token = "{{csrf_token()}}";
</script>
<script src="{{ asset('assets/js/custom/locations.js') }}"></script>
@endsection