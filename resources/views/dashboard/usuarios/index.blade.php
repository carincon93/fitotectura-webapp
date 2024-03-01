@extends('layouts.dashboard')

@section('title', 'Usuarios')

@section('content')
    @include('layouts.modal_eliminar')
    <div class="page-header">
        <h4>Tabla de Usuarios</h4>
        <p>En la siguiente tabla se listan todos los usuarios que se han registrado. Como administrador puedes <strong>añadir, editar y eliminarla usuarios,</strong> estas tres opciones desde la columna <strong>'Acciones'.</strong></p>
    </div>
    <a class="add btn-success" href="{{ url('admin/usuarios/crear') }}">
        <i class="fa fa-fw fa-plus"></i> Añadir usuario
    </a>
    @include('layouts.messages')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-full dataTable" id="tableCrud">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Profesion</th>
                        <th>Uso</th>
                        <th>Nombre Empresa / Institución</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach($user as $us)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $us->nombre_completo }}</td>
                            <td>{{ $us->email }}</td>
                            <td>{{ $us->telefono }}</td>
                            <td>{{ $us->profesion }}</td>
                            <td>{{ $us->uso }}</td>
                            <td>{{ $us->nombre_empresa_institucion }}</td>
                            <td>
                                <a class="btn btn-round btn-link"  href="{{ url('admin/usuarios/' . $us->id.'/editar')}}" data-toggle="tooltip" data-placement="top" title="Editar usuario">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <form action="{{ url('admin/usuarios/'.$us->id)}}" method="post" style="display: inline-block;" data-nombre="{{ $us->nombre_completo }}" data-toggle="tooltip" data-placement="top" title="Eliminar usuario">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-round btn-link btn-delete">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
