@extends('layouts.master')
@section('content')
    @include('includes.alerts')
    {{-- <div class="container" style="margin-top: 10%; margin-bottom: 10%"> --}}
    {{-- <div class="row justify-content-center">
      <div class="col-md-8"> --}}
    <div class="card">
        <div class="card-header">{{ __('Crear artículo') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('article.update', $article) }}">
                @csrf

                @method('PUT') <div class="row mb-3">
                    <label for="article_title" class="col-md-4 col-form-label text-md-end">Título del artículo</label>

                    <div class="col-md-6">
                        <input id="article_title" type="text"
                            class="form-control @error('article_title') is-invalid @enderror" name="article_title"
                            value="{{ old('article_title', $article->article_title) }}" required
                            autocomplete="article_title" autofocus>

                        @error('article_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="article_content" class="col-md-4 col-form-label text-md-end">Contenido del artículo</label>

                    <div class="col-md-6">
                        <textarea id="article_content" class="form-control @error('article_content') is-invalid @enderror"
                            name="article_content" required>{{ old('article_content', $article->article_content) }}</textarea>

                        @error('article_content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="row mb-3">
                    <label for="categorie_id" class="col-md-4 col-form-label text-md-end">{{ __('Categoría') }}</label>

                    <div class="col-md-6">
                        <select id="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror"
                            name="categorie_id" required>
                            <option selected value="">Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_categorie }}"
                                    @if ($category->id_categorie == $article->categorie_article_id) selected @endif>
                                    {{ $category->categorie_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
