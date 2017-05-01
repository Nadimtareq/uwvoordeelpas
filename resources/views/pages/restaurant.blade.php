@extends('template.theme')

{{--*/ $pageTitle = $company->name /*--}}
@section('slider')
@stop
<!--
@ection('slider')
<script type="text/javascript">
	var activateAjax = 'restaurant';
	var activateAjaxTwo = 'reservation-groups';
</script>

<div class="woodBackground">
	<div class="container">
		<div class="ui grid">
			<div class="sixteen wide mobile eight wide tablet ten wide computer column">
			@nclude('pages/restaurant/photos')
			</div>

			<div class="sixteen wide mobile eight wide tablet six wide computer column">
			@nclude('pages/restaurant/reservation')
			</div>
		</div>
	</div>
</div>
@top
-->

@section('content')

	<div class="tabss">
			<div class="container">
				<div class="right_details">
					<div id="datepicker" class="right_calendar hasDatepicker"><div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">April</span>&nbsp;<span class="ui-datepicker-year">2017</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th><span title="Monday">Mo</span></th><th><span title="Tuesday">Tu</span></th><th><span title="Wednesday">We</span></th><th><span title="Thursday">Th</span></th><th><span title="Friday">Fr</span></th><th class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">1</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">5</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">6</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">7</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">8</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">12</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">13</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">14</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">15</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">19</a></td><td class="  ui-datepicker-current-day" data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default ui-state-active" href="#">20</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">21</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">22</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">25</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">26</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">27</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">28</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">29</a></td></tr><tr><td class=" ui-datepicker-week-end  ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default ui-state-highlight" href="#">30</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td></tr></tbody></table></div></div>
					<ul>
						<li><img src="images/c1.png" alt="m3">
							<select name="quantity" class="quantity2">
								<option value="0" disabled="disabled" selected="">11:00</option>
								<option>08:00</option>
								<option>08:15</option>
								<option>08:30</option>
								<option>08:45</option>
							</select>
						</li>
						<li><img src="images/c2.png" alt="m4">
							<select name="quantity" class="quantity2">
								<option value="0" disabled="disabled" selected="">1 person</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</li>
					</ul>
					<a href="#" class="more">Reserveer nu</a>
				</div>
				<div class="main_gallery">
					<div class="left_side">
						<div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 314px;"><div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 314px;"><ul id="bxslider" style="width: 615%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
							<li style="float: left; list-style: outside none none; position: relative; width: 674px;">
								<img src="images/s.jpg" alt="s">
							</li>
							<li style="float: left; list-style: outside none none; position: relative; width: 674px;">
								<img src="images/s.jpg" alt="s">
							</li>
							<li style="float: left; list-style: outside none none; position: relative; width: 674px;">
								<img src="images/s.jpg" alt="s">
							</li>
							<li style="float: left; list-style: outside none none; position: relative; width: 674px;">
								<img src="images/s.jpg" alt="s">
							</li>
						</ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev disabled" href=""></a><a class="bx-next" href=""></a></div></div></div></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev disabled" href=""></a><a class="bx-next" href=""></a></div></div></div>
					</div>
					<!-- The thumbnails -->
					<div class="r_side">
						<div class="bx-wrapper" style="max-width: 205px; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 323px;"><ul id="bxslider-pager" style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
							<li data-slideindex="0" style="float: none; list-style: outside none none; position: relative; width: 187px; margin-bottom: 3px;"><a href="#"><img src="images/s_1.png" alt="Alt"></a></li>
							<li data-slideindex="1" style="float: none; list-style: outside none none; position: relative; width: 187px; margin-bottom: 3px;"><a href="#"><img src="images/s_2.png" alt="Alt"></a></li>
							<li data-slideindex="2" style="float: none; list-style: outside none none; position: relative; width: 187px; margin-bottom: 3px;"><a href="#"><img src="images/s_3.png" alt="Alt"></a></li>
							<li data-slideindex="3" style="float: none; list-style: outside none none; position: relative; width: 187px; margin-bottom: 3px;"><a href="#"><img src="images/s_4.png" alt="Alt"></a></li>
						</ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev disabled" href=""><span></span></a><a class="bx-next disabled" href=""><span></span></a></div></div></div>
					</div>
				</div>
				<div class="tabs-all">
					<ul class="tabs-link">
						<li><a href="#t1" class="active">Over ons</a></li>
						<li><a href="#t2" class="">Menu</a></li>
						<li><a href="#t3" class="">Details</a></li>
						<li><a href="#t4" class="">Contact</a></li>
						<li><a href="#t5" class="">Nieuws</a></li>
						<li><a href="#t6" class="">Groepen</a></li>
						<li><a href="#t7" class="">Reviews</a></li>
					</ul>
					<div class="tabs-content">
						<div id="t1" style="display: block;">
							<div class="text3">
								<strong>3 gangen keuzemenu met vlees / vis</strong>
								<span class="city"><i class="material-icons">place</i>New York, USA</span>
								<span class="stars"><img src="images/stars2.png" alt="stars2">4.50</span>
								<p>	This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>
								<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
								<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
							</div>
						</div>
						<div id="t2" style="display: none;">
							<div class="menu">
								<div class="left_m">
									<h2>3 gangen keuze menu met vlees / vis en soep</h2>
									<img src="images/menu.jpg" alt="menu">
									<ul class="price">
										<li><span>Verkocht<i>3,510</i></span></li>
										<li><span>Korting<i>50%</i></span></li>
									</ul>
								</div>
								<div class="right_m">
									<span>€31,75<strong>€15,75</strong></span>
									<b class="up">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</b>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
								</div>
								<div class="end">* This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </div>
								<div class="end2">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh </div>
							</div>
							<div class="menu">
								<div class="left_m">
									<h2>3 gangen keuze menu met vlees / vis en soep</h2>
									<img src="images/menu.jpg" alt="menu">
									<ul class="price">
										<li><span>Verkocht<i>3,510</i></span></li>
										<li><span>Korting<i>50%</i></span></li>
									</ul>
								</div>
								<div class="right_m">
									<span>€31,75<strong>€15,75</strong></span>
									<b class="up">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</b>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
								</div>
								<div class="end">* This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </div>
								<div class="end2">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh </div>
							</div>
							<div class="menu">
								<div class="left_m">
									<h2>3 gangen keuze menu met vlees / vis en soep</h2>
									<img src="images/menu.jpg" alt="menu">
									<ul class="price">
										<li><span>Verkocht<i>3,510</i></span></li>
										<li><span>Korting<i>50%</i></span></li>
									</ul>
								</div>
								<div class="right_m">
									<span>€31,75<strong>€15,75</strong></span>
									<b class="up">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</b>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
									<b>Voorgerechten</b>
									<p>This is Photoshop's versionn  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
								</div>
								<div class="end">* This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </div>
								<div class="end2">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh </div>
							</div>
							<div class="pages">
								<a href="#" class="prev2">&lt;</a>
								<ul>
									<li><a href="#">1</a></li>
									<li><a href="#" class="active">2</a></li>
									<li><a href="#">...</a></li>
									<li><a href="#">8</a></li>
								</ul>
								<a href="#" class="next2">&gt;</a>
							</div>
						</div>
						<div id="t3" style="display: none;">
							<div class="info">
								<span>Phone Number</span>
								<strong>123 4567890</strong>
								<span>Betaalwijze</span>
								<strong>Amex, Mastercard, Visa Car, Pin</strong>
								<ul class="cart">
									<li><a href="#"><img src="images/cart1.png" alt="cart"></a></li>
									<li><a href="#"><img src="images/cart2.png" alt="cart"></a></li>
									<li><a href="#"><img src="images/cart1.png" alt="cart"></a></li>
									<li><a href="#"><img src="images/cart2.png" alt="cart"></a></li>
									<li><a href="#"><img src="images/cart1.png" alt="cart"></a></li>
									<li><a href="#"><img src="images/cart2.png" alt="cart"></a></li>
								</ul>
								<span>Dieetwensen</span>
								<strong>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</strong>
								<span>Diensten</span>
								<ul class="diensten">
									<li><a href="#"><img src="images/d1.png" alt="d"><i>af te huren</i></a></li>
									<li><a href="#"><img src="images/d2.png" alt="d"><i>airconditioning</i></a></li>
									<li><a href="#"><img src="images/d3.png" alt="d"><i>Terras</i></a></li>
									<li><a href="#"><img src="images/d4.png" alt="d"><i>Toegankelijk</i></a></li>
									<li><a href="#"><img src="images/d5.png" alt="d"><i>voor rolstoelen</i></a></li>
									<li><a href="#"><img src="images/d6.png" alt="d"><i>wi-fi</i></a></li>
								</ul>
								<span>Gelegenheid</span>
								<strong>Romantisch</strong>
								<span>Gidsen en labels</span>
								<strong>Lorem Ipsum</strong>	
							</div>
							<a href="#" class="more">Een Tafel Reserveren</a>
						</div>
						<div id="t4" style="display: none;">
							<div class="map">
								<h3>London, UK</h3>
								<span>LSE Houghton Street London</span>
								<a href="#">+ 123 1234 567890 | support@website.net | www.website.net</a>
								<img src="images/map.jpg" alt="map">
							</div>
						</div>
						<div id="t5" style="display: none;">
							<div class="news">
								<div class="ob"><img src="images/news.png" alt="news"></div>
								<div class="in">
									<h2>Title</h2>
									<span>01/01/2017, 18:33</span>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent... <a href="#">Read more</a></p>
								</div>
							</div>
							<div class="news">
								<div class="ob"><img src="images/news.png" alt="news"></div>
								<div class="in">
									<h2>Title</h2>
									<span>01/01/2017, 18:33</span>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent... <a href="#">Read more</a></p>
								</div>
							</div>
							<div class="news">
								<div class="ob"><img src="images/news.png" alt="news"></div>
								<div class="in">
									<h2>Title</h2>
									<span>01/01/2017, 18:33</span>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
									<p>Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
									<p>Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
								</div>
							</div>
							<div class="news">
								<div class="ob"><img src="images/news.png" alt="news"></div>
								<div class="in">
									<h2>Title</h2>
									<span>01/01/2017, 18:33</span>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent... <a href="#">Read more</a></p>
								</div>
							</div>
							<div class="news">
								<div class="ob"><img src="images/news.png" alt="news"></div>
								<div class="in">
									<h2>Title</h2>
									<span>01/01/2017, 18:33</span>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent... <a href="#">Read more</a></p>
								</div>
							</div>
							<div class="pages">
								<a href="#" class="prev2">&lt;</a>
								<ul>
									<li><a href="#">1</a></li>
									<li><a href="#" class="active">2</a></li>
									<li><a href="#">...</a></li>
									<li><a href="#">8</a></li>
								</ul>
								<a href="#" class="next2">&gt;</a>
							</div>
						</div>
						<div id="t6" style="display: none;">
							<div class="send">
								<form>
									<label for="name">
										<span>Name</span>
										<input name="name" id="name" placeholder="John Doe" type="text">
									</label>
									<label for="email">
										<span>E-mail</span>
										<input name="email" id="email" placeholder="johndoe@exampl" type="email">
									</label>
									<label for="subject">
										<span>Subject</span>
										<input name="subject" id="subject" placeholder="Lorem ipsum" type="text">
									</label>
									<label for="message">
										<span>Message</span>
										<textarea name="message" id="message" placeholder="This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet. mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo."></textarea>
									</label>
									<input value="SEND" type="submit">
								</form>
							</div>
						</div>
						<div id="t7" style="display: none;">
							<div class="reviews">
								<div class="avatar">
									<div class="wr"><img src="images/a1.png" alt="a"></div>
									<span>John Smith</span>
								</div>
								<div class="rev">
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent.</p>
									<div class="rr">
										<span>01/01/2017, 18:33</span>
										<i><img src="images/stars.png" alt="stars">5.00</i>
									</div>
								</div>
							</div>
							<div class="reviews">
								<div class="avatar">
									<div class="wr"><img src="images/a2.png" alt="a"></div>
									<span>John Smith</span>
								</div>
								<div class="rev">
									<p>This is Photoshop's version  of Lorem Ipsum.</p>
									<div class="rr">
										<span>01/01/2017, 18:33</span>
										<i><img src="images/stars.png" alt="stars">5.00</i>
									</div>
								</div>
							</div>
							<div class="reviews">
								<div class="avatar">
									<div class="wr"><img src="images/a2.png" alt="a"></div>
									<span>John Smith</span>
								</div>
								<div class="rev">
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent.</p>
									<div class="rr">
										<span>01/01/2017, 18:33</span>
										<i><img src="images/stars2.png" alt="stars">4.50</i>
									</div>
								</div>
							</div>
							<div class="reviews">
								<div class="avatar">
									<div class="wr"><img src="images/a3.png" alt="a"></div>
									<span>Susan Doe</span>
								</div>
								<div class="rev">
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
									<div class="rr">
										<span>01/01/2017, 18:33</span>
										<i><img src="images/stars.png" alt="stars">5.00</i>
									</div>
								</div>
							</div>
							<div class="reviews">
								<div class="avatar">
									<div class="wr"><img src="images/a4.png" alt="a"></div>
									<span>Admin</span>
								</div>
								<div class="rev">
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent.</p>
									<div class="rr">
										<span>01/01/2017, 18:33</span>
										<i><img src="images/stars2.png" alt="stars">4.50</i>
									</div>
								</div>
							</div>
							<div class="pages">
								<a href="#" class="prev2">&lt;</a>
								<ul>
									<li><a href="#">1</a></li>
									<li><a href="#" class="active">2</a></li>
									<li><a href="#">...</a></li>
									<li><a href="#">8</a></li>
								</ul>
								<a href="#" class="next2">&gt;</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<!-- <div id="restaurantSteps">
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
				 @nclude('pages/restaurant/menu')
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

	@nclude('pages/restaurant/maps')

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
	</div> -->

	<div class="clear"></div>
	
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5751e9a264890504"></script>
	@endif
@stop