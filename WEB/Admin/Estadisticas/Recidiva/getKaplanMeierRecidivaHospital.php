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

$Hospital=intval($_GET["Hospital"]);


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
	
	
	$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesRecidivaHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHospital=$rowHospital[0];
	

$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoRecidivaHospital"=>$PacientesSeguimientoRecidivaHospital);
	
	
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
	
	
	
		$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesRecidivaHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHospital=$rowHospital[0];
	

$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoRecidivaHospital"=>$PacientesSeguimientoRecidivaHospital);
	
	
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
	
	
	
		$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesRecidivaHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHospital=$rowHospital[0];
	
	
$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoRecidivaHospital"=>$PacientesSeguimientoRecidivaHospital);
	
	
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
	
	
	
	
		$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaARHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaARHospital=$rowARReciHospital[0];
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	
	
		$sqlValorSeguimientoMesRecidivaHartmannHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannReciHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHartmannHospital=$rowHartmannReciHospital[0];
	
	


	



	
$Valores[$meses]=array("SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoRecidivaAR"=>$PacientesSeguimientoRecidivaAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoRecidivaHartmann"=>$PacientesSeguimientoRecidivaHartmann,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoRecidivaARHospital"=>$PacientesSeguimientoRecidivaARHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoRecidivaHartmannHospital"=>$PacientesSeguimientoRecidivaHartmannHospital);
	
	
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
	
	
	
		$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaAPERHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaHartmannHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHartmannHospital=$rowHartmannReciHospital[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoRecidivaAPER"=>$PacientesSeguimientoRecidivaAPER,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoRecidivaHartmann"=>$PacientesSeguimientoRecidivaHartmann,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoRecidivaAPERHospital"=>$PacientesSeguimientoRecidivaAPERHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoRecidivaHartmannHospital"=>$PacientesSeguimientoRecidivaHartmannHospital);
	
	
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
	
	
	
		$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaAPERHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaARHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaARHospital=$rowARReciHospital[0];
	
	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoRecidivaAPER"=>$PacientesSeguimientoRecidivaAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoRecidivaAR"=>$PacientesSeguimientoRecidivaAR,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoRecidivaAPERHospital"=>$PacientesSeguimientoRecidivaAPERHospital,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoRecidivaARHospital"=>$PacientesSeguimientoRecidivaARHospital);		
	
	
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



	$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaAPERHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaARHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaARHospital=$rowARReciHospital[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	

	$sqlValorSeguimientoMesRecidivaHartmannHospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidivaHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidivaHartmannHospital=$rowHartmannReciHospital[0];


	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoRecidivaAPER"=>$PacientesSeguimientoRecidivaAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoRecidivaAR"=>$PacientesSeguimientoRecidivaAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoRecidivaHartmann"=>$PacientesSeguimientoRecidivaHartmann,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoRecidivaAPERHospital"=>$PacientesSeguimientoRecidivaAPERHospital,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoRecidivaARHospital"=>$PacientesSeguimientoRecidivaARHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoRecidivaHartmannHospital"=>$PacientesSeguimientoRecidivaHartmannHospital);		
	
	
}	
mysqli_close($conexion);

echo json_encode($Valores);		
	
	
}

?>