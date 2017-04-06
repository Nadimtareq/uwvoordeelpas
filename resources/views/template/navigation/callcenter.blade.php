 @if ($userCallcenter)
    <div class="item"><h4>Callcenter paneel</h4></div>

    <div class="item"><h5><i class="right arrow tiny icon divider"></i> Algemeen</h5></div>
    
    <a href="{{ url('admin/appointments') }}" class="item"><i class="calendar icon"></i> Afspraken</a>
    <a href="{{ url('admin/companies/callcenter') }}" class="item"><i class="phone icon"></i> Bellijst</a>
    <a href="{{ url('admin/reservations/saldo') }}" class="item"><i class="euro icon"></i> Financieel</a>
@endif