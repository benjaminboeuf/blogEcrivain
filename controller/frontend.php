<?php

require_once '.\model\Manager.php';
require_once '.\model\ChapterManager.php';

class Frontend extends Manager
{
    function getHome() 
    {
        include '.\view\frontend\home.php';
    }

    function getBook()
    {
        $chapterManager = new ChapterManager();
        $sommaire = $chapterManager->getSommaire();
        $sommaire->fetch();
        $sommaire->rowCount();
        var_dump($sommaire->fetch()[0]);
        include '.\view\frontend\book.php';
    }
}