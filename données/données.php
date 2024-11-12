<?php

    try{

        $db = New PDO("mysql: host=localhost; dbname=écoles;charset=utf8","root","");
        $utilisateur = $db-> prepare("SELECT * FROM utilisateurs where email = ? and mdp = ? ");

    }catch(PDOException){
        die("db introuvable");
    }

?>