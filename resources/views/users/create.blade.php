@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 align="center">
            New User
        </h1>
    </section>
    <div class="content" align="center">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store']) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
