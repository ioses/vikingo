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
   			KaplanMeierSeguimiento(APER, AR, Hartmann);
   			KaplanMeierConjuntaSeguimiento();
   			
   			KaplanMeierRecidiva(APER, AR, Hartmann);
   			KaplanMeierConjuntaRecidiva();
   			
   			KaplanMeierMetastasis(APER, AR, Hartmann);
   			KaplanMeierConjuntaMetastasis();
   			
   			TablaSeguimientoTecnicas(APER, AR, Hartmann);
   			TablaSeguimientoConjunta();
   			
   			
   			TablaSeguimientoTecnicasRecidiva(APER, AR, Hartmann);
   			TablaSeguimientoRecidivaConjunta();
   			
   			TablaSeguimientoTecnicasMetastasis(APER, AR, Hartmann);
   			TablaSeguimientoMetastasisConjunta();
   			
   			
   			}else if(TipoInforme==2){
   				
   				KaplanMeierHospitalSeguimiento(APER, AR, Hartmann, Hospital);
   				KaplanMeierConjuntaHospitalSeguimiento(Hospital);
   				
   				KaplanMeierHospitalRecidiva(APER, AR, Hartmann, Hospital);
   				KaplanMeierConjuntaHospitalRecidiva(Hospital);
   			
   				KaplanMeierHospitalMetastasis(APER, AR, Hartmann, Hospital);
   				KaplanMeierConjuntaHospitalMetastasis(Hospital);
   				
   				
   				TablaSeguimientoTecnicasHospital(APER, AR, Hartmann, Hospital);
   				TablaSeguimientoConjuntaHospital(Hospital);
   				
   				TablaSeguimientoTecnicasRecidivaHospital(APER, AR, Hartmann, Hospital);
   				TablaSeguimientoRecidivaConjuntaHospital(Hospital);
   			
   				TablaSeguimientoTecnicasMetastasisHospital(APER, AR, Hartmann, Hospital);
   				TablaSeguimientoMetastasisConjuntaHospital(Hospital);
   			}

        // Create and draw the visualization.
     
      }
    
      google.setOnLoadCallback(drawVisualization);




//Funciones para el cálculo de kaplan Meier por técnicas para todos los hospitales

function KaplanMeierSeguimiento(APER, AR, Hartmann)
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
			var SeguimientoMuerte=0;
			
			var i=0;
			var Valor=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerte"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMuerte)/SeguimientoTotal);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue: 0},
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
			var SeguimientoMuerte=0;
			
			var i=0;
			var Valor=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerte"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMuerte)/SeguimientoTotal);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerte=0;
			
			var i=0;
			var Valor=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerte"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(Valor)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMuerte)/SeguimientoTotal);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(Valor)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerteAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMuerteHartmann=0;
			
			var i=0;
			var ValorAR=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerteAR=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerteHartmann=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(ValorAR),(ValorHartmann)]);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMuerteAR)/SeguimientoTotalAR);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMuerteHartmann)/SeguimientoTotalHartmann);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(ValorAR), (ValorHartmann)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['red', 'orange']               
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
			var SeguimientoMuerteAPER=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMuerteHartmann=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerteAPER=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerteHartmann=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(ValorAPER),(ValorHartmann)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMuerteAPER)/SeguimientoTotalAPER);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMuerteHartmann)/SeguimientoTotalHartmann);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(ValorAPER), (ValorHartmann)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerteAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoMuerteAR=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorAR=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerteAPER=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerteAR=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(ValorAPER),(ValorAR)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMuerteAPER)/SeguimientoTotalAPER);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMuerteAR)/SeguimientoTotalAR);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(ValorAPER), (ValorAR)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerteAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoMuerteAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMuerteHartmann=0;
			
			var i=0;
			var ValorAPER=1;
			var ValorAR=1;
			var ValorHartmann=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerteAPER=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerteAR=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerteHartmann=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(ValorAPER),(ValorAR), (ValorHartmann)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMuerteAPER)/SeguimientoTotalAPER);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMuerteAR)/SeguimientoTotalAR);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMuerteHartmann)/SeguimientoTotalHartmann);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(ValorAPER), (ValorAR), (ValorHartmann) ]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','red','orange']              
                        }
                );
          	
          }       
        
 		
        }
    }
    xmlhttp.open("GET","getKaplanMeierSeguimiento.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann,true);
    xmlhttp.send();
}


function KaplanMeierRecidiva(APER, AR, Hartmann)
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidiva"];
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidiva"];
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidiva"];
			
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
        
 		
        }
    }
    xmlhttp.open("GET","getKaplanMeierRecidiva.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann,true);
    xmlhttp.send();
}


function KaplanMeierMetastasis(APER, AR, Hartmann)
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				Seguimientometastasis=ValoresSeguimiento[i]["SeguimientoMetastasis"];
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				Seguimientometastasis=ValoresSeguimiento[i]["SeguimientoMetastasis"];
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				Seguimientometastasis=ValoresSeguimiento[i]["SeguimientoMetastasis"];
			
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
        
 		
        }
    }
    xmlhttp.open("GET","getKaplanMeierMetastasis.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann,true);
    xmlhttp.send();
}



//Funciones para el cálculo de kaplan meier por hospital elegido

function KaplanMeierHospitalSeguimiento(APER, AR, Hartmann, Hospital){
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
			var SeguimientoMuerte=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMuerteHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerte"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoMuerteHospital=ValoresSeguimiento[i]["SeguimientoMuerteHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(Valor), (ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMuerte)/SeguimientoTotal);
			//Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital*((SeguimientoTotalHospital-SeguimientoMuerteHospital)/SeguimientoTotalHospital);
			//ValorHospital=ValorHospital.toFixed(3);
			
			
			data.addRow([i,(Valor), (ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerte=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMuerteHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerte"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoMuerteHospital=ValoresSeguimiento[i]["SeguimientoMuerteHospital"];
			
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(Valor), (ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMuerte)/SeguimientoTotal);
			//Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital *((SeguimientoTotalHospital-SeguimientoMuerteHospital)/SeguimientoTotalHospital);
			//ValorHospital=ValorHospital.toFixed(3);
			
			
			
			data.addRow([i,(Valor), (ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerte=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMuerteHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerte"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoMuerteHospital=ValoresSeguimiento[i]["SeguimientoMuerteHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(Valor),(ValorHospital)]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoMuerte)/SeguimientoTotal);
			//Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital *((SeguimientoTotalHospital-SeguimientoMuerteHospital)/SeguimientoTotalHospital);
			//ValorHospital=ValorHospital.toFixed(3);
			//Valor2=1-Valores;
			
			
			data.addRow([i,(Valor), (ValorHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerteAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMuerteHartmann=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoMuerteARHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoMuerteHartmannHospital=0;
			
			var i=0;
			
			var ValorAR=1;
			var ValorHartmann=1;
			
			var ValorARHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerteAR=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerteHartmann=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMuerteARHospital=ValoresSeguimiento[i]["SeguimientoMuerteARHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMuerteHartmannHospital=ValoresSeguimiento[i]["SeguimientoMuerteHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(ValorAR),(ValorHartmann), (ValorARHospital),(ValorHartmannHospital)]);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMuerteAR)/SeguimientoTotalAR);
			//ValorAR=ValorAR.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMuerteHartmann)/SeguimientoTotalHartmann);
			//ValorHartmann=ValorHartmann.toFixed(3);
			
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoMuerteARHospital)/SeguimientoTotalARHospital);
			//ValorARHospitall=ValorARHospital.toFixed(3);
			
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoMuerteHartmannHospital)/SeguimientoTotalHartmannHospital);
			//ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			data.addRow([i,(ValorAR), (ValorHartmann),(ValorARHospital), (ValorHartmannHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerteAPER=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMuerteHartmann=0;
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoMuerteAPERHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoMuerteHartmannHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorHartmann=1;
			
			var ValorAPERHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerteAPER=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerteHartmann=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMuerteAPERHospital=ValoresSeguimiento[i]["SeguimientoMuerteAPERHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMuerteHartmannHospital=ValoresSeguimiento[i]["SeguimientoMuerteHartmannHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(ValorAPER),(ValorHartmann),(ValorAPERHospital),(ValorHartmannHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMuerteAPER)/SeguimientoTotalAPER);
			//ValorAPER=ValorAPER.toFixed(3);
			
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMuerteHartmann)/SeguimientoTotalHartmann);
			//ValorHartmann=ValorHartmann.toFixed(3);
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoMuerteAPERHospital)/SeguimientoTotalAPERHospital);
			//ValorAPERHospital=ValorAPERHospital.toFixed(3);
			
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoMuerteHartmannHospital)/SeguimientoTotalHartmannHospital);
			//ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			
			data.addRow([i,(ValorAPER), (ValorHartmann), (ValorAPERHospital), (ValorHartmannHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerteAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoMuerteAR=0;
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoMuerteAPERHospital=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoMuerteARHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorAR=1;
			
			var ValorAPERHospital=1;
			var ValorARHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerteAPER=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerteAR=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMuerteAPERHospital=ValoresSeguimiento[i]["SeguimientoMuerteAPERHospital"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMuerteARHospital=ValoresSeguimiento[i]["SeguimientoMuerteARHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientomuerte);
		
			data.addRow([i,(ValorAPER), (ValorAR),(ValorAPERHospital), (ValorARHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMuerteAPER)/SeguimientoTotalAPER);
			//ValorAPER=ValorAPER.toFixed(3);
			
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMuerteAR)/SeguimientoTotalAR);
			//ValorAR=ValorAR.toFixed(3);
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoMuerteAPERHospital)/SeguimientoTotalAPERHospital);
			//ValorAPERHospital=ValorAPERHospital.toFixed(3);
			
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoMuerteARHospital)/SeguimientoTotalARHospital);
			//ValorARHospital=ValorARHospital.toFixed(3);
			
			
			
			data.addRow([i, ValorAPER, ValorAR, ValorAPERHospital, ValorARHospital]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
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
			var SeguimientoMuerteAPER=0;
			
			var SeguimientoTotalAR=0;
			var SeguimientoMuerteAR=0;
			
			var SeguimientoTotalHartmann=0;
			var SeguimientoMuerteHartmann=0;
			
			
			var SeguimientoTotalAPERHospital=0;
			var SeguimientoMuerteAPERHospital=0;
			
			var SeguimientoTotalARHospital=0;
			var SeguimientoMuerteARHospital=0;
			
			var SeguimientoTotalHartmannHospital=0;
			var SeguimientoMuerteHartmannHospital=0;
			
			var i=0;
			
			var ValorAPER=1;
			var ValorAR=1;
			var ValorHartmann=1;
			
			var ValorAPERHospital=1;
			var ValorARHospital=1;
			var ValorHartmannHospital=1;
			
			for (i=1;i<=60;i++){
				
				SeguimientoTotalAPER=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerteAPER=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
				
				SeguimientoTotalAR=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerteAR=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
				
				SeguimientoTotalHartmann=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerteHartmann=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
				
				
				SeguimientoTotalAPERHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMuerteAPERHospital=ValoresSeguimiento[i]["SeguimientoMuerteAPERHospital"];
				
				SeguimientoTotalARHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMuerteARHospital=ValoresSeguimiento[i]["SeguimientoMuerteARHospital"];
				
				SeguimientoTotalHartmannHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMuerteHartmannHospital=ValoresSeguimiento[i]["SeguimientoMuerteHartmannHospital"];
			
		
		
			data.addRow([i,(ValorAPER),(ValorAR), (ValorHartmann),(ValorAPERHospital),(ValorARHospital), (ValorHartmannHospital)]);
			
			ValorAPER=ValorAPER *((SeguimientoTotalAPER-SeguimientoMuerteAPER)/SeguimientoTotalAPER);
			//ValorAPER=ValorAPER.toFixed(3);
						
			ValorAR=ValorAR *((SeguimientoTotalAR-SeguimientoMuerteAR)/SeguimientoTotalAR);
			//ValorAR=ValorAR.toFixed(3);
				
			ValorHartmann=ValorHartmann *((SeguimientoTotalHartmann-SeguimientoMuerteHartmann)/SeguimientoTotalHartmann);
			//ValorHartmann=ValorHartmann.toFixed(3);
			
			
			ValorAPERHospital=ValorAPERHospital *((SeguimientoTotalAPERHospital-SeguimientoMuerteAPERHospital)/SeguimientoTotalAPERHospital);
		//	ValorAPERHospital=ValorAPERHospital.toFixed(3);
						
			ValorARHospital=ValorARHospital *((SeguimientoTotalARHospital-SeguimientoMuerteARHospital)/SeguimientoTotalARHospital);
			//ValorARHospital=ValorARHospital.toFixed(3);
				
			ValorHartmannHospital=ValorHartmannHospital *((SeguimientoTotalHartmannHospital-SeguimientoMuerteHartmannHospital)/SeguimientoTotalHartmannHospital);
			//ValorHartmannHospital=ValorHartmannHospital.toFixed(3);
			
			
			
			data.addRow([i, (ValorAPER), (ValorAR), (ValorHartmann), (ValorAPERHospital), (ValorARHospital), (ValorHartmannHospital)]);
		}
            
           new google.visualization.LineChart(document.getElementById('visualizationMuerte')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['blue','red','orange','green','purple','yellow']               
                        }
                );
          	
          }       
        
 		
        }
    }
    xmlhttp.open("GET","getKaplanMeierSeguimientoHospital.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}


function KaplanMeierHospitalRecidiva(APER, AR, Hartmann, Hospital){
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidiva"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoRecidivaHospital=ValoresSeguimiento[i]["SeguimientoRecidivaHospital"];
			
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoRecidiva"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoRecidivaHospital=ValoresSeguimiento[i]["SeguimientoRecidivaHospital"];
			
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
        
 		
        }
    }
    xmlhttp.open("GET","getKaplanMeierRecidivaHospital.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}


function KaplanMeierHospitalMetastasis(APER, AR, Hartmann, Hospital){
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMetastasis=ValoresSeguimiento[i]["SeguimientoMetastasis"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoMetastasisHospital=ValoresSeguimiento[i]["SeguimientoMetastasisHospital"];
			
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotal"];
				SeguimientoMetastasis=ValoresSeguimiento[i]["SeguimientoMetastasis"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoMetastasisHospital=ValoresSeguimiento[i]["SeguimientoMetastasisHospital"];
			
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
        
 		
        }
    }
    xmlhttp.open("GET","getKaplanMeierMetastasisHospital.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}




//Funciones par ael cálculo de kaplan meier conjunto por hospitales


function KaplanMeierConjuntaHospitalSeguimiento(Hospital)
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
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoMuerte"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHospital"];
				SeguimientoRecidivaHospital=ValoresSeguimiento[i]["SeguimientoMuerteHospital"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i,Valor, ValorHospital]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			////Valor=Valor.toFixed(3);
			
			ValorHospital=ValorHospital*((SeguimientoTotalHospital-SeguimientoRecidivaHospital)/SeguimientoTotalHospital);
			////ValorHospital=ValorHospital.toFixed(3);
			
			
			data.addRow([i, Valor, ValorHospital]);

		}
            
           new google.visualization.LineChart(document.getElementById('visualizationConjunta')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['black', 'red']               
                        }
                );
        	
 			

		}
	}

    xmlhttp.open("GET","getKaplanMeierSeguimientoHospitalConjunta.php?Hospital="+Hospital,true);
    xmlhttp.send();
	
}


function KaplanMeierConjuntaHospitalRecidiva(Hospital)
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
        	
 			

		}
	}

    xmlhttp.open("GET","getKaplanMeierRecidivaHospitalConjunta.php?Hospital="+Hospital,true);
    xmlhttp.send();
	
}


function KaplanMeierConjuntaHospitalMetastasis(Hospital)
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
        	
           
           
           

		}
	}

    xmlhttp.open("GET","getKaplanMeierMetastasisHospitalConjunta.php?Hospital="+Hospital,true);
    xmlhttp.send();
	
}



//Funciones para el cálculode kaplanMeier conjunto


function KaplanMeierConjuntaSeguimiento()
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
				SeguimientoRecidiva=ValoresSeguimiento[i]["SeguimientoMuerte"];
			
		//alert (i+", "+SeguimientoTotal+", "+Seguimientometastasis);
		
			data.addRow([i, Valor]);
			
			Valor=Valor *((SeguimientoTotal-SeguimientoRecidiva)/SeguimientoTotal);
			//Valor=Valor.toFixed(3);
			//Valor2=1-Valores;

			data.addRow([i,Valor]);

		}
            
           new google.visualization.LineChart(document.getElementById('visualizationConjunta')).
            draw(data, {curveType: "none",
                        width: 800, height: 600,
                        hAxis: {maxValue: 60, gridlines: {color: '#FFF', count: 6}},
                        vAxis: {maxValue: 1, gridlines: {color: '#FFF', count: 11}, minValue:0},
                        colors: ['black']               
                        }
                );
        	
 

		}
	}

    xmlhttp.open("GET","getKaplanMeierSeguimientoConjunta.php",true);
    xmlhttp.send();
	
}


function KaplanMeierConjuntaRecidiva()
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
        	
 

		}
	}

    xmlhttp.open("GET","getKaplanMeierRecidivaConjunta.php",true);
    xmlhttp.send();
	
}


function KaplanMeierConjuntaMetastasis()
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
        	
           
           
           

		}
	}

    xmlhttp.open("GET","getKaplanMeierMetastasisConjunta.php",true);
    xmlhttp.send();
	
}




//Tablas de técnicas generales




function TablaSeguimientoTecnicas(APER, AR, Hartmann){
	
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
        	
			document.getElementById("TablaSeguimientoTecnicas").innerHTML=xmlhttp.responseText;

		}
	}

    xmlhttp.open("GET","getTablaSeguimientoTecnicas.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann,true);
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

		}
	}

    xmlhttp.open("GET","getTablaRecidivaTecnicas.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann,true);
    xmlhttp.send();
	
}


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

		}
	}

    xmlhttp.open("GET","getTablaMetastasisTecnicas.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann,true);
    xmlhttp.send();
	
}



//Tabla de técnicas conjunta

function TablaSeguimientoConjunta(){
	
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
        	
			document.getElementById("TablaSeguimientoConjunta").innerHTML=xmlhttp.responseText;

		}
	}

    xmlhttp.open("GET","getTablaSeguimientoConjunta.php",true);
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

		}
	}

    xmlhttp.open("GET","getTablaRecidivaConjunta.php",true);
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

		}
	}

    xmlhttp.open("GET","getTablaMetastasisConjunta.php",true);
    xmlhttp.send();
	
}


//Tablas de técnicas por hospital

function TablaSeguimientoTecnicasHospital(APER, AR, Hartmann, Hospital){

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
        	
			document.getElementById("TablaSeguimientoTecnicas").innerHTML=xmlhttp.responseText;

		}
	}

    xmlhttp.open("GET","getTablaSeguimientoTecnicasHospital.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann+"&Hospital="+Hospital,true);
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

		}
	}

    xmlhttp.open("GET","getTablaRecidivaTecnicasHospital.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann+"&Hospital="+Hospital,true);
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

		}
	}

    xmlhttp.open("GET","getTablaMetastasisTecnicasHospital.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}	



//Tablas de seguimiento tecnicas conjuntas por hospital


function TablaSeguimientoConjuntaHospital(Hospital){

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
        	
			document.getElementById("TablaSeguimientoConjunta").innerHTML=xmlhttp.responseText;

		}
	}

    xmlhttp.open("GET","getTablaSeguimientoConjuntaHospital.php?Hospital="+Hospital,true);
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

		}
	}

    xmlhttp.open("GET","getTablaRecidivaConjuntaHospital.php?Hospital="+Hospital,true);
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

		}
	}

    xmlhttp.open("GET","getTablaMetastasisConjuntaHospital.php?Hospital="+Hospital,true);
    xmlhttp.send();
	
}	


 


