<?php

include '../../../données/données.php';


if(isset($_SESSION["classe"])){
    $id_classe = $_SESSION["classe"]["id"];
}


function etudiants($link){
    if($link=="etudiant" OR $link==""){
        echo 'actives';
    }
}

function verification($link){
    if($link=="verification"){
        echo 'actives';
    }
}


function classe($link){
    if($link=="classe"){
        echo 'actives';
    }
}

function responsable($link){
    if($link=="responsable"){
        echo 'actives';
    }
}

function payement($link){
    if($link=="payement"){
        echo 'actives';
    }
}


if(isset($_POST['ajout_ecolages'])){
    $ecolages = $_POST['ecolages'];

    if(!empty($ecolages)){
        $ajout = $db ->prepare("INSERT INTO ecolages(name) VALUES (?)");
        $ajout->execute(array($ecolages));
        $succés = "Ajouter avec succès";
    }else{
        $error = "Ce champ ne peut pas être vide";
    }
}

//ajout class

if(isset($_POST['ajout_class'])){
    $responsables = $_POST['responsable_class'];
    $classess = $_POST['nom_class'];

    if(!empty($responsables) AND !empty($classess)){

        $cl = $db -> prepare("SELECT * FROM classe where nom = ? ");
        $cl -> execute(array($classess));

        if($cl -> rowcount() === 0){
            
            $ajout_classe = $db ->prepare("INSERT INTO classe(Nom,responsable) VALUES (?,?)");
            $ok = $ajout_classe -> execute(array($classess,$responsables));

        
            $cl = $db -> prepare("SELECT * FROM classe where nom = ? ");
            $cl -> execute(array($classess));

            foreach($cl as $c){
                $pai = $db->prepare("INSERT INTO payement_ecole(id_classe, id_ecolages) VALUES(?,?)");
                $pai -> execute(array($c['id'],"1"));
                $pai -> execute(array($c['id'],"2"));

            }
        
            $succés = "Ajouter avec succès";

        }else{
            $error = 'Information existe déjà';
        }
        
    }else{
        $error = "Ce champ ne peut pas être vide";
    }
}


if(isset($_GET["class"])){
    $_SESSION["classe"] = array("id" => $_GET["class"]);
}

if(isset($_POST['ajout_eleve'])){
    $non = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $matricule = $_POST['matricl'];
    $adres = $_POST['adresse'];
    $cla_etudiant = $_POST['clas_eleve'];
    $sexe_etudiant = $_POST['sexes'];

    if(!empty($non AND $prenom AND $matricule AND $adres AND $cla_etudiant)){
        $ajout_etudiant = $db -> prepare("INSERT INTO etudiants(matricule,nom,prenom,adresse,id_classe,sexe) VALUES (?,?,?,?,?,?)");
        $ajout_etudiant -> execute([$matricule,$non,$prenom,$adres,$cla_etudiant,$sexe_etudiant]);
        $succés = "Ajouter avec succès";
    }else{
        $error = "Ce champ ne peut pas être vide";
    }
}



if(isset($_POST['suppr_class'])){
    $supp_classe = $_POST['clas_classe'];

    if(!empty($supp_classe) and $supp_classe !== 0){
    $db = new PDO("mysql:host=localhost;dbname=écoles","root","");

    $sup_clas = $db -> prepare("DELETE FROM classe WHERE classe.id = ?");
    $sup_clas -> execute(array($supp_classe)); 

    $supp_E = $db -> prepare("DELETE FROM etudiants WHERE etudiants.id_classe = ?");
    $supp_E ->execute(array($supp_classe));

    $delete_pa = $db -> prepare("DELETE FROM payements WHERE id_classe = ? ");
    $delete_pa->execute(array($supp_classe));  

    $supp = $db -> prepare("DELETE FROM payement_ecole WHERE payement_ecole.id_classe = ?");
    $supp -> execute(array($supp_classe));
    $succés = "Supprimer avec succès !";
    }else{
        $error = "Veuillez sélectionner la classe";
    }
}


//etudiant payer ecolage

if(isset($_POST["payer"]) or isset($_POST["terminer"])){


    $hoPayena = $_POST["select_payement"];

    $e_pay = $db-> prepare("SELECT * FROM payements INNER JOIN ecolages on ecolages.id = payements.id_ecolage where payements.id_etudiant=? ORDER BY payements.id_ecolage ASC ");
    $e_pay -> execute(array($_GET["payer"]));
    $e_ep = $e_pay->FetchAll(PDO::FETCH_ASSOC);

    $mois = $_POST["mois"];

    $d_pay = $db-> prepare("SELECT * FROM payements where mois=? and payements.id_etudiant=? ORDER BY payements.id_ecolage ASC");
    $d_pay->execute(array($mois, $_GET["payer"]));

        if($hoPayena == 0){
            if(isset($_POST["payer"])){
             $error = "Veuillez sélectionner le payement à payer";        
            }else{
                echo "<script>window.location.href = 'Etudiant'</script>";
            }
        }elseif($hoPayena == 2 and $mois == 0){
            $error = "Veuillez selectionner le mois ";
            }elseif($hoPayena == 2 and $mois !== 0){              
                if($d_pay->rowcount()==0){
                $paye_mois = $db ->prepare("INSERT INTO payements(id_etudiant, id_ecolage, mois, id_classe, id_responsable) VALUES (?,?,?,?,?) ");
                $paye_mois ->execute(array($_GET["payer"],$hoPayena,$mois,$_GET["class"],$_SESSION["utilisateur"]["id"]));
                $succés = "Payée avec succé";
                }else{
                    $error = "Vous avez déjà payé cet écolage";
                }
            }else{

                $d_p = $db-> prepare("SELECT * FROM payements where payements.id_etudiant=? and id_ecolage = ? ");
                $d_p->execute(array($_GET["payer"],$hoPayena));
            

                if($d_p->rowcount() == 0){
                $paye = $db -> prepare("INSERT INTO payements(id_etudiant,id_ecolage, id_classe, id_responsable) VALUES (?,?,?,?) ");
                $paye->execute(array($_GET["payer"],$hoPayena, $_GET["class"],$_SESSION["utilisateur"]["id"]));
                $succés = "Payé avec succé";
            }  else{
                    $error = "Vous avez déjà payé cet écolage";
                }
        }
    }
    
//modifier etudiants

if(isset($_GET['modifier'])){

$list_id = $_GET['modifier'];
$query = $db -> prepare("SELECT * FROM etudiants WHERE id= ?");
$query -> execute([$list_id]);

}
if(isset($_POST['modification'])){
    $matricules = $_POST['matricules'];
    $nons = $_POST['noms'];
    $prenoms = $_POST['preno'];
    $adresss = $_POST['adres'];
    $sex = $_POST['sex'];

    $modification = $db -> prepare("UPDATE etudiants SET matricule = ? , nom = ? , prenom = ? , adresse = ? , sexe = ?");
    $modification -> execute(array($matricules,$nons,$prenoms,$adresss,$sex));
  
    "<script>window.location.href = 'Etudiant'</script>";
    $succés = "Modifier avec succés";
}




if(isset($_POST["modif_p"])){
    $prix = $_POST["modif_prix"];
    $id_ec = $_POST["id_ecolage"];
    $id_cl = $_SESSION["classe"]["id"];

    for($i = 0; $i < count($prix); $i++){
        $req=$db->prepare("UPDATE payement_ecole SET prix = ? where id_classe= ? and id_ecolages=?");
        $values[$i] = array($prix[$i],$id_cl, $id_ec[$i]);
        $req->execute($values[$i]);
        $succés = "Enregistrer avec succés";
    }
    }



//Ajouter une nouveau payement


if(isset($_POST['ajout_payement'])){
$payemnt = $_POST['payements'];
$montan = $_POST['montants'];



if(!empty($payemnt AND $montan)){

   $set_prix = $db -> prepare("SELECT * FROM ecolages WHERE ecolages.name=?");
   $set_prix->execute([$payemnt]);
   

    if($set_prix -> rowcount() == 0 ){


        $insert_ecolage = $db->prepare("INSERT INTO ecolages (ecolages.name) VALUES(?) ");
        $insert_ecolage->execute([$payemnt]);



        $id_ec = $db -> prepare("SELECT * FROM ecolages WHERE ecolages.name=?");
        $id_ec->execute([$payemnt]);

        if($id_ec->rowcount() == 1){
            foreach($id_ec as $io){
                
                $insert_prix = $db->prepare("INSERT INTO payement_ecole (id_ecolages, id_classe, prix) VALUES (?,?,?)");
                $insert_prix->execute(array($io["id"], $_GET["class"], $montan));
                
                $succés = "Crée avec success";
            }
        }else{
            $error = "Une erreur survenue, Veuillez reessayer";
        }

    }else{
        $error = "Payement déjà existé";
    }
 
    }else{
        $error = "Completer les champs";
    }
  
}




//AJOUT RESPOSABLE

if(isset($_POST['inscrire'])){
    $nom_respo = $_POST['noms'];
    $email_respo = $_POST['emai'];
    $mdp = sha1($_POST['mdp']);
    $mdp_confirmation = sha1($_POST['mdp_confirmation']);
    $types = $_POST['types'];
    $tele_resp = $_POST['telephones'];
    $image = checkInput($_FILES["image"]['name']);

    $imagePath = '../../../assets/imageUtilisateur/' . basename($image);
    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess = true;
    $isUploadSuccess = false;

    if(empty($mdp_confirmation)){

        $error = 'Ce champ ne peut pas être vide ';
        $isSuccess = false;
    }
    if(empty($tele_resp)){

        $error = 'Ce champ ne peut pas être vide ';
        $isSuccess = false;
    }
    if(empty($types)){

        $error = 'Ce champ ne peut pas être vide ';
        $isSuccess = false;
    }
    if(empty($nom_respo)){

        $error = 'Ce champ ne peut pas être vide ';
        $isSuccess = false;
    }
    if(empty($email_respo)){

        $error = 'Ce champ ne peut pas être vide ';
        $isSuccess = false;
    }
    if(empty($mdp)){

        $error = 'Ce champ ne peut pas être vide ';
        $isSuccess = false;
    }
    if(empty($image)){

        $error = 'Ce champ ne peut pas être vide ';
        $isSuccess = false;
    }else{

        $isUploadSuccess = true;
        if(strtolower($imageExtension) != "jpg" && strtolower($imageExtension) != "png" && strtolower($imageExtension) != "jpeg" && strtolower($imageExtension) != "gig"){

            $imageError = "Les fichier autorises sont: .jpg, .jpeg, .png, .gif ";
            $isUploadSuccess = false;
        }
        // if(file_exists($imagePath)){

        //     $error = "Le fichier existe deja";
        //     $isUploadSuccess = false;
        // }
        if($_FILES['image']['size'] > 50000000){

            $error = "Le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess){

            if(!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)){

                $error = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }
    if($isSuccess && $isUploadSuccess){

        if($mdp == $mdp_confirmation){
            $sel_email = $db -> prepare("SELECT * FROM utilisateurs WHERE email = ?");
            $sel_email -> execute([$email_respo]);
        if($sel_email -> rowcount() == 0 ){
            $db = new PDO("mysql:host=localhost;dbname=écoles","root","");
            $req_respo = $db -> prepare("INSERT INTO utilisateurs(names,email,mdp,type,tel,images) VALUES (?,?,?,?,?,?)");
            $req_respo -> execute(array($nom_respo, $email_respo, $mdp, $types, $tele_resp, $image));
            $succés = "Utilisateur ajouté avec succès";
        }else{
            $error = "E-mail déjà existé";
        }
      
    }else{
        $error = "Mot de passe de confirmation incorrect";
    }

    }
}

function checkInput($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if(isset($_POST['enregistrers'])){
    $nom_ecoles = $_POST['ecol'];
    $selct = $db ->prepare("UPDATE etablissement SET name = ? where id = 1");
    $selct ->execute(array($nom_ecoles));
    $nom_eco = $db ->prepare("SELECT * FROM etablissement where id = ?");
    if($nom_eco ->rowcount()==0){
        $inse = $db ->prepare("INSERT INTO etablissement (name) VALUES (?)");
        $inse ->execute([$nom_ecoles]);
        $succés = "Enregistrer avec succès";
    }
}





if(isset($_POST['parametre'])){
    $email = $_POST['emaill'];
    $mdp = sha1($_POST['mdp']);
    $nouv_mdp = sha1($_POST['nouv_mdp']);
    $conf_mdp = sha1($_POST['conf_mdp']);

    $sel_mdp = $db -> prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $sel_mdp ->execute(array($_SESSION['utilisateur']['id']));

    foreach($sel_mdp as $y){

        if($mdp == $y['mdp']){
            if($nouv_mdp == $conf_mdp){
               $mod_param = $db -> prepare("UPDATE utilisateurs SET mdp = ?,email = ? WHERE id = ?");
               $mod_param -> execute(array($nouv_mdp,$email,$_SESSION['utilisateur']['id']));
               $succés = "Modification réussie";
            }else{
                $error = "Mot de passe de confirmation incorrect";
            }
        }else{
            $error = "Mot de passe incorrect";
        }
        
    }

}





if(isset($_POST['valider'])){
    $pdp = array("tmp"=>$_FILES['pdp']["tmp_name"], "nom"=> $_FILES['pdp']["name"]);
    move_uploaded_file($pdp["tmp"] , "../../../assets/imageUtilisateur/".$pdp["nom"]);

    if(!empty($pdp['nom'])){
        $mod = $db -> prepare("UPDATE utilisateurs SET images = ? WHERE id = ?");
        $mod -> execute(array($pdp['nom'],$_SESSION['utilisateur']['id']));
        $_SESSION["utilisateur"]["sary"] = $pdp['nom'];
        $succés = 'Enregistrer avec succés';
    }
 
}