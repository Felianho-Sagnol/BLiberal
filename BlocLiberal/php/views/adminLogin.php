<?php
    session_start();
    require_once("../phpMailerLibrary/Exception.php");
    require_once("../phpMailerLibrary/OAuth.php");
    require_once("../phpMailerLibrary/PHPMailer.php");
    require_once("../phpMailerLibrary/SMTP.php");
    require_once("../models/user.php");
        $userInstance = new User();

        $userInstance->connect();
    require_once("../include/header.php");
    ?>
        <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">
                            Accès Administration
                        </h3>
                        <hr>
                    </div>
                </div>
                <div style="margin-bottom:25px" class="row mt-3 mb-4">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 realisationCadre">
                            <form action='adminLogin.php' method='post' enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Email :</label>
                                    <input value="<?php if(isset($_POST["email"])) echo $_POST["email"];?>" name="email" class="form-control form-control-sm" type="text" placeholder="Votre addresse e-mail d'accès.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_email"])) { echo $_SESSION["error_email"]." *"; unset($_SESSION["error_email"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="">Mot de passe :</label>
                                    <input value="<?php if(isset($_POST["password"])) echo $_POST["password"];?>" name="password" type="password" class="form-control form-control-sm" placeholder="Votre mot de passe d'accès.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_password"])) { echo $_SESSION["error_password"]." *"; unset($_SESSION["error_password"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_compte_not_existe"])) { echo $_SESSION["error_compte_not_existe"]." *"; unset($_SESSION["error_compte_not_existe"]);}
                                        ?>
                                    </p>
                                </div>
                                <input type="submit" name="adminAccess" style="width:100%" value="Acceder !"class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
        </div>
    <?php
    require_once("../include/footer.php");
?>
