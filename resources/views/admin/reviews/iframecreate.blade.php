@extends('template.theme')

@section('scripts')
    @include('admin.template.remove_alert')
@stop

@section('content')
    <link href="//cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css" rel="stylesheet">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../../../public/js/bootstrap-colorpicker.js"></script>
    <link href="../../../public/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<div class="content">
    @include('admin.template.breadcrumb')
    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/reviews/createiframe'.(trim(Request::segment(4)) != '' ? '/'.Request::segment(4) : ''), 'method' => 'post','enctype'=>'multipart/form-data')) ?>
		
			<div class="col-lg-12">
				<h3>Bedrijf</h3>
				
					@if(!empty($iframe['resturant_url']))
						<div class="row" >
							<div class="col-lg-12 ui form" style="padding-bottom:15px">
								<textarea class="form-control" style="width:100%" id="copyToClipboard"><iframe width="1000px"  height="1000px" url="{!!url('/')!!}/admin/reviews/iframecall/<?php echo Request::segment(4);?>"></iframe></textarea>
								<a class="ui green button mini" href="javascript:void(0)" onclick="copyToClipboard('copyToClipboard')">Copy clipboard</a>
								<a class="ui green button mini" href="" style="float:right" >voorbeeld</a>
							</div>
						</div>
					@endif
				<div class="row" >
					<div class="col-lg-6">
						<div class="form-group">
							<label class="screen_label">Select Restuarant:</label>
							<select  class="form-control ui normal dropdown" name="resturant_url" id="resturant_url" style="width:100%	">
							<option value="">Select Please Restuarant</option>
							@foreach($company as $comp)
								<option 
									@if(!empty($iframe['resturant_url']) && ($iframe['resturant_url']==$comp['id'])) 
										selected="selected" 
									@endif
									value="{{ $comp['id'] }}">{{ $comp['name'] }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="screen_label">Title Color:</label>
							@if(!empty($iframe['title_color']))
							<input type="text" class="screen_color form-control" style="position:relitive" name="title_color" id="title_color" value="{{$iframe['title_color']}}">
							@else
							<input type="text" class="screen_color form-control" style="position:relitive" name="title_color" id="title_color" value="">
							@endif
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-lg-6">
						<div class="form-group">
							<label class="screen_label">Font Family:</label>
							<select  class="form-control ui normal dropdown" name="font_family" id="font_family" style="width:100%	">
								<option value="">Font Family</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="fantasy") ) selected="selected" @endif value="fantasy">fantasy</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="cursive") ) selected="selected" @endif value="cursive">cursive</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="Verdana") ) selected="selected" @endif value="Verdana">Verdana</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="Times New Roman") ) selected="selected" @endif value="Times New Roman">Times New Roman</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="Lucida Console") ) selected="selected" @endif value="Lucida Console">Lucida Console</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="Georgia") ) selected="selected" @endif value="Georgia">Georgia</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="Arial") ) selected="selected" @endif value="Arial">Arial</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="serif") ) selected="selected" @endif value="serif">serif</option>
								<option @if(!empty($iframe['font_family']) && ($iframe['font_family']=="sans-serif") ) selected="selected" @endif value="sans-serif">sans-serif</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="screen_label">Star Color:</label>
							@if(!empty($iframe['star_color']))
							<input type="text" class="screen_color" name="star_color" id="star_color" value="{{$iframe['star_color']}}">
							@else
							<input type="text" class="screen_color" name="star_color" id="star_color" value="#000000">
							@endif
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-lg-6">
						
						<div class="form-group">
							<label class="screen_label">Border Size:</label>
							<select  class="form-control ui normal dropdown" name="border_size" id="border_size" style="width:100%	">
								<option @if(!empty($iframe['border_size']) && ($iframe['border_size']=="0") ) selected="selected" @endif value="0">Select Size</option>
								<option @if(!empty($iframe['border_size']) && ($iframe['border_size']=="1") ) selected="selected" @endif value="1">1PX</option>
								<option @if(!empty($iframe['border_size']) && ($iframe['border_size']=="2") ) selected="selected" @endif value="2">2PX</option>
								<option @if(!empty($iframe['border_size']) && ($iframe['border_size']=="3") ) selected="selected" @endif value="3">3PX</option>
								<option @if(!empty($iframe['border_size']) && ($iframe['border_size']=="4") ) selected="selected" @endif value="4">4PX</option>
								<option @if(!empty($iframe['border_size']) && ($iframe['border_size']=="5") ) selected="selected" @endif value="5">5PX</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="screen_label">Border Color:</label>
							@if(!empty($iframe['border_color']))
							<input type="text" class="screen_color" name="border_color" id="border_color" value="{{$iframe['border_color']}}">
							@else
							<input type="text" class="screen_color"  name="border_color" id="border_color"  value="#ffffff">
							@endif
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-lg-6">
						
						<div class="form-group">
							<label class="screen_label">Border Style:</label>
							<select  class="form-control ui normal dropdown" name="border_style" id="border_style" style="width:100%	">
								<option value="">Select Style</option>
								<option @if(!empty($iframe['border_style']) && ($iframe['border_style']=="border_style") ) selected="selected" @endif value="border_style">dotted</option>
								<option @if(!empty($iframe['border_style']) && ($iframe['border_style']=="dashed") ) selected="selected" @endif value="dashed">dashed</option>
								<option @if(!empty($iframe['border_style']) && ($iframe['border_style']=="solid") ) selected="selected" @endif value="solid">solid</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="screen_label">Text Color:</label>
							@if(!empty($iframe['text_color']))
							<input type="text" class="screen_color" name="text_color" id="text_color" value="{{$iframe['text_color']}}">
							@else
							<input type="text" class="screen_color" name="text_color" id="text_color " value="#01CC67">
							@endif
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-lg-6">
						
						<div class="form-group">
							<label class="screen_label">Titile Size:</label>
							<select  class="form-control ui normal dropdown" name="title_font_size" id="title_font_size" style="width:100%	">
								<option value="">Select Size</option>
								@for($i=1;$i<51;$i++)
								<option  @if(!empty($iframe['title_font_size']) && ($iframe['title_font_size']==$i) ) selected="selected" @endif value="{{$i}}">{{$i}}PX</option>
								@endfor
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="screen_label">Text size:</label>
							<select  class="form-control ui normal dropdown" name="text_font_size" id="text_font_size" style="width:100%	">
								<option value="">Select Size</option>
								@for($i=1;$i<51;$i++)
								<option @if(!empty($iframe['text_font_size']) && ($iframe['text_font_size']==$i) ) selected="selected" @endif value="{{$i}}">{{$i}}PX</option>
								@endfor
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						@if(!empty($iframe['resturant_url']))
						<input type="submit" name="save" id="save" class="btn" value="update" style="width: 181px">
						@else
						<input type="submit" name="save" id="save" class="btn" value="Create" style="width: 181px">
						@endif
					</div>
				</div>
			</div>
    <?php echo Form::close(); ?>


</div>
<div class="clear"></div>
      <script>
	  function copyToClipboard(element) {
		  alert("ds");
		  var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val($(element).text()).select();
		  document.execCommand("copy");
		  $temp.remove();
		}
          $(function () {
              $('#font_color').colorpicker();
          });
      </script>

@stop