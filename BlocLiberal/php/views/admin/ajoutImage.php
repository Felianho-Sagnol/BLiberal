<?php
    session_start();
    require_once("../../models/galery.php");
        $galeryInstance = new Galery();

        $galeryInstance->addPicture();

    require_once("../../include/adminHeader.php");

    if(!isset($_SESSION['viewgalerycontent'])){
        ?>
            <div class="container ">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center">
                                Ajouter une photo dans la galerie.
                            </h3>
                            <hr>
                        </div>
                    </div>
                    <div style="margin-bottom:25px" class="row mt-3 mb-4">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 realisationCadre">
                                <h5 class="text-center mb-3"><a href="redirection.php?viewgalerycontent=ok">Voir le contenu de la galerie ici.</a></h5>
                                <?php
                                    if(isset($_SESSION['success'])){
                                        ?>
                                            <h5 style ="color:green;margin-bottom:15px"><?= $_SESSION['success'] ?></h5>
                                            <hr>
                                        <?php
                                        unset($_SESSION['success']);
                                    }
                                ?>
                                <form action='ajoutImage.php' method='post' enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Choisir une image</label>
                                        <input type="file" name='photo' class="form-control-file form-control-sm" id="exampleFormControlFile1">
                                        <p style='color:red' class="error">
                                            <?php 
                                                if(isset($_SESSION["photo_errors"])) { echo $_SESSION["photo_errors"]." *"; unset($_SESSION["photo_errors"]);}
                                            ?>
                                        </p>
                                    </div>
                                    <input type="submit" name="addImage" style="width:100%" value="Ajouter la photo à la galerie !"class="btn btn-primary">
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
            </div>
        <?php
    }else{
        $galeryContent = $galeryInstance->getContent();
        ?>
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">
                            Contenu de la galerie photo.
                        </h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <h4 class="text-center"><a href="redirection.php?notviewcontentgalery=ok">Ajouter une image ici</a></h4>
                    <hr>
                    <?php
                        if(count($galeryContent) != 0){
                            foreach($galeryContent as $content){
                                ?>
                                    <div style="margin-bottom:20px;" class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <img style="margin-bottom:5px;" width="100%" height="200px" src="../../../image/galery/<?=$content['url'] ;?>" alt="">
                                        <span style="font-size:15px;font-weight:bold;">Ajoutée Le : </span> <span><?=$content['createdAt'] ;?></span><br>
                                        <span style="font-size:15px;font-weight:bold;">Par : </span> <span><?=$content['admin'] ;?></span><br>
                                    </div>
                                <?php
                            }
                        }else{
                            ?>
                                <div style="margin-bottom:70px;" class="col-12">
                                    <h5>Aucun contenu disponible pour l'instant.</h5>
                                    <hr>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        <?php
    }

    
    require_once("../../include/adminFooter.php");
?>
