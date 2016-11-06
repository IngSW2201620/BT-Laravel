@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bus Positions
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($busPositions, ['route' => ['busPositions.update', $busPositions->id], 'method' => 'patch']) !!}

                        @include('bus_positions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection