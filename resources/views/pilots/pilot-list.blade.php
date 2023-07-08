@section('css')
@endsection
@section('title')
    Pilot List
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
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <div class="topbar-item">
                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_cart_toggle">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </div>
                    <!--end::Title-->
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
                <div class="pilot-list">
                    
                </div>
                <!--begin::Card-->
                
                <!--end::Card-->
                
                <!--begin::Pagination-->
                <div class="card card-custom">
                    <div class="card-body">
                        <!--begin::Pagination-->
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="d-flex flex-wrap mr-3">
                                <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">23</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">24</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">25</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">26</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">27</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">28</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                                <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                                    <i class="ki ki-bold-arrow-next icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                                    <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                                </a>
                            </div>
                            <div class="d-flex align-items-center">
                                <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="text-muted">Displaying 10 of 230 records</span>
                            </div>
                        </div>
                        <!--end:: Pagination-->
                    </div>
                </div>
                <!--end::Pagination-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
</div>
<!--end::Wrapper-->
<!--begin::Quick Cart-->
<div id="kt_quick_cart" class="offcanvas offcanvas-left p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0">Pilot Search</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <!--begin::Item-->
            <div class="form-group">
                <label class="col-form-label text-right">Address</label>
                <input class="form-control h-auto px-6" type="text" placeholder="Address" name="fullname" autocomplete="off" />
            </div>
            <div class="form-group">
                <label class="col-form-label text-right">Service</label>
                <select class="form-control selectpicker">
                    <option value="" data-select2-id="24">All services</option>
                    <option value="agriculture" data-select2-id="50">Agriculture</option>
                    <option value="boating-water-sports" data-select2-id="51">Boating and water sports</option>
                    <option value="cinematography" data-select2-id="52">Cinematography</option>
                    <option value="construction" data-select2-id="53">Construction</option>
                    <option value="data-analysis" data-select2-id="54">Data Analysis</option>
                    <option value="drone-maintenance" data-select2-id="55">Drone Maintenance</option>
                    <option value="drone-training" data-select2-id="56">Drone training</option>
                    <option value="editing" data-select2-id="57">Editing</option>
                    <option value="event" data-select2-id="58">Event</option>
                    <option value="ground-collection" data-select2-id="59">Ground Collection</option>
                    <option value="infrastructure" data-select2-id="60">Infrastructure</option>
                    <option value="real-estate" data-select2-id="61">Real Estate</option>
                    <option value="roof-inspection" data-select2-id="62">Roof Inspection</option>
                    <option value="surveying-mapping" data-select2-id="63">Surveying &amp; Mapping</option>
                    <option value="wedding" data-select2-id="64">Wedding</option>
                    <option value="other" data-select2-id="65">Other</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="col-form-label text-right">Level</label>
                <select class="form-control selectpicker">
                    <option value="" data-select2-id="29">All levels</option>
                    <option value="1" data-select2-id="71">Entry</option>
                    <option value="2" data-select2-id="72">Intermediate</option>
                    <option value="3" data-select2-id="73">Advanced</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label text-right">Capability</label>
                <select class="form-control selectpicker">
                    <option value="" data-select2-id="40">All capabilities</option>
                    <option value="01af9b2c-42f9-4106-a71b-d9556fae1d33" data-select2-id="77">12+MP images</option>
                    <option value="3daa1c08-f937-4700-b9a9-fc8f42953949" data-select2-id="78">20+ MP images</option>
                    <option value="f80000ff-2053-4eba-94e4-120dda4c2638" data-select2-id="79">4K video</option>
                    <option value="9398f0f2-235d-4b58-add7-87c6976f5d56" data-select2-id="80">LiDAR</option>
                    <option value="f5d6f3ee-40b4-44e8-b700-aa9443e69124" data-select2-id="81">Monochrome</option>
                </select>
            </div>
            <div class="form-group">
                <div class="checkbox-list">
                    <label class="checkbox">
                        <input type="checkbox"/> Favorite pilots
                        <span></span>
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" checked="checked"/> Show radius
                        <span></span>
                    </label>
                </div>
            </div>
            <a href="#" class="btn btn-sm btn-default font-weight-bolder text-uppercase">Clear</a>
            <a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Search</a>
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
<!--end::Quick Cart-->
@section('content')
@endsection
@section('js')
<script>
    $(document).ready(function() {
        getPilots();
        function calculateAverage(array) {
            var total = 0;
            var count = 0;

            array.forEach(function(item, index) {
                total = (total + parseInt(item));
                count++;
            });

            return total / count;
        }
        function getPilots(){
            $.ajax({
                type: "GET",
                url: "{{ url('api/pilots')}}",
                success: function(data) {
                    var pilots = data.data;
                    var html = '';
                    var price = 0;
                    $('#job-total').append(pilots.length + " open job available");
                    $.each(pilots, function(key, val){
                        console.log(val.pilot_detail.packages)
                        if(val.pilot_detail.packages){
                            var packages = JSON.parse(val.pilot_detail.packages);
                            const pilotPrice = [];
                            $.each(packages, function(pkey, pval){
                                pilotPrice.push(pval.price);
                            });
                            price = calculateAverage(pilotPrice);

                        }
                        
                        var html = `<div class="card card-custom gutter-b">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 mr-7">
                                                    <div class="symbol symbol-50 symbol-lg-120">
                                                        <img alt="Pic" src="`+val.user_profile+`" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                                        <div class="mr-3">
                                                            <a href="pilot/`+val.id+`" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">`+ val.first_name +` ` + val.last_name + `
                                                            <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span> (4.5)
                                                            <div class="d-flex flex-wrap my-2">
                                                                <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                                <span class="label label-lg label-light-default label-inline mt-2"><strong class="mr-2">$`+price+`/hr </strong> avg. rate</span>
                                                                <span class="label label-lg label-light-default label-inline mt-2"><strong class="mr-2">Completed </strong> jobs</span>
                                                                <span class="label label-lg label-light-default label-inline mt-2"><strong class="mr-2">License Type </strong> A1 </span>
                                                                <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="my-lg-0 my-1">
                                                            <a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">REQUEST A QUOTE</a>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                                                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">NYC Licensed Drone Pilot ready to help you take your vision to new heights!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="separator separator-solid my-7"></div>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="d-flex flex-column text-dark-75">
                                                        <span class="font-weight-bolder font-size-sm">Average rate</span>
                                                        <span class="font-weight-bolder font-size-h5">
                                                        <span class="text-dark-50 font-weight-bold">$</span>`+price+`/hr</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-placeholder icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="d-flex flex-column text-dark-75">
                                                        <span class="font-weight-bolder font-size-sm">Location</span>
                                                        <span class="font-weight-bolder font-size-h5"> `+val.address.country.name +', '+val.address.state.name+', '+val.address.city.name+`</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-map-location icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="d-flex flex-column text-dark-75">
                                                        <span class="font-weight-bolder font-size-sm">Travel</span>
                                                        <span class="font-weight-bolder font-size-h5">Up to 90 miles</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        $('.pilot-list').append(html);
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