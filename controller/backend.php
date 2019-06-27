<?php

require_once 'C:\wamp64\www\blog\model\Manager.php';
require_once 'C:\wamp64\www\blog\model\ChapterManager.php';
require_once 'C:\wamp64\www\blog\model\CommentsManager.php';
require_once 'C:\wamp64\www\blog\model\AdminManager.php';

class Backend extends Manager
{
	function listChaptersBackend()
    {
        $chapterManager = new ChapterManager();
        $chapters = $chapterManager->getChapters();

        include 'C:\wamp64\www\blog\view\backend\listChaptersViewBackend.php';
    }

    function addChapter($title, $content)
    {
        $chapterManager = new ChapterManager();
        $affectedLines = $chapterManager->newChapter($title, $content);
    
        if ($affectedLines === true) {
            header('Location: index.php?action=listChaptersBackend');
            
        } else {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        }
    }

    function chapterBeforeChange($id)
    {
    	$chapterManager = new ChapterManager();
    	$chapter = $chapterManager->getChapter($id);

    	include 'C:\wamp64\www\blog\view\backend\updateChapterViewBackend.php';
    	// header('Location: updateChapterViewBackend.php');
    }

    function modifyChapter($id, $title, $content)
    {    
        $chapterManager = new ChapterManager();
        $affectedLines = $chapterManager->updateChapter($id, $title, $content);
        
        if ($affectedLines === false) {
            throw new Exception('Impossible de modifier ce chapitre !');
        } 
        else {
        	header('Location: index.php?action=listChaptersBackend');
        }
    }

    function listAllComments()
    {
    	$commentManager = new CommentManager();
    	$comments = $commentManager->signaledComments();

    	if ($comments === false) {
    		throw new Exception('Impossible d\'afficher les commentaires !');
    	}
    	else {
    		include 'C:\wamp64\www\blog\view\backend\listCommentsView.php';
    	}
    }

    function deleteComment($id)
    {
    	$commentManager = new CommentManager();
    	$comment = $commentManager->deleteComment($id);

		header('Location: index.php?action=getAllComments');

    	return $comment;
    }

    function approveComment($id)
    {
    	$commentManager = new CommentManager();
    	$comment = $commentManager->approveComment($id);
    	header('Location: index.php?action=getAllComments');
    	return $comment;
    }

    function newPass() {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->addPassword();
    }

    function logIn($pseudo, $password)
    {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->logIn($pseudo, $password);
    	
    	if (isset($_SESSION['pseudo'])) {
    		header('Location: index.php?action=listChaptersBackend');
    	}
    	return $admin;
    }

    function logOut()
    {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->logOut();
    	header('Location: index.php');
    }

    function getProfil()
    {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->getProfil();
    	
    	include 'C:\wamp64\www\blog\view\backend\profil.php';
    	return $admin;
    }

    function updateProfile($username, $pseudo, $oldpass, $newpass)
    {
       	$adminMana = new AdminManager();
    	$admin = $adminMana->updateProfile($username, $pseudo, $oldpass, $newpass);

    	if (!$admin == null) {
    		echo 'Votre profil a bien été mis à jour :)';
    	}

    	header('Location: index.php?action=profil');
    	return $admin;
    }
}