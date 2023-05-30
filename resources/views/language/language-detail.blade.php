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
						<h5 class="text-dark font-weight-bold my-2 mr-5">Language Details</h5>
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
						<form class="form" id="language-data">
                            <input type="hidden" name="key" id="key" value="">
							<!--begin::Card-->
							<div class="card card-custom card-stretch">
							<!--begin::Header-->
								<div class="card-header py-3">
									<div class="card-title align-items-start flex-column">
										<h3 class="card-label font-weight-bolder text-dark">Field key</h3>
									</div>
									<div class="card-toolbar">
										<button type="reset" class="btn btn-success mr-2" id="btn-language-save">Save Changes</button>
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body">
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Field Key</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid field_key" name="field_key" id="first_name" type="text" value="" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Content English</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid en" name="content[en]" id="last_name" type="text" value="" />
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Content Hindi</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid hi" name="content[hi]" id="last_name" type="text" value="" />
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Content Italy</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid IT" name="content[IT]" id="last_name" type="text" value="" />
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Content Germany</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid DE" name="content[DE]" id="last_name" type="text" value="" />
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Content Spain</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid ES" name="content[ES]" id="last_name" type="text" value="" />
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
	$(document).ready(function() {
        var key = '{{ request()->route('id') != '' ? request()->route('id') : 0 }}';
        if(key != 0){
            getLanguage();
            $('#key').val(key);
        }
        function getLanguage(){
            $.ajax({
                type: "GET",
                url: "{{ url('api/language/edit')}}"+ "/" + key,
                success: function(data) {
                    console.log(data.data);
                    setLangValues(data.data);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
		function setLangValues(lang){
            $.each(lang, function(key, val){
                if(key == 'content'){
                    $.each(val, function(ckey, cval){
                        $('.'+ckey).val(cval);
                    });
                }else{
                    $('.'+key).val(val);
                }
            });
        }
		
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).on('click', '#btn-language-save', function(e){

			e.preventDefault();
            var key = $('#key').val();
            if(key){
                $.ajax({
                    url: "{{url('api/language/update')}}",
                    type: "post",
                    data: $('#language-data').serialize(),
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
                        $('#btn-language-save').html('Save Changes');
                    }
                });
            }else{
                $.ajax({
                    url: "{{url('api/language/store')}}",
                    type: "post",
                    data: $('#language-data').serialize(),
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
                        $('#btn-language-save').html('Save Changes');
                    }
                });
            }
            
			
            return false;
        });
    });
</script>
@endsection