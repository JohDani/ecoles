<?php include 'modal.php'; ?>
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-light accordion bg-gradient-dark p-0">
            <div class="container-fluid d-flex flex-column p-0">                
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class=""></i></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-info">Schoolap</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="font-weight-bold text-center" role="presentation">
                        <div class="w3-dropdown-hover nav-item bg-dark">
                            <button class="lis p-0 text-light nav-link text-center btn btn-info py-2"><i class="bi bi-menu-button-wide text-light  d-none d-md-inline"></i>Option <span class="fa fa-caret-down"></span></button>
                            <div class="w3-dropdown-content w3-bar-block rounded border">
                                <a href="#" class="text-decoration-none text-info w3-button w3-text-blue listt w3-bar-item py-3 nav-link text-dark" type="button" data-toggle="modal" data-target="#ajoutclasse">
                                    <i class="fas fa-plus text-dark"></i><span>Ajouter une Classe</span>
                                </a>
                                <hr class="m-0">
                                <a class="text-decoration-none w3-button w3-text-red text-danger listt py-3 text-dark nav-link listt w3-bar-item text-light" type="button" data-toggle="modal" data-target="#supprimerclasse">
                                    <i class="fa fa-trash-alt text-dark"></i><span>Supprimer Classe</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item text-center lis text-success mb-2">Liste des classes</li>
                    <!-- <li class="nav-item text-center"> -->
                        <?php if ($classe->rowcount() >= 1) : foreach ($classe as $c) : ?>
                                <form action="" method="post">
                                    
                                    <a href="etudiant?class=<?= $c["id"]; ?>&nom_classe=<?= $c["Nom"]; ?>" class="text-decoration-none">
                                        <li class="nav-item p-0 m-0 text-start">
                                            <span class="text-decoration-none text-start nav-link text-light
                                            <?php 
                                            if (isset($_GET["class"]) and $_GET["class"] == $c["id"]) {
                                                echo 'bg-secondary border-left-info py-2 lis text-light';                                                                                                                                                                         echo "bg-secondary text-light";
                                            }  
                                            ?>
                                            " style="padding: 5px;font-size: 15px;border-right-radius:30px;"><span class="bi bi-caret-right-fill mx-2"> <?= $c["Nom"]; ?></span>
                                            </span>
                                        </li>
                                    </a>
                                </form>
                    <!-- </li> -->

                <?php endforeach;
                        else : ?>
                <h3 class="text-light text-center bi py-2 bi-journal-x"></h3>
            <?php endif; ?>

                </ul>
                <div class="text-center d-none d-md-inline mt-5">
                    <button class="btn rounded-circle text-info border-0 bg-secondary" id="sidebarToggle" type="button"></button>
                </div>

            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-dark shadow-lg mb-3 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link text-info rounded-circle mr-1" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav  mx-auto" id="uli">
                    <li class="nav-item m-0"><a class="nav-link text-light lis" href="etudiant"><span class="<?php etudiants($link);?> py-2 px-2 rounded">Etudiants</span> </a></li>
                    <li class="nav-item m-0"><a class="nav-link text-light lis" href="classe"><span class="<?php  classe($link); ?> py-2 px-2 rounded">Classes</span> </a></li>
                    <li class="nav-item m-0"><a class="nav-link text-light  lis" href="verification"><span class="<?php  verification($link); ?> py-2 px-2 rounded">Vérifications</span> </a></li>
                    <li class="nav-item m-0"><a class="nav-link text-light  lis" href="facturation"><span class="<?php  facturation($link); ?> py-2 px-2 rounded">Reçus</span> </a></li>
                </ul>
                <style>
                    @media (max-width:787px) {
                        #uli{
                            display: none;
                        }
                    }
                </style>
            </div>
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
                                    <li class="nav-item m-0"><a class="nav-link text-light  lis" href="facturation"><span class="<?php  facturation($link); ?> py-2 rounded">Reçus</span> </a></li>
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
                                    <img src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>" class="rounded-circle d-none d-lg-inline ml-5 mt-2 img-profile" width="90" height="95">
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
                <div class="container-fluid">
                    <?php if (isset($_GET["class"])) : ?>
                        <div class="w-100 py-3 px-3 rounded mb-2  card relative w3-animate-top">
                            <button onclick="myFunction()" class="btn btn-info px-2" style="width: fit-content;"><i class="bi bi-plus"></i>Ajout <span class="fa fa-caret-down"></span></button>
                            <div id="Demo" class="w3-dropdown-content card-body w3-bar-block shadow-lg w3-animate-zoom rounded" style="top:80%;">
                            <a href="#" class="w3-bar-item w3-button lis py-3 py-2 text-info text-decoration-none rounded" type="button" data-toggle="modal" data-target="#ajouterEtudiant"><b class="bi bi-person-plus text-dark"></b> Ajouter un(e) étudiant(e)</a>
                                <hr class="m-0">
                            <a href="#" class="text-decoration-none py-2 w3-button text-success py-3 lis rounded" type="button" data-toggle="modal" data-target="#Ajoutecolage" style="color: #009900;"><i class="bi bi-cash-stack text-dark"></i> Ajouter un motif de paiement</a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <script>
                        function myFunction() {
                            var x = document.getElementById("Demo");
                            if (x.className.indexOf("w3-show") == -1) {
                                x.className += " w3-show";
                            } else {
                                x.className = x.className.replace(" w3-show", "");
                            }
                        }
                    </script>
                    <?php if (isset($_GET["class"])) : ?>
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <h6 class="lis"><span class="lis">Nombres <span class="d-none d-lg-inline">d'étudiants</span>:</span><b class="text-danger"><i> <?= $etudiants->rowcount(); ?></i></b></h6>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <h6 class="mt-0 mb-0 p-0 w3-display-right geste mr-3"><span class="text-success mb-2 list">Nom du classe:</span>
                                            <?php
                                            if (isset($_GET["nom_classe"])) {
                                                echo $_GET["nom_classe"];
                                            }
                                            ?>
                                        </h6>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">                               
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table  table-striped my-0" id="tables">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Sexe</th>
                                                <th>Adresse</th>
                                                <th>Informations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($etudiants->rowcount() >= 1) : foreach ($etudiants as $e) : $matricule = $e["matricule"];  ?>
                                                    <tr>
                                                        <td><?= $matricule ?></td>
                                                        <td><img class="rounded-circle mr-2" width="35" height="35" src="../assets/eleves/<?= $e['images'] ?>"><?= $e["nom"] ?></td>
                                                        <td><?= $e["prenom"]; ?></td>
                                                        <td><?= $e["sexe"]; ?></td>
                                                        <td><?= $e["adresse"]; ?></td>
                                                        <td>&nbsp;
                                                            <div class="btn-group">
                                                                <a href="etudiant?modifier=<?= $e["id"]; ?>" class="bi bi-pencil-fill btn btn-outline-info rounded text-decoration-none"></a>
                                                                &nbsp;
                                                                <a href="etudiant" class="bi bi-trash-fill btn btn-outline-danger rounded text-decoration-none" type="button" data-toggle="modal" data-target="#mysupp"></a>
                                                                &nbsp;
                                                                <a href="etudiant?payer=<?= $e["id"]; ?>&&matricule=<?= $matricule ?>&&class=<?= $e["id_classe"] ?>" class="fa rounded fas fa-donate btn text-decoration-none btn-outline-success btn"></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php endforeach;
                                            endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    $(document).ready(function() {

                                        $('#tables').DataTable({
                                            "columnDefs": [{
                                                "targets": [0, 1, 2, 3, 4, 5],
                                                "rowGroup": true,
                                            }],
                                        });
                                        $(".btn-sm").click(function(e) {
                                            $(".ms").show();
                                        });
                                    })
                                </script>

                                <!-- supp etudiant-->

                                <div id="mysupp" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"></h4>
                                            </div>
                                            <form action="" method="post">
                                                <input type="hidden" name="ids" value="<?= $e["id"] ?>" />
                                                <p class="alert alert-danger container text-center"><i>Etes vous sur de vouloir supprimer ?</i></p>
                                                <div class="modal-footer text-center justify-content-center button-group">
                                                    <button type="submit" class="btn btn-danger">Oui</button>
                                                    <button type="button" class="btn border border-3" data-dismiss="modal">Non</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card mt-2">
                                    <div class="card-header text-primary listt">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 m-0 p-0">
                                                <h5 class="mx-2"><span class="text-secondary m-0 p-0 geste">Nombres d'étudiants:</span> <b class="text-danger"><i> <?= $etudiants->rowcount(); ?></i></b></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table mt-2 w3-animate-left" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <table class="table table-bordered table-striped my-0" id="tables">
                                                <thead>
                                                    <tr class="listt">
                                                        <th>Matricule</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Sexe</th>
                                                        <th>Adresse</th>
                                                        <th>Téléphone</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($etudiants->rowcount() >= 1) : foreach ($etudiants as $e) : $matricule = $e["matricule"];  ?>
                                                            <tr>
                                                                <td><?= $matricule ?></td>
                                                                <td><img class="rounded-circle mr-2" width="35" height="35" src="../assets/eleves/<?= $e['images'] ?>"><?= $e["nom"] ?></td>
                                                                <td><?= $e["prenom"]; ?></td>
                                                                <td><?= $e["sexe"]; ?></td>
                                                                <td><?= $e["adresse"]; ?></td>
                                                                <td><?= $e["telephone"]; ?></td>
                                                            </tr>
                                                    <?php endforeach;
                                                    endif;  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {

                                        $('#tables').DataTable({
                                            "columnDefs": [{
                                                "targets": [0, 1, 2, 3, 4, 5],
                                                "rowGroup": true,
                                            }],
                                        });
                                        $(".btn-sm").click(function(e) {
                                            $(".ms").show();
                                        });
                                    })
                                </script>
                                <!--  -->


                            <?php endif;   ?>

                            <div class="row">


                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="nav/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <footer class="sticky-footer">
    <div class="container my-auto text-secondary">
        <div class="text-center my-auto copyright"><span class="mt-5">Géstion d'école © Fait le 2024.</span></div>
    </div>
</footer> -->
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up mt-3"></i></a>
    <script src="nav/assets/js/bs-init.js"></script>
    <script src="nav/assets/js/chart.min.js"></script>
    <script src="nav/assets/js/jquery.min.js"></script>
    <script src="nav/assets/js/theme.js"></script>
    <script src="nav/assets/bootstrap/js/bootstrap.min.js"></script>
    </div>

    </div>
    </div>
    </div>
</body>


</html>



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



