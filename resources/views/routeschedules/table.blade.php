<table class="table table-responsive" id="routeschedules-table">
    <thead>
        <th>Destination</th>
        <th>Source</th>
        <th>Date</th>
        <th>Status</th>
        <th>Name</th>
        <th>Startingdate</th>
        <th>Endingdate</th>
        <th>Driver</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($routeschedules as $routeschedule)
        <tr>
            <td>{!! $routeschedule->destination !!}</td>
            <td>{!! $routeschedule->source !!}</td>
            <td>{!! $routeschedule->date !!}</td>
            <td>{!! $routeschedule->status !!}</td>
            <td>{!! $routeschedule->name !!}</td>
            <td>{!! $routeschedule->startingDate !!}</td>
            <td>{!! $routeschedule->endingDate !!}</td>
            <td>{!! $routeschedule->driver !!}</td>
            <td>
                {!! Form::open(['route' => ['routeschedules.destroy', $routeschedule->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('routeschedules.show', [$routeschedule->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('routeschedules.edit', [$routeschedule->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>