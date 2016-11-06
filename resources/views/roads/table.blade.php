<table class="table table-responsive" id="roads-table">
    <thead>
        <th>Name</th>
        <th>Id Source Stop</th>
        <th>Id Destination Stop</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($roads as $roads)
        <tr>
            <td>{!! $roads->name !!}</td>
            <td>{!! $roads->id_source_stop !!}</td>
            <td>{!! $roads->id_destination_stop !!}</td>
            <td>
                {!! Form::open(['route' => ['roads.destroy', $roads->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roads.show', [$roads->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roads.edit', [$roads->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>