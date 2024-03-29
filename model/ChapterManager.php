<?php

require_once "Manager.php";

class ChapterManager extends Manager
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM post ORDER BY creation_date DESC');

        return $req;
    }

    public function getSommaire()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date');

        return $req;
    }

    public function pagination($startFrom, $limi)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM post ORDER BY id ASC LIMIT :startFrom, :limi');
        $req->bindParam(':startFrom', $startFrom, PDO::PARAM_INT);
        $req->bindParam(':limi', $limi, PDO::PARAM_INT);
        $req->execute();

        return $req;
    }

    public function getContent($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT content FROM post WHERE id = ?');
        $content = $req->execute(array($id));
        $content = $req->fetchColumn(0);

        return $content;
    }

    public function getTitle($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT title FROM post WHERE id = ?');
        $content = $req->execute(array($id));
        $content = $req->fetchColumn(0);

        return $content;
    }

    public function getChapter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content FROM post WHERE id = ?');
        $req->execute(array($id));
        $chapter = $req->fetch();

        return $chapter;

    }

    public function countChapters() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) FROM post');
        $nb = $req->fetch();
        
        return $nb;
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

    public function deleteChapter($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = ?');
        $req->execute(array($id));
        $delete = $req->rowCount();
        
        return $delete;
    }
}