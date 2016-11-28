<?php
session_start();

require_once ('../../BDD/conexion.php');

$nombre_hospital = $_SESSION["NombreHospital"];

$sqlHospital = "SELECT Codigo FROM tabla_hospital
                WHERE Nombre = '$nombre_hospital'";
                       
$rsHospital = mysqli_query($conexion,$sqlHospital)
or die('Error: ' . mysqli_error());
    
$exite = mysqli_num_rows($rsHospital);

$hospital = 0;
    
if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
{
    while($rowHospital=mysqli_fetch_array($rsHospital))
    {
        $hospital = $rowHospital["Codigo"];
    }
}



$numero_pacientes = 0;
    
$reseccion_local_pos2_n = 0;
    
$reseccion_recto_pos2_n = 0;
    
$no_resectivos_pos2_n = 0;


$proctocolectomia_pos3_n = 0;
$exent_pelvica_pos3_n = 0;

$res_curativa_pos3_n = 0;


$res_paliativa_pos3_M1 = 0;
$res_paliativa_pos3_M0_R2 = 0;



$sqlHospitalInicial = "SELECT ID FROM identificador_paciente
                       WHERE Id_Hospital = '$hospital'"; 

$rsHospitalInicial = mysqli_query($conexion,$sqlHospitalInicial)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalInicial=mysqli_fetch_array($rsHospitalInicial))
{
    $Id_Paciente=$rowHospitalInicial['ID'];
    
    
    $sqlHospitalCirugia = "SELECT ID FROM cirugia
                           WHERE Id_Paciente = '$Id_Paciente'
                           AND B_Cirugia = 1";
                       
    $rsHospitalCirugia = mysqli_query($conexion,$sqlHospitalCirugia)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalCirugia);
    
    $Id_Cirugia = -1;
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalCirugia=mysqli_fetch_array($rsHospitalCirugia))
        {
            $Id_Cirugia = $rowHospitalCirugia["ID"];
        }
        mysqli_free_result($rsHospitalCirugia);             
    }
    
    if ($Id_Cirugia > -1)
    {
        $sqlHospitalTablaCirugia = "SELECT Id_Tecnica FROM tabla_cirugia
                                    WHERE Id_Cirugia = '$Id_Cirugia'";
                               
        $rsHospitalTablaCirugia = mysqli_query($conexion,$sqlHospitalTablaCirugia)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugia);
        
        if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
        {
            while($rowHospitalTablaCirugia=mysqli_fetch_array($rsHospitalTablaCirugia))
            {
                switch (intval($rowHospitalTablaCirugia["Id_Tecnica"])) 
                {
                    case 1:
                        $reseccion_local_pos2_n++;
                        $numero_pacientes++;
                        break;
                    case 5:
                        $proctocolectomia_pos3_n++;
                        $numero_pacientes++;
                        break;
                    case 7:
                        $no_resectivos_pos2_n++;
                        $numero_pacientes++;
                        break;
                    case 8:
                        $no_resectivos_pos2_n++;
                        $numero_pacientes++;
                        break;
                    case 9:
                        $exent_pelvica_pos3_n++;
                        $numero_pacientes++;
                        break;
                    default:
                        $reseccion_recto_pos2_n++;
                        $numero_pacientes++;
                        break;
                }
            }
        
            mysqli_free_result($rsHospitalTablaCirugia);
        }
        
        
        
    }
    
    
    $sqlHospitalAnatPatol = "SELECT Id_M, Id_Tipo_Res FROM anatomia_patologica
                             WHERE Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalAnatPatol = mysqli_query($conexion,$sqlHospitalAnatPatol)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalAnatPatol);
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalAnatPatol=mysqli_fetch_array($rsHospitalAnatPatol))
        {
            
           
            
            switch ($rowHospitalAnatPatol['Id_M']) 
            {
                case 2: //M1
                    $res_paliativa_pos3_M1++;
                    break;
                case 3: //M0
                    if($rowHospitalAnatPatol['Id_Tipo_Res'] == 3)
                    {
                        $res_paliativa_pos3_M0_R2++;
                    }
                    break;
                default:
                    
                    break;
            }
           
            
        }//Fin while anatomía patológica
          
    }//Fin anatomía patológica

    mysqli_free_result($rsHospitalAnatPatol);
    
    
    
    
} //Fin Inicial
  
mysqli_free_result($rsHospitalInicial);



$res_curativa_pos3_n = $reseccion_recto_pos2_n - $res_paliativa_pos3_n - $proctocolectomia_pos3_n - $exent_pelvica_pos3_n;


/*if ($numero_pacientes == 0)
{
    $numero_pacientes = 1;
    $reseccion_recto_pos2_n = 1;
}*/


/*
 *  "R_H_rm_eco"=>number_format((($R_H_rm_eco/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),
    "R_H_rm"=>number_format((($R_H_rm/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),*/

//Fill de array
$a=array(
   
    "numero_pacientes"=>$numero_pacientes,
    //"numero_pacientes"=>$hospital,
    
    
    "reseccion_local_pos2_n"=>$reseccion_local_pos2_n,
    "reseccion_local_pos2_p"=>number_format((($reseccion_local_pos2_n/$numero_pacientes)*100), 2, '.', ''),
    
    "reseccion_recto_pos2_n"=>$reseccion_recto_pos2_n,
    "reseccion_recto_pos2_p"=>number_format((($reseccion_recto_pos2_n/$numero_pacientes)*100), 2, '.', ''),
    
    "no_resectivos_pos2_n"=>$no_resectivos_pos2_n,
    "no_resectivos_pos2_p"=>number_format((($no_resectivos_pos2_n/$numero_pacientes)*100), 2, '.', ''),
    
    
    "proctocolectomia_pos3_n"=>$proctocolectomia_pos3_n,
    "proctocolectomia_pos3_p"=>number_format((($proctocolectomia_pos3_n/$reseccion_recto_pos2_n)*100), 2, '.', ''),
    "exent_pelvica_pos3_n"=>$exent_pelvica_pos3_n,
    "exent_pelvica_pos3_p"=>number_format((($exent_pelvica_pos3_n/$reseccion_recto_pos2_n)*100), 2, '.', ''),
    
    "res_curativa_pos3_n"=>$res_curativa_pos3_n,
    "res_curativa_pos3_p"=>number_format((($res_curativa_pos3_n/$reseccion_recto_pos2_n)*100), 2, '.', ''),  
    
    "res_paliativa_pos3_n"=>$res_paliativa_pos3_M1 + $res_paliativa_pos3_M0_R2,
    "res_paliativa_pos3_p"=>number_format(((($res_paliativa_pos3_M1 + $res_paliativa_pos3_M0_R2)/$reseccion_recto_pos2_n)*100), 2, '.', ''),
    
    "res_paliativa_pos3_M1"=>$res_paliativa_pos3_M1,
    "res_paliativa_pos3_M0_R2"=>$res_paliativa_pos3_M0_R2
    
    );



mysqli_close($conexion);
 


//output the response
echo json_encode($a);
?>