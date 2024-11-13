<div class="modal fade" id="crearReservaModal" tabindex="-1" role="dialog" aria-labelledby="crearReservaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearReservaModalLabel">Crear Reserva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="crearReservaForm" type="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="roomIdInput" name="room_id">
                    <div class="form-group row">
                        <label for="fecha">Fecha:</label>
                        <div class="input-group date" id="fecha" data-target-input="nearest">
                            <input type="text" name="fecha" class="form-control datetimepicker-input" data-target="#fecha"/>
                            <div class="input-group-append mr-2" data-target="#fecha" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <button type="button" id="clearFecha" class="btn btn-outline-light btn-xs rounded-circle text-center align-self-center" style="width: 20px; height: 20px;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hora">Hora:</label>
                        <div class="input-group date" id="hora" data-target-input="nearest">
                            <input type="text" name="hora" class="form-control datetimepicker-input" data-target="#hora"/>
                            <div class="input-group-append mr-2" data-target="#hora" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                            <span type="button" id="clearHora" class="btn btn-outline-light btn-xs rounded-circle text-center align-self-center" style="width: 20px; height: 20px;">
                                <i class="fas fa-times"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center" id="loading-spinner" style="display: none;">
                        <div class="spinner-border text-info" role="status">
                            <span class="sr-only">Cargando...</span>
                        </div>
                        <label class="mr-4">Espere un momento</label>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-info reservar" data-test-id="">Solicitar Reserva</button>
                </div>
            </form>
        </div>
    </div>
</div>
