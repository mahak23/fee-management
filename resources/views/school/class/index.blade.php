@extends('school.layouts.app')

@section('title')
Manage Classes
@endsection

@section('content')
<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('school.dashboard') }}">Dashboard</a>
        </li>
        <li>
            <i class="fa fa-angle-right"></i>
            Manage Classes
        </li>
    </ul>
</div>
<div class="row margin-bottom-20">
    <div class="col-sm-6">
        <h3 class="page-title">
            Manage Classes
        </h3>
    </div>
    <div class="col-sm-6">
        <a type="button" href="{{ route('school.class.create') }}" class="btn red-sunglo btn red-sunglo margin-top-20 pull-right">Create New</a>
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    {{ Form::open(['method' => 'get', 'id' => 'formFilter', 'name' => 'serach_form', 'autocomplete' => 'off']) }}
    <div class="col-md-5 col-sm-7">
        <div class="input-icon">
            <i class="fa fa-search"></i>
            {{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Search by Name']) }}
        </div>
    </div>
    <div class="col-md-3 col-sm-5">
        <div class="dataTables_filter pull-left">
            {{ Form::select('sort_type', ['' => 'Select Status', '1' => 'Activated', '0' => 'Deactivated'], null, ['class' => 'form-control input-medium input-inline margin-bottom-20', 'id' => 'sortType']) }}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="dataTables_filter pull-left">
            <button type="submit" id="btnSubmitFilterForm" class="btn btn-success margin-bottom-20">Filter</button>
            <button type="submit" id="btnResetFilterForm" class="btn btn-danger margin-bottom-20">Reset</button>
        </div>
    </div>
    {{ Form::close() }}
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-body table-responsive">
                <div id="dataListing">
                    @include('school.class.list')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Class Details</h4>
            </div>
            <div class="modal-body">
                <div id="modalViewData"></div>
                <div class="text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('path')
const path = "{{ route('school.class.index') }}";
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        // Show the details model
        $(document).on('click', '.viewDetails', function() {
            startLoader();
            let url = $(this).data('href');

            // send the ajax request to Get the record
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    $('#modalViewData').html(data.data);
                    $('#viewDetailsModal').modal('show');
                    stopLoader();
                }
            });
        });

        // Active or Inacticve record
        $(document).on('click', '.changeStatus', function() {
            // get the id of the record
            let url = $(this).data('href');

            // get the current value of the record
            let value = parseInt($(this).data('value'));

            var message = "";
            if (value) {
                message = "Are you sure you want to deactivate this record?";
            } else {
                message = "Are you sure you want to activate this record?";
            }

            bootbox.confirm(message, function(result) {
                if (result) {
                    startLoader();
                    // send the ajax request to Get the record for Update
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            '_method': "PATCH"
                        },
                        success: function(data) {
                            //check current active page
                            var current_page = $(".pagination").find('.active').text();

                            // reload the list
                            load_listings(path + '?page=' + current_page, 'serach_form');

                            // stop the loader
                            stopLoader();

                            // show the success message
                            show_FlashMessage(data.message);
                        }
                    });
                }
            });
        });

        /**
         * Handle the delete button
         */
        $(document).on('click', '.deleteRecord', function(e) {
            e.preventDefault();
            // Get the url for delete record 
            let url = $(this).data('href');

            // Show the confirmation box before delete the record
            bootbox.confirm("Are you sure you want to delete this record?", function(result) {
                // Delete record if click on Ok button
                if (result) {
                    startLoader();

                    // Send the request for delete the record
                    $.ajax({
                        type: 'delete',
                        url: url,
                        success: function(data) {
                            var rowCount = $('.trCount').length;
                            var current_page = $(".pagination").find('.active').text();

                            if (rowCount == 1) {
                                //check if current page have only one record
                                current_page = current_page == 1 ? 1 : current_page - 1;
                            }

                            // reload the list
                            load_listings(path + '?page=' + current_page, 'serach_form');

                            // stop the loader
                            stopLoader();

                            // show the success message
                            show_FlashMessage(data.message);
                        }
                    });
                }
            });
        });

        // Ajax base Pagination
        $(document).on("click", ".pagination li a", function(e) {
            e.preventDefault();
            startLoader();
            load_listings($(this).attr('href'), 'serach_form');
        });

        // Search by name
        $(document).on("click", "#btnSubmitFilterForm", function(e) {
            e.preventDefault();
            startLoader();

            // check current active page
            var current_page = $(".pagination").find('.active').text();
            load_listings(path, 'serach_form');
        });

        // Reset Table data
        $(document).on("click", "#btnResetFilterForm", function(e) {
            e.preventDefault();
            startLoader();

            // Reset Search Form fields
            $('#formFilter')[0].reset();

            // Relload the data
            load_listings(path);
        });
    });
</script>
@endsection