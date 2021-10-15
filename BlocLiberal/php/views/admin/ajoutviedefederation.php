<?php 
    session_start();
    require_once("../../models/federation.php");
        $federationInstance = new VieFederation();
        $federationInstance->addviefederation();


    require_once("../../include/adminHeader.php");

    if(!isset($_SESSION['viewviefederation'])){
        ?>
            
        <?php
    }else{
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-center">
                            afficher
                        </h5>
                    </div>
                </div>
            </div>
        <?php
    }

    if(!isset($_SESSION['viewsviefederation']) && !isset($_SESSION['lirefederationId'])){
        ?>
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">
                            Ajoutez une vie de fédération
                        </h3>
                        <hr>
                    </div>
                </div>
                <div style="margin-bottom:25px" class="row mt-3 mb-4">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 realisationCadre">
                            <h5 class="text-center mb-3"><a href="redirection.php?viewsviefederation=ok">Voir toutes les vies de fédération déjà redigées ?</a></h5>
                            <?php
                                if(isset($_SESSION['succes'])){
                                    ?>
                                        <h5 style ="color:green;margin-bottom:15px"><?= $_SESSION['succes'] ?></h5>
                                    <?php
                                    unset($_SESSION['succes']);
                                }
                            ?>
                            <form action='ajoutviedefederation.php' method='post' enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Titre </label>
                                    <input value="<?php if(isset($_POST["title"])) echo $_POST["title"];?>" name="title" class="form-control form-control-sm" type="text" placeholder="Donner un titre .">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["titleError"])) { echo $_SESSION["titleError"]." *"; unset($_SESSION["titleError"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group purple-border">
                                    <label for="exampleFormControlTextarea4">Contenu </label>
                                    <textarea  name='content' class="form-control" id="" placeholder="Ecrivez le contenu ici..." rows="6"><?php if(isset($_POST["content"])) echo $_POST["content"];?></textarea>
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["contentError"])) { echo $_SESSION["contentError"]." *"; unset($_SESSION["contentError"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" name='photo' class="form-control-file form-control-sm" id="exampleFormControlFile1">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["photo_errors"])) { echo $_SESSION["photo_errors"]." *"; unset($_SESSION["photo_errors"]);}
                                        ?>
                                    </p>
                                </div>
                                <input type="submit" name="ajoutviefederation" style="width:100%" value="Ajoutez une vie de fédération"class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
            </div>
        <?php
    }else{
        if(isset($_SESSION['lirefederationId'])){
            $comuniqueItem = $federationInstance->getFederationById($_SESSION['lirefederationId']);
            ?>
                <div style="margin:20px;" class="container">
                    <div class="row">
                        <h3 class="text-center">Titre : <?=$comuniqueItem['title'] ;?></h3>
                        <hr>
                        <h4>Redigé le : <?=$comuniqueItem['createdAt'] ;?></h4>
                        <h4>Contenu :</h4>
                        <hr>
                        <p>
                            <?=$comuniqueItem['content'] ;?>
                        </p>
                        <hr>
                        <a class="btn btn-primary" href="redirection.php?viewsviefederation=ok">Retour à la liste</a>
                        <?php
                            if($_SESSION['user']['isAdmin'] == 1){
                                ?>
                                    <a style="margin-left:20px;color:white;background-color:red;" class="btn btn-primary" href="redirection.php?deletefederationId=<?=$comuniqueItem['id'] ;?>">Supprimer !</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            <?php
        }else{
            $allcommuniques = $federationInstance->getAllFederation();
            ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center">
                                Les vies de fédérations ajoutées sont disponibles ici.
                            </h4>
                            <hr>
                            <h4 class="text-center"><a href="redirection.php?addfederation=ok">Ajoutez-en ici</a></h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            if(count($allcommuniques) != 0) {
                                foreach($allcommuniques as $communique) {
                                    ?>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <img style="margin-bottom:5px;" width="100%" height="200px" src="../../../image/actualites/viedefederation/<?=$communique['image'] ;?>" alt="">
                                            <h4 style='font-weight: bold;'><?=$communique['title'] ;?></h4>
                                            <h5>Ajouté le : <?=$communique['createdAt'] ;?></h5>
                                            <p>
                                                <?=truncatewords($communique['content']) ;?><br>
                                                <a style='margin-top:5px;' href="redirection.php?lirefederationId=<?=$communique['id'] ;?>">Lire le contenu ?</a>
                                            </p>
    
                                        </div>
                                    <?php
                                }
                            }else{
                                ?>
                                    <div style="margin-bottom:70px;" class="col-12">
                                        <h5>Aucune vie de fédération disponible pour l'instant.</h5>
                                        <hr>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            <?php
        }
    }
    
    
    require_once("../../include/adminFooter.php");

?>