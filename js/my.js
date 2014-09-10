
//adjustCarouselHeight();
//$(window).on('resize',adjustCarouselHeight);

$('.carousel').each(function () {
	$(this).slick({
	  dots: true,
	  infinite: true,
	  autoplay: true,
	  speed: 500,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 800,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});
});
baguetteBox.run('.carousel', {
			  // Custom options
			});

$('.nav_item a').on('click',function(){

	var slug = $(this),
		module = slug.attr('id').substring(4),
		selector = '#' + module;
		currentSlug = '#' + $('.nav_item .active').attr('id').substring(4);

		if(selector != currentSlug)
		{
			slug.addClass('active').parent().siblings().children().removeClass('active');
			$(currentSlug).fadeOut(1000);
		    $(selector).fadeIn(1000);
		    if(selector == '#project')
		    {
		    	$('#project').resize();
		    	setTimeout(function () {
			    	//adjustCarouselHeight();
				},3000);
		    }
		}
});

$('.link-to-contact a, #talk-cycle a').on('click',function(){	
	var currentSlug = '#' + $('.nav_item .active').attr('id').substring(4);
	if(currentSlug != '#contact')
	{
		$('#nav_contact').addClass('active').parent().siblings().children().removeClass('active');
		$(currentSlug).fadeOut(1000);
		$('#container #contact').fadeIn(1000);
	}
});

$('#link-resume a, #link-skill a').on('click',function(){	

	$('#nav_resume').addClass('active').parent().siblings().children().removeClass('active');
	$('#home').fadeOut(1000);
	$('#container #resume').fadeIn(1000);
});

$('#link-work a').on('click',function(){	

	$('#nav_project').addClass('active').parent().siblings().children().removeClass('active');
	$('#home').fadeOut(1000);
	$('#container #project').fadeIn(1000);
	
});

$('#contact #submit').click(function(){
	var name = $('input#name').val(),
		mail = $('input#mail').val(),
		subject = $('input#subject').val(),
		message = $('input#message').val();
		postData =$('#email-wrap form').serialize();

	$.ajax({
		type:"POST",
		url:"email.php?sendEmail",
		data:postData,
		success:function(){
			$('#success-message').show();
			$('input, textarea').not(':button, :submit, :reset, :hidden').val('');
		},
	});
});

function adjustCarouselHeight1(){
	var slideHeight = $('.slick-slide').width();
	$('.slick-slide a img').css('height',slideHeight * 0.6);
}