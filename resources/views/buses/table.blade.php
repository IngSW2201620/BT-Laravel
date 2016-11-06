<table class="table table-responsive" id="buses-table">
    <thead>
        <th>License Plate</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Capacity</th>
        <th>Photo</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($buses as $buses)
        <tr>
            <td>{!! $buses->license_plate !!}</td>
            <td>{!! $buses->brand !!}</td>
            <td>{!! $buses->model !!}</td>
            <td>{!! $buses->capacity !!}</td>
            <td>{!! $buses->photo !!}</td>
            <td>
                {!! Form::open(['route' => ['buses.destroy', $buses->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('buses.show', [$buses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('buses.edit', [$buses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>