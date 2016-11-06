<table class="table table-responsive" id="busPositions-table">
    <thead>
        <th>Id Bus</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($busPositions as $busPositions)
        <tr>
            <td>{!! $busPositions->id_bus !!}</td>
            <td>{!! $busPositions->latitude !!}</td>
            <td>{!! $busPositions->longitude !!}</td>
            <td>
                {!! Form::open(['route' => ['busPositions.destroy', $busPositions->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('busPositions.show', [$busPositions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('busPositions.edit', [$busPositions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>