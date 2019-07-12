<table class="table table-striped table-bordered table-advance table-hover">
    <thead>
        <tr>
            <th width="10%" class="text-center">Sr. No</th>
            <th width="20%">Class Name</th>
            <th width="20%">Incharge Name</th>
            <th width="10%" class="text-center">Status</th>
            <th width="20%" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($classes->total())
        @foreach($classes as $class)
        <tr class="trCount">
            <td class="highlight text-center">
                {{ $index++ }}
            </td>
            <td class="highlight">
                <a href="javascript:void(0);" class="viewDetails" data-href="{{ route('school.class.show', $class->id) }}">{{ $class->name }}</a>
            </td>
            <td class="highlight">
                {{ $class->incharge_name }}
            </td>
            <td class="highlight text-center">
                <i class="fa fa-circle changeStatus" data-value="{{ $class->status }}" title="@if($class->status == 1) Deactivate @else Activate @endif" data-href="{{ route('school.class.update', $class->id) }}" style="color: @if($class->status == 1) green @else red @endif"></i>
            </td>
            <td class="highlight text-center">
                <a type="button" href="{{ route('school.class.edit', $class->id) }}" class="btn default btn-xs purple margin-bottom-10">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a type="button" href="javascript:void(0);" data-href="{{ route('school.class.destroy', $class->id) }}" class="btn default btn-xs red margin-bottom-10 deleteRecord">
                    <i class="fa fa-trash-o"></i> Delete
                </a>
            </td>
        </tr>
        @endforeach
        @else
        <tr class="text-center">
            <td colspan="5">No records found.</td>
        </tr>
        @endif
    </tbody>
</table>

<div>
    {{ $classes->render() }}
</div>