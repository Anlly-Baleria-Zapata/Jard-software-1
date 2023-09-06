


//eliminar y editar registros de la tabla depreciacion
function confirmDelete(element) {
  if (confirm('¿Desea eliminar el registro?')) {
    const row = element.closest('tr');
    row.remove();
  }
}

function enableEdit(element) {
  const row = element.closest('tr');
  const cells = row.getElementsByTagName('td');
  for (let i = 0; i < cells.length - 1; i++) {
    const cell = cells[i];
    const content = cell.textContent;
    cell.innerHTML = `<input type="text" value="${content}" />`;
  }

  const saveBtn = document.createElement('button');
  saveBtn.textContent = 'Guardar';
  saveBtn.onclick = function () {
    saveChanges(row);
  };

  row.querySelector('.edit').replaceWith(saveBtn);
}

function saveChanges(row) {
  const inputs = row.getElementsByTagName('input');
  for (let i = 0; i < inputs.length; i++) {
    const input = inputs[i];
    const content = input.value;
    const cell = input.parentElement;
    cell.textContent = content;
  }

  const editBtn = document.createElement('span');
  editBtn.className = 'edit';
  editBtn.innerHTML = '✏️';
  editBtn.onclick = function () {
    enableEdit(this);
  };

  row.querySelector('button').replaceWith(editBtn);
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



