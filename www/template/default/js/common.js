$(document).ready(function() {
    
    //Menu tab
    
    var menuButton = $('button.toggle_mnu');
    
    menuButton.on('click', function() {
        $("div.menu-tab, div.main").toggleClass("active");
    });
    
    $('.profile.'+GET["action"]).addClass('active');
    
    
    
	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
});