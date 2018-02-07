<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Type\Type;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use View;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;


class TypeController extends Controller
{
    public function getType()
    {
        return view('backend.Type.add_type');

    }

    public function storeType()
    {
//        $input = Input::all();
        $newType = new Type();
        $newType->name = \request()->name;
        $newType->created_at = Carbon::now();
        $newType->updated_at = Carbon::now();
        $newType->save();
        return redirect('/admin/type');

    }


    public function getList_type()
    {
        $type = DB::table('types')->get();
        return view('backend.Type.type', compact('type'));
    }
    public function getDelete()
    {
        $type = DB::table('types')->where('id', \request('type_id'))->delete();
        if ($type) {
            return Response::json(['status' => true]);
        } else {
            return Response::json(['status' => false]);
        }
    }
    public function getEdit_type($id)
    {
        $type = Type::where('id', $id)->first();
//        dd($type);
        return View::make('backend.Type.edit_type', compact('type'));
    }

    public function postStore_type($id)
    {
        $input = Input::all();
        //update into database

        $type = DB::table('types')->where('id', $id)->update(array(
            'name'  => $input['name'],

        ));
        if($type){
            return Redirect::to('admin/type')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
        $type = DB::table('types')->where('id', $id)->update(array(

            'name'  => $input['name'],
        ));
        if($type){
            return Redirect::to('admin/type')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
    }
}
