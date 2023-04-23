// Get the modal
var modal = document.getElementById("id01");
var modal = document.getElementById("id02");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

//Funcion para cuando se le de clic al formulario eliminar
function idCategoria(clase, categoria, id) {
  var elemento = document.getElementsByClassName("delCat");
  document.getElementById("idCatDel").value = id;

  for (let index = 0; index < elemento.length; index++) {
    elemento[index].innerText = categoria;
  }
}

//Funcion para que se le de click al formulario eliminar
function editar(elemnt, categoria, categoriaSup, descripcion, imagen) {
  alert();
}
