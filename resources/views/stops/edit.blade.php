@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stop
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stop, ['route' => ['stops.update', $stop->id], 'method' => 'patch']) !!}

                        @include('stops.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection