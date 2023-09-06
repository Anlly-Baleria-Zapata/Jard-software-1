//Descargar informe
function descargarInforme() {
  alert("El informe se ha descargado correctamente.");
}


//busqueda de registros 
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');
  const recordsTable = document.getElementById('recordsTable');

  const records = [
    { "num hoja de vida equipo": 1, "ID de la hoja de vida del equipo": 123, "Nombre del SO": "Windows 10", "Nombre del sistema": "Sistema ABC", "Modelo del sistema": "Modelo XYZ", "Precauciones de utilización": "Usar guantes protectores", "Personas responsables": "John Doe", "Observaciones generales": "Ninguna observación", "Mantenimiento asignado": "Mantenimiento A", "Reparación asignada": "Reparación B" },
    { "num hoja de vida equipo": 2, "ID de la hoja de vida del equipo": 456, "Nombre del SO": "Linux", "Nombre del sistema": "Sistema DEF", "Modelo del sistema": "Modelo PQR", "Precauciones de utilización": "Evitar exposición al agua", "Personas responsables": "Jane Smith", "Observaciones generales": "Requiere revisión", "Mantenimiento asignado": "Mantenimiento B", "Reparación asignada": "Reparación C" },
  ];

  function updateTable(filter) {
    const filteredRecords = records.filter(record => {
      return Object.values(record).some(value => {
        return value.toString().toLowerCase().includes(filter.toLowerCase());
      });
    });

    const tableHtml = filteredRecords.map(record => {
      return `
        <tr>
        <td>${record["num hoja de vida equipo"]}</td>
        <td>${record["ID de la hoja de vida del equipo"]}</td>
        <td>${record["Nombre del SO"]}</td>
        <td>${record["Nombre del sistema"]}</td>
        <td>${record["Modelo del sistema"]}</td>
        <td>${record["Precauciones de utilización"]}</td>
        <td>${record["Personas responsables"]}</td>
        <td>${record["Observaciones generales"]}</td>
        <td>${record["Mantenimiento asignado"]}</td>
        <td>${record["Reparación asignada"]}</td>
        <td><span class="eliminar" onclick="eliminarRegistro(this)">🗑️</span></td>
        <td><span class="editar" onclick="editarRegistro(this)">✏️</span></td>
        <!-- Agrega las demás columnas aquí -->
      </tr>
        `;
    }).join('');

    recordsTable.innerHTML = `
      <tr>
      <th>num hoja de vida equipo</th>
      <th>ID de la hoja de vida del equipo</th>
      <th>Nombre del SO</th>
      <th>Nombre del sistema</th>
      <th>Modelo del sistema</th>
      <th>Precauciones de utilización</th>
      <th>Personas responsables</th>
      <th>Observaciones generales</th>
      <th>Mantenimiento asignado</th>
      <th>Reparación asignada</th>
      <!-- Agrega los encabezados de las demás columnas aquí -->
    </tr>
        ${tableHtml}
      `;
  }

  searchInput.addEventListener('input', function () {
    const filter = this.value.trim();
    updateTable(filter);
  });

  updateTable('');
});


//eliminar registros y editarlos directamente en una tabla HTML
function eliminarRegistro(icon) {
  const row = icon.parentNode.parentNode;
  const confirmacion = confirm("¿Desea eliminar el registro?");
  if (confirmacion) {
    row.parentNode.removeChild(row);
  }
}

function editarRegistro(icon) {
  const row = icon.parentNode.parentNode;
  const cells = row.getElementsByTagName('td');

  for (let i = 0; i < cells.length - 2; i++) {
    const cellContent = cells[i].textContent;
    const input = document.createElement('input');
    input.value = cellContent;
    cells[i].innerHTML = '';
    cells[i].appendChild(input);
  }

  const guardarBtn = document.createElement('span');
  guardarBtn.textContent = 'Guardar';
  guardarBtn.className = 'guardar';
  guardarBtn.onclick = function () {
    guardarCambios(row);
  };
  cells[cells.length - 2].innerHTML = '';
  cells[cells.length - 2].appendChild(guardarBtn);
}

function guardarCambios(row) {
  const cells = row.getElementsByTagName('td');
  for (let i = 0; i < cells.length - 2; i++) {
    const input = cells[i].getElementsByTagName('input')[0];
    const inputValue = input.value;
    cells[i].innerHTML = inputValue;
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


