$(document).ready(function() {
    $('#crearSalaForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "/crear-sala",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                toastr.success("Sala creada con éxito");
                $('#crearSala').modal('hide');
                $('#crearSalaForm')[0].reset();

                addRoomCard(response);
            },
            error: function(xhr) {
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

    const addRoomCard = (room) => {
        const roomCardHtml = `
                <div class="col-md-4 room-card" data-room-id="${room.id}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${room.name}<span>&nbsp;<b>${room.state}</b></span></h5>
                            <p class="card-text"><strong>Capacidad:</strong> ${room.capacity}</p>
                            <p class="card-text"><strong>Descripción:</strong> ${room.description}</p>
                        </div>
                    </div>
                </div>
            `;

        $('#rooms-container').prepend(roomCardHtml);
    };
});

