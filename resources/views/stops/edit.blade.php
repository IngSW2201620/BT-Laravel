@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stops
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stops, ['route' => ['stops.update', $stops->id], 'method' => 'patch']) !!}

                        @include('stops.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection