 @if($userAdmin)
    <div class="item"><h4>Administratiepaneel</h4></div>

    <div class="item"><h5><i class="right arrow tiny icon divider"></i> Statistieken</h5></div>

    <a href="{{ url('admin/statistics/reservations') }}" class="item"><i class="bar chart icon"></i> Reserveringen</a>
    <a href="{{ url('admin/statistics/search') }}" class="item"><i class="search icon"></i> Zoekwoorden</a>

    <div class="item"><h5><i class="right arrow tiny icon divider"></i> Algemeen</h5></div>
    <a href="{{ url('admin/translations') }}" class="item"><i class="flag icon"></i> Talen</a>
    <a href="{{ url('admin/affiliates') }}" class="item"><i class="euro icon"></i> Affiliaties</a>
    <a href="{{ url('admin/companies') }}" class="item"><i class="building icon"></i> Bedrijven</a>
    <a href="{{ url('admin/companies/callcenter') }}" class="item"><i class="phone icon"></i> Bellijst</a>
    <a href="{{ url('admin/users') }}" class="item"><i class="users icon"></i> Gebruikers</a>
    <a href="{{ url('admin/bans') }}" class="item"><i class="ban icon"></i> Waarschuwingen</a>
    <a href="{{ url('admin/roles') }}" class="item"><i class="lock icon"></i> Rollen</a>
    <a href="{{ url('admin/barcodes') }}" class="item"><i class="barcode icon"></i> Barcodes</a>
    <a href="{{ url('admin/services') }}" class="item"><i class="wrench icon"></i> Diensten</a>
    <a href="{{ url('admin/preferences') }}" class="item"><i class="settings text outline icon"></i> Voorkeuren</a>
    <a href="{{ url('admin/reviews') }}" class="item"><i class="thumbs up icon"></i> Recensies</a>
    <a href="{{ url('admin/widgets') }}" class="item"><i class="block layout icon"></i> Widgets</a>

    <div class="item"><h5><i class="right arrow tiny icon divider"></i> Reserveringen</h5></div>
    <a href="{{ url('admin/reservations/clients') }}" class="item"><i class="food icon"></i> Bedrijven</a>
    <a href="{{ url('admin/reservations/emails') }}" class="item"><i class="envelope icon"></i> E-mails</a>
    <a href="{{ url('admin/reservations-options') }}" class="item"><i class="selected radio icon"></i> Aanbiedingen</a>

    <div class="item"><h5><i class="right arrow tiny icon divider"></i> Financieel</h5></div>

    <a href="{{ url('admin/reservations/saldo') }}" class="item"><i class="calculator icon"></i> Financieel</a>
    <a href="{{ url('admin/invoices') }}" class="item"><i class="file text outline icon"></i> Facturen</a>
    <a href="{{ url('admin/incassos') }}" class="item"><i class="legal icon"></i> Incasso</a>
    <a href="{{ url('admin/transactions') }}" class="item"><i class="money icon"></i> Transacties</a>
    <a href="{{ url('admin/payments') }}" class="item"><i class="euro icon"></i> Betalingen</a>

    <div class="item"><h5><i class="right arrow tiny icon divider"></i> Website</h5></div>

    <a href="{{ url('admin/settings') }}" class="item"><i class="settings icon"></i> Instellingen</a>
    <a href="{{ url('admin/newsletter') }}" class="item"><i class="newspaper icon"></i> Nieuwsbrief</a>
    <a href="{{ url('admin/appointments') }}" class="item"><i class="calendar icon"></i> Afspraken</a>
    <a href="{{ url('admin/notifications') }}" class="item"><i class="announcement icon"></i> Notificaties</a>
    <a href="{{ url('admin/notifications/groups') }}" class="item"><i class="announcement icon"></i> Notificatie groepn</a>
    <a href="{{ url('admin/news') }}" class="item"><i class="newspaper icon"></i> Nieuwsberichten</a>
    <a href="{{ url('admin/pages') }}" class="item"><i class="file outline icon"></i> Pagina's</a>
    <a href="{{ url('admin/contents') }}" class="item"><i class="file text outline icon"></i> Tekstblokken</a>
    <a href="{{ url('admin/faq') }}" class="item"><i class="question mark icon"></i> Veelgestelde vragen</a>
    <a href="{{ url('admin/mailtemplates') }}" class="item"><i class="announcement icon"></i> Meldingen</a>
@endif