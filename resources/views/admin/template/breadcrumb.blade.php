<div class="ui padded breadcrumb">
    <a href="#" class="sidebar open">Menu</a>
    <i class="right chevron icon divider"></i>

    @if(isset($section) && trim($section) != '')
    <a href="{{ url((isset($noAdmin) ? '' : 'admin/').$slugController.(isset($slugParam) ? $slugParam : '')) }}">
        <div class="ui normal sbottom left pointing  scrolling dropdown bread">

            <div class="text">{{ $section }}</div>

            @if (!isset($noAdmin))
            <div class="menu">
                @if($userCompanies)
                     @include('template/navigation/company')
                @endif
                
                @include('template/navigation/admin')
            </div>
            @endif
        </div>
    </a>

    <i class="right chevron icon divider"></i>
    @endif

    @if(isset($currentPage))
    <div class="active section">{{ $currentPage }}</div>
    @endif
</div>

<div class="ui divider"></div>