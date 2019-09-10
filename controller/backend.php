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
        
        $noComments = $commentManager->noSignaledComments();
        // var_dump($noComments);

    	if ($comments === false && $noComments === false) {
    		throw new Exception('Impossible d\'afficher les commentaires !');
    	}
    	else {
    		include '.\view\backend\listCommentsView.php';
    	}
    }

    function signalComment($commentId) {
        $commentManager = new CommentManager();
        $comment = $commentManager->signalComment($commentId);

        // $comments = $commentManager->getComment($commentId);

        // echo "<h4>Commentaires :</h4>";
        // while ($data = $comments->fetch()) {
        //     echo "<div class=\"container phpComment\" id=\"comment" . $data['id'] . "\">";
        //         echo "<div class=\"container row\">";
        //             echo "<div class=\"container col-md-6\"><span style=\"text-decoration: underline;\">Écrit par "; echo $data['author']; echo "</span></div>";
        //             echo "<div class=\"container col-md-6\"><em>le " . $data['comment_date_fr'] . "</em></div>";
        //         echo "</div>";
        //         echo "<div class=\"container row\">";
        //             echo "<div class=\"container col-11\">" . $data['content'] . "</div>";
        //             echo "<i class=\"fas fa-exclamation-circle\" style=\"font-size: 1.3em\" cursor=\"pointer\" rel=\"tooltip\" onclick=\"validSignaledComment(" . $data['id'] . ")\"></i>";
        //         echo "</div>";
        //     echo "</div>";
        // }
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
    	header('Location: index.php?action=home');
    }

    function getProfil()
    {
    	$adminMana = new AdminManager();
    	$admin = $adminMana->getProfil();
    	
    	include '.\view\backend\profil.php';
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