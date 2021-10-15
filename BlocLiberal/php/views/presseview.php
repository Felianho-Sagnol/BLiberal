<?php
    session_start();
    require_once('../models/presse.php');
        $presseInstance = new Presse();
        $presses = $presseInstance->getAllPresses();
    require_once("../include/header.php");
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
                                        
                                        <div style="box-shadow: 6px 6px 0px black;">
                                            <h4><?=$presse['title'] ;?></h4>
                                            <hr>
                                            <p>je suis la hejj hjjejjk lkkkcvlvjkklcvkvk
                                                dfjdfkfdhfk ljhdkjlfjjjjjjjfjgjkkldfklfdjjdf 3djkdjjkdf
                                                dfjkldffj jdfkdfljdfk ljhfj kslqiie kjdskksdj kskldjhsd
                                            </p>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="row">

                        </div>
                    <?php
                }
            ?>
        </div>
    <?php
    require_once("../include/footer.php");
?>