<link rel="stylesheet" href="nav/assets/bootstrap/css/bootstrap.min.css">
<!-- Autre payement PAGE-->
<?php if(isset($_GET['id_etudiant'])): 
$pow = $db->prepare("SELECT *, payement_ecole.prix as prix FROM payements INNER JOIN ecolages on ecolages.id = payements.id_ecolage INNER JOIN utilisateurs on utilisateurs.id = id_responsable INNER JOIN payement_ecole on payement_ecole.id_ecolages = payements.id_ecolage WHERE payements.id_etudiant = ? GROUP BY mois,id_ecolage");
$pow->execute(array($_GET['id_etudiant']));

$total = 0;

$montant_total -> execute(array($_GET["id_etudiant"]));
$mtn = $montant_total->fetch(PDO::FETCH_ASSOC);


$matr_ele = $db -> prepare("SELECT * FROM etudiants WHERE id = ?");


?>

<div class="md aler" id="m_a" style="display: flex; justify-content:center; width:100%; height:100vh;position:absolute;top:0;z-index:2;backdrop-filter: contrast(70%);">
<div id="PAGEautrepayement" class="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close closess" data-dismiss="modal">&times;</button>
        <?php 
        ?>
      </div>
<?php

    $id_ele = $db ->prepare("SELECT * FROM etudiants WHERE id = ?");
    $id_ele -> execute([$_GET['id_etudiant']]);
   
?>
      <h4 class="text-center"><span class="text-info">Matricule:</span> <?php foreach($id_ele as $o){ echo $o['matricule']; } ?></h4>
      <div class="modal-bod">
        <div class="table-responsive">
            <table class="table" id="">
                <thead class="table-bordered alert-info text-center">
                    <tr>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Résponsable</th>
                        <th class="text-center">Montant</th>
                    </tr>                    
                </thead>
                <tbody>
                 <?php  foreach($pow as $peu): ?>
                <tr class="text-secondary card-header text-center table-bordered">
                    <td>
                        <span><?=$peu['name'] ;?><span class="text-success" style="font-size: 16px;">.<?=  transform($peu["mois"]);?></span></span>
                    </td>
                    <td><?=$peu["date_payement"]?></td>
                    <td>
                        <?php
                        $resp -> execute(array($peu["id_responsable"]));
                        foreach($resp as $df){
                          echo $df["names"]; 
                        }                                      
                        ?>
                    </td>
                    <td><?=$peu["prix"]."Ar"?></td>
                </tr>
               <?php 
               $total = $total+$peu["prix"];
    
            endforeach;?>
   
                </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer text-center justify-content-center py-2">
         <h4 class="text-center py-2"><span class="text-dark text-uppercase font-weight-bold">Total :</span> <span class="text-dark"><?=$total." "."Ar"?> </span></h4>
      </div>
    </div>
  </div>
</div>
</div>
<!-- fin -->
<?php endif;?>

<?php include 'modal.php'; ?>
<div id="content">
<div id="wrapper">
<nav class="navbar navbar-dark align-items-start sidebar sidebar-light accordion bg-gradient-dark p-0">
        <div class="container-fluid d-flex flex-column p-0">
                 <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class=""></i></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-info">Schoolap</span></div>
                </a>
                <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link <?php  etudiants($link); ?>" href="etudiant?statistique">
                    <i class="bi bi-grid text-light"></i>
                    <span class="text-light">Statistique</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php  payement($link); ?>" href="payement">
                    <i class="bi bi-cash-stack text-light"></i>
                    <span class="text-light">Paiements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php  verification($link); ?>" href="verification">
                    <i class="bi bi-eye text-light"></i>
                    <span class="text-light">Verification</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php  responsable($link); ?>" href="responsable">
                    <i class="bi bi-people text-light"></i>
                    <span class="text-light">Responsable</span>
                    </a>
                </li> 
            </ul>
            <div class="text-center d-none d-md-inline mt-5">
                <button class="btn rounded-circle border-0 bg-secondary" id="sidebarToggle" type="button"></button>
            </div>

        </div>
    </nav>
        
        <div class="d-flex flex-column " id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"> 
                    <button class="btn btn-link text-info rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>         
                <ul class="nav navbar-nav flex-nowrap ml-auto">              
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="d-none d-lg-inline mr-2 small text-dark"><?=$_SESSION["utilisateur"]["nom"]?></span>
                            <img class="rounded-circle img-profile"  src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"] ; ?>">
                            <i class="fa fa-circle text-success" style="font-size: 10px;position: relative;left: -8px;right:10px;top: 10px;"></i>
                        </a>
                        <div class="dropdown-menu shadow-lg dropdown-menu-right animated--grow-in" role="menu">
                        <img src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>" class="d-none d-md-inline rounded-circle mt-2 mx-5 img-profile" width="90" height="95">
                                <p class="text-center"> <span class="text-dark font-weight-bold "><?= $_SESSION["utilisateur"]["nom"] ?></span> <br>
                                <i class="text-center mt-2 text-secondary">admin</i></p> 
                                <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#profil">
                                    <i class="bi bi-person fa-sm fa-fw mr-2 text-info mb-4" style="font-size: 20px;"></i>&nbsp;Profile
                                </a>
                                <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#seting">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-info"></i>&nbsp;Paramètre
                                </a>
                                <!-- <div class="dropdown-divider m-0 p-0"></div> -->
                                <form action="" method="post" class="mb-0 dropdown-item">
                                    &nbsp;&nbsp;<button type="submit" class="btn btn-sm btn-link mt-2" name="deconnexion"><i class="fa text-info fa-sign-out-alt"></i><span class="text-dark"> Se deconnecté</span></button>
                                </form>                         
                        </div>
                    </div>                    
                </ul>
            </div>
            </nav>
<div class="container-fluid mt-3">                     
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 text-start text-secondary lis">Vérification des paiements</h5> 
            </div>    
            <div class="card-body">                
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="animation-duration: 1s;">
                    <table class="table table-striped table-bordered dataTable my-0" id="tables">
                        <thead class="listt">                           
                            <tr>
                                <th>Matricule</th>
                                <th>Classe</th>
                                <th>Nom</th>
                                <th>Montant</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php 
           foreach($etudiants as $etud):
            ?>
                            <tr>
                                <td><?=@$etud["matricule"]?></td>
                                <td>
                                    <!-- <img class="rounded-circle mr-2" width="35" height="35" src="../assets/eleves/"> -->
                                    <?=@$etud["nom_classe"]?>
                                </td>
                                <td> <img class="rounded-circle mr-2" width="35" height="35" src="../assets/eleves/<?=$etud['images'] ?>">
                                    <?=@$etud['nom_etudiant']?></td>
        <?php 
        $montant_total -> execute(array($etud["id_etudiant"]));
        $mtn = $montant_total->fetch(PDO::FETCH_ASSOC);
        ?>

                                <td><?=@$mtn["prix"]?></td>
                                <td class="text-center">
                                    <a href="payement?id_etudiant=<?=$etud["id_etudiant"]?>" class="bi bi-cash-coin btn btn-info" type="button" ></a>
                                </td>
                            </tr> 
            <?php endforeach;?> 
                              
                        </tbody>                        
                    </table>
                </div>          
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        $('#tables').DataTable({
            "columnDefs":[{
                "targets":[0,1,2,3,4],
                "rowGroup":true,
            }],
        });
        $(".btn-sm").click(function(e){
            $(".ms").show();
        });
    })
</script>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up mt-3"></i></a>
<script src="nav/assets/js/bs-init.js"></script>
<script src="nav/assets/js/chart.min.js"></script>
<script src="nav/assets/js/jquery.min.js"></script>
<script src="nav/assets/js/theme.js"></script>

<script src="nav/assets/bootstrap/js/bootstrap.min.js"></script>
<style>
   * {
        font-family: 'poppins';
    }


    @font-face {
        font-family: 'robots';
        src: url(nav/Roboto-Regular.ttf);
    }

    @font-face {
        font-family: 'poppins';
        src: url(nav/poppins-Regular.ttf);
    }

    .lis {
        font-family: 'poppins';
    }
</style>