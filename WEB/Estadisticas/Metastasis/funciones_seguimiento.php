<?php

    

function meses_dif_mayor_km($meses, $Tec_Cir, $Hospital)
{
    $PacientesSeguimiento = 0;
    
    if ($Tec_Cir == null && $Hospital == null)
    {
        for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
        {
           $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i]; 
           if(round($Meses_Dif1)>'$meses')
           {
               $PacientesSeguimiento++;
           }
        }
    }
    else if ($Tec_Cir == null && $Hospital != null)
    {
        for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
        {
            $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i]; 
            $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
            
            if (round($Meses_Dif1)>$meses && $Hospital1==$Hospital)
            {
                $PacientesSeguimiento++;
            }
        }
    } 
    else if ($Tec_Cir != null && $Hospital == null)
    {
        for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
        {
            $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i]; 
            $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
            
            if (round($Meses_Dif1)>$meses && $Tec_Cir1==$Tec_Cir)
            {
                $PacientesSeguimiento++;
            }
        }
        
    }
    else 
    {
        for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
        {
            $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i]; 
            $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
            $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
            
            if (round($Meses_Dif1)>$meses && $Tec_Cir1==$Tec_Cir && $Hospital1==$Hospital)
            {
                $PacientesSeguimiento++;
            }
        }
       
    }
    
    return $PacientesSeguimiento;
}

function meses_dif_igual_km($meses, $Tec_Cir, $B_Metastasis, $Hospital)
{
    $PacientesSeguimiento = 0;
     
    switch (true) { 
        case ($Hospital == null && $Tec_Cir == null && $B_Metastasis != null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
            {
                $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i];
                $B_Metastasis1 = $_SESSION["metastasis_km"]["B_Metastasis"][$i];
    
                if (round($Meses_Dif1)==$meses && $B_Metastasis1==$B_Metastasis)
                {
                    $PacientesSeguimiento++;
                }
            }
            
            break;
        case ($Hospital == null && $Tec_Cir != null && $B_Metastasis == null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
            {
                $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i];
                $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
    
                if (round($Meses_Dif1)==$meses && $Tec_Cir1==$Tec_Cir)
                {
                    $PacientesSeguimiento++;
                }
            }
            
            break;
            
        case ($Hospital != null && $Tec_Cir == null && $B_Metastasis == null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
            {
                $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i];
                $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
    
                if (round($Meses_Dif1)==$meses && $Hospital1==$Hospital)
                {
                    $PacientesSeguimiento++;
                }
            }
            
            break;

       case ($Hospital == null && $Tec_Cir != null && $B_Metastasis != null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
            {
                $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i];
                $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
                $B_Metastasis1 = $_SESSION["metastasis_km"]["B_Metastasis"][$i];
                
                if (round($Meses_Dif1)==$meses && $Tec_Cir1==$Tec_Cir && $B_Metastasis1==$B_Metastasis)
                {
                    $PacientesSeguimiento++;
                }
            }
            break;
            
        case ($Hospital != null && $Tec_Cir != null && $B_Metastasis == null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
            {
                $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i];
                $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
                $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
                
                if (round($Meses_Dif1)==$meses && $Tec_Cir1==$Tec_Cir && $Hospital1==$Hospital)
                {
                    $PacientesSeguimiento++;
                }
            }
            break;
            
        case ($Hospital != null && $Tec_Cir == null && $B_Metastasis != null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
            {
                $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i];
                $B_Metastasis1 = $_SESSION["metastasis_km"]["B_Metastasis"][$i];
                $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
                
                if (round($Meses_Dif1)==$meses && $B_Metastasis1==$B_Metastasis && $Hospital1==$Hospital)
                {
                    $PacientesSeguimiento++;
                }
            }
            break;
        
        default:
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Dif"]); $i++) 
            {
                $Meses_Dif1 = $_SESSION["metastasis_km"]["Meses_Dif"][$i];
                $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
                $B_Metastasis1 = $_SESSION["metastasis_km"]["B_Metastasis"][$i];
                $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
    
                if (round($Meses_Dif1)==$meses && $Tec_Cir1==$Tec_Cir && $B_Metastasis1==$B_Metastasis && $Hospital1==$Hospital)
                {
                    $PacientesSeguimiento++;
                }
            }
            
            break;
    }
    
    return $PacientesSeguimiento;
}


function tabla_seguimiento($meses, $Hospital, $Tec_Cir)
{

    $PacientesSeguimiento = 0;
    switch (true) 
    {
        case ($Hospital == null && $Tec_Cir == null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Seguimiento"]); $i++) 
            {
                $Meses_Seguimiento1 = $_SESSION["metastasis_km"]["Meses_Seguimiento"][$i];
                
                if (round($Meses_Seguimiento1)>=$meses)
                {
                    $PacientesSeguimiento++;
                }
            } 
            break;
            
        case ($Hospital == null && $Tec_Cir != null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Seguimiento"]); $i++) 
            {
                $Meses_Seguimiento1 = $_SESSION["metastasis_km"]["Meses_Seguimiento"][$i];
                $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
                
                if (round($Meses_Seguimiento1)>=$meses && $Tec_Cir1==$Tec_Cir)
                {
                    $PacientesSeguimiento++;
                }
            } 
            break;
            
        case ($Hospital != null && $Tec_Cir == null):
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Seguimiento"]); $i++) 
            {
                $Meses_Seguimiento1 = $_SESSION["metastasis_km"]["Meses_Seguimiento"][$i];
                $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
                
                if (round($Meses_Seguimiento1)>=$meses && $Hospital1==$Hospital)
                {
                    $PacientesSeguimiento++;
                }
            } 
            break;
        
        default:
            for ($i=0; $i < count($_SESSION["metastasis_km"]["Meses_Seguimiento"]); $i++) 
            {
                $Meses_Seguimiento1 = $_SESSION["metastasis_km"]["Meses_Seguimiento"][$i];
                $Hospital1 = $_SESSION["metastasis_km"]["Hospital"][$i];
                $Tec_Cir1 = $_SESSION["metastasis_km"]["Tec_Cir"][$i];
                
                if (round($Meses_Seguimiento1)>=$meses && $Hospital1==$Hospital && $Tec_Cir1==$Tec_Cir)
                {
                    $PacientesSeguimiento++;
                }
            } 
            
            break;
    }

    return $PacientesSeguimiento;
    
}
?>