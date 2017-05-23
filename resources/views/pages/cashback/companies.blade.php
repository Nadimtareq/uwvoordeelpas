@inject('affiliateHelper', 'App\Helpers\AffiliateHelper')

@if (Request::has('category') OR Request::has('subcategory') OR Request::segment(2) == 'category')
<script type="text/javascript">
    var activateAjax = 'searchCashback';
</script>
@endif

{{--*/ $pageTitle = 'Tegoed sparen' /*--}}

<div id="affiliateSearchBar" class="ui padded grid">
    <div class="blue column">
        <div class="container">
            <div class="ui grid">
                <div class="form">
                    <div class="container container2">
                        <form action="<?php echo url('tegoed-sparen/search'); ?>" method="GET">
                            <div id="affiliateSearch-2" class="ui search">
                                <label for="search">
                                    <input class="prompt" type="text" name="q" placeholder="Voorkeuren" />
                                </label>
                                <div class="results"></div>
                            </div>
                            <span class="of">OF</span>
                            <select name='category' class='category'>
                                <option value='0' disabled="disabled" selected>Category</option>
                                @foreach($categories as $category)
                                @if ($category['countCategoryPrograms'] > 0)
                                <option value="{{ $category['slug'] }}">{{ $category['name'] }}</option>
                                @endif
                                @endforeach
                            </select>
                            <select name='subcategory' class='subcategory'>
                                <option value='0' disabled="disabled" selected>Subcategory</option>
                            </select>
                            <input type="submit" value='FIND' />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div><br />

<div class="clear"></div>

@if (isset($mediaItems))
@foreach($mediaItems as $id => $ad)
<div class="leaderboard">
    <a href="{{ $page ? url($page->slug) : '' }}">
        <img src="{{ url(''.$ad->getUrl()) }}" class="ui image">
    </a>
</div>
@endforeach
@endif

<div class="container">
    <div class="ui grid">
        <div class="row">
            <div class="left-sidebar">
                @foreach($categories as $i => $category)
                @if ($category['countCategoryPrograms'] > 0)
                <section class="ac-container">
                    <div>
                        <input id="ac-{{$i}}" name="accordion-1" type="checkbox" />
                        <label for="ac-{{$i}}">{{ $category['name'] }}</label>
                        <article class="ac-small">
                            @foreach($category['subcategories'] as $subcategory)
                            @if ($subcategory['name'] != NULL && $subcategory['countSubCategoryPrograms'] >= 1)
                            <a href="{{ url('tegoed-sparen/category/'.$subcategory['id'].'/'.$subcategory['slug']) }}" class="{{ ($subcategory['id'] == Request::segment(3) ? 'active' : '') }} item">
                                {{ $subcategory['name'] }}
                            </a>
                            @endif
                            @endforeach
                        </article>
                    </div>
                    <div>
                </section>
                @endif
                @endforeach
            </div>

            <div class="right-content">
                <div class="sort">
                    <span class='ls'>Sort by:</span>
                    <select>
                        <option value='0' disabled="disabled" selected>Max. spaartegoed</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                    <div class="r">
                        <span class='rs'>View</span>
                        <a href="#s1"><img src="images/one.png" alt="one" /></a>
                        <a href="#s2"><img src="images/two.png" alt="two" /></a>
                    </div>
                </div>
                <div class="tabs-content">
                    <ul class='lines' id='s2'>
                        @foreach($affiliates as $data)
                        <li>
                            <span class="wrap"><img src="{{ asset('images/affiliates/'.$data['affiliate_network'].'/'.$data['program_id'].'.'.$data['image_extension']) }}" alt="{{ $data['name'] }}" /></span>
                            <div class="t"><i>{{ $data['name'] }}<strong>{{ $data['commissions'] }}</strong></i>
                            </div>
                            <a href="{{ url('tegoed-sparen/company/'.$data['slug']) }}">{{ $data['name'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <ul class='box' id='s1'>
                        @foreach($affiliates as $data)
                        <li><a href="{{ url('tegoed-sparen/company/'.$data['slug']) }}"><span class="wrap"><img src="{{ asset('images/affiliates/'.$data['affiliate_network'].'/'.$data['program_id'].'.'.$data['image_extension']) }}" alt="{{ $data['name'] }}" /><b>{{ $data['name'] }}</b></span>
                                <p>{{ $data['name'] }}<strong>{{ $data['commissions'] }}</strong></p></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="pages">
                    {!! $affiliates->appends($paginationQueryString)->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>