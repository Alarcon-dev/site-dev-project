@extends('layouts.master')
@section('content')
    <div class="section">
        @php
            $publications = App\Models\Publication::getAll();
        @endphp
        @if (Auth::user() !== null && $publications->count() > 0)
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
                                                    <a href="/publication/destroy/{{ $publication->id_publication }}"
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


                                            @if ($comentario->comment_image)
                                                @php
                                                    $images = json_decode($comentario->comment_image);
                                                @endphp

                                                @foreach ($images as $image)
                                                    holis
                                                    {{-- siguie apuentando a la carpeta public --}}
                                                    <img src="{{ Storage::url('comment_image/' . $image) }}"
                                                        alt="Imagen del comentario">
                                                    {{-- <img src="{{ asset('storage/comment_image/<?= $image ?>')}}" alt="">
                                                {{ asset('storage/comment_image/1712720635_66160afb3c295.png')}} --}}
                                                @endforeach
                                            @endif
                                        </p>
                                    @empty
                                        <p>
                                            No existen comentarios
                                        </p>
                                    @endforelse
                                @else
                                    <p>No existen comentarios</p>
                                @endif
                                <!-- Formulario de Comentarios -->
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <form method="POST" action="{{ route('comment.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="publication_id"
                                                value="{{ $publication->id_publication }}">


                                            <div class="form-group row mb-4">
                                                <input type="text"
                                                    id="comment_content{{ $publication->id_publication }}"
                                                    class="form-control col-10 @error('comment_content' . $publication->id_publication) is-invalid @enderror"
                                                    name="comment_content" required>{{ old('comment_content') }}

                                                @error('comment_content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="files_{{ $publication->id_publication }}"
                                                    class="btn btn-light col-2">
                                                    <i class="fas fa-image fa-5x mr-2"></i>
                                                </label>
                                                <input type="file" id="files_{{ $publication->id_publication }}"
                                                    name="comment_image[]" accept="image/*" multiple
                                                    style="display: none;">
                                                <div id="imagePreview_{{ $publication->id_publication }}"></div>
                                            </div>
                                            <script>
                                                document.getElementById('files_{{ $publication->id_publication }}').addEventListener('change', function() {
                                                    var imagePreview = document.getElementById('imagePreview_{{ $publication->id_publication }}');
                                                    imagePreview.innerHTML = "";

                                                    for (var i = 0; i < this.files.length; i++) {
                                                        var file = this.files[i];

                                                        if (!file.type.startsWith('image/')) {
                                                            continue;
                                                        }

                                                        var reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            var img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.classList.add('img-thumbnail', 'mr-2', 'mb-2');
                                                            img.style.maxWidth = '150px';
                                                            imagePreview.appendChild(img);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    }
                                                });
                                            </script>
                                            <div class="row mb-2">
                                                <div class="col-md-7 offset-md-0">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Crear comentario') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Fin del Formulario de Comentarios -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="section">
                <div class="row justify-content-center" style="margin-top: 3%">
                    <div class="container">
                        <div class="col-md-12">
                            <h1 class="text-align-center" style="margin: 20% 50vh">Bienvenido</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
