@section('title')
    Admin Pilot List
@endsection
@section('css')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
                        <h5 class="text-dark font-weight-bold my-2 mr-5">Pilots</h5>
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
                
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Pilot List
                        </div>
                        <div class="card-toolbar">
                            <form action="import-pilot" class="d-flex" enctype="multipart/form-data" method="POST" action="{{ url('import-pilot') }}">
                                @csrf
                                <div class="form-group">
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="pilot_import" />
                                        <label class="custom-file-label" for="pilot_import">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group px-2">
                                    <input type="submit" class="btn btn-primary font-weight-bolder" name="submit" value="import" />
                                    <a href="pilot/create" class="btn btn-primary font-weight-bolder">New Pilot</a>
                                </div>
                            </form>
                            <!--begin::Button-->
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th>Record ID</th>
                                    <th>Email</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="pilot-list">
                                
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
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

<!--begin::Page Vendors(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
    "use strict";
    var KTDatatablesAdvancedColumnRendering = function() {

        var init = function() {
            var table = $('#kt_datatable');

            // begin first table
            table.DataTable({
                responsive: true,
                paging: true,
                processing: true,
                serverside: true,
                order: [[ 0, "desc" ]],
                ajax: "{{ url('api/pilots') }}",
                columns: [
                    { data: 'id' },
                    { data: 'email' },
                    { data: 'first_name' },
                    { data: 'last_name' },
                    { data: 'phone' },
                    { data: 'status' },
                    { data: 'id' }, 
                ],
                columnDefs: [
                    
                    {
                        targets: 1,
                        render: function(data, type, full, meta) {
                            return '<a class="text-dark-50 text-hover-primary" href="mailto:' + data + '">' + data + '</a>';
                        },
                    },
                    {
                        targets: -1,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return '\<a href="pilot/'+data+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                        <i class="la la-edit"></i>\
                                    </a>\
                                    <a href="admin/pilot-delete/'+data+'" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                        <i class="la la-trash"></i>\
                                    </a>\
                                ';
                        },
                    },
                    {
                        targets: 5,
                        render: function(data, type, full, meta) {
                            var status = {
                                0: {'title': 'Inactive', 'class': ' label-light-danger'},
                                1: {'title': 'Active', 'class': ' label-light-success'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-lg font-weight-bold pilot-status cursor-pointer' + status[data].class + ' label-inline" data-status="'+full.status+'" data-id="'+full.id+'">' + status[data].title + '</span>';
                        },
                    },
                    {
                        targets: 4,
                        render: function(data, type, full, meta) {
                            var status = {
                                1: {'title': 'Online', 'state': 'danger'},
                                2: {'title': 'Retail', 'state': 'primary'},
                                3: {'title': 'Direct', 'state': 'success'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                                '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                        },
                    },
                ],
            });

            $('#kt_datatable_search_status').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_type').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
        };

        return {

            //main function to initiate the module
            init: function() {
                init();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTDatatablesAdvancedColumnRendering.init();
    });

    $(document).ready(function() {
        $(document).on('click', '.pilot-status', function(e){
			e.preventDefault();
			var id = $(this).attr("data-id");
			var status = $(this).attr("data-status");
            if(status == '1'){
                status = '0';
            }else{
                status = '1';
            }
            $.ajax({
                url: "{{url('api/pilot/update')}}",
                type: "post",
                data: { 'user_id' : id, 'status' : status },
                dataType: 'json',
                success: function(response) {  
                    console.log(response);
                    location.reload();
                }, 
                error: function(response) {
                    console.log('Error:', response);
                }
            });
		});
    });
</script>

@endsection