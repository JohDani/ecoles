<?php

function acceuil($link){
    if($link=="acceuil" OR $link==""){
        echo 'active';
    }
}

function presence($link){
    if($link=="presence"){
        echo 'active';
    }
}
function cours($link){
    if($link=="cours"){
        echo 'active';
    }
}

function classe($link){
    if($link=="classe"){
        echo 'active';
    }
}

function exercice($link){
    if($link=="exercice"){
        echo 'active';
    }
}

function preparation($link){
    if($link=="preparation"){
        echo 'active';
    }
}
?>