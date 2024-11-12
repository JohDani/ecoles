<?php
session_start();
include_once '../../../functions/functions.php';
if(isset($_SESSION["utilisateur"])){

require_once '../../function/function.php';
require_once '../../controleur/dbconnexion.php';


include '../../nav/footer.php';
if(isset($_GET['link'])){
    $link = $_GET['link'];

   if(file_exists("../../pages/".$link.".php")){
     include '../../nav/header.php';
     include "../../pages/".$link.".php";   
     include '../../nav/footer.php';   
   }else{

    if($link ===""){
        include "../../pages/acceuil.php";
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
    locations("../");
}




