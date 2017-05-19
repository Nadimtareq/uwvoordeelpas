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
						<form>
							<label for="search">
								<input type="text" name='search' id='search' placeholder="Voorkeuren" />
							</label>
							<span>OF</span>
							<select name='category' class='category'>
								<option value='0' disabled="disabled" selected>Category</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
							<select name='subcategory' class='subcategory'>
								<option value='0' disabled="disabled" selected>Subcategory</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
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
            <div class="five wide column computer only">
                <div id="cashbackMenu" class="ui secondary fluid dropdown vertical menu">
                    @foreach($categories as $category)
                    @if ($category['countCategoryPrograms'] > 0)
                    <div class="ui simple dropdown item">
                        <i class="dropdown icon"></i>

                        <a href="{{ url('tegoed-sparen/category/'.$category['id'].'/'.$category['slug']) }}">
                            {{ $category['name'] }}
                        </a>

                        <div class="menu">
                            @foreach($category['subcategories'] as $subcategory)
                            @if ($subcategory['name'] != NULL && $subcategory['countSubCategoryPrograms'] >= 1)
                            <a href="{{ url('tegoed-sparen/category/'.$subcategory['id'].'/'.$subcategory['slug']) }}"
                               class="{{ ($subcategory['id'] == Request::segment(3) ? 'active' : '') }} item">
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

            <div id="formList" class="sixteen wide mobile eleven wide computer column">
                <table id="cashbackTable" class="ui very sortable stackable basic table"> 
                    <thead>
                        <tr>
                            <th data-slug="name" class="one wide">Webwinkel</th>
                            <th class="one wide"></th>
                            <th data-slug="commissions" class="one wide">Max. spaartegoed</th>
                            <th class="two wide"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($affiliates as $data)
                        <tr>
                            <td>
                                <a href="{{ url('tegoed-sparen/company/'.$data['slug']) }}">
                                    @if(file_exists(public_path('images/affiliates/'.$data['affiliate_network'].'/'.$data['program_id'].'.'.$data['image_extension']))) 
                                    <img class="ui tiny image" alt="{{ $data['name'] }}" src="{{ asset('images/affiliates/'.$data['affiliate_network'].'/'.$data['program_id'].'.'.$data['image_extension']) }}">
                                    @else
                                    <img class="ui tiny image" alt="{{ $data['name'] }}" src="{{ asset('images/placeholder.png') }}">
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('tegoed-sparen/company/'.$data['slug']) }}">
                                    <h4>{{ $data['name'] }}</h4>
                                </a>
                            </td>
                            <td class="text big">
                                <a href="{{ url('tegoed-sparen/company/'.$data['slug']) }}">
                                    <div class="ui grid">
                                        <div class="mobile only row">
                                            <div class="twelve wide column">
                                                Hoogste vergoeding
                                            </div>

                                            <div class="column">
                                                {{ $data['commissions'] }}
                                            </div>
                                        </div>

                                        <div class="computer tablet only row">
                                            <div class="column">
                                                {{ $data['commissions'] }}
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="clear"></div>
                            </td>
                            <td>
                                @if($userAuth)
                                <a 
                                    href="{{ $affiliateHelper->getAffiliateUrl($data, $userInfo->id) }}" 
                                    class="ui blue no-radius fluid {{ $userInfo->cashback_popup == 0 ? 'cashback' : '' }} logged-in button"
                                    {{ $userInfo->cashback_popup == 1 ? 'target="_blank"' : '' }}>
                                    Bezoek webwinkel
                                </a>
                                @else
                                <a 
                                    href="{{ url('tegoed-sparen/company/'.$data['slug']) }}?open_cashbackinfo=1"
                                    class="ui blue no-radius login fluid cashback button"
                                    data-type="login"
                                    data-redirect="{{ url('tegoed-sparen/company/'.$data['slug']) }}?open_cashbackinfo=1">
                                    Bezoek webwinkel
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  

                <div class="ui grid container">
                    <div class="left floated sixteen wide mobile eleven wide computer column">
                        {!! $affiliates->appends($paginationQueryString)->render() !!}
                    </div>

                    <div class="right floated sixteen wide mobile sixteen wide tablet three wide computer column">
                        <div id="limitSelect">
                            <div class="ui normal floating icon selection fluid dropdown">
                                <i class="dropdown right floated icon"></i>
                                <div class="text">{{ $limit }} resultaten</div>

                                <div class="menu">
                                    <a class="item" href="{{ url(Request::path().'/?'.http_build_query(array_add($queryString, 'limit', '15'))) }}">15</a>
                                    <a class="item" href="{{ url(Request::path().'/?'.http_build_query(array_add($queryString, 'limit', '30'))) }}">30</a>
                                    <a class="item" href="{{ url(Request::path().'/?'.http_build_query(array_add($queryString, 'limit', '45'))) }}">45</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>