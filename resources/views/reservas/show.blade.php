@extends('layouts.master')

@section('content_header')
    <h3>Lista de Reservas</h3>
@endsection

@section('content_body')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Bookings</div>
            <div class="card-body">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection

@push('css')
{{--    custom scripts--}}
@endpush

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush



