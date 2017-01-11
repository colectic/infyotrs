<li class="{{ Request::is('customerUsers*') ? 'active' : '' }}">
    <a href="{!! route('customerUsers.index') !!}"><i class="fa fa-edit"></i><span>CustomerUsers</span></a>
</li>

<li class="{{ Request::is('customerCompanies*') ? 'active' : '' }}">
    <a href="{!! route('customerCompanies.index') !!}"><i class="fa fa-edit"></i><span>CustomerCompanies</span></a>
</li>

