<?php
    function typeControleur($twig, $db){
        $form = array();

        if (isset($_POST['validType'])){
            $inputType =$_POST['inputType'];
            $form['valide'] = true;
                $type = new Type($db);
                $exec = $type->insert($inputType);
                if (!$exec){
                    $form['valide'] = false;
                    $form['message'] = 'Problème d\'insertion dans la table utilisateur ';
            }
        }
        $type = new Type($db);
        $liste = $type->select();
        echo $twig->render('type.html.twig', array('form'=>$form,'liste'=>$liste));

            
    }
?>