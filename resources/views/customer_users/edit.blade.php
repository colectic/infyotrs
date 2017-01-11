@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Customer Users
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customerUsers, ['route' => ['customerUsers.update', $customerUsers->id], 'method' => 'patch']) !!}

                        @include('customer_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection