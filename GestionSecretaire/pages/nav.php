<nav class="navbar navbar-expand-md" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center mx-2" href="/">
                <!-- <span class="text-warning non font-weight-bold" style="font-size: 40px;"> Shoolap</span> -->
                <span class="text-info font-weight-bold listte" style="font-size: 30px;"> Shoolap</span>
            </a>                    
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto" id="uli">
                    <li class="nav-item mx-1"><a class="nav-link listte py-1 <?php etudiants($link);?>" href="etudiant">Etudiants</a></li>
                    <li class="nav-item mx-1"><a class="nav-link listte px-2 py-1 <?php  classe($link); ?>" href="classe">Classes</a></li>
                    <li class="nav-item mx-1"><a class="nav-link  listte  py-1 <?php  verification($link); ?>" href="verification">Vérifications</a></li>
                    <li class="nav-item mx-1"><a class="nav-link  listte py-1 <?php  facturation($link); ?>" href="facturation">Reçus</a></li>
                </ul>
                <!-- <form action="" method="post" class="mb-0">
                    &nbsp;&nbsp;<button type="submit" class="btn btn-link text-danger mt-2" name="deconnexion"> Se deconnecté</button>
                </form>   -->
            </div>
        </div>
    </nav>









  

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