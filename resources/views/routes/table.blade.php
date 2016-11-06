<table class="table table-responsive" id="routes-table">
    <thead>
        <th>Id Assigned Driver</th>
        <th>Id Assigned Bus</th>
        <th>Id Road</th>
        <th>Schedule Time</th>
        <th>Id Route Status</th>
        <th>Startdate</th>
        <th>Enddate</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($routes as $routes)
        <tr>
            <td>{!! $routes->id_assigned_driver !!}</td>
            <td>{!! $routes->id_assigned_bus !!}</td>
            <td>{!! $routes->id_road !!}</td>
            <td>{!! $routes->schedule_time !!}</td>
            <td>{!! $routes->id_route_status !!}</td>
            <td>{!! $routes->startDate !!}</td>
            <td>{!! $routes->endDate !!}</td>
            <td>
                {!! Form::open(['route' => ['routes.destroy', $routes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('routes.show', [$routes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('routes.edit', [$routes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>