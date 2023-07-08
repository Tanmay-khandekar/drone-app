@section('css')
@endsection
@section('title')
    Pilot Details
@endsection
@extends('layouts.app')
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
                            <!--begin::Pic-->
                            <div class="flex-shrink-0 mr-7">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" class="user_profile" />
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                    <!--begin::User-->
                                    <div class="mr-3">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3"><span class="first_name"></span> &nbsp;<span class="last_name"></span>
                                        <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span> (4.5)
                                        <!--end::Name-->
                                        <!--begin::Contacts-->
                                        <!-- <div class="d-flex flex-wrap my-2">
                                            <span class="label label-lg label-light-default label-inline mt-2 mr-2"><strong class="mr-2">$150/hr </strong> avg. rate</span>
                                            <span class="label label-lg label-light-default label-inline mt-2 mr-2"><strong class="mr-2">Completed </strong> jobs</span>
                                            <span class="label label-lg label-light-default label-inline mt-2 mr-2"><strong class="mr-2">License </strong> #4494168</span>
                                        </div> -->
                                        <!--end::Contacts-->
                                    </div>
                                    <!--begin::User-->
                                    <!--begin::Actions-->
                                    <div class="my-lg-0 my-1">
                                        <a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">REQUEST A QUOTE</a>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <!--begin::Description-->
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">NYC Licensed Drone Pilot ready to help you take your vision to new heights!</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Separator-->
                        <div class="separator separator-solid my-7"></div>
                        <!--end::Separator-->
                        <!--begin::Bottom-->
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Average rate</span>
                                    <span class="font-weight-bolder font-size-h5 avg-rate">
                                    <span class="text-dark-50 font-weight-bold">$</span></span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-placeholder icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Location</span>
                                    <span class="font-weight-bolder font-size-h5" id="location"></span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-map-location icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Travel</span>
                                    <span class="font-weight-bolder font-size-h5">Up to 90 miles</span>
                                </div>
                            </div>
                            <!--end: Item-->
                        </div>
                        <!--end::Bottom-->
                    </div>
                </div>
                <!--end::Card-->
                <div class="card card-custom">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                    <span class="nav-text">Details</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="nav-text">Portfolio</span>
                                </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3_1">Images</a>
                                <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3_2">Videos</a>
                            </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                    <span class="nav-text">Reviews</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4_4">
                                    <span class="nav-text">Badges</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                        <div class="row">
                            <div class="col-6">
                                <strong>Packages</strong><br>
                                <div class="package-list mt-5">

                                </div>
                                <br>
                                <strong>Social Media</strong><br>
                                <a href="">Facebook</a><br>
                                <a href="">Instagram</a><br>
                                <a href="">YouTube</a><br><br>
                                <p>*Drone Pilot Reel:
                                    https://youtu.be/h_3_vlCtyls</p>
                                <p>*Vimeo
                                    https://vimeo.com/showcase/9087817</p>
                            </div>
                            <div class="col-6">
                                <p>
                                    Services:
                                    <strong class="industry"></strong>
                                    </p>
                                    <p>
                                    Insurance coverage:
                                    <strong>
                                    Not specified
                                    </strong>
                                    </p>
                                    <p>
                                    Member since: <strong class="created_at"></strong>
                                    </p>
                                    <p>
                                    License
                                    <strong>
                                    #4494168
                                    </strong>
                                    </p>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                        <div>
                            <div class="d-flex">
                                <img src="assets/media//users/300_10.jpg" height="50" width="50" style="border-radius: 50%;" alt="">
                                <div class="pl-5"><span>Lorraine C. Castle</span><br><span class="pt-2 fa fa-star checked"></span> 4.0 (60)   216 jobs posted</div>
                            </div>
                            <p>
                                Review:
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star"></span><br>
                            </p>
                            <blockquote class="blockquote">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Nov. 22, 2021
                                </footer>
                            </blockquote>
                        </div>
                        <div class="separator separator-dashed mt-8 mb-5"></div>
                        <div>
                            <div class="d-flex">
                                <img src="assets/media//users/300_1.jpg" height="50" width="50" style="border-radius: 50%;" alt="">
                                <div class="pl-5"><span>Jason Muller</span><br><span class="pt-2 fa fa-star checked"></span> 5.0 (80)   216 jobs posted</div>
                            </div>
                            <p>
                                Review:
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star checked"></span>
                                <span class="pt-2 fa fa-star checked"></span><br>
                            </p>
                            <blockquote class="blockquote">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Dec. 23, 2021
                                </footer>
                            </blockquote>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_4_4" role="tabpanel" aria-labelledby="kt_tab_pane_4_4">
                        <div class="row">
                            <div class="col-3" style="text-align: center; height: 200px;">
                                <!-- <img src="assets/media/project-logos/8.png" height="195" width="195" class="img-fluid mb-3" alt=""><br>
                                <span>Droners Approved Pilot</span> -->
                            </div>
                            <div class="col-3" style="text-align: center; height: 200px;">
                                <!-- <img src="assets/media/project-logos/9.png" height="195" width="195" class="img-fluid mb-3" alt=""><br>
                                <span>Featured Pilot</span> -->
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_1" role="tabpanel" aria-labelledby="kt_tab_pane_3_1">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 p-5" style="text-align: center;"><img src="../images/drone-bg/1.jpg" style="border-radius: 0.42rem; height:auto; width:100%;" alt=""></div>
                            <div class="col-lg-4 col-sm-12 p-5" style="text-align: center;"><img src="../images/drone-bg/2.jpg" style="border-radius: 0.42rem; height:auto; width:100%;" alt=""></div>
                            <div class="col-lg-4 col-sm-12 p-5" style="text-align: center;"><img src="../images/drone-bg/3.jpg" style="border-radius: 0.42rem; height:auto; width:100%;" alt=""></div>
                            <div class="col-lg-4 col-sm-12 p-5" style="text-align: center;"><img src="../images/drone-bg/4.jpg" style="border-radius: 0.42rem; height:auto; width:100%;" alt=""></div>
                            <div class="col-lg-4 col-sm-12 p-5" style="text-align: center;"><img src="../images/drone-bg/6.jpg" style="border-radius: 0.42rem; height:auto; width:100%;" alt=""></div>
                            <div class="col-lg-4 col-sm-12 p-5" style="text-align: center;"><img src="../images/drone-bg/7.jpg" style="border-radius: 0.42rem; height:auto; width:100%;" alt=""></div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_2" role="tabpanel" aria-labelledby="kt_tab_pane_3_2">
                        <div class="row">
                            <div class="col-lg-4 p-1 col-sm-12" style="text-align: center;">
                                <iframe src="https://player.vimeo.com/video/97187317?h=c2fe913e32" style="width:100%; height:auto;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-lg-4 p-1 col-sm-12" style="text-align: center;">
                                <iframe src="https://player.vimeo.com/video/239434695?h=d230600935" style="width:100%; height:auto;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-lg-4 p-1 col-sm-12" style="text-align: center;">
                                <iframe src="https://player.vimeo.com/video/97187317?h=c2fe913e32" style="width:100%; height:auto;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        </div>
                        </div>
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
        var i = 0;
        getPilot();
        function getPilot(){
            $.ajax({
                type: "GET",
                url: "{{ url('api/pilot/edit')}}"+ "/" +{{ request()->route('id') }},
                success: function(data) {
                    console.log(data.data);
                    setPilotValues(data.data);
                    getpackages(JSON.parse(data.data.pilot_detail.packages));
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
		function setPilotValues(pilot){
            
            pilotImage = "../"+ pilot.user_profile;
            $(".image-input-wrapper").css("background-image", "url(" + pilotImage + ")");
			if(pilot.pilot_detail){
				$("#gov_license").parent().parent().append("<a href="+pilot.pilot_detail.gov_license+" target='_blank' class='btn btn-primary btn-sm position-relative float-right mt-2'> View Gov License</a> ");
				$("#pilot_license").parent().parent().append("<a href="+pilot.pilot_detail.pilot_license+" target='_blank' class='btn btn-primary btn-sm position-relative float-right mt-2'> View Pilot License</a> ");
			}
            $('.user_profile').attr("src","../"+pilot.user_profile);
            
            var price = 0;
            $.each(pilot, function(key, val){
                console.log(val);
                if(key == 'industry'){
                    $.each(val, function(ikey, ival){
                        $('.'+key).append(ival+', ');
                    });
                }else if(pilot.pilot_detail.packages){
                    var packages = JSON.parse(pilot.pilot_detail.packages);
                    const pilotPrice = [];
                    $.each(packages, function(pkey, pval){
                        pilotPrice.push(pval.price);
                    });
                    price = calculateAverage(pilotPrice)+'/hr';
                    
                } else if(key == "created_at"){
                    var date = new Date(val);
                    var createdAt = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];
                    $('.created_at').append(createdAt);
                } else if(pilot.address){
                    alert();
                }else{
                    $('.'+key).append(val);
                }
                
            });
            $('.avg-rate').append(price);
        }
		function getpackages(packages){
            console.log(packages);
			if(packages){
				$.each(packages, function(key, val){
					var html = `<b>package name</b>: <span>`+val.pname+`</span><br>
                    <b>price</b>: <span>`+val.price+`</span><br>
                    <b>link</b>: <span>`+val.link+`</span><br>
                    <b>package description</b>: <span>`+val.packagedesc+`</span><br>
                    <hr>
                    `;
					$('.package-list').append(html);
				});
			}
			
		}
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function calculateAverage(array) {
            var total = 0;
            var count = 0;

            array.forEach(function(item, index) {
                total = (total + parseInt(item));
                count++;
            });

            return total / count;
        }
		
    });
</script>
@endsection