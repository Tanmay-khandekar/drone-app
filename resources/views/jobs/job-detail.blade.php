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
                                    </div>
                                    <!--begin::User-->
                                    <!--begin::Actions-->
                                    <div class="my-lg-0 my-1">
                                        <div class="mr-3 font-weight-bolder text-right" data-toggle="view">
                                            Job Start date: {{ date("d-m-Y", strtotime($job['start_date'])) }} <br>
                                            Job End date: {{ date("d-m-Y", strtotime($job['end_date'])) }} <br>
                                            Job type: {{ $job['type'] }} <br>
                                            <div id="chat-box-btn" data-toggle="modal" data-target="#kt_chat_modal"></div>
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
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Bids on Job</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm" id="no-of-bids"></span>
                        </h3>
                    </div>
                    <!--end::Header-->
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

@include('payment.components.payment-detail')
<!--end::Wrapper-->
@include('bid.components.bid-detail')
@include('chat.chat-box')

@endsection
@section('js')
<script>
    var pilotId = '';
    var msgBoxUrl = "{{route('msg.box')}}";
    var sendMsgUrl = "{{route('sendmsg')}}";
    $(document).ready(function(){
        $(".apply-now").click(function(){
            $(".pilot-bid-form").show();
            $(".pilot-bid-form").addClass("offcanvas-on");
        });
        $(".close-pilot-bid-form").click(function(){
            $(".pilot-bid-form").hide();
            $(".pilot-bid-form").removeClass("offcanvas-on");
        });
        $(".close-payment-form").click(function(){
            $("#payment-modal").hide();
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
                    var approvalStatus = '';
                    var finalApproval = false;
                    $('#no-of-bids').append('Total ' + bids.length + ' New bids');
                    $.each(bids, function(key, val){
                        if(val.status == 'first_approval' || val.status == 'final_approval' || val.status == 'paid'){
                            finalApproval = true;
                            pilotId = val.user_id; 
                            $('.apply-now').hide();
                        }
                    });
                    
                    var userType = '{{auth()->user()->type }}';
                    if(finalApproval && userType == 'customer' ){
                        $('#chat-box-btn').html('<button id="user_chat" data-id="'+pilotId+'" data-fromuser="{{auth()->user()->id}}" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Pilot Chat</button>');
                    }else if(finalApproval && userType == 'pilot'){
                        var customerId = "{{ $job['user_id']}}";
                        $('#chat-box-btn').html('<button id="user_chat" data-id="'+customerId+'" data-fromuser="{{auth()->user()->id}}" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Customer Chat</button>');
                    }
                    if( userType == 'customer'){
                        $.each(bids, function(key, val){
                            if(val.status == 'first_approval'){
                                approvalStatus = 'final_approval';
                            } else if(val.status == 'final_approval'){
                                approvalStatus = 'final_approval';
                            } else if(val.status == 'paid'){
                                approvalStatus = 'paid';
                            }else {
                                approvalStatus = 'first_approval';
                            }
                            var html = `<div class="timeline-item">
                                            <a href="{{ url('/') }}/pilot/`+val.user.id+`" class="timeline-media">
                                                <img src="../`+val.user.user_profile+`" />
                                            </a>
                                            <div class="timeline-content">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div class="mr-2">
                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">`+val.type+`</a>
                                                        <span class="text-muted ml-2">`+val.end_date+`</span>
                                                    </div>
                                                    <div class="dropdown ml-2">`;
                            if(finalApproval != true){
                            html +=                     `<button class="btn btn-primary btn-sm approval first-txt-capital" data-bid-id="`+val.id+`" data-status="`+approvalStatus+`">
                                                            `+approvalStatus.replace("_", " ")+`
                                                        </button>`;
                            }
                            else if((approvalStatus == "final_approval" || approvalStatus == "paid" ) && finalApproval == true){
                            html +=                     `<button class="btn btn-primary btn-sm approval first-txt-capital" data-bid-id="`+val.id+`" data-pilot-id="`+val.user_id+`" data-status="`+approvalStatus+`">
                                                            `+approvalStatus.replace("_", " ")+`
                                                        </button>`;    
                            }
                            if((val.status == "final_approval" || val.status == "first_approval" )){
                            html +=                     `<button class="btn btn-danger ml-3 btn-sm approval first-txt-capital" data-bid-id="`+val.id+`" data-pilot-id="`+val.user_id+`" data-status="pending">
                                                            Rejected
                                                        </button>`;    
                            }
                            html +=                 `</div>
                                                </div>
                                                <span class="font-weight-bold">Price Range</span> <span class="label label-light-success font-weight-bolder label-inline ml-2">`+val.price+`</span>
                                                <p class="p-0">`+val.bid_desc+`</p>
                                            </div>
                                        </div>`;
                            $('.bid-list').append(html);
                        });
                    } else {
                        $.each(bids, function(key, val){
                            var html = `<div class="timeline-item" style="padding-left:0px;">
                                            <div class="timeline-content">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div class="mr-2">
                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">`+val.type+`</a>
                                                        <span class="text-muted ml-2">`+val.end_date+`</span>
                                                    </div>
                                                    <div class="dropdown ml-2">`;
                                if(val.status == 'first_approval' && {{ auth()->user()->id }} == val.user.id){
                                html +=                 `<button class="btn btn-primary btn-sm edit-bid first-txt-capital" data-bid-id="`+val.id+`">
                                                            Edit
                                                        </button>`; 
                                }
                                if(val.status == 'paid' && {{ auth()->user()->id }} == val.user.id){
                                html +=                 `<button class="btn btn-primary btn-sm edit-bid first-txt-capital" data-bid-id="`+val.id+`">
                                                            Paid
                                                        </button>`; 
                                }
                                html +=            `</div>
                                                </div>
                                                <span class="font-weight-bold">Price Range</span> <span class="label label-light-success font-weight-bolder label-inline ml-2">`+val.price+`</span>
                                                <p class="p-0">`+val.bid_desc+`</p>
                                            </div>
                                        </div>`;
                            $('.bid-list').append(html);
                        });
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
        //End all bids
        //Get single bid
        $(document).on('click', '.edit-bid', function(e){
			e.preventDefault();

            var id = $(this).data('bid-id'); 
            $.ajax({
                type: "GET",
                url: "{{ url('api/bid/')}}"+'/'+id,
                success: function(data) {
                    var bidDetail = data.data;
                    $('#id').val(bidDetail.id);
                    $('#price').val(bidDetail.price);
                    $('#type').val(bidDetail.type);
                    $('#Description').val(bidDetail.bid_desc);
                    $(".apply-now").trigger("click" );
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
        //End single bid

        $(document).on('click', '#btn-bid-save', function(e){
			e.preventDefault();
            var id = $('#id').val();
            var type = $('#type').val();
            var date = $('#kt_daterangepicker_1').val();
            var description = $('#Description').val();
            var price = $('#price').val();
            if(id != '' && id != '0'){
                var formData = new FormData();
                formData.append('type', type);
                formData.append('bid_start_end_date', date);
                formData.append('bid_desc', description);
                formData.append('price', price);
                updateBid(id, formData);
            }else{
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
            }
            
        });

        $(document).on('click', '.approval', function(e){
			e.preventDefault();
            var id = $(this).data('bid-id');
            var pilotId = $(this).data('pilot-id');
            var status = $(this).data('status');
            if(status == 'first_approval' || status == 'pending'){
                var formData = new FormData();
                formData.append('status', status);
                updateBid(id, formData);
            }else if(status == 'final_approval'){
                $('#payment-modal').show();
                $('#bid_id').val(id);
                $('#pilot_id').val(pilotId);
            }

        });
        function updateBid(id, formData){
            $.ajax({
                url: "{{url('api/bids/update/')}}"+'/'+id,
                type: "post",
                data: formData,
                contentType: false, //multipart/form-data
                processData: false,
                dataType: 'json',
                success: function(response) {
                    // swal.fire(response.success);
                    location.reload();
                    console.log(response);
                }, 
                error: function(response) {
                    console.log('Error:', response);
                }
            });
        }
    });
</script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{asset('assets/js/custom/payment.js')}}"></script>
<script src="{{asset('assets/js/custom/chat.js')}}"></script>
@endsection