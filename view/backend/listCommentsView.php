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

    <title>Liste des commentaires</title>

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

    <div id="main-wrapper" class="col-md-11">
            <div id="main">
                <?php
                while ($data = $comments->fetch())
                {
                ?>
                    <div class="col-md-11">
                        <table class="table table-bordered table-striped table-condensed">
                            <tbody>
                                <tr>
                                    <td>
                                        <p><?= $data['title'] ?></p>
                                        <p>par <?= $data['author'] ?></p>
                                    </td>
                                    <td class="col-sm-2">
                                        <em>le <?= $data['comment_date_fr'] ?> <!-- par <?= $data['author'] ?> --></em>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><?= nl2br($data['content']) ?></p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='index.php?action=deleteComment&amp;id=<?= $data['id'] ?>';">Supprimer</button></br>
                                        <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='index.php?action=approveComment&amp;id=<?= $data['id'] ?>';">Approuver</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                $comments->closeCursor();
                ?>    
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