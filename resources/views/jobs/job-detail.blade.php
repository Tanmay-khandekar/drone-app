@section('css')
@endsection
@section('title')
    Job Details
@endsection
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
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Group Actions-->
                    <div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
                        <div class="text-dark-50 font-weight-bold">
                        <span id="kt_subheader_group_selected_rows">23</span>Selected:</div>
                        <div class="d-flex ml-6">
                            <div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
                                <button type="button" class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle" data-toggle="dropdown">Update Status</button>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
                                    <ul class="navi navi-hover pt-3 pb-4">
                                        <li class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">Change status to:</li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="1">
                                                <span class="navi-text">
                                                    <span class="label label-light-success label-inline font-weight-bold">Approved</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="2">
                                                <span class="navi-text">
                                                    <span class="label label-light-danger label-inline font-weight-bold">Rejected</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="3">
                                                <span class="navi-text">
                                                    <span class="label label-light-warning label-inline font-weight-bold">Pending</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="4">
                                                <span class="navi-text">
                                                    <span class="label label-light-info label-inline font-weight-bold">On Hold</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button class="btn btn-light-success font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">Fetch Selected</button>
                            <button class="btn btn-light-danger font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_delete_all">Delete All</button>
                        </div>
                    </div>
                    <!--end::Group Actions-->
                </div>
                <!--end::Details-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="#" class=""></a>
                    <!--end::Button-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin::Top-->
                        <div class="d-flex">
                            
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                    <!--begin::User-->
                                    <div class="mr-3">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                            #{{ $job['id'] }} {{ $job['job_title']}}
                                        </a>
                                        <!--end::Name-->
                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <span class="label label-lg label-light-default label-inline mt-2">PENDING APPROVAL</span>
                                        </div>
                                        <!--end::Contacts-->
                                    </div>
                                    <!--begin::User-->
                                    <!--begin::Actions-->
                                    <div class="my-lg-0 my-1">
                                        <div class="mr-3 font-weight-bolder text-right" data-toggle="view">
                                            Job Start date: {{ date("d-m-Y", strtotime($job['start_date'])) }} <br>
                                            Job End date: {{ date("d-m-Y", strtotime($job['end_date'])) }} <br>
                                            Job type: {{ $job['type'] }} <br>
                                            @if(auth()->user()->type == 'pilot')
                                            <button class="apply-now btn btn-sm btn-primary font-weight-bolder text-uppercase">Apply Now</button>
                                            @endif
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <!--begin::Description-->
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{{ $job['job_desc'] }} <br>
                                    
                                    Location:- {{ $job['country']['name'] }}, {{ $job['county']['name'] }}, {{ $job['city']['name'] }}
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Top-->
                    </div>
                </div>
                <!--end::Card-->
                <div class="card card-custom">
                    <div class="card-body">
                        <!--begin::Timeline-->
                        <div class="timeline timeline-3">
                            <div class="timeline-items bid-list">
                                
                            </div>
                        </div>
                        <!--end::Timeline-->
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
<div class="pilot-bid-form offcanvas offcanvas-right p-10" style="display: none; width: 500px; z-index: 98;">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">Pilot Bid View</h3>
        <a href="#" class="close-pilot-bid-form btn btn-xs btn-icon btn-light btn-hover-primary">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <form id="bid-data">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="job_id" value="{{ $job['id'] }}">
        <div class="form-group">
            <label>Type:</label>
            <input type="text" class="form-control" name="type" placeholder="Type"/>
        </div>

        <div class="form-group">
            <label>Date Range:</label>
            <div>
                <input type='text' name="bid_start_end_date" class="form-control" id="kt_daterangepicker_1" readonly placeholder="Select time" type="text"/>
            </div>
        </div>
        
        <div class="form-group">
            <label for="Description">Job Description:</label>
            <textarea class="form-control" name="bid_desc" id="Description" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <label for="Location">Price range:</label>
            <select class="form-control" name="price" id="price">
                <option>Select price range</option>
                <option value="100-250">100-250</option>
                <option value="250-500">250-500</option>
                <option value=" 500-1000"> 500-1000</option>
                <option value="1000-1500">1000-1500</option>
                <option value="1500-2500">1500-2500</option>
                <option value="2500+">2500+</option>
            </select>
        </div>
        <button class="btn btn-primary mr-2" id="btn-bid-save">Submit</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".apply-now").click(function(){
            $(".pilot-bid-form").show();
            $(".pilot-bid-form").addClass("offcanvas-on");
        });
        $(".close-pilot-bid-form").click(function(){
            $(".pilot-bid-form").hide();
            $(".pilot-bid-form").removeClass("offcanvas-on");
        });

        //Get all bids
        var jobId = <?php echo $job['id']; ?>;
        getBids();
        function getBids(){
            $.ajax({
                type: "GET",
                url: "{{ url('api/bids/')}}"+'/'+jobId,
                success: function(data) {
                    var bids = data.data;
                    console.log(bids);
                    $.each(bids, function(key, val){
                        var html = `<div class="timeline-item">
                                        <div class="timeline-media">
                                            <i class="flaticon2-notification fl text-primary"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div class="mr-2">
                                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">`+val.type+`</a>
                                                    <span class="text-muted ml-2">`+val.end_date+`</span>
                                                    
                                                </div>
                                            </div>
                                            <span class="font-weight-bold">Price Range</span> <span class="label label-light-success font-weight-bolder label-inline ml-2">`+val.price+`</span>
                                            <p class="p-0">`+val.bid_desc+`</p>
                                        </div>
                                    </div>`;
                        $('.bid-list').append(html);
                    });
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
        //Get all bids


        $(document).on('click', '#btn-bid-save', function(e){
			e.preventDefault();
            $.ajax({
                url: "{{url('api/bid/create')}}",
                type: "post",
                data: $('#bid-data').serialize(),
                dataType: 'json',
                success: function(response) {
                    $('.form-control').removeClass('is-invalid');
                    $('.invalid-feedback').empty();
                    swal.fire(response.success);
                    if(response.status == true){
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
        });
        
        
    });
</script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
@endsection