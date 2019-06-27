<?php

require_once "Manager.php";

class AdminManager extends Manager
{
	public function addPassword()
	{
		$db = $this->dbconnect();

		$pass_hache = password_hash($abc, PASSWORD_DEFAULT);
		$req = $db->prepare('UPDATE user SET password = :pass WHERE id = 1');
		$req->bindValue(':pass', $pass_hache);
		$req->execute();

    	if (!$req == false) {
    		echo 'Mot de passe modifié';
    	}
	}

	public function logIn($pseudo, $password)
	{
		$db = $this->dbconnect();
		$req = $db->prepare('SELECT password FROM user WHERE login = :pseudo');
		$req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$req->execute();
		$q = $req->fetch(PDO::FETCH_ASSOC);

		if ($req)
		{
			$isPwOk = password_verify($password, $q['password']);
			if ($isPwOk) 
			{
				session_start();
				$_SESSION['pseudo'] = $pseudo;
				echo 'Vous êtes connecté.e :)';

				// if (checkLogin is set) {
				// 	setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
				// 	setcookie('password', $q['password'], time() + 365*24*3600, null, null, false, true);
				// }
			}
			else {
				echo 'Mauvais identifiant ou mot de passe :(';
			}
		}
		else {
			echo 'Mauvais identifiant ou mot de passe :(';
		}
	}

	public function logOut()
	{
		session_start();
		$_SESSION = array();
		session_destroy();
	}

	public function getProfil()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT username, login, password FROM user WHERE id = 1');
		
		return $req;
	}

	public function updateProfile($username, $pseudo, $oldpass, $newpass)
	{
		$db = $this->dbConnect();

		$req = null;
		if (!$username == null) {
			$req = $db->prepare('UPDATE user SET username = :username WHERE id = 1');
			$req->bindValue(':username', $username);
			$req->execute();
		}
		if (!$pseudo == null) {
			$req = $db->prepare('UPDATE user SET login = :pseudo WHERE id = 1');
			$req->bindValue(':pseudo', $pseudo);
			$req->execute();
		}
		if (!$oldpass == null && !$newpass == null) 
		{
			$key = $db->query('SELECT password FROM user where id = 1');
			$key = $key->fetch();
			$isPwOk = password_verify($oldpass, $key['password']);

			if ($isPwOk) {
				$newpass = password_hash($newpass, PASSWORD_DEFAULT);
				$req = $db->prepare('UPDATE user SET password = :password WHERE id = 1');
				$req->bindValue(':password', $newpass);
				$req->execute();
			}
		}
		return $req;
	}
}
