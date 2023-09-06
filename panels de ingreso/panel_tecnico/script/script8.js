
//añadir registros en la tabla depreciacion
document.addEventListener('DOMContentLoaded', function () {
  const btnAgregar = document.getElementById('btnAgregar');
  const tableBody = document.getElementById('tableBody2');

  btnAgregar.addEventListener('click', function () {
    const nuevaFila = document.createElement('tr');
    const celdasEncabezado = document.querySelectorAll('thead th');

    for (let i = 0; i < celdasEncabezado.length; i++) {
      const nuevaCelda = document.createElement('td');
      if (i === 0) {
        nuevaCelda.textContent = 'Nuevo ID';
      } else if (i === 1) {
        nuevaCelda.textContent = 'Nuevo Costo';
      } else if (i === 2) {
        nuevaCelda.textContent = 'Nuevo Valor';
      } else if (i === 3) {
        nuevaCelda.textContent = 'Nuevas Unidades';
      } else {
        nuevaCelda.textContent = `Nuevo Resultado`;
      }
      nuevaFila.appendChild(nuevaCelda);
    }

    const accionesCelda = document.createElement('td');
    const deleteSpan = document.createElement('span');
    deleteSpan.className = 'delete';
    deleteSpan.textContent = '🗑️';
    deleteSpan.onclick = function () {
      confirmDelete(this);
    };
    accionesCelda.appendChild(deleteSpan);

    const editSpan = document.createElement('span');
    editSpan.className = 'edit';
    editSpan.textContent = '✏️';
    editSpan.onclick = function () {
      enableEdit(this);
    };
    accionesCelda.appendChild(editSpan);

    nuevaFila.appendChild(accionesCelda);
    tableBody.appendChild(nuevaFila);
  });
});



//buscar registros en la tabla depreciacion 
const searchInput2 = document.getElementById('searchInput2');
const tableBody2 = document.getElementById('tableBody2');

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



//ventana de cerrar sesion 
function confirmarCerrarSesion() {
  if (confirm("¿Estás seguro de cerrar sesión?")) {

    window.location.href = "../cerrar sesion/index.html";
  }
}

function irAlInicio() {
  window.location.href = "../index.html";
}


