<?php

require_once '.\controller\frontend.php';
require_once '.\controller\backend.php';
require_once '.\lib.php';

$backend = new Backend();
$frontend = new Frontend();

try {
	if (isset($_GET['action'])) { 
		if ($_GET['action'] == 'listChaptersBackend') {
            $backend->listChaptersBackend();
        }
        elseif ($_GET['action'] == 'newChapter') {
 			include 'view/backend/addchapterViewBackend.php';
        }
        elseif ($_GET['action'] == 'getAllComments') {
        	$backend->listAllComments();
        }
        elseif ($_GET['action'] == 'addChapter') {
            if (!empty($_POST['chapterTitle']) && !empty($_POST['chapterContent'])) {
                $backend->addChapter(htmlspecialchars($_POST['chapterTitle']), $_POST['chapterContent']);
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
        else if ($_GET['action'] == 'deleteChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->deleteChapter($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['name']) && !empty($_POST['message'])) {
                    $backend->addComment($_GET['id'], htmlspecialchars($_POST['name']), htmlspecialchars($_POST['message']));
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
        elseif ($_GET['action'] == 'signalComment') {
        	$backend->signalComment($_GET['id']);
        }
        elseif ($_GET['action'] == 'deleteComment') {
        	$backend->deleteComment($_GET['id']);
        }
        elseif ($_GET['action'] == 'approveComment') {
        	$backend->approveComment($_GET['id']);
        }
        elseif ($_GET['action'] == 'logPage') {
            if (isset($_SESSION['pseudo'])) {
                $backend->listChaptersBackend();
            }
            else {
                include './view/backend/loginView.php';
            }
        }
        elseif ($_GET['action'] == 'login') {
            $check = isSet($_POST['checkLogin']) ? 1 : 0;
            if (isset($_POST['pseudo']) && isset($_POST['password'])) {
                $backend->logIn(htmlspecialchars($_POST['pseudo']) ,$_POST['password'], $check);
            }
        }
        elseif ($_GET['action'] == 'logOut') {
        	$backend->logOut();
        }
        elseif ($_GET['action'] == 'profil') {
        	$backend->getProfil();
        }
        elseif ($_GET['action'] == 'updateProfile') {
        	$backend->updateProfile(htmlspecialchars($_POST['pseudo']), $_POST['oldpass'], $_POST['newpass']);
        }
        elseif ($_GET['action'] == 'home') {
            $frontend->getHome();
        }
        elseif ($_GET['action'] == 'about') {
            include './view/frontend/about.php';
        }
        elseif ($_GET['action'] == 'book') {
            $frontend->getBook();
        }
        elseif ($_GET['action'] == 'pagination') {
            if (!isset($_GET['page'])) {
                $page = 1;
                $frontend->getPagination($page);
            }
            else {
                $frontend->getPagination($_GET['page']);
            }
        }
        elseif ($_GET['action'] == 'content') {
            if (isset($_GET['id'])) {
                $frontend->getContent($_GET['id']);
            }
            else {
                throw new Exception('Content need an id');
            }
        }
        elseif ($_GET['action'] == 'title') {
            if (isset($_GET['id'])) {
                $frontend->getTitle($_GET['id']);
            }
            else {
                throw new Exception('Title need an id');
            }
        }
        elseif ($_GET['action'] == 'commentsChapter') {
            if (isset($_GET['id'])) {
                $frontend->getComments($_GET['id']);
            }
            else {
                throw new Exception('Comments need an id');
            }
        }
        elseif ($_GET['action'] == 'legal') {
            include 'view/frontend/legal.php';
       }
	}
	else {
		if (isset($_SESSION['pseudo'])) {
			$backend->listChaptersBackend();
		}
		else {
			include 'view/frontend/home.php';
		}
	}
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}