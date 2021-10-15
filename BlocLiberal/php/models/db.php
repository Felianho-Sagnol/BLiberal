<?php
    //local db info 
    class Db {
        public function getDb(){
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=blocLiberal;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            return $bdd;
        }
    }
?>