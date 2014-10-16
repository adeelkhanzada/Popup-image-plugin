$(document).ready(function(e) {
   //var FindWp = $('body').find('[data-rel="popup"]');
   var get_body = 'body';
   $(get_body).prepend('<div id="popup-box"></div>');
   var black_wp = $('<div class="back"></div>').insertBefore('#popup-box');
   black_wp.hide();
   $(get_body).find('[data-image]').css('cursor','pointer');
  var find_attr = $(get_body).find('[data-image]');
   $(find_attr).on('click',function(){ //////Click Call Function///////////////
    var getpath = $(this).data('image');
	   setTimeout(function(){  //////////////Set time///////////////
			var box = $('#popup-box')
			.html('<img src="" alt="" />'+ '<button class="closepopup">Close</button>');
			var setsrc = $(box).find('img').attr('src',getpath);
		  //////////////////////////Get Image source loading///////////////////////////////
			var img2 = new Image();
			img2.src = document.querySelector('img').src;
			img2.onload = function() {
				var get_width = document.querySelector('img').naturalWidth;
				$('#popup-box').css('width',get_width);////////Wapper Center//////
				console.log("Image source loaded success");
			  };
			/////////////////////////////////////////////////////////
			$('#popup-box').fadeIn(500);
			$(black_wp).fadeIn(500);
		   $('.closepopup').on('click',function(){ //////Close PopupBox///////
				$('.back').fadeOut(500);
				$('#popup-box').fadeOut(500);
				});
				
			}, 10);

	  });

});
