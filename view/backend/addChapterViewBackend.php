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
                </div>
                <div class="navbar-translate justify-content-end" id="navigation">
                    <ul class="navbar-nav" style="-ms-flex-direction: row; flex-direction: row;">
                        <li class="nav-item menubar">
                            <a class="nav-link menubar" rel="tooltip" title="Éditez vos chapitres" href="index.php?action=listChaptersBackend">
                                <i class="fas fa-file-signature"></i>
                                <p>Chapitres</p>
                            </a>
                        </li>
                        <li class="nav-item menubar">
                            <a class="nav-link menubar" rel="tooltip" title="Gérez et modérez les commentaires" data-placement="bottom" href="index.php?action=getAllComments">
                                <i class="fas fa-comments"></i>
                                <p>Commentaires</p>
                            </a>
                        </li>
                        <li class="nav-item menubar">
                            <a class="nav-link menubar" rel="tooltip" title="Modifiez votre profil" data-placement="bottom" href="index.php?action=profil">
                                <i class="fas fa-user-alt"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="index.php?action=addChapter" method="post" style="margin-top: 100px;">
            <div class="container" style="max-width: 450px;">
                <input type="text" id="chapterTitle" name="chapterTitle" class="form-control here" style="margin-bottom: 30px;" value="Entrez votre titre ici">
            </div>
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
    echo 'Vous devez être connecté pour accéder à cette page :/';
}
?>