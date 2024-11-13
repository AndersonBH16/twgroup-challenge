<div class="modal fade" id="crearReservaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="staticBackdropLabel">Crear Sala Coworker</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="crearSalaForm" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Sala:</label>
                            <input type="text" class="form-control" id="nombre" name="name" required placeholder="Ingrese el nombre de la sala">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción: </label>
                            <textarea class="form-control" id="descripcion" name="description" rows="3" placeholder="Ingrese una descripción de la sala"></textarea>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <div class="col-md-6 d-flex align-items-center">
                                <label for="capacidad" class="form-label me-2 mb-0">Capacidad: </label>
                                <input type="number" class="form-control" id="capacidad" name="capacity" required placeholder="Capacidad de la sala" min="1">
                            </div>
                            <div class="col-md-6">
                                <label for="estado" class="form-label mb-0">Estado:</label>
                                <span class="text-success">Disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center" id="loading-spinner" style="display: none;">
                        <div class="spinner-border text-info" role="status">
                            <span class="sr-only">Cargando...</span>
                        </div>
                    </div>
                    <label class="mr-4">Espere un momento</label>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-info">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
