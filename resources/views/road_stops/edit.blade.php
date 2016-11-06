@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Road Stops
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roadStops, ['route' => ['roadStops.update', $roadStops->id], 'method' => 'patch']) !!}

                        @include('road_stops.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection