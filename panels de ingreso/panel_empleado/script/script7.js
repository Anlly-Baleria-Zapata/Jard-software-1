
//buscar registros en la tabla ubicacion 
const searchInput1 = document.getElementById('searchInput1');
const tableBody1 = document.getElementById('tableBody1');
const searchInput2 = document.getElementById('searchInput2');
const tableBody2 = document.getElementById('tableBody2');

searchInput1.addEventListener('input', function () {
  const searchTerm = searchInput1.value.toLowerCase();
  filterTable(tableBody1, searchTerm);
});

searchInput2.addEventListener('input', function () {
  const searchTerm = searchInput2.value.toLowerCase();
  filterTable(tableBody2, searchTerm);
});

function filterTable(tableBody, searchTerm) {
  const rows = tableBody.getElementsByTagName('tr');
  for (const row of rows) {
    const rowData = Array.from(row.getElementsByTagName('td')).map(cell => cell.textContent.toLowerCase());
    if (rowData.some(data => data.includes(searchTerm))) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  }
}



//eliminar y editar registro de ubicacion
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


