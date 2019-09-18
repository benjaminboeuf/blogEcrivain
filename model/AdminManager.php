<?php

require_once "Manager.php";

class AdminManager extends Manager
{
	public function logIn($pseudo, $password, $check)
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
				echo $check;
				session_start();
				$_SESSION['pseudo'] = $pseudo;

				if ($check == 1) {
					echo $check;
					setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
					setcookie('password', $q['password'], time() + 365*24*3600, null, null, false, true);
				}
			}
			else {
				echo 'Mauvais identifiant ou mot de passe :(';
				header("Refresh: 3;URL=" . $_SERVER['HTTP_REFERER']);
			}
		}
		else {
			echo 'Mauvais identifiant ou mot de passe :(';
			header("Refresh: 3;URL=" . $_SERVER['HTTP_REFERER']);
		}
	}

	public function logInCookie($pseudo, $password) {

		$db = $this->dbconnect();
		$req = $db->prepare('SELECT password FROM user WHERE login = :pseudo');
		$req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$req->execute();
		$q = $req->fetch(PDO::FETCH_ASSOC);

		if ($req)
		{
			// $isPwOk = password_verify($password, $q['password']);
			if ($password == $q['password']) 
			{
				echo ('bla');
				if (!isset($_SESSION['pseudo'])) {
					session_start();
					$_SESSION['pseudo'] = $pseudo;
				}
				// header('Location: index.php?action=listChaptersViewBackend');
			}
			else {
				echo 'Mauvais identifiant ou mot de passe :(';
				setcookie('pseudo', NULL, -1);
				setcookie('password', NULL, -1);
				header("Refresh: 3;URL=index.php?action=logPage");
			}
		}
		else {
			echo 'Mauvais identifiant ou mot de passe :(';
			setcookie('pseudo', NULL, -1);
			setcookie('password', NULL, -1);
			header("Refresh: 3;URL=index.php?action=logPage");
		}
	}

	public function logOut()
	{
		session_start();
		$_SESSION = array();
		setcookie('pseudo', NULL, -1);
		setcookie('password', NULL, -1);
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
			echo '<div class="container" style="text-align: center; font-size: 1.3em; color: grey; margin: 20 0 20 0">Vos nom et prénom ont été mis à jour</div>';
		}
		if (!$pseudo == null) {
			$req = $db->prepare('UPDATE user SET login = :pseudo WHERE id = 1');
			$req->bindValue(':pseudo', $pseudo);
			$req->execute();
			echo '<div class="container" style="text-align: center; font-size: 1.3em; color: grey; margin: 20 0 20 0">Votre pseudonyme a été mis à jour</div>';
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
				echo '<div class="container" style="text-align: center; font-size: 1.3em; color: grey; margin: 20 0 20 0">Votre mot de passe a été mis à jour</div>';
			}
			else {
				echo '<div class="container" style="text-align: center; font-size: 1.3em; color: red; margin: 20 0 20 0">Erreur de mot de passe actuel</div>';
			}
		}
		else if ($oldpass == null && !$newpass == null) {
			echo '<div class="container" style="text-align: center; font-size: 1.3em; color: red; margin: 20 0 20 0">Veuillez entrer votre mot de passe actuel</div>';
		}
		else if (!$oldpass == null && $newpass == null) {
			echo '<div class="container" style="text-align: center; font-size: 1.3em; color: red; margin: 20 0 20 0">Veuillez entrer votre nouveau mot de passe</div>';
		}
		return $req;
	}
}
