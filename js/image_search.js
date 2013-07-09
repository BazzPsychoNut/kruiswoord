// load google search module
google.load('search', '1');

var imageSearch;

// set search complete function: display 4 search results in the "content" div
function searchComplete() {
	// Check that we got results
	if (! imageSearch.results || ! imageSearch.results.length) 
		return null;
		
	// Grab our content div, clear it.
	var contentDiv = document.getElementById('content');
	contentDiv.innerHTML = '';

	// Loop through first four results, printing them to the page.
	var results = imageSearch.results;
	for (var i = 0; i < 4; i++) {
		// For each result write it's title and image to the screen
		var result = results[i];
		console.log(result);
		var imgContainer = document.createElement('div');
		imgContainer.style.float = "left";
		var newImg = document.createElement('img');

		// There is also a result.url property which has the escaped version
		newImg.src = result.tbUrl;
		imgContainer.appendChild(newImg);

		// Put our title + image in the content
		contentDiv.appendChild(imgContainer);
	}
}

// initialize the google image search object
function OnLoad() {
  
	// Create an Image Search instance.
	imageSearch = new google.search.ImageSearch();

	// Set searchComplete as the callback function when a search is 
	// complete.  The imageSearch object will have results in it.
	imageSearch.setSearchCompleteCallback(this, searchComplete, null);

	// Find me 4 search results
	imageSearch.setRestriction(
		google.search.ImageSearch.RESTRICT_IMAGESIZE,
		google.search.ImageSearch.IMAGESIZE_MEDIUM);
	imageSearch.setRestriction(
		google.search.ImageSearch.RESTRICT_FILETYPE,
		google.search.ImageSearch.FILETYPE_PNG);
	
	// Include the required Google branding
	google.search.Search.getBranding('branding');
}

google.setOnLoadCallback(OnLoad);