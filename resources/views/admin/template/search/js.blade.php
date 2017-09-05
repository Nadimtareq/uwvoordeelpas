<!--<script src="{{asset('js/zepto/jquery.waypoints.min.js')}}" type="text/javascript"></script>-->
<script src="{{asset('js/zepto/noframework.waypoints.min.js')}}" type="text/javascript"></script>
<!--<script src="{{asset('js/zepto/zepto.waypoints.min.js')}}" type="text/javascript"></script>-->
<script>
	
        var waypoint = new Waypoint({
            element: document.getElementById('activation'),
            handler: function(direction) {
        console.log('sd');            
        $('#slider-page-include').after('<section id="how_it_works">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Hoe werkt het?</h1>
                        <div class="col-sm-3 coll">
                            <a href="{{ url('tegoed-sparen') }}">
                                <img src="{{ url('images/how_it_works_1.png') }}"
                                     alt="{{ isset($contentBlock[49]) ? strip_tags($contentBlock[49]) : '1. Shopt u ook online?' }}">
                            {!! isset($contentBlock[49]) ? $contentBlock[49] : '1. Shopt u ook online?' !!}
                            <!-- <p>uw online aankoop<br>begint hier!</p> -->
                            </a>
                        </div>
                        <div class="col-sm-3 coll">
                            <a href="{{ url('tegoed-sparen') }}">
                                <img src="{{ url('images/how_it_works_2.png') }}"
                                     alt="{{ isset($contentBlock[50]) ? strip_tags($contentBlock[50]) : '2. Spaar bij 1500+ Webshops!' }}">
                            {!! isset($contentBlock[50]) ? $contentBlock[50] : '2. Spaar bij 2500+ Webshops!' !!}
                            <!-- <p>U spaart tot vel 10%<br>van uw aankoop</p> -->
                            </a>
                        </div>
                        <div class="col-sm-3 coll">
                            <a href="{{ url('search') }}">
                                <img src="{{ url('images/how_it_works_3.png') }}"
                                     alt="{{ isset($contentBlock[51]) ? strip_tags($contentBlock[51]) : '3. Reserveer met uw spaartegoed!' }}">
                            {!! isset($contentBlock[51]) ? $contentBlock[51] : '3. Reserveer met uw spaartegoed!' !!}
                            <!-- <p>reserveer direct<br>bij veel restaurants</p> -->
                            </a>
                        </div>
                        <div class="col-sm-3 coll">
                            <a href="{{ url('tegoed-sparen') }}">
                                <img src="{{ url('images/how_it_works_4.png') }}"
                                     alt="{{ isset($contentBlock[52]) ? strip_tags($contentBlock[52]) : '4. Geniet van uw spaartegoed!' }}">
                            {!! isset($contentBlock[52]) ? $contentBlock[52] : '4. Geniet van uw spaartegoed!' !!}
                            <!-- <p>u betaald heel simpel<br>met uw spaargeld</p> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clear"></div>');
                
//        console.log(this.element.id + ' triggers at ' + this.triggerPoint)
            },
            offset: '75%'
          })
        
	$(document).ready(function() {

		$('#searchModal').on('click', function() {
			$('#hideForm').show();

			$('.ui.modal').modal('show');
			$('.ui.modal .header').html('Zoeken');
			$('.ui.modal .content').html($('.ajaxSearchForm').html());

			$('.dropdownSearchInput').keypress(function (e) {
			  	if (e.which == 13) {
					var inputValue = encodeURIComponent($('.dropdownSearchInput:last').val());
					window.location.href = $('#ajaxSearchForm').data('url') + '?q=' + inputValue;
			    	return false;    //<---- Add this line
			  	}
			});

			$('.dropdownSearchButton').on('click', function() {
					var inputValue = encodeURIComponent($('.dropdownSearchInput:last').val());
				window.location.href = $('.ajaxSearchForm').data('url') + '?q=' + inputValue;
			});
		});


	});
</script>