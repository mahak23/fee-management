<div class="form-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('name', 'Class Name', ['class' => 'control-label']) }}
                {{ Form::text('name', null, ['placeholder' => 'Class Name', 'class'=>'form-control']) }}
                <span class="error text-danger name"></span>
            </div>
            <div class="form-group">
                {{ Form::label('incharge_name', 'Incharge Name', ['class' => 'control-label']) }}
                {{ Form::text('incharge_name', null, ['placeholder' => 'Incharge Name', 'class'=>'form-control']) }}
                <span class="error text-danger incharge_name"></span>
            </div>
            <div class="form-group">
                {{ Form::label('cp_index', 'CP Index', ['class' => 'control-label']) }}
                {{ Form::text('cp_index', null, ['placeholder' => 'CP Index', 'class'=>'form-control']) }}
                <span class="error text-danger cp_index"></span>
            </div>
            <div class="form-group">
                {{ Form::label('order_by_index', 'Order by Index', ['class' => 'control-label']) }}
                {{ Form::text('order_by_index', null, ['placeholder' => 'Order by Index', 'class'=>'form-control']) }}
                <span class="error text-danger order_by_index"></span>
            </div>
        </div>
    </div>