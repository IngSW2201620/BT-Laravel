<table class="table table-responsive" id="stops-table">
    <thead>
        <th>Address</th>
        <th>Name</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($stops as $stops)
        <tr>
            <td>{!! $stops->address !!}</td>
            <td>{!! $stops->name !!}</td>
            <td>{!! $stops->latitude !!}</td>
            <td>{!! $stops->longitude !!}</td>
            <td>
                {!! Form::open(['route' => ['stops.destroy', $stops->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stops.show', [$stops->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stops.edit', [$stops->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>