<?php

require_once '.\model\Manager.php';
require_once '.\model\ChapterManager.php';

class Frontend
{
    function getHome() 
    {
        include '.\view\frontend\home.php';
    }

    function getBook()
    {
        $chapterManager = new ChapterManager();
        $sommaire = $chapterManager->getSommaire();
        // $data = $sommaire->fetch();
        // $sommaire->rowCount();
        // var_dump($sommaire);
        // var_dump($sommaire->fetch());
        include '.\view\frontend\book.php';
    }

    function getContent($id)
    {
        $chapterManager = new ChapterManager();
        $content = $chapterManager->getContent($id);
        echo $content;
    }

    function getTitle($id)
    {
        $chapterManager = new ChapterManager();
        $title = $chapterManager->getTitle($id);
        echo $title;
    }

    function getComments ($id)
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->getPostComments($id);

        echo "<h4 class=\"text-center\">Commentaires :</h4>";
        while ($data = $comments->fetch()) {
            echo "<div class=\"container phpComment\" id=\"comment" . $data['id'] . "\">";
                echo "<div class=\"container row phpCommentContent\">";
                    echo "<div class=\"container col-md-6\"><span style=\"text-decoration: underline;\">Écrit par "; echo $data['author']; echo "</span></div>";
                    echo "<div class=\"container col-md-6\"><em>le " . $data['comment_date_fr'] . "</em></div>";
                echo "</div>";
                echo "<div class=\"container row phpCommentContent\">";
                    echo "<div class=\"container col-11\">" . $data['content'] . "</div>";
                    if ($data['signaled'] == 1) {
                        echo "<i class=\"fas fa-exclamation-circle\" style=\"color: red\" title=\"Commentaire signalé !\" rel=\"tooltip\"></i>";
                    }
                    else {
                        echo "<i class=\"fas fa-exclamation-circle\" style=\"cursor: pointer\" rel=\"tooltip\" title=\"\" onclick=\"signaledComment(" . $data['id'] . ")\"></i>";
                    }
                echo "</div>";
                echo "<div class=\"hiddenCheck\">";	
					echo "<div class=\"container\">Signaler le commentaire ?</div>"; 
					    echo "<div class=\"container\">";
							echo "<i class=\"fas fa-check valid\" onclick=\"validSignal(" . $data['id'] . ")\" style=\"font-size: 2em; margin: 0 20 0 20;\"></i>";
							echo "<i class=\"fas fa-times cancel\" onclick=\"cancelSignal(" . $data['id'] . ")\" style=\"font-size: 2em; margin: 0 20 0 20;\"></i>";
						echo "</div>";
					echo "</div>";
            echo "</div>";
        }
        echo "<div class=\"container\" id=\"newComment\">";
            echo "<div class=\"container\" id=\"getForm\" onclick=\"addNewComment\"><button id=\"addButton\" class=\"btn btn-secondary\" onclick=\"addNewComment\">Ajouter un commentaire</button></div>";
            echo "<div class=\"container\" id=\"formComment\">";
                echo "<form action=\"index.php?action=addComment\" method=\"post\">";
                    echo "<div class=\"form-group row col-sm-6\"><input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"Entrer votre nom\" required></div>";
                    echo "<div class=\"form-group\"><textarea id=\"message\" name=\"message\" class=\"form-control\" rows=\"5\" placeholder=\"Entrer votre message\" required></textarea></div>";
                    echo "<button type=\"submit\" id=\"commentSubmit\" class=\"btn btn-secondary btn-sm\" onclick=\"commentSend\">Envoyer</button>";
                echo "</form>";
            echo "</div>";
            echo "<div class=\"container\" id=\"commentSend\">Commentaire envoyé !</div>";
        echo "</div>";
    }
}