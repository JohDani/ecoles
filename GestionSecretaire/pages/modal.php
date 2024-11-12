<!-- PAGE CLASSES --><!-- PAGE CLASSES --><!-- PAGE CLASSES -->

 <!--supprimer classe-->
   
 <div id="supprimerclasse" class="modal fade" >     
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header mb-0">        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> 
      <h4 class="modal-title text-center alert-danger py-2 mb-3"><i>Supprimer Classe</i></h4>                               
            <form action="" method="post" class="user container col-sm-8"> 
            <select id="s" class="text-center form-control" name="clas_classe[]">
                <option value="0">Selectionner </option>
                <?php foreach($cl_classe as $d):?>
                    <option value="<?= $d['id']?>"><?= $d['Nom']?></option>
                <?php endforeach;?>
            </select>  
            <div class="mt-3 border col-sm-12 py-2 border-5"><input type="checkbox" name="" id="c"> Séléction multiple</div> 
        <div class="modal-footer text-center justify-content-center mt-5">
            <button type="submit" class="btn btn-outline-danger text-center pr-4" name="suppr_class"><span class="bi bi-trash-fill ml-2"></span> Supprimer</button>
        </div>
        </div>
</div>
                </form>
</div>



<script>
    var check = document.getElementById("c");
    var selection = document.getElementById("s");                                  

    c.onchange = function(){

        // selection.setAttribute("multiple");
        if(selection.hasAttribute("multiple")){
            selection.removeAttribute("multiple");
        }else{
            selection.setAttribute("multiple","true");
            // selection[0].remove;
        }
    };

</script>



                <!-- MESSAGE D' erreur -->


                <?php if(isset($error)){ ?>
<div class="aler" style="display: flex; justify-content:center; width:100%; height:100vh;position:absolute;top:0;z-index:5;backdrop-filter: contrast(70%);">

<div id="myModal" class="mt-5">
  <div class="modal-dialog mt-5">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close alert_close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body mb-3 px-5">
        <h4 class="text-danger"><span><i><?=$error?></i></span></h4>
        <h1 class="text-danger text-center mt-3"><span class="bi bi-exclamation-triangle"></span></h1>
      </div>
    </div>
  </div>
</div>
            </div>
<?php }?>






<?php if(isset($succés) OR isset($_SESSION['success'])){ ?>
<div class="aler" style="display: flex; justify-content:center; width:100%; height:100vh;position:absolute;top:0;z-index:5;backdrop-filter: contrast(60%);">

<div id="myModal" class="mt-5">
  <div class="modal-dialog mt-5">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close alert_close text-dark" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body  mb-3 px-5">
        <h4 class="text-success"><span><i><?php echo @$succés;
        echo @$_SESSION['success'];

        unset($_SESSION["success"]);
        ?></i></span>
        
    </h4>

        <h1 class="text-center"><span class="bi bi-check-circle text-success "></span></h1>
      </div>
      
    </div>
  </div>
</div>
            </div>
<?php }?>
<!-- fin  -->




        <!-- Ajouter Ecolage -->

<div id="Ajoutecolage" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="text-center text-secondary mx-2 lis m-0 p-0">
        <?php
            if(isset($_GET["nom_classe"])){
                echo $_GET["nom_classe"];
            }
        ?>
      </h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
     <h4 class="text-center text-info py-2 lis font-style-italic">Les informations des paiements</h4>
  
     <table class="table-responsive justify-content-center align-items-center container table">
            <thead>
                <tr class="text-center table table-bordered alert-info">
                    <th>Type</th>
                    <th>Montant</th>
                    <th class="px-5">Action</th>
                </tr>
            </thead> 
            <tbody>
                
            <?php 

            foreach($a_p as $a):?>
    <form action="" method="post">
                <tr class="text-dark text-center font-weight-bold table-bordered table-striped border border-5">                   
                    <td><?=$a["name"]?></td> 
                    <td>
                        <input type="text" value="<?=$a["prix"];?>" class="form-control" name="modif_prix[]">
                    </td> 
                    <td>
                        <div class="btn-group">
                            <input type="hidden" value="<?=$a["id_ecolages"];?>" name="id_ecolage[]">
                            <button onclick="(redirige('modifier_prix'))"name="modif_p[]" class="fa fa-check-circle btn btn-outline-dark text-success rounded"></button>&nbsp;
                            <a href="etudiant?dele=<?=$a["id"];?>"  class="fa <?php if($a["id"]== 1 or $a["id"]==2):?>d-none<?php endif;?> fa-trash-alt btn rounded btn-outline-danger"></a>
                        </div>
                    </td>                   
                </tr>
    <form>            
            <?php endforeach;?>
                <!---tsy fafana Ajouter Ecolage---->
            <form action="" method="post">
                <tr>
                    <td>
                        <input type="text" class="form-control col-md-12" placeholder="Payement..." name="payements">
                    </td>
                    <td>
                        <input type="text" class="form-control col-md-12" placeholder="montant..." name="montants">
                    </td>
                    <td class="px-5">
                        <div class="btn-group">
                            <button type="submit" class="fa fa-check-circle btn btn-outline-dark text-success" name="ajout_payement"></button>                           
                        </div>
                    </td> 
                </tr>
            </form>
            </tbody>
        </table>
      <div class="modal-body container-fluid">
       <div class="justify-content-center align-items-center mx-1">
        
       </div>
      </div>
    </div>
  </div>
</div>





        <!---etudiant Paye payement / ecolage -->

<?php if(isset($_GET["payer"])):?>
<div class="md" id="m_a" style="display: flex; justify-content:center; width:100%; height:100vh;position:absolute;top:0;z-index:2;backdrop-filter: contrast(60%);" >
<div id="Payement" class="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="closess close" data-dismiss="modal">&times;</button>
      </div>
      <h4 class="text-center"><span class="text-info lis">Matricule:</span> <i class="text-secondary non"><?=@$_GET["matricule"]?></i></h4>
      <div class="justify-content-start align-items-center modal-body mx-5">
            <table class="table-responsive  table">
                <thead class="table-bordered alert-info table-striped border">
                    <tr>
                        <th>Type</th> 
                        <th class="ml-5">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                foreach($e_ep as $paye):
      
                    ?>
                    <tr class="table table-striped table-bordered bg-light">   
                        <td class="">
                            <?php if($paye["id_ecolage"] !== 2 ){echo $paye["name"]." ";}; echo "<span class='listt' style='font-size: 20px;''>";transform($paye["mois"]); echo "</span>";?>
                        </td>                                                
                        <td>
                            <div class="btn-group">                                
                                <a href="#" class="btn btn-outline-dark text-success  rounded fa fa-check-circle"></a>&nbsp;
                                <a href="etudiant?class=<?=@$paye['id_classe']?>&&id_payement=<?=@$paye['ref'];?>" class="btn rounded btn-outline-danger fa fa-trash-alt"></a>
                            </div>
                        </td>                       
                    </tr>
                <?php endforeach;?>
              

                <script>
                    var c = document.querySelector(".closess");
                    var m = document.getElementById("m_a");

                    c.onclick = function(){
                        m.style.display = "none";
                    }
                </script>
        <!---tsy fafana Ajouter le payement ecolage d'eleves--->                
                    <tr>
                        <td>
                <form  action="" method="post">
                    <input type="hidden" name="respb" value="<?=$_SESSION["utilisateur"]["id"]?>">
                        <?php ?>
                        <div class="input-group">
                            <select name="select_payement" id="select_payement" class="form-control">
                                <option value="0">-Paiement-</option>
                        <?php foreach($a_p as $payem):?>
                                <option value="<?=$payem["id_ecolages"]?>"><?=$payem["name"]?></option>
                        <?php endforeach;?>    
                        </select>

                            <select multiple name="mois[]" id="mois" class="form-control" style="display: none;height: 180px;">
                                <option value="0" selected>-Mois-</option>
                                <option value="1" >Janvier</option>
                                <option value="2">Fevrier</option>
                                <option value="3">Mars</option>
                                <option value="4">Avril</option>
                                <option value="5">Mai</option>
                                <option value="6">Jun</option>
                                <option value="7">Juillet</option>
                                <option value="8">Aout</option>
                                <option value="9">Septembre</option>
                                <option value="10">Octobre</option>
                                <option value="11">Novembre</option>
                                <option value="12">Decembre</option>
                            </select>
                        </div>
                       
                        </td>
                        <td>
                            <div class="button-group">
                                <button type="submit" name="payer" class="btn btn-outline-dark text-success fa fa-check-circle"></button>
                            </div>
                        
                        </td>               
                    </tr>                    
                </tbody>
            </table>
        </div>
        <div class="modal-footer text-center justify-content-center">
            <button type="submit" name ="terminer" class="btn btn-info text-center px-5"><i class="bi-check-circle bi"></i> Terminer</button>
        </div>
        </form>        
    </div>

  </div>
</div>
</div>

<script>
    var payement = document.getElementById("select_payement");
    payement.onchange = function(){   


        var mois = document.getElementById("mois");
        if(payement.value == 2){
            mois.style.display = "block";
        }else{
            mois.style.display = "none";
        }
        // mois.style.display="block";
        
    }
</script>
<?php endif;?>
<!----fin--->





        <!---Ajouter une éléves--->

<div id="ajouterEtudiant" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <h4 class="py-2 alert-info text-uppercase text-center lis">Nouvelle étudiant</h4>
            <form action="" method="post" class="user mt-4" enctype="multipart/form-data">                   
                <div class="form-group row">
                    <input type="hidden" value="<?php if(isset($_GET["class"])){echo $_GET["class"];}?>" name="clas_eleve">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input class="form-control form-control-user" type="text" placeholder="Nom" name="nom">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control form-control-user" type="text" placeholder="Prénom" name="prenom">
                    </div>
                </div>                       
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input class="form-control form-control-user" type="text" placeholder="Matricule" name="matricl">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control form-control-user" type="text" placeholder="Adresse" name="adresse">
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" type="text" placeholder="Téléphone" name="telephone">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-1">
                        <h6 class="text-success ml-2">
                            <select class="form-control  custom-selec col-sm-12" name="sexes">
                                <option value="Feminun">Feminun</option>
                                <option value="Masculin" selected="">Masculin</option>
                            </select>&nbsp;
                        </h6>
                    </div>     
                    <div class="col-sm-6 col-md-6">
                        <input class="form-control text-center mt-3" disabled type="text" value="<?php if(isset($_GET["nom_classe"])){ echo $_GET["nom_classe"];  }  ?>">
                    </div> 
                       <div class="m-0 p-0">
                    <input type="file" name="imgs" class="px-5">  
                </div>                                             
                </div>                 
                <div class="modal-footer text-center justify-content-center mt-2 text-dark">
                    <button type="submit" class="btn btn-outline-info text-center px-5 lis" name="ajout_eleve"><span class="bi bi-person-plus"></span> Enregistrer</button>
                </div>
            </form>
    </div>
  </div>
</div>



            <!-- Ajouter classe -->

<div id="ajoutclasse" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <h4 class="text-center py-2 alert-info lis">Nouvelle Classe</h4>
    
      <form action="" method="post" class="user">
        <div class="form-group row mt-2">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input class="form-control form-control-user" type="text" placeholder="Nom du Classe" name="nom_class">
            </div>
            <div class="col-sm-6">
                <input class="form-control form-control-user" type="text" placeholder="Résponsable" name="responsable_class">
            </div>
        </div>
       <hr>
        <div class=" text-center justify-content-center">
            <button type="submit" class="btn btn-outline-info text-center mb-4 px-5 py-2 font-weight-bold" name="ajout_class"><span class="bi bi-plus"></span> Enregistrer</button> 
        </div>
       </form>
    </div>

  </div>
</div>
                                







                    <!--Modifier etudiant -->

<?php

if(isset($_GET["modifier"])):

?>

<div class="md aler" id="m_a" style="display: flex; justify-content:center; width:100%; height:100vh;position:absolute;top:0;z-index:2;backdrop-filter: contrast(80%);">
<div id="modifi_eleve" class="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="closess close">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
     <h4 class="text-center alert-info lis py-2">Modification d'un étudiant</h4>


<?php
foreach($query as $f):

?>
     <form action="" class="user" method="post" enctype="multipart/form-data"> 
        <div class="row justify-content-center align-items-center text-center mt-3">
            <div class="col-sm-6 col-md-6 justify-content-center align-items-center text-center">
                <div class="row mx-3">
                    <div class="col-sm-6 col-md-6">
                        <h6 class="text-info text-center lis ml-4">Matricule:</h6>
                    </div>
                    <div class="col-sm-6 col-md-6 justify-content-start text-start">
                        <input type="text" class="col-sm-12 border-none form-control" value="<?=$f['matricule'] ?>" name="matricules">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 justify-content-center align-items-center text-center">
                 <div class="row mx-2">
                    <div class="col-sm-6 col-md-6">
                        <h6 class="text-info lis text-center ml-5">Classe:</h6>
                    </div>
                    <?php

                        $affichage_classe = $db -> prepare("SELECT * FROM classe WHERE id = ?");
                        $affichage_classe -> execute([$f['id_classe']]);

                        foreach($affichage_classe as $s){

                    ?>
                    <div class="col-sm-6 col-md-6 justify-content-end text-end">
                        <input type="text" disabled class="col-sm-12 border-none form-control" value="<?= $s['Nom'];?>" name="clas">
                    </div>    
                    <?php   } ?>              
                </div>
            </div>            
        </div>
        <div class="mt-2 px-3">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user" type="text" value="<?=$f['nom'] ?>" name="noms">
                </div>
                <div class="col-sm-6">
                    <input class="form-control form-control-user" type="text" value="<?= $f['prenom']?>" name="preno">
                </div>
            </div>           
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user" type="text" value="<?=$f['adresse'] ?>" name="adres">
                </div>
                <div class="col-sm-6">
                    <input class="form-control form-control-user" type="text" value="<?= $f['telephone']?>" name="tele">
                </div>
            </div>                 
        </div>
        <div class="row container mb-3">
            <div class="col-sm-6 col-md-6 ">
                <div class="mt-5">
                    <select name="sex" id="" class="form-control">
                        <option value="<?= $f['sexe'] ?>" selected><?= $f['sexe'] ?></option>
                        <option value="Feminun">Feminin</option>
                        <option value="Masculin">Masculin</option>
                    </select>  
                </div>                
            </div>
            <div class="col-sm-6 col-md-6 rounded p-0 m-0">
            <input type="file" name="imaget" id="saryet" class="d-none">
                    <p class="card-text">
                        <div class="actuel">                          
                            <label for="saryet" class="ml-5">
                                <img class="rounded-circle ml-5 changet border border-5" width="80" height="80" src="../assets/eleves/<?=$f['images'];?>" alt="">
                                <span style="position: relative;left: -30px;top: 30px;" class="fa fa-camera fa-2x  m"></span> 
                            </label>                           
                        </div>
                    </p>
                    <script>
                        var saryet = document.getElementById("saryet");
                        var changet = document.querySelector(".changet");
                        saryet.onchange = function(){
                            fichier = saryet.files[0];

                            var i = new FileReader();

                            i.onload = function(t){
                                changet.src = t.target.result;
                            }
                            i.readAsDataURL(fichier);
                        }
                    </script>
            </div>
        </div>
        
     <div class="modal-footer text-center justify-content-center py-2">
        <button type="submit" class="btn btn-outline-info text-center px-5 py-2 font-weight-bold" name="modification"><span class="bi bi-pencil"></span> Modifier</button>
    </div> 
</form>

<?php

endforeach;
?>
    </div>

  </div>
</div>
</div>  
<?php endif;?>
<!-- fin -->
                <script>
                    var c = document.querySelector(".closess");
                    var m = document.getElementById("m_a");

                    c.onclick = function(){
                        m.style.display = "none";
                    }
                </script>
                                                        <script>
                                                            const sary = document.getElementById("sary");
                                                            sary.onchange = function(){
                                                                const f= sary.files[0];
                                                                const n = f.name;
                                                                const s = URL.createObjectURL(f);
                                                                alert(n+name);
                                                            }
                                                        </script>  
                                <script>
                                        var btn_close = document.querySelectorAll(".closes");
                                        for(i=0; i<btn_close.length;i++){
                                            btn_close[i].onclick = function(){
                                            var modal = document.querySelectorAll(".aler");
                                            modal.style.display = "none";
                                           
                                        }
                                        }

                                        var alert_close = document.querySelectorAll(".alert_close");
                                        var alerts = document.querySelectorAll(".aler");
                                        for(j = 0 ; j<alert_close.length; j++){
                                              alert_close[j].onclick = function(){
                                                for(i = 0; i<alerts.length; i++){
                                                     alerts[i].style.display = "none";
                                                }
                                            
                                        }
                                        }
                                      

                                </script>




<!-- PAGESSS PAYEMENTS --><!-- PAGESSS PAYEMENTS --><!-- PAGESSS PAYEMENTS -->



   <!-- profil -->
   
<div id="profil" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- <h4 class="text-center text-light bg-dark text-uppercase py-2 geste">Profil</h4> -->
      <div class="modal-body">
        <?php  $ut = $utilistrs->fetch(PDO::FETCH_ASSOC);  ?>

        <div class="container-fluid text-start">
            <div class="">
                <h4 class="card-title geste text-center"><?=$ut['names'];?></h4>                
                    <form action="" method="post" enctype="multipart/form-data" class="ml-4 user mb-4">
                        <input type="file" name="pdp" id="sarye" class="d-none">
                            <p class="card-text ml-5">
                                <div class="actuel ml-5">                          
                                        <label for="sarye" class="ml-5">
                                            <img class="rounded-circle change ml-5" width="100" height="100" src="../assets/imageUtilisateur/<?=$ut['images'];?>" alt="">
                                            <span style="position: relative;left: -34px;top: 35px;" class="fa fa-camera fa-2x"></span> 
                                            <br><hr>
                                            <button name="valider" class="btn btn-outline-dark text-center ml-2 mt-3 mb-2 btn-block geste" type="submit">Modifier</button>
                                        </label>                           
                                </div>
                            </p>
                    </form>               

            </div>       
        </div>
        
      </div>
      
    </div>

  </div>
</div>
<script>
    var sarye = document.getElementById("sarye");
    var change = document.querySelector(".change");
    sarye.onchange = function(){
        fichier = sarye.files[0];

        var ii = new FileReader();

        ii.onload = function(e){
            change.src = e.target.result;
        }
        ii.readAsDataURL(fichier);
    }
</script>




    <!-- Parametre-->

<div id="seting" class="modal fade" >
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <h4 class="text-center alert-info text-uppercase py-2"><i>modifier les informations</i></h4>       
      <div class="modal-body mx-4"> 
        <form action="" method="post">      
             <div class="row">           
             <label for="email" class="form-label">Votre e-mail:</label>               
                <input type="text" class="form-control" value="<?php foreach($voi_em as $k){echo $k['email'];} ?>" name="emaill">
                <label for="mdp" class="form-label">Entrer le mot de passe</label>
                <input type="password" class="form-control" name="mdp">
                 <label for="" class="form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control" name="nouv_mdp">
                <label for="" class="form-label">Confirmation mot de passe</label>
                <input type="password" class="form-control mb-2" name="conf_mdp">
        </div>        
      </div>
      <div class="modal-footer  text-center justify-content-center">
      <button type="submit" class="btn btn-outline-info text-center px-5 font-weight-bold" name="parametre"><i class="bi bi-pencil"></i> Modifier</button>
      </div>
      </form>

    </div>

  </div>
</div>
<style>
      * {
        font-family: 'poppins';
    }

    /* @font-face {
    font-family: 'ro' ;
    src: url(nav/ThePanorama.ttf);
}

.geste{
    font-family: 'ro';

} */





    @font-face {
        font-family: 'robots';
        src: url(nav/Roboto-Regular.ttf);
    }

    /* .geste{
    font-family: 'robots';
} */
    /* .listt{

} */
    @font-face {
        font-family: 'poppins';
        src: url(nav/poppins-Regular.ttf);
    }

    .lis {
        font-family: 'poppins';
    }
</style>





  <!-- Reçu -->

   

