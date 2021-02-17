<?php

function getPage($db){


    $lesPages['accueil'] = "accueilControleur";
    $lesPages['vente'] = "venteControleur";
    $lesPages['inscrire'] = "inscrireControleur";
    $lesPages['contact'] = "contactControleur";
    $lesPages['maintenance'] = "maintenanceControleur";
    $lesPages['connexion'] = "connexionControleur";
    $lesPages['deconnexion'] = "deconnexionControleur";
    $lesPages['utilisateur'] = "utilisateurControleur";
    $lesPages['type'] = "typeControleur";
    $lesPages['utilisateurmod'] = "utilisateurModifControleur";

    
    if ($db!=null){
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 'accueil';
        }
        if (isset($lesPages[$page])){
            $contenu = $lesPages[$page];
        }
        else{
            $contenu = $lesPages['accueil'];
        }
        return $contenu;
    }
    else{
        $contenu = $lesPages['maintenance'];
    }
}
    
?>