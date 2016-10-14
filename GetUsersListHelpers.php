<?php
/**
 * Created by PhpStorm.
 * User: capetrel
 * Date: 07/10/2016
 * Time: 13:56
 */

class GetUsersListHelpers {

    // function qui lit un fichier cvs, enregistre les entrées  et les renvoie dans un tableau.
    public function arrayToCsv ($array) {

        // On ouvre/crée le fichier dans un répertoire
        $file = fopen(dirname(__DIR__).'/GetUsersList/files/liste-utilisateurs.csv','w') or die("impossible d'ouvrir liste-utilisateurs.csv");

        // on insere une première ligne dans le fichier
        fputcsv($file, array('nom d\'utilsateur',' email'));

        // on parcour le tableau, a chaque entrée
        foreach($array as $user) {
            fputcsv($file, $user); // on prend le contenu et on le met dans le fichier file
        }
        // on ferme le fichier
        fclose($file) or die("impossible d'ouvrir liste-utilisateurs.csv");

        // $file = Ressource id #...
        $path = dirname(__FILE__).'/files/liste-utilisateurs.csv';

        return $path;
    }

    // fonction qui lit un fichier et affiche le contenu dans le navigateur
    public function fileReader($path_file) {

        // on ouvre le fichier et on met le contenu dans une variable
        $handle = fopen($path_file, "r");

        // feof retourne TRUE si le pointeur est à la fin du fichier ou si une erreur survient, sinon, retourne FALSE
        // tant que feof n'est pas à la fin du fichier
        while (!feof($handle)){
            //On lit la ligne courante
            $buffer = fgets($handle);
            //On l'affiche
            echo $buffer.'<br>';
        }
        // On ferme le fichier
        fclose($handle);
    }

}