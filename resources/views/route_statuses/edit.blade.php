@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Route Statuses
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($routeStatuses, ['route' => ['routeStatuses.update', $routeStatuses->id], 'method' => 'patch']) !!}

                        @include('route_statuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection