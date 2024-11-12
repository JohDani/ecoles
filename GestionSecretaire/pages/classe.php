<?php
include 'modal.php'; ?>

<body id="page-top">
    <link rel="stylesheet" href="nav/assets/bootstrap/css/bootstrap-icons.min.css">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar  shadow-lg sidebar-dark accordion bg-gradient-dark p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class=""></i></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-info">Schoolap</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="font-weight-bold text-center" role="presentation">
                        <div class="w3-dropdown-hover nav-item bg-dark">
                            <button class="lis p-0 text-light nav-link text-center btn btn-info py-2"><i class="bi d-none d-md-inline bi-menu-button-wide text-light"></i>Option <span class="fa fa-caret-down"></span></button>
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
                    <li class="nav-item text-center text-success lis mb-2"><span class="lis">Liste des classes</span></li>
                    <?php if ($classe->rowcount() >= 1) : foreach ($classe as $p) : ?>
                            <a href="classe?class=<?= $p["id"]; ?>&nom_classe=<?= $p["Nom"]; ?>" class="text-decoration-none ">
                                <li class="nav-item text-start">
                                    <span class="text-decoration-none text-start nav-link  text-light 
                                     <?php if (isset($_GET["class"]) and $_GET["class"] == $p["id"]) {
                                            echo "bg-secondary border-left-info py-2 lis text-light";
                                        } else {
                                            echo " lis ";
                                        }  ?>" style="padding: 5px;font-size: 15px;"><span class="bi bi-caret-right-fill mx-2"> <?= $p["Nom"]; ?></span>
                                    </span>
                                </li>
                            </a>
                        <?php endforeach;
                    else : ?>
                        <h3 class="text-light text-center bi py-2 bi-journal-x"></h3>
                    <?php endif; ?>
                </ul>
                <div class="text-center d-none d-md-inline mt-5">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">

            <div id="content">
                <nav class="navbar navbar-secondary shadow-lg navbar-expand bg-dark shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link text-info rounded-circle mr-1" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav mx-auto" id="uli">
                                <li class="nav-item m-0"><a class="nav-link text-light lis" href="etudiant"><span class="<?php etudiants($link); ?> py-2 px-2 rounded">Etudiants</span> </a></li>
                                <li class="nav-item m-0"><a class="nav-link text-light lis" href="classe"><span class="<?php classe($link); ?> py-2 px-2 rounded">Classes</span> </a></li>
                                <li class="nav-item m-0"><a class="nav-link text-light  lis" href="verification"><span class="<?php verification($link); ?> py-2 px-2 rounded">Vérifications</span> </a></li>
                                <li class="nav-item m-0"><a class="nav-link text-light  lis" href="facturation"><span class="<?php facturation($link); ?> py-2 px-2 rounded">Reçus</span> </a></li>
                            </ul>
                        </div>
                        <style>
                            @media (max-width:787px) {
                                #uli {
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
                                        <li class="nav-item m-0"><a class="nav-link text-light lis" href="etudiant"><span class="<?php etudiants($link); ?> py-2 rounded">Etudiants</span> </a></li>
                                        <li class="nav-item m-0"><a class="nav-link text-light lis" href="classe"><span class="<?php classe($link); ?> py-2 rounded">Classes</span> </a></li>
                                        <li class="nav-item m-0"><a class="nav-link text-light  lis" href="verification"><span class="<?php verification($link); ?> py-2 rounded">Vérifications</span> </a></li>
                                        <li class="nav-item m-0"><a class="nav-link text-light  lis" href="facturation"><span class="<?php facturation($link); ?> py-2 px-3 rounded">Reçus</span> </a></li>
                                    </ul>
                                </div>
                            </li>
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link mr-2" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="d-none d-lg-inline p-0 m-0 mr-2 small listt text-light"><?= $_SESSION["utilisateur"]["nom"] ?></span>
                                    <img class="rounded-circle img-profile" src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>">
                                    <i class="fa fa-circle text-success" style="font-size: 10px;position: relative;left: -8px;right:10px;top: 10px;"></i>
                                </a>
                                <div class="dropdown-menu shadow-lg dropdown-menu-right animated--grow-in" role="menu">
                                    <img src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>" class="d-none d-lg-inline rounded-circle mt-2 mx-5 img-profile" width="90" height="95">
                                    <p class="text-center"> <span class="text-dark font-weight-bold "><?= $_SESSION["utilisateur"]["nom"] ?></span> <br>
                                        <i class="text-center mt-2 text-secondary">secretaire</i>
                                    </p>
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
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="m-0 mb-2 p-0"> <span>Nombres d'étudiants:</span> <b class="text-danger"><i><?= $etudiants->rowcount(); ?></i></b></h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-center"></p>
                                    <a href="#" class="btn btn-sm btn-info w3-display-right" id="change" data-toggle="modal" type="button" data-target="#changerClasse">Changer <i class="bi bi-arrow-left-right"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <form action="" method="post">
                                    <table class="table dataTable my-0 table-striped " id="tables">
                                        <thead class="listt">
                                            <tr>
                                                <th class="m-0 p-0 text-info">
                                                    <?php
                                                        if($etudiants -> rowcount() == 0){
                                                            ?>
                                                                <label for="">Action</label>
                                                            <?php
                                                        }else{
                                                    
                                                    ?>
                                                    <label for="" class=" mx-5">
                                                        <input type="checkbox" id="all" class="form-check-inpu"> <span>Tout cocher</span>
                                                        <!-- Tout cocher -->
                                                    </label>
                                                    <?php       }    ?>
                                                </th>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Adresse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($etudiants->rowcount() >= 1) : foreach ($etudiants as $t) : ?>
                                                    <tr>
                                                        <td class="m-0 p-0">
                                                            <label class="form-check-label ml-5">
                                                                <input type="checkbox" class="form-check-input" name="selection[]" value="<?= $t['id'] ?>">
                                                            </label>
                                                        </td>
                                                        <td><?= $t["matricule"] ?></td>
                                                        <td>
                                                            <img class="rounded-circle mr-2" width="35" height="35" src="../assets/eleves/<?= $t['images'] ?>">
                                                            <?= $t["nom"] ?>
                                                        </td>
                                                        <td><?= $t["prenom"] ?></td>
                                                        <td><?= $t["adresse"] ?></td>
                                                    </tr>
                                            <?php endforeach;
                                            endif; ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        document.getElementById("change").addEventListener("click", () => {
                                            var checkboxes = document.querySelectorAll("input[name='selection[]']");
                                            var counter = 0;
                                            checkboxes.forEach((item) => {
                                                if (item.checked) {
                                                    counter++;
                                                }
                                            })
                                            document.getElementById("nombreSelected").innerText = counter;
                                        });
                                        document.getElementById("all").addEventListener("change", () => {
                                            
                                            var checkboxes = document.querySelectorAll("input[name='selection[]']");
                                            if (document.getElementById("all").checked) {

                                                checkboxes.forEach((item) => {
                                                    item.checked = true
                                                })
                                            }else{
                                                checkboxes.forEach((item) => {
                                                    item.checked = false;
                                                })
                                            }
                                        })
                                    </script>
                                    <div id="changerClasse" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <h4 class="text-info text-center py-2 lis">Changement de Classe</h4>   -->
                                                    <h4 class="text-center lis"><span>Nombre de séléction:</span> <span class="text-danger" id="nombreSelected">1</span></h4>
                                                    <select name="select_class" id="" class="form-control text-center">
                                                        <?php $cl_classe->execute();
                                                        foreach ($cl_classe as $g) :  ?>
                                                            <option value="<?= $g['id'] ?>"><?= $g['Nom'] ?></option>
                                                        <?php endforeach;  ?>
                                                    </select>
                                                </div>
                                                <div class="modal-footer justify-content-center mt-4 py-3">
                                                    <button type="submit" class="btn btn-info px-5" name="enregistrer">Changer</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Changer classe -->
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

                                        <div class="row">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal changement -->

        </div>
    </div>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up mt-3"></i></a>
    </div>
    </div>
    <script src="nav/assets/js/bs-init.js"></script>
    <script src="nav/assets/js/chart.min.js"></script>
    <script src="nav/assets/js/jquery.min.js"></script>
    <script src="nav/assets/js/theme.js"></script>
    <script></script>
    <script src="controleur/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="controleur/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="controleur/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="controleur/assets/vendor/echarts/echarts.min.js"></script>
    <script src="controleur/assets/vendor/quill/quill.js"></script>
    <script src="controleur/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="controleur/assets/vendor/tinymce/tinymce.min.js"></script>
    <!-- <script src="controleur/assets/vendor/php-email-form/validate.js"></script> -->
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

        .poppins {
            font-family: 'robotoo';

        }
    </style>
    <style>

        .form-check-input {
            width: 1em;
            height: 1em;
            margin-top: 0.25em;
            vertical-align: top;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            border: 1px solid rgba(0, 0, 0, 0.25);
            appearance: none;
        }

        .form-check-input[type="checkbox"] {
            border-radius: 0.25em;
        }

        .form-check-input:active {
            filter: brightness(90%);
        }

        .form-check-input:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .form-check-input:checked[type="checkbox"] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
        }


        .form-switch .form-check-input {
            width: 2em;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%280, 0, 0, 0.25%29'/%3e%3c/svg%3e");
            background-position: left center;
            border-radius: 2em;
            transition: background-position 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .form-switch .form-check-input {
                transition: none;
            }
        }





          
        .form-check-inpu {
            width: 1em;
            height: 1em;
            margin-top: 0.25em;
            vertical-align: top;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            border: 1px solid rgb(0, 204, 255);
            appearance: none;
        }

        .form-check-inpu[type="checkbox"] {
            border-radius: 0.25em;
        }

        .form-check-inpu:active {
            filter: brightness(90%);
        }

        .form-check-inpu:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .form-check-inpu:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .form-check-inpu:checked[type="checkbox"] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
        }


        .form-switch .form-check-input {
            width: 2em;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%280, 0, 0, 0.25%29'/%3e%3c/svg%3e");
            background-position: left center;
            border-radius: 2em;
            transition: background-position 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .form-switch .form-check-input {
                transition: none;
            }
        }
    </style>