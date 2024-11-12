<div class="container mt-5">
    <div class="ml-5 mt-5">
        <div class="row">
            <div class="card col-md-8 ml-5 m-0 p-0 mt-5">
                <div class="row mt-3">
                    <div class="col-sm-6 col-md-6">
                        <div class="ml-5">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="file" id="logos" class="d-none m-0 p-0">
                                <div class="text-center">
                                    <label for="logos">
                                        <img src="nav/yyyy.png" class="ml-3 miova" width="100%" height="65px">
                                    </label>
                                </div>
                                <!-- <div class="text-center text-dark mt-4">
                                    <input type="text" class="d-none">
                                    <i class="bi bi-images"></i>
                                    <span class="mt-5">LOGO.</span>
                                </div>      -->
                            </form>                           
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mt-4">
                            <?php
                            $prixx = $db->prepare("SELECT * FROM payement_ecole WHERE id = ?");
                            $prixx->execute(array($_GET['pri']));
                            foreach ($prixx as $p) :  ?>
                                <h4 class="ml-5"><span class="text-dark">N° </span><span style="border-bottom: 1px dashed;"><input type="text" class="col-sm-3" id="num"><span class="text-danger" id="enreg"></span></span> <span class="text-dark">B.P AR.</span><span class="border px-3"><?= $p['prix'] ?></span></h4>
                            <?php endforeach;   ?>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-3 mb-3">
                    <div class="ml-3">
                        <?php
                        $sel_et = $db->prepare("SELECT * FROM payements WHERE id_etudiant = ?");
                        $sel_et->execute(array($_GET['id_etudiants']));

                        $etd = $db->prepare("SELECT * FROM etudiants WHERE id = ?");
                        $etd->execute(array($_GET['id_etudiants']));

                        foreach ($etd as $k) :   ?>
                            <h4 class="mx-5"><span class="text-dark">Reçu de M </span><span style="border-bottom: 1px dashed;"><?= $k['nom'] . " " . $k['prenom'] ?></span></h4>
                            <h4 class="mx-5"><span class="text-dark">Matricule : </span><?= $k['matricule'] ?></h4>
                            <h4 class="mx-5"><span class="text-dark">La somme de : </span><input type="text" id="somme"><span id="save" style="border-bottom: 1px dashed;"></span></h4>
                            <h4 class="mx-5"><span class="text-dark">Motif : </span><span style="border-bottom: 1px dashed;"><?= $_GET['nom_p'] ?> <?= transforem($_GET['mois']); ?></span></h4>
                        <?php endforeach; ?>
                        <div class="row">
                            <div class="col-sm-6 col-md-3"></div>
                            <div class="col-sm-6 col-md-8">
                                <div class="text-center ml-5">
                                    <?php
                                    $mod_p = $db->prepare("SELECT * FROM ecolages WHERE name = ? ");
                                    $mod_p->execute(array($_GET['nom_p']));
                                    foreach ($mod_p as $i) {
                                        $i['id'];
                                        $dates = $db->prepare("SELECT * FROM payements WHERE id_ecolage = ? AND id_etudiant = ? AND mois = ?");
                                        $dates->execute(array($i['id'], $_GET['id_etudiants'], $_GET['mois']));
                                    }

                                    foreach ($dates as $d) :
                                    ?>
                                        <p class="ml-5"><input type="text" id="sommm"><span id="pays" style="border-bottom: 1px dashed;"></span> <span class="text-dark">LE</span> <span style="border-bottom: 1px dashed;"> <?php $day = new DateTime($d['date_payement']);?><?= $day->format("d-M-Y") ?></span></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-2 mb-4">
                            <p>Signature</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group btn ml-4 mt-2" id="hidden">
            <a href="facturation" class="text-center py-2 btn btn-outline-danger px-3 rounded mt-1 btn-bloc"><i class="bi bi-x-circle"></i> Annuler</a>&nbsp;
            <button onclick="window.print()" class="text-center py-2 btn rounded btn-outline-info mt-1 btn-bloc"><i class="bi bi-printer"></i> Imprimer</button>
        </div>
        <style>
            @media print{
                #hidden{
                    visibility: hidden;
                }
            }
        </style>
    </div>
</div>
<style>
    * {
        font-family: 'poppins';
    }

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
<script>
    var sarye = document.getElementById("logos");
    var change = document.querySelector(".miova");
    sarye.onchange = function(){
        fichier = sarye.files[0];

        var ii = new FileReader();

        ii.onload = function(e){
            change.src = e.target.result;
        }
        ii.readAsDataURL(fichier);
    }
</script>
<script>
    var input = document.getElementById("somme");
    var text = document.getElementById("save");

    input.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            text.innerText = input.value;
            input.style.display = "none"
        }
    })


    var inputs = document.getElementById("num");
    var texte = document.getElementById("enreg");

    inputs.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            texte.innerText = inputs.value;
            inputs.style.display = "none"
        }
    })


    var inputss = document.getElementById("sommm");
    var textes = document.getElementById("pays");

    inputss.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            textes.innerText = inputss.value;
            inputss.style.display = "none"
        }
    })
</script>