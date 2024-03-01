@extends('layouts.dashboard')

@section('title', 'Fichas técnicas')

@section('content')

    @include('layouts.modal_eliminar')
    <div class="modal fade" id="multiple-delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Eliminar registros seleccionados</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Está seguro que desea eliminar estos registros seleccionados.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" id="confirm-del-selected">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-transparent">
        <div class="row">
            <div class="col-md-7 col-md-push-5">
                <div class="text-left page-desc">
                    <small class="text-uppercase">Información</small>
                    <h3>Tabla de fichas técnicas</h3>
                    <p>
                        En la siguiente tabla se listan todas las fichas técnicas que se han registrado.
                        <br>
                        Como administrador puedes <strong>añadir, ver la ficha técnica, editarla y eliminarla</strong> estas tres últimas opciones desde la columna <strong>'Acciones'.</strong>
                    </p>
                </div>
            </div>
            <div class="col-md-5 col-md-pull-7">
                <img src="{{ asset('images/table-img.png') }}" alt="" class="img-responsive">
            </div>
        </div>
    </div>
    <div class="">
        <a class="add btn-success tooltip-anadir" href="{{ url('admin/fichas_tecnicas/crear') }}">
            <i class="fa fa-fw fa-plus"></i> Añadir ficha técnica
        </a>
        <form id="form-del-selected" action="eliminar_seleccionados" method="POST">
            {{ csrf_field() }}
            <div class="form-group"></div>
            <button class="btn btn-default"><i class="fa fa-fw fa-times"></i> Eliminar registros seleccionados</button>
        </form>
    </div>
    @include('layouts.messages')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-full table-fichas dataTable" id="tableCrud">
                <thead>
                    <tr>
                        <th>
                            {{-- <input type="checkbox" name="select_all" value="1" id="example-select-all"> --}}
                        </th>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Nombre científico</th>
                        <th>Familia</th>
                        <th>Origen</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach($ficha_tecnica as $ft)
                        <tr>
                            <td class="text-center">
                                <div class="checkbox">
                                    <label class="control control--checkbox">
                                        <input type="checkbox" name="id[]" value="{{ $ft->id }}" class="checkitem d-none">
                                        <div class="control__indicator table__indicator"></div>
                                    </label>
                                </div>
                            </td>
                            <td>{{ $count++ }}</td>
                            <td>{{ $ft->nombre }}</td>
                            <td>{{ $ft->nombre_cientifico }}</td>
                            <td>{{ $ft->familia }}</td>
                            <td>{{ $ft->origen }}</td>
                            <td>
                                <img src="{{ Storage::url($ft->foto) }}" class="img-responsive img-table" width="140" height="100" alt="">
                            </td>
                            <td>
                                <a class="btn btn-round btn-link"  href="{{ url('admin/fichas_tecnicas/'.$ft->id)}}" data-toggle="tooltip" data-placement="top" title="Ver ficha técnica">
                                    <i class="fa fa-fw fa-search"></i>
                                </a>
                                <a class="btn btn-round btn-link"  href="{{ url('admin/fichas_tecnicas/'.$ft->id.'/editar')}}" data-toggle="tooltip" data-placement="top" title="Editar ficha técnica">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <form action="{{ url('admin/fichas_tecnicas/'.$ft->id)}}" method="post" style="display: inline-block;" data-nombre="{{ $ft->nombre }}" data-toggle="tooltip" data-placement="top" title="Eliminar ficha técnica">
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
