/**
 * @author D641598
 * 
 * 
 * 
 * 
 */


    function drawVisualizationSeguimiento() {
		
		   var APER=document.getElementById("APER").value;
           var AR=document.getElementById("AR").value;
           var Hartmann=document.getElementById("Hartmann").value;
           
           //alert(APER + " " + AR + " " + Hartmann);
           
           
           var TipoInforme=document.getElementById("TipoInforme").value;
           var Hospital=document.getElementById("HospitalKaplanMeier").value;  
       
           
           if (TipoInforme==1){
   			KaplanMeier(APER, AR, Hartmann);
   			KaplanMeierConjunta();
   			TablaSeguimientoTecnicas(APER, AR, Hartmann);
   			TablaSeguimientoConjunta();
   			
   			
   			}else if(TipoInforme==2){
   				KaplanMeierHospital(APER, AR, Hartmann, Hospital);
   				KaplanMeierConjuntaHospital(Hospital);
   				
   				TablaSeguimientoTecnicasHospital(APER, AR, Hartmann, Hospital);
   				TablaSeguimientoConjuntaHospital(Hospital);
   			}

        // Create and draw the visualization.
     
      }
    
      google.setOnLoadCallback(drawVisualizationSeguimiento);




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
			var SeguimientoMuerte=0;
			
			var i=0;
			var Valor=1;
		
			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
			
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
        
 		cambiarBarraestado();
        }
    }
    xmlhttp.open("GET","getKaplanMeierSeguimiento.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann,true);
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
			var SeguimientoMuerte=0;
			
			var SeguimientoTotalHospital=0;
			var SeguimientoMuerteHospital=0;
			
			var i=0;
			var Valor=1;
			var ValorHospital=1;

			for (i=1;i<=60;i++){
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalHartmann"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerteHartmann"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalHartmannHospital"];
				SeguimientoMuerteHospital=ValoresSeguimiento[i]["SeguimientoMuerteHartmannHospital"];
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAR"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerteAR"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalARHospital"];
				SeguimientoMuerteHospital=ValoresSeguimiento[i]["SeguimientoMuerteARHospital"];
			
			
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
				
				SeguimientoTotal=ValoresSeguimiento[i]["SeguimientoTotalAPER"];
				SeguimientoMuerte=ValoresSeguimiento[i]["SeguimientoMuerteAPER"];
				
				SeguimientoTotalHospital=ValoresSeguimiento[i]["SeguimientoTotalAPERHospital"];
				SeguimientoMuerteHospital=ValoresSeguimiento[i]["SeguimientoMuerteAPERHospital"];
			
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
        
 		cambiarBarraestado();
        }
    }
    xmlhttp.open("GET","getKaplanMeierSeguimientoHospital.php?APER="+APER+"&AR="+AR+"&Hartmann="+Hartmann+"&Hospital="+Hospital,true);
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
        	
 			
		cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getKaplanMeierSeguimientoHospitalConjunta.php?Hospital="+Hospital,true);
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
        	
 
		cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getKaplanMeierSeguimientoConjunta.php",true);
    xmlhttp.send();
	
}

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
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaSeguimientoTecnicas.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann,true);
    xmlhttp.send();
	
}

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
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaSeguimientoConjunta.php",true);
    xmlhttp.send();
	
}

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
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaSeguimientoTecnicasHospital.php?APER=" +APER+ "&AR=" +AR+ "&Hartmann=" +Hartmann+"&Hospital="+Hospital,true);
    xmlhttp.send();
	
}	

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
			cambiarBarraestado();
		}
	}

    xmlhttp.open("GET","getTablaSeguimientoConjuntaHospital.php?Hospital="+Hospital,true);
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
 


