@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios y Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Usuario: <strong>{{$user->name}}</strong></h4>
        </div>
        <div class="card-body">
            <h5>Lista de Permisos</h5>
            {!! Form::model($user, ['route' => ['asignar.update', $user],'method'=>'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                        </label>
                        {!! Form::checkbox('roles[]', $role->id, $user->hasAnyRole($role->id) ?  : false, ['class'=>'mr-1']) !!}
                        {{$role->name}}
                    </div>
                @endforeach
                {!! Form::submit('Asignar Roles', ['class'=>'btn btn-primary mt-3']) !!} 
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi')
    </script>
@stop