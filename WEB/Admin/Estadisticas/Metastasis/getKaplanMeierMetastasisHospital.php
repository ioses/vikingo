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

/*
 * Creación de un array que se envia por json 
 * 
 * Se indica el número de pacientes seguidos divididos por tiempo de seguimiento
 * y el número de pacientes con evento de metástasisç
 * 
 * Se dan los valores conjuntos y el valor del hospital elegido en particular
 * 
 * Cada técnica de cirugía se trabaja por separado
 * 
 * El array resultante se utiliza para crear el gráfico kaplan-meier
 * 
 */




$APER=$_GET["APER"];  //Value==1

$AR=$_GET["AR"];  //Value==2

$Hartmann=$_GET["Hartmann"];  //Value==3

$Hospital=intval($_GET["Hospital"]);


if ($APER==0 && $AR==0 && $Hartmann==3){


for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMetastasis="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasis))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasis=$row[0];
	
	
	$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesMetastasisHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHospital=$rowHospital[0];
	

$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoMetastasisHospital"=>$PacientesSeguimientoMetastasisHospital);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==0){
	
for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMetastasis="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasis))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasis=$row[0];
	
	
	
		$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesMetastasisHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHospital=$rowHospital[0];
	

$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoMetastasisHospital"=>$PacientesSeguimientoMetastasisHospital);
	
	
}	

echo json_encode($Valores);	


}else if($APER==1 && $AR==0 && $Hartmann==0){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMetastasis="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasis))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasis=$row[0];
	
	
	
		$sqlValorSeguimientoMesHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHospital=$rowHospital[0];
	
	

		$sqlValorSeguimientoMesMetastasisHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Hospital='$Hospital'";
	
	$rowHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHospital=$rowHospital[0];
	
	
$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis,
				"SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				"SeguimientoMetastasisHospital"=>$PacientesSeguimientoMetastasisHospital);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==3){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMetastasisAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2'";
	
	$rowARReci= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAR=$rowARReci[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmann=$rowHartmannReci[0];
	
	
	
	
		$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisARHospital=$rowARReciHospital[0];
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	
	
	$sqlValorSeguimientoMesMetastasisHartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmannHospital=$rowHartmannHospital[0];
	
	


	



	
$Valores[$meses]=array("SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoMetastasisARHospital"=>$PacientesSeguimientoMetastasisARHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoMetastasisHartmannHospital"=>$PacientesSeguimientoMetastasisHartmannHospital);
	
	
}	
echo json_encode($Valores);				


}else if($APER==1 && $AR==0 && $Hartmann==3){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmann=$rowHartmannReci[0];
	
	
	
		$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmannHospital=$rowHartmannReciHospital[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoMetastasisAPERHospital"=>$PacientesSeguimientoMetastasisAPERHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoMetastasisHartmannHospital"=>$PacientesSeguimientoMetastasisHartmannHospital);
	
	
}	
echo json_encode($Valores);				
		

}else if($APER==1 && $AR==2 && $Hartmann==0){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMetastasisAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2'";
	
	$rowARReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAR=$rowARReci[0];
	
	
	
		$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisARHospital=$rowARReciHospital[0];
	
	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoMetastasisAPERHospital"=>$PacientesSeguimientoMetastasisAPERHospital,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoMetastasisARHospital"=>$PacientesSeguimientoMetastasisARHospital);		
	
	
}	
echo json_encode($Valores);			
	
	
}else if($APER==1 && $AR==2 && $Hartmann==3){
	

		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1'";
	
	$rowAPERReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPER=$rowAPERReci[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMetastasisAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2'";
	
	$rowARReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAR=$rowARReci[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3'";
	
	$rowHartmannReci = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmann=$rowHartmannReci[0];



	$sqlValorSeguimientoMesAPERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPERHospital=$rowAPERHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1' AND Hospital='$Hospital'";
	
	$rowAPERReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPERHospital=$rowAPERReciHospital[0];
	
	
	$sqlValorSeguimientoMesARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoARHospital=$rowARHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2' AND Hospital='$Hospital'";
	
	$rowARReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisARHospital=$rowARReciHospital[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmannHospital=$rowHartmannHospital[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3' AND Hospital='$Hospital'";
	
	$rowHartmannReciHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmannHospital=$rowHartmannReciHospital[0];


	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann,
				"SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
				"SeguimientoMetastasisAPERHospital"=>$PacientesSeguimientoMetastasisAPERHospital,
				"SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
				"SeguimientoMetastasisARHospital"=>$PacientesSeguimientoMetastasisARHospital,
				"SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
				"SeguimientoMetastasisHartmannHospital"=>$PacientesSeguimientoMetastasisHartmannHospital);		
	
	
}	

mysqli_close($conexion);

echo json_encode($Valores);		
	
	
}

?>