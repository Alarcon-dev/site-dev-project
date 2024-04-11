@extends('layouts.master')
@section('content')
    <div class="section">
        {{-- // $user = Auth::user();
            // $publications = $user->publications;
            // $publications = App\Models\Publication::getAll(); --}}

        @if (Auth::user() !== null && $publications->count() > 0)
            {{-- @if ($publications->count() > 0) --}}
            @include('includes.alerts')
            @foreach ($publications as $publication)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-10">
                        <div class="card card-publication mb-3 shadow" style="margin-top: 3%">
                            <div class="card-header mt-3 mb-3">
                                <div class="col_md_6">
                                    @if ($publication->User->user_image)
                                        <div class="profile_publication float-left">
                                            <img src="/publication/profile/{{ $publication->User->user_image }}"
                                                alt="">
                                        </div>
                                    @else
                                        <div class="profile_publication float-left">
                                            <img src="{{ asset('images/no_profile.png') }}" alt="">
                                        </div>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title ml-3">{{ $publication->public_title }}</h4>
                                    <h4 class="card-title ml-3">
                                        publicado {{ $publication->created_at->locale('es')->diffForHumans() }}</h4>
                                    <h4 class="card-title ml-3">
                                        Por:
                                        <a href="" class="text-decoration-none">
                                            {{ $publication->user->nick_name }}
                                        </a>
                                    </h4>
                                </div>
                            </div>

                            <div class="card-body">
                                @if ($publication->public_image !== null)
                                    @php
                                        $imageNames = json_decode($publication->public_image);
                                    @endphp

                                    <div class="container p_img_container">
                                        <div class="row justify-content-center">

                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                                <div class="carousel-inner">
                                                    @foreach ($imageNames as $index => $imageName)
                                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                            <img src="/publication/image/{{ $imageName }}"
                                                                alt="Image">
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <a href="" class="text-decoration-none p-3">
                                <div class="code-container">
                                    <div class="code">{!! highlight_string($publication->public_content, true) !!}</div>
                                </div>
                            </a>

                            <div class="sticky-bottom" style="padding: 2% 5%">
                                <div class="row mt-5">
                                    <div class="col-md-4 justify-content-start">
                                        <span class="mr-3"><strong><a class="nav-link p-0"
                                                    href="{{ route('comment.index') }}">Comentarios({{ count($publication->comments) }})</a>
                                            </strong></span>
                                    </div>
                                    @if (Auth::user()->id_user === $publication->user_public_id)
                                        <div class="col-md-8 d-flex justify-content-end">
                                            <a href="/publication/destroy/{{ $publication->id_publication }}"
                                                class="btn btn-danger btn-action mr-3" data-toggle="tooltip"
                                                title="Eliminar">
                                                <i class="fas fa-trash"></i></a>
                                            <a href="/edit/publication/{{ $publication->id_publication }}"
                                                class="btn btn-success btn-action" data-toggle="tooltip" title="Editar">
                                                <i class="fas fa-edit"></i></a>
                                        </div>
                                    @endif
                                    @role('admin')
                                        <div class="sticky-bottom">
                                            <div class="row" style="margin-top: -4%; margin-bottom: 3%">
                                                <div class="col-md-12 d-flex justify-content-end">
                                                    <a href="/publication/destroy/{{ $publication->id_publication }}else"
                                                        class="btn btn-danger btn-action mr-3" data-toggle="tooltip"
                                                        title="Eliminar">
                                                        <i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endrole
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                @if (isset($comments[$publication->id_publication]) && count($comments[$publication->id_publication]) > 0)
                                    @forelse ($comments[$publication->id_publication] as $comentario)
                                        <p>
                                            <strong>{{ $comentario->user->user_name }}</strong>
                                            </br>
                                            {{ $comentario->comment_content }}
                                            {{ $comentario->comment_image }}
                                        </p>

                                    @empty
                                        <p>
                                            No existen comentarios
                                        </p>
                                    @endforelse
                                @else
                                    <p>No existen comentarios</p>
                                @endif
                                @include('comments.create')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row justify-content-center" style="margin-top: 3%">
                <div class="container">
                    <div class="col-md-12">
                        <h1 class="text-align-center" style="margin: 20% 50vh">No hay publicaciones</h1>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
