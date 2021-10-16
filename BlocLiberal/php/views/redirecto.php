<?php
    session_start();

    /*-------Presse------- */
    if(isset($_GET['presseid'])){
        if(isset($_SESSION['presseretour'])) unset($_SESSION['presseretour']) ;
        if(isset($_SESSION['presseid'])) unset($_SESSION['presseid']) ;
        $_SESSION['presseid'] = $_GET['presseid'];
        header('location:presseview.php');
    }
    if(isset($_GET['presseretour'])){
        if(isset($_SESSION['presseid'])) unset($_SESSION['presseid']) ;
        if(isset($_SESSION['presseretour'])) unset($_SESSION['presseretour']) ;
        header('location:presseview.php');
    }

