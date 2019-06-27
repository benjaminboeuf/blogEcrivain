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

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    </br>
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
                                                <input id="username" name="username" placeholder="<?= $data['username']?>" class="form-control here" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="pseudo" class="col-4 col-form-label">Pseudo</label> 
                                            <div class="col-8">
                                                <input id="pseudo" name="pseudo" placeholder="<?= $data['login']?>" class="form-control here" type="text">
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
                                                <input type="password" id="oldpass" name="oldpass" placeholder="Old Password" class="form-control here">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="newpass" class="col-4 col-form-label">Entrez votre nouveau mot de passe</label> 
                                            <div class="col-8">
                                                <input type="password" id="newpass" name="newpass" placeholder="New Password" class="form-control here">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <button name="submit" type="submit" class="btn btn-primary">Mettre à jour mes informations</button>
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