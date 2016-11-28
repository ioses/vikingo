/**
 * @author D681892
 */


$(document).ready(function() {
    
    porcentaje = 0;

	init();
    
    
    CargarDatosHospital(document.getElementById("inicio").value, document.getElementById("fin").value);

    CargarDatosTotalInicial(document.getElementById("inicio").value, document.getElementById("fin").value);
    
    
    CargarDatosTotalOncologia(document.getElementById("inicio").value, document.getElementById("fin").value);
    
   CargarDatosTotalCirugiaTabla(document.getElementById("inicio").value, document.getElementById("fin").value);
    
    CargarDatosTotalCirugiaCarac(document.getElementById("inicio").value, document.getElementById("fin").value);
    
    CargarDatosTotalCirugiaCompl(document.getElementById("inicio").value, document.getElementById("fin").value);
    
    CargarDatosTotalAnatPatol(document.getElementById("inicio").value, document.getElementById("fin").value);
    
    CargarDatosTotalSeguimiento(document.getElementById("inicio").value, document.getElementById("fin").value);
    
    
});


var porcentaje;

function CargarDatosHospital(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);

            /******* Radiología *******/
            $("#R_H_rm_eco").val(data["R_H_rm_eco"]);
            $("#R_H_rm").val(data["R_H_rm"]);
            $("#R_H_eco").val(data["R_H_eco"]);
            $("#R_H_no").val(data["R_H_no"]);
            $("#R_H_tac").val(data["R_H_tac"]);
            $("#R_H_dist_integ_libre").val(data["R_H_dist_integ_libre"]);
            $("#R_H_dist_integ_afecto").val(data["R_H_dist_integ_afecto"]);
            $("#R_H_dist_integ_nodatos").val(data["R_H_dist_integ_nodatos"]);

            /******* Oncología *******/
            $("#O_H_neo").val(data["O_H_neo"]);
            $("#O_H_neo_III").val(data["O_H_neo_III"]);
            $("#O_H_neo_T4").val(data["O_H_neo_T4"]);
            $("#O_H_ady").val(data["O_H_ady"]);
            $("#O_H_ady_I").val(data["O_H_ady_I"]);
            $("#O_H_ady_II").val(data["O_H_ady_II"]);
            $("#O_H_ady_III").val(data["O_H_ady_III"]);
            $("#O_H_ady_IV").val(data["O_H_ady_IV"]);

            /******* Cirugía *******/
            $("#C_H_tec_1").val(data["C_H_tec_1"]);
            $("#C_H_tec_23").val(data["C_H_tec_23"]);
            //$("#C_H_tec_2").val(data["C_H_tec_2"]);
            //$("#C_H_tec_3").val(data["C_H_tec_3"]);
            $("#C_H_tec_410").val(data["C_H_tec_410"]);
            $("#C_H_tec_4").val(data["C_H_tec_4"]);
            $("#C_H_tec_10").val(data["C_H_tec_10"]);
            $("#C_H_tec_5").val(data["C_H_tec_5"]);
            $("#C_H_tec_6").val(data["C_H_tec_6"]);
            $("#C_H_tec_7").val(data["C_H_tec_7"]);
            $("#C_H_tec_9").val(data["C_H_tec_9"]);
            $("#C_H_tec_8").val(data["C_H_tec_8"]);

            $("#C_H_meso_parcial").val(data["C_H_meso_parcial"]);
            $("#C_H_meso_total").val(data["C_H_meso_total"]);
            //$("#C_H_meso_no").val(data["C_H_meso_no"]);

            //$("#C_H_tumor_inf_parcial").val(data["C_H_tumor_inf_parcial"]);
            //$("#C_H_tumor_inf_total").val(data["C_H_tumor_inf_total"]);
            //$("#C_H_tumor_inf_no").val(data["C_H_tumor_inf_no"]);

            $("#C_H_via_lapar").val(data["C_H_via_lapar"]);
            $("#C_H_via_lapar_conv").val(data["C_H_via_lapar_conv"]);
            $("#C_H_via_abierta").val(data["C_H_via_abierta"]);

			$("#C_H_perf_tumor_alta").val(data["C_H_perf_tumor_alta"]);
            //$("#C_H_perf_tumor_alta").val((data["C_H_perf_tumor_alta"] + data["C_H_perf_tumor_baja"]) / 2);
            //$("#C_H_perf_tumor_baja").val(data["C_H_perf_tumor_baja"]);
            $("#C_H_perf_tumor_amp_abd").val(data["C_H_perf_tumor_amp_abd"]);
            $("#C_H_perf_tumor_proc").val(data["C_H_perf_tumor_proc"]);
            $("#C_H_perf_tumor_hart").val(data["C_H_perf_tumor_hart"]);
            $("#C_H_perf_tumor_total").val(data["C_H_perf_tumor_total"]);

            $("#C_H_int_curativa").val(data["C_H_int_curativa"]);
            $("#C_H_int_paliativa").val(data["C_H_int_paliativa"]);
            $("#C_H_int_no").val(data["C_H_int_no"]);

            $("#C_H_estoma_deriva").val(data["C_H_estoma_deriva"]);

            $("#C_H_mortalidad").val(data["C_H_mortalidad"]);

            $("#C_H_comp_herida").val(data["C_H_comp_herida"]);
            $("#C_H_comp_perine").val(data["C_H_comp_perine"]);
            $("#C_H_comp_anast").val(data["C_H_comp_anast"]);
            $("#C_H_comp_abd").val(data["C_H_comp_abd"]);
            $("#C_H_comp_reint").val(data["C_H_comp_reint"]);

            /******* Anatomía patológica *******/
            $("#AP_H_estadio_0").val(data["AP_H_estadio_0"]);
            $("#AP_H_estadio_I").val(data["AP_H_estadio_I"]);
            $("#AP_H_estadio_II").val(data["AP_H_estadio_II"]);
            $("#AP_H_estadio_III").val(data["AP_H_estadio_III"]);
            $("#AP_H_estadio_IV").val(data["AP_H_estadio_IV"]);

            $("#AP_H_gang_aisl_min").val(data["AP_H_gang_aisl_min"]);
            $("#AP_H_gang_aisl_med").val(data["AP_H_gang_aisl_med"]);
            $("#AP_H_gang_aisl_max").val(data["AP_H_gang_aisl_max"]);

            $("#AP_H_gang_afec_min").val(data["AP_H_gang_afec_min"]);
            $("#AP_H_gang_afec_med").val(data["AP_H_gang_afec_med"]);
            $("#AP_H_gang_afec_max").val(data["AP_H_gang_afec_max"]);

            $("#AP_H_circun_afecto").val(data["AP_H_circun_afecto"]);
            $("#AP_H_circun_libre").val(data["AP_H_circun_libre"]);

            $("#AP_H_distal_afecto").val(data["AP_H_distal_afecto"]);
            $("#AP_H_distal_libre").val(data["AP_H_distal_libre"]);

            $("#AP_H_resec_R0").val(data["AP_H_resec_R0"]);
            $("#AP_H_resec_R1").val(data["AP_H_resec_R1"]);
            $("#AP_H_resec_R2").val(data["AP_H_resec_R2"]);

            $("#AP_H_regre_GR0").val(data["AP_H_regre_GR0"]);
            $("#AP_H_regre_GR1").val(data["AP_H_regre_GR1"]);
            $("#AP_H_regre_GR2").val(data["AP_H_regre_GR2"]);
            $("#AP_H_regre_GR3").val(data["AP_H_regre_GR3"]);
            $("#AP_H_regre_GR4").val(data["AP_H_regre_GR4"]);

            $("#AP_H_cal_mesorre_satisf").val(data["AP_H_cal_mesorre_satisf"]);
            $("#AP_H_cal_mesorre_parc_satisf").val(data["AP_H_cal_mesorre_parc_satisf"]);
            $("#AP_H_cal_mesorre_insatisf").val(data["AP_H_cal_mesorre_insatisf"]);

            /******* Seguimiento *******/
            $("#S_H_rec_local").val(data["S_H_rec_local"]);
            $("#S_H_rec_sistematica").val(data["S_H_rec_sistematica"]);
            $("#S_H_rec_local_sistematica").val(data["S_H_rec_local_sistematica"]);

            $("#S_H_estado_vivo").val(data["S_H_estado_vivo"]);
            $("#S_H_estado_muerto").val(data["S_H_estado_muerto"]);

            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            cambiarBarraestado();
        }
    }

    xmlhttp.open("GET", "getDatosInformesHospital.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}

function CargarDatosTotalInicial(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);

            /******* Radiología *******/
            $("#R_T_rm_eco").val(data["R_T_rm_eco"]);
            $("#R_T_rm").val(data["R_T_rm"]);
            $("#R_T_eco").val(data["R_T_eco"]);
            $("#R_T_no").val(data["R_T_no"]);
            $("#R_T_tac").val(data["R_T_tac"]);
            $("#R_T_dist_integ_libre").val(data["R_T_dist_integ_libre"]);
            $("#R_T_dist_integ_afecto").val(data["R_T_dist_integ_afecto"]);
            $("#R_T_dist_integ_nodatos").val(data["R_T_dist_integ_nodatos"]);
                
                
            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            cambiarBarraestado();
        }
    }

    xmlhttp.open("GET", "getDatosInformesTotalInicial.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}

function CargarDatosTotalOncologia(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);

            /******* Oncología *******/
            $("#O_T_neo").val(data["O_T_neo"]);
            $("#O_T_neo_III").val(data["O_T_neo_III"]);
            $("#O_T_neo_T4").val(data["O_T_neo_T4"]);
            $("#O_T_ady").val(data["O_T_ady"]);
            $("#O_T_ady_I").val(data["O_T_ady_I"]);
            $("#O_T_ady_II").val(data["O_T_ady_II"]);
            $("#O_T_ady_III").val(data["O_T_ady_III"]);
            $("#O_T_ady_IV").val(data["O_T_ady_IV"]);
            
            
            
            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            
            cambiarBarraestado();
        }
    }

    xmlhttp.open("GET", "getDatosInformesTotalOncologia.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}


function CargarDatosTotalCirugiaTabla(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);

            
            /******* Cirugía *******/
            $("#C_T_tec_1").val(data["C_T_tec_1"]);
            $("#C_T_tec_23").val(data["C_T_tec_23"]);
            //$("#C_T_tec_2").val(data["C_T_tec_2"]);
            //$("#C_T_tec_3").val(data["C_T_tec_3"]);
            $("#C_T_tec_410").val(data["C_T_tec_410"]);
            $("#C_T_tec_4").val(data["C_T_tec_4"]);
            $("#C_T_tec_10").val(data["C_T_tec_10"]);
            $("#C_T_tec_5").val(data["C_T_tec_5"]);
            $("#C_T_tec_6").val(data["C_T_tec_6"]);
            $("#C_T_tec_7").val(data["C_T_tec_7"]);
            $("#C_T_tec_9").val(data["C_T_tec_9"]);
            $("#C_T_tec_8").val(data["C_T_tec_8"]);

            $("#C_T_meso_parcial").val(data["C_T_meso_parcial"]);
            $("#C_T_meso_total").val(data["C_T_meso_total"]);
            //$("#C_T_meso_no").val(data["C_T_meso_no"]);

            //$("#C_T_tumor_inf_parcial").val(data["C_T_tumor_inf_parcial"]);
            //$("#C_T_tumor_inf_total").val(data["C_T_tumor_inf_total"]);
            //$("#C_T_tumor_inf_no").val(data["C_T_tumor_inf_no"]);

            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            
            cambiarBarraestado();
        }
    }

    xmlhttp.open("GET", "getDatosInformesTotalCirugiaTabla.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}


function CargarDatosTotalCirugiaCarac(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);

            
            /******* Cirugía *******/

            $("#C_T_via_lapar").val(data["C_T_via_lapar"]);
            $("#C_T_via_lapar_conv").val(data["C_T_via_lapar_conv"]);
            $("#C_T_via_abierta").val(data["C_T_via_abierta"]);
			
            $("#C_T_perf_tumor_alta").val(data["C_T_perf_tumor_alta"]);
            //$("#C_T_perf_tumor_baja").val(data["C_T_perf_tumor_baja"]);
            $("#C_T_perf_tumor_amp_abd").val(data["C_T_perf_tumor_amp_abd"]);
            $("#C_T_perf_tumor_proc").val(data["C_T_perf_tumor_proc"]);
            $("#C_T_perf_tumor_hart").val(data["C_T_perf_tumor_hart"]);
            $("#C_T_perf_tumor_total").val(data["C_T_perf_tumor_total"]);

            $("#C_T_int_curativa").val(data["C_T_int_curativa"]);
            $("#C_T_int_paliativa").val(data["C_T_int_paliativa"]);
            $("#C_T_int_no").val(data["C_T_int_no"]);

            $("#C_T_estoma_deriva").val(data["C_T_estoma_deriva"]);

            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            cambiarBarraestado();
        }
    }

    xmlhttp.open("GET", "getDatosInformesTotalCirugiaCarac.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}


function CargarDatosTotalCirugiaCompl(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);

            
            /******* Cirugía *******/

            $("#C_T_mortalidad").val(data["C_T_mortalidad"]);

            $("#C_T_comp_herida").val(data["C_T_comp_herida"]);
            $("#C_T_comp_perine").val(data["C_T_comp_perine"]);
            $("#C_T_comp_anast").val(data["C_T_comp_anast"]);
            $("#C_T_comp_abd").val(data["C_T_comp_abd"]);
            $("#C_T_comp_reint").val(data["C_T_comp_reint"]);

            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            
            cambiarBarraestado();
        }
    }

    xmlhttp.open("GET", "getDatosInformesTotalCirugiaCompl.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}


function CargarDatosTotalAnatPatol(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);

            /******* Anatomía patológica *******/
            $("#AP_T_estadio_0").val(data["AP_T_estadio_0"]);
            $("#AP_T_estadio_I").val(data["AP_T_estadio_I"]);
            $("#AP_T_estadio_II").val(data["AP_T_estadio_II"]);
            $("#AP_T_estadio_III").val(data["AP_T_estadio_III"]);
            $("#AP_T_estadio_IV").val(data["AP_T_estadio_IV"]);

            $("#AP_T_gang_aisl_min").val(data["AP_T_gang_aisl_min"]);
            $("#AP_T_gang_aisl_med").val(data["AP_T_gang_aisl_med"]);
            $("#AP_T_gang_aisl_max").val(data["AP_T_gang_aisl_max"]);

            $("#AP_T_gang_afec_min").val(data["AP_T_gang_afec_min"]);
            $("#AP_T_gang_afec_med").val(data["AP_T_gang_afec_med"]);
            $("#AP_T_gang_afec_max").val(data["AP_T_gang_afec_max"]);

            $("#AP_T_circun_afecto").val(data["AP_T_circun_afecto"]);
            $("#AP_T_circun_libre").val(data["AP_T_circun_libre"]);

            $("#AP_T_distal_afecto").val(data["AP_T_distal_afecto"]);
            $("#AP_T_distal_libre").val(data["AP_T_distal_libre"]);

            $("#AP_T_resec_R0").val(data["AP_T_resec_R0"]);
            $("#AP_T_resec_R1").val(data["AP_T_resec_R1"]);
            $("#AP_T_resec_R2").val(data["AP_T_resec_R2"]);

            $("#AP_T_regre_GR0").val(data["AP_T_regre_GR0"]);
            $("#AP_T_regre_GR1").val(data["AP_T_regre_GR1"]);
            $("#AP_T_regre_GR2").val(data["AP_T_regre_GR2"]);
            $("#AP_T_regre_GR3").val(data["AP_T_regre_GR3"]);
            $("#AP_T_regre_GR4").val(data["AP_T_regre_GR4"]);

            $("#AP_T_cal_mesorre_satisf").val(data["AP_T_cal_mesorre_satisf"]);
            $("#AP_T_cal_mesorre_parc_satisf").val(data["AP_T_cal_mesorre_parc_satisf"]);
            $("#AP_T_cal_mesorre_insatisf").val(data["AP_T_cal_mesorre_insatisf"]);
            
            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            
            cambiarBarraestado();

        }
    }

    xmlhttp.open("GET", "getDatosInformesTotalAnatPatol.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}

function CargarDatosTotalSeguimiento(fecha_inicio, fecha_fin) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var data = JSON.parse(xmlhttp.responseText);


            /******* Seguimiento *******/
            $("#S_T_rec_local").val(data["S_T_rec_local"]);
            $("#S_T_rec_sistematica").val(data["S_T_rec_sistematica"]);
            $("#S_T_rec_local_sistematica").val(data["S_T_rec_local_sistematica"]);

            $("#S_T_estado_vivo").val(data["S_T_estado_vivo"]);
            $("#S_T_estado_muerto").val(data["S_T_estado_muerto"]);
            
            //porcentaje = porcentaje + (100/9);
            //$('#barra').css('width', (porcentaje) + '%');
            
            cambiarBarraestado();
            
        }
    }

    xmlhttp.open("GET", "getDatosInformesTotalSeguimiento.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
    xmlhttp.send();
}



function cambiarBarraestado()
{
    porcentaje = porcentaje + (100/9);
    $('#barra').css('width', (porcentaje) + '%');
    
    if (porcentaje > 98 )
   {
      $('#barra').hide();
       document.getElementById("buttonDescargar").disabled = false;
       //document.getElementById("cargarndoDatos").style.visibility = 'hidden'; 
       document.getElementById("barra").style.visibility = 'hidden';
       document.getElementById("cargarndoDatos").value = 'Cargado';
       $('#cargarndoDatos').text('Cargado');  
  
   }  
    
    
}


function gup(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.href);
    if (results == null)
        return "";
    else
        return results[1];
}

function init() {
    var srcs = gup("unit").split(',');
    for (var i = 0, l = srcs.length; i < l; i++) {
        var sel = document.createElement("script");
        sel.type = "text/javascript";
        sel.src = "diagrama_general.js";
		//sel.src = "diagrama_generalTodos.js";
        document.getElementsByTagName("head").item(0).appendChild(sel);
    }
 
    
    
    //porcentaje = porcentaje + (100/9);
    //$('#barra').css('width', (porcentaje) + '%');
    
    cambiarBarraestado();
}


function dimension(w, h, lugar) {
    var world = document.getElementById(lugar);
    world.style.width = w + 'px';
    world.style.height = h + 'px';
}

