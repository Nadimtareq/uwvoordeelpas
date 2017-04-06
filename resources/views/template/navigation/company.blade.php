@inject('companyReservation', 'App\Models\CompanyReservation')

@if (count($userCompanies) >= 1)
	@foreach($userCompanies as $company)
		<a href="{{ url('admin/companies/update/'.$company->id.'/'.$company->slug) }}" class="item"><strong>{{ $company->name }}</strong></a>

	    <div class="item"><h5><i class="right arrow tiny icon divider"></i> Reserveringen</h5></div>
		<a href="{{ url('admin/reservations/clients/'.$company->id) }}" class="item"><i class="food icon"></i> Reserveringen</a>
	    <a href="{{ url('admin/reservations-options/'.$company->slug) }}" class="item"><i class="selected radio icon"></i> Aanbiedingen</a>
		<a href="{{ url('admin/reservations/saldo/'.$company->slug) }}" class="item"><i class="euro icon"></i> Financieel</a>
		<a href="{{ url('admin/reservations/update/'.$company->id) }}" class="item"><i class="food icon"></i> Instellingen</a>

		<a href="{{ url('admin/companies/update/'.$company->id.'/'.$company->slug) }}" class="item"><i class="building icon"></i> Bedrijfsgegevens</a>
		<a href="{{ $userAdmin ? url('admin/users') : url('admin/guests/'.$company->slug) }}" class="item"><i class="users icon"></i> Gasten</a>

		<a href="{{ url('admin/invoices/overview/'.$company->slug) }}" class="item"><i class="euro icon"></i> Facturen</a>
		<a href="{{ url('admin/barcodes/'.$company->slug) }}" class="item"><i class="barcode icon"></i> Barcodes</a>
		<a href="{{ url('admin/reviews/'.$company->slug) }}" class="item"><i class="thumbs up icon"></i> Recensies</a>
		<a href="{{ url('admin/news/'.$company->slug) }}" class="item"><i class="newspaper icon"></i> Nieuwsberichten</a>
		<a href="{{ url('admin/mailtemplates/'.$company->slug) }}" class="item"><i class="announcement icon"></i> Meldingen</a>
		<a href="{{ url('admin/widgets/'.$company->slug) }}" class="item"><i class="block layout icon"></i> Widgets</a>
		
		<a href="{{ url('admin/companies/contract/'.$company->id.'/'.$company->slug) }}" target="_blank" class="item"><i class="file pdf outline icon"></i> Contract</a>
	@endforeach
@endif

@if (isset($userCompaniesWaiter) && count($userCompaniesWaiter) >= 1)
	@foreach($userCompaniesWaiter as $company)
		<a href="{{ url('admin/companies/update/'.$company->slug) }}" class="item"><strong>{{ $company->name }}</strong></a>

		<a href="{{ url('admin/reservations/clients/'.$company->id) }}" class="item"><i class="food icon"></i> Reserveringen</a>
		<a href="{{ url('admin/reviews/'.$company->slug) }}" class="item"><i class="thumbs up icon"></i> Recensies</a>
	@endforeach
@endif