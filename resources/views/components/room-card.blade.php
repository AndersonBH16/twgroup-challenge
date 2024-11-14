<div class="col-md-4 room-card" data-room-id="{{ $room->id }}">
    <div class="card card-outline card-info">
        <div class="card-header d-flex align-items-center">
            <div class="card-title d-flex align-items-center">
                <h5><b>Sala: {{ $room->number }} - {{ $room->name }}</b></h5>
            </div>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a type="button" class="btn btn-primary btn-xs ml-2" href="\ver-aprobaciones"><i class="fa fa-eye mr-2"></i>Ver Pendientes</a>
            @endif
            @if(auth()->check() && auth()->user()->role === 'client')
                <button type="button" class="btn btn-info ml-auto btn-reservar btn-sm" data-room-id="{{ $room->id }}" data-toggle="modal" data-target="#crearReservaModal">Reservar</button>
            @endif
        </div>
        <div class="card-body" style="overflow-y: auto;">
            <div class="d-flex">
                <span class="card-text"><strong>Capacidad:</strong> {{ $room->capacity }}</span><br>
                <h6 class="card-text ml-auto">
                    <span class="state badge
                        @if ($room->state == 'disponible') badge-success
                        @elseif ($room->state == 'ocupado') badge-dark
                        @elseif ($room->state == 'reservado') badge-warning
                        @elseif ($room->state == 'mantenimiento') badge-danger
                        @endif">
                        {{ $room->state }}
                    </span>
                </h6>
            </div>

            <strong>Descripción:</strong>
            <p class="card-text">{{ $room->description }}</p>
            <div class="d-flex">
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <button class="btn btn-warning btn-xs ml-auto mr-2" title="Modificar información de la sala"><span class="fa fa-edit"></span></button>
                    <button class="btn btn-danger btn-xs" title="Eliminar sala"><i class="fa fa-trash-alt"></i></button>
                @endif
            </div>
        </div>
    </div>
</div>
