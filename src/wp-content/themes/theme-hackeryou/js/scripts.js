(function($) {
    function Sticker(element) {
	var $sticky = $(element);
	var position;
	// Div made to hold nav's place in document
	$sticky.before("<div class=\"placeholder\" style=\"display: inline\"></div>");

	// Refers to the placeholder div
	var $filler= $sticky.prev();
    	
	// Rerepresents whether or not nav is stuck
	var isStuck = false;

	// Returns true if previous element scrolled out of view
	function atTop() {
	    var docViewTop = $(window).scrollTop();
	    return (position <= docViewTop);
	}

	// Stick nav to top of viewport
	function stick() {
	    var left = $sticky.offset().left;
	    var style = getComputedStyle($sticky.get(0)).cssText;	    
	    if (!style) {
		style = getComputedStyleCssText($sticky.get(0));
	    }
	    $filler.attr("style", style);
	    $filler.css({"max-width": "100%"});
	    $sticky.css({"margin": 0, "position": "fixed", "top": 0, "left": left + "px"});
	    isStuck = true;
	}

	// Unstick the nav from top of viewport
	function unstick() {
	    $sticky.css({"margin": "", "position": "", "top": "", "left": ""});
	    $filler.attr("style", "display: inline;");
	    isStuck = false;
	}

	// Polyfill for getComputedStyle(element).cssText in Firefox
	function getComputedStyleCssText(element) {
	    var style = window.getComputedStyle(element);
	    var cssText;
	    
	    cssText = "";
	    for (var i = 0; i < style.length; i++) {
		cssText += style[i] + ": " + style.getPropertyValue(style[i]) + "; ";
	    }
	    
	    return cssText;
	}

	// Stick nav at top of previous element scrolled out of view
	function check() {
	    if (atTop()) {
		if (!isStuck)
		    stick();
	    } else {
		if (isStuck)
		    unstick();
	    }
	}

	// Recalculate point at which nav should be stuck/unstuck.
	function refreshPosition() {
	    var marginTop = parseInt($sticky.css('margin-top'), 10);
	    position = $filler.offset().top + marginTop;
	}
	
	refreshPosition();
	
	return {
	    refreshPosition: refreshPosition,
	    check: check
	};
    }

    $.fn.stickies = function() {

	// Recalculate sticking point, then stick if necessary
	$(window).on("resize orientationChanged", function() {
	    stickers.forEach(function(element) {
		element.refreshPosition();
		element.check();
	    });
	});

	// Stick nav if necessary on scroll
	$(window).on("scroll", function() {
	    stickers.forEach(function(sticker) {
		sticker.check();
	    });
	});

	var stickers = this.toArray().map(function(element) {
	    return Sticker(element);
	});
	
	return this;
    };    
})(jQuery);



(function($){
	//your jQuery here
	$('.header').stickies();
	$('a').smoothScroll({offset: -8});
})(jQuery);
 


	



