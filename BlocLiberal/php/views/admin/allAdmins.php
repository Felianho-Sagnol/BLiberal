<?php 
    session_start();
    require_once("../../models/user.php");
        $userInstance = new User();
        $allAdmins = $userInstance->getAllAdmins();
    require_once("../../include/adminHeader.php");

    ?>
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">
                        Affichage des administrateur du site.
                    </h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Prenoms & Noms</th>
                            <th scope="col">E-mails</th>
                            <th scope="col">Téléphones</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($allAdmins as $admin) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?=$admin['name'];?></th>
                                            <td><?=$admin['email'];?></td>
                                            <td><?=$admin['phone'];?></td>
                                            <?php
                                                if($admin['email'] == $_SESSION['user']['email']) {
                                                    ?>
                                                        <td>
                                                            (Vous)
                                                        </td>
                                                    <?php
                                                }else{
                                                    if($_SESSION['user']['isAdmin'] == 1) {
                                                        ?>
                                                            <td>
                                                                <a href="redirection.php?delete=<?=$admin['id'];?>"><i style="color:red;" class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        <?php
                                                    }else{
                                                        ?><td></td> <?php
                                                    }
                                                }
                                            ?>
                                        </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    <?php
    
    require_once("../../include/adminFooter.php");

?>