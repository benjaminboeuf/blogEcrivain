<?php
session_start();
if (isset($_SESSION['pseudo'])) {
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajouter un billet</title>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            tinymce.init({
            selector: 'textarea',
            language: 'fr_FR'
            });
        </script>
    </head>

    <body>
        <div id="header" class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="icon-reorder"></i>
                </button>
            </div>
            <nav class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php?action=listChaptersBackend">Billets</a>
                    </li>
                    <li class="dropdown">
                      <a href="commentsList.php">Commentaires</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a href="index.php?action=logout">Déconnexion</a>
                    </li>
                </ul>
            </nav>
        </div>

        <form action="index.php?action=modifyChapter&amp;id=<?= $chapter['id'] ?>" method="post">
            <textarea id="chapterTitle" name="chapterTitle"><?= nl2br(htmlspecialchars($chapter['title'])) ?></textarea>
            <textarea style="height: 500px;" id="chapterContent" name="chapterContent"><?= nl2br(htmlspecialchars($chapter['content'])) ?></textarea>
            <input type="submit" value="Enregistrer la modification" />
        </form>
    </body>
</html>

<?php
}
else {
    echo 'Vous devez être connecté.e pour accéder à cette page :/';
}
?>