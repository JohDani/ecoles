<?php

include '../../../données/données.php';

function etudiants($link){
    if($link=="etudiant" OR $link==""){
        echo 'active';
    }
}

function verification($link){
    if($link=="verification"){
        echo 'active';
    }
}


function classe($link){
    if($link=="classe"){
        echo 'active';
    }
}


function facturation($link){
    if($link=="facturation"){
        echo 'active';
    }
}

//changer classe

if (isset($_POST["enregistrer"])) {

$cls = $db ->prepare("SELECT * FROM classe");
$cls ->execute();
if($cls ->rowcount() == 0){
$error = "Vous devez ajouté une classe";
}else{
   $select_class = $_POST["select_class"]; 
   if(!empty($_POST["selection"])){

        $selections = $_POST["selection"];

        for ($i=0; $i <count($selections) ; $i++) { 
          $query = $db->query("UPDATE etudiants SET id_classe = {$select_class} WHERE id = {$selections[$i]}");
          $detete = $db->query("DELETE FROM payements WHERE id_etudiant = {$selections[$i]}");
            // header("location: ")
            echo "<script>
        var locationss = window.location;
        window.location.href = locationss;
       </script>";
        }
       
      }else{
        $error = "Vous devez choisir au moins un étudiant";
      } 
}
      
}






if(isset($_POST['ajout_ecolages'])){
    $ecolages = $_POST['ecolages'];

    if(!empty($ecolages)){
        $ajout = $db ->prepare("INSERT INTO ecolages(name) VALUES (?)");
        $ajout->execute(array($ecolages));
        $succés = "Ajouté avec succès";
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
        
            $succés = "Ajouté avec succès";
            echo "<script>window.location.href = 'Etudiant'</script>";
        }else{
            $error = 'Cette classe existe déjà ';
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
    $telephone = $_POST["telephone"];
    $imgs = array("tmp" => $_FILES['imgs']['tmp_name'], "nomss" => $_FILES['imgs']['name']);
    move_uploaded_file($imgs["tmp"] , "../../../assets/eleves/".$imgs["nomss"]); 

    if(!empty($non AND $prenom AND $matricule AND $adres AND $cla_etudiant AND $telephone AND $imgs)){
$matr = $db -> prepare("SELECT * FROM etudiants WHERE matricule = ?");
$matr -> execute(array($matricule));
if($matr -> rowcount() == 0){
      $ajout_etudiant = $db -> prepare("INSERT INTO etudiants(matricule,nom,prenom,adresse,id_classe,sexe,telephone,images) VALUES (?,?,?,?,?,?,?,?)");
        $ajout_etudiant -> execute(array($matricule,$non,$prenom,$adres,$cla_etudiant,$sexe_etudiant,$telephone,$imgs['nomss']));
         echo "<script>
        var locationss = window.location;
        window.location.href = locationss;
       </script>";
      $succés = "Ajouté avec succès";

}else{
    $error = "Matricule existe déjà";
}

    }else{
        $error = "Ce champ ne peut pas être vide";
    }
}else{
    
    unset($_SESSION["succ"]);
}



if(isset($_POST['suppr_class'])){
    $supp_classe = $_POST['clas_classe'];

    foreach($supp_classe as $o){
        if(!empty($o) and $o !== 0){
    $db = new PDO("mysql:host=localhost;dbname=écoles","root","");

    $sup_clas = $db -> prepare("DELETE FROM classe WHERE classe.id = ?");
    $sup_clas -> execute(array($o)); 

    $supp_E = $db -> prepare("DELETE FROM etudiants WHERE etudiants.id_classe = ?");
    $supp_E ->execute(array($o));

    $delete_pa = $db -> prepare("DELETE FROM payements WHERE id_classe = ? ");
    $delete_pa->execute(array($o));

    $eco = $db -> prepare("DELETE FROM ecolages WHERE id_classe=?");
    $eco -> execute([$o]);

    $supp = $db -> prepare("DELETE FROM payement_ecole WHERE id_classe = ?");
    $supp -> execute(array($o));

    $succés = "Supprimé avec succès";
    echo "<script>window.location.href = 'Etudiant'</script>";
    }else{
        $error = "Veuillez séléctionner une classe";
    }
    }

    
}

if(isset($_POST["payer"]) or isset($_POST["terminer"])){


    $hoPayena = $_POST["select_payement"];

    $e_pay = $db-> prepare("SELECT * FROM payements INNER JOIN ecolages on ecolages.id = payements.id_ecolage where payements.id_etudiant=? ORDER BY payements.id_ecolage ASC ");
    $e_pay -> execute(array($_GET["payer"]));
    $e_ep = $e_pay->FetchAll(PDO::FETCH_ASSOC);

    $mois = $_POST["mois"];

    $d_pay = $db-> prepare("SELECT * FROM payements where mois=? and payements.id_etudiant=? ORDER BY payements.id_ecolage ASC");
    foreach($mois as $c){  
    $d_pay->execute(array($c, $_GET["payer"]));

        if($hoPayena == 0){
            if(isset($_POST["payer"])){
             $error = "Veuillez sélectionner le payement ";        
            }else{
                echo "<script>window.location.href = 'Etudiant'</script>";
            }
        }elseif($hoPayena == 2 and $c == 0){
            $error = "Veuillez sélectionner le mois !";
            }elseif($hoPayena == 2 and $c !== 0){

                
                if($d_pay->rowcount()==0){
                $paye_mois = $db ->prepare("INSERT INTO payements(id_etudiant, id_ecolage, mois, id_classe,id_responsable) VALUES (?,?,?,?,?) ");
                $paye_mois ->execute(array($_GET["payer"],$hoPayena,$c,$_GET["class"],$_SESSION['utilisateur']['id']));
                // $succés = "Payée avec succés";
                $_SESSION['success'] = "Payé avec succès";
                header("location:#");
                
                }else{
                    $error = "Vous avez déjà payé cet écolage";
                }
               

            }else{

                $d_p = $db-> prepare("SELECT * FROM payements where payements.id_etudiant=? and id_ecolage = ? ");
                $d_p->execute(array($_GET["payer"],$hoPayena));
            

                if($d_p->rowcount() == 0){
                $paye = $db -> prepare("INSERT INTO payements(id_etudiant,id_ecolage, id_classe, id_responsable) VALUES(?,?,?,?) ");
                $paye->execute(array($_GET["payer"],$hoPayena, $_GET["class"], $_SESSION["utilisateur"]["id"]));
                $succés = "Payé avec succeés";
                echo "<script>
                var locationss = window.location;
                window.location.href = locationss;
               </script>";
            }  else{
                    $error = "Vous avez déjà payé cet écolage";
                }
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
        $tel = $_POST['tele'];
        $ima = array("tmp" => $_FILES['imaget']['tmp_name'], "noms" => $_FILES['imaget']['name']);
        move_uploaded_file($ima["tmp"] , "../../../assets/eleves/".$ima["noms"]); 

        if(!empty($ima['noms'])){
            $modification = $db -> prepare("UPDATE etudiants SET images = ?, matricule = ? , nom = ? , telephone = ? , prenom = ? , adresse = ? , sexe = ? WHERE id = ?");
            $modification -> execute(array( $ima['noms'], $matricules,$nons,$tel,$prenoms,$adresss,$sex,$_GET['modifier']));
            $_SESSION["success"] ="modifier avec succés";
           
        }else{
            $error = "Sélectionner un nouveau image";
        }
   
    }






    

////modifier prix


if(isset($_POST["modif_p"])){
    $prix = $_POST["modif_prix"];
    $id_ec = $_POST["id_ecolage"];
    $id_cl = $_SESSION["classe"]["id"];

    for($i = 0; $i < count($prix); $i++){
        $req=$db->prepare("UPDATE payement_ecole SET prix = ? where id_classe= ? and id_ecolages=?");
        $values[$i] = array($prix[$i],$id_cl, $id_ec[$i]);
        $req->execute($values[$i]);
        $succés = "Enregistrer avec succès";
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


        $insert_ecolage = $db->prepare("INSERT INTO ecolages (ecolages.name,ecolages.id_classe) VALUES(?,?) ");
        $insert_ecolage->execute(array($payemnt,@$_GET['class']));



        $id_ec = $db -> prepare("SELECT * FROM ecolages WHERE ecolages.name=?");
        $id_ec->execute([$payemnt]);

        if($id_ec->rowcount() == 1){
            foreach($id_ec as $io){
                
                $insert_prix = $db->prepare("INSERT INTO payement_ecole (id_ecolages, id_classe, prix) VALUES (?,?,?)");
                $insert_prix->execute(array($io["id"], $_GET["class"], $montan));
                
                $succés = "Créé avec succès";
            }
        }else{
            $error = "Une erreur survenue, Veuillez reessayer";
        }

    }else{
        $error = "Cette paiement est déjà existé";
    }
 
    }else{
        $error = "Ce champ ne peut pas être vide";
    }
  
}


///pdp ou profil secretaire

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
               $mod_param = $db -> prepare("UPDATE utilisateurs SET mdp = ?, email = ? WHERE id = ?");
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









?>