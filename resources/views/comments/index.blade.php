@extends('layouts.master')
@section('content')
    {{-- PARA OCULTA LE EXCESO DE COLOR MORADO --}}
    <section class="section">
        <div class="section-header">
            <h1>Comentarios</h1>
        </div>
    </section>

    @if ($comments->count() > 0)
                @include('includes.alerts')
            @foreach ($comments as $comment)
                <div class="col-lg-12 col-md-12 col-12 col-sm-12" style="margin-top: 4%;">
                    <div class="card">
                        <div class="card-body">
                            <ul style="list-style: none; padding: 0;">
                                <li>
                                    <p style="font-size: 14px; margin-bottom: 0;">
                                        Autor: {{ $comment->user->user_name ?? 'Usuario Desconocido' }}
                                        <br>
                                        {{ Carbon\Carbon::parse($comment->created_at)->locale('es')->diffForHumans(\Carbon\Carbon::now(), true) }}
                                    </p>
                                    <p style="font-size: 14px; margin-bottom: 5px;">{{ $comment->comment_content }}</p>

                                    @if (isset($comment->comment_image))  <img src="{{ asset('storage/' . $comment->comment_image) }}" style="width: 100%; height: auto; margin-bottom: 5px;">
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('comment.create') }}" class="btn btn-primary">Crear comentario</a>
    @else
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-align-center">NO HAY COMENTARIOS PARA MOSTRAR</h1>
                </div>
            </div>
        </div>
        <a href="{{ route('comment.create') }}" class="btn btn-primary">Crear comentario</a>
    @endif
@endsection
