<?php 
    session_start();

    if(isset($_SESSION['user']) && $_SESSION['user']['isAdmin'] == 0){
        header("location:../../../../index.php");
    }

    require_once("../../include/adminHeader.php");
    ?>


    <div class="container">
        <div class="row">
            <h3 class="text-center">Administration du contenu de ce site</h3> <hr>
            <p>
                Cet espace est l'interface de l'administration de ce site , toutes les actions possibles 
                d'ajout et gestion du contenu.
            </p>
            <hr>
        </div>
    </div>


    <?php
    require_once("../../include/adminFooter.php");

?>