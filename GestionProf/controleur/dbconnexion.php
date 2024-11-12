<?php


try{
    $db = new PDO("mysql:host=localhost;dbname=ecoles;charset=utf8","root","");

}
catch(PDOException $e){
    $db=null;
}



