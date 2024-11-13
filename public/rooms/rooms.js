$(document).ready(function() {
    $('#crearSalaForm').on('submit', function(e) {
        e.preventDefault();

        $('button').prop('disabled', true);
        $('#loading-spinner').show();

        $.ajax({
            url: "/crear-sala",
            method: "POST",
            data: $(this).serialize(),
            success: function(response, xhr) {
                if(xhr === "success"){
                    $('#loading-spinner').hide();
                    $('button').prop('disabled', false);

                    toastr.success("Sala creada con éxito");
                    $('#crearSala').modal('hide');
                    $('#crearSalaForm')[0].reset();
                    $('#rooms-container').prepend(response.roomCardHtml);
                }
            },
            error: function(xhr) {
                $('#loading-spinner').hide();
                $('button').prop('disabled', false);

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, error) {
                        toastr.error(error[0]);
                    });
                } else {
                    toastr.error("Error al crear la sala");
                }
            }
        });
    });
});

