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

    <title>Page de profil</title>

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

        <div class="container" style="margin-top: 120px;">
            <div class="container">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="col-md-12">
                                    <br>
                                    <h3>Votre Profil</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="index.php?action=updateProfile" method="post">
                                        <?php $data = $admin->fetch() ?>
                                        <div class="form-group row">
                                            <label for="username" class="col-4 col-form-label">Prénom et nom</label> 
                                            <div class="col-8">
                                                <input id="username" name="username" value="<?= $data['username']?>" class="form-control here" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="pseudo" class="col-4 col-form-label">Pseudo</label> 
                                            <div class="col-8">
                                                <input id="pseudo" name="pseudo" value="<?= $data['login']?>" class="form-control here" type="text">
                                            </div>
                                        </div>
                              
                              <!-- <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email*</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                </div>
                              </div> -->
                                        <div class="form-group row">
                                            <label for="oldpass" class="col-4 col-form-label">Entrez votre mot de passe actuel</label> 
                                            <div class="col-8">
                                                <input type="password" id="oldpass" name="oldpass" class="form-control here">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="newpass" class="col-4 col-form-label">Entrez votre nouveau mot de passe</label> 
                                            <div class="col-8">
                                                <input type="password" id="newpass" name="newpass" class="form-control here">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <button name="submit" type="submit" class="btn btn-primary" style="background: #888888;">Mettre à jour mes informations</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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