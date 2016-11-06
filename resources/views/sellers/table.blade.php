<table class="table table-responsive" id="sellers-table">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sellers as $sellers)
        <tr>
            <td>{!! $sellers->first_name !!}</td>
            <td>{!! $sellers->last_name !!}</td>
            <td>
                {!! Form::open(['route' => ['sellers.destroy', $sellers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sellers.show', [$sellers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sellers.edit', [$sellers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>