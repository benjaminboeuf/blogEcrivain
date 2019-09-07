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

        echo "<h4>Commentaires :</h4>";
        while ($data = $comments->fetch()) {
            echo "<div class=\"container phpComment\">";
                echo "<div class=\"container row\">";
                    echo "<div class=\"container col-md-6\"><span style=\"text-decoration: underline;\">Écrit par "; echo $data['author']; echo "</span></div>";
                    echo "<div class=\"container col-md-6\"><em>le "; echo $data['comment_date_fr']; echo "</em></div>";
                echo "</div>";
                echo "<div class=\"container\">"; echo $data['content']; echo "</div>";
            echo "</div>";
        }
    }
}