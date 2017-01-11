@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Customer Companies
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customerCompanies, ['route' => ['customerCompanies.update', $customerCompanies->id], 'method' => 'patch']) !!}

                        @include('customer_companies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection