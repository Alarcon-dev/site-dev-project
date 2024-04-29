<div class="row justify-content-center">
    <div class="">
        <div class="card card-publication mb-3 shadow" style="margin-top: 3%">
            <div class="card-header mt-3 mb-3">
                <div class="col_md_6">
                    @if ($publication->user->user_image)
                        <div class="profile_publication float-left">
                            <img src="/publication/profile/{{ $publication->user->user_image }}" alt="">
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
                        <a href="" class="text-decoration-none">{{ $publication->user->nick_name }}</a>
                    </h4>
                </div>
            </div>

            <div class="card-body">
                @if ($publication->public_image !== null)
                    @php $imageNames = json_decode($publication->public_image); @endphp
                    <div class="container p_img_container">
                        <div class="row justify-content-center">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($imageNames as $index => $imageName)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img src="/publication/image/{{ $imageName }}" class="img-fluid"alt="Image">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
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
                                    href="{{ route('comment.index') }}">Comentarios({{ count($publication->comments) }})</a></strong></span>
                    </div>
                    @if (Auth::user()->id_user === $publication->user_public_id)
                        <div class="col-md-8 d-flex justify-content-end">
                            <a href="/publication/destroy/{{ $publication->id_publication }}"
                                class="btn btn-danger btn-action mr-3" data-toggle="tooltip" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="/edit/publication/{{ $publication->id_publication }}"
                                class="btn btn-success btn-action" data-toggle="tooltip" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    @endif
                    @role('admin')
                        <div class="sticky-bottom">
                            <div class="row" style="margin-top: -4%; margin-bottom: 3%">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="/publication/destroy/{{ $publication->id_publication }}"
                                        class="btn btn-danger btn-action mr-3" data-toggle="tooltip" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endrole
                </div>
            </div>
            <div class="card-footer bg-whitesmoke">
                @if (isset($comments[$publication->id_publication]) && count($comments[$publication->id_publication]) > 0)
                    @foreach ($comments[$publication->id_publication] as $index => $comentario)
                        <div class="comment-divider mt-4 mb-4"></div>
                        <p>
                            <strong>{{ $comentario->user->user_name }}</strong>
                            <br>
                            {{ $comentario->comment_content }}
                            <div>
                                @php  $images = json_decode($comentario->comment_image);
                                @endphp
                                @if ($comentario->comment_image)
                                    @foreach ($images as $image)
                                        <img src="/comment/image/{{$image}}" class="img-fluid">
                                    @endforeach
                                @endif
                            </div>

                        </p>
                        @if (Auth::user()->id_user === $comentario->user_comment_id)
                            <div class="d-flex justify-content-end">
                                <!-- Botón para abrir el modal de edición -->
                                <button type="button" class="btn btn-success btn-action mr-3" data-bs-toggle="modal"
                                    data-bs-target="#editCommentModal{{ $comentario->id_comment }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('comment.destroy', $comentario->id_comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip"
                                        title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                        <hr>
                    @endforeach
                @else
                    <p>No existen comentarios</p>
                @endif
                <!-- Formulario de Comentarios -->
                @include('comments.create')
                <!-- Fin del Formulario de Comentarios -->
            </div>
        </div>
    </div>
</div>

@foreach ($comments[$publication->id_publication] as $comentario)
    <div class="modal fade" id="editCommentModal{{ $comentario->id_comment }}" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel{{ $comentario->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentModalLabel{{ $comentario->id_comment }}">Editar Comentario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>    
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('comment.update', $comentario->id_comment) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="comment_content">Contenido del Comentario</label>
                        <textarea class="form-control" id="comment_content" name="comment_content" rows="3">{{ $comentario->comment_content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="comment_image">Imágenes</label>
                        <input type="file" class="form-control-file" id="comment_image" name="comment_image[]"
                            multiple>
                        <small class="form-text text-muted">Puedes subir varias imágenes.</small>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                @method('UPDATE')
                <button type="button" class="btn btn-primary">Actualizar Comentario</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach