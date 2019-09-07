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
        <!-- </nav> -->
        <!-- <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="index.php?action=listChaptersBackend">Chapitres</a>
                </li>
                <li class="dropdown">
                    <a href="index.php?action=getAllComments">Commentaires</a>
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
    </div> -->

    <div id="wrapper" style="margin-top: 100px;">
        <div id="sidebar-wrapper" class="container" style="margin-bottom: 40px;">
            <div id="sidebar" class="container">
                <a class="list-group-item" href="index.php?action=newChapter" style="color: white; background: #888888; text-align:center; "></i>Ajouter un billet</a>
            </div>
        </div>
        <div id="main-wrapper" class="container">
            <div id="main">
                <?php
                while ($data = $chapters->fetch())
                {
                ?>
                    <div class="container">
                        <table class="table table-bordered table-striped table-condensed" style="margin-bottom: 40px;">
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
                                        <button type="button" class="btn btn-outline-secondary" style="background: #888888" onclick="window.location.href='index.php?action=chapterBeforeChange&amp;id=<?= $data['id'] ?>';">Modifier</button></br>
                                        <button type="button" class="btn btn-outline-secondary" style="background: #888888" onclick="window.location.href='index.php?action=deleteChapter&amp;id=<?= $data['id'] ?>';">Supprimer</button></br>
                                        <button type="button" class="btn btn-outline-secondary" style="background: #888888" onclick="window.location.href='index.php?action=chapterComments&amp;id=<?= $data['id'] ?>';">Commentaires</button>
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