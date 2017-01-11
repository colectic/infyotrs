<table class="table table-responsive" id="customerCompanies-table">
    <thead>
        <th>Customer Id</th>
        <th>Name</th>
        <th>Cif</th>
        <th>City</th>
        <th>Comarca</th>
        <th>Provincia</th>
        <th>Ambit Actuacio</th>
        <th>Forma Juridica</th>
        <th>Via Coneixement</th>
        <th>Comments</th>
        <th>Valid Id</th>
        <th>Create Time</th>
        <th>Create By</th>
        <th>Change Time</th>
        <th>Change By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($customerCompanies as $customerCompanies)
        <tr>
            <td>{!! $customerCompanies->customer_id !!}</td>
            <td>{!! $customerCompanies->name !!}</td>
            <td>{!! $customerCompanies->CIF !!}</td>
            <td>{!! $customerCompanies->city !!}</td>
            <td>{!! $customerCompanies->comarca !!}</td>
            <td>{!! $customerCompanies->provincia !!}</td>
            <td>{!! $customerCompanies->ambit_actuacio !!}</td>
            <td>{!! $customerCompanies->forma_juridica !!}</td>
            <td>{!! $customerCompanies->via_coneixement !!}</td>
            <td>{!! $customerCompanies->comments !!}</td>
            <td>{!! $customerCompanies->valid_id !!}</td>
            <td>{!! $customerCompanies->create_time !!}</td>
            <td>{!! $customerCompanies->create_by !!}</td>
            <td>{!! $customerCompanies->change_time !!}</td>
            <td>{!! $customerCompanies->change_by !!}</td>
            <td>
                {!! Form::open(['route' => ['customerCompanies.destroy', $customerCompanies->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('customerCompanies.show', [$customerCompanies->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('customerCompanies.edit', [$customerCompanies->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>