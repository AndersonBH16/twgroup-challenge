<!-- resources/views/dashboard.blade.php -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

@section('content_header')
    <h3>Gestión de Salas Coworking</h3>
@endsection

@section('content')
    <div class="card card-info card-outline mb-4">
        <div class="card-header">
            <div class="card-title">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#crearSala">Crear sala</button>
            </div>
        </div>
        <div class="card-body">
            <div id="rooms-container" class="row g-3">
                @foreach ($rooms as $room)
                    <div class="col-md-4 room-card" data-room-id="{{ $room->id }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $room->name }} - <span><b>{{ $room->state }}</b></span></h5>
                                <p class="card-text"><strong>Capacidad:</strong> {{ $room->capacity }}</p>
                                <p class="card-text"><strong>Descripción:</strong> {{ $room->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('salas.modal.crear')
@endsection
@section('js')
    <script src="{{ asset('rooms/rooms.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
@stop

