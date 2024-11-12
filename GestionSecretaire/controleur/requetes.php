<?php

include '../../../données/données.php';


$montant_total = $db -> prepare("SELECT *, SUM(prix) as prix FROM payements INNER JOIN payement_ecole on payement_ecole.id_ecolages = payements.id_ecolage where id_etudiant = ? group by payements.id_etudiant");


$nom_ec = $db ->prepare("SELECT * FROM etablissement where id = 1");

$selectionr = $db -> prepare("SELECT * FROM etudiants");

$classe = $db -> prepare("SELECT * FROM classe");
$classe -> execute();

$classet = $db -> prepare("SELECT * FROM classe");
$classet -> execute();

 //classe
$clases = $db -> prepare("SELECT * FROM classe");
$clases -> execute();

$cl_classe = $db -> prepare("SELECT * FROM classe");
$cl_classe -> execute();

$eco = $db ->prepare("SELECT * FROM ecolages WHERE id_classe = ? ");


$pay_eco = $db ->prepare("SELECT * FROM ecolages");
$pay_eco -> execute();

$ecoo = $db ->prepare("SELECT * FROM ecolages");

$utilist = $db -> prepare("SELECT * FROM utilisateurs");
$utilist -> execute();

$utilistrs = $db -> prepare("SELECT * FROM utilisateurs WHERE id=?");
 $utilistrs -> execute(array($_SESSION['utilisateur']['id'])); 



$utilist_respo = $db -> prepare("SELECT * FROM type");
$utilist_respo -> execute();

if(!isset($_GET["class"])){

$etudiants = $db -> prepare("SELECT * FROM etudiants");
$etudiants->execute();
}else{

  $etudiants = $db -> prepare("SELECT * FROM etudiants WHERE etudiants.id_classe=? ");
  $etudiants->execute(array($_GET["class"])); 
   
}




$montant_total = $db -> prepare("SELECT *, SUM(prix) as prix FROM payements INNER JOIN payement_ecole on payement_ecole.id_ecolages = payements.id_ecolage where id_etudiant = ? group by payements.id_etudiant");

if(!isset($_GET["clas"])){

$etudy = $db -> prepare("SELECT *,etudiants.id as id_etudiant, classe.nom as nom_classe, etudiants.nom as nom_etudiant FROM etudiants inner JOIN classe on classe.id = etudiants.id_classe ");
$etudy->execute();

}else{

  $etudy = $db -> prepare("SELECT * FROM etudiants WHERE etudiants.id_classe=? ");
  $etudy->execute(array($_GET["class"])); 
   
}




//classe
if(!isset($_GET["clases"])){

  $etudian = $db -> prepare("SELECT * FROM etudiants");
  $etudian->execute();
  }else{
  
    $etudian = $db -> prepare("SELECT * FROM etudiants WHERE etudiants.id_classe = ? ");
    $etudian->execute(array($_GET["clases"])); 
     
  }

  $sle = $db -> prepare("SELECT * FROM payements");


  // $w = $db->prepare("SELECT * FROM classe INNER JOIN payement_ecole ON id_classe = classe.id
  // INNER JOIN ecolages ON ecolages.id = payement_ecole.id_ecolages INNER JOIN etudiants ON etudiants.id_classe = classe.id WHERE etudiants.id <> ? and id_ecolages <> ?");


  $er = $db->prepare(" SELECT * FROM etudiants
  LEFT JOIN classe ON etudiants.id_classe = classe.id
  JOIN payement_ecole ON payement_ecole.id_classe = classe.id
  JOIN ecolages on ecolages.id = payement_ecole.id_ecolages

    WHERE etudiants.id <> ALL
    (SELECT payements.id_etudiant FROM payements WHERE payements.id_ecolage = ?)
    GROUP BY etudiants.id");




if(isset($_GET['dele'])){

 $montan = $_GET['dele'];
 $delete = $db -> prepare("DELETE FROM ecolages WHERE id = ?");
 $delete ->execute(array($montan));

}

//supp ecolage


if(isset($_GET['id_payement'])){

  $mont = $_GET['id_payement'];
  $delete = $db -> prepare("DELETE FROM payements WHERE payements.id = ?");
  $delete ->execute(array($mont));
  $succés = "Supprimer avec succès";
}


//supp utlisteurs

if(isset($_GET['deletes'])){
$supprimers = $_GET['deletes'];

$supp_resp = $db -> prepare("DELETE FROM utilisateurs WHERE id = ?");
$supp_resp -> execute(array($supprimers));
$succés = "Supprimer avec succès";
}

//supprimer éléve

if(!empty($_POST['ids'])){
  $id = $_POST['ids'];
$delete_eco = $db -> prepare("DELETE FROM payements WHERE  id_etudiant = ?");
$delete_eco->execute(array($id));

  $statement = $db->prepare("DELETE FROM etudiants WHERE id = ?");
  $statement->execute(array($id));

  header("location:#");

}


if(isset($_GET["class"])){

  $id_classe = $_GET["class"];
  $ajout_payement = $db->prepare("SELECT * FROM payement_ecole INNER JOIN ecolages on payement_ecole.id_ecolages = ecolages.id WHERE payement_ecole.id_classe = ? ");
  $ajout_payement -> execute([$id_classe]);
  $a_p = $ajout_payement->FetchAll(PDO::FETCH_ASSOC);
}

if(isset($_GET["payer"])){

  $e_pay = $db-> prepare("SELECT *, payements.id as ref FROM payements INNER JOIN ecolages on ecolages.id = payements.id_ecolage where payements.id_etudiant=? ORDER BY id_ecolage ASC");
  $e_pay -> execute(array($_GET["payer"]));
  $e_ep = $e_pay->FetchAll(PDO::FETCH_ASSOC);

}


$voi_em = $db -> prepare("SELECT * FROM utilisateurs WHERE id = ?");
$voi_em -> execute(array($_SESSION['utilisateur']['id']));







?>



