@extends('school.layouts.app')

@section('title')
Edit Class
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil"></i> Edit Class
                </div>
            </div>
            <div class="portlet-body form">
                {{ Form::model($class, ['route' => ['school.class.update', $class->id], 'method' => 'put', 'id' => 'editClassForm']) }}
                @include('school.class.form')
            </div>
            <div class="form-actions">
                <button type="submit" class="btn blue" id="btnSubmitClass">Edit</button>
                <a type="button" href="{{ route('school.class.index') }}" class="btn default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Submit the form on the button click
        $(document).on('click', '#btnSubmitClass', function(e) {
            e.preventDefault();
            startLoader();

            $('span.error').empty().hide();

            // Send the Ajax request
            $.ajax({
                url: $('#editClassForm').attr('action'),
                type: 'post',
                data: $('#editClassForm').serialize(),
                success: function(data) {
                    show_FlashMessage(data.message);
                    window.location.href = data.redirectTo;
                }
            });
        });
    });
</script>
@endsection