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

    <title>Liste des billets</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="header" class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="icon-reorder"></i>
            </button>
        </div>
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Liste des chapitres</a>
                    <a class="nav-item nav-link" href="commentsList.php">Gestion des commentaires</a>
                </div>
                <div class="navbar-nav pull-right">
                    <a class="nav-item nav-link" href="logOut.php">Déconnexion</a>
                </div>
            </div>
        </nav> -->
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="index.php?action=listChaptersBackend">Liste des billets</a>
                </li>
                <li class="dropdown">
                    <a href="index.php?action=getAllComments">Modération des commentaires</a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a href="index.php?action=profil">Profil</a>
                </li>
                <li class="dropdown">
                    <a href="index.php?action=logout">Déconnexion</a>
                </li>
            </ul>
        </nav>
    </div>

    <div id="wrapper">
        <div id="sidebar-wrapper" class="col-md-1">
            <div id="sidebar">
                <a class="list-group-item" href="index.php?action=newChapter"><i class="icon-home icon-1x"></i>Ajouter un billet</a>
            </div>
        </div>
        <div id="main-wrapper" class="col-md-11">
            <div id="main">
                <?php
                while ($data = $chapters->fetch())
                {
                ?>
                    <div class="col-md-11">
                        <table class="table table-bordered table-striped table-condensed">
                            <tbody>
                                <tr>
                                    <td>
                                        <h3><?= $data['title'] ?></h3>
                                    </td>
                                    <td class="col-sm-2">
                                        <em>le <?= $data['creation_date_fr'] ?></em>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><?= nl2br($data['content']) ?></p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='index.php?action=chapterBeforeChange&amp;id=<?= $data['id'] ?>';">Modifier</button></br>
                                        <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='index.php?action=deleteChapter&amp;id=<?= $data['id'] ?>';">Supprimer</button></br>
                                        <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='index.php?action=chapterComments&amp;id=<?= $data['id'] ?>';">Commentaires</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                $chapters->closeCursor();
                ?>    
            </div>
        </div>
    </div>
  </body>
</html>

<?php
}
else {
    echo 'Vous devez être connecté.e pour accéder à cette page :/';
}
?>