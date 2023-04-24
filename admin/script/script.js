// Get the modal
var modal1 = document.getElementById("id01");
var modal2 = document.getElementById("id02");
var modal3 = document.getElementById("id03");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
  if (event.target == modal3) {
    modal3.style.display = "none";
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

//Funcion para cuando se le de clic al formulario eliminar
function editarCategoria(clase, categoria, categoriaPadre,img,descripcion,id) {

    document.getElementById("editCat").innerHTML = categoria;
    // Establecer el valor de la categoría y la categoría padre en el formulario de edición
    document.getElementById("catEdit").value = categoria;
    document.getElementById("catPadreEdit").value = categoriaPadre;

    // Disparar el evento 'change' en el elemento 'select' para que se actualice la opción seleccionada
    var event = new Event('change');
    document.getElementById("catPadreEdit").dispatchEvent(event);
    document.getElementById("imgCatEditSRC").src = img;

    document.getElementById("descEdit").value = descripcion;

    document.getElementById("idEdit").value= id;
}
