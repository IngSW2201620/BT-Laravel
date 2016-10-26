<table class="table table-responsive" id="sellers-table">
    <thead>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Idticket</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sellers as $seller)
        <tr>
            <td>{!! $seller->firstName !!}</td>
            <td>{!! $seller->lastName !!}</td>
            <td>{!! $seller->idTicket !!}</td>
            <td>
                {!! Form::open(['route' => ['sellers.destroy', $seller->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sellers.show', [$seller->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sellers.edit', [$seller->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>