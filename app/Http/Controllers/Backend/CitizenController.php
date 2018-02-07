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
        $date = new Carbon();

        return view('backend.Citizen.add_citizen', compact('communes','letterypes','genders','date'));

    }

    public function getCitizenDatatable(){
        $citizens = Citizen::select('commune_id','number_list','number_book','lettertype_id','name','father_name','mother_name','child_order','gender',
            'year','date_birth','father_birth','other','id')->get();

        return Datatables::of($citizens)
            ->addColumn('actions', function ($citizen) {
                return '<a href=""><button type="button" class="btn btn-danger delete-citizen" aria-label="Left Align">
                                        <input type="hidden" class="citizen_id" value="'.$citizen->id.'">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="/admin/citizens/'.$citizen->id.'/edit_citizen"><button type="button" class="btn btn-success" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                                    </button>
                                </a>'


                    ;

            })->make();
    }

    public function storeCitizen()
    {
        $newCitzen = new Citizen();
        $newCitzen->commune_id = \request()->commune_id;
        $newCitzen->number_list = \request()->number_list;
        $newCitzen->number_book = \request()->number_book;
        $newCitzen->year = \request()->year;
        $newCitzen->name = \request()->name;
        $newCitzen->child_order = \request()->child_order;
        $newCitzen->gender = \request()->gender;
        $newCitzen->date_birth = \request()->date_birth;
        $newCitzen->father_name = \request()->father_name;
        $newCitzen->mother_name = \request()->mother_name;
        $newCitzen->pleace_birth = \request()->pleace_birth;
        $newCitzen->father_birth = \request()->father_birth;
        $newCitzen->mother_birth = \request()->mother_birth;
        $newCitzen->lettertype_id = \request()->lettertype_id;
        $newCitzen->other = \request()->other;
        $newCitzen->created_at = Carbon::now();
        $newCitzen->updated_at = Carbon::now();
        $newCitzen->save();
        return redirect('/admin/citizen');

    }


    public function getList_citizen()
    {
        $citizen = DB::table('citizens')->get();
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
    public function getEdit_comm($id)
    {
        $commune = Commune::where('id', $id)->first();
//        dd($commune);
        return View::make('backend.Commune.edit_commune', compact('commune'));
    }

    public function postStore_comm($id)
    {
        $input = Input::all();
        //update into database

        $commune = DB::table('communes')->where('id', $id)->update(array(
            'number'  => $input['number'],
            'name'  => $input['name'],

        ));
        if($commune){
            return Redirect::to('admin/commune')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
        $commune = DB::table('communes')->where('id', $id)->update(array(
            'number'  => $input['number'],
            'name'  => $input['name'],
        ));
        if($commune){
            return Redirect::to('admin/commune')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
    }

}
