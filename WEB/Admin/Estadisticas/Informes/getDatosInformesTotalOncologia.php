<?php
session_start();

require_once ('../../../BDD/conexion.php');


$fecha_inicio = $_GET["fecha_inicio"];
$fecha_fin = $_GET["fecha_fin"];


/***************************************
 * Totales
 ***************************************/
 
$sqlPacientesTotal = "SELECT * FROM tabla_estadistica";                   
                       
$rsPacientesTotal = mysqli_query($conexion,$sqlPacientesTotal)
or die('Error: ' . mysqli_error());
    
/***************************************
 * Estadios en totales 
 ***************************************/

/*$sql_T_I_total = "SELECT * FROM tabla_estadistica
                  WHERE HOSPITAL = '$hospital'
                  AND CampoEstadio = 1";
                       
$rs_T_I_total = mysqli_query($conexion,$sql_T_I_total)
or die('Error: ' . mysqli_error());
    
$T_I_total = mysqli_num_rows($rs_T_I_total);




$sql_T_II_total = "SELECT * FROM tabla_estadistica
                   WHERE HOSPITAL = '$hospital'
                   AND CampoEstadio = 2";
                       
$rs_T_II_total = mysqli_query($conexion,$sql_T_II_total)
or die('Error: ' . mysqli_error());
    
$T_II_total = mysqli_num_rows($rs_T_II_total);

$sql_T_III_total = "SELECT * FROM tabla_estadistica
                    WHERE HOSPITAL = '$hospital'
                    AND CampoEstadio = 3";
                       
$rs_T_III_total = mysqli_query($conexion,$sql_T_III_total)
or die('Error: ' . mysqli_error());
    
$T_III_total = mysqli_num_rows($rs_T_III_total);



$sql_T_IV_total = "SELECT * FROM tabla_estadistica
                   WHERE HOSPITAL = '$hospital'
                   AND CampoEstadio = 4";
                       
$rs_T_IV_total = mysqli_query($conexion,$sql_T_IV_total)
or die('Error: ' . mysqli_error());
    
$T_IV_total = mysqli_num_rows($rs_T_IV_total);*/

$T_neo_total = 0;
$T_ady_total = 0;


$T_I_total = 0;
$T_II_total = 0;
$T_III_total = 0;
$T_IV_total = 0;


 
 /****************************************************
 * 
 * ** Oncología **
 * 
 ***************************************************/

$O_T_neo = 0;
$O_T_neo_III = 0;
$O_T_neo_T4 = 0; 
$O_T_ady = 0;
$O_T_ady_I = 0;
$O_T_ady_II = 0;
$O_T_ady_III = 0;
$O_T_ady_IV = 0; 





$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];
    
    
    $sqlHospitalOncologia = "SELECT inicial.Id_Estadio_Radio, tratamiento.B_Tto_Neo, tratamiento.B_Tto_Ady 
                             FROM tratamiento, inicial
                             WHERE tratamiento.Id_Paciente = '$Id_Paciente'
                             AND inicial.Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalOncologia = mysqli_query($conexion,$sqlHospitalOncologia)
    or die('Error: ' . mysqli_error());

    $exite = mysqli_num_rows($rsHospitalOncologia);
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalOncologia=mysqli_fetch_array($rsHospitalOncologia))
        {
            
            switch ($rowHospitalOncologia["Id_Estadio_Radio"]) {
                    
                case 1:
                    //$T_I_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                    {
                        $O_T_ady_I++;
                    }
                    
                    break;
                case 2:
                    //$T_II_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                    {
                        $O_T_ady_II++;
                    }
                    
                    break;
                case 3:
                    //$T_III_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Neo"] == 1)
                    {
                        $O_T_neo_III++;
                    }
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                    {
                        $O_T_ady_III++;
                    }
                    
                    break;
                    
                case 4:
                    //$T_IV_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Neo"] == 1)
                    {
                        $O_T_neo_T4++;
                    }
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                    {
                        $O_T_ady_IV++;
                    }
                    
                    break;
                
                default:
                    
                    break;
            }

            
            
            /*** Neoadyuvancia **/
            if ($rowHospitalOncologia["B_Tto_Neo"] == 1)
            {
                $O_T_neo++;
                $T_neo_total++;
            }
            else 
            {
                $T_neo_total++;
            }
            

            
            /*** Adyuvancia ***/
            if($rowHospitalOncologia["B_Tto_Ady"] == 1)
            {
                $O_T_ady++;
                $T_ady_total++;
            }
            else
            {
                $T_ady_total++;    
            }
            
            
           
        } //Fin while oncología
   
    }//Fin oncología
    
    //Liberamos memoria
    mysqli_free_result($rsHospitalOncologia);


} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);









/*
 * "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

//Fill de array
$a=array(
   
    "O_T_neo"=>number_format((($O_T_neo/$T_neo_total)*100), 2, '.', ''),
    "O_T_neo_III"=>number_format((($O_T_neo_III/$O_T_neo)*100), 2, '.', ''),
    "O_T_neo_T4"=>number_format((($O_T_neo_T4/$O_T_neo)*100), 2, '.', ''),       
    "O_T_ady"=>number_format((($O_T_ady/$T_ady_total)*100), 2, '.', ''),
    "O_T_ady_I"=>number_format((($O_T_ady_I/$O_T_ady)*100), 2, '.', ''),       
    "O_T_ady_II"=>number_format((($O_T_ady_II/$O_T_ady)*100), 2, '.', ''),         
    "O_T_ady_III"=>number_format((($O_T_ady_III/$O_T_ady)*100), 2, '.', ''),        
    "O_T_ady_IV"=>number_format((($O_T_ady_IV/$O_T_ady)*100), 2, '.', '')       
    
    );




mysqli_close($conexion);
 

//output the response
echo json_encode($a);
?>