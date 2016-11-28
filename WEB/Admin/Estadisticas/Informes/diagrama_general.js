dimension(800, 650);


var Hospital = parseInt(document.getElementById("Hospital").value);

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
        Joint.paper("graphicsTodos", 800, 650);
        
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
          name: "n = " + data["res_paliativa_pos3_n_h"] + " \n M1 = " + data["res_paliativa_pos3_M1_h"] + " \n M0-R2 = " + data["res_paliativa_pos3_M0_R2_h"] ,
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
        Joint.paper("graphics", 800, 650);
        
        
        
         var pacientes_operados_pos1 = org_Todos.Member.create({
          rect: { x: 265, y: 70, width: 150, height: 60 },
          position: "Pacientes operados",
          name: "n = " + data["numero_pacientes"],
          attrs: { fill: '#e4d8a4', stroke: 'gray' }
        });
        
        var reseccion_local_pos2 = org_Todos.Member.create({
          rect: { x: 50, y: 200, width: 150, height: 60 },
          position: "Resección Local (" + data["reseccion_local_pos2_p"] +  "%)",
          name: "n = " + data["reseccion_local_pos2_n"]
        });
        
        var reseccion_recto_pos2 = org_Todos.Member.create({
          rect: { x: 260, y: 200, width: 150, height: 60 },
          position: "Resección de Recto (" + data["reseccion_recto_pos2_p"] +  "%)",
          name: "n = " + data["reseccion_recto_pos2_n"]
        });
        
        var no_resectivos_pos2 = org_Todos.Member.create({
          rect: { x: 460, y: 200, width: 180, height: 60 },
          position: "Procedimientos no resectivos (" + data["no_resectivos_pos2_p"] +  "%)",
          name: "n = " + data["no_resectivos_pos2_n"]
        });
        
       
      
        var proctocolectomia_pos3 = org_Todos.Member.create({
          rect: { x: 40, y: 350, width: 150, height: 60 },
          position: "Proctocolectomía (" + data["proctocolectomia_pos3_p"] +  "%)",
          name: "n = " + data["proctocolectomia_pos3_n"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        var exent_pelvica_pos3 = org_Todos.Member.create({
          rect: { x: 40, y: 500, width: 150, height: 60 },
          position: "Exenteración pélvica  (" + data["exent_pelvica_pos3_p"] +  "%)",
          name: "n = " + data["exent_pelvica_pos3_n"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });
        
        var reseccion_curativa_pos3 = org_Todos.Member.create({
          rect: { x: 260, y: 350, width: 150, height: 60 },
          position: "Resección curativa (" + data["res_curativa_pos3_p"] +  "%)",
          name: "n = " + data["res_curativa_pos3_n"],
          attrs: { fill: '#4192d3', stroke: 'black' }
        });        
        
        
        var reseccion_paliativa_pos3 = org_Todos.Member.create({
          rect: { x: 460, y: 350, width: 150, height: 200 },
          position: "Resección paliativa (" + data["res_paliativa_pos3_p"] +  "%)",
          name: "n = " + data["res_paliativa_pos3_n"] + " \n M1 = " + data["res_paliativa_pos3_M1"] + " \n M0-R2 = " + data["res_paliativa_pos3_M0_R2"] ,
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
        
        
        
        
        document.getElementById("numero_pacientes").value=data["numero_pacientes"];
     
        document.getElementById("reseccion_local_pos2_n").value=data["reseccion_local_pos2_n"];
        document.getElementById("reseccion_local_pos2_p").value=data["reseccion_local_pos2_p"];
     
        document.getElementById("reseccion_recto_pos2_n").value=data["reseccion_recto_pos2_n"];
        document.getElementById("reseccion_recto_pos2_p").value=data["reseccion_recto_pos2_p"];
         
        document.getElementById("no_resectivos_pos2_n").value=data["no_resectivos_pos2_n"];
        document.getElementById("no_resectivos_pos2_p").value=data["no_resectivos_pos2_p"];
         
        document.getElementById("proctocolectomia_pos3_n").value=data["proctocolectomia_pos3_n"];
        document.getElementById("proctocolectomia_pos3_p").value=data["proctocolectomia_pos3_p"];
        document.getElementById("exent_pelvica_pos3_n").value=data["exent_pelvica_pos3_n"];
        document.getElementById("exent_pelvica_pos3_p").value=data["exent_pelvica_pos3_p"];
     
        document.getElementById("res_curativa_pos3_n").value=data["res_curativa_pos3_n"];
        document.getElementById("res_curativa_pos3_p").value=data["res_curativa_pos3_p"];
         
        document.getElementById("res_paliativa_pos3_n").value=data["res_paliativa_pos3_n"];
        document.getElementById("res_paliativa_pos3_p").value=data["res_paliativa_pos3_p"];
         
        document.getElementById("res_paliativa_pos3_M1").value=data["res_paliativa_pos3_M1"];
        document.getElementById("res_paliativa_pos3_M0_R2").value=data["res_paliativa_pos3_M0_R2"];
    
        
    
    }
}

xmlhttp.open("GET", "getDatosGeneralHospital.php?Hospital=" + Hospital+"&fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin, true);
xmlhttp.send();














