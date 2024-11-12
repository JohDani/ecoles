<?php
session_start();

include_once "données/données.php";
include_once "functions/functions.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion - connexion</title>
</head>
<body>
   <link rel="stylesheet" href="GestionEcoles/nav/assets/bootstrap/css/bootstrap.min.css">    


  
<div class="l-form shadow-sm">    
    <form action="" class="form shadow-sm  border border-info" method="post">
        <h1 class="form_title text-center text-info">Connexion</h1>
        <div class="form_div">
            <input type="text" class="form_input" placeholder=" " name="email">
            <label for="" class="form_label font-weight-bold fw-bold">E-mail</label>
        </div>
        <div class="form_div">
            <input type="password" class="form_input" placeholder=" " name="mdp">
            <label for="" class="form_label font-weight-bold fw-bold">Password</label>
        </div>
        <input type="submit" class="form_button btn btn-outline-info" value="Se connecter" name="connexion">
        <div class="alert-danger text-center px-3 mt-4">
        <?php
         echo @$error;
        ?>
        </div>
    </form>   
</div>



</body>
</html>
<script>

document.body.className += "js-loading";    

    window.addEventListener("load", showPage, false);

function showPage(){

   // alert("Bienvenu");
   document.body.className = document.body.className.replace("js-loading", "");
}


</script>
<style>
*,::before,::after{
box-sizing: border-box;
}
body{
    margin: 0;
    padding: 0;
    font-family: var(--normal-font-size);
  
}
h1{
    margin: 0;
}

.l-form{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.form{
    width: 360px;
    padding:  2rem 2rem;
    border-radius: 1rem;
    box-shadow: 0 25px 25px rgba(92,99,105,.2);
}
.form_title{
    font-weight: 400;
    margin-bottom: 3rem;
}
.form_div{
    position: relative;
    height: 48px;
    margin-bottom: 1.5rem;
}
.form_input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: var(--normal-font-size);
    border: 1px solid #cdc2c2;
    border-radius: .5rem;
    outline: none;
    padding: 1rem;
    background: none;
    z-index: 1;
}
.form_label{
    position: absolute;
    left: 1rem;
    top: 1rem;
    padding: 0 .25rem;
    background-color: #fff;
    color: var(--normal-font-size);
    transition: .3s;
}
.form_button{
    display: block;
    margin-left: auto;
    padding: .60rem 2rem;
    outline: none;
    
    font-size: var(--normal-font-size);
    border-radius: .5rem;
    cursor: pointer;
    transition: .3s;
}

.form_input:focus + .form_label{
    top: -.5rem;
    left: .8rem;
    color: #0cd5f4;
    font-size: var(--small-font-sieze);
    font-weight: 500;
    z-index: 10;
}
.form_input:not(:placeholder-shown).form_input:not(:focus) + .form_label{
    top: -.5rem;
    left: .8rem;
   
    font-size: var(--small-font-sieze);
    z-index: 10;
}
.form_input:focus{
    border: 1.5px solid #0cd5f4 ;
}
</style>

<?php

?>

