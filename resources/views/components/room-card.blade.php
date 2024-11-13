<div class="col-md-4 room-card" data-room-id="{{ $room->id }}">
    <div class="card card-outline card-info">
        <div class="card-header d-flex">
            <div class="card-title">
                <h5><b>Sala: {{ $room->number }} - {{ $room->name }}</b></h5>
            </div>
            <button type="button" class="btn btn-info ml-auto" data-toggle="modal" data-target="#crearReservaModal">Reservar</button>
        </div>
        <div class="card-body">
            <div class="row">
                <span class="card-text mr-4">{{ $room->state }}</span>
                <span class="card-text"><strong>Capacidad:</strong> {{ $room->capacity }}</span>
            </div>
            <strong>Descripción:</strong>
            <p class="card-text">{{ $room->description }}</p>
        </div>
    </div>
</div>
