<?php 

require_once "model/Manager.php";

class CommentManager extends Manager
{
    public function getAllComments() //a modifier
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE signaled = 1 ORDER BY comment_date DESC');
        return $comments;
    }

    public function getPostComments($chapterId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, content, signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment WHERE idPost = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));
        return $comments;
    }
    
    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, content, signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();
        return $comment;
    }

    public function newComment($chapterId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(idPost, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));
        return $affectedLines;
    }

    public function signalComment($commentId)
    {
        $db = $this-> dbConnect();
        $req = $db->prepare('UPDATE comment SET signaled = 1 WHERE id = ?');
        $req->execute(array($commentId));
        $signal = $req->rowCount(); 
       
        return $signal;         
    }

    public function signaledComments()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT comment.id, post.title, comment.idPost, comment.author, comment.content, comment.signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment LEFT JOIN post ON comment.idPost = post.id WHERE signaled = 1 ORDER BY comment_date DESC');

        return $comments;
    }

    public function noSignaledComments()
    {
        $db = $this->dbConnect();
        $noComments = $db->query('SELECT comment.id, post.title, comment.idPost, comment.author, comment.content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment LEFT JOIN post ON comment.idPost = post.id WHERE signaled = 0 ORDER BY comment_date DESC');
        
        return $noComments;
    }

    public function deleteComment($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $req->execute(array($id));
        $delete = $req->rowCount();
        
        return $delete;
    }

    public function approveComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET signaled = 0 WHERE id = ?');
        $req->execute(array($id));
        $signal = $req->rowCount(); 
       
        return $signal;     
    }

    public function countComments() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) FROM comment');
        $com = $req->fetch();

        return $com;
    }

    public function countSignalComments() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) FROM comment WHERE signaled = 1');
        $comS = $req->fetch();

        return $comS;
    }
}