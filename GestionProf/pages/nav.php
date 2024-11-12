<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ft-bottom shadow-lg">
      <div class="container-fluid" style="border-radius: 3px;">
          <a class="navbar-brand mr-5" href="#" >
            <img src="nav/images/logo.png" alt="" width="200px" height="50px">
          </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav">                       
            <p class=" text-center mt-2">
              <div class="container mt-2 mb-4">
                <div class="nav nav-tab justify-content-end">                            
                    <li class="nav-item m-2">
                      <div class="input-group">
                        <span class="input-group-text fa fa-home bg-light <?php acceuil($link);?>" style="cursor: pointer;">
                        <a href="acceuil" class="nav-link">Acceuil</a></span>                             
                      </div>
                    </li>
                    <li class="nav-item m-2">
                      <div class="input-group">
                        <span class="input-group-text fa fa-building bg-light <?php  classe($link); ?>" style="cursor: pointer;">
                        <a href="classe" class="nav-link ">Classes</a></span>                             
                      </div>
                    </li>
                    <li class="nav-item m-2">
                      <div class="input-group">
                        <span class="input-group-text fa fa-calendar-alt bg-light <?php  presence($link); ?>" style="cursor: pointer;" href="verification">
                        <a href="presence" class="nav-link">Présence</a></span>                             
                      </div>
                    </li>     
                    <li class="nav-item m-2">
                      <div class="input-group">
                        <span class="input-group-text fa fa-book bg-light  <?php  cours($link); ?>" style="cursor: pointer;" href="verification">
                        <a href="cours" class="nav-link">Cours</a></span>                             
                      </div>
                    </li> 
                    <li class="nav-item m-2">
                      <div class="input-group">
                        <span class="input-group-text fa fa-list-alt bg-light <?php  exercice($link); ?>" style="cursor: pointer;" href="verification">
                        <a href="exercice" class="nav-link">Cahier d'exercice</a></span>                             
                      </div>
                    </li>  
                    <li class="nav-item m-2">
                      <div class="input-group">
                        <span class="input-group-text fa fa-map bg-light  <?php  preparation($link); ?>" style="cursor: pointer;" href="verification">
                        <a href="preparation" class="nav-link">Fiche de preparation</a></span>                             
                      </div>
                    </li>                                      
                </div>
              </div>                      
            </p>                               
          </ul>   
        </div>                   
      </div>
  </div>        
</nav>






