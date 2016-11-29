/**
 * @author D681892
 */

$(document).ready(function(){
    
    $('#seleccionarTodo').click(function(){
        document.getElementById('Hospital').checked = true; 
        document.getElementById('NHC').checked = true; 
        document.getElementById('Recidiva').checked = true; 
        document.getElementById('FechaRecidiva').checked = true;
        document.getElementById('Metastasis').checked = true;
        document.getElementById('FechaMetastasis').checked = true;
        document.getElementById('SegundoTumor').checked = true;
        document.getElementById('FechaSegundoTumor').checked = true;
        document.getElementById('EstadoPaciente').checked = true;
        document.getElementById('CausaMuerte').checked = true;
        document.getElementById('FechaMuerte').checked = true;
        document.getElementById('FechaUltimaVisita').checked = true;
        document.getElementById('ImposibilidadSeguimiento').checked = true;
        document.getElementById('MesesSeguimiento').checked = true;
        document.getElementById('FechaNacimiento').checked = true;
        document.getElementById('Sexo').checked = true;
        document.getElementById('Localizacion').checked = true;
        document.getElementById('Clasificacion_Rullier').checked = true;
        document.getElementById('TumorSincronico').checked = true;
        document.getElementById('EcoT').checked = true;
        document.getElementById('EcoN').checked = true;
        document.getElementById('TAC').checked = true;
        document.getElementById('RmnT').checked = true;
        document.getElementById('RmnN').checked = true;
        document.getElementById('EstadioRadiologico').checked = true;
        document.getElementById('Invasion').checked = true;
        document.getElementById('MetastasisInicial').checked = true;
        document.getElementById('FechaAltaSistema').checked = true;
        document.getElementById('Cirugia').checked = true;
        document.getElementById('MotivoNoCirugia').checked = true;
        document.getElementById('Planificacion').checked = true;
        document.getElementById('FechaCirugia').checked = true;
        document.getElementById('FechaAlta').checked = true;
        document.getElementById('Tecnica').checked = true;
        document.getElementById('Tipo_Anastomosis_Proyecto').checked = true;
        document.getElementById('Tipo_Anastomosis_coloanal').checked = true;
        document.getElementById('Reseccion_interesfinteriana').checked = true;
        document.getElementById('OtraTecnica').checked = true;
        document.getElementById('Orientacion').checked = true;
        document.getElementById('ExeresisMesorrecto').checked = true;
        document.getElementById('OtrasResecciones').checked = true;
        document.getElementById('ASA').checked = true;
        document.getElementById('Hallazgos').checked = true;
        document.getElementById('Perforacion').checked = true;
        document.getElementById('MetastasisHepaticas').checked = true;
        document.getElementById('ImpOvaricos').checked = true;
        document.getElementById('ViaOperacion').checked = true;
        document.getElementById('TiempoOperacion').checked = true;
        document.getElementById('Transfusiones').checked = true;
        document.getElementById('Intencion').checked = true;
        document.getElementById('Anastomosis').checked = true;
        document.getElementById('Reservorio').checked = true;
        document.getElementById('Estoma').checked = true;
        document.getElementById('TipoEstoma').checked = true;
        document.getElementById('Complicaciones').checked = true;
        document.getElementById('Reintervencion').checked = true;
        document.getElementById('ReintTexto').checked = true;
        //document.getElementById('ExitusIntra').checked = true;
        //document.getElementById('ExitusIntraTexto').checked = true;
        document.getElementById('ExitusPost').checked = true;
        document.getElementById('ExitusPostTexto').checked = true;
        
        document.getElementById('GSepsis').checked = true;
        document.getElementById('GShock').checked = true;
        
        document.getElementById('HHemo').checked = true;
        document.getElementById('HInfec').checked = true;
        document.getElementById('HEvis').checked = true;
        document.getElementById('HEvent').checked = true;
        
        document.getElementById('PInfec').checked = true;
        document.getElementById('PCicat').checked = true;
        document.getElementById('PHernia').checked = true;
                
        document.getElementById('AHemop').checked = true;
        document.getElementById('APerit').checked = true;
        document.getElementById('AAbsce').checked = true;
        //document.getElementById('AHemoAbdo').checked = true;
        document.getElementById('AAbscePel').checked = true;
        document.getElementById('AHemoPel').checked = true;
        document.getElementById('AIsque').checked = true;
        document.getElementById('AColec').checked = true;
        document.getElementById('AIatro').checked = true;
        document.getElementById('AIatroHuecas').checked = true;
        document.getElementById('AIleopa').checked = true;	
        document.getElementById('IleoMec').checked = true;
        document.getElementById('AEstoma').checked = true;
        
        document.getElementById('AnHemo').checked = true;
        document.getElementById('AnFuga').checked = true;
        document.getElementById('AnFistula').checked = true;
                
        document.getElementById('OHemo').checked = true;
        document.getElementById('OUrologicas').checked = true;
        document.getElementById('OInfur').checked = true;
        document.getElementById('ORespi').checked = true;
        document.getElementById('ORespiInfecc').checked = true;
        document.getElementById('OHepat').checked = true;
        document.getElementById('OVascuMec').checked = true;
        document.getElementById('OVascuInfecc').checked = true;
        document.getElementById('OFMO').checked = true;
        document.getElementById('OTEP').checked = true;
        document.getElementById('ONeuro').checked = true;
        document.getElementById('ORenal').checked = true;
		document.getElementById('OCardio').checked = true;
		
        document.getElementById('TtoNeo').checked = true;
        document.getElementById('TipoNeo').checked = true;
        document.getElementById('TipoNoNeo').checked = true;
        document.getElementById('TtoAdy').checked = true;
        document.getElementById('TipoAdy').checked = true;
        document.getElementById('ApT').checked = true;
        document.getElementById('ApN').checked = true;
        document.getElementById('ApM').checked = true;
        document.getElementById('GangliosAis').checked = true;
        document.getElementById('GangliosAfec').checked = true;
        document.getElementById('MargenDistal').checked = true;
        document.getElementById('MargenCircun').checked = true;
        document.getElementById('TipoRes').checked = true;
        document.getElementById('Regresion').checked = true;
        document.getElementById('MesoCal').checked = true;
        document.getElementById('EstadioPatologico').checked = true;
        document.getElementById('Comentarios_Adicionales').checked = true;
        
        //Nuevos. Valores que no se habían introducido En el q no sea general habra q dividirlos
        
        //Inicial
        document.getElementById('ECO').checked=true;
        document.getElementById('RMN').checked=true;
        document.getElementById('Dist_Tumor').checked=true;
        document.getElementById('Dist_Adeno').checked=true;
        document.getElementById('Integ_Esfinter').checked=true;
        
        //Cirugia
        
        document.getElementById('Cirujano_Principal').checked=true;
        document.getElementById('Cirujano_Ayudante').checked=true;
        document.getElementById('Obstruccion').checked=true;
        
        //Anatomí patológica
        
        document.getElementById('Tipo_Histologico').checked=true;
        document.getElementById('Otros_Histologico').checked=true;
        document.getElementById('Estadio_Tumor_Sincronico').checked=true;
        
        //Seguimiento
        
        document.getElementById('Localizacion_Recidiva').checked=true;
        document.getElementById('Intervencion_Recidiva').checked=true;
        
        document.getElementById('Localizacion_Metastasis').checked=true;
        document.getElementById('Intervencion_Metastasis').checked=true;
        
        document.getElementById('Localizacion_Segundo_Tumor').checked=true;
        document.getElementById('Intervencion_Segundo_Tumor').checked=true;
        
        document.getElementById('Causa_Imposibilidad').checked=true;
             
        
    });
    
    $('#deshabilitarTodo').click(function(){
        document.getElementById('Hospital').checked = false; 
        document.getElementById('NHC').checked = false; 
        document.getElementById('Recidiva').checked = false; 
        document.getElementById('FechaRecidiva').checked = false;
        document.getElementById('Metastasis').checked = false;
        document.getElementById('FechaMetastasis').checked = false;
        document.getElementById('SegundoTumor').checked = false;
        document.getElementById('FechaSegundoTumor').checked = false;
        document.getElementById('EstadoPaciente').checked = false;
        document.getElementById('CausaMuerte').checked = false;
        document.getElementById('FechaMuerte').checked = false;
        document.getElementById('FechaUltimaVisita').checked = false;
        document.getElementById('ImposibilidadSeguimiento').checked = false;
        document.getElementById('MesesSeguimiento').checked = false;
        document.getElementById('FechaNacimiento').checked = false;
        document.getElementById('Sexo').checked = false;
        document.getElementById('Localizacion').checked = false;
        document.getElementById('Clasificacion_Rullier').checked = false;
        document.getElementById('TumorSincronico').checked = false;
        document.getElementById('EcoT').checked = false;
        document.getElementById('EcoN').checked = false;
        document.getElementById('TAC').checked = false;
        document.getElementById('RmnT').checked = false;
        document.getElementById('RmnN').checked = false;
        document.getElementById('EstadioRadiologico').checked = false;
        document.getElementById('Invasion').checked = false;
        document.getElementById('MetastasisInicial').checked = false;
        document.getElementById('FechaAltaSistema').checked = false;
        document.getElementById('Cirugia').checked = false;
        document.getElementById('MotivoNoCirugia').checked = false;
        document.getElementById('Planificacion').checked = false;
        document.getElementById('FechaCirugia').checked = false;
        document.getElementById('FechaAlta').checked = false;
        document.getElementById('Tecnica').checked = false;
        document.getElementById('Tipo_Anastomosis_Proyecto').checked = false;
        document.getElementById('Tipo_Anastomosis_coloanal').checked = false;
        document.getElementById('Reseccion_interesfinteriana').checked = false;
        document.getElementById('OtraTecnica').checked = false;
        document.getElementById('Orientacion').checked = false;
        document.getElementById('ExeresisMesorrecto').checked = false;
        document.getElementById('OtrasResecciones').checked = false;
        document.getElementById('ASA').checked = false;
        document.getElementById('Hallazgos').checked = false;
        document.getElementById('Perforacion').checked = false;
        document.getElementById('MetastasisHepaticas').checked = false;
        document.getElementById('ImpOvaricos').checked = false;
        document.getElementById('ViaOperacion').checked = false;
        document.getElementById('TiempoOperacion').checked = false;
        document.getElementById('Transfusiones').checked = false;
        document.getElementById('Intencion').checked = false;
        document.getElementById('Anastomosis').checked = false;
        document.getElementById('Reservorio').checked = false;
        document.getElementById('Estoma').checked = false;
        document.getElementById('TipoEstoma').checked = false;
        document.getElementById('Complicaciones').checked = false;
        document.getElementById('Reintervencion').checked = false;
        document.getElementById('ReintTexto').checked = false;
      //  document.getElementById('ExitusIntra').checked = false;
       // document.getElementById('ExitusIntraTexto').checked = false;
        document.getElementById('ExitusPost').checked = false;
        document.getElementById('ExitusPostTexto').checked = false;
        
               document.getElementById('GSepsis').checked = false;
        document.getElementById('GShock').checked = false;
        
        document.getElementById('HHemo').checked = false;
        document.getElementById('HInfec').checked = false;
        document.getElementById('HEvis').checked = false;
        document.getElementById('HEvent').checked = false;
        
        document.getElementById('PInfec').checked = false;
        document.getElementById('PCicat').checked = false;
        document.getElementById('PHernia').checked = false;
                
        document.getElementById('AHemop').checked = false;
        document.getElementById('APerit').checked = false;
        document.getElementById('AAbsce').checked = false;
       // document.getElementById('AHemoAbdo').checked = false;
        document.getElementById('AAbscePel').checked = false;
        document.getElementById('AHemoPel').checked = false;
        document.getElementById('AIsque').checked = false;
        document.getElementById('AColec').checked = false;
        document.getElementById('AIatro').checked = false;
        document.getElementById('AIatroHuecas').checked = false;
        document.getElementById('AIleopa').checked = false;	
        document.getElementById('IleoMec').checked = false;
        document.getElementById('AEstoma').checked = false;
        
        document.getElementById('AnHemo').checked = false;
        document.getElementById('AnFuga').checked = false;
        document.getElementById('AnFistula').checked = false;
                
        document.getElementById('OHemo').checked = false;
        document.getElementById('OUrologicas').checked = false;
        document.getElementById('OInfur').checked = false;
        document.getElementById('ORespi').checked = false;
        document.getElementById('ORespiInfecc').checked = false;
        document.getElementById('OHepat').checked = false;
        document.getElementById('OVascuMec').checked = false;
        document.getElementById('OVascuInfecc').checked = false;
        document.getElementById('OFMO').checked = false;
        document.getElementById('OTEP').checked = false;
        document.getElementById('ONeuro').checked = false;
        document.getElementById('ORenal').checked = false;
		document.getElementById('OCardio').checked = false;

        document.getElementById('TtoNeo').checked = false;
        document.getElementById('TipoNeo').checked = false;
        document.getElementById('TipoNoNeo').checked = false;
        document.getElementById('TtoAdy').checked = false;
        document.getElementById('TipoAdy').checked = false;
        document.getElementById('ApT').checked = false;
        document.getElementById('ApN').checked = false;
        document.getElementById('ApM').checked = false;
        document.getElementById('GangliosAis').checked = false;
        document.getElementById('GangliosAfec').checked = false;
        document.getElementById('MargenDistal').checked = false;
        document.getElementById('MargenCircun').checked = false;
        document.getElementById('TipoRes').checked = false;
        document.getElementById('Regresion').checked = false;
        document.getElementById('MesoCal').checked = false;
        document.getElementById('EstadioPatologico').checked = false;
        document.getElementById('Comentarios_Adicionales').checked = false;
        
        
        //Inicial
        document.getElementById('ECO').checked=false;
        document.getElementById('RMN').checked=false;
        document.getElementById('Dist_Tumor').checked=false;
        document.getElementById('Dist_Adeno').checked=false;
        document.getElementById('Integ_Esfinter').checked=false;
        
        //Cirugia
        
        document.getElementById('Cirujano_Principal').checked=false;
        document.getElementById('Cirujano_Ayudante').checked=false;
        document.getElementById('Obstruccion').checked=false;
        
        //Anatomí patológica
        
        document.getElementById('Tipo_Histologico').checked=false;
        document.getElementById('Otros_Histologico').checked=false;
        document.getElementById('Estadio_Tumor_Sincronico').checked=false;
        
        //Seguimiento
        
        document.getElementById('Localizacion_Recidiva').checked=false;
        document.getElementById('Intervencion_Recidiva').checked=false;
        
        document.getElementById('Localizacion_Metastasis').checked=false;
        document.getElementById('Intervencion_Metastasis').checked=false;
        
        document.getElementById('Localizacion_Segundo_Tumor').checked=false;
        document.getElementById('Intervencion_Segundo_Tumor').checked=false;
        
        document.getElementById('Causa_Imposibilidad').checked=false;
        
    });
 
    $('#seleccionarTodoInicial').click(function(){
        document.getElementById('Hospital').checked = true; 
        document.getElementById('NHC').checked = true; 
        document.getElementById('FechaNacimiento').checked = true;
        document.getElementById('Sexo').checked = true;
        document.getElementById('Localizacion').checked = false;
        document.getElementById('Clasificacion_Rullier').checked = false;
        document.getElementById('TumorSincronico').checked = true;
        document.getElementById('EcoT').checked = true;
        document.getElementById('EcoN').checked = true;
        document.getElementById('TAC').checked = true;
        document.getElementById('RmnT').checked = true;
        document.getElementById('RmnN').checked = true;
        document.getElementById('EstadioRadiologico').checked = true;
        document.getElementById('Invasion').checked = true;
        document.getElementById('MetastasisInicial').checked = true;
        document.getElementById('FechaAltaSistema').checked = true;
        
           document.getElementById('ECO').checked=true;
        document.getElementById('RMN').checked=true;
        document.getElementById('Dist_Tumor').checked=true;
        document.getElementById('Dist_Adeno').checked=true;
        document.getElementById('Integ_Esfinter').checked=true;
    });
    $('#deshabilitarTodoInicial').click(function(){
        document.getElementById('Hospital').checked = false; 
        document.getElementById('NHC').checked = false; 
        document.getElementById('FechaNacimiento').checked = false;
        document.getElementById('Sexo').checked = false;
        document.getElementById('Localizacion').checked = false;
        document.getElementById('Clasificacion_Rullier').checked = false;
        document.getElementById('TumorSincronico').checked = false;
        document.getElementById('EcoT').checked = false;
        document.getElementById('EcoN').checked = false;
        document.getElementById('TAC').checked = false;
        document.getElementById('RmnT').checked = false;
        document.getElementById('RmnN').checked = false;
        document.getElementById('EstadioRadiologico').checked = false;
        document.getElementById('Invasion').checked = false;
        document.getElementById('MetastasisInicial').checked = false;
        document.getElementById('FechaAltaSistema').checked = false;
        
           document.getElementById('ECO').checked=false;
        document.getElementById('RMN').checked=false;
        document.getElementById('Dist_Tumor').checked=false;
        document.getElementById('Dist_Adeno').checked=false;
        document.getElementById('Integ_Esfinter').checked=false;
    });
    
    $('#seleccionarTodoTratamiento').click(function(){
        document.getElementById('TtoNeo').checked = true;
        document.getElementById('TipoNeo').checked = true;
        document.getElementById('TipoNoNeo').checked = true;
        document.getElementById('TtoAdy').checked = true;
        document.getElementById('TipoAdy').checked = true;
    });
    $('#deshabilitarTodoTratamiento').click(function(){
        document.getElementById('TtoNeo').checked = false;
        document.getElementById('TipoNeo').checked = false;
        document.getElementById('TipoNoNeo').checked = false;
        document.getElementById('TtoAdy').checked = false;
        document.getElementById('TipoAdy').checked = false;
    });
    
    $('#seleccionarTodoCirugia').click(function(){
        document.getElementById('Cirugia').checked = true;
        document.getElementById('MotivoNoCirugia').checked = true;
        document.getElementById('Planificacion').checked = true;
        document.getElementById('FechaCirugia').checked = true;
        document.getElementById('FechaAlta').checked = true;
        document.getElementById('Tecnica').checked = true;
        document.getElementById('Tipo_Anastomosis_Proyecto').checked = true;
        document.getElementById('Tipo_Anastomosis_coloanal').checked = true;
        document.getElementById('Reseccion_interesfinteriana').checked = true;
        document.getElementById('OtraTecnica').checked = true;
        document.getElementById('Orientacion').checked = true;
        document.getElementById('ExeresisMesorrecto').checked = true;
        document.getElementById('OtrasResecciones').checked = true;
        document.getElementById('ASA').checked = true;
        document.getElementById('Hallazgos').checked = true;
        document.getElementById('Perforacion').checked = true;
        document.getElementById('MetastasisHepaticas').checked = true;
        document.getElementById('ImpOvaricos').checked = true;
        document.getElementById('ViaOperacion').checked = true;
        document.getElementById('TiempoOperacion').checked = true;
        document.getElementById('Transfusiones').checked = true;
        document.getElementById('Intencion').checked = true;
        document.getElementById('Anastomosis').checked = true;
        document.getElementById('Reservorio').checked = true;
        document.getElementById('Estoma').checked = true;
        document.getElementById('TipoEstoma').checked = true;
        
        document.getElementById('Cirujano_Principal').checked=true;
        document.getElementById('Cirujano_Ayudante').checked=true;
        document.getElementById('Obstruccion').checked=true;
    });
    $('#deshabilitarTodoCirugia').click(function(){
        document.getElementById('Cirugia').checked = false;
        document.getElementById('MotivoNoCirugia').checked = false;
        document.getElementById('Planificacion').checked = false;
        document.getElementById('FechaCirugia').checked = false;
        document.getElementById('FechaAlta').checked = false;
        document.getElementById('Tecnica').checked = false;
        document.getElementById('Tipo_Anastomosis_Proyecto').checked = false;
        document.getElementById('Tipo_Anastomosis_coloanal').checked = false;
        document.getElementById('Reseccion_interesfinteriana').checked = false;
        document.getElementById('OtraTecnica').checked = false;
        document.getElementById('Orientacion').checked = false;
        
        document.getElementById('ExeresisMesorrecto').checked = false;
        document.getElementById('OtrasResecciones').checked = false;
        document.getElementById('ASA').checked = false;
        document.getElementById('Hallazgos').checked = false;
        document.getElementById('Perforacion').checked = false;
        document.getElementById('MetastasisHepaticas').checked = false;
        document.getElementById('ImpOvaricos').checked = false;
        document.getElementById('ViaOperacion').checked = false;
        document.getElementById('TiempoOperacion').checked = false;
        document.getElementById('Transfusiones').checked = false;
        document.getElementById('Intencion').checked = false;
        document.getElementById('Anastomosis').checked = false;
        document.getElementById('Reservorio').checked = false;
        document.getElementById('Estoma').checked = false;
        document.getElementById('TipoEstoma').checked = false;
        
        document.getElementById('Cirujano_Principal').checked=false;
        document.getElementById('Cirujano_Ayudante').checked=false;
        document.getElementById('Obstruccion').checked=false;
    });
    
    $('#seleccionarTodoComplicaciones').click(function(){
        document.getElementById('Complicaciones').checked = true;
        document.getElementById('Reintervencion').checked = true;
        document.getElementById('ReintTexto').checked = true;
       // document.getElementById('ExitusIntra').checked = true;
        //document.getElementById('ExitusIntraTexto').checked = true;
        document.getElementById('ExitusPost').checked = true;
        document.getElementById('ExitusPostTexto').checked = true;
         document.getElementById('GSepsis').checked = true;
        document.getElementById('GShock').checked = true;
        
        document.getElementById('HHemo').checked = true;
        document.getElementById('HInfec').checked = true;
        document.getElementById('HEvis').checked = true;
        document.getElementById('HEvent').checked = true;
        
        document.getElementById('PInfec').checked = true;
        document.getElementById('PCicat').checked = true;
        document.getElementById('PHernia').checked = true;
                
        document.getElementById('AHemop').checked = true;
        document.getElementById('APerit').checked = true;
        document.getElementById('AAbsce').checked = true;
       // document.getElementById('AHemoAbdo').checked = true;
        document.getElementById('AAbscePel').checked = true;
        document.getElementById('AHemoPel').checked = true;
        document.getElementById('AIsque').checked = true;
        document.getElementById('AColec').checked = true;
        document.getElementById('AIatro').checked = true;
        document.getElementById('AIatroHuecas').checked = true;
        document.getElementById('AIleopa').checked = true;	
        document.getElementById('IleoMec').checked = true;
        document.getElementById('AEstoma').checked = true;
        
        document.getElementById('AnHemo').checked = true;
        document.getElementById('AnFuga').checked = true;
        document.getElementById('AnFistula').checked = true;
                
        document.getElementById('OHemo').checked = true;
        document.getElementById('OUrologicas').checked = true;
        document.getElementById('OInfur').checked = true;
        document.getElementById('ORespi').checked = true;
        document.getElementById('ORespiInfecc').checked = true;
        document.getElementById('OHepat').checked = true;
        document.getElementById('OVascuMec').checked = true;
        document.getElementById('OVascuInfecc').checked = true;
        document.getElementById('OFMO').checked = true;
        document.getElementById('OTEP').checked = true;
        document.getElementById('ONeuro').checked = true;
        document.getElementById('ORenal').checked = true;
		document.getElementById('OCardio').checked = true;
    });
    $('#deshabilitarTodoComplicaciones').click(function(){
        document.getElementById('Complicaciones').checked = false;
        document.getElementById('Reintervencion').checked = false;
        document.getElementById('ReintTexto').checked = false;
      //  document.getElementById('ExitusIntra').checked = false;
       // document.getElementById('ExitusIntraTexto').checked = false;
        document.getElementById('ExitusPost').checked = false;
        document.getElementById('ExitusPostTexto').checked = false;
        document.getElementById('GSepsis').checked = false;
        document.getElementById('GShock').checked = false;
        
        document.getElementById('HHemo').checked = false;
        document.getElementById('HInfec').checked = false;
        document.getElementById('HEvis').checked = false;
        document.getElementById('HEvent').checked = false;
        
        document.getElementById('PInfec').checked = false;
        document.getElementById('PCicat').checked = false;
        document.getElementById('PHernia').checked = false;
                
        document.getElementById('AHemop').checked = false;
        document.getElementById('APerit').checked = false;
        document.getElementById('AAbsce').checked = false;
      //  document.getElementById('AHemoAbdo').checked = false;
        document.getElementById('AAbscePel').checked = false;
        document.getElementById('AHemoPel').checked = false;
        document.getElementById('AIsque').checked = false;
        document.getElementById('AColec').checked = false;
        document.getElementById('AIatro').checked = false;
        document.getElementById('AIatroHuecas').checked = false;
        document.getElementById('AIleopa').checked = false;	
        document.getElementById('IleoMec').checked = false;
        document.getElementById('AEstoma').checked = false;
        
        document.getElementById('AnHemo').checked = false;
        document.getElementById('AnFuga').checked = false;
        document.getElementById('AnFistula').checked = false;
                
        document.getElementById('OHemo').checked = false;
        document.getElementById('OUrologicas').checked = false;
        document.getElementById('OInfur').checked = false;
        document.getElementById('ORespi').checked = false;
        document.getElementById('ORespiInfecc').checked = false;
        document.getElementById('OHepat').checked = false;
        document.getElementById('OVascuMec').checked = false;
        document.getElementById('OVascuInfecc').checked = false;
        document.getElementById('OFMO').checked = false;
        document.getElementById('OTEP').checked = false;
        document.getElementById('ONeuro').checked = false;
        document.getElementById('ORenal').checked = true;
		document.getElementById('OCardio').checked = false;
    });
    
    $('#seleccionarTodoAnatPatol').click(function(){
        document.getElementById('ApT').checked = true;
        document.getElementById('ApN').checked = true;
        document.getElementById('ApM').checked = true;
        document.getElementById('GangliosAis').checked = true;
        document.getElementById('GangliosAfec').checked = true;
        document.getElementById('MargenDistal').checked = true;
        document.getElementById('MargenCircun').checked = true;
        document.getElementById('TipoRes').checked = true;
        document.getElementById('Regresion').checked = true;
        document.getElementById('MesoCal').checked = true;
        document.getElementById('EstadioPatologico').checked = true;
        document.getElementById('Comentarios_Adicionales').checked = true;
        
           document.getElementById('Tipo_Histologico').checked=true;
        document.getElementById('Otros_Histologico').checked=true;
        document.getElementById('Estadio_Tumor_Sincronico').checked=true;
    });
    $('#deshabilitarTodoAnatPatol').click(function(){
        document.getElementById('ApT').checked = false;
        document.getElementById('ApN').checked = false;
        document.getElementById('ApM').checked = false;
        document.getElementById('GangliosAis').checked = false;
        document.getElementById('GangliosAfec').checked = false;
        document.getElementById('MargenDistal').checked = false;
        document.getElementById('MargenCircun').checked = false;
        document.getElementById('TipoRes').checked = false;
        document.getElementById('Regresion').checked = false;
        document.getElementById('MesoCal').checked = false;
        document.getElementById('EstadioPatologico').checked = false;
        document.getElementById('Comentarios_Adicionales').checked = false;
        
           document.getElementById('Tipo_Histologico').checked=false;
        document.getElementById('Otros_Histologico').checked=false;
        document.getElementById('Estadio_Tumor_Sincronico').checked=false;
    });
    
    $('#seleccionarTodoSeguimiento').click(function(){
        document.getElementById('Recidiva').checked = true; 
        document.getElementById('FechaRecidiva').checked = true;
        document.getElementById('Metastasis').checked = true;
        document.getElementById('FechaMetastasis').checked = true;
        document.getElementById('SegundoTumor').checked = true;
        document.getElementById('FechaSegundoTumor').checked = true;
        document.getElementById('EstadoPaciente').checked = true;
        document.getElementById('CausaMuerte').checked = true;
        document.getElementById('FechaMuerte').checked = true;
        document.getElementById('FechaUltimaVisita').checked = true;
        document.getElementById('ImposibilidadSeguimiento').checked = true;
        document.getElementById('MesesSeguimiento').checked = true;
        document.getElementById('Comentarios_Adicionales').checked = true;
        
        document.getElementById('Localizacion_Recidiva').checked=true;
        document.getElementById('Intervencion_Recidiva').checked=true;
        
        document.getElementById('Localizacion_Metastasis').checked=true;
        document.getElementById('Intervencion_Metastasis').checked=true;
        
        document.getElementById('Localizacion_Segundo_Tumor').checked=true;
        document.getElementById('Intervencion_Segundo_Tumor').checked=true;
        
        document.getElementById('Causa_Imposibilidad').checked=true;
    });
    $('#deshabilitarTodoSeguimiento').click(function(){
        document.getElementById('Recidiva').checked = false; 
        document.getElementById('FechaRecidiva').checked = false;
        document.getElementById('Metastasis').checked = false;
        document.getElementById('FechaMetastasis').checked = false;
        document.getElementById('SegundoTumor').checked = false;
        document.getElementById('FechaSegundoTumor').checked = false;
        document.getElementById('EstadoPaciente').checked = false;
        document.getElementById('CausaMuerte').checked = false;
        document.getElementById('FechaMuerte').checked = false;
        document.getElementById('FechaUltimaVisita').checked = false;
        document.getElementById('ImposibilidadSeguimiento').checked = false;
        document.getElementById('MesesSeguimiento').checked = false;
        document.getElementById('Comentarios_Adicionales').checked = false;
        
        document.getElementById('Localizacion_Recidiva').checked=false;
        document.getElementById('Intervencion_Recidiva').checked=false;
        
        document.getElementById('Localizacion_Metastasis').checked=false;
        document.getElementById('Intervencion_Metastasis').checked=false;
        
        document.getElementById('Localizacion_Segundo_Tumor').checked=false;
        document.getElementById('Intervencion_Segundo_Tumor').checked=false;
        
        document.getElementById('Causa_Imposibilidad').checked=false;
    });
    
    
 
});