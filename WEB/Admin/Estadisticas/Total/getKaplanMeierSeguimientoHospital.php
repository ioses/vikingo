<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

/*
$sqlValorSeguimientoTotal="SELECT COUNT(*) FROM seguimiento_kaplan_meier";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoTotal))
    or die('Error: ' . mysqli_error());

	$PacientesTotal=$row[0];

*/


$APER=$_GET["APER"];  //Value==1

$AR=$_GET["AR"];  //Value==2

$Hartmann=$_GET["Hartmann"];  //Value==3

$Hospital=intval($_GET["Hospital"]);


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
	
	
	$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesMuerteHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHospital=$rowHospital[0];
	

$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMuerte"=>$PacientesSeguimientoMuerte,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoMuerteHospital"=>$PacientesSeguimientoMuerteHospital);
	
	
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
	
	
	
		$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesMuerteHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHospital=$rowHospital[0];
	

$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMuerte"=>$PacientesSeguimientoMuerte,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoMuerteHospital"=>$PacientesSeguimientoMuerteHospital);
	
	
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
	
	
	
		$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesMuerteHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHospital=$rowHospital[0];
	
	
$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMuerte"=>$PacientesSeguimientoMuerte,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoMuerteHospital"=>$PacientesSeguimientoMuerteHospital);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==3){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMuerteAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2'";
	
	$rowARReci= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAR=$rowARReci[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmann=$rowHartmannReci[0];
	
	
	
	
		$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteARHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteARHospital=$rowARReciHospital[0];
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmannHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannSeguimientoHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmannHospital=$rowHartmannSeguimientoHospital[0];

	



	
$Valores[$meses]=array("SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMuerteAR"=>$PacientesSeguimientoMuerteAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMuerteHartmann"=>$PacientesSeguimientoMuerteHartmann,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoMuerteARHospital"=>$PacientesSeguimientoMuerteARHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoMuerteHartmannHospital"=>$PacientesSeguimientoMuerteHartmannHospital);
	
	
}	
echo json_encode($Valores);				


}else if($APER==1 && $AR==0 && $Hartmann==3){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMuerteAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmann=$rowHartmannReci[0];
	
	
	
		$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteAPERHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmannHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmannHospital=$rowHartmannReciHospital[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMuerteAPER"=>$PacientesSeguimientoMuerteAPER,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMuerteHartmann"=>$PacientesSeguimientoMuerteHartmann,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoMuerteAPERHospital"=>$PacientesSeguimientoMuerteAPERHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoMuerteHartmannHospital"=>$PacientesSeguimientoMuerteHartmannHospital);
	
	
}	
echo json_encode($Valores);				
		

}else if($APER==1 && $AR==2 && $Hartmann==0){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMuerteAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMuerteAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2'";
	
	$rowARReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAR=$rowARReci[0];
	
	
	
		$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteAPERHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteARHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteARHospital=$rowARReciHospital[0];
	
	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMuerteAPER"=>$PacientesSeguimientoMuerteAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMuerteAR"=>$PacientesSeguimientoMuerteAR,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoMuerteAPERHospital"=>$PacientesSeguimientoMuerteAPERHospital,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoMuerteARHospital"=>$PacientesSeguimientoMuerteARHospital);		
	
	
}	
echo json_encode($Valores);			
	
	
}else if($APER==1 && $AR==2 && $Hartmann==3){
	

		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMuerteAPER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMuerteAR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2'";
	
	$rowARReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAR=$rowARReci[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmann=$rowHartmannReci[0];



	$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteAPERHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteARHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteARHospital=$rowARReciHospital[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	

	$sqlValorSeguimientoMesMuerteHartmannHospital="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerteHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerteHartmannHospital=$rowHartmannReciHospital[0];


	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMuerteAPER"=>$PacientesSeguimientoMuerteAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMuerteAR"=>$PacientesSeguimientoMuerteAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMuerteHartmann"=>$PacientesSeguimientoMuerteHartmann,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoMuerteAPERHospital"=>$PacientesSeguimientoMuerteAPERHospital,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoMuerteARHospital"=>$PacientesSeguimientoMuerteARHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoMuerteHartmannHospital"=>$PacientesSeguimientoMuerteHartmannHospital);		
	
	
}	
mysqli_close($conexion);

echo json_encode($Valores);		
	
	
}

?>