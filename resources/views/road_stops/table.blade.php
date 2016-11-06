<table class="table table-responsive" id="roadStops-table">
    <thead>
        <th>Id Road</th>
        <th>Id Stop</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($roadStops as $roadStops)
        <tr>
            <td>{!! $roadStops->id_road !!}</td>
            <td>{!! $roadStops->id_stop !!}</td>
            <td>
                {!! Form::open(['route' => ['roadStops.destroy', $roadStops->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roadStops.show', [$roadStops->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roadStops.edit', [$roadStops->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>