@extends('layouts.master')
@section('content')
    <div class="section">
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
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDos">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalDos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
