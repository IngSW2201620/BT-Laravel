<table class="table table-responsive" id="stops-table">
    <thead>
        <th>Address</th>
        <th>Name</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Status</th>
        <th>Road</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($stops as $stop)
        <tr>
            <td>{!! $stop->address !!}</td>
            <td>{!! $stop->name !!}</td>
            <td>{!! $stop->latitude !!}</td>
            <td>{!! $stop->longitude !!}</td>
            <td>{!! $stop->status !!}</td>
            <td>{!! $stop->road !!}</td>
            <td>
                {!! Form::open(['route' => ['stops.destroy', $stop->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stops.show', [$stop->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stops.edit', [$stop->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>