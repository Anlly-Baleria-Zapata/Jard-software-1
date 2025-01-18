

  //ventana de cerrar sesion 
  function confirmarCerrarSesion() {
    if (confirm("¿Estás seguro de cerrar sesión?")) {
  
      window.location.href = "../cerrar sesion/index.html";
    }
  }
  
  function irAlInicio() {
    window.location.href = "../index.html";
  }
  
//Barra de busqueda
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

  
// botones notificar y ver registros
function toggleChatBox() {
    var chatBox = document.getElementById('chatBox');
    chatBox.style.display = chatBox.style.display === 'block' ? 'none' : 'block';
  }
  
  // Asignar evento al botón de notificación
  document.getElementById('notificarBtn').addEventListener('click', toggleChatBox);
  

  // Función para enviar un mensaje al chat
  function sendMessage() {
    var messageInput = document.getElementById('messageInput');
    var chatMessages = document.getElementById('chatMessages');
  
    if (messageInput.value.trim() !== '') {
      var message = document.createElement('div');
      message.className = 'message';
      message.textContent = messageInput.value;
      chatMessages.appendChild(message);
      messageInput.value = '';
    }
  }
  
  // Asignar eventos a los botones
  document.getElementById('notificarBtn').addEventListener('click', toggleChatBox);
  document.getElementById('sendMessageBtn').addEventListener('click', sendMessage);

