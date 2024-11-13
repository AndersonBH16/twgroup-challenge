@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>Reservas de Salas</h3>
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
                    @component('components.room-card', ['room' => $room])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
    @include('booking.modal.reservar')
@endsection
@section('js')
    <script src="{{ asset('reservas/reservas.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
@stop

