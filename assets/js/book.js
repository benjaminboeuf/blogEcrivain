$(document).ready(function() {
		reHeight();$(window).on('scroll', function() {
			reHeight();
		});
		$(window).on('zoom', function() {
			reHeight();
		});
		$(window).on('resize', function() {
			reHeight();
		});
		$(window).on('click', function() {
			reHeight();
		});
	});

	function reHeight() {
		var pageH = $("#chapterBoard").height() + $("#commentBody").height() + $("#chapSelector").height();
		var pageH = pageH + 175;

		// if ($("#chapSelector").width() > 180) {
		// 	pageH = pageH + $("#chapSelector").height();
		// }

		var pageH = pageH + 'px';
		$("#pagejs").css('height', pageH);
	};

	function getChapter (chapterId) {
		// $("#commmentBoard").css('opacity', '1');

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