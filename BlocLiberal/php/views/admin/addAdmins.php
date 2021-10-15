<?php
    session_start();
    require_once("../../phpMailerLibrary/Exception.php");
    require_once("../../phpMailerLibrary/OAuth.php");
    require_once("../../phpMailerLibrary/PHPMailer.php");
    require_once("../../phpMailerLibrary/SMTP.php");
    require_once("../../models/user.php");
        $userInstance = new User();

        $userInstance->createUser();
    require_once("../../include/adminHeader.php");
    ?>
        <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">
                            Ajout d'administrateurs du site
                        </h3>
                        <hr>
                    </div>
                </div>
                <div style="margin-bottom:25px" class="row mt-3 mb-4">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 realisationCadre">
                            <h5 class="text-center mb-3"><a href="redirectionForActions.php?viewcommunique=ok">Voir tous les administrateurs existants ?</a></h5>
                            <?php
                                if(isset($_SESSION['success'])){
                                    ?>
                                        <h5 style ="color:green;margin-bottom:15px"><?= $_SESSION['success'] ?></h5>
                                        <hr>
                                    <?php
                                    unset($_SESSION['success']);
                                }
                            ?>
                            <form action='addAdmins.php' method='post' enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Prenom & Nom :</label>
                                    <input value="<?php if(isset($_POST["name"])) echo $_POST["name"];?>" name="name" class="form-control form-control-sm" type="text" placeholder="Nom complet.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_name"])) { echo $_SESSION["error_name"]." *"; unset($_SESSION["error_name"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="">Téléphone :</label>
                                    <input value="<?php if(isset($_POST["phone"])) echo $_POST["phone"];?>" name="phone" class="form-control form-control-sm" type="text" placeholder="Numéro de téléphone.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_phone"])) { echo $_SESSION["error_phone"]." *"; unset($_SESSION["error_phone"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="">Email :</label>
                                    <input value="<?php if(isset($_POST["email"])) echo $_POST["email"];?>" name="email" class="form-control form-control-sm" type="text" placeholder="Addresse e-mail d'accès.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_email"])) { echo $_SESSION["error_email"]." *"; unset($_SESSION["error_email"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["sendMailerror"])) { echo $_SESSION["sendMailerror"]." *"; unset($_SESSION["sendMailerror"]);}
                                        ?>
                                    </p>
                                </div>
                                <input type="submit" name="addAddmins" style="width:100%" value="Acceder !"class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
        </div>
    <?php
    require_once("../../include/adminFooter.php");
?>
