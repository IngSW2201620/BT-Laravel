<table class="table table-responsive" id="drivers-table">
    <thead>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Photo</th>
        <th>Administrator</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($drivers as $driver)
        <tr>
            <td>{!! $driver->firstName !!}</td>
            <td>{!! $driver->lastName !!}</td>
            <td>{!! $driver->photo !!}</td>
            <td>{!! $driver->administrator !!}</td>
            <td>
                {!! Form::open(['route' => ['drivers.destroy', $driver->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('drivers.show', [$driver->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('drivers.edit', [$driver->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>