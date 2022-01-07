$(document).ready(function () {

    $('#forme').submit(function (e) {

        //detengo el envio del formulario
        e.preventDefault();

        Swal.fire({
            title: '¿Estas seguro de eliminar el producto?',
            text: "La producto se eliminara definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

});