<?php
session_start();

if(isset($_SESSION["utilisateur"])){

include_once '../../../functions/functions.php';
require_once '../../function/function.php';
require_once '../../controleur/requetes.php';


include '../../nav/footer.php';
if(isset($_GET['link'])){
    $link = $_GET['link'];
 include '../../nav/header.php';
   if(file_exists("../../pages/".$link.".php")){
     include '../../nav/header.php';
     include "../../pages/".$link.".php";   
     include '../../nav/footer.php';   
   }else{

    if($link ===""){
        include "../../pages/etudiant.php";
        include '../../nav/header.php';
        include '../../nav/footer.php';
    }else{
        include "../../pages/404.php";
        include "../../nav/header.php";
        include '../../nav/footer.php';
    }
   }
}
}else{
    header("location: ../");
}

include '../../nav/footer.php';



