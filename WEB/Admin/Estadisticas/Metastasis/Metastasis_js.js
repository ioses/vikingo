/**
 * @author D641598
 * 
 * 
 * 
 * 
 */

/*
 * function drawVisualization()
 * 
 * Es la función principal.
 * 
 * Crea el informe según los datos seleccionados.
 * 
 * Llama a otras funciones para crear las gráficas
 * 
 */

      function drawVisualization() {
		
		   var APER=document.getElementById("APER").value;
           var AR=document.getElementById("AR").value;
           var Hartmann=document.getElementById("Hartmann").value;
           
           var TipoInforme=document.getElementById("TipoInforme").value;
           var Hospital=document.getElementById("HospitalKaplanMeier").value;  
       
           
           if (TipoInforme==1){
   			KaplanMeier(APER, AR, Hartmann);
   			KaplanMeierConjunta();
   			
   			TablaSeguimientoTecnicasMetastasis(APER, AR, Hartmann);
   			TablaSeguimientoMetastasisConjunta();
   			
   			}else if(TipoInforme==2){
   				KaplanMeierHospital(APER, AR, Hartmann, Hospital);
   				KaplanMeierConjuntaHospital(Hospital);
   				
   				TablaSeguimientoTecnicasMetastasisHospital(APER, AR, Hartmann, Hospital);
   				TablaSeguimientoMetastasisConjuntaHospital(Hospital);
   			}

        // Create and draw the visualization.
     
      }
      
      //Crea los gráficos
    
      google.setOnLoadCallback(drawVisualization);
      
var porcentaje = 0;      
      
/*
 * KaplanMeier(APER, AR, Hartmann)
 * 
 * Calcula la gráfica Kaplan Meier de todos los hospitales pero 
 * sólo de las técnicas que se introducen como parámetro
 * 
 * Dependiendo de lo que se introduzca, pueden estar 1, 2 o las 3 técnicas
 * 
 * Se entra en diferente if según las entradas
 * 
 * AJAX --> getKaplanMeierMetastasis.php?APER, AR, Hartmann
 * 
 * 
 */
function KaplanMeier(APER, AR, Hartmann)
{
   var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            /*
             * Insertamos la tabla traida desde el php 
             */
            
            /*
             * Diferentes posibildiades para las gráficas
             * 
             */
            
          if (APER==0 && AR==0 && Hartmann==3){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'Hartmann');
			
			
			var SeguimientoTotal=0;
			var Seguimientometastasis=0;
			
			var i=0;
			var Valor=1;
			var Valores=1;
			var Valor2=0;
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				Seguimientometastasis=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-Seguimientometastasis)/SeguimientoTotal);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['orange']               
                        }
                );
          	
          	
          	
          }else if (APER==0 && AR==2 && Hartmann==0){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'AR');
			
			
			var SeguimientoTotal=0;
			var Seguimientometastasis=0;
			
			var i=0;
			var Valor=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				Seguimientometastasis=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-Seguimientometastasis)/SeguimientoTotal);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['red']               
                        }
                );
          	
          	
          }else if (APER==1 && AR==0 && Hartmann==0){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			
			
			var SeguimientoTotal=0;
			var Seguimientometastasis=0;
			
			var i=0;
			var Valor=1;
			var Valores=1;
			var Valor2=0;
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				Seguimientometastasis=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-Seguimientometastasis)/SeguimientoTotal);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue']               
                        }
                );
          	
          	
          }else if (APER==0 && AR==2 && Hartmann==3){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'AR');
			data.addColumn('number','Hartmann');
			
			
			var SeguimientoTotalAR=0;
			var SeguimientometastasisAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMetastasisHartmann=0;
			
			var i=0;
			var ValorAR=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientometastasisAR=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientometastasisHartmann=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAR),(1-ValorHartmann)]);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientometastasisAR)/SeguimientoTotalAR);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientometastasisHartmann)/SeguimientoTotalHartmann);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAR), (1-ValorHartmann)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['red','orange']               
                        }
                );
          	
          	
          }else if (APER==1 && AR==0 && Hartmann==3){
          	
         var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			data.addColumn('number','Hartmann');
			
			
			var SeguimientoTotalAPER=0;
			var SeguimientometastasisAPER=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMetastasisHartmann=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientometastasisAPER=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientometastasisHartmann=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorHartmann)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientometastasisAPER)/SeguimientoTotalAPER);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientometastasisHartmann)/SeguimientoTotalHartmann);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorHartmann)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','orange']               
                        }
                );
          	
          	
          }else if (APER==1 && AR==2 && Hartmann==0){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			data.addColumn('number','AR');
			
			
			var SeguimientoTotalAPER=0;
			var SeguimientometastasisAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientometastasisAR=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorAR=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientometastasisAPER=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientometastasisAR=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorAR)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientometastasisAPER)/SeguimientoTotalAPER);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientometastasisAR)/SeguimientoTotalAR);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','red']               
                        }
                );
          	
          }else if (APER==1 && AR==2 && Hartmann==3){
          	
          		  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			data.addColumn('number','AR');
			data.addColumn('number', 'Hartmann')
			
			
			var SeguimientoTotalAPER=0;
			var SeguimientometastasisAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientometastasisAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientometastasisHartmann=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorAR=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientometastasisAPER=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientometastasisAR=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientometastasisHartmann=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorAR), (1-ValorHartmann)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientometastasisAPER)/SeguimientoTotalAPER);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientometastasisAR)/SeguimientoTotalAR);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientometastasisHartmann)/SeguimientoTotalHartmann);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR), (1-ValorHartmann) ]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','red','orange']               
                        }
                );
          	
          }       
        
 		
		cambiarBarraestado();
        }
    }
    xmlhttp.open("GET","getKaplanMeierMetastasis.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann,true);
    xmlhttp.send();
}

/*
 * KaplanMeierHospital(APER, AR, Hartmann, Hospital)
 * 
 * Calcula la gráfica Kaplan Meier del hospital que se pasa por entrada
 * y de lás técnicas elegidas
 * 
 * Igual que el anterior, pero sólo con un hospital
 * 
 * 
 * AJAX --> getKaplanMeierMetastasisHospital.php?APER, AR, Hartmann, Hospital
 * 
 */
function KaplanMeierHospital(APER, AR, Hartmann, Hospital){
	 var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            /*
             * Insertamos la tabla traida desde el php 
             */
            
            /*
             * Diferentes posibildiades para las gráficas
             * 
             */
            
          if (APER==0 && AR==0 && Hartmann==3){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'Hartmann');
			data.addColumn('number', 'HartmannHospital')
			
			
			var SeguimientoTotal=0;
			var SeguimientoMetastasis=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMetastasisHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMetastasis=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMetastasisHospital=ValoresSeguimiento[i]["SeguimientoMetastasisHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMetastasis)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital*((SeguimientoTotalHospital-SeguimientoMetastasisHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['orange','yellow']               
                        }
                );
          	
          	
          	
          }else if (APER==0 && AR==2 && Hartmann==0){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'AR');
			data.addColumn('number', 'ARHospital');
			
			var SeguimientoTotal=0;
			var SeguimientoMetastasis=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMetastasisHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMetastasis=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMetastasisHospital=ValoresSeguimiento[i]["SeguimientoMetastasisARHospital"];
			
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMetastasis)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital *((SeguimientoTotalHospital-SeguimientoMetastasisHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['red','purple']               
                        }
                );
          	
          	
          }else if (APER==1 && AR==0 && Hartmann==0){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			data.addColumn('number', 'APERHospital');
			
			
			var SeguimientoTotal=0;
			var SeguimientoMetastasis=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMetastasisHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMetastasis=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMetastasisHospital=ValoresSeguimiento[i]["SeguimientoMetastasisAPERHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor),(1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMetastasis)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital *((SeguimientoTotalHospital-SeguimientoMetastasisHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','green']               
                        }
                );
          	
          	
          }else if (APER==0 && AR==2 && Hartmann==3){
          	
          	 var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'AR');
			data.addColumn('number','Hartmann');
			data.addColumn('number', 'ARHospital');
			data.addColumn('number','HartmannHospital');
			
			
			
			var SeguimientoTotalAR=0;
			var SeguimientoMetastasisAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMetastasisHartmann=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoMetastasisARHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoMetastasisHartmannHospital=0;
			
			var i=0;
			
			var ValorAR=1;
			var ValorHartmann=1;
			
			var ValorARHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMetastasisAR=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMetastasisHartmann=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMetastasisARHospital=ValoresSeguimiento[i]["SeguimientoMetastasisARHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMetastasisHartmannHospital=ValoresSeguimiento[i]["SeguimientoMetastasisHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAR),(1-ValorHartmann), (1-ValorARHospital),(1-ValorHartmannHospital)]);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMetastasisAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMetastasisHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoMetastasisARHospital)/SeguimientoTotalARHospital);
			ValorARHospitall=ValorARHospital.toFixed(3);
			
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoMetastasisHartmannHospital)/SeguimientoTotalHartmannHospital);
			ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-ValorAR), (1-ValorHartmann),(1-ValorARHospital), (1-ValorHartmannHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['red','orange','purple','yellow']               
                        }
                );
          	
          	
          }else if (APER==1 && AR==0 && Hartmann==3){
          	
         var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			data.addColumn('number','Hartmann');
			data.addColumn('number', 'APERHospital');
			data.addColumn('number','HartmannHospital');
			
			
			var SeguimientoTotalAPER=0;
			var SeguimientoMetastasisAPER=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMetastasisHartmann=0;
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoMetastasisAPERHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoMetastasisHartmannHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorHartmann=1;
			
			var ValorAPERHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMetastasisAPER=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMetastasisHartmann=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMetastasisAPERHospital=ValoresSeguimiento[i]["SeguimientoMetastasisAPERHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMetastasisHartmannHospital=ValoresSeguimiento[i]["SeguimientoMetastasisHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorHartmann),(1-ValorAPERHospital),(1-ValorHartmannHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMetastasisAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMetastasisHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoMetastasisAPERHospital)/SeguimientoTotalAPERHospital);
			ValorAPERHospital=ValorAPERHospital.toFixed(3);
			
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoMetastasisHartmannHospital)/SeguimientoTotalHartmannHospital);
			ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorHartmann),(1-ValorAPERHospital), (1-ValorHartmannHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','orange','green','yellow']               
                        }
                );
          	
          	
          }else if (APER==1 && AR==2 && Hartmann==0){
          	
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			data.addColumn('number','AR');
			data.addColumn('number', 'APERHospital');
			data.addColumn('number','ARHospital');
			
			
			var SeguimientoTotalAPER=0;
			var SeguimientoMetastasisAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoMetastasisAR=0;
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoMetastasisAPERHospital=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoMetastasisARHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorAR=1;
			
			var ValorAPERHospital=1;
			var ValorARHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMetastasisAPER=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMetastasisAR=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMetastasisAPERHospital=ValoresSeguimiento[i]["SeguimientoMetastasisAPERHospital"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMetastasisARHospital=ValoresSeguimiento[i]["SeguimientoMetastasisARHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER), (1-ValorAR),(1-ValorAPERHospital), (1-ValorARHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMetastasisAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMetastasisAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoMetastasisAPERHospital)/SeguimientoTotalAPERHospital);
			ValorAPERHospital=ValorAPERHospital.toFixed(3);
			
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoMetastasisARHospital)/SeguimientoTotalARHospital);
			ValorARHospital=ValorARHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR),(1-ValorAPERHospital), (1-ValorARHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','red','green','purple']               
                        }
                );
          	
          }else if (APER==1 && AR==2 && Hartmann==3){
          	
          		  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'APER');
			data.addColumn('number','AR');
			data.addColumn('number', 'Hartmann');
			data.addColumn('number', 'APERHospital');
			data.addColumn('number','ARHospital');
			data.addColumn('number', 'HartmannHospital');
			
			
			var SeguimientoTotalAPER=0;
			var SeguimientoMetastasisAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoMetastasisAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMetastasisHartmann=0;
			
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoMetastasisAPERHospital=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoMetastasisARHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoMetastasisHartmannHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorAR=1;
			var ValorHartmann=1;
			
			var ValorAPERHospital=1;
			var ValorARHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMetastasisAPER=ValoresSeguimiento[i]["SeguimientoMetastasisAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMetastasisAR=ValoresSeguimiento[i]["SeguimientoMetastasisAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMetastasisHartmann=ValoresSeguimiento[i]["SeguimientoMetastasisHartmann"];
				
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMetastasisAPERHospital=ValoresSeguimiento[i]["SeguimientoMetastasisAPERHospital"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMetastasisARHospital=ValoresSeguimiento[i]["SeguimientoMetastasisARHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMetastasisHartmannHospital=ValoresSeguimiento[i]["SeguimientoMetastasisHartmannHospital"];
			
		
		
			data.addRow([i,(1-ValorAPER),(1-ValorAR), (1-ValorHartmann),(1-ValorAPERHospital),(1-ValorARHospital), (1-ValorHartmannHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMetastasisAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
						
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMetastasisAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
				
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMetastasisHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoMetastasisAPERHospital)/SeguimientoTotalAPERHospital);
			ValorAPERHospital=ValorAPERHospital.toFixed(3);
						
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoMetastasisARHospital)/SeguimientoTotalARHospital);
			ValorARHospital=ValorARHospital.toFixed(3);
				
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoMetastasisHartmannHospital)/SeguimientoTotalHartmannHospital);
			ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR), (1-ValorHartmann),(1-ValorAPERHospital), (1-ValorARHospital), (1-ValorHartmannHospital) ]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMetastasis')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','red','orange','green','purple','yellow']               
                        }
                );
          	
          }       
        
 		
		cambiarBarraestado();
        }
    }
    xmlhttp.open("GET","getKaplanMeierMetastasisHospital.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}

/*
 * KaplanMeierConjuntaHospital(Hospital)
 * 
 * Realiza la gráfica kaplanMeier sin diferenciar por técnicas
 * 
 * Sólo realiza la gráfica de un hospital concreto
 * 
 * AJAX --> getKaplanMeierMetastasisHospitalConjunta.php?Hospital
 * 
 * 
 */
function KaplanMeierConjuntaHospital(Hospital)
{
   var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        	
        		
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'Total');
			data.addColumn('number', 'Hospital')
			
			
			var SeguimientoTotal=0;
			var SeguimientoMetastasis=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMetastasisHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMetastasis=ValoresSeguimiento[i]["SeguimientoMetastasis"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoMetastasisHospital=ValoresSeguimiento[i]["SeguimientoMetastasisHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMetastasis)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital*((SeguimientoTotalHospital-SeguimientoMetastasisHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('MetastasisConjunta')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['black','red']               
                        }
                );
        	
           
           
           
		cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getKaplanMeierMetastasisHospitalConjunta.php?Hospital="+Hospital,true);
    xmlhttp.send();
	
}

/*
 * KaplanMeierConjunta()
 * 
 * Realiza el Kaplan Meier de todos los pacientes
 * 
 * AJAX --> getKaplanMeierMetastasisConjunta.php
 * 
 */
function KaplanMeierConjunta()
{
   var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        	
        		
          	  var ValoresSeguimiento = JSON.parse( xmlhttp.responseText );
           
            //alert(data["SeguimientoTotal"]);
            
        var data = new google.visualization.DataTable();
     	data.addColumn ('number', 'Mes');
			data.addColumn('number', 'Total');
		
			
			
			var SeguimientoTotal=0;
			var SeguimientoMetastasis=0;
			
		
			
			var i=0;
			var Valor=1;
		

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMetastasis=ValoresSeguimiento[i]["SeguimientoMetastasis"];
				
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMetastasis)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
	
			
			
			data.addRow([i,(1-Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('MetastasisConjunta')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['black']               
                        }
                );
        	
           
           
           
		cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getKaplanMeierMetastasisConjunta.php",true);
    xmlhttp.send();
	
}

/*
 * TablaSeguimientoTecnicasMetastasis(APER, AR, Hartmann)
 * 
 * Realiza las tablas de seguimiento de metástasis separadas por técnicas
 * 
 * AJAX -->getTablaMetastasisTecncias.php?APER, AR, Hartmann
 * 
 */
function TablaSeguimientoTecnicasMetastasis(APER, AR, Hartmann){
	
	 var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        	
			document.getElementById("TablaMetastasisTecnicas").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();

		}
	}

    xmlhttp.open("GET","getTablaMetastasisTecnicas.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann,true);
    xmlhttp.send();
	
}

function TablaSeguimientoMetastasisConjunta(){
	
		 var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        	
			document.getElementById("TablaMetastasisConjunta").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();

		}
	}

    xmlhttp.open("GET","getTablaMetastasisConjunta.php",true);
    xmlhttp.send();
	
}

function TablaSeguimientoTecnicasMetastasisHospital(APER, AR, Hartmann, Hospital){

	 var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        	
			document.getElementById("TablaMetastasisTecnicas").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();

		}
	}

    xmlhttp.open("GET","getTablaMetastasisTecnicasHospital.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}	

function TablaSeguimientoMetastasisConjuntaHospital(Hospital){

	 var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        	
			document.getElementById("TablaMetastasisConjunta").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();

		}
	}

    xmlhttp.open("GET","getTablaMetastasisConjuntaHospital.php?Hospital="+Hospital,true);
    xmlhttp.send();
	
}	

function cambiarBarraestado()
{
    porcentaje = porcentaje + (100/4);
    $('#barra').css('width', (porcentaje) + '%');
    
    if (porcentaje > 98 )
   {
      //$('#barra').hide();
       document.getElementById("barra").style.visibility = 'hidden';
       document.getElementById("cargarndoDatos").value = 'Cargado';
       $('#cargarndoDatos').text('Cargado');  
  
   }  
    
    
}

