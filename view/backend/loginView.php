<?php
session_start();
if (isset($_COOKIE['pseudo']) && isset($_COOKIE['password'])) {
    $backend->logIn($_COOKIE['pseudo'], $_COOKIE['password']);
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page de connexion</title>

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
                        <a href="index.php?action=home">Retour</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="row justify-content-start" class="col-sm-8 col-xs-10">
            <div id="main-wrapper" class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        </br>
                        <h3>Accéder à la partie <strong>administration</strong></h3>
                        <hr>
                    </div>
                </div>
                <form action="index.php?action=login" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkLogin">
                        <label class="form-check-label" for="checkLogin">Restez connecté.e</label>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="window.location.href='index.php?action=login';">Valider</button>
                     <!-- <a href="index.php?action=newPass">Meh</a> -->
                </form>
            </div>
        </div>
    </body>
</html>