@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bus, ['route' => ['buses.update', $bus->id], 'method' => 'patch']) !!}

                        @include('buses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection