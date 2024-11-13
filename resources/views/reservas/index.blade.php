@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>Reservas de Salas</h3>
@endsection

@section('content')
    <div class="card card-outline mb-4">
        <div class="card-body">
            <div id="rooms-container" class="row g-3">
                @foreach ($rooms as $room)
                    @component('components.room-card', ['room' => $room])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
    @include('reservas.modal.crear')
@endsection
@section('js')
    <script src="{{ asset('reservas/reservas.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
@stop

