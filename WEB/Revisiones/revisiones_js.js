/**
 * @author D681892
 */
   
$(document).ready(function() {
    //Carga los NHC-s de los paciente
    $("#BuscaNHC").autocomplete({
        source : 'BuscaPaciente/get_lista_NHC.php',
        select : function(event, ui) {
            $("#FechaRevision").val(ui.item.FechaRevision);
        }
    });
}); 
