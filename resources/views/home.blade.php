@extends('layouts.master')
@section('content')

    {{-- <div class="section"> --}}
        @include('includes.alerts')

        @if (Auth::user() !== null && $publications->count() > 0)
            @foreach ($publications as $publication)
                @include('publications.partial_cards', ['publication' => $publication])
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
    {{-- </div> --}}
@endsection