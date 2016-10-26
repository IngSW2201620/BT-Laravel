<table class="table table-responsive" id="passengers-table">
    <thead>
        <th>Balance</th>
        <th>User</th>
        <th>Ticket</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($passengers as $passenger)
        <tr>
            <td>{!! $passenger->balance !!}</td>
            <td>{!! $passenger->user !!}</td>
            <td>{!! $passenger->ticket !!}</td>
            <td>
                {!! Form::open(['route' => ['passengers.destroy', $passenger->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('passengers.show', [$passenger->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('passengers.edit', [$passenger->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>