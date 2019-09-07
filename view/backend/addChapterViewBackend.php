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

        <script src="./tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            tinymce.init({
            selector: 'textarea',
            language: 'fr_FR'
            });
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg fixed-top" data-background-color="black">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="index.php?action=logOut" data-placement="bottom">
                        Déconnexion
                    </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar top-bar"></span>
                        <span class="navbar-toggler-bar middle-bar"></span>
                        <span class="navbar-toggler-bar bottom-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse bg-primary justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="Éditez vos chapitres" href="index.php?action=listChaptersBackend">
                                <p>Chapitres</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="Gérez et modérez les commentaires" data-placement="bottom" href="index.php?action=getAllComments">
                                <p>Commentaires</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="Modifiez votre profil" data-placement="bottom" href="index.php?action=profil">
                                <p>Profil</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="index.php?action=addChapter" method="post" style="margin-top: 80px;">
            <textarea id="chapterTitle" name="chapterTitle">Entrez votre <strong>titre</strong> ici</textarea>
            <textarea id="chapterContent" name="chapterContent">Entrez votre <strong>texte</strong> ici</textarea>
            <input type="submit" value="Enregistrer" />
        </form>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <!-- <script src="js/bootstrap.min.js"></script> -->

    </body>
</html>

<?php
}
else {
    echo 'Vous devez être connecté.e pour accéder à cette page :/';
}
?>