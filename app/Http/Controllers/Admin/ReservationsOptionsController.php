<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservationOption;
use App\Models\Company;
use App\User;
use Alert;
use Illuminate\Support\Facades\Input;
use Mail;
use App;
use DB;
use Config;
use Illuminate\Http\Request;
use Redirect;
use Sentinel;
use File;

class ReservationsOptionsController extends Controller
{
    public function __construct(Request $request)
    {
        $this->slugController = 'reservations-options';
        $this->limit = $request->input('limit', 15);
        $this->companies = Company::orderBy('id', 'asc')->lists('name', 'id');
    }

    public function isCompanyOwner($slug)
    {
        $myCompany = Company::where('user_id', Sentinel::getUser()->id)
        ->where('slug', $slug)
        ->first()
        ;

        return array(
            'exist' => count($myCompany),
            'id' => (isset($myCompany->id) ? $myCompany->id : 0),
            );
    }

    public function index(Request $request, $slug = NULL)
    {

        if ($this->isCompanyOwner($slug)['exist'] == 0 && $slug != NULL && Sentinel::inRole('admin') == FALSE) {
            User::getRoleErrorPopup();
            return Redirect::to('/');
        }
    // $data= ReservationOption::with('reservationCount')
     //               ->select('id','name','total_amount','date_from','date_to','time_from','time_to');
        $data = ReservationOption::select(
            'reservations_options.id',
            'reservations_options.name',
            'reservations_options.total_amount',
            'reservations_options.date_from',
            'reservations_options.date_to',
            'reservations_options.time_from',
            'reservations_options.price_from',
            'reservations_options.price',
            'reservations_options.time_to',
            'reservations_options.time_to',
            'reservations_options.newsletter',
            DB::raw('sum(reservations.persons) as total_res'),
            DB::raw('sum(reservations.id) as reservated')
            )->leftJoin('companies', 'companies.id', '=', 'reservations_options.company_id')
        ->leftJoin('reservations', function ($join) {
            $join
            ->on('reservations.company_id', '=', 'reservations_options.company_id')
            ->on('reservations.option_id', '=', 'reservations_options.id')
            ;
        });
        if ($request->has('q')) {
            $data = $data->where('reservations_options.name', 'LIKE', '%'.$request->input('q').'%');
        }

        if ($slug != null) {
            $data = $data->where('companies.slug', '=', $slug);
        }

        if ($request->has('sort') && $request->has('order')) {
            $data = $data->orderBy($request->input('sort'), $request->input('order'));

            session(['sort' => $request->input('sort'), 'order' => $request->input('order')]);
        } else {
            $data = $data->orderBy('reservations_options.id', 'desc');
        }

        $data = $data->groupBy('reservations_options.id')->paginate($this->limit);
        $data->setPath($this->slugController.(trim($slug) != '' ? '/'.$slug : ''));

            # Redirect to last page when page don't exist
        if ($request->input('page') > $data->lastPage()) {
            $lastPageQueryString = json_decode(json_encode($request->query()), true);
            $lastPageQueryString['page'] = $data->lastPage();

            return Redirect::to($request->url().'?'.http_build_query($lastPageQueryString));
        }
           // echo "<pre>";
          // print_r($data->toArray());
          //  die();
        $queryString = $request->query();
        unset($queryString['limit']);

        return view('admin/'.$this->slugController.'/index', [
            'slugController' => $this->slugController.(trim($slug) != '' ? '/'.$slug : ''),
            'section' => 'Aanbiedingen',
            'currentPage' => 'Overzicht',
            'slug' => $slug,
            'data' => $data,
            'queryString' => $queryString,
            'paginationQueryString' => $request->query(),
            'limit' => $this->limit,
            ]);
    }

    public function indexAction(Request $request, $slug = NULL)
    {
        if ($this->isCompanyOwner($slug)['exist'] == 0 && $slug != NULL && Sentinel::inRole('admin') == fALSE) {
            User::getRoleErrorPopup();
            return Redirect::to('/');
        }

        if ($request->has('id')) {
            $data = ReservationOption::join('companies', 'companies.id', '=', 'reservations_options.company_id');

            if (Sentinel::inRole('admin') == FALSE) {
                $data = $data
                ->where('companies.user_id', Sentinel::getUser()->id)
                ->where('companies.slug', $slug)
                ;
            }

            $data = $data->whereIn('reservations_options.id', $request->input('id'));

            if ($data->count() >= 1) {
                $data->delete();
            }
        }

        Alert::success('De gekozen selectie is succesvol verwijderd.')->html()->persistent("Sluiten");
        return Redirect::to('admin/'.$this->slugController);
    }

    public function create(Request $request, $slug = NULL)
    {
        if ($this->isCompanyOwner($slug)['exist'] == 0 && $slug != NULL) {
            User::getRoleErrorPopup();
            return Redirect::to('/');
        }

        return view('admin/'.$this->slugController.'/create', [
            'slugController' => $this->slugController.(trim($slug) != '' ? '/'.$slug : ''),
            'section' => 'Aanbiedingen',
            'currentPage' => 'Nieuw',
            'companies' => $this->companies,
            'company' => $this->isCompanyOwner($slug),
            'slug' => $slug,
            ]);
    }

    public function createAction(Request $request, $slug = NULL)
    {
        if ($this->isCompanyOwner($slug)['exist'] == 0 && $slug != NULL && Sentinel::inRole('admin') == fALSE) {
            User::getRoleErrorPopup();
            return Redirect::to('/');
        }

        $this->validate($request, [
            'name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'time_to' => 'required',
            'time_from' => 'required',
            'newsletter' => 'required',
            'price_per_guest' => 'required',
            'image'       => 'required|mimes:jpeg,bmp,png|max:10000'

            ]);


        $data = new ReservationOption();
        $data->name = $request->input('name');
        $data->description = $request->input('content');
        $data->short_description = $request->input('short_content');
        $data->total_amount = $request->input('total_amount');
        $data->price_from = $request->input('price_from');
        $data->price = $request->input('price');
        $data->time_to = $request->input('time_to');
        $data->time_from = $request->input('time_from');
        $data->date_from = $request->input('date_from');
        $data->newsletter = $request->input('newsletter');
        $data->price_per_guest = $request->input('price_per_guest');
        $data->date_to = $request->input('date_to');
        $data->company_id = ($slug != NULL ? $this->isCompanyOwner($slug)['id'] : $request->input('company_id'));
        $data->company_id = ($slug != NULL ? $this->isCompanyOwner($slug)['id'] : $request->input('company_id'));
        $data->save();

        $data_id = $data->id;
            $destinationPath = 'images/deals/'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = 'deal_'.$data_id.'.'.$extension; // renameing image
            Input::file('image')->move($destinationPath, $fileName);

            Alert::success('U heeft succesvol een nieuwe reserverings optie aangemaakt.')->html()->persistent('Sluiten');

            return Redirect::to('admin/'.$this->slugController.'/create');
        }

        public function update(Request $request, $id,$slug=null)
        {
            $data = ReservationOption::select(
                'reservations_options.id',
                'reservations_options.company_id',
                'reservations_options.total_amount',
                'reservations_options.price_from',
                'reservations_options.price',
                'reservations_options.price_per_guest',
                'reservations_options.time_from',
                'reservations_options.time_to',
                'reservations_options.date_to',
                'reservations_options.date_from',
                'reservations_options.description',
                'reservations_options.short_description',
                'reservations_options.name',
                'reservations_options.image',
                'reservations_options.newsletter',
                'companies.slug'
                )
            ->leftJoin('companies', 'reservations_options.company_id', '=', 'companies.id')
            ->where('reservations_options.id', $id)
            ->first()
            ;

            if ($data) {
                if ($this->isCompanyOwner($data->slug)['exist'] == 0 && Sentinel::inRole('admin') == fALSE) {
                    User::getRoleErrorPopup();
                    return Redirect::to('/');
                }

                return view('admin/'.$this->slugController.'/update', [
                    'slugController' => $this->slugController.(trim($data->slug) != '' ? '/'.$data->slug : ''),
                    'section' => 'Aanbiedingen',
                    'currentPage' => 'Wijzigen',
                    'companies' => $this->companies,
                    'company' => $this->isCompanyOwner($data->slug),
                    'slug' => $data->slug,
                    'data' => $data,
                    ]);
            } else {
                App::abort(404);
            }
        }

        public function updateAction(Request $request, $id,$slug=null)
        {
            //Added price_per_person by Ocean
            $data = ReservationOption::select(
                'reservations_options.id',
                'reservations_options.company_id',
                'reservations_options.total_amount',
                'reservations_options.price_from',
                'reservations_options.price',
                'reservations_options.price_per_guest',
                'reservations_options.time_from',
                'reservations_options.time_to',
                'reservations_options.date_to',
                'reservations_options.date_from',
                'reservations_options.description',
                'reservations_options.short_description',
                'reservations_options.name',
                'reservations_options.newsletter',
                'companies.slug'
                )
            ->leftJoin('companies', 'reservations_options.company_id', '=', 'companies.id')
            ->where('reservations_options.id', $id)
            ->first()
            ;

            $this->validate($request, [
                'name' => 'required',
                'date_from' => 'required',
                'date_to' => 'required',
                'time_to' => 'required',
                'time_from' => 'required',
                'newsletter' => 'required',
                'image'       => 'mimes:jpeg,bmp,png|max:10000'
                ]);

            if ($data) {
                if ($this->isCompanyOwner($data->slug)['exist'] == 0 && Sentinel::inRole('admin') == fALSE) {
                    User::getRoleErrorPopup();
                    return Redirect::to('/');
                }
                $fileName='';
                if(Input::file('image')) {
                    $destinationPath = 'images/deals/'; // upload path
                    $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                    $fileName = 'deal_' . $data->id . '.' . $extension; // renameing image
                    File::delete($fileName);
                    Input::file('image')->move($destinationPath, $fileName);
                    chmod($destinationPath.$fileName,0777);

                }

                $data->name = $request->input('name');
                $data->description = $request->input('content');
                $data->short_description = $request->input('short_content');
                $data->total_amount = $request->input('total_amount');
                $data->price_from = $request->input('price_from');
                $data->price = $request->input('price');
                $data->price_per_guest = $request->input('price_per_guest');
                $data->time_to = $request->input('time_to');
                $data->time_from = $request->input('time_from');
                $data->date_from = $request->input('date_from');
                $data->date_to = $request->input('date_to');
                $data->newsletter = $request->input('newsletter');
                $data->company_id = $request->input('company_id');
                $data->image = $fileName;
                $data->save();
                Alert::success('U heeft deze aanbieding veranderd')->html()->persistent('Sluiten');

                if ($request->has('step')) {
                    echo 'ok';die;
                    return Redirect::to('faq/4/restaurateurs?step=4&slug='.$slug);
                } else {
                    return Redirect::to('admin/'.$this->slugController.'/update/'.$id);
                }
            }

        }

    }
