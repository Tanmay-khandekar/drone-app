@extends('layouts.app')
@section('title')
    Admin Dashboard
@endsection
@section('content')
<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <!--begin::Header-->
    @include('layouts.components.top-header')
    <!--end::Header-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Column-->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch">
                            <!--begin::Body-->
                            <div class="card-body text-center pt-4">
                                
                                <!--begin::User-->
                                <div class="mt-7">
                                    <div class="symbol symbol-circle symbol-lg-90">
                                        <img src="assets/media/logos/logo3.png" style="background-color: #3c7fb6;" alt="image" />
                                    </div>
                                </div>
                                <!--end::User-->
                                <!--begin::Name-->
                                <div class="my-4">
                                    <a href="pilots" class="text-dark font-weight-bold text-hover-primary font-size-h4">All Pilots</a>
                                </div>
                                <!--end::Name-->
                                <!--begin::Label-->
                                <span class="btn btn-text btn-light-success btn-sm font-weight-bold">Active {{$activepilots}}</span>
                                <span class="btn btn-text btn-light-warning btn-sm font-weight-bold">Inctive {{$inactivepilots}}</span>
                                <!--end::Label-->
                                <!--begin::Buttons-->
                                <div class="mt-9">
                                    <a href="pilots" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">view Pilots</a>
                                </div>
                                <!--end::Buttons-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Column-->
                    <!--begin::Column-->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body text-center pt-4">
                                
                                <!--begin::User-->
                                <div class="mt-7">
                                    <div class="symbol symbol-circle symbol-lg-90">
                                    <img src="assets/media/logos/logo3.png" style="background-color: #3c7fb6;" alt="image" />
                                    </div>
                                </div>
                                <!--end::User-->
                                <!--begin::Name-->
                                <div class="my-4">
                                    <a href="customer" class="text-dark font-weight-bold text-hover-primary font-size-h4">All Customers</a>
                                </div>
                                <!--end::Name-->
                                <!--begin::Label-->
                                <span class="btn btn-text btn-light-success btn-sm font-weight-bold">Active {{$customers}}</span>
                                <!--end::Label-->
                                <!--begin::Buttons-->
                                <div class="mt-9">
                                    <a href="customer" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">view Customers</a>
                                </div>
                                <!--end::Buttons-->
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <!--end::Column-->
                    <!--begin::Column-->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body text-center pt-4">
                                
                                <!--begin::User-->
                                <div class="mt-7">
                                    <div class="symbol symbol-circle symbol-lg-90">
                                    <img src="assets/media/logos/logo3.png" style="background-color: #3c7fb6;" alt="image" />
                                    </div>
                                </div>
                                <!--end::User-->
                                <!--begin::Name-->
                                <div class="my-4">
                                    <a href="jobs?status=all" class="text-dark font-weight-bold text-hover-primary font-size-h4">All Jobs</a>
                                </div>
                                <!--end::Name-->
                                <!--begin::Label-->
                                <span class="btn btn-text btn-light-success btn-sm font-weight-bold">Active {{$jobs}}</span>
                                <!--end::Label-->
                                <!--begin::Buttons-->
                                <div class="mt-9">
                                    <a href="jobs?status=all" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">view Jobs</a>
                                </div>
                                <!--end::Buttons-->
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <!--end::Column-->
                </div>
                <!--end::Row-->
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
@endsection