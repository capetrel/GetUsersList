<?php

include(dirname(__FILE__) . '/GetUsersListMapper.php');

// Si il y a un post on execute le code
if(!empty($_POST['submit'])){

    // On lance la requete pour recupérer un array de users
    $list_user = GetUsersListMapper::getUserList();

    // Instance d'un objet qui génerera un fichier avec le tableau
    $file_list_users = new GetUsersListHelpers();
    // arrayToCsv renvoie un le chemin du fichier
    $filepath = $file_list_users->arrayToCsv($list_user);

    echo '<strong style="color: #204d74">Contenu du fichier</strong><br>';

    // Pour afficher le contenu du fichier à l'utilisateur
    $view = $file_list_users->fileReader($filepath);

    echo $view.'<br>';

    echo '<a href="../cc-content/plugins/GetUsersList/files/liste-utilisateurs.csv" title="Liste des utilisateurs">Cliquer ici pour lancer le téléchargement du fichier</a>';

// Sinon il n'y a pas de post
}else{
    echo '<strong style="color: #204d74">Cliquez sur le bouton pour lancer le téléchargement.</strong>';
}
