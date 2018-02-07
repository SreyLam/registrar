<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Gender\Gender;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class GenderController extends Controller
{
    public function getGender()
    {
        return view('backend.Gender.add_gender');

    }

    public function storeGender()
    {
//        $input = Input::all();
        $newGender = new Gender();
        $newGender->gender_name = \request()->gender_name;
        $newGender->created_at = Carbon::now();
        $newGender->updated_at = Carbon::now();
        $newGender->save();
        return redirect('/admin/gender');

    }
    public function getList_gender()
    {
        $gender = DB::table('genders')->get();
        return view('backend.Gender.gender', compact('gender'));
    }
    public function getDelete()
    {
        $gender = DB::table('genders')->where('id', \request('gender_id'))->delete();
        if ($gender) {
            return Response::json(['status' => true]);
        } else {
            return Response::json(['status' => false]);
        }
    }
    public function getEdit_gender($id)
    {
        $gender = Gender::where('id', $id)->first();
//        dd($gender);
        return View::make('backend.Gender.edit_gender', compact('gender'));
    }

    public function postStore_gender($id)
    {
        $input = Input::all();
        //update into database

        $gender = DB::table('genders')->where('id', $id)->update(array(
            'gender_name'  => $input['gender_name'],

        ));
        if($gender){
            return Redirect::to('admin/gender')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
        $gender = DB::table('genders')->where('id', $id)->update(array(

            'gender_name'  => $input['gender_name'],
        ));
        if($type){
            return Redirect::to('admin/gender')->withSuccess('Update Successfully');
        }else{
            return Redirect::back()->withError('Update Unsuccessfully');
        }
    }
}
