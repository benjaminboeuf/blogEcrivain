<?php

require_once "Manager.php";

class ChapterManager extends Manager
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date DESC');

        return $req;
    }

    public function getChapter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content FROM post WHERE id = ?');
        $req->execute(array($id));
        $chapter = $req->fetch();

        return $chapter;

    }

    public function newChapter($title, $content)
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare('INSERT INTO post(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $chapter->execute(array($title, $content));

        return $affectedLines;
    }

    public function updateChapter($id, $title, $content)
    {    
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET title= :newTitle, content= :newContent WHERE id = :id');
        $req->bindValue(':id', $_GET['id'], \PDO::PARAM_INT);
        $req->bindValue(':newTitle', $_POST['chapterTitle'], \PDO::PARAM_STR);
        $req->bindValue(':newContent', $_POST['chapterContent'], \PDO::PARAM_STR);
        $affectedLines = $req->execute(array(':id' => $id, ':newTitle' => $title,':newContent' => $content));
        
        return $affectedLines;
    }
}