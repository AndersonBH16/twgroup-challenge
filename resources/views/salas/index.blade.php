<!-- resources/views/dashboard.blade.php -->
@extends('adminlte::page')

@section('title', 'Dashboard')

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

        </div>
    </div>
    @include('salas.modal.crear')
@endsection

