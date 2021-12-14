/*<!--=====================================
ELIMINAR residente
======================================-->*/
$(document).on("click", ".btnEliminarResidente", function () {
    var idUsuario = $(this).attr("idResidenteelim");
    Swal.fire({
        title: '¿Esta seguro de eliminarlo?',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: "#d33",
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Eliminar!'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=Residentes&idResidenteelim=" + idUsuario;
        }
    })
})