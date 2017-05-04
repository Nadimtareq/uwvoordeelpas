var scrollDirection;

$(document).ready(function($){

   $('.button-collapse2').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
     }
   );


	// Animate scrolling on hire me button
	$('.hire-me-btn').on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop: $("#contact").offset().top}, 500);
	});


	// window scroll Sections scrolling

	(function(){
		var sections = $(".scroll-section");

		function getActiveSectionLength(section, sections) {
			return sections.index(section);
		}
		
		if ( sections.length > 0 ) {


			sections.waypoint({
				handler: function(event, direction) {
					var active_section, active_section_index, prev_section_index;
					active_section = $(this);
					active_section_index = getActiveSectionLength($(this), sections);
					prev_section_index = ( active_section_index - 1 );

					if (direction === "up") {
						scrollDirection = "up";
						if ( prev_section_index < 0 ) {
							active_section = active_section;
						} else {
							active_section = sections.eq(prev_section_index);
						}
					} else {
						scrollDirection = "Down";
					}


					if ( active_section.attr('id') != 'home' ) {
						var active_link = $('.menu-smooth-scroll[href="#' + active_section.attr("id") + '"]');
						active_link.parent('li').addClass("current").siblings().removeClass("current");
					} else {
						$('.menu-smooth-scroll').parent('li').removeClass('current');
					}
				},
				offset: '35%'
			});
		}

	}());



	// Map
	var mapStyle = [
	{
		"featureType": "landscape",
		"stylers": [
		{
			"saturation": -100
		},
		{
			"lightness": 50
		},
		{
			"visibility": "on"
		}
		]
	},
	{
		"featureType": "poi",
		"stylers": [
		{
			"saturation": -100
		},
		{
			"lightness": 40
		},
		{
			"visibility": "simplified"
		}
		]
	},
	{
		"featureType": "road.highway",
		"stylers": [
		{
			"saturation": -100
		},
		{
			"visibility": "simplified"
		}
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
		{
			"saturation": -100
		},
		{
			"lightness": 20
		},
		{
			"visibility": "on"
		}
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
		{
			"saturation": -100
		},
		{
			"lightness": 30
		},
		{
			"visibility": "on"
		}
		]
	},
	{
		"featureType": "transit",
		"stylers": [
		{
			"saturation": -100
		},
		{
			"visibility": "simplified"
		}
		]
	},
	{
		"featureType": "administrative.province",
		"stylers": [
		{
			"visibility": "off"
		}
		]
	},
	{
		"featureType": "water",
		"elementType": "labels",
		"stylers": [
		{
			"visibility": "on"
		},
		{
			"lightness": -0
		},
		{
			"saturation": -0
		}
		]
	},
	{
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [
		{
			"hue": "#00baff"
		},
		{
			"lightness": -10
		},
		{
			"saturation": -95
		}
		]
	}
	];

	var $mapWrapper = $('#map'), draggableOp;


	if ( jQuery.browser.mobile === true ) {
		draggableOp = false;
	} else {
		draggableOp = true;
	}

	if ( $mapWrapper.length > 0 ) {
		var map = new GMaps({
			div: '#map',
			lat : 23.79473005386213,
			lng : 90.41430473327637,
			scrollwheel: false,
			draggable: draggableOp,
			zoom: 16,
			disableDefaultUI: true,
			styles : mapStyle
		});

		map.addMarker({
			lat : 23.79473005386213,
			lng : 90.41430473327637,
			icon: 'images/marker-icon.png',
			infoWindow: {
				content: '<p>BD InfoSys Ltd, Dhaka, Bangladesh</p>'
			}
		});
	}

	$("#datepicker").datepicker().datepicker("setDate", new Date());
	
	
	if( $('#datepicker-ajax').length )
	{	
		var currentDate = new Date();
		var jsonParse = [];
		var refresh_option = function( id, available) {
			// Disable time field when there is no date available								
			$(id+' option').each(function(key) {								
				if (key <= available) $(this).removeAttr("disabled");
								else  $(this).attr("disabled","disabled");	
			});
			
			$(id).val("0");
		}

		$('#time-calendar').on('change',function() {
			 var rules = $(this).data();
			 console.log(rules,rules.availablePersons);
			 if(rules)
			   refresh_option('#persons-calendar',rules.availablePersons);
		});
		
		$('#datepicker-ajax').datepicker({
			useCurrent:false,
			onSelect: function (date) {
				
				$('input[name="date"]').val(date);
				$('input[name="date_hidden"]').val(date);
				
				$.ajax({
					method: 'GET',
					url: baseUrl + 'ajax/available/time',
					data: {
						company: $('input[name="company_id"]').val(),
						persons: $('input[name="persons"]').val(),
						date: date
					},
					success: function (response) {
						var jsonParse = JSON.parse(response); 
						var jsonKeys = Object.keys(jsonParse);
						
						$("#time-calendar").empty();					
						for(var time in jsonParse) {
							var parse_local = jsonParse[time];
							var key = Object.keys(parse_local)[0];						
							
							$("#time-calendar").append($('<option></option>').val(time).html(time)).data(parse_local[key]);
						};
					}
				});
				$(this).datepicker('setDate',date);
				
			},
			beforeShowDay: function (date) {
				
				if(jsonParse.dates && jsonParse.dates.length) {
					var dates_check= jsonParse.dates;
					var found = [false];
					dates_check.forEach(function (val,i,arr) {									
									var val_date = Date.parse(val.date+" 00:00:00");
									var select_date = new Date(val_date);
									if(date.getTime() === select_date.getTime()) {
										found=[true];
									}
							});
					return found;	  
				} else
					return [false];
			},
			onChangeMonthYear : function(year,month,inst) {
				
				$('input[name="month"]').val(month);
				$('input[name="year"]').val(year);

				$(".calendar-ajax > *").attr('disabled', true);
				$(".calendar-ajax").css('opacity', '0.4');
				
				$.ajax({
					url: baseUrl + 'ajax/available/reservation',
					data: {
						persons: $('input[name="persons"]').val(),
						month: month ,
						year: year,
						company:  $('input[name="company_id"]').val()
					},	
					success: function(response) {
						jsonParse = JSON.parse(response);
						
						refresh_option('#persons-calendar',jsonParse.availablePersons);
										
					},
					complete: function(){
						$(".calendar-ajax > *").removeAttr('disabled');;
						$(".calendar-ajax").css('opacity', '');
						
						$('#datepicker-ajax').datepicker('refresh');
					}
				});
			}
		});
		$('#datepicker-ajax').datepicker("option","onChangeMonthYear")(currentDate.getFullYear(),currentDate.getMonth()+1,null);
		
	}
}(jQuery));



$(window).load(function($){
	
	// section calling
	$('.section-call-to-btn.call-to-home').waypoint({
		handler: function(event, direction) {
			var $this = $(this);
			$this.fadeIn(0).removeClass('btn-hidden');
			var showHandler = setTimeout(function(){
				$this.addClass('btn-show').removeClass('btn-up');
				clearTimeout(showHandler);
			}, 1500);
		},
		offset: '90%'
	});

	
	$('.section-call-to-btn.call-to-about').delay(1000).fadeIn(0, function(){
		var $this = jQuery(this);
		$this.removeClass('btn-hidden');
		var showHandler = setTimeout(function(){
			$this.addClass('btn-show').removeClass('btn-up');
			clearTimeout(showHandler);
		}, 1600);
	});



	// portfolio Mesonary
	if ( $('#protfolio-msnry').length > 0 ) {
		// init Isotope
		var loading = 0;
		var portfolioMsnry = $('#protfolio-msnry').isotope({
			itemSelector: '.single-port-item',
			layoutMode: 'fitRows'
		});


		$('#portfolio-msnry-sort a').on( 'click', function(e) {

			e.preventDefault();

			if ( $(this).parent('li').hasClass('active') ) {
				return false;
			} else {
				$(this).parent('li').addClass('active').siblings('li').removeClass('active');
			}

			var $this = $(this);
			var filterValue = $this.data('target');

			// set filter for Isotope
			portfolioMsnry.isotope({ filter: filterValue });

			return $(this);
		});

		$('#portfolio-item-loader').on( 'click', function(e) {
			e.preventDefault();
			var $this = $(this);

			for (var i = 0; i < 3; i++) {
				$.get("portfolioitems.html", function(data, status){
					var lists, numb, target = $('#portfolio-msnry-sort li.active a').data('target');

					lists = ( target != '*' ) ? $(data).find('li'+target) : $(data).find('li');

					if (lists.length > 0) {
						numb = Math.floor(Math.random() * lists.length);
						portfolioMsnry.isotope( 'insert', lists.eq(numb) );

						loading++;
						( loading == 9 ) ? $this.remove() : "";
					}

				});
			}

		});

		var portfolioModal = $('#portfolioModal'),
		portImgArea = portfolioModal.find('.model-img'),
		portTitle = portfolioModal.find('.modal-content .title'),
		portContent = portfolioModal.find('.modal-content .m-content'),
		portLink = portfolioModal.find('.modal-footer .modal-action');
		
		$('#protfolio-msnry').delegate('a.modal-trigger', 'click', function(e){
			e.preventDefault();
			var $this = $(this);
			portfolioModal.openModal({
				dismissible: true,
				opacity: '.4',
				in_duration: 400,
				out_duration: 400,
				ready: function() {
					var imgSrc = $this.data('image-source'),
					title = $this.data('title'),
					content = $this.data('content'),
					demoLink = $this.data('demo-link');


					if ( imgSrc ) {
						portImgArea.html('<img src="'+imgSrc+'" alt="Portfolio Image" />');
					};


					portTitle.text(title);
					portContent.text(content);
					portLink.attr('href', demoLink);
				}
			});
		});
	}

	// skills animation
	$('#skillSlider').waypoint({
		handler: function(event, direction) {
			$(this).find('.singel-hr-inner').each(function(){
				var height = $(this).data('height');
				$(this).css('height', height);
			});
		},
		offset: '60%'
	});


	// Wow init
	new WOW({
		offset: 200,
		mobile: false
	}).init();


	$('.flexslider').flexslider({
		selector: ".slides > .container",
		animation: "slide"
	});


	if ( $('.tabs-content:visible .col4:hidden').length > 0 ){
		$('.wr2').show();
	}
	else {
		($('.tabs-content .col4:visible').find('.wr2')).hide();
	}

	$('.wr2').click(function(){
		$('.tabs-content:visible .col4').slice(0, $('.tabs-content .col4:visible').length+3).css('display', 'block');
		if ( $('.tabs-content:visible .col4:hidden').length == 0 ) $(this).hide();
		return false;
	});

	$("a.activation").click(function () {
		var elementClick = $(this).attr("href")
		var destination = $(elementClick).offset().top;
		jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);
		return false;
	});	


	$('.bxslider').bxSlider({
		controls: true,
		pagerCustom: '.bx-pager'
	});

	var $j = jQuery.noConflict();
	var realSlider= $j("ul#bxslider").bxSlider({
		speed:1000,
		pager:false,
		nextText:'',
		prevText:'',
		infiniteLoop:false,
		hideControlOnEnd:true,
		onSlideBefore:function($slideElement, oldIndex, newIndex){
			changeRealThumb(realThumbSlider,newIndex);

		}

	});

	var realSlider= $j("ul#bxslider").bxSlider({
		speed:1000,
		pager:false,
		nextText:'',
		prevText:'',
		infiniteLoop:false,
		hideControlOnEnd:true,
		onSlideBefore:function($slideElement, oldIndex, newIndex){
			changeRealThumb(realThumbSlider,newIndex);        
		}      
	});   

	var realThumbSlider=$j("ul#bxslider-pager").bxSlider({
		minSlides: 4,
		mode: 'vertical',
		maxSlides: 4,
		slideWidth: 205,
		slideMargin: 3,
		moveSlides: 1,
		pager:false,
		speed:1000,
		infiniteLoop:false,
		hideControlOnEnd:true,
		nextText:'<span></span>',
		prevText:'<span></span>',
		onSlideBefore:function($slideElement, oldIndex, newIndex){
        /*$j("#sliderThumbReal ul .active").removeClass("active");
        $slideElement.addClass("active"); */
     }
  });    
	linkRealSliders(realSlider,realThumbSlider);    
	if($j("#bxslider-pager li").length<5){
		$j("#bxslider-pager .bx-next").hide();    }

// sincronizza sliders realizzazioni
function linkRealSliders(bigS,thumbS){  
	$j("ul#bxslider-pager").on("click","a",function(event){
		event.preventDefault();
		var newIndex=$j(this).parent().attr("data-slideIndex");
		bigS.goToSlide(newIndex);
	});
}
//slider!=$thumbSlider. slider is the realslider
function changeRealThumb(slider,newIndex){

	var $thumbS=$j("#bxslider-pager");
	$thumbS.find('.active').removeClass("active");
	$thumbS.find('li[data-slideIndex="'+newIndex+'"]').addClass("active");

	if(slider.getSlideCount()-newIndex>=4)slider.goToSlide(newIndex);
	else slider.goToSlide(slider.getSlideCount()-4);

}


jQuery('.tabs-link a').click(function() {

	var tabId = jQuery(this).attr('href');
	jQuery('.tabs-link a').removeClass('active');
	jQuery(this).addClass('active');
	jQuery('.tabs-content > div').hide();
	jQuery(tabId).show();
	return false;
});
jQuery('.tabs-link a').eq(0).click();

jQuery('.r a').click(function() {

	var tabId = jQuery(this).attr('href');
	jQuery('.r a').removeClass('active');
	jQuery(this).addClass('active');
	jQuery('.tabs-content > ul').hide();
	jQuery(tabId).show();
	return false;
});
jQuery('.r a').eq(0).click();

jQuery('.up > .more').hide();
jQuery('.tabs-content a').click(function() {	
	jQuery('.up > .more').show();
	var tabId = jQuery(this).attr('href');
	jQuery('.tabs-content a').removeClass('active');
	jQuery(this).addClass('active');
	jQuery('.more > div').hide();
	jQuery('.up > .start').hide();
	jQuery(tabId).show();
	return false;
});
// jQuery('.tabs-content a').eq(0).click();

}(jQuery));


(function() {
	/*=========== count up statistic ==========*/
	var $countNumb = $('.countNumb');

	if ( $countNumb.length > 0 ) {
		$countNumb.counterUp({
			delay: 15,
			time: 1700
		});
	}



	$('#contactForm').on('submit', function(e){
		e.preventDefault();
		var $this = $(this),
		data = $(this).serialize(),
		name = $this.find('#contact_name'),
		email = $this.find('#email'),
		message = $this.find('#textarea1'),
		loader = $this.find('.form-loader-area'),
		submitBtn = $this.find('button, input[type="submit"]');

		loader.show();
		submitBtn.attr('disabled', 'disabled');

		function success(response) {
			swal("Thanks!", "Your message has been sent successfully!", "success");
			$this.find("input, textarea").val("");
		}

		function error(response) {
			$this.find('input.invalid, textarea.invalid').removeClass('invalid');
			if ( response.name ) {
				name.removeClass('valid').addClass('invalid');
			}

			if ( response.email ) {
				email.removeClass('valid').addClass('invalid');
			}

			if ( response.message ) {
				message.removeClass('valid').addClass('invalid');
			}
		}

		$.ajax({
			type: "POST",
			url: "inc/sendEmail.php",
			data: data
		}).done(function(res){

			var response = JSON.parse(res);

			if ( response.OK ) {
				success(response);
			} else {
				error(response);
			}


			var hand = setTimeout(function(){
				loader.hide();
				submitBtn.removeAttr('disabled');
				clearTimeout(hand);
			}, 1000);

		}).fail(function(){
			sweetAlert("Oops...", "Something went wrong, Try again later!", "error");
			var hand = setTimeout(function(){
				loader.hide();
				submitBtn.removeAttr('disabled');
				clearTimeout(hand);
			}, 1000);
		});
	});

});