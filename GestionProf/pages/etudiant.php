<?php  include 'nav.php'; ?>
  
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-secondary border-right-light p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light mt-4" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="mt-3" href="#">
                            <span class=" btn btn-primary"><i class="fas fa-plus p-0"></i>Ajouter une Classe</span>
                        </a>
                    </li>
                    <li class="nav-item text-center mt-3">LISTE DES CLASSES</li>
                    <a href="#" style="text-decoration: none;"><li class="nav-item text-center mt-1 border border-3 py-2">Classe 1</li></a>
                    <a href="#" style="text-decoration: none;"><li class="nav-item text-center border border-3 py-2">Classe 2</li></a>
                    <a href="#" style="text-decoration: none;"><li class="nav-item text-center border border-3 py-2">Classe 3</li></a>
                </ul>
                <div class="text-center d-none d-md-inline mt-5">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-secondary navbar-expand bg-secondary shadow mb-4 topbar static-top">
            <div class="container-fluid">
                <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <h6 class="text-light text-center mx-5">Nom de l'écoles.</h6>
                <ul class="nav navbar-nav flex-nowrap ml-auto">                           
                    <div class="d-none d-sm-block topbar-divider"></div>
                    <li class="nav-item  no-arrow" role="presentation">
                        <form action="">
                            <button type="submit" class="btn btn-danger mt-3">Se deconnecté</button>
                        </form>
                    </li>
                </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <h3 class="text-dark mb-4 text-center"> La liste des étudiants <a href="#" class="fa fa-user-plus rounded bg-dark text-decoration-none  py-1 px-2 text-light"></a></h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h5 class="text-primary m-0 font-weight-bold">Nom classe</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Nombres d'étudiants: <b class="text-danger">10</b></h6>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter">
                                   <form action="" class="text-md-right "> 
                                    <div class="input-group">                               
                                        <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Recherche...">
                                        <button class="input-group-text fa fa-search" type="submit"></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0 table-striped table-bordered" id="dataTable">
                                <thead>
                                    <tr class="bg-info text-light">
                                        <th>Matricule</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Adresse</th>
                                        <th>Informtions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img class="rounded-circle mr-2" width="30" height="30" src="nav/assets/img/avatars/avatar4.jpeg">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>2008/11/28</td>
                                        <td>
                                            <a href="#" class="fa fa-edit text-light py-1 px-2 rounded text-decoration-none bg-dark"></a>
                                            <a href="#" class="fa fa-money-bill-wave rounded text-danger py-1 px-2 text-decoration-none bg-dark"></a>                                           
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td><img class="rounded-circle mr-2" width="30" height="30" src="nav/assets/img/avatars/avatar2.jpeg">Cedric Kelly</td>
                                        <td>Senior JavaScript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>
                                            <a href="#" class="fa fa-edit text-light py-1 px-2 rounded text-decoration-none bg-dark"></a>
                                            <a href="#" class="fa fa-money-bill-wave rounded text-danger py-1 px-2 text-decoration-none bg-dark"></a>
                                            
                                        </td>                                       
                                    </tr>
                                </tbody>                               
                            </table>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2024</span></div>
            </div>
        </footer>
    </div>
</div>