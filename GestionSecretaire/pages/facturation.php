<?php include 'modal.php'; ?>
<!-- Autre payement PAGE-->
<?php if (isset($_GET['id_etudiant'])) :
    $pow = $db->prepare("SELECT *, payement_ecole.prix as prix FROM payements INNER JOIN ecolages on ecolages.id = payements.id_ecolage  INNER JOIN payement_ecole on payement_ecole.id_ecolages = payements.id_ecolage WHERE payements.id_etudiant = ? GROUP BY mois,id_ecolage");
    $pow->execute(array($_GET['id_etudiant']));

    $total = 0;

    $montant_total->execute(array($_GET["id_etudiant"]));
    $mtn = $montant_total->fetch(PDO::FETCH_ASSOC);


    $matr_ele = $db->prepare("SELECT * FROM etudiants WHERE id = ?");


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

                    $id_ele = $db->prepare("SELECT * FROM etudiants WHERE id = ?");
                    $id_ele->execute([$_GET['id_etudiant']]);

                    ?>
                    <h4 class="text-center"><span class="text-info">Matricule:</span> <?php foreach ($id_ele as $o) {
                                                                                            echo $o['matricule'];
                                                                                        } ?></h4>
                    <div class="modal-bod">
                        <div class="table-responsive">
                            <table class="table" id="">
                                <thead class="table-bordered alert-info text-center">
                                    <tr>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th class="text-center">Montant</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pow as $peu) : ?>
                                        <tr class="text-secondary card-header text-center table-bordered">
                                            <td>
                                                <span><?= $peu['name']; ?><span class="text-success" style="font-size: 16px;"><?= transform($peu["mois"]); ?></span></span>
                                            </td>
                                            <td><?php $days = new DateTime($peu['date_payement']);?><?= $days->format("d-M-Y") ?></td> 
                                            <td><?= $peu["prix"] . "Ar" ?></td>
                                            <td class="text-center">
                                                <a href="recu?id_etudiants=<?=$_GET["id_etudiant"]?>&pri=<?= $peu["id"]?>&nom_p=<?=$peu['name']?>&mois=<?=$peu['mois']?>" class="btn btn-outline-info bi bi-printer-fill" ></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $total = $total + $peu["prix"];

                                    endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer text-start justify-content-center py-2">
                        <h4 class="text-center py-2"><span class="text-dark text-uppercase font-weight-bold">Total :</span> <span class="text-dark"><?= $total . " " . "Ar" ?> </span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin -->
<?php endif; ?>
<div id="content">
    <nav class="navbar navbar-secondary navbar-expand shadow-lg bg-dark topbar static-top">
        <div class="container-fluid">            
            <div class="collapse navbar-collapse" id="navcol-1">
                <a class="navbar-brand d-flex justify-content-center  d-none d-md-inline align-items-center sidebar-brand m-0">
                    <div class="sidebar-brand-icon rotate-n-15  d-none d-md-inline"><i class=""></i></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-info font-weight-bold d-none d-md-inline" style="font-size: 15px;">SCHOOLAP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav mx-auto" id="uli">
                    <li class="nav-item m-0"><a class="nav-link text-light lis" href="etudiant"><span class="<?php etudiants($link);?> py-2 px-2 rounded">Etudiants</span> </a></li>
                    <li class="nav-item m-0"><a class="nav-link text-light lis" href="classe"><span class="<?php  classe($link); ?> py-2 px-2 rounded">Classes</span> </a></li>
                    <li class="nav-item m-0"><a class="nav-link text-light  lis" href="verification"><span class="<?php  verification($link); ?> py-2 px-2 rounded">Vérifications</span> </a></li>
                    <li class="nav-item m-0"><a class="nav-link text-light  lis" href="facturation"><span class="<?php  facturation($link); ?> py-2 px-2 rounded">Reçus</span> </a></li>
                </ul>
            </div>
            <style>
                @media (max-width:787px) {
                    #uli{
                        display: none;
                    }
                }
            </style>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                 <li class="nav-item dropdown d-md-none no-arrow">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa font-weight-bold fa-list text-light"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-dark animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                        <ul class="navbar-nav bg-dark mx-auto" id="ul">
                            <li class="nav-item m-0"><a class="nav-link text-light lis" href="etudiant"><span class="<?php etudiants($link);?> py-2 rounded">Etudiants</span> </a></li>
                            <li class="nav-item m-0"><a class="nav-link text-light lis" href="classe"><span class="<?php  classe($link); ?> py-2 rounded">Classes</span> </a></li>
                            <li class="nav-item m-0"><a class="nav-link text-light  lis" href="verification"><span class="<?php  verification($link); ?> py-2 rounded">Vérifications</span> </a></li>
                            <li class="nav-item m-0"><a class="nav-link text-light  lis" href="facturation"><span class="<?php  facturation($link); ?> py-2 px-3 rounded">Reçus</span> </a></li>
                        </ul> 
                        </div>
                    </li> 
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link mr-2" data-toggle="dropdown" aria-expanded="false" href="#">
                        <span class="d-none d-lg-inline p-0 m-0 mr-2 small listt text-light"><?=$_SESSION["utilisateur"]["nom"]?></span>
                        <img class="rounded-circle img-profile" src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"] ; ?>">
                        <i class="fa fa-circle text-success" style="font-size: 10px;position: relative;left: -8px;right:10px;top: 10px;"></i>
                    </a> 
                    <div class="dropdown-menu shadow-lg dropdown-menu-right animated--grow-in" role="menu">
                        <img src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>" class="rounded-circle mt-2 mx-5 img-profile" width="90" height="95">
                        <p class="text-center"> <span class="text-dark font-weight-bold "><?= $_SESSION["utilisateur"]["nom"] ?></span> <br>
                        <i class="text-center mt-2 text-secondary">secretaire</i></p> 
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
    <script src="nav/assets/bootstrap/js/bootstrap.min.js"></script>
    <div class="container-fluid mt-3">
        <div class="card shadow">
            <div class="card-header py-2">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <h5> <span>Nombres d'étudiants:</span> <b class="text-danger"><i><?= $etudiants->rowcount(); ?></i></b></h5>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h5 class="w3-display-right m-0"><span>Reçus</span></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-0 table" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table table-hover card-body table-striped dataTable my-0" id="tables">
                        <thead class="listt">
                            <tr>
                                <th>Matricule</th>
                                <th>Classe</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adresse</th>
                                <th>Télélphone</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($etudy as $etud) :
                            ?>
                                <tr>
                                    <td><?= @$etud["matricule"] ?></td>
                                    <td><?= @$etud["nom_classe"]; ?></td>
                                    <td><img class="rounded-circle mr-2" width="30" height="30" src="../assets/eleves/<?= $etud['images'] ?>"><?= @$etud['nom_etudiant'] ?></td>
                                    <td><?= @$etud['prenom'] ?></td>
                                    <td><?= @$etud['adresse'] ?></td>
                                    <td><?= @$etud['telephone'] ?></td>
                                    <td class="text-center">
                                        <a href="facturation?id_etudiant=<?= $etud["id_etudiant"] ?>" class="btn btn-success fas fa-donate"></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php  ?>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up mt-3"></i></a>
</div>

<!-- <footer class="bg-white sticky-footer mt-5">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Gestion d'école © fait le 2024</span></div>
    </div>
</footer> -->

<script src="nav/assets/js/bs-init.js"></script>
<script src="nav/assets/js/chart.min.js"></script>
<script src="nav/assets/js/jquery.min.js"></script>
<script src="nav/assets/js/theme.js"></script>
<script>
    $(document).ready(function() {

        $('#tables').DataTable({
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4],
                "rowGroup": true,
            }],
        });
        $(".btn-sm").click(function(e) {
            $(".ms").show();
        });
    })
</script>
<script>
    var c = document.querySelector(".closess");
    var m = document.getElementById("m_a");

    c.onclick = function() {
        m.style.display = "none";
    }
</script>
<script src="nav/assets/bootstrap/js/bootstrap.min.js"></script>

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

    .non {
        font-family: 'robotoo';
        font-size: 25px;
    }
</style>
