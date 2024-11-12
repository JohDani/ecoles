<?php include 'modal.php'; ?><link rel="stylesheet" href="nav/assets/bootstrap/css/bootstrap.min.css">
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
                                <span class="d-none d-lg-inline mr-2 small text-dark"><?= $_SESSION["utilisateur"]["nom"] ?></span>
                                <img class="rounded-circle img-profile" src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>">
                                <i class="fa fa-circle text-success" style="font-size: 10px;position: relative;left: -8px;right:10px;top: 10px;"></i>
                            </a>
                            <div class="dropdown-menu shadow-lg dropdown-menu-right animated--grow-in" role="menu">
                                <img src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>" class="rounded-circle mt-2 mx-5 d-none d-md-inline img-profile" width="90" height="95">
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
            <h5 class="d-md-none text-center">Liste des résponsables</h5> 
                <div class="shadow">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <a href="#" class="rounded  m-0 btn-info btn" type="button" data-toggle="modal" data-target="#responsable"><i class="bi bi-person-plus"></i> Ajouter</a>
                                </div>
                                <div class="col-sm-6 col-md-6 m-0 p-0">
                                    <h5 class="lis text-secondary mx-3 w3-display-right d-none d-md-inline m-0">Liste des résponsables</h5>
                                </div>
                            </div>                           
                        </div>                       
                        <div class="table-responsive card-body table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0 table-hover " id="tables">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Rôle</th>
                                        <th>E-mail</th>
                                        <th>Téléphone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($utilist as $t) :   ?>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="35" height="35" src="../assets/imageUtilisateur/<?= $t['images'] ?>"><?= $t['names'] ?></td>
                                            <td><?= $t['type'] ?></td>
                                            <td><?= $t['email'] ?></td>
                                            <td><?= $t['Tel'] ?></td>
                                            <td>
                                                <?php if ($t['status'] == "desactiver") : ?>
                                                    <a href="?activer=<?= $t['id']?>" class="btn btn-success "><i class="bi bi-check-circle"></i></a>
                                                <?php else : ?>
                                                    <a href="?desactiver=<?= $t['id']?>" class="btn btn-danger bi bi-x-circle"></a>
                                                <?php endif; ?>
                                                <a href="responsable?deletes=<?= $t['id'] ?>" class="bi bi-trash btn btn-outline-danger text-center"></a>
                                            </td>
                                        </tr>
                                    <?php  endforeach; ?>
                                </tbody>
                            </table>
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
                        
            </div>
        </div>
    </div>
</div>

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
        src: url(nav/Poppins-Regular.ttf);
    }

    .lis {
        font-family: 'poppins';
    }
</style>