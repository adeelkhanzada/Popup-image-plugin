$(document).ready(function(e) {
   //var FindWp = $('body').find('[data-rel="popup"]');
   $('body').prepend('<div id="popup-box"></div>');
   $('body').find('[data-image]').css('cursor','pointer');
  var FindAttr = $('body').find('[data-image]');
 
  $(FindAttr).on('click',function(){ //////Click Call Function///////////////
	  var GetPath = $(this).data('image');
	
		 setTimeout(function(){  //////////////Set time///////////////
			var Img = $('#popup-box')
			.html('<img src="" alt="" />'+ '<button class="closepopup">Close</button>');
			var ImgSrc = $(Img).find('img').attr('src',GetPath);
			console.log(ImgSrc);
			$('#popup-box').fadeIn(500);
			$('<div class="back"></div>').insertBefore('#popup-box');
		  
		  $('.closepopup').on('click',function(){ //////Close PopupBox///////
				$('.back').fadeOut(500);
				$('#popup-box').fadeOut(500);
				});
				
			}, 10);
	
	  });

  
});
