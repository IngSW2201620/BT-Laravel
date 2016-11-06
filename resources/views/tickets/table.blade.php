<table class="table table-responsive" id="tickets-table">
    <thead>
        <th>Id Owner</th>
        <th>Id Reserved Route</th>
        <th>Id Used Route</th>
        <th>Id Used Stop</th>
        <th>Used Date</th>
        <th>Expiration Date</th>
        <th>Id Seller</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tickets as $tickets)
        <tr>
            <td>{!! $tickets->id_owner !!}</td>
            <td>{!! $tickets->id_reserved_route !!}</td>
            <td>{!! $tickets->id_used_route !!}</td>
            <td>{!! $tickets->id_used_stop !!}</td>
            <td>{!! $tickets->used_date !!}</td>
            <td>{!! $tickets->expiration_date !!}</td>
            <td>{!! $tickets->id_seller !!}</td>
            <td>
                {!! Form::open(['route' => ['tickets.destroy', $tickets->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tickets.show', [$tickets->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tickets.edit', [$tickets->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>