$(document).ready(function() {
    $('#fecha').datetimepicker({
        format: 'DD - MM - YYYY',
        locale: 'es',
        autoclose: true,
        icons: { close: 'fa fa-times' }
    });

    $('#hora').datetimepicker({
        format: 'LT',
        locale: 'es',
        autoclose: true,
        icons: { close: 'fa fa-times' }
    });

    $('#clearFecha').on('click', function() {
        $('#fecha').datetimepicker('clear');
    });

    $('#clearHora').on('click', function() {
        $('#hora').datetimepicker('clear');
    });

    $('.btn-reservar').on('click', function() {
        const roomId = $(this).data('room-id');
        $('#roomIdInput').val(roomId);
        $('#crearReservaModal').modal('show');
    });

    $('#crearReservaForm').on('submit', function(e) {
        e.preventDefault();

        $('button').prop('disabled', true);
        $('#loading-spinner').show();

        $.ajax({
            url: '/crear-reserva',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#loading-spinner').hide();
                $('#crearReservaForm :input').prop('disabled', false);

                toastr.success("Reserva creada con éxito");
                $('#crearReservaModal').modal('hide');
                $('#crearReservaForm')[0].reset();

                $(`.room-card[data-room-id="${response.room_id}"] .room-state`)
                    .text('reservado')
                    .removeClass('text-success')
                    .addClass('text-danger');
            },
            error: function(xhr) {
                $('#loading-spinner').hide();
                $('#crearReservaForm :input').prop('disabled', false);

                if (xhr.status === 422) {
                    $.each(xhr.responseJSON.errors, function(key, error) {
                        toastr.error(error[0]);
                    });
                } else if (xhr.status === 409) {
                    toastr.error(xhr.responseJSON.error);
                } else {
                    toastr.error("Error al crear la reserva");
                }
            }
        });
    });
});
