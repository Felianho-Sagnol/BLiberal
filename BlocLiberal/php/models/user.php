<?php 
    require_once("db.php");
    require_once("functions.php");
    require_once("sendMail.php");



    class User {
        protected $_db;

        public function __construct(){
            $this->_db = (new Db())->getDb();
        }

         //function de connexion d'un user
        public function connect(){
			$errors_number = 0;
			if(!empty($_POST['adminAccess'])){
				if(empty($_POST["email"]) || !validate_email($_POST["email"])){
					$_SESSION["error_email"] = "Donner une addresse e-mail valide.";
					$errors_number += 1;
				}
				if(empty($_POST["password"]) || !verif_password($_POST["password"])){
					$_SESSION["error_password"] = "Votre mot de passe doit contenir au moins 6 caratères";
					$errors_number += 1;
				}
				if($errors_number == 0){
					$req = $this->_db->prepare('SELECT id,name,phone,email,password,isAdmin,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM users WHERE email = ? AND password = ?');
					$req->execute(array($_POST["email"],sha1($_POST["password"])));
					if($req->rowCount() == 1){
						$_SESSION['user'] = $req->fetch();
                    	$req->closeCursor();
                        header("location:../views/admin/adminIndex.php");
					}else{
						$_SESSION["error_compte_not_existe"] = "Aucun compte n'a été trouvé pour ces informations pour accéder à l'administration !";
					}
				}
			}
		}

        /**
         * Function de creation d'un user
         * @return void
         */
        public function createUser(){
			$errors_number = 0;
            $valide_password = 1;
			if(!empty($_POST['addAddmins'])){
				if(empty($_POST["name"])){
					$_SESSION["error_name"]="Votre nom s'il vous plaît.";
					$errors_number += 1;
				}
				if(empty($_POST["phone"]) || !verif_phone($_POST["phone"])){
					$_SESSION["error_phone"]="Donnez un numéro de téléphone valide.";
					$errors_number += 1;
				}
                if(empty($_POST["email"]) || !validate_email($_POST["email"])){
					$_SESSION["error_email"] = "Donner une addresse e-mail valide.";
					$errors_number += 1;
				}
				
				
				if($errors_number == 0){
                    $req = $this->_db->prepare('SELECT id FROM users WHERE email = ?');
                    $req->execute(array($_POST["email"]));
                    $exist = $req->rowCount();//si cette variable est egale 0 on inscrit le visteur
                    if($exist == 0){
                        $password = generate_password();
                        $result = send_mail(
                            $_POST['email'],$_POST['name'],$password
                        );
                        if($result){
                            $req = $this->_db->prepare(
                                'INSERT INTO users(name,phone,email,password,isAdmin,createdAt) 
                                VALUES(?,?,?,?,2,NOW())'
                            );
                            $req->execute(array(
                                $_POST['name'],$_POST['phone'],$_POST['email'],sha1($password))
                            );
                            $req->closeCursor();
    
                            $_SESSION['success'] = "L'administrateur ".$_POST['name']." a été ajouté avec succès.";
                            
                            unset($_POST);
                            $req->closeCursor();
                        }
                    }else{
                        $_SESSION["error_email"] = "Un compte existe déja avec cette addesse e-email.";
                    }
				}
			}
		}

        public function changeInformations(){
			$errors_number = 0;
			if(!empty($_POST['change'])){
				if(empty($_POST["name"])){
					$_SESSION["error_name"]="Votre nom s'il vous plaît.";
					$errors_number += 1;
				}
				if(empty($_POST["phone"]) || !verif_phone($_POST["phone"])){
					$_SESSION["error_phone"]="Donnez un numéro de téléphone valide.";
					$errors_number += 1;
				}
                if(empty($_POST["email"]) || !validate_email($_POST["email"])){
					$_SESSION["error_email"] = "Donner une addresse e-mail valide.";
					$errors_number += 1;
				}
				
				
				if($errors_number == 0){
                    if(!$this->isNoEqual($_POST['name'],$_POST['phone'],$_POST['email'])){
                        $req = $this->_db->prepare('UPDATE users SET name=?,phone=?,email=? WHERE email = ?');
                        $req->execute(array(
                            $_POST['name'],$_POST['phone'],$_POST['email'],$_SESSION['user']['email']
                        ));
                        $_SESSION['user'] = $this->getUserById($_SESSION['user']['id']);
                        $_SESSION['success'] = "Vos informations ont été modifiées avec succès.";
                        unset($_POST);
                    }
				}
			}
		}

        //chage le mot de passed'un user
        public function changePassword(){
            $errors_number = 0;
            $valide_password = 1;
			if(!empty($_POST['changepsw'])){
                if(empty($_POST["password"]) || !verif_password($_POST["password"])){
					$_SESSION["error_password"]="Le mot de passe doit contenir au moins 6 caractères!";
					$errors_number += 1;
                    $valide_password = 0;
				}
                if(empty($_POST["confirm_password"]) || !verif_password($_POST["confirm_password"])){
					$_SESSION["error_confirm_password"]="Le mot de passe doit contenir au moins 6 caractères!";
					$errors_number += 1;
				}else{
                    if($valide_password == 1 AND $_POST["password"] != $_POST["confirm_password"]){
                        $_SESSION["error_confirm_password"]="Le mot de passe de confirmation est différent du mot de passe initial.";
                        $errors_number += 1;
                    }
                }

                if($errors_number == 0){
                    $req = $this->_db->prepare('UPDATE users SET password = ? WHERE email = ?');
                    $req->execute(array(sha1($_POST['password']),$_SESSION['user']['email']));
                    unset($_POST);
                    $_SESSION['success'] = "Votre mot de passe a été changé avec succès.";
                }
            }
        }

        public function isNoEqual($name,$phone,$email){
            return $_SESSION['user']['name'] == $name && $_SESSION['user']['email'] == $email && $_SESSION['user']['phone'] == $phone;
        }


        public function deleteUser($id){
            $user = $this->existUser($id);
            if ($user){
                $_SESSION["user_suppression"] = "L'utilisateur de numéro --".$id."-- a été supprimé avec succès.";
                $req = $this->_db->prepare('DELETE FROM users WHERE id = ?');
                $req->execute(array($id));
            }else{
                $_SESSION["user_suppression"] = "L'utilisateur de numéro --".$id."-- n'existe pas";
            }
        }

        public function existUser($id){
            $req = $this->_db->prepare('SELECT id FROM users WHERE id = ?');
            $req->execute(array($id));
            if ($req->rowCount() == 0) return false;
            return true;
        }

        public function getUserById($id){
            $req = $this->_db->prepare('SELECT id,name,phone,email,password,isAdmin,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM users WHERE id = ?');
            $req->execute(array($id));
            if ($req->rowCount() == 0) return null;
            return $req->fetch();
        }

        public function existUserWithId($id){
            $req = $this->_db->prepare('SELECT phone FROM users WHERE id = ?');
            $req->execute(array($id));
            if ($req->rowCount() == 0) return false;
            return true;
        }

        /**
         * function pour prendre tous les user afin d'effectuer les operations sur eux
         *
         * @return void
         */
        public function getAllUsers(){
            $reponse = $this->_db->query('SELECT id,name,phone,email,password,isAdmin,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM users');
            if($reponse->rowCount() == 0){
                return array();
            }else{
                $users = [];
                while ($donnees = $reponse->fetch()){
                    $users[] = $donnees;
                }
                return $users;
            }
            $reponse->closeCursor();
        }

        public function getAllAdmins(){
            $reponse = $this->_db->query('SELECT id,name,phone,email,password,isAdmin,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM users WHERE isAdmin <> 0');
            return $reponse->fetchAll();
        }


        //verifie si un user est administrateur
        public function isAdmin($email){
            $req = $this->_db->prepare('SELECT isAdmin FROM users WHERE email = ?');
            $req->execute(array($email));
            $user = $req->fetch();
            if($user["isAdmin"] != 0) return true;
            return false;
        }
     
        /**
         * permet de definir la pagination sur les utilisateur sur
         * elle return un table contenant les utilisateur a affiché sur une page (5/page)
         * et le nombre de page page total sur qu'on va utilisé une boucle pour afficher 
         * les liens en bas en passant la variable page dans l'url
         * @return void
         */
        public function userPagination(){
            $numberByPage = 10;
            $totalUsers = count($this->getAllUsers());
            $totalPages = intval(ceil($totalUsers / $numberByPage));
            if(isset($_GET["page"]) AND !empty($_GET["page"]) AND $_GET["page"] > 0 AND $_GET["page"] <= $totalPages){
                $pageCourante = intval($_GET["page"]);
            }else{
                $pageCourante = 1;
            }
            $start = ($pageCourante -1) * $numberByPage;
            $reponse = $this->_db->query('SELECT id,pseudo,phone,profile,password,ville,quartier,indication,isAdmin,DATE_FORMAT(createdAt,\'%d/%m/%Y\') AS createdAt FROM users ORDER BY id ASC LIMIT '.$start.','.$numberByPage);
            if($reponse->rowCount() == 0){
                $users = [];
            }else{
                $users = [];
                while ($donnees = $reponse->fetch()){
                    $users[] = $donnees;
                }
            }
            $reponse->closeCursor();
            $pagination["users"] = $users;
            $pagination["totalPage"] = $totalPages;
            $pagination["pageCourante"] = $pageCourante;
            return $pagination; 
        }
    }
    