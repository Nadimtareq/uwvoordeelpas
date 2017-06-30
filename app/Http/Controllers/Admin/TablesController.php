<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Alert;
use App\Models\Table;
use App\Models\Company;

class TablesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $dbobj = new Table;

        foreach ($request->except(['orderby','page']) as $key => $val) {
            if ($val != '') {$dbobj = $dbobj->where($key, 'LIKE', '%' . trim($val) . '%');}
        }
        foreach ($request->only(['orderby']) as $val) {
            if ($val != '') {
                $col=explode(' ', $val);
                $dbobj = $dbobj->orderBy($col[0],$col[1]);
            }
        }

        $dbobj = $dbobj->paginate(5);

        $data["model"] = $dbobj;

        return view("admin/tables.index",$data);
    }

    public function create()
    {
        $companies = Company::lists('name', 'id');
        
        return view("admin/tables.create",['companies'=>$companies]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        "table_number" => "required","seating" => "required","description" => "required","priority" => "required","duration" => "required",]);

        $input = $request->all();

        Table::create($input);

        Session::flash("flash_message", "Tables successfully added!");
        Alert::success("Table Added successfully");

        return Redirect::to('admin/tables');
    }

    public function show($id)
    {
        $data["model"] = Table::findOrFail($id);

        return view("admin/tables.show",$data);
    }

    public function edit($id)
    {
        $data["model"] = Table::findOrFail($id);
        $data["companies"] = Company::lists('name', 'id');
        return view("admin/tables.edit",$data);
    }


    public function update($id, Request $request)
    {
        $data = Table::findOrFail($id);

        $this->validate($request, [
        "table_number" => "required","seating" => "required","description" => "required","priority" => "required","duration" => "required",]);$input = $request->all();

        $data->fill($input)->save();

        Session::flash("flash_message", "Tables successfully updated!");
          Alert::success("Table Updated successfully");
        return redirect()->back();
    }


    public function destroy($id)
    {
        $data = Table::findOrFail($id);

        $data->delete();

        Session::flash("flash_message", "Tables successfully deleted!");

         return redirect()->back();
    }
    
}

/*End of file */