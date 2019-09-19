<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img/book-3057902_1920.png">
        
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Billet pour l'Alaska
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
				min-height: 10em;
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
			
			[placeholder] {
				color: white;
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
				<div class="collapse navbar-collapse justify-content-end" id="navigation">
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
					<div id="board" class="row col-sm-12">
						<nav id="chapListBoard" class="col-sm-2">          
							<ul id="chapSelector" class="nav nav-pills nav-stacked">
								<?php
								while ($data = $sommaire->fetch()) { ?>
									<li class="chapterList" value="<?= $data['id'] ?>" onclick="getChapter(<?= $data['id'] ?>)"> <a href="#"> Chapitre <?= $data['id'] ?> </a> </li>
								<?php 
								} ?>
							</ul>
						</nav>
						<section id="chapterBoard" class="col-sm-10">
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
							<div class="container"></div>
							</div>
					</div>
				</div>
			</div>
		
			<footer class="footer" data-background-color="black">
				<div class=" container ">
					<nav>
						<ul>
							<li>
								<a href="#">
									Mentions légales
								</a>
							</li>
							<!-- <li>
								<a href="#">
									Plan du site
								</a>
							</li> -->
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

	<!-- include Google's AJAX API loader -->
	<script src="http://www.google.com/jsapi"></script>
	<!-- load JQuery and UI from Google (need to use UI to animate colors) -->
	<script type="text/javascript">
	google.load("jqueryui", "1.5.2");
	</script>

	<script type="text/javascript">

	$(document).ready(function() {
		reHeight();
		$(window).on('zoom', function() {
			reHeight();
		});
		$(window).on('resize', function() {
			reHeight();
		});
		$(window).on('click', function() {
			reHeight();
		});
		// $("#addButton").on('click', function() {
		// 	console.log('onclick');
		// 	addNewComment();
		// })
	});

	function reHeight() {
		var pageH = $("#chapterBoard").height() + $("#commentBody").height();
		var pageH = pageH + 175;

		if ($("#chapSelector").width() > 180) {
			pageH = pageH + $("#chapSelector").height();
		}

		var pageH = pageH + 'px';
		$("#pagejs").css('height', pageH);
	};

	function getChapter (chapterId) {
		$("#commmentBoard").show();

		$(".chapterList:eq(" + (chapterId - 1) + ")").addClass("active");
		$(".chapterList:not(.chapterList:eq(" + (chapterId - 1) + "))").removeClass("active");

		$("#chapTitle > h3").html($.ajax({
        	type: "GET",
			url: "/blogEcrivain/index.php",
			async: false,
        	data: 
        	{
				"action": "title",
				"id": chapterId
			},

		}).responseText);

		$("#commentBody > div:nth-child(1)").html($.ajax({
        	type: "GET",
			url: "/blogEcrivain/index.php",
			async: false,
        	data: 
        	{
				"action": "commentsChapter",
				"id": chapterId
			},

		}).responseText);

		$("#chapBody > p").html($.ajax({
        	type: "GET",
			url: "/blogEcrivain/index.php",
			async: false,
        	data: 
        	{
				"action": "content",
				"id": chapterId
			},

		}).responseText);
	};
		
	function signaledComment(commentId) {
		// var he = $(".phpComment").height();
		var elementContent = "#comment" + commentId + " > .phpCommentContent";
		var elementCheck = "#comment" + commentId + " > .hiddenCheck";
		var commentCheck = $(elementCheck);
		var commentContent = $(elementContent);

		var elementI = "#comment" + commentId + " > i";
		var commentI = $(elementI);

		setTimeout(function() {
			commentContent.animate({'opacity':'0'}, 600);
			commentCheck.animate({'opacity':'1'}, 1000);
			commentContent.css('z-index', '1');
			commentCheck.css('z-index', '25');
			
			
			
		}, 0);
		// comment.css('height', he);
		// comment.width('width', '100%');
		// comment.html("<div class=\"container\">Signaler le commentaire ?</div> <div class=\"container\"><i class=\"fas fa-check\" style=\"font-size: 2em; margin: 0 20 0 20;\"></i><i class=\"fas fa-times\" style=\"font-size: 2em; margin: 0 20 0 20;\"></i></div>");
	};

	function validSignal(commentId) {
		var elementContent = "#comment" + commentId + " > .phpCommentContent";
		var elementCheck = "#comment" + commentId + " > .hiddenCheck";
		var commentCheck = $(elementCheck);
		var commentContent = $(elementContent);

		var elementI = "#comment" + commentId + " .phpCommentContent > i";
		var commentI = $(elementI);

		$.ajax({
			type: "GET",
			url: "/blogEcrivain/index.php",
			async: false,
			data: 
			{
				"action": "signalComment",
				"id": commentId
			},
		});
		commentCheck.animate({'opacity':'0'}, 400);
		commentContent.animate({'opacity':'1'}, 1000);
		commentI.attr("title", "Commentaire signalé !");
		commentI.css('color', 'red');
		commentI.removeAttr("onclick");
		commentI.css("cursor", "auto");
		commentContent.css('z-index', '25');
		commentCheck.css('z-index', '1');
	};
		
	function cancelSignal (commentId) {
		var elementContent = "#comment" + commentId + " > .phpCommentContent";
		var elementCheck = "#comment" + commentId + " > .hiddenCheck";
		var commentCheck = $(elementCheck);
		var commentContent = $(elementContent);

		commentCheck.animate({'opacity':'0'}, 400);
		commentContent.animate({'opacity':'1'}, 1000);
		commentContent.css('z-index', '25');
		commentCheck.css('z-index', '1');
	};
	
	function addNewComment () {
		console.log('aaa');
		var newC = "#getForm";
		newC = $(newC);
		newC.css('display', 'none');
		newC.animate({'opacity' : '0'}, 400);

		var form = $("#formComment");
		form.css('display', 'unset');
		form.animate({'opacity' : '1'}, 1000);
	};

	function commentSend () {
		// var form = $("#formComment");
		// var com = $("#commentSend");
		// form.css('display', 'none');
		// com.css('display', 'unset');
		// form.animate({'opacity' : '0'}, 400);
		// com.animate({'opacity' : '1'}, 1000);
	};

	$(document).ready(function() {
		$('#form').submit( function() {
			var name = $('#name').val();
			var commentaire = $('#message').val();
			if (name != '' && commentaire != '') {
				$.post('./assets/ajaxComment.php', {name:name, commentaire:commentaire}, function(data){
					var xmlData = data.getElementsByTagName('com')[0];
					var ret = xmlData.getElementsByTagName('ret')[0].firstChild.nodeValue;
					var xmlname = xmlData.getElementsByTagName('name')[0].firstChild.nodeValue;
					var xmlCommentaire = xmlData.getElementsByTagName('commentaire')[0].firstChild.nodeValue;
					if (ret) {
						$('#comment').prepend('<p class="last"><strong>'+xmlname+'</strong> a dit :<br />'+xmlCommentaire+'</p>');
						$('#message').val('').focus();
						$('#message').after('<span class="ok">Commentaire ajouté avec succès</span>');
					}
					else {
						$('#message').after('<span class="erreur">Erreur lors de l\'ajout du commentaire</span>');
					}
				}, 'xml');
			}
			else {
				if (name == '')
					$('#name').after('<span class="erreur">Champ requis</span>');
				if (commentaire == '')
					$('#message').after('<span class="erreur">Champ requis</span>');
				$('.erreur').hide().fadeIn('slow');
			}
			
			return false;
    	}); 
	});

	</script>

	</body>
</html>