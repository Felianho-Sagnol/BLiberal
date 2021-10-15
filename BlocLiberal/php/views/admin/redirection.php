<?php 
    session_start();
    require_once("../../models/user.php");
    require_once("../../models/communique.php");
    require_once("../../models/presse.php");
    require_once("../../models/discours.php");
    require_once("../../models/federation.php");



        $userInstance = new User();
        $comInstance = new Communique();
        $presseInstance = new Presse();
        $discoursInstance = new Discours();
        $federationInstance = new VieFederation();




    /**------------user---------------------------- */
    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
        header("location:../adminLogin.php");
    }
    if(isset($_GET['delete'])){
        $userInstance->deleteUser($_GET['delete']);
        header("location:allAdmins.php");
    }
    /**------------galery---------------------------- */
    if(isset($_GET['viewgalerycontent'])){
        $_SESSION['viewgalerycontent'] = true;
        header("location:ajoutImage.php");
    }
    if(isset($_GET['notviewcontentgalery'])){
        unset($_SESSION['viewgalerycontent']) ;
        header("location:ajoutImage.php");
    }

    /**------------communiqué---------------------------- */
    if(isset($_GET['viewcommunique'])){
        if(isset($_SESSION['lirecommuniqueId'])) unset($_SESSION['lirecommuniqueId']) ;
        $_SESSION['viewcommunique'] = true;
        header("location:ajoutcommunique.php");
    }

    if(isset($_GET['deleteId'])){
        if(isset($_SESSION['lirecommuniqueId'])) unset($_SESSION['lirecommuniqueId']) ;
        $comInstance->deleteCommunique($_GET['deleteId']);
        $_SESSION['viewcommunique'] = true;
        header("location:ajoutcommunique.php");
    }

    if(isset($_GET['addcom'])){
        if(isset($_SESSION['lirecommuniqueId'])) unset($_SESSION['lirecommuniqueId']) ;
        if(isset($_SESSION['viewcommunique'])) unset($_SESSION['viewcommunique']) ;
        header("location:ajoutcommunique.php");
    }

    if(isset($_GET['notviewcontent'])){
        unset($_SESSION['viewcommunique']) ;
        header("location:ajoutcommunique.php");
    }

    if(isset($_GET['lirecommuniqueId'])){
        if(isset($_SESSION['viewcommunique'])) unset($_SESSION['viewcommunique']) ;
        $_SESSION['lirecommuniqueId'] = $_GET['lirecommuniqueId'];
        header("location:ajoutcommunique.php");
    }

    /*-------------------------presse start part--------------------------*/
    if(isset($_GET['viewspresse'])){
        if(isset($_SESSION['lirepresseId'])) unset($_SESSION['lirepresseId']) ;
        $_SESSION['viewspresse'] = true;
        header("location:ajoutpresse.php");
    }

    if(isset($_GET['deletepresseId'])){
        if(isset($_SESSION['lirepresseId'])) unset($_SESSION['lirepresseId']) ;
        $presseInstance->deletePresse($_GET['deletepresseId']);
        $_SESSION['viewspresse'] = true;
        header("location:ajoutpresse.php");
    }
    if(isset($_GET['addpresse'])){
        if(isset($_SESSION['lirepresseId'])) unset($_SESSION['lirepresseId']) ;
        if(isset($_SESSION['viewspresse'])) unset($_SESSION['viewspresse']) ;
        header("location:ajoutpresse.php");
    }

    if(isset($_GET['lirepresseId'])){
        if(isset($_SESSION['viewspresse'])) unset($_SESSION['viewspresse']) ;
        $_SESSION['lirepresseId'] = $_GET['lirepresseId'];
        header("location:ajoutpresse.php");
    }

    /*-------------------------discours start part--------------------------*/
    if(isset($_GET['viewsdiscours'])){
        if(isset($_SESSION['lirediscoursId'])) unset($_SESSION['lirediscoursId']) ;
        $_SESSION['viewsdiscours'] = true;
        header("location:ajoutdiscours.php");
    }

    if(isset($_GET['deletediscoursId'])){
        if(isset($_SESSION['lirediscoursId'])) unset($_SESSION['lirediscoursId']) ;
        $discoursInstance->deleteDiscours($_GET['deletediscoursId']);
        $_SESSION['viewsdiscours'] = true;
        header("location:ajoutdiscours.php");
    }
    if(isset($_GET['adddiscours'])){
        if(isset($_SESSION['lirediscoursId'])) unset($_SESSION['lirediscoursId']) ;
        if(isset($_SESSION['viewsdiscours'])) unset($_SESSION['viewsdiscours']) ;
        header("location:ajoutdiscours.php");
    }

    if(isset($_GET['lirediscoursId'])){
        if(isset($_SESSION['viewsdiscours'])) unset($_SESSION['viewsdiscours']) ;
        $_SESSION['lirediscoursId'] = $_GET['lirediscoursId'];
        header("location:ajoutdiscours.php");
    }

    /*-------------------------federation start part--------------------------*/
    if(isset($_GET['viewsviefederation'])){
        if(isset($_SESSION['lirefederationId'])) unset($_SESSION['lirefederationId']) ;
        $_SESSION['viewsviefederation'] = true;
        header("location:ajoutviedefederation.php");
    }

    if(isset($_GET['deletefederationId'])){
        if(isset($_SESSION['lirefederationId'])) unset($_SESSION['lirefederationId']) ;
        $federationInstance->deleteFederation($_GET['deletefederationId']);
        $_SESSION['viewsviefederation'] = true;
        header("location:ajoutviedefederation.php");
    }
    if(isset($_GET['addfederation'])){
        if(isset($_SESSION['lirefederationId'])) unset($_SESSION['lirefederationId']) ;
        if(isset($_SESSION['viewsviefederation'])) unset($_SESSION['viewsviefederation']) ;
        header("location:ajoutviedefederation.php");
    }

    if(isset($_GET['lirefederationId'])){
        if(isset($_SESSION['viewsviefederation'])) unset($_SESSION['viewsviefederation']) ;
        $_SESSION['lirefederationId'] = $_GET['lirefederationId'];
        header("location:ajoutviedefederation.php");
    }



?>