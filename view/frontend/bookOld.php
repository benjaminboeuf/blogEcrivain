<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img/book-3057902_1920.png">
        
        <!-- <script type="text/javascript" src="./assets/js/plugins/turn/extras/jquery.min.1.7.js"></script> -->
    <!-- <script type="text/javascript" src="./assets/js/plugins/turn/extras/jquery-ui-1.8.20.custom.min.js"></script>
    <script type="text/javascript" src="./assets/js/plugins/turn/extras/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="./assets/js/plugins/turn/extras/modernizr.2.5.3.min.js"></script>
	<script type="text/javascript" src="./assets/js/plugins/turn/lib/hash.js"></script> -->
	<script type="text/javascript" src="./turn.min.js"></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Billet pour l'Alaska
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	
		<style type="text/css">
body{
	background:#ccc;
}

#canvas {
	color: black;
}

#book{
	/* min-width:800px;
	min-height:500px; */
	width:100%;
	height: 87.3%;
	/* position: relative; */
}

#book .turn-page{
	background-color:white;
}

#book .cover{
	margin: 0;
	padding: 0;
	background: url("./assets/img/book-cover.png") no-repeat center fixed;
	background-size: cover;
}

#book .cover h1{
	color: rgb(110, 63, 8);
	text-align:center;
	font-size:35px;
	line-height:350px;
	margin:0px;
	text-shadow: 1px 1px 0.5px black, 0 0 1em black, 0 0 0.2em black, -1px -2px 0 rgba(0,0,0,0.4), 1px 2px 0 rgb(0, 0, 0);
}

#book .loader{
	background-image:url(loader.gif);
	width:24px;
	height:24px;
	display:block;
	position:absolute;
	top:238px;
	left:188px;
}

#book .data{
	text-align:center;
	font-size:40px;
	color: black;
	line-height:500px;
}

#controls{
	width:800px;
	text-align:center;
	margin:20px 0px;
	font:30px arial;
}

#controls input, #controls label{
	font:30px arial;
}

/* #book .odd{
	background-image:-webkit-linear-gradient(left, #FFF 95%, #ddd 100%);
	background-image:-moz-linear-gradient(left, #FFF 95%, #ddd 100%);
	background-image:-o-linear-gradient(left, #FFF 95%, #ddd 100%);
	background-image:-ms-linear-gradient(left, #FFF 95%, #ddd 100%);
} */

#book .even{
	background-image:-webkit-linear-gradient(right, #FFF 95%, #ddd 100%);
	background-image:-moz-linear-gradient(right, #FFF 95%, #ddd 100%);
	background-image:-o-linear-gradient(right, #FFF 95%, #ddd 100%);
	background-image:-ms-linear-gradient(right, #FFF 95%, #ddd 100%);
}
</style>
</head>

    <body class="index-page sidebar-collapse">
        
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="400">
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
                <div class="collapse navbar-collapse bg-primary justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
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
            <div class="page-header clear-filter" filter-color="blue">
                <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/header1.jpg');">
                </div>
                <div id="canvas" class="container">
                    <!-- <div id="book-zoom">
                        <div class="sj-book">
                            <div depth="5" class="hard"> <div class="side"></div> </div>
                            <div depth="5" class="hard front-side"> <div class="depth"></div> </div>
                            <div class="own-size"></div>
                            <div class="own-size even"></div>
                            <div class="hard fixed back-side p111"> <div class="depth"></div> </div>
                            <div class="hard p112"></div>
                        </div>
					</div> -->
					<div id="book">
						<div class="cover"><h1>Un billet pour l'Alaska</h1></div>
					</div>

					<!-- <div id="controls">
						<label for="page-number">Page:</label> <input type="text" size="3" id="page-number"> of <span id="number-pages"></span>
					</div> -->
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
                    <!-- <div class="copyright" id="copyright">
                        &copy;
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>, Codé par 
                        <a href="#" target="_blank">Benjamin Boeuf</a>.    
                    </div> -->
                </div>
            </footer>
        </div>


<script type="text/javascript">

// Sample using dynamic pages with turn.js

var numberOfPages = 4; 


// Adds the pages that the book will need
function addPage(page, book) {
	// 	First check if the page is already in the book
	if (!book.turn('hasPage', page)) {
		// Create an element for this page
		var element = $('<div />', {'class': 'page '+((page%2==0) ? 'odd' : 'even'), 'id': 'page-'+page}).html('<i class="loader"></i>');
		// If not then add the page
		book.turn('addPage', element, page);
		// Let's assum that the data is comming from the server and the request takes 1s.
		
		console.log('meh');
		element.html($.ajax({
        	type: "GET",
			url: "/blogEcrivain/index.php",
			async: false,
        	data: 
        	{
        	    "action": "content",
        	    "id": page
			},
			        
		}).responseText);
		console.log(element.html);
	}
}

$(window).ready(function(){
	$('#book').turn({acceleration: true,
						pages: numberOfPages,
						elevation: 50,
						gradients: !$.isTouch,
						when: {
							turning: function(e, page, view) {

								// Gets the range of pages that the book needs right now
								var range = $(this).turn('range', page);

								// Check if each page is within the book
								for (page = range[0]; page<=range[1]; page++) 
									addPage(page, $(this));

							},

							turned: function(e, page) {
								$('#page-number').val(page);
							}
						}
					});

	$('#number-pages').html(numberOfPages);

	$('#page-number').keydown(function(e){

		if (e.keyCode==13)
			$('#book').turn('page', $('#page-number').val());
			
	});
});

$(window).bind('keydown', function(e){

	if (e.target && e.target.tagName.toLowerCase()!='input')
		if (e.keyCode==37)
			$('#book').turn('previous');
		else if (e.keyCode==39)
			$('#book').turn('next');

});

</script>

        <!-- <script type="text/javascript">
	$("#flipbook").turn({
		width: 400,
		height: 300,
		autoCenter: true
	});
</script> -->

<!-- <script type="text/javascript">

function loadApp() {
	
	var flipbook = $('.sj-book');

	// Check if the CSS was already loaded
	
	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(loadApp, 10);
		return;
	}


	// URIs
	
	Hash.on('^page\/([0-9]*)$', {
		yep: function(path, parts) {

			var page = parts[1];

			if (page!==undefined) {
				if ($('.sj-book').turn('is'))
					$('.sj-book').turn('page', page);
			}

		},
		nop: function(path) {

			if ($('.sj-book').turn('is'))
				$('.sj-book').turn('page', 1);
		}
	});

	// Arrows

	$(document).keydown(function(e){

		var previous = 37, next = 39;

		switch (e.keyCode) {
			case previous:

				$('.sj-book').turn('previous');

			break;
			case next:
				
				$('.sj-book').turn('next');

			break;
		}

	});


	// Flipbook

	flipbook.bind(($.isTouch) ? 'touchend' : 'click', zoomHandle);

	flipbook.turn({
		elevation: 50,
		acceleration: !isChrome(),
		autoCenter: true,
		gradients: true,
		duration: 1000,
		pages: 112,
		when: {
			turning: function(e, page, view) {
				
				var book = $(this),
					currentPage = book.turn('page'),
					pages = book.turn('pages');

				if (currentPage>3 && currentPage<pages-3) {
				
					if (page==1) {
						book.turn('page', 2).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					} else if (page==pages) {
						book.turn('page', pages-1).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					}
				} else if (page>3 && page<pages-3) {
					if (currentPage==1) {
						book.turn('page', 2).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					} else if (currentPage==pages) {
						book.turn('page', pages-1).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					}
				}

				updateDepth(book, page);
				
				if (page>=2)
					$('.sj-book .p2').addClass('fixed');
				else
					$('.sj-book .p2').removeClass('fixed');

				if (page<book.turn('pages'))
					$('.sj-book .p111').addClass('fixed');
				else
					$('.sj-book .p111').removeClass('fixed');

				Hash.go('page/'+page).update();
					
			},

			turned: function(e, page, view) {

				var book = $(this);

				if (page==2 || page==3) {
					book.turn('peel', 'br');
				}

				updateDepth(book);
				
				$('#slider').slider('value', getViewNumber(book, page));

				book.turn('center');

			},

			start: function(e, pageObj) {
		
				moveBar(true);

			},

			end: function(e, pageObj) {
			
				var book = $(this);

				updateDepth(book);

				setTimeout(function() {
					
					$('#slider').slider('value', getViewNumber(book));

				}, 1);

				moveBar(false);

			},

			missing: function (e, pages) {

				for (var i = 0; i < pages.length; i++) {
					addPage(pages[i], $(this));
				}

			}
		}
	});


	$('#slider').slider('option', 'max', numberOfViews(flipbook));

	flipbook.addClass('animated');

	// Show canvas

	$('#canvas').css({visibility: ''});
}

// Hide canvas

$('#canvas').css({visibility: 'hidden'});

// Load turn.js

yepnope({
	test : Modernizr.csstransforms,
	yep: ['./assets/js/plugins/turn/lib/turn.min.js'],
	nope: ['./assets/js/plugins/turn/samples/steve-jobs/lib/turn.html4.min.js', 'css/jquery.ui.html4.css', 'css/steve-jobs-html4.css'],
	both: ['./assets/js/plugins/turn/samples/steve-jobs/js/steve-jobs.js', './assets/js/plugins/turn/samples/steve-jobs/css/jquery.ui.css', './assets/js/plugins/turn/samples/steve-jobs/css/steve-jobs.css'],
	complete: loadApp
});

</script> -->



    </body>
</html>