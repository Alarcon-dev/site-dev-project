@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Articulo</h1>
        </div>
        @include('includes.alerts')
    </section>
        <div class="col-lg-12 col-md-12 col-12 col-sm-12" style="margin-top: 4%;">
            <div class="card">
                <div class="card-header">
                    <h3 style="font-size: 24px; margin: 0px;">{{ $article->article_title }}</h3>
                </div>
                <div class="card-body">
                        <ul style="list-style: none; padding: 0;">
                            <li >
                              <p style="font-size: 14px; margin-bottom: 5px;">{{ $article->article_content}}</p>
                              <td class="text-center">{{ $article->category->categorie_name}}</td>
                              <p style="font-size: 14px; margin-bottom: 0;">
                                Autor: {{ $article->user->user_name ?? 'Usuario Desconocido' }}
                                <br>
                                Fecha: {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }} <br>
                                {{ Carbon\Carbon::parse($article->created_at)->diffForHumans(\Carbon\Carbon::now(), true) }}
                              </p>
                            </li>
                        </ul>
                        <a href="{{ route('article.create') }}" class="btn btn-primary">Crear nuevo artículo</a>
                           <a href="{{ route('article.index') }}" class="btn btn-primary">Ver artículos</a>
                </div>
            </div>
        </div>
@endsection
