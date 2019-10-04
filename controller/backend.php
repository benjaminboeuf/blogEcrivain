<?php

require_once '.\model\Manager.php';
require_once '.\model\ChapterManager.php';
require_once '.\model\CommentsManager.php';
require_once '.\model\AdminManager.php';

class Backend
{
	function listChaptersBackend()
    {
        $chapterManager = new ChapterManager();
        $chapters = $chapterManager->getChapters();
        $nbChapters = $chapterManager->countChapters();
        
        $commentManager = new CommentManager();
        $nbComments = $commentManager->countComments();
        $nbSignalComments = $commentManager->countSignalComments();

        include '.\view\backend\listChaptersViewBackend.php';
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

    	include '.\view\backend\updateChapterViewBackend.php';
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

    function deleteChapter($id) {
        $chapterManager = new ChapterManager();
        $chapter = $chapterManager->deleteChapter($id);

        $commentManager = new CommentManager();
        $comment = $commentManager->deleteChapterComments($id);
        
        if ($chapter === false) {
            throw new Exception('Impossible de supprimer ce chapitre !');
        } 
        else {
            echo '<div class="container" style="text-align: center; font-size: 1.3em; color: #294997; margin: 20 0 20 0">Ce chapitre a bien été supprimé !</div>';
        	header('Refresh: 3;URL= index.php?action=listChaptersBackend');
        }
    }

    function listAllComments()
    {
    	$commentManager = new CommentManager();
        $comments = $commentManager->signaledComments();
        $noComments = $commentManager->noSignaledComments();
        $goodComments = $commentManager->goodSignaledComments();
        // var_dump($noComments);

    	if ($comments === false && $noComments === false && $goodComments === false) {
    		throw new Exception('Impossible d\'afficher les commentaires !');
    	}
    	else {
    		include '.\view\backend\listCommentsView.php';
    	}
    }

    function addComment($chapterId, $name, $message) {
        $commentManager = new CommentManager();
        $comment = $commentManager->newComment($chapterId, $name, $message);

        if ($comment === false) {
            throw new Exception('Impossible d\'ajouter ce commentaire !');
        } 
        else {
            echo '<div class="container" style="text-align: center; font-size: 1.3em; color: #294997; margin: 20 0 20 0">Votre commentaire a été ajouté !</div>';
        	header("Refresh: 3;URL=" . $_SERVER['HTTP_REFERER']);
        }
    }

    function signalComment($commentId) {
        $commentManager = new CommentManager();
        $comment = $commentManager->signalComment($commentId);
    }

    function deleteComment($id)
    {
    	$commentManager = new CommentManager();
    	$comment = $commentManager->deleteComment($id);

        echo '<div class="container" style="text-align: center; font-size: 1.3em; color: #294997; margin: 20 0 20 0">Ce commentaire a bien été supprimé !</div>';
		header('Refresh: 3;URL= index.php?action=getAllComments');
    	return $comment;
    }

    function approveComment($id)
    {
    	$commentManager = new CommentManager();
        $comment = $commentManager->approveComment($id);
        
        echo '<div class="container" style="text-align: center; font-size: 1.3em; color: #294997; margin: 20 0 20 0">Ce commentaire a bien été approuvé !</div>';
    	header('Refresh: 3;URL= index.php?action=getAllComments');
    	return $comment;
    }

    function logIn($pseudo, $password, $check)
    {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->logIn($pseudo, $password, $check);
    	
    	if (isset($_SESSION['pseudo'])) {
    		header('Location: index.php?action=listChaptersBackend');
    	}
    	return $admin;
    }

    function logInCookie($pseudo, $password) {
        $adminMana = new AdminManager();
        $admin = $adminMana->logInCookie($pseudo, $password);
        
        if (isset($_SESSION['pseudo'])) {
    		header('Location: index.php?action=listChaptersBackend');
    	}
    	return $admin;
    }

    function logOut()
    {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->logOut();
    	header('Location: index.php?action=home');
    }

    function getProfil()
    {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->getProfil();
    	
    	include '.\view\backend\profil.php';
    	return $admin;
    }

    function updateProfile($pseudo, $oldpass, $newpass)
    {
       	$adminMana = new AdminManager();
    	$admin = $adminMana->updateProfile($pseudo, $oldpass, $newpass);

    	header('Refresh: 5;URL=index.php?action=profil');
    	return $admin;
    }
}