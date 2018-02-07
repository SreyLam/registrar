<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lettertype\Lettertype;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use View;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;

class LetterTypeController extends Controller
{
    public function getLettertype()
    {
        return view('backend.Lettertype.add_lettertype');

    }

    public function storeLettertype()
    {
        $newLettertype = new Lettertype();
        $newLettertype->number = \request()->number;
        $newLettertype->name = \request()->name;
        $newLettertype->created_at = Carbon::now();
        $newLettertype->updated_at = Carbon::now();
        $newLettertype->save();
        return redirect('/admin/lettertype');

    }


    public function getList_lettertype()
    {
        $lettertype = DB::table('letter_types')->get();
        return view('backend.Lettertype.lettertype', compact('lettertype'));
    }
    public function getDelete()
    {
        $lettertype = DB::table('letter_types')->where('id', \request('lettertype_id'))->delete();
        if ($lettertype) {
            return Response::json(['status' => true]);
        } else {
            return Response::json(['status' => false]);
        }
    }
    public function getEdit_lettertype($id)
    {
        $lettertype = Lettertypes::where('id', $id)->first();
//        dd($commune);
        return View::make('backend.Lettertype.edit_lettertype', compact('lettertype'));
    }

    public function postStore_lettertype($id)
    {
        $input = Input::all();
        //update into database

        $lettertype = DB::table('letter_types')->where('id', $id)->update(array(
            'number'  => $input['number'],
            'name'  => $input['name'],

        ));
        if($lettertype){
            return Redirect::to('admin/lettertype')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
        $lettertype = DB::table('letter_types')->where('id', $id)->update(array(
            'number'  => $input['number'],
            'name'  => $input['name'],
        ));
        if($lettertype){
            return Redirect::to('admin/lettertype')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
    }
}
