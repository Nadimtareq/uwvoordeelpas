<?php

namespace App\Http\Controllers\Admin;
use Alert;
use App;
use Redirect;
use Sentinel;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->slugController = 'contact';
        $this->section = 'Contact';
    }

    public function index(Request $request){
        $data = Contact::select(
            '*'
        );

        if ($request->has('q')) {
            $data = $data->where('title', 'LIKE', '%'.$request->input('q').'%');
        }

        if ($request->has('sort') && $request->has('order')) {
            $data = $data->orderBy($request->input('sort'), $request->input('order'));

            session(['sort' => $request->input('sort'), 'order' => $request->input('order')]);
        } else {
            $data = $data->orderBy('id', 'desc');
        }
        $data = $data->paginate($request->input('limit', 15));
        $queryString = $request->query();
        return view('admin/'.$this->slugController.'/index', [
            'data' => $data,
            'slugController' => $this->slugController,
            'paginationQueryString' => $request->query(),
            'queryString' => $queryString,
            'limit' => $request->input('limit', 15),
            'section' => $this->section,
//            'category' => Config::get('preferences.faq'),
            'currentPage' => 'Contact List'
        ]);
    }

    public function deleteAction(Request $request)
    {
        $data = Contact::whereIn('id', $request->input('id'));

        if(Sentinel::inRole('admin') == FALSE) {
            $data = $data->where('user_id', Sentinel::getUser()->id);
        }

        switch ($request->input('action')) {
            case 'remove':
                $data->delete();

                Alert::success('De gekozen selectie is succesvol verwijderd.')->persistent("Sluiten");
                return Redirect::to('admin/'.$this->slugController);
                break;
        }
    }

    public function readAction($id)
    {
        $data = Contact::find($id);

        if ($data) {
            return view('admin/' . $this->slugController . '/read', [
                'data' => $data,
                'slugController' => $this->slugController,
                'section' => $this->section,
                'currentPage' => 'Contact List'
            ]);
        }
        else
            abort(404);
    }

}
