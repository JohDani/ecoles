 <?php include 'modal.php'; ?>
<body id="page-top">
    <div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-light accordion bg-gradient-dark  p-0" style="z-index: 2;"> 
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">                        
                    </div>
                    <div class="sidebar-brand-text mx-3"><span class="text-info">Schoolap</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">                   
                    <!-- <p class="nav-item mt-3">Navigation</p> -->
                    <li class="nav-item">
                        <a class="nav-link text-dark <?php  etudiants($link); ?>" href="etudiant?statistique" style="border-raduis: 20px;">
                        <i class="bi bi-grid text-light"></i>
                        <span class="text-light">Statistique</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php  payement($link); ?>" href="payement">
                        <i class="bi bi-cash-stack text-light"></i>
                        <span class=" text-light">Paiements</span>
                        </a>
                    </li>
                    <style>
                        li a span:hover{
                            color: #717ff5;
                        }
                    </style>
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
        <div class="d-flex flex-column" id="content-wrapper" style="background: #e6e6e6;">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"> 
                    <button class="btn btn-link  text-info rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>         
                <ul class="nav navbar-nav flex-nowrap ml-auto">                
                    <div class="nav-item dropdown no-arrow">                  
                        <a class="dropdown-toggle nav-link mr-2" data-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="d-none d-lg-inline p-0 m-0 mr-2 small listt text-dark"><?=$_SESSION["utilisateur"]["nom"]?></span>
                            <img class="rounded-circle img-profile" src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"] ; ?>">
                            <i class="fa fa-circle text-success" style="font-size: 10px;position: relative;left: -8px;right:10px;top: 10px;"></i>
                        </a>  
                        <div class="dropdown-menu shadow-lg dropdown-menu-right animated--grow-in" role="menu">
                                <img src="<?php echo '../assets/imageUtilisateur/' . $_SESSION["utilisateur"]["sary"]; ?>" class="d-none d-md-inline rounded-circle mt-2 mx-5 img-profile" width="90" height="95">
                                <p class="text-center"> <span class="text-dark font-weight-bold "><?= $_SESSION["utilisateur"]["nom"] ?></span> <br>
                                <i class="text-center mt-2 text-secondary">admin</i></p> 
                                <a class="dropdown-item" role="presentation" href="#"  data-toggle="modal" data-target="#profil">
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
    <?php 
    
    if(!isset($_GET["class"])):        
        $statistique = "";        
            if(isset($_GET["statistique"])){
                $statistique = $_GET["statistique"];
            }       
    ?>  
<div class="row">
    <div class="col-lg-7 col-xl-8 w3-animate-left">
    <?php if($statistique == "" or $statistique == "info_ecolage"):?>
        <div class="card shadow">
            <div class="card-header bg-light  d-flex justify-content-between  align-items-center">                    
                
                <h6 class="text-secondary m-0 lis">Pourcentage d'écolages</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                <?php                
                    function statt($mois){
                            $db = New PDO("mysql: host=localhost; dbname=écoles;charset=utf8","root","");
                            $e = "d";                
                            $etudian = $db -> prepare("SELECT * FROM etudiants");
                            $etudian->execute();
                            $payement = $db->prepare("SELECT * FROM payements where mois = ? AND YEAR(date_payement)=YEAR(CURDATE())  GROUP BY id_etudiant ");
                            $payement ->execute([$mois]);
                            $total = $etudian->rowcount();
                        if($etudian->rowcount() == 0){
                            echo 0;
                        }else{
                            $valeur = ($payement->rowcount()) * 100 / $total;
                            echo $valeur;  
                        }
                    }        
                ?>
            <canvas data-bs-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Fev&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;,&quot;Sept&quot;,&quot;Oct&quot;,&quot;Nov&quot;,&quot;Dec&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Taux&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;<?=statt("1");?>&quot;,&quot;<?=statt("2");?>&quot;,&quot;<?=statt("3");?>&quot;,&quot;<?=statt("4");?>&quot;,&quot;<?=statt("5");?>&quot;,&quot;<?=statt("6");?>&quot;,&quot;<?=statt("7");?>&quot;,&quot;<?=statt("8");?>&quot;,&quot;<?=statt("9");?>&quot;,&quot;<?=statt("10");?>&quot;,&quot;<?=statt("11");?>&quot;,&quot;<?=statt("12");?>&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(0, 255, 64)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
            </div>
        </div>                
    </div>
        <?php elseif($statistique == "voir_etudiant"):?>
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 lis">Nombres d'étudiants: <i class="text-danger"><?=$etudiants->rowcount();?></i></h6>
                        <div class="btn-group font-weight-bold">
                            <?php  if($classe -> rowcount() >= 1): ?>
                            <a href="#" class="btn btn-info rounded" type="button" data-toggle="modal" data-target="#ajoutclasse"><i class="bi bi-plus"></i>Ajouter une classe</a>&nbsp;&nbsp;
                            <?php endif;   ?>
                        </div>                                      
                    </div>
                    <div class="card-body">                       
                        <div class="table-responsive table table-responsive mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable table-striped my-0" id="">
                                <thead class="text-center">
                                    <tr>
                                        <th>Nombres des classes</th>
                                        <th>Nombres d'étudinats</th>
                                        <th>Garçons</th>
                                        <th>Filles</th>                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center text-danger font-weight-bold">
                                        <td><?=$classe->rowcount();?></td>
                                        <td><?=$etudiants->rowcount();?></td>
                                        <?php
                                        $sx = $db -> prepare("SELECT sexe, count(etudiants.sexe) as s FROM etudiants group BY sexe");
                                        $sx -> execute();
                                        foreach ($sx as $n):
                                        ?>
                                        <td><?=$n["s"]?></td>
                                         
                                        <?php endforeach;?>                                       
                                    </tr>                                  
                                </tbody>                               
                            </table>
                        </div>
                    </div>                
                </div>
                    
        <?php elseif($statistique == "voir_responsable"):?>
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center py-3">               
                        <h6 class="m-0 text-secondary lis">Nombres des Résponsables </h6>                
                        <a href="#" class="btn btn-info" type="button" data-toggle="modal" data-target="#responsable"><span class="bi bi-person-plus"></span> Ajout</a>
                    </div>
                    <div class="card-body border border-5">
                        <div class="table-responsive table" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable table-hover my-0" id="tables">
                                <thead class="listt thead-light">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Rôle</th>
                                        <th>E-mail</th>
                                        <th>Téléphone</th>                                        
                                    </tr>
                                </thead>
                                <tbody>                                    
                    <?php foreach($utilist as $t):   ?>
                        <tr>
                            <td><img class="rounded-circle mr-2" width="30" height="30" src="../assets/imageUtilisateur/<?=$t['images']?>"><?= $t['names']?></td>
                            <td><?= $t['type']?></td>
                            <td><?= $t['email']?></td>
                            <td><?= $t['Tel']?></td>                            
                        </tr>
                    <?php  endforeach;    ?>                      
                                                                      
                                </tbody>                               
                            </table>
                        </div>
                    </div>                
                </div>
        <?php elseif($statistique == "info_payement"):?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">                                                       
        <h6 class="m-0 text-secondary lis">Autres payements</h6>                                                        
    </div>
    <div class="card-body">
        <div class="table-responsive table" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table dataTable table-striped" id="tables">
                <thead class="listt">
                    <tr>
                        <th>Payements</th>
                        <th>classes</th>
                        <th>Prix</th>
                        <th>Pourcentage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                                                                                                         
                    
                        $total_payé_classe = $db->prepare("SELECT *, COUNT(payements.id_etudiant) as p FROM payements
                        INNER JOIN payement_ecole on payement_ecole.id_ecolages =payements.id_ecolage
                        INNER JOIN classe on classe.id = payement_ecole.id_classe
                        INNER JOIN ecolages on ecolages.id = payement_ecole.id_ecolages
                        where classe.id = ? and payements.id_ecolage != 2 and payements.id_ecolage != 1
                        GROUP BY id_ecolage ");
                        $count_class= $db->prepare("SELECT *, COUNT(etudiants.id_classe) as c_l FROM classe INNER join etudiants on classe.id = etudiants.id_classe group by id_classe");
                        $count_class->execute();
                        foreach($count_class as $c_l){
                            $total_payé_classe->execute(array($c_l["id_classe"]));  
                            
                            foreach($total_payé_classe as $h){ 
                                $value = ( $h["p"]*100) / $c_l["c_l"];                                      
                    ?>                                              
                <tr>
                    <td><?=@$h["name"]?></td>
                    <td><?=@$h["Nom"]?></td>
                    <td><?=@$h["prix"]."Ar"?></td>
                    <td>                                            
                        <div class="progress">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="<?=@$value?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=@$value?>%;">
                                <span class="sr-only"><?=$value?></span>
                            </div>
                        </div>
                        <h4 class="small font-weight-bold">Taux<span class="float-right font-weight-bold"><?=$value?> %</span></h4>
                    </td>
                </tr>
        <?php                                                                       
              
        }    
      }   
        ?> 
        </tbody>                                
        </table>
    </div>
    </div>                
</div>
<?php elseif($statistique == "non_paye"):?>
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0 text-secondary lis">Payements non payer</h5>                                                        
        </div>
        <div class="card-body">
            <div class="table-responsive table" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-bordered table-striped" id="tables">
                    <thead>
                        <tr>
                            <th>Payements</th>
                            <th>classes</th>
                            <th>Prix</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php                                                                                                         
                    
                        $total_payé_classe = $db->prepare("SELECT *, COUNT(payements.id_etudiant) as p FROM payements
                        INNER JOIN payement_ecole on payement_ecole.id_ecolages =payements.id_ecolage
                        INNER JOIN classe on classe.id = payement_ecole.id_classe
                        INNER JOIN ecolages on ecolages.id = payement_ecole.id_ecolages
                        where classe.id = ? and payements.id_ecolage != 2 and payements.id_ecolage != 1
                        GROUP BY id_ecolage ");
                        $count_class= $db->prepare("SELECT *, COUNT(etudiants.id_classe) as c_l FROM classe INNER join etudiants on classe.id = etudiants.id_classe group by id_classe");
                        $count_class->execute();
                        foreach($count_class as $c_l){
                            $total_payé_classe->execute(array($c_l["id_classe"]));      
                            
                            foreach($total_payé_classe as $h){ 
                                $value = ( $h["p"]*100) / $c_l["c_l"];  
                                $va = 100 - $value;
                                
                                if($va == 0){
                                   
                                }else{

                              
                    ?>  

                <tr>
                    <td><?=@$h["name"]?></td>
                    <td><?=@$h["Nom"]?></td>
                    <td><?=@$h["prix"]."Ar"?></td>
                    <td>                                            
                        <div class="progress">
                            <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" aria-valuenow="<?=@$va?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=@$va?>%;">
                                <span class="sr-only"><?=$value?></span>
                            </div>
                        </div>
                        <h4 class="small font-weight-bold">Taux<span class="float-right font-weight-bold"><?=$va?> %</span></h4>
                    </td>
                </tr>
        <?php                                                                       
              }  
        }    
      }   
        ?> 
        </tbody>                                 
                </table>
            </div>
        </div>                
    </div>
    <?php endif;?>
        </div>
        <div class="col-lg-5 col-xl-4">
            <div class="card shadow">
                <div class="card-header">
                     <div class="text-start">
                        <div class="">
                            <h4 class="text-uppercase text-info text-center"><i class="bi bi-house"></i> Classes</h4>
                            <hr class="m-0">
                        </div>
                        <h6 class="lis"><span class="text-secondary  lis">Nombres Total</span> = <b class="text-danger"><i><?=$etudiants->rowcount();?></i></b><a href="etudiant?statistique=voir_etudiant" class="btn btn-link"><i>Voir plus</i></a></h6>                        
                        <h6><span class="text-secondary listt">Nombres  Responsables</span> = <b class="text-danger"><i><?=$utilist->rowcount();?></i></b><a href="etudiant?statistique=voir_responsable" class="btn btn-link"><i>Voir plus</i></a></h6> 
                        <div class=""><hr class="m-0">
                            <h4 class="text-uppercase text-info text-center"><i class="bi bi-cash-stack"></i> paiements</h4>
                            <hr class="m-0">
                        </div>
                        <h6 class="lis"><span class="text-secondary lis">Nombres d' écolages</span> <a href="etudiant?statistique=info_ecolage" class="btn btn-link"><i>Voir plus</i></a></h6>
                        <h6 class="lis"><span class="text-secondary lis">Autres paiements</span> <a href="etudiant?statistique=info_payement" class="btn btn-link"><i>Voir plus</i></a></h6>
                        <h6 class="lis"><span class="text-secondary lis">Paiements non payer</span> <a href="etudiant?statistique=non_paye" class="btn btn-link"><i>Voir plus</i></a></h6>
                           <hr>
                    </div>                                   
                </div>
            </div>            
        </div>
    </div> </div>
                </div>

    <?php endif;?>
    </div>    
    </div>        
    </div>    
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up mt-3"></i></a>
</div>
        </div>
    </div>
    </div>
</div>
</body>
<script src="nav/assets/js/bs-init.js"></script>
<script src="nav/assets/js/chart.min.js"></script>
<script src="nav/assets/js/jquery.min.js"></script>
<script src="nav/assets/js/theme.js"></script>

<script src="nav/assets/bootstrap/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){

        $('#tables').DataTable({
            "columnDefs":[{
                "targets":[0,1,2,3],
                "rowGroup":true,
            }],
        });
        $(".btn-sm").click(function(e){
            $(".ms").show();
        });
    })
</script>


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






























