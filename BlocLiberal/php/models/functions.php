<?php 

    function verif_password($password){
		if(preg_match('#^[a-zA-Z0-9]+$#',$password) AND strlen($password) >= 6)
			return true;
		return false;
	}

	// fonction verifiant si un utilisateur a donné un bon nom ou un bon prenom
	function verif_name($name){
		if(preg_match('#^[a-zA-Zé\'"êâäîôûçàµ£$]{1,}[a-zA-Z._ -é\'"êâäîôûçàµ£$]*$#',$name) AND strlen($name) >= 2)
			return true;
		return false;
	}

	//fonction verfiant si un numero de phone est correcte.
	function verif_phone($phone){
		return preg_match('#^(\+[0-9]{1,5})?[0-9]{6,}$#',$phone);
	}

	function validate_email($email) {
		return preg_match('#^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$#', $email);    
	}

	function generate_password() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$password ="";
		$alphaLength = strlen($alphabet) - 1; 
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$password .= $alphabet[$n];
		}
		return $password; 
	}

	function truncatewords($words){
		if(strlen($words) <= 100) return $words."...";
		return substr($words,0,101)."....";
	}

	function truncate_words($words){
		if(strlen($words) <= 500) return $words."...";
		return substr($words,0,501)."....";
	}
    


