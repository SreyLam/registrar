<?php

namespace App\Http\Controllers\Backend;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commune\Commune;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;


class CommuneController extends Controller
{
    public function getComm()
    {
        return view('backend.Commune.add_commune');

    }

    public function getCommDatatable(){
        $communes = Commune::select('number','name', 'id');

        return Datatables::of($communes)
            ->addColumn('actions', function ($commune) {
            return '<a href=""><button type="button" class="btn btn-danger delete-commune" aria-label="Left Align">
                                        <input type="hidden" class="commune_id" value="'.$commune->id.'">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="/admin/communes/'.$commune->id.'/edit_commune"><button type="button" class="btn btn-success" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                                    </button>
                                </a>'

                                ;

        })
            ->make(true);
    }

    public function storeComm()
    {
        $newComm = new Commune();
        $newComm->number = \request()->number;
        $newComm->name = \request()->name;
        $newComm->created_at = Carbon::now();
        $newComm->updated_at = Carbon::now();
        $newComm->save();
        return redirect('/admin/commune');

    }


    public function getList_comm()
    {
        $commune = DB::table('communes')->get();
        return view('backend.Commune.commune', compact('commune'));
    }
    public function getDelete()
    {
        $commune = DB::table('communes')->where('id', \request('commune_id'))->delete();
        if ($commune) {
            return Response::json(['status' => true]);
        } else {
            return Response::json(['status' => false]);
        }
    }
    public function getEdit_comm($id)
    {
//        dd($id);
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
