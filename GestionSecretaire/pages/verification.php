<?php  include 'modal.php'; ?>
    <div id="content">
        <nav class="navbar navbar-secondary navbar-expand bg-dark shadow-lg card-header topbar static-top">
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
                            <img src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>" class="d-none d-lg-inline rounded-circle mt-2 mx-5 img-profile" width="90" height="95">
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
    <div class="container-fluid mt-4">  
        <div class="shadow">
        <div class="card p-0 m-0">
            <div class="row p-0 m-0 card-header">
                <div class="col-sm-6 col-md-6">
                <div class="row m-0 p-0 mt-3 mb-0">   
                    <div class="col-sm-3 col-md-6 m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-sm-6 col-md-6 m-0 p-0">
                                <select class="d-inline-block set m-0 p-0 form-control form-select col-sm-12 mb-3 form-select-sm">
                                        <option value="0" selected=""></option>
                                            <?php
                                                
                                                $etudiant = "";
                                                if(isset($_GET['ecolage']) AND $_GET["ecolage"] !== "0"){
                                                    if($_GET["ecolage"] == 2){
                                                        if($_GET["mois"] == 0){
                                                                    
                                                        }else{
                                                                $selection = $db -> prepare("SELECT * FROM etudiants INNER JOIN classe ON classe.id = etudiants.id_classe LEFT JOIN payements ON payements.id_etudiant = etudiants.id AND payements.mois = ? AND payements.id_ecolage = 2 WHERE payements.id_etudiant IS NULL");
                                                                    $selection -> execute(array($_GET["mois"])); 
                                                        }
                                                
                                                    }else{
                                                        $etudiantsID = array();
                                                        $getPai = $db->query("SELECT id_etudiant FROM payements WHERE id_ecolage = {$_GET['ecolage']}");
                                                        $et = $getPai->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($et as $value) {
                                                            array_push($etudiantsID, $value["id_etudiant"]);
                                                        }
                                                        
                                                        $etudiant = implode(", ",$etudiantsID);
                                                        $selection = $db -> query("SELECT * FROM etudiants INNER JOIN classe ON classe.id = etudiants.id_classe WHERE etudiants.id NOT IN ({$etudiant})");
                                                        // $selection -> execute(array(explo));
                                                    }

                                                }                                    
                                                foreach($pay_eco as $g):                                      
                                                    
                                            ?>
                                        <option class="m-0 p-0"
                                        <?php    if(isset($_GET["ecolage"]) AND $_GET["ecolage"] ==$g['id']){ echo "selected";}    ?>

                                        value="<?=$g['id']; ?>"><?=$g['name']; ?></option>
                                    <?php   endforeach;   ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 m-0 p-0">
                                <?php    if(isset($_GET["mois"])):   
                                    function sl($chiffre){
                                        if($_GET["mois"] == $chiffre){
                                                echo "selected";
                                        }
                                    }
                                ?>
                                        <select  name="mois" id="mois"  class="d-inline-block form-control p-0 text-center col-sm-12 m-0 form-select form-select-sm">
                                            <option value="0" >-Mois-</option>
                                            <option <?php sl('1')?> value="1" >Janvier</option>
                                            <option <?php sl('2')?> value="2">Fevrier</option>
                                            <option <?php sl('3')?> value="3">Mars</option>
                                            <option <?php sl('4')?> value="4">Avril</option>
                                            <option <?php sl('5')?> value="5">Mai</option>
                                            <option <?php sl('6')?> value="6">Jun</option>
                                            <option <?php sl('7')?> value="7">Juillet</option>
                                            <option <?php sl('8')?> value="8">Aout</option>
                                            <option <?php sl('9')?> value="9">Septembre</option>
                                            <option <?php sl('10')?> value="10">Octobre</option>
                                            <option <?php sl('11')?> value="11">Novembre</option>
                                            <option <?php sl('12')?> value="12">Decembre</option>
                                        </select>&nbsp;
                                <?php  endif; ?>
                            </div>
                        </div>            
                    </div>
                </div> 
                </div>
                <div class="col-sm-6 col-md-6 m-0 p-0">
                    <h5 class="w3-display-right m-0 px-4"><span>Ecolages non reglés</span></h5> 
                </div>
            </div>
                           
        </div>            
            <div class="card-body"> 
            <div class="justify-content-between m-0 p-0 mb-0">
            <div class="row p-0 m-0">
                    <div class="col-md-6 col-sm-6 text-nowrap m-0 p-0 mb-0">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">                      
                        <!-- <p class="text-danger m-0 font-weight-bold">Payements</p> -->
                              
                                <script>
                                    var set = document.querySelector('.set');
                                    set.onchange = function(){
                                        if(set.value !== 0){
                                            if(set.value == 2){
                                                window.location.href = "verification?ecolage="+set.value+"&mois=0";
                                            }else{
                                                 window.location.href = "verification?ecolage="+set.value;
                                            }
                                               
                                        }                                       
                                    }
                                    var mois = document.querySelector('#mois');
                                    mois.onchange = function(){
                                        if(set.value !== 0){                                        
                                                window.location.href = "verification?ecolage=2&mois="+mois.value;    
                                        }                                    
                                    }
                                </script>
                            <div class="col-md-6">                    
                    </div>
                        </div>
                        
                    </div>                    
                </div>
            </div>               
                <div class="table-responsive mt-0 table" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table table-hover card-body table-striped dataTable my-0" id="tables">
                        <thead >
                            <tr>
                                <th>Matricule</th>
                                <th>Classe</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Télélphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             if(isset($selection)):   foreach($selection as $q):
                            ?>

                            <tr class="w3-animate-zoom">
                                <td><?=$q["matricule"]?></td>
                                <td><?=$q["Nom"]?></td>
                                <td><img class="rounded-circle mr-2" width="30" height="30" src="../assets/eleves/<?=$q["images"]?>"><?=$q["nom"]?></td>
                                <td><?=$q["prenom"]?></td>
                                <td><?=$q["telephone"]?></td>
                            </tr>
                             <?php endforeach; endif;  ?>  
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
                <div class="row m-0 p-0">
                    <div class="col-md-6 align-self-center">                        
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <!-- <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            </ul> -->
                        </nav>
                    </div>
                </div>
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

    .poppins {
        font-family: 'robotoo';

    }
</style>

