<table class="table table-responsive" id="routeStatuses-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($routeStatuses as $routeStatuses)
        <tr>
            <td>{!! $routeStatuses->name !!}</td>
            <td>
                {!! Form::open(['route' => ['routeStatuses.destroy', $routeStatuses->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('routeStatuses.show', [$routeStatuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('routeStatuses.edit', [$routeStatuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>