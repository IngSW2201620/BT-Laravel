<table class="table table-responsive" id="roads-table">
    <thead>
        <th>Name</th>
        <th>Route</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($roads as $road)
        <tr>
            <td>{!! $road->name !!}</td>
            <td>{!! $road->route !!}</td>
            <td>
                {!! Form::open(['route' => ['roads.destroy', $road->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roads.show', [$road->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roads.edit', [$road->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>