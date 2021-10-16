<?php 
    require_once("db.php");
    require_once("functions.php");

    class Galery {
        protected $_db;

        public function __construct(){
            $this->_db = (new Db())->getDb();
        }

        public function addPicture(){
            if(!empty($_POST['addImage'])){
                if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])){
                    $tailMax = 2097152;
                    $extention = array('jpg','jpeg','gif','png');
                    if($_FILES['photo']['size'] <= $tailMax){
                        $file_upload_extension =strtolower(substr(strrchr($_FILES['photo']['name'],'.'), 1));
                        if(in_array($file_upload_extension, $extention)){
                            $name_in_the_folder_and_in_db = $_SESSION['user']['id'].'-'.date("Y-m-h-i-s").'.'.$file_upload_extension;
                            $chemin = '../../../image/galery/'.$name_in_the_folder_and_in_db;
                            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                            if($resultat){
                                $req = $this->_db->prepare('INSERT INTO  galery(url,admin,createdAt) VALUES(?,?,NOW())');
                                $req->execute(array($name_in_the_folder_and_in_db,$_SESSION['user']['name']));
                                $_SESSION['success'] = "Image ajoutée avec succès,Vous pouvez aujoutez encore s'il en existe encore.";
                            }else{
                                $_SESSION['photo_errors'] = "Il y a eu une erreur lors de l'importation de la photo.";
                            }
                        }else{
                            $_SESSION['photo_errors'] = "La photo de profile doit être au format jpep ,jpg ,gif ou png";
                        }
                    }else{
                        $_SESSION['photo_errors'] ='La taille de la photo doit être au maximun = 2Mo';
                    }
                }else{
                    $_SESSION['photo_errors'] = "veillez choisir une photo de profile";
                }
            }
            
        }

        public function getContent() {
            $req = $this->_db->prepare('SELECT id,url,admin,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM galery ORDER BY id DESC');
            $req->execute(array());

            return $req->fetchAll();
        }

    }