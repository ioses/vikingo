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

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMetastasis="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasis))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasis=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>($PacientesSeguimiento),
				"SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis);
	
	
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
	
$Valores[$meses]=array("SeguimientoTotal"=>($PacientesSeguimiento),
				"SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis);
	
	
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
	
$Valores[$meses]=array("SeguimientoTotal"=>($PacientesSeguimiento),
				"SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis);
	
	
}	
echo json_encode($Valores);	


}else if($APER==0 && $AR==2 && $Hartmann==3){
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMetastasisAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2'";
	
	$rowARMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAR=$rowARMetast[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3'";
	
	$rowHartmannMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmann=$rowHartmannMetast[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann);
	
	
}	
echo json_encode($Valores);				


}else if($APER==1 && $AR==0 && $Hartmann==3){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1'";
	
	$rowAPERMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPER=$rowAPERMetast[0];
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3'";
	
	$rowHartmannMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmann=$rowHartmannMetast[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann);
	
	
}	
echo json_encode($Valores);				
		

}else if($APER==1 && $AR==2 && $Hartmann==0){
			
		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1'";
	
	$rowAPERMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPER=$rowAPERMetast[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMetastasisAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2'";
	
	$rowARMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAR=$rowARMetast[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR);		
	
	
}	
echo json_encode($Valores);			
	
	
}else if($APER==1 && $AR==2 && $Hartmann==3){
	

		
	for($meses=0;$meses<=60;$meses++){
	
	
	$sqlValorSeguimientoMesAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='1'";
	
	$rowAPER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAPER=$rowAPER[0];
	
	

	$sqlValorSeguimientoMesMetastasisAPER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='1'";
	
	$rowAPERMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAPER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAPER=$rowAPERMetast[0];
	
	
	$sqlValorSeguimientoMesAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='2'";
	
	$rowAR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoAR=$rowAR[0];
	
	

	$sqlValorSeguimientoMesMetastasisAR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='2'";
	
	$rowARMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisAR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisAR=$rowARMetast[0];
	
	
	
	
	$sqlValorSeguimientoMesHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses' AND Tec_Cir='3'";
	
	$rowHartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoHartmann=$rowHartmann[0];
	
	

	$sqlValorSeguimientoMesMetastasisHartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1' AND Tec_Cir='3'";
	
	$rowHartmannMetast = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasisHartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasisHartmann=$rowHartmannMetast[0];
	

	
$Valores[$meses]=array("SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
				"SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
				"SeguimientoTotalAR"=>$PacientesSeguimientoAR,
				"SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR,
				"SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
				"SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann);		
	
	
}	
mysqli_close($conexion);

echo json_encode($Valores);		
	
	
}

?>