<?php
namespace App\Http\Controllers\Admin;

use Alert;
use App;
use App\Http\Controllers\Controller;
use App\Models\Giftcard;
use App\Models\Company;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Redirect;
use Sentinel;

class GiftcardController extends Controller 
{

    public function __construct()
    {
        $this->slugController = 'giftcards';
        $this->section = 'Giftcards';
        $this->companies = Company::lists('name', 'id');
        $this->companiesList = Company::all();
    }

    public function index(Request $request)
    {
        $data = Giftcard::select(
            'giftcards.id',
            'giftcards.code',
            'giftcards.is_active',
            'giftcards.amount',
            'giftcards.max_usage',
            'giftcards.used_no',
            'giftcards.created_at as created',
            'companies.name as companyName'
        )
            ->leftJoin('companies', 'companies.id', '=', 'giftcards.company_id')
        ;

        if ($request->has('status')) {
            $data->where('giftcards.is_active', '=', $request->input('status'));
        }

        if ($request->has('q')) {
            $data = $data->where('giftcards.code', 'LIKE', '%'.$request->input('q').'%');
        }

        if ($request->has('sort') && $request->has('order')) {
            $data = $data->orderBy($request->input('sort'), $request->input('order'));

            session(['sort' => $request->input('sort'), 'order' => $request->input('order')]);
        } else {
            $data = $data->orderBy('giftcards.id', 'desc');
        }
        
        if ($request->has('company')) {
            $data = $data->where('companies.slug', '=', $request->input('company'));
        }

        $data = $data->paginate($request->input('limit', 15));
        $data->setPath('giftcards');

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
            'slugController' => $this->slugController,
            'queryString' => $queryString,
            'paginationQueryString' => $request->query(),
            'limit' => $request->input('limit', 15),
            'section' => $this->section, 
            'companies' => $this->companiesList, 
            'currentPage' => 'Overzicht'
        ]);
    }
    
    public function company(Request $request, $slug)
    {
        $userCompanyOwner = Company::isCompanyUserBySlug($slug, Sentinel::getUser()->id);
        $data = Giftcard::select(
            'giftcards.id',
            'giftcards.code',
            'giftcards.is_active',
            'giftcards.amount',
            'giftcards.max_usage',
            'giftcards.used_no',
            'giftcards.created_at as created',
            'giftcards.buy_date',
            'companies.name as companyName'
        )
            ->leftJoin('companies', 'companies.id', '=', 'giftcards.company_id')
        ;

        if (Sentinel::inRole('admin') == FALSE) {
            $data = $data->where('companies.user_id', Sentinel::getUser()->id);
        }


        if ($request->has('status')) {
            $data->where('giftcards.is_active', '=', $request->input('status'));
        }

        if ($request->has('q')) {
            $data = $data->where('giftcards.code', 'LIKE', '%'.$request->input('q').'%');
        }

        if ($request->has('sort') && $request->has('order')) {
            $data = $data->orderBy($request->input('sort'), $request->input('order'));

            session(['sort' => $request->input('sort'), 'order' => $request->input('order')]);
        } else {
            $data = $data->orderBy('giftcards.id', 'desc');
        }
        $dataCount = $data->count();
        $data = $data->paginate($request->input('limit', 15));
        $data->setPath('giftcards');

        # Redirect to last page when page don't exist
        if ($request->input('page') > $data->lastPage()) { 
            $lastPageQueryString = json_decode(json_encode($request->query()), true);
            $lastPageQueryString['page'] = $data->lastPage();

            return Redirect::to($request->url().'?'.http_build_query($lastPageQueryString));
        }

        $queryString = $request->query();
        unset($queryString['limit']);

        if ($userCompanyOwner != FALSE) {
            return view('admin/'.$this->slugController.'/company', [
                'data' => $data, 
                'countItems' => $dataCount, 
                'slug' => $slug, 
                'slugController' => $this->slugController.'/'.$slug,
                'queryString' => $queryString,
                'paginationQueryString' => $request->query(),
                'limit' => $request->input('limit', 15),
                'section' => $this->section, 
                'currentPage' => 'Overzicht',
                'companies' => $this->companiesList, 
            ]);
        } else{
            App::abort(404);
        }
    }


    public function create()
    {
        return view('admin/'.$this->slugController.'/create', [
            'companies' => $this->companies,
            'slugController' => $this->slugController,
            'section' => $this->section, 
            'currentPage' => 'Nieuwe giftcard'
        ]);
    }

    public function update($id)
    {
        $data = Giftcard::leftJoin('companies', 'companies.id', '=', 'giftcards.company_id');

        if (Sentinel::inRole('admin') == FALSE) {
            $data = $data->where('companies.user_id', Sentinel::getUser()->id);
        }

        $data = $data->find($id);

        return view('admin/'.$this->slugController.'/update', [
            'data' => $data,
            'companies' => $this->companies,
            'slugController' => $this->slugController,
            'section' => $this->section, 
            'currentPage' => 'Wijzig giftcard'
        ]);
    }

    public function createAction(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:giftcards',
            'amount' => 'required|numeric',
            'max_usage' => 'required|numeric',
            'company' => 'required'.$request->input('company') != 0 ? '|exists:companies,id' : ''
        ]);
        
        $myCompany = Giftcard::leftJoin('companies', 'companies.id', '=', 'giftcards.company_id');

        if (Sentinel::inRole('admin') == FALSE) {
            $myCompany = $myCompany->where('companies.user_id', Sentinel::getUser()->id);
        }

        if (count($myCompany) == 1) {
            $data = new Giftcard();
            $data->code = $request->input('code');
            $data->amount = $request->input('amount');
            $data->company_id = $request->input('company');
            $data->is_active = $request->input('is_active', 0);       
            $data->max_usage = $request->input('max_usage');       
            $data->save();

            Alert::success('Deze giftcard is succesvol aangemaakt.')->persistent('Sluiten');

            return Redirect::to('admin/'.$this->slugController.'/create');
        }
    }

    public function updateAction(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required|unique:giftcards,code,'.$id,
        ]);

        $data = Giftcard::find($id);
        $data->code = $request->input('code');
        $data->company_id = $request->input('company');
        $data->is_active = $request->input('is_active');
        $data->max_usage = $request->input('max_usage'); 
        $data->amount = $request->input('amount'); 
        $data->save();

        Alert::success('Deze giftcard is succesvol gewijzigd.')->persistent('Sluiten');

        return Redirect::to('admin/'.$this->slugController.'/update/'.$data->id);
    }

    public function deleteAction(Request $request)
    {
        if ($request->has('id')) {
            

            $dataGiftcode = Giftcard::select(
                'giftcards.id'
            )
                ->leftJoin('companies', 'companies.id', '=', 'giftcards.company_id')
                ->whereIn('giftcards.id', $request->input('id'));
            ;

            if (Sentinel::inRole('admin') == FALSE) {
                $dataGiftcode = $dataGiftcode->where('companies.user_id', Sentinel::getUser()->id);
            }

            if ($dataGiftcode->count() >= 1)  {               
                $dataGiftcode->delete();
            }
        }

        Alert::success('De gekozen selectie is succesvol verwijderd.')->persistent("Sluiten");

        return Redirect::to('admin/'.$this->slugController);
    }
}