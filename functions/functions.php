<?php


function locations($url)
{
    header("location:" . $url);
}

function adrSession($url)
{
}

if (isset($_POST["connexion"])) {
    $email = $_POST["email"];
    $mdp = sha1($_POST["mdp"]);
    if (!empty($email and $mdp)) {
        $utilisateur->execute([$email, $mdp]);
        $data = $utilisateur->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur->rowcount() == 1) {
            $_SESSION["utilisateur"] = array("nom" => $data["names"], "id" => $data["id"], "type" => $data["type"], "sary" => $data["images"], "status" => $data["status"]);

            if($data['status'] == "desactiver") {
                header('location:functions/status.php');
            } else {
                if ($data["type"] == "admin") {
                    locations("gestionecoles");
                } elseif ($data["type"] == "secretaire") {
                    locations("gestionsecretaire/etudiant");
                } elseif ($data["type"] == "prof") {
                    locations("gestionprof");
                } else {
                    $error =  "Une erreur est survenue";
                }
            }
        } else {
            $error = "compte inexistant";
        }
    } else {
        $error = "Veuillez completer";
    }
}


function transform($mois)
{
    if ($mois == 1) {
        echo ". Janvier";
    } elseif ($mois == 2) {
        echo ". fevrier";
    } elseif ($mois == 3) {
        echo ". Mars";
    } elseif ($mois == 4) {
        echo ". Avril";
    } elseif ($mois == 5) {
        echo ". Mai";
    } elseif ($mois == 6) {
        echo ". Juin";
    } elseif ($mois == 7) {
        echo ". Juillet";
    } elseif ($mois == 8) {
        echo ". Août";
    } elseif ($mois == 9) {
        echo ". Septembre";
    } elseif ($mois == 10) {
        echo ". Octombre";
    } elseif ($mois == 11) {
        echo ". Novembre";
    } elseif ($mois == 12) {
        echo ". Décembre";
    }
}



function transforem($mois)
{
    if ($mois == 1) {
        echo "mois de Janvier";
    } elseif ($mois == 2) {
        echo "mois de fevrier";
    } elseif ($mois == 3) {
        echo "mois de Mars";
    } elseif ($mois == 4) {
        echo "mois de Avril";
    } elseif ($mois == 5) {
        echo "mois de Mai";
    } elseif ($mois == 6) {
        echo "mois de Juin";
    } elseif ($mois == 7) {
        echo "mois de Juillet";
    } elseif ($mois == 8) {
        echo "mois de Août";
    } elseif ($mois == 9) {
        echo "mois de Septembre";
    } elseif ($mois == 10) {
        echo "mois de Octombre";
    } elseif ($mois == 11) {
        echo "mois de Novembre";
    } elseif ($mois == 12) {
        echo "mois de Décembre";
    }
}





if (isset($_POST["deconnexion"])) {
    session_destroy();
    locations("../");
}
