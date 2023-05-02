@extends('layouts.app')
@section('title')
    Job Posting
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
                        <h5 class="text-dark font-weight-bold my-2 mr-5">Job Posting</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container"> 
                <div class="row">
                    <div class="col-md-6">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <!--begin::Form-->
                            <form class="form" id="job-data">
                                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Job Title:</label>
                                        <input type="text" class="form-control job_title" name="job_title" placeholder="Type"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="Location">Location:</label>
                                        <select class="form-control location" name="location" id="country">
                                            <option valule="" disabled>Select Location</option>
                                            @if($countries)
                                                @foreach( $countries as $countrie)
                                                    <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Location">County:</label>
                                        <select class="form-control county" name="county" id="state-dropdown">
                                            <option valule="" disabled>Select Country</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Location">City:</label>
                                        <select class="form-control city" name="city" id="city-dropdown">
                                            <option valule="" disabled>Select County</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
										<label>Industry</label>
                                        <select class="form-control form-control-lg selectpicker" name="industry[]" multiple="multiple" data-actions-box="true">
                                            @foreach($industry as $ikey => $ioption)
                                                <option value="{{$ioption->id}}">{{$ioption->name}}</option>
                                            @endforeach
                                        </select>
									</div>
                                    <div class="form-group">
                                        <label>Type:</label>
                                        <input type="text" class="form-control type" name="type" placeholder="Type"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="Description">Job Description:</label>
                                        <textarea class="form-control job_desc" id="Description" name="job_desc" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Date Range:</label>
                                        <div>
                                            <input type='text' class="form-control job_start_end_date" name="job_start_end_date" id="kt_daterangepicker_1" readonly placeholder="Select time" type="text"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <button type="reset" id="btn-job-save" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
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
		
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).on('click', '#btn-job-save', function(){
            $.ajax({
                url: "{{url('api/job/create')}}",
                type: "post",
                data: $('#job-data').serialize(),
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
                        $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            });
        });

        $('#state-dropdown').on('change',function(){
            var state_id = this.value;
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
                        $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    
                }
            });
        });
        //locations dropdowns
    });
</script>
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js"></script>
<script src="assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
@endsection