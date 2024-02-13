@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Clientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @php
                $heads = [
                    'CÉDULA', 
                    'APELLIDOS', 
                    'NOMBRES',
                    'EMAIL', 
                    'TELEFONO',
                    'DIRECCION',
                    'ESTADO',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 10]
                ];

                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                             </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button>';

                $config = [
                     'language'=>[
                        'url'=>'//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                     ]               
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->cedula}}</td>
                        <td>{{$cliente->apellido}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->estado}}</td>
                        <td>
                            {!! $btnEdit !!} 
                            <form style="display: inline" action="{{route('cliente.destroy',$cliente)}}" method="post" class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>  
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('.formEliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Está seguro?",
                    text: "Se va a eliminar un registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@stop
