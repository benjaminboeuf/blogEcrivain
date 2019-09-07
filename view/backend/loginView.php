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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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

        <nav class="navbar navbar-expand-lg fixed-top" data-background-color="black">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="index.php?action=home" data-placement="bottom">
                    Retour
                    </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar top-bar"></span>
                        <span class="navbar-toggler-bar middle-bar"></span>
                        <span class="navbar-toggler-bar bottom-bar"></span>
                    </button>
                </div>
            </div>
        </nav>

        
            <div class="wrapper" style="margin-top: 100px;">
                <div class="container">
                    
                        <h3 style="font-weight: 500; font-size: 2.2rem;">Accéder à la partie <span style="color: #223c8a;"><strong>administration</strong></span></h3>
                        <hr>
                    
                </div>
                <div class="container">
                    <form action="index.php?action=login" method="post">
                        <div class="form-group col-lg-8">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
                        </div>
                        <div class="form-group col-lg-8">
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