@extends('template.iframe')
<div class="container">
	@foreach($resturant_review as $review)
	<div class="row review">
		<div class="col-xs-1">
			<div class="avatar">
				@if($iframe['user_image']!="")
					<img src="{{url('/')}}/images/iframeuser/{{$iframe['user_image']}}" style="max-width: 100%;"/>
				@else
					<i class="fa fa-user-circle" style="margin: 0 5px 0 0;"></i>
				@endif
			</div>
		</div>
		<div class="col-xs-11">
			<div class="bubble">
				<div class="arrow-left-border"></div>
				<div class="arrow-left"></div>
				<div class="row">
					<div class="col-xs-2">
						<div class="stars">
							@if((ceil($review['service']/2))>=1)
							<i class="star_color fa fa-star"></i>
							@else
							<i class="star_color fa fa-star-o"></i>
							@endif
							@if((ceil($review['service']/2))>=2)
							<i class="star_color fa fa-star"></i>
							@else
							<i class="star_color fa fa-star-o"></i>
							@endif
							@if((ceil($review['service']/2))>=3)
							<i class="star_color fa fa-star"></i>
							@else
							<i class="star_color fa fa-star-o"></i>
							@endif
							@if((ceil($review['service']/2))>=4)
							<i class="star_color fa fa-star"></i>
							@else
							<i class="star_color fa fa-star-o"></i>
							@endif
							@if((ceil($review['service']/2))>=5)
							<i class="star_color fa fa-star"></i>
							@else
							<i class="star_color fa fa-star-o"></i>
							@endif
						</div>
					</div>
					<div class="col-xs-7">
						<span class="grey-text" style="color:{{$iframe['title_color']}};font-size:{{$iframe['title_font_size']}}">{{$review['name']}}</span>
					</div>
					<div class="col-xs-3 text-right">
						<span class="grey-text">{{date('d F Y',strtotime($review['created_at']))}}</span>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-10" style="font-size:{{$iframe['text_font_size']}}">
					{!!$review['content']!!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<br />
	@endforeach
</div>
<style>
.star_color{
	color:{{$iframe['star_color']}};
}
.review .avatar {
  background-clip: padding-box;
  border-radius: 100%;
  font-size: 40px;
  height: 50px;
  margin-top: 10px;
  overflow: hidden;
  width: 50px;
}
.review .bubble {
  background-clip: padding-box;
  background-color: #fff;
  border: {{$iframe['border_size']}}px {{$iframe['border_style']}} {{$iframe['border_color']}};
  border-radius: 3px;
  font-family:'{{$iframe['font_family']}}';
  cursor: default;
  padding: 20px;
  position: relative;
  color:{{$iframe['text_color']}}
}
.review .bubble .arrow-left-border {
  border-bottom: 11px solid transparent;
  border-right: 11px solid {{$iframe['border_color']}};
  border-top: 11px solid transparent;
  bottom: auto;
  height: 0;
  left: -11px;
  position: absolute;
  right: auto;
  top: 14px;
  width: 0;
}
</style>
