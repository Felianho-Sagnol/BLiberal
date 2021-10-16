<?php
  include_once("BlocLiberal/php/models/presse.php");
  include_once("BlocLiberal/php/models/communique.php");
  include_once("BlocLiberal/php/models/galery.php");

  $presseInstance = new Presse();
  $galeryInstance = new Galery();

  $presses = $presseInstance->getAllPresses();
  $galeries = $galeryInstance->getContent();

  //var_dump($galeries);
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from fpi-ci.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 12:56:49 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="BL, BLOC LIBERAL,Politique,Politique guinéenne,Faya">
    <link href="BlocLiberal/image/images/logo.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "../connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="BlocLiberal/style/style_menu.css">
    <link rel="stylesheet" type="text/css" href="BlocLiberal/slide/engine1/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="BlocLiberal/slide/engine3/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Le Bloc Libéral | Accueil</title>
    <link href="BlocLiberal/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="BlocLiberal/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="BlocLiberal/style/animate.css" rel="stylesheet">
    <link href="BlocLiberal/style/blocliberal.css" rel="stylesheet">
    <link href="BlocLiberal/style/design.css" rel="stylesheet">
    <link href="BlocLiberal/style/font.css" rel="stylesheet">
</head>

<body>
    <div id="header" class="entete">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" align="center">
                    <img src="BlocLiberal/image/images/logo.png" class="img-responsive mt-2">
                    <h5>Unité - Justice - Prospérité</h5>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" id="slogan">
                    LE Bloc Libéral
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow fadeInDown newletterbloc" data-wow-duration="1000ms" data-wow-delay="900ms" id="rechercher">
                    <form method="post" action="#" name="form1">
                        INSCRIPTION À LA NEWSLETTER
                        <div class="input-group">
                            <input type="text" class="form-control" name="new" placeholder="Votre Adresse mail ..." id="input_recherche">
                            <span class="input-group-btn">
                                <input type="submit" class="btn newsletterbtn" value="Souscrire" name="newsletter" id="bouton_recherche">
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <div id='cssmenu'>
                        <ul style="z-index:100;">
                            <li><a href='' style="padding-bottom:12px; padding-top:12px;"><i class="fa fa-home home" style="font-size:30px;"></i></a></li>
                            <li class="has-sub"><a href='#'>Le BL</a>
                                <ul>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalBL.php?#historique'>Historique</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalBL.php?#congres'>Le Congrès</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalBL.php?#convention'>La Convention</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalBL.php?#bureau_executif'>Le bureau exécutif</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalBL.php?#secretariat_general'>Le secrétariat général</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalBL.php?#statut_et_regrlements'>Statut et Règlement</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href='#'>Actualités</a>
                                <ul>
                                    <li><a href='BlocLiberal/php/views/presseview.php'>La presse</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalActualitesEtRessourses.php?#vie_des_federations'>Vie des fédérations</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalActualitesEtRessourses.php?#communique'>Communiqués</a></li>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalActualitesEtRessourses.php?#discours'>Discours</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href='#'>Ressources & média</a>
                                <ul>
                                    <li><a href='BlocLiberal/php/views/galeryPhoto.php'>Galerie Photos</a></li>
                                    <li><a href='#'>Galerie vidéos</a></li>
                                    <li><a href='#'>Contributions</a></li>
                                </ul>
                            </li>
                            <li><a href='BlocLiberal/php/views/ProgrammeCommunication.php?#programme'>Programme</a></li>
                            <li class="has-sub"><a href='#'>Communication</a>
                                <ul>
                                    <li><a href='BlocLiberal/php/views/BlocLiberalActualitesEtRessourses.php?#communique'>Communiqués</a></li>
                                    <li><a href='BlocLiberal/php/views/ProgrammeCommunication.php?#Contact'>Nous contacter</a></li>
                                    <li><a href='BlocLiberal/php/views/ProgrammeCommunication.php?#accreditation'>Accréditations</a></li>
                                    <li><a href='BlocLiberal/php/views/adminLogin.php'>Accès Administration</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href='#'>Les élections</a>
                                <ul>
                                    <li><a href='BlocLiberal/php/views/Elections.php?#candidats'>Nos candidats</a></li>
                                    <li><a href='BlocLiberal/php/views/Elections.php?#campagne'>La campagne</a></li>
                                </ul>
                            </li>
                            <li><a href='BlocLiberal/php/views/ProgrammeCommunication.php?#Contact'>Nous contacter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table width="100%">
                    <tr>
                        <td width="140" id="flash_info"><span>Flash Info</span></td>
                        <td>
                            <div id="flash">
                                <marquee direction="left" scrollamount="5" scrolldelay="100" onMouseOver="this.stop();" onMouseOut="this.start();">
                                    <a href="#" target="_blank">
                                        Ensemble, bâtissons une nation grande , un pays de liberté, de justice & d'égalité. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                         
                                    </a>
                                    <a href="#" target="_blank">
                                        Unité - Justice - Prospérité. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                         
                                    </a>
                                </marquee>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="corp">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div id="wowslider-container1">
                        <div class="ws_images">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img class="imge" src="BlocLiberal/image/images/bl-members.jpg" alt="" title="Assemblée générale" id="wows1_0" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="BlocLiberal/image/images/reunion1.jpg" alt="" title="Unis pour un même objectif" id="wows1_0" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="BlocLiberal/image/images/reunion2.jpg" alt="" title="Des militants déterminés" id="wows1_0" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="BlocLiberal/image/images/reunion-bl.jpg" alt="" title="Engagés pour aider la nation" id="wows1_0" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img  src="BlocLiberal/image/images/reunion1.jpg" alt="" title="Ensemble nous, nous pouvons." id="wows1_0" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="ws_bullets">
                            <div>
                                <a href="#" title="Reunion"><span>1</span></a>
                                <a href="#" title="Unis"><span>2</span></a>
                                <a href="#" title="COMMUNI "><span>3</span></a>
                                <a href="#" title="Engagé pour aider la nation"><span>4</span></a>
                                <a href="#" title="Ensemble nous irons loin"><span>5</span></a>
                                <a href="#" title="Soutenez le BL"><span>6</span></a>
                            </div>
                        </div>
                        <div class="ws_shadow"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <a href="contributions.html">
                        <div id="faire_don">
                            <p class="soutien">Soutenez le BL</p>
                            <div align="center"><img src="BlocLiberal/image/images/logo.png" class="img-responsive" width="80"></div>
                            <div>
                                <h4><a href="">Faites un don !</a></h4>
                            </div>
                        </div>
                    </a>
                    <a href="membre.html" class="btn btn-warning btn-block" id="membre">Devenez membre</a>
                    <div id="top">
                        <h4>RESTEZ CONNECTES:</h4>
                        <a href="https://www.facebook.com/FRONTPOPULAIREIVOIRIEN/?fref=nf" target="_blank" title="Facebook" style="text-decoration:none;">
                            <i style="color:#39579a;" class="fa fa-2x fa-facebook"></i> &nbsp;
                        </a>
                        <a href="https://twitter.com/FPI_officiel" target="_blank" title="Twitter" style="text-decoration:none;">
                            <i style="color:#00abf0;" class="fa fa-2x fa-twitter"></i> &nbsp;
                        </a>
                        <a href="#" title="Instagram" style="text-decoration:none;">
                            <i style="color:#96644a;" class="fa fa-2x fa-instagram"></i> &nbsp;
                        </a>
                        <a href="#" title="Google +" style="text-decoration:none;">
                            <i style="color:#de220f;" class="fa fa-2x fa-google-plus"></i> &nbsp;
                        </a>
                        <a href="#" title="Google +" style="text-decoration:none;">
                            <i style="color:#F00;" class="fa fa-2x fa-youtube"></i> &nbsp;
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div id="titro_bienvenue">Dernières actualité</div>
                    <?php 
                        if(count($presses) != 0){
                            $presse = $presses[0];
                            ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                                        <a style="width:100%;height:20px" href="BlocLiberal/php/views/redirecto.php?presseid=<?=$presse['id'] ?>">
                                            <img src="BlocLiberal/image/actualites/presses/<?=$presse['image'] ;?>" class="img-responsiv" width="100%" height="300px"/>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                                        <a href="BlocLiberal/php/views/redirecto.php?presseid=<?=$presse['id'] ?>">
                                            <div id="titro_actualite"><?=truncatewords($presse['title']) ;?></div>
                                        </a>
                                        <div id="descrip_actualite">
                                            <p>
                                                <?=truncate_words($presse['content']) ;?>
                                            </p> 
                                            <a href="BlocLiberal/php/views/redirecto.php?presseid=<?=$presse['id'] ?>" class="btn btn-primary">Lire la suite</a>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                        }
                    ?>
                    
                    <div class="row">
                        
                        
                        <?php
                            if(count($presses) > 1){
                                for($i = 1; $i < count($presses); $i++){
                                    if($i == 4) break;
                                    $presse = $presses[$i];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                                            <div id="box_article">
                                                <a href="BlocLiberal/php/views/redirecto.php?presseid=<?=$presse['id'] ?>">
                                                    <div id="box_img" align="center"><img src="BlocLiberal/image/actualites/presses/<?=$presse['image'] ;?>" width="100%" height="100%" class="img-responsiv"></div>
                                                </a>
                                                <h4 id="titro_msg">
                                                    <a href="BlocLiberal/php/views/redirecto.php?presseid=<?=$presse['id'] ?>"><?=truncatewords($presse['content']);?></a>
                                                </h4>
                                                <div style="overflow:auto;" id="descrip_actualite">
                                                    <p>
                                                        <?=truncate_words($presse['content']) ?>
                                                    </p>
                                                    <div align="right">
                                                        <a href="BlocLiberal/php/views/redirecto.php?presseid=<?=$presse['id'] ?>" class="btn btn-primary">
                                                            <i class="fa fa-caret-right" style="color:#fff;"></i> Lire la suite
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div id="top" class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                        <div id="titro_actualite">Galerie vidéo</div>
                        <a href="index.php">
                            <table width="100%" id="img_media" style="background:url(BlocLiberal/image/images/reunion2.jpg) no-repeat; background-size:cover;">
                                <tr>
                                    <td align="center"><img src="BlocLiberal/img/youtube.png" width="40"></td>
                                </tr>
                            </table>
                        </a>
                    </div>
                    <div id="blog" class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                        <div id="titro_actualite">Communiqué</div>
                        <a href="BlocLiberal/php/views/redirecto.php"><img src="BlocLiberal/img/communique.png" width="250" class="img-responsive"></a>
                        <div id="titro_actualite">Presse</div>
                        
                        <div id="wowslider-container3">
                            <div class="ws_images">
                                <ul>
                                    <?php
                                        if(count($presses) != 0){
                                            for($i = 0; $i < count($presses); $i++){
                                                $presse = $presses[$i];
                                                ?>
                                                    <li>
                                                        <a href="BlocLiberal/php/views/redirecto.php?presseid=<?=$presse['id'] ?>">
                                                            <img width="100" height="170px"src="BlocLiberal/image/actualites/presses/<?=$presse['image'] ;?>" alt="" title="" id="wows3_4" />
                                                        </a>
                                                    </li>
                                                <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="ws_shadow"></div>
                        </div>
                        <div id="top" class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                            <div id="titro_actualite">Galerie photos</div>
                            <a href="index.php">
                                <?php 
                                    for($i=0; $i < count($galeries); $i++){
                                        if($i == 6) break;
                                        $galery = $galeries[$i];
                                        ?>
                                            <div id="box_galerie"><img width="100" height="20px"src="BlocLiberal/image/galery/<?=$galery['url'] ?>" class="img-responsive"></div>
                                        <?php
                                    }
                                ?>
                                
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div id="titro_foot">Nous contacter</div>
                    <div id="separer_foot">
                        <i class="fa fa-map-marker" style="color:#f75718;"></i> Conakry &nbsp; &nbsp;
                        <i class="fa fa-envelope" style="color:#f75718;"></i> bl@gmail.com &nbsp; &nbsp;
                        <i class="fa fa-phone" style="color:#f75718;"></i> +2247887888 &nbsp; &nbsp;
                    </div>
                    <div id="separer_foot"><a href='#'>Contactez nous</a></div>
                    <div style="margin-top:25px">
                        <a href="#" target="_blank" title="Facebook" style="text-decoration:none;">
                            <i style="color:#39579a;" class="fa fa-2x fa-facebook"></i> &nbsp;
                        </a>
                        <a href="#" target="_blank" title="Twitter" style="text-decoration:none;">
                            <i style="color:#00abf0;" class="fa fa-2x fa-twitter"></i> &nbsp;
                        </a>
                        <a href="#" title="Instagram" style="text-decoration:none;">
                            <i style="color:#96644a;" class="fa fa-2x fa-instagram"></i> &nbsp;
                        </a>
                        <a href="#" title="Google +" style="text-decoration:none;">
                            <i style="color:#de220f;" class="fa fa-2x fa-google-plus"></i> &nbsp;
                        </a>
                        <a href="#" title="Google +" style="text-decoration:none;">
                            <i style="color:#F00;" class="fa fa-2x fa-youtube"></i> &nbsp;
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div id="titro_foot">Menu</div>
                    <div id="separer_foot"><a href='index.php'><i class="fa fa-arrow-circle-o-right" style="color:#f75718;"></i> Accueil</a></div>
                    <div id="separer_foot"><a href=''><i class="fa fa-arrow-circle-o-right" style="color:#f75718;"></i> Actualités</a></div>
                    <div id="separer_foot"><a href='BlocLiberal/php/views/presseview.php'><i class="fa fa-arrow-circle-o-right" style="color:#f75718;"></i> Presse</a></div>
                    <div id="separer_foot"><a href='#'><i class="fa fa-arrow-circle-o-right" style="color:#f75718;"></i> Historique</a></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div id="titro_foot">Suivez nous sur Facebook</div>
                    <div class="fb-page" data-href="#" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
                </div>
            </div>
            <div class="row" style="font-size:12px; margin-top:10px;">
                <div class="col-lg-2 col-md-2 col-sm-2"></div>
                <div class="col-lg-8 col-md-10 col-sm-10">
                    <a href="#" target="_blank" style="color:#fff; text-decoration:none;">&copy;</a> Le Bloc Libéral, Tous Droits R&eacute;serv&eacute;s.
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" 
    integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" 
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" 
        crossorigin="anonymous"></script>
    <script src="BlocLiberal/bootstrap/js/bootstrap.js"></script>
    <script src="BlocLiberal/style/wow.min.js"></script>
    <script type="text/javascript" src="BlocLiberal/slide/engine3/jquery.js"></script>
    <script type="text/javascript" src="BlocLiberal/slide/engine1/jquery.js"></script>
    <script type="text/javascript" src="BlocLiberal/slide/engine3/wowslider.js"></script>
    <script type="text/javascript" src="BlocLiberal/slide/engine3/script.js"></script>
    <script src="BlocLiberal/style/jquery-latest.min.js" type="text/javascript"></script>
    <script src="BlocLiberal/style/script.js"></script>
    <script type="text/javascript" src="BlocLiberal/slide/engine1/wowslider.js"></script>
    <script type="text/javascript" src="BlocLiberal/slide/engine1/script.js"></script>
    <script>
        wow = new WOW({

            })
            .init();
    </script>
</body>
</html>