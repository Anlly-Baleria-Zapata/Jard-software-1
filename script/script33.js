
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


  
  
