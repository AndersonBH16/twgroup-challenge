<div class="modal fade" id="crearReservaModal" tabindex="-1" aria-labelledby="crearReservaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="crearReservaModalLabel">Crear Reserva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="crearReservaForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="room_id" id="roomIdInput">
                    <input type="hidden" name="state" value="pendiente">

                    <div class="container mt-3">
                        <label for="fecha">Fecha:</label>
                        <div class="input-group date" data-provide="datepicker">
                            <div class="input-group date" id="fecha" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                </div>
                            </div>
                        </div>
                        <input type="text" id="fecha" class="form-control" placeholder="yyyy-mm-dd">
                    </div>

                    <div class="form-group">
                        <label for="hora">Hora:</label>
                        <input type="text" class="form-control" id="hora" name="hora" placeholder="Seleccione la hora" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="loading-message" style="display: none;" class="text-info">Guardando reserva, por favor espere...</span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Reservar</button>
                </div>
            </form>
        </div>
    </div>
</div>
