@extends('template.theme')

@section('scripts')
    @include('admin.template.remove_alert')
@stop

@section('content')
<div class="content">
    @include('admin.template.breadcrumb')
    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/reviews/insert'.(trim(Request::segment(3)) != '' ? '/'.Request::segment(3) : ''), 'method' => 'post')) ?>
		<div class="row" />
			<div class="col-lg-12">
				<h3>Bedrijf</h3>
				<div class="col-lg-6">
					<div class="form-group">
						<select  class="form-control ui normal dropdown" name="resturant" id="resturant" style="width:100%	">
						<option value="">Select Please Company</option>
						@foreach($company as $comp)
							<option value="{{ $comp['id'] }}">{{ $comp['name'] }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<input type="text" name="couverts" id="couverts" placeholder="Berlage link from couverts.nl" />
				</div>
				<div class="col-lg-6">
					<input type="text" name="dinningcity" id="dinningcity" placeholder="Berlage link from dinningcity.nl" />
				</div>
				<div class="col-lg-6">
					<input type="text" name="tripadvisor" id="tripadvisor" placeholder="Berlage link from tripadvisor.nl" />
				</div>
				<div class="col-lg-6">
					<input type="text" name="seatme" id="seatme" placeholder="Berlage link from seatme.nl" />
				</div>
				<div class="col-lg-6">
					<input type="text" name="facebook" id="facebook" placeholder="Berlage Facebook credentials" />
				</div>
				<div class="col-lg-6">
					<input type="text" name="google" id="google" placeholder="Berlage Google credentials" />
				</div>
				<div class="col-lg-12">
					<input type="submit" name="save" id="save" class="btn" value="ADD" />
				</div>
			</div>
		</div>
    <?php echo Form::close(); ?>


</div>
<div class="clear"></div>

@stop