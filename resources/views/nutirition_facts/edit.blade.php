@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nutirition Fact
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nutiritionFact, ['route' => ['nutiritionFacts.update', $nutiritionFact->id], 'method' => 'patch']) !!}

                        @include('nutirition_facts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection