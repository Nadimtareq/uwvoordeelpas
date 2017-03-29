@extends('template.theme')

{{--*/ $pageTitle = $company->name /*--}}

@section('slider')
<script type="text/javascript">
	var activateAjax = 'restaurant';
	var activateAjaxTwo = 'reservation-groups';
</script>

<div class="woodBackground">
	<div class="container">
		<div class="ui grid">
			<div class="sixteen wide mobile eight wide tablet ten wide computer column">
			@include('pages/restaurant/photos')
			</div>

			<div class="sixteen wide mobile eight wide tablet six wide computer column">
			@include('pages/restaurant/reservation')
			</div>
		</div>
	</div>
</div>
@stop

@section('content')
	<div id="restaurantSteps">
		<div class="ui grid container">
			<div class="two columns row">
				<div class="column" style="text-align: center;">
					<a href="{{ url('hoe-werkt-het') }}"> 
						<img class="ui image" src="https://cdn1.iconfinder.com/data/icons/marketing-outlined/60/shop-trolly-cart-store-128.png"> 
					</a>
					<strong>1. Shopt u ook online?</strong>
				</div>

				<div class=" column" style="text-align: center;">
					<a href="{{ url('hoe-werkt-het') }}"> 
						<img class="ui image" src="https://cdn1.iconfinder.com/data/icons/marketing-outlined/60/euro-paper-money-cash-128.png"> 
					</a>
					<strong>2. Spaar bij 1500+ Webshops!</strong>
				</div>
			</div>

			<div class="two columns center aligned row">
				<div class="center aligned column" style="text-align: center;">
					<a href="{{ url('hoe-werkt-het') }}"> 
						<img class="ui image"  src="https://cdn1.iconfinder.com/data/icons/marketing-outlined/60/calendar-agenda-days-time-mark-128.png"> 
					</a>

					<strong>3. Reserveer met uw spaartegoed!</strong>
				</div>
				
				<div class="column" style="text-align: center;">
					<a href="{{ url('hoe-werkt-het') }}">
						 <img class="ui image" src="https://cdn1.iconfinder.com/data/icons/marketing-outlined/60/wallet-money-card-id-purse-pouch-128.png">
					</a>
					<strong>4. Geniet van uw spaartegoed!</strong>
				</div>
			</div>
		</div>
	</div>

	@if($iframe == 0)
	<div class="container">
		<div id="restaurantPage">
			<div id="menuRestaurant">
				 @include('pages/restaurant/menu')
			</div>

			<div id="typeBar"> 
		        <select id="typePageRestaurant" class="ui fluid normal dropdown">
		            <option value="1">Menu</option>
		            <option value="2" selected>Over ons</option>
		            <option value="3">Details</option>
		            <option value="4">Contact</option>
		            <option value="5">Nieuws</option>
		            <option value="6">Groepen</option>
		        </select>
		    </div>

		    <div class="ui breadcrumb">
				@include('pages/restaurant/breadcrumb')
			</div><br><br>

			<div class="ui vertically grid info container">
				<div class="fourteen wide computer sixteen wide mobile column">
					<div class="ui">
						<div id="restaurantAbout" class="ui bottom attached tab" data-tab="first">
							@include('pages/restaurant/information/about')
						</div>

						<div id="restaurantMenu" class="ui bottom attached active tab" data-tab="second">
							@include('pages/restaurant/information/menu')
						</div>

						<div id="restaurantDetails" class="ui bottom attached tab" data-tab="thirds">
						  	@include('pages/restaurant/information/details')
						</div>

						<div id="restaurantContact" class="ui bottom attached tab" data-tab="four">
						  	@include('pages/restaurant/information/contact')
						</div>	

						<div id="restaurantNews" class="ui bottom attached tab" data-tab="five">
							@include('pages/restaurant/information/news')
						</div>

						<div id="restaurantGroups" class="ui bottom attached tab" data-tab="six">
							@include('pages/restaurant/information/groups')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('pages/restaurant/maps')

	<div class="container">
  		<div id="moreMap">
  			<i id="mapArrow" class="circular white angle down big icon"></i>
  		</div>

		<div id="typeBar" class="ui basic segment"> 
	        <select id="typePageRestaurantTwo" class="multipleSelect">
	            <option value="1" selected>In de buurt</option>
	            <option value="2">Recensies</option>
	        </select>
	    </div>

		<div class="ui grid review">
			<div id="optionOne" class="sixteen wide mobile sixteen wide tablet nine wide computer column">
				<h4>IN DE BUURT</h4>

				<div id="companies" class="recommend">
					<div class="companies home restaurant">
	                	@include('company-list', array('limitChar' => 120))
	        		</div>
	        	</div>

	        	@if (count($companies) > 5)
	        	<button id="loadMoreRecommend" class="ui fluid blue labeled icon button">
                    <i class="arrow cicle outline left down icon"></i>
                    Meer resultaten weergeven
                </button>
                @endif

			    <div class="clear"></div>
			</div>

			<div id="optionTwo" class="sixteen wide mobile one wide tablet six wide computer column">
				<h4>REVIEWS</h4>

				<div class="ui vertically grid reviews">
					@include('pages/restaurant/reviews/list')
				</div>

				<div class="clear"></div><br />

				@include('pages/restaurant/reviews/form')
			</div>
		</div>
	</div>

	<div class="clear"></div>
	
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5751e9a264890504"></script>
	@endif
@stop