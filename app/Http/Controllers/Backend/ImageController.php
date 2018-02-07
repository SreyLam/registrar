<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

class ImageController extends Controller
{
//    public function getImage()
//    {
//        return view('backend.Image.add_image');
//
//    }
    public function getList_image()
    {
        $image = DB::table('images')->get();
        return view('backend.Image.image', compact('image'));
    }
}
