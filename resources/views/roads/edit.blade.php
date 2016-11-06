@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Roads
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roads, ['route' => ['roads.update', $roads->id], 'method' => 'patch']) !!}

                        @include('roads.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection