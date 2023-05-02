@section('css')
@endsection
@section('title')
    Job List
@endsection
@extends('layouts.app')
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
                        <h5 class="text-dark font-weight-bold my-2 mr-5">Job List</h5>
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
                    <div class="col-12">
                        <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header row row-marginless align-items-center flex-wrap py-5 h-auto">
                            <!--begin::Toolbar-->
                            <div class="col-12 col-sm-6 col-xxl-3 order-2 order-xxl-1 d-flex flex-wrap align-items-center">
                                <h3>1 pending approval job</h3>
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Search-->
                            <div class="col-xxl-4 d-flex order-1 order-xxl-2 align-items-center justify-content-center">
                                <div class="input-group input-group-lg input-group-solid my-2">
                                    <input type="text" class="form-control pl-4" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <span class="input-group-text pr-3">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Search-->
                            <!--begin::Pagination-->
                            <div class="col-12 col-sm-6 col-xxl-3 order-2 order-xxl-3 align-items-center">
                                <!--begin::Per Page Dropdown-->
                                <div class="form-group">
                                    <select class="form-control" style="margin-top: 21px;" id="status">
                                        <option value="" selected="" data-select2-id="11">All statuses</option>
                                        <option value="1">Pending Approval</option>
                                        <option value="2">Active</option>
                                        <option value="3">Rejected</option>
                                        <option value="4">Pilot Hired</option>
                                        <option value="5">Completed</option>
                                        <option value="6">Canceled</option>
                                        <option value="7">Archived</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-12 col-sm-6 col-xxl-1 order-2 order-xxl-3 align-items-center">
                                <button type="submit" class="btn btn-outline-primary" style="height: 40px;">
                                    <i class="la la-search"></i>
                                </button>
                            </div>
                            <!--end::Pagination-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body table-responsive px-0">
                            <!--begin::Items-->
                            <div class="list list-hover min-w-500px job-list">
                                <!--begin::Item-->
                                
                                <!--end::Item-->
                                
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Body-->
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
@section('content')
@endsection
@section('js')
<script>
    $(document).ready(function() {
        var fullURL = window.location.href;
        var url = new URL(fullURL);
        var status = url.searchParams.get("status");
        var type = '{{ auth()->user()->type }}';
        var id = '{{ auth()->user()->id }}';
        getjobs();
        function getjobs(){
            $.ajax({
                type: "GET",
                url: "{{ url('api/jobs')}}"+ '?status=' + status + '&usertype=' + type + '&uid=' + id,
                success: function(data) {
                    var jobs = data.data;
                    $.each(jobs, function(key, val){
                        console.log(val.country);
                        var html = `<a href="job/`+val.id+`" style="color: unset;" class="d-flex align-items-start list-item card-spacer-x py-3">
                                    <div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
                                        <div>
                                            <span class="font-weight-bolder font-size-lg mr-2">#`+val.id+ val.job_title+`</span><br>
                                            <span class="text-muted">`+val.job_desc+`</span>
                                        </div>
                                        <div class="mt-2">
                                            <span class="label label-light-default font-weight-bold label-inline mr-1">PENDING APPROVAL</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 mr-3 font-weight-bolder text-right" data-toggle="view">`+val.end_date+`</div>
                                </a>`;
                        $('.job-list').append(html);
                    });
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }

        
    });

</script>
@endsection