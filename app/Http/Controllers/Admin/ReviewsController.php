<?php
namespace App\Http\Controllers\Admin;

use Alert;
use App;
use App\Models\SearchHistory;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Company;
use Sentinel;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Redirect;
use Sunra\PhpSimple\HtmlDomParser;


class ReviewsController extends Controller 
{
    public function __construct()
    {
        $this->slugController = 'reviews';
        $this->section = 'Recencies';
        $this->companies = Company::all();
    }
	public function scraping(){
		$file_name = 'https://www.diningcity.nl/restaurant/9746-bistrobar-berlin-nijmegen#reviews-tab';
		$html = HtmlDomParser::file_get_html( $file_name, false,null, 0 );
				
		$i=0;
		$reviews = array();
		foreach($html->find('div.medium-10medium-offset-1 div.description') as $e){
			$reviews[$i]['review'] =  "<strong style='font-weight:bold'><i class='fa fa-copyright'></i> Diningcity</strong> ".trim($e->innertext);
			$i++;
		}
		$i = 0;
		foreach($html->find('div.medium-10medium-offset-1 div.medium-5 h3') as $e){
			$reviews[$i]['name'] =  trim($e->innertext);
			$i++;
		}
		$i = 0;
		foreach($html->find('div.medium-10medium-offset-1 div.description-rating') as $e){
			$value = explode(':',trim($e->innertext));
			
			preg_match_all('!\d+!', $value[1], $matches);
			$eat = $matches[0][0];
			preg_match_all('!\d+!', $value[2], $matches);
			$service = $matches[0][0];
			$feer = $value[3];
			
			
			$reviews[$i]['rating'] =  array('eat'=>$eat,'service' => $service,'feer'=>$feer);
			$i++;
		}
		/*
		$i = 0;
		foreach($html->find('div.medium-10medium-offset-1 div.medium-12 span.reviewer') as $e){
			$reviews[$i]['company'] =  trim($e->innertext);
			$i++;
		}*/
		$i = 0;
		foreach($html->find('div.medium-10medium-offset-1 div.medium-12 span.review-date span') as $e){
			
			$reviews[$i]['date'] =  trim($e->attr['datetime']);
			$i++;
		}
		$k = $i;
		$url = 'https://www.couverts.nl/restaurant/eindhoven/berlage';

		//$content = file_get_contents($url);
		$html = HtmlDomParser::file_get_html( $url, false,null, 0 );
		$i=$k;
		foreach($html->find('div.l-text-container div.m-lees-meer') as $e){
			$reviews[$i]['review'] =  "<strong style='font-weight:bold'><i class='fa fa-copyright'></i> Couverts</strong> ".trim($e->innertext);
			$i++;
		}
		$i=$k;
		foreach($html->find('div.l-text-container div.review-header div.review-waardering em[itemprop="author"]') as $e){
			$reviews[$i]['name'] =  trim($e->innertext);
			$i++;
		}
		$i=$k;
		foreach($html->find('div.l-text-container div.review-header div.review-waardering em.cijfer-gemiddeld') as $e){
			$reviews[$i]['rating'] =  array('eat'=>str_replace(',','.',$e->innertext),'service' => str_replace(',','.',$e->innertext),'feer'=>str_replace(',','.',$e->innertext));
			$i++;
		}
		$i=$k;
		foreach($html->find('div.l-text-container div.review-header div.review-datum') as $e){
			$reviews[$i]['date'] =  trim($e->innertext);
			$i++;
		}
		$k = $i;
		$url = 'https://www.tripadvisor.nl/Restaurant_Review-g188582-d746197-Reviews-or10-De_Vooruitgang-Eindhoven_North_Brabant_Province.html';

		$html = HtmlDomParser::file_get_html( $url, false,null, 0 );	
		$i=$k;
		
		foreach($html->find('div.ppr_priv_location_reviews_list div.review-container div.wrap div[3] p.partial_entry') as $e){
			$reviews[$i]['review'] =  "<strong style='font-weight:bold'	><i class='fa fa-copyright'></i> Tripadvisor</strong> ".trim($e->innertext);
			$i++;
		}
		$i=$k;
		foreach($html->find('div.ppr_priv_location_reviews_list div.review-container div.wrap span.noQuotes') as $e){
			$reviews[$i]['name'] =  trim($e->innertext);
			$i++;
		}
		$i=$k;
		foreach($html->find('div.ppr_priv_location_reviews_list div.review-container div.wrap div.reviewItemInline') as $e){
			$reviews_rating =  0;
			preg_match('/(bubble_50)/', trim($e->innertext), $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
				$reviews_rating =  10;
			}
			preg_match('/(bubble_40)/', trim($e->innertext), $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
				$reviews_rating =  8;
			}
			preg_match('/(bubble_30)/', trim($e->innertext), $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
				$reviews_rating =  6;
			}
			preg_match('/(bubble_20)/', trim($e->innertext), $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
				$reviews_rating =  4;
			}
			preg_match('/(bubble_10)/', trim($e->innertext), $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
				$reviews_rating =  2;
			}
			preg_match('/(bubble_00)/', trim($e->innertext), $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
				$reviews_rating =  0;
			}
			$reviews[$i]['rating'] =  array('eat'=>$reviews_rating,'service' => $reviews_rating,'feer'=>$reviews_rating);
			$i++;
		}
		$i=$k;
		foreach($html->find('div.ppr_priv_location_reviews_list div.review-container div.wrap div.reviewItemInline span.relativeDate') as $e){
			$reviews[$i]['date'] =  trim($e->attr['title']);
			$i++;
		}
		
		/*$data = Review::select('id')->where('content','Goedd')->where('user_id'=> 215);
		echo $dataCount = $data->count();
		die;*/
		echo "<pre>";
		print_r($reviews);
		echo "</pre>";
		//die;
		foreach($reviews as $review){
			$data_c = Review::select('count(id)');
			$data_c->where('content',$review['review']);
			$data_c->where('user_id', Sentinel::getUser()->id);
			$data_c->where('company_id',1);
			$dataCount = $data_c->count();
			if($dataCount==0){
				$user = new Review;
				$user->user_id = Sentinel::getUser()->id;
				$user->company_id = 1;
				$user->deal_id = '8';
				$user->content = $review['review'];
				$user->food = $review['rating']['eat'];
				$user->service =$review['rating']['service'];
				$user->decor = $review['rating']['feer'];
				$user->is_approved = 2;
				$user->created_at = date('Y-m-d H:i:s');
				$user->updated_at = date('Y-m-d H:i:s');
				$user->save();
			}
		}
	}
	
    public function index(Request $request, $slug = NULL)
    {
        $data = Review::select(
            'users.name', 
            'reviews.*', 
            'companies.name as company'
        )
            ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('companies', 'companies.id', '=', 'reviews.company_id')
        ;
        
        if ($slug != null) {
            $data = $data->where('companies.slug', $slug);
        }
		if (Sentinel::inRole('admin'))  {
			 $data = $data->where('companies.user_id', Sentinel::getUser()->id);
		}

         if (!Sentinel::inRole('admin'))  {
            if (Sentinel::inRole('bedrijf'))  {
                $data = $data->where('companies.user_id', Sentinel::getUser()->id);
            } elseif (Sentinel::inRole('bediening'))  {
                $data = $data->where('companies.waiter_user_id', Sentinel::getUser()->id);
            }
        }

        if ($request->has('q'))  {
            $data = $data->where('content', 'LIKE', '%'.$request->input('q').'%');

            $searchHistory = new SearchHistory();
            $searchHistory->addTerm($request->input('q'), '/reviews');
        }

        if ($request->has('sort') && $request->has('order')) {
            $data = $data->orderBy(($request->has('sort') == 'company' ? 'companies.name' : $request->input('sort')), $request->input('order'));
            session(['sort' => $request->input('sort'), 'order' => $request->input('order')]);
        } else {
            $data = $data->orderBy('reviews.id', 'desc');
        }

        $dataCount = $data->count();

        $data = $data->paginate($request->input('limit', 15));
        $data->setPath($this->slugController);

        # Redirect to last page when page don't exist
        if ($request->input('page') > $data->lastPage()) { 
            $lastPageQueryString = json_decode(json_encode($request->query()), true);
            $lastPageQueryString['page'] = $data->lastPage();

            return Redirect::to($request->url().'?'.http_build_query($lastPageQueryString));
        }
        
        $queryString = $request->query();
        unset($queryString['limit']);

        return view('admin/'.$this->slugController.'/index', [
            'data' => $data, 
            'countItems' => $dataCount, 
            'slugController' => $this->slugController.(trim($slug) != '' ? '/'.$slug : ''),
            'queryString' => $queryString,
            'paginationQueryString' => $request->query(),
            'limit' => $request->input('limit', 15),
            'section' => $this->section, 
            'companies' => $this->companies, 
            'currentPage' => 'Overzicht'        
        ]);
    }

    public function updateAction(Request $request, $slug = NULL)
    {
        $companyOwner = Company::isCompanyUserBySlug($slug, Sentinel::getUser()->id);
       
        if($companyOwner['is_owner'] == TRUE || Sentinel::inRole('admin')) {
            switch ($request->get('action')) {
                case 'accept':
                    if($request->has('id'))  {
                        foreach($request->get('id') as $key => $value) {
                            $update = Review::find($value);
                            $update->is_approved = 1;
                            $update->save();
                        }
                    }
                    break;

                case 'decline':
                    if($request->has('id'))
                    {
                        foreach($request->get('id') as $key => $value) 
                        {
                            $update = Review::find($value);
                            $update->is_approved = 0;
                            $update->save();
                        }
                    }
                    break;

                case 'remove':
                    if($request->has('id'))
                    {
                        foreach($request->get('id') as $key => $value) 
                        {
                            $delete = Review::find($value);
                            $delete->delete();
                        }
                    }
                    break;
            }
        }

       return Redirect::to('admin/'.$this->slugController.($companyOwner['is_owner'] == TRUE ? '/'.$slug : ''));
    }
}