<?php 
    require_once("db.php");
    require_once("functions.php");

    class Accreditation {
        protected $_db;

        public function __construct(){
            $this->_db = (new Db())->getDb();
        }
    }