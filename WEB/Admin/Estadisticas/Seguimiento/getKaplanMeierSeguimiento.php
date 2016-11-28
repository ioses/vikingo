<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

/*
$sqlValorSeguimientoTotal="SELECT COUNT(*) FROM metastasis_kaplan_meier";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoTotal))
    or die('Error: ' . mysqli_error());

	$PacientesTotal=$row[0];

*/


$APER=$_GET["APER"];  //Value==1

$AR=$_GET["AR"];  //Value==2

$Hartmann=$_GET["Hartmann"];  //Value==3


if ($APER==0 && $AR==0 && $Hartmann==3){


for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMuerte="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerte))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerte=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMuerte"=>$PacientesSeguimientoMuerte);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==0){
	
for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMuerte="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerte))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerte=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>($PacientesSeguimiento),
				"SeguimientoMuerte"=>$PacientesSeguimientoMuerte);
	
	
}	

echo json_encode($Valores);	


}else if($APER==1 && $AR==0 && $Hartmann==0){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMuerte="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerte))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerte=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>($PacientesSeguimiento),
				"SeguimientoMuerte"=>$PacientesSeguimientoMuerte);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==3){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMuerteAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2'";
	
	$rowARMuerte= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAR=$rowARMuerte[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3'";
	
	$rowHartmannMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmann=$rowHartmannMuerte[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMuerteAR"=>$PacientesSeguimientoMuerteAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMuerteHartmann"=>$PacientesSeguimientoMuerteHartmann);
	
	
}	
echo json_encode($Valores);				


}else if($APER==1 && $AR==0 && $Hartmann==3){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMuerteAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1'";
	
	$rowAPERMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPER=$rowAPERMuerte[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3'";
	
	$rowHartmannMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmann=$rowHartmannMuerte[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMuerteAPER"=>$PacientesSeguimientoMuerteAPER,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMuerteHartmann"=>$PacientesSeguimientoMuerteHartmann);
	
	
}	
echo json_encode($Valores);				
		

}else if($APER==1 && $AR==2 && $Hartmann==0){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMuerteAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1'";
	
	$rowAPERMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPER=$rowAPERMuerte[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMuerteAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2'";
	
	$rowARMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAR=$rowARMuerte[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMuerteAPER"=>$PacientesSeguimientoMuerteAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMuerteAR"=>$PacientesSeguimientoMuerteAR);		
	
	
}	
echo json_encode($Valores);			
	
	
}else if($APER==1 && $AR==2 && $Hartmann==3){
	

		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMuerteAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1'";
	
	$rowAPERMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPER=$rowAPERMuerte[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMuerteAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2'";
	
	$rowARMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAR=$rowARMuerte[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3'";
	
	$rowHartmannMuerte = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmann=$rowHartmannMuerte[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMuerteAPER"=>$PacientesSeguimientoMuerteAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMuerteAR"=>$PacientesSeguimientoMuerteAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMuerteHartmann"=>$PacientesSeguimientoMuerteHartmann);		
	
	
}	
mysqli_close($conexion);

echo json_encode($Valores);		
	
	
}

?>