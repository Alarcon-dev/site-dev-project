@extends('layouts.master')
@section('content')
    @if ($publications && $publications->count() > 0)
        <div class="col-lg-12 col-md-12 col-12 col-sm-12" style="margin-top: 8%;">
            <div class="card">
                @include('includes.alerts')
                <div class="card-header">
                    <h4>Lista de Publicaciones</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary"></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Perfil</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publications as $publication)
                                    @if ($publication->user_public_id !== 1)
                                        <tr>
                                            <td class="text-center">{{ $publication->id_publication }}</td>
                                            <td class="text-center">{{ $publication->User->user_name }}</td>
                                            <td class="text-center">{{ $publication->created_at }}</td>
                                            <td class="text-center">{{ $publication->User->nick_name }}</td>
                                            <td class="text-center">
                                                <div class="profile_list">
                                                    <img src="{{ route('get.profile', ['image_name' => $publication->User->user_image]) }}"
                                                        alt="">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="/destroy/user/{{ $publication->id_publication }}"
                                                    class="btn btn-danger btn-action" data-toggle="tooltip"
                                                    title="Eliminar">
                                                    <i class="fas fa-trash"></i></a>
                                                <a href="/user/get/profile/{{ $publication->User->id_user }}"
                                                    class="btn btn-primary btn-action" data-toggle="tooltip" title="Ver">
                                                    <i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="section">
            <div class="row justify-content-center" style="margin-top: 3%">
                <div class="container">
                    <div class="col-md-12">
                        <h1 class="text-align-center" style="margin: 20% 50vh">No hay publicaciones</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
