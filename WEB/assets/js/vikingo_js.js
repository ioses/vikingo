

function abrir(URL) {
    //document.location.href="primero2.html";
    window.open(URL, target = "_self");
}


function goBack()
  {
  window.history.back();
  }
  
  
function disabledElement(idSelect) {
    document.getElementById(idSelect).disabled = true;
}

function enabledElement(idSelect) {
    document.getElementById(idSelect).disabled = false;
}


/*
 * Al elegir un item en el select, que ponga la opción en el radiobutton
 */

function putRadioButton(idSelect) {
    //alert($idSelect);
    document.getElementById(idSelect).checked = true;

}

function putCheckBox(idSelect) {
    document.getElementById(idSelect).checked = true;

}

function removeCheckBox(idSelect) {
    document.getElementById(idSelect).checked = false;

}


