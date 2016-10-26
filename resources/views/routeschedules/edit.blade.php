@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Routeschedule
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($routeschedule, ['route' => ['routeschedules.update', $routeschedule->id], 'method' => 'patch']) !!}

                        @include('routeschedules.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection