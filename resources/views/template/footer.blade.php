<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-footer">
					<span class="line"></span>					
					<div class="col-sm-3">
						{!! isset($contentBlock[4]) ? $contentBlock[4] : '' !!}
						@if(isset($pageLinks[1]))
						<ul>
							<li><h3><i class="fa fa-caret-down" aria-hidden="true"></i>  Leden</h3></li>
							@foreach ($pageLinks[1] as $data)
							    <li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
							@endforeach
						</ul>
						@endif
						<div class="clear"></div>
					</div>
					
					<div class="col-sm-3">
					    {!! isset($contentBlock[5]) ? $contentBlock[5] : '' !!}
					    @if(isset($pageLinks[2]))
						<ul>
							<li><h3><i class="fa fa-caret-down" aria-hidden="true"></i>  Bedrijven</h3></li>
						    @foreach ($pageLinks[2] as $data)
								<li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
							@endforeach
						</ul>
						@endif
						<div class="clear"></div>
					</div>
					
					<div class="col-sm-3">
						{!! isset($contentBlock[6]) ? $contentBlock[6] : '' !!}
						@if(isset($pageLinks[3]))
						<ul>
							<li><h3><i class="fa fa-caret-down" aria-hidden="true"></i>  Algemeen</h3></li>
							@foreach ($pageLinks[3] as $data)
								<li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
							@endforeach

						</ul>
						@endif
						<div class="clear"></div>
					</div>
					
					<div class="col-sm-3">
						{!! isset($contentBlock[7]) ? $contentBlock[7] : '' !!}
						@if(isset($pageLinks[4]))
						<ul>
							<li><h3><i class="fa fa-caret-down" aria-hidden="true"></i>  Voorwaarden</h3></li>
							   @foreach ($pageLinks[4] as $data)
									<li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
                               @endforeach
						</ul>
						@endif
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- ./container end-->
	</footer>