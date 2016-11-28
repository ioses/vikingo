dimension(800, 650, 'graphics');

var fecha_inicio=document.getElementById("inicio").value;
var fecha_fin=document.getElementById("fin").value;

var xmlhttp;

if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
} else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        var data = JSON.parse(xmlhttp.responseText);


        
        var org = Joint.dia.org;
        Joint.paper("graphics", 800, 650);
        
        var pacientes_operados_pos1_h = org.Member.create({
          rect: { x: 265, y: 70, width: 150, height: 60 },
          position: "Pacientes operados",
          name: "n = " + data["numero_pacientes_h"],
          attrs: { fill: '#e4d8a4', stroke: 'gray' }
        });
        
        var reseccion_local_pos2_h = org.Member.create({
          rect: { x: 50, y: 200, width: 150, height: 60 },
          position: "Resección Local (" + data["reseccion_local_pos2_p_h"] +  "%)",
          name: "n = " + data["reseccion_local_pos2_n_h"]
        });
        
        var reseccion_recto_pos2_h = org.Member.create({
          rect: { x: 260, y: 200, width: 150, height: 60 },
          position: "Resección de Recto (" + data["reseccion_recto_pos2_p_h"] +  "%)",
          name: "n = " + data["reseccion_recto_pos2_n_h"]
        });
        
        var no_resectivos_pos2_h = org.Member.create({
          rect: { x: 460, y: 200, width: 180, height: 60 },
          position: "Procedimientos no resectivos (" + data["no_resectivos_pos2_p_h"] +  "%)",
          name: "n = " + data["no_resectivos_pos2_n_h"]
        });
        
       
      
        var proctocolectomia_pos3_h = org.Member.create({
          rect: { x: 40, y: 350, width: 150, height: 60 },
          position: "Proctocolectomía (" + data["proctocolectomia_pos3_p_h"] +  "%)",
          name: "n = " + data["proctocolectomia_pos3_n_h"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        var exent_pelvica_pos3_h = org.Member.create({
          rect: { x: 40, y: 500, width: 150, height: 60 },
          position: "Exenteración pélvica  (" + data["exent_pelvica_pos3_p_h"] +  "%)",
          name: "n = " + data["exent_pelvica_pos3_n_h"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        var reseccion_curativa_pos3_h = org.Member.create({
          rect: { x: 260, y: 350, width: 150, height: 60 },
          position: "Resección curativa (" + data["res_curativa_pos3_p_h"] +  "%)",
          name: "n = " + data["res_curativa_pos3_n_h"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });        
        
        
        var reseccion_paliativa_pos3_h = org.Member.create({
          rect: { x: 460, y: 350, width: 150, height: 200 },
          position: "Resección paliativa (" + data["res_paliativa_pos3_p_h"] +  "%)",
          name: "n = " + data["res_paliativa_pos3_n_h"] + " \n M1 = " + data["res_paliativa_pos3_M1_h"] + " \n M0-R2 = " + data["res_paliativa_pos3_M0_R2_h"] + " \n No Res= " + data["res_paliativa_pos3_VACIA_h"] ,
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        
        pacientes_operados_pos1_h.joint(reseccion_local_pos2_h, org.arrow);
        pacientes_operados_pos1_h.joint(reseccion_recto_pos2_h, org.arrow);
        pacientes_operados_pos1_h.joint(no_resectivos_pos2_h, org.arrow);
        
        var a = [];
        a.push({x:225, y:320});
        a.push({x:225, y:380});
        
        var b = [];
        b.push({x:225, y:320});
        b.push({x:225, y:530});
         
        reseccion_recto_pos2_h.joint(reseccion_curativa_pos3_h, org.arrow);
        reseccion_recto_pos2_h.joint(proctocolectomia_pos3_h, org.arrow).setVertices(a);
        reseccion_recto_pos2_h.joint(exent_pelvica_pos3_h, org.arrow).setVertices(b);
        reseccion_recto_pos2_h.joint(reseccion_paliativa_pos3_h, org.arrow);
        
        
        
               
        var org_Todos = Joint.dia.org;
        Joint.paper("graphicsTodos", 800, 650);
        
        
        
         var pacientes_operados_pos1 = org_Todos.Member.create({
          rect: { x: 265, y: 70, width: 150, height: 60 },
          position: "Pacientes operados",
          name: "n = " + data["numero_pacientes_T"],
          attrs: { fill: '#e4d8a4', stroke: 'gray' }
        });
        
        var reseccion_local_pos2 = org_Todos.Member.create({
          rect: { x: 50, y: 200, width: 150, height: 60 },
          position: "Resección Local (" + data["reseccion_local_pos2_p_T"] +  "%)",
          name: "n = " + data["reseccion_local_pos2_n_T"]
        });
        
        var reseccion_recto_pos2 = org_Todos.Member.create({
          rect: { x: 260, y: 200, width: 150, height: 60 },
          position: "Resección de Recto (" + data["reseccion_recto_pos2_p_T"] +  "%)",
          name: "n = " + data["reseccion_recto_pos2_n_T"]
        });
        
        var no_resectivos_pos2 = org_Todos.Member.create({
          rect: { x: 460, y: 200, width: 180, height: 60 },
          position: "Procedimientos no resectivos (" + data["no_resectivos_pos2_p_T"] +  "%)",
          name: "n = " + data["no_resectivos_pos2_n_T"]
        });
        
       
      
        var proctocolectomia_pos3 = org_Todos.Member.create({
          rect: { x: 40, y: 350, width: 150, height: 60 },
          position: "Proctocolectomía (" + data["proctocolectomia_pos3_p_T"] +  "%)",
          name: "n = " + data["proctocolectomia_pos3_n_T"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        var exent_pelvica_pos3 = org_Todos.Member.create({
          rect: { x: 40, y: 500, width: 150, height: 60 },
          position: "Exenteración pélvica  (" + data["exent_pelvica_pos3_p_T"] +  "%)",
          name: "n = " + data["exent_pelvica_pos3_n_T"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        var reseccion_curativa_pos3 = org_Todos.Member.create({
          rect: { x: 260, y: 350, width: 150, height: 60 },
          position: "Resección curativa (" + data["res_curativa_pos3_p_T"] +  "%)",
          name: "n = " + data["res_curativa_pos3_n_T"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });        
        
        
        var reseccion_paliativa_pos3 = org_Todos.Member.create({
          rect: { x: 460, y: 350, width: 150, height: 200 },
          position: "Resección paliativa (" + data["res_paliativa_pos3_p_T"] +  "%)",
          name: "n = " + data["res_paliativa_pos3_n_T"] + " \n M1 = " + data["res_paliativa_pos3_M1_T"] + " \n M0-R2 = " + data["res_paliativa_pos3_M0_R2_T"]+ "\n No Res=" + data["res_paliativa_pos3_VACIA_T"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        
        pacientes_operados_pos1.joint(reseccion_local_pos2, org_Todos.arrow);
        pacientes_operados_pos1.joint(reseccion_recto_pos2, org_Todos.arrow);
        pacientes_operados_pos1.joint(no_resectivos_pos2, org_Todos.arrow);
        
        var c = [];
        c.push({x:225, y:320});
        c.push({x:225, y:380});
        
        var d = [];
        d.push({x:225, y:320});
        d.push({x:225, y:530});
         
        reseccion_recto_pos2.joint(reseccion_curativa_pos3, org_Todos.arrow);
        reseccion_recto_pos2.joint(proctocolectomia_pos3, org_Todos.arrow).setVertices(a);
        reseccion_recto_pos2.joint(exent_pelvica_pos3, org_Todos.arrow).setVertices(b);
        reseccion_recto_pos2.joint(reseccion_paliativa_pos3, org_Todos.arrow);
        
        
        
        
        
        
        
        document.getElementById("numero_pacientes_h").value=data["numero_pacientes_h"];
     
        document.getElementById("reseccion_local_pos2_n_h").value=data["reseccion_local_pos2_n_h"];
        document.getElementById("reseccion_local_pos2_p_h").value=data["reseccion_local_pos2_p_h"];
     
        document.getElementById("reseccion_recto_pos2_n_h").value=data["reseccion_recto_pos2_n_h"];
        document.getElementById("reseccion_recto_pos2_p_h").value=data["reseccion_recto_pos2_p_h"];
         
        document.getElementById("no_resectivos_pos2_n_h").value=data["no_resectivos_pos2_n_h"];
        document.getElementById("no_resectivos_pos2_p_h").value=data["no_resectivos_pos2_p_h"];
         
        document.getElementById("proctocolectomia_pos3_n_h").value=data["proctocolectomia_pos3_n_h"];
        document.getElementById("proctocolectomia_pos3_p_h").value=data["proctocolectomia_pos3_p_h"];
        document.getElementById("exent_pelvica_pos3_n_h").value=data["exent_pelvica_pos3_n_h"];
        document.getElementById("exent_pelvica_pos3_p_h").value=data["exent_pelvica_pos3_p_h"];
     
        document.getElementById("res_curativa_pos3_n_h").value=data["res_curativa_pos3_n_h"];
        document.getElementById("res_curativa_pos3_p_h").value=data["res_curativa_pos3_p_h"];
         
        document.getElementById("res_paliativa_pos3_n_h").value=data["res_paliativa_pos3_n_h"];
        document.getElementById("res_paliativa_pos3_p_h").value=data["res_paliativa_pos3_p_h"];
         
        document.getElementById("res_paliativa_pos3_M1_h").value=data["res_paliativa_pos3_M1_h"];
        document.getElementById("res_paliativa_pos3_M0_R2_h").value=data["res_paliativa_pos3_M0_R2_h"];
        document.getElementById("res_paliativa_pos3_VACIA_h").value=data["res_paliativa_pos3_VACIA_h"];
        
        
        
        
        document.getElementById("numero_pacientes").value=data["numero_pacientes"];
     
        document.getElementById("reseccion_local_pos2_n").value=data["reseccion_local_pos2_n_T"];
        document.getElementById("reseccion_local_pos2_p").value=data["reseccion_local_pos2_p_T"];
     
        document.getElementById("reseccion_recto_pos2_n").value=data["reseccion_recto_pos2_n_T"];
        document.getElementById("reseccion_recto_pos2_p").value=data["reseccion_recto_pos2_p_T"];
         
        document.getElementById("no_resectivos_pos2_n").value=data["no_resectivos_pos2_n_T"];
        document.getElementById("no_resectivos_pos2_p").value=data["no_resectivos_pos2_p_T"];
         
        document.getElementById("proctocolectomia_pos3_n").value=data["proctocolectomia_pos3_n_T"];
        document.getElementById("proctocolectomia_pos3_p").value=data["proctocolectomia_pos3_p_T"];
        document.getElementById("exent_pelvica_pos3_n").value=data["exent_pelvica_pos3_n_T"];
        document.getElementById("exent_pelvica_pos3_p").value=data["exent_pelvica_pos3_p_T"];
     
        document.getElementById("res_curativa_pos3_n").value=data["res_curativa_pos3_n_T"];
        document.getElementById("res_curativa_pos3_p").value=data["res_curativa_pos3_p_T"];
         
        document.getElementById("res_paliativa_pos3_n").value=data["res_paliativa_pos3_n_T"];
        document.getElementById("res_paliativa_pos3_p").value=data["res_paliativa_pos3_p_T"];
         
        document.getElementById("res_paliativa_pos3_M1").value=data["res_paliativa_pos3_M1_T"];
        document.getElementById("res_paliativa_pos3_M0_R2").value=data["res_paliativa_pos3_M0_R2_T"];
        document.getElementById("res_paliativa_pos3_VACIA").value=data["res_paliativa_pos3_VACIA_T"];
    
        document.getElementById("entraTotal").value=data["entraTotal"];
		document.getElementById("entraHospital").value=data["entraHospital"];
		document.getElementById("adentro").value=data["adentro"];
		document.getElementById("hospit").value=data["hospital"];
		document.getElementById("fechainicio").value=data["fecha_inicio"];
		document.getElementById("fechafin").value=data["fecha_fin"];
    
            
    }
}

xmlhttp.open("GET", "getDatosGeneralHospital.php?fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
xmlhttp.send();














