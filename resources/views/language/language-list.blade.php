@section('title')
    Admin Language List
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
                        <h5 class="text-dark font-weight-bold my-2 mr-5">Language</h5>
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
                            <h3 class="card-label">Language List
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ url('/language/create') }}" class="btn btn-primary font-weight-bolder">New Language</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th>Record ID</th>
                                    <th>Field key</th>
                                    <th>Content</th>
                                    <th>Language Code</th>
                                </tr>
                            </thead>
                            <tbody class="language-list">
                                
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
                ajax: "{{ url('api/language') }}",
                columns: [
                    { data: 'id' },
                    { data: 'field_key' },
                    { data: 'content' },
                    { data: 'language_code' },
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
                            console.log(full);
                            return '\<a href="language/'+full.field_key+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                        <i class="la la-edit"></i>\
                                    </a>\
                                    <a href="admin/language-delete/'+full.field_key+'" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                        <i class="la la-trash"></i>\
                                    </a>\
                                ';
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