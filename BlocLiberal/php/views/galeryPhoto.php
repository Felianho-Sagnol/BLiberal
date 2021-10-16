<?php
    session_start();
    require_once('../models/galery.php');
        $galeryInstance = new Galery();
        $galeries = $galeryInstance->getContent();
    require_once("../include/header.php");

    ?>
        <div class="container">
            <?php
                if(count($galeries) != 0){
                    ?>
                        <div class="row mt-5">
                        <?php
                            foreach($galeries as $galery){
                                ?>
                                    <div class="col-md-4 col-xs-16"style="margin-bottom: 50px;" >
                                        <img width="100%" height="200px" src="../../image/galery/<?=$galery['url'] ;?>" alt="">
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
                                <h5>Aucune photo disponible dans la galerie pour l'instant. <a style="margin-left:5px;" href="../../../index.php">Retour à l'accueil !!!</a></h5>
                                <hr>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    <?php
    require_once("../include/footer.php");
?>