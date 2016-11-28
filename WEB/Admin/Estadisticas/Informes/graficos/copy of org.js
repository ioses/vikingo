dimension(800, 650);

var org = Joint.dia.org;
Joint.paper("graphics", 800, 650);

var pacientes_operados_pos1 = org.Member.create({
  rect: { x: 305, y: 70, width: 140, height: 60 },
  position: "Pacientes operados",
  name: "n = X",
  attrs: { fill: '#e4d8a4', stroke: 'gray' }
});

var reseccion_local_pos2 = org.Member.create({
  rect: { x: 90, y: 200, width: 150, height: 60 },
  position: "Resección Local X%",
  name: "n = X"
});

var reseccion_recto_pos2 = org.Member.create({
  rect: { x: 300, y: 200, width: 150, height: 60 },
  position: "Resección de Recto (X%)",
  name: "n = X"
});

var no_resectivos_pos2 = org.Member.create({
  rect: { x: 500, y: 200, width: 170, height: 60 },
  position: "Precidimientos no resectivos (x%)",
  name: "n = X"
});

var reseccion_curativa_pos3 = org.Member.create({
  rect: { x: 300, y: 350, width: 150, height: 60 },
  position: "Resección curativa X%",
  name: "n = X",
  attrs: { fill: '#4192d3', stroke: 'black' }
});

var proctocolectomia_pos3 = org.Member.create({
  rect: { x: 80, y: 350, width: 150, height: 60 },
  position: "Proctocolectomía (X%)",
  name: "n = X",
  attrs: { fill: '#4192d3', stroke: 'black' }
});

var exent_pelvica_pos3 = org.Member.create({
  rect: { x: 80, y: 500, width: 150, height: 60 },
  position: "Exenteración pélvica  (X%)",
  name: "n = X",
  attrs: { fill: '#4192d3', stroke: 'black' }
});


var reseccion_paliativa_pos3 = org.Member.create({
  rect: { x: 500, y: 350, width: 150, height: 60 },
  position: "Resección paliativa (x%)",
  name: "n = X",
  attrs: { fill: '#4192d3', stroke: 'black' }
});


pacientes_operados_pos1.joint(reseccion_local_pos2, org.arrow);
pacientes_operados_pos1.joint(reseccion_recto_pos2, org.arrow);
pacientes_operados_pos1.joint(no_resectivos_pos2, org.arrow);

var a = [];
a.push({x:265, y:320});
a.push({x:265, y:380});

var b = [];
b.push({x:265, y:320});
b.push({x:265, y:530});
 
reseccion_recto_pos2.joint(reseccion_curativa_pos3, org.arrow);
reseccion_recto_pos2.joint(proctocolectomia_pos3, org.arrow).setVertices(a);
reseccion_recto_pos2.joint(exent_pelvica_pos3, org.arrow).setVertices(b);
reseccion_recto_pos2.joint(reseccion_paliativa_pos3, org.arrow);

