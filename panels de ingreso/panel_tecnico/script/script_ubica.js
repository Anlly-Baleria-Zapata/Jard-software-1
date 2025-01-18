
// barra de busqueda

    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("busqueda");
        const tabla = document.querySelector("table tbody");
        const filas = tabla.getElementsByTagName("tr");

        input.addEventListener("keyup", function() {
            const valorBusqueda = input.value.toLowerCase();

            for (let i = 0; i < filas.length; i++) {
                const fila = filas[i];
                const celdas = fila.getElementsByTagName("td");
                let mostrarFila = false;

                for (let j = 0; j < celdas.length; j++) {
                    const celda = celdas[j];

                    if (celda.textContent.toLowerCase().indexOf(valorBusqueda) > -1) {
                        mostrarFila = true;
                        break;
                    }
                }

                if (mostrarFila) {
                    fila.style.display = "";
                } else {
                    fila.style.display = "none";
                }
            }
        });
    });




//ventana de cerrar sesion 
function confirmarCerrarSesion() {
  if (confirm("¿Estás seguro de cerrar sesión?")) {

    window.location.href = "../cerrar sesion/index.html";
  }
}

function irAlInicio() {
  window.location.href = "../index.html";
}


