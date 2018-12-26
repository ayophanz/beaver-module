(function($) {
	$(function() {
		(function($) {
		  $.fn.visible = function(partial) {		
			  var $t            = $(this),
				  $w            = $(window),
				  viewTop       = $w.scrollTop(),
				  viewBottom    = viewTop + $w.height(),
				  _top          = $t.offset().top,
				  _bottom       = _top + $t.height(),
				  compareTop    = partial === true ? _bottom : _top,
				  compareBottom = partial === true ? _top : _bottom;		
			return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
		  };		
		})(jQuery);
				
		$(window).on("load scroll resize", function(){
			$(".skillbar").each(function(i, bar) {
				var bar = $(bar);
				if (bar.visible(true)) {
					bar.addClass("animate"); 
				}
			});
			$(".fl-node-<?php echo $id; ?> .countscroller:not(.animate)").each(function(i, count) {
				var count = $(count);
				var delay = $(count).attr('data-delay')*1000+100;
				if (count.visible(true)) {
				  count.addClass("animate"); 
					count.prop('Counter',0).animate({
						Counter: count.text()
					}, {
						duration: delay,
						easing: 'swing',
						step: function (now) {
							count.text(commaSeparateNumber(Math.ceil(now)));
						}
					});
				}
			});
		});
		function commaSeparateNumber(val){
			while (/(\d+)(\d{3})/.test(val.toString())){
				val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			}
			return val;
		}
	});
})(jQuery);