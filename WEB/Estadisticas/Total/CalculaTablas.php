<?php
session_start();

//Variable que se usa para pasar por seguimiento, recidiva y metastasis y crear el total

$_SESSION["Total"]=1;

header("Location: ../Metastasis/CalculaMetastasis.php");	
