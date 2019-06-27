<?php

//require 'controller/frontend.php';
require 'C:\wamp64\www\blog\controller\backend.php';
require 'C:\wamp64\www\blog\lib.php';

$backend = new Backend();

try {
	if (isset($_GET['action'])) { 
		if ($_GET['action'] == 'listChaptersBackend') {
            $backend->listChaptersBackend();
        }
        elseif ($_GET['action'] == 'newPass') {
        	$backend->newPass();
         }
        elseif ($_GET['action'] == 'newChapter') {
 			include 'view/backend/addchapterViewBackend.php';
        }
        elseif ($_GET['action'] == 'getAllComments') {
        	$backend->listAllComments();
        }
        elseif ($_GET['action'] == 'addChapter') {
            if (!empty($_POST['chapterTitle']) && !empty($_POST['chapterContent'])) {
            	echo $_POST['chapterTitle'];
            	echo $_POST['chapterContent'];
                $backend->addChapter($_POST['chapterTitle'], $_POST['chapterContent']);
            } 
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'chapterBeforeChange') {
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
        		$backend->chapterBeforeChange($_GET['id']);
        	}
        	else {
        		throw new Exception('Aucun identifiant de chapitre envoyé');
        	}
        }
        elseif ($_GET['action'] == 'modifyChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['chapterTitle']) && !empty($_POST['chapterContent'])) {
                    $backend->modifyChapter($_GET['id'], $_POST['chapterTitle'], $_POST['chapterContent']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé'); 
            }
        }
        elseif ($_GET['action'] == 'deleteComment') {
        	$backend->deleteComment($_GET['id']);
        }
        elseif ($_GET['action'] == 'approveComment') {
        	$backend->approveComment($_GET['id']);
        }
        elseif ($_GET['action'] == 'login') {
        	$backend->logIn($_POST['pseudo'] ,$_POST['password']);
        }
        elseif ($_GET['action'] == 'logout') {
        	$backend->logOut();
        }
        elseif ($_GET['action'] == 'profil') {
        	$backend->getProfil();
        }
        elseif ($_GET['action'] == 'updateProfile') {
        	$backend->updateProfile($_POST['username'], $_POST['pseudo'], $_POST['oldpass'], $_POST['newpass']);
        }
	}
	else {
		if (isset($_SESSION['pseudo'])) {
			$backend->listChaptersBackend();
		}
		else {
			include 'view/backend/loginView.php';
		}
	}
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}