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

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesRecidiva="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidiva))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidiva=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==0){
	
for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesRecidiva="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidiva))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidiva=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>($PacientesSeguimiento),
				"SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva);
	
	
}	

echo json_encode($Valores);	


}else if($APER==1 && $AR==0 && $Hartmann==0){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesRecidiva="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidiva))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidiva=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>($PacientesSeguimiento),
				"SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==3){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesRecidivaAR="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='2'";
	
	$rowARReci= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAR=$rowARReci[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesRecidivaHartmann="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHartmann=$rowHartmannReci[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoRecidivaAR"=>$PacientesSeguimientoRecidivaAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoRecidivaHartmann"=>$PacientesSeguimientoRecidivaHartmann);
	
	
}	
echo json_encode($Valores);				


}else if($APER==1 && $AR==0 && $Hartmann==3){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesRecidivaAPER="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesRecidivaHartmann="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHartmann=$rowHartmannReci[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoRecidivaAPER"=>$PacientesSeguimientoRecidivaAPER,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoRecidivaHartmann"=>$PacientesSeguimientoRecidivaHartmann);
	
	
}	
echo json_encode($Valores);				
		

}else if($APER==1 && $AR==2 && $Hartmann==0){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesRecidivaAPER="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesRecidivaAR="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='2'";
	
	$rowARReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAR=$rowARReci[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoRecidivaAPER"=>$PacientesSeguimientoRecidivaAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoRecidivaAR"=>$PacientesSeguimientoRecidivaAR);		
	
	
}	
echo json_encode($Valores);			
	
	
}else if($APER==1 && $AR==2 && $Hartmann==3){
	

		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesRecidivaAPER="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesRecidivaAR="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='2'";
	
	$rowARReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAR=$rowARReci[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesRecidivaHartmann="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHartmann=$rowHartmannReci[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoRecidivaAPER"=>$PacientesSeguimientoRecidivaAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoRecidivaAR"=>$PacientesSeguimientoRecidivaAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoRecidivaHartmann"=>$PacientesSeguimientoRecidivaHartmann);		
	
	
}	

mysqli_close($conexion);

echo json_encode($Valores);		
	
	
}

?>