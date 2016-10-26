<table class="table table-responsive" id="tickets-table">
    <thead>
        <th>Purchasedate</th>
        <th>Expirationdate</th>
        <th>Ustedate</th>
        <th>Datereservation</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
        <tr>
            <td>{!! $ticket->purchaseDate !!}</td>
            <td>{!! $ticket->expirationDate !!}</td>
            <td>{!! $ticket->usteDate !!}</td>
            <td>{!! $ticket->dateReservation !!}</td>
            <td>
                {!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tickets.show', [$ticket->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tickets.edit', [$ticket->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>