@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sellers
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sellers, ['route' => ['sellers.update', $sellers->id], 'method' => 'patch']) !!}

                        @include('sellers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection