<?php

require_once '.\model\Manager.php';

class Frontend extends Manager
{
    function getHome() 
    {
        include '.\view\frontend\home.php';
    }

    function getBook()
    {
        include '.\view\frontend\book.php';
    }
}