@extends('layouts.master')
@section('content')
    {{-- PARA OCULTA LE EXCESO DE COLOR MORADO --}}
    <section class="section">
        <div class="section-header">
            <h1>Lista de articulos</h1>
        </div>
    </section>

    @if ($articles->count() > 0)
        @role('admin')
            <div class="card">
                @include('includes.alerts')
                <a href="{{ route('article.create') }}" class="btn btn-primary">Crear nuevo artículo</a>
                <br>
                <br>
                <div class="table-flex">
                    <table class="table table-striped mb-0 table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Contenido</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Fecha de creación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            ?>
                            @foreach ($articles as $article)
                                <tr>
                                    <td class="text-center"> {{ $i++ }}</td>
                                    <td class="text-center">{{ $article->article_title }}</td>
                                    <td class="text-center">{{ Str::limit($article->article_content, 30) }}</td>
                                    <td class="text-center">{{ $article->category->categorie_name }}</td>
                                    <td class="text-center">
                                        {{ $article->user->user_name ?? 'Usuario Desconocido' }}
                                    </td>
                                    <td class="text-center">{{ $article->created_at->format('Y-m-d') }}</td>

                                    <td class="text-center">

                                        <div class="d-flex">
                                            <a href="{{ route('article.show', $article->id_article) }}"
                                                class="btn btn-info btn-action me-2" data-toggle="tooltip" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('article.edit', $article->id_article) }}"
                                                class="btn btn-primary btn-action me-2" data-toggle="tooltip" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('article.destroy', $article->id_article) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-action me-2"
                                                    data-toggle="tooltip" title="Eliminar"
                                                    onclick="return confirm('¿Esta seguro de que desea eliminar este artículo?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endrole
        @role('userClient')
            @foreach ($articles as $article)
                <div class="col-lg-12 col-md-12 col-12 col-sm-12" style="margin-top: 4%;">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-size: 24px; margin: 0px;">{{ $article->article_title }}</h3>
                        </div>
                        <div class="card-body">
                            <ul style="list-style: none; padding: 0;">
                                <li>
                                    <p style="font-size: 14px; margin-bottom: 5px;">{{ $article->article_content }}</p>
                                    <td class="text-center">{{ $article->category->categorie_name }}</td>
                                    <p style="font-size: 14px; margin-bottom: 0;">
                                        Autor: {{ $article->user->user_name ?? 'Usuario Desconocido' }}
                                        <br>
                                        Fecha: {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }} <br>
                                        Creado {{ $article->created_at->locale('es')->diffForHumans() }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endrole
    @else
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-align-center">NO HAY ARTÍCULOS PARA MOSTRAR</h1>
                </div>
            </div>
        </div>
    @endif
@endsection
