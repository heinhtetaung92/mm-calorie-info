@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div align="center"><h1 class="pull-left">Nutirition Facts</h1></div>
        <h1 class="pull-right" style="margin-left: 100px">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('nutiritionFacts.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('nutirition_facts.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

