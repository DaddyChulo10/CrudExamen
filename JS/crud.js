$(document).ready(function () {
    consultarTabla()
});

function agregarTabla() {
    var nombre = $("#nombre").val();
    var tipo = $("#tipo").val();
    var edad = $("#edad").val();
    var enfermedades = $("#enfermedades").val();
    var agregar = 'agregar'
    if (nombre == '' || tipo == '' || edad == '' || enfermedades == '') {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Por favor llene todos los campos!',

        })
    } else {
        $.ajax({
            url: 'global/crud/crud.php',
            method: 'POST',
            data: {
                nombre: nombre,
                tipo: tipo,
                edad: edad,
                enfermedades: enfermedades,
                agregar: agregar,
            },
            success: function (r) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Mascota agregado con exito!',
                    showConfirmButton: false,
                    timer: 1500
                })
                consultarTabla();
                $("#nombre").val('');
                $("#tipo").val('');
                $("#edad").val('');
                $("#enfermedades").val('');
            }
        });
    }
}

function consultarTabla() {
    $.ajax({
        url: 'global/crud/crud.php',
        method: 'POST',
        data: {
            consultar: 'consultar'
        },
        success: function (r) {
            $("#tabla").html(r);
        }
    });
}

function eliminarTabla(id) {
    Swal.fire({
        title: 'Seguro que desea eliminar?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'global/crud/crud.php',
                method: 'POST',
                data: {
                    eliminar: 'eliminar',
                    id: id
                },
                success: function (r) {
                    consultarTabla()
                }
            });
        }
    })
}

function modal(id, nombre, tipo, edad, enfermedades) {
    $('#editar').modal('show');
    $("#e_id").val(id);
    $("#e_nombre").val(nombre);
    $("#e_tipo").val(tipo);
    $("#e_edad").val(edad);
    $("#e_enfermedades").val(enfermedades);
}

function editarTabla() {
    var id = $("#e_id").val();
    var nombre = $("#e_nombre").val();
    var tipo = $("#e_tipo").val();
    var edad = $("#e_edad").val();
    var enfermedades = $("#e_enfermedades").val();
    var editar = 'editar'

    if (nombre == '' || tipo == '' || edad == '' || enfermedades == '') {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Por favor llene todos los campos!',
        })
    } else {
        $.ajax({
            url: 'global/crud/crud.php',
            method: 'POST',
            data: {
                id: id,
                nombre: nombre,
                tipo: tipo,
                edad: edad,
                enfermedades: enfermedades,
                editar: editar,
            },
            success: function (r) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Mascota editado con exito!',
                    showConfirmButton: false,
                    timer: 1500
                })
                consultarTabla();
                $("#editar").modal('hide');
            }
        });
    }
}