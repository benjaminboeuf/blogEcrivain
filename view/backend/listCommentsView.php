<?php
session_start();
if (isset($_SESSION['pseudo'])) {
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Liste des commentaires</title>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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

        <div id="main-wrapper" class="container" style="margin-top: 80px;">
            <div id="main">
                <?php
                while ($data = $comments->fetch())
                {
                ?>
                    <div class="container" style="margin-botom: 30px;">
                        <table class="table table-bordered table-striped ">
                            <tbody>
                                <tr style="background: rgba(255, 0, 0, 0.1);">
                                    <td>
                                        <h5><?= $data['title'] ?></h5>
                                        <p>par <?= $data['author'] ?></p>
                                    </td>
                                    <td class="col-sm-2">
                                        <p style="font-size: 1em;">le <?= $data['comment_date_fr'] ?> <!-- par <?= $data['author'] ?> --></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><?= nl2br($data['content']) ?></p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?action=deleteComment&amp;id=<?= $data['id'] ?>';">Supprimer</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?action=approveComment&amp;id=<?= $data['id'] ?>';">Approuver</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                $comments->closeCursor();
                while ($data = $noComments->fetch())
                {
                ?>
                    <div class="container" style="margin-botom: 30px;">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr style="background: rgba(0, 0, 200, 0.1)">
                                    <td>
                                        <h5><?= $data['title'] ?></h5>
                                        <p>par <?= $data['author'] ?></p>
                                    </td>
                                    <td class="col-sm-2">
                                        <p style="font-size: 1em;">le <?= $data['comment_date_fr'] ?> <!-- par <?= $data['author'] ?> --></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><?= nl2br($data['content']) ?></p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?action=deleteComment&amp;id=<?= $data['id'] ?>';">Supprimer</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                $noComments->closeCursor();
                ?>    
            </div>
        </div>
  </body>
</html>

<?php
}
else {
    echo 'Vous devez être connecté pour accéder à cette page :/';
}
?>