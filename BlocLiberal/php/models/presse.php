<?php 
    require_once("db.php");
    require_once("functions.php");

    class Presse {
        protected $_db;

        public function __construct(){
            $this->_db = (new Db())->getDb();
        }

        public function addpresse(){
            if(!empty($_POST['ajoutpress'])){
                $errorsNumber = 0;
                if(empty($_POST['title'])){
                    $errorsNumber += 1;
                    $_SESSION['titleError'] = "Veillez remplir ce champ.";
                }
                if(empty($_POST['content'])){
                    $errorsNumber += 1;
                    $_SESSION['contentError'] = "Veillez remplir ce champ.";
                }
                if($errorsNumber == 0){
                    if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])){
                        $tailMax = 2097152;
                        $extention = array(
                            'jpg','jpeg','gif','png','svg','JPG','JPEG','PNG','GIF','SVG'
                        );
                        if($_FILES['photo']['size'] <= $tailMax){
                            $file_upload_extension =strtolower(substr(strrchr($_FILES['photo']['name'],'.'), 1));
                            if(in_array($file_upload_extension, $extention)){
                                $name_in_the_folder_and_in_db = date("Y-m-h-i-s").'.'.$file_upload_extension;
                                $chemin = '../../../image/actualites/presses/'.$name_in_the_folder_and_in_db;
                                $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                                if($resultat){
                                    $this->addPresseResquest(htmlspecialchars($_POST['title']),htmlspecialchars($_POST['content']),$name_in_the_folder_and_in_db);
                                    $_SESSION['succes'] = "La revue de presse : ".$_POST['title'].", a été ajoutée avec succès.";
                                    unset($_POST['title']);
                                    unset($_POST['content']);
                                }else{
                                    $_SESSION['photo_errors'] = "Il y a eu une erreur lors de l'importation de la photo.";
                                }
                            }else{
                                $_SESSION['photo_errors'] = "La photo doit être au format jpep ,jpg ,gif ou png";
                            }
                        }else{
                            $_SESSION['photo_errors'] ='La taille de la photo doit être au maximun = 2Mo';
                        }
                    }else{
                        $_SESSION['photo_errors'] = "veillez choisir une photo .";
                    }
                }
            }
        }

        public function addPresseResquest($title,$content,$photo){
            $req = $this->_db->prepare('INSERT INTO actualites(title,type,content,image,createdAt) VALUES(?,?,?,?,NOW())');
            $req->execute(array($title,'PRESSE',$content,$photo));
        }

        public function updatePresseItem($id){
            if(!empty($_POST['updatepresse'])){
                $errorsNumber = 0;
                if(empty($_POST['title'])){
                    $errorsNumber += 1;
                    $_SESSION['titleError'] = "Veillez remplir ce champ.";
                }
                if(empty($_POST['content'])){
                    $errorsNumber += 1;
                    $_SESSION['contentError'] = "Veillez remplir ce champ.";
                }
                if($errorsNumber == 0){
                    if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])){
                        $tailMax = 2097152;
                        $extention = array(
                            'jpg','jpeg','gif','png','svg','JPG','JPEG','PNG','GIF','SVG'
                        );
                        if($_FILES['photo']['size'] <= $tailMax){
                            $file_upload_extension =strtolower(substr(strrchr($_FILES['photo']['name'],'.'), 1));
                            if(in_array($file_upload_extension, $extention)){
                                $name_in_the_folder_and_in_db = date("Y-m-h-i-s").'.'.$file_upload_extension;
                                $chemin = '../../../image/actualites/presses/'.$name_in_the_folder_and_in_db;
                                $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                                if($resultat){
                                    $this->updatePresse(htmlspecialchars($_POST['title']),htmlspecialchars($_POST['content']),$name_in_the_folder_and_in_db,$id);
                                    $_SESSION['modifsucces'] = "La revue de presse : ".$_POST['title'].", a été modifiée avec succès.";
                                    unset($_POST['title']);
                                    unset($_POST['content']);
                                }else{
                                    $_SESSION['photo_errors'] = "Il y a eu une erreur lors de l'importation de la photo.";
                                }
                            }else{
                                $_SESSION['photo_errors'] = "La photo  doit être au format jpep ,jpg ,gif,svg ou png";
                            }
                        }else{
                            $_SESSION['photo_errors'] ='La taille de la photo doit être au maximun = 2Mo';
                        }
                    }else{
                        $this->updatePresse(htmlspecialchars($_POST['title']),htmlspecialchars($_POST['content']),'',$id);
                        $_SESSION['modifsucces'] = "La revue de presse : ".$_POST['title']." a été modifiée avec succès.";
                        unset($_POST['title']);
                        unset($_POST['content']);
                    }
                }
            }
        }

        public function updatePresse($title,$content,$image,$id){
            if($image == ""){
                $req = $this->_db->prepare('UPDATE actualites SET title=?,content=? WHERE id = ? AND type = ?');
                $req->execute(array($title,$content,$id,"PRESSE"));
            }else{
                $req = $this->_db->prepare('UPDATE actualites SET title=?,content=?,image=? WHERE id = ? AND type = ?');
                $req->execute(array($name,$description,$image,$id,"PRESSE"));
            }
            
        }

        public function deletePresse($id){
            $req = $this->_db->prepare('DELETE FROM actualites WHERE id = ? AND type=?');
            $req->execute(array($id,'PRESSE'));
        }

        public function getAllPresses(){
            $req = $this->_db->prepare('SELECT id,title,content,image,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM actualites WHERE type=? ORDER BY id DESC');
            $req->execute(array("PRESSE"));
            return $req->fetchAll();
        }

        public function getPresseById($id){
            $req = $this->_db->prepare('SELECT id,title,content,image,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM actualites WHERE type=? AND id = ?');
            $req->execute(array('PRESSE',$id));
            return $req->fetch();
        }
    }
    