<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Citizen\Citizen;
use App\Models\Commune\Commune;
use App\Models\Gender\Gender;
use App\Models\Lettertype\Lettertype;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

class CitizenController extends Controller
{
    public function getCitizen()

    {
        $communes = Commune::all();
        $letterypes = Lettertype::all();
        $genders = Gender::all();
//        $date = new Carbon();

        return view('backend.Citizen.add_citizen', compact('communes','letterypes','genders'));

    }

    public function getCitizenDatatable(){
        $citizens = Citizen::select('commune_id','number_list','number_book','lettertype_id','name','father_name','mother_name','date_birth','child_order','gender',
            'year','pleace_birth','father_birth','mother_birth','other','id')->with('commune','lettertype');
//        echo \GuzzleHttp\json_encode($citizens);
//        die();

        return Datatables::of($citizens)
            ->editColumn('commune_id', function ($citizen){
                return $citizen->commune->number;
            })
            ->editColumn('lettertype_id', function ($citizen){
                return $citizen->lettertype->number;
            })

            ->addColumn('actions', function ($citizen){
                return '<a href=""><button type="button" class="btn btn-danger delete-citizen" aria-label="Left Align">
                                        <input type="hidden" class="citizen_id" value="'.$citizen->id.'">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="/admin/citizens/'.$citizen->id.'/edit_citizen"><button type="button" class="btn btn-success" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                                    </button>
                                </a>';


            })->make(true);
    }

    public function storeCitizen()
    {
        $newCitzen = new Citizen();
        $newCitzen->commune_id = \request()->commune_id;
        $newCitzen->number_list = \request()->number_list;
        $newCitzen->number_book = \request()->number_book;
        $newCitzen->lettertype_id = \request()->lettertype_id;
        $newCitzen->name = \request()->name;
        $newCitzen->father_name = \request()->father_name;
        $newCitzen->mother_name = \request()->mother_name;
        $newCitzen->date_birth = \request()->date_birth;
        $newCitzen->child_order = \request()->child_order;
        $newCitzen->gender = \request()->gender;
        $newCitzen->year = \request()->year;
        $newCitzen->pleace_birth = \request()->pleace_birth;
        $newCitzen->father_birth = \request()->father_birth;
        $newCitzen->mother_birth = \request()->mother_birth;
        $newCitzen->other = \request()->other;
        $newCitzen->created_at = Carbon::now();
        $newCitzen->updated_at = Carbon::now();
        $newCitzen->save();
        return redirect('/admin/citizen');

    }


    public function getList_citizen()
    {

        $citizen = DB::table('citizens')->get();
//        dd($citizen);
        return view('backend.Citizen.citizen', compact('citizen'));
    }
    public function getDelete()
    {
        $citizen = DB::table('citizens')->where('id', \request('citizen_id'))->delete();
        if ($citizen) {
            return Response::json(['status' => true]);
        } else {
            return Response::json(['status' => false]);
        }
    }
    public function getEdit_citizen($id)
    {
//        dd($id);
        $citizen = Citizen::where('id', $id)->first();

        return View::make('backend.Citizen.edit_citizen', compact('citizen'));
    }

    public function postStore_citizen($id)
    {
        $input = Input::all();
        //update into database

        $citizen = DB::table('citizens')->where('id', $id)->update(array(
            'commune_id'  => $input['commune_id'],
            'number_list'  => $input['number_list'],
            'number_book'  => $input['number_book'],
            'lettertype_id'  => $input['lettertype_id'],
            'name'  => $input['name'],
            'father_name'  => $input['father_name'],
            'mother_name'  => $input['mother_name'],
            'date_birth'  => $input['date_birth'],
            'child_order'  => $input['child_order'],
            'gender'  => $input['gender'],
            'year'  => $input['year'],
            'pleace_birth'  => $input['pleace_birth'],
            'father_birth'  => $input['father_birth'],
            'mother_birth'  => $input['mother_birth'],
            'other'  => $input['other'],

        ));
        if($citizen){
            return Redirect::to('admin/citizen')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
        $citizen = DB::table('citizens')->where('id', $id)->update(array(
            'commune_id'  => $input['commune_id'],
            'number_list'  => $input['number_list'],
            'number_book'  => $input['number_book'],
            'lettertype_id'  => $input['lettertype_id'],
            'name'  => $input['name'],
            'father_name'  => $input['father_name'],
            'mother_name'  => $input['mother_name'],
            'date_birth'  => $input['date_birth'],
            'child_order'  => $input['child_order'],
            'gender'  => $input['gender'],
            'year'  => $input['year'],
            'pleace_birth'  => $input['pleace_birth'],
            'father_birth'  => $input['father_birth'],
            'mother_birth'  => $input['mother_birth'],
            'other'  => $input['other'],
        ));
        if($citizen){
            return Redirect::to('admin/citizen')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
    }

}
