<table class="table table-responsive" id="tickets-table">
    <thead>
        <th>Costumer User</th>
        <th>Costumer Id</th>
        <th>Type</th>
        <th>Subject</th>
        <th>Body</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
        <tr>
            <td>{!! $ticket->costumer_user !!}</td>
            <td>{!! $ticket->costumer_id !!}</td>
            <td>{!! $ticket->type !!}</td>
            <td>{!! $ticket->subject !!}</td>
            <td>{!! $ticket->body !!}</td>
            <td>{!! $ticket->created_at !!}</td>
            <td>{!! $ticket->updated_at !!}</td>
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