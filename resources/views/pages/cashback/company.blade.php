@extends('template.theme')

@inject('preference', 'App\Models\Preference')
@inject('content', 'App\Models\Content')
@inject('affiliateHelper', 'App\Helpers\AffiliateHelper')

{{--*/ $pageTitle = $data->name /*--}}

@section('slider')
<br>
@stop

@section('content')
<div id="companyCashback" class="container">
    <div class="ui breadcrumb">
        <a href="{{ url('/') }}" class="sidebar open">Home</a>
        <i class="right chevron icon divider"></i>

        <a href="{{ url('tegoed-sparen') }}">           
            <div class="ui normal  bread left pointing dropdown item">
                <div class="text">Tegoed sparen</div>

                <div class="menu">
                    @foreach($categories as $category)
                        @if ($category['countCategoryPrograms'] >= 1)
                        <div class="item">
                            <i class="dropdown icon"></i>
                            <a href="{{ url('tegoed-sparen/category/'.$category['id'].'/'.$category['slug']) }}" class="text">
                                 {{ $category['name'] }}
                            </a>

                            <div class="menu">
                                @foreach($category['subcategories'] as $subcategory)
                                    @if ($subcategory['countSubCategoryPrograms'] >= 1)
                                    <a href="{{ url('tegoed-sparen/category/'.$subcategory['id'].'/'.$subcategory['slug']) }}"
                                        class=" item">
                                         {{ $subcategory['name'] }}
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </a>

        <i class="right chevron icon divider"></i>
        <span class="active section"><h1>{{ $data->name }}</h1></span>

    </div>

    <div class="ui divider"></div>

    <div class="ui grid">
        <div class="row">
            <div class="sixteen wide mobile seven wide tablet four wide computer column">
                @if ($userAuth)
                <a  id="cashbackLogo"
                    href="{{ $affiliateHelper->getAffiliateUrl($data, $userInfo->id) }}" 
                    class="ui no-radius {{ $userInfo->cashback_popup == 0 ? 'cashback' : '' }} logged-in button"
                    {{ $userInfo->cashback_popup == 1 ? 'target="_blank"' : '' }}>
                     @if(file_exists(public_path('images/affiliates/'.$data->affiliate_network.'/'.$data->program_id.'.'.$data->image_extension))) 
                        <img  class="ui image" src="{{ url('images/affiliates/'. $data->affiliate_network .'/'.$data->program_id.'.'.$data->image_extension) }}" />
                    @else
                <i class="huge circular question mark icon"></i>
                    @endif
                </a>
                @else
                <a
                    id="cashbackLogo"
                    href="{{ url('tegoed-sparen/company/'.$data->slug) }}?open_cashbackinfo=1"
                    class="ui no-radius login cashback button"
                    data-type="login"
                    data-redirect="{{ url('tegoed-sparen/company/'.$data->slug) }}?open_cashbackinfo=1">
                    <img  class="ui image" src="{{ url('images/affiliates/'. $data->affiliate_network .'/'.$data->program_id.'.'.$data->image_extension) }}" />
                </a>
                @endif

                @if ($userAuth)
                    <a id="visiteStore"
                        href="{{ $affiliateHelper->getAffiliateUrl($data, $userInfo->id) }}"
                        class="ui blue no-radius {{ $userInfo->cashback_popup == 0 ? 'cashback' : 'cashback' }} logged-in fluid button"
                        {{ $userInfo->cashback_popup == 1 ? 'target="_blank"' : '' }}>
                        Bezoek webwinkel
                    </a>
                    <br />

                    @if ($favoriteCompany >= 1)
                    <a  id="visiteStore"
                        href="{{ url('tegoed-sparen/delete-favorite/'.$data->id.'/'.$data->slug) }}"
                        class="ui fluid button">
                        Verwijder favoriet
                    </a>
                    @else
                    <a  id="visiteStore"
                        href="{{ url('tegoed-sparen/favorite/'.$data->id.'/'.$data->slug) }}"
                        class="ui yellow fluid button">
                        Bewaren
                    </a>
                    @endif
                @else
                <a  id="visiteStore"
                    href="{{ url('tegoed-sparen/company/'.$data->slug) }}?open_cashbackinfo=1"
                    class="ui blue no-radius login cashback fluid button"
                    data-type="login"
                    data-redirect="{{ url('tegoed-sparen/company/'.$data->slug) }}?open_cashbackinfo=1">
                    Bezoek webwinkel
                </a>
                @endif
                <br />

                <div class="clear"></div>

            </div>

            <div class="sixteen wide mobile six wide tablet six wide computer column">
                <h4 class="ui header thin">Wat u kunt sparen</h4>

                @if(trim($data->compensations) != '')
                <div class="ui divided selection list">
                    @foreach($affiliateHelper->commissionUnique(json_decode($data->compensations)) as $key => $commission)

                        @if($commission['value'] > 0 && !isset($commission['noshow']))
                          @if($userAuth)
                            <a
                                href="{{ $affiliateHelper->getAffiliateUrl($data, $userInfo->id) }}"
                                class="ui blue no-radius {{ $userInfo->cashback_popup == 0 ? 'cashback' : '' }} item logged-in"
                                data-redirect="{{ url('tegoed-sparen/company/'.$data->slug) }}?open_cashbackinfo=1"
                                {{ $userInfo->cashback_popup == 1 ? 'target="_blank"' : '' }}>
                                <div class="ui tag blue label">

                                {{ $affiliateHelper->amountAsUnit($commission['value'], $commission['unit']) }}
                                </div>&nbsp;
                                <strong>{{ $commission['name'] }}</strong>
                            </a>
                            @else
                            <a
                                id="cashbackLogo"
                                href="{{ url('tegoed-sparen/company/'.$data->slug) }}?open_cashbackinfo=1"
                                class="ui blue no-radius item login cashback item"
                                data-type="login"
                                data-redirect="{{ url('tegoed-sparen/company/'.$data->slug) }}?open_cashbackinfo=1">
                                <div class="ui tag blue label">
                                {{ $commission['unit'] != '%' ? '&euro;' : '' }}{{ round($commission['value'] / 100 * 70, 2)  }}{{ $commission['unit'] == '%' ? '%' : '' }}
                                </div>&nbsp;
                                <strong>{{ $commission['name'] }}</strong>
                            </a>
                            @endif
                        @endif
                    @endforeach
                </div>
                @endif
            </div>

            <div class="sixteen wide mobile five wide tablet five wide computer column">
                <h4>Voorwaarden</h4>
                {!! $data->terms !!}
                {!! isset($contentBlock[20]) ? $contentBlock[20] : '' !!}
            </div>
        </div>
    </div>

    <div  id="listItems" class="ui four column centered grid">
        <div class="text aligned center column">
            <div class="ui mini image">
                <img src="{{ url('images/2.png ')}}"
                     alt="Dit is de tijd tussen je aankoop en het moment dat je van ons de bevestiging krijgt"
                     data-content="Dit is de tijd tussen je aankoop en het moment dat je van ons de bevestiging krijgt" />
            </div>
            <div class="clear"></div>

            {{ trim($data->time_duration_confirmed) != '' ? $data->time_duration_confirmed : '10 dagen' }}
        </div>

        <div class="text aligned center column">
            <div class="ui mini image">
                <img src="{{ url('images/3.png ')}}"
                     alt="Houdt het gemiddelde % bij van alle sales van {{ $data->name }} / het aantal goedgekeurde transacties."
                     data-content="Houdt het gemiddelde % bij van alle sales van {{ $data->name }} / het aantal goedgekeurde transacties." />
            </div>
            <div class="clear"></div>

            {{ trim($data->percent_sales) != '' ? $data->percent_sales : '95%' }}
        </div>

        <div class="text aligned center column">
            <div class="ui mini image">
                <img src="{{ url('images/4.png')}}" alt="Houdt het gemiddeld aantal dagen bij, van het moment dat wij de transactie binnen krijgen tot storting van het geld." data-content="Houdt het gemiddeld aantal dagen, van moment dat we transactie binnen krijgen tot storting geld." />
            </div>
            <div class="clear"></div>
            {{ $data->tracking_duration }}
        </div>

        <div class="text aligned center column">
            <a href="{{ url('faq?q=tegoed') }}">
                <img src="{{ url('images/6.png ')}}"
                    alt="Klik hier om naar de F.A.Q. te gaan" 
                    data-content="Klik hier om naar de F.A.Q. te gaan" />
            </a>
            <div class="clear"></div>

            <a href="{{ url('faq?q=tegoed') }}" class="extra">Vragen?</a>
        </div>
    </div>

    <div class="clear"></div>
</div><br>
@include('pages/cashback/companies')
@stop