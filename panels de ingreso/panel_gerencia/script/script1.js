

function redirectToIndex() {
  window.location.href = "../hoja de vida eq/index.php";
}



// capturar el formulario nitform
document.getElementById("nitForm").addEventListener("submit", function (event) {
  event.preventDefault();


  $('#successModal').modal('show');
});

