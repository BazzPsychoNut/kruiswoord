$(document).ready(function() {
	// pretend that the li elements are links
	$("li").hover(function() {
		$(this).css({'text-decoration':'underline', 'color':'blue', 'cursor':'pointer'});
	}, function () {
		$(this).css({'text-decoration':'none', 'color':'black', 'cursor':'auto'});
	});
	
	// execute search on click
	$("li").click(function() {
		imageSearch.execute($(this).text());
	});
});