<table class="table table-responsive" id="drivers-table">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Document Type</th>
        <th>Document Number</th>
        <th>Driving License</th>
        <th>Rh</th>
        <th>Photo</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($drivers as $drivers)
        <tr>
            <td>{!! $drivers->first_name !!}</td>
            <td>{!! $drivers->last_name !!}</td>
            <td>{!! $drivers->document_type !!}</td>
            <td>{!! $drivers->document_number !!}</td>
            <td>{!! $drivers->driving_license !!}</td>
            <td>{!! $drivers->rh !!}</td>
            <td>{!! $drivers->photo !!}</td>
            <td>
                {!! Form::open(['route' => ['drivers.destroy', $drivers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('drivers.show', [$drivers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('drivers.edit', [$drivers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>