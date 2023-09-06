
//Si el formulario se completa correctamente, se muestra un cuadro de confirmación.
function registrar() {
  const form = document.getElementById('registroForm');
  if (form.checkValidity()) {
    mostrarModal();
    form.reset();
  } else {
    form.reportValidity();
  }
}

function mostrarModal() {
  const overlay = document.getElementById('modalOverlay');
  overlay.style.display = 'flex';
}

function cerrarModal() {
  const overlay = document.getElementById('modalOverlay');
  overlay.style.display = 'none';
}

function aceptarRedireccion() {
  cerrarModal();
  window.location.href = "index6.html";
}


//ventana de cerrar sesion 
function confirmarCerrarSesion() {
  if (confirm("¿Estás seguro de cerrar sesión?")) {

    window.location.href = "../cerrar sesion/index.html";
  }
}

function irAlInicio() {
  window.location.href = "../index.html";
}

