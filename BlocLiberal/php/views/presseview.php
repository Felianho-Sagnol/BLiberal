<?php
    session_start();
    require_once('../models/presse.php');
        $presseInstance = new Presse();
        $presses = $presseInstance->getAllPresses();
    require_once("../include/header.php");

    if(!isset($_SESSION['presseid'])){
        ?>
        <div class="container">
            <?php
                if(count($presses) != 0){
                    ?>
                        <div class="row mt-5">
                        <?php
                            foreach($presses as $presse){
                                ?>
                                    <div class="col-md-4 col-xs-16"style="margin-bottom: 50px;" >
                                        <img width="100%" height="200px" src="../../image/actualites/presses/<?=$presse['image'] ;?>" alt="">
                                        <div style="height:200px;box-shadow: 6px 6px 0px black;">
                                            <h4><?=truncatewrds($presse['title']) ;?></h4>
                                            <hr>
                                            <p>
                                                <?=truncate_words($presse['content']);?>
                                            </p>
                                            <div align="center">
                                                <a href="redirecto.php?presseid=<?=$presse['id'] ?>" class="btn btn-primary">
                                                    <i class="fa fa-caret-center" style="color:#fff;"></i> Lire la suite
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                        </div>
                    <?php
                }else{
                    ?>
                        <div style="margin-top:70px;margin-bottom:70px;margin:4px;" class="row">
                            <div class="col-12">
                                <hr>
                                <h5>Aucune revue de presse disponible pour l'instant. <a style="margin-left:5px;" href="../../../index.php">Retour à l'accueil !!!</a></h5>
                                <hr>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
        <?php
    }else{
        $presse = $presseInstance->getPresseById($_SESSION['presseid']);
        ?>
            <div class="container">
                <div style="margin:3px;margin-top:10px;" class="row">
                    <div class="col-3 col-md-2 col-xs-0"></div>
                    <div class="col-6 col-md-8 col-xs-12">
                        <img width="100%" height="400px" src="../../image/actualites/presses/<?=$presse['image'] ;?>" alt="">
                        <h3 style='font-weight: bold;'><?=$presse['title'] ;?></h3> <hr>
                        <h4 style='font-weight: bold;'>Publiée le : <?=$presse['createdAt'] ;?>.</h4>
                        <p style="font-size:19px;">
                            <?=$presse['content'] ;?>
                        </p>
                        <hr>
                        <div align="end" style="margin-bottom:10px">
                            <a href="redirecto.php?presseretour=ok" class="btn btn-primary">
                                <i class="fa fa-caret-end" style="color:#fff;"></i> Se retourner à la liste !
                            </a>
                        </div>
                    </div>
                    <div class="col-3 col-md-2 col-xs-0"></div>
                </div>
            </div>
        <?php
    }
    
    require_once("../include/footer.php");
?>