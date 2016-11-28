/**
 * @author D641598
 * 
 * 
 * 
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
   			
   			TablaSeguimientoTecnicasRecidiva(APER, AR, Hartmann);
   			TablaSeguimientoRecidivaConjunta();
   			
   			}else if(TipoInforme==2){
   				KaplanMeierHospital(APER, AR, Hartmann, Hospital);
   				KaplanMeierConjuntaHospital(Hospital);
   				
   				TablaSeguimientoTecnicasRecidivaHospital(APER, AR, Hartmann, Hospital);
   				TablaSeguimientoRecidivaConjuntaHospital(Hospital);
   			}

        // Create and draw the visualization.
     
      }
    
      google.setOnLoadCallback(drawVisualization);





var porcentaje = 0;

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
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidiva=0;
			
			var i=0;
			var Valor=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidiva=0;
			
			var i=0;
			var Valor=1;
			var Valores=1;
			var Valor2=0;
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidivaAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoRecidivaHartmann=0;
			
			var i=0;
			var ValorAR=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidivaAR=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoRecidivaHartmann=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAR),(1-ValorHartmann)]);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoRecidivaAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoRecidivaHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAR), (1-ValorHartmann)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}, minValue: 0},
                        vAxis: {minValue: 0, maxValue: 1, gridlines: {color: '#FFF', count: 11}},
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
			var SeguimientoRecidivaAPER=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoRecidivaHartmann=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidivaAPER=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoRecidivaHartmann=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorHartmann)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoRecidivaAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoRecidivaHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorHartmann)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidivaAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoRecidivaAR=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorAR=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidivaAPER=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidivaAR=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorAR)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoRecidivaAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoRecidivaAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidivaAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoRecidivaAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoRecidivaHartmann=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorAR=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidivaAPER=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidivaAR=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoRecidivaHartmann=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorAR), (1-ValorHartmann)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoRecidivaAPER)/SeguimientoTotalAPER);
	
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoRecidivaAR)/SeguimientoTotalAR);
		
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoRecidivaHartmann)/SeguimientoTotalHartmann);
		
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR), (1-ValorHartmann) ]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
    xmlhttp.open("GET","getKaplanMeierRecidiva.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann,true);
    xmlhttp.send();
}

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
			var SeguimientORecidiva=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoRecidivaHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoRecidivaHospital=ValoresSeguimiento[i]["SeguimientoRecidivaHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital*((SeguimientoTotalHospital-SeguimientoRecidivaHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidiva=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoRecidivaHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoRecidivaHospital=ValoresSeguimiento[i]["SeguimientoRecidivaARHospital"];
			
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital *((SeguimientoTotalHospital-SeguimientoRecidivaHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidiva=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoRecidivaHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoRecidivaHospital=ValoresSeguimiento[i]["SeguimientoRecidivaAPERHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor),(1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital *((SeguimientoTotalHospital-SeguimientoRecidivaHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidivaAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoRecidivaHartmann=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoRecidivaARHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoRecidivaHartmannHospital=0;
			
			var i=0;
			
			var ValorAR=1;
			var ValorHartmann=1;
			
			var ValorARHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidivaAR=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoRecidivaHartmann=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoRecidivaARHospital=ValoresSeguimiento[i]["SeguimientoRecidivaARHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoRecidivaHartmannHospital=ValoresSeguimiento[i]["SeguimientoRecidivaHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAR),(1-ValorHartmann), (1-ValorARHospital),(1-ValorHartmannHospital)]);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoRecidivaAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoRecidivaHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoRecidivaARHospital)/SeguimientoTotalARHospital);
			ValorARHospitall=ValorARHospital.toFixed(3);
			
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoRecidivaHartmannHospital)/SeguimientoTotalHartmannHospital);
			ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-ValorAR), (1-ValorHartmann),(1-ValorARHospital), (1-ValorHartmannHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidivaAPER=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoRecidivaHartmann=0;
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoRecidivaAPERHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoRecidivaHartmannHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorHartmann=1;
			
			var ValorAPERHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidivaAPER=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoRecidivaHartmann=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoRecidivaAPERHospital=ValoresSeguimiento[i]["SeguimientoRecidivaAPERHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoRecidivaHartmannHospital=ValoresSeguimiento[i]["SeguimientoRecidivaHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER),(1-ValorHartmann),(1-ValorAPERHospital),(1-ValorHartmannHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoRecidivaAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoRecidivaHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoRecidivaAPERHospital)/SeguimientoTotalAPERHospital);
			ValorAPERHospital=ValorAPERHospital.toFixed(3);
			
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoRecidivaHartmannHospital)/SeguimientoTotalHartmannHospital);
			ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorHartmann),(1-ValorAPERHospital), (1-ValorHartmannHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidivaAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoRecidivaAR=0;
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoRecidivaAPERHospital=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoRecidivaARHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorAR=1;
			
			var ValorAPERHospital=1;
			var ValorARHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidivaAPER=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidivaAR=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoRecidivaAPERHospital=ValoresSeguimiento[i]["SeguimientoRecidivaAPERHospital"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoRecidivaARHospital=ValoresSeguimiento[i]["SeguimientoRecidivaARHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-ValorAPER), (1-ValorAR),(1-ValorAPERHospital), (1-ValorARHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoRecidivaAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoRecidivaAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoRecidivaAPERHospital)/SeguimientoTotalAPERHospital);
			ValorAPERHospital=ValorAPERHospital.toFixed(3);
			
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoRecidivaARHospital)/SeguimientoTotalARHospital);
			ValorARHospital=ValorARHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR),(1-ValorAPERHospital), (1-ValorARHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
			var SeguimientoRecidivaAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoRecidivaAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoRecidivaHartmann=0;
			
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoRecidivaAPERHospital=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoRecidivaARHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoRecidivaHartmannHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorAR=1;
			var ValorHartmann=1;
			
			var ValorAPERHospital=1;
			var ValorARHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoRecidivaAPER=ValoresSeguimiento[i]["SeguimientoRecidivaAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoRecidivaAR=ValoresSeguimiento[i]["SeguimientoRecidivaAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoRecidivaHartmann=ValoresSeguimiento[i]["SeguimientoRecidivaHartmann"];
				
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoRecidivaAPERHospital=ValoresSeguimiento[i]["SeguimientoRecidivaAPERHospital"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoRecidivaARHospital=ValoresSeguimiento[i]["SeguimientoRecidivaARHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoRecidivaHartmannHospital=ValoresSeguimiento[i]["SeguimientoRecidivaHartmannHospital"];
			
		
		
			data.addRow([i,(1-ValorAPER),(1-ValorAR), (1-ValorHartmann),(1-ValorAPERHospital),(1-ValorARHospital), (1-ValorHartmannHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoRecidivaAPER)/SeguimientoTotalAPER);
			ValorAPER=ValorAPER.toFixed(3);
						
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoRecidivaAR)/SeguimientoTotalAR);
			ValorAR=ValorAR.toFixed(3);
				
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoRecidivaHartmann)/SeguimientoTotalHartmann);
			ValorHartmann=ValorHartmann.toFixed(3);
			
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoRecidivaAPERHospital)/SeguimientoTotalAPERHospital);
			ValorAPERHospital=ValorAPERHospital.toFixed(3);
						
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoRecidivaARHospital)/SeguimientoTotalARHospital);
			ValorARHospital=ValorARHospital.toFixed(3);
				
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoRecidivaHartmannHospital)/SeguimientoTotalHartmannHospital);
			ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			data.addRow([i,(1-ValorAPER), (1-ValorAR), (1-ValorHartmann),(1-ValorAPERHospital), (1-ValorARHospital), (1-ValorHartmannHospital) ]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationRecidiva')).
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
    xmlhttp.open("GET","getKaplanMeierRecidivaHospital.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}

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
			var SeguimientoRecidiva=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoRecidivaHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidiva"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoRecidivaHospital=ValoresSeguimiento[i]["SeguimientoRecidivaHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor), (1-ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital*((SeguimientoTotalHospital-SeguimientoRecidivaHospital)/SeguimientoTotalHospital);
			ValorHospital=ValorHospital.toFixed(3);
			
			
			data.addRow([i,(1-Valor), (1-ValorHospital)]);

		}
            
           new google.visualization.LineChart(document.getElementById('RecidivaConjunta')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['black', 'red']               
                        }
                );
        	
 			
		cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getKaplanMeierRecidivaHospitalConjunta.php?Hospital="+Hospital,true);
    xmlhttp.send();
	
}

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
			var SeguimientoRecidiva=0;
			
			var i=0;
			var Valor=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidiva"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,(1-Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			Valor=Valor.toFixed(3);
			//Valor2=1-Valores;

			data.addRow([i,(1-Valor)]);

		}
            
           new google.visualization.LineChart(document.getElementById('RecidivaConjunta')).
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

    xmlhttp.open("GET","getKaplanMeierRecidivaConjunta.php",true);
    xmlhttp.send();
	
}

function TablaSeguimientoTecnicasRecidiva(APER, AR, Hartmann){
	
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
        	
			document.getElementById("TablaRecidivaTecnicas").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaRecidivaTecnicas.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann,true);
    xmlhttp.send();
	
}

function TablaSeguimientoRecidivaConjunta(){
	
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
        	
			document.getElementById("TablaRecidivaConjunta").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaRecidivaConjunta.php",true);
    xmlhttp.send();
	
}

function TablaSeguimientoTecnicasRecidivaHospital(APER, AR, Hartmann, Hospital){

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
        	
			document.getElementById("TablaRecidivaTecnicas").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaRecidivaTecnicasHospital.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}	

function TablaSeguimientoRecidivaConjuntaHospital(Hospital){

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
        	
			document.getElementById("TablaRecidivaConjunta").innerHTML=xmlhttp.responseText;
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaRecidivaConjuntaHospital.php?Hospital="+Hospital,true);
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

   				




