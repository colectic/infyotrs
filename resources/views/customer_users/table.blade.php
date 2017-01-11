<table class="table table-responsive" id="customerUsers-table">
    <thead>
        <th>Id</th>
        <th>Login</th>
        <th>Email</th>
        <th>Customer Id</th>
        <th>Pw</th>
        <th>Title</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Mobile</th>
        <th>Email Ext00</th>
        <th>Email Ext01</th>
        <th>Comments</th>
        <th>Valid Id</th>
        <th>Create Time</th>
        <th>Create By</th>
        <th>Change Time</th>
        <th>Change By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($customerUsers as $customerUsers)
        <tr>
            <td>{!! $customerUsers->id !!}</td>
            <td>{!! $customerUsers->login !!}</td>
            <td>{!! $customerUsers->email !!}</td>
            <td>{!! $customerUsers->customer_id !!}</td>
            <td>{!! $customerUsers->pw !!}</td>
            <td>{!! $customerUsers->title !!}</td>
            <td>{!! $customerUsers->first_name !!}</td>
            <td>{!! $customerUsers->last_name !!}</td>
            <td>{!! $customerUsers->phone !!}</td>
            <td>{!! $customerUsers->mobile !!}</td>
            <td>{!! $customerUsers->email_ext00 !!}</td>
            <td>{!! $customerUsers->email_ext01 !!}</td>
            <td>{!! $customerUsers->comments !!}</td>
            <td>{!! $customerUsers->valid_id !!}</td>
            <td>{!! $customerUsers->create_time !!}</td>
            <td>{!! $customerUsers->create_by !!}</td>
            <td>{!! $customerUsers->change_time !!}</td>
            <td>{!! $customerUsers->change_by !!}</td>
            <td>
                {!! Form::open(['route' => ['customerUsers.destroy', $customerUsers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('customerUsers.show', [$customerUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('customerUsers.edit', [$customerUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>