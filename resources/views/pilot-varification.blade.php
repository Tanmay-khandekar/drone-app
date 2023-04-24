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
                        <h5 class="text-dark font-weight-bold my-2 mr-5">post creation/verification</h5>
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
                <?php
                    if(auth()->user()->status == 1 && !empty(auth()->user()->status) && auth()->user()->type == 'pilot' ){
                ?> 
                <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">Post verification Successful <a href="/dashboard">Pilot account Page</a></div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-6">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <!--begin::Form-->
                            <form class="form" id="pilot-verification-data">
                                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Government ID</label>
                                        <select class="form-control selectpicker" id="gov_id" name="gov_id">
                                            <option value="driving_license">Driving License</option>
                                            <option value="passport">Passport</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload License /Certification</label>
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gov_license" id="gov_license" />
                                            <label class="custom-file-label" for="gov_license">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilot License Certification</label>
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="pilot_license" id="pilot_license" />
                                            <label class="custom-file-label" for="pilot_license">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="reset" id="btn-pilot-varification" class="btn btn-primary mr-2">Submit</button>
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
        getPilot();
        function getPilot(){
            var user_id = $('#user_id').val();
            $.ajax({
                type: "GET",
                url: "{{ url('api/pilot/edit')}}"+ "/" +user_id,
                success: function(data) {
                    console.log(data.data)
                    $("#gov_license").parent().parent().append("<a href="+data.data.pilot_detail.gov_license+" target='_blank' class='btn btn-primary btn-sm position-relative float-right mt-2'> View Gov License</a> ");
                    $("#pilot_license").parent().parent().append("<a href="+data.data.pilot_detail.pilot_license+" target='_blank' class='btn btn-primary btn-sm position-relative float-right mt-2'> View Pilot License</a> ");
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
        
        $(document).on('click', '#btn-pilot-varification', function(e){
            e.preventDefault();
            var gov_id = $('#gov_id').val();
            var user_id = $('#user_id').val();
            var formData = new FormData();
            formData.append('user_id', user_id);
            formData.append('gov_id', gov_id);
            // Attach file
            formData.append('gov_license', $('#gov_license')[0].files[0]); 
            formData.append('pilot_license', $('#pilot_license')[0].files[0]);
            $.ajax({
                url: "{{url('api/pilot/update')}}",
                type: "post",
                contentType: false, //multipart/form-data
                processData: false,
                data: formData,
                dataType: 'json',
                success: function(response) {
                    location.reload();
                }, 
                error: function(response) {
                    console.log('Error:', response);
                }
            });
            return false;
        });
    });
</script>
@endsection
