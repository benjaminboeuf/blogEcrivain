<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img/book-3057902_1920.png">
        
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Billet Simple pour l'Alaska
		</title>
		<style type="text/css">
			#pagejs {
				min-height = 500px;
			}

			#allBoard {
				margin-top: 2em;
			}

			#board {
				padding-right: 0;
			}

			#chapterBoard {
				background-color: #294997;
				opacity: 0.7;
				min-height: 30em;
				border-radius: 1em;
			}

			#chapContent {
				margin-top: 1.5em;
			}

			#chapListBoard {
				padding: 0 5 0 0 ;
			}

			#chapSelector {
				background-color: #294997;
				opacity: 0.7;
				border-radius: 1em;
				margin-bottom: 10px;
			}

			.chapterList {
				padding: 5 0 5 0!important;
				width: 100%;
			}

			.chapterList a {
				text-align : center;
			}

			#commentBoard {
				/* opacity: 0; */
				min-height: 2em;
				padding-right: 0px;
				margin-top: 2em;
				margin-left: 0;
			}

			#commentBody {
				background-color: #294997;
				opacity: 0.7;
				border-radius: 1em;
			}

			.hide {
				display: none;
			}

			.active {
				text-decoration: underline solid white;
			}

			#commentBody h4 {
				margin-top : 20px;
			}

			#commentBody div {
				height: auto;
			}

			.phpComment {
				margin-bottom: 15px;
				background-color: rgba(255, 255, 255, 0.1);
				border-radius: 1em;
				min-height: 60px;
			}

			.phpCommentContent > i {
				font-size: 1.3em;
				height: 20px;
				margin: auto;
			}

			.phpCommentContent {
				z-index: 25!important;
				min-height: 25px;
				align-content: center;
			}

			.hiddenCheck {
				opacity: 0;
				position: absolute!important;
				top: 0px;
				margin: 0;
				padding: 0;
				min-height: 60px;
				height: 100%;
				width: 100%;
			}

			.valid, .cancel {
				cursor: pointer;
			}

			#newComment {
				margin-top: 20px;
			}

			#newComment button {
				background: white;
				color: #294997;
			}

			#getForm {
				height: 60px;
				margin-bottom: 30px;
				opacity: 1;
				z-index: 1000;
			}

			#formComment {
				display: none;
				margin-bottom: 30px;
				opacity: 0;
			}

			form {
				margin: 0;
			}

			#commentSend {
				height: 60px!important;
				display: none;
				margin-bottom: 30px;
				opacity: 0;
			}

		</style>
	</head>

	<body class="index-page sidebar-collapse">
		
		<nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="20" style="background: #2c2c2c">
			<div class="container">
				<div class="navbar-translate">
					<a class="navbar-brand" href="index.php?action=home" rel="" title="Accéder à la partie administration" data-placement="bottom">
					Retour
					</a>
					<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar top-bar"></span>
						<span class="navbar-toggler-bar middle-bar"></span>
						<span class="navbar-toggler-bar bottom-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse justify-content-end" id="navigation" style="max-width: 250px;">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php?action=about">
								<i class="now-ui-icons business_badge"></i>
								<p>À Propos</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="Suivez moi sur Twitter" data-placement="bottom" href="#">
								<i class="fab fa-twitter"></i>
								<p class="d-lg-none d-xl-none">Twitter</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="Suivez moi sur Facebook" data-placement="bottom" href="#">
								<i class="fab fa-facebook"></i>
								<p class="d-lg-none d-xl-none">Facebook</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="Suivez moi sur Instagram" data-placement="bottom" href="#">
								<i class="fab fa-instagram"></i>
								<p class="d-lg-none d-xl-none">Instagram</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="wrapper">
			<div id="pagejs" class="page-header clear-filter" filter-color="blue">
				<div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/header1.jpg');">
				</div>
				<div id="allBoard" class="container">
					<div id="board" class="row col-lg-12">
						<nav id="chapListBoard" class="container">          
							<ul id="chapSelector" class="nav nav-pills nav-stacked">
								<div id="chaptersList" class="col-12"></div>
							
								<div id="pagination" style="margin: auto;">
									<ul style="margin: 10 0 10 0;" class='pagination text-center' id="pagination">
										<?php if(!empty($totalPages)):for($i=1; $i<=$totalPages; $i++):  
											if($i == 1):?>
												<li class='active' id="<?php echo $i;?>"><a style="padding: 10 10 20 10;" href='index.php?action=pagination&page=<?php echo $i;?>'><?php echo $i;?></a></li> 
											<?php else:?>
												<li id="<?php echo $i;?>"><a style="padding: 10 10 20 10;" href='index.php?action=pagination&page=<?php echo $i;?>'><?php echo $i;?></a></li>
											<?php endif;?>			
										<?php endfor;endif;?>
									</ul> 
								</div>
							</ul>
						</nav>
						<section id="chapterBoard" class="container">
							<div id="chapContent" class="panel panel-default">
								<div id="chapTitle" class="panel-heading">
									<h3 class="panel-title">Un Billet Simple pour l'Alaska</h3>
								</div>
								<div id="chapBody" class="panel-body">
									<p>Choisissez un chapitre pour commencer votre lecture</p>
								</div>
							</div>
						</section>
      				</div>
					<div id="commentBoard" class="hide row col-sm-12">
						<div id="commentBody" class="panel panel-body row col-sm-12">
							<div class="container"><span style="margin: auto"><em>Un récit de Jean Forteroche<em></span></div>
						</div>
					</div>
				</div>
			</div>
		
			<footer class="footer" data-background-color="black">
				<div class=" container ">
					<nav>
						<ul>
							<li>
								<a href="index.php?action=legal">
									Mentions légales
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright" id="copyright">
						&copy;
						<script>
							document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
						</script>, Codé par 
						<a href="#" target="_blank">Benjamin Boeuf</a>.    
					</div>
				</div>
			</footer>
		</div>

	<script src="http://www.google.com/jsapi"></script>
	<!-- load JQuery and UI from Google (need to use UI to animate colors) -->
	<script type="text/javascript">
	google.load("jqueryui", "1.5.2");
	</script>

	<script src="./assets/js/book.js" type="text/javascript"></script>

	<script>
		jQuery(document).ready(function() {
		jQuery("#chaptersList").load("index.php?action=pagination&page=1");
			jQuery("#pagination li").on('click',function(e){
			e.preventDefault();
				jQuery("#chaptersList").html('loading...');
				jQuery("#pagination li").removeClass('active');
				jQuery(this).addClass('active');
				var pageNum = this.id;
				jQuery("#chaptersList").load("index.php?action=pagination&page=" + pageNum);
			});
    	});
	</script>

<!-- <script>
		jQuery(document).ready(function() {
		jQuery("#chaptersList").load("view/frontend/pagination.php?page=1");
			jQuery("#pagination li").on('click',function(e){
			e.preventDefault();
				jQuery("#chaptersList").html('loading...');
				jQuery("#pagination li").removeClass('active');
				jQuery(this).addClass('active');
				var pageNum = this.id;
				jQuery("#chaptersList").load("view/frontend/pagination.php?page=" + pageNum);
			});
    	});
	</script> -->

	</body>
</html>