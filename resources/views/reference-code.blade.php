@extends('template.theme')
@inject('affiliate', 'App\Models\Affiliate')
@inject('strHelper', 'App\Helpers\StrHelper')
@section('content')
    <div class="container">
        <div class="ui breadcrumb">
            <a href="{{ url('/') }}" class="section">Home</a>
            <i class="right chevron icon divider"></i>

            <a href="#" class="sidebar open">Menu</a>
            <i class="right chevron icon divider"></i>

            <div class="active section">Mijn voordeelpas</div>
        </div>

        <div class="ui divider"></div>
        <div class="ui grid container">
            <span></span>
            <div class="center floated sixteen wide mobile ten wide computer column">
                uw persoonlijke link&nbsp;
                <div class="ui label">
                    <a href="{{url("source?reference={$reference->reference_code}")}}" id="reference-code">
                        {{ url("source?reference={$reference->reference_code}") }}
                    </a>
                    <a href="javascript:;" class="ui green button mini" data-clipboard-target="#reference-code" id="clipboard">
                        <i class="clipboard icon"></i>
                        kopieer link
                    </a>
                </div>
            </div>
        </div>
        <div class="ui grid container">
            <div class="col-md-12">
                <table class="ui very basic sortable collapsing celled table list" style="width: 100%;">
                    <thead>
                        <tr><th>Naam</th><th>Geslacht</th><th>Telefoon</th><th>E-mailadres</th><th>Geregistreerd op</th></tr>
                    </thead>
                    <tbody>
                        @foreach($friends as $friend)
                            <tr>
                                <td>{{ @$friend->user->name }}</td>
                                <td>
                                    @if($friend->user->gender == 1)
                                        {{ 'Man' }}
                                    @else
                                        {{ 'Vrouw' }}
                                    @endif
                                </td>
                                <td>{{ @$friend->user->phone }}</td>
                                <td>{{ @$friend->user->email }}</td>
                                <td>{{ @$friend->user->created_at->format('d/m/Y h:i A') }}</td>
                            </tr>
                        @endforeach
                        @if(count($friends) == 0 )
                            <tr>
                                <td colspan="5">
                                    Helaas er zijn nog geen personen welke via uw link gekocht hebben.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var clipboard = new Clipboard('#clipboard');
            clipboard.on('success', function(e) {
                e.clearSelection();
            });
        });
    </script>
@stop