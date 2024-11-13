<div class="col-md-4 room-card" data-room-id="{{ $room->id }}">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $room->name }} - <span><b>{{ $room->state }}</b></span></h5>
            <p class="card-text"><strong>Capacidad:</strong> {{ $room->capacity }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $room->description }}</p>
        </div>
    </div>
</div>
