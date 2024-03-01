@extends('layouts.master')
@section('content')
    <div class="section-body" style="margin-top: 5%">
        <h2 class="section-title">Hola, {{ $user->user_name }}</h2>
        <p class="section-lead">
            Aquí puedes cambiar la información pública de tu perfil.
        </p>
        <div class="row mt-sm-4">
            @include('includes.alerts')
            <div class="col-12 col-md-12 col-lg-5" style="margin-top: -3.3%">
                <div class="card profile-widget" style="min-height: 88.5%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="upload_file_update">
                                <img src='{{ route('get.profile', ['image_name' => $user->user_image]) }}' alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7">
                <div class="card float-left">
                    <form method="post" action="/update/user/{{ $user->id_user }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <!-- Mueve aquí los elementos del primer formulario -->
                            <div class="row">
                                <div class="card-header">
                                    <h4>Editar Perfil</h4>
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Cambiar imagen</label>
                                    <input type="file" name='user_image'
                                        class="form-control @error('user_image') is-invalid @enderror" value="">
                                    @error('user_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="user_name">Nombre</label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                        name="user_name" value="{{ $user->user_name }}" required="">
                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="last_name">Apellido</label>
                                    <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                                        name="last_name" value="{{ $user->last_name }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"
                                        class="form-control  @error('email') is-invalid @enderror"
                                        value="{{ $user->email }}" required="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>Nombre de usuario</label>
                                    <input type="tel" name="nick_name"
                                        class="form-control  @error('nick_name') is-invalid @enderror"
                                        value="{{ $user->nick_name }}">
                                    @error('nick_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
