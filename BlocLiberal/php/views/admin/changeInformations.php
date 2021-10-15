<?php
    session_start();
    require_once("../../phpMailerLibrary/Exception.php");
    require_once("../../phpMailerLibrary/OAuth.php");
    require_once("../../phpMailerLibrary/PHPMailer.php");
    require_once("../../phpMailerLibrary/SMTP.php");
    require_once("../../models/user.php");
        $userInstance = new User();

        $userInstance->changeInformations();
        $userInstance->changePassword();

    require_once("../../include/adminHeader.php");
    ?>
        <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">
                            Modifiez vos informations
                        </h3>
                        <hr>
                    </div>
                </div>
                <div style="margin-bottom:25px" class="row mt-3 mb-4">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 realisationCadre">
                            <?php
                                if(isset($_SESSION['success'])){
                                    ?>
                                        <h5 style ="color:green;margin-bottom:15px"><?= $_SESSION['success'] ?></h5>
                                        <hr>
                                    <?php
                                    unset($_SESSION['success']);
                                }
                            ?>
                            <form action='changeInformations.php' method='post' enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Prenom & Nom :</label>
                                    <input 
                                    value="<?php if(isset($_POST['name'])){echo $_POST["name"];}else{ echo $_SESSION["user"]['name']; }?>" 
                                    name="name" class="form-control form-control-sm" type="text" placeholder="Nom complet.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_name"])) { echo $_SESSION["error_name"]." *"; unset($_SESSION["error_name"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="">Téléphone :</label>
                                    <input 
                                    value="<?php if(isset($_POST['phone'])){echo $_POST["phone"];}else{ echo $_SESSION["user"]['phone']; }?>" 

                                    name="phone" class="form-control form-control-sm" type="text" placeholder="Numéro de téléphone.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_phone"])) { echo $_SESSION["error_phone"]." *"; unset($_SESSION["error_phone"]);}
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="">Email :</label>
                                    <input 
                                    value="<?php if(isset($_POST['email'])){echo $_POST["email"];}else{ echo $_SESSION["user"]['email']; }?>" 
                                    name="email" class="form-control form-control-sm" type="text" placeholder="Addresse e-mail d'accès.">
                                    <p style='color:red' class="error">
                                        <?php 
                                            if(isset($_SESSION["error_email"])) { echo $_SESSION["error_email"]." *"; unset($_SESSION["error_email"]);}
                                        ?>
                                    </p>
                                </div>
                                <input type="submit" name="change" style="width:100%" value="Changer vos informations !"class="btn btn-primary">
                            </form>
                            <form style='margin-top:50px;' action='changeInformations.php' method='post' enctype="multipart/form-data">
                                <fieldset>
                                        <legend>Changer votre mot de passe</legend>
                                        <div class="form-group ">
                                            <label class="col-sm-3 control-label" for="input-password">Nouveau Mot de passe</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password" 
                                                value="<?php if(isset($_POST['password'])){echo $_POST["password"];}?>" 
                                                placeholder="Mot de passe" id="input-password" class="form-control" />
                                                <p class="error">
                                                    <?php 
                                                        if(isset($_SESSION["error_password"])) { echo $_SESSION["error_password"]." *"; unset($_SESSION["error_password"]);}
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-sm-3 control-label" for="input-confirm">Confirmation</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="confirm_password" 
                                                value="<?php if(isset($_POST['confirm_password'])){echo $_POST["confirm_password"];}?>" 
                                                placeholder="Confirmer le mot de passe" id="input-confirm" class="form-control" />
                                                <p class="error">
                                                    <?php 
                                                        if(isset($_SESSION["error_confirm_password"])) { echo $_SESSION["error_confirm_password"]." *"; unset($_SESSION["error_confirm_password"]);}
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                </fieldset>
                                <input type="submit" name="changepsw" style="width:100%" value="Changer le mot de passe !"class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
        </div>
    <?php
    require_once("../../include/adminFooter.php");
?>
