$(document).ready(function(){
		$('.logo').pngFix( );
		
		$("hr").replaceWith("<div class='hr'><hr></div>");
		
	$("#galleryNav").jFlow({
		slides: "#galleryPages",
		controller: ".controlNav", 
		slideWrapper : "#GallerySlide",
		selectedWrapper: "pageSelected",  
		width: "900px",
		height: "520px", // Remove to set height automatic
		duration: 500,
		prev: ".galleryPrev", 
		next: ".galleryNext"
	});
	
	$("a[rel^='gallery']").prettyPhoto();
		  
	$("#controller").jFlow({  
			 slides: "#slides",  
			 width: "333px",  
			 height: "209px",  
			 duration: 500  
	});  
	


});
