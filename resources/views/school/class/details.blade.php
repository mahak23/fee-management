<table class="table table-striped table-bordered table-advance table-hover">
    <tbody>
        <tr>
            <th width="25%">Name</th>
            <td width="75%" class="highlight">{{ $class->name }}</td>
        </tr>
        <tr>
            <th width="25%">Incharge Name</th>
            <td width="75%" class="highlight">{{ $class->incharge_name }}</td>
        </tr>
        <tr>
            <th width="25%">CP Index</th>
            <td width="75%" class="highlight">{{ $class->cp_index }}</td>
        </tr>
        <tr>
            <th width="25%">Order By Index</th>
            <td width="75%" class="highlight">{{ $class->order_by_index }}</td>
        </tr>
        <tr>
            <th width="25%">Status</th>
            <td width="75%" class="highlight">{{ $class->getStatus() }}</td>
        </tr>
        <tr>
            <th width="25%">Created On</th>
            <td>{{ $class->created_at->format("Y-m-d H:i:s") }}</td>
        </tr>
        <tr>
            <th width="25%">Updated On</th>
            <td>{{ $class->updated_at->format("Y-m-d H:i:s") }}</td>
        </tr>
    </tbody>
</table>